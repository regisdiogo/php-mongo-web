<?php
if (!isset($GLOBALS['count'])) {
    $GLOBALS['count'] = 0;
}
$GLOBALS['count']++;
if (preg_match('/\.(?:js|css|html|png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    require("./src/core/App.php");
    phpmongoweb\core\App::init();
    $service = new phpmongoweb\service\ConnectionService();
    var_dump([$_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]]);
    var_dump($service->helloWorld());
    var_dump($GLOBALS['count']);
}