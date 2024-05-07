<?php
class UserDashC extends UserDash {
    private $id;
    public $Elec_bal;
    public $Elec_cons;
    public $Wat_bal;
    public $Wat_cons;
    
   

    public function __construct($id){
        $this->id = $id;
    }
    
    public function get_voucher_data(){
        $results= $this->voucher_data();
        $errors=[];
        if (!$results){
            $errors["1."]= "Fill in all fields";
            return $errors;
        }else{
            return $results;
        }
    }
    public function get_latest_data_id(){
        $results= $this->is_meter_registered($this->id);
        $_SESSION["user_meterNo"] = htmlspecialchars($results["meter_No"]);
        
        if (!$results){
            $this->Elec_bal=0;
            $this->Elec_cons=0;
            $this->Wat_bal=0;
            $this->Wat_cons=0;
        }else{
            $this->Elec_bal= htmlspecialchars($results["Elec_bal"]);
            $this->Elec_cons=htmlspecialchars($results["Elec_cons"]);
            $this->Wat_bal=htmlspecialchars($results["Wat_bal"]);
            $this->Wat_cons=htmlspecialchars($results["Wat_cons"]);
        }
    }
    public function get_latest_data_M(){
        $results= $this->is_meter_registered_M($this->id);

        if (!$results){
            $this->Elec_bal=0;
            $this->Elec_cons=0;
            $this->Wat_bal=0;
            $this->Wat_cons=0;
        }else{
            $this->Elec_bal= htmlspecialchars($results["Elec_bal"]);
            $this->Elec_cons=htmlspecialchars($results["Elec_cons"]);
            $this->Wat_bal=htmlspecialchars($results["Wat_bal"]);
            $this->Wat_cons=htmlspecialchars($results["Wat_cons"]);
        }
        return $results;
    }
    public function get_chart_data_id(){
        $results= $this->get_meter_data_id($this->id);

        if (!$results){
            return false;
        }else{
            return $results;
        }
    }
    public function get_chart_data_M(){
        $results= $this->get_meter_data_id($this->id);

        if (!$results){
            return false;
        }else{
            return $results;
        }
    }
    

}

