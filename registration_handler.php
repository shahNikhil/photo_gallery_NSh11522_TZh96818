<?php 
require_once("inc/config.inc.php");
require_once("inc/Entities/Page.class.php");
require_once("inc/Entities/User.class.php");

require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");

if(isset($_POST['Register'])) {	
    $Email = $_POST['email'];
	$First_Name = $_POST['firstname'];
	$Last_Name = $_POST['lastname'];
	$Address = $_POST['address'];
	$Mobile_No = $_POST['mobileno'];
	$User_Name = $_POST['username'];
    $Password = $_POST['password'];
    
    // Validation

    // Insertion
    if(isset($_POST['Register'])) {	
        // If the form entries are valid
        if (true){ //validation to be added
            //Initialize the DAO
            UserDAO::init();
            // instantiate a new user
            $res = new User;
    
            // assemble the user data
            $res->setFirstname($_POST["firstname"]);
            $res->setLastname($_POST["lastname"]);
            $res->setEmail($_POST["email"]);
            $res->setMobile($_POST["mobileno"]);
            $res->setAddress($_POST["address"]);
            $res->setUsername($_POST["username"]);
            $res->setPassword($_POST["password"]);
    
            //Send the Reservation to the DAO for creation        
            UserDAO::createUser($res);
            // create the user
            // send the user to the login page      
            header("Location: login.php");  
        } else {
            // display error message
        }   
    }        
    
}
?>