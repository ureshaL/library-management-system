<?php
require_once __DIR__."/../model/Borrow_Order.php";

interface BorrowOrderBO
{
    public function addBorrowOrder(Borrow_Order $borrow_Order, Borrowing ...$borrowings);
}