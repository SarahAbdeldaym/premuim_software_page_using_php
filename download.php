<?php
$download_limit_error = "";
require_once("vendor/autoload.php");

$download_order = new Orders;

function is_limit_reached($link) {
    $download_order = new Orders;
    if ($download_order->get_count('1') < 8) { //('$_post['id']') to be added
        echo ($link);
    } else {
        echo("");
        $download_limit_error = "you have reached your maximum downloads number";   
    }
}

if (isset($_GET['key']) && $download_order->is_current_key($_GET['key'])) {
    require_once("views/download.html");
} else {
    require_once("views/error.html");
}
?>
