<?php
    include_once 'db.php';
    $spec_user = $_POST['user_name'];
    $userBlock = "TRUE";
    $lock_thread = $pdo->prepare("UPDATE `users` SET post_restrictions = :its_true WHERE user_uid = :selected_user");
    $lock_thread->execute(array(":its_true" => $userBlock, ":selected_user" => $spec_user));
?>