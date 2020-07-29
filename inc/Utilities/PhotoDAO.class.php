<?php

class PhotoDAO {

    // Create a member to store the PDO agent
    private static $db;    

    // create the init function to start the PDO agent
    static function init()  {
        //Initialize the internal PDO Agent
        self::$db = new PDOAgent("Photo");    
    }

    static function createPhoto(Photo $photo){
        $name = $photo->getName();
        $file_path = $photo->getFilepath();
        $descriptoin = $photo->getDescription();
        $user_id = $photo->getUser_id();
        // query
        $sqlInsert = "INSERT INTO photos (name, file_path, description, user_id) 
        VALUES ('$name', '$file_path', '$descriptoin', '$user_id')";
        // bind
        self::$db->query($sqlInsert);

        // execute
        self::$db->execute();

       // you may return the rowCount
       return self::$db->lastInsertedId();        
    }

    static function getPhoto(string $uID) {
        $sql = "SELECT * FROM photos WHERE user_id=:uID";
        self::$db->query($sql);
        self::$db->bind(":uID",intval($uID));
        self::$db->execute();
        
        return self::$db->getResultSet();        
    }

    static function getPhotos() {
        $sql = "SELECT * FROM photos";
        self::$db->query($sql);
        self::$db->execute();
        
        return self::$db->singleResult();              
    }
}

?>