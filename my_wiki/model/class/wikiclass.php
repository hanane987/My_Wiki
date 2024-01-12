<?php
class wiki {
    private $wikiId;
    private $title;
    private $content;
    private $userId;
    private $categoryId;
    private $createdAt;
    private $isArchived;

    // Constructor
    public function __construct($wikiId, $title, $content, $userId, $categoryId, $createdAt, $isArchived) {
        $this->wikiId = $wikiId;
        $this->title = $title;
        $this->content = $content;
        $this->userId = $userId;
        $this->categoryId = $categoryId;
        $this->createdAt = $createdAt;
        $this->isArchived = $isArchived;
    }

    // Getters and Setters
    public function getWikiId() {
        return $this->wikiId;
    }

    public function setWikiId($wikiId) {
        $this->wikiId = $wikiId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function getIsArchived() {
        return $this->isArchived;
    }

    public function setIsArchived($isArchived) {
        $this->isArchived = $isArchived;
    }
}
?>