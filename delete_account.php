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
<body id='delete_acc'>
    <?php 
        if(isset($_SESSION['u_id'])) {
            echo "<div class='container flex-container'>";
                echo '<form id="delAccForm" class="flex-container" method="post" action="project_form/delete_acc_form.php">';
                    echo '<div class="flex-container">';
                        echo '<p>Your Username:</p>';       
                        echo '<input type="text" name="del_uid" placeholder="Username" required/>';       
                    echo '</div>';
                    echo '<div class="flex-container">
                            <p>Your Password:</p>
                            <input type="password" name="del_pwd" placeholder="Password" required/>
                        </div>';
                    echo '<input type="submit" name="del_submit" value="Delete Account" class="button"/>';
                echo '</form>';
                echo '<form class="log_out_form" action="project_form/log_out.php" method="post">
                    <button class="button" type="submit" name="submit">Logout</button>
                </form>';
            echo "</div>";
        }
    ?>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/pagination.js" type="text/javascript"></script>
    <script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>