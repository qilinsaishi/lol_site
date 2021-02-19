<?php
require_once "function/init.php";
$data = [
        "site_id"=>$config['site_id'],
    ];
$return = curl_post($config['api_sitemap'],json_encode($data),1);
$urlList = [];
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
    $return[] = "<url>\n<loc>".$url."</loc>\n<lastmod>".date('Y-m-d')."</lastmod>\n<changefreq>weekly</changefreq>\n<priority>1.0</priority>\n</url>\n";
}
$return[] = '<urlset>';
$myfile = fopen("sitemap.xml", "w") or die("Unable to open file!");
$txt = implode($return);
fwrite($myfile, $txt);
fclose($myfile);
?>
