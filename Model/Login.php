<?php

class Login{
  
   public Database $database;
   public $table;
   

   public function __construct()
    {
       $this->database = new Database;
       $this->table = $this->database->Table('users');
    }

    // public function register_insert($email,$pass){
       
    //     $hashed_password=sha1($pass);
    //     $error="";
    //     $check= $this->table->insert(
    //         [
    //             'user_email' => $email,
    //             'passowrd' => $hashed_password
    //         ]);
    //     if($check){
    //         $error.="Data is inserted successfuly";
    //     }
    //     else{
    //         $error="Error ";
    //     }
    //     return $error;
    // }
   

    public function checkData($useremail,$pass){

        $errors="";
        $validemail=$this->table->where('user_email',"=",$useremail)->exists();
        //echo "Email:  ".$validemail;
        $hashpassword=sha1($pass);
       // $validepassword=$this->table->where('passowrd',"=",$hashpassword)->exists();
        
        $validepassword=$this->table->where('passowrd','=',$pass)->exists();
       // echo "<br>Password:   ".$validepassword;
        if($validemail && $validepassword){

           // $currentuser = $this->table->select("user_id")-> where ('user_email',"=",$useremail)->get();
          return true;
           
           
            //echo $user_id;

         // return true; // $errors.="Data is founded in user table";
          
        }
        else{
            //$errors.="There is something wrong in email or password or both";
            return false;
        }
        return $errors;
        
    }

    public function get_userid($email){

$cur_user= $this->table->where("user_email",$email)->get();
return $cur_user[0]->user_id;


    }

    public function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
  
    for ($i = 0; $i < 128; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
    }
   
}



?>