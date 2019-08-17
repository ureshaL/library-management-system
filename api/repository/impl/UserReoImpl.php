<?php
require_once __DIR__."/../UserRepo.php";
require_once __DIR__."/../../model/User.php";

class UserReoImpl implements UserRepo
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function addUser(User $user): bool
    {
        $response=  $this->connection->query("INSERT INTO User VALUES (
                '{$user->getNic()}',
                '{$user->getUserName()}',
                '{$user->getMobile()}',
                '{$user->getAddress()}')
        ");
        if ($response>0 && $this->connection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function updateUser(User $user): bool
    {
        $response=  $this->connection->query("UPDATE User SET 
                user_name=('{$user->getUserName()}'),
                mobile=('{$user->getMobile()}'), 
                address=('{$user->getAddress()}') 
                WHERE 
                nic=('{$user->getNic()}')
        ");
        if ($response>0 && $this->connection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteUser($userID): bool
    {
        $response =  $this->connection->query("delete from User where nic='{$userID}'");
        if ($response > 0 && $this->connection->affected_rows>0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllUsers(): array
    {
        $resultSet =   $this->connection->query("select * from User");
        return $resultSet->fetch_all();
    }

    public function getUserCount(): int
    {
        $rs = $this->connection->query("SELECT COUNT(*) AS count FROM User");
        return $rs->fetch_assoc()['count'];
    }

    public function searchUser($userID)
    {
        $resultSet =   $this->connection->query("select * from User where nic='{$userID}'");
        return $resultSet->fetch_assoc();
    }
}
