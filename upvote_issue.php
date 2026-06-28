<?php
include 'db.php';

$id = $_POST['id'];

$sql = "UPDATE issues SET votes = votes + 1 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>