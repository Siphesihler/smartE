<?php
session_start();
header('content-type: application/jason');
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["pwd"]) && isset($_POST["pwd_conf"]) && isset($_POST["fullName"])  && isset($_POST["phone"])){
        $pwd = $_POST["pwd"];
        $pwd_conf = $_POST["pwd_conf"];
        $fullName = $_POST["fullName"];
        $phone = $_POST["phone"];
        $user_address = $_POST["user_address"];
    }else{
        echo json_encode(array("2."=>"Fill in all fields"));
        die();
    }
    
        require_once "Dbh.php";
        require_once "../Model/profile_model.inc.php";
        require_once "../Control/profile_contr.inc.php";

        //Error handlers
        $user= new ProfileC($pwd, $pwd_conf, $fullName, $phone, $user_address); 
        $success = [];
        $success = $user->update_data();
         
        
        
        echo json_encode($success);
        die();

} else {
    echo json_encode(array("1."=>"Query unsuccessful"));
    die();
}