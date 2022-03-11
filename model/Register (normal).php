<?php
require_once("../views/register.html");

session_start();

if (!isset($_SESSION["is_visited"])) {
    echo "First Visit, Hello!";
    $_SESSION["is_visited"] = true;
} else {
    $_SESSION["counter"] = isset($_SESSION["counter"]) ? $_SESSION["counter"] + 1 : 2;
    echo "you visited this page " . $_SESSION["counter"] . " times";
}


if (isset($_POST["submit"])) {

    $validated = true;

    if (empty($_POST["name"]) || !(strlen(trim($_POST["name"])) < 100)) {
        echo "Name is not valid!<br>";
        $validated = false;
    }
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        echo "Email is not valid!<br>";
        $validated = false;
    }
    if (empty($_POST["message"]) && $_POST["message"] != 0) {
        echo "Message can't be empty!<br>";
        $validated = false;
    }
    if (strlen(trim($_POST["message"])) > 255) {
        echo "Message is too long!<br>";
        $validated = false;
    }

    if ($validated) {
        $fp = fopen("log.txt", "a+");
        $date = date('m/d/Y h:i:s a', time());
        fwrite($fp, "$date");
        fwrite($fp, ", " . $_SERVER['REMOTE_ADDR']);


        fwrite($fp, ", {$_POST["name"]}");
        fwrite($fp, ", {$_POST["email"]}");
        fwrite($fp, ", {$_POST["message"]}");

        fwrite($fp, PHP_EOL);
        fclose($fp);


        echo "<h3>Thank you for contacting Us</h3>";
        echo "<b>Name:</b> {$_POST["name"]}<br />";
        echo "<b>Email:</b> {$_POST["email"]}<br />";
        echo "<b>Name:</b> {$_POST["message"]}<br />";
        $_POST = array();

        exit();
    }
}
