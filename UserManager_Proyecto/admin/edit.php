<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

if (!isLoggedIn() || !isAdmin()) {
    header("Location: ../usermanager/login.php");
    exit();
}

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if (!$usuario) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = limpiar($_POST['nombre']);
    $email = limpiar($_POST['email']);
    $edad = intval($_POST['edad']);
    $rol = $_POST['rol'];
    
    $sql_update = "UPDATE users SET nombre=?, email=?, edad=?, rol=? WHERE id=?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("ssisi", $nombre, $email, $edad, $rol, $id);
    
    if ($stmt->execute()) {
        header("Location: index.php?success=updated");
        exit();
    } else {
        $error = $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - Admin</title>
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
        <h1>Editar Usuario</h1>
        
        <?php if (isset($error)): ?>
        <div class="alert error">❌ Error: <?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" class="form">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Edad:</label>
                <input type="number" name="edad" value="<?php echo $usuario['edad']; ?>" min="1" max="120" required>
            </div>
            
            <div class="form-group">
                <label>Rol:</label>
                <select name="rol">
                    <option value="user" <?php echo $usuario['rol'] == 'user' ? 'selected' : ''; ?>>Usuario</option>
                    <option value="admin" <?php echo $usuario['rol'] == 'admin' ? 'selected' : ''; ?>>Administrador</option>
                </select>
            </div>
            
            <div class="buttons">
                <button type="submit" class="btn btn-blue">Actualizar</button>
                <a href="index.php" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>