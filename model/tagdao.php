<?php
include_once 'model/config/connexion.php';
include_once 'model/tag.php';

class TagDAO {
    private $pdo;

    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }

    public function addTag($tagName){
        $insert = "INSERT INTO tags (tag_name) VALUES (:tagName)";
        $stmt = $this->pdo->prepare($insert);
        $stmt->bindParam(':tagName', $tagName);
        $stmt->execute();
        header('Location:index.php?action=tags');
    }

    public function getAllTags(){
        $selectAll = "SELECT * FROM tags";
        $stmt = $this->pdo->prepare($selectAll);
        $stmt->execute();
        $tagData = array();
        $allTags = $stmt->fetchAll();
        foreach($allTags as $tag){
            $tagData[] = new Tag($tag['tag_id'], $tag['tag_name']);
        }
        return $tagData;
    }

    public function getTagById($tagId){
        $selectById = "SELECT * FROM tags WHERE tag_id = :tagId";
        $stmt = $this->pdo->prepare($selectById);
        $stmt->bindParam(':tagId', $tagId);
        $stmt->execute();
        $tag = $stmt->fetch();
        $tagData = new Tag($tag['tag_id'], $tag['tag_name']);
        return $tagData;
    }

    public function updateTag($tagId, $tagName){
        $updateTag = "UPDATE tags SET tag_name = :tagName WHERE tag_id = :tagId";
        $stmt = $this->pdo->prepare($updateTag);
        $stmt->bindParam(':tagName', $tagName);
        $stmt->bindParam(':tagId', $tagId);
        $stmt->execute();
        header('Location:index.php?action=tags');
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
