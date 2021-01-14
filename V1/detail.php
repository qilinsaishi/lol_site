<!DOCTYPE html>
<?php
require_once "function/init.php";
$info['page']['page_size'] = 4;
$id = $_GET['id']??1;
$data = [
    "information"=>[$id],
    "links"=>["game"=>$config['game'],"page"=>1,"page_size"=>6],
    "tournament"=>["page"=>1,"page_size"=>8],
    "totalTeamList"=>["page"=>1,"page_size"=>6,"game"=>$config['game'],"source"=>"cpseo","rand"=>1,"cacheWith"=>"information","fields"=>'team_id,team_name,logo'],
    "totalPlayerList"=>["page"=>1,"page_size"=>6,"game"=>$config['game'],"source"=>"cpseo","rand"=>1,"cacheWith"=>"information","fields"=>'player_id,player_name,logo'],
    "playerList"=>["dataType"=>"totalPlayerList","page"=>1,"page_size"=>6,"source"=>"cpseo"],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"]],
];
$return = curl_post($config['api_get'],json_encode($data),1);
$urlList = ["hero"=>"herodetail/",
            "team"=>"teamdetail/",
            "player"=>"playerdetail/",
    ];
$return["information"]['data']['keywords_list'] = json_decode($return["information"]['data']['keywords_list'],true);
$keywordsList = [];
if(is_array($return["information"]['data']['keywords_list']))
{
    foreach($return["information"]['data']['keywords_list'] as $type => $list)
    {
        foreach($list as $word => $wordInfo)
        {
            if(isset($keywordsList[$word]))
            {
                if($wordInfo['count']>$keywordsList[$word]['count'])
                {
                    $keywordsList[$word] = ["id"=>$wordInfo['id'],"type"=>$type,"count"=>$wordInfo['count'],'url'=>$urlList[$type].$wordInfo['id']];
                }
            }
            else
            {
                $keywordsList[$word] = ["id"=>$wordInfo['id'],"type"=>$type,"count"=>$wordInfo['count'],'url'=>$urlList[$type].$wordInfo['id']];
            }
        }
    }
}
array_multisort(array_combine(array_keys($keywordsList),array_column($keywordsList,"count")),SORT_DESC,$keywordsList);
$data2 = [
    "infoListWithAuthor"=>["dataType"=>"informationList","game"=>$config['game'],"author_id"=>$return['information']['data']['author_id'],"page"=>1,"page_size"=>$info['page']['page_size'],
        "type"=>$return['information']['data']['type']==4?"4":"1,2,3,5","fields"=>"id,title"],
    "infoList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>5,
        "type"=>$return['information']['data']['type']!=4?"4":"1,2,3,5","fields"=>"id,title"],
];
$return2 = curl_post($config['api_get'],json_encode($data2),1);


$i = 1;
foreach ($keywordsList as $word => $info) {
    {
//        $return['information']['data']['content'] = str_replace($word,'<a href="' . $config['site_url'] . '/' . $info['url'] . '">' . $word . '</a>',$return['information']['data']['content']);
    }
} ?>


?>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
    <meta name=”Keywords” Content=”<?php echo implode(",",array_keys($keywordsList));?>″>
    <title><?php echo $return['information']['data']['title'];?>_<?php echo $config['game_name'];?>资讯-<?php echo $config['site_name'];?></title>
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
          $type = $return['information']['data']['type'] != 4?"info":"stra";
          generateNav($config, $type);
            ?>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container margin120">

    <div class="row">

      <div class="col-md-8">
          <ol class="breadcrumb">
              <li><a href="<?php echo $config['site_url'];?>">首页</a></li>
              <li><a href="<?php echo $config['site_url']; ?><?php echo ($return['information']['data']['type']==4)?"/strategylist/":"/newslist/";?>"><?php echo ($return['information']['data']['type']==4)?"攻略":"资讯";?></a></li>
              <li><a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $return['information']['data']['id'];?>"><?php echo $return['information']['data']['title'];?></a></li>
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
             <?php
             $i = 1;
             foreach($keywordsList as $word => $info)
             {
                 if($i<=3)
                 {
                     echo '<li><a href="'.$config['site_url'].'/'.$info['url'].'">'.$word.'</a></li>';
                 }
                 $i++;
             }?>
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
            <a  href="javascript:;">更多</a>
          </div>
          <div class="col-xs-24">
            <ul class="saishiList_box">
                  <?php
                  $i = 1;
                  foreach($return['tournament']['data'] as $tournamentInfo)
                  {   if($i<=3){?>
                <li class="list-item">
                      <a  href="javascript:;" title="<?php echo $tournamentInfo['tournament_name'];?>" target="_blank"><?php echo $tournamentInfo['tournament_name'];?></a>
                </li>
                      <?php $i++;}}?>
            </ul>
          </div>
        </div>
          <div class="saishi">
              <div class="titleBox">
                  <?php if($return['information']['data']['type']!=4){?>
                      <h3>最新攻略</h3>
                      <a href="<?php echo $config['site_url']; ?>/strategylist/">更多</a>
                  <?php }else{?>
                      <h3>最新资讯</h3>
                      <a href="<?php echo $config['site_url']; ?>/newslist/">更多</a>
                  <?php }?>
              </div>
              <div class="col-xs-24">
                  <ul class="saishiList_box">
                      <?php foreach($return2['infoList']['data'] as $key => $value) {
                          if($value['id']!=$id){?>
                              <li class="list-item">
                                  <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank"><?php echo $value['title'];?></a>
                              </li>
                          <?php }}?>
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

<div class="row">
  <div class="col-md-8 padding0">
    <div class="saishi">
      <div class="titleBox">
        <h3>相关文章推荐</h3>
      </div>
      <div class="col-xs-24">
        <ul class="saishiList_box">

            <?php foreach($return2['infoListWithAuthor']['data'] as $key => $value) {?>
                <li class="list-item">
                    <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" target="_blank"><?php echo $value['title'];?></a>
                </li>
            <?php }?>

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
                <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a  href="javascript:;"><?php echo $tournamentInfo['tournament_name'];?></a></li>
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