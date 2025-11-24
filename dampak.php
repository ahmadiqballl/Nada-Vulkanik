<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dampak Letusan - Nada Vulkanik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/dampak.css">
</head>
<body>
    <!-- Navbar (sama seperti sebelumnya) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">🌋 Nada Vulkanik</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="index.php">Beranda</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">
                        Pengetahuan Kebencanaan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="definisi.php">Definisi Gunung Meletus</a></li>
                        <li><a class="dropdown-item" href="jenis_letusan.php">Jenis Letusan</a></li>
                        <li><a class="dropdown-item active" href="dampak.php">Dampak Letusan</a></li>
                        <li><a class="dropdown-item" href="penanggulangan.php">Penanggulangan</a></li>
                        <li><a class="dropdown-item" href="mitigasi.php">Mitigasi</a></li>
                    </ul>
                </div>
                <a class="nav-link" href="tentang.php">Tentang</a>
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-dark text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">DAMPAK LETUSAN GUNUNG BERAPI</h1>
            <p class="lead">Analisis Komprehensif Pengaruh Erupsi Vulkanik terhadap Kehidupan</p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card impact-card impact-negative h-100">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0"><i class="fas fa-skull-crossbones me-2"></i>Dampak Negatif</h5>
                        </div>
                        <div class="card-body">
                            <h6>Bagi Lingkungan:</h6>
                            <ul>
                                <li>Kerusakan ekosistem</li>
                                <li>Pencemaran udara dan air</li>
                                <li>Perubahan landscape</li>
                                <li>Kerusakan lahan pertanian</li>
                            </ul>
                            <h6>Bagi Manusia:</h6>
                            <ul>
                                <li>Korban jiwa dan luka-luka</li>
                                <li>Kerusakan infrastruktur</li>
                                <li>Gangguan kesehatan</li>
                                <li>Dampak ekonomi</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card impact-card impact-positive h-100">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-seedling me-2"></i>Dampak Positif</h5>
                        </div>
                        <div class="card-body">
                            <h6>Kesuburan Tanah:</h6>
                            <ul>
                                <li>Tanah menjadi lebih subur</li>
                                <li>Mineral penting untuk pertanian</li>
                                <li>Peningkatan produktivitas</li>
                            </ul>
                            <h6>Potensi Lain:</h6>
                            <ul>
                                <li>Energi geotermal</li>
                                <li>Bahan bangunan</li>
                                <li>Wisata vulkanik</li>
                                <li>Material industri</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p>&copy; 2024 Nada Vulkanik - All rights reserved</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
