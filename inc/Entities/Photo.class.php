<?php

class User {

    //Properties
    private $id = 0;
    private $name = '';
    private $file_path = '';
    private $description = '';

    //Getter
    public function getName() {
        return $this->name;
    }
    public function getFile_path() {
        return $this->file_path;
    }
    public function getDescription() {
        return $this->description;
    }

    //Setter
    public function setName($name){
        $this->name = $name;
    }
	public function setFile_path($file_path){
		$this->file_path = $file_path;
	}
	public function setDescription($description){
		$this->description = $description;
	}
}

?>