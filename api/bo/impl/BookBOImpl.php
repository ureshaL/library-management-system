<?php
require_once __DIR__."/../BookBO.php";
require_once __DIR__."/../../model/Book.php";
require_once __DIR__."/../../repository/impl/BookRepoImpl.php";
require_once __DIR__."/../../db/DBConnection.php";

class BookBOImpl implements BookBO
{

    public function addBook(Book $book)
    {
        $bookRepo = new BookRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $bookRepo->setConnection($connection);
        $res = $bookRepo->addBook($book);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function updateBook(Book $book)
    {
        $bookRepo = new BookRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $bookRepo->setConnection($connection);
        $res = $bookRepo->updateBook($book);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function deleteBook($bookID)
    {
        $bookRepo = new BookRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $bookRepo->setConnection($connection);
        $res = $bookRepo->deleteBook($bookID);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function getAllBooks()
    {
        $bookRepo = new BookRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $bookRepo->setConnection($connection);
        $bookArray = $bookRepo->getAllBooks();
        return $bookArray;
    }

    public function getBookCount()
    {
        $bookRepo = new BookRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $bookRepo->setConnection($connection);
        $count = $bookRepo->getBookCount();
        return $count;
    }

    public function getAllAvailableBooks()
    {
        $bookRepo = new BookRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $bookRepo->setConnection($connection);
        $bookArray = $bookRepo->getAllAvailableBooks();
        return $bookArray;
    }

    public function getBooksByBorrowOrderId($bro_id)
    {
        $bookRepo = new BookRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $bookRepo->setConnection($connection);
        $bookArray = $bookRepo->getBooksByBorrowOrderId($bro_id);
        return $bookArray;
    }
}
