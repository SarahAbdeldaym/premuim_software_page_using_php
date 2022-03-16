<?php

class Token{
  
   public Database $database;
   public $table;
   

   public function __construct()
    {
       $this->database = new Database;
       $this->table = $this->database->Table('tokens');
    }




// Insert token in tokens table

    public function AddUserToken($user_id,$token){

        $hashed_token=sha1($token);
        $check=$this->table->insert(
            [
                'user_id' => $user_id,
                'remember_me_token' => $hashed_token
            ]);
        if($check){
            return true;
        }
        else{
          return false;
        }
    }




 } 
 ?>