<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}

$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$category = $_POST['category'] ?? '';
$location = $_POST['location'] ?? '';
$severity = $_POST['severity'] ?? 'Medium';
$reporter = $_POST['reporter'] ?? '';

if (!$title || !$description || !$category || !$location) {
    exit("Missing required fields");
}

// Generate next ID because TiDB column has no AUTO_INCREMENT
$result = $conn->query(
    "SELECT COALESCE(MAX(id), 0) + 1 AS next_id FROM issues"
);

if (!$result) {
    exit("ID generation failed: " . $conn->error);
}

$id = (int)$result->fetch_assoc()['next_id'];

$image = "";

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $imageName = time() . "_" . basename($_FILES["image"]["name"]);

    if (move_uploaded_file(
        $_FILES["image"]["tmp_name"],
        "uploads/" . $imageName
    )) {
        $image = "uploads/" . $imageName;
    }
}

$votes = 0;
$status = "reported";
$time = (int)round(microtime(true) * 1000);

$stmt = $conn->prepare(
    "INSERT INTO issues
    (id, title, description, category, location, severity,
    reporter, image, votes, status, time)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "isssssssisi",
    $id,
    $title,
    $description,
    $category,
    $location,
    $severity,
    $reporter,
    $image,
    $votes,
    $status,
    $time
);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
