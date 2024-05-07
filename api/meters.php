<?php
header('Access-Control-Allow-Origin: *');
header('content-type: application/jason');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Methods: Access-Control-Allow-Methods, content-type, Access-Control-Allow-Origin');
if($_SERVER["REQUEST_METHOD"]=="POST"){
/*    $meter_No = $_POST["meter_No"];
    $user_id = $_POST["user_id"];
    $Elec_bal = $_POST["Elec_bal"];
    $Wat_bal = $_POST["Wat_bal"];
    $Elec_cons = $_POST["Elec_cons"];
    $Wat_cons = $_POST["Wat_cons"];
    $Wat_FR = $_POST["Wat_FR"];
*/
    $data = json_decode(file_get_contents("php://input"));
    $meter_No = $data->meter_No;
    $user_id = $data->user_id;
    $Elec_bal = $data->Elec_bal;
    $Wat_bal = $data->Wat_bal;
    $Elec_cons = $data->Elec_cons;
    $Wat_cons = $data->Wat_cons;
    $Wat_FR = $data->Wat_FR;
    




    try {
        require_once 'c:\xampp\htdocs\smartE\xxx.php';
        require_once base_root('\includes\Dbh.php');
        require_once base_root('\Model\insert_model.inc.php');
        require_once base_root('\Control\insert_contr.inc.php');

        //Error handlers
        $update= new UpdateC($meter_No, $user_id, $Elec_bal, $Wat_bal, $Elec_cons, $Wat_cons, $Wat_FR);
        $update->update_data();
        echo json_encode(array('message'=>'Post created'));
        
        die();

    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }
    

} else {
    echo json_encode(array('message'=>'Post not created'));
}


