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

// Destruir sesión
session_destroy();

// Redirigir al login principal
header("Location: ../UserManager/login.php?");
exit();
?>