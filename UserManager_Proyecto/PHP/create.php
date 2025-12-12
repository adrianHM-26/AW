<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = trim($_POST["nombre"]);
    $email    = trim($_POST["email"]);
    $edad     = $_POST["edad"];
    $rol      = $_POST["rol"]; // 'admin' o 'user'
    $password = $_POST["password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Comprobar si el email ya existe
    $stmt = $pdo->prepare("SELECT id FROM miembros WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $error = "El email ya está registrado";
    } else {
        $stmt = $pdo->prepare("INSERT INTO miembros (nombre,email,edad,rol,password) VALUES (?,?,?,?,?)");
        $stmt->execute([$nombre, $email, $edad, $rol, $passwordHash]);
        header("Location: list.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Usuario</title>
</head>
<body>
 <h1>Crear Usuario</h1>
 <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
 <form method="POST">
   <input type="text" name="nombre" placeholder="Nombre" required><br>
   <input type="email" name="email" placeholder="Email" required><br>
   <input type="number" name="edad" placeholder="Edad" required><br>
   <select name="rol" required>
     <option value="user">Usuario</option>
     <option value="admin">Administrador</option>
   </select><br>
   <input type="password" name="password" placeholder="Contraseña" required><br>
   <button type="submit">Guardar</button>
 </form>
</body>
</html>
