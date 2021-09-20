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
<body id='forum_in'>
    <?php 
        if(isset($_SESSION['u_id'])) {
            echo "<section class='user_info flex-container'>";
                $dateNow = new DateTime(); //create newDateTime object of current time
                $creationDate = new DateTime($_SESSION['u_creation']); //create DateTime object of the user
                $dateInterval = $dateNow->diff($creationDate); //get the difference between date object's
                $dateResult; //variable to store different values
                if(($dateInterval->m) < 1) {
                    $dateResult = "It's less than 1 month old."; //echo this if the account age is < 1 month
                } else {
                    $dateResult = $dateInterval->m; //otherwise echo months
                }
                echo "<p class='loged_user'>" . "<span>" . "Username: " . "</span>". $_SESSION["u_uid"] . "." ."</p>";
                echo "<p class='loged_name'>" . "<span>" . "Your First Name: " . "</span>" . $_SESSION["u_first"] . "." ."</p>";
                echo "<p class='loged_name'>" . "<span>" . "Your Last Name: " . "</span>" . $_SESSION["u_last"] . "." ."</p>";
                echo "<p class='creation_age'>" . "<span>" . "Account age: " . "</span>". $dateResult . "</p>";
                echo '  <form class="log_out_form" action="project_form/log_out.php" method="post">
                            <button class="button" type="submit" name="submit">Logout</button>
                        </form>';
                
            echo "</section>";
            echo "<section class='forum_name_look'>";
                echo "<div class='flex-container container'>";
                    echo "<h1><i class='fas fa-book-reader'></i>Our Forum</h1>";
                    echo "<h3><a href='thread_maker.php'>Make a thread</a></h3>";
                    echo "<h3>OR</h3>";
                    echo "<h3>View The threads below</h3>";
                echo "</div>";
            echo "</section>";
            echo "<section class='forum_thread_look'>";
                echo "<div class='threads container flex-container'>";
                        include_once 'project_form/show_threads.php';
                            foreach($rows as $row) {
                                echo "<h3 class='thread_title_user'>" . "<span>Thread Title: </span>" . 
                                "<span>" . $row['thread_title'] ."</span>" .
                                "<br>" . "<span>By: </span>" . $row['user_name'] . "</h3>";
                            }
                echo "</div>";
            echo "</section>";
        } else {
            header("Location: forum.php");
            exit();
        }
    ?>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>