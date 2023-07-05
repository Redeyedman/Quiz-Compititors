<?php
$start_date = strtotime("2023-05-27 10:00:00"); // set start date and time
$end_date = strtotime("+5 days", $start_date); // add 2 days to start date to set end date and time

$current_time = time(); // get current time

if ($current_time < $start_date) {
    
    header("Location:notstartedyet.php");
} elseif ($current_time > $end_date) {
   header("Location:alreadyended.php");

} else {
    

?>
<?php
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['username'])) {
    header("location: LOGINpage.php");
}
?>
<?php

?>
<html>
<form method="POST" id="quiz" action="result2.php">
    <?php $conn = mysqli_connect('localhost', 'root', '', 'admin'); ?>
    
    <?php
        $start = time();
        $_SESSION['start_time'] = $start;
    ?>



    <head>
        <script type="text/javascript">
            function timeout() {
                var minute = Math.floor(timeLeft / 60);
                var second = timeLeft % 60;
                if (timeLeft <= 0) {
                    document.getElementById("sub12").click();
                } else {
                    document.getElementById("time").innerHTML = minute + ":" + second;
                }
                timeLeft--;
                var tm = setTimeout(function() {
                    timeout()
                }, 1000);
            }
        </script>
<Style> 
          /* Quiz Form Styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background: linear-gradient(315deg, #f6f2f2 0%, #9bc2eb 74%);
 
}

h1 {
  color: #fff;
  font-family: poppins;
  justify-content: space-between;
  padding: 20px 50px;
  background-color: black;
  margin-top: 0;
  text-align: center;

}

div {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  
}
h2 {
  color: black;
  padding: 20px 50px;
  /* background-color: #e5caf1; */
  background-color: #D3D3D3;
  font-size: 36px;
  margin-top: 10px;
  text-align: center;
}

input[type="radio"] {
  margin-right: 10px;
} 


#sub12{
  font-size: 24px;
  padding: 10px 20px;
  margin-top: 20px;
  margin-bottom: 10px;
  text-align: center;
  border-radius: 10px;
  background-color: #4f9cfb;
  color: #blue;
}
/* Timer Styles */
#time {
  float: right;
  font-size: 20px;
  padding: 20px 20px;
  margin-top: 25px;
  color: #333;
}

.QUIZ {
  font-size: 2em;
  color: transparent;
  -webkit-text-stroke: 1px #fff;
  background: url(back.png);
  -webkit-background-clip: text;
  background-position: 0 0;
  animation: back 20s linear infinite;
}

@keyframes back {
  100% {
    background-position: 2000px 0;
  }
}

.img_size{
  float: left;
  width: 9%;
  padding:0px 60px;
}
</Style>
    </head>

    <body onload="timeout()">
    <h1> <p class="image">
        <img class="img_size" src="gdc.png  ">
          </p>
            <div id="time" style="float:right">timeout</div>
           <div class="QUIZ"> Quiz Questions</div>
        </h1>
        <script type="text/javascript">
            var timeLeft = 30;
        </script>

        <div>
            <?php
            $question_order = range(1, 9);
            shuffle($question_order);
            $_SESSION['question_order'] = $question_order;

            foreach ($_SESSION['question_order'] as $i) {
                $sql = "SELECT * FROM quiz_question where question_number=$i";
                $data = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($data)) {
            ?>
                    <h2><?php echo $row['question_text']; ?></h2>
                    <?php
                    $sql = "SELECT * FROM options where question_number=$i";
                    $data = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($data)) {
                    ?>
                        <div>
                            <input type="radio" name="check[<?php echo $row['question_number']; ?>]" value="<?php echo $row['a_id'] ?>">
                            <?php echo $row['choice'] ?>
                        </div>
            <?php
                    }
                }
            }}
            ?>
            <input id="sub12" type="submit" name="submit" value="submit">
        </div>
    </body>
</form>

</html>