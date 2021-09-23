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
                        $query = $pdo->prepare("SELECT thread_title, thread_text, user_name, date_created FROM `threads` WHERE id = :ident");
                        $query->bindPARAM(':ident', $thread_id);
                        $query->execute();
                        $infos = $query->fetchAll();
                        foreach($infos as $info) {
                            echo "<div class='opend_thread flex-container'>";
                                echo "<div class='flex-container'>";
                                    echo "<p>" . $info['thread_title'] . "</p>";
                                    echo "<p>" . $info['thread_text'] . "</p>";
                                    echo "<p>By: " . $info['user_name'] . "</p>";
                                    echo "<p>Posted: " . date('Y-M-d', strtotime($info['date_created'])) . "</p>";
                                echo "</div>";
                                echo "<a href='forum_logged_in.php'>Go back to the posts</a>";
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
    <script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>