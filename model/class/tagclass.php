

<?php



class Tag {
    private $tagId;
    private $tagName;

    public function __construct($tagId, $tagName) {
        $this->tagId = $tagId;
        $this->tagName = $tagName;
    }

    // Getter method for tagId
    public function getTagId() {
        return $this->tagId;
    }

    // Setter method for tagId
    public function setTagId($tagId) {
        $this->tagId = $tagId;
    }

    // Getter method for tagName
    public function getTagName() {
        return $this->tagName;
    }

    // Setter method for tagName
    public function setTagName($tagName) {
        $this->tagName = $tagName;
    }
}
