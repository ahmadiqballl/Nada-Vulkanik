<?php
session_start();
require 'config.php';

if (isset($_SESSION['admin_logged_in'])) {
    header("Location: admin.php");
    exit();
}

if ($_POST) {
    $email = sanitize($_POST['email']);
    $password = md5($_POST['password']);
    
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND role='admin'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $email;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Email atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Nada Vulkanik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-wrap">
        <div class="login-card">
            <div class="card-body">
                <div class="login-brand">
                    <h2>🌋 Nada Vulkanik</h2>
                    <p class="text-muted">Admin Login</p>
                </div>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-login w-100">Login</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <a href="index.php" class="text-muted">Kembali ke Beranda</a>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
