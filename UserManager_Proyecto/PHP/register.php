<?php
require_once __DIR__ . '/conexion/auth.php';
if (isLoggedIn()) { header("Location: dashboard.php"); exit; }
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Registro</title></head>
<body>
    <h1>Registro</h1>

    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="procesar_register.php" method="POST" novalidate>
        <label>Nombre</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" required><br><br>

        <label>Edad</label><br>
        <input type="number" name="edad" required><br><br>

        <label>Contraseña</label><br>
        <input type="password" name="password" required><br><br>

        <label>Repetir contraseña</label><br>
        <input type="password" name="password2" required><br><br>

        <button type="submit">Registrarse</button>
    </form>

    <script src="js/validacion.js"></script>
</body>
</html>
