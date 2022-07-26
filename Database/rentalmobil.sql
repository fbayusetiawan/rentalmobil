-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 03:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `bbm`
--

CREATE TABLE `bbm` (
  `idBbm` varchar(20) NOT NULL,
  `idPegawai` varchar(20) NOT NULL,
  `idMobil` varchar(20) NOT NULL,
  `biayaBbm` varchar(128) NOT NULL,
  `jenisBbm` varchar(50) NOT NULL,
  `tanggalBbm` date NOT NULL,
  `fotoBbm` text NOT NULL,
  `tujuanBbm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bbm`
--

INSERT INTO `bbm` (`idBbm`, `idPegawai`, `idMobil`, `biayaBbm`, `jenisBbm`, `tanggalBbm`, `fotoBbm`, `tujuanBbm`) VALUES
('62df38c634a35', '62d62d2fac055', '62b2b93a93ff1', '20000', 'Pertalite', '2022-07-26', '1.jpg', 'Medan'),
('62df3a00e88a6', '62d62da4e2cd2', '62d620416a2c4', '500000', 'Pertamax Turbo', '2022-07-26', '075756800_1429344595-sasuke-1borutocapture15.jpg', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `idHubungi` int(11) NOT NULL,
  `namaLengkap` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`idHubungi`, `namaLengkap`, `email`, `isi`) VALUES
(1, 'Muhammad Dzaky', 'fachrizalbayusetiawan@gmail.com', 'yttu');

-- --------------------------------------------------------

--
-- Table structure for table `jaminan`
--

CREATE TABLE `jaminan` (
  `idJaminan` int(11) NOT NULL,
  `idPelanggan` varchar(20) NOT NULL,
  `namaJaminan` varchar(128) NOT NULL,
  `fotoJaminan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jaminan`
--

INSERT INTO `jaminan` (`idJaminan`, `idPelanggan`, `namaJaminan`, `fotoJaminan`) VALUES
(2, '62d55d884aa10', 'Motor Beat', '00004834014.jpg'),
(3, '62d6356b7462e', 'Honda PCX', 'download_(2).jpg'),
(4, '62d6322c285a0', 'Honda Beat', 'download_(3).jpg'),
(5, '62d631c59a812', 'Aerox', 'download_(4).jpg'),
(6, '62d631410c804', 'Scoopy', 'download_(5).jpg'),
(7, '62cf938c5171d', 'Scoopy', 'download_(6).jpg'),
(8, '62c076c7bf771', 'Aerox', 'download_(4)1.jpg'),
(9, '62bf14b24af1f', 'Honda PCX', 'download_(2)1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `idMerkMobil` int(11) NOT NULL,
  `namaMerk` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`idMerkMobil`, `namaMerk`) VALUES
(1, 'Toyota'),
(2, 'Honda'),
(3, 'Daihatsu'),
(4, 'Suzuki'),
(5, 'Ford'),
(6, 'Mitsubishi'),
(7, 'BMW'),
(8, 'Mercedes-Benz');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `idMobil` varchar(20) NOT NULL,
  `namaMobil` varchar(128) NOT NULL,
  `idMerkMobil` int(11) NOT NULL,
  `noPlat` varchar(10) NOT NULL,
  `tahunMobil` varchar(4) NOT NULL,
  `jumlahKursi` int(11) NOT NULL,
  `fotoMobil` text NOT NULL,
  `warnaMobil` varchar(50) NOT NULL,
  `hargaSewa` varchar(100) NOT NULL,
  `dendaMobil` varchar(128) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`idMobil`, `namaMobil`, `idMerkMobil`, `noPlat`, `tahunMobil`, `jumlahKursi`, `fotoMobil`, `warnaMobil`, `hargaSewa`, `dendaMobil`, `isActive`) VALUES
('62b2b93a93ff1', 'Innova Reborn V', 1, 'DA 2000 AB', '2015', 8, 'innova_reborn_v_hitam.jpg', 'Hitam', '500000', '500000', 0),
('62b2b9894cfc5', 'Innova Reborn G', 1, 'DA 2022 AB', '2021', 8, 'innova_reborn_v_silver.jpg', 'Silver', '500000', '500000', 1),
('62b2ba316b834', 'Avanza Facelift 2021', 1, 'DA 1011 TA', '2021', 8, 'avanza_facelift_2021.jpg', 'Hitam', '450000', '450000', 0),
('62b2bbbb73242', 'Triton 4x4', 6, 'DA 2142 TH', '2017', 5, 'triton_4x4.jpg', 'Hitam', '700000', '700000', 0),
('62d620416a2c4', 'Civic Type R', 2, 'DA 1111 AB', '2022', 5, 'exterior01__1621657879722.jpg', 'Merah', '1500000', '1500000', 0),
('62d625d9b1eed', 'Xpander', 6, 'B 1234 FG', '2021', 7, 'download_(1).jpg', 'Putih', '850000', '150000', 0),
('62d62aa4d5b5f', '320i Sport', 7, 'B 2358 TR', '2019', 5, 'download_(13).jpg', 'Navy', '2500000', '2500000', 0),
('62d62ba602ec6', 'Freed Psd', 2, 'DA 6565 CD', '2020', 6, 'download_(14).jpg', 'Putih', '650000', '650000', 0),
('62d62c99d3eea', 'Agya', 1, 'D 7686 QR', '2022', 5, 'download_(15).jpg', 'Merah', '400000', '400000', 0),
('62d62d1aaf487', 'Fortuner', 1, 'B 2376 BN', '2022', 7, 'download_(16).jpg', 'Abu-Abu', '650000', '650000', 0),
('62d63d593ef9d', 'Jazz', 2, 'DA 7843 KQ', '2019', 5, 'download_(25).jpg', 'Attract Yellow Pearl', '650000', '650000', 0),
('62d63e25ce721', 'All New Avanza', 1, 'DA 7890 RV', '2021', 8, 'download_(26).jpg', 'Hitam', '400000', '400000', 0),
('62d63ea02c11e', 'Mobilio', 2, 'B 7764 BN', '2019', 7, 'download_(27).jpg', 'Putih', '450000', '450000', 0),
('62d63f3695ad1', 'Pajero Sport 2015', 6, 'DA 3343 JK', '2015', 7, 'download_(28).jpg', 'Putih', '1750000', '1750000', 0),
('62d63f9a9e911', 'CR-V', 2, 'DA 5564 DA', '2022', 7, 'download_(29).jpg', 'Hitam', '2000000', '2000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` varchar(20) NOT NULL,
  `namaPegawai` varchar(50) NOT NULL,
  `noIndukKepegawaian` varchar(16) NOT NULL,
  `jk` int(11) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `tempatLahir` varchar(50) NOT NULL,
  `noWa` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `roleId` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  `foto` text NOT NULL,
  `helpNumber` varchar(3) NOT NULL,
  `hargaSupir` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `namaPegawai`, `noIndukKepegawaian`, `jk`, `tanggalLahir`, `tempatLahir`, `noWa`, `alamat`, `roleId`, `isActive`, `foto`, `helpNumber`, `hargaSupir`) VALUES
('62d62d2fac055', 'wahyu', '2163190722001', 1, '1996-02-13', 'Rantau', '085156362232', 'Jl. Sultan Adam Komp. Mawaddah', 3, 1, 'download.jpg', '001', NULL),
('62d62d836eb76', 'Fahrul', '2163190722002', 1, '1990-08-14', 'Banjarmasin', '085345698429', 'Jl. Mawar', 3, 1, 'images_(1).jpg', '002', NULL),
('62d62da4e2cd2', 'Ardi', '2163190722003', 1, '1996-10-15', 'Binuang', '085345698429', 'Jl. Handil Bakti', 3, 1, 'images_(2).jpg', '003', NULL),
('62d62de3eedbb', 'Daffa', '2163190722004', 1, '1997-09-16', 'Banjarmasin', '08115165050', 'Jl. Kayu Tangi Komp. Kayu Tangi II', 3, 1, 'images_(3).jpg', '004', NULL),
('62d62e4aa3e2c', 'Dzaki ', '2163190722005', 1, '1993-06-09', 'Banjarbaru', '089523104436', 'Jl. Mesjid Jami', 3, 1, 'images3.jpg', '005', NULL),
('62d62ebf38e2b', 'Ujang', '2163190722006', 1, '1995-12-01', 'Banjarmasin', '082190781497', 'Jl. Sultan Adam Komp. Awang Permai 1', 3, 1, 'images_(1)1.jpg', '006', NULL),
('62d62f16dad52', 'Andy', '2163190722007', 1, '1996-08-03', 'Banjarmasin ', '08991111393', 'Jl. Cemara Raya', 3, 1, 'download1.jpg', '007', NULL),
('62d62f7b0b2b3', 'Fajri', '2163190722008', 1, '1989-10-07', 'Kandangan', '085347583299', 'Jl. Raya Banjar Indah ', 3, 1, 'images4.jpg', '008', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `keyPas` text NOT NULL,
  `noKtp` varchar(20) NOT NULL,
  `namaPelanggan` varchar(128) NOT NULL,
  `jk` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `domisili` int(11) NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `dateCreated` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  `fotoKtp` text NOT NULL,
  `fotoSim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `username`, `password`, `keyPas`, `noKtp`, `namaPelanggan`, `jk`, `alamat`, `domisili`, `noTelp`, `dateCreated`, `roleId`, `isActive`, `fotoKtp`, `fotoSim`) VALUES
('62bf14b24af1f', 'naruto', '$2y$10$G/4I6udse07rOX2lT4ISeu7UXaLvak9RunF0eeEJkKfwHFDdy4pEq', 'naruto123', '6309070409701006', 'Uzumaki Naruto', 1, 'Jl. Handil Bakti Raya Pesona Indah', 0, '081251898991', 1656689842, 3, 1, '', ''),
('62c076c7bf771', 'sasuke', '$2y$10$gHbHjCW4UF/e7vXuCzwpU.Sd.EPAVeLQnNY8j4mHCNM.mTDeBQ0Hy', 'sasuke123', '6309070409701009', 'Uchiha Sasuke', 1, 'Jl. Bakti Utama No 1', 1, '081251898991', 1656780487, 3, 1, '', ''),
('62cf938c5171d', 'bayu', '$2y$10$2NWbV2UV3PEIZ8oWK4QNTuGXlrLBnRk.vU9l6FnUZjxk4Fnbslrki', 'bayu123', '6309070409701022', 'Bayu Setiawan', 1, 'Jl. Handil Bakti Raya Pesona Indah', 0, '081251898990', 1657770892, 3, 1, '075756800_1429344595-sasuke-1borutocapture12.jpg', '279860932_407170168081950_6545682480426208850_n1.jpg'),
('62d55d884aa10', 'alvianor', '$2y$10$asr1spchWdFtxW5dHOFHNOhMvx.MaqNZos8fGb.fp821YBoGB1uTq', 'alvi123', '6309070409701088', 'M. Alvianor', 1, 'Jl. in aja dulu, siapa tau betah', 0, '081251898991', 1658150280, 3, 1, 'e-ktp-guohui-chen.jpg', 'e-ktp-guohui-chen.jpg'),
('62d631410c804', 'dinda', '$2y$10$aU/R./CIV8D9MDBe2ueKi.rRBti0LdTdyJArb8kSR26OWuuKuLq6u', 'dinda123', '6635385928423457', 'Dinda Elissa Agustina', 2, 'Jl. Mahat Kasan Gatot Soebroto No.23', 1, '082149343567', 1658204481, 3, 1, 'download_(8).jpg', 'download_(17).jpg'),
('62d631c59a812', 'Elma ', '$2y$10$z4uhdQ3zLzu4CH2YKY1z5u0AF0fRqeYMSnV3NTfjr14f1O8YuDPgO', 'elma123', '6645322411123454', 'Elma Husuna', 2, 'Jl. Adhyaksa ', 0, '089753443276', 1658204613, 3, 1, 'download_(12).jpg', 'download_(18).jpg'),
('62d6322c285a0', 'Bimo', '$2y$10$ddqyIvRAzpQnNet8xiFG2uBy/HeWTF6RxZFp.M88aDycDhI8Eb2ui', 'bimo123', '6465743523658743', 'M. Bimo Fadhlurrahman', 1, 'Jl. Kelayan B Komp. Ar Raudah', 0, '085347273275', 1658204716, 3, 1, 'download_(7).jpg', 'download_(19).jpg'),
('62d6356b7462e', 'alfin', '$2y$10$Hnjv6L9cal9SRz0ScxbzKeV7x75kUVXlsvAltP89NtnGGKMJn/P/G', 'alfin123', '6666455342123455', 'Ahmad Alfin Yanuar Noor Fitri', 1, 'Jl. Banjar Indah Permai Komp. Utan Kayu No.67', 0, '089543551290', 1658205547, 3, 1, 'download_(10).jpg', 'download_(20).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `idService` int(11) NOT NULL,
  `idMobil` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggalService` date NOT NULL,
  `biayaService` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`idService`, `idMobil`, `keterangan`, `tanggalService`, `biayaService`, `status`) VALUES
(6, '62b2b93a93ff1', 'Ganti Kaca Spion', '2022-06-24', '4000000', 0),
(7, '62b2ba316b834', 'Ganti Kaca Spion', '2022-06-28', '500000', 0),
(8, '62b2ba316b834', 'Ganti Oli', '2022-07-12', '300000', 1),
(9, '62d625d9b1eed', 'Kampas dan Minyak Rem', '2022-07-10', '500000', 0),
(10, '62b2b93a93ff1', 'Filter Oli', '2022-07-19', '200000', 0),
(11, '62d62c99d3eea', 'Rotasi Ban ', '2022-07-01', '750000', 1),
(12, '62d63f9a9e911', 'Ganti Oli', '2022-05-24', '300000', 0),
(13, '62d63e25ce721', 'Filter Udara', '2022-06-21', '450000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` varchar(20) NOT NULL,
  `idMobil` varchar(20) NOT NULL,
  `idPegawai` varchar(20) DEFAULT NULL,
  `idPelanggan` varchar(20) NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `tanggalKembali` date NOT NULL,
  `tanggalSelesai` date DEFAULT NULL,
  `harga` varchar(100) NOT NULL,
  `totalHarga` varchar(128) NOT NULL,
  `fotoTransaksi` text NOT NULL,
  `statusTransaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idMobil`, `idPegawai`, `idPelanggan`, `tanggalPinjam`, `tanggalKembali`, `tanggalSelesai`, `harga`, `totalHarga`, `fotoTransaksi`, `statusTransaksi`) VALUES
('62d636019c8dc', '62b2b93a93ff1', '62d62d2fac055', '62d631410c804', '2022-07-05', '2022-07-07', NULL, '500000', '', '', 0),
('62d6422fddeb2', '62d63d593ef9d', '62d62d2fac055', '62d631c59a812', '2022-07-08', '2022-07-09', NULL, '650000', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUsers` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `roleId` int(11) NOT NULL,
  `namaLengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noWa` varchar(20) NOT NULL,
  `isActive` int(11) NOT NULL,
  `foto` text NOT NULL,
  `dateCreated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUsers`, `username`, `password`, `roleId`, `namaLengkap`, `email`, `noWa`, `isActive`, `foto`, `dateCreated`) VALUES
('5f269419c1055', 'admin', '$2y$10$Ws8qar9dptfqGpSXRdaaPeIQ0S76s1WVYUm4nKSSNgUdyVLUIXHhW', 1, 'Erma Ariyani', 'ermaariyani@gmail.com', '081223231212', 1, '', 0),
('6117e8685c0dd', 'supir', '$2y$10$9VPXc9cJ8zvE73KDwUBiAesvMpw2DsNzXoObHUIMgDREOLJ//u3hK', 2, 'Alvin', 'alvin@gmail.com', '081223231212', 1, '', 1628956776);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbm`
--
ALTER TABLE `bbm`
  ADD PRIMARY KEY (`idBbm`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`idHubungi`);

--
-- Indexes for table `jaminan`
--
ALTER TABLE `jaminan`
  ADD PRIMARY KEY (`idJaminan`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`idMerkMobil`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`idMobil`),
  ADD KEY `idMerkMobil` (`idMerkMobil`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`),
  ADD KEY `idMobil` (`idMobil`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idPelanggan` (`idPelanggan`),
  ADD KEY `idMobil` (`idMobil`),
  ADD KEY `idPegawai` (`idPegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `idHubungi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `idJaminan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `idMerkMobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`idMerkMobil`) REFERENCES `merk` (`idMerkMobil`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`idMobil`) REFERENCES `mobil` (`idMobil`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idMobil`) REFERENCES `mobil` (`idMobil`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
