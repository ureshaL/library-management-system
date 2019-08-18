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
            '{$book->getQty()}'
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
            current_qty=IF(qty='{$book->getQty()}', current_qty, current_qty+'{$book->getQty()}'-qty),
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
        $resultSet =   $this->connection->query("
            SELECT isbn,book_name,B.a_id,author_name,B.c_id,cat_name,P.p_id,pub_name,qty,current_qty
            FROM Book B, Author A, Category C, Publisher P
            WHERE B.a_id=A.a_id AND B.c_id=C.c_id AND B.p_id=P.p_id
        ");
        return $resultSet->fetch_all();
    }

    public function markBooksBorrowed($bookIds): bool
    {
        foreach ($bookIds as $bookId) {
            $response = $this->connection->query("UPDATE Book SET current_qty=current_qty-1 WHERE isbn='{$bookId}'");
            if ($response <= 0 || $this->connection->affected_rows<=0) {
                return false;
            }
        }
        return true;
    }

    public function getBookCount(): int
    {
        $rs = $this->connection->query("SELECT COUNT(*) AS count FROM Book");
        return $rs->fetch_assoc()['count'];
    }

    public function getAllAvailableBooks(): array
    {
        $resultSet = $this->connection->query("
            SELECT isbn,book_name,B.a_id,author_name,B.c_id,cat_name,P.p_id,pub_name,qty,current_qty
            FROM Book B, Author A, Category C, Publisher P
            WHERE B.a_id=A.a_id AND B.c_id=C.c_id AND B.p_id=P.p_id AND current_qty>0
        ");
        return $resultSet->fetch_all();
    }

    public function getBooksByBorrowOrderId($bro_id): array
    {
        $resultSet = $this->connection->query("
            SELECT isbn,book_name,B.a_id,author_name,B.c_id,cat_name,P.p_id,pub_name,qty,current_qty
            FROM Book B, Author A, Category C, Publisher P
            WHERE B.a_id=A.a_id AND B.c_id=C.c_id AND B.p_id=P.p_id AND
            isbn IN (SELECT isbn FROM Borrowing WHERE bro_id='{$bro_id}')
        ");
        return $resultSet->fetch_all();
    }
}
