<?php
require_once __DIR__."/../UserRepo.php";
require_once __DIR__."/../../model/User.php";

class UserReoImpl implements UserRepo
{
    private $connnection;

    public function setConnection(mysqli $connection)
    {
        $this->connnection = $connection;
    }

    public function addUser(User $user): bool
    {
        $response=  $this->connnection->query("INSERT INTO User VALUES ('{$user->getNic()}','{$user->getUserName()}','{$user->getMobile()}','{$user->getAddress()}')");
        if ($response>0 && $this->connnection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function updateUser(User $user): bool
    {
        $response=  $this->connnection->query("UPDATE User SET user_name=('{$user->getUserName()}'), mobile=('{$user->getMobile()}'), address=('{$user->getAddress()}') WHERE nic=('{$user->getNic()}')");
        if ($response>0 && $this->connnection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteUser($userID): bool
    {
        $response =  $this->connnection->query("delete from User where nic='{$userID}'");
        if ($response > 0 && $this->connnection->affected_rows>0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllUsers(): array
    {
        $resultSet =   $this->connnection->query("select * from User");
        return $resultSet->fetch_all();
    }
}