<?php
include 'config.php';

// Tangkap data pencarian
$nama = $_GET['nama'] ?? '';
$lokasi = $_GET['lokasi'] ?? '';
$jenisKelamin = $_GET['jenisKelamin'] ?? '';
$usia = $_GET['usia'] ?? '';

$result = null;

// Jika ada parameter pencarian, jalankan query
if (!empty($_GET)) {
  $query = "SELECT * FROM orang_hilang WHERE 1=1";

  if ($nama != '') $query .= " AND nama_lengkap LIKE '%$nama%'";
  if ($lokasi != '') $query .= " AND lokasi_hilang LIKE '%$lokasi%'";
  if ($jenisKelamin != '') $query .= " AND jenis_kelamin = '$jenisKelamin'";

  if ($usia == '0-12') $query .= " AND usia BETWEEN 0 AND 12";
  if ($usia == '13-25') $query .= " AND usia BETWEEN 13 AND 25";
  if ($usia == '26-45') $query .= " AND usia BETWEEN 26 AND 45";
  if ($usia == '46+') $query .= " AND usia > 46";

  $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Volcanoria : Pencarian Orang</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="css/data-korban.css" />
</head>
<body>

 <!-- NAVBAR -->
   <body>
    <div class="navbarr">
      <nav>
        <div class="Logo">
          <img src="asset/logo.png" alt="Logo" class="logo-img" />
          <h2>Nada Vulkanik</h2>
        </div>
        <div class="nav-links">
          <a href="index.php">Beranda</a>
          <div class="dropdown">
            <a href="#" class="dropdown-toggle">Pengetahuan Kebencanaan</a>
            <div class="dropdown-menu">
              <a href="definisi.php">Definisi Bencana Gunung Meletus</a>
              <a href="jenis.php">Jenis Letusan</a>
              <a href="dampak.php">Dampak Letusan</a>
              <a href="penanggulangan.php">Penanggulangan</a>
              <a href="mitigasi.php">Mitigasi</a>
            </div>
          </div>
          <a href="tentang.php">Tentang</a>
        </div>
      </nav>
    </div>
<main>
  <!-- HEADER -->
 <div class="container-fluid py-5 page-header text-center text-white" 
     style="background: linear-gradient(180deg, #000000, #1a1a1a);">
  <h6 style="color: #ff8c32;">Stay Informed, Stay Alert!</h6>
  <strong class="display-3 fw-bold text-light">Cari Orang Hilang</strong>
</div>

  <!-- FORM -->
  <section id="gunung" class="section-padding py-5" style="background: linear-gradient(135deg,#f8f9fa,#e9ecef);">
    <div class="container">
      <div class="row justify-content-center text-center mb-4">
        <div class="col-lg-10">
          <h1 class="display-5 fw-bold text-dark">🔍 Pencarian Orang Hilang</h1>
          <p class="text-muted">Bantu temukan orang yang hilang dengan memasukkan informasi di bawah ini.</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card p-5 shadow-lg border-0" style="border-radius:25px;background:rgba(255,255,255,0.85);backdrop-filter:blur(10px);">
            <h4 class="mb-4 fw-semibold text-center" style="color:#ff8c32;">
              <i class="ri-user-search-line me-2"></i>Cari Data Orang Hilang
            </h4>

            <form method="GET" class="needs-validation" novalidate>
              <div class="row g-4">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Nama Lengkap</label>
                  <input type="text" class="form-control form-control-lg" name="nama" value="<?= htmlspecialchars($nama) ?>" placeholder="Masukkan nama orang yang dicari">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Lokasi Hilang</label>
                  <input type="text" class="form-control form-control-lg" name="lokasi" value="<?= htmlspecialchars($lokasi) ?>" placeholder="Contoh: Gunung Merapi">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Jenis Kelamin</label>
                  <select name="jenisKelamin" class="form-select form-select-lg">
                    <option value="">Semua</option>
                    <option value="Laki-laki" <?= $jenisKelamin=="Laki-laki"?"selected":"" ?>>Laki-laki</option>
                    <option value="Perempuan" <?= $jenisKelamin=="Perempuan"?"selected":"" ?>>Perempuan</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Rentang Usia</label>
                  <select name="usia" class="form-select form-select-lg">
                    <option value="">Semua</option>
                    <option value="0-12" <?= $usia=="0-12"?"selected":"" ?>>Anak-anak (0-12)</option>
                    <option value="13-25" <?= $usia=="13-25"?"selected":"" ?>>Remaja (13-25)</option>
                    <option value="26-45" <?= $usia=="26-45"?"selected":"" ?>>Dewasa (26-45)</option>
                    <option value="46+" <?= $usia=="46+"?"selected":"" ?>>Lansia (46+)</option>
                  </select>
                </div>
              </div>

              <div class="text-center mt-5">
                <button type="submit" class="btn px-5 py-3 fw-semibold shadow-sm"
                        style="background-color:#ff8c32;color:white;border-radius:50px;">
                  <i class="ri-search-line me-2"></i>Cari Sekarang
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- HASIL PENCARIAN -->
      <?php if ($result !== null): ?>
        <div class="row mt-5">
          <h3 class="text-center mb-4">Hasil Pencarian</h3>

          <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                  <img src="uploads/<?= $row['foto'] ?: 'default.jpg' ?>" 
                       class="card-img-top" alt="<?= $row['nama_lengkap'] ?>" 
                       style="height:250px;object-fit:cover;border-radius:15px 15px 0 0;">
                  <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['nama_lengkap']) ?></h5>
                    <p class="card-text mb-1"><strong>Usia:</strong> <?= $row['usia'] ?> tahun</p>
                    <p class="card-text mb-1"><strong>Jenis Kelamin:</strong> <?= $row['jenis_kelamin'] ?></p>
                    <p class="card-text mb-1"><strong>Lokasi Hilang:</strong> <?= $row['lokasi_hilang'] ?></p>
                    <p class="card-text mb-2"><strong>Ciri-ciri:</strong> <?= $row['ciri_ciri'] ?></p>
                    <p class="card-text"><strong>Status:</strong> 
                      <span class="badge <?= $row['status']=='Belum Ditemukan'?'bg-danger':'bg-success' ?>">
                        <?= $row['status'] ?>
                      </span>
                    </p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="col-12">
              <div class="alert alert-warning text-center">
                Tidak ditemukan data yang cocok dengan pencarian Anda.
              </div>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<!-- Footer -->
