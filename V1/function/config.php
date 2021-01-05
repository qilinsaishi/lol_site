<?php
return [
  'api_url'=>'http://lol_api.querylist.cn',//api站点URL
    'site_url'=>'info.lol_info.com',//本站URl
    'game_name'=>"英雄联盟",
    'game'=>"lol",
    'cacheConfig'=>[
        'matchList'=>['prefix'=>"matchList","expire"=>3600],
        'links'=>['prefix'=>"links","expire"=>7200]
    ]
];