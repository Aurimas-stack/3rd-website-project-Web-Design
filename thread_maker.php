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
<body id='make_thread'> 
    <?php 
        if(isset($_SESSION['u_id'])) {
            echo "<section class='make_thread'>";
                echo "<div class='container flex-container'>";
                    echo "<div class='log_out_div flex-container'>";
                         echo "<p class='loged_user'>" . "<span>" . "Username: " . "</span>". $_SESSION["u_uid"] . "." ."</p>";
                            echo '  <form class="log_out_form" action="project_form/log_out.php" method="post">
                                    <button class="button" type="submit" name="submit">Logout</button>
                                </form>';
                    echo "</div>";
                    echo "<form class='post_thread_form flex-container' action='project_form/post_thread_form.php' method='post'>
                                <input id='i-ta' type='text' placeholder='Thread Title' name='title' maxLength='30' required/>
                                <p class='i-wordcount'><span class='characters1'>30</span> characters remaining.</p>
                                <textarea id='tm-ta' placeholder='Thread Text' name='t_text' maxLength='500' rows='8' required></textarea>
                                <p class='tm-wordcount'><span class='characters'>500</span> characters remaining.</p>
                                <button class='button' type='submit' name='submit_thread'>Post Thread</button>
                            </form>";
                    echo "<a href='forum_logged_in.php'><i class='fas fa-arrow-left'></i> Go back to the threads</a>";
                echo "</div>";
            echo "</section>";
        } else {
            header("Location: forum.php");
            exit();
        }
    ?>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/pagination.js" type="text/javascript"></script>
    <script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>