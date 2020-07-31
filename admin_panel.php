<?php
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");
require_once("inc/Entities/Photo.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
require_once("inc/Utilities/PhotoDAO.class.php");

session_start();

if(isset($_SESSION) && isset($_SESSION["loggedin"])) {
    UserDAO::init();
    PhotoDAO::init();


    Page::$subTitle = "Welcome Admin:";
    var_dump($_SESSION);

    Page::header("Admin Panel");
    Page::displayAdminPanel();
    if(isset($_POST['public_gallery'])){
        $a = new Photo();
        $a = PhotoDAO::getAllPhotos();
        Page::displayPhotoGrid($a);
    }
    if(isset($_POST['all_users'])){
        $u = new User();
        $u = UserDAO::getUsers();
        Page::displayUserlist($u);
    }
    if(isset($_POST['search'])){
        $searchParameter = $_POST['users'];
        $u = UserDAO::SearchUser($searchParameter);
        Page::displayUserlist($u);
    }
    if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
        
        PhotoDAO::deleteUserPhoto(intval($_GET['UserID']));
        UserDAO::delUser(intval($_GET['UserID']));
        $u = new User();
        $u = UserDAO::getUsers();
        Page::displayUserlist($u);
    }
    Page::footer();
} else {
    Page::$subTitle = "Please login first";
    Page::header("Access Denied");
    Page::footer();
}
?>