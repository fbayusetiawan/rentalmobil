<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login - LPPM UNISM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12 p-5">
                                    <div class="mx-auto mb-5">
                                        <a href="index.html">
                                            <img src="<?= base_url() ?>assets/images/logo.png" alt="" height="24" />
                                            <h3 class="d-inline align-middle ml-1 text-logo">LPPM UNISM</h3>
                                        </a>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>

                                    <h6 class="h5 mb-0 mt-4">Welcome back!</h6>
                                    <p class="text-muted mt-1 mb-4">Enter your NIK and password to
                                        access Home.</p>

                                    <form action="<?= base_url('auth/login/logon') ?>" method="post" class="authentication-form">
                                        <div class="form-group">
                                            <label class="form-control-label">NIK</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="nik" required class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <label class="form-control-label">Password</label>
                                            <a href="pages-recoverpw.html" class="float-right text-muted text-unline-dashed ml-1">Forgot your password?</a>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" name="password" required class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit"> Log In
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="<?= base_url('auth/register') ?>" class="text-primary font-weight-bold ml-1">Sign Up</a></p>
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

</body>

</html>