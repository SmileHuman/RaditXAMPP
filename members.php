<?php 
session_start();
$page_title = "Dashboard Member - Fenic Store";

// Cek apakah sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include 'includes/header.php';
?>

<style>
.dashboard-stats {
    background: linear-gradient(135deg, #1a1a1a 0%, #222 100%);
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    transition: transform 0.3s;
}

.dashboard-stats:hover {
    transform: translateY(-5px);
}

.stat-icon {
    font-size: 2.5rem;
    color: var(--orange-red);
    margin-bottom: 1rem;
}

.stat-number {
    font-size: 2rem;
    font-weight: bold;
    color: white;
}

.stat-label {
    color: #888;
    font-size: 0.9rem;
}

.welcome-card {
    background: linear-gradient(135deg, #FF4500 0%, #D03C00 100%);
    border-radius: 15px;
    padding: 2rem;
    color: black;
}

.activity-item {
    background: #1a1a1a;
    border-radius: 10px;
    padding: 1rem;
    margin-bottom: 1rem;
    transition: all 0.3s;
}

.activity-item:hover {
    background: #222;
    transform: translateX(5px);
}

.activity-icon {
    width: 40px;
    height: 40px;
    background: var(--orange-red);
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
}

.progress-gym {
    height: 10px;
    border-radius: 5px;
}

.progress-gym .progress-bar {
    background-color: var(--orange-red);
    border-radius: 5px;
}

.membership-badge {
    background: rgba(255,69,0,0.2);
    border: 1px solid var(--orange-red);
    border-radius: 20px;
    padding: 0.25rem 1rem;
    display: inline-block;
    font-size: 0.8rem;
}
</style>

<!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="welcome-card">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h2 class="mb-1">
                        <i class="fas fa-dumbbell me-2"></i>
                        Selamat Datang, <?= htmlspecialchars($_SESSION['username']) ?>!
                    </h2>
                    <p class="mb-0">Teruslah berlatih dan raih target kebugaranmu bersama Fenic Store</p>
                </div>
                <div class="mt-2 mt-md-0">
                    <span class="membership-badge">
                        <i class="fas fa-crown me-1"></i> Member Premium
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistik Dashboard -->
<div class="row g-4 mb-5">
    <div class="col-md-3 col-6">
        <div class="dashboard-stats">
            <div class="stat-icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="stat-number" id="totalOrders">0</div>
            <div class="stat-label">Total Pesanan</div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="dashboard-stats">
            <div class="stat-icon">
                <i class="fas fa-fire"></i>
            </div>
            <div class="stat-number" id="totalCalories">1,250</div>
            <div class="stat-label">Kalori Terbakar</div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="dashboard-stats">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-number" id="totalHours">24</div>
            <div class="stat-label">Jam Latihan</div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="dashboard-stats">
            <div class="stat-icon">
                <i class="fas fa-trophy"></i>
            </div>
            <div class="stat-number" id="achievements">3</div>
            <div class="stat-label">Pencapaian</div>
        </div>
    </div>
</div>

<!-- Progress Latihan & Aktivitas Terbaru -->
<div class="row g-4">
    <div class="col-md-6">
        <div class="card bg-black border-orange-red">
            <div class="card-header bg-orange-red text-black fw-bold">
                <i class="fas fa-chart-line me-2"></i>Progress Latihan
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Target Mingguan</span>
                        <span class="text-orange-red">70%</span>
                    </div>
                    <div class="progress progress-gym">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Konsumsi Suplemen</span>
                        <span class="text-orange-red">85%</span>
                    </div>
                    <div class="progress progress-gym">
                        <div class="progress-bar" style="width: 85%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Istirahat & Recovery</span>
                        <span class="text-orange-red">60%</span>
                    </div>
                    <div class="progress progress-gym">
                        <div class="progress-bar" style="width: 60%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Program Latihan -->
        <div class="card bg-black border-orange-red mt-4">
            <div class="card-header bg-orange-red text-black fw-bold">
                <i class="fas fa-calendar-alt me-2"></i>Jadwal Latihan Minggu Ini
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check-circle text-orange-red me-2"></i> Senin: Chest & Triceps</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-orange-red me-2"></i> Rabu: Back & Biceps</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-orange-red me-2"></i> Jumat: Leg Day</li>
                    <li class="mb-2"><i class="fas fa-clock text-orange-red me-2"></i> Sabtu: Cardio & Core</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card bg-black border-orange-red">
            <div class="card-header bg-orange-red text-black fw-bold">
                <i class="fas fa-history me-2"></i>Aktivitas Terbaru
            </div>
            <div class="card-body" id="activityList">
                <!-- Aktivitas akan diisi JavaScript -->
            </div>
        </div>
        
        <!-- Rekomendasi Produk -->
        <div class="card bg-black border-orange-red mt-4">
            <div class="card-header bg-orange-red text-black fw-bold">
                <i class="fas fa-star me-2"></i>Rekomendasi Untukmu
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-4 text-center">
                        <i class="fas fa-capsules fa-2x text-orange-red"></i>
                        <p class="small mt-1">Whey Protein</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas fa-dumbbell fa-2x text-orange-red"></i>
                        <p class="small mt-1">Dumbbell Set</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas fa-flask fa-2x text-orange-red"></i>
                        <p class="small mt-1">Shaker Bottle</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Riwayat Pesanan -->
<div class="card bg-black border-orange-red mt-4">
    <div class="card-header bg-orange-red text-black fw-bold">
        <i class="fas fa-table me-2"></i>Riwayat Pesanan
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-dark-custom table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="orderHistoryTable">
                    <tr>
                        <td colspan="6" class="text-center text-white-50">Belum ada pesanan</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tombol Logout -->
<div class="text-center mt-4 mb-3">
    <a href="logout.php" class="btn btn-outline-danger">
        <i class="fas fa-sign-out-alt me-2"></i>Logout
    </a>
</div>

<script>

</script>

<?php include 'includes/footer.php'; ?>