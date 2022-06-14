-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 11:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disperdagin`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `idAbsen` varchar(20) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` int(4) NOT NULL,
  `jumlahHariKerja` int(2) NOT NULL,
  `tanggalInputAbsen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`idAbsen`, `bulan`, `tahun`, `jumlahHariKerja`, `tanggalInputAbsen`) VALUES
('62014b90dadc9', 'Februari', 2022, 25, '2022-02-07'),
('62036dae7ede0', 'Maret', 2022, 27, '2022-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `absen_detail`
--

CREATE TABLE `absen_detail` (
  `idAbsenDetail` int(11) NOT NULL,
  `idAbsen` varchar(20) NOT NULL,
  `idPegawai` varchar(20) NOT NULL,
  `hadir` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `tanpaKeterangan` int(11) NOT NULL,
  `tanggalInput` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_detail`
--

INSERT INTO `absen_detail` (`idAbsenDetail`, `idAbsen`, `idPegawai`, `hadir`, `izin`, `sakit`, `tanpaKeterangan`, `tanggalInput`) VALUES
(12, '62014b90dadc9', '23423r235qw', 24, 0, 0, 1, '2022-02-08'),
(13, '62014b90dadc9', '4283ery239hrd293', 23, 1, 0, 1, '2022-02-08'),
(14, '62036dae7ede0', '23423r235qw', 20, 0, 0, 0, '2022-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `idCuti` varchar(20) NOT NULL,
  `idPegawai` varchar(20) NOT NULL,
  `ns` varchar(3) NOT NULL,
  `br` varchar(6) NOT NULL,
  `ts` int(4) NOT NULL,
  `verify` int(1) NOT NULL,
  `dariTanggal` date NOT NULL,
  `sampaiTanggal` date NOT NULL,
  `alasanCuti` varchar(192) NOT NULL,
  `tanggalPengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`idCuti`, `idPegawai`, `ns`, `br`, `ts`, `verify`, `dariTanggal`, `sampaiTanggal`, `alasanCuti`, `tanggalPengajuan`) VALUES
('61172f5e07546', '4283ery239hrd293', '001', 'VIII', 2021, 4, '2021-08-21', '2021-08-28', 'Pulang Kampung', '2021-08-14'),
('611cdf16a174e', '4283ery239hrd293', '002', 'VIII', 2021, 1, '2021-09-01', '2021-09-11', 'Pulang Kampung', '2021-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `idDepartemen` int(11) NOT NULL,
  `namaDepartemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`idDepartemen`, `namaDepartemen`) VALUES
(1, 'KSM DERMATOLOGI DAN VENEREOLOGI (DV)'),
(2, 'KSM Orthopaedi dan Traumatologi'),
(3, 'KSM Ilmu Kebidanan dan Kandungan'),
(4, 'Kepegawaian');

-- --------------------------------------------------------

--
-- Table structure for table `devisi`
--

