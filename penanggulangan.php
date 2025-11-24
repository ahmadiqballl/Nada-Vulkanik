<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penanggulangan - Nada Vulkanik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/penanggulangan.css">
</head>
<body>
    <!-- Navbar -->
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
                        <li><a class="dropdown-item" href="dampak.php">Dampak Letusan</a></li>
                        <li><a class="dropdown-item active" href="penanggulangan.php">Penanggulangan</a></li>
                        <li><a class="dropdown-item" href="mitigasi.php">Mitigasi</a></li>
                    </ul>
                </div>
                <a class="nav-link" href="tentang.php">Tentang</a>
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center mb-5">STRATEGI PENANGGULANGAN BENCANA GUNUNG MELETUS</h1>
            
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card phase-card h-100">
                        <div class="card-body">
                            <h5 class="card-title">🔄 PRA-BENCANA</h5>
                            <ul>
                                <li>Pemantauan aktivitas vulkanik</li>
                                <li>Sistem peringatan dini</li>
                                <li>Penyusunan peta rawan bencana</li>
                                <li>Simulasi evakuasi</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card phase-card h-100">
                        <div class="card-body">
                            <h5 class="card-title">🚨 SAAT BENCANA</h5>
                            <ul>
                                <li>Evakuasi segera</li>
                                <li>Pendirian posko darurat</li>
                                <li>Distribusi bantuan</li>
                                <li>Koordinasi tim SAR</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card phase-card h-100">
                        <div class="card-body">
                            <h5 class="card-title">🏥 PASCA-BENCANA</h5>
                            <ul>
                                <li>Rehabilitasi korban</li>
                                <li>Pemulihan infrastruktur</li>
                                <li>Pemulihan ekonomi</li>
                                <li>Evaluasi sistem</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
