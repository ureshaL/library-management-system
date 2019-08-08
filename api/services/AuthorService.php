<?php
require_once __DIR__."/../bo/impl/AuthorBOImpl.php";

$method = $_SERVER["REQUEST_METHOD"];
$authorBO = new AuthorBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "getAll":
                $AuthorArray = $authorBO->getAllAuthors();
                echo json_encode($AuthorArray);
                break;
        }
        break;
    case "POST":
        $action = $_GET["action"];
        switch ($action) {
            case "save":
                $authorName = $_POST["AuthorName"];
                $newAuthor = new Author(-1,$authorName);
                $res = $authorBO->addAuthor($newAuthor);
                echo json_encode(array('success' => $res));
                break;
            case "update":
                $aId = $_POST["AuthorID"];
                $authorName = $_POST["AuthorName"];
                $newAuthor = new Author($aId,$authorName);
                $res = $authorBO->updateAuthor($newAuthor);
                echo json_encode(array('success' => $res));
                break;
            case "delete":
                $aId = $_POST["AuthorID"];
                $res = $authorBO->deleteAuthor($aId);
                echo json_encode(array('success' => $res));
                break;
        }
        break;
    default:
        echo "Sorry System Error..!";
}