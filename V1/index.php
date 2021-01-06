<!DOCTYPE html>
<?php
require_once "function/web.php";
$data = [
        "matchList"=>["page"=>1,"page_size"=>9],
        "totalTeamList"=>["page"=>1,"page_size"=>6,"game"=>$config['game'],"source"=>"cpseo","fields"=>'team_id,team_name,logo'],
        "tournament"=>["page"=>1,"page_size"=>8],
        "defaultConfig"=>["keys"=>["contact","sitemap"],"field"=>["name","key","value"]],
        "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6],
        "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8,"source"=>"cpseo","fields"=>'player_id,player_name,logo'],
        "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"1,2,3,5"],
];
$return = curl_post($url,json_encode($data),1);

$data2 = [
    "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"4"],
];
$return2 = curl_post($url,json_encode($data2),1);
?>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>首页</title>
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
          <li class="active"><a href="index.php">首页</a></li>
          <li><a href="gameInt.php"><?php echo $config['game_name'];?></a></li>
          <li><a href="teamList.php"><?php echo $config['game_name'];?>战队</a></li>
          <li><a href="hero-list.php">英雄介绍</a></li>
          <li><a href="zixun-list.php">游戏资讯</a></li>
          <li><a href="zixun-list.php?type=strategy">游戏攻略</a></li>
          <li><a href="wenda-list.php">游戏问答</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="indexBanner">
    <img src="images/banner.png" />
  </div>
  <div class="container">
    
    <div class="row">
      <div class="col-lg-12 newlist ">
        <h2 class="bigTitle"><?php echo $config['game_name'];?>最新赛事</h2>
        <ul>
            <?php
                foreach($return['matchList']['data'] as $matchInfo)
                {   ?>
            <li class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <a href="##" title="<?php echo $matchInfo['home_team_info']['team_name'];?> VS <?php echo $matchInfo['away_team_info']['team_name'];?>" target="_blank">
              <span><?php echo date("Y年m月d日",strtotime($matchInfo['start_time']));?></span>
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
          </li>
            <?php }?>
        </ul>
        <div style="clear: both;"></div>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 newMsg">
        <div>
          <h2 class="bigTitle"><?php echo $config['game_name'];?>最新资讯</h2>
          <ul>
                <?php foreach($return['informationList']['data'] as $key => $value) {?>
              <li>
              <a href="detail.php?id=<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank">
                <div>
                  <img src="<?php echo $value['logo'];?>" />
                  <p><?php echo $value['title'];?></p>
                </div>
                <span><?php echo substr((($value["type"]==2)?$value['site_time']:$value['create_time']),0,10);?></span>
              </a>
            </li>
              <?php }?>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 hotTame">
        <div>
          <h2 class="bigTitle"><?php echo $config['game_name'];?>热门战队</h2>
          <ul>
              <?php
              foreach($return['totalTeamList']['data'] as $teamInfo)
              {   ?>
            <li>
              <a href="teamDetail.php?team_id=<?php echo $teamInfo['team_id'];?>" title="<?php echo $teamInfo['team_name'];?>" target="_blank">
                <div class="pic">
                  <img src="<?php echo $teamInfo['logo'];?>" />
                </div>
                <p><?php echo $teamInfo['team_name'];?></p>
              </a>
            </li>
              <?php }?>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-lg-12 GameGl newMsg">
        <div>
          <h2 class="bigTitle"><?php echo $config['game_name'];?>游戏攻略</h2>
          <ul>
              <?php foreach($return2['informationList']['data'] as $key => $value) {?>
                  <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <a href="detail.php?id=<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank">
                          <div>
                              <img src="<?php echo $value['logo'];?>" />
                              <p><?php echo $value['title'];?></p>
                          </div>
                          <span><?php echo substr($value['create_time'],0,10);?></span>
                      </a>
                  </li>
              <?php }?>


          </ul>
          <div style="clear: both;"></div>
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
            foreach($return['totalPlayerList']['data'] as $playerInfo)
            {
                ?>
                <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="player_detail?player_id=<?php echo $playerInfo['player_id'];?>"><?php echo $playerInfo['player_name'];?></a></li>
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


  <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>