<?php
session_start();
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbName = "taskmate";

$servername = "sql112.infinityfree.com";
$username = "if0_37074510";
$password = "Qxq61jfAXD";
$dbName = "if0_37074510_taskmate";

// Create connection 
$conn = @new mysqli(
    $servername,
    $username,
    $password,
    $dbName
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
