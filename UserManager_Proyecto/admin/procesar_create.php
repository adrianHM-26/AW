<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

if (!isLoggedIn() || !isAdmin()) {
    header("Location: ../usermanager/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = limpiar($_POST['nombre']);
    $email = limpiar($_POST['email']);
    $password = $_POST['password'];
    $edad = intval($_POST['edad']);
    $rol = $_POST['rol'];
    
    // Validaciones
    if (strlen($nombre) < 3) {
        header("Location: create.php?error=nombre");
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: create.php?error=email");
        exit();
    }
    
    if (strlen($password) < 6) {
        header("Location: create.php?error=password");
        exit();
    }
    
    if ($edad < 1 || $edad > 120) {
        header("Location: create.php?error=edad");
        exit();
    }
    
    // Verificar email
    $sql_check = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql_check);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        header("Location: create.php?error=email_exists");
        exit();
    }
    
    // Hash
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insertar
    $sql = "INSERT INTO users (nombre, email, password, edad, rol) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $nombre, $email, $hashed_password, $edad, $rol);
    
    if ($stmt->execute()) {
        header("Location: index.php?success=created");
        exit();
    } else {
        header("Location: create.php?error=email_exists");
        exit();
    }
} else {
    header("Location: create.php");
    exit();
}
?>