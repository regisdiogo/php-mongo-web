<?php
function p($var = "") {
    echo "<pre>";
    if (!isset($var))
        print_r('null');
    else
        print_r($var);
    echo "</pre>";
}

if (preg_match('/\.(?:js|css|html|png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    require("./src/core/App.php");
    phpmongoweb\core\App::init();
    $service = new phpmongoweb\service\ConnectionService();
    p($service->helloWorld());
}