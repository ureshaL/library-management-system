<?php
require_once __DIR__."/../BorrowOrderBO.php";
require_once __DIR__."/../../model/Borrow_Order.php";
require_once __DIR__."/../../repository/impl/BorrowOrderRepoImpl.php";
require_once __DIR__."/../../db/DBConnection.php";

class BorrowOrderBOImpl implements BorrowOrderBO
{

    public function addBorrowOrder(Borrow_Order $borrow_Order)
    {
        $borrowOrder = new BorrowOrderRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $borrowOrder->setConnection($connection);
        $res = $borrowOrder->addBorrowOrder($borrow_Order);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }
}