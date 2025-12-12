<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>UserManager</title>
</head>
<body>
  <h1>Gestión de Usuarios</h1>
  <ul>
    <li><a href="list.php">📋 Listar Usuarios</a></li>
    <li><a href="create.php">➕ Registrarse</a></li>
    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
      <li><a href="list.php">✏️ Modificar Usuario</a></li>
      <li><a href="list.php">🗑️ Eliminar Usuario</a></li>
    <?php endif; ?>
    <?php if (isset($_SESSION['nombre'])): ?>
      <li>👤 Bienvenido <?= $_SESSION['nombre'] ?> (<?= $_SESSION['rol'] ?>)</li>
      <li><a href="logout.php">Cerrar Sesión</a></li>
    <?php else: ?>
      <li><a href="login.php">Iniciar Sesión</a></li>
    <?php endif; ?>
  </ul>
</body>
</html>