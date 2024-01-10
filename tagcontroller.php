<?php
include_once 'model\class\tagclass.php';
class  tagcontroller{

public function addtag(){
    $tagName = $_POST["tagName"] ; 
    $tag = new TagDAO();
     $tag->addTag($tagName);
     header("Location: index.php?action=getcategories");
     exit();  
      }
      function getAllcategory(){
        $tag = new TagDAO();
        $tags = $tag->getAllTags();
        include 'view\admin_page.php';
    }
}


