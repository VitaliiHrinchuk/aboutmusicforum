<?php
define("URL_START", "DP_AboutMusic");
define("PUBLIC_DIR", "/DP_AboutMusic/public");
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('HOST', 'http://'.$_SERVER['HTTP_HOST'].'/'.URL_START.'/');
require(ROOT . 'Config/core.php');
require(ROOT . 'router.php');
require(ROOT . 'request.php');
require(ROOT . 'dispatcher.php');
$dispatch = new Dispatcher();
$dispatch->dispatch();
?>