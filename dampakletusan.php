<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nada Vulkanik</title>
    <link rel="stylesheet" href="css/dampakletusan.css">
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
          <a href="data-korban.php">Pencarian Orang Hilang</a>
          <a href="tentang.php">Tentang</a>
        </div>
      </nav>
    </div>
    <!-- END SECTION NAVBAR -->

    <main>
      <section class="home">
    </main>

   <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <h1><span>BERITA VULKANIK</span> TERKINI</h1>
      <p>Letusan gunung berapi merupakan salah satu fenomena alam paling dahsyat di bumi. 
      Tetap terinformasi dengan berita terbaru tentang aktivitas gunung berapi di seluruh dunia.</p>
      <button class="btn-primary">READ MORE</button>
    </div>
  </section>

  <!-- Dampak Section -->
  <section class="impact-section">
    <h2>Dampak Letusan Gunung Berapi</h2>
    <div class="impact-grid">
      <div class="impact-card">
         <img src="asset/positif.jpeg" class="impact-img" alt="Dampak Positif">
        <h3>1. Dampak Positif</h3>
        <p>- Abu vulkanik yang keluar saat letusan mengandung mineral penting seperti fosfor, kalium, dan belerang yang bisa menyuburkan tanah. Daerah sekitar gunung berapi biasanya menjadi lahan pertanian yang sangat produktif..</p>
        <p>- Aktivitas gunung berapi menghasilkan panas bumi yang dapat dimanfaatkan sebagai sumber energi ramah lingkungan untuk pembangkit listrik.</p>
        <p>- Letusan gunung berapi dapat memunculkan mineral dan batuan berharga seperti belerang, pasir vulkanik, batu apung, hingga logam tertentu yang bernilai ekonomi.</p>
        <p>- Setelah letusan, ekosistem yang hancur akan tumbuh kembali dengan vegetasi baru, yang justru bisa meningkatkan keanekaragaman flora dan fauna.</p>
      </div>

      <div class="impact-card">
         <img src="asset/negatif.jpeg" class="impact-img" alt="Dampak Positif">
        <h3>2. Dampak Negatif</h3>
        <p>- Lava pijar dapat membakar hutan, menghancurkan rumah, dan infrastruktur.</p>
        <p>- Awan panas (pyroclastic flow) sangat berbahaya karena suhunya bisa lebih dari 600°C dan melaju cepat, mematikan makhluk hidup di jalurnya.</p>
        <p>- Lontaran material (bom vulkanik, batu, kerikil, pasir, abu) bisa merusak atap rumah, kendaraan, dan melukai manusia.</p>
        <p>- Gas beracun seperti CO₂, SO₂, dan H₂S dapat menyebabkan sesak napas, keracunan, bahkan kematian.</p>
        <p>- Hujan abu vulkanik mengganggu kesehatan (ISPA, iritasi mata, kulit), menurunkan jarak pandang, mengganggu penerbangan, dan merusak tanaman.</p>
        <p>- Lahar dingin (campuran abu, pasir, batu, dan air hujan) dapat menimbulkan banjir besar yang menghancurkan pemukiman dan lahan pertanian.</p>
        <p>- Pengungsian massal: masyarakat kehilangan tempat tinggal, mengalami trauma, serta membutuhkan waktu lama untuk pemulihan sosial dan ekonomi.</p>
        <p>- Gangguan ekonomi: pertanian gagal panen, ternak mati, pariwisata lumpuh, infrastruktur rusak, biaya perbaikan sangat besar. </p>
      </div>

      <div class="impact-card">
         <img src="asset/global.jpeg" class="impact-img" alt="Dampak Positif">
        <h3>4. Dampak Global</h3>
        <p>- Perubahan iklim sementara: abu dan gas belerang yang masuk ke atmosfer bisa menurunkan suhu bumi (global cooling).</p>
        <p>- Gangguan transportasi udara internasional akibat abu vulkanik yang terbawa angin hingga ribuan kilometer. </p>
      </div>
    </div>

    <div class="center-btn">
      <button class="btn-secondary">Lihat Penanggulangan Bencana</button>
    </div>
  </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/home-carousel.js"></script>
  </body>
</html>
