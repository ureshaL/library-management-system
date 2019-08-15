<?php
require_once __DIR__."/../BorrowOrderBO.php";
require_once __DIR__."/../../model/Borrow_Order.php";
require_once __DIR__."/../../model/Borrowing.php";
require_once __DIR__."/../../repository/impl/BorrowOrderRepoImpl.php";
require_once __DIR__."/../../repository/impl/BorrowingRepoImpl.php";
require_once __DIR__."/../../repository/impl/BookRepoImpl.php";
require_once __DIR__."/../../db/DBConnection.php";

class BorrowOrderBOImpl implements BorrowOrderBO
{

    public function addBorrowOrder(Borrow_Order $borrow_Order, $isbn_list)
    {
        $connection = (new DBConnection())->getConnection();
        $connection->autocommit(false);

        $borrowOrderRepo = new BorrowOrderRepoImpl();
        $borrowingRepo = new BorrowingRepoImpl();
        $bookRepo = new BookRepoImpl();

        $borrowOrderRepo->setConnection($connection);
        $borrowingRepo->setConnection($connection);
        $bookRepo->setConnection($connection);

        $isAdd1 = $borrowOrderRepo->addBorrowOrder($borrow_Order);
        $bro_id = $connection->insert_id;

        $borrowings = [];
        foreach ($isbn_list as $isbn) {
            array_push($borrowings, new Borrowing($bro_id, $isbn, 0));
        }
        $isAdd2 = $borrowingRepo->addBorrowings($borrowings);

        $isAdd3 = $bookRepo->markBooksBorrowed($isbn_list);

        if ($isAdd1 && $isAdd2 && $isAdd3) {
            $connection->commit();
            $connection->autocommit(true);
            return true;
        } else {
            $connection->rollback();
            $connection->autocommit(true);
            return false;
        }

    }

    public function getBorrowingCount()
    {
        $borrowingRepo = new BorrowingRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $borrowingRepo->setConnection($connection);
        $count = $borrowingRepo->getBorrowingCount();
        return $count;
    }
}
