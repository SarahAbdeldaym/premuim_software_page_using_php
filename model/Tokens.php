<?php

class Tokens {

    public Database $database;
    public $table;

    public function __construct() {
        $this->database = new Database;
        $this->table = $this->database->Table('tokens');
    }


    // Insert token in tokens table
    public function AddUserToken($user_id, $hashed_token) {
        $check = $this->table->insert(
            [
                'user_id' => $user_id,
                'hashed_token' => $hashed_token
            ]
        );
        if ($check) {
            return true;
        } else {
            return false;
        }
    }
}
