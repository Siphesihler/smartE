<?php

class SignUpC extends Signup {
    private $username;
    private $pwd;
    private $pwd_conf;
    private $email;
    private $fullName;
    private $phone;
    private $User_address;
    private $meterID;

    public function __construct($username, $pwd, $pwd_conf, $email, $fullName, $phone, $User_address="", $meterID="none"){
        $this->username = $username;
        $this->pwd = $pwd;
        $this->pwd_conf = $pwd_conf;
        $this->email = $email;
        $this->fullName = $fullName;
        $this->meterID = $meterID;
        $this->User_address = $User_address;
        $this->phone = $phone;
    }
    private function is_input_empty(string $username, string $pwd, string $pwd_conf, string $email, string $fullName, string $phone){
        if(empty($username) || empty($pwd)|| empty($email)|| empty($fullName)|| empty($phone)){
            return true;
        }else{
            return false;
        }
    
    }
    private function is_email_invalid(string $email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    
    }
    private function is_username_taken(string $username){
        if($this->get_username($username)){
            return true;
        }else{
            return false;
        }
    
    }
    
    private function is_email_registered(string $email){
        if($this->get_email($email)){
            return true;
        }else{
            return false;
        }
    
    }
    private function is_pwd_mismatch(string $pwd, string $pwd_conf){
        if($pwd != $pwd_conf){
            return true;
        }else{
            return false;
        }
    
    }
    private function create_user(string $username, string $pwd, string $email, string $fullName, string $phone, string $User_address=""){
        $this->set_user($username, $pwd, $email, $fullName, $phone, $User_address);
    
    }
    public function signupUser(){
        $errors = [];
        if($this->is_input_empty($this->username, $this->email, $this->pwd, $this->pwd_conf, $this->fullName, $this->phone)){
            $errors["empty_input"]= "Fill in all fields";
        }
        if($this->is_email_invalid($this->email)){
            $errors["invalid_email"]= "Invalid email";
        }
        if($this->is_username_taken($this->username)){
            $errors["username_taken"]= "Username already taken";
        }
        if($this->is_email_registered($this->email)){
            $errors["email_registered"]= "Email already registered";
        }
        if($this->is_pwd_mismatch($this->pwd, $this->pwd_conf)){
            $errors["pwd_mismatch"]= "Passwords do not match";
        }

        require_once "../includes/config_session.inc.php";
        if($errors){
            $_SESSION["errors_signup"]= $errors;   
            header("Location:../register.php");
            die();
        }
        $this->create_user($this->username, $this->pwd, $this->email, $this->fullName, $this->phone, $this->User_address);
        header("Location:../index.php?");

        $stmt= NULL;
        $pdo= NULL;
    }
    
}


