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
<body id='home'>
    <header class='site-header container flex-container'>
        <h2 class='site-title'>Web Agency<i class="fab fa-draft2digital"></i></h2>
        <nav class='header-nav'>
            <ul class='flex-container'>
                <li><a href="#">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="#"><i class="fas fa-angle-double-up"></i></a></li>
            </ul>
        </nav>
        <nav class="mob-nav">
            <ul id="mobMenu" class="flex-container">
                <li><a href="#">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
            </ul>
            <a href="javascript:void(0);" class="icon" onclick="displayMobileNav()">
                <i class="fa fa-bars"></i>
            </a>
         </nav>
    </header>
    <section id='home-hero'>
        <div class='container flex-container'>
            <h1 class='hero-title'>Web Design Agency</h1>
            <p class='hero-text'>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat 
                aliquam. Integer et elit eget elit facilisis. Lorem ipsum dolor sit amet, 
                consectetur adipiscing elit.</p>
            <button class='button'>Our Work</button>
        </div>
    </section>
    <section id='what-we-do'>
        <div class='container flex-container'>
            <div class='wwd-texts flex-container'>
                <h2 class='wwd-title'>What We Do</h2>
                <p class='wwd-text'>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat 
                    aliquam. Integer et elit eget elit facilisis tristique.</p>
            </div>
            <div class='wwd-boxes flex-container'>
                <div class='wwd-box flex-container'>
                    <img src="images/wwd-branding.png" alt='branding'>
                    <h3 class='wwd-box-title'>Branding</h3>
                    <p class='wwd-box-text'>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. 
                        Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris.</p>
                </div>
                <div class='wwd-box flex-container'>
                    <img src="images/wwd-seo.png" alt='seo'>
                    <h3 class='wwd-box-title'>Seo</h3>
                    <p class='wwd-box-text'>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. 
                        Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris.</p>
                </div>
                <div class='wwd-box flex-container'>
                    <img src="images/wwd-development.png" alt='development'>
                    <h3 class='wwd-box-title'>Development</h3>
                    <p class='wwd-box-text'>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. 
                        Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris.</p>
                </div>
            </div>
            <div class='wwd-icons-cont flex-container'>
                <div class='wwd-icons flex-container'>
                    <div class='wwd-icon flex-container'>
                        <h3><i class="fas fa-pen-alt"></i>Branding</h3>
                        <p>In hac habitasse platea dictumst. Vivamus adipiscing 
                            fermentum quam volutpat aliquam.
                        </p>
                    </div>
                    <div class='wwd-icon flex-container'>
                        <h3><i class="fas fa-chart-line"></i>Search Engine Optimization</h3>
                        <p>In hac habitasse platea dictumst. Vivamus adipiscing 
                            fermentum quam volutpat aliquam.
                        </p>
                    </div>
                    <div class='wwd-icon flex-container'>
                        <h3><i class="far fa-file-alt"></i>Content Strategy</h3>
                        <p>In hac habitasse platea dictumst. Vivamus adipiscing 
                            fermentum quam volutpat aliquam.
                        </p>
                    </div>
                </div>
                <div class='wwd-icons flex-container'>
                    <div class='wwd-icon flex-container'>
                        <h3><i class="fas fa-desktop"></i>Web Design</h3>
                        <p>In hac habitasse platea dictumst. Vivamus adipiscing 
                            fermentum quam volutpat aliquam.
                        </p>
                    </div>
                    <div class='wwd-icon flex-container'>
                        <h3><i class="fas fa-network-wired"></i>Information Architecture</h3>
                        <p>In hac habitasse platea dictumst. Vivamus adipiscing 
                            fermentum quam volutpat aliquam.
                        </p>
                    </div>
                    <div class='wwd-icon flex-container'>
                        <h3><i class="far fa-lightbulb"></i>Business Consulting</h3>
                        <p>In hac habitasse platea dictumst. Vivamus adipiscing 
                            fermentum quam volutpat aliquam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id='recent-work'>
        <div class='container flex-container'>
            <div class='rw-texts flex-container'>
                <h2 class='rw-title flex-container'>Recent Work</h2>
                <p class='rw-text flex-container'>
                    In hac habitasse platea dictumst. Vivamus adipiscing 
                    fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique.
                </p>
            </div>
            <div class='rw-projects flex-container'>
                <div class='rw-project flex-container'>
                    <img src="images/reactcalculator.jpg" alt='reactcalculator'>
                    <p>React Calculator</p>
                </div>
                <div class='rw-project flex-container'>
                    <img src="images/markdownpreviewer.jpg" alt='markdownpreviewer'>
                    <p>Markdown Previewer</p>
                </div>
                <div class='rw-project flex-container'>
                    <img src="images/drummachine.jpg" alt='drummachine'>
                    <p>Drum Machine</p>
                </div>
                <div class='rw-project flex-container'>
                    <img src="images/25clock.jpg" alt='25+5 Clock'>
                    <p>25 + 5 Clock</p>
                </div>
            </div>
        </div>
    </section>
    <section id='lwt'>
        <div class='flex-container'>
            <div class='lwt-texts flex-container'>
                <h2>Let's Work Together</h2>
                <p>In hac habitasse platea dictumst. Vivamus adipiscing 
                    fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique.
                </p>
            </div>
            <div class='lwt-form'>
                <form class='flex-container' method='post' action='home.php'>
                    <div class='name-email flex-container'>
                        <input type='text' placeholder="Name" name="name" maxLength="30" required>
                        <input type='email' placeholder="Email Address" name="email" maxLength="50" required>
                    </div>
                    <input type='text' placeholder="Project Title" name="project_title" maxLength="70" required>
                    <textarea id='home-form-ta' placeholder="Project Details" required name="project_details" maxLength="500" rows="8" required></textarea>
                    <p class='ta-wordcount'><span class='characters'>500</span> characters remaining.</p>
                    <p><input type='checkbox' class='checkmark' name='checkbox' value='Yes' required> Click to agree with the company terms.</p>
                    <input class='button' value="SUBMIT" type='submit' name='submit'>
                </form>
            </div>
        </div>
    </section>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>