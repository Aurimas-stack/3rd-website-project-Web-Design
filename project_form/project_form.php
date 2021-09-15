<?php
    try {
        $pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        if($_POST && isset($_POST['submit'])) {
            if($_POST['checkbox'] == 'Yes') {
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $project_title = trim($_POST['project_title']);
                $project_details = trim($_POST['project_details']);
                $stmt = $pdo->prepare("INSERT INTO `project_form` (name, email, project_title, project_details) 
                VALUES (:name, :email, :project_title, :project_details)");
                $stmt->execute(array(':name' => $name, ':email' => $email, ':project_title' => $project_title, 
                ':project_details' => $project_details));
                header('Location: success.php');
                exit();
            };
        };
    } catch(\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
    };