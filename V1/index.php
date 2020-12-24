<!DOCTYPE html>
<?php
require_once "function/web.php";
$data = '{"matchList":{"page":1,"page_size":9}}';
$return = curl_post($url,$data,1);
?>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>首页</title>
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
          <li class="active"><a href="index.html">首页</a></li>
          <li><a href="gameInt.html">王者荣耀</a></li>
          <li><a href="teamInt.html">王者战队</a></li>
          <li><a href="hero-list.html">王者比赛</a></li>
          <li><a href="zixun-list.html">游戏资讯</a></li>
          <li><a href="#contact">游戏攻略</a></li>
          <li><a href="wenda-list.html">游戏问答</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="indexBanner">
    <img src="images/banner.png" />
  </div>
  <div class="container">
    
    <div class="row">
      <div class="col-lg-12 newlist ">
        <h2 class="bigTitle"><?php echo $config['game_name'];?>最新赛事</h2>
        <ul>
            <?php
                foreach($return['matchList']['data'] as $matchInfo)
                {   ?>
            <li class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
            <a href="details.html" title="京东下单金额" target="_blank">
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
        </ul>
        <div style="clear: both;"></div>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 newMsg">
        <div>
          <h2 class="bigTitle">王者荣耀最新资讯</h2>
          <ul>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>

            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 hotTame">
        <div>
          <h2 class="bigTitle">王者荣耀热门战队</h2>
          <ul>

            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div class="pic">
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                </div>
                <p>外交部宣布对美反制措施:对等制裁</p>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div class="pic">
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                </div>
                <p>外交部宣布对美反制措施:对等制裁</p>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div class="pic">
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                </div>
                <p>外交部宣布对美反制措施:对等制裁</p>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div class="pic">
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                </div>
                <p>外交部宣布对美反制措施:对等制裁</p>
              </a>
            </li>

            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div class="pic">
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                </div>
                <p>外交部宣布对美反制措施:对等制裁</p>
              </a>
            </li>
            <li>
              <a href="details.html" title="京东下单金额" target="_blank">
                <div class="pic">
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                </div>
                <p>外交部宣布对美反制措施:对等制裁</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-lg-12 GameGl newMsg">
        <div>
          <h2 class="bigTitle">王者荣耀游戏攻略</h2>
          <ul>
            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>

            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img
                    src="http://www.2cpseo.com/storage/articles/December2020//193f9058b5ab618184dff4a9c952d8a5.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
            <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <a href="details.html" title="京东下单金额" target="_blank">
                <div>
                  <img src="http://www.2cpseo.com/storage/images/December2020/bbc02b18bfc5d4de3e71b303af307dba.jpg" />
                  <p>外交部宣布对美反制措施:对等制裁</p>
                </div>
                <span>12-10</span>
              </a>
            </li>
          </ul>
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
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
        </ul>
      </div>
      <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
        <div class="title">热门选手</div>
        <ul>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">fewioj</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">ewrfwerf221</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">132e4rfqe35wtf</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">fewioj</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">ewrfwerf221</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">2020年KPL赛季</a></li>
          <li class="col-lg-6 col-sm-6 col-md-6 col-xs-12"><a href="##">132e4rfqe35wtf</a></li>
        </ul>
      </div>
      <div class="col-lg-4 col-sm-6 col-md-4 col-xs-12">
        <div class="title">关于我们</div>
        <ul>
          <li class="col-md-12"><a href="##">联系我们</a></li>
          <li class="col-md-12"><a href="##">站点地图</a></li>
        </ul>
      </div>
    </div>
    <div class="row youlian">
      <div class="col-md-12">
        <div class="title">友情链接</div>
        <ul>
          <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
          <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
          <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
          <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
          <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
          <li class="col-lg-2 col-sm-3 col-md-3 col-xs-6"><a href="##"><img src="images/qedj.png" /></a></li>
        </ul>
      </div>
    </div>
  </footer>


  <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>