

<?php



class Tag {
    private $tagId;
    private $tagName;
    private $created_at;

    public function __construct($tagId, $tagName,$created_at) {
        $this->tagId = $tagId;
        $this->tagName = $tagName;
        $this->created_at =$created_at;
    }

    // Getter method for tagId
    public function getTagId() {
        return $this->tagId;
    }

    // Setter method for tagId
    public function setTagId() {
       return $this->tagId ;
    }

    // Getter method for tagName
    public function getTagName() {
        return $this->tagName;
    }
    public function getCreatedAt() {
        return $this->created_at;
    }
    // Setter method for tagName
    public function setTagName($tagName) {
        $this->tagName = $tagName;
    }
}
