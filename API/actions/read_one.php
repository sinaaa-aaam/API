<?php
require_once '../database.php';
header('Content-Type: application/json');

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    echo json_encode(["success" => false, "error" => "Invalid ID"]);
    exit;
}

$query = "SELECT id, name, location FROM events WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["success" => false, "error" => "not found"]);
} else {
    echo json_encode([
        "success" => true,
        "data" => $result->fetch_assoc()
    ]);
}

$stmt->close();
?>
