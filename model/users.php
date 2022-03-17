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
        if (isset($registered)) {
            return true;
        } else {
            return false;
        }
    }

    // check if user exists in db
    public function is_valid_user($email, $hashed_password) {
        $valid_email = $this->table->where('user_email', "=", $email)->exists();
        $valid_password = $this->table->where('password', "=", $hashed_password)->exists();
        if ($valid_email && $valid_password) {
            return true;
        } else {
            return false;
        }
    }

    // fn to get specific user id
    public function get_userId($email) {
        $cur_user = $this->table->where("user_email", $email)->get();

        return $cur_user[0]->user_id;
    }
}
