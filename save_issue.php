<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}

if (
    empty($_POST['title']) ||
    empty($_POST['description']) ||
    empty($_POST['category']) ||
    empty($_POST['location'])
) {
    exit;
}

$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];
$location = $_POST['location'];
$severity = $_POST['severity'];
$reporter = $_POST['reporter'];
$image = "";

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

    $imageName = time() . "_" . basename($_FILES["image"]["name"]);

    move_uploaded_file(
        $_FILES["image"]["tmp_name"],
        "uploads/" . $imageName
    );

    $image = "uploads/" . $imageName;
}
$votes = 0;
$status = "reported";
$time = round(microtime(true) * 1000);
$sql = "INSERT INTO issues (title, description, category, location, severity, reporter, image, votes, status , time )
VALUES ('$title', '$description', '$category', '$location', '$severity', '$reporter', '$image', '$votes', '$status', '$time' )";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>