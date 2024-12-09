<?php
    $folderPath = dirname($_SERVER["SCRIPT_NAME"]); //mostrar unicamente el name
    $urlPath = $_SERVER["REQUEST_URI"];
    $url = substr($urlPath,strlen($folderPath));

    define("URL", $url);
    // echo $folderPath ."<br>";
    // echo $urlPath ."<br>";
    // echo $url ."<br>";