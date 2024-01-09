<?php
include_once 'model/config/connexion.php';
include_once 'model/category.php';

class CategoryDAO {
    private $pdo;

    

    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }

    // public function addCategory($categoryName){
    //     $insert = "INSERT INTO categories (category_name) VALUES (:categoryName)";
    //     $stmt = $this->pdo->prepare($insert);
    //     $stmt->bindParam(':categoryName', $categoryName);
    //     $stmt->execute();
    //     header('Location:index.php?action=categories');
    // }
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
            $categoryData[] = new Category($category['category_id'], $category['category_name']);
        }
        return $categoryData;
    }

    public function getCategoryById($categoryId){
        $selectById = "SELECT * FROM categories WHERE category_id = :categoryId";
        $stmt = $this->pdo->prepare($selectById);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        $category = $stmt->fetch();
        $categoryData = new Category($category['category_id'], $category['category_name']);
        return $categoryData;
    }

    // public function updateCategory($categoryId, $categoryName){
    //     $updateCategory = "UPDATE categories SET category_name = :categoryName WHERE category_id = :categoryId";
    //     $stmt = $this->pdo->prepare($updateCategory);
    //     $stmt->bindParam(':categoryName', $categoryName);
    //     $stmt->bindParam(':categoryId', $categoryId);
    //     $stmt->execute();
    //     header('Location:index.php?action=categories');
    // }

    public function deleteCategory($categoryId){
        $deleteCategory = "DELETE FROM categories WHERE category_id = :categoryId";
        $stmt = $this->pdo->prepare($deleteCategory);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        header('Location:index.php?action=categories');
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

    function updateCategory() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoryId = $_POST["id"];
            $newCategoryName = $_POST["name"];

            // Validate $categoryId and $newCategoryName if needed

            // Instantiate CategoryDAO and update the category
            $categoryDAO = new CategoryDAO();
            $categoryDAO->updateCategory($categoryId, $newCategoryName);

            // Redirect to a different page after updating the category
            header("Location: index.php?action=display_register");
        }
    }
}
?>
