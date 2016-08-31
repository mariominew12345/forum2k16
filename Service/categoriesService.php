<?php
require_once('Manager/categoriesManager.php');

class CategoriesService{

    private $manager;

    function __construct() {
        $this->manager = new CategoryManager();
    }

    function createCategory(Category $category){
        $this->manager->createCategory($category);
    }

    function getCategoryByName($name){
        return $this->manager->getCategoryByName($name);
    }

    function getCategoryById($id){
        return $this->manager->getCategoryByName($id);
    }

    function getCategories($limit){
        return $this->manager->getCategories($limit);
    }

    function deleteCategoryById($id){
        $this->manager->deleteCategoryById($id);
    }
}
?>