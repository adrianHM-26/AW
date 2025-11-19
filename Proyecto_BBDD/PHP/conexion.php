<?php
$host = "localhost";
$user = "adrian"; // o el usuario que hayas creado
$pass = "yo";     // o la contraseña que hayas asignado
$db = "proyecto_login";

$conn = new mysqli($host, $user, $pass, $db);

// Mostrar errores si hay problemas de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
