<?php
require_once("vendor/autoload.php");

$download_order = new Orders;

$current_user_id = "1";
$current_key = $_GET['key'];

// Checking if user and get key are valid
if (isset($_GET['key']) && $download_order->is_valid_key($current_user_id, $current_key)) {
    // Checking if user have reached his maximum downloads number
    if ($download_order->get_count("1") <= 7) { // ('$_POST['user_id']') to be added
        $download_limit_error = "";
    } else {
        $download_limit_error = 'you have reached your maximum downloads limit from that account, please try a different account.';
    };
    require_once("views/download.html");
} else {
    require_once("views/error.html");
}
