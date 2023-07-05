<?php
    session_start();
    session_regenerate_id(true);
    if(!isset($_SESSION['username'])){
        header("location:LOGINpage.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lets Start the Quiz</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
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
          <a class="icon">
            <button onclick="location.href = 'quiz2.php?n=1';" id="myButton"class="btnlogin-popup">Start Quiz</button>
          </a>
            </ul>
        </div>
      </div>
</div>
<div class="container">
    <h1>Read The Instructions Carefully</h1>
    <div class="image">
        <img class="img_size" src="welcomebackground.png">
    </div>
    <h2>About Quiz</h2>
    <p>In this website we arranged a Quiz Competition for BCA and BSC students only..<br>
        Quiz Questions are based on the DBMS , On Programing Languages(Java,Python, etc). <br>
    Most Probably Questions are based to their respective course.  </p>

    <h2>Intellectual Property Rights</h2>
    <p>Unless otherwise stated, we or our licensors own the intellectual property rights in the website and material on the website. Subject to the licence below, all our intellectual property rights are reserved.</p>
		<h2> Terms and Conditions</h2>
		<p>Entry to Quiz is open only for BCA and BSC students.
        </p>
		<div class="image">
			<img class="img_size" src="dbms.jpg">
		</div>
		<ol>
			<li>This is a timed quiz with 7 Questions for each field , to be answered in 60 seconds/per question.</li>
			<li>Multiple entries from the same entrant will not qualify them for Quiz. </li>
            <li>You must provide your name, eamil address, phone number, and postal address.</li>
            <li>By submitting your contact details, you will give consent to these details being used for the purpose of Quiz only.</li>
            <li>The Questions will be randomly picked fromm the Question bank thorugh an automated process.</li>
            <li>Winners will be selected on the basis of the highest number of correct answers given within less time.</li>
            <li>There will be no negative marking.</li>
            <li>The Quiz will start soon as the participant clicks the start Quiz button.</li>
            <li>Once submited an entry cannot be withdrawn.</li>
            <li>The participant shall abide by all the rules and regulations of participating in the Quiz time to time.</li>
        </ol>

		<h2>Disclaimer</h2>
		<p>The information contained on this website is for general information purposes only. We make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, contained on the website for any purpose.<br>
            By entering the Quiz, the participant accepts and agree to be bound of these Terms and Conditions, mentioned above..
        </p>
</div>
</html>
<?php
    if (isset($_POST['Logout'])) {
        session_destroy();
        header("location:Loginpage.php");
    }
    ?> 