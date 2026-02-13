 <?php
require_once '../database.php';
header('Content-Type: application/json');

$id = intval($_POST['id'] ?? 0);

if ($id <= 0) {
    echo json_encode(["success" => false, "error" => "Invalid ID"]);
    exit;
}

$query = "DELETE FROM events WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "Delete failed"]);
}

$stmt->close();
?>
