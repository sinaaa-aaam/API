<?php
require_once '../database.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "error" => "Invalid request method"]);
    exit;
}

$name = trim($_POST['name'] ?? '');
$location = trim($_POST['location'] ?? '');

if ($name === '' || $location === '') {
    echo json_encode(["success" => false, "error" => "Missing required fields"]);
    exit;
}

$query = "INSERT INTO events (name, location) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $name, $location);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "data" => ["id" => $stmt->insert_id]
    ]);
} else {
    echo json_encode(["success" => false, "error" => "Create failed"]);
}

$stmt->close();
?>
