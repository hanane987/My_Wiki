<?php
session_start();
include_once 'model\class\wikiclass.php';


class WikiDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllwikis(){
        $sql = "SELECT * FROM wikis WHERE user_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $_SESSION['user_id']);      
        $stmt->execute();
        $wikiData = array();
        $allwikis = $stmt->fetchAll();
        foreach($allwikis as $wiki){
            $wikiData[] = new wiki($wiki['wiki_id'],$wiki['title'], $wiki['content'],$wiki['user_id'],$wiki['category_id'],$wiki['created_at'],$wiki['is_archived']);
        }
        return $wikiData;
    }

    public function getLatest(){
        $sql = "SELECT * FROM wikis ORDER BY STR_TO_DATE(created_at, '%Y-%m-%d %H:%i:%s') DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $wikiData = array();
        $allwikis = $stmt->fetchAll();
        foreach($allwikis as $wiki){
            $wikiData[] = new wiki($wiki['wiki_id'],$wiki['title'], $wiki['content'],$wiki['user_id'],$wiki['category_id'],$wiki['created_at'],$wiki['is_archived']);
        }
        return $wikiData;
    }

    public function Archived($id) {
        $currentValue = $this->getCurrentArchivedValue($id);
        $newValue = ($currentValue == 0) ? 1 : 0;
        $updateQuery = "UPDATE wikis SET is_archived = '$newValue' WHERE wiki_id = '$id'";
        $stmt = $this->pdo->prepare($updateQuery);
        $stmt->execute();
    }
    
    private function getCurrentArchivedValue($id) {
        $selectQuery = "SELECT is_archived FROM wikis WHERE wiki_id = '$id'";
        $stmt = $this->pdo->prepare($selectQuery);
        $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return isset($result['is_archived']) ? $result['is_archived'] : null;
    }


    // public function getWikisByCategory($categoryId) {
    //     $query = "SELECT * FROM app_wikis WHERE category_id = :categoryId";
    //     $params = [':categoryId' => $categoryId];
    //     $results = $this->fetchAll($query, $params);

    //     $wikis = [];
    //     foreach ($results as $result) {
    //         $wikis[] = new AppWiki(
    //             $result['wiki_id'],
    //             $result['title'],
    //             $result['content'],
    //             $result['user_id'],
    //             $result['category_id'],
    //             $result['created_at'],
    //             $result['is_archived']
    //         );
    //     }

    //     return $wikis;
    // }

    public function archiveWiki($wikiId) {
        $query = "UPDATE app_wikis SET is_archived = 1 WHERE wiki_id = :wikiId";
        $params = [':wikiId' => $wikiId];

        $success = $this->execute($query, $params);

        if ($success) {
            return [
                'success' => true,
                'message' => 'Wiki archived successfully'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to archive wiki'
            ];
        }
    }
    public function Add($title, $content, $categoryId) {
        $Addedwiki = "INSERT INTO wikis (title, content, category_id) VALUES (:title, :content, :category_id)";
        $stmt = $this->pdo->prepare($Addedwiki);
    
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->execute();
    }
    // public function getwikibyId($wikiId){
        
    //     $query ="SELECT * FROM wikis WHERE wiki_id = wikiId";
    //     $stmt = $this->pdo->prepare($query);
    //     $stmt->bindParam(':wikiId',$wikiId);
    //     $stmt->execute();
    //     $wiki = $stmt->fetch();
    //     $wikiData = new Wiki($wiki['wiki_id'], $wiki['title'],$wiki['content']);
    //     return $wikiData;


    // }
    public function getwikibyId($wikiId) {
        $query = "SELECT * FROM wikis WHERE wiki_id = :wikiId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':wikiId', $wikiId);
        $stmt->execute();
        $wiki = $stmt->fetch();
    
        // Assuming your Wiki class constructor requires all these parameters
        $wikiData = new Wiki(
            $wiki['wiki_id'],
            $wiki['title'],
            $wiki['content'],
            $wiki['user_id'], // Adjust based on your actual column names
            $wiki['category_id'],
            $wiki['created_at'],
            $wiki['is_archived']
        );
    
        return $wikiData;
    }
    




public function updatewiki($wikiId, $title, $content, $categoryId) {
    $update = "UPDATE wikis SET title = :title, content = :content, category_id = :categoryId WHERE wiki_id = :wikiId";
    $stmt = $this->pdo->prepare($update);

    // Bind parameters
    $stmt->bindParam(':wikiId', $wikiId);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':categoryId', $categoryId);

    // Execute the query
    $stmt->execute();
}

    // private function execute($query, $params) {
    //     // Implement your execute method based on your Database class
    // }

    // private function fetchAll($query, $params) {
    //     // Implement your fetchAll method based on your Database class
    // }

    public function deletewiki($wikiId){
        $deletewiki = "DELETE FROM wikis WHERE wiki_id = :wikiId";
        $stmt = $this->pdo->prepare($deletewiki);
        $stmt->bindParam(':wikiId', $wikiId);
        $stmt->execute();
        // header('Location:index.php?action=tags');
    }
 
    public function getWikiCount() {
        $query = "SELECT COUNT(*) as total FROM wikis";
        $stmt = $this->pdo->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getCategoryCount() {
        $query = "SELECT COUNT(*) as total FROM categories";
        $stmt = $this->pdo->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function getwikibuuserid($id){
        $id=1;
        $query = "SELECT * FROM wikis inner join users on users.user_id=wikis.user_id WHERE wikis.user_id = :wikiId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':wikiId', $id);
        $stmt->execute();
        $wikiData = array();
        $allwikis = $stmt->fetchAll();
        foreach($allwikis as $wiki){
            $wikiData[] = new wiki($wiki['wiki_id'],$wiki['title'], $wiki['content'],$wiki['user_id'],$wiki['category_id'],$wiki['created_at'],$wiki['is_archived']);
        }
        return $wikiData;

    }

    public function getTagCount() {
        $query = "SELECT COUNT(*) as total FROM tags";
        $stmt = $this->pdo->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}



?>