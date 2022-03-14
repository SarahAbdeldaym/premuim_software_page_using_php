<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
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
                <input type="text" placeholder="Enter your email" name="email" required>
                <input type="password" placeholder="Enter your password" name="password" required><br>
                <input id="rem-me" type="checkbox" value="Remember me" name="remember-me">
                <label for="rem-me">Remember me</label><br>
                <input class="btn-login" type="submit" name="login" value="Login"><br><br>
                
            
                <a href="#">Create new account?</a>
            </form>
        </div>

       

   </div>
    
</body>
</html>