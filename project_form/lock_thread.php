<?php
    include_once 'db.php';
    $spec_thread = $_POST['l_thread_id'];
    $setTrue = "TRUE";
    $lock_thread = $pdo->prepare("UPDATE `threads` SET is_thread_locked = :its_true WHERE id = :selected_thread");
    $lock_thread->execute(array(":its_true" => $setTrue, ":selected_thread" => $spec_thread));
?>