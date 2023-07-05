<?php include ("config.php")?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form </title>
    <link rel="stylesheet" type="text/css" href="style2.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <!-- new change added name="myform" -->
      <form name="myform" method="post" action ="LOGINpage.php">
        <?php include('errors.php'); ?>
        <div class="txt_field">
          <input type="text" id="username" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" id="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <!-- <input type="submit" name="login_user" value="Login" onclick="location.href = 'welcomequiz.html';"> -->
        <input type="submit" name="login_user" value="Login" onclick="myfunction()">
        <div class="signup_link">
          Not yet a member?<a href="signup.php">Signup</a>
        </div>
      </form>
    </div>
  </body>
</html>
