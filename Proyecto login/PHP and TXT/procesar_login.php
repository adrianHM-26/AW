<?php
session_start();
$usuario = $_POST['usuario'];
$password = $_POST['password'];
// Leer archivo de usuarios
$usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
$login_exitoso = false;
foreach ($usuarios as $linea) {
list($user, $hash) = explode(":", $linea);
if ($user === $usuario && password_verify($password, $hash)) {
$login_exitoso = true;
$_SESSION['usuario'] = $usuario;
break;
}
}
if ($login_exitoso) {
header("Location: bienvenida.php");
exit;
} else {

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/AW/Proyecto login/CSS/Estilos.css">
</head>
<body class="fondoPL">
<div>

<h1 class="centrarPL">Usuario o contraseña incorrectos</h1>
</div>
<div>
<p class="IsesionPL"><a href='login.php'>Volver a intentar</a></p>
</div>

</body>
</html>