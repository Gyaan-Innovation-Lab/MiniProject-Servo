<?php
require 'config.php';
$query = "SELECT * FROM servo_control WHERE id = 1";
$stmt = $mysqli->query($query);

$result = $stmt->fetch_assoc();

if($result) {
    $jsonResponse = json_encode(['angle' => $result['angle']]);
    header('Content-Type: application/json');
    echo $jsonResponse;
} else {
    echo json_encode(['error' => 'ID not found']);
}
?>