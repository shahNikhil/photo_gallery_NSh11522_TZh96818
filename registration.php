<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
Page::$subTitle="Please fill the form to register";
Page::header("Registration");
Page::displayRegistrationForm();
Page::footer();
?>