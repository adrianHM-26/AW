<?php
require_once __DIR__ . '/conexion/auth.php';
if (isLoggedIn()) { header("Location: dashboard.php"); exit; }
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
    <h1>Login</h1>

    <?php if ($error): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="procesar_login.php" method="POST" novalidate>
        <label>Email</label><br>
        <input type="email" name="email" required><br><br>

        <label>Contraseña</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <script src="js/validacion.js"></script>
</body>
</html>
