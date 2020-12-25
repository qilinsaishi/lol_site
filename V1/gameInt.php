<!DOCTYPE html>
<?php
require_once "function/web.php";
$data = [
    "matchList"=>["page"=>1,"page_size"=>9],
    "teamList"=>["page"=>1,"page_size"=>8],
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
  <meta name="description" content="这是一个信息很完整的<?php echo $config['game_name'];?>游戏资讯站">
  <meta name="keywords" content="<?php echo $config['game_name'];?>">
  <title><?php echo $config['game_name'];?>-游戏介绍</title>
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet"  href="css/font-awesome-4.7.0/css/font-awesome.min.css">
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
          <li  class="active"><a href="gameInt"><?php echo $config['game_name'];?></a></li>
          <li><a href="teamInt.php"><?php echo $config['game_name'];?>战队</a></li>
            <li><a href="hero-list.php">英雄介绍</a></li>
          <li><a href="zixun-list.php">游戏资讯</a></li>
          <li><a href="#contact">游戏攻略</a></li>
          <li><a href="wenda-list.php">游戏问答</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">

    <div class="row">
      <div class="col-md-12 titleBtn">
        <a href="##">英雄列表</a>
        <a class="active" href="##">游戏介绍</a>
      </div>

      <div class="gameInt">
        <div class="col-lg-6 col-md-6 col-xs-12 left">
          <img src="https://ossweb-img.qq.com/upload/webplat/info/yxzj/20190318/49656773132138.jpg" />
        </div>
  
  
  
        <div class="col-lg-6 col-md-6 col-xs-12 right">
          <h2>游戏介绍</h2>
          <p>《王者荣耀》是腾讯第一5V5团队公平竞技手游，国民MOBA手游大作！5V5王者峡谷、公平对战、还原MOBA经典体验；契约之战、五军对决、边境突围等，带来花式作战乐趣！10秒实时跨区匹配，与好友开黑上分，向最强王者进击！多款英雄任凭选择，一血、五杀、超神，实力碾压，收割全场！敌军即将到达战场，王者召唤师快来集结好友，准备团战，就在《王者荣耀》！</p>
  
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 gameInt_zixun margin0">
        <div class="title">
          <h3>
            <i class="fa fa-trophy" aria-hidden="true"></i>
            游戏资讯
          </h3>
        </div>
        <div>
          <ul class="list_box">
            <li class="list-item">
              <a href="##" title="凤凰战队" target="_blank">
                <span>视频</span>
                <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
              </a>
            </li>
            <li class="list-item">
              <a href="##" title="凤凰战队" target="_blank">
                <span>视频</span>
                <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
              </a>
            </li>
            <li class="list-item">
              <a href="##" title="凤凰战队" target="_blank">
                <span>视频</span>
                <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
              </a>
            </li>
            <li class="list-item">
              <a href="##" title="凤凰战队" target="_blank">
                <span>视频</span>
                <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
              </a>
            </li>
            <li class="list-item">
              <a href="##" title="凤凰战队" target="_blank">
                <span>视频</span>
                <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
              </a>
            </li>
            <li class="list-item">
              <a href="##" title="凤凰战队" target="_blank">
                <span>视频</span>
                <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
              </a>
            </li>
            <li class="list-item">
              <a href="##" title="凤凰战队" target="_blank">
                <span>视频</span>
                <p>热议：娱乐还是实用？卢锡安带偷钱天赋收益高吗？</p>
              </a>
            </li>

            <div style="clear: both;"></div>
          </ul>
        </div>
      </div>



      <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 gameInt_team">
          <div class="title">
            <h3>
              <i class="fa fa-trophy" aria-hidden="true"></i>
              战队列表
            </h3>
          </div>
          <div>
            <ul class="zhanduiList_box">
                <?php
                foreach($return['teamList']['data'] as $teamInfo)
                {   ?>
                <li class="col-lg-3 col-sm-3 col-md-3 col-xs-6  list-item">
                <a href="##" title="<?php echo $teamInfo['team_name'];?>" target="_blank">
                  <img src="<?php echo $teamInfo['logo'];?>" alt="img" />
                  <p><?php echo $teamInfo['team_name'];?></p>
                </a>
              </li>
                <?php }?>
              <div style="clear: both;"></div>
            </ul>
            
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
                <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##"><?php echo $playerInfo['player_name'];?></a></li>
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