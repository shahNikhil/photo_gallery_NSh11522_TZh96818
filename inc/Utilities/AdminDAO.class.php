<?php

class AdminDAO {

    // Create a member to store the PDO agent
    private static $db;

    // create the init function to start the PDO agent
    static function init()  {
        //Initialize the internal PDO Agent
        self::$db = new PDOAgent("Admin");    
    }    
    
    // function to create user
    static function createAdmin(string $user_id){

        // query
         $sqlInsert = "INSERT INTO operator (user_id) VALUES ('$user_id')";
         // bind
         self::$db->query($sqlInsert);
         // execute
         self::$db->execute();

        // you may return the rowCount
        return self::$db->lastInsertedId();

    }

    // get a user detail
    static function getAdmin(String $user_id) {
        // you know the drill
        $sql = "SELECT * FROM operator WHERE user_id=:u;";
        self::$db->query($sql);
        self::$db->bind(':u',$user_id);
   
        self::$db->execute();
        
        return self::$db->singleResult();
    }    
    
}