<?php

require_once("vendor/autoload.php");

$login_user = new Users;
$login_error = "";

if (isset($_POST["login"])) {   //login is existing
    if (!empty($_POST["login"])) {  // login have a value
        $user_email = $_POST['email'];
        $hashed_password = sha1($_POST['password']);
        $valid_user = $login_user->is_valid_user($user_email, $hashed_password);
        if ($valid_user) {  // User is valid
            $user_id = $login_user->get_userId($_POST['email']);
            $_SESSION["user_id"] = $user_id;
            if (!empty($_POST["remember-me"])) {    // If remember me is pressed
                $token = new Tokens;
                $remember_me_token = Utility::randomkey(127);
                $hashed_token = sha1($remember_me_token);
                $token->AddUserToken($user_id, $hashed_token);
                setcookie("user_email", $_POST["email"], time() + (10 * 365 * 24 * 60 * 60));
                setcookie("password", sha1($_POST["password"]), time() + (10 * 365 * 24 * 60 * 60));
                setcookie("remember_me_token", $remember_me_token, time() + (10 * 365 * 24 * 60 * 60));
            }

            $download_order = new Orders;
            $current_key = $download_order->get_key($user_id);
            $url = "download.php?key=$current_key";
            header("Location:$url");
        } else {
            $login_error = "Username or password are incorrect, please try again.";
        }
    }
}

require_once("views/login.html");

?>