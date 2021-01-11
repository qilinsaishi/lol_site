<?php
    function mb_str_split($str,$split_length=1,$charset="UTF-8")
    {
        if (func_num_args() == 1) {
            return preg_split('/(?<!^)(?!$)/u', $str);
        }
        if ($split_length < 1) return false;
        $len = mb_strlen($str, $charset);
        $arr = array();
        for ($i = 0; $i < $len; $i += $split_length) {
            $s = mb_substr($str, $i, $split_length, $charset);
            $arr[] = $s;
        }
        return implode("",$arr);
    }
    function render_page_pagination($total_count,$page_size,$current_page,$url)
    {

        $p = 5;
        $p2 = 2;
        $totalPage = ceil($total_count/$page_size);
        if($current_page>1)
        {
            echo '<li><a href="'.$url."/".($current_page-1).'"><<</a></li>';
        }
        if($totalPage<=$p+$p2)
        {
            for($i=1;$i<=$totalPage;$i++)
            {
                echo '<li '.(($i-$current_page)==0?'class="active"':'').'><a href="'.$url."/".$i.'">'.$i.'</a></li>';
            }
        }
        else
        {
            if($current_page<=($p-$p2))
            {
                for($i=1;$i<=$p;$i++)
                {
                    echo '<li '.(($i-$current_page)==0?'class="active"':'').'><a href="'.$url."/".$i.'">'.$i.'</a></li>';
                }
                echo '<li><a href="'.$url."/".($current_page+$p).'">...</a></li>';
                for($i=$p2;$i>0;$i--)
                {
                    echo '<li><a href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a></li>';
                }
            }
            elseif($current_page<=($p))
            {
                for($i=1;$i<=($p+$p2);$i++)
                {
                    echo '<li '.(($i-$current_page)==0?'class="active"':'').'><a href="'.$url."/".$i.'">'.$i.'</a></li>';
                }
                echo '<li><a  href="'.$url."/".($current_page+$p).'">...</a></li>';
                for($i=$p2;$i>0;$i--)
                {
                    echo '<li><a href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a></li>';
                }
            }
            elseif($current_page>$p && $current_page<($totalPage-$p))
            {
                for($i=1;$i<=1;$i++)
                {
                    echo '<li><a href="'.$url."/".$i.'">'.$i.'</a></li>';
                }
                echo '<li><a href="'.$url."/".($current_page-$p).'">...</a></li>';
                for($i=$current_page-2;$i<=$current_page+2;$i++)
                {
                    echo '<li '.(($i-$current_page)==0?'class="active"':'').'><a href="'.$url."/".$i.'">'.$i.'</a></li>';
                }
                echo '<li><a href="'.$url."/".($current_page+$p).'">...</a></li>';
                for($i=$p2;$i>0;$i--)
                {
                    echo '<li><a href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a></li>';
                }
            }
            elseif($current_page>=($totalPage-$p))
            {
                for($i=1;$i<=1;$i++)
                {
                    echo '<li><a href="'.$url."/".$i.'">'.$i.'</a></li>';
                }
                if($totalPage-$p != 1)
                {
                    echo '<li><a href="'.$url."/".($current_page-$p).'">...</a></li>';
                }
                for($i=$p;$i>0;$i--)
                {
                    echo '<li '.(($totalPage-$i-$current_page)==0?'class="active"':'').'><a href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a></li>';
                }
            }
        }
        if($current_page<$totalPage)
        {
            echo '<li><a href="'.$url."/".($current_page+1).'">>></a></li>';
        }
    }
    function processCache($cacheConfig,$dataType,$params=[])
    {
        print_R($cacheConfig);
        die();
    }
    function sensitive($list, $string){
        $count = 0; //违规词的个数
        $sensitiveWord = '';  //违规词
        $stringAfter = $string;  //替换后的内容
        $pattern = "/".implode("|",$list)."/i"; //定义正则表达式
        if(preg_match_all($pattern, $string, $matches)){ //匹配到了结果
            $patternList = $matches[0];  //匹配到的数组
            $count = count($patternList);
            $sensitiveWord = implode(',', $patternList); //敏感词数组转字符串
            $replaceArray = array_combine($patternList,array_fill(0,count($patternList),'*')); //把匹配到的数组进行合并，替换使用
            $stringAfter = strtr($string, $replaceArray); //结果替换
        }
        $log = "原句为 [ {$string} ]<br/>";
        if($count==0){
            $log .= "暂未匹配到敏感词！";
        }else{
            $log .= "匹配到 [ {$count} ]个敏感词：[ {$sensitiveWord} ]<br/>".
                "替换后为：[ {$stringAfter} ]";
        }
        return $log;
    }
    function generateNav($config,$current = "index")
    {
        $navList = ['index'=>['url'=>"","name"=>"首页"],
            'game'=>['url'=>"gameInt.php","name"=>$config['game_name']],
            'team'=>['url'=>"teamList/","name"=>$config['game_name']."战队"],
            'player'=>['url'=>"playerList/","name"=>$config['game_name']."队员"],
            'hero'=>['url'=>"hero-list.php","name"=>"英雄介绍"],
            'info'=>['url'=>"newsList/","name"=>"游戏资讯"],
            'stra'=>['url'=>"strategyList/","name"=>"游戏攻略"],
            //'faq'=>['url'=>"wenda-list.html","name"=>"游戏问答"],
        ];
        foreach($navList as $key => $value)
        {
            if($key == $current)
            {
                echo '<li class="active"><a href="'.$config['site_url'].'/'.$value['url'].'">'.$value['name'].'</a></li>';
            }
            else
            {
                echo '<li><a href="'.$config['site_url'].'/'.$value['url'].'">'.$value['name'].'</a></li>';
            }
        }
        return;
    }

    ?>
