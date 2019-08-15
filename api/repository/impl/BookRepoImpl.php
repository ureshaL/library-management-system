<?php
require_once __DIR__."/../BookRepo.php";
require_once __DIR__."/../../model/Book.php";

class BookRepoImpl implements BookRepo
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function addBook(Book $book): bool
    {
        $response=  $this->connection->query("INSERT INTO Book VALUES (
            '{$book->getIsbn()}',
            '{$book->getBookName()}',
            '{$book->getAId()}',
            '{$book->getCId()}',
            '{$book->getPId()}',
            '{$book->getQty()}',
            '0'
            )
        ");
        if ($response>0 && $this->connection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function updateBook(Book $book): bool
    {
        $response=  $this->connection->query("UPDATE Book SET 
            book_name='{$book->getBookName()}',
            a_id='{$book->getAId()}',
            c_id='{$book->getCId()}',
            p_id='{$book->getPId()}',
            qty='{$book->getQty()}'
            WHERE 
            isbn='{$book->getIsbn()}'
        ");
        if ($response>0 && $this->connection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteBook($bookID): bool
    {
        $response =  $this->connection->query("delete from Book where isbn='{$bookID}'");
        if ($response > 0 && $this->connection->affected_rows>0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllBooks(): array
    {
        $resultSet =   $this->connection->query("select * from Book");
        return $resultSet->fetch_all();
    }

    public function markBooksBorrowed($bookIds): bool
    {
        foreach ($bookIds as $bookId) {
            $response = $this->connection->query("UPDATE Book SET status='1' WHERE isbn='{$bookId}'");
            if ($response <= 0 || $this->connection->affected_rows<=0) {
                return false;
            }
        }
        return true;
    }

    public function getBookCount(): int
    {
        $count = $this->connection->query("SELECT COUNT(isbn) FROM Book;");
        return $count;
    }
}