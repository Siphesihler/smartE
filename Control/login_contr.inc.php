<?php
session_start();
class LoginC extends Login {
    private $username;
    private $pwd;

    public function __construct($username, $pwd){
        $this->username = $username;
        $this->pwd = $pwd;
    }
    private function is_username_invalid(bool|array $results){
        if (!$results){
            return true;
        }else{
            return false;
        }
    }
    private function is_password_invalid(string $pwd, string $hashedpwd){
        if (!password_verify($pwd, $hashedpwd)){
            return true;
        }else{
            return false;
        }
    }
    private function is_input_empty(string $username, string $pwd){
        if(empty($username)||empty($pwd)){
            return true;
        }else{
            return false;
        }
    }
    public function loginUser(){
        $errors = [];
        if($this->is_input_empty($this->username, $this->pwd)){
            $errors["empty_input"]= "Fill in all fields";
        }
        $results= $this->get_user($this->username);

        if ($this->is_username_invalid($results)){
            $errors["login_incorrect"]= "Incorrect login info";
        }
        if(!$this->is_username_invalid($results) && $this->is_password_invalid($this->pwd, $results["pwd"])){
            $errors["login_incorrect"]= "Incorrect login info";
        }
        
        if($errors){
            $_SESSION["errors_login"]= $errors;

            header("Location: /");
            die();
        }
        $newSessionId = session_create_id();
        $sessionId =  $newSessionId."_".$results["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $results["id"];
        $_SESSION["user_username"] = htmlspecialchars($results["username"]);
        $_SESSION["user_email"] = htmlspecialchars($results["email"]);
        $_SESSION["user_fullName"] = htmlspecialchars($results["fullName"]);
        $_SESSION["user_phone"] = htmlspecialchars($results["phone"]);
        $_SESSION["user_address"] = htmlspecialchars($results["User_address"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: /Dashboard");

        $stmt= NULL;
        $pdo= NULL;
    }
    function check_update_errors(){
        if(isset($_SESSION['errors_update'])){
            $errors = $_SESSION['errors_update'];
    
            echo'<br>';
    
            foreach($errors as $error){
                echo '<span class="failure">'.$error.'<br> </span>';
            }
            unset($_SESSION['error_signup']);
        }
    }
}

