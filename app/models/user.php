<?php

class UserModel {
    private string $user;
    private string $pass;
    private bool $admin;

    public function __construct(string $user, string $pass, bool $admin) {
        $this->user = $user;
        $this->pass = $pass;
        $this->admin = $admin;
    }

    public function authenticate(string $username, string $password) : bool {
        return $username === $this->user && $password === $this->pass ? true : false;
    }
}

class Users {
    private string $filename = "bd/users.data";
    public array $inner = array();

    public function __construct() {
        $contents = @file_get_contents($this->filename);

        if (!$contents) {
            @mkdir("bd", 0777);
            fopen($this->filename, "c+");
            $this->inner[] = new UserModel("admin", "admin", true);
            file_put_contents($this->filename, serialize($this->inner));
        } else {
            $this->inner = unserialize($contents);
        }
    }

    public function authenticate(string $username, string $password) : bool {
        foreach ($this->inner as $user)
            if ($user->authenticate($username, $password))
                return true;
        return false;
    }

    function save(): int|false {
        return file_put_contents($this->filename, serialize($this->inner));
    }

    function add(string $username, string $password, bool $admin) {
        $this->inner[] = new UserModel($username, $password, $admin);
    }

    function remove(int $key) {
        unset($this->inner[$key]);
    }
}