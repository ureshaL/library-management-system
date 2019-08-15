<?php
require_once __DIR__."/../BorrowingRepo.php";
require_once __DIR__."/../../model/Borrowing.php";

class BorrowingRepoImpl implements BorrowingRepo
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function addBorrowings($borrowings): bool
    {
        foreach ($borrowings as $borrowing) {
            $response=  $this->connection->query("INSERT INTO Borrowing VALUES (
                '{$borrowing->getBroId()}',
                '{$borrowing->getIsbn()}',
                '{$borrowing->getStatus()}'
                )
            ");
            if ($response<=0 || $this->connection->affected_rows<=0){
                return false;
            }
        }
        return true;
    }
}