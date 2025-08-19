<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karir | PT Team Metal Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;
        }

        /* HERO */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -2;
        }

        .hero-overlay {
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        /* Card Hover */
        .card-hover:hover {
            transform: translateY(-8px);
            transition: 0.3s;
        }

        /* Section Title */
        .section-title {
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Parallax Background */
        .parallax-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.2;
        }

        /* Footer */
        footer {
            background: #222;
            color: #aaa;
            padding: 2rem 0;
        }

        footer a {
            color: #ddd;
            text-decoration: none;
        }

        footer a:hover {
            color: white;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">PT Team Metal Indonesia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#lowongan">Lowongan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <a href="#daftar" class="btn btn-primary rounded-pill px-4">Daftar / Masuk</a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <img src="https://images.unsplash.com/photo-1581092334651-ddf26d9c42a9?auto=format&fit=crop&w=1350&q=80"
            class="hero-bg rellax" data-rellax-speed="-4" alt="Background">
        <div class="hero-overlay"></div>
        <div class="container position-relative" data-aos="fade-up">
            <h1 class="display-4 fw-bold">Bangun Karirmu Bersama Kami</h1>
            <p class="lead">Mari bergabung dengan PT Team Metal Indonesia dan kembangkan potensi terbaikmu.</p>
            <a href="#lowongan" class="btn btn-lg btn-warning rounded-pill mt-3">Lihat Lowongan</a>
        </div>
        <i class="bi bi-gear-fill text-warning fs-1 position-absolute rellax" style="top:20%; left:10%;"
            data-rellax-speed="3"></i>
        <i class="bi bi-people-fill text-info fs-1 position-absolute rellax" style="bottom:15%; right:15%;"
            data-rellax-speed="2"></i>
    </section>

    <!-- TENTANG -->
    <section id="tentang" class="py-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-down">Tentang Kami</h2>
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="zoom-in">
                    <img src="https://images.unsplash.com/photo-1581091215367-59ab6cda75f0?auto=format&fit=crop&w=900&q=80"
                        class="img-fluid rounded shadow" alt="PT Team Metal Indonesia">
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <p>PT Team Metal Indonesia adalah perusahaan manufaktur yang terus berkembang dengan komitmen pada
                        inovasi, kualitas, dan SDM unggul. Kami percaya bahwa karyawan adalah aset utama yang menentukan
                        masa depan perusahaan.</p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Lingkungan kerja profesional</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Peluang karir yang luas</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Dukungan pengembangan diri</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- LOWONGAN dengan Parallax -->
    <section id="lowongan" class="py-5 position-relative">
        <img src="https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1350&q=80"
            class="parallax-bg rellax" data-rellax-speed="-2" alt="Background Lowongan">
        <div class="container position-relative">
            <h2 class="section-title text-white" data-aos="fade-down">Lowongan Tersedia</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-hover shadow border-0 h-100 rellax" data-rellax-speed="2">
                        <div class="card-body">
                            <h5 class="card-title">Staff Produksi</h5>
                            <p class="card-text">Bertanggung jawab terhadap proses produksi dengan standar kualitas
                                perusahaan.</p>
                            <a href="#daftar" class="btn btn-outline-primary">Lamar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-hover shadow border-0 h-100 rellax" data-rellax-speed="1">
                        <div class="card-body">
                            <h5 class="card-title">Quality Assurance</h5>
                            <p class="card-text">Memastikan produk sesuai dengan standar mutu dan melakukan pengendalian
                                kualitas.</p>
                            <a href="#daftar" class="btn btn-outline-primary">Lamar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-hover shadow border-0 h-100 rellax" data-rellax-speed="3">
                        <div class="card-body">
                            <h5 class="card-title">Engineer Maintenance</h5>
                            <p class="card-text">Menangani perawatan mesin produksi dan memastikan kelancaran
                                operasional.</p>
                            <a href="#daftar" class="btn btn-outline-primary">Lamar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONI dengan Parallax -->
    <section id="testimoni" class="py-5 bg-light position-relative">
        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1350&q=80"
            class="parallax-bg rellax" data-rellax-speed="-1" alt="Background Testimoni">
        <div class="container position-relative">
            <h2 class="section-title" data-aos="fade-down">Apa Kata Karyawan Kami</h2>
            <div class="row g-4">
                <div class="col-md-6" data-aos="fade-right">
                    <div class="card shadow border-0 rellax" data-rellax-speed="2">
                        <div class="card-body">
                            <p>"Bekerja di PT Team Metal Indonesia membuat saya berkembang pesat baik secara profesional
                                maupun pribadi."</p>
                            <h6 class="mb-0">– Andi, Staff Produksi</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="card shadow border-0 rellax" data-rellax-speed="3">
                        <div class="card-body">
                            <p>"Lingkungan kerja yang mendukung dan banyak kesempatan belajar hal baru."</p>
                            <h6 class="mb-0">– Sinta, Quality Assurance</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center position-relative overflow-hidden">
        <!-- Parallax Floating Icons -->
        <i class="bi bi-gear-fill text-warning fs-1 position-absolute rellax" style="top:20%; left:15%;"
            data-rellax-speed="2"></i>
        <i class="bi bi-people-fill text-info fs-1 position-absolute rellax" style="bottom:25%; right:20%;"
            data-rellax-speed="3"></i>
        <i class="bi bi-lightning-charge-fill text-danger fs-2 position-absolute rellax" style="top:40%; right:10%;"
            data-rellax-speed="1"></i>

        <div class="container position-relative">
            <p class="mb-1">&copy; 2025 PT Team Metal Indonesia. All rights reserved.</p>
            <div>
                <a href="#"><i class="bi bi-facebook me-3"></i></a>
                <a href="#"><i class="bi bi-linkedin me-3"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/rellax/rellax.min.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
        var rellax = new Rellax('.rellax'); // aktifkan parallax
    </script>
</body>

</html>
