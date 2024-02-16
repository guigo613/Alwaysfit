<?php

require_once 'app/models/user.php';

class LoginController {
    public function index() {
        include 'app/views/login.php';
    }

    public function authenticate() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $users = new Users();

        if ($users->authenticate($username, $password)) {
            header('Location: /?route=book');
            $_SESSION["permission"] = true;
            exit();
        } else {
            $error_message = "Usuário ou senha inválidos.";
            include 'app/views/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /?route=login');
    }
}