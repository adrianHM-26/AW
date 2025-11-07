<?php
$usuario = $_POST['usuario'];
$password = $_POST['password'];
// Guardamos en un archivo de texto (usuario:contraseña encriptada)
$file = fopen("usuarios.txt", "a");
fwrite($file, $usuario . ":" . password_hash($password, PASSWORD_DEFAULT) . "\n");
fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/AW/Proyecto login/CSS/Estilos.css">
</head>
<body class="procesarR">

<div class="centrarR">
<h1>Usuario registrado correctamente</h1>
</div>
<div class="Isesion">
<p><a href='login.php'>Iniciar sesión</a></p>
</div>
</body>
</html>
