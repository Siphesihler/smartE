<?php
session_start();
header('content-type: application/jason');
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["fullName"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["message"])){
        $fullName = $_POST["fullName"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
    }else{
        echo json_encode(array("1."=>"Fill in all fields"));
        die();
    }
    
        require_once "../includes/Dbh.php";
        require_once "../Model/enquiry_model.inc.php";
        require_once "../Control/enquiry_contr.inc.php";

        //Error handlers
        $user= new EnquiryC($fullName, $phone, $email, $subject, $message); 
        $success = [];
        $success = $user->send_enquiry();
        
        echo json_encode($success);
        die();

} else {
    echo json_encode(array("1."=>"Query unsuccessful"));
    die();
}