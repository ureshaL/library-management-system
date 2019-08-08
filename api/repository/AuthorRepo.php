<?php
require_once __DIR__."/../model/Author.php";

interface AuthorRepo
{
    public function setConnection(mysqli $connection);

    public function addAuthor(Author $author):bool;

    public function updateAuthor(Author $author):bool ;

    public function deleteAuthor($authorID): bool ;

    public function getAllAuthors():array ;
}