CREATE TABLE `devisi` (
  `idDevisi` int(11) NOT NULL,
  `idDepartemen` int(11) NOT NULL,
  `namaDevisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devisi`
--

INSERT INTO `devisi` (`idDevisi`, `idDepartemen`, `namaDevisi`) VALUES
(1, 1, 'Dermatologi Infeksi Tropik'),
(2, 4, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `idGaji` varchar(20) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`idGaji`, `bulan`, `tahun`) VALUES
('620143e626ddc', 'Februari', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_detail`
--

CREATE TABLE `gaji_detail` (
  `idGajiDetail` int(11) NOT NULL,
  `idGaji` varchar(20) NOT NULL,
  `idPegawai` varchar(20) NOT NULL,
  `nominalGaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gaji_rincian`
--

CREATE TABLE `gaji_rincian` (
  `idGajiRincian` int(11) NOT NULL,
  `idGajiDetail` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `nominalRincian` varchar(11) NOT NULL,
  `ket` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji_rincian`
--

INSERT INTO `gaji_rincian` (`idGajiRincian`, `idGajiDetail`, `deskripsi`, `nominalRincian`, `ket`) VALUES
(1, 1, 'a', '1000', '+'),
(2, 1, 'b', '500', '-');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `idGolongan` int(11) NOT NULL,
  `namaGolongan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`idGolongan`, `namaGolongan`) VALUES
(1, 'I A'),
(2, 'I B'),
(3, 'I C'),
(4, 'I D'),
(5, 'II A'),
(6, 'II B'),
(7, 'II C'),
(8, 'II D'),
(9, 'III A'),
(10, 'III B'),
(11, 'III C'),
(12, 'III D'),
(13, 'IV A'),
(14, 'IV B'),
(15, 'IV C'),
(16, 'IV D');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idJabatan` int(11) NOT NULL,
  `namaJabatan` varchar(30) NOT NULL,
  `gapok` int(11) NOT NULL,
  `tjTransport` int(11) NOT NULL,
  `tjMakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idJabatan`, `namaJabatan`, `gapok`, `tjTransport`, `tjMakan`) VALUES
(1, 'Kepala Bagian Keuangan', 3500000, 500000, 250000),
(2, 'Kepala Bagian Kepegawaian', 3500000, 300000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `idKehadiran` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nik` varchar(150) NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `idJabatan` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`idKehadiran`, `bulan`, `nik`, `idPegawai`, `idJabatan`, `hadir`, `sakit`, `alpa`) VALUES
(7, '012022', '0303959232437879', 4283, 1, 3, 0, 0),
(8, '012022', '0303959232437877', 23423, 2, 4, 0, 0),
(9, '022022', '0303959232437879', 4283, 1, 20, 0, 0),
(10, '022022', '0303959232437877', 23423, 2, 25, 0, 0),
(11, '032022', '0303959232437879', 4283, 1, 20, 0, 1),
(12, '032022', '0303959232437877', 23423, 2, 19, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `idMutasi` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `ns` varchar(3) NOT NULL,
  `br` varchar(6) NOT NULL,
  `ts` int(4) NOT NULL,
  `devisiTujuan` int(11) NOT NULL,
  `tanggalMutasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`idMutasi`, `nik`, `ns`, `br`, `ts`, `devisiTujuan`, `tanggalMutasi`) VALUES
('611de3835bc0d', '0303959232437879', '001', 'VIII', 2021, 2, '2021-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `naikpangkat`
--

CREATE TABLE `naikpangkat` (
  `idNaikPangkat` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `ns` varchar(3) NOT NULL,
  `br` varchar(6) NOT NULL,
  `ts` int(4) NOT NULL,
  `tanggalDitetapkan` date NOT NULL,
  `pangkatDitetapkan` int(11) NOT NULL,
  `golonganDitetapkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naikpangkat`
--

INSERT INTO `naikpangkat` (`idNaikPangkat`, `nik`, `ns`, `br`, `ts`, `tanggalDitetapkan`, `pangkatDitetapkan`, `golonganDitetapkan`) VALUES
('611de35a0fde5', '0303959232437877', '001', 'VIII', 2021, '2021-08-31', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `idPangkat` int(11) NOT NULL,
  `namaPangkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`idPangkat`, `namaPangkat`) VALUES
(2, 'Juru Muda Tingkat 1'),
(3, 'Juru Muda Tingkat 1'),
(4, 'Juru');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` varchar(20) NOT NULL,
  `namaPegawai` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `noIndukKepegawaian` varchar(16) NOT NULL,
  `tanggalMulaiBekerja` date NOT NULL,
  `jk` int(11) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `tempatLahir` varchar(50) NOT NULL,
  `statusKepegawaian` int(11) NOT NULL,
  `idJabatan` varchar(30) NOT NULL,
  `noWa` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `roleId` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL,
  `helpNumber` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `namaPegawai`, `nik`, `noIndukKepegawaian`, `tanggalMulaiBekerja`, `jk`, `tanggalLahir`, `tempatLahir`, `statusKepegawaian`, `idJabatan`, `noWa`, `alamat`, `roleId`, `isActive`, `username`, `password`, `foto`, `helpNumber`) VALUES
('23423r235qw', 'Muhammad Irwan', '0303959232437877', '2163260721002', '2021-07-01', 1, '1993-01-01', 'Banjarmasin', 1, '2', '081254361277', 'Jl. Pramuka 02', 3, 1, 'irwan1', '$2y$10$M2A7BcBWPxILImfCtiEYG.XZt9jyA7wSIhK016gdW2kJYM.tyz3U6', '55885cd86e82e0b433da1a27c104e6402.png', '002'),
('4283ery239hrd293', 'Hasbi', '0303959232437879', '2163260721003', '2021-07-25', 1, '1994-07-25', 'Banjarmasin', 1, '1', '081354060005', 'Jl. Pramuka 02', 3, 1, 'uniska', '$2y$10$o/ox/3.rlZhnBjX9m/Kp6uinT7GmgL6iqLJfCxJ4VqCfnChjHsDM6', '55885cd86e82e0b433da1a27c104e6401.png', '001');

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `idPotongan` int(11) NOT NULL,
  `namaPotongan` varchar(128) NOT NULL,
  `jumlahPotongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`idPotongan`, `namaPotongan`, `jumlahPotongan`) VALUES
(1, 'Sakit', 0),
(2, 'Izin', 50000),
(3, 'Tanpa Keterangan', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `idPrestasi` varchar(20) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`idPrestasi`, `bulan`, `tahun`) VALUES
('62014c549ded2', 'Februari', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi_detail`
--

CREATE TABLE `prestasi_detail` (
  `idPrestasiDetail` int(11) NOT NULL,
  `idPrestasi` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `prestasiDiraih` varchar(100) NOT NULL,
  `kerajinan` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `perilaku` int(11) NOT NULL,
  `profesional` int(11) NOT NULL,
  `tanggungJawab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi_detail`
--

INSERT INTO `prestasi_detail` (`idPrestasiDetail`, `idPrestasi`, `nik`, `prestasiDiraih`, `kerajinan`, `kehadiran`, `perilaku`, `profesional`, `tanggungJawab`) VALUES
(3, '62014c549ded2', '0303959232437877', 'Juara 1', 10, 9, 10, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `idShift` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`idShift`, `bulan`, `tahun`) VALUES
(1, 'Agustus', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `shift_detail`
--

CREATE TABLE `shift_detail` (
  `idShiftDetail` int(11) NOT NULL,
  `idShift` int(11) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `idPegawai` varchar(20) NOT NULL,
  `shift` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift_detail`
--

INSERT INTO `shift_detail` (`idShiftDetail`, `idShift`, `hari`, `idPegawai`, `shift`) VALUES
(1, 1, 'Senin', '4283ery239hrd293', '3'),
(3, 1, 'Selasa', '4283ery239hrd293', '1'),
(4, 1, 'Senin', '23423r235qw', '1'),
(5, 1, 'Rabu', '4283ery239hrd293', '1'),
(6, 1, 'Kamis', '4283ery239hrd293', '2'),
(7, 1, 'Jumat', '4283ery239hrd293', '1'),
(8, 1, 'Sabtu', '4283ery239hrd293', '1'),
(9, 1, 'Minggu', '4283ery239hrd293', '3');

-- --------------------------------------------------------

--
-- Table structure for table `teguran`
--

CREATE TABLE `teguran` (
  `idTeguran` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `ns` varchar(3) NOT NULL,
  `br` varchar(6) NOT NULL,
  `ts` int(4) NOT NULL,
  `tanggalTeguran` date NOT NULL,
  `kesalahan` text NOT NULL,
  `hukuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teguran`
--

INSERT INTO `teguran` (`idTeguran`, `nik`, `ns`, `br`, `ts`, `tanggalTeguran`, `kesalahan`, `hukuman`) VALUES
('611fa69e12b6a', '0303959232437877', '001', 'VIII', 2021, '2021-08-20', 'Telat 7 hari berturut-turut', 'SP 1');

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
('5f269419c1055', 'admin', '$2y$10$VBmK3kftKDESFd1OF5xbAudzqhVbJ0YddpeAWfHvo0K0TK8SKzkLq', 1, 'Muhammad Dzaky', 'admin.dzaky@gmail.com', '081223231212', 1, '', 0),
('6117e8685c0dd', 'keuangan', '$2y$10$3Rtgn8VBIS1zEp8C243Pk.JwGg1HB.mAdbVNg/CZt2/Er.AsLD9zW', 2, 'Heldiana Martha, SE', 'firman@gmail.com', '081223231212', 1, '', 1628956776);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`idAbsen`);

--
-- Indexes for table `absen_detail`
--
ALTER TABLE `absen_detail`
  ADD PRIMARY KEY (`idAbsenDetail`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`idCuti`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`idDepartemen`);

--
-- Indexes for table `devisi`
--
ALTER TABLE `devisi`
  ADD PRIMARY KEY (`idDevisi`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`idGaji`);

--
-- Indexes for table `gaji_detail`
--
ALTER TABLE `gaji_detail`
  ADD PRIMARY KEY (`idGajiDetail`);

--
-- Indexes for table `gaji_rincian`
--
ALTER TABLE `gaji_rincian`
  ADD PRIMARY KEY (`idGajiRincian`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`idGolongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idJabatan`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`idKehadiran`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`idMutasi`);

--
-- Indexes for table `naikpangkat`
--
ALTER TABLE `naikpangkat`
  ADD PRIMARY KEY (`idNaikPangkat`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`idPangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`idPotongan`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`idPrestasi`);

--
-- Indexes for table `prestasi_detail`
--
ALTER TABLE `prestasi_detail`
  ADD PRIMARY KEY (`idPrestasiDetail`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`idShift`);

--
-- Indexes for table `shift_detail`
--
ALTER TABLE `shift_detail`
  ADD PRIMARY KEY (`idShiftDetail`);

--
-- Indexes for table `teguran`
--
ALTER TABLE `teguran`
  ADD PRIMARY KEY (`idTeguran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_detail`
--
ALTER TABLE `absen_detail`
  MODIFY `idAbsenDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `idDepartemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `devisi`
--
ALTER TABLE `devisi`
  MODIFY `idDevisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gaji_detail`
--
ALTER TABLE `gaji_detail`
  MODIFY `idGajiDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gaji_rincian`
--
ALTER TABLE `gaji_rincian`
  MODIFY `idGajiRincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `idGolongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idJabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `idKehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `idPangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `idPotongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prestasi_detail`
--
ALTER TABLE `prestasi_detail`
  MODIFY `idPrestasiDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `idShift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shift_detail`
--
ALTER TABLE `shift_detail`
  MODIFY `idShiftDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
