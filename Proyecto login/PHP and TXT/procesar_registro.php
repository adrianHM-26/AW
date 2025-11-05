<?php
$usuario = $_POST['usuario'];
$password = $_POST['password'];
// Guardamos en un archivo de texto (usuario:contraseña encriptada)
$file = fopen("usuarios.txt", "a");
fwrite($file, $usuario . ":" . password_hash($password, PASSWORD_DEFAULT) . "\n");
fclose($file);
echo "<h1>Usuario registrado correctamente</h1>";
echo "<p><a href='login.php'>Iniciar sesión</a></p>";
