<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

// Solo redirigir si ya está logueado
if (isLoggedIn()) {
    if (isAdmin()) {
        header("Location: ../admin/index.php");
        exit();
    } else {
        header("Location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserManager - Inicio</title>
  <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <div class="page">
        <div class="form-box">
            <h1>UserManager</h1>
            <p>Sistema de gestión de usuarios</p>
            
            <div class="buttons">
                <a href="login.php" class="btn">Iniciar Sesión</a>
                <a href="register.php" class="btn btn-blue">Registrarse</a>
            </div>
            
            <div class="info">
                <h3>Usuario Administrador:</h3>
                <p>Email: admin@system.com</p>
                <p>Contraseña: hola</p>
            </div>
        </div>
    </div>
</body>
</html>