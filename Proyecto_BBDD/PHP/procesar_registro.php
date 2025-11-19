<?php
// Mostrar errores en pantalla para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "conexion.php";

$usuario  = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

$mensaje = "";
$exito   = false;

if ($usuario !== '' && $password !== '') {
    // Verificar si el usuario ya existe
    $check = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
    $check->bind_param("s", $usuario);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $mensaje = "El nombre de usuario ya está registrado ❌";
    } else {
        // Insertar nuevo usuario
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $usuario, $hash);

        if ($stmt->execute()) {
            $mensaje = "Usuario registrado correctamente 🎉";
            $exito   = true;
        } else {
            $mensaje = "Error inesperado: " . htmlspecialchars($stmt->error);
        }
        $stmt->close();
    }
    $check->close();
} else {
    $mensaje = "Datos incompletos ❌";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Procesar registro</title>
  <link rel="stylesheet" href="/AW/Proyecto_BBDD/CSS/Estilos.css">
</head>
<body class="procesarR">

  <div class="centrarR">
    <h1><?php echo $mensaje; ?></h1>
    <?php if ($exito): ?>
      <p><a href="login.php">Iniciar sesión</a></p>
    <?php else: ?>
      <p><a href="registro.php">Volver al registro</a></p>
    <?php endif; ?>
  </div>

  <div class="Isesion">
    <p>Registro procesado</p>
  </div>

</body>
</html>

