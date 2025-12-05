<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$servername = $_ENV['FACILASSIGN_LD_DB_HOST'];; 
$username   = $_ENV['FACILASSIGN_LD_DB_USER'];;        
$password   = $_ENV['FACILASSIGN_LD_DB_PASS'];;
$dbname     = $_ENV['FACILASSIGN_DB_NAME'];;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
