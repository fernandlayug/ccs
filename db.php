<?php
$host = 'localhost';
$user = 'ccsadmin';
$password = '12345678';
$database = 'ccs_db';

$conn = mysqli_connect($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>