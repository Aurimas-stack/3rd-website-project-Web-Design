<?php
    require_once __DIR__ . '/project_form/project_form.php';
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
</head>
<body id='contact'>
    <header class='site-header container flex-container'>
        <h2 class='site-title'>Web Agency<i class="fab fa-draft2digital"></i></h2>
        <nav class='header-nav'>
            <ul class='flex-container'>
                <li><a href="home.php">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="#"><i class="fas fa-angle-double-up"></i></a></li>
            </ul>
        </nav>
        <nav class="mob-nav">
            <ul id="mobMenu" class="flex-container">
                <li><a href="home.php">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
            </ul>
            <a href="javascript:void(0);" class="icon" onclick="displayMobileNav()">
                <i class="fa fa-bars"></i>
            </a>
         </nav>
    </header>
    <section id='contact-hero'>
        <div class='container flex-container'>
            <h1 class='hero-title'>Contact Us</h1>
            <p class='hero-text'>In hac habitasse platea dictumst. Vivamus adipiscing fermentum 
                quam volutpat aliquam. Integer et elit eget elit facilisis.</p>
        </div>
    </section>
    <section id='contact-info'>
        <div class='container flex-container'>
            <div class='form-and-information flex-container'>
                <div class='flex-container'>
                    <h3>Send Us An Email</h3>
                    <form class='flex-container' method='post' action='contact.php'>
                        <input type='text' placeholder="Name" name="name" maxLength="30" required>
                        <input type='email' placeholder="Email Address" name="email" maxLength="50" required>
                        <input type='text' placeholder="Project Title" name="project_title" maxLength="70" required>
                        <textarea id='contact-form-ta' placeholder="Project Details" required name="project_details" maxLength="500" rows="8" required></textarea>
                        <p class='ta-wordcount'><span class='characters'>500</span> characters remaining.</p>
                        <div class='flex-container'>
                            <input type='checkbox' class='checkmark' name='checkbox' value="Yes" required> 
                            <p>Click to agree with the company terms.</p>
                        </div>
                        <input class='button' value="SUBMIT" type='submit' name='submit'>
                    </form>
                </div>
                <div class='contacts flex-container'>
                    <div class='flex-container'>
                        <p>Email</p>
                        <a href="mailto:ouremail@email.com">ouremail@email.com</a>
                    </div>
                    <div class='flex-container'>
                        <p>Phone</p>
                        <a href="tel:33355511111">(333) 555-11111</a>
                    </div>
                    <div class='flex-container'>
                        <p>Address</p>
                        <a href="http://maps.google.com/?q=1234 Green St. Washington DC 95253" target="_blank">1234 Green St. Washington DC 95253</a>
                    </div>
                </div>
            </div>
            <div id='googleMap' class='container flex-container'></div>
        </div>
    </section>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1UGUtIwun8AH5gNQ9iD5f3KLQrKIi5LY&callback=myMap"></script>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/pagination.js" type="text/javascript"></script>
    <script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>