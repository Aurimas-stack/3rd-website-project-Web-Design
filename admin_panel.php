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
<body id='adm_in'>
    <?php 
        if(isset($_SESSION['u_id']) && $_SESSION["u_uid"] === 'Tester1234') {
            include_once 'user_nav/user_nav.php';
            include_once 'project_form/all_user_info.php';
            echo "<div id='put_restr' class='flex-container'>";
                echo "<i class='fas fa-user-lock fa-2x'></i>";
                echo "<p><span class='user_n_sp'></span> is restricted!</p>";
            echo "</div>";
            echo "<div id='restr_rmvd' class='flex-container'>";
                echo "<i class='far fa-check-circle fa-2x'></i>";
                echo "<p>Restriction for <span class='user_n_sp'></span> removed!</p>";
            echo "</div>";
            echo "<div class='container flex-container'>";
                echo "<div class='user_i_cont flex-container'>";
                $change_val = 1;
                foreach($collect_users as $col_u) {
                    echo "<div class='user_cont flex-container'>";
                        echo "<p>" . $change_val .".</p>";
                        echo "<p class='u_name'>" . $col_u['user_uid'] . "</p>";
                        if($col_u['post_restrictions'] === 'TRUE') {
                            echo "<p class='restr-p'>RESTRICTED</p>";
                            echo "<i class='fas fa-unlock-alt rmv_rstrc'>(remove restriction)</i>";
                        } else {
                            echo "<p class='not-restr-p'>Not restricted</p>";
                            echo "<i id='adm_ban_i' class='fas fa-ban'>(restrict user)</i>";
                        }
                    echo "</div>";
                    $change_val++;
                }
                echo "</div>";
                echo "<div id='admin_pagin' class='flex-container'></div>";
                echo "<a id='l_adm' href='forum_logged_in.php'><i class='fas fa-arrow-left'></i> Go back to the posts</a>";
            echo "</div>";
        }
    ?>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/pagination.js" type="text/javascript"></script>
    <script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>