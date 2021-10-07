<?php
    session_start();
    try {
        include_once 'db_name.php';
    } catch (\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage(); 
    }
    $_SESSION['uploadError'] = "";
        if(isset($_POST['pic-submit'])) {
            $maxSize = 2097152;
            $specific_id = $_SESSION['u_id'];
            $userName = $_SESSION["u_uid"];
            $acceptable = array(
                'image/png',
                'image/jpg',
                'image/jpeg'
            );
            $statement = $pdo->prepare("INSERT INTO `user_pics` (name, image, user_name, user_id) VALUES (:one, :two, :three, :four)");
            $stmt_for_thread_responses = $pdo->prepare("UPDATE `thread_responses` SET name = :pic_name, image = :pic_loc WHERE responded_user = :this_u");
            $filename = $_FILES['pic-upload']['name'];
            $target_file = '../pic_upload/' . $filename;
            if(in_array($_FILES['pic-upload']['type'], $acceptable) && (!empty($_FILES["pic-upload"]["type"]))) {
                if(($_FILES['pic-upload']['size'] >= $maxSize) || ($_FILES["pic-upload"]["size"] === 0)) {
                    $_SESSION['uploadError'] = 'File too large. File must be less than 2 megabytes.';
                    header('Location: ../profile_settings.php');
                    exit();
                } else {
                    $check_img_in_db = $pdo->prepare("SELECT * FROM `user_pics` WHERE user_name = :check_img");
                    $check_img_in_db->bindPARAM(':check_img', $userName);
                    $check_img_in_db->execute();
                    $img_result = $check_img_in_db->fetchColumn();
                    if($img_result > 0) {
                        unlink('../pic_upload/' . $img_result['name']);
                        $delete_img = $pdo->prepare("DELETE FROM `user_pics` WHERE user_name = :pic");
                        $delete_img->bindPARAM(':pic', $userName);
                        $delete_img->execute();
                        if(move_uploaded_file($_FILES['pic-upload']['tmp_name'], $target_file)) {
                            $statement->execute(array(":one" => $filename, ":two" => $target_file, ":three" => $userName, ":four" => $specific_id));
                            $stmt_for_thread_responses->execute(array(":pic_name" => $filename, ":pic_loc" => $target_file, ":this_u" => $userName));
                            header('Location: ../profile_settings.php');
                            exit();
                            $_SESSION['uploadError'] = "";
                        }
                    } else {
                        if(move_uploaded_file($_FILES['pic-upload']['tmp_name'], $target_file)) {
                            $statement->execute(array(":one" => $filename, ":two" => $target_file, ":three" => $userName, ":four" => $specific_id));
                            $stmt_for_thread_responses->execute(array(":pic_name" => $filename, ":pic_loc" => $target_file, ":this_u" => $userName));
                            header('Location: ../profile_settings.php');
                            exit();
                            $_SESSION['uploadError'] = "";
                        }
                    }
                }  
            } else {
                header('Location: ../profile_settings.php');
                exit();
                $_SESSION['uploadError'] = "You can't upload this file. Only .png, .jpeg and .jpg formats are allowed.";
            }       
        }  
?>