<?php

require_once("vendor/autoload.php");

$DB=new Database;

$check=new Login;


if(isset($_POST["login"])){

   
    $result=$check->checkData($_POST['email'],$_POST['password']);
    echo "<br>Result: ".$result;
   }


// if(isset($_POST["submit"])){

   
//     $result=$check->register_insert($_POST['email'],$_POST['password']);
//     echo "<br>Result: ".$result;
//    }
require_once("views/profile.html");
// require_once("views/register.php");
?>