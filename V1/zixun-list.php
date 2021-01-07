<!DOCTYPE html>
<?php
require_once "function/init.php";
$info['page']['page_size'] = 8;
$info['type'] = $_GET['type']??"info";
$page = $_GET['page']??1;
$data = [
    "matchList"=>["page"=>1,"page_size"=>9],
    "teamList"=>["page"=>1,"page_size"=>6],
    "tournament"=>["page"=>1,"page_size"=>8],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"field"=>["name","key","value"]],
    "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6],
    "playerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8],
    "informationList"=>["game"=>$config['game'],"page"=>$page,"page_size"=>$info['page']['page_size'],"type"=>$info['type']=="info"?"1,2,3,5":"4","fields"=>"*"],
];
$return = curl_post($url,json_encode($data),1);
$info['page']['total_count'] = $return['informationList']['count'];
$info['page']['total_page'] = intval($return['informationList']['count']/$info['page']['page_size']);
?>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title><?php echo $config['game_name'];?>-<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>列表</title>
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
            <?php
            $type = $info['type']=="info" ?"info":"stra";
            generateNav($config, $type);
            ?>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">

    <div class="row">

      <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 zixun_list_box">
        <div>
          <ul class="m-listbox">

              <?php foreach($return['informationList']['data'] as $key => $value) {?>
                  <li>
                      <a href="detail.php?id=<?php echo $value['id'];?>">
                          <div class="left">
                              <img src="<?php echo $value['logo'];?>" alt="<?php echo $value['title'];?>">
                          </div>
                          <div class="right">
                              <h2><?php echo $value['title'];?></h2>
                              <p><?php   //     $value['content'] = preg_replace("/<([a-zA-Z]+)[^>]*>/","<\\1>",$value['content']);
                                    $value['content'] = strip_tags($value['content']);
                                  echo (mb_str_split($value['content'],300));
                                  ?></p>
                              <div class="more"><span class="more_btn">More</span> <span><?php echo substr((($value["type"]==2)?$value['site_time']:$value['create_time']),0,10);?></span> </div>
                          </div>
                      </a>
                  </li>
              <?php }?>
          </ul>
          
        </div>
        <div class="page">
          <ul class="pagination">
              <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,"zixun-list.php?type=".$info['type']); ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 ">
        <div class="saishi">
          <div class="titleBox">
            <h3>热门赛事</h3>
            <a href="##">更多</a>
          </div>
          <div class="col-xs-24">
            <ul class="saishiList_box">
                <?php
                $i = 1;
                foreach($return['tournament']['data'] as $tournamentInfo)
                {   if($i<=3){?>
                    <li class="list-item">
                        <a href="##" title="<?php echo $tournamentInfo['tournament_name'];?>" target="_blank"><?php echo $tournamentInfo['tournament_name'];?></a>
                    </li>
                    <?php $i++;}}?>
            </ul>
          </div>
        </div>
        <div class="saishi">
          <div class="titleBox">
            <h3>热门战队</h3>
            <a href="teamList.php">更多</a>
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