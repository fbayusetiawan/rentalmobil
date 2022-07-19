-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 05:24 AM
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
(1, '62c076c7bf771', 'Motor Beat', '0000483401.jpg'),
(2, '62d55d884aa10', 'Motor Beat', '00004834014.jpg');

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
(6, 'Mitsubishi');

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
('62d620416a2c4', 'Civic Type R', 2, 'DA 1111 AB', '2022', 5, 'exterior01__1621657879722.jpg', 'Merah', '1500000', '1500000', 0);

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
('62a9d66ee72e8', 'Bayu Setiawan', '2163150622001', 1, '1997-06-15', 'Tanjung', '085156362232', 'Jl. Handil Bakti Raya Pesona Indah', 3, 0, '286407642_3097630967168101_5867907648036932842_n.jpg', '001', '150000'),
('62bf1c429033e', 'Uchiha Sasuke', '2163010722002', 1, '1997-07-09', 'Konohagakure', '085156362232', 'konohagakure', 3, 0, '075756800_1429344595-sasuke-1borutocapture11.jpg', '002', '150000');

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
('62d55d884aa10', 'alvianor', '$2y$10$asr1spchWdFtxW5dHOFHNOhMvx.MaqNZos8fGb.fp821YBoGB1uTq', 'alvi123', '6309070409701088', 'M. Alvianor', 1, 'Jl. in aja dulu, siapa tau betah', 0, '081251898991', 1658150280, 3, 1, 'e-ktp-guohui-chen.jpg', 'e-ktp-guohui-chen.jpg');

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
(7, '62b2ba316b834', 'Ganti Kaca Spion', '2022-06-28', '500000', 0);

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
('62d11a4e6ae2f', '62b2b9894cfc5', '62a9d66ee72e8', '62cf938c5171d', '2022-07-13', '2022-07-15', '2022-07-15', '500000', '1300000', '00004834012.jpg', 3),
('62d132ada38b3', '62b2b9894cfc5', '62a9d66ee72e8', '62cf938c5171d', '2022-07-14', '2022-07-15', NULL, '500000', '650000', '00004834013.jpg', 2),
('62d55dd3f4157', '62b2ba316b834', '62a9d66ee72e8', '62d55d884aa10', '2022-07-14', '2022-07-16', '2022-07-16', '450000', '1200000', '632ed30944dd6ad9c5b254e3bb866c80.jpg', 3),
('62d6215ba4043', '62d620416a2c4', '62bf1c429033e', '62bf14b24af1f', '2022-07-19', '2022-07-20', NULL, '1500000', '1650000', '632ed30944dd6ad9c5b254e3bb866c801.jpg', 1);

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
  MODIFY `idJaminan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `idMerkMobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
