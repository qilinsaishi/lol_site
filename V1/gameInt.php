<!DOCTYPE html>
<?php
require_once "function/init.php";
$data = [
    "matchList"=>["page"=>1,"page_size"=>9],
    "totalTeamList"=>["page"=>1,"page_size"=>8,"game"=>$config['game'],"source"=>"scoregg","rand"=>1,"fields"=>'team_id,team_name,logo',"cacheWith"=>"currentPage","cache_time"=>86400*7],
    //"totalTeamList"=>["page"=>1,"page_size"=>8,"game"=>$config['game'],"source"=>$config['source'],"fields"=>'team_id,team_name,logo,team_history',"rand"=>1,"cacheWith"=>"currentPage"],
    "tournament"=>["page"=>1,"page_size"=>8],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8,"source"=>"scoregg","fields"=>'player_id,position,player_name,logo,team_id',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    //"totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8,"source"=>$config['source'],"fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>7,"type"=>"1,2,3,5"],
    "gameConfig"=>$config['game'],
    "currentPage"=>["name"=>"gameInt","site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);

?>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title><?php echo $config['game_name'];?>-游戏介绍</title>
    <meta name="description" content="这是一个信息很完整的<?php echo $config['game_name'];?>游戏资讯站">
  <meta name="keywords" content="<?php echo $config['game_name'];?>">
    <?php renderHeaderJsCss($config);?>
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
            <?php generateNav($config,"game");?>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">

    <div class="row">
      <div class="gameInt">
        <div class="col-lg-6 col-md-6 col-xs-12 left">
          <img src="<?php echo $return['gameConfig']['data']['logo'];?>" />
        </div>
  
  
  
        <div class="col-lg-6 col-md-6 col-xs-12 right">
          <h2>游戏介绍</h2>
            <p><?php echo $return['gameConfig']['data']['content'];?></p>
  
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

              <?php foreach($return['informationList']['data'] as $key => $value) {?>
                  <li class="list-item">
                      <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank">
                          <p><?php echo $value['title'];?></p>
                      </a>
                  </li>
              <?php }?>
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
                foreach($return['totalTeamList']['data'] as $teamInfo)
                {   ?>
                <li class="col-lg-3 col-sm-3 col-md-3 col-xs-6  list-item">
                <a href="<?php echo $config['site_url']; ?>/teamdetail/<?php echo $teamInfo['team_id'];?>" title="<?php echo $teamInfo['team_name'];?>" target="_blank">
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
            foreach($return['totalPlayerList']['data'] as $playerInfo)
            {
                ?>
                <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="<?php echo $config['site_url']; ?>/playerdetail/<?php echo $playerInfo['player_id'];?>"><?php echo $playerInfo['player_name'];?></a></li>
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
        <?php renderCertification();?>
    </div>
  </footer>


  <?php renderFooterJsCss($config);?>
</body>

</html>