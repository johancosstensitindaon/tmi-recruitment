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

        .hero {
            height: 100vh;
            min-height: 500px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: -2;
        }

        /* Overlay gelap agar teks tetap terbaca */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: -1;
        }

        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .hero {
                height: 80vh;
                /* biar tidak terlalu tinggi di HP */
            }

            .hero-bg {
                object-position: center center;
                /* fokus tengah */
            }

            .display-4 {
                font-size: 1.8rem;
            }

            .lead {
                font-size: 1rem;
            }
        }

        .swiper {
            padding: 20px 0;
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .swiper {
            padding-bottom: 50px;
            /* kasih ruang kosong di bawah slider */
        }

        .swiper-pagination {
            position: relative !important;
            /* ubah dari absolute ke relative */
            margin-top: 20px;
            /* jarak pagination dengan card */
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


    <section class="hero position-relative">
        <!-- Video Background -->
        <video autoplay muted loop playsinline class="hero-bg">
            <source src="{{ asset('tmi/tm-bg-video.mp4') }}" type="video/mp4">
            Browser Anda tidak mendukung video tag.
        </video>

        <!-- Overlay -->
        <div class="hero-overlay"></div>

        <!-- Konten -->
        <div class="container position-relative text-white text-center px-3" data-aos="fade-up">
            <h1 class="display-4 fw-bold">Bangun Karirmu Bersama Kami</h1>
            <p class="lead">Mari bergabung dengan PT Team Metal Indonesia dan kembangkan potensi terbaikmu.</p>
            <a href="#lowongan" class="btn btn-lg btn-warning rounded-pill mt-3">Lihat Lowongan</a>
        </div>
    </section>

    <!-- LOWONGAN -->
    <!-- Lowongan Section -->
    <section id="lowongan" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-4" data-aos="fade-down">Lowongan Tersedia</h2>

            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper mb-10">

                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="card card-hover shadow border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">Staff Produksi</h5>
                                <p class="card-text">Bertanggung jawab terhadap proses produksi dengan standar kualitas
                                    perusahaan.</p>
                                <a href="#daftar" class="btn btn-outline-primary">Lamar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="card card-hover shadow border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">Quality Assurance</h5>
                                <p class="card-text">Memastikan produk sesuai dengan standar mutu dan melakukan
                                    pengendalian kualitas.</p>
                                <a href="#daftar" class="btn btn-outline-primary">Lamar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="card card-hover shadow border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">Engineer Maintenance</h5>
                                <p class="card-text">Menangani perawatan mesin produksi dan memastikan kelancaran
                                    operasional.</p>
                                <a href="#daftar" class="btn btn-outline-primary">Lamar</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card card-hover shadow border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">Engineer Maintenance</h5>
                                <p class="card-text">Menangani perawatan mesin produksi dan memastikan kelancaran
                                    operasional.</p>
                                <a href="#daftar" class="btn btn-outline-primary">Lamar</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card card-hover shadow border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">Engineer Maintenance</h5>
                                <p class="card-text">Menangani perawatan mesin produksi dan memastikan kelancaran
                                    operasional.</p>
                                <a href="#daftar" class="btn btn-outline-primary">Lamar</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card card-hover shadow border-0 h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">Engineer Maintenance</h5>
                                <p class="card-text">Menangani perawatan mesin produksi dan memastikan kelancaran
                                    operasional.</p>
                                <a href="#daftar" class="btn btn-outline-primary">Lamar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Tambah slide lain sesuai kebutuhan -->
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination mt-4"></div>

                <div class="text-center mt-3">
                    <a href="/lowongan" class="btn btn-warning rounded-pill px-4">
                        Lihat Semua Lowongan
                    </a>
                </div>

                <!-- Navigation -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- TENTANG -->
    <section id="tentang" class="py-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-down">Tentang Kami</h2>
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="zoom-in">
                    <img src="{{ asset('tmi/img.jpg') }}" class="img-fluid rounded shadow"
                        alt="PT Team Metal Indonesia">
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


    <!-- FOOTER -->
    <footer class="text-center">
        <div class="container">
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
    <!-- Swiper CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Swiper Init -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                }, // tablet
                992: {
                    slidesPerView: 3
                } // desktop
            }
        });
    </script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
        var rellax = new Rellax('.rellax'); // aktifkan parallax
    </script>
</body>

</html>
