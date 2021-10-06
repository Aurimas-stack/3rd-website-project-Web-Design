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
                    if(($dateInterval->d) < 1) {
                        $dateResult = $dateInterval->h . " hours."; //echo this if the account age is < 1 day
                    } else {
                        $dateResult = $dateInterval->d ." days.";//echo this if the account age is > 1 day
                    }
                } else {
                    $dateResult = $dateInterval->m; //otherwise echo months
                }
                echo "<div class='user-prof-container flex-container'>";
                    echo "<div class='user-profile-pic flex-container'>";
                        echo "<div class='icon-div flex-container'>";
                            echo "<i class='far fa-user fa-5x'></i>";
                        echo "</div>";
                        echo "<form method='post' action='project_form/pic_upload.php' enctype='multipart/form-data' class='flex-container' id='picForm'>";
                            echo  "<label for='pic-upload' class='file-style'>
                                    Browse
                                    <input type='file' id='pic-upload' name='pic-upload' required/>
                                    </label>";
                            echo "<input class='button' type='submit' name='pic-submit' value='Upload'/>";
                            include_once 'project_form/err_variable.php';
                            if ($ep_msg !== "") {
                                echo "<p>" . $ep-msg . "</p>";
                            }
                        echo "</form>";
                    echo "</div>";
                    echo "<div class='info-about-user flex-container'>";
                        echo "<p class='loged_user'><i class='fas fa-user-alt'></i>" . "<span>" . "Username: " . "</span>". $_SESSION["u_uid"] . "." ."</p>";
                        echo "<p class='loged_name'><i class='far fa-id-card'></i>" . "<span>" . "First Name: " . "</span>" . $_SESSION["u_first"] . "." ."</p>";
                        echo "<p class='loged_name'><i class='far fa-id-card'></i>" . "<span>" . "Last Name: " . "</span>" . $_SESSION["u_last"] . "." ."</p>";
                        echo "<p class='creation_age'><i class='fas fa-user-clock'></i>" . "<span>" . "Account age: " . "</span>". $dateResult . "</p>";
                        include_once 'project_form/user_thread_count.php';
                        echo "<p class='thread-count'><i class='fas fa-user-edit'></i>". "<span>" . "Total threads: " . "</span>" . $amount_of_threads . ".</p>";
                        echo "<p class='post_count'><i class='fas fa-user-edit'></i>". "<span>" . "Amount of posts: " . "</span>" .  $amount_of_posts . ".</p>";   
                    echo "</div>"; 
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