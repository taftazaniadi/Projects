-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2020 at 11:25 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nik` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nik`, `nama`) VALUES
(110203303, 'Endang Susilaningtyas Murniati, S.Pd. I'),
(110203304, 'Dwi Agustina, S.Pd.'),
(110203305, 'Siti Nur Rohmah, A.Md.');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `alias` varchar(5) NOT NULL,
  `wali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `jurusan`, `alias`, `wali`) VALUES
(1, 'Akuntansi dan Keuangan Lembaga', 'XA', 110203303),
(2, 'Akuntansi dan Keuangan Lembaga', 'XB', 110203304),
(3, 'Bisnis Daring dan Pemasaran', 'XA', 110203305);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `jenis`, `bobot`) VALUES
(1, 'akademik', 'benefit', 90);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `akademik` int(11) NOT NULL,
  `prestasi` int(11) NOT NULL,
  `sikap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `siswa`, `semester`, `akademik`, `prestasi`, `sikap`) VALUES
(1, 6100038, 1, 69, 1, 30),
(2, 6100039, 1, 90, 1, 50),
(3, 6100040, 1, 47, 5, 100),
(4, 6100041, 1, 76, 0, 100),
(5, 6100042, 1, 71, 0, 100),
(6, 6100043, 1, 88, 0, 100),
(7, 6100044, 1, 40, 0, 100),
(8, 6100045, 1, 64, 0, 100),
(9, 6100046, 1, 38, 0, 100),
(10, 6100047, 1, 58, 0, 100),
(11, 6100048, 1, 40, 0, 100),
(12, 6100049, 1, 65, 1, 100),
(13, 6100050, 1, 78, 0, 100),
(14, 6100051, 1, 50, 2, 20),
(15, 6100052, 1, 69, 0, 100),
(16, 6100053, 1, 88, 0, 100),
(17, 6100054, 1, 18, 0, 100),
(18, 6100055, 1, 46, 3, 100),
(19, 6100056, 1, 54, 0, 100),
(20, 6100057, 1, 66, 0, 100),
(21, 6100058, 1, 65, 0, 100),
(22, 6100059, 1, 44, 0, 100),
(23, 6100060, 1, 69, 0, 30),
(24, 6100061, 1, 74, 0, 10),
(25, 6100062, 1, 73, 0, 100),
(26, 6100063, 1, 69, 0, 100),
(27, 6100064, 1, 67, 0, 100),
(28, 6100065, 1, 70, 1, 100),
(29, 6100066, 1, 62, 1, 100),
(30, 6100067, 1, 69, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`) VALUES
(3434334, 'jumanto', 2),
(6100038, 'Ahmad anif rizqi', 1),
(6100039, 'Arya maulana', 1),
(6100040, 'eko cahyono', 1),
(6100041, 'juwarni', 1),
(6100042, 'muhammad ridwan', 1),
(6100043, 'meisa musananda', 1),
(6100044, 'zzulfiqor', 1),
(6100045, 'damayanti', 1),
(6100046, 'dwi saputra', 1),
(6100047, 'pandriyan', 1),
(6100048, 'ajin saputra', 2),
(6100049, 'andika rehan', 2),
(6100050, 'ahmad rimba', 2),
(6100051, 'arya kawan', 2),
(6100052, 'dio jotaro', 2),
(6100053, 'ramadhan agung', 2),
(6100054, 'damarjati', 2),
(6100055, 'novi andes', 2),
(6100056, 'riska denavia', 2),
(6100057, 'dwi darmawati', 2),
(6100058, 'bayu permadi', 3),
(6100059, 'saputra ace', 3),
(6100060, 'mella sukma', 3),
(6100061, 'bagas', 3),
(6100062, 'sheila siva', 3),
(6100063, 'rara revaria', 3),
(6100064, 'anggi jati', 3),
(6100065, 'reyhan andrian', 3),
(6100066, 'faizal fakhri', 3),
(6100067, 'dimas destina', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` char(5) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Level` int(11) NOT NULL,
  `Keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Nama`, `Level`, `Keterangan`) VALUES
('00001', 'dimas', 'dimas', 'dimas', 1, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110203306;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
