<?php

class Orders {

    public Database $database;
    public $table;

    public function __construct() {
        $this->database = new Database();
        $this->table = $this->database->Table("Orders");
    }

    public function is_current_key($key) {
        $current_key = $this->database->Table('orders')->where('user_id','=' ,'1')->pluck('download_key')->last();
        if ($current_key == $key) {
            return true;
        } else {
            return false;
        }
    }

    public function get_count($user_id) {
        $current_key = $this->database->Table('orders')->where('user_id','=' ,'1')->pluck('download_count')->last();
        return $current_key;
    }
}
