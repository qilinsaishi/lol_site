<?php
require_once "function/init.php";

$urlList = [];
$data = [
    "site_id"=>$config['site_id'],
    "recent"=>3600,
];
$return = curl_post($config['api_sitemap'],json_encode($data),1);
$type = "newsdetail";
foreach($return[$type] as $key)
{
    $urlList[] = $config['site_url']."/".$type."/".$key;
}
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
    if(count($urls)>0)
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
    }
    else
    {
        $result = json_encode(["empty"]);
    }
    echo $result;
}
?>
