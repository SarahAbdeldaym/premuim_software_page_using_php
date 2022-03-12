<?php

session_start();

require_once("vendor/autoload.php");

$DB=new Database;
$user=new users;
$orders=new Orders;
if(isset($_POST["submit"])){
    $res=$user->register_insert($_POST['email'],$_POST['password']);
    echo $res;
    $id=$user->get_useId($_POST['email']);
    $result=$orders->register_Orders_insert($id);
    echo "<br>".$result;

}

// header('Location: register.php');
require_once("views/register.php");


?>