<?php
require_once __DIR__."/../bo/impl/BorrowOrderBOImpl.php";

$method = $_SERVER["REQUEST_METHOD"];
$borrowOrderBO = new BorrowOrderBOImpl();

switch ($method){
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
