<?php
require_once __DIR__."/../model/Borrowing.php";

interface BorrowingRepo
{
    public function addBorrowings($borrowings):bool;

    public function getBorrowingCount():int;
}