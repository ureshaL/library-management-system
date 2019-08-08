<?php
require_once __DIR__."/../bo/impl/PublisherBOImpl.php";

$method = $_SERVER["REQUEST_METHOD"];
$publisherBO=new PublisherBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "getAll":
                $publisherArray = $publisherBO->getAllPublisher();
                echo json_encode($publisherArray);
                break;
        }
        break;
    case "POST":
        $action = $_GET["action"];
        switch ($action) {
            case "save":
                $pubName = $_POST["publisherName"];
                $newPublisher = new Publisher(-1,$pubName);
                $res = $publisherBO->addPublisher($newPublisher);
                echo json_encode(array('success' => $res));
                break;
            case "update":
                $pId = $_POST["publisherID"];
                $pubName = $_POST["publisherName"];
                $newPublisher = new Publisher($pId,$pubName);
                $res = $publisherBO->updatePublisher($newPublisher);
                echo json_encode(array('success' => $res));
                break;
            case "delete":
                $pId = $_POST["publisherID"];
                $res = $publisherBO->deletePublisher($pId);
                echo json_encode(array('success' => $res));
                break;
        }
        break;
    default:
        echo "Sorry System Error..!";
}

