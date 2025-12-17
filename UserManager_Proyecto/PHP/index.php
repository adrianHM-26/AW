<?php
require_once __DIR__ . '/conexion/auth.php';
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Inicio</title></head>
<body>
    <h1>UserManager</h1>

    <?php if (isLoggedIn()): ?>
        <p>Hola, <?= htmlspecialchars(currentUser()['nombre']) ?></p>
        <p><a href="dashboard.php">Dashboard</a></p>
        <?php if (isAdmin()): ?>
            <p><a href="admin/users_list.php">Administrar usuarios</a></p>
        <?php endif; ?>
        <p><a href="logout.php">Cerrar sesión</a></p>
    <?php else: ?>
        <p><a href="login.php">Iniciar sesión</a></p>
        <p><a href="register.php">Registrarse</a></p>
    <?php endif; ?>
</body>
</html>
