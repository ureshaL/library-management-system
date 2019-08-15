<?php
require_once __DIR__."/../model/Book.php";

interface BookRepo
{
    public function setConnection(mysqli $connection);

    public function addBook(Book $book):bool;

    public function updateBook(Book $book):bool;

    public function deleteBook($bookID): bool;

    public function getAllBooks():array;

    public function markBooksBorrowed($bookIds): bool;

    public function getBookCount():int;
}