<?php 
    session_start();
    try {
        $pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        if($_POST && isset($_POST['submit_response'])) {
            $title_to_r = $_SESSION['u_thread_title'];
            $response_text = trim($_POST['r_text']);
            $response_user = $_SESSION["u_uid"];
            $thread_id =  $_SESSION['thread-id'];
            $stmt = $pdo->prepare("INSERT INTO `thread_responses` (thread_name, response, responded_user, thread_id) VALUES (:title, :text, :user, :ident)");
            $stmt->execute(array(':text' => $response_text, ':title' => $title_to_r, ':user' => $response_user, ':ident' => $thread_id));
            header('Location: ../u_thread.php?id=' . $_SESSION['thread-id']);
            exit();
        }
    } catch (\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
        exit();
    }
?>