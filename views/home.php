<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/homestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <header>
        <nav>
            <a id="logout" href="views/logout.php">Logout <i class="fa fa-sign-out"></i></a>
        </nav>
        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </header>
    <div class="product">

        <div class="details">
            <img  id="prod-img"src="views/product-image.jpg" alt="product image" >
            <h3>Name: Iphone 11 pro max</h3>
            <h3>Size: 150Mb</h3>
            <button id="download">Download</button>
        </div>
        
    </div>
</body>
</html>