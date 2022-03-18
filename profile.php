<?php
session_start();

require_once("vendor/autoload.php");

require_once("views/profile.html");
$profile_edit = new Users();
$id = $_SESSION['user_id'];
if(!empty($_POST['new_email']) && !empty($_POST['new_password']) && !empty($_POST['new_name'])){
    $profile_edit->update_user_email($id);
    $profile_edit->update_user_name($id);
    $profile_edit->update_user_password($id);
}
else if (!empty($_POST['new_email'])) {
    $profile_edit->update_user_email($id);
}
else if (!empty($_POST['new_password'])) {
    $profile_edit->update_user_password($id);
}
else if (!empty($_POST['new_name'])) {
    $profile_edit->update_user_name($id);
}


?>