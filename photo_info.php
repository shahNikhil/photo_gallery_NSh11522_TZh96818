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

PhotoDAO::init();

if(LoginManager::verifyLogin()) {
    $photo;
    if (isset($_GET["action"]) && $_GET["action"] == "edit"){
        //Loading the photo edit page
        $photo= PhotoDAO::getPhotoByID($_GET["photoID"]);

        Page::$subTitle = $photo->getName();
        Page::header("PhotoGallery");
        Page::editPhotoForm($photo);
        Page::footer();

    }
    if (isset($_POST["action"]) && $_POST["action"] == "edit")  {
        // Handle photo update
        $photo->setDisplay_name($_POST['display_name']);
        $photo->setDescription($_POST['description']);
        PhotoDAO::updatePhoto($photo);
        header("Location: photo_list.php");
    }

}

?>