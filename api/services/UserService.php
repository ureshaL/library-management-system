<?php

require_once __DIR__."/../bo/impl/UserBOImpl.php";

$method = $_SERVER["REQUEST_METHOD"];
$userBO = new UserBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "getAll":
                $UserArray = $userBO->getAllUsers();
                echo json_encode($UserArray);
                break;
            case "search":
                $userID = $_GET["nic"];
                $user = $userBO->searchUser($userID);
                echo json_encode(array(
                    "user" => $user
                ));
                break;
        }
        break;
    case "POST":
        $action = $_GET["action"];
        switch ($action) {
            case "save":
                $nic = $_POST["nic"];
                $userName = $_POST["userName"];
                $mobile = $_POST["mobile"];
                $address = $_POST["address"];
                $newUser = new User($nic,$userName,$mobile,$address);
                $res = $userBO->addUser($newUser);
                echo json_encode(array('success' => $res));
                break;
            case "update":
                $nic = $_POST["nic"];
                $userName = $_POST["userName"];
                $mobile = $_POST["mobile"];
                $address = $_POST["address"];
                $newUser = new User($nic,$userName,$mobile,$address);
                $res = $userBO->updateUser($newUser);
                echo json_encode(array('success' => $res));
                break;
            case "delete":
                $nic = $_POST["nic"];
                $res = $userBO->deleteUser($nic);
                echo json_encode(array('success' => $res));
                break;
        }
        break;
    default:
        echo "Sorry System Error..!";
}
