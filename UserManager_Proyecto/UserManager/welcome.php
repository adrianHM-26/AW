<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - UserManager</title>
  <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <div class="page">
        <div class="form-box">
            <h1>¡Bienvenido!</h1>
            <p>Hola <strong><?php echo htmlspecialchars($_SESSION['user_nombre']); ?></strong>,</p>
            <p>Tu registro se ha completado exitosamente.</p>
            
            <div class="buttons">
                <a href="dashboard.php" class="btn">Ir al Dashboard</a>
                <a href="index.php" class="btn btn-gray">Volver al Inicio</a>
            </div>
        </div>
    </div>
</body>
</html>