<?php
require_once __DIR__ . '/../config/functions.php';

if (isLoggedIn()) {
    header('Location: /index.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = 'Email and password are required';
    } else {
        global $conn;
        $stmt = $conn->prepare("SELECT id, email, username, password, role FROM users WHERE email = ? AND status = 'active'");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (verifyPassword($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                logActivity($user['id'], 'LOGIN', 'User logged in');
                
                if ($user['role'] === 'admin') {
                    header('Location: /admin/dashboard.php');
                } elseif ($user['role'] === 'cashier') {
                    header('Location: /cashier/dashboard.php');
                } else {
                    header('Location: /index.php');
                }
                exit();
            } else {
                $error = 'Invalid password';
            }
        } else {
            $error = 'User not found';
        }
    }
}

$pageTitle = 'Login';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - B.L.I.S.S Bakehouse & Cafe</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 40px;
            background-color: var(--light-color);
            border-radius: 10px;
            box-shadow: var(--shadow);
        }
        .login-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--accent-color);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .login-footer {
            text-align: center;
            margin-top: 20px;
        }
        .login-footer a {
            color: var(--accent-color);
            text-decoration: none;
        }
        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../includes/navbar.php'; ?>
    
    <div class="login-container">
        <h1>Login</h1>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-error">⚠️ <?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn" style="width: 100%;">Login</button>
            
            <div class="login-footer">
                <p>Don't have an account? <a href="/pages/register.php">Register here</a></p>
            </div>
        </form>
        
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border-color);">
            <p style="text-align: center; color: #666; font-size: 14px; margin-bottom: 10px;">Demo Credentials:</p>
            <p style="font-size: 13px;"><strong>Admin:</strong> admin@bliss.com / admin123</p>
            <p style="font-size: 13px;"><strong>Cashier:</strong> cashier@bliss.com / cashier123</p>
        </div>
    </div>
    
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
