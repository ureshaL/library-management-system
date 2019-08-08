<?php
require_once __DIR__."/../../model/Category.php";
require_once __DIR__."/../CategoryRepo.php";

class CategoryRepoImpl implements CategoryRepo
{
    private $connnection;

    public function setConnection(mysqli $connection)
    {
        $this->connnection = $connection;
    }

    public function addCategory(Category $category): bool
    {
        $response=  $this->connnection->query("INSERT INTO Category (cat_name) VALUES ('{$category->getCatName()}')");
        if ($response>0 && $this->connnection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function updateCategory(Category $category): bool
    {
        // TODO: Implement updateCategory() method.
    }

    public function deleteCategory($categoryID): bool
    {
        // TODO: Implement deleteCategory() method.
    }

    public function getAllCategory(): array
    {
        // TODO: Implement getAllCategory() method.
    }
}