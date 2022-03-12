<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="views/Styles/register.css" />

  <title>Register</title>
</head>

<body>
  <div class="container">
    <h1>Welcome to our software purchase page</h1>
    <div class="imageback">
      <div>
        <img id="register" src="views/Resources/register.png" alt="Image" />
      </div>
    </div>

    <div class="login-form">
      <form class="form-style" action="#" method="post">
        <h2>Register & Get it now!</h2>
        <input type="text" placeholder="Enter username" name="username" />
        <input type="text" placeholder="Enter email" name="email" />
        <input type="text" placeholder="Name on card" name="cardName" />
        <input type="text" placeholder="Enter card number" name="cardNumber" />
        <div id="div1">
          <input id="ex" type="text" placeholder="Expiration (mm/yy)" name="username" />
          <input id="sec" type="text" placeholder="CVV" />
        </div>

        <input type="password" placeholder="Enter password" name="password" />
        <input type="password" placeholder="Confirm password" name="password_confirm" />
        <input class="pay-btn" type="submit" value="Purchase" name="submit" /><img id="visa" src="views/Resources/visa.png"
          alt="visa logo" /><br /><br />
        <p>
          Already have an account?
          <a href="#"><strong>Login instead</strong></a>
        </p>
      </form>
    </div>
  </div>
</body>

</html>