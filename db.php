<?php
$servername = "hayabusa.proxy.rlwy.net";
$username = "root";
$password = "novQxtbGPgEqAEgnvPGkInDvepgRlZPA";
$database = "railway";
$port = 42282;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
