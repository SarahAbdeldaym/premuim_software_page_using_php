<?php
$register_validation_errors_arr = [];

require_once("views/register.html");

if (isset($_POST["submit"])) {

    $validated = true;

    if (empty($_POST["username"]) || !(strlen(trim($_POST["username"])) < _max_username_length_)) {
        array_push($register_validation_errors_arr, "Name is not valid!");
        $validated = false;
    }
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        array_push($register_validation_errors_arr, "Email is not valid!");
        $validated = false;
    }
    if (empty($_POST["message"]) && $_POST["message"] != 0) {
        array_push($register_validation_errors_arr, "Message can't be empty!");
        $validated = false;
    }
    if (strlen(trim($_POST["message"])) > 255) {
        array_push($register_validation_errors_arr, "Message is too long!");
        $validated = false;
    }

    // Printing all validation errors to the user.
    echo ("Inside submit");

}
var_dump($_POST);
var_dump($register_validation_errors_arr);
foreach ($register_validation_errors_arr as $error) {
    echo $error;
}
