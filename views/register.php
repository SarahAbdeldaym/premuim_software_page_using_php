<?php 
    
    // $user=new Login();
    // $email=$_POST['email'];
    // $pass=$_POST['password'];
    // if(isset($_POST["submit"])){
    //     $res=$user->register_insert($email,$pass);
    //     echo "Error".$res;
    // }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/loginstyle.css">

    <title>Signup</title>
    <style>
        .login-form{
            height: 596px;
        }
        .form-style{
            position: relative;
            top: 8%;
        }
        a{
            padding-left: 20%;
        }

        #ex{
            width: 50%;
            
        }
        #sec{
            width: 34%;
        }
        #register{
            width: 31%;
            height: auto;
        }
       
    </style>
</head>
<body>
   <div class="container">
       <div class="imageback">
           
        <div>
            <img id="register" src="views/register.png" alt="Image">
        </div>
       </div>

        <div class="login-form">

            <form class="form-style" action="#" method="post" enctype="multipart/form-data">
                <h2>Register</h2>
                <input type="text" placeholder="Enter username" required>
                <input type="email" placeholder="Enter your email" name="email"required>
                <input type="text" placeholder="Enter card name" required>
                <input type="text" placeholder="Enter card number" required>
                <div class="devide">
                    <input id="ex" type="text" placeholder="Expiration(mm/yy)" required>
                    <input id="sec" type="text" placeholder="CVV" required>
                </div>
              
                <input type="password" placeholder="Enter password" name="password" required>
                <input type="password" placeholder="Confirm password" required>
                <input class="pay-btn" type="submit" name="submit" value="Pay"><img id="visa" src="views/visa.png" alt="visa logo"><br><br>
                <a href="#">I already have an account? <strong>Login</strong></a>
            </form>
        </div>

       

   </div>
    
</body>
</html>