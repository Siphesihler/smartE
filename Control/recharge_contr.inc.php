<?php

class RechargeC extends Recharge {
    private $voucher;
    private $Elec_Rech = "0";
    private $Wat_Rech = "0";

    public function __construct($voucher){
        $this->voucher = $voucher;
    }
    private function is_input_empty(string $voucher){
        if(empty($voucher)){
            return true;
        }else{
            return false;
        }
    
    }
    private function is_voucher_invalid(string $voucher){
        if(!$this->get_voucher($this->voucher)){
            return true;
        }else{
            return false;
        }
    
    }
    private function TopUp(int $id, string $voucher, string $Elec_Rech, string $Wat_Rech){
        $this->create_TopUp($id, $voucher, $Elec_Rech, $Wat_Rech);
    
    }
    public function recharge_water(){
        $errors = [];
        if($this->is_input_empty($this->voucher)){
            $errors["1."]= "Fill in one of the fields";
        }
        if($this->is_voucher_invalid($this->voucher)){
            $errors["2."]= "Invalid voucher";
        }

        
        if($errors){
            $_SESSION["errors_recharge"]= $errors;   
            return $errors;
        }
        $result = $this->get_voucher($this->voucher);
        $this->Wat_Rech = $result["Value_rands"];
        $_SESSION["user_Rech_elec"] = $result["Value_rands"];
        $this->delete_voucher($this->voucher);
        $this->TopUp($_SESSION["user_id"], $this->voucher, $this->Elec_Rech, $this->Wat_Rech);
        $success = [];
        $success["1."]= "recharge successfully";
        return $success;
    }
    public function recharge_electricity(){
        $errors = [];
        if($this->is_input_empty($this->voucher)){
            $errors["1."]= "Fill in one of the fields";
        }
        if($this->is_voucher_invalid($this->voucher)){
            $errors["2."]= "Invalid voucher";
        }

        
        if($errors){
            $_SESSION["errors_recharge"]= $errors;   
            return $errors;
        }
        $result = $this->get_voucher($this->voucher);
        $this->Elec_Rech = $result["Value_rands"];
        $_SESSION["user_Rech_elec"] = $result["Value_rands"];
        $this->delete_voucher($this->voucher);
        $this->TopUp($_SESSION["user_id"], $this->voucher, $this->Elec_Rech, $this->Wat_Rech);
        $success = [];
        $success["1."]= "recharge successfully";
        return $success;
    }
    
    
}


 