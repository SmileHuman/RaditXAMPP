<?php 
$page_title = "Register - Fenic Store";
include 'includes/header.php';

$success_message = '';
$error_message = '';

// Proses registrasi (hanya simulasi, tanpa database)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validasi sederhana
    if (empty($fullname) || empty($email) || empty($username) || empty($password)) {
        $error_message = 'Semua field harus diisi!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Email tidak valid!';
    } elseif (strlen($password) < 6) {
        $error_message = 'Password minimal 6 karakter!';
    } elseif ($password !== $confirm_password) {
        $error_message = 'Konfirmasi password tidak cocok!';
    } else {
        // Simulasi registrasi berhasil (data disimpan ke session sementara)
        $_SESSION['temp_registration'] = [
            'fullname' => $fullname,
            'email' => $email,
            'username' => $username
        ];
        $success_message = 'Registrasi berhasil! Silakan login.';
        
        // Redirect setelah 2 detik
        echo "<script>
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 2000);
        </script>";
    }
}
?>

<style>

</style>

<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5">
        <div class="register-card">
            <div class="register-header">
                <i class="fas fa-user-plus fa-3x text-black"></i>
                <h3 class="mt-2">Daftar Akun Baru</h3>
                <p class="text-black mb-0">Bergabung bersama Fenic Store</p>
            </div>
            <div class="register-body">
                <?php if ($success_message): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i><?= $success_message ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if ($error_message): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i><?= $error_message ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="mb-3 input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3 input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3 input-icon">
                        <i class="fas fa-user-circle"></i>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3 input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control" name="password" placeholder="Password (min. 6 karakter)" required>
                    </div>
                    <div class="mb-3 input-icon">
                        <i class="fas fa-check-circle"></i>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi Password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label text-white-50 terms" for="terms">
                            Saya setuju dengan <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-register w-100">
                        <i class="fas fa-user-plus me-2"></i>Daftar
                    </button>
                </form>
                
                <div class="text-center mt-4">
                    <p class="text-white-50">Sudah punya akun?</p>
                    <a href="login.php" class="btn btn-outline-orange-red w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>Login Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>