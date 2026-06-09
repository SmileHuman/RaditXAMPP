# File: login.php
<?php include 'includes/header.php'; 
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    // hardcoded credentials
    $valid_username = 'admin';
    $valid_password = 'admin123';
    if ($username === $valid_username && $password === $valid_password) {
        echo "<script>alert('Login Berhasil! Selamat datang, $username.'); window.location.href='index.php';</script>";
        exit;
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<div class="container py-5" style="min-height: 75vh;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card bg-dark border-orange">
                <div class="card-body p-5">
                    <h3 class="text-center fw-bold mb-4">Login <span class="text-orange">Member</span></h3>
                    <?php if($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control bg-dark text-light border-orange" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control bg-dark text-light border-orange" required>
                        </div>
                        <button type="submit" class="btn btn-orange w-100">Login</button>
                        <div class="text-center mt-3">Belum punya akun? <a href="register.php" class="text-orange">Daftar di sini</a></div>
                    </form>
                    <div class="mt-3 small text-secondary text-center">Demo: admin / admin123</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>