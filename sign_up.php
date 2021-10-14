<?php
    session_start();
?>
<?php
    try {
        $pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $emptyErr = $nameErr = $emailErr = $userErr = "";
        if($_POST && isset($_POST['submit'])) {
            $first = trim($_POST['first']);
            $last = trim($_POST['last']);
            $email = trim($_POST['email']);
            $uid = trim($_POST['uid']);
            $pwd = trim($_POST['pwd']);
            //checks if there's an empty field
            if(empty($first) || empty($last) || empty($email) || empty ($uid) || empty ($pwd)) {
                $emptyErr = "The field is empty";
            } else {
                //checks inputs for invalid symbols through Regex
                if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                    $nameErr = "Invalid name (no symbols are allowed)";
                } else {
                    //checks if the email is in valid format
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    } else {
                        //checks if the username is already in use
                        $findU = $pdo->prepare("SELECT * FROM `users` WHERE user_uid = :uid");
                        $findU->bindParam(':uid', $uid);
                        $findU->execute();
                        $result = $findU->fetchColumn();
                        if($result> 0) {
                            $userErr = "Username is taken";
                        } else {
                            //creating hash for password
                            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                            //inserts new users into DB
                            $newUser = $pdo->prepare("INSERT INTO `users` (user_first, user_last, user_email, 
                            user_uid, user_pwd) VALUES (:first, :last, :email, :uid, :hashedPwd)");
                            $newUser->execute(array(':first' => $first, ':last' => $last, ':email' => $email,
                            ':uid' => $uid, ':hashedPwd' => $hashedPwd));
                            $first = $last = $email = $uid = $pwd = NULL;
                            header("Location: success_acc_creat.php");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Design Agency</title>
    <script src="https://kit.fontawesome.com/b090be4e4c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href='sass/main.css' rel='stylesheet'>
</head>
<body id='sign_up'>
    <header class='site-header container flex-container'>
        <h2 class='site-title'>Web Agency<i class="fab fa-draft2digital"></i></h2>
        <nav class='header-nav'>
            <ul class='flex-container'>
                <li><a href="home.php">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="#"><i class="fas fa-angle-double-up"></i></a></li>
            </ul>
        </nav>
        <nav class="mob-nav">
            <ul id="mobMenu" class="flex-container">
                <li><a href="home.php">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="pricing.html">Pricing</a></li>
            </ul>
            <a href="javascript:void(0);" class="icon" onclick="displayMobileNav()">
                <i class="fa fa-bars"></i>
            </a>
         </nav>
    </header>
    <section class='sign_up-hero'>
        <div class='container flex-container'>
            <h2>Sign up here</h2>
            <form class='flex-container' method='post' action='<?= $_SERVER["PHP_SELF"];?>'>
                <span class="error"><?php echo $emptyErr;?></span>
                <div class='flex-container'>
                    <p>Your Name:</p>
                    <input type='text' name='first' placeholder='First Name' value='<?= htmlspecialchars(@$_POST["first"]); ?>' required/>
                    <span class="error"><?php echo $nameErr;?></span>
                </div>
                <div class='flex-container'>
                    <p>Your Last Name:</p>
                    <input type='text' name='last' placeholder='Last Name' value='<?= htmlspecialchars(@$_POST["last"]); ?>' required/>
                    <span class="error"><?php echo $nameErr;?></span>
                </div>
                <div class='flex-container'>
                    <p>Your Email:</p>
                    <input type='email' name='email' placeholder='Your Email' value='<?= htmlspecialchars(@$_POST["email"]); ?>' required/>
                    <span class="error"><?php echo $emailErr;?></span>
                </div>
                <div class='flex-container'>
                    <p>Your Username:</p>
                    <input type='text' name='uid' placeholder='Username' value='<?= htmlspecialchars(@$_POST["uid"]); ?>' required/>
                    <span class="error"><?php echo $userErr;?></span>
                </div>
                <div class='flex-container'>
                    <p>Your Password:</p>
                    <input type='password' name='pwd' placeholder='Password' required/>
                </div>
                <input type='submit' name='submit' value='Sign up' class='button' />
            </form>
            <a class='go-to-log-in' href='forum.php'>Go back to the log in screen</a>
        </div>
    </section>
<script src="javascript/jquery.min.js"></script>
<script src="javascript/pagination.js" type="text/javascript"></script>
<script src="javascript/js.js" type="text/javascript"></script>   
</body>
</html>