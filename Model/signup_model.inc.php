<?php

class SignUp extends Dbh {
    protected function get_username(string $username){
        $query = "SELECT username FROM users WHERE username = :username;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt-> execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    
    }
    protected function get_email(string $email){
        $query = "SELECT username FROM users WHERE email = :email;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt-> execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    
    }
    protected function set_user(string $username, string $pwd, string $email, string $fullName, string $phone, string $User_address){
            $query = "INSERT INTO users(username, pwd, email, fullName, phone, User_address) VALUES(:username, :pwd, :email, :fullName, :phone, :User_address);";//named parameter
    
            $stmt = $this->connect()->prepare($query);
    
            $options = [
                'cost'=> 12
            ];
            $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    
            $stmt-> bindParam(":username",$username);
            $stmt-> bindParam(":pwd",$hashedPwd);
            $stmt-> bindParam(":email",$email);
            $stmt-> bindParam(":fullName",$fullName);
            $stmt-> bindParam(":phone",$phone);
            $stmt-> bindParam(":User_address",$User_address);
    
    
            $stmt->execute();
    
    }
}
