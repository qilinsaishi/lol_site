<!DOCTYPE html>
<?php
require_once "function/init.php";
$reset = $_GET['reset']??0;
$info['page']['page_size'] = 18;
$info['type'] = $_GET['type']??"info";
$page = $_GET['page']??1;
if($page==''){
	$page=1;
}
$zxtype=($info['type']!="info")?"/strategylist":"/newslist";
$data = [
    "matchList"=>["page"=>1,"page_size"=>9,"game"=>$config['game'],"source"=>"scoregg"],
    "totalTeamList"=>["page"=>1,"page_size"=>6,"game"=>$config['game'],"source"=>"scoregg","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "tournamentList"=>["page"=>1,"page_size"=>8,"game"=>$config['game'],"source"=>"scoregg","rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_information_img"],"fields"=>["name","key","value"]],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>9,"source"=>"scoregg","fields"=>'player_id,position,player_name,logo,team_id',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "informationList"=>["site"=>$config['site_id'],"page"=>$page,"page_size"=>$info['page']['page_size'],"type"=>$info['type']=="info"?"1,2,3,5,6,7":"4","fields"=>"id,game,title,type,site_time,create_time,content,logo","reset"=>intval($reset)],
    "currentPage"=>["name"=>"infoList","type"=>$zxtype,"page"=>$page,"page_size"=>$info['page']['page_size'],"site_id"=>$config['site_id']]
];

$return = curl_post($config['api_get'],json_encode($data),1);
if(count($return["informationList"]['data'])==0)
{
    render404($config);
}
$info['page']['total_count'] = $return['informationList']['count'];
$info['page']['total_page'] = intval($return['informationList']['count']/$info['page']['page_size']);
if($reset>0)
{
	print_r(array_column($return["informationList"]['data'],"id"));
    echo "refreshed";
    die();
}
?>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title><?php echo $config['game_name'];?>最新<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>_<?php echo $config['game_name'];?>电竞头条-<?php echo $config['site_name'];?></title>
    <?php if($info['type']=="info"){?>
    <meta name="description" content="<?php echo $config['site_name'];?>提供<?php echo $config['game_name'];?>最新<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>，了解<?php echo $config['game_name'];?>电子竞技头条<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>，尽在<?php echo $config['site_name'];?>。">
    <?php }else{?>
    <meta name="description" content="<?php echo $config['site_name'];?>提供<?php echo $config['game_name'];?>游戏攻略，众多大神玩家为您介绍最新版本下<?php echo $config['game_name'];?>新玩法。">
    <?php }?>
    <meta name="Keywords" Content="<?php echo $config['game_name'];?>最新<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>,<?php echo $config['game_name'];?>电竞<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>">
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
            <?php
            $type = $info['type']=="info" ?"info":"stra";
            generateNav($config, $type);
            ?>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">
      <div class="row heroList">
          <div class="col-md-12">
              <ol class="breadcrumb">
              <li><a href="<?php echo $config['site_url'];?>">首页</a></li>
              <li><a href="<?php echo $config['site_url']; ?><?php echo ($info['type']!="info")?"/strategylist/":"/newslist/";?>"><?php echo $config['game_name'];?><?php echo ($info['type']!="info")?"攻略":"资讯";?></a></li>
          </ol>
    <div class="row">

      <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 zixun_list_box">
        <div>
          <ul class="m-listbox">

              <?php foreach($return['informationList']['data'] as $key => $value) {?>
                  <li>
                      <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>">
                          <div class="left">
                              <img data-original="<?php echo $value['logo'];?>" src="<?php echo $return['defaultConfig']['data']['default_information_img']['value'];?>" alt="<?php echo $value['title'];?>" class="imgauto">
                          </div>
                          <div class="right">
                              <h2><?php echo $value['title'];?></h2>
                              <p><?php
                                  echo html_entity_decode($value['content']);
                                  ?></p>
                              <div class="more"><span class="more_btn">More</span> <span><?php echo substr($value['create_time'],0,10);?></span> </div>
                          </div>
                      </a>
                  </li>
              <?php }?>
          </ul>
          
        </div>
        <div class="page">
          <ul class="pagination">
              <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$zxtype); ?>
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
                foreach($return['tournamentList']['data'] as $tournamentInfo)
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
            <a href="<?php echo $config['site_url']; ?>/teamlist/">更多</a>
          </div>
          <div class="col-xs-24">
            <ul class="zhanduiList_box text-center">
                <?php
                foreach($return['totalTeamList']['data'] as $teamInfo)
                {   ?>
                    <li class="list-item col-lg-4 col-sm-2 col-md-4 col-xs-4">
                        <a href="<?php echo $config['site_url']; ?>/teamdetail/<?php echo $teamInfo['team_id'];?>" title="<?php echo $teamInfo['team_name'];?>" target="_blank">
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
            <a href="<?php echo $config['site_url']; ?>/playerlist/">更多</a>
          </div>
          <div class="col-xs-24">
            <ul class="zhanduiList_box  text-center">
                <?php
                foreach($return['totalPlayerList']['data'] as $playerInfo)
                {   ?>
                    <li class="list-item col-lg-4 col-sm-2 col-md-4 col-xs-4">
                        <a href="<?php echo $config['site_url']; ?>/playerdetail/<?php echo $playerInfo['player_id'];?>" title="<?php echo $playerInfo['player_name'];?>" target="_blank">
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

  </div>

  </div>

  <footer class="container footer">
    <div class="row">
      <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
        <div class="title">热门赛事</div>
        <ul>
            <?php
            foreach($return['tournamentList']['data'] as $tournamentInfo)
            {   ?>
                <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##"><?php echo $tournamentInfo['tournament_name'];?></a></li>
            <?php }?>
        </ul>
      </div>
      <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
        <div class="title">热门选手</div>
        <ul>
            <?php
                $i = 1;
            foreach($return['totalPlayerList']['data'] as $playerInfo)
            {
                if($i<=8){?>
                <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="<?php echo $config['site_url']; ?>/playerdetail/<?php echo $playerInfo['player_id'];?>"><?php echo $playerInfo['player_name'];?></a></li>
            <?php $i++;}}?>
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