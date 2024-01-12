<?php

include_once 'model\class\tagclass.php';

class TagDAO {
    private $pdo;

    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }

    public function addTag($tagName){
        $insert = "INSERT INTO tags (name) VALUES (:tagName)";
        $stmt = $this->pdo->prepare($insert);
        $stmt->bindParam(':tagName', $tagName);
        $stmt->execute();
        
    }

    public function getAllTags(){
        $selectAll = "SELECT * FROM tags";
        $stmt = $this->pdo->prepare($selectAll);
        $stmt->execute();
        $tagData = array();
        $allTags = $stmt->fetchAll();
        foreach($allTags as $tag){
            $tagData[] = new Tag($tag['tag_id'], $tag['name'],$tag['created_at']);
        }
        return $tagData;
    }

    public function getLatest(){
        $sql = "SELECT * FROM tags ORDER BY STR_TO_DATE(created_at, '%Y-%m-%d %H:%i:%s') DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $tagData = array();
        $allTags = $stmt->fetchAll();
        foreach($allTags as $tag){
            $tagData[] =new Tag($tag['tag_id'], $tag['name'],$tag['created_at']);
        }
        return $tagData;
    }

    public function getTagById($tagId){
        $selectById = "SELECT * FROM tags WHERE tag_id = :tagId";
        $stmt = $this->pdo->prepare($selectById);
        $stmt->bindParam(':tagId', $tagId);
        $stmt->execute();
        $tag = $stmt->fetch();
        $tagData = new Tag($tag['tag_id'], $tag['name'],$tag['created_at']);
        return $tagData;
    }

    // public function updateTag($tagName, $tagId){
    //     $updateTag = "UPDATE tags SET name = '$tagName' where tag_id ='$tagId'";
    //     $stmt = $this->pdo->prepare($updateTag);
    //     $stmt->bindParam(':tagName', $tagName);
    //     $stmt->bindParam(':tagId', $tagId);
    //     $stmt->execute();
    // }
    
    public function updateTag($id,$name){
        $updateTag = "UPDATE tags SET name = '$name' WHERE tag_id = '$id'";
        $stmt = $this->pdo->prepare($updateTag);
        $stmt->execute();

    }
    
   




    public function deleteTag($tagId){
        $deleteTag = "DELETE FROM tags WHERE tag_id = :tagId";
        $stmt = $this->pdo->prepare($deleteTag);
        $stmt->bindParam(':tagId', $tagId);
        $stmt->execute();
        header('Location:index.php?action=tags');
    }
}
?>
