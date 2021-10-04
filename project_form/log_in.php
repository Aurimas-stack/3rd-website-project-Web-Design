<?php  
    try {
        $pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        session_start();
        function getIpAddr() {//function to get ip address
            if (!empty($_SERVER['HTTP_CLIENT_IP']))  { //check ip from share internet
              $ip=$_SERVER['HTTP_CLIENT_IP'];
            }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
              $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }else {
              $ip=$_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
        $_SESSION['log_attemps'] = '';
        if($_POST && isset($_POST['submit1'])) {
            $time=time()-30;//timeout for 30 secs
            $ip_addr = getIpAddr();//storing ip in variable
            $amount_of_logins = $pdo->prepare("SELECT count(*) AS counter FROM `login_logs` WHERE try_time > $time AND ip_address = :ip");//inserting ip to DB table
            $amount_of_logins->bindPARAM(':ip', $ip_addr);//bindPARAM
            $amount_of_logins->execute();//execute query
            $total_count = $amount_of_logins->fetchColumn();//fetching info from table     
            if($total_count === 3) {
                $_SESSION['log_attemps'] = "Too many failed login attempts. Please login after 30 sec";
            }
            $uid = trim($_POST['uid']);
            $pwd = trim($_POST['pwd']);
            if(empty($uid) || empty($pwd)) {
                $total_count++;
                $log_attm = 3 - $total_count;
                if($log_attm === 0) {
                    $_SESSION['log_attemps'] = "Too many failed login attempts. Please login after 30 sec";
                } else {
                    $_SESSION['log_attemps'] = "Please enter valid login details. $log_attm attempts remaining";
                }
                $try_time = time();
                $insert_log = $pdo->prepare("INSERT INTO `login_logs` (ip_address, try_time) VALUES (:ip, :tries)");
                $insert_log->execute(array(':ip' => $ip_addr, ':tries' => $try_time));
                header("Location: ../forum.php");
                exit();
            } else {
                $sql = $pdo->prepare("SELECT * FROM `users` WHERE user_uid = :uid");
                $sql->bindPARAM(':uid', $uid);
                $sql->execute();
                $result = $sql->fetchColumn();
                if($result < 1) {
                    $total_count++;
                    $log_attm = 3 - $total_count;
                    if($log_attm === 0) {
                        $_SESSION['log_attemps'] = "Too many failed login attempts. Please login after 30 sec";
                    } else {
                        $_SESSION['log_attemps'] = "Please enter valid login details. $log_attm attempts remaining";
                    }
                    $try_time = time();
                    $insert_log = $pdo->prepare("INSERT INTO `login_logs` (ip_address, try_time) VALUES (:ip, :tries)");
                    $insert_log->execute(array(':ip' => $ip_addr, ':tries' => $try_time));
                    header("Location: ../forum.php");
                    exit();
                } else {
                    $sql1 = $pdo->prepare("SELECT * FROM `users` WHERE user_uid = :uid");
                    $sql1->bindPARAM(':uid', $uid);
                    $sql1->execute();
                    $row = $sql1->fetch(PDO::FETCH_ASSOC);
                    if(!empty($row)) {
                        $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                        if($hashedPwdCheck == false) {
                            $total_count++;
                            $log_attm = 3 - $total_count;
                            if($log_attm === 0) {
                                $_SESSION['log_attemps'] = "Too many failed login attempts. Please login after 30 sec";
                            } else {
                                $_SESSION['log_attemps'] = "Please enter valid login details. $log_attm attempts remaining";
                            }
                            $try_time = time();
                            $insert_log = $pdo->prepare("INSERT INTO `login_logs` (ip_address, try_time) VALUES (:ip, :tries)");
                            $insert_log->execute(array(':ip' => $ip_addr, ':tries' => $try_time));
                            header("Location: ../forum.php");
                            exit();
                        } elseif($hashedPwdCheck == true) {
                            $delete_f_ip = $pdo->prepare("DELETE FROM `login_logs` WHERE ip_address = :ips");
                            $delete_f_ip->bindPARAM(':ips', $ip_addr);
                            $delete_f_ip->execute();
                            $_SESSION['u_id'] = $row['user_id'];
                            $_SESSION['u_first'] = $row['user_first'];
                            $_SESSION['u_last'] = $row['user_last'];
                            $_SESSION['u_email'] = $row['user_email'];
                            $_SESSION['u_uid'] = $row['user_uid'];
                            $_SESSION['u_creation'] = $row['date_created']; 
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
?>