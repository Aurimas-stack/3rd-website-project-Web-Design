<?php 
    session_start();
    try {
        $pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        if($_POST && isset($_POST['submit_thread'])) {
            $thread_title = trim($_POST['title']);
            $thread_text = trim($_POST['t_text']);
            $thread_user = $_SESSION["u_uid"];
            $stmt = $pdo->prepare("INSERT INTO `threads` (thread_title, thread_text, user_name) VALUES (:title, :text, :user)");
            $stmt->execute(array(':title' => $thread_title, ':text' => $thread_text, ':user' => $thread_user));
            header("Location: ../forum_logged_in.php");
            exit();
        }
    } catch (\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
    }
?>