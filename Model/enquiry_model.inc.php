<?php

class Enquiry extends Dbh {
    protected function set_enquiry(int $id, string $fullName, string $phone, string $email, string $email_subject, string $email_message){
            $query = "INSERT INTO enquiry(user_id, fullName, phone, email, email_subject, email_message) VALUES(:id, :fullName, :phone, :email, :email_subject, :email_message);";//named parameter
            $stmt = $this->connect()->prepare($query);

            $stmt-> bindParam(":id",$id);
            $stmt-> bindParam(":fullName",$fullName);
            $stmt-> bindParam(":phone",$phone);
            $stmt-> bindParam(":email",$email);
            $stmt-> bindParam(":email_subject",$email_subject);
            $stmt-> bindParam(":email_message",$email_message);
    
    
            $stmt->execute();
            
    
    }

}
