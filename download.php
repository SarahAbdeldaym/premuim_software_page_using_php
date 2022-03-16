<?php
$download_limit_error = "";
require_once("vendor/autoload.php");

$download_order = new Orders;

if(isset($_GET['key']) && $download_order->is_current_key($_GET['key'])){
    require_once("views/download.html");
}else{
    require_once("views/error.html");
}


