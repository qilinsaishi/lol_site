<!DOCTYPE html>
<?php
require_once "function/web.php";
require_once "function/common.php";
$info['page']['page_size'] = 3;
$id = $_GET['id']??1;
$data = [
    "information"=>[$id],
    "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6],
    "tournament"=>["page"=>1,"page_size"=>8],
    "teamList"=>["page"=>1,"page_size"=>3],
    "playerList"=>["page"=>1,"page_size"=>9],

];
$return = curl_post($url,json_encode($data),1);
$data2 = [
    "informationList"=>["game"=>$config['game'],"author_id"=>$return['information']['data']['author_id'],"page"=>1,"page_size"=>$info['page']['page_size'],
        "type"=>$return['information']['data']['type']==2?"2":"1,2,3,5","fields"=>"id,title"],
];
$data3 = [
    "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>$info['page']['page_size']+1,
        "type"=>$return['information']['data']['type']==2?"2":"1,2,3,5","fields"=>"id,title"],
];

$return2 = curl_post($url,json_encode($data2),1);
$return3 = curl_post($url,json_encode($data3),1);

?>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title><?php echo $config['game_name']."-".$return['information']['data']['title'];?></title>
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
          <li><a href="gameInt.php">王者荣耀</a></li>
          <li><a href="teamInt.php">王者战队</a></li>
          <li><a href="hero-list.php">王者比赛</a></li>
          <li class="active"><a href="zixun-list.php">游戏资讯</a></li>
          <li><a href="#contact">游戏攻略</a></li>
          <li><a href="wenda-list.php">游戏问答</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">

    <div class="row">

      <div class="col-md-8">
          <ol class="breadcrumb">
              <li><a href="index.php">首页</a></li>
              <li><a href="zixun-list.php"><?php echo ($return['information']['data']['type']==4)?"攻略":"资讯";?></a></li>
          </ol>
        <div class="show_cont">

          <h1 class="show_cont_title">
            <span style="font-size: 22px;line-height: 30px"><?php echo $return['information']['data']['title'];?></span>
          </h1>


          <div class="show_txt">
              <?php echo $return['information']['data']['content'];?>
          </div>




          <br>

          <div class="xgTag">
            <ul class="col-lg-8 col-sm-8 col-md-12 col-xs-12">
             <!-- <li><a href="##">赛事</a></li>
              <li><a href="##">KPL</a></li>
              <li><a href="##">高校生</a></li>  -->
            </ul>
            <div class="col-lg-4 col-sm-4 col-md-12 col-xs-12 time">
                <?php echo ($return['information']['data']['type']==2)?$return['information']['data']['site_time']:$return['information']['data']['create_time'];?>
            </div>
            <div style="clear: both;"></div>
          </div>

        </div>
        <!--Kf Opponents Outer End-->
      </div>



      <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 ">
        <div class="saishi">
          <div class="titleBox">
            <h3>热门赛事</h3>
            <a href="##">更多</a>
          </div>
          <div class="col-xs-24">
            <ul class="saishiList_box">
              <li class="list-item">
                  <?php
                  $i = 1;
                  foreach($return['tournament']['data'] as $tournamentInfo)
                  {   if($i<=3){?>

                      <a href="##" title="<?php echo $tournamentInfo['tournament_name'];?>" target="_blank"><?php echo $tournamentInfo['tournament_name'];?></a>
                <?php $i++;}}?>
              </li>
            </ul>
          </div>
        </div>
        <div class="saishi">
          <div class="titleBox">
            <h3>热门战队</h3>
            <a href="##">更多</a>
          </div>
          <div class="col-xs-24">
            <ul class="zhanduiList_box text-center">
                <?php
                foreach($return['teamList']['data'] as $teamInfo)
                {   ?>
                    <li class="list-item col-lg-4 col-sm-2 col-md-4 col-xs-4">
                        <a href="##" title="<?php echo $teamInfo['team_name'];?>" target="_blank">
                            <img src="<?php echo $teamInfo['logo'];?>" alt="<?php echo $teamInfo['title'];?>" />
                        </a>
                    </li>
                <?php }?>
            </ul>
            <div style="clear: both;"></div>
          </div>
        </div>
        <div class="saishi">
          <div class="titleBox">
            <h3>明星队员</h3>
            <a href="##">更多</a>
          </div>
          <div class="col-xs-24">
            <ul class="zhanduiList_box  text-center">
                <?php
                foreach($return['playerList']['data'] as $playerInfo)
                {   ?>
                    <li class="list-item col-lg-4 col-sm-2 col-md-4 col-xs-4">
                        <a href="##" title="<?php echo $playerInfo['player_name'];?>" target="_blank">
                            <img src="<?php echo $playerInfo['logo'];?>" alt="<?php echo $playerInfo['player_name'];?>" />
                            <p><?php echo $playerInfo['player_name'];?></p>
                        </a>
                    </li>
                <?php }?>
            </ul>
            <div style="clear: both;"></div>
          </div>
        </div>
      </div>
    </div>

<div class="row">
  <div class="col-md-8 padding0">
    <div class="saishi">
      <div class="titleBox">
        <h3>相关文章推荐</h3>
      </div>
      <div class="col-xs-24">
        <ul class="saishiList_box">

            <?php foreach($return2['informationList']['data'] as $key => $value) {?>
                <li class="list-item">
                    <a href="detail.php?id=<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank"><?php echo $value['title'];?></a>
                </li>
            <?php }?>

        </ul>
      </div>
    </div>
    <div class="saishi">
      <div class="titleBox">
        <h3>最新资讯</h3>
      </div>
      <div class="col-xs-24">
        <ul class="saishiList_box">
            <?php foreach($return3['informationList']['data'] as $key => $value) {
                if($value['id']!=$id){?>
                <li class="list-item">
                    <a href="detail.php?id=<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank"><?php echo $value['title'];?></a>
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