<?php

class Admin {

    //Properties
    private $user_id = 0;

    //Setters
     function setUserId(int $uid)   {
        $this->user_id = $uid;
    }  
  
    //Getters
    function getUserId() : int{
        return $this->user_id;
    }

}
?>