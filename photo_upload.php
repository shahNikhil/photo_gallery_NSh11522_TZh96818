<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");
require_once("inc/Entities/Photo.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");

if(LoginManager::verifyLogin()) {
    Page::$subTitle = "Upload your photo and write a short description on it here";
    Page::header("PhotoGallery");
    Page::uploadPhoto();
    Page::footer();
}else{
    Page::$subTitle = "Please login first";
    Page::header("Access Denied");
    Page::footer();
}

?>