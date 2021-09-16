<?php 
    if($_POST && isset($_POST['submit'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../forum.php");
        exit();
    }
?>