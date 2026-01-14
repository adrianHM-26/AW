<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

if (!isLoggedIn() || !isAdmin()) {
    header("Location: ../usermanager/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario - Admin</title>
  <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <div class="header">
        <div class="container">
            <a href="index.php" class="logo">UserManager - Admin</a>
            <div class="user-info">
                <a href="index.php" class="btn">Lista Usuarios</a>
                <a href="../usermanager/dashboard.php" class="btn">Dashboard</a>
                <a href="logout.php" class="btn btn-red">Salir</a>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h1>Crear Nuevo Usuario</h1>
        
        <?php if (isset($_GET['error'])): 
            $mensajes = [
                'nombre' => 'Nombre muy corto',
                'email' => 'Email inválido',
                'password' => 'Contraseña muy corta',
                'edad' => 'Edad inválida',
                'email_exists' => 'Email ya existe'
            ];
        ?>
        <div class="alert error">
            ❌ <?php echo $mensajes[$_GET['error']] ?? 'Error'; ?>
        </div>
        <?php endif; ?>
        
        <form action="procesar_create.php" method="POST" class="form">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label>Edad:</label>
                <input type="number" name="edad" min="1" max="120" required>
            </div>
            
            <div class="form-group">
                <label>Rol:</label>
                <select name="rol">
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            
            <div class="buttons">
                <button type="submit" class="btn btn-green">Crear Usuario</button>
                <a href="index.php" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>