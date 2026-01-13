<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Registro</title>
 <link rel="stylesheet" href="/AW/Proyecto_BBDD/CSS/Estilos.css">
</head>
<body class="fondo">
 <div class="titulo">
   <h1>Registro de usuario</h1>
 </div>
 <div class="Creacion">
   <form action="procesar_registro.php" method="post">
     <label>Usuario:</label>
     <input type="text" name="usuario" required><br><br>
     <label>Contraseña:</label>
     <input type="password" name="password" required><br><br>
     <button  id="boton" class="boton" type="submit">Registrarse</button>
   </form>

<script>
  const boton = document.getElementById("boton");
  boton.addEventListener("mouseover", () => {
    boton.style.boxShadow = "0 0 10px #2a5fd1ff";
  });
  boton.addEventListener("mouseout", () => {
    boton.style.boxShadow = "none";
  });
</script>

   <p class="inicio">¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
 </div>
</body>
</html>
