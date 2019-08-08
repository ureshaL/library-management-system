<?php
require_once __DIR__."/../AuthorRepo.php";
require_once __DIR__."/../../model/Author.php";

class AuthorRepoImpl implements AuthorRepo
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function addAuthor(Author $author): bool
    {
        $response=  $this->connection->query("INSERT INTO Author (author_name) VALUES ('{$author->getAuthorName()}')");
        if ($response>0 && $this->connection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function updateAuthor(Author $author): bool
    {
        $response=  $this->connection->query("UPDATE Author SET author_name=('{$author->getAuthorName()}') WHERE a_id=('{$author->getAId()}')");
        if ($response>0 && $this->connection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteAuthor($authorID): bool
    {
        $response =  $this->connection->query("delete from Author where a_id='{$authorID}'");
        if ($response > 0 && $this->connection->affected_rows>0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllAuthors(): array
    {
        $resultSet =   $this->connection->query("select * from Author");
        return $resultSet->fetch_all();
    }
}