<?php
class EnquiryC extends Enquiry {
    private $fullName;
    private $phone;
    private $email;
    private $subject;
    private $message;

    public function __construct($fullName, $phone, $email, $subject, $message){
        $this->fullName = $fullName;
        $this->phone = $phone;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }
    private function is_input_empty(string $fullName, string $phone, string $email, string $subject, string $message){
        if(empty($fullName) || empty($phone)||empty($email)|| empty($subject)|| empty($message)){
            return true;
        }else{
            return false;
        }
    
    }
    private function is_email_invalid(string $email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    
    }
    private function create_enquiry(int $id, string $fullName, string $phone, string $email, string $subject, string $message){
        $this->set_enquiry($id, $fullName, $phone, $email, $subject, $message);
    
    }
    public function send_enquiry(){
        $errors = [];
        if($this->is_input_empty($this->fullName, $this->phone, $this->email, $this->subject, $this->message)){
            $errors["1."]= "Fill in all fields";
        }
        if($this->is_email_invalid($this->email)){
            $errors["2."]= "Invalid email";
        }
        if($errors){
            $_SESSION["errors_enquiry"]= $errors;   
            return $errors;
        }
        $this->create_enquiry($_SESSION["user_id"], $this->fullName, $this->phone, $this->email, $this->subject, $this->message);
        $success = [];
        $success["1."]= "update successfully";
        $stmt= NULL;
        return $success;
    }
    
    
}


