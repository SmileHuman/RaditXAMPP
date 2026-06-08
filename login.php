<?php 
session_start();
$page_title = "Login - Fenic Store";

// Cek jika sudah login, redirect ke members.php
if (isset($_SESSION['username'])) {
    header('Location: members.php');
    exit();
}

$error_message = '';

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Hardcoded credentials
    $valid_username = 'admin';
    $valid_password = 'admin123';
    
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = date('Y-m-d H:i:s');
        header('Location: members.php');
        exit();
    } else {
        $error_message = 'Username atau password salah! (Gunakan admin / admin123)';
    }
}

include 'includes/header.php';
?>

<style>

</style>

<div class="row justify-content-center align-items-center min-vh-80" style="min-height: 70vh;">
    <div class="col-md-5 col-lg-4">
        <div class="login-card">
            <div class="login-header">
                <i class="fas fa-dumbbell fa-3x text-black"></i>
                <i class="fas fa-capsules fa-3x text-black ms-2"></i>
                <h3 class="mt-2">Login Fenic Store</h3>
            </div>
            <div class="login-body">
                <?php if ($error_message): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i><?= $error_message ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="mb-3 input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    </div>
                    <div class="mb-3 input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label text-white-50" for="remember">Ingat saya</label>
                    </div>
                    <button type="submit" class="btn btn-login w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>Masuk
                    </button>
                </form>
                
                <div class="divider my-4">
                    <span>atau</span>
                </div>
                
                <div class="text-center">
                    <p class="text-white-50">Belum punya akun?</p>
                    <a href="register.php" class="btn btn-outline-orange-red w-100">
                        <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                    </a>
                </div>
                
                <div class="text-center mt-3">
                    <small class="text-muted">Demo: admin / admin123</small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>