<?php
class AppUser {
    private $userId;
    private $username;
    private $email;
    private $passwordHash;
    private $role;
    private $createdAt;

    // Constructor
    public function __construct($username, $email, $passwordHash, $role) {
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->role = $role;
    }



    // Getters and Setters
    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPasswordHash() {
        return $this->passwordHash;
    }

    public function setPasswordHash($passwordHash) {
        $this->passwordHash = $passwordHash;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    // Note: No setter for created_at as it has a default value in the database.
}
?>
