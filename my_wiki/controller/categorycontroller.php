<?php
include_once 'model\categorydao.php';
include_once 'model\wikidao.php';
include_once 'model\tagdao.php';

class categoryController{


    function addcategory(){
        $categoryName = $_POST["name"] ; 
        $category = new CategoryDAO();
         $category->addCategory($categoryName);
         header("Location: index.php?action=getcategories");
         exit();  
     }
    
  
     function All(){
        $wiki = new WikiDAO();
        $wikis = $wiki->getLatest();
        $category = new CategoryDAO();
        $categories = $category->getLatest();
        $tag = new TagDAO();
        $tags = $tag->getLatest();

        include 'view\displayAll.php';
    }

 

    function getAllcategory(){
        $category = new CategoryDAO();
        $categories = $category->getAllCategories();
        include 'view\categorie\admin_page.php';
    }



    function displayCategory(){
        include 'view\categorie\addcategory.php';
    }



    function getcategory(){
        $id = $_GET['id'];
        $category = new CategoryDAO();
        $categories = $category->getCategoryById($id);
        include 'view\categorie\updatecategory.php';
    }



    function updatecategory(){
        $id= $_POST["category_id"];
        $name = $_POST["name"] ; 
        $category = new CategoryDAO();
        $category->updateCategory($name,$id);
        header("Location: index.php?action=getcategories");
    }



    function deletecategory($id){
        echo $id;
        $category = new CategoryDAO();
        $UpdateBus = $category->deleteCategory($id);
        header("Location: index.php?action=getcategories");
    }


    function editCategory() {
        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];
            $categoryDAO = new CategoryDAO();
            $category = $categoryDAO->getCategoryById($categoryId);
            include 'view/edit_category.php';
        }
    }


    
}  
