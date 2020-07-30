<?php 
require_once("inc/config.inc.php");
require_once("inc/Entities/Page.class.php");
require_once("inc/Entities/User.class.php");

require_once("inc/Utilities/Validate.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");


    if((isset($_POST['Register'])) && !empty($_POST)) {	
        // If the form entries are valid
        $error = Validate::validateInput();
        if (empty($error)){ //validation to be added
            //Initialize the DAO
            UserDAO::init();
            // instantiate a new user
            $res = new User;
    
            // assemble the user data
            $res->setFirstname($_POST["firstname"]);
            $res->setLastname($_POST["lastname"]);
            $res->setEmail($_POST["email"]);
            $res->setMobile(intval($_POST["mobileno"]));
            $res->setAddress($_POST["address"]);
            $res->setUsername($_POST["username"]);
            $pass = password_hash($_POST["password"],PASSWORD_DEFAULT);
            $res->setPassword($pass);
    
            //Send the Reservation to the DAO for creation        
            UserDAO::createUser($res);
            // create the user

            //TODO: check if user is registered as admin

            // send the user to the login page      
            header("Location: Confirmation.php");  
        } else {
            // display error message
            foreach($error as $e){
                echo"<br/> $e";
            }
        }   
    }        
    
?>