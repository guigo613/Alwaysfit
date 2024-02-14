<?php

require_once 'models/user.php';

class LoginController {
    public function index() {
        include 'views/login.php';
    }

    public function authenticate() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (UserModel::authenticate($username, $password)) {
            header('Location: welcome.php');
            exit();
        } else {
            $error_message = "Usuário ou senha inválidos.";
            include 'views/login.php';
        }
    }
}

$route = isset($_GET['route']) ? $_GET['route'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($route) {
    case 'login':
        $controller = new LoginController();
        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'authenticate':
                $controller->authenticate();
                break;
            default:
                break;
        }
        break;
    default:
        break;
}