<?php 
    session_start();
    try {
        $pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
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