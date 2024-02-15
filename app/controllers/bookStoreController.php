<?php

require_once "app/models/book.php";

class BookStoreController
{
    public function index() {
        $books = new Books();

        include "app/views/bookStore.php";
    }

    public function add() {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year = $_POST['year'];
        
        $books = new Books();
        $books->add($title, $author, $year);
        $books->save();

        header('Location: /?route=book');
    }

    public function remove() {
        $books = new Books();
        $id = $_POST['book_id'];
        $books->remove($id);
        $books->save();

        header('Location: /?route=book');
    }
}