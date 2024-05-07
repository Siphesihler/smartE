<?php
header('Access-Control-Allow-origin: *');
header('content-type: application/jason');
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    $meter_No = 1;
    try {
        session_start();
        require_once 'c:\xampp\htdocs\smartE\xxx.php';
        require_once base_root('\includes\Dbh.php');
        require_once base_root('\Model\userDash_model.inc.php');
        require_once base_root('\Control\userDash_contr.inc.php');
        

        //Error handlers
        $user= new UserDashC($meter_No);
        $result = $user->get_latest_data_M();
       $result = json_encode($result);
       
       echo $result;
       die();
        

    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }
}else {
    echo json_encode(array('message'=>'No posts found'));
}


