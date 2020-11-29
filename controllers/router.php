<?php

session_start();
if(! isset($_SESSION['userId'])) $_SESSION['userId'] = 0;
if(! isset($_SESSION['userFirstName'])) $_SESSION['userFirstName'] = "";
if(! isset($_SESSION['userPermission'])) $_SESSION['userPermission'] = "1__";

include(SERVER_ROOT . 'includes/database.inc.php');
include(SERVER_ROOT . 'includes/menu.inc.php');

if (isset($_SESSION['userId']) && $_SESSION['userId'] != 0) {
    $page = "news";
} else {
    $page = "login";
}

$request = $_SERVER['QUERY_STRING'];
$vars = array();

if ($request != "") {
    $params = explode('/', $request);
    $page = array_shift($params);

    $vars += $_POST;
    foreach ($params as $p) {
        $vars[] = $p;
    }
}

$controllerFile = $page;
$target = SERVER_ROOT . 'controllers/' . $page . '.php';
if (!file_exists($target)) {
    $controllerFile = 'error404';
    $target = 'error404.php';
}

include_once($target);
$class = ucfirst($controllerFile) . '_Controller';
if (class_exists($class)) {
    $controller = new $class;
} else {
    die('class does not exists!');
}

$controller->main($vars);

function __autoload($className)
{
    $file = SERVER_ROOT . 'models/' . strtolower($className) . '.php';
    if (file_exists($file)) {
        include_once($file);
    } else {
        die("File '$file' containing class '$className' not found.");
    }
}