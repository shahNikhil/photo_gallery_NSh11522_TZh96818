<?php

if (!empty($_POST['username'])) {
    //Initialize the DAO
    UserDAO::init();

    //Get the current user 
    $authUser = UserDAO::getUser($_POST['username']);
    //Check the DAO returned an object of type user
    //Verify the password with the posted data    
    if ($authUser->verifyPassword($_POST['password']))  {

        //Start the session
        session_start();
        
        //Set the user to logged in
        $_SESSION['loggedin'] = $authUser->getUserName();

        header("Location: photo_list.php");
    } else {
        //display password error
    }
}
?>