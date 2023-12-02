<?php


$users = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation (add more as needed)
    if (empty($username) || empty($password)) {
        echo json_encode(['error' => 'Invalid username or password']);
    } else {
        // Store user data (replace with database logic)
        $users[] = ['username' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT)];
        echo json_encode(['success' => 'User registered successfully']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Find user (replace with database logic)
    $user = array_filter($users, function ($u) use ($username) {
        return $u['username'] === $username;
    });

    if (empty($user)) {
        echo json_encode(['error' => 'User not found']);
    } else {
        $hashedPassword = reset($user)['password'];

        if (password_verify($password, $hashedPassword)) {
            echo json_encode(['success' => 'Login successful']);
        } else {
            echo json_encode(['error' => 'Invalid password']);
        }
    }
}
?>
