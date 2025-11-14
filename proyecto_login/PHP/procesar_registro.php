<?php
include "conexion.php";

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

$mensaje = "";
$exito = false;

if ($usuario !== '' && $password !== '') {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $hash);

    if ($stmt->execute()) {
        $mensaje = "Usuario registrado correctamente 🎉";
        $exito = true;
    } else {
        if ($stmt->errno === 1062) {
            $mensaje = "Error: el usuario ya existe ❌";
        } else {
            $mensaje = "Error inesperado: " . htmlspecialchars($stmt->error);
        }
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Procesar registro</title>
  <link rel="stylesheet" href="/AW/Proyecto login/CSS/Estilos.css">
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

