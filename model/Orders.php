<?php

class Orders {


    public Database $database;
    public $table;

    public function __construct() {
        $this->database = new Database();
        $this->table = $this->database->Table("Orders");
    }

    public function register_Orders_insert($userId) {

        $error = "";
        $check = $this->table->insert(
            [
                'order_date' => date("Y/m/d"),
                'downnload_Count' => 0,
                'user_id' => $userId,
                'product_id' => 1

            ]
        );
        if ($check) {
            $error .= "Order data is inserted";
        } else {
            $error = "Order data is not inserted";
        }
        return $error;
    }
}
