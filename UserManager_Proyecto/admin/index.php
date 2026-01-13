<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

if (!isLoggedIn()) {
    header("Location: ../usermanager/login.php");
    exit();
}

if (!isAdmin()) {
    header("Location: ../usermanager/dashboard.php");
    exit();
}

$sql = "SELECT id, nombre, email, edad, rol FROM users ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - UserManager</title>
     <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <div class="header">
        <div class="container">
            <a href="index.php" class="logo">UserManager - Admin</a>
            <div class="user-info">
                <?php echo htmlspecialchars($_SESSION['user_nombre']); ?>
                <a href="../usermanager/dashboard.php" class="btn">Dashboard</a>
                <a href="logout.php" class="btn btn-red">Salir Admin</a> <!-- CAMBIADO -->
            </div>
        </div>
    </div>
    
    <div class="container">
        <h1>Panel de Administración</h1>
        
        <?php if (isset($_GET['success'])): ?>
        <div class="alert success">
            ✅ <?php 
            if ($_GET['success'] == 'created') echo 'Usuario creado';
            elseif ($_GET['success'] == 'updated') echo 'Usuario actualizado';
            elseif ($_GET['success'] == 'deleted') echo 'Usuario eliminado';
            ?>
        </div>
        <?php endif; ?>
        
        <div class="buttons">
            <a href="create.php" class="btn btn-green">Crear Usuario</a>
            <a href="../usermanager/dashboard.php" class="btn">Volver</a>
        </div>
        
        <h2>Usuarios Registrados</h2>
        
        <?php if ($result->num_rows > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Edad</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($usuario = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td><?php echo $usuario['edad']; ?></td>
                        <td>
                            <span class="badge <?php echo $usuario['rol']; ?>">
                                <?php echo $usuario['rol']; ?>
                            </span>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-small">Editar</a>
                            <a href="delete.php?id=<?php echo $usuario['id']; ?>" 
                               class="btn btn-small btn-red"
                               onclick="return confirm('¿Eliminar?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay usuarios.</p>
        <?php endif; ?>
    </div>
</body>
</html>