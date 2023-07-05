<?php
    session_start();
    session_regenerate_id(true);

    if(!isset($_SESSION['username'])){
        header("location:LOGINpage.php");
    }
?>
<!--  -->
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> <?php
    if (isset($_POST['Logout'])) {
        session_destroy();
        header("location:LOGINpage.php");
    }
    ?>
</form>
   
   
