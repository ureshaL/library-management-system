<?php
require_once __DIR__."/../model/User.php";

interface UserBO
{
    public function addUser(User $user);
    public function updateUser(User $user);
    public function deleteUser($userID);
    public function getAllUsers();
    public function getUserCount();
}
