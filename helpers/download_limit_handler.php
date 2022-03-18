<?php
require_once("../vendor/autoload.php");

$download_order = new Orders;

if ($download_order->get_count("1") <= 7) { // ('$_POST['user_id']') to be added
// Creating new link and increasing the counter for this user
    $order_date = date("d.F.Y, g:i a");
    $new_count = $download_order->get_count("1") + 1;  // user id to be added
    $new_key = Utility::randomkey(50);
    $user_id = 1; // user real id to be added
    $product_id = 1; // always fixed

    // Inserting into the database
    $download_order->order_insert($order_date, $new_count, $new_key, $user_id, $product_id);

    // redirecting the user to the new link
    $new_url = "../download.php?key=$new_key";
    header("Location: $new_url");

}else{
    $old_key = $download_order->get_key("1");
    $old_url = "../download.php?key=$old_key";
    header("Location: $old_url");
}