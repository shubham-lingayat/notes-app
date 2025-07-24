<?php
// CORS for every PHP file:
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $description = $_POST['description'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO users (name, email, description) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $description]);

    echo "User created successfully.";
}
?>
