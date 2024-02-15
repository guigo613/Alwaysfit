<?php

$routes = array(
    'login' => array('controller' => 'loginController', 'action' => 'index'),
    'authenticate' => array('controller' => 'loginController', 'action' => 'authenticate'),
    'addUser' => array('controller' => 'loginController', 'action' => 'add'),
    'book' => array('controller' => 'bookStoreController', 'action' => 'index'),
    'addbook' => array('controller' => 'bookStoreController', 'action' => 'add'),
    'removebook' => array('controller' => 'bookStoreController', 'action' => 'remove'),
    'logout' => array('controller' => 'loginController', 'action' => 'logout')
);

function route(array $routes) {
    $route = isset($_GET['route']) ? $_GET['route'] : 'login';

    if (array_key_exists($route, $routes)) {
        $controllerName = $routes[$route]['controller'];
        $actionName = $routes[$route]['action'];

        require_once 'app/controllers/' . $controllerName . '.php';

        $controller = new $controllerName();
        $controller->$actionName();
    } else {
        header('Location: ?route=login');
        exit;
    }
}
