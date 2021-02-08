<!DOCTYPE html>
<?php
$info['page']['page_size'] = 54;
$page = $_GET['page']??1;
if($page==''){
	$page=1;
}
require_once "function/init.php";
$data = [
    "tournament"=>["page"=>1,"page_size"=>8],
    "totalTeamList"=>["page"=>1,"page_size"=>18,"game"=>$config['game'],"source"=>$config['source'],"fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "matchList"=>["page"=>1,"page_size"=>4],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_team_img"],"fields"=>["name","key","value"]],
    "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "playerList"=>["dataType"=>"totalPlayerList","game"=>$config['game'],"page"=>$page,"page_size"=>$info['page']['page_size'],"source"=>$config['source'],"fields"=>'player_id,player_name,logo'],
    "totalPlayerList"=>["game"=>$config['game'],"page"=>$page,"page_size"=>$info['page']['page_size'],"source"=>$config['source'],"fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>7,"type"=>"1,2,3,5"],
    "currentPage"=>["name"=>"playerList","page"=>$page,"page_size"=>$info['page']['page_size'],"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
$info['page']['total_count'] = $return['totalPlayerList']['count'];
$info['page']['total_page'] = intval($return['totalPlayerList']['count']/$info['page']['page_size']);
?>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
  <meta name="description" content="">
    <meta name=”Keywords” Content=”<?php echo $config['game_name'];?>职业选手名单,<?php echo $config['game_name'];?>职业选手大全″>
    <title><?php echo $config['game_name'];?>职业选手名单大全-<?php echo $config['site_name'];?></title>
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
            <?php generateNav($config,"player");?>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

        <div class="container margin120">

            <div class="row heroList">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo $config['site_url'];?>">首页</a></li>
                        <li><a href="<?php echo $config['site_url']; ?>/playerlist/"><?php echo $config['game_name'];?>选手</a></li>
                    </ol>
                    <div class="icon_title">
                        <h3>
                            选手列表
                        </h3>
                    </div>
                    <div>
                        <div class="iconList">
                            <ul>
                                <?php
                                foreach($return['playerList']['data'] as $playerInfo)
                                {   ?>
                                    <li class="col-lg-2 col-sm-2 col-md-2 col-xs-4">
                                        <a href="<?php echo $config['site_url']; ?>/playerdetail/<?php echo $playerInfo['player_id'];?>" title="<?php echo $playerInfo['player_name'];?>" target="_blank">
                                            <div>
                                                <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                                                    <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                                                <?php }else{?>
                                                    <img src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                                                <?php }?>                                            </div>
                                            <p><?php echo $playerInfo['player_name'];?></p>
                                        </a>
                                    </li>
                                <?php }?>
                                <div class="page">
                                    <ul class="pagination">
                                        <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$config['site_url']."/playerlist"); ?>
                                    </ul>
                                </div>
                                <div style="clear: both;"></div>
                            </ul>
                        </div>
                    </div>
                    <div class="icon_title">
                        <h3>
                            热门战队
                        </h3>
                        <a href="<?php echo $config['site_url']; ?>/teamlist/">更多</a>
                    </div>
                    <div>
                        <div class="iconList">
                            <ul>
                                <?php
                                foreach($return['totalTeamList']['data'] as $teamInfo)
                                {   ?>
                                    <li class="col-lg-2 col-sm-2 col-md-2 col-xs-4">
                                        <a href="<?php echo $config['site_url']; ?>/teamdetail/<?php echo $teamInfo['team_id'];?>" title="<?php echo $teamInfo['team_name'];?>" target="_blank">
                                            <div>
                                                <?php if(isset($return['defaultConfig']['data']['default_team_img'])){?>
                                                    <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_team_img']['value'];?>" src="<?php echo $teamInfo['logo'];?>" title="<?php echo $teamInfo['team_name'];?>" />
                                                <?php }else{?>
                                                    <img src="<?php echo $teamInfo['logo'];?>" title="<?php echo $teamInfo['team_name'];?>" />
                                                <?php }?>                                            </div>
                                            <p><?php echo $teamInfo['team_name'];?></p>
                                        </a>
                                    </li>
                                <?php }?>
                                <div style="clear: both;"></div>
                            </ul>
                        </div>
                    </div>
                </div>


      
      <div class="col-md-12">

        <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 gameInt_zixun  gameInt_zixun100 margin0">
          <div class="title">
            <h3>
              <i class="fa fa-trophy" aria-hidden="true"></i>
              游戏资讯
            </h3>
          </div>
          <div>
            <ul class="list_box">
                <?php
                foreach($return['informationList']['data'] as $information)
                {   ?>
                    <li class="list-item">
                        <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $information['id'];?>" title="<?php echo $information['title'];?>" target="_blank">
                            <p><?php echo $information['title'];?></p>
                        </a>
                    </li>
                <?php }?>
              <div style="clear: both;"></div>
            </ul>
          </div>
        </div>



        <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 gameInt_team gameStrategy newlist">
          <div class="title">
            <h3>
              <i class="fa fa-trophy" aria-hidden="true"></i>
              赛事
            </h3>
          </div>
          <div>
            <ul class="strategy">
                <?php
                foreach($return['matchList']['data'] as $matchInfo)
                {   ?>
                    <li>
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
              <li>
              <!-- <div style="clear: both;"></div> -->
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
            $i=1;
            foreach($return['totalPlayerList']['data'] as $playerInfo)
            {
                if($i<=8){
                ?>
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