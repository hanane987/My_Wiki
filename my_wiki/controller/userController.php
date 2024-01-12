<?php
include_once 'model\class\authorclass.php';
include_once 'model\AuthorDAO.php';
class userController {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userName = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            
            $userDAO = new AuthorDAO();
            $userDAO->addUser($userName, $email, $password, 'Author');
             header("Location: index.php?action=display_login");
             exit();
        }
    }

    public function getLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST["password"];
            $email = $_POST["email"];
            $userDAO = new AuthorDAO();
              
            $result = $userDAO->login($email, $password);
            if ($result['success']) {
                // Store user information in session
                $_SESSION['role'] =$result['user']['role'];
                $_SESSION['user_id'] =$result['user']['user_id'];
                // Gérer la redirection selon le rôle ici
                if ($result['user']['role'] === 'Admin') {
                    header("Location: index.php?action=getcategories&result=" . urlencode(json_encode($result)));
                } elseif ($result['user']['role'] === 'Author') {
                    header("Location: index.php?action=getcategories&result=" . urlencode(json_encode($result)));
                }
                exit();
                exit();
            } else {
                echo $result['message'];
                // Gérer le cas d'échec de connexion
            }
        }
    }
    

 public function display_register(){
    include 'view\author_page.php';
 }
    
 public function display_login(){
    include 'view\admin_page.php';
 }

}