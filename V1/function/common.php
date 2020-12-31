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
        $totalPage = intval($total_count/$page_size);
        if($totalPage<=$p+$p2)
        {
            for($i=1;$i<=$totalPage;$i++)
            {
                echo '<li><a href="'.$url."&page=".$i.'">'.$i.'</a></li>';
            }
        }
        else
        {
            if($current_page<=($p-$p2))
            {
                for($i=1;$i<=$p;$i++)
                {
                    echo '<li><a href="'.$url."&page=".$i.'">'.$i.'</a></li>';
                }
                echo '<li><a>...</a></li>';
                for($i=$p2;$i>0;$i--)
                {
                    echo '<li><a href="'.$url."&page=".($totalPage-$i).'">'.($totalPage-$i).'</a></li>';
                }
            }
            elseif($current_page<=($p))
            {
                for($i=1;$i<=($p+$p2);$i++)
                {
                    echo '<li><a href="'.$url."&page=".$i.'">'.$i.'</a></li>';
                }
                echo '<li><a>...</a></li>';
                for($i=$p2;$i>0;$i--)
                {
                    echo '<li><a href="'.$url."&page=".($totalPage-$i).'">'.($totalPage-$i).'</a></li>';
                }
            }
            elseif($current_page>$p && $current_page<($totalPage-$p))
            {
                for($i=1;$i<=1;$i++)
                {
                    echo '<li><a href="'.$url."&page=".$i.'">'.$i.'</a></li>';
                }
                echo '<li><a>...</a></li>';
                for($i=$current_page-2;$i<=$current_page+2;$i++)
                {
                    echo '<li '.(($i-$current_page)==0?'class="active"':'').'><a href="'.$url."&page=".$i.'">'.$i.'</a></li>';
                }
                echo '<li><a>...</a></li>';
                for($i=$p2;$i>0;$i--)
                {
                    echo '<li><a href="'.$url."&page=".($totalPage-$i).'">'.($totalPage-$i).'</a></li>';
                }
            }
            elseif($current_page>=($totalPage-$p))
            {
                echo "666";
                for($i=1;$i<=1;$i++)
                {
                    echo '<li><a href="'.$url."&page=".$i.'">'.$i.'</a></li>';
                }
                echo "999:".($totalPage-$p-$current_page);
                if($totalPage-$p != 1)
                {
                    echo '<li><a>...</a></li>';
                }
                for($i=$p;$i>0;$i--)
                {
                    echo '<li '.(($totalPage-$i-$current_page)==0?'class="active"':'').'><a href="'.$url."&page=".($totalPage-$i).'">'.($totalPage-$i).'</a></li>';
                }
            }
        }
    }
    ?>
