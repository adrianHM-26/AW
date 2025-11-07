<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Iniciar sesión</title>
</head>
<link rel="stylesheet" href="/AW/Proyecto login/CSS/Estilos.css">
<body class="loginFondo">
    
    <div class="loginT">
 <h1 >Login</h1>
 </div>

 <div class="loginCrear">

 <form action="procesar_login.php" method="post">
 <label>Usuario:</label>
 <input type="text" name="usuario" required><br><br>
 <label>Contraseña:</label>
 <input type="password" name="password" required><br><br>
 <button class="button" type="submit">Entrar</button>
 </form>

 </div>
 <div class="crearCuenta">


 <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>

  </div>
</body>
</html>