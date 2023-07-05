<?php include("config.php") ?>
<!DOCTYPE html>
<html>

<head>
    <title>Singnup page</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        h5 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>Registration:</h1>
        <!-- <h5><b>Please Register Here</b></h5> -->
        
        <form action="signup.php" method="post">
            <?php include('errors.php'); ?>

            <!-- <div class="txt_field">
                <input type="text" name="username" value="<?php echo $username ; ?>">
                <span></span>
                <label>Username</label>
            </div> -->
            <div class="txt_field">
          <input type="text" id="username" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
            <!-- <div class="txt_field">
                <input type="email"  name="email" value="<?php echo $email ; ?>">
                <span></span>
                <label>Email</label>
            </div> -->
            <div class="txt_field">
          <input type="email" id="email" name="email" required>
          <span></span>
          <label>Email</label>
        </div>
            <div class="txt_field">
                <input type="password" name="password_1" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password_2" required>
                <span></span>
                <label>Confirm password</label>
            </div>
            <input type="submit" name="reg_user" value="signup">
            <div class="login_link">
                Already a member?<a href="LOGINpage.php">Login</a>
            </div>

        </form>
    </div>
</body>

</html>