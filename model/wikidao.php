<?php
include_once '../model/class/wikiclass.php';
include_once '../model/config/conn.php';

class WikiDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function addWiki(AppWiki $wiki) {
        $query = "INSERT INTO app_wikis (title, content, user_id, category_id) 
                  VALUES (:title, :content, :userId, :categoryId)";
        $params = [
            ':title' => $wiki->getTitle(),
            ':content' => $wiki->getContent(),
            ':userId' => $wiki->getUserId(),
            ':categoryId' => $wiki->getCategoryId()
        ];

        $success = $this->execute($query, $params);

        if ($success) {
            return [
                'success' => true,
                'message' => 'Wiki added successfully'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to add wiki'
            ];
        }
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

    private function execute($query, $params) {
        // Implement your execute method based on your Database class
    }

    private function fetchAll($query, $params) {
        // Implement your fetchAll method based on your Database class
    }
}
?>
