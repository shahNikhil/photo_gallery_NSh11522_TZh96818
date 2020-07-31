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

$login_message = "";
session_start();

if((isset($_POST['login'])) && !empty($_POST)){
    //Initialize the DAO
    UserDAO::init();
    AdminDAO::init();
    //get the current user
    $authUser = UserDAO::getUser("".$_POST['username']);
    if (gettype($authUser) === "object"){
        //verify the password with the posted data
        if(password_verify($_POST['password'], $authUser->getPassword())){
            //set the user to login
            $_SESSION['loggedin'] = $authUser->getUsername();
            
            if (isset($_POST['role']) && $_POST['role'] == "admin"){
                $admin = AdminDAO::getAdmin($authUser->getId());
                if ($admin){
                    if ($admin->getUserId() != null){
                        header('Location: admin_panel.php'); //Redirect to admin panel
                    }
                }else {
                    header('Location: photo_list.php');                
                }

            } else {
                //point header to his photo list
                header('Location: photo_list.php');                
            }
        }
        else{
            //Destroy any session just in case            
            LoginManager::destroy_session();
            $login_message = "Incorrect password";
            echo '<script language="javascript">';
            echo 'alert("'.$login_message.'");';
            echo 'window.location.href="login.php"';
            echo '</script>';
        }
    }else {
        //Destroy any session just in case            
        LoginManager::destroy_session();

        $login_message = "User does not exist";
        echo '<script language="javascript">';
        echo 'alert("'.$login_message.'");';
        echo 'window.location.href="login.php"';
        echo '</script>';
    }
}else if((isset($_GET['logout'])) && !empty($_GET)){
    //Destroy any session just in case            
    LoginManager::destroy_session();

    $login_message = "You are successfully logged out";
    echo '<script language="javascript">';
    echo 'alert("'.$login_message.'");';
    echo 'window.location.href="login.php"';
    echo '</script>';
}else{
    header('Location: login.php');
}
?>