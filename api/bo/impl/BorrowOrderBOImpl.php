<?php
require_once __DIR__."/../BorrowOrderBO.php";
require_once __DIR__."/../../model/Borrow_Order.php";
require_once __DIR__."/../../model/Borrowing.php";
require_once __DIR__."/../../repository/impl/BorrowOrderRepoImpl.php";
require_once __DIR__."/../../repository/impl/BorrowingRepoImpl.php";
require_once __DIR__."/../../db/DBConnection.php";

class BorrowOrderBOImpl implements BorrowOrderBO
{

    public function addBorrowOrder(Borrow_Order $borrow_Order, Borrowing ...$borrowings)
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
        $isAdd2 = $borrowingRepo->addBorrowings($borrowings);
        $isAdd3 = $bookRepo->markBooksBorrowed(Borrowing::getIsbn());

        if ($isAdd1){
            if ($isAdd2){
                if (!$isAdd3){
                    echo $connection->error;
                    $connection->rollback();
                    $connection->autocommit(true);
                    return false;
                }
                $connection->commit();
                $connection->autocommit(true);
                return true;
            }
            $connection->commit();
            $connection->autocommit(true);
            return true;
        }else{
            echo $connection->error;
            $connection->rollback();
            $connection->autocommit(true);
            return false;
        }
    }
}