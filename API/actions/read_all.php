<?php
require_once '../database.php';
header('Content-Type: application/json');

$query = "SELECT id, name, location FROM events";
$result = $conn->query($query);

$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}

echo json_encode([
    "success" => true,
    "data" => $events
]);
?>
