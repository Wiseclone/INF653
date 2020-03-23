<?php
    $dsn = 'mysql:host=k2fqe1if4c7uowsh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=h6nkps6dwhzechkw';
    $username = 'do74nxeiek1wev3i';
    $password = 'e5e9vrj16eskrc9j';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>