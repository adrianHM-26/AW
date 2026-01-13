<?php

// Incluir config primero para tener sesión
require_once __DIR__ . '/../includes/config.php';

// Verificar que está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../usermanager/login.php");
    exit();
}

// Destruir sesión completamente
$_SESSION = array();

// Si se usa cookie de sesión, borrarla
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruir sesión
session_destroy();

// Redirigir al login principal
header("Location: ../UserManager/login.php?");
exit();
?>