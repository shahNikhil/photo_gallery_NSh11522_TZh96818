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

session_start();
if(isset($_SESSION) && isset($_SESSION["loggedin"])) {
    // View a list of photo, and click link to upload photo

    //Initializing the DAO's
    UserDAO::init();
    PhotoDAO::init();

    $u = UserDAO::getUser("".$_SESSION['loggedin']);

    $Uid = $u->getId();


    Page::$subTitle = $u->getFirstName()." ".$u->getLastName()." : My Photos";
    Page::header("PhotoGallery");
    $photo_list =PhotoDAO::getPhoto($Uid);
    if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
        //Use the DAO to delete the corresponding registration
        PhotoDAO::deletePhoto($_GET['PhotoID']);
        $photo_list =PhotoDAO::getPhoto($Uid);
        }
    if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
        $newphotodetails = new Photo;

        Page::editPhotoForm($photo_list);
        if (isset($_POST["action"]) && $_POST["action"] == "edit")  {
            $newphotodetails->setDisplay_name($_POST['display_name']);
            $newphotodetails->setDescription($_POST['description']);
            $newphotodetails->setId($_POST['Photoid']);
            $photo_list =PhotoDAO::getPhoto($Uid); //get the photos based on the user who signed in
            PhotoDAO::updatePhoto($newphotodetails);
        }   
        if (isset($_POST['submit'])) { 
            Page::$subTitle="Updated Successfully!";
            Page::header("PhotoGallery");
            Page::backToPhotoList();
        }
        Page::footer();
    }
    else{
        //get the photos based on the user who signed in
        Page::displayPhotolist($photo_list);
        Page::footer();
    }
}else{
    Page::$subTitle = "Please login first";
    Page::header("Access Denied");
    Page::footer();
}