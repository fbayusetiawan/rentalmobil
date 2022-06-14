<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>LPPM - Universitas Sari Mulia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- plugins -->
    <link href="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />


</head>

<body data-layout="topnav">
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <!-- Topbar Start -->
        <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
            <div class="container-fluid">
                <!-- LOGO -->
                <a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/images/logo.png" alt="" height="24" />
                        <span class="d-inline h5 ml-1 text-logo">LPPM UNISM</span>
                    </span>
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/images/logo.png" alt="" height="24">
                    </span>
                </a>

                <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                    <li class="">
                        <button class="button-menu-mobile open-left disable-btn">
                            <i data-feather="menu" class="menu-icon"></i>
                            <i data-feather="x" class="close-icon"></i>
                        </button>
                    </li>
                </ul>

                <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
                    <!-- <li class="d-none d-sm-block">
                        <div class="app-search">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span data-feather="search"></span>
                                </div>
                            </form>
                        </div>
                    </li> -->

                    <li class="dropdown notification-list align-self-center profile-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <div class="media user-profile ">
                                <img src="<?= base_url() ?>assets/images/users/avatar-7.jpg" alt="user-image" class="rounded-circle align-self-center" />
                                <div class="media-body text-left">
                                    <h6 class="pro-user-name ml-2 my-0">
                                        <span>Shreyu N</span>
                                        <span class="pro-user-desc text-muted d-block mt-1">NIK <?= $this->session->userdata('nik') ?> </span>
                                    </h6>
                                </div>
                                <span data-feather="chevron-down" class="ml-2 align-self-center"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu profile-dropdown-items dropdown-menu-right">
                            <a href="pages-profile.html" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>My Account</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                                <span>Settings</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                                <span>Support</span>
                            </a>

                            <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                                <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end Topbar -->

        <div class="topnav shadow-sm">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topbar-nav">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="<?= base_url('home/dashboard') ?>">
                                    <i data-feather="home"></i>
                                    <span class="badge badge-success float-right">1</span>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="menu-title">Apps</li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="briefcase"></i>
                                    <span> PKM </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="<?= base_url('pkm/pengabdian') ?>">Pengabdian Kepada Masyarakat <span><small>*</small></span></a>
                                    </li>
                                    <li>
                                        <a href="email-read.html">Publikasi Jurnal</a>
                                    </li>
                                    <li>
                                        <a href="email-compose.html">Publikasi Media Massa</a>
                                    </li>
                                    <li>
                                        <a href="email-compose.html">Forum Ilmiah</a>
                                    </li>
                                    <li>
                                        <a href="email-compose.html">HKI</a>
                                    </li>
                                    <li>
                                        <a href="email-compose.html">Buku Ajar</a>
                                    </li>
                                    <li>
                                        <a href="email-compose.html">Roadmap <span><small>*</small></span></a>
                                    </li>
                                    <li>
                                        <a href="email-compose.html">Wirausaha Baru Mandiri</a>
                                    </li>
                                    <li>
                                        <a href="email-compose.html">Pengembangan Bidang Keilmuan</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="briefcase"></i>
                                    <span> Penelitian Dosen</span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="project-list.html">List</a>
                                    </li>
                                    <li>
                                        <a href="project-detail.html">Detail</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>


        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0"><?= $titlePage ?></h4>
                        </div>
                    </div>

                    <?= $contents ?>

                </div>
            </div>


            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            2020 &copy; LPPM UNISM. All Rights Reserved. Crafted with <i class='uil uil-heart text-danger font-size-12'></i> by <a href="javascript: void(0);"">BlackCoffee</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <div class=" rightbar-overlay"></div>
                        <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>
                        <script src="<?= base_url() ?>assets/libs/moment/moment.min.js"></script>
                        <!-- <script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script> -->
                        <script src="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>

                        <!-- page js -->
                        <!-- <script src="<?= base_url() ?>assets/js/pages/dashboard.init.js"></script> -->

                        <!-- App js -->
                        <script src="<?= base_url() ?>assets/js/app.min.js"></script>
                        <script src="<?= base_url() ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
                        <script src="<?= base_url() ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
                        <script src="<?= base_url() ?>assets/libs/select2/select2.min.js"></script>
                        <script src="<?= base_url() ?>assets/libs/multiselect/jquery.multi-select.js"></script>
                        <script src="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
                        <script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script>
</body>

</html>