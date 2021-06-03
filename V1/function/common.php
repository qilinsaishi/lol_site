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
                echo '<li '.(($i-$current_page)==0?'class="active"  ':'').'><a href="'.$url."/".$i.'">'.$i.'</a></li>';
            }
        }
        else
        {
            if($current_page<=($p-$p2))
            {
                for($i=1;$i<=$p;$i++)
                {
                    echo '<li '.(($i-$current_page)==0?'class="active"  ':'').'><a href="'.$url."/".$i.'">'.$i.'</a></li>';
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
                    echo '<li '.(($i-$current_page)==0?'class="active"  ':'').'><a href="'.$url."/".$i.'">'.$i.'</a></li>';
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
                    echo '<li '.(($i-$current_page)==0?'class="active"  ':'').'><a href="'.$url."/".$i.'">'.$i.'</a></li>';
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
                    echo '<li '.(($totalPage-$i-$current_page)==0?'class="active"  ':'').'><a href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a></li>';
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
        $navList = $config['navList'];
        foreach($navList as $key => $value)
        {
            if($key == $current)
            {
                echo '<li class="active"  ><a href="'.$config['site_url'].'/'.$value['url'].'">'.$value['name'].'</a></li>';
            }
            else
            {
                echo '<li><a href="'.$config['site_url'].'/'.$value['url'].'">'.$value['name'].'</a></li>';
            }
        }
        return;
    }
    function renderHeaderJsCss($config)
    {
        echo '<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">';
        echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/font-awesome-4.7.0/css/font-awesome.min.css">';
        echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/reset.css" />';
        echo '<link rel="stylesheet" href="'.$config['site_url'].'/css/style.css?v=1" />';
    }
    function renderFooterJsCss($config)
    {
        echo '<script src="'.$config['site_url'].'/js/tongji.js"></script>';
        echo '<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>';
        echo '<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    }
    function renderCertification()
    {
        echo '<div align="center">Copyright©2021.Company 麒麟电竞 All rights reserved   <a style="color:white;padding:1em;" href="https://beian.miit.gov.cn/#/Integrated/index">琼ICP备19001306号-2</a>
<div><p style="color: #7D8FA4;font-size:small">本站资源均来源于网络，版权属于原作者！仅供学习参考，严禁用于任何商业目的。</p ><p style="color: #7D8FA4;font-size:small">如果无意中侵犯了您的权益，敬请联系 qilinsaishi@163.com， 我们会尽快核实并删除</p ></div></div>';

    }
    function str_replace_limit($search, $replace, $subject, $limit=-1){
        if(is_array($search)){
            foreach($search as $k=>$v){
                $search[$k] = '`'. preg_quote($search[$k], '`'). '`';
            }
        }else{
            $search = '`'. preg_quote($search, '`'). '`';
        }
        return preg_replace($search, $replace, $subject, $limit);
    }
    function render404($config)
    {
        header('location:'.$config['site_url'] . '/' . '404');
        exit;
        return true;
    }
function renderIntergratedTeam($config,$tid)
{
    header('location:'.$config['site_url'] . '/team/' . $tid);
    exit;
    return true;
}
function renderIntergratedPlayer($config,$pid)
{
    header('location:'.$config['site_url'] . '/player/' . $pid);
    exit;
    return true;
}

    function  replace_html_tag( $string ,  $tagname  = "<img><br>"){
        $string = html_entity_decode($string);
        $string = strip_tags($string,$tagname); // 保留 <span>标签
        return $string;
    }

 function unicodeDecode($data)
    {
        $rs = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $data);

        return $rs;
    }

function replace_unicode_escape_sequence($match) {
    return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}


?>
