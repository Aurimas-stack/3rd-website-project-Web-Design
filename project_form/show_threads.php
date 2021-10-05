<?php
    try {
        include_once 'db_name.php';
        $query = $pdo->prepare("SELECT thread_title, user_name, date_created, id FROM `threads` WHERE thread_text != ''");
        $query->execute();
        $rows = $query->fetchAll();
    } catch (\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
        exit();
    }
?>