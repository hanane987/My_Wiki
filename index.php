<?php

include "controller/wikicontroller.php"; // Use forward slash for directory separator
include "controller/usercontroller.php"; // Use forward slash for directory separator
include "controller/categorycontroller.php"; 
$controller_wiki = new WikiController();
$controller_user = new userController();
$controller_category = new categoryController();

$action = isset($_GET['action']) ? $_GET['action'] : 'display_register';
ob_start();
switch ($action) {
    case 'display_login':
        $content = include_once 'view/login.php';
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
    // Add other cases for different actions if needed

    default:
        // Default to the login page if the action is not recognized
        $content = include_once 'view/register.php';
}
?>
