<?php 
    session_start();
    try {
        include_once 'db_name.php';
        $thread_to_delete = $_POST['threadID'];
        $stmt = $pdo->prepare("DELETE FROM `threads` WHERE id = :thread_delete");
        $stmt->bindPARAM(':thread_delete', $thread_to_delete);
        $stmt->execute();
        $stmt = $pdo->prepare("DELETE FROM `thread_responses` WHERE thread_id = :thread_delete");
        $stmt->bindPARAM(':thread_delete', $thread_to_delete);
        $stmt->execute();

        
    } catch (\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
    }
?>