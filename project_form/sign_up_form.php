<?php
    try {
        include_once 'db_name.php';
        if($_POST && isset($_POST['submit'])) {
            $first = trim($_POST['first']);
            $last = trim($_POST['last']);
            $email = trim($_POST['email']);
            $uid = trim($_POST['uid']);
            $pwd = trim($_POST['pwd']);
            //checks if there's an empty field
            if(empty($first) || empty($last) || empty($email) || empty ($uid) || empty ($pwd)) {
                header('Location: sign_up.php?signup=empty');
                exit();
            } else {
                //checks inputs for invalid symbols through Regex
                if(!preg_match("/^[a-zA-Z]/", $first) || !preg_match("/^[a-zA-Z]/", $last)) {
                    header('Location: sign_up.php?signup=invalid');
                    exit();
                } else {
                    //checks if the email is in valid format
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        header('Location: sign_up.php?signup=invalidemail');
                        exit();
                    } else {
                        //checks if the username is already in use
                        $findU = $pdo->prepare("SELECT * FROM `users` WHERE user_uid = :uid");
                        $findU->bindParam(':uid', $uid);
                        $findU->execute();
                        $result = $findU->fetchColumn();
                        if($result> 0) {
                            header("Location: sign_up.php?signup=usertaken");
                            exit();
                        } else {
                            //creating hash for password
                            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                            //inserts new users into DB
                            $newUser = $pdo->prepare("INSERT INTO `users` (user_first, user_last, user_email, 
                            user_uid, user_pwd) VALUES (:first, :last, :email, :uid, :hashedPwd)");
                            $newUser->execute(array(':first' => $first, ':last' => $last, ':email' => $email,
                            ':uid' => $uid, ':hashedPwd' => $hashedPwd));
                            header("Location: sign_up.php?signup=success");
                            exit();
                        }
                    }
                }
            }
        }
    } catch(\PDOException $e) {
        echo "Error connecting to mySQL: " . $e->getMessage();
        echo "<code><pre>".print_r($e)."</pre></code>";
        exit();
    }
?>