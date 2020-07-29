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

// View a list of photo, and click link to photo_info.php
UserDAO::init();
$u = UserDAO::getUser("".$_SESSION['loggedin']);

$Uid = $u->getId();
Page::$subTitle = $u->getFirstName()." ".$u->getLastName()." : My Photos"; //TODO: make it a better name?
Page::header("PhotoGallery");
//get the photos based on the user who signed in
PhotoDAO::init();
$photo_list =PhotoDAO::getPhoto($Uid);

Page::displayPhotolist($photo_list);

Page::footer();
?>