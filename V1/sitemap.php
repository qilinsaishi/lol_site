<?php
require_once "function/init.php";

$urlList = [];
foreach($config['navList'] as $nav)
{
    if(substr($nav['url'],-5)=="list/")
    {
        $urlList[] = $config['site_url']."/".$nav['url']."1";
    }
    else
    {
        $urlList[] = $config['site_url']."/".$nav['url'];
    }
}
$data = [
        "site_id"=>$config['site_id'],
    ];
$return = curl_post($config['api_sitemap'],json_encode($data),1);

foreach($return as $type => $detail)
{
    foreach($detail as $key)
    {
        $urlList[] = $config['site_url']."/".$type."/".$key;
    }
}
$return = [];
$return[] = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset>\n";

foreach($urlList as $url)
{
    $priority = ($url==$config['site_url'])?1:0.8;
    $return[] = "<url>\n<loc>".$url."</loc>\n<lastmod>".date('Y-m-d')."</lastmod>\n<changefreq>daily</changefreq>\n<priority>".$priority."</priority>\n</url>\n";
}
$return[] = '</urlset>';
$myfile = fopen(dirname(__FILE__)."/sitemap.xml", "w") or die("Unable to open file!");
$txt = implode($return);
fwrite($myfile, $txt);
fclose($myfile);
$page = 1;$i = 1;$page_size = 1500;
$t = [];
foreach($urlList as $url)
{
    $t[] = $url;
    $i++;
    if($i>$page_size)
    {
        push2Baidu($t,$config);
        $i = 1;
        $page++;
        $t = [];
    }
}
if(count($t)>0)
{
    push2Baidu($t,$config);
}
function push2Baidu($urls,$config)
{
    $url = explode('//',$config['site_url']);
    $api = 'http://data.zz.baidu.com/urls?site='.$url[1].'&token='.$config['baidu_token'];
    $api = htmlspecialchars_decode($api);
    $ch = curl_init();
    $options =  array(
        CURLOPT_URL => $api,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => implode("\n", $urls),
        CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
    );
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    echo $result;
}
?>
