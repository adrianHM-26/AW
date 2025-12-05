<?php
include "db.php";
$id = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id=?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();
if ($_POST) {
 $nombre = $_POST["nombre"];
 $email = $_POST["email"];
 $edad = $_POST["edad"];
 $rol = $_POST["rol"];
 $update = $pdo->prepare("UPDATE usuarios SET nombre=?, email=?, edad=?, rol=? WHERE
id=?");
 $update->execute([$nombre, $email, $edad, $rol, $id]);
 header("Location: list.php");
 exit;
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Editar Usuario</title>
 <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="form-container">
 <h1>Editar Usuario</h1>
 <form method="POST">
 <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required>
 <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
 <input type="number" name="edad" value="<?= $usuario['edad'] ?>" required>
 <select name="rol">
 <option value="user" <?= $usuario['rol']=='user'?'selected':'' ?>>Usuario</option>
 <option value="admin" <?= $usuario['rol']=='admin'?'selected':'' ?>>Administrador</option>
 </select>
 <button class="btn" type="submit">Actualizar</button>
 </form>
</div>
</body>
</html>