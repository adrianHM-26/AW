<?php

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_rol']) && $_SESSION['user_rol'] === 'admin';
}

function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: ../usermanager/login.php");
        exit();
    }
}

function requireAdmin() {
    requireLogin();
    if (!isAdmin()) {
        header("Location: ../usermanager/dashboard.php");
        exit();
    }
}
?>