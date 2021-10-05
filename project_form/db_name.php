<?php
$pdo = new \PDO('mysql:host=localhost;dbname=third_project;charset=utf8', 'root', '', [
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
?>