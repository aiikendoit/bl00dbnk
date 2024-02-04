<?php
    $dsn = 'mysql:host=localhost;dbname=dischargesummary';
    $username = 'glpi';
    $password = '3xtDH34M1n0fCh23v3ry1';

    try {
        $con = new PDO($dsn, $username, $password);

    } catch (PDOException $e) {
        // echo "Connection established";
        $error_message = $e->getMessage();
        include('../errors/err.php');
        exit();
    }
?>
