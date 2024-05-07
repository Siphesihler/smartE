<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwd_conf = $_POST["pwd_conf"];
    $fullName = $_POST["fullName"];
    $phone = $_POST["phone"];
    $User_address = $_POST["address"];
    $meter_ID = $_POST["meter_ID"];
    

    try {
        require_once "Dbh.php";
        require_once "../Model/signup_model.inc.php";
        require_once "../Control/signup_contr.inc.php";

        //Error handlers
        $signup= new SignUpC($username, $pwd, $pwd_conf, $email, $fullName, $phone, $User_address="", $meterID="none");
        $signup->signupUser();

        
        die();

    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }
} else {
    header("Location:../register.php");
    die();
}