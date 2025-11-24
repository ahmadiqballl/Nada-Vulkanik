<?php
require 'config.php';

// Proses pertanyaan baru
if ($_POST && isset($_POST['question'])) {
    $user_name = sanitize($_POST['user_name']);
    $question = sanitize($_POST['question']);
    
    $sql = "INSERT INTO questions (user_name, question) VALUES ('$user_name', '$question')";
    if ($conn->query($sql)) {
        $success_msg = "Pertanyaan berhasil dikirim!";
    } else {
        $error_msg = "Error: " . $conn->error;
    }
}

// Pencarian orang hilang
$search_results = [];
if ($_GET && isset($_GET['search'])) {
    $search_term = sanitize($_GET['search']);
    $search_query = "
        SELECT * FROM orang_hilang 
        WHERE nama LIKE '%$search_term%' 
           OR alamat LIKE '%$search_term%' 
           OR ciri_fisik LIKE '%$search_term%'
        ORDER BY tanggal_hilang DESC
    ";
    $search_results = $conn->query($search_query);
}

// Ambil semua orang hilang untuk ditampilkan
$orang_hilang_query = "SELECT * FROM orang_hilang WHERE status = 'hilang' ORDER BY tanggal_hilang DESC LIMIT 6";
$orang_hilang_result = $conn->query($orang_hilang_query);

// Ambil data pertanyaan dan jawaban
$qa_query = "
    SELECT q.*, a.answer, a.created_at as answered_at, u.nama as admin_name 
    FROM questions q 
    LEFT JOIN answers a ON q.id = a.question_id 
    LEFT JOIN users u ON a.admin_id = u.id 
    ORDER BY q.created_at DESC
