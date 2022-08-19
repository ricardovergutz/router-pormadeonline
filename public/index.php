<?php
include("urls.php");

$urlBase = 'https://www.pormade.com.br';

$url = substr($_SERVER['REQUEST_URI'], 1) ;

if ($url==''){
    $newUrl = $urlBase;
}else if (array_key_exists($url, $urlAntiga)){
    $newUrl = $urlBase . "/" . $urlAntiga[$url];
}else if( substr($url, 0, 4) == 'blog' ) {
    $newUrl = "https://blog.pormade.com.br";
    if (array_key_exists($url, $urlBlog)){
        $newUrl .= $urlBlog[$url];
    }
}else{
    $newUrl = $urlBase . "/" . $url;
}

header("HTTP/1.1 301 Moved Permanently");
header("Location: " . $newUrl);