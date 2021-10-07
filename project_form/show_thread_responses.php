<?php 
    try {
        include_once 'db_name.php';
        $check_thread_id =  $_SESSION['thread-id'];
        $query = $pdo->prepare("SELECT response, responded_user, name FROM `thread_responses` WHERE thread_id = :t_ident");
        $query->bindPARAM(':t_ident', $check_thread_id);
        $query->execute();
        
    } catch (\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
        exit();
    }
?>