<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Daftar Akun Nasir Rental Banjarmasin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12 p-5">
                                    <div class="mx-auto mb-5">
                                        <a href="">
                                            <img src="<?= base_url() ?>assets/images/logorental.png" alt="" height="100" class="mx-auto d-block" />
                                            <h3 class=" align-middle ml-1 text-center text-logo">CV NASIR RENTAL MOBIL</h3>
                                            <h4 class=" align-middle ml-1 text-center text-logo">Kota Banjarmasin</h4>
                                        </a>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">Buat Akun Anda</h6>
                                    <p class="text-muted mt-0 mb-4">Membuat akun akan memudahkan anda untuk mengakses dan bertransaksi di Nasir Rental Banjarmasin</p>

                                    <form action="<?= base_url('auth/register/add_action') ?>" method="Post" class="needs-validation authentication-form" novalidate>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">Username</label>
                                            <input type="text" name="username" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Harap Diisi!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Harap Diisi!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">Ulangi Password</label>
                                            <input type="password" name="keyPas" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Harap Diisi!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">No KTP</label>
                                            <input type="text" name="noKtp" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Harap Diisi!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">Nama Lengkap</label>
                                            <input type="text" name="namaPelanggan" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Harap Diisi!
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01">Jenis Kelamin </label>
                                            <?= form_dropdown('jk', fd_jk(), '', 'class="form-control"') ?>
                                            <div class="invalid-feedback">
                                                Harus diisi!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Harap Diisi!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">No Telepon</label>
                                            <input type="text" name="noTelp" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Harap Diisi!
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                                <label class="custom-control-label" for="checkbox-signup">
                                                    I accept <a href="javascript: void(0);">Terms and Conditions</a>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Sudah Punya Akun? <a href="<?= base_url('auth/login') ?>" class="text-primary font-weight-bold ml-1">Login</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>

    <script src="<?= base_url() ?>assets/js/pages/form-validation.init.js"></script>

</body>

</html>