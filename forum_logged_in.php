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
    <link rel="shortcut icon" href="#">
<body id='forum_in'>
    <?php 
        if(isset($_SESSION['u_id'])) {
            include_once 'user_nav/user_nav.php';
            echo "<section class='forum_name_look'>";
                echo "<div class='flex-container container'>";
                    if($_SESSION["u_uid"] == 'Tester1234') {
                        echo "<h3 class='a-link'><a href='admin_panel.php'><i class='far fa-file-alt'></i>Admin Panel</a></h3>";
                    }
                    echo "<h1><i class='fas fa-book-reader'></i>Our Forum</h1>";
                    echo "<h3 class='t-maker-link'><a href='thread_maker.php'>Make a thread <i class='fas fa-arrow-right'></i></a></h3>";
                    echo "<h3>OR</h3>";
                    echo "<h3>View The threads below</h3>";
                echo "</div>";
            echo "</section>";
            echo "<section class='forum_thread_look'>";
                echo "<div class='threads container flex-container'>";
                        include_once 'project_form/show_threads.php';
                            foreach($rows as $row) {
                                echo "<div class='thread_title_box flex-container'>";
                                    echo "<h3 class='thread_title_user'>" . "<span>Thread Title: </span>" . 
                                        "<a href='u_thread.php?id=".$row['id']."'>" . $row['thread_title'] . "</a>" . "</h3>";
                                    echo "<p class='thread_posted_by'>" . "<span>" . "Posted By: " . "</span>"
                                        . $row['user_name'] . "</p>";
                                    echo "<p>" . "<span>" . "Created at: " . "</span>" . 
                                        date('Y-M-d', strtotime($row['date_created'])) . "</p>";
                                    if($_SESSION["u_uid"] == 'Tester1234') {
                                        echo "<div class='a-d-t flex-container'>";
                                            echo "<div class='trashcan flex-container'>";
                                                echo "<i id='".$row['id']."' class='fas fa-trash-alt'></i>";
                                                echo "<p class='t-i-del'>Delete Thread</p>";
                                            echo "</div>";
                                                if($row['is_thread_locked'] === 'FALSE' || $row['is_thread_locked'] === 'NULL') {
                                                    echo "<div class='lock-t l-thread-".$row['id']." flex-container'>";
                                                        echo "<i class='fas fa-lock'></i>";
                                                        echo "<p class='lock-i-p'>Lock The Thread</p>";
                                                    echo "</div>"; 
                                                } else {
                                                    echo "<div class='unlock-t ul-thread-".$row['id']." flex-container'>";
                                                        echo "<i class='fas fa-lock-open'></i>";                                      
                                                        echo "<p class='unlock-i-p'>Unlock The Thread</p>";
                                                    echo "</div>";                                                      
                                                }                                                        
                                        echo "</div>";
                                    }
                                echo "</div>";
                            }
                    echo "<div class='thread_pagin'></div>";
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