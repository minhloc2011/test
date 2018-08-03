<?php
$url = trim($_SERVER['REQUEST_URI']);
if ($url == '/') {
    $action = 'index';
    $params = [];
} else {
    $explodeURL = explode('/', $url);
    $explodeURL = array_slice($explodeURL, 1);

    $action = $explodeURL[0];
    $params = array_slice($explodeURL, 1);
}


$controller = new \App\Controllers\TodoListController();

call_user_func_array(array($controller, $action), $params);