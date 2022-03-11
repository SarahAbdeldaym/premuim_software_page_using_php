<?php
$register_validation_errors_arr = [];

if (isset($_POST["submit"])) {

    $validated = true;

    if (empty($_POST["username"]) || !(strlen(trim($_POST["username"])) > _max_username_length_)) {
        array_push($register_validation_errors_arr, "Name is not valid!");
        $validated = false;
    }
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        array_push($register_validation_errors_arr, "Email is not valid!");
        $validated = false;
    }
}

require_once("views/register.html");
