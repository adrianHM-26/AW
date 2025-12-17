<?php
require_once __DIR__ . '/../conexion/db.php';
require_once __DIR__ . '/../conexion/auth.php';
requireAdmin();

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Editar usuario</title></head>
<body>
    <h1>Editar usuario</h1>

    <form action="procesar_user_edit.php" method="POST" novalidate>
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <label>Nombre</label><br>
        <input type="text" name="nombre" value="<?= $user['nombre'] ?>" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="<?= $user['email'] ?>" required><br><br>

        <label>Edad</label><br>
        <input type="number" name="edad" value="<?= $user['edad'] ?>" required><br><br>

        <label>Nueva contraseña (opcional)</label><br>
        <input type="password" name="password"><br><br>

        <label>Rol</label><br>
        <select name="rol">
            <option value="user" <?= $user['rol']=='user'?'selected':'' ?>>Usuario</option>
            <option value="admin" <?= $user['rol']=='admin'?'selected':'' ?>>Administrador</option>
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <script src="../js/validacion.js"></script>
</body>
</html>
