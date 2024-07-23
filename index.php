<?php
session_start();
define("DIR_ROOT", __DIR__);
$web_root = $_SERVER["HTTP_HOST"];
$arrPath = explode('\\', DIR_ROOT);
$endPath = end($arrPath);

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
$web_root .= '/' . $endPath;

define("WEB_ROOT", $web_root);

require_once "./mvc/Bridge.php";
require_once "./mvc/Core/Router.php";
require_once "./mvc/Core/Routers.php";
//

new Router();
// $myApp = new App();

