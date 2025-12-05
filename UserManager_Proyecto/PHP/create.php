<?php
include "db.php";
if ($_POST) {
 $nombre = $_POST["nombre"];
 $email = $_POST["email"];
 $edad = $_POST["edad"];
 $rol = $_POST["rol"];
 $stmt = $pdo->prepare("INSERT INTO usuarios (nombre,email,edad,rol) VALUES (?,?,?,?)");
 $stmt->execute([$nombre, $email, $edad, $rol]);
 header("Location: list.php");
 exit;
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Usuario</title>
 <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="form-container">
 <h1>Crear Usuario</h1>
 <form method="POST">
 <input type="text" name="nombre" placeholder="Nombre" required>
 <input type="email" name="email" placeholder="Email" required>
 <input type="number" name="edad" placeholder="Edad" required>
 <select name="rol">
 <option value="user">Usuario</option>
 <option value="admin">Administrador</option>
 </select>
 <button class="btn" type="submit">Guardar</button>
 </form>
</div>
</body>
</html>
