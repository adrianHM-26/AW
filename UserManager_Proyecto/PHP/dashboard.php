<?php
require_once __DIR__ . '/conexion/auth.php';
requireLogin();
$user = currentUser();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Dashboard</title></head>
<body>
    <h1>Dashboard</h1>

    <p>Bienvenido, <?= htmlspecialchars($user['nombre']) ?></p>

    <?php if (isAdmin()): ?>
        <p><a href="admin/users_list.php">Administrar usuarios</a></p>
    <?php endif; ?>

    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
