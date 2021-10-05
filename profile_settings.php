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
<body id='profile-settings'>
    <?php 
        if(isset($_SESSION['u_id'])) {
            echo "<section class='user-profile flex-container container'>";
                $dateNow = new DateTime(); //create newDateTime object of current time
                $creationDate = new DateTime($_SESSION['u_creation']); //create DateTime object of the user
                $dateInterval = $dateNow->diff($creationDate); //get the difference between date object's
                $dateResult; //variable to store different values
                if(($dateInterval->m) < 1) {
                    $dateResult = "It's less than 1 month old."; //echo this if the account age is < 1 month
                } else {
                    $dateResult = $dateInterval->m; //otherwise echo months
                }
                echo "<div class='info-about-user flex-container'>";
                    echo "<p class='loged_user'>" . "<span>" . "Username: " . "</span>". $_SESSION["u_uid"] . "." ."</p>";
                    echo "<p class='loged_name'>" . "<span>" . "Your First Name: " . "</span>" . $_SESSION["u_first"] . "." ."</p>";
                    echo "<p class='loged_name'>" . "<span>" . "Your Last Name: " . "</span>" . $_SESSION["u_last"] . "." ."</p>";
                    echo "<p class='creation_age'>" . "<span>" . "Account age: " . "</span>". $dateResult . "</p>";
                    include_once 'project_form/user_thread_count.php';
                    echo "<p class='thread-count'>Total thread count: " . $amount_of_threads . "</p>";
                    echo "<p class='post_count'>Amount of posts: " .  $amount_of_posts . "</p>";   
                echo "</div>"; 
                echo '  <form class="log_out_form" action="project_form/log_out.php" method="post">
                                <button class="button" type="submit" name="submit">Logout</button>
                            </form>';
                echo "<a href='forum_logged_in.php'><i class='fas fa-arrow-left'></i> Go back to the threads</a>";    
            echo "</section>";
        }
    ?>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/pagination.js" type="text/javascript"></script>
    <script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>