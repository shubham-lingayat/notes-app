<?php
// CORS for every PHP file:
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $description = $_POST['description'] ?? '';

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $email, $description, $id]);

    echo "User updated successfully.";
}
?>
