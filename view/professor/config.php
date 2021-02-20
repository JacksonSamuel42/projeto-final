<?php
define("ROOT", "http://localhost/SGN/view/professor");

function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}

$url = (isset($_GET['url'])) ? $_GET['url']:'dashboard';
$explode = array_filter(explode('/', $url));

$pages = './';
$ext = '.php';

if(is_file($pages.$explode['0'].$ext)){
    include $pages.$explode['0'].$ext;
}else{
    include __DIR__. '/404.html';
}