-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 02:15 AM
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
(1, 'Muhammad Dzaky', 'fachrizalbayusetiawan@gmail.com', 'yttu'),
(2, 'Erma Ariyani', 'fachrizalbayusetiawan@gmail.com', 'sdfewgegetregfsdgre');

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
  `ac` int(11) NOT NULL,
  `driver` int(11) NOT NULL,
  `keyCar` int(11) NOT NULL,
  `foto` text NOT NULL,
  `warnaMobil` varchar(50) NOT NULL,
  `hargaSewa` varchar(100) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`idMobil`, `namaMobil`, `idMerkMobil`, `noPlat`, `tahunMobil`, `jumlahKursi`, `ac`, `driver`, `keyCar`, `foto`, `warnaMobil`, `hargaSewa`, `isActive`) VALUES
('62b2b93a93ff1', 'Innova Reborn V', 1, 'DA 2000 AB', '2015', 8, 1, 0, 1, 'innova_reborn_v_hitam.jpg', 'Hitam', '500000', 0),
('62b2b9894cfc5', 'Innova Reborn V', 1, 'DA 2022 AB', '2021', 8, 0, 0, 0, 'innova_reborn_v_silver.jpg', 'Silver', '500000', 0),
('62b2ba316b834', 'Avanza Facelift 2021', 1, 'DA 1011 TA', '2021', 8, 1, 0, 0, 'avanza_facelift_2021.jpg', 'Hitam', '450000', 0),
('62b2bbbb73242', 'Triton 4x4', 6, 'DA 2142 TH', '2017', 5, 1, 0, 0, 'triton_4x4.jpg', 'Hitam', '700000', 1);

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
  `helpNumber` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `namaPegawai`, `noIndukKepegawaian`, `jk`, `tanggalLahir`, `tempatLahir`, `noWa`, `alamat`, `roleId`, `isActive`, `foto`, `helpNumber`) VALUES
('62a9d66ee72e8', 'Bayu Setiawan', '2163150622001', 1, '1997-06-15', 'Tanjung', '085156362232', 'Jl. Handil Bakti Raya Pesona Indah', 3, 0, '286407642_3097630967168101_5867907648036932842_n.jpg', '001'),
('62bf1c429033e', 'Uchiha Sasuke', '2163010722002', 1, '1997-07-09', 'Konohagakure', '085156362232', 'konohagakure', 3, 0, '075756800_1429344595-sasuke-1borutocapture11.jpg', '002');

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
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `username`, `password`, `keyPas`, `noKtp`, `namaPelanggan`, `jk`, `alamat`, `domisili`, `noTelp`, `dateCreated`, `roleId`, `isActive`) VALUES
('62bf14b24af1f', 'naruto', '$2y$10$G/4I6udse07rOX2lT4ISeu7UXaLvak9RunF0eeEJkKfwHFDdy4pEq', 'naruto123', '6309070409701006', 'Uzumaki Naruto', 1, 'Jl. Handil Bakti Raya Pesona Indah', 0, '081251898991', 1656689842, 3, 1),
('62c076c7bf771', 'sasuke', '$2y$10$gHbHjCW4UF/e7vXuCzwpU.Sd.EPAVeLQnNY8j4mHCNM.mTDeBQ0Hy', 'sasuke123', '6309070409701009', 'Uchiha Sasuke', 1, 'Jl. Bakti Utama No 1', 1, '081251898991', 1656780487, 3, 1),
('62c0776f19a20', 'sakura', '$2y$10$reIENrn7x57LzEoIPKUypedGaw4mdKbIm8r5Rp.MrT/5ueCZbNoj6', 'sakura123', '6309070409701008', 'Sakura Haruno', 2, 'Jl. Jahri Saleh, Komp. Kenanga Indah ', 0, '081251898992', 1656780655, 3, 1);

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
  `hari` varchar(4) NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `tanggalKembali` date NOT NULL,
  `harga` varchar(100) NOT NULL,
  `denda` varchar(100) DEFAULT NULL,
  `lokasi` text NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idMobil`, `idPegawai`, `idPelanggan`, `hari`, `tanggalPinjam`, `tanggalKembali`, `harga`, `denda`, `lokasi`, `isActive`) VALUES
('62c411d49e031', '62b2b9894cfc5', '62a9d66ee72e8', '62bf14b24af1f', '', '2022-07-05', '2022-07-06', '500000', '', 'tanjung', 0);

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
  ADD PRIMARY KEY (`idService`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idPelanggan` (`idPelanggan`),
  ADD KEY `idMobil` (`idMobil`);

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
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idMobil`) REFERENCES `mobil` (`idMobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
