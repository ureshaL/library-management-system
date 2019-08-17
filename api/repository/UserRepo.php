<?php
require_once __DIR__."/../model/User.php";

interface UserRepo
{
    public function setConnection(mysqli $connection);

    public function addUser(User $user):bool;

    public function updateUser(User $user):bool ;

    public function deleteUser($userID): bool ;

    public function getAllUsers():array ;

    public function searchUser($userID);

    public function getUserCount():int;
}