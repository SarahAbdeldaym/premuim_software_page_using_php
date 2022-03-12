<?php

class users{


public Database $database;
   public $table;

   public function __construct() {
        $this->database=new Database();
        $this->table=$this->database->Table("users");
    }

    public function register_insert($email,$pass){
        $hashed_password=sha1($pass);
        $error="";
      $check= $this->table->insert(
        [
            'user_email' => $email,
            'passowrd' => $hashed_password
        ]);
    if($check){
        $error.="User data is inserted";
    }
    else{
        $error="User data is not inserted";
    }
    return $error;
    }
    public function get_useId($email){
       $cur_user= $this->table->where("user_email",$email)->get();
       return $cur_user[0]->user_id;
    }
}
