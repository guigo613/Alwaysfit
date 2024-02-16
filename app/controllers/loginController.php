<?php

require_once 'app/models/user.php';

class LoginController {
    public function index() {
        include 'app/views/login.php';
    }

    public function manager() {
        include 'app/views/managerUsers.php';
    }

    public function new() {
        include 'app/views/newUser.php';
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

    public function add() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin = $_POST['admin'];
        
        $books = new Users();
        $books->add($username, $password, $admin);
        $books->save();

        header('Location: /?route=book');
    }

    public function remove() {
        $books = new Users();
        $id = $_POST['user_id'];
        $books->remove($id);
        $books->save();

        header('Location: /?route=book');
    }

    public function logout() {
        session_destroy();
        header('Location: /?route=login');
    }
}