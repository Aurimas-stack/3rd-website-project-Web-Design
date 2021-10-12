<?php 
    include_once 'db.php';
    $priv_u = "Tester1234";
    $get_users = $pdo->prepare("SELECT user_uid, post_restrictions FROM `users` WHERE user_uid != :adm");
    $get_users->bindPARAM(':adm', $priv_u);
    $get_users->execute();
    $collect_users = $get_users->fetchAll(PDO::FETCH_ASSOC);
?>