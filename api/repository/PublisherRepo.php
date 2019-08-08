<?php
require_once __DIR__."/../model/Publisher.php";

interface PublisherRepo
{
    public function setConnection(mysqli $connection);

    public function addPublisher(Publisher $publisher):bool;

    public function updatePublisher(Publisher $publisher):bool ;

    public function deletePublisher($publisherId): bool ;

    public function getAllPublisher():array ;
}