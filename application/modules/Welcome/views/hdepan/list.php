<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative" data-dot="<img src='<?= base_url() ?>assets/images/cvnasirrental.jpeg'>">
            <img class="img-fluid" src="<?= base_url() ?>assets/images/cvnasirrental.jpeg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <!-- <h1 class="display-2 text-white animated slideInDown">Nasir Rental Banjarmasin</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Mobil Seribu Sungai</p> -->
                            <!-- <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read More</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative" data-dot="<img src='<?= base_url() ?>assets/images/fotbar.jpeg'>">
            <img class="img-fluid" src="<?= base_url() ?>assets/images/fotbar.jpeg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <!-- <h1 class="display-2 text-white animated slideInDown">Pioneers Of Solar And Renewable Energy</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                            <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read More</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Feature Start -->

<!-- Feature Start -->


<!-- About Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="<?= base_url() ?>assets/images/rent1.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <h6 class="text-primary">Tentang Kami</h6>
                    <h1 class="mb-4">Nasir Rental Banjarmasin</h1>
                    <p>Nasir Rental merupakan salah satu perusahaan jasa sewa mobil yang berkantor pusat di Banjarmasin, Kalimantan Selatan. Selain melayani jasa sewa mobil di Banjarmasin dan seluruh pulau Kalimantan khususnya, kami juga melayani pemesanan hingga ke seluruh Indonesia dengan banyak cabang di berbagai kota besar.</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Keselamatan Kelancaran</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Kenyamanan Perjalanan Anda</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Kapasitas Prioritas Utama Kami</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Explore More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Our Services</h6>
            <h1 class="mb-4">Pilihan Pelanggan</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($data as $row) : ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded overflow-hidden">
                        <img class="img-fluid" src="<?= base_url('upload/' . $row->fotoMobil) ?>" alt="">
                        <div class="position-relative p-4 pt-0">
                            <h4 class="mb-3"><?= $row->namaMerk ?> <?= $row->namaMobil ?></h4>
                            <p>Mobil : <?= $row->namaMerk ?> <?= $row->namaMobil ?> <br>
                                Warna : <?= $row->warnaMobil ?> <br>
                                Kursi : <?= $row->jumlahKursi ?> <br>
                                Tahun : <?= $row->tahunMobil ?></p>
                                Harga Sewa : Rp.<?= number_format(floatval($row->hargaSewa), 0, ',', '.') ?>/Hari</p>
                                <?php if ($row->isActive == "0"){
                                    // echo ' <a class="small fw-medium" href="'. base_url('/Welcome/hdepan/detail/' . $row->idMobil) .'">Pesan Sekarang<i class="fa fa-arrow-right ms-2"></i></a>';
                                    echo ' <a class="small fw-medium" href="'. base_url('Auth/login') .'">Pesan Sekarang<i class="fa fa-arrow-right ms-2"></i></a>';
                                } else {
                                   echo '<span class="small fw-medium">Sedang Dirental</span>';
                                } 
                                ?>
                           
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Feature Start -->

<!-- Feature End -->


<!-- Projects Start -->

<!-- Projects End -->


<!-- Quote Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container quote px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="<?= base_url() ?>assets/images/fotbar.jpeg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <h6 class="text-primary">Tanya Yuk</h6>
                    <h1 class="mb-4">Silahkan tanya-tanya dulu</h1>
                    <p class="mb-4 pb-2">Yang mau tanya-tanya, bisa kirim dengan mengisi form dibawah ini. Semua pertanyaan akan dijawab melalui email yang dikirimkan.</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Nama" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" placeholder="Pesan"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quote End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Team Member</h6>
            <h1 class="mb-4">Experienced Team Members</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden">
                    <div class="d-flex">
                        <img class="img-fluid w-75" src="<?= base_url() ?>assets/landingpage/img/team-1.jpg" alt="">
                        <div class="team-social w-25">
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="p-4">
                        <h5>Full Name</h5>
                        <span>Designation</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded overflow-hidden">
                    <div class="d-flex">
                        <img class="img-fluid w-75" src="<?= base_url() ?>assets/landingpage/img/team-2.jpg" alt="">
                        <div class="team-social w-25">
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="p-4">
                        <h5>Full Name</h5>
                        <span>Designation</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded overflow-hidden">
                    <div class="d-flex">
                        <img class="img-fluid w-75" src="<?= base_url() ?>assets/landingpage/img/team-3.jpg" alt="">
                        <div class="team-social w-25">
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="p-4">
                        <h5>Full Name</h5>
                        <span>Designation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <!-- <h6 class="text-primary">Why</h6> -->
            <h1 class="mb-4">Kenapa Harus Nasir Rental</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="<?= base_url() ?>assets/images/logorental.png">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Garansi kepuasan dan Keamanan dari Pelanggan kami adalah tujuan dan misi utama Kami.</p>
                    <h5 class="mb-1">Aman dan Nyaman</h5>
                    <!-- <span class="fst-italic">Profession</span> -->
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="<?= base_url() ?>assets/images/logorental.png">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Kami memberikan penawaran harga terbaik jika Anda sewa mobil di tempat kami. Harga murah pelayanan terbaik.</p>
                    <h5 class="mb-1">Harga Sewa Termurah</h5>
                    <!-- <span class="fst-italic">Profession</span> -->
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="<?= base_url() ?>assets/images/logorental.png">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Ketepatan waktu penjemputan adalah salah satu keunggulan kami daripada rental mobil lainnya. Dimanapun lokasi penjemputan, kami selalu siap.</p>
                    <h5 class="mb-1">Garansi Tepat Waktu</h5>
                    <!-- <span class="fst-italic">Profession</span> -->
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="<?= base_url() ?>assets/images/logorental.png">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Setiap pengemudi kami sangat berpengalaman dan menguasai medan, sopan serta profesional.</p>
                    <h5 class="mb-1">Driver Profesional</h5>
                    <!-- <span class="fst-italic">Profession</span> -->
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="<?= base_url() ?>assets/images/logorental.png">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Kami mempunyai armada terlengkap di Banjarmasin. Mulai dari mobil MPV, SUV, Sedan, Minibus, dll.</p>
                    <h5 class="mb-1">Armada Terlengkap</h5>
                    <!-- <span class="fst-italic">Profession</span> -->
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="<?= base_url() ?>assets/landingpage/img/testimonial-3.jpg">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Kami selalu memberikan pelayanan yang ramah dan bersahabat mulai dari Customer Service hingga Driver yang melayani Anda.</p>
                    <h5 class="mb-1">Ramah & Bersahabat</h5>
                    <!-- <span class="fst-italic">Profession</span> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->




