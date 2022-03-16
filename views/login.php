<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to home page
/*if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
    header("location: home.php");
    exit;
}*/

$result= new Login;
    

if(!empty($_POST["login"])) {


   $user= $result->checkData($_POST['email'],$_POST['password']);
    if($result){
       $user_id=$result->get_userid($_POST['email']);
      // echo $user_id;
    }
    $remember_me_token = $result->generateRandomString(); 


	if($user) {
			$_SESSION["user_id"]= $user_id;

			if(!empty($_POST["remember-me"])) {
				setcookie ("user_email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("password",sha1($_POST["password"]),time()+ (10 * 365 * 24 * 60 * 60));
                setcookie ("remember_me_token",$remember_me_token,time()+ (10 * 365 * 24 * 60 * 60));

			} else {
				if(isset($_COOKIE["user_email"])) {
					setcookie ("user_email","");
				}
				if(isset($_COOKIE["password"])) {
					setcookie ("password","");
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
            

            <form class="form-style" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <h2>Login</h2>
                <input type="text" placeholder="Enter your email" name="email"  value="<?php if(isset($_COOKIE["user_email"])) { echo $_COOKIE["user_email"]; } ?>" required>
                <input type="password" placeholder="Enter your password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required><br>
                <input id="rem-me" type="checkbox" value="Remember me" name="remember-me" <?php if(isset($_COOKIE["user_email"])) { ?> checked <?php } ?>>
                <label for="rem-me">Remember me</label><br>
                <input class="btn-login" type="submit" name="login" value="Login"><br><br>
                
            
                <a href="#">Create new account?</a>
            </form>
           
        </div>

       

   </div>
    
</body>
</html>