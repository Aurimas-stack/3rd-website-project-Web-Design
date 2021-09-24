<?php 
    try {
        $pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $check_thread_id =  $_SESSION['thread-id'];
        $query = $pdo->prepare("SELECT response, responded_user FROM `thread_responses` WHERE thread_id = :t_ident");
        $query->bindPARAM(':t_ident', $check_thread_id);
        $query->execute();
        
    } catch (\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
        exit();
    }
?>