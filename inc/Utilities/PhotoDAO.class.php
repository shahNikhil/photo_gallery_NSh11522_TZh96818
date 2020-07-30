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

    static function getPhotoByID(string $pID) {
        $sql = "SELECT * FROM photos WHERE user_id=:pID";
        self::$db->query($sql);
        self::$db->bind(":pID",intval($pID));
        self::$db->execute();
        
        return self::$db->getResultSet();        
    }

    static function getPhotos() {
        $sql = "SELECT * FROM photos";
        self::$db->query($sql);
        self::$db->execute();
        
        return self::$db->singleResult();              
    }

        // UPDATE photos
        static function updatePhoto (Photo $photoToUpdate) {

            //QUERY, BIND, EXECUTE
            // Return the rowCount
    
            $updateQuery = "UPDATE photos SET display_name=:name,description=:desmessg
                WHERE id =:pid;";
    
            try {
    
                self::$db->query($updateQuery);
                self::$db->bind(':name', $photoToUpdate->getDisplay_name());
                self::$db->bind(':desmessg', $photoToUpdate->getDescription());
                self::$db->bind(':pid', $photoToUpdate->getId());
    
                self::$db->execute();
    
            }
            catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
    
            return true;
    
        }

// Delete photos
static function deletePhoto($pid){
    $deleteQuery = "DELETE FROM photos WHERE id = :pid;";

    try{
        self::$db->query($deleteQuery);
        self::$db->bind(':pid', $pid);
        self::$db->execute();

        if(self::$db->rowCount() != 1){
            throw new Exception("Problem in deleting reservation $pid");
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
        self::$db->debugDumpParams();
        return false;
    }

    return true;
} 
        
}

?>