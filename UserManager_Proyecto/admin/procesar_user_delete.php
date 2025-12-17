<?php
require_once __DIR__ . '/../conexion/db.php';
require_once __DIR__ . '/../conexion/auth.php';
requireAdmin();

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

header("Location: users_list.php");
exit;
