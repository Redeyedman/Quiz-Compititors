<?php
session_start();
// initializing variables
$username = " ";
$email = " ";
$errors = array();
// connect to the database
$conn=mysqli_connect('localhost','root','','admin');
// $conn=mysqli_connect('localhost','newuser','userdb@Dep7dep','admin');
//Sign up user
if(isset($_POST['reg_user'])){
    //recieve all input values from the form
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);
    //form validation: ensure that the form is correctly filled..
    //by adding (array_push())corresponding error unto $errors array
    if (empty($username)){
        array_push($errors,"Username is required");
    }
    if (empty($email)){
        array_push($errors,"E-mail is required");
    }
    if (empty($password_1)){
        array_push($errors,"password is required");
    }
    if ($password_1 != $password_2){
        array_push($errors,"password does not matches");
    }
    //First check the database to make sure a user doesn't already exist with the same username 
    $user_check_query = "SELECT * FROM user WHERE        email ='$email' LIMIT 1";
    $result =mysqli_query($conn,$user_check_query);
    $user = mysqli_fetch_assoc($result);
    if($user){
        //if user exits
        // if($user['username'] === $username){
        //     array_push($errors,"Username already exits");
        // }
        if($user['email'] === $email){
            array_push($errors,"Email already exits");
        }
    }
    //Finally ,register user if there are no errors in the form
    if(count($errors) == 0){
        //encrypt password before saving it in the database
        $password =md5($password_1);
        $query="INSERT INTO user(username,email,password) VALUES ('$username','$email','$password')";
        mysqli_query($conn,$query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location:LOGINpage.php');
    }
}
//Login User
if(isset($_POST['login_user']))
{
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    // echo $username;
    // echo $password;
    if(empty($username)){
        array_push($errors,"Username is required");
    }
    if(empty($password)){
        array_push($errors,"Password is required");
    }
    // if(count($errors) == 0)
    {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username='$username' AND password ='$password' ";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1){
            $_SESSION['username']=$username;
            $_SESSION['success']="You are now logged in";
            header('location:welcomequiz.php');
        }
        else{
            array_push($errors,"Wrong username/password combination");
        }
    }
}

?>