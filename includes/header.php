<!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <i class="fas fa-store"></i>
                <span>KaryaLokal</span>
            </div>
            <div class="nav-menu" id="navMenu">
                <a href="#home" class="nav-link active">Beranda</a>
                <a href="#products" class="nav-link">Produk</a>
                <a href="#umkm" class="nav-link">UMKM</a>
                <a href="#about" class="nav-link">Tentang</a>
                <a href="#contact" class="nav-link">Kontak</a>
                <?php if(isLoggedIn()): ?>
                    <a href="admin.php" class="nav-link">Dashboard</a>
                    <a href="?logout=1" class="nav-link">Logout</a>
                <?php else: ?>
                    <a href="admin.php" class="nav-link btn-login">Login UMKM</a>
                <?php endif; ?>
            </div>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>