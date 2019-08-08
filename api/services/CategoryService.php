<?php
require_once __DIR__."/../bo/impl/CategoryBOImpl.php";

$method = $_SERVER["REQUEST_METHOD"];
$categoryBO = new CategoryBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "getAll":
                $CategoryArray = $categoryBO->getAllCategory();
                echo json_encode($CategoryArray);
                break;
        }
        break;
    case "POST":
        $action = $_GET["action"];
        switch ($action) {
            case "save":
                $catName = $_POST["CategoryName"];
                $newCategory = new Category(-1,$catName);
                $res = $categoryBO->addCategory($newCategory);
                echo json_encode(array('success' => $res));
                break;
            case "update":
                $cId = $_POST["CategoryID"];
                $catName = $_POST["CategoryName"];
                $newCategory = new Category($cId,$catName);
                $res = $categoryBO->updateCategory($newCategory);
                echo json_encode(array('success' => $res));
                break;
            case "delete":
                $cId = $_POST["CategoryID"];
                $res = $categoryBO->deleteCategory($cId);
                echo json_encode(array('success' => $res));
                break;
        }
        break;
    default:
        echo "Sorry System Error..!";
}