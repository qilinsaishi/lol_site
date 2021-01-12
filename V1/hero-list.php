<!DOCTYPE html>
<?php
require_once "function/init.php";
$data = [
    "playerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>8],
    "teamList"=>["page"=>1,"page_size"=>8],
    "tournament"=>["page"=>1,"page_size"=>8],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"field"=>["name","key","value"]],
    "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6],
    "lolHeroList"=>["page"=>1,"page_size"=>20],
    "lolEquipmentList"=>["page"=>1,"page_size"=>12],
    "lolSummonerList"=>["page"=>1,"page_size"=>12],
];
$return = curl_post($config['api_get'],json_encode($data),1);
?>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
  <meta name="description" content="<?php echo $config['site_name'];?>提供<?php echo $config['game_name'];?>英雄列表，想了解<?php echo $config['game_name'];?>有哪些英雄，以及<?php echo $config['game_name'];?>英雄玩法攻略等，尽在<?php echo $config['site_name'];?>。">
    <meta name=”Keywords” Content=”<?php echo $config['game_name'];?>英雄列表,<?php echo $config['game_name'];?>有哪些英雄″>
    <title><?php echo $config['game_name'];?>英雄列表_<?php echo $config['game_name'];?>有哪些英雄-<?php echo $config['site_name'];?></title>
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $config['site_url']; ?>/css/reset.css" />
  <link rel="stylesheet" href="<?php echo $config['site_url']; ?>/css/style.css" />
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
        <a class="navbar-brand" href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url']; ?>/images/logo.png" alt="<?php echo $config['site_name'];?>" /></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <?php generateNav($config,"hero");?>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">
    <div class="row heroList">
      <div class="col-md-12">
          <ol class="breadcrumb">
              <li><a href="<?php echo $config['site_url'];?>">首页</a></li>
              <li><a href="<?php echo $config['site_url']; ?>/heroList/"><?php echo $config['game_name'];?>英雄列表</a></li>
          </ol>
        <div class="icon_title">
          <h3>
            <svg t="1607948885693" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
              p-id="1186" width="48" height="48">
              <path
                d="M752 499.2C691.2 566.4 608 608 512 608s-179.2-41.6-240-108.8C185.6 569.6 128 678.4 128 800c0 105.6 86.4 192 192 192h384c105.6 0 192-86.4 192-192 0-121.6-57.6-230.4-144-300.8z"
                fill="#d5e3f3" p-id="1187"></path>
              <path d="M512 288m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z" fill="#d5e3f3" p-id="1188"></path>
            </svg>
            英雄列表
          </h3>
        </div>
        <div>
          <div class="iconList">
            <ul>
                <?php
                foreach($return['lolHeroList']['data'] as $heroInfo)
                {   ?>
              <li class="col-lg-2 col-sm-2 col-md-2 col-xs-4">
                <a href="<?php echo $config['site_url']; ?>/heroDetail/<?php echo $heroInfo['hero_id'];?>">
                  <img src="<?php echo $heroInfo['logo'];?>" />
                  <p><?php echo $heroInfo['hero_name'];?></p>
                </a>
              </li>
                <?php }?>
<div style="clear: both;"></div>
            </ul>
          </div>
        </div>
      </div>



      <div class="col-md-12">
        <div class="icon_title">
          <h3>
            <svg t="1607948885693" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
              p-id="1186" width="48" height="48">
              <path
                d="M752 499.2C691.2 566.4 608 608 512 608s-179.2-41.6-240-108.8C185.6 569.6 128 678.4 128 800c0 105.6 86.4 192 192 192h384c105.6 0 192-86.4 192-192 0-121.6-57.6-230.4-144-300.8z"
                fill="#d5e3f3" p-id="1187"></path>
              <path d="M512 288m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z" fill="#d5e3f3" p-id="1188"></path>
            </svg>
            装备列表
          </h3>
        </div>
        <div>
          <div class="iconList">
            <ul>
                <?php
                foreach($return['lolEquipmentList']['data'] as $equipmentInfo)
                {   ?>
              <li class="col-lg-2 col-sm-2 col-md-2 col-xs-4">
                <a href="##">
                  <img src="<?php echo $equipmentInfo['logo'];?>" />
                  <p><?php echo $equipmentInfo['equipment_name'];?></p>
                </a>
              </li>
                <?php }?>
                <div style="clear: both;"></div>
            </ul>
          </div>

        </div>

      </div>
      <div class="col-md-12 summoner">
        <div class="icon_title">
          <h3>
            <svg t="1607948885693" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
              p-id="1186" width="48" height="48">
              <path
                d="M752 499.2C691.2 566.4 608 608 512 608s-179.2-41.6-240-108.8C185.6 569.6 128 678.4 128 800c0 105.6 86.4 192 192 192h384c105.6 0 192-86.4 192-192 0-121.6-57.6-230.4-144-300.8z"
                fill="#d5e3f3" p-id="1187"></path>
              <path d="M512 288m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z" fill="#d5e3f3" p-id="1188"></path>
            </svg>
            召唤师技能
          </h3>
        </div>

        <div class="col-md-12 summoner_box">

          <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12 summoner_title">
              <?php
              foreach($return['lolSummonerList']['data'] as $summonerInfo)
              {   ?>
              <div class="col-lg-4 col-sm-2 col-md-2 col-xs-4  on">
                <a href="javascript:;;" title="<?php echo $summonerInfo['skill_name'];?>" >
                  <img src="<?php echo $summonerInfo['logo'];?>" alt="img" />
                  <p><?php echo $summonerInfo['skill_name'];?></p>
                </a>
              </div>
              <?php }?>
              <div style="clear: both;"></div>
  
          </div>
  
          <div class="col-lg-8 col-sm-12 col-md-12 col-xs-12 summoner_con">

              <?php
              foreach($return['lolSummonerList']['data'] as $summonerInfo)
              {   ?>
                  <div class="summoner_con_list">

                      <img src="<?php echo $summonerInfo['image'];?>" />
                      <h3><?php echo $summonerInfo['skill_name'];?><span>LV.<?php echo $summonerInfo['rank'];?><?php echo $summonerInfo['skill_name'];?></span> </h3>
                      <p><?php echo $summonerInfo['description'];?></p>
                  </div>
              <?php }?>



          </div>
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


  <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
tabs(".summoner_title", "on", ".summoner_con");

})
  </script>
</body>

</html>