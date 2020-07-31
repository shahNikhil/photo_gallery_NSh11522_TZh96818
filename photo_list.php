<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");
require_once("inc/Entities/Photo.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
require_once("inc/Utilities/PhotoDAO.class.php");

if(LoginManager::verifyLogin()) {
    // View a list of photo, and click link to upload photo

    //Initializing the DAO's
    UserDAO::init();
    PhotoDAO::init();

    $u = UserDAO::getUser("".$_SESSION['loggedin']);
    $Uid = $u->getId();

    Page::$subTitle = $u->getFirstName()." ".$u->getLastName()." : My Photos";
    Page::header("PhotoGallery");
    if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
        //Use the DAO to delete the corresponding registration
        PhotoDAO::deletePhoto($_GET['photoID']);
        $photo_list =PhotoDAO::getPhoto($Uid);
        Page::displayPhotolist($photo_list);
    }
    else{
        //get the photos based on the user who signed in
        $photo_list =PhotoDAO::getPhoto($Uid);
        Page::displayPhotolist($photo_list);
        Page::footer();
    }
}