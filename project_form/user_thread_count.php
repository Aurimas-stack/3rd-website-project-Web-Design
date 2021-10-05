<?php
    try {
        include_once 'db_name.php';
            $poster = $_SESSION["u_uid"];
            $stmt = $pdo->prepare("SELECT count(*) FROM `threads` WHERE user_name = :user");
            $stmt->bindPARAM(':user', $poster);
            $stmt->execute();
            $amount_of_threads = $stmt->fetchColumn();
            $stmt2 = $pdo->prepare("SELECT count(*) FROM `thread_responses` WHERE responded_user = :user1");
            $stmt2->bindPARAM(':user1', $poster);
            $stmt2->execute();
            $amount_of_posts = $stmt2->fetchColumn();
        
    } catch (\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
        exit();
    }
?>