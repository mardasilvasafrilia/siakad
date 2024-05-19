-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 10:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `id` int(11) NOT NULL,
  `tahun_angkatan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id`, `tahun_angkatan`) VALUES
(1, 2018),
(2, 2019),
(3, 2020),
(4, 2021),
(5, 2022),
(6, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nr` varchar(6) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `gelar` varchar(5) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `mapel_diampu` varchar(20) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nr`, `nama_guru`, `gelar`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `tempat_lahir`, `pendidikan`, `mapel_diampu`, `no_tlp`, `email`) VALUES
(1, '001', 'Pak Widi', 'Phd', 'L', 'Jl. Merah Delima Bekasi', '1975-03-28', 'Jawa', 'S4', 'PJOK', '0896224587', 'widi@gmail.com'),
(4, '002', 'Bu Nurul', 'ST', 'P', 'Jl. Merak', '1985-05-20', 'Padang', 'S2', 'B.Inggris', '096588124', 'nurul@gmail.com'),
(7, '003', 'Bu Susan ', 'Phd', 'P', 'Jl. Mawar Putih', '2023-09-22', 'Jawa Tengah', 'S1', 'B.Sunda', '0987827837', 'susan@gmail.com'),
(10, '004', 'fiqri noor hadi', 'ST', 'L', 'bekasi', '2023-09-06', 'bandung', 'strata sat', 'pwpb', '0879678876', 'f@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mengajar`
--

CREATE TABLE `guru_mengajar` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mata_pelajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kkm` int(2) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru_mengajar`
--

INSERT INTO `guru_mengajar` (`id`, `id_guru`, `id_mata_pelajaran`, `id_kelas`, `kkm`, `id_semester`) VALUES
(3, 4, 3, 12, 75, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `alias_jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `alias_jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'RPL'),
(2, 'Teknik Kendaraan Ringan', 'TKR'),
(3, 'Teknik Instalasi Tenaga Listrik', 'TITL'),
(4, 'Teknik Audio Vidio', 'TAV');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_mapel`
--

CREATE TABLE `kategori_mapel` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_mapel`
--

INSERT INTO `kategori_mapel` (`id`, `nama_kategori`) VALUES
(1, 'Muatan Nasional'),
(2, 'Muatan Kewilayahan'),
(3, 'Kelompok Kejuruan'),
(4, 'Muatan Lokal');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `id_tahun_pelajaran` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `id_tahun_pelajaran`, `id_tingkat`, `id_jurusan`, `nama_kelas`, `id_guru`) VALUES
(12, 2, 1, 4, '10', 4),
(13, 4, 2, 3, '11', 7);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `id_siswa`, `id_kelas`) VALUES
(1, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `id_kategori_mapel` int(11) NOT NULL,
  `nama_mata_pelajaran` varchar(20) NOT NULL,
  `alias_mata_pelajaran` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `id_kategori_mapel`, `nama_mata_pelajaran`, `alias_mata_pelajaran`) VALUES
(1, 1, 'Matematika', 'MTK'),
(2, 1, 'Bahasa Indonesia', 'BIND'),
(3, 1, 'Bahasa Inggris', 'BING'),
(4, 3, 'Sistem Komputer', 'SISKO'),
(5, 3, 'Basis Data', 'BD'),
(6, 3, 'Aplikasi dan Web', 'WEB');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama_role`) VALUES
(1, 'admin'),
(2, 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `nama_semester` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `nama_semester`) VALUES
(1, 'Ganjil'),
(2, 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `id_tahun_pelajaran` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_tahun_pelajaran`, `nis`, `nisn`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `tlp`, `email`, `kelas_id`, `jurusan_id`, `angkatan_id`) VALUES
(3, 1, '11111', '0001', 'Laudya Novita S', 'P', 'jawa tengah', '2006-11-07', 'Taman Harapan Baru Kota Bekasi', '083512454', 'laudyavr', 2, 3, 8),
(5, 1, '1222', '0002', 'M. Jovi Jauhar C', 'L', 'jawa', '2006-05-23', 'Permata Hijau Permai', '089512365', 'jovijr', 3, 4, 2),
(6, 1, '1333', '0003', 'Aghif Ferditya N', 'L', 'padang', '2005-10-22', 'Jl. Griya Kota Bekasi', '0895123645', 'agipcilpa', 3, 2, 3),
(10, 2, '1444', '0004', 'Mardasilva Safrilia', 'P', 'bekasi', '2006-03-28', 'Kp.Pintu Air Kota Bekasi', '089665207', 'cilpaagip', 4, 1, 4),
(11, 2, '1555', '0005', 'Bagas Prasetyo', 'L', 'jakarta', '2006-02-11', 'Jl. VGH Kota Bekasi', '0896412357', 'bagasss', 4, 2, 10),
(18, 3, '1666', '0006', 'Inal Rafi Salman', 'L', 'Jati negara', '2006-04-19', 'Jl. Agra', '0895236674', 'inallll', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `id` int(11) NOT NULL,
  `nama_tahun_pelajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id`, `nama_tahun_pelajaran`) VALUES
