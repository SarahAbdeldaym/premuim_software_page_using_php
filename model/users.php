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

    public function is_valid_user($email, $hashed_password) {
        $valid_email = $this->table->where('user_email', "=", $email)->exists();
        $valid_password = $this->table->where('password', "=", $hashed_password)->exists();
        if ($valid_email && $valid_password) {
            return true;
        } else {
            return false;
        }
    }

    public function get_userId($email) {
        $cur_user = $this->table->where("user_email", $email)->get();
        return $cur_user[0]->user_id;
    }

    public function get_email_using_userId($user_id) {
        $cur_user = $this->table->where("user_id", $user_id)->get();
        return $cur_user[0]->user_email;
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 77f907e48f0e5eed356ba288f164275c73e24739

    public function show_user_email($user_id) {
        $email = $this->table->where("user_id", $user_id)->get();
        return $email[0]->user_email;
    }
    public function show_user_password($user_id) {
        $password = $this->table->where("user_id", $user_id)->get();
        return $password[0]->password;
    }

    public function updateUserEmail($new_user_email, $user_id) {
        $this->table->where('user_id', "=", $user_id)->update(['user_email' => $new_user_email]);
    }
    public function updateUserPassword($user_new_password, $user_id) {
        $this->table->where('user_id', "=", $user_id)->update(['password' => $user_new_password]);
    }


<<<<<<< HEAD
=======
=======
    
    public function update_user_email($id){
        $this->table->where($id, $_SESSION["user_id"])->update(['user_email' => $_POST['new_email']]);
    }

    public function update_user_name($id){
        $this->table->where($id, $_SESSION["user_id"])->update(['user_name' => $_POST['new_name']]);
    }

    public function update_user_password($id){
        $hashed_password=sha1($_POST['new_password']);
        $this->table->where($id, $_SESSION["user_id"])->update(['password' => $hashed_password ]);
    }
>>>>>>> c1f103f54068167282d080142119c5a5c918a7f8
>>>>>>> 77f907e48f0e5eed356ba288f164275c73e24739
}
