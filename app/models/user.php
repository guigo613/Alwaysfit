<?php

class UserModel {
    public static function authenticate(string $username, string $password) : bool {
        $valid_username = 'admin';
        $valid_password = 'admin';

        if ($username === $valid_username && $password === $valid_password) {
            return true;
        } else {
            return false;
        }
    }
}