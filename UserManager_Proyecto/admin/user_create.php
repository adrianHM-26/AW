<?php
require_once __DIR__ . '/../conexion/auth.php';
requireAdmin();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Crear usuario</title></head>
<body>
    <h1>Crear usuario</h1>

    <form action="procesar_user_create.php" method="POST" novalidate>
        <label>Nombre</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" required><br><br>

        <label>Edad</label><br>
        <input type="number" name="edad" required><br><br>

        <label>Contraseña</label><br>
        <input type="password" name="password" required><br><br>

        <label>Rol</label><br>
        <select name="rol">
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select><br><br>

        <button type="submit">Guardar</button>
    </form>

    <script src="../js/validacion.js"></script>
</body>
</html>
