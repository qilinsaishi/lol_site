<!DOCTYPE html>
<?php
require_once "function/init.php";
$tid = $_GET['tid']??0;
if($tid<=0)
{
    render404($config);
}
$data = [
    "intergratedTeam"=>[$tid],
    "intergratedTeamList"=>["page"=>1,"page_size"=>6,"game"=>$config['game'],"fields"=>'tid,team_name,logo',"except_team"=>$tid,"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "tournamentList"=>["page"=>1,"page_size"=>8,"game"=>$config['game'],"source"=>"scoregg","rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "totalPlayerList"=>["game"=>$config['game'],"source"=>"scoregg","page"=>1,"page_size"=>8,"source"=>"scoregg","fields"=>'player_id,position,player_name,logo,team_id',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img"],"fields"=>["name","key","value"]],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "currentPage"=>["name"=>"intergratedTeam","id"=>$tid,"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
if(!isset($return["intergratedTeam"]['data']['tid']) || $return["intergratedTeam"]['data']['game'] != $config['game'] )
{
    render404($config);
}
else
{
    $data3 = [
            "keywordMapList"=>["fields"=>"content_id","source_type"=>"team","source_id"=>$return["intergratedTeam"]['data']['intergrated_id_list'],"page_size"=>100,"content_type"=>"information","list"=>["page_size"=>5,"fields"=>"id,title,create_time"]],
    ];
    $return3 = curl_post($config['api_get'],json_encode($data3),1);

}
if(count($return3["keywordMapList"]["data"]??[])==0)
{
    $data2 = [
        "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>5,"type"=>"1,3,5,6,7"],
    ];
    $return2 = curl_post($config['api_get'],json_encode($data2),1);
    $connectedInformationList = $return2["informationList"]["data"];
}
else
{
    $connectedInformationList = $return3["keywordMapList"]["data"];
}
?>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title><?php echo $return['intergratedTeam']['data']['team_name'];?>电子竞技俱乐部_<?php echo $return['intergratedTeam']['data']['team_name'];?>战队_<?php echo $return['intergratedTeam']['data']['team_name'];?>电竞俱乐部成员介绍-<?php echo $config['site_name'];?></title>
    <meta name="description" content="<?php echo strip_tags($return['intergratedTeam']['data']['description']);?>">
    <meta name="Keywords" Content="<?php echo $return['intergratedTeam']['data']['team_name'];?>电子竞技俱乐部,<?php
    if(substr_count($return['intergratedTeam']['data']['team_name'],"战队")==0){echo $return['intergratedTeam']['data']['team_name'].'战队,';}?><?php echo $return['intergratedTeam']['data']['team_name'];?>电竞俱乐部成员介绍">
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
            <?php generateNav($config,"team");?>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">
      <ol class="breadcrumb">
          <li><a href="<?php echo $config['site_url'];?>">首页</a></li>
          <li><a href="<?php echo $config['site_url']; ?>/teamlist/"><?php echo $config['game_name'];?>战队</a></li>
          <li><a href="<?php echo $config['site_url']; ?>/team/<?php echo $return['intergratedTeam']['data']['tid'];?>"><?php echo $return['intergratedTeam']['data']['team_name'];?></a></li>
      </ol>
      <div class="row teamLogo">

      <div class="col-lg-3 col-sm-4 col-md-3 col-xs-12 left">
        <img src="<?php echo $return['intergratedTeam']['data']['logo'];?>" />
      </div>
      <div class="col-lg-9 col-sm-8 col-md-9 col-xs-12 right">
        <h1 class="top"><?php echo $return['intergratedTeam']['data']['team_name'];?></h1>

        <div>
            <?php echo htmlspecialchars_decode($return['intergratedTeam']['data']['description']);?>
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
            <p><?php if(!is_array($return['intergratedTeam']['data']['team_history']) && $return['intergratedTeam']['data']['team_history']!=""){echo strip_tags(unicodeDecode($return['intergratedTeam']['data']['team_history']));}else{echo "暂无";}?> </p>
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
              foreach($return['intergratedTeam']['data']['playerList'] as $playerInfo)
              { if(strlen($playerInfo['logo']) >=10){
                  ?>
            <li class="col-lg-3 col-sm-6 col-md-4 col-xs-6  list-item">
              <a href="<?php echo $config['site_url']; ?>/player/<?php echo $playerInfo['pid'];?>" title="<?php echo $playerInfo['player_name']?>" target="_blank">
                  <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                      <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                  <?php }else{?>
                      <img src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                  <?php }?>
                <p><?php echo $playerInfo['player_name']?></p>
              </a>
            </li>
              <?php }}?>
            <div style="clear: both;"></div>
          </ul>

        </div>

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
            <?php
            if(count($connectedInformationList)>0)
                {
                    $i = 1;
                    foreach($connectedInformationList as $key => $value) {?>
                    <li class="list-item">
                        <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank">
                            <div class="col-lg-10 col-sm-10 col-md-12 col-xs-12 left">
                                <?php if($i<=2){echo '<span class="newIcon">NEW</span>';}else{echo '<span class="videoIcon">图文</span>';}?>
                                <p><?php echo $value['title'];?></p>
                            </div>
                            <p class="right"><?php echo ($value["type"]??1==2)?$value['site_time']:$value['create_time'];?></p>
                        </a>
                    </li>
                        <?php $i++;}}else{?>
                <li class="list-item">
                    <a target="_blank">
                        <div class="col-lg-10 col-sm-10 col-md-12 col-xs-12 left">
                            <p>暂无</p>
                        </div>
                    </a>
                </li>
            <?php }?>
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
            foreach($return['intergratedTeamList']['data'] as $teamInfo)
            {   ?>
                <li class="list-item">
                    <a href="<?php echo $config['site_url']; ?>/team/<?php echo $teamInfo['tid'];?>" title="<?php echo $teamInfo['team_name'];?>" target="_blank">
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