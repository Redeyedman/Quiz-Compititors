<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: linear-gradient(315deg, #ffffff 0%, #d7e1ec 74%);
        }
        
        .center {
            position: fixed;
            top: 67%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 900px;
            height:600px;
            background: #ffffcc;
            border-radius: 10px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
        }
        .center .head {
            text-align: center;
            color: #f0f0f0;
            font-family: poppins;
            justify-content: space-between;
            padding: 10px 50px;
            background-color: #808000;
        }

        table {
            align-items: center;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 7px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #cccc00;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
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
        <div class="nav-btn">
          <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>
        
        <div class="nav-links">
            <ul>
          <a class="icon">
            <button onclick="location.href = 'logout.php';" id="myButton"class="btnlogin-popup">Exit</button>
          </a>
            </ul>
        </div>
      </div>
<div class="center">
<h1 class= "head">SCOREBOARD🎖️</h1>
    <?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'admin');

    // Fetch data from leaderboard table
    $sql = "SELECT * FROM leaderboard ORDER BY score DESC, time ASC, username ASC";
    $result = mysqli_query($conn, $sql);

    // Check if there are any records in the result set
    if (mysqli_num_rows($result) > 0) {
        // Display scoreboard in a tabular format
        echo "<table><tr><th>Rank</th><th>Username</th><th>Score</th><th>Time Taken</th></tr>";
        $rank = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $rank . "</td><td>" . $row['username'] . "</td><td>" . $row['score'] . "</td><td>" . $row['time'] . " seconds</td></tr>";
            $rank++;
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
    ?>
    </div>
</body>
</html>