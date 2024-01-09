<?php
include_once 'model\categorydao.php';
class categoryController{


    function addcategory(){
        $categoryName = $_POST["name"] ; 
       
        $category = new CategoryDAO();
         $category->addCategory($categoryName);
        header("Location: index.php?action=display_register");
        
    }

    // function addCategory() {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $categoryName = $_POST["name"];

    //         // Validate $categoryName if needed

    //         // Instantiate CategoryDAO and add the category
    //         $categoryDAO = new CategoryDAO();
    //         $categoryDAO->addCategory($categoryName);

    //         // Redirect to a different page after adding the category
    //         header("Location: index.php?action=display_register");
    //     }
    // }

    function editCategory() {
        // Assume you are passing the category ID as a parameter in the URL
        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];

            // Instantiate CategoryDAO and get the category details
            $categoryDAO = new CategoryDAO();
            $category = $categoryDAO->getCategoryById($categoryId);

            // Include the view for editing the category
            include 'view/edit_category.php';
        }
    }

    function updateCategory() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoryId = $_POST["id"];
            $newCategoryName = $_POST["new_name"];

            // Validate $categoryId and $newCategoryName if needed

            // Instantiate CategoryDAO and update the category
            $categoryDAO = new CategoryDAO();
            $categoryDAO->updateCategory($categoryId, $newCategoryName);

            // Redirect to a different page after updating the category
            header("Location: index.php?action=display_register");
        }
    }
}
   
    // public function addCategory($categoryName) {
    //         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //             // Assuming you have some form validation here
    
    //             $categoryName = $_POST["name"];
    
    //             $categoryDAO = new CategoryDAO();
    //             $result = $categoryDAO->addCategory($categoryName);
    
    //             if ($result !== false) {
    //                 // Category added successfully
    //                 // You can redirect, show a success message, etc.
    //                 // header("Location: index.php?action=success");
    //                 exit();
    //             } else {
    //                 // Handle the case where adding the category failed
    //                 echo "Error adding category.";
    //             }
    //         }
    //         include('view\addcategory.php');
    //     }
    
    
