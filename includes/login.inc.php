<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    

    try {
        require_once "Dbh.php";
        require_once "../Model/login_model.inc.php";
        require_once "../Control/login_contr.inc.php";
        

        //Error handlers
        $login= new LoginC($username, $pwd);
        $login->loginUser();
        
        die();

    } catch (PDOException $e) {
        die("Login failed: ". $e->getMessage());
    }
} else {
    header("Location:../index.php");
    die();
}