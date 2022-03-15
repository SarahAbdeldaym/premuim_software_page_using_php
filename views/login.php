<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to home page
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}*/

if(!empty($_POST["login"])) {
	$conn = mysqli_connect(_host_, _username_, _password_, _database_);
	$sql = "Select * from users where user_email = '" . $_POST["email"] . "' and passowrd = '" . sha1($_POST["password"]) . "'";
	$result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["user_id"]= $user["user_id"];
			
			if(!empty($_POST["remember"])) {
				setcookie ("user_login",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("passowrd",$_POST["passowrd"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["user_login"])) {
					setcookie ("user_login","");
				}
				if(isset($_COOKIE["passowrd"])) {
					setcookie ("passowrd","");
				}
			}
	} 
}
 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/loginstyle.css">


    <title>Login</title>
    <style>
        .btn-login{
            font-size: 22px;
        }
        #rem-me{
            width: 20px;
            height: auto;

        }
       
        span{
            padding-left: 41px;
            color: red;
            
        }
    </style>
</head>
<body>
   <div class="container">
       <div class="imageback">
           
        <div>
            <img src="views/back.jpg" alt="Image">
        </div>
       </div>

        <div class="login-form">
            
        <?php if(empty($_SESSION["user_id"])) { ?>

            <form class="form-style" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <h2>Login</h2>
                <input type="text" placeholder="Enter your email" name="email"  value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" required>
                <input type="password" placeholder="Enter your password" name="password" value="<?php if(isset($_COOKIE["passowrd"])) { echo $_COOKIE["passowrd"]; } ?>" required><br>
                <input id="rem-me" type="checkbox" value="Remember me" name="remember-me" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?>>
                <label for="rem-me">Remember me</label><br>
                <input class="btn-login" type="submit" name="login" value="Login"><br><br>
                
            
                <a href="#">Create new account?</a>
            </form>
            <?php } else { ?>
                You already have logged in. <a href="views/logout.php">Logout</a>

            <?php } ?>
        </div>

       

   </div>
    
</body>
</html>