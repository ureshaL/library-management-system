<?php
require_once __DIR__."/../AuthorRepo.php";
require_once __DIR__."/../../model/Author.php";

class AuthorRepoImpl implements AuthorRepo
{
    private $connnection;

    public function setConnection(mysqli $connection)
    {
        $this->connnection = $connection;
    }

    public function addAuthor(Author $author): bool
    {
        $response=  $this->connnection->query("INSERT INTO Author (author_name) VALUES ('{$author->getAuthorName()}')");
        if ($response>0 && $this->connnection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function updateAuthor(Author $author): bool
    {
        $response=  $this->connnection->query("UPDATE Author SET author_name=('{$author->getAuthorName()}') WHERE a_id=('{$author->getAId()}')");
        if ($response>0 && $this->connnection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteAuthor($authorID): bool
    {
        $response =  $this->connnection->query("delete from Author where a_id='{$authorID}'");
        if ($response > 0 && $this->connnection->affected_rows>0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllAuthors(): array
    {
        $resultSet =   $this->connnection->query("select * from Author");
        return $resultSet->fetch_all();
    }
}