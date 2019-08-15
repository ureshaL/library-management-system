<?php
require_once __DIR__."/../model/Category.php";

interface CategoryBO
{
    public function addCategory(Category $category);
    public function updateCategory(Category $category);
    public function deleteCategory($categoryID);
    public function getAllCategory();
    public function getCategoryCount();
}
