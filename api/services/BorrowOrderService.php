<?php
require_once __DIR__."/../bo/impl/BorrowOrderBOImpl.php";

$method = $_SERVER["REQUEST_METHOD"];
$borrowOrderBO = new BorrowOrderBOImpl();

switch ($method){
    case "POST":
        $action = $_GET["action"];
        switch ($action) {
            case "save":
                $json = file_get_contents("php://input");
                $object = json_decode($json);

                $broID = $object->borrowID;
                $date = $object->date;
                $userNic = $object->nic;

                $newO = new Borrow_Order($broID, $date, $userNic);
                $borrowings = [];
                foreach ($object->borrowing as $b) {
                    $broID = $b->borrowID;
                    $isbn = $b->isbn;
                    $status = $b->status;

                    $borrowing = new Borrowing($broID, $isbn, $status);
                    array_push($borrowings, $borrowing);
                }
                $res = $borrowOrderBO->addBorrowOrder($newO, $borrowings);
                echo $res;
                break;
        }
        break;
    default:
        echo "Sorry System Error..!";
}
