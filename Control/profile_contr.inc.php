<?php
class ProfileC extends Profile {

    private $pwd;
    private $pwd_conf;
    private $fullName;
    private $phone;
    private $User_address;

    public function __construct($pwd, $pwd_conf, $fullName, $phone, $User_address){
        $this->pwd = $pwd;
        $this->pwd_conf = $pwd_conf;
        $this->fullName = $fullName;
        $this->User_address = $User_address;
        $this->phone = $phone;
    }
    private function is_input_empty(string $pwd, string $pwd_conf, string $fullName, string $phone, string $User_address){
        if(empty($pwd)|| empty($pwd_conf)||empty($fullName)|| empty($phone)|| empty($User_address)){
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
    private function update_user(string $username, string $pwd, string $fullName, string $phone, string $User_address){
        $this->set_user($username, $pwd, $fullName, $phone, $User_address);
    
    }
    public function update_data(){
        $errors = [];
        if($this->is_input_empty($this->pwd, $this->pwd_conf, $this->fullName, $this->phone, $this->User_address)){
            $errors["1."]= "Fill in all fields";
        }
        if($this->is_pwd_mismatch($this->pwd, $this->pwd_conf)){
            $errors["2."]= "Passwords do not match";
        }

        if($errors){
            $_SESSION["errors_update"]= $errors;   
            return $errors;
        }
        $_SESSION["user_fullName"] = htmlspecialchars($this->fullName);
        $_SESSION["user_phone"] = htmlspecialchars($this->phone);
        $_SESSION["user_address"] = htmlspecialchars($this->User_address);
        $this->update_user($_SESSION["user_username"], $this->pwd, $this->fullName, $this->phone, $this->User_address);
        $success = [];
        $success["1."]= "Update successfully";
        return $success;


    }
    
    
}


