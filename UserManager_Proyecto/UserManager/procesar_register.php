<?php
require_once '../includes/config.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = limpiar($_POST['nombre']);
    $email = limpiar($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $edad = intval($_POST['edad']);
    
    // Validaciones
    if (strlen($nombre) < 3) {
        header("Location: register.php?error=nombre");
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=email");
        exit();
    }
    
    if (strlen($password) < 6) {
        header("Location: register.php?error=password");
        exit();
    }
    
    if ($password !== $confirm_password) {
        header("Location: register.php?error=confirm");
        exit();
    }
    
    if ($edad < 1 || $edad > 120) {
        header("Location: register.php?error=edad");
        exit();
    }
    
    // Verificar email
    $sql_check = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql_check);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        header("Location: register.php?error=email_exists");
        exit();
    }
    
    // Hash contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insertar
    $sql_insert = "INSERT INTO users (nombre, email, password, edad, rol) VALUES (?, ?, ?, ?, 'user')";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("sssi", $nombre, $email, $hashed_password, $edad);
    
    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;
        
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_nombre'] = $nombre;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_rol'] = 'user';
        
        header("Location: welcome.php");
        exit();
    } else {
        die("Error: " . $conn->error);
    }
} else {
    header("Location: register.php");
    exit();
}
?>