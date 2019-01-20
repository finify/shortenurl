<?php
session_start();
require_once 'classes/shortener.php';

$s = new Shortener;
if(isset($_POST['url'])){
    $url = $_POST['url'];

    if($code = $s->makecode($url)){
        $_SESSION["feedback"] = "Generated!Your short URL is : <a href=\"http://localhost/shortenurl/{$code}\">localhost/shortenurl/{$code}</a>";
    }else{
        //there was a problem
        $_SESSION["feedback"] = "URL not generated ";
    }
}

header("Location:index.php");
?>