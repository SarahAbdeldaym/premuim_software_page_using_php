<?php

class Login{
  
   public Database $database;
   public $table;
   

   public function __construct()
    {
       $this->database = new Database;
       $this->table = $this->database->Table('users');
    }




    // check if user exist in db or not
    public function checkData($useremail,$pass){

        $validemail=$this->table->where('user_email',"=",$useremail)->exists();
        // $hashpassword=sha1($pass);
        // $validepassword=$this->table->where('passowrd',"=",$hashpassword)->exists();
        
        $validepassword=$this->table->where('passowrd','=',$pass)->exists();
        if($validemail && $validepassword){
          return true;
          
        }
        else{
           return false;
            
        }
        
    }



    // fn to get specific user id
    public function get_userId($email){
        $cur_user= $this->table->where("user_email",$email)->get();
        
        return $cur_user[0]->user_id;
     }
    // To generate Token random str
    public function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
      
        for ($i = 0; $i < 127; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
    return $randomString;
    }


    
   
}



?>