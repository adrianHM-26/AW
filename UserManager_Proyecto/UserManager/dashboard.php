<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - UserManager</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <div class="header">
        <div class="container">
            <a href="dashboard.php" class="logo">UserManager</a>
            <div class="user-info">
                <?php echo htmlspecialchars($_SESSION['user_nombre']); ?>
                <span class="badge <?php echo $_SESSION['user_rol']; ?>">
                    <?php echo $_SESSION['user_rol']; ?>
                </span>
                <a href="logout.php" class="btn btn-red">Salir</a>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h1>Dashboard</h1>
        <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_nombre']); ?>!</p>
        
        <div class="card">
            <h2>Tu información</h2>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_SESSION['user_nombre']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
            <p><strong>Rol:</strong> <?php echo htmlspecialchars($_SESSION['user_rol']); ?></p>
            
            <?php
            $sql = "SELECT edad FROM users WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($user_data = $result->fetch_assoc()) {
                echo "<p><strong>Edad:</strong> " . $user_data['edad'] . " años</p>";
            }
            ?>
        </div>
        
        <div class="buttons">
            <?php if (isAdmin()): ?>
                <a href="../admin/index.php" class="btn btn-blue">Panel de Admin</a>
            <?php endif; ?>
            <a href="index.php" class="btn">Inicio</a>
        </div>
    </div>
</body>
</html>