<?php 
    $conn=mysqli_connect('localhost','root','','admin');
    if(mysqli_connect_error()){
        echo"Connection Setup Failed";
    }
?> 
<html>
    <head>
        <title>
            admin login
        </title>
        <link rel="stylesheet" type="text/css" href="admin_stle.css">
    </head>
    <body>
        <div class="container">
            <div class ="myform">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                    <h1>Admin Login</h1>
                    <input type = "text" placeholder="Admin Name" name="AdminName">
                    <input type = "password" placeholder="Password" name="AdminPass">
                    <button type ="submit" name="LOGIN">LOGIN</button>
                </form>
            </div>
            <div>
                <div class="image">
                    <img src="image.png">
                </div>
            </div>
        </div>
        <?php
            function input_filter($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            if(isset($_POST['LOGIN'])){
                # filtering user input
                $AdminName=input_filter($_POST['AdminName']);
                $AdminPass=input_filter($_POST['AdminPass']);

                #escaping special symbols uesd in SQL statement
                $AdminName=mysqli_real_escape_string($conn,$AdminName);
                $AdminPass=mysqli_real_escape_string($conn,$AdminPass);

                #query template
                $query="SELECT * FROM `admin_login` WHERE `Admin_Name` =? AND `Admin_Password` =?";
                #prepared statement
                if($stmt= mysqli_prepare($conn,$query)){
                    #binding value to template or prepared statement
                    mysqli_stmt_bind_param($stmt,"ss",$AdminName,$AdminPass);
                    #executing prepared statement
                    mysqli_stmt_execute($stmt);
                    #transfering the result of execution in $stmt
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt)==1){
                       session_start();
                       $_SESSION['AdminLoginId']=$AdminName;
                       header("location: adminpannel.php");
                    }
                    else{
                        echo "<script>alert('Invalid Admin Name or Password')</script>";
                    }
                    mysqli_stmt_close($stmt);
                }
                else{
                    echo "<script>alert('SQL Query cannot be prepared')</scrpit>";
                }
            }
        ?>
    </body>
</html>