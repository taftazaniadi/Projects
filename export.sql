-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2020 at 01:51 PM
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
(4, 'akademik', 'benefit', 90),
(5, 'prestasi', 'benefit', 54);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `normalisasi` float NOT NULL,
  `preferensi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `siswa`, `semester`, `kriteria`, `nilai`, `normalisasi`, `preferensi`) VALUES
(33, 6100040, 1, 5, 90, 0.25, 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id` int(11) NOT NULL,
  `kriteria` int(11) NOT NULL,
  `parameter_nilai` varchar(50) NOT NULL,
  `bobot_parameter` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id`, `kriteria`, `parameter_nilai`, `bobot_parameter`, `keterangan`) VALUES
(3, 4, '>80 dan <98', 1, 'rata-rata');

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `total` float NOT NULL,
  `peringkat` int(11) NOT NULL,
  `keputusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
