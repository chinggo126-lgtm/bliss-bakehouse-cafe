<?php
require_once __DIR__ . '/../config/functions.php';

if (isLoggedIn()) {
    $user_id = $_SESSION['user_id'];
    logActivity($user_id, 'LOGOUT', 'User logged out');
}

session_destroy();
header('Location: /index.php');
exit();
?>