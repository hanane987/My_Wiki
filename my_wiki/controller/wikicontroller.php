<?php
include_once 'model\class\wikiclass.php';
include_once 'model\wikidao.php';

class wikicontroller {
    private $wikiDAO;

    public function __construct() {
        $this->wikiDAO = new WikiDAO(); // Assuming you have a WikiDAO class
    }
    function getAllwikis(){
        $wiki = new WikiDAO();
        $wikis = $wiki->getAllwikis();
        include 'view\wiki\wikidisplay.php';
    }
   
          function displaywiki(){
            $category = new CategoryDAO();
            $categories = $category->getAllCategories();
            include 'view\addwiki.php';
        }


        function archive(){
            $id = $_GET['id'];
            $wiki = new WikiDAO();
            $archived =$wiki->archived($id);
            header("Location: index.php?action=getallwikis");
        }

        function wikiDetails(){
            $id = $_GET["id"] ; 
            $wiki = new WikiDAO();
            $wikiDetail = $wiki->getwikibyId($id);
            include 'view\wikiDetails.php';
        }
        
        function stati(){
            include 'view\statis.php';
        }

        function updatewiki()
        {
                $wikiId= $_POST["wikiId"];
               
                $title = $_POST["title"] ; 
                $content = $_POST["content"] ;
                $catid= $_POST["categoryid"];
                $wiki = new WikiDAO();
                $wiki->updatewiki($wikiId,$title,$content,$catid);
                header("Location: index.php?action=getallwikis");
        
        }
        // public function getwiki(){
        //     $id = $_GET['id'];
        //     $wiki= new WikiDAO();
        //      $wikis=$wiki->getwikibyId($id);
        //     include 'view\updatewiki.php';


        // }
        public function getwiki() {
            if (isset($_GET['id'])) {
                $wikiId = $_GET['id'];
                $wikiDAO = new WikiDAO();
                $wiki = $wikiDAO->getwikibyId($wikiId);
                $category = new CategoryDAO();
                $categories = $category->getAllCategories();
            } else {
                echo "Wiki ID is not set.";
            }
            include 'view\updatewiki.php';
        }
        
        
   
public function Addwiki() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $categoryId = $_POST["categoryid"];
        $wiki = new WikiDAO();
        $wikis = $wiki->Add($title, $content, $categoryId);
        header("Location: index.php?action=getallwikis");
        exit();
    }
        }
        
        
        function deletewiki($id)
        {
            echo $id;
            $wiki = new WikiDAO();
            $wikis = $wiki->deletewiki($id);
            header("Location: index.php?action=getallwikis");
        }
    
    
    } 