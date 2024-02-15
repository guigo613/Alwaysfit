<?php

class Books {
    private string $filename = "bd/books.data";
    public array $inner = array();

    public function __construct() {

        $contents = file_get_contents($this->filename);
        if (!$contents)
            fopen($this->filename, "c");
        else {
            $this->inner = unserialize($contents);
        }
    }

    function save(): int|false {
        return file_put_contents($this->filename, serialize($this->inner));
    }

    function add(string $title, string $author, string $year) {
        $this->inner[] = new Book($title, $author, $year);
    }

    function remove(int $key) {
        unset($this->inner[$key]);
    }
}

class Book {
    public $title;
    public $author;
    public $year;

    public function __construct(string $title, string $author, string $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }
}