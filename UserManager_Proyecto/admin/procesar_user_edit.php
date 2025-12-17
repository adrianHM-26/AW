<?php
require_once __DIR__ . '/../conexion/db.php';
require_once __DIR__ . '/../conexion/auth.php';
requireAdmin();

$id = $_POST['id'];
$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$edad = trim($_POST['edad']);
$password = $_POST['password'];
$rol = $_POST['rol'];

if ($password !== "") {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE users SET nombre=?, email=?, edad=?, password=?, rol=? WHERE id=?");
    $stmt->execute([$nombre, $email, $edad, $hash, $rol, $id]);
} else {
    $stmt = $pdo->prepare("UPDATE users SET nombre=?, email=?, edad=?, rol=? WHERE id=?");
    $stmt->execute([$nombre, $email, $edad, $rol, $id]);
}

header("Location: users_list.php");
exit;
