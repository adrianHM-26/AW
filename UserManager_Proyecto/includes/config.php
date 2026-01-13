<?php

// 1. Iniciar sesión SIEMPRE al principio
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Conexión a BD
$conn = new mysqli("localhost", "adrian", "yo", "user_manager_system");

if ($conn->connect_error) {
    die("Error BD: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

// 3. Función para limpiar
function limpiar($dato) {
    global $conn;
    return $conn->real_escape_string(trim($dato));
}
?>