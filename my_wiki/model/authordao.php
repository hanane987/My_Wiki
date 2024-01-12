<?php
include_once 'config/conn.php';
include_once 'model\class\authorclass.php';

class AuthorDAO {
    private $pdo;

    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }
    public function addUser($username, $email, $password, $role) {
      
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
      
        $insert = "INSERT INTO users (username, email, password_hash, role) VALUES (:username, :email, :password, :role)";
        $stmt = $this->pdo->prepare($insert);
        
    
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);
    
      
        $stmt->execute();
    
   
        header('Location: index.php?action=display_login');
    }








    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

        if ($user && password_verify($password, $user['password_hash'])) {
            if ($user['role'] === 'Admin') {
                return ['success' => true, 'message' => 'Login successful for Admin', 'user' => $user];
            } elseif ($user['role'] === 'Author') {
                return ['success' => true, 'message' => 'Login successful for Author', 'user' => $user];
            } else {
                return ['false' => false, 'message' => 'Error: Role not defined for this user'];
            }
        } else {
            return ['false' => false, 'message' => 'Incorrect email or password'];
        }
    }

    // public function getAllAuthors(){
    //     $selectAll = "SELECT * FROM authors";
    //     $stmt = $this->pdo->prepare($selectAll);
    //     $stmt->execute();
    //     $authorData = array();
    //     $allAuthors = $stmt->fetchAll();
    //     foreach($allAuthors as $author){
    //         $authorData[] = new Author($author['author_id'], $author['name'], $author['email'], $author['password']);
    //     }
    //     return $authorData;
    // }

    // public function getAuthorById($authorId){
    //     $selectById = "SELECT * FROM authors WHERE author_id = :authorId";
    //     $stmt = $this->pdo->prepare($selectById);
    //     $stmt->bindParam(':authorId', $authorId);
    //     $stmt->execute();
    //     $author = $stmt->fetch();
    //     $authorData = new Author($author['author_id'], $author['name'], $author['email'], $author['password']);
    //     return $authorData;
    // }

    public function updateAuthor($authorId, $name, $email, $password){
        $updateAuthor = "UPDATE authors SET name = :name, email = :email, password = :password WHERE author_id = :authorId";
        $stmt = $this->pdo->prepare($updateAuthor);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':authorId', $authorId);
        $stmt->execute();
        header('Location:index.php?action=authors');
    }

    public function deleteAuthor($authorId){
        $deleteAuthor = "DELETE FROM authors WHERE author_id = :authorId";
        $stmt = $this->pdo->prepare($deleteAuthor);
        $stmt->bindParam(':authorId', $authorId);
        $stmt->execute();
        header('Location:index.php?action=authors');
    }
}

// $user=new AuthorDAO();
// print_r($user->login("nezha123@gmail.com","000"));

?>
