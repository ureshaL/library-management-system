<?php
require_once __DIR__."/../model/Borrow_Order.php";

interface BorrowOrderBO
{
    public function addBorrowOrder(Borrow_Order $borrow_Order, $isbn_list);
    public function getBorrowingCount();
    public function getAllBorrowOrders(): array;
}
