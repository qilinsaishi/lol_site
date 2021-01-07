<!DOCTYPE html>
<?php
$info['page']['page_size'] = 18;
$page = $_GET['page']??1;
require_once "function/init.php";
$data = [
    "tournament"=>["page"=>1,"page_size"=>8],
    "matchList"=>["page"=>1,"page_size"=>4],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"field"=>["name","key","value"]],
    "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6],
    "totalPlayerList"=>["game"=>$config['game'],"page"=>$page,"page_size"=>$info['page']['page_size'],"source"=>"cpseo","fields"=>'player_id,player_name,logo'],
    "informationList"=>["game"=>$config['game'],"page"=>1,"page_size"=>7,"type"=>"1,2,3,5"],
];
$return = curl_post($url,json_encode($data),1);
$info['page']['total_count'] = $return['totalPlayerList']['count'];
$info['page']['total_page'] = intval($return['totalPlayerList']['count']/$info['page']['page_size']);
?>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
  <meta name="description" content="">
  <title><?php echo $config['game_name'];?>-队员列表</title>
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
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
            <?php generateNav($config,"player");?>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">

    <div class="row heroList">
        <div class="container margin120">

            <div class="row heroList">
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
                            热门选手
                        </h3>
                    </div>
                    <div>
                        <div class="iconList">
                            <ul>
                                <?php
                                foreach($return['totalPlayerList']['data'] as $playerInfo)
                                {   ?>
                                    <li class="col-lg-2 col-sm-2 col-md-2 col-xs-4">
                                        <a href="playerDetail.php?player_id=<?php echo $playerInfo['player_id'];?>" title="<?php echo $playerInfo['player_name'];?>" target="_blank">
                                            <div>
                                                <img src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                                            </div>
                                            <p><?php echo $playerInfo['player_name'];?></p>
                                        </a>
                                    </li>

                                <?php }?>
                                <div class="page">
                                    <ul class="pagination">
                                        <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,"playerList.php?"); ?>
                                    </ul>
                                </div>
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
                        <a href="detail.php?id=<?php echo $information['id'];?>" title="<?php echo $information['title'];?>" target="_blank">
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
                    <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="player_detail?player_id=<?php echo $playerInfo['player_id'];?>"><?php echo $playerInfo['player_name'];?></a></li>
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