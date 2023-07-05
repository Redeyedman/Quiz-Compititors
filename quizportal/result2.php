<?php
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['username'])) {
    header("location: quiz2.php");
}
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #ffa64d, #99ccff);
            height: 100vh;
            overflow: hidden;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 400px;
            background: #008080;
            border-radius: 10px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
        }

        .center h1 {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid grey;

        }

        .center h2 {
            text-align: center;
            padding: 20px 0;
        }

        .center h3 {
            text-align: center;
            padding: 30px 0;
            font-size: 25;
            border-bottom: 1px solid red;

        }
    </style>
</head>

<body>
<div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
          <div class="nav-title">
            QUIZ COMPETITOR
          </div>
        </div>
        <div class="nav-btn" style="right:20px; top:15px;">
          <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>
        
        <div class="nav-links" style="top: 72px;">
            <ul>
          <li> <a href="index.php"> HOME</a></li>
          <a class="icon">
            <button onclick="location.href = 'scoreboard.php'" id="myButton"class="btnlogin-popup">Scoreboard</button>
          </a>
            </ul>
        </div>
      </div>
    <div class="center">

        <h3>Thank you for completing the quiz!!</h3>
        <h1>Your Result</h1>


        <?php

        $conn = mysqli_connect('localhost', 'root', '', 'admin');
        if (isset($_POST['submit'])) {
            $score = 0;

            if (!empty($_POST['check'])) {
                $i = 1;

                $match = count($_POST['check']);
                $select = $_POST['check'];
                $sql = "SELECT * FROM quiz_question ";
                $data = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($data)) {
                    // Check if the answer exists in the submitted form
                    if (isset($select[$i])) {
                        $check = $row['a_id'] == $select[$i];
                        if ($check) {
                            $score = $score + 10;
                        }
                    }
                    $i++;
                }
            }
        ?>

            <h2> <?php echo "Your Score:" . $score; ?></h2>

        <?php
        }
        ?>
       
        <?php
        $end = time();
        $start = $_SESSION['start_time'];
        $timeTaken = ($end - $start); ?>
        <?php
        if (!isset($_SESSION['time_taken'])) {
            $_SESSION['time_taken'] = $timeTaken;
        }
        
        if (!isset($_SESSION['time_taken_arr'])) {
            $_SESSION['time_taken_arr'] = array();
        }
        $_SESSION['time_taken_arr'][] = $timeTaken;
        $timeTaken = $_SESSION['time_taken'];
        ?>
        <h2><?php echo isset($_SESSION['time_taken']) ? "Time taken: " . $_SESSION['time_taken'] . " seconds" : ""; ?></h2>


    </div>
    <?php
    // Store score and time taken in the leaderboard table
    $username = $_SESSION['username'];

    // Check if the user already exists in the leaderboard table
    $sql = "SELECT * FROM leaderboard WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        // If the user doesn't exist, insert a new entry
        $sql = "INSERT INTO leaderboard(`username`, `score`, `time`) VALUES ('$username','$score','$timeTaken') ";
        $result = mysqli_query($conn, $sql);
    }
    ?>
    
</body>

</html>