<?php
require_once("config.php");
$register_validation_errors_arr = [];

if (isset($_POST["submit"])) {

    $validated = true;

    if (
        empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])
        || empty($_POST["cardName"]) || empty($_POST["cardNumber"])
        || empty($_POST["cvv"]) || empty($_POST["passwordConfirm"])
        ||  empty($_POST["expirationDate"])
    ) {
        array_push($register_validation_errors_arr, "all input must be filled");
        $validated = false;
    } else {

        if (!(strlen(trim($_POST["username"])) < _max_username_length_)) {
            array_push($register_validation_errors_arr, "Name is not valid!");
            $validated = false;
        }

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            array_push($register_validation_errors_arr, "Email is not valid!");
            $validated = false;
        }

        if (isset($_POST["password"]) && isset($_POST["passwordConfirm"])) {
            $uppercase = preg_match('@[A-Z]@', $_POST["password"]);
            $lowercase = preg_match('@[a-z]@', $_POST["password"]);
            $number    = preg_match('@[0-9]@', $_POST["password"]);
            if ($_POST["password"] == $_POST["passwordConfirm"]) {
                if (!(strlen(trim($uppercase || !$lowercase || !$number || strlen($_POST["password"]))) < _max_password_length_)) {
                    array_push($register_validation_errors_arr, "Password must be a minimum of 8 characters and contain at least one capital letter,
         a number and no special character such as an underscore or exclamation point.");
                }
            } else {
                array_push($register_validation_errors_arr, "password are not matching dude!!");
            }
        }

        if (!(strlen(trim(preg_match('@[0-9]{16}@', $_POST["cardNumber"]))))) {
            array_push($register_validation_errors_arr, "you have a weird card number !!");
        }


        if (!(strlen(trim(preg_match('@[0-9]{3}@', $_POST["cvv"]))))) {
            array_push($register_validation_errors_arr, "Please enter a valid CVVg code");
        }

        if (!preg_match("/^(0[1-9]|1[0-2])[\/][0-9]{2}$/", $_POST["expirationDate"])) {
            array_push($register_validation_errors_arr, "The expire date format is not correct!");
        }
    }
}

require_once("views/register.html");