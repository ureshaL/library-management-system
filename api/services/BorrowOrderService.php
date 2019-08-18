<?php
require_once __DIR__."/../bo/impl/BorrowOrderBOImpl.php";
require_once __DIR__."/../bo/impl/BookBOImpl.php";
require_once __DIR__."/../bo/impl/UserBOImpl.php";
require_once __DIR__."/../bo/impl/CategoryBOImpl.php";

$method = $_SERVER["REQUEST_METHOD"];

$borrowOrderBO = new BorrowOrderBOImpl();
$bookBO = new BookBOImpl();
$userBO = new UserBOImpl();
$categoryBO = new CategoryBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "getDashboardCounts":
                $bookCount = $bookBO->getBookCount();
                $userCount = $userBO->getUserCount();
                $categoryCount = $categoryBO->getCategoryCount();
                $borrowingCount = $borrowOrderBO->getBorrowingCount();
                echo json_encode(array(
                    "bookCount" => $bookCount,
                    "userCount" => $userCount,
                    "categoryCount" => $categoryCount,
                    "borrowingCount" => $borrowingCount,
                ));
                break;
            case "getAll":
                $result = $borrowOrderBO->getAllBorrowOrders();
                echo json_encode($result);
                break;
        }
        break;
    case "POST":
        $action = $_GET["action"];
        switch ($action) {
            case "placeBorrowOrder":
                $json = file_get_contents("php://input");
                $object = json_decode($json);

                $borrow_order = $object->borrow_order;
                $isbn_list = $object->isbn_list;

                $res = $borrowOrderBO->addBorrowOrder(
                    new Borrow_Order(-1, $borrow_order->date, $borrow_order->User_nic),
                    $isbn_list
                );
                echo json_encode(array(
                    "success" => $res
                ));
                break;
        }
        break;
    default:
        echo "Sorry System Error..!";
}
