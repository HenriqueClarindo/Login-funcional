<?php

$host = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'login';

session_status() === PHP_SESSION_NONE && session_start();

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    error_log("Failed to connect to database: ". $mysqli->connect_error);
    echo "erro", $mysqli->connect_error;
    header("Location: ../error.php");
    exit;
}
?>