<?php
require_once __DIR__."/../model/Category.php";

interface CategoryRepo
{
    public function setConnection(mysqli $connection);

    public function addCategory(Category $category):bool;

    public function updateCategory(Category $category):bool ;

    public function deleteCategory($categoryID): bool ;

    public function getAllCategory():array ;

    public function getCategoryCount():int;
}