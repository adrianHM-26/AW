<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

if (isLoggedIn()) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserManager - Registro</title>
  <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <div class="page">
        <div class="form-box">
            <h1>Crear Cuenta</h1>
            
            <?php if (isset($_GET['error'])): 
                $error = $_GET['error'];
                $message = '';
                
                if ($error == 'nombre') $message = 'Nombre muy corto (mínimo 3 letras)';
                elseif ($error == 'email') $message = 'Email inválido';
                elseif ($error == 'password') $message = 'Contraseña muy corta (mínimo 6 caracteres)';
                elseif ($error == 'confirm') $message = 'Las contraseñas no coinciden';
                elseif ($error == 'edad') $message = 'Edad debe ser entre 1 y 120 años';
                elseif ($error == 'email_exists') $message = 'Este email ya está registrado';
                else $message = 'Error en el registro';
            ?>
            <div class="alert error">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>
            
            <form id="registerForm" action="procesar_register.php" method="POST">
                <div class="form-group">
                    <label>Nombre completo:</label>
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
                    <label>Confirmar contraseña:</label>
                    <input type="password" name="confirm_password" required>
                </div>
                
                <div class="form-group">
                    <label>Edad:</label>
                    <input type="number" name="edad" min="1" max="120" required>
                </div>
                
                <button type="submit" class="btn">Registrarse</button>
            </form>
            
            <p class="text-center">
                ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a><br>
                <a href="index.php">Volver al inicio</a>
            </p>
        </div>
    </div>
    
    <script src="../js/validation.js"></script>
</body>
</html>