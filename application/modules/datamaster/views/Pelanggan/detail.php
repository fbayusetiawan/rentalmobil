<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">

            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Detail Data <?= $row->namaPelanggan ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <img src="<?= base_url('upload/' . $row->foto) ?>" width="200" class="mb-5" alt=""> -->
                <table width="100%">
                    <tr>
                        <th width="25%">No. Identitas</th>
                        <th>: <?= $row->noKtp ?></th>
                    </tr>
                    <tr>
                        <th width="25%">Nama Lengkap</th>
                        <th>: <?= $row->namaPelanggan ?></th>
                    </tr>
                    <tr>
                        <th width="25%">Username</th>
                        <th>: <?= $row->username ?></th>
                    </tr>
                    <tr>
                        <th width="25%">Password</th>
                        <th>: <?= $row->keyPas ?></th>
                    </tr>

                    <tr>
                        <th>Jenis Kelamin</th>
                        <th>: <?= fd_jk($row->jk) ?></th>
                    </tr>
                    <tr>
                        <th>Nomer Telepon</th>
                        <th>: <?= $row->noTelp ?></th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>: <?= $row->alamat ?></th>
                    </tr>
                    <tr>
                        <th>Member Sejak</th>
                        <th>: <?= date('d F Y', $row->dateCreated) ?></th>
                    </tr>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->