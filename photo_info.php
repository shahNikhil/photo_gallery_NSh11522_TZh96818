<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");

if(LoginManager::verifyLogin()) {
    Page::$subTitle = "Photo Detail Page"; //TODO: make it be the file name of the photo
    Page::header("PhotoGallery");

    // View the photo in bigger view

    Page::footer();
}

?>