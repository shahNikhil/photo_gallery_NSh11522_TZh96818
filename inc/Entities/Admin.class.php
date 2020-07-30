<?php

class Admin {

    //Properties
    private $id = 0;

    //Setters
     function setId(int $id)   {
        $this->id = $id;
    }  
  
    //Getters
    function getId() : int{
        return $this->id;
    }

}
?>