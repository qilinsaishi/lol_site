<!DOCTYPE html>
<?php
require_once "function/web.php";
$data = [
    "matchList"=>["page"=>1,"page_size"=>9],
    "teamList"=>["page"=>1,"page_size"=>7],
    "tournament"=>["page"=>1,"page_size"=>8],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"field"=>["name","key","value"]],
    "links"=>["game"=>"lol","page"=>1,"page_size"=>6],
    "playerList"=>["game"=>"lol","page"=>1,"page_size"=>8],
];
$return = curl_post($url,json_encode($data),1);
?>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
    <title><?php echo $config['game_name'];?>-战队介绍</title>
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

        <a class="navbar-brand" href="##"><img src="images/logo.png" alt="image" /></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">首页</a></li>
          <li><a href="hero-list.php"><?php echo $config['game_name'];?></a></li>
          <li class="active"><a href="teamInt.php"><?php echo $config['game_name'];?>战队</a></li>
          <li><a href="hero-list.php"><?php echo $config['game_name'];?>比赛</a></li>
          <li><a href="zixun-list.php">游戏资讯</a></li>
          <li><a href="#contact">游戏攻略</a></li>
          <li><a href="wenda-list.php">游戏问答</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">
    <div class="row teamLogo">

      <div class="col-lg-3 col-sm-4 col-md-3 col-xs-12 left">
        <img src="images/icon_2.png" />
      </div>
      <div class="col-lg-9 col-sm-8 col-md-9 col-xs-12 right">
        <h1 class="top">佛山GK</h1>

        <div>
          <p>
            2020王者荣耀甲级职业简称KPLGT）和王者荣耀全的稳定健康发展。KGL全年分春季赛和秋季赛两个赛季，每个赛季分常规赛（分组定级赛、分层天梯赛第一轮、抢位赛、分层天梯赛第二轮）、季后赛及总决赛三部分。
          </p>
          <p>
            2020王者荣耀甲级职业联）、季后赛及总决赛三部分。
          </p>
        </div>

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
            战队发展历程
          </h3>
        </div>
        <div class="cont">
          <p>夏洛特是日落海久负盛名的贵族家族中，最为优秀的继承者。 </p>
          <p>她以精湛无匹的剑术，在过往所有贵族间的战斗中，毫无悬念地赢取胜利，并将火焰样的红玫瑰留给败者，作为优雅的结束礼。 </p>
          <p>
            她无比珍视家族先辈们建立的荣誉，他们曾凭借卓绝勇气和毅力，从骇浪惊涛中开辟出今日的领地，又在无数次城邦之间错综复杂的争斗、海盗侵扰沿海地区的战斗中，积累了属于家族的世代荣光。<br> </p>
          <p>夏洛特是日落海久负盛名的贵族家族中，最为优秀的继承者。 </p>
          <p>夏洛特是日落海久负盛名的贵族家族中，最为优秀的继承者。 </p>
          <p>夏洛特是日落海久负盛名的贵族家族中，最为优秀的继承者。 </p>
        </div>
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
            战队成员
          </h3>
        </div>
        <div>
          <ul class="zhanduiList_box">
              <?php
              foreach($return['playerList']['data'] as $playerInfo)
              {
              ?>
            <li class="col-lg-3 col-sm-6 col-md-4 col-xs-6  list-item">
              <a href="##" title="<?php echo $playerInfo['player_name']?>" target="_blank">
                <img src="<?php echo $playerInfo['logo']?>" alt="img" />
                <p><?php echo $playerInfo['player_name']?></p>
              </a>
            </li>
              <?php }?>
            <div style="clear: both;"></div>
          </ul>

        </div>

      </div>
    </div>
    <div class="row teamEvents">
      <div class="col-lg-12 newlist ">
        <div class="icon_title">
          <h3>
            <svg t="1607948885693" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
              p-id="1186" width="48" height="48">
              <path
                d="M752 499.2C691.2 566.4 608 608 512 608s-179.2-41.6-240-108.8C185.6 569.6 128 678.4 128 800c0 105.6 86.4 192 192 192h384c105.6 0 192-86.4 192-192 0-121.6-57.6-230.4-144-300.8z"
                fill="#d5e3f3" p-id="1187"></path>
              <path d="M512 288m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z" fill="#d5e3f3" p-id="1188"></path>
            </svg>
            战队赛事信息
          </h3>
        </div>

        <ul>
          <li>
              <?php
              foreach($return['matchList']['data'] as $matchInfo)
              {   ?>
            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 newlist-item">
                <a href="details.php" title="<?php echo $matchInfo['home_team_info']['team_name'];?> VS <?php echo $matchInfo['away_team_info']['team_name'];?>" target="_blank">
                <span>2020年10月3日</span>
                <div class="icon">
                  <div>
                    <span><?php echo $matchInfo['home_team_info']['team_name'];?></span>
                    <img src="<?php echo $matchInfo['home_team_info']['logo'];?>" />
                  </div>
                  <div class="vs">VS</div>
                  <div>
                    <img src="<?php echo $matchInfo['away_team_info']['logo'];?>" />
                    <span><?php echo $matchInfo['away_team_info']['team_name'];?></span>
                  </div>
                </div>
              </a>
            </div>
              <?php }?>
            <div style="clear: both;"></div>
          </li>

        </ul>
      </div>

    </div>

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
    <div class="row xg_team">
      <div class="icon_title">
        <h3>
          <svg t="1607948885693" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
            p-id="1186" width="48" height="48">
            <path
              d="M752 499.2C691.2 566.4 608 608 512 608s-179.2-41.6-240-108.8C185.6 569.6 128 678.4 128 800c0 105.6 86.4 192 192 192h384c105.6 0 192-86.4 192-192 0-121.6-57.6-230.4-144-300.8z"
              fill="#d5e3f3" p-id="1187"></path>
            <path d="M512 288m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z" fill="#d5e3f3" p-id="1188"></path>
          </svg>
          相关战队推荐
        </h3>
      </div>
      <div class="col-xs-12">
        <ul class="iconList">


            <?php
            foreach($return['teamList']['data'] as $teamInfo)
            {   ?>
                <li class="list-item">
                    <a href="##" title="<?php echo $teamInfo['team_name'];?>" target="_blank">
                        <img src="<?php echo $teamInfo['logo'];?>" alt="img" />
                    </a>
                </li>
            <?php }?>
        </ul>
        <div style="clear: both;"></div>
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
                <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##"><?php echo $playerInfo['player_name'];?></a></li>
            <?php }?>
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
            <?php
            foreach($return['links']['data'] as $linksInfo)
            {   ?>
          <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a title = "<?php echo $linksInfo['name'];?>" href="<?php echo $linksInfo['url'];?>"><img src="<?php echo $linksInfo['logo'];?>" /></a></li>
            <?php }?>
        </ul>
      </div>
    </div>
  </footer>



  <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>