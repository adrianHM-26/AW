<?php
require_once __DIR__ . '/conexion/db.php';

$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$edad = trim($_POST['edad'] ?? '');
$password = $_POST['password'] ?? '';
$password2 = $_POST['password2'] ?? '';

if ($password !== $password2) {
    header("Location: register.php?error=" . urlencode("Las contraseñas no coinciden"));
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (nombre, email, edad, password, rol) VALUES (?, ?, ?, ?, 'user')");
$stmt->execute([$nombre, $email, $edad, $hash]);

header("Location: login.php");
exit;
