<?php
require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = limpiar($_POST['email']);
    $password = $_POST['password'];
    
    $sql = "SELECT id, nombre, email, password, rol FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nombre'] = $user['nombre'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_rol'] = $user['rol'];
            
            if ($user['rol'] === 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        }
    }
    
    header("Location: login.php?error=1");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>