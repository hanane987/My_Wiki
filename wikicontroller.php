<?php
include_once 'model\class\wikiclass.php';

class wikicontroller {
    private $wikiDAO;

    public function __construct() {
        $this->wikiDAO = new WikiDAO(); // Assuming you have a WikiDAO class
    }

    function addcategory(){
        $categoryName = $_POST["name"] ; 
        $category = new CategoryDAO();
         $category->addCategory($categoryName);
         header("Location: index.php?action=getcategories");
         exit();  
          }
    
    
}