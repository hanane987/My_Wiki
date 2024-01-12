<?php

include_once 'model\class\categoryclass.php';

class CategoryDAO {
    private $pdo;

    

    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }

    public function addCategory($categoryName) {
        $query = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($query);
        
        $stmt->bindParam(':name', $categoryName);

        try {
            $stmt->execute();
            // Return some indication of success, e.g., the new category ID or a boolean value
            return $this->pdo->lastInsertId();  // Assuming auto-incremented primary key
        } catch (PDOException $e) {
            // Handle the exception, e.g., log the error or return an error message
            return false;
        }
    }
    public function getAllCategories(){
        $selectAll = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($selectAll);
        $stmt->execute();
        $categoryData = array();
        $allCategories = $stmt->fetchAll();
        foreach($allCategories as $category){
            $categoryData[] = new Category($category['category_id'], $category['name'],$category['created_at']);
        }
        return $categoryData;
    }


    public function getLatest(){
        $sql = "SELECT * FROM categories ORDER BY STR_TO_DATE(created_at, '%Y-%m-%d %H:%i:%s') DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $wikiData = array();
        $allCategories = $stmt->fetchAll();
        foreach($allCategories as $category){
            $wikiData[] =new Category($category['category_id'], $category['name'],$category['created_at']);
        }
        return $wikiData;
    }




    public function getCategoryById($categoryId){
        $selectById = "SELECT * FROM categories WHERE category_id = :categoryId";
        $stmt = $this->pdo->prepare($selectById);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        $category = $stmt->fetch();
        $categoryData = new Category($category['category_id'], $category['name'],$category['created_at']);
        return $categoryData;
    }

    

    public function deleteCategory($categoryId){
        $deleteCategory = "DELETE FROM categories WHERE category_id = :categoryId";
        $stmt = $this->pdo->prepare($deleteCategory);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        // header('Location:index.php?action=categories');
    }
    function displayUpdateForm() {
        // Assuming you are passing the category ID as a parameter in the URL
        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];

            // Instantiate CategoryDAO and get the category details
            $categoryDAO = new CategoryDAO();
            $category = $categoryDAO->getCategoryById($categoryId);

            // Include the view for updating the category
            include 'view/update_category_form.php';
        } else {
            // Handle the case when category_id is not provided
            echo "Category ID is missing.";
        }
    }

     
    public function updateCategory($name,$category_id){
        $UpdateCategory = "UPDATE categories set name = '$name' where category_id='$category_id'";
        $stmt = $this->pdo->prepare($UpdateCategory);
        $stmt->execute();
    }
    
}

