<?php
require_once __DIR__."/../UserBO.php";
require_once __DIR__."/../../model/User.php";
require_once __DIR__."/../../repository/impl/UserReoImpl.php";
require_once __DIR__."/../../db/DBConnection.php";

class UserBOImpl implements UserBO
{

    public function addUser(User $user)
    {
        $userRepo = new UserReoImpl();
        $connection = (new DBConnection())->getConnection();
        $userRepo->setConnection($connection);
        $res = $userRepo->addUser($user);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function updateUser(User $user)
    {
        $userRepo = new UserReoImpl();
        $connection = (new DBConnection())->getConnection();
        $userRepo->setConnection($connection);
        $res = $userRepo->updateUser($user);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function deleteUser($userID)
    {
        $userRepo = new UserReoImpl();
        $connection = (new DBConnection())->getConnection();
        $userRepo->setConnection($connection);
        $res = $userRepo->deleteUser($userID);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function getAllUsers()
    {
        $userRepo = new UserReoImpl();
        $connection = (new DBConnection())->getConnection();
        $userRepo->setConnection($connection);
        $userArray = $userRepo->getAllUsers();
        return $userArray;
    }

    public function getUserCount()
    {
        $userRepo = new UserReoImpl();
        $connection = (new DBConnection())->getConnection();
        $userRepo->setConnection($connection);
        $count = $userRepo->getUserCount();
        return $count;
    }
}
