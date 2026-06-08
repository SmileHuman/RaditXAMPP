<?php 
$page_title = "Home - UMKM Nusantara";
include 'includes/header.php'; 
// Contoh penanganan POST untuk HTTP method (PHP)
$form_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cta_email'])) {
    $email = htmlspecialchars($_POST['cta_email']);
    $form_message = "<div class='alert alert-success alert-dismissible fade show'>Terima kasih $email! Kami akan hubungi Anda segera.</div>";
}
?>
<!-- Hero Section + Headline + Subheadline -->
<section>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img
              src="bootstrap-themes.png"
              class="d-block mx-lg-auto img-fluid"
              alt="Bootstrap Themes"
              width="700"
              height="500"
              loading="lazy"
            />
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
              Responsive left-aligned hero with image
            </h1>
            <p class="lead">
              Quickly design and customize responsive mobile-first sites with
              Bootstrap, the world’s most popular front-end open source toolkit,
              featuring Sass variables and mixins, responsive grid system,
              extensive prebuilt components, and powerful JavaScript plugins.
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
              <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">
                Primary
              </button>
              <button
                type="button"
                class="btn btn-outline-secondary btn-lg px-4"
              >
                Default
              </button>
            </div>
          </div>
        </div>
      </div>
</section>

<section id="tentang">

</section>

<!-- Item Produk (Grid dengan Cards) -->
<section class="my-5">
    <h2 class="text-center mb-5"><span class="border-bottom border-orange-red pb-2">Produk Unggulan</span></h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <img src="https://picsum.photos/id/13/400/300" class="card-img-top" alt="Kerajinan Kayu">
                <div class="card-body">
                    <h5 class="card-title">Ukiran Kayu Khas Jepara</h5>
                    <p class="card-text">Kerajinan tangan dari kayu jati berkualitas, detail ukiran khas Nusantara.</p>
                    <a href="detail-product.php?product=woodcraft" class="btn btn-outline-orange-red">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <img src="https://picsum.photos/id/20/400/300" class="card-img-top" alt="Kopi Spesial">
                <div class="card-body">
                    <h5 class="card-title">Kopi Arabika Gayo</h5>
                    <p class="card-text">Biji kopi pilihan dengan aroma khas dan rasa yang smooth.</p>
                    <a href="detail-product.php?product=coffee" class="btn btn-outline-orange-red">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <img src="https://picsum.photos/id/30/400/300" class="card-img-top" alt="Tenun Ikat">
                <div class="card-body">
                    <h5 class="card-title">Tenun Ikat NTT</h5>
                    <p class="card-text">Kain tradisional dengan motif khas dan warna alami.</p>
                    <a href="detail-product.php?product=tenun" class="btn btn-outline-orange-red">Detail</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Media Visual (Gambar/Video) -->
<section class="my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="https://picsum.photos/id/104/700/400" class="img-fluid rounded shadow-lg" alt="Proses Produksi UMKM">
        </div>
        <div class="col-md-6">
            <h3 class="text-orange-red">Dibalik Setiap Produk</h3>
            <p>Kami bekerja sama dengan pengrajin lokal untuk menghasilkan produk berkualitas tinggi yang ramah lingkungan dan berkelanjutan. Tonton video profil kami untuk lebih mengenal perjalanan UMKM Nusantara.</p>
            <div class="ratio ratio-16x9 mt-3">
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=test" title="Video profil UMKM" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section id="testimoni" class="my-5 bg-dark py-4 rounded">
    <h2 class="text-center mb-4">Apa Kata Pelanggan</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="testimonial-card">
                <i class="fas fa-star text-warning mb-2"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                <p class="mt-2">"Kopi Gayo-nya luar biasa! Aroma dan rasa sangat memuaskan. Pengiriman cepat."</p>
                <h6 class="text-orange-red">- Budi, Jakarta</h6>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-card">
                <i class="fas fa-star text-warning mb-2"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                <p class="mt-2">"Ukiran kayunya detail banget, cocok untuk souvenir dan dekorasi rumah."</p>
                <h6 class="text-orange-red">- Dewi, Bandung</h6>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-card">
                <i class="fas fa-star text-warning mb-2"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                <p class="mt-2">"Tenun ikat NTT sangat cantik, kualitas kainnya bagus dan warna tidak luntur."</p>
                <h6 class="text-orange-red">- Ratna, Surabaya</h6>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action (CTA) + Contoh HTTP POST PHP -->
<section class="my-5 p-5 text-center bg-black border border-orange-red rounded">
    <h3 class="text-orange-red">Dapatkan Penawaran Spesial!</h3>
    <p class="mb-3">Masukkan email Anda untuk mendapatkan diskon 10% & update produk terbaru.</p>
    <?php if ($form_message) echo $form_message; ?>
    <form method="POST" class="row justify-content-center g-2">
        <div class="col-md-5">
            <input type="email" name="cta_email" class="form-control" placeholder="Alamat Email" required>
        </div>
        <div class="col-md-auto">
            <button type="submit" class="btn btn-orange-red">Kirim Sekarang</button>
        </div>
    </form>
    <small class="text-muted">*Promo terbatas, berlaku syarat & ketentuan</small>
</section>

<?php include 'includes/footer.php'; ?>