<?php
require_once "function/init.php";
$id = $_GET['id']??1;
$url = $config['site_url']."/newsdetail/".$id;
header('HTTP/1.1 301 Moved Permanently');
header('Location: '.$url);
?>