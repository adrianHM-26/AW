<?php
require_once __DIR__ . '/../conexion/db.php';
require_once __DIR__ . '/../conexion/auth.php';
requireAdmin();

$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$edad = trim($_POST['edad']);
$password = $_POST['password'];
$rol = $_POST['rol'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (nombre, email, edad, password, rol) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$nombre, $email, $edad, $hash, $rol]);

header("Location: users_list.php");
exit;
