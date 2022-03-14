<?php

class Users {

    public Database $database;
    public $table;

    public function __construct() {
        $this->database = new Database();
        $this->table = $this->database->Table("users");
    }

    public function register_insert($username, $email, $pass) {
        $hashed_password = sha1($pass);
        $error = "";
        $check = $this->table->insert(
            [
                'user_name' => $username,
                'user_email' => $email,
                'password' => $hashed_password
            ]
        );
        if ($check) {
            $error = "User data is inserted";
        } else {
            $error = "User data is not inserted";
        }
        return $error;
    }
    public function is_registered($email) {
        $registered = $this->table->where("user_email", $email)->first();
        if(isset($registered)){
            return true;
        }else{
            return false;
        }
    }
}
