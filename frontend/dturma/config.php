<?php
define("ROOT", "http://localhost/projeto_Final_2020/frontend/dturma");

function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}

$url = (isset($_GET['url'])) ? $_GET['url']:'dashboard';
$explode = array_filter(explode('/',$url));

$pages = '../dturma/';
$ext = '.php';

if(is_file($pages.$explode['0'].$ext)){
    include $pages.$explode['0'].$ext;
}else{
    include '../admin/404.html';
}
