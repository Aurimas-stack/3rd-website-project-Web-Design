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
<body id='thread_in'>
    <?php 
        if(isset($_SESSION['u_id'])) {
            include_once 'user_nav/user_nav.php';
                try {
                    $pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
                        PDO::ATTR_EMULATE_PREPARES => false,
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]);
                    if(isset($_GET['id'])) {
                        $thread_id = $_GET['id'];
                        $_SESSION['thread-id'] = $thread_id; //ID TO GET BACK TO ORIGINAL THREAD AFTER MAKING A RESPONSE TO THAT THREAD
                        $query = $pdo->prepare("SELECT thread_title, thread_text, user_name, date_created, id FROM `threads` WHERE id = :ident");
                        $query->bindPARAM(':ident', $thread_id);
                        $query->execute();
                        $infos = $query->fetchAll();
                        foreach($infos as $info) {
                            echo "<div class='opend_thread flex-container'>";
                                echo "<div class='flex-container'>";
                                    echo "<p>" . $info['thread_title'] . "</p>";
                                    echo "<p>" . $info['thread_text'] . "." . "</p>";
                                    echo "<p><i class='far fa-user'></i> " . $info['user_name'] . "." . "</p>";
                                    echo "<p><i class='far fa-clock'></i> " . str_replace("-"," ", date('Y-M-d', strtotime($info['date_created']))) . "." . "</p>";
                                echo "</div>";
                                echo "<div class='u_resp_tt_cont flex-container'>";
                                include_once 'project_form/show_thread_responses.php';
                                $t_responses = $query->fetchAll();
                                foreach($t_responses as $t_response) {
                                        echo "<div class='u_resp_tt flex-container'>";
                                            echo "<div class='flex-container'>";
                                                include_once 'project_form/check_profile_pic.php';
                                                if($t_response['name'] > 0) {//if user uploaded the photo show it in the profile
                                                    echo "<img src='pic_upload/" . $t_response['name'] . "' . alt='".$t_response['name']."'>";
                                                } else { //if user havent uploaded a photo (or deleted it) show the icon
                                                    echo "<p><i class='far fa-user'></i></p>";
                                                }
                                                echo "<p>" . $t_response['responded_user'] . ":". "</p>";
                                            echo "</div>";
                                            echo "<p>" . $t_response['response'] . "</p>";
                                        echo "</div>";
                                } 
                                    echo "<div class='response_pagin flex-container'>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<form class='flex-container' method='post' action='project_form/thread_response.php'>";
                                    echo "<textarea rows='4' placeholder='Leave your response...' maxLength='300' name='r_text' required></textarea>";
                                    $_SESSION['u_thread_title'] = $info['thread_title']; //USED TO INSERT TITLE NAME INTO DB
                                    echo "<button class='button' type='submit' name='submit_response'>Respond</button>";
                                echo "</form>";
                                echo "<a href='forum_logged_in.php'><i class='fas fa-arrow-left'></i> Go back to the posts</a>";
                            echo "</div>";                   
                        }
                    }
                }
                catch (\PDOException $e) {
                    echo "Error connecting to mySQL: " . $e->getMessage();
                    echo "<code><pre>".print_r($e)."</pre></code>";
                    exit();
                }
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