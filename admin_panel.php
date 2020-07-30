<?php
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");
require_once("inc/Entities/Photo.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
require_once("inc/Utilities/PhotoDAO.class.php");
UserDAO::init();
PhotoDAO::init();
Page::$subTitle = "Welcome Admin:";
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
Page::footer();
?>