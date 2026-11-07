<?php
$servername = getenv("gateway01.ap-southeast-1.prod.aws.tidbcloud.com");
$username   = getenv("2qca3zj8FFuqYTR.root");
$password   = getenv("UH9p3EVIhD1SgjSp");
$database   = getenv("civicvoice");
$port       = (int) getenv("4000");

"/etc/ssl/certs/ca-certificates.crt"

$conn = mysqli_init();

$conn->ssl_set(
    NULL,
    NULL,
    $caPath,
    NULL,
    NULL
);

if (!$conn->real_connect(
    $servername,
    $username,
    $password,
    $database,
    $port,
    NULL,
    MYSQLI_CLIENT_SSL
)) {
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");
?>
