<?php
class Category {
    private $category_id;
    private $name;
    private $created_at;

    public function __construct($name) {
        $this->name = $name;
        // The 'created_at' field will be automatically set to the current timestamp when the object is created
        $this->created_at = new DateTime();
    }

    // Getter for category_id
    public function getCategoryID() {
        return $this->category_id;
    }

    // Getter for name
    public function getName() {
        return $this->name;
    }

    // Getter for created_at
    public function getCreatedAt() {
        return $this->created_at;
    }

    // Setter for name
    public function setName($name) {
        $this->name = $name;
    }

    // No setter for category_id as it is auto-incremented and should not be manually set

    // No setter for created_at as it is set automatically on object creation
}

