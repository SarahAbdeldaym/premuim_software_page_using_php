<?php 

class Validation{

   public $email_error="";
   public $pass_error="";

//Validation_Email
   public function validate_email($email){

        if(isset($email) && empty($email))
        {  
            
            $email_error="* Email is Required";
            return true;

        }
        else{
            return false;
        }
   }

  //Validation_Password 
   public function validate_password($password){

        if(isset($password) && empty($password))
        {  
            
            $pass_error="* Password is Required";
            return true;

        }
        else{
            return false;
        }
    }
    
    //check if there is any error 
    public function isSuccess(){
        if(empty($this->email_error) && empty($this->pass_error)) return true;
    }

   public function getEmailErrors(){
    if(!empty($this->email_error)){
        return $this->email_error;
    }
   }

   public function getPassErrors(){
    if(!empty($this->pass_error)){
        return $this->pass_error;
    }
   }
   




}




 ?>