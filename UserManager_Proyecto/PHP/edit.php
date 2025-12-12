<?php
include "db.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header("Location: list.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = trim($_POST["nombre"]);
    $email    = trim($_POST["email"]);
    $edad     = $_POST["edad"];
    $rol      = $_POST["rol"];
    $password = $_POST["password"];

    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE usuarios SET nombre=?, email=?, edad=?, rol=?, password=? WHERE id=?");
        $stmt->execute([$nombre, $email, $edad, $rol, $passwordHash, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE usuarios SET nombre=?, email=?, edad=?, rol=? WHERE id=?");
        $stmt->execute([$nombre, $email, $edad, $rol, $id]);
    }

    header("Location: list.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Editar Usuario</title>
</head>
<body>
 <h1>Editar Usuario</h1>
 <form method="POST">
   <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required><br>
   <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br>
   <input type="number" name="edad" value="<?= htmlspecialchars($usuario['edad']) ?>" required><br>
   <select name="rol">
     <option value="user" <?= $usuario['rol'] === 'user' ? 'selected' : '' ?>>Usuario</option>
     <option value="admin" <?= $usuario['rol'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
   </select><br>
   <input type="password" name="password" placeholder="Nueva contraseña (opcional)"><br>
   <button type="submit">Guardar cambios</button>
 </form>
</body>
</html>
