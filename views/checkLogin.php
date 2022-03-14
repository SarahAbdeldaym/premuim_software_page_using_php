<?php
session_start();
if(!empty($_POST["login"])) {
	$conn = mysqli_connect("localhost", "root", "root", "php_project_os42");
	$sql = "Select * from users where user_email = '" . $_POST["user_email"] . "' and passowrd = '" . md5($_POST["passowrd"]) . "'";
	$result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["user_id"]= $user["user_id"];
			
			if(!empty($_POST["remember"])) {
				setcookie ("user_login",$_POST["user_email"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("passowrd",$_POST["passowrd"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["user_login"])) {
					setcookie ("user_login","");
				}
				if(isset($_COOKIE["passowrd"])) {
					setcookie ("passowrd","");
				}
			}
	} else {
		$message = "Invalid Login";

			
	}
}  			
?>	
<style>
	#frmLogin {
		padding: 20px 60px;
		background: #B6E0FF;
		color: #555;
		display: inline-block;		
		border-radius: 4px;
	}
	.field-group {
		margin-top:15px;
	}
	.input-field {
		padding: 8px;
		width: 200px;
		border: #A3C3E7 1px solid;
		border-radius: 4px;
	}
	.form-submit-button {
		background: #65C370;
		border: 0;
		padding: 8px 20px;
		border-radius: 4px;
		color: #FFF;
		text-transform: uppercase;
	}
	.member-dashboard {
		padding: 40px;
		background: #D2EDD5;
		color: #555;
		border-radius: 4px;
		display: inline-block;
	}
	.member-dashboard a {
		color: #09F;
		text-decoration:none;
	}
	.error-message {
		text-align:center;
		color:#FF0000;
	}
</style>

<?php if(empty($_SESSION["user_id"])) { ?>
<form action="" method="post" id="frmLogin">
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="field-group">
		<div><label for="login">email</label></div>
		<div><input name="user_email" type="text" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" class="input-field">
	</div>
	<div class="field-group">
		<div><label for="passowrd">Password</label></div>
		<div><input name="passowrd" type="passowrd" value="<?php if(isset($_COOKIE["passowrd"])) { echo $_COOKIE["passowrd"]; } ?>" class="input-field"> 
	</div>
	<div class="field-group">
		<div><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
		<label for="remember-me">Remember me</label>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
	</div>       
</form>
<?php } else { ?>
<div class="member-dashboard">You have Successfully logged in!. <a href="logout.php">Logout</a></div>
<?php } ?>