<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
if((isset($_POST['login'])) && !empty($_POST)){
    //Initialize the DAO
    UserDAO::init();
    //get the current user
    echo $_POST['username'];
    $authUser = UserDAO::getUser("".$_POST['username']);

    //verify the password with the posted data
    if($authUser->verifyPassword($_POST['password'])){
        //start the session
        session_start();
        //set the user to login
        $_SESSION['loggedin'] = $authUser->getUsername();
        //point header to his photo list
        header('Location: photo_list.php');
    }
    else{
        header('Location: login.php');
    }
}
else{
Page::$subTitle = "Please enter the login credentials";
Page::header("Login");
Page::displayLoginForm();
Page::footer();
}
?>