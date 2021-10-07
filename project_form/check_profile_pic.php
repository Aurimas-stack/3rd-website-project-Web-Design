<?php
    include_once 'db.php';
    $specific_user = $_SESSION['u_id'];
    $get_pic = $pdo->prepare("SELECT * FROM `user_pics` WHERE user_id = :chooser");
    $get_pic->bindPARAM(':chooser', $specific_user);
    $get_pic->execute();
    $pic_check_result = $get_pic->fetch(PDO::FETCH_ASSOC);
?>