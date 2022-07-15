<!-- ========== Left Sidebar Start ========== -->
<?php
$tglkemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
$tglA = date('d');
$getTgl = $tglA - 1;
$kurangTgl        = mktime(0, 0, 0, date("n"), date("j") - $getTgl, date("Y"));
$hasilTgl = date('Y-m-d', $kurangTgl);
?>
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="<?= base_url() ?>assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="<?= base_url() ?>assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0"><?= $this->session->userdata('namaLengkap'); ?></h6>
            <?php if ($this->session->userdata('roleId') == '1') : ?>
                <span class="pro-user-desc">Administrator</span>
            <?php elseif ($this->session->userdata('roleId') == '2') : ?>
                <span class="pro-user-desc">Keuangan</span>
            <?php elseif ($this->session->userdata('roleId') == '2') : ?>
                <span class="pro-user-desc">Pegawai</span>
            <?php endif ?>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">

                <a href="<?= base_url('Auth/Logout') ?>" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Navigation</li>

                <li>
                    <a href="<?= base_url('Admin/Dashboard') ?>">
                        <i data-feather="home"></i>
                        <!-- <span class="badge badge-success float-right">1</span> -->
                        <span> Dashboard </span>
                    </a>
                </li>

                <?php if ($this->session->userdata('roleId') == '1') : ?>

                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="truck"></i>
                            <span> Transaksi </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="<?= base_url('Datamaster/Transaksi') ?>">New</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Datamaster/Transaksi/Accept') ?>">Dirental</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Datamaster/Transaksi/Selesai') ?>">Selesai Dirental</a>
                            </li>
                        </ul>
                    <li>
                    <li>
                        <a href="<?= base_url('Admin/Service') ?>">
                            <i data-feather="settings"></i>
                            <span> Service </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Admin/Jaminan') ?>">
                            <i data-feather="tag"></i>
                            <span> Jaminan </span>
                        </a>
                    </li>
                    <li class="menu-title">Master Data</li>
                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="user-plus"></i>
                            <span> Pelanggan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="<?= base_url('Datamaster/Pelanggan') ?>">Data Pelanggan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Datamaster/Pesan') ?>">Pesan</a>
                            </li>
                        </ul>
                    <li>
                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="truck"></i>
                            <span> Mobil </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="<?= base_url('Datamaster/Mobil') ?>">Mobil</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Datamaster/Merk') ?>">Pabrik Mobil</a>
                            </li>
                        </ul>
                    <li>
                        <a href="<?= base_url('Datamaster/Supir') ?>">
                            <i data-feather="users"></i>
                            <span> Supir </span>
                        </a>
                    </li>
                    <li>

                        <a href="<?= base_url('Datamaster/Users') ?>">
                            <i data-feather="user"></i>
                            <span> Users </span>
                        </a>
                    </li>

                <?php elseif ($this->session->userdata('roleId') == '2') : ?>
                    <li>
                        <a href="<?= base_url('Admin/Gaji/') ?>">
                            <i data-feather="book"></i>
                            <span> Penggajian </span>
                        </a>
                    </li>
                <?php elseif ($this->session->userdata('roleId') == '3') : ?>
                    <li>
                        <a href="<?= base_url('Admin/Absen/pegawai') ?>">
                            <i data-feather="book"></i>
                            <span> Absensi </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="inbox"></i>
                            <span> Cuti </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="<?= base_url('Admin/Cuti/Pengajuan') ?>">Pengajuan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Admin/Cuti/riwayat') ?>">Riwayat</a>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>
                <li class="menu-title">Report</li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="file-text"></i>
                        <span> Laporan </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="<?= base_url('laporan/mobil') ?>" target="_blank">Mobil</a>
                        </li>
                        <li>
                            <a href="<?= base_url('laporan/supir') ?>" target="_blank">Supir</a>
                        </li>
                        <li>
                            <a href="<?= base_url('laporan/pelanggan') ?>" target="_blank">Pelanggan</a>
                        </li>
                        <li>
                            <a href="<?= base_url('laporan/transaksi') ?>" target="_blank">Transaksi</a>
                        </li>
                        <li>
                            <a href="<?= base_url('laporan/selesai') ?>" target="_blank">Transaksi Selesai</a>
                        </li>
                        <li>
                            <a href="<?= base_url('laporan/jaminan') ?>" target="_blank">Data Jaminan</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
<div class="modal fade" id="m_pelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('laporan/pelanggan') ?>" method="post" target="_blank">
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Dari</label>
                        <input type="date" name="dari" value="<?= $hasilTgl ?>" class="form-control">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Sampai</label>
                        <input type="date" name="sampai" value="<?= $tglkemarin ?>" class="form-control">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Print</button>
                </form>
            </div>
        </div>
    </div>
</div>