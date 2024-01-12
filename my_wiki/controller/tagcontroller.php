<?php
include_once 'model\class\tagclass.php';
include_once 'model\tagdao.php';
class  tagcontroller
{





    public function addtag()
    {
        $tagName = $_POST["tagName"];
        $tag = new TagDAO();
        $tag->addTag($tagName);
        header("Location: index.php?action=getalltags");
        exit();
    }




    function getAlltags()
    {
        $tag = new TagDAO();
        $tags = $tag->getAllTags();
        include 'view\tag\displaytags.php';
    }



    function displayTag()
    {
        include 'view\tag\addtag.php';
    }




    function gettag()
    {
        $id = $_GET['id'];
        $tag = new TagDAO();
        $tags = $tag->getTagById($id);
        include 'view\tag\updatetag.php';
    }



    function updatetag()
    {
            $id= $_POST["tagId"];
            $name = $_POST["tagName"] ; 
            $tag = new TagDAO();
            $tag->updateTag($id,$name);
            header("Location: index.php?action=getalltags");
    
    }



    function deletetag($id)
    {
        echo $id;
        $tag = new TagDAO();
        $tags = $tag->deleteTag($id);
        header("Location: index.php?action=getalltags");
    }
}
