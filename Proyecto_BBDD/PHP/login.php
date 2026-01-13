<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Login</title>
 <link rel="stylesheet" href="/AW/Proyecto_BBDD/CSS/Estilos.css">
</head>
<body class="loginFondo">
 <div class="loginT">
   <h1>Iniciar sesión</h1>
 </div>
 <div class="loginCrear">
   <form action="procesar_login.php" method="post">
     <label>Usuario:</label>
     <input type="text" name="usuario" required><br><br>
     <label>Contraseña:</label>
     <input type="password" name="password" required><br><br>
     <button id="button" class="button" type="submit">Entrar</button>
   </form>
   <p class="crearCuenta">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
 </div>
 <script>
  const boton = document.getElementById("button");
  boton.addEventListener("mouseover", () => {
    boton.style.boxShadow = "0 0 10px #1152dfff";
  });
  boton.addEventListener("mouseout", () => {
    boton.style.boxShadow = "none";
  });
</script>
</body>
</html>
