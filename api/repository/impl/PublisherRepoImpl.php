<?php
require_once __DIR__."/../../model/Publisher.php";
require_once __DIR__."/../PublisherRepo.php";

class PublisherRepoImpl implements PublisherRepo
{
    private $connnection;

    public function setConnection(mysqli $connection)
    {
        $this->connnection = $connection;
    }

    public function addPublisher(Publisher $publisher): bool
    {
        $response=  $this->connnection->query("INSERT INTO Publisher (pub_name) VALUES ('{$publisher->getPubName()}')");
        if ($response>0 && $this->connnection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function updatePublisher(Publisher $publisher): bool
    {
        $response=  $this->connnection->query("UPDATE Publisher SET pub_name=('{$publisher->getPubName()}') WHERE p_id=('{$publisher->getPId()}')");
        if ($response>0 && $this->connnection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }
}