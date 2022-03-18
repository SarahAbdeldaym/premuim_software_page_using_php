<?php
session_start();

require_once("vendor/autoload.php");

$user = new Users();
$order = new Orders();

function update_user_email($user_id, $current_email, $new_email) {
    $update_email_errors = '';
    if (!empty($new_email) && filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
        if ($new_email != $current_email) {
            $user = new Users();
            $user->updateUserEmail($new_email, $user_id);
        } else {
            $update_email_errors = 'The same email no updates done';
        }
    } else {
        $update_email_errors = 'Email is invalid';
    }
    return $update_email_errors;
}

function update_user_password($user_id, $new_password, $confirm_password) {
    $password_regex = ("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/");
    $update_password_errors = '';
    if (strlen($new_password) < 8 || !preg_match($password_regex, $new_password)) {
        $update_password_errors = 'Password must be at least 8 characters in length and must contain at least one number, 
                                    one upper case letter, one lower case letter and one special character';
    } elseif ($confirm_password != $new_password) {
        $update_password_errors = "Passwords didn't match";
    } else {
        $user = new Users();
        $user->updateUserPassword(sha1($new_password), $user_id);
    }
    return $update_password_errors;
}

// 
if (isset($_POST["submit"])) {

    $old_email = $user->show_user_email($_SESSION["user_id"]);
    $old_password = $user->show_user_password($_SESSION["user_id"]);

    $update_password_errors = '';

    if (isset($_POST["email"])) {
        update_user_email($_SESSION["user_id"], $old_email, $_POST["email"]);
    }

    $input_old_password = sha1($_POST["old_password"]);
    if (isset($input_old_password) == $old_password) {

        if (isset($_POST["password"]) && isset($_POST["confirm_new_password"])) {
            update_user_password($_SESSION["user_id"], sha1($_POST["password"]), sha1($_POST["confirm_new_password"]));
            echo ($_POST["password"]);
            echo ($_POST["confirm_new_password"]);
        }
        if ($input_old_password != $old_password) {
            $update_password_errors = "you entered wrong password";
            echo ("done3");
        }
    }
}



require_once("views/profile.html");
