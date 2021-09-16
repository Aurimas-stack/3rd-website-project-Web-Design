<?php
    error_reporting(E_ALL);  
    ini_set('display_errors', true);
    error_reporting(-1);
    ini_set('memory_limit', '-1');
    
    try {
        $pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        session_start();
        if($_POST && isset($_POST['submit1'])) {
            $uid = trim($_POST['uid']);
            $pwd = trim($_POST['pwd']);
            if(empty($uid) || empty($pwd)) {
                header("Location: forum.php?=login=empty");
                exit();
            } else {
                $sql = $pdo->prepare("SELECT * FROM `users` WHERE user_uid = :uid");
                $sql->bindPARAM(':uid', $uid);
                $sql->execute();
                $result = $sql->fetchColumn();
                if($result < 1) {
                    header("Location: forum.php?=login=error");
                    exit();
                } else {
                    $sql1 = $pdo->prepare("SELECT * FROM `users` WHERE user_uid = :uid");
                    $sql1->bindPARAM(':uid', $uid);
                    $sql1->execute();
                    $row = $sql1->fetch(PDO::FETCH_ASSOC);
                    if(!empty($row)) {
                        $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                        if($hashedPwdCheck == false) {
                            header("Location: forum.php?=login=error");
                            exit();
                        } elseif($hashedPwdCheck == true) {
                            $_SESSION['u_id'] = $row['user_id'];
                            $_SESSION['u_first'] = $row['user_first'];
                            $_SESSION['u_last'] = $row['user_last'];
                            $_SESSION['u_email'] = $row['user_email'];
                            $_SESSION['u_uid'] = $row['user_uid'];
                            header("Location: ../forum.php");
                            exit();
                        }
                    } 
                }
            }
        } else {
            header("Location ../forum.php?=login=error");
            exit();
        }
    } catch(\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
        echo "<code><pre>".print_r($e)."</pre></code>";
        exit();
    }
    /*session_start();
    if(isset($_POST['submit'])) {
        echo "Error connecting to mySQL: ";
        $uid = trim($_POST['uid']);
        $pwd = trim($_POST['pwd']);
        if(empty($uid) || empty($pwd)) {
            header("Location: forum.php?=login=empty");
            exit();
        } else {
            $sql = $pdo->prepare("SELECT * FROM `users` WHERE user_uid = :uid");
            $sql->bindPARAM(':uid', $uid);
            $sql->execute();
            $result = $sql->fetchColumn();
            if($result < 1) {
                header("Location: forum.php?=login=error");
                exit();
            } else {
                $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                if(!empty($row)) {
                    $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                    if($hashedPwdCheck === false) {
                        header("Location: forum.php?=login=error");
                        exit();
                    } elseif($hashedPwdCheck === true) {
                        $_SESSION['u_id'] = $row['user_id'];
                        $_SESSION['u_first'] = $row['user_first'];
                        $_SESSION['u_last'] = $row['user_last'];
                        $_SESSION['u_email'] = $row['user_email'];
                        $_SESSION['u_uid'] = $row['user_uid'];
                        header("Location: forum.php?=login=success");
                        exit();
                    }
                }
            }
        }
    } else {
        header("Location ../forum.php?=login=error");
        exit();
    }*/
?>