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
 <link rel="stylesheet" href="/AW/Proyecto_BBDD/CSS/Estilos.css">
</head>
<body class="Fbienvenida">

 <div class="Bienvenida">
   <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> 🎉</h1>
 </div>
 
 <div class="Btexto">
   <p>Has iniciado sesión correctamente.</p>
 </div>

 <div class="Cerrar">
   <p><a href="logout.php">Cerrar sesión</a></p>
 </div>
</body>
</html>
