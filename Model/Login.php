<?php

class Login{
  
   public Database $database;
   public $table;
   

   public function __construct()
    {
       $this->database = new Database;
       $this->table = $this->database->Table('users');
    }
    public function checkData($useremail,$pass){

        $errors="";
        $validemail=$this->table->where('user_email',"=",$useremail)->exists();
        echo "Email:  ".$validemail;
        $hashpassword=sha1($pass);
        $validepassword=$this->table->where('passowrd',"=",$hashpassword)->exists();
        
        // $validepassword=$this->table->where('passowrd','=',$pass)->exists();
        echo "<br>Password:   ".$validepassword;
        if($validemail && $validepassword){
           $errors.="Data is founded in user table";
          
        }
        else{
            $errors.="There is something wrong in email or password or both";
            
        }
        return $errors;
        
    }
   
}



?>