";
$qa_result = $conn->query($qa_query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nada Vulkanik - Edukasi Gunung Berapi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- Leaflet for interactive map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-sA+e2m7k3kQ0Rkpv3Y0sKQb2n0wqvM2q3b0x0s+6b0M=" crossorigin=""/>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">🌋 Nada Vulkanik</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="index.php">Beranda</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Pengetahuan Kebencanaan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="definisi.php">Definisi Gunung Meletus</a></li>
                        <li><a class="dropdown-item" href="jenis_letusan.php">Jenis Letusan</a></li>
                        <li><a class="dropdown-item" href="dampak.php">Dampak Letusan</a></li>
                        <li><a class="dropdown-item" href="penanggulangan.php">Penanggulangan</a></li>
                        <li><a class="dropdown-item" href="mitigasi.php">Mitigasi</a></li>
                    </ul>
                </div>
                <a class="nav-link" href="tentang.php">Tentang</a>
                <a class="nav-link" href="login.php">Admin Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section py-5">
        <div class="container text-center">
            <h1 class="display-3 fw-bold mb-4">NADA VULKANIK</h1>
            <p class="lead mb-4">Platform Edukasi Mitigasi Bencana Gunung Berapi Terlengkap di Indonesia</p>
            <a href="#pencarian" class="btn btn-warning btn-lg">Cari Orang Hilang</a>
            <a href="#pengetahuan" class="btn btn-outline-light btn-lg ms-2">Mulai Belajar</a>
        </div>
    </section>

    <!-- Berita Bergerak -->
    <div class="bg-warning py-2">
        <div class="container">
            <marquee behavior="scroll" direction="left">
                🚨 Update: Gunung Merapi Status Waspada | Gunung Semeru Status Siaga | Jika memiliki informasi orang hilang, hubungi posko terdekat
            </marquee>
        </div>
    </div>
    <!-- Latest News (horizontal scroller) -->
    <section id="berita" class="py-3 bg-white">
        <div class="container">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h4 class="mb-0"><i class="fas fa-newspaper me-2"></i>Berita Terbaru</h4>
                        <small class="text-muted">Sumber: berbagai portal berita (contoh)</small>
                    </div>
                    <div class="news-scroller-wrapper">
                        <div class="news-scroller" id="newsScroller">
                            <article class="news-card">
                                <img class="news-image" src="https://via.placeholder.com/640x360?text=Merapi+Eruption" alt="Merapi">
                                <div class="news-body">
                                    <div class="news-title">Peningkatan Aktivitas Gunung Merapi Direspon Posko</div>
                                    <div class="news-meta">Kompas — 24 Nov 2025</div>
                                    <div class="news-excerpt">Pihak berwenang meningkatkan pengawasan dan memperketat zona larangan setelah peningkatan gempa vulkanik di sekitar Gunung Merapi.</div>
                                    <a href="https://www.kompas.com/" target="_blank" rel="noopener noreferrer">Baca selengkapnya →</a>
                                </div>
                            </article>

                            <article class="news-card">
                                <img class="news-image" src="https://via.placeholder.com/640x360?text=Semeru+Alert" alt="Semeru">
                                <div class="news-body">
                                    <div class="news-title">Gunung Semeru Tingkatkan Status Siaga</div>
                                    <div class="news-meta">Detik — 23 Nov 2025</div>
                                    <div class="news-excerpt">Evakuasi terkoordinasi dilakukan di beberapa desa sekitar lereng menyusul laporan awan panas pada pagi hari.</div>
                                    <a href="https://www.detik.com/" target="_blank" rel="noopener noreferrer">Baca selengkapnya →</a>
                                </div>
                            </article>

                            <article class="news-card">
                                <img class="news-image" src="https://via.placeholder.com/640x360?text=Sinabung+Update" alt="Sinabung">
                                <div class="news-body">
                                    <div class="news-title">Sinabung Keluar Kubah Lava Baru</div>
                                    <div class="news-meta">CNN Indonesia — 22 Nov 2025</div>
                                    <div class="news-excerpt">Pengamatan satellite menunjukkan pembentukan kubah lava baru yang berpotensi runtuh dan memicu awan panas.</div>
                                    <a href="https://www.cnnindonesia.com/" target="_blank" rel="noopener noreferrer">Baca selengkapnya →</a>
                                </div>
                            </article>

                            <article class="news-card">
                                <img class="news-image" src="https://via.placeholder.com/640x360?text=Research+Volcanoes" alt="Research">
                                <div class="news-body">
                                    <div class="news-title">Peneliti Mengembangkan Sistem Peringatan Dini Berbasis AI</div>
                                    <div class="news-meta">The Guardian — 20 Nov 2025</div>
                                    <div class="news-excerpt">Model baru memanfaatkan data seismik dan satelit untuk memprediksi letusan dengan akurasi lebih tinggi.</div>
                                    <a href="https://www.theguardian.com/" target="_blank" rel="noopener noreferrer">Baca selengkapnya →</a>
                                </div>
                            </article>

                            <article class="news-card">
                                <img class="news-image" src="https://via.placeholder.com/640x360?text=Preparedness+Tips" alt="Preparedness">
                                <div class="news-body">
                                    <div class="news-title">Tips Kesiapsiagaan Menghadapi Erupsi untuk Warga</div>
                                    <div class="news-meta">BBC Indonesia — 18 Nov 2025</div>
                                    <div class="news-excerpt">Panduan singkat menyiapkan kit darurat, jalur evakuasi, dan perlindungan keluarga saat letusan terjadi.</div>
                                    <a href="https://www.bbc.com/indonesia" target="_blank" rel="noopener noreferrer">Baca selengkapnya →</a>
                                </div>
                            </article>
                        </div>
                        <div class="news-btns">
                            <button class="news-btn news-prev" id="newsPrev" aria-label="Previous news"><i class="fas fa-chevron-left"></i></button>
                            <button class="news-btn news-next" id="newsNext" aria-label="Next news"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Persebaran Gunung Berapi Aktif (Map) -->
    <section id="persebaran" class="py-4 bg-white">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-map-marked-alt me-2"></i>Persebaran Gunung Berapi Aktif</h4>
                            <small class="text-muted">Sumber: API lokal contoh — klik marker untuk detail</small>
                        </div>
                        <div class="card-body p-0">
                            <div id="volcanoMap" class="volcano-map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Edukasi (tetap sama seperti sebelumnya) -->
    <div class="container my-5" id="pengetahuan">
        <!-- Profil Gunung Berapi -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-mountain me-2"></i>Profil Gunung Berapi</h4>
                    </div>
                    <div class="card-body">
                        <p>Indonesia merupakan negara dengan jumlah gunung berapi terbanyak di dunia. Terdapat 127 gunung berapi aktif yang tersebar di seluruh archipelago.</p>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-fire text-danger fa-3x mb-3"></i>
                                        <h5>Gunung Merapi</h5>
                                        <p>Jawa Tengah - Status: Waspada</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-mountain text-warning fa-3x mb-3"></i>
                                        <h5>Gunung Semeru</h5>
                                        <p>Jawa Timur - Status: Siaga</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-volcano text-success fa-3x mb-3"></i>
                                        <h5>Gunung Rinjani</h5>
                                        <p>Lombok - Status: Normal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten lainnya tetap sama -->
        <!-- Peta Persebaran, Video Edukasi, Tanya Jawab -->
        
    </div>

    <!-- Pencarian Orang Hilang (pindah ke bawah seperti diminta) -->
    <section id="pencarian" class="py-5 bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-search me-2"></i>Pencarian Orang Hilang</h4>
                        </div>
                        <div class="card-body">
                            <form method="GET" class="row g-3">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="search" 
                                           placeholder="Cari berdasarkan nama, alamat, atau ciri-ciri (contoh: mail, kacamata, tahi lalat)..."
                                           value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-orange w-100">
                                        <i class="fas fa-search me-2"></i>Cari
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hasil Pencarian -->
            <?php if (isset($_GET['search'])): ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Hasil Pencarian untuk "<?php echo htmlspecialchars($_GET['search']); ?>"</h5>
                            </div>
                            <div class="card-body">
                                <?php if ($search_results->num_rows > 0): ?>
                                    <div class="row">
                                        <?php while($person = $search_results->fetch_assoc()): ?>
                                            <div class="col-md-6 col-lg-4 mb-4">
                                                <div class="card person-card <?php echo $person['status'] == 'hilang' ? 'status-hilang' : 'status-ditemukan'; ?>">
                                                    <div class="card-body">
                                                        <div class="text-center mb-3">
                                                            <?php if ($person['foto']): ?>
                                                                <img src="<?php echo $person['foto']; ?>" class="img-fluid rounded" style="max-height: 150px;" alt="Foto <?php echo htmlspecialchars($person['nama']); ?>">
                                                            <?php else: ?>
                                                                <div class="photo-placeholder rounded">
                                                                    <i class="fas fa-user fa-3x"></i>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <h6 class="card-title"><?php echo htmlspecialchars($person['nama']); ?></h6>
                                                        <p class="card-text small mb-1">
                                                            <strong>Umur:</strong> <?php echo $person['umur']; ?> tahun<br>
                                                            <strong>Hilang:</strong> <?php echo date('d M Y', strtotime($person['tanggal_hilang'])); ?><br>
                                                            <strong>Lokasi:</strong> <?php echo htmlspecialchars($person['lokasi_hilang']); ?>
                                                        </p>
                                                        <div class="mt-2">
                                                            <?php if ($person['status'] == 'hilang'): ?>
                                                                <span class="badge bg-warning">Masih Hilang</span>
                                                            <?php else: ?>
                                                                <span class="badge bg-success">Telah Ditemukan</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Tidak ditemukan data orang hilang dengan kata kunci "<?php echo htmlspecialchars($_GET['search']); ?>"
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Daftar Orang Hilang Terbaru -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Orang Hilang Terbaru</h5>
                            <small><a href="#semua-orang-hilang" class="text-white">Lihat Semua</a></small>
                        </div>
                        <div class="card-body">
                            <?php if ($orang_hilang_result->num_rows > 0): ?>
                                <div class="row">
                                    <?php while($person = $orang_hilang_result->fetch_assoc()): ?>
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="card person-card status-hilang">
                                                <div class="card-body">
                                                    <div class="text-center mb-3">
                                                        <?php if ($person['foto']): ?>
                                                            <img src="<?php echo $person['foto']; ?>" class="img-fluid rounded" style="max-height: 150px;" alt="Foto <?php echo htmlspecialchars($person['nama']); ?>">
                                                        <?php else: ?>
                                                            <div class="photo-placeholder rounded">
                                                                <i class="fas fa-user fa-3x"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <h6 class="card-title"><?php echo htmlspecialchars($person['nama']); ?></h6>
                                                    <p class="card-text small mb-1">
                                                        <strong>Umur:</strong> <?php echo $person['umur']; ?> tahun<br>
                                                        <strong>Hilang:</strong> <?php echo date('d M Y', strtotime($person['tanggal_hilang'])); ?><br>
                                                        <strong>Lokasi:</strong> <?php echo htmlspecialchars($person['lokasi_hilang']); ?>
                                                    </p>
                                                    <p class="card-text small">
                                                        <strong>Ciri-ciri:</strong> <?php echo htmlspecialchars($person['ciri_fisik']); ?>
                                                    </p>
                                                    <div class="mt-2">
                                                        <span class="badge bg-warning">Masih Hilang</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Tidak ada data orang hilang saat ini.
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Nada Vulkanik</h5>
                    <p>Platform edukasi mitigasi bencana gunung berapi dan pencarian orang hilang.</p>
                </div>
                <div class="col-md-4">
                    <h5>Kontak Darurat</h5>
                    <ul class="list-unstyled">
                        <li>📞 Posko Bencana: 112</li>
                        <li>📞 Basarnas: 115</li>
                        <li>📞 PMI: 119</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Anggota</h5>
                    <ul class="list-unstyled">
                        <li>Risky Ramadhan</li>
                        <li>Eileen Valascha</li>
                        <li>Ahmad Iqbal</li>
                        <li>Muhammad Zikri</li>
                        <li>Anita Deni</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; 2024 Nada Vulkanik - All rights reserved</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-o9N1j8Gg0gZq5m8s0Cj3q1s9r9nG6z9Zkzq0q0q0q0Q=" crossorigin=""></script>
        <script>
            // Initialize map and load volcano data from local API
            (function(){
                try{
                    var map = L.map('volcanoMap').setView([-2.5, 118], 5);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 18,
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(map);

                    fetch('api/volcanoes.php')
                        .then(function(res){ return res.json(); })
                        .then(function(data){
                            data.forEach(function(v){
                                var marker = L.circleMarker([v.lat, v.lon], {
                                    radius: 8,
                                    fillColor: v.status && v.status.toLowerCase().includes('siaga') ? '#d9534f' : (v.status && v.status.toLowerCase().includes('waspada') ? '#ff8c42' : '#2ecc71'),
                                    color: '#333',
                                    weight:1,
                                    opacity:1,
                                    fillOpacity:0.9
                                }).addTo(map);
                                marker.bindPopup('<strong>'+v.name+'</strong><br/>' + v.provinsi + '<br>Status: <em>'+v.status+'</em>');
                            });
                        })
                        .catch(function(err){
                            console.error('Error loading volcano data', err);
                            var el = document.getElementById('volcanoMap');
                            if(el) el.innerHTML = '<div style="padding:16px;">Tidak dapat memuat data persebaran saat ini.</div>';
                        });
                }catch(e){ console.error(e); }
            })();
            // News scroller controls
            (function(){
                var scroller = document.getElementById('newsScroller');
                var prev = document.getElementById('newsPrev');
                var next = document.getElementById('newsNext');
                if(!scroller) return;
                var step = Math.round(scroller.clientWidth * 0.8) || 300;
                prev && prev.addEventListener('click', function(){ scroller.scrollBy({ left: -step, behavior: 'smooth' }); });
                next && next.addEventListener('click', function(){ scroller.scrollBy({ left: step, behavior: 'smooth' }); });
                // Optional: disable buttons when at ends
                function updateButtons(){
                    if(!prev||!next) return;
                    prev.disabled = scroller.scrollLeft <= 10;
                    next.disabled = scroller.scrollLeft + scroller.clientWidth >= scroller.scrollWidth - 10;
                }
                scroller.addEventListener('scroll', updateButtons);
                window.addEventListener('resize', function(){ step = Math.round(scroller.clientWidth * 0.8); updateButtons(); });
                updateButtons();
            })();
        </script>
</body>
</html>
