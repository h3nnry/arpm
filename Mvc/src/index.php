<?php

declare(strict_types=1);

$routeConfig = require('./routes/route.php');

$requestUrl = $_SERVER['REQUEST_URI'];
$requestUrl =  trim($requestUrl, '/index.php');

if ( !isset($routeConfig[$requestUrl])) {
    header("HTTP/1.1 404 Not Found");
    exit;
}

$controllerName = $routeConfig[$requestUrl]['controller'];
$actionName = $routeConfig[$requestUrl]['action'];

include './Controllers/' . $controllerName . '.php';

include './Helpers/DisplayView.php';

$controller = new $controllerName();

$controller->$actionName();



