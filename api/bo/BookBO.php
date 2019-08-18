<?php
require_once __DIR__."/../model/Book.php";

interface BookBO
{
    public function addBook(Book $book);
    public function updateBook(Book $book);
    public function deleteBook($bookID);
    public function getAllBooks();
    public function getBookCount();
    public function getAllAvailableBooks();
}
