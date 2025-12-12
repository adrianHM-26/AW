<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Login</title>
</head>
<body>
 <h1>Iniciar Sesión</h1>
 <?php 
 if (isset($_SESSION['error'])) {
     echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
     unset($_SESSION['error']);
 }
 ?>
 <form method="POST" action="procesar_login.php">
   <input type="email" name="email" placeholder="Email" required><br>
   <input type="password" name="password" placeholder="Contraseña" required><br>
   <button type="submit">Entrar</button>
 </form>
</body>
</html>


