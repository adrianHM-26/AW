<?php
$host = "localhost";
$dbname = "gestion_usuarios";
$user = "adrian";
$pass = "yo";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión correcta";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

