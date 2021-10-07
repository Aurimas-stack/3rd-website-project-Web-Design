<?php
    include_once 'db.php';
    session_start();
    if(isset($_POST['del-pic'])) {
        $profile_name = $_SESSION["u_uid"];
        $delete_prof_pic = $pdo->prepare("DELETE FROM `user_pics` WHERE user_name = :u_delete_pic");
        $delete_prof_pic->bindPARAM(':u_delete_pic', $profile_name);
        $delete_prof_pic->execute();
        $delete_from_responses = $pdo->prepare("UPDATE `thread_responses` SET name = NULL, image = NULL WHERE responded_user = :u_thread_pic");
        $delete_from_responses->bindPARAM(':u_thread_pic', $profile_name);
        $delete_from_responses->execute();
        header('Location: ../profile_settings.php');
        exit();
    }
?>