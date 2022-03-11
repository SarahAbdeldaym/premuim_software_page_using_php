<?php

class users{

public Database $database;
   public $table;

   public function __construct() {
        $this->database=new Database();
        $this->table=$this->database->Table("users");
    }


}