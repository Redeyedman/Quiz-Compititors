
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="style6.css">
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
          <li> <a href="index.php"> HOME</a></li>
          <li><a href="about1.php"> ABOUT US</a></li>
          <li><a href="contact2.php"> CONTACT</a></li>
          <li><a href="Scoreboard.php">SCOREBOARD</a></li>
          <li><a href="adminlogin.php"> ADMIN</a></li>
          <a class="icon">
            <button onclick="location.href = 'LOGINpage.php';" id="myButton"class="btnlogin-popup">Login</button>
          </a>
            </ul>
        </div>
      </div>
    <section id="section-wrapper">
        <div class="box-wrapper">
            <div class="info-wrap">
                <h2 class="info-title">Contact Information</h2>
                <h3 class="info-sub-title">Fill up the form and our Team will get back to you within 24 hours</h3>
                <ul class="info-details">
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>Phone:</span> <a href="tel:+ 1235 2355 98">will update soon</a>
                    </li>
                    <li>
                        <i class="fas fa-paper-plane"></i>
                        <span>Email:</span> <a href="deepanshuuttam82@gmail.com">deepanshuuttam82@gmail.com</a>
                    </li>
                </ul>
                <ul class="social-icons">
                    <li><a href="https://github.com/Redeyedman"><i class="fab fa-github"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/deepanshu-uttam-648802224/"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
            <div class="form-wrap">
                <form action="#" method="POST">
                    <h2 class="form-title">Send us a message</h2>
                    <div class="form-fields">
                        <div class="form-group">
                            <input type="text" class="fname" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="lname" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="email" placeholder="Mail">
                        </div>
                        <div class="form-group">
                            <input type="number" class="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" placeholder="Write your message"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="Send Message" class="submit-button">
                </form>
            </div>
        </div>
    </section>
</body>
</html>