<?php
// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");
require_once("inc/Entities/Admin.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
require_once("inc/Utilities/AdminDAO.class.php");

Page::$subTitle = "Please enter the login credentials";
Page::header("Login");
Page::displayLoginForm();
Page::footer();
?>