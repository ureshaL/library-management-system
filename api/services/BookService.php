<?php
require_once __DIR__."/../bo/impl/BookBOImpl.php";

$method = $_SERVER["REQUEST_METHOD"];
$bookBO = new BookBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "getAll":
                $BookArray = $bookBO->getAllBooks();
                echo json_encode($BookArray);
                break;
        }
        break;
    case "POST":
        $action = $_GET["action"];
        switch ($action) {
            case "save":
                $isbn = $_POST["isbn"];
                $bookName = $_POST["bookName"];
                $aId= $_POST["authorId"];
                $cId = $_POST["categoryId"];
                $pId = $_POST["publisherId"];
                $qty = $_POST["qty"];
                $newBook = new Book();
                $newBook->setIsbn($isbn);
                $newBook->setBookName($bookName);
                $newBook->setAId($aId);
                $newBook->setCId($cId);
                $newBook->setPId($pId);
                $newBook->setQty($qty);
                $res = $bookBO->addBook($newBook);
                echo json_encode(array('success' => $res));
                break;
            case "update":
                $isbn = $_POST["isbn"];
                $bookName = $_POST["bookName"];
                $aId= $_POST["authorId"];
                $cId = $_POST["categoryId"];
                $pId = $_POST["publisherId"];
                $qty = $_POST["qty"];
                $newBook = new Book();
                $newBook->setIsbn($isbn);
                $newBook->setBookName($bookName);
                $newBook->setAId($aId);
                $newBook->setCId($cId);
                $newBook->setPId($pId);
                $newBook->setQty($qty);
                $res = $bookBO->updateBook($newBook);
                echo json_encode(array('success' => $res));
                break;
            case "delete":
                $isbn = $_POST["isbn"];
                $res = $bookBO->deleteBook($isbn);
                echo json_encode(array('success' => $res));
                break;
        }
        break;
    default:
        echo "Sorry System Error..!";
}