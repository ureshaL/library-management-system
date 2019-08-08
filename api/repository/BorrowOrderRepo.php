<?php
require_once __DIR__."/../model/Borrow_Order.php";

interface BorrowOrderRepo
{
    public function setConnection(mysqli $connection);

    public function addBorrowOrder(Borrow_Order $borrow_Order):bool;
}