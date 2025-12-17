<?php
require_once __DIR__ . '/conexion/auth.php';
session_unset();
session_destroy();
header("Location: index.php");
exit;
