<?php
    include_once 'db.php';
    $which_u = $_POST['free_u'];
    $rmvRrst = "FALSE";
    $rmv_r = $pdo->prepare("UPDATE `users` SET post_restrictions = :its_false WHERE user_uid = :free_usr");
    $rmv_r->execute(array(':its_false' => $rmvRrst, ":free_usr" => $which_u));
?>  