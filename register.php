<?php

require_once("vendor/autoload.php");

$register_validation_errors_arr = [];
$register_user = new Users;

if (isset($_POST["submit"])) {

    $validated = true;

    if (
        empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])
        || empty($_POST["cardName"]) || empty($_POST["cardNumber"])
        || empty($_POST["cvv"]) || empty($_POST["passwordConfirm"])
        ||  empty($_POST["expirationDate"])
    ) {
        array_push($register_validation_errors_arr, "All input must be filled.");
        $validated = false;
    } else {

<<<<<<< HEAD
        if (!(strlen(trim($_POST["username"])) < _max_username_length_)) {
=======
        if (!(strlen(trim($POST["username"])) < _max_username_length)) {
>>>>>>> 0f4191f06a951fec6f4daa0f0369e84e26ab9641
            array_push($register_validation_errors_arr, "Name is not valid!");
            $validated = false;
        }

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            array_push($register_validation_errors_arr, "Email is not valid!");
            $validated = false;
        }

<<<<<<< HEAD
        if (!(trim(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])))) {
=======
        if (!(trim(preg_match("/^(?=.[a-z])(?=.[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])))) {
>>>>>>> 0f4191f06a951fec6f4daa0f0369e84e26ab9641
            array_push($register_validation_errors_arr, "Password must be Minimum eight characters,
            at least one uppercase letter, one lowercase letter and one number.");
            $validated = false;
        }

        if ($_POST["password"] != $_POST["passwordConfirm"]) {
            array_push($register_validation_errors_arr, "Password are not matching dude!");
            $validated = false;
        }

        if (!(trim(preg_match("/^[0-9]{16}$/", $_POST["cardNumber"])))) {
            array_push($register_validation_errors_arr, "You have a weird card number!");
            $validated = false;
        }


        if (!(trim(preg_match("/^[0-9]{3}$/", $_POST["cvv"])))) {
            array_push($register_validation_errors_arr, "CVV in not valid!");
            $validated = false;
        }


        if (!preg_match("/^(0[1-9]|1[0-2])[\/][0-9]{2}$/", $_POST["expirationDate"])) {
            array_push($register_validation_errors_arr, "The expire date format is not correct!");
            $validated = false;
        }
    }

    // Checking if user is already registered in the database.
    $register_user = new Users;
    $email_registered = $register_user->is_registered($_POST["email"]); // True if email is already registered.
    if ($email_registered) {
        array_push($register_validation_errors_arr, "Email is already registered with another account, please try with different Email.");
        $validated = false;
    }

    // Adding the user to the database
    if ($validated) {
        $register_user->register_insert($_POST["username"], $_POST["email"], $_POST["password"]);
        header('Location: views/login.html');
    }
}

require_once("views/register.html");
