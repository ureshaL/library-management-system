<?php
require_once __DIR__."/../../model/Category.php";
require_once __DIR__."/../CategoryRepo.php";

class CategoryRepoImpl implements CategoryRepo
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function addCategory(Category $category): bool
    {
        $response=  $this->connection->query("INSERT INTO Category (cat_name) VALUES ('{$category->getCatName()}')");
        if ($response>0 && $this->connection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function updateCategory(Category $category): bool
    {
        $response=  $this->connection->query("UPDATE Category SET cat_name=('{$category->getCatName()}') WHERE c_id=('{$category->getCId()}')");
        if ($response>0 && $this->connection->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCategory($categoryID): bool
    {
        $response =  $this->connection->query("delete from Category where c_id='{$categoryID}'");
        if ($response > 0 && $this->connection->affected_rows>0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCategory(): array
    {
        $resultSet =   $this->connection->query("select * from Category");
        return $resultSet->fetch_all();
    }

    public function getCategoryCount(): int
    {
        $rs = $this->connection->query("SELECT COUNT(*) AS count FROM Category");
        return $rs->fetch_assoc()['count'];
    }
}
