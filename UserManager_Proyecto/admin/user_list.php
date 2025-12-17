<?php
require_once __DIR__ . '/../conexion/db.php';
require_once __DIR__ . '/../conexion/auth.php';
requireAdmin();

$stmt = $pdo->query("SELECT * FROM users ORDER BY id ASC");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Usuarios</title></head>
<body>
    <h1>Usuarios</h1>

    <p><a href="../dashboard.php">Volver</a></p>
    <p><a href="user_create.php">Crear usuario</a></p>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th><th>Nombre</th><th>Email</th><th>Edad</th><th>Rol</th><th>Acciones</th>
        </tr>

        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['nombre'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['edad'] ?></td>
                <td><?= $u['rol'] ?></td>
                <td>
                    <a href="user_edit.php?id=<?= $u['id'] ?>">Editar</a>
                    <?php if ($u['id'] != currentUser()['id']): ?>
                        | <a href="procesar_user_delete.php?id=<?= $u['id'] ?>">Eliminar</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
