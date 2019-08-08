<?php
require_once __DIR__."/../PublisherBO.php";
require_once __DIR__."/../../model/Publisher.php";
require_once __DIR__."/../../repository/impl/PublisherRepoImpl.php";
require_once __DIR__."/../../db/DBConnection.php";

class PublisherBOImpl implements PublisherBO
{

    public function addPublisher(Publisher $publisher)
    {
        $publisherRepo = new PublisherRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $publisherRepo->setConnection($connection);
        $res = $publisherRepo->addPublisher($publisher);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function updatePublisher(Publisher $publisher)
    {
        $publisherRepo = new PublisherRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $publisherRepo->setConnection($connection);
        $res = $publisherRepo->updatePublisher($publisher);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function deletePublisher($publisherId)
    {
        $publisherRepo = new PublisherRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $publisherRepo->setConnection($connection);
        $res = $publisherRepo->deletePublisher($publisherId);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function getAllPublisher()
    {
        $publisherRepo = new PublisherRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $publisherRepo->setConnection($connection);
        $publisherArray = $publisherRepo->getAllPublisher();
        return $publisherArray;
    }
}