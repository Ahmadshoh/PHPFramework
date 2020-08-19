<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/shop/core');
define("LIBS", ROOT . '/vendor/shop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'android');

// http://localhost/shop.local/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://localhost/shop.local/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
// http://localhost/shop.local
$app_path = str_replace("/public/", '', $app_path);

define("PATH", $app_path);
define("ADMIN", PATH . "/ahmadshoh");

require_once ROOT . "/vendor/autoload.php";