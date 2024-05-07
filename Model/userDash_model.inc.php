<?php
class UserDash extends Dbh {
    protected function voucher_data(){
        $query = "SELECT*FROM transactions ORDER BY id DESC LIMIT 10;";
        $stmt = $this->connect()->prepare($query);
        $stmt-> execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    protected function is_meter_registered(int $id){
        $query = "SELECT*FROM meters WHERE user_id = :id ORDER BY created_at DESC LIMIT 1;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt-> execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    protected function is_meter_registered_M(int $id){
        $query = "SELECT*FROM meters WHERE meter_No = :id ORDER BY created_at DESC LIMIT 1;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt-> execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    protected function get_meter_data_id(int $id){
        $query = "SELECT Elec_cons, Wat_cons, created_at FROM meters WHERE user_id = :id ORDER BY created_at ASC LIMIT 20;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt-> execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    protected function get_meter_data_M(int $id){
        $query = "SELECT Elec_cons, Wat_cons, created_at FROM meters WHERE meter_No = :id ORDER BY created_at ASC LIMIT 20;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt-> execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    

}

