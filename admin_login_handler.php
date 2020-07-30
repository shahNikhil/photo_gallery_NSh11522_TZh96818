<?php
// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");
require_once("inc/Entities/Admin.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
require_once("inc/Utilities/AdminDAO.class.php");

$login_message = "";
if((isset($_POST['login'])) && !empty($_POST)){
    //Initialize the DAO
    UserDAO::init();
    AdminDAO::init();
    //get the current user
    echo $_POST['username'];
    $authUser = UserDAO::getUser("".$_POST['username']);
    if (gettype($authUser) === "object"){
        //verify the password with the posted data
        if(password_verify($_POST['password'], $authUser->getPassword())){
            //start the session
            session_start();
            //set the user to login
            $_SESSION['loggedin'] = $authUser->getUsername();

            if (isset($_POST['role']) && $_POST['role'] == "admin"){
                $admin = AdminDAO::getAdmin($authUser->getId());
                if ($admin->getUserId() != null){
                    header('Location: admin_panel.php'); //Redirect to admin panel
                }
            }
            //point header to his photo list
            header('Location: photo_list.php');
        }
        else{
            $login_message = "Incorrect password"; //TODO: do something to display it
            echo "<p>".$login_message."</p>";
            sleep(5);
            header('Location: login.php');
        }
    }else {
        $login_message = "User does not exist";
        echo "<p>".$login_message."</p>";
        sleep(5);
        header('Location: login.php');
    }
}
else{
    header('Location: login.php');
}            
?>