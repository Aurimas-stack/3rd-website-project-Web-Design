<?php
    session_start();
    include_once 'db.php';
    if($_POST && isset($_POST['del_submit'])) {
        $del_id = $_SESSION['u_id'];
        $del_uid = trim($_POST['del_uid']);
        $del_pwd = trim($_POST['del_pwd']);
        $deact_u = "Deleted user";
        if(empty($del_uid) || empty($del_pwd)) {
            header("Location: ../forum.php");
            exit();
        } else {
            $sql = $pdo->prepare("SELECT * FROM `users` WHERE user_uid = :1uid");
            $sql->bindPARAM(':1uid', $del_uid);
            $sql->execute();
            $result = $sql->fetchColumn();
            if($result < 1) {
                header("Location: ../forum.php");
                exit();
            } else {
                $sql2 = $pdo->prepare("SELECT * FROM `users` WHERE user_uid = :2uid");
                $sql2->bindPARAM(':2uid', $del_uid);
                $sql2->execute();
                $row = $sql2->fetch(PDO::FETCH_ASSOC);
                if(!empty($row)) {
                    $hashedPwdCheck = password_verify($del_pwd, $row['user_pwd']);
                    if($hashedPwdCheck == false) {
                        header("Location: ../forum.php");
                        exit();
                    } elseif($hashedPwdCheck == true) {
                        $update_threads = $pdo->prepare("UPDATE `threads` SET user_name = :deact_u WHERE user_name = :to_del_uid");
                        $update_threads->execute(array(':deact_u' => $deact_u, ':to_del_uid' => $del_uid));
                        $update_resp = $pdo->prepare("UPDATE `thread_responses` SET responded_user = :deact_u2 WHERE responded_user = :to_del_uid2");
                        $update_resp->execute(array(":deact_u2" => $deact_u, ":to_del_uid2" => $del_uid));
                        $del_acc = $pdo->prepare("DELETE FROM `users` WHERE user_id = :delet_id AND user_uid = :delet_uid");
                        $del_acc->execute(array(':delet_id' => $del_id, ":delet_uid" => $del_uid));
                        header("Location: ../home.php");
                        exit();
                    }
                }
            }
        }
    }
?>