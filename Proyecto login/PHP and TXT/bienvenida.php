<?php
session_start();
if (!isset($_SESSION['usuario'])) {
header("Location: login.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Bienvenida</title>
</head>
<link rel="stylesheet" href="/AW/Proyecto login/CSS/Estilos.css">
<body class="Fbienvenida">
    <div class="Bienvenida">

<h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> 🎉</h1>
</div>
<div class="Btexto">

<p>Has iniciado sesión correctamente.</p>

  </div>
  <div>
<p class="Cerrar"><a href="logout.php">Cerrar sesión</a></p>
<div></div>
</body>
</html>