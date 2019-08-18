<?php
require_once __DIR__."/../BorrowOrderRepo.php";
require_once __DIR__."/../../model/Borrow_Order.php";

class BorrowOrderRepoImpl implements BorrowOrderRepo
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function addBorrowOrder(Borrow_Order $borrow_Order): bool
    {
        $response=  $this->connection->query("INSERT INTO Borrow_Order (date,User_nic) VALUES (
            '{$borrow_Order->getDate()}',
            '{$borrow_Order->getUserNic()}'
            )
        ");
        if ($response>0 && $this->connection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function getAllBorrowOrders(): array
    {
        $resultSet =   $this->connection->query("SELECT * FROM Borrow_Order");
        return $resultSet->fetch_all();
    }
}