<!-- FOOTER -->
<footer class="text-light pt-5 pb-3" style="background: #1e1e1e;">
  <div class="container">
    <div class="row gy-4">
      
      <!-- Kolom 1: About -->
      <div class="col-md-6 col-lg-4">
        <div class="d-flex align-items-center mb-3">
          <img src="asset/Logo.png" alt="Logo Volcanoria" width="60" height="60" class="me-2">
          <h5 class="fw-bold mb-0" style="color: #ff8c32;">NadaVulkanik</h5>
        </div>
        <p class="text-light opacity-75">
          Volcanoria adalah platform informasi yang didedikasikan untuk meningkatkan kesadaran dan pemahaman tentang bencana alam, 
          khususnya letusan gunung berapi. Kami menyediakan data terkini, edukasi, dan panduan mitigasi untuk membantu masyarakat menghadapi potensi risiko.
        </p>
      </div>

      <!-- Kolom 2: Contact -->
      <div class="col-md-6 col-lg-4">
        <h5 class="fw-bold mb-3" style="color: #ff8c32;">Kontak Kami</h5>
        <ul class="text-light opacity-75">
          <li><i class="ri-mail-line me-2 text-light"></i> info@NadaVulkanik.com</li>
          <li><i class="ri-phone-line me-2 text-light"></i> 123-456-7890</li>
          <li><i class="ri-map-pin-line me-2 text-light"></i> Jl. Babarsari No.10, Yogyakarta</li>
        </ul>
      </div>

      <!-- Kolom 3: Quick Links -->
      <div class="col-md-6 col-lg-4">
        <h5 class="fw-bold mb-3" style="color: #ff8c32;">Tautan Cepat</h5>
        <ul class="text-light opacity-75">
          <li><a href="informasi.php" class="footer-link">Informasi</a></li>
          <li><a href="berita.php" class="footer-link">Berita</a></li>
          <li><a href="data-korban.php" class="footer-link">Pencarian Orang</a></li>
          <li><a href="about.php" class="footer-link">Tentang Kami</a></li>
        </ul>
      </div>

    </div>

    <!-- Garis Pemisah -->
    <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">

    <!-- Copyright -->
    <div class="text-light opacity-75">
      © 2024 <span style="color: #ff8c32;">NadaVulkanik</span>. All Rights Reserved.
    </div>
  </div>
</footer>

<!-- Tambahkan CSS untuk link hover -->
<style>
  .footer-link {
    color: #bbb;
    text-decoration: none;
    transition: color 0.3s ease, padding-left 0.3s ease;
  }

  .footer-link:hover {
    color: #ff8c32;
    padding-left: 5px;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

