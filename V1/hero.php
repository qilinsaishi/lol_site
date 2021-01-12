<!DOCTYPE html>
<?php
$hero_id = $_GET['hero_id'];
require_once "function/init.php";
$data = [
    "lolHero"=>[$hero_id],
    "lolHeroList"=>["page"=>1,"page_size"=>15],
    "tournament"=>["page"=>1,"page_size"=>8],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"]],
    "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6],
    "playerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8],
    "keywordMapList"=>["fields"=>"content_id","source_type"=>"hero","source_id"=>$hero_id,"page_size"=>100,"content_type"=>"information"]
];
$return = curl_post($config['api_get'],json_encode($data),1);
foreach($return['lolHero']['data']["skinList"] as $key => $skinInfo)
{
    $return['lolHero']['data']["skinList"][$key]['data'] = json_decode($skinInfo['data'],true);
}
foreach($return['lolHero']['data']["spellList"] as $key => $spellInfo)
{
    $return['lolHero']['data']["spellList"][$key]['data'] = json_decode($spellInfo['data'],true);
}
if(count($return["keywordMapList"]['data'])>0)
{
    $data2 = [
        "informationList"=>["ids"=>array_column($return["keywordMapList"]['data'],"content_id"),"page_size"=>13,"fields"=>"id,title,logo"]
    ];
    $return2 = curl_post($config['api_get'],json_encode($data2),1);
    $connectedInformationList = $return2["informationList"]["data"];
}
else
{
    $connectedInformationList = [];
}
?>


<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
  <meta name="description" content="<?php echo mb_str_split($return['lolHero']['data']['description'],200);?>;?>">
    <meta name=”Keywords” Content=”<?php echo $return['lolHero']['data']['hero_name'];?>,<?php echo $config['game_name'];?><?php echo $return['lolHero']['data']['hero_name'];?>″>
    <title><?php echo $config['game_name'];?><?php echo $return['lolHero']['data']['hero_name'];?>介绍_<?php echo $return['lolHero']['data']['hero_name'];?>攻略-<?php echo $config['site_name'];?><?php echo $config['game_name']."-".$return['lolHero']['data']['cn_name'];?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/css/swiper.css">
</head>

<body>
  <nav class="navbar navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <a class="navbar-brand" href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png" alt="<?php echo $config['site_name'];?>" /></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <?php generateNav($config,"hero");?>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container margin120">
      <ol class="breadcrumb">
      <li><a href="<?php echo $config['site_url'];?>">首页</a></li>
      <li><a href="hero-list.php"><?php echo $config['game_name'];?>英雄列表</a></li>
      <li><a href="hero.php?hero_id=<?php echo $return['lolHero']['data']['hero_id'];?>"><?php echo $return['lolHero']['data']['hero_name'];?></a></li>

      </ol>
          <div class="row">

      <div class="gameInt">
        <div class="col-lg-6 col-md-6 col-xs-12 left">
          <img src="              
          <?php foreach($return['lolHero']['data']['skinList'] as $key => $skinInfo)
          {
              if($skinInfo['data']['isBase']==1)
             {
                 echo $skinInfo['data']['mainImg'];
             }
         }?>
            " />
        </div>



        <div class="col-lg-6 col-md-6 col-xs-12 right">
          <h2><?php echo $return['lolHero']['data']['cn_name'];?></h2>
          <div class="progressList">
            <div class="title">
              <svg t="1608212734669" class="icon" viewBox="0 0 1024 1024" version="1.1"
                xmlns="http://www.w3.org/2000/svg" p-id="8494" width="48" height="48">
                <path
                  d="M838.4 121.6l-51.2 160-172.8 140.8-38.4 32 32 38.4L704 614.4l38.4 44.8 38.4-38.4 51.2-51.2 19.2 19.2-57.6 51.2-38.4 38.4 38.4 38.4 89.6 89.6 6.4 6.4-19.2 19.2-6.4-6.4-89.6-89.6-38.4-38.4-32 32-51.2 51.2-19.2-19.2 51.2-51.2 38.4-38.4-44.8-32-134.4-108.8-32-25.6-32 25.6L345.6 640l-44.8 38.4 38.4 38.4 51.2 51.2-19.2 19.2-51.2-57.6-38.4-38.4-38.4 38.4-89.6 89.6-6.4 6.4-19.2-19.2 6.4-6.4 89.6-89.6 38.4-38.4-32-32-51.2-57.6 19.2-19.2 51.2 51.2 38.4 38.4 32-38.4 96-115.2 32-44.8-38.4-32-172.8-140.8-51.2-160 160 51.2 128 153.6 38.4 51.2 38.4-51.2 128-153.6 160-51.2M921.6 38.4L652.8 128 512 294.4 377.6 134.4 102.4 38.4 192 307.2l179.2 147.2-89.6 128-83.2-89.6-96 89.6L192 672l-89.6 89.6-44.8-44.8-44.8 44.8L192 940.8l44.8-44.8-44.8-44.8 89.6-89.6 89.6 89.6 89.6-89.6-83.2-83.2L512 569.6l134.4 108.8-83.2 83.2 89.6 89.6 89.6-89.6 89.6 89.6-44.8 44.8 44.8 44.8 179.2-179.2-44.8-44.8-44.8 44.8-89.6-89.6 89.6-89.6L832 492.8 748.8 576l-96-115.2L832 313.6 921.6 38.4z"
                  p-id="8495" fill="#d5e3f3"></path>
              </svg>
              <span><?php echo $return['lolHero']['data']['hero_name'];?></span>
            </div>
            <ul>
              <li class="progress-item">
                <span>上手难度</span>
                <svg t="1607836752708" class="icon" viewBox="0 0 1024 1024" version="1.1"
                  xmlns="http://www.w3.org/2000/svg" p-id="2306" width="48" height="48">
                  <path
                    d="M777.2 440.8c38.9-49.8 54.5-113.1 45.1-182.9-8.5-62.8-37-130.7-82.5-196.4-5.6-8.1-15.5-12.2-25.2-10.3s-17.5 9.3-19.7 18.9c-11.3 48.4-75.8 71.4-146.6 92.6-36.8 11-68.5 31.6-91.4 59.4-22.4 27.1-35.2 59.3-37.2 93.1-0.6 10.9-0.1 21.7 1.5 32.3-17.2-4.3-34.5-8.1-44.7-8.9-33.7-2.5-55.6 5.8-65.1 24.7l-51.7 103c-8.9 17.6-3.8 38.5 15 62 7.3 9.1 16.7 18.7 28.1 28.8l-24 47.8c-5.1 10.2-7.4 27.1 10.7 49.7 4.5 5.6 10.1 11.4 16.7 17.5L227.6 906c-2.5 7.4-3.2 19 7.5 32.4 15.5 19.4 52.2 39.5 80.3 49.4 11 3.9 20.7 6.2 28.8 6.9 1.8 0.2 3.5 0.2 5.1 0.2 15.9 0 24.3-7.1 28.7-13.4l139.4-202.8c11.6 2.3 21.8 3.4 30.5 3.2 25.4-0.5 36.3-11.8 41-21.2l24-47.7c18.6 3.9 34.8 5.8 48.2 5.4 31.6-0.8 44.8-14.1 50.3-25.1l51.7-103c8.9-17.7 3.9-38.6-14.9-62-8.5-10.7-20.2-22.2-34.4-34.2 23.5-11.5 44.7-29.3 63.4-53.3z m-68 118.8c4.7 5.8 6.7 9.7 7.6 11.7l-0.2 0.5c-16 1.1-46.7-2.3-100.1-21-48.8-17.1-102.3-42.3-150.6-70.8-5.9-3.5-13.6-1.5-17.1 4.4s-1.5 13.6 4.4 17.1c49.6 29.4 104.7 55.3 155 72.9 12.7 4.5 26.2 8.8 39.7 12.5l0.7 0.1c12.6 2.3 24 10.2 30.1 22.5s5.7 26.2 0 37.6l-10.2 20.4c-3.7 0.9-11.9 1.6-25.7-0.1-9.6-1.3-21.3-3.6-35.5-7.4-12.3-3.3-25.6-7.4-39.5-12.3-6.5-2.3-13.6 1.1-15.9 7.7-2.3 6.5 1.7 13.9 1.7 13.9 5.3 1.8 9.8 5.7 12 11.3s1.9 11.5-0.6 16.5l-17.5 34.8c-5 0.2-15.4-0.5-34.4-5.6l-5.2-1.4c-5-1.5-10.1-3.2-15.4-5-24.4-8.6-50.8-20.3-76.3-33.9-6.1-3.3-13.7-1-16.9 5.1-3.3 6.1-1 13.7 5.1 16.9 10.5 5.6 21.2 11 31.8 15.9l-0.4-0.2c10.8 4.4 19.5 13.5 23.1 25.6 3.6 12 1.2 24.5-5.4 34.1L343.1 943.8c-2.7-0.6-6.4-1.7-11.2-3.3-22.1-7.7-43.5-20.7-53.4-29.1l78.1-232.2c2.4 1.6 4.8 3.2 7.3 4.9 2.1 1.4 4.5 2 6.8 2 4.1 0 8.1-2 10.5-5.7 3.8-5.8 2.1-13.5-3.7-17.3-10.3-6.7-19.7-13.4-27.8-19.8-0.6-0.5-1.2-0.9-1.9-1.2-10.4-8.5-16.3-14.8-19.3-18.7-0.8-0.9-1.4-1.8-1.9-2.5l27.6-54.9c42.2 29.8 96.5 60.1 150.8 83.8 1.6 0.7 3.3 1 5 1 4.8 0 9.4-2.8 11.5-7.5 2.8-6.3-0.1-13.7-6.5-16.5-57.8-25.2-115.5-58-157.5-89.4l-8-6.3c-15.5-12.3-27.9-24.1-35.9-34-4.7-5.8-6.7-9.7-7.6-11.7l35-69.8c6.6 7.7 14.8 15.9 24.6 24.3 2.4 2.1 5.3 3.1 8.2 3.1 3.5 0 7-1.4 9.4-4.3 4.5-5.2 4-13.1-1.2-17.6-10.3-9-18.7-17.5-24.9-25.2-1.4-1.8-2.7-3.4-3.7-5l0.9-1.7c3.3-0.8 11.6-2 28.7 0.4 16.4 2.3 36.6 7.2 59 14.5 1.3 2.2 2.7 4.4 4.2 6.6 20.7 30.9 51.7 55.4 92.1 72.8 41.1 17.7 75 26 106.9 26 2.2 0 4.3-0.1 6.5-0.1 25.8 18.3 45.9 35.7 57.5 50.2z m-63.9-100.1c-13 0-26.7-1.9-41.8-5.9 23.8-11.2 37.7-36.8 26.9-63.6-18-45 0-89 0-89-63.6-6.7-121.6 61.7-115.1 111.4-31.4-25-47.6-57.9-45.6-94.3 2.9-49.2 39.4-91.4 93-107.5 45-13.5 81.1-26.1 111.2-43.6 20.4-11.9 36.3-25.3 48.1-40.4 63.9 109.7 70.3 213.7 15.9 283.6-25.9 33.2-56.2 49.3-92.6 49.3z"
                    p-id="2307" fill="#06181e"></path>
                  <path
                    d="M425.8 454.4c-3.6-2.4-7.1-4.8-10.5-7.3-5.6-4-13.4-2.7-17.4 2.9s-2.7 13.4 2.9 17.4c3.5 2.5 7.2 5.1 11 7.7 2.2 1.5 4.6 2.2 7 2.2 4 0 7.9-1.9 10.3-5.5 3.9-5.7 2.4-13.5-3.3-17.4z"
                    p-id="2308" fill="#06181e"></path>
                </svg>
                <div class="progress">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                    aria-valuemax="100" style="width: <?php echo $return['lolHero']['data']['difficulty']*10;?>%">
                    <span class="sr-only">80% Complete (danger)</span>
                  </div>
                </div>
              </li>
              <li class="progress-item">
                <span>生存能力</span>
                <svg t="1607836356136" class="icon" viewBox="0 0 1024 1024" version="1.1"
                  xmlns="http://www.w3.org/2000/svg" p-id="1199" width="48" height="48">
                  <path
                    d="M512 64c31.3 0 62.8 3.2 93.5 9.5 31 6.4 61.5 16 90.6 28.6l200 86.6v252.2c0.1 59.7-10 118.5-30.1 174.7-19.8 55.7-48 107.6-83.9 154.3l-0.1 0.2-0.1 0.2C746 817.8 703 858.8 654 892.3c-43.6 29.7-91.3 51.7-141.9 65.5-50.8-13.8-98.7-36-142.4-65.8-49-33.5-92-74.5-127.9-122l-0.1-0.1-0.1-0.1c-35.6-46.6-63.6-98.4-83.3-153.9v-0.2c-20.1-56.2-30.2-115-30-174.7V188.8l199.9-86.6c29.1-12.6 59.6-22.2 90.6-28.6 30.4-6.4 61.8-9.6 93.2-9.6m0-64c-71.3 0-142.7 14.5-209.5 43.5L64 146.7v294.2c-0.2 67 11.3 133.4 33.8 196.4 21.8 61.7 53.1 119.5 92.7 171.4 40 52.9 88.3 98.9 142.9 136.3 54.3 37.1 114.7 63.9 178.5 79 63.6-15.1 123.9-41.8 178-78.7C744.6 908 792.8 861.9 832.8 809c39.9-52 71.4-110 93.4-171.9 22.5-63 33.9-129.5 33.8-196.4v-294L721.4 43.4C654.6 14.5 583.3 0 512 0z"
                    p-id="1200" fill="#06181e"></path>
                  <path
                    d="M512 128c54.8 0 108.2 11.1 158.6 32.9L832 230.8V441c0.1 52.3-8.7 103.8-26.3 153.1v0.2c-17.5 49.3-42.5 95.4-74.3 136.8l-0.3 0.4-0.3 0.4c-31.8 41.8-69.7 78.1-113 107.6-32.9 22.4-68.4 39.7-105.9 51.7-37.7-12-73.3-29.4-106.3-52-43.3-29.6-81.3-65.8-113-107.8l-0.2-0.3-0.2-0.3c-31.6-41.3-56.4-87.2-73.8-136.4l-0.1-0.2-0.1-0.2c-17.5-49-26.3-100.5-26.2-152.8V230.8l161.3-69.9C403.7 139.1 457.1 128 512 128"
                    p-id="1201" fill="#06181e"></path>
                </svg>
                <div class="progress">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                    aria-valuemax="100" style="width: <?php echo $return['lolHero']['data']['defense']*10;?>%">
                    <span class="sr-only"></span>
                  </div>
                </div>
              </li>
              <li class="progress-item">
                <span>物理攻击</span>
                <svg t="1607836837671" class="icon" viewBox="0 0 1024 1024" version="1.1"
                  xmlns="http://www.w3.org/2000/svg" p-id="2784" width="48" height="48">
                  <path
                    d="M838.4 121.6l-51.2 160-172.8 140.8-38.4 32 32 38.4L704 614.4l38.4 44.8 38.4-38.4 51.2-51.2 19.2 19.2-57.6 51.2-38.4 38.4 38.4 38.4 89.6 89.6 6.4 6.4-19.2 19.2-6.4-6.4-89.6-89.6-38.4-38.4-32 32-51.2 51.2-19.2-19.2 51.2-51.2 38.4-38.4-44.8-32-134.4-108.8-32-25.6-32 25.6L345.6 640l-44.8 38.4 38.4 38.4 51.2 51.2-19.2 19.2-51.2-57.6-38.4-38.4-38.4 38.4-89.6 89.6-6.4 6.4-19.2-19.2 6.4-6.4 89.6-89.6 38.4-38.4-32-32-51.2-57.6 19.2-19.2 51.2 51.2 38.4 38.4 32-38.4 96-115.2 32-44.8-38.4-32-172.8-140.8-51.2-160 160 51.2 128 153.6 38.4 51.2 38.4-51.2 128-153.6 160-51.2M921.6 38.4L652.8 128 512 294.4 377.6 134.4 102.4 38.4 192 307.2l179.2 147.2-89.6 128-83.2-89.6-96 89.6L192 672l-89.6 89.6-44.8-44.8-44.8 44.8L192 940.8l44.8-44.8-44.8-44.8 89.6-89.6 89.6 89.6 89.6-89.6-83.2-83.2L512 569.6l134.4 108.8-83.2 83.2 89.6 89.6 89.6-89.6 89.6 89.6-44.8 44.8 44.8 44.8 179.2-179.2-44.8-44.8-44.8 44.8-89.6-89.6 89.6-89.6L832 492.8 748.8 576l-96-115.2L832 313.6 921.6 38.4z"
                    p-id="2785" fill="#06181e"></path>
                </svg>
                <div class="progress">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                    aria-valuemax="100" style="width: <?php echo $return['lolHero']['data']['physical_attack']*10;?>%">
                    <span class="sr-only"></span>
                  </div>
                </div>
              </li>
              <li class="progress-item">
                <span>魔法攻击</span>
                <svg t="1607836934452" class="icon" viewBox="0 0 1024 1024" version="1.1"
                  xmlns="http://www.w3.org/2000/svg" p-id="7327" width="48" height="48">
                  <path
                    d="M526.7 70.1c-8.2-8-21.3-8-29.5 0C437.5 127.9 217 414.5 217 647.4c0 162.9 132.1 312.5 295 312.5s295-132.1 295-295c0-250.4-220.6-536.8-280.3-594.8zM404.3 807.2c-5.1 3.2-10.8 4.8-16.4 4.8-10.2 0-20.1-5-26-14.3-23-36.3-37.2-77.6-41-119.3-2.5-28.2-2.6-57.2-0.3-86.2 1.4-16.9 16.2-29.5 33.1-28.1 16.9 1.4 29.5 16.2 28.1 33.1-2.1 25.6-2 51 0.3 75.7 2.9 32 13.9 63.8 31.7 91.9 9 14.4 4.8 33.3-9.5 42.4z"
                    p-id="7328"></path>
                </svg>
                <div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                    aria-valuemax="100" style="width: <?php echo $return['lolHero']['data']['magic_attack']*10;?>%">
                    <span class="sr-only"></span>
                  </div>
                </div>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
    <div class="row heroStory">
      <div class="icon_title">
        <h3>
          <svg t="1607837486696" class="icon" viewBox="0 0 1025 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
            p-id="10701" width="48" height="48">
            <path
              d="M0 47.722453l0 737.653644c0 36.023971 27.087792 74.654328 60.36575 86.569233L490.652074 1024 490.652074 156.166708 60.36575 4.112039C27.087792-7.849409 0 11.698482 0 47.722453zM963.152534 3.227729 810.632438 69.411304l0 737.653644c0 35.977429-23.876353 81.356462-53.337818 101.090524l-117.333891 79.634386 323.191804-116.728837C996.849375 859.564999 1023.937167 821.353526 1023.937167 785.376097L1023.937167 47.722453C1023.937167 11.698482 996.849375-8.03558 963.152534 3.227729zM767.952876 785.376097 767.952876 47.722453c0-35.977429-23.876353-48.823186-53.337818-29.089124l-181.329964 137.579921L533.285094 1024l181.329964-137.533379C744.076523 866.686017 767.952876 821.353526 767.952876 785.376097z"
              p-id="10702" fill="#d5e3f3"></path>
          </svg>
          <span>英雄背景故事</span>
        </h3>
      </div>
      <div id="content" class="heroStory-cont">
        <p><?php echo $return['lolHero']['data']['description'];?></p>
        <div id="get_ct_more" class="get_ct_more">
          <span>Read More</span>
        </div>
      </div>
    </div>
    <div class="row skillsInt">
      <div class="icon_title">
        <h3>
          <svg t="1607842130985" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
            p-id="12261" width="48" height="48">
            <path
              d="M226.812517 1024l555.303105-664.605764h-230.510823L811.220779 0H420.010983L212.779221 554.897811h201.000371L226.812517 1024z"
              fill="#d5e3f3" p-id="12262"></path>
          </svg>
          英雄技能介绍
        </h3>
      </div>
      <div class="investment_f">

        <div class="investment_title">
            <?php foreach($return['lolHero']['data']['spellList'] as $key => $spellInfo)
            { ?>
          <div <?php if($key==0){echo 'class="on"';}?>>
            <img src="<?php echo $spellInfo['data']['abilityIconPath'];?>" alt="">
          </div>
            <?php }?>

        </div>

        <div class="investment_con">

            <?php foreach($return['lolHero']['data']['spellList'] as $key => $spellInfo)
              {?>
                  <div class="investment_con_list">
                          <p class="top-name"><b><?php echo $spellInfo['spell_name'];?></b><?php if(is_array($spellInfo['data']['cooldown']) && count($spellInfo['data']['cooldown'])>0){echo '<span>冷却值：'.implode("/",$spellInfo['data']['cooldown']).'</span>';}?><?php if(is_array($spellInfo['data']['cost']) && count($spellInfo['data']['cost'])>0){echo '<span>消耗：'.implode("/",$spellInfo['data']['cost']).'</span>';}?></p>
                    <p class="skill-desc">
                    <?php echo $spellInfo['data']['description']==""?"暂无":$spellInfo['data']['description'];?></p>
                  </div>


              <?php }?>
        </div>

      </div>
    </div>

    <div class="row heroSkin">
      <div class="icon_title">
        <h3>
          <svg t="1607842130985" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
            p-id="12261" width="48" height="48">
            <path
              d="M226.812517 1024l555.303105-664.605764h-230.510823L811.220779 0H420.010983L212.779221 554.897811h201.000371L226.812517 1024z"
              fill="#d5e3f3" p-id="12262"></path>
          </svg>
          英雄皮肤
        </h3>
      </div>
      <div class="img-content">
        <div class="small-img">
              <?php
              $i = 1;
              foreach($return['lolHero']['data']['skinList'] as $key => $skinInfo)
              { ?>
                  <a <?php if($i==1){?>class="on"<?php }?> rel="img<?php echo $i;?>" href="javascript:;">
                      <img class="moveimg<?php if($i==1){?> active <?php }?>" src="<?php echo $skinInfo['data']['mainImg'];?>">
                      <p class="img-name"><?php echo $skinInfo['data']['name'];?></p>
                  </a>
              <?php $i++;}?>
        </div>

          <div class="big-img " id="gallery_output">
              <?php
              $i = 1;
              foreach($return['lolHero']['data']['skinList'] as $key => $skinInfo)
              { ?>
                  <img id="img<?php echo $i;?>" src="<?php echo $skinInfo['data']['iconImg'];?>" />
                  <?php $i++;}?>

          </div>
      </div>
    </div>


    <div class="row">
      <div class="icon_title">
        <h3>
          <svg t="1607858043842" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
            p-id="15924" width="48" height="48">
            <path
              d="M188.32 834.816H833.92a107.904 107.904 0 0 0 107.584-107.584V108.544A107.904 107.904 0 0 0 833.92 0.96H188.32A107.904 107.904 0 0 0 80.736 108.544V915.52a107.904 107.904 0 0 0 107.584 107.584h712.832c21.536 0 40.352-18.816 40.352-40.32 0-21.536-18.816-40.384-40.32-40.384H215.2a53.952 53.952 0 0 1-53.792-53.76v-56.512c8.064 0 18.816 2.688 26.88 2.688zM295.936 54.752h161.376v263.616l-56.48-59.2c-13.44-10.752-32.288-10.752-43.04 0L295.936 318.4V54.72z"
              p-id="15925" fill="#d5e3f3"></path>
          </svg>
          英雄攻略
        </h3>
      </div>
      <div class="strategy-box">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 gameInt_video">
          <ul class="list_box">
              <?php
              if(count($connectedInformationList)>0)
              {
                  $i = 1;
                  foreach($connectedInformationList as $key => $value) {
                      if($i<=6){?>

                      <li class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
                          <a href="<?php echo $config['site_url']; ?>/newsDetail/<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank">
                              <img
                                      src="<?php echo $value['logo'];?>"
                                      alt="<?php echo $value['title'];?>">
                              <p><?php echo $value['title'];?></p>
                          </a>
                      </li>
                      <?php }$i++;}}else{?><li class="list-item"><div class="col-lg-10 col-sm-10 col-md-12 col-xs-12 left"><p>暂无</p></div></li>
              <?php }?>
            <div style="clear: both;"></div>
          </ul>

        </div>

          <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 gameInt_zixun">
              <ul class="list_box">
              <?php
                  $i = 1;
                  foreach($connectedInformationList as $key => $value) {
                      if($i>6){?>
                          <li class="list-item">
                          <a href="<?php echo $config['site_url']; ?>/newsDetail/<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank">
                              <span>图文</span>
                              <p><?php echo $value['title'];?></p>
                          </a>
                      </li>
                      <?php }$i++;}?>
          </ul>
          <div style="clear: both;"></div>
        </div>
        <div style="clear: both;"></div>
      </div>
    </div>


    <div class="row heroRecommend">
      <div class="col-md-12">
        <div class="icon_title">
          <h3>
            <svg t="1607950272013" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
              p-id="13816" width="48" height="48">
              <path
                d="M51.906259 422.146364a51.321329 51.321329 0 0 0-51.17803 51.17803v491.309091a51.17803 51.17803 0 0 0 102.356061 0v-491.309091a51.321329 51.321329 0 0 0-51.178031-51.17803zM758.511088 352.544243l-181.907191 18.669745-132.059789 186.820282a23.603308 23.603308 0 0 1-32.753939 5.629583 23.603308 23.603308 0 0 1-5.629584-32.753939l135.744608-192.040441a1641.054248 1641.054248 0 0 0 80.124324-160.330533c5.527227-12.610267 14.984927-35.415197 14.329848-65.507879-0.143298-6.530317-0.634608-28.966765-10.235606-49.130909-22.190794-46.592479-86.388515-67.247932-137.157121-63.460758-7.308223 0.552723-80.697518 7.062568-112.591666 61.413636-22.866344 38.895303-9.089218 76.480448-8.188485 112.591667 1.432985 57.196567-28.782524 137.505132-167.331688 239.103758a70.809923 70.809923 0 0 0-41.474676 64.443375v475.218718a70.789452 70.789452 0 0 0 70.789452 70.789452h530.593346a240.188732 240.188732 0 0 0 238.591978-212.552595l22.272679-192.265625c17.666656-152.531001-110.360305-282.257073-263.11649-266.637537z"
                p-id="13817" fill="#d5e3f3"></path>
            </svg>
            相关英雄推荐
          </h3>
        </div>
        <div>
          <div class="iconList">
            <ul>
                            <?php
                            $count = 0;
                            foreach($return['lolHeroList']['data'] as $key => $heroInfo)
                                { if($heroInfo['hero_id']!=$hero_id)
                            { $count++;if($count==15){break;}?>

              <li>
                <a href="<?php echo $config['site_url']; ?>/heroDetail/<?php echo $heroInfo['hero_id'];?>">
                  <img src="<?php echo $heroInfo['logo'];?>" />
                  <p><?php echo $heroInfo['hero_name'];?></p>
                </a>
              </li>
                <?php }}?>
            </ul>
          </div>
        </div>
      </div>

    </div>

  </div>

  <footer class="container footer">
    <div class="row">
      <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
        <div class="title">热门赛事</div>
        <ul>
            <?php
            foreach($return['tournament']['data'] as $tournamentInfo)
            {   ?>
                <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##"><?php echo $tournamentInfo['tournament_name'];?></a></li>
            <?php }?>
        </ul>
      </div>
      <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
        <div class="title">热门选手</div>
        <ul>
            <?php
            foreach($return['playerList']['data'] as $playerInfo)
            {
                ?>
                <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="<?php echo $config['site_url']; ?>/playerDetail/<?php echo $playerInfo['player_id'];?>"><?php echo $playerInfo['player_name'];?></a></li>
            <?php }?>
        </ul>
      </div>
      <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
        <div class="title">关于我们</div>
          <ul>
              <li class="col-md-12"><a href="<?php echo $return['defaultConfig']['data']['contact']['value']?>"><?php echo $return['defaultConfig']['data']['contact']['name']?></a></li>
              <li class="col-md-12"><a href="<?php echo $return['defaultConfig']['data']['sitemap']['value']?>"><?php echo $return['defaultConfig']['data']['sitemap']['name']?></a></li>
          </ul>
      </div>
    </div>
    <div class="row youlian">
      <div class="col-md-12">
        <div class="title">友情链接</div>
        <ul>
            <?php
            foreach($return['links']['data'] as $linksInfo)
            {   ?>
                <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a title = "<?php echo $linksInfo['name'];?>" href="<?php echo $linksInfo['url'];?>"><img src="<?php echo $linksInfo['logo'];?>" /></a></li>
            <?php }?>
        </ul>
      </div>
    </div>
  </footer>


  <script src="<?php echo $config['site_url']; ?>/js/jquery-1.11.0.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/js/swiper.min.js"></script>
  <script>
    $(function () {

        /*技能标签切换*/
        function tabs(tabTit, on, tabCon) {
            $(tabCon).each(function () {
                $(this).children().eq(0).show();

            });
            $(tabTit).each(function () {
                $(this).children().eq(0).addClass(on);
            });
            $(tabTit).children().mouseover(function () {
                $(this).addClass(on).siblings().removeClass(on);
                var index = $(tabTit).children().index(this);
                $(tabCon).children().eq(index).show().siblings().hide();
            });
        }
        tabs(".investment_title", "on", ".investment_con");

    })

    $(document).ready(function () {
        $("#gallery_output img").not(":first").hide();

        $("#gallery a").click(function () {
            $("#gallery a").removeClass('on');
            $(this).addClass("on");
            if ($("#" + this.rel).is(":hidden")) {
                $("#gallery_output img").slideUp(0);
                $("#" + this.rel).slideDown(0);
            }
        });
    });



    $(function () {
      // 皮肤标签切换
      var flag = true; //防止用户快速多次点击

      init(); //初始化
      //点击切换图片
      $(".moveimg").mousemove(function () {
        $(".moveimg").removeClass('active');
        $(this).addClass('active');
        var thisSrc = $(this).attr('src');
        $(".big-img img").attr('src', thisSrc);//获取点击图片的地址并赋值
        $(".big-img .img-parent").attr('style', '');//切换图片从正位开始
        $(".big-img .img-parent img").css('transform', 'scale(1)');
      });


      function init() {
        var numImg = $('.moveimg').length;
        $($('.moveimg')[0]).addClass('active'); //第一个给默认选中
        $(".big-img img").attr('src', $($('.moveimg')[0]).attr('src'));
      }

    });





    $(function () {

      /*资讯标签切换*/
      function tabs(tabTit, on, tabCon) {
        $(tabCon).each(function () {
          $(this).children().eq(0).show();

        });
        $(tabTit).each(function () {
          $(this).children().eq(0).addClass(on);
        });
        $(tabTit).children().click(function () {
          $(this).addClass(on).siblings().removeClass(on);
          var index = $(tabTit).children().index(this);
          $(tabCon).children().eq(index).show().siblings().hide();
        });
      }
      tabs(".heroMsg_title", "on", ".heroMsg_con");

    })





    var btn = document.getElementById('get_ct_more');
    var obj = document.getElementById('content');
    var total_height = obj.scrollHeight;//文章总高度
    var show_height = 220;//定义原始显示高度
    if (total_height > show_height) {
      btn.style.display = 'block';
      btn.onclick = function () {
        obj.style.height = total_height + 'px';
        btn.style.display = 'none';
      }
    }
  </script>
</body>

</html>