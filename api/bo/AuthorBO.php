<?php
require_once __DIR__."/../model/Author.php";

interface AuthorBO
{
    public function addAuthor(Author $author);
    public function updateAuthor(Author $author);
    public function deleteAuthor($authorID);
    public function getAllAuthors();
}