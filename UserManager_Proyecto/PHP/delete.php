<?php
session_start();
include "db.php";

// Comprobar que hay sesión iniciada
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Recoger el id
$id = $_GET["id"] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}

// Ejecutar el borrado
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->execute([$id]);

// Volver al listado
header("Location: list.php");
exit;
