<?php

class UserModel {
    public static function authenticate($username, $password) {
        $valid_username = 'usuario';
        $valid_password = 'senha123';

        if ($username === $valid_username && $password === $valid_password) {
            return true;
        } else {
            return false;
        }
    }
}