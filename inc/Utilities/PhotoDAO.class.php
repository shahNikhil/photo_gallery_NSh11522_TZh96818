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
        $user_id = $_SESSION['loggedin'];
        // query
        $sqlInsert = "INSERT INTO users (name, file_path, description, user_id) 
        VALUES ('$name', '$file_path', '$descriptoin', '$user_id')";
        // bind
        self::$db->query($sqlInsert);

        // execute
        self::$db->execute();

       // you may return the rowCount
       return self::$db->lastInsertedId();        
    }

    static function getPhoto(string $photo_id) {
        $sql = "SELECT * FROM photos WHERE id=:photo_id";
        self::$db->query($sql);
        self::$db->bind(":photo_id",$photo_id);
        self::$db->execute();
        
        return self::$db->singleResult();        
    }

    static function getPhotos() {
        $sql = "SELECT * FROM photos";
        self::$db->query($sql);
        self::$db->execute();
        
        return self::$db->singleResult();              
    }
}

?>