<?php
session_start();

function login($username, $password) {
    // Database connection
    require_once '../config/database.php';
    global $conn;

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM members WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
    }
    return false;
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUser() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}
?>