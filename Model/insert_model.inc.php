<?php

class UpdateM extends Dbh {
   
    protected function set_data(int $meter_No, int $user_id, string $Elec_bal, string $Wat_bal, string $Elec_cons, string $Wat_cons, string $Wat_FR){
            $query = "INSERT INTO meters(user_id, meter_No, Elec_bal, Wat_bal, Elec_cons, Wat_cons, Wat_FR) VALUES(:user_id, :meter_No, :Elec_bal, :Wat_bal, :Elec_cons, :Wat_cons, :Wat_FR);";//named parameter
    
            $stmt = $this->connect()->prepare($query);
    
            $stmt-> bindParam(":user_id",$user_id);
            $stmt-> bindParam(":meter_No",$meter_No);
            $stmt-> bindParam(":Elec_bal",$Elec_bal);
            $stmt-> bindParam(":Wat_bal",$Wat_bal);
            $stmt-> bindParam(":Elec_cons",$Elec_cons);
            $stmt-> bindParam(":Wat_cons",$Wat_cons);
            $stmt-> bindParam(":Wat_FR",$Wat_FR);
    
    
            $stmt->execute();
    
    }
}
