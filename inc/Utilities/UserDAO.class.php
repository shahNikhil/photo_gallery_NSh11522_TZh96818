<?php

class UserDAO {

    // Create a member to store the PDO agent
    private static $db;

    // create the init function to start the PDO agent
    static function init()  {
        //Initialize the internal PDO Agent
        self::$db = new PDOAgent("User");    
    }    
    
    // function to create user
    static function createUser(User $user){
        // make sure the strings being stored in the database are cleaned 
        // trimmed, and changed to lowercase - handled in class        
        $fname = $user->getFirstName();
        $lname = $user->getLastName();
        $uname = $user->getUsername();
        $email = $user->getEmail();
        $mobileno = $user->getMobile();
        $addr = $user->getAddress();
        $pass = $user->getPassword();

        // query
         $sqlInsert = "INSERT INTO users (first_name, last_name, username, email, mobile, address, password) 
         VALUES ('$fname', '$lname', '$uname', '$email', '$mobileno', '$addr', '$pass' )";
         // bind
         self::$db->query($sqlInsert);

         // execute
         self::$db->execute();

        // you may return the rowCount
        return self::$db->lastInsertedId();

    }

    // get a user detail
    static function getUser(String $userName) {
        // you know the drill
        $sql = "SELECT * FROM users WHERE username=:u;";
        self::$db->query($sql);
        self::$db->bind(':u',$userName);
   
        self::$db->execute();
        
        return self::$db->singleResult();
    }

    // get multiple users detail
    // It is not needed in our app, but hey.. more practice is better!
    static function getUsers()  {
        //you know the drill
        $sql = "SELECT * FROM users";
        self::$db->query($sql);
        self::$db->execute();
        
        return self::$db->resultSet();
    }
    
    
}