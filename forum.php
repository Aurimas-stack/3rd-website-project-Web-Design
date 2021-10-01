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
<body id='forum'>
    <header class='site-header container flex-container'>
        <h2 class='site-title'>Web Agency<i class="fab fa-draft2digital"></i></h2>
        <nav class='header-nav'>
            <ul class='flex-container'>
                <li><a href="home.php">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="#"><i class="fas fa-angle-double-up"></i></a></li>
            </ul>
        </nav>
        <nav class="mob-nav">
            <ul id="mobMenu" class="flex-container">
                <li><a href="home.php">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
            </ul>
            <a href="javascript:void(0);" class="icon" onclick="displayMobileNav()">
                <i class="fa fa-bars"></i>
            </a>
         </nav>
    </header>
    <section class='forum-hero'>
        <div class='container flex-container'>
            <?php
                if(isset($_SESSION['u_id'])) {
                    echo "<p class='loged_user'>" . "Logged in as: ". $_SESSION["u_uid"] ."</p>";
                    echo '  <form class="log_out_form" action="project_form/log_out.php" method="post">
                                <button class="button" type="submit" name="submit">Logout</button>
                            </form>';
                    echo "<p class='logged_in_or'>OR</p>";
                    echo "<p class='logged_in_forum'><a href='forum_logged_in.php'>Proceed to the forum</a></p>";
                } else {
                    echo '<form class="flex-container" method="post" action="project_form/log_in.php"">
                                <div class="flex-container">
                                    <p>Your Username or Email:</p>
                                    <input type="text" name="uid" placeholder="Username"/>
                                </div>
                                <div class="flex-container">
                                    <p>Your Password:</p>
                                    <input type="password" name="pwd" placeholder="Password" required/>
                                </div>
                                <input type="submit" name="submit1" value="Log In" class="button"/>
                            </form>
                            <p>Don\'t have an account? <a href="sign_up.php">Sign up here</a></p>';
                }
            ?>
        </div>
    </section>
<script src="javascript/jquery.min.js"></script>
<script src="javascript/pagination.js" type="text/javascript"></script>
<script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>