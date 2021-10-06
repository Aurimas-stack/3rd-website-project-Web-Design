<?php
    session_start();
    try {
        include_once 'db_name.php';
    } catch (\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage(); 
    }
    include_once 'err_variable.php';
        if(isset($_POST['pic-submit'])) {
            $maxSize = 2097152;
            $userName = $_SESSION["u_uid"];
            $acceptable = array(
                'image/png',
                'image/jpg',
                'image/jpeg'
            );
            $statement = $pdo->prepare("INSERT INTO `user_pics` (name, image, user_name) VALUES (:one, :two, :three)");
            $filename = $_FILES['pic-upload']['name'];
            $target_file = '../pic_upload/' . $filename;
            if(in_array($_FILES['pic-upload']['type'], $acceptable) && (!empty($_FILES["pic-upload"]["type"]))) {
                if(($_FILES['pic-upload']['size'] >= $maxSize) || ($_FILES["pic-upload"]["size"] === 0)) {
                    $ep_msg = 'File too large. File must be less than 2 megabytes.';
                } else {
                    if(move_uploaded_file($_FILES['pic-upload']['tmp_name'], $target_file)) {
                        $statement->execute(array(":one" => $filename, ":two" => $target_file, ":three" => $userName));
                        header('Location: ../profile_settings.php');
                        exit();
                    }
                }  
            } else {
                $ep_msg = "You can't upload this file. Only .png, .jpeg and .jpg formats are allowed.";
            }       
        }  
?>