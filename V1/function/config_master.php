<?php

$base_config = [
    'site_name'=>"麒麟电竞",
    'api_url'=>'http://api.qilindianjing.com',//api站点URL
    'site_url'=>'https://www.qilindianjing.com',//本站URl
    'game_name'=>"英雄联盟",
    'game'=>"lol",
    'site_id'=>1,
    'source'=>"cpseo",
    'baidu_token'=>'WGi6okVpl9ij8Gc3'
];

$additional_config = [
    'site_description'=> $base_config['site_name'].'致力于服务广大'.$base_config['game_name'].'玩家，为'.$base_config['game_name'].'玩家提供丰富的'.$base_config['game_name'].'游戏攻略、'.$base_config['game_name'].'电子竞技赛事资讯、数据分析及内容解读。',
    'api_get' => $base_config['api_url']."/get",
    'api_sitemap' => $base_config['api_url']."/sitemap",
    'navList' => ['index'=>['url'=>"","name"=>"首页"],
        'game'=>['url'=>"gameint/","name"=>$base_config['game_name']],
        'team'=>['url'=>"teams/","name"=>$base_config['game_name']."战队"],
        'player'=>['url'=>"playerlist/","name"=>$base_config['game_name']."队员"],
        'hero'=>['url'=>"herolist/","name"=>"英雄介绍"],
        'info'=>['url'=>"newslist/","name"=>"游戏资讯"],
        'stra'=>['url'=>"strategylist/","name"=>"游戏攻略"],
        //'faq'=>['url'=>"wenda-list.html","name"=>"游戏问答"],
    ]
];
return array_merge($base_config,$additional_config);