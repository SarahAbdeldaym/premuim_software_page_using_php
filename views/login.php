<?php
// Initialize the session
session_start();


$login_result= new Login; 
$token=new Token;
$check_loggedin=false;
if(isset($_POST["login"])){
    if(!empty($_POST["login"])) {
    
        $user= $login_result->checkData($_POST['email'],$_POST['password']);
        $remember_me_token = $login_result->generateRandomString();
         if($user) {
            $user_id=$login_result->get_userId($_POST['email']);
                 $_SESSION["user_id"]= $user_id;
                 if(!empty($_POST["remember-me"])) {
                     setcookie ("user_email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
                     setcookie ("password",sha1($_POST["password"]),time()+ (10 * 365 * 24 * 60 * 60));
                     setcookie ("remember_me_token",$remember_me_token,time()+ (10 * 365 * 24 * 60 * 60));
                     $token->AddUserToken($user_id,$remember_me_token);
                }
                echo "User data is correct";
           //redirect to home page
          
        //    header("Location:views/home.php");
           //check if user logged in or not
           $check_loggedin=true;

         }
         else{
             echo "Wrong user data";
             $check_loggedin=false;
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
        /* .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            opacity: 1;
            transition: opacity 0.6s;
            margin-bottom: 15px;
        } */
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
        <!-- <div class="alert">
            There is something wrong in email or password
        </div> -->
            <form class="form-style" action="" method="post" enctype="multipart/form-data">
                <h2>Login</h2>
                <input type="text" placeholder="Enter your email" name="email" value="<?php if(isset($_COOKIE["user_email"])) { echo $_COOKIE["user_email"]; } ?>" required>
                <input type="password" placeholder="Enter your password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required><br>
                <input id="rem-me" type="checkbox" value="Remember me" name="remember-me"<?php if(isset($_COOKIE["user_email"])) { ?> checked <?php } ?>>
                <label for="rem-me">Remember me</label><br>
                <input class="btn-login" type="submit" name="login" value="Login"><br><br>
                
            
                <a href="#">Create new account?</a>
            </form>
        </div>

       

   </div>
    
</body>
</html>