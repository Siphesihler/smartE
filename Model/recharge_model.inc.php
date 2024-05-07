<?php

class Recharge extends Dbh {

    protected function get_voucher(string $voucher){
        $query = "SELECT*FROM voucher WHERE voucher = :voucher;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":voucher", $voucher);
        $stmt-> execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    protected function delete_voucher(string $voucher){
        $query = "DELETE FROM voucher WHERE voucher = :voucher;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":voucher", $voucher);
        $stmt-> execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    protected function create_TopUp(int $id, string $voucher, string $Elec_Rech, string $Wat_Rech){
            $query = "INSERT INTO transactions(user_id, voucher, Elec_Rech, Wat_Rech) VALUES(:id, :voucher, :Elec_Rech, :Wat_Rech);";//named parameter
            $stmt = $this->connect()->prepare($query);

            $stmt-> bindParam(":id",$id);
            $stmt-> bindParam(":voucher",$voucher);
            $stmt-> bindParam(":Elec_Rech",$Elec_Rech);
            $stmt-> bindParam(":Wat_Rech",$Wat_Rech);
            
            $stmt->execute();
            
    
    }

}
