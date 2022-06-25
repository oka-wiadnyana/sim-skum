<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LQE1TV0YFS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-LQE1TV0YFS');
    </script>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIM-SKUM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(''); ?>/img/logo-onsdee86.png" rel="icon">
    <link href="<?= base_url('serenity-assets'); ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('serenity-assets'); ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('serenity-assets'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('serenity-assets'); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('serenity-assets'); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('serenity-assets'); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('serenity-assets'); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('serenity-assets'); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- =======================================================
  * Template Name: Serenity - v4.7.0
  * Template URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1 class="text-light"><a href="index.html">SIM-SKUM</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="<?= base_url('serenity-assets'); ?>/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="<?= ($title == 'Dashboard') ? 'active' : ''; ?>" href="<?= base_url('pengguna'); ?>">Dashboard</a></li>
                    <li><a class="<?= ($title == 'Simulasi gugatan') ? 'active' : ''; ?>" href="<?= base_url('pengguna/gugatan'); ?>">Gugatan</a></li>
                    <li><a class="<?= ($title == 'Simulasi gs') ? 'active' : ''; ?>" href="<?= base_url('pengguna/gugatan_sederhana'); ?>">Gugatan Sederhana</a></li>
                    <li><a class="<?= ($title == 'Simulasi permohonan') ? 'active' : ''; ?>" href="<?= base_url('pengguna/permohonan'); ?>">Permohonan</a></li>
                    <li class="dropdown "><a href="#" class="<?= ($title == 'Simulasi banding' || $title == 'Simulasi Kasasi' || $title == 'Simulasi PK') ? 'active' : ''; ?>"><span>Upaya Hukum</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('pengguna/banding'); ?>">Banding</a></li>
                            <li><a href="<?= base_url('pengguna/kasasi'); ?>">Kasasi</a></li>
                            <li><a href="<?= base_url('pengguna/peninjauan_kembali'); ?>">PK</a></li>

                        </ul>
                    </li>
                    <li><a class="" href="https://drive.google.com/file/d/1uIv6KnrKzND9LcMxr1ECPZNeHW22t9VM/view" target="_blank">SK Biaya Perkara</a></li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container" data-aos="fade-up">
            <h1>Selamat datang di SIM-SKUM</h1>
            <h2>Keterbukaan Biaya Panjar Perkara pada Pengadilan Negeri Negara</h2>
            <a href="<?= base_url('pengguna/gugatan'); ?>" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <?= $this->renderSection('main-content'); ?>

    </main><!-- End #main -->
    <div id="modal-skum">

    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>SIM-SKUM</h3>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Link Terkait</h4>
                        <ul>
                            <li><a href="#">E-Court</a></li>
                            <li><a href="#">PN Negara</a></li>
                            <li><a href="#">PT Denpasar</a></li>
                            <li><a href="#">Dirjen Badilum</a></li>
                            <li><a href="#">Mahkamah Agung</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            Jalan Mayor Sugianyar No. 1 <br>
                            Negara, Bali<br>

                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 footer-visitor">
                        <div class="col-6">
                            <h4>Visitor</h4>
                            <h1><?= session()->get('counter'); ?></h1>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Serenity</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/serenity-bootstrap-corporate-template/ -->
                Designed by <a href="#">BootstrapMade</a>
                <br>
                Powered by <a href=""><img src="<?= base_url('img/logo-onsdee86.png'); ?>" alt="" width="30rem"></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('serenity-assets'); ?>/vendor/purecounter/purecounter.js"></script>
    <script src="<?= base_url('serenity-assets'); ?>/vendor/aos/aos.js"></script>
    <script src="<?= base_url('serenity-assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('serenity-assets'); ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('serenity-assets'); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('serenity-assets'); ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('serenity-assets'); ?>/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url('serenity-assets'); ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('serenity-assets'); ?>/js/main.js"></script>



</body>

</html>