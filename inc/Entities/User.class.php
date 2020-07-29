<?php

class User {

    //Properties
    private $id = 0;
    private $username = '';
    private $first_name = '';
    private $last_name = '';
    private $email = '';
    private $mobile = 0;
    private $address = '';
    private $password = '';

    //Setters
     function setId(int $id)   {
        $this->id = $id;
    }  
    function setUsername(string $username)   {
        $this->username = strtolower(trim($username));
    }
    function setFirstname(string $first_name)   {
        $this->first_name = $first_name;
    }
    function setLastname(string $last_name)   {
        $this->username = $last_name;
    }
    function setEmail(string $email)   {
        $this->email = $email;
    }
    function setMobile(int $mobile)   {
        $this->mobile = $mobile;
    }
    function setAddress(string $address)   {
        $this->address = $address;

    }
    function setPassword(string $password)   {
        $this->password = $password;
    }
    //Getters
    function getId() : int{
        return $this->id;
    }
    function getUsername() : string{
        return $this->username;
    }
    function getFirstName() : string{
        return $this->first_name;
    }
    function getLastName() : string{
        return $this->last_name;
    }
    function getEmail() : string{
        return $this->email;
    }
    function getMobile() : int{
        return $this->mobile;
    }
    function getAddress() : string{
        return $this->address;
    }
    function getPassword() : string{
        return $this->password;
    }
    //Verify the password
    function verifyPassword(string $passwordToVerify) {
        //Return a boolean based on verifying if the password given is correct for the current user
        return ($passwordToVerify === $this->password);
    }
}
?>