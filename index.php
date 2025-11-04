<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nada Vulkanik</title>
    <link rel="stylesheet" href="css/index.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
  </head>
  <body>
    <!-- SECTION NAVBAR -->
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
          <a href="berita.php">Pencarian Orang Hilang</a>
          <a href="tentang.php">Tentang</a>
        </div>
      </nav>
    </div>
    <!-- END SECTION NAVBAR -->

    <main>
      <section class="home">
        <!-- Video Slides -->
        <video src="asset/vid-carousel1.mp4" class="video-slide active" autoplay muted loop></video>
        <video src="asset/vid-carousel2.mp4" class="video-slide" autoplay muted loop></video>
        <video src="asset/vid-carousel3.mp4" class="video-slide" autoplay muted loop></video>
        <!-- Text Content Slides -->
        <div class="content-slide active">
          <h1 class="headline">LETUSAN VULKANIK<br>YANG MENGUBAH DUNIA</h1>
          <p class="desc">Menelusuri jejak letusan-letusan bersejarah yang paling dahsyat, dari Tambora hingga Krakatau. Ketahui bagaimana letusan besar ini berdampak pada kehidupan dan iklim bumi.</p>
          <a href="informasi.php" class="btn btn-light readmore-btn">READ MORE</a>
        </div>
        <div class="content-slide">
          <h1 class="headline">BERITA VULKANIK<br>TERKINI</h1>
          <p class="desc">Tetap terinformasi dengan berita terbaru tentang aktivitas gunung berapi di seluruh dunia. Dari laporan letusan terbaru hingga peringatan penting bagi wilayah rawan.</p>
          <a href="berita.php" class="btn btn-light readmore-btn">READ MORE</a>
        </div>
        <div class="content-slide">
          <h1 class="headline">MENJELAJAHI FENOMENA<br>VULKANIK</h1>
          <p class="desc">Pelajari lebih dalam tentang penyebab, jenis letusan, dampak, dan panduan penanggulangan gunung berapi. Temukan semua informasi penting yang Anda butuhkan di sini.</p>
          <a href="definisi.php" class="btn btn-light readmore-btn">READ MORE</a>
        </div>
        <div class="slider-navigation">
          <div class="nav-btn active"></div>
          <div class="nav-btn"></div>
          <div class="nav-btn"></div>
        </div>
      </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/home-carousel.js"></script>
  </body>
</html>
