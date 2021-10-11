<?php
    include_once 'db.php';
    $spec_thread = $_POST['ul_thread_id'];
    $setTrue = "FALSE";
    $lock_thread = $pdo->prepare("UPDATE `threads` SET is_thread_locked = :its_true WHERE id = :selected_thread");
    $lock_thread->execute(array(":its_true" => $setTrue, ":selected_thread" => $spec_thread));
?>