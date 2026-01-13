<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

if (!isLoggedIn() || !isAdmin()) {
    header("Location: ../usermanager/login.php");
    exit();
}

$id = $_GET['id'] ?? 0;

if ($id <= 0) {
    header("Location: index.php");
    exit();
}

// No permitir eliminarse a sí mismo
if ($id == $_SESSION['user_id']) {
    header("Location: index.php?error=self_delete");
    exit();
}

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php?success=deleted");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>