<?php

$servername = getenv("DB_HOST");
$username   = getenv("DB_USER");
$password   = getenv("DB_PASSWORD");
$database   = getenv("DB_NAME");
$port       = (int)getenv("DB_PORT");

$caPath = "/etc/ssl/certs/ca-certificates.crt";

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
