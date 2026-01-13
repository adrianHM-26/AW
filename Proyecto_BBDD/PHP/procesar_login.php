<?php
session_start();
include "conexion.php";

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

$mensaje = "";
$link = "";
if ($usuario !== '' && $password !== '') {
    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hash);
        $stmt->fetch();
        if (password_verify($password, $hash)) {
            $_SESSION['usuario'] = $usuario;
            $stmt->close();
            $conn->close();
            header("Location: bienvenida.php");
            exit;
        } else {
            $mensaje = "Contraseña incorrecta ❌";
            $link = "<a href='login.php'>Volver a intentar</a>";
        }
    } else {
        $mensaje = "Usuario no encontrado ❌";
        $link = "<a href='registro.php'>Registrarse</a>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Procesar login</title>
  <link rel="stylesheet" href="/AW/Proyecto_BBDD/CSS/Estilos.css">
</head>
<body class="fondoPL">

  <div class="centrarPL">
    <h1><?php echo $mensaje; ?></h1>
    <p><?php echo $link; ?></p>
  </div>

  <div class="IsesionPL">
    <p>Procesando login...</p>
  </div>

</body>
</html>
