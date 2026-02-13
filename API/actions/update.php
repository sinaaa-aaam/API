<?php
require_once '../database.php';
header('Content-Type: application/json');

$id = intval($_POST['id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$location = trim($_POST['location'] ?? '');

if ($id <= 0 || $name === '' || $location === '') {
    echo json_encode(["success" => false, "error" => "Missing data"]);
    exit;
}

$query = "UPDATE events SET name = ?, location = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssi", $name, $location, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "Update failed"]);
}

$stmt->close();
?>
