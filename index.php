<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nada Vulkanik</title>
    <link rel="stylesheet" href="css/index.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
  </head>

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

    <div class="clearfix">
      <div class="carousel-container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="asset/merapi.jpg" class="d-block w-100" alt="Merapi 1">
              <div class="carousel-caption d-none d-md-block">
                <h5>Status Terkini Gunung Merapi</h5>
                <p>Aktivitas, & Potensi Bencana</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="asset/semeru.jpg" class="d-block w-100" alt="Semeru 1">
              <div class="carousel-caption d-none d-md-block">
                <h5>Letusan Semeru</h5>
                <p>Informasi terbaru letusan</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="asset/sinabung.jpg" class="d-block w-100" alt="Sinabung">
              <div class="carousel-caption d-none d-md-block">
                <h5>Mitigasi Bencana</h5>
                <p>Langkah-langkah penanggulangan</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <p>
        A paragraph of placeholder text. We’re using it here to show the use of
        the clearfix class. We’re adding quite a few meaningless phrases here to
        demonstrate how the columns interact here with the floated image.
      </p>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
