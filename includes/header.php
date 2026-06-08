<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title><?php echo $page_title ?? 'UMKM Nusantara'; ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-dark text-white">
    <!-- Navbar -->
    <div class="container-fluid fixed-top">
        <header
          class="bg-warning d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom"
        >
          <h2 class="">Fenic Store</h2>
          <ul
            class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0"
          >
            <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="index.php#tentang" class="nav-link px-2">Tentang</a></li>
            <li><a href="produk.php" class="nav-link px-2">Produk</a></li>
            <li><a href="members.php" class="nav-link px-2">Members</a></li>
            <li><a href="index.php#testimoni" class="nav-link px-2">Testimoni</a></li>
          </ul>
          <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">
              Login
            </button>
            <button type="button" class="btn btn-primary">Sign-up</button>
          </div>
        </header>
      </div>
    <main class="py-4">
        <div class="container">