(1, '2020/2021'),
(2, '2021/2022'),
(3, '2022/2023'),
(4, '2023/2024');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `id` int(2) NOT NULL,
  `nama_tingkat` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`id`, `nama_tingkat`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `guru` int(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `username`, `password`, `role`, `guru`, `level`, `foto`) VALUES
(1, 'mardasilva', 'silvaa', '$2y$10$Bloarbbr6ltAMNxWUXQ7LOkhDTV1dZtI.3TK7jE9H9mKLlUxoSjEi', 1, 1, '1', 'icon.png'),
(2, 'bakugou katsuki', 'kacchan', '$2y$10$oeXsjxzjozEpcc2DlIZzK.MrUadxRKGi7bTKtJlbSGGAmq0/0qdh6', 1, 1, '2', 'kacchan.jpg'),
(6, 'roronoa zoro', 'zorooo', '$2y$10$zypCJe3Z.GSWhyXXRz.cV.IX.2pohRfRMOmsuTMX9Vl.L1Cu.5J2K', 2, 2, '1', 'zoro.jpg'),
(9, 'levi ackerman', 'livai', '$2y$10$zypCJe3Z.GSWhyXXRz.cV.IX.2pohRfRMOmsuTMX9Vl.L1Cu.5J2K', 2, 2, '1', 'levi.jpg'),
(10, 'aghif ferditya', 'agipp', '$2y$10$EBdglgvtsvKdbLvyfyb.GOQCdm7CgHh.n2Bj0kfhXB9gZuehM/7ym', 1, 1, '1', 'levi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru_mengajar`
--
ALTER TABLE `guru_mengajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`,`id_mata_pelajaran`,`id_kelas`,`id_semester`),
  ADD KEY `id_mata_pelajaran` (`id_mata_pelajaran`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_mapel`
--
ALTER TABLE `kategori_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun_pelajaran` (`id_tahun_pelajaran`,`id_tingkat`,`id_jurusan`,`id_guru`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_tingkat` (`id_tingkat`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`,`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori_mapel` (`id_kategori_mapel`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `jurusan_id` (`jurusan_id`),
  ADD KEY `angkatan_id` (`angkatan_id`),
  ADD KEY `id_tahun_pelajaran` (`id_tahun_pelajaran`),
  ADD KEY `id_tahun_pelajaran_2` (`id_tahun_pelajaran`);

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guru_mengajar`
--
ALTER TABLE `guru_mengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_mapel`
--
ALTER TABLE `kategori_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru_mengajar`
--
ALTER TABLE `guru_mengajar`
  ADD CONSTRAINT `guru_mengajar_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `guru_mengajar_ibfk_2` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id`),
  ADD CONSTRAINT `guru_mengajar_ibfk_3` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `guru_mengajar_ibfk_4` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_tahun_pelajaran`) REFERENCES `tahun_pelajaran` (`id`),
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`id_tingkat`) REFERENCES `tingkat` (`id`),
  ADD CONSTRAINT `kelas_ibfk_4` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`);

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);

--
-- Constraints for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_ibfk_1` FOREIGN KEY (`id_kategori_mapel`) REFERENCES `kategori_mapel` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_4` FOREIGN KEY (`id_tahun_pelajaran`) REFERENCES `tahun_pelajaran` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
