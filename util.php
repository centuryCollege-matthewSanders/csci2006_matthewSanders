<?php

function getDB() {
    /* TODO */
}

function formatUSD($v) {
    return sprintf('$%d.%02d',intval($v),($v*100)%100);
}

function buildNavigation($list,$class='') {
    $str = '<nav class="'.$class.'"><ul>';
    foreach ($list as $k=>$v) {
        $str .= '<li><a href="index.php?pg='.$k.'">'.$v.'</a></li>';
    }
    $str .= '</ul></nav>';
    return $str;
}

function getLink($queryString) {
    $qs = ''; $glue = '';
    foreach ($queryString as $k=>$v) {
        $qs = $glue.$k.'='.$v;
        $glue = '&';
    }
    return 'index.php?'.$qs;
}

?>
