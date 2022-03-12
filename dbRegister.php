<?php
require_once("vendor/autoload.php");

if (isset($_POST["submit"])) {
    users::insert(
        [
            'user_email' => $_POST['email'],
            'password' => $_POST['password']
        ]);
    orders::insert()
}
