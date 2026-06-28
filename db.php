<?php
$servername = getenv("MYSQLHOST");
$username   = getenv("MYSQLUSER");
$password   = getenv("MYSQLPASSWORD");
$database   = getenv("MYSQLDATABASE");
$port       = getenv("MYSQLPORT");

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
