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
        $response=  $this->connnection->query("UPDATE Category SET cat_name=('{$category->getCatName()}') WHERE c_id=('{$category->getCId()}')");
        if ($response>0 && $this->connnection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCategory($categoryID): bool
    {
        $response =  $this->connnection->query("delete from Category where c_id='{$categoryID}'");
        if ($response > 0 && $this->connnection->affected_rows>0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCategory(): array
    {
        $resultSet =   $this->connnection->query("select * from Category");
        return $resultSet->fetch_all();
    }
}