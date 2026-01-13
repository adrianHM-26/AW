<?php
require_once '../includes/config.php';

// 1. Eliminar todas las variables de sesión
$_SESSION = array();


// 3. Destruir sesión
session_destroy();

// 4. Redirigir al login
header("Location: login.php");
exit();
?>