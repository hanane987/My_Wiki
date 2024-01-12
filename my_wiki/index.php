<?php

include_once 'model\config\conn.php';
include "controller/wikicontroller.php"; // Use forward slash for directory separator
include "controller/usercontroller.php"; // Use forward slash for directory separator
include "controller/categorycontroller.php";
include "controller/tagcontroller.php";

$controller_user = new userController();
$controller_category = new categoryController();
$controller_tag = new tagcontroller();
$controller_wiki = new wikicontroller();

$action = isset($_GET['action']) ? $_GET['action'] : 'display_register';
ob_start();
switch ($action) {
    case 'display_login':
        $content = include_once 'view/login.php';
        break;
        case 'displayAll':
            $controller_category->All();

            break;
    case 'register':
        $controller_user->register();
        break;
    case 'display_register':
        $controller_user->display_register();
        break;
    case 'display_login':
        $controller_user->display_login();
        break;
    case 'login':
        $controller_user->getLogin();
        break;
    case 'addcategory':
        $controller_category->addCategory();
        break;
    case 'display-category':
        $controller_category->displayCategory();
        break;
    case 'getcategories':
        $controller_category->getAllcategory();

        break;
    case 'UpdateCategory':
        $controller_category->getcategory();
        break;
    case 'update_category':
        $controller_category->updatecategory();
        break;
    case 'deleteCategory':
        $controller_category->deletecategory($_GET['id']);
        break;
    case 'displayAddForm':
        $controller_tag->displayTag();
        break;
    case 'addtag':
        $controller_tag->addtag();
        break;
    case 'getalltags':
        $controller_tag->getAlltags();
        break;
    case 'gettagsbyid':
        $controller_tag->gettag();
        break;
    case 'update_tag':
        $controller_tag->updatetag();
        break;
    case 'deletetag':
        $controller_tag->deletetag($_GET['id']);
        break;

    case 'display-wiki':
        $controller_wiki->displaywiki();
        break;
        case 'statistiques':
            $controller_wiki->stati();
            break;
    case 'getallwikis':
        $controller_wiki->getAllwikis();
        break;
        case 'wikiDetails':
            $controller_wiki->wikiDetails();
            break;
        case 'archivWiki':
            $controller_wiki->archive();
            break;
            case 'add_wiki':
                $controller_wiki->Addwiki();
                break;
                case 'get_wiki':
                    $controller_wiki->getwiki();
                    break;
                    case 'update_wiki':
                        $controller_wiki->updatewiki();
                        break;
                        case 'delete_wiki':
                            $controller_wiki->deletewiki($_GET['id']);
                            break;
    
    default:
        // Default to the login page if the action is not recognized
        $content = include_once 'view/register.php';
}
