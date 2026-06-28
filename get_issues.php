<?php
include 'db.php';

$sql = "SELECT * FROM issues";
$result = $conn->query($sql);

$issues = array();

while ($row = $result->fetch_assoc()) {
    $issues[] = $row;
}

header('Content-Type: application/json');
echo json_encode($issues);

$conn->close();
?>