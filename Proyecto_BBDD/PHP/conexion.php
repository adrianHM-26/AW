<?php
$host = "localhost";
$user = "adrian";
$pass = "yo";
$db = "proyecto_login";

$conn = new mysqli($host, $user, $pass, $db);

// Mostrar errores si hay problemas de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
