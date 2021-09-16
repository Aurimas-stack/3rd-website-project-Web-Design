<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Design Agency</title>
    <script src="https://kit.fontawesome.com/b090be4e4c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href='sass/main.css' rel='stylesheet'>
</head>
<body id='sign_up'>
    <header class='site-header container flex-container'>
        <h2 class='site-title'>Web Agency<i class="fab fa-draft2digital"></i></h2>
        <nav class='header-nav'>
            <ul class='flex-container'>
                <li><a href="home.php">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="#"><i class="fas fa-angle-double-up"></i></a></li>
            </ul>
        </nav>
        <nav class="mob-nav">
            <ul id="mobMenu" class="flex-container">
                <li><a href="home.php">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
            </ul>
            <a href="javascript:void(0);" class="icon" onclick="displayMobileNav()">
                <i class="fa fa-bars"></i>
            </a>
         </nav>
    </header>
    <section class='sign_up-hero'>
        <div class='container flex-container'>
            <h2>Sign up here</h2>
            <form class='flex-container' method='post' action='project_form/sign_up_form.php'>
                <div class='flex-container'>
                    <p>Your Name:</p>
                    <input type='text' name='first' placeholder='First Name' required/>
                </div>
                <div class='flex-container'>
                    <p>Your Last Name:</p>
                    <input type='text' name='last' placeholder='Last Name' required/>
                </div>
                <div class='flex-container'>
                    <p>Your Email:</p>
                    <input type='email' name='email' placeholder='Your Email' required/>
                </div>
                <div class='flex-container'>
                    <p>Your Username:</p>
                    <input type='text' name='uid' placeholder='Username' required/>
                </div>
                <div class='flex-container'>
                    <p>Your Password:</p>
                    <input type='password' name='pwd' placeholder='Password' required/>
                </div>
                <input type='submit' name='submit' value='Sign up' class='button' />
            </form>
        </div>
    </section>
<script src="javascript/jquery.min.js"></script>
<script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>