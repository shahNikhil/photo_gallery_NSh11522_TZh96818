<?php

class Photo {

    //Properties
    private $id = 0;
    private $name = '';
    private $file_path = '';
    private $description = '';
    private $user_id =0;

    //Getter
    public function getName() {
        return $this->name;
    }
    public function getFilepath() {
        return $this->file_path;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    //Setter
    public function setName($name){
        $this->name = $name;
    }
	public function setFilepath($file_path){
		$this->file_path = $file_path;
	}
	public function setDescription($description){
		$this->description = $description;
	}
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }
 



}

?>