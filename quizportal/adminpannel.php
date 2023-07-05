<?php
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: adminlogin.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin pannel</title>
    <link rel="stylesheet" type="text/css" href="admin.css">

</head>

<body>
    <div class="header">
        <h1>ADMIN PANNEL :- <?php echo $_SESSION['AdminLoginId'] ?></h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <button type="submit" name="Logout"> LOG OUT</button>
        </form>
    </div>
    <?php
    if (isset($_POST['Logout'])) {
        session_destroy();
        header("location:index.php");
    }
    ?>
    <?php
        $conn=mysqli_connect('localhost','root','','admin');
        if(isset($_POST['submit'])){
            $question_number=$_POST['question_number'];
            $question_text=$_POST['question_text'];
            $a_id=$_POST['a_id'];
            //Choice Array
            $choice=array();
            $choice[1]=$_POST['choice1'];
            $choice[2]=$_POST['choice2'];
            $choice[3]=$_POST['choice3'];
            //First query for Questions Table
            $query="INSERT INTO quiz_question(";
            $query.="question_number,question_text,a_id )";
            $query.="VALUES(";
            $query.=" '{$question_number}','{$question_text}','{$a_id}' ";
            $query.=")";

            $result=mysqli_query($conn,$query);
            //Validate First Query
            if($result){
                foreach($choice as $choices => $value){
                     if($value !=""){
                    //     if($a_id == $choices){
                    //         $is_correct=1;
                    //     }else{
                    //         $is_correct=0;
                    //     }
                    
                        //Second Query For Choices Table
                        $query ="INSERT INTO options(question_number,choice)VALUES('$question_number','$value')";
                        $insert_row=mysqli_query($conn,$query);
                        //Validate Insertion of Choices
                        if($insert_row){
                            continue;
                        }else{
                            die("Second Query for Choices could not be executed");
                        }
                    }
                }
                $message ="Question has been added successfully";
            }
        }
        $query="SELECT * FROM quiz_question";
        $questions=mysqli_query($conn,$query);
        $total=mysqli_num_rows($questions);
        $next=$total+1;
    ?>
    
        <div class="container">
            <h2>Add Questions</h2>
            <?php
                if(isset($message)){
                    echo "<h4>".$message."</h4>";
                }
            ?>
            <form method="POST" action="adminpannel.php">
                <p>
                    <label>Question Number:</label>
                    <input type="number" name="question_number" value="<?php echo $next;?>">
                </p>
                <p>
                    <label>Question Text:</label><br>
                    <input type="text" name="question_text">
                </p>
                <p>
                    <label>Choice 1:</label>
                    <input type="text" name="choice1">
                </p>
                <p>
                    <label>Choice 2:</label>
                    <input type="text" name="choice2">
                </p>
                <p>
                    <label>Choice 3:</label>
                    <input type="text" name="choice3">
                </p>
                <p>
                    <label>Correct Option Number:</label>
                    <input type="number" name="a_id">
                </p>
                <input type="submit" name="submit" value="submit">
            </form>
        </div>
    
</body>

</html>