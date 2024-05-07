<?php
session_start();
header('content-type: application/jason');
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["electricity_voucher"])){
        $voucher = $_POST["electricity_voucher"];
    }else{
        echo json_encode(array("message"=>"Insert voucher"));
        die();
    }
    
        require_once "../includes/Dbh.php";
        require_once "../Model/recharge_model.inc.php";
        require_once "../Control/recharge_contr.inc.php";

        //Error handlers
        $voucher = str_replace(' ', '', "$voucher");
        $user= new RechargeC($voucher); 
        $success = [];
        $success = $user->recharge_electricity();
        
        echo json_encode($success);
        die();

} else {
    echo json_encode(array("message"=>"unsuccessful"));
    die();
}