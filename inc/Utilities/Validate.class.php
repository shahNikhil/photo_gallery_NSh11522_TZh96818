<?php

class Validate{

    // Please use filter to validate the inputs whenever possible
    // Please also sanitize the inputs. 
    public static function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }   
     public static function validateInput(){
    // Up to you how to create the function(s) to validate the inputs    
    $errors_array =array();   
    // What to validate?
    $fnameErr =null;$lnameErr=null;$emailErr=null;$mobErr=null;$addErr=null;$unameErr=null;$pErr=null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // First Name and Last Name should not be empty and not numbers
        // Also replace occurences of semicolon, colon, comma, ampersand, 
        // dollar sign, < and > and any improper character with nothing
        if (empty($_POST["firstname"])) {
            $fnameErr = "First Name is required";
          } else {
            $fname = self::test_input($_POST["firstname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
              $fnameErr = "Only letters and white space allowed for first name";
            }
          }
        if (empty($_POST["lastname"])) {
            $lnameErr = "Last Name is required";
          } else {
            $lname = self::test_input($_POST["lastname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
              $lnameErr = "Only letters and white space allowed for last name";
            }
          }

    // Email should be email format
     
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = self::test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            }
        }
    if (!preg_match('/^[0-9]{10}+$/',($_POST["mobileno"]))) {
        $mobErr = "Please Enter valid mobile no.!";
      }
    // Age must be in number between 15 to 100
    if (empty($_POST["address"])) {
        $addErr = "Please enter a address!";
      }
    // username must be in one word. it can be combination of character and number
   
    if(empty($_POST["username"])) {
        $unameErr = "User Name is required";
      }else{
        $user = "".$_POST["username"];
        UserDAO::init();
        $searchUser =userDAO::validateUser($user);
        if(!empty($searchUser)){
          $unameErr = "User Name is already taken please try different one";
        }
        $uname = self::test_input($_POST["username"]);
        if (stripos(($_POST["username"]), ' ') !== false) {
            $unameErr = "User Name must be single word"; 
        }
      }
    // password
        // let's have a 6 digits string as password
        if (empty($_POST["password"])) {
            $pErr = "password is required";
          } else {
            $pass = self::test_input($_POST["password"]);
            if (strlen($_POST["password"])<6) {
              $lnameErr = "password must be atleast 6 characters long!";
            }
          }
          if($fnameErr!=null){array_push($errors_array,$fnameErr);}
          if($lnameErr!=null){array_push($errors_array,$lnameErr);}
          if($emailErr!=null){array_push($errors_array,$emailErr);}
          if($mobErr!=null){array_push($errors_array,$mobErr);}
          if($addErr!=null){array_push($errors_array,$addErr);}
          if($unameErr!=null){array_push($errors_array,$unameErr);}
          if($pErr!=null){array_push($errors_array,$pErr);}
     }
     return $errors_array;


}
}
?>