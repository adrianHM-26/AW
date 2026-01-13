<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

// Si ya está logueado, redirigir
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
    <title>UserManager - Login</title>
  <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <div class="page">
        <div class="form-box">
            <h1>Iniciar Sesión</h1>
            
            <?php if (isset($_GET['error'])): ?>
            <div class="alert error">
                Email o contraseña incorrectos
            </div>
            <?php endif; ?>
            
            <form id="loginForm" action="procesar_login.php" method="POST">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="password" required>
                </div>
                
                <button type="submit" class="btn">Entrar</button>
            </form>
            
            <p class="text-center">
                ¿No tienes cuenta? <a href="register.php">Regístrate</a><br>
                <a href="index.php">Volver al inicio</a>
            </p>
        </div>
    </div>
    
    <script src="../js/validation.js"></script>
</body>
</html>