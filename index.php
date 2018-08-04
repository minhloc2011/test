<?php
define('APP_URL', 'http://mk.me.local');
define('WEBROOT', APP_URL . '/app/views/assets');
define('ROOT', str_replace("/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('VIEW', ROOT . '/App/Views/');

require __DIR__ . "/vendor/autoload.php";
require "route.php";