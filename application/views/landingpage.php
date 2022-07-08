<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nasir Rental Banjarmasin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url() ?>assets/images/logorental.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>assets/landingpage/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/landingpage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/landingpage/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>assets/landingpage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>assets/landingpage/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <!-- <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Jl. Banjar Permai IV No.185, RT.05/RW.01</small>
                </div> -->
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small><span id="tanggalwaktu"></span></small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small><a href="whatsapp://send?text=Hello&phone=+6285348139364">085348139364</a></small>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <h2 class="m-0 text-primary">Nasir Rental Banjarmasin</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?= base_url() ?>" class="nav-item nav-link active">Home</a>
                <a href="<?= base_url('Landingpage/Hdepan/kontak') ?>" class="nav-item nav-link">Kontak</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Halo, <?= $this->session->userdata('namaLengkap'); ?></a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="<?= base_url('Auth/logout') ?>" class="dropdown-item">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <?= $contents ?>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h5 class="text-white mb-4">Hubungi Kami</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Banjar Permai IV No 185 RT 05 RW 01 Kelurahan Pemurus Dalam, Selatanah, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70248</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><a href="whatsapp://send?text=Hello&phone=+6285348139364">085348139364</a></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>nasirrentalbjm@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light btn-social" href="https://www.facebook.com/nasirrentalmobil/"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href="https://www.instagram.com/nasirrentalmobil/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-6">
                    <h5 class="text-white mb-4">Galeri</h5>
                    <div class="row g-2">
                        <?php foreach ($data as $row) : ?>
                            <div class="col-4">
                                <img class="img-fluid rounded" src="<?= base_url('upload/' . $row->foto) ?>" alt="">
                            </div>
                        <?php endforeach ?>
                    </div>
                </div> -->

            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Nasir Rental Banjarmasin</a>. All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/landingpage/lib/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/landingpage/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>assets/landingpage/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/landingpage/lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/landingpage/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/landingpage/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/landingpage/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>assets/landingpage/js/main.js"></script>
    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
        else(a = tw.getTime());
        tw.setTime(a);
        var tahun = tw.getFullYear();
        var hari = tw.getDay();
        var bulan = tw.getMonth();
        var tanggal = tw.getDate();
        var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
        var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
        document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;
    </script>
</body>

</html>