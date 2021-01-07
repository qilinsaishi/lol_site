<!DOCTYPE html>
<?php
require_once "function/web.php";
$team_id = $_GET['team_id']??0;
$data = [
    "totalTeamInfo"=>[$team_id],
    "totalTeamList"=>["page"=>1,"page_size"=>6,"game"=>$config['game'],"source"=>"cpseo","fields"=>'team_id,team_name,logo'],
    "tournament"=>["page"=>1,"page_size"=>8],
    "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8,"source"=>"cpseo","fields"=>'player_id,player_name,logo'],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"field"=>["name","key","value"]],
    "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6],
    "keywordMapList"=>["fields"=>"content_id","source_type"=>"team","source_id"=>$team_id,"page_size"=>100,"content_type"=>"information"]
];
$return = curl_post($url,json_encode($data),1);
if(count($return["keywordMapList"]['data'])>0)
{
    $data2 = [
        "informationList"=>["ids"=>array_column($return["keywordMapList"]['data'],"content_id"),"page_size"=>6,"fields"=>"id,title"]
    ];
    $return2 = curl_post($url,json_encode($data2),1);
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
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>战队介绍</title>
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/style.css" />
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

      <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="麒麟赛事" /></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.html">首页</a></li>
        <li><a href="hero-list.html">王者荣耀</a></li>
        <li><a href="teamInt.html">王者战队</a></li>
          <li class="active"><a href="playerList.php"><?php echo $config['game_name'];?>队员</a></li>
        <li><a href="hero-list.html">王者比赛</a></li>
        <li><a href="zixun-list.html">游戏资讯</a></li>
        <li><a href="#contact">游戏攻略</a></li>
        <li><a href="wenda-list.html">游戏问答</a></li>
      </ul>
    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</nav><!-- /.navbar -->

<div class="container margin120 teamMember">
  <div class="row teamLogo">

    <div class="col-lg-5 col-sm-4 col-md-5 col-xs-12 left">
      <img src="images/member.png" />
    </div>
    <div class="col-lg-7 col-sm-8 col-md-7 col-xs-12 right">
      <h1 class="top">支配</h1>

      <div>
        <ul>
          <li>
            名字：<span>澜澜</span>
          </li>
          <li>
            国籍：<span>中国</span>
          </li>
          <li>
            战队：<span>DYG</span>
          </li>
          <li>
            游戏id：<span>DYG.澜澜</span>
          </li>
        </ul>

        <p>
          QG的王牌中单Daigirl，擅长英雄不知火舞以及小乔，作为中路选手Daigirl的跑图能力很强，和打野位共同挤压对手的野区压制对手发育是他常用套路之一，团战中打出巨额AOE或秒掉对手关键人物是他一肩扛起的责任。
        </p>
      </div>

    </div>
  </div>

  <div class="row historyMatch">
    <div class="matchBox">
      <ul class="title">
        <li class="videoIcon">
          <svg></svg>
        </li>
        <li class="width178">赛事名称</li>
        <li class="width360">战队VS战队</li>
        <li>英雄</li>
        <li>结果</li>
        <li>KDA</li>
        <li>金钱</li>
      </ul>

      <div class="historyMatchBox">
        <ul>
          <li class="historyMatch-item">
            <div>
              <ul>
                <li class="videoIcon">
                  <svg t="1608307512114" class="icon" viewBox="0 0 1024 1024" version="1.1"
                       xmlns="http://www.w3.org/2000/svg" p-id="1224" width="48" height="48">
                    <path
                            d="M832 128 128 128C57.344 128 0 185.344 0 256l0 576c0 70.656 57.344 128 128 128l704 0c70.656 0 128-57.344 128-128L960 256C960 185.344 902.656 128 832 128zM688.448 571.84l-319.936 191.488c-5.12 3.008-10.816 4.544-16.512 4.544-5.44 0-10.88-1.344-15.744-4.16C326.208 758.08 320 747.456 320 735.936L320 352.96c0-11.52 6.208-22.08 16.256-27.776 9.984-5.696 22.4-5.504 32.256 0.384l319.936 191.488C698.112 522.816 704 533.248 704 544.448 704 555.712 698.112 566.08 688.448 571.84z"
                            p-id="1225" fill="#8193a9"></path>
                  </svg>
                </li>
                <li class="width178">2018KPL秋季赛</li>
                <li class="width360">
                  <div class="icon">
                    <div>
                      <span>FLY</span>
                      <img src="images/icon_2.png" />
                    </div>
                    <div class="vs">VS</div>
                    <div>
                      <img src="images/icon_2.png" />
                      <span>FLY</span>
                    </div>
                  </div>
                </li>
                <li class="heroPic">
                  <img src="images/icon_8.jpg" />
                </li>
                <li>
                  <span>输</span>
                </li>
                <li>3.5</li>
                <li>13026</li>
              </ul>
            </div>
          </li>
          <li class="historyMatch-item">
            <div>
              <ul>
                <li class="videoIcon">
                  <svg t="1608307512114" class="icon" viewBox="0 0 1024 1024" version="1.1"
                       xmlns="http://www.w3.org/2000/svg" p-id="1224" width="48" height="48">
                    <path
                            d="M832 128 128 128C57.344 128 0 185.344 0 256l0 576c0 70.656 57.344 128 128 128l704 0c70.656 0 128-57.344 128-128L960 256C960 185.344 902.656 128 832 128zM688.448 571.84l-319.936 191.488c-5.12 3.008-10.816 4.544-16.512 4.544-5.44 0-10.88-1.344-15.744-4.16C326.208 758.08 320 747.456 320 735.936L320 352.96c0-11.52 6.208-22.08 16.256-27.776 9.984-5.696 22.4-5.504 32.256 0.384l319.936 191.488C698.112 522.816 704 533.248 704 544.448 704 555.712 698.112 566.08 688.448 571.84z"
                            p-id="1225" fill="#8193a9"></path>
                  </svg>
                </li>
                <li class="width178">2018KPL秋季赛</li>
                <li class="width360">
                  <div class="icon">
                    <div>
                      <span>FLY</span>
                      <img src="images/icon_2.png" />
                    </div>
                    <div class="vs">VS</div>
                    <div>
                      <img src="images/icon_2.png" />
                      <span>FLY</span>
                    </div>
                  </div>
                </li>
                <li class="heroPic">
                  <img src="images/icon_8.jpg" />
                </li>
                <li>
                  <span>输</span>
                </li>
                <li>3.5</li>
                <li>13026</li>
              </ul>
            </div>
          </li>
          <li class="historyMatch-item">
            <div>
              <ul>
                <li class="videoIcon">
                  <svg t="1608307512114" class="icon" viewBox="0 0 1024 1024" version="1.1"
                       xmlns="http://www.w3.org/2000/svg" p-id="1224" width="48" height="48">
                    <path
                            d="M832 128 128 128C57.344 128 0 185.344 0 256l0 576c0 70.656 57.344 128 128 128l704 0c70.656 0 128-57.344 128-128L960 256C960 185.344 902.656 128 832 128zM688.448 571.84l-319.936 191.488c-5.12 3.008-10.816 4.544-16.512 4.544-5.44 0-10.88-1.344-15.744-4.16C326.208 758.08 320 747.456 320 735.936L320 352.96c0-11.52 6.208-22.08 16.256-27.776 9.984-5.696 22.4-5.504 32.256 0.384l319.936 191.488C698.112 522.816 704 533.248 704 544.448 704 555.712 698.112 566.08 688.448 571.84z"
                            p-id="1225" fill="#8193a9"></path>
                  </svg>
                </li>
                <li class="width178">2018KPL秋季赛</li>
                <li class="width360">
                  <div class="icon">
                    <div>
                      <span>FLY</span>
                      <img src="images/icon_2.png" />
                    </div>
                    <div class="vs">VS</div>
                    <div>
                      <img src="images/icon_2.png" />
                      <span>FLY</span>
                    </div>
                  </div>
                </li>
                <li class="heroPic">
                  <img src="images/icon_8.jpg" />
                </li>
                <li>
                  <span>输</span>
                </li>
                <li>3.5</li>
                <li>13026</li>
              </ul>
            </div>
          </li>

        </ul>
        <div style="clear: both;"></div>

      </div>
    </div>
  </div>
  <div class="scrllTips">向右滑动查看更多</div>
  <div class="row teamInformation">

    <div class="icon_title">
      <h3>
        <svg t="1607948885693" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
             p-id="1186" width="48" height="48">
          <path
                  d="M752 499.2C691.2 566.4 608 608 512 608s-179.2-41.6-240-108.8C185.6 569.6 128 678.4 128 800c0 105.6 86.4 192 192 192h384c105.6 0 192-86.4 192-192 0-121.6-57.6-230.4-144-300.8z"
                  fill="#d5e3f3" p-id="1187"></path>
          <path d="M512 288m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z" fill="#d5e3f3" p-id="1188"></path>
        </svg>
        战队资讯
      </h3>
    </div>
    <div class="col-lg-12 xg_team">
      <ul class="list_box">
        <li class="list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <div class="col-lg-10 col-sm-10 col-md-12 col-xs-12 left">
              <span class="newIcon">NEW</span>
              <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
            </div>
            <p class="right">2020-10-08 21:39</p>
          </a>
        </li>
        <li class="list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <div class="col-lg-10 col-sm-10 col-md-12 col-xs-12 left">
              <span class="newIcon">NEW</span>
              <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
            </div>
            <p class="right">2020-10-08 21:39</p>
          </a>
        </li>
        <li class="list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <div class="col-lg-10 col-sm-10 col-md-12 col-xs-12 left">
              <span class="videoIcon">视频</span>
              <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
            </div>
            <p class="right">2020-10-08 21:39</p>
          </a>
        </li>
        <li class="list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <div class="col-lg-10 col-sm-10 col-md-12 col-xs-12 left">
              <span class="videoIcon">视频</span>
              <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
            </div>
            <p class="right">2020-10-08 21:39</p>
          </a>
        </li>
        <li class="list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <div class="col-lg-10 col-sm-10 col-md-12 col-xs-12 left">
              <span class="videoIcon">视频</span>
              <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
            </div>
            <p class="right">2020-10-08 21:39</p>
          </a>
        </li>
        <div style="clear: both;"></div>
      </ul>
    </div>
  </div>
  <div class="row teamHistory">

    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 gameInt_zixun">
      <div class="icon_title">
        <h3>
          <svg t="1607948885693" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
               p-id="1186" width="48" height="48">
            <path
                    d="M752 499.2C691.2 566.4 608 608 512 608s-179.2-41.6-240-108.8C185.6 569.6 128 678.4 128 800c0 105.6 86.4 192 192 192h384c105.6 0 192-86.4 192-192 0-121.6-57.6-230.4-144-300.8z"
                    fill="#d5e3f3" p-id="1187"></path>
            <path d="M512 288m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z" fill="#d5e3f3" p-id="1188"></path>
          </svg>
          所属战队
        </h3>
      </div>
      <ul class="iconList">
        <li class="col-lg-4 col-sm-4 col-md-4 col-xs-6 list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <img src="images/icon_2.png" alt="img" />
            <p>2020</p>
          </a>
        </li>
        <li class="col-lg-4 col-sm-4 col-md-4 col-xs-6 list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <img src="images/icon_3.png" alt="img" />
            <p>2019</p>
          </a>
        </li>
        <li class="col-lg-4 col-sm-4 col-md-4 col-xs-6 list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <img src="images/icon_3.png" alt="img" />
            <p>2018</p>
          </a>
        </li>
        <div style="clear: both;"></div>
      </ul>
    </div>



    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 gameInt_team">
      <div class="icon_title">
        <h3>
          <svg t="1607948885693" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
               p-id="1186" width="48" height="48">
            <path
                    d="M752 499.2C691.2 566.4 608 608 512 608s-179.2-41.6-240-108.8C185.6 569.6 128 678.4 128 800c0 105.6 86.4 192 192 192h384c105.6 0 192-86.4 192-192 0-121.6-57.6-230.4-144-300.8z"
                    fill="#d5e3f3" p-id="1187"></path>
            <path d="M512 288m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z" fill="#d5e3f3" p-id="1188"></path>
          </svg>
          同队成员
        </h3>
      </div>
      <div>
        <ul class="zhanduiList_box">
          <li class="col-lg-3 col-sm-4 col-md-3 col-xs-6  list-item">
            <a href="##" title="凤凰战队" target="_blank">
              <img src="images/photo_1.png" alt="img" />
              <p>凤凰</p>
            </a>
          </li>
          <li class="col-lg-3 col-sm-4 col-md-3 col-xs-6 list-item">
            <a href="##" title="凤凰战队" target="_blank">
              <img src="images/photo_5.png" alt="img" />
              <p>凤凰</p>
            </a>
          </li>
          <li class="col-lg-3 col-sm-4 col-md-3 col-xs-6 list-item">
            <a href="##" title="凤凰战队" target="_blank">
              <img src="images/photo_1.png" alt="img" />
              <p>凤凰</p>
            </a>
          </li>
          <li class="col-lg-3 col-sm-4 col-md-3 col-xs-6 list-item">
            <a href="##" title="凤凰战队" target="_blank">
              <img src="images/photo_5.png" alt="img" />
              <p>凤凰</p>
            </a>
          </li>
          <li class="col-lg-3 col-sm-4 col-md-3 col-xs-6 list-item">
            <a href="##" title="凤凰战队" target="_blank">
              <img src="images/photo_2.png" alt="img" />
              <p>凤凰</p>
            </a>
          </li>
          <li class="col-lg-3 col-sm-4 col-md-3 col-xs-6 list-item">
            <a href="##" title="凤凰战队" target="_blank">
              <img src="images/photo_2.png" alt="img" />
              <p>凤凰</p>
            </a>
          </li>
          <li class="col-lg-3 col-sm-4 col-md-3 col-xs-6 list-item">
            <a href="##" title="凤凰战队" target="_blank">
              <img src="images/photo_3.png" alt="img" />
              <p>凤凰</p>
            </a>
          </li>
          <li class="col-lg-3 col-sm-4 col-md-3 col-xs-6 list-item">
            <a href="##" title="凤凰战队" target="_blank">
              <img src="images/photo_4.png" alt="img" />
              <p>凤凰</p>
            </a>
          </li>
          <div style="clear: both;"></div>
        </ul>

      </div>

    </div>
  </div>


  <div class="row xg_member">
    <div class="icon_title">
      <h3>
        <svg t="1607948885693" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
             p-id="1186" width="48" height="48">
          <path
                  d="M752 499.2C691.2 566.4 608 608 512 608s-179.2-41.6-240-108.8C185.6 569.6 128 678.4 128 800c0 105.6 86.4 192 192 192h384c105.6 0 192-86.4 192-192 0-121.6-57.6-230.4-144-300.8z"
                  fill="#d5e3f3" p-id="1187"></path>
          <path d="M512 288m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z" fill="#d5e3f3" p-id="1188"></path>
        </svg>
        相关队员推荐
      </h3>
    </div>
    <div class="col-xs-12">
      <ul class="iconList">
        <li class="col-lg-2 col-sm-3 col-md-2 col-xs-6  list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <img src="images/photo_1.png" alt="img" />
            <p>凤凰</p>
          </a>
        </li>
        <li class="col-lg-2 col-sm-3 col-md-2 col-xs-6 list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <img src="images/photo_5.png" alt="img" />
            <p>凤凰</p>
          </a>
        </li>
        <li class="col-lg-2 col-sm-3 col-md-2 col-xs-6 list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <img src="images/photo_1.png" alt="img" />
            <p>凤凰</p>
          </a>
        </li>
        <li class="col-lg-2 col-sm-3 col-md-2 col-xs-6 list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <img src="images/photo_5.png" alt="img" />
            <p>凤凰</p>
          </a>
        </li>
        <li class="col-lg-2 col-sm-3 col-md-2 col-xs-6 list-item">
          <a href="##" title="凤凰战队" target="_blank">
            <img src="images/photo_2.png" alt="img" />
            <p>凤凰</p>
          </a>
        </li>
        <div style="clear: both;"></div>
      </ul>

    </div>
    <div style="clear: both;"></div>
  </div>

</div>

<footer class="container footer">
  <div class="row">
    <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
      <div class="title">热门赛事</div>
      <ul>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
      </ul>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
      <div class="title">热门选手</div>
      <ul>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">fewioj</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">ewrfwerf221</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">132e4rfqe35wtf</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">fewioj</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">ewrfwerf221</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">132e4rfqe35wtf</a></li>
      </ul>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
      <div class="title">关于我们</div>
      <ul>
        <li class="col-md-12"><a href="##">联系我们</a></li>
        <li class="col-md-12"><a href="##">站点地图</a></li>
      </ul>
    </div>
  </div>
  <div class="row youlian">
    <div class="col-md-12">
      <div class="title">友情链接</div>
      <ul>
        <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
        <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
        <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
        <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
        <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
        <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
      </ul>
    </div>
  </div>
</footer>



<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>