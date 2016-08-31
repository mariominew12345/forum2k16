<?php

require_once('Service/categoriesService.php');

$categoryService = new CategoriesService();

if (isset($_POST['createCategory'])){
    try{
        if (!$categoryService->getCategoryByName($_POST['name'])){

            $category = new Category();
            $category->setName($_POST['name']);
            $category->setDescription($_POST['description']);
            $categoryService->createCategory($category);
        } else {
            header("Location: index.php?page=error&error="."Category already exists!");
        }

    }
    catch(Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
    }
}


if (isset($_POST['deleteCategory'])){
    try{
        $categoryService->deleteCategoryById($_POST['categoryToDelete']);
        header('Location: index.php?page=admin');
        die();
    }
    catch(Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
    }
}