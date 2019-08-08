<?php
require_once __DIR__."/../AuthorBO.php";
require_once __DIR__."/../../model/Author.php";
require_once __DIR__."/../../repository/impl/AuthorRepoImpl.php";
require_once __DIR__."/../../db/DBConnection.php";

class AuthorBOImpl implements AuthorBO
{

    public function addAuthor(Author $author)
    {
        $authorRepo = new AuthorRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $authorRepo->setConnection($connection);
        $res = $authorRepo->addAuthor($author);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function updateAuthor(Author $author)
    {
        $authorRepo = new AuthorRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $authorRepo->setConnection($connection);
        $res = $authorRepo->updateAuthor($author);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function deleteAuthor($authorID)
    {
        $authorRepo = new AuthorRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $authorRepo->setConnection($connection);
        $res = $authorRepo->deleteAuthor($authorID);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function getAllAuthors()
    {
        $authorRepo = new AuthorRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $authorRepo->setConnection($connection);
        $authorArray = $authorRepo->getAllAuthors();
        return $authorArray;
    }
}