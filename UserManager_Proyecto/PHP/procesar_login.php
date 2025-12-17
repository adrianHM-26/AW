<?php
require_once __DIR__ . '/conexion/db.php';
require_once __DIR__ . '/conexion/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($password, $user['password'])) {
    header("Location: login.php?error=" . urlencode("Credenciales incorrectas"));
    exit;
}

$_SESSION['user'] = [
    'id' => $user['id'],
    'nombre' => $user['nombre'],
    'email' => $user['email'],
    'rol' => $user['rol']
];

header("Location: dashboard.php");
exit;
