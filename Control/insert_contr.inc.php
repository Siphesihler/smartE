<?php


class UpdateC extends UpdateM {
    private $meter_No;
    private $user_id;
    private $Elec_bal;
    private $Wat_bal;
    private $Elec_cons;
    private $Wat_cons;
    private $Wat_FR;

    public function __construct($meter_No, $user_id, $Elec_bal, $Wat_bal, $Elec_cons, $Wat_cons, $Wat_FR){
        $this->meter_No = $meter_No;
        $this->user_id = $user_id;
        $this->Elec_bal = $Elec_bal;
        $this->Wat_bal = $Wat_bal;
        $this->Elec_cons = $Elec_cons;
        $this->Wat_cons = $Wat_cons;
        $this->Wat_FR = $Wat_FR;
    }
    
    private function create_data(int $meter_No, int $user_id, string $Elec_bal, string $Wat_bal, string $Elec_cons, string $Wat_cons, string $Wat_FR){
        $this->set_data($meter_No, $user_id, $Elec_bal, $Wat_bal, $Elec_cons, $Wat_cons, $Wat_FR);
    
    }
    public function update_data(){
        

        $this->create_data($this->meter_No, $this->user_id, $this->Elec_bal, $this->Wat_bal, $this->Elec_cons, $this->Wat_cons, $this->Wat_FR);

        $stmt= NULL;
        $pdo= NULL;
    }
    
}


