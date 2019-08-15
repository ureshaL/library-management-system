<?php
require_once __DIR__."/../CategoryBO.php";
require_once __DIR__."/../../model/Category.php";
require_once __DIR__."/../../db/DBConnection.php";
require_once __DIR__."/../../repository/impl/CategoryRepoImpl.php";

class CategoryBOImpl implements CategoryBO
{

    public function addCategory(Category $category)
    {
        $categoryRepo = new CategoryRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $categoryRepo->setConnection($connection);
        $res = $categoryRepo->addCategory($category);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function updateCategory(Category $category)
    {
        $categoryRepo = new CategoryRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $categoryRepo->setConnection($connection);
        $res = $categoryRepo->updateCategory($category);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function deleteCategory($categoryID)
    {
        $categoryRepo = new CategoryRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $categoryRepo->setConnection($connection);
        $res = $categoryRepo->deleteCategory($categoryID);
        if ($res){
            return true;
        }else{
            return $connection->error;
        }
    }

    public function getAllCategory()
    {
        $categoryRepo = new CategoryRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $categoryRepo->setConnection($connection);
        $categoryArray = $categoryRepo->getAllCategory();
        return $categoryArray;
    }

    public function getCategoryCount()
    {
        $categoryRepo = new CategoryRepoImpl();
        $connection = (new DBConnection())->getConnection();
        $categoryRepo->setConnection($connection);
        $count = $categoryRepo->getCategoryCount();
        return $count;
    }
}
