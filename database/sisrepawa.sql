-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 05:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisrepawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `foto_admin`) VALUES
(24, 'Muhammad Hanif Arafi', 'Hanif12', 'Hanif123', '209acfd87876ef566bb223414c404b36.png');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_destinasi_wisata`
--

CREATE TABLE `artikel_destinasi_wisata` (
  `id_artikel_destinasi_wisata` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `foto_destinasi_wisata` varchar(100) NOT NULL,
  `foto_banner_artikel` varchar(100) NOT NULL,
  `tiket_masuk` bigint(100) NOT NULL,
  `nama_destinasi_wisata` varchar(100) NOT NULL,
  `alamat_destinasi_wisata` varchar(100) NOT NULL,
  `deskripsi_destinasi_wisata` text NOT NULL,
  `jam_operational` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel_destinasi_wisata`
--

INSERT INTO `artikel_destinasi_wisata` (`id_artikel_destinasi_wisata`, `id_admin`, `foto_destinasi_wisata`, `foto_banner_artikel`, `tiket_masuk`, `nama_destinasi_wisata`, `alamat_destinasi_wisata`, `deskripsi_destinasi_wisata`, `jam_operational`) VALUES
(23, 24, '812dea980d69557a29d3bb379f67c077.jpg', 'a1753c5063977c162e8d93baab51c486.jpg', 5000, 'Wisata Rumpuk Watu', 'Desa Mendak, Kecamatan Dagangan, Kabupaten Madiun, Provinsi Jawa Timur', '<p>Alam Watu Rumpuk begitu indah, hijaunya pepohonan menyatu dengan langit biru. Ditambah lagi, warna-warni dari bunga di taman menjadikannya lebih indah. Tidak hanya indah, tempat ini pun tertata rapi dengan pola-pola yang unik. B4:D4Spot-spot foto kekinian tak lupa dihadirkan di wisata alam ini. Seperti semak yang dibentuk, cangkir raksasa hingga bambu yang dibentuk seperti pusaran api. Dan tak lupa, ikon tulisan Watu Rumpuk yang di bawahnya terdapat taman berbentuk hati.</p>', '08.00 AM - 16.00 PM'),
(26, 24, '309b3bf2d10a5feeba4a5676d1b17008.jpg', '6ac6d4348fe275a19841a3954aef89d9.jpg', 10000, 'Taman Wisata Gunung Kendil', 'Area Sawah, Pilangrejo, Wungu, Madiun, Jawa Timur', '<p>Taman Wisata Gunung Kendil, salah satu wisata alam di Madiun. Objek wisata ini cukup terkenal di Jawa Timur. Tempat ini cukup sering diadakan untuk lokasi off-road. Selain itu masih banyak fasilitas yang menarik. Taman Wisata Gunung Kendil ini berlokasi di desa Pilangrejo, kecamatan Wungu, Kabupaten Madiun. Dulunya, tempat ini dipergunakan sebagai latihan militer. Sekarang menjadi salah satu obyek wisata.Wahana rekreasi yang disediakan di Taman Wisata Gunung Kendil seperti tempat pemancingan, lapangan latihan menembak, bumi perkemahan hingga arena balap motor. Pengunjung yang datang pun bisa dengan puas menikmati seluruh fasilitas yang disediakan.Disini terdapat fasilitas pendukung seperti gazebo, toilet dan lainnya</p>', '08.00 AM – 17.00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi_tujuan`
--

CREATE TABLE `destinasi_tujuan` (
  `id_destinasi_tujuan` int(11) NOT NULL,
  `nama_destinasi_tujuan` varchar(100) NOT NULL,
  `foto_destinasi_tujuan` varchar(100) NOT NULL,
  `durasi_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi_tujuan`
--

INSERT INTO `destinasi_tujuan` (`id_destinasi_tujuan`, `nama_destinasi_tujuan`, `foto_destinasi_tujuan`, `durasi_jam`) VALUES
(13, 'Monumen PKI Madiun', '0c830eaa99ab6e0f7e3069c4e6e68ed7.jpg', 3),
(14, 'Hutan Pinus Nongko Ijo', '5105af95df21d61880c9dc752fc762cd.jpg', 2),
(15, 'Wisata Rumpuk Watu', '823dc8be206258804f6e856363b8e591.jpg', 3),
(21, 'Kedung Malem Waterfall', 'a04c4064b4b249e49a8c8e29fd207d78.jpg', 3),
(22, 'Taman Wisata Gunung Kendil', '57f91d376150d5d6192650fe19a583ba.jpg', 1),
(23, 'Desa Wisata Brumbun Brumbun Tubing', 'cabdea1fcd6270191091881f0bdbd870.jpg', 4),
(24, 'Air Terjun Banyulawe', '099869bb68f34e0e65371d65fd171bbc.jpg', 3),
(25, 'Waduk Bening Widas', 'f6222f203c4f408426851ca5da272d94.jpg', 1),
(26, 'Dungus Forest Park', '9eda15bc1cc7847eefb620318b7b408c.jpg', 4),
(27, 'Camp Sekar Arum Kare', '8d0972b805635dcf4b990dae15292311.jpg', 3),
(28, 'Pasar Pundensari Desa Gunungsari', 'd7b2f2bb5f89705d8b52670e3f5e9ab2.jpg', 3),
(34, 'regregreg', '7890e7c5072477fa66c4d9b6525bfa69.jpg', 4),
(35, 'r4egregre', '5f1edc489482ee12632bef088303a7d1.jpg', 2),
(36, 'refgregregre', '84d60b4b1964995b70ed09894a1e679c.jpeg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `detail_paket_wisata`
--

CREATE TABLE `detail_paket_wisata` (
  `id_detail_paket_wisata` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `id_destinasi_tujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_paket_wisata`
--

INSERT INTO `detail_paket_wisata` (`id_detail_paket_wisata`, `id_paket_wisata`, `id_destinasi_tujuan`) VALUES
(335, 45, 13),
(336, 45, 14),
(337, 69, 13),
(338, 69, 14),
(339, 69, 15),
(340, 70, 13),
(341, 70, 14),
(342, 70, 15),
(343, 71, 23),
(344, 71, 28);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rating`
--

CREATE TABLE `detail_rating` (
  `id_rating` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_rating`
--

INSERT INTO `detail_rating` (`id_rating`, `id_paket_wisata`, `ip_address`, `rating`) VALUES
(60, 45, '::1', 3),
(69, 69, '::1', 4),
(72, 70, '::1', 4),
(73, 71, '::1', 2),
(80, 45, '::2', 2),
(81, 45, '::3', 2),
(82, 45, '::4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` varchar(2) NOT NULL,
  `ket` varchar(128) NOT NULL,
  `bobot` float NOT NULL,
  `attribut` enum('Benefit','Cost','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kd_kriteria`, `ket`, `bobot`, `attribut`) VALUES
('C1', 'Durasi', 5, 'Benefit'),
('C2', 'Usia', 5, 'Cost'),
('C3', 'Harga Paket', 5, 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `C1` int(11) NOT NULL,
  `C2` int(11) NOT NULL,
  `C3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_paket_wisata`, `C1`, `C2`, `C3`) VALUES
(3, 45, 2, 6, 11),
(7, 69, 4, 9, 11),
(8, 70, 4, 9, 15),
(9, 71, 2, 7, 11),
(11, 45, 2, 18, 23),
(12, 69, 4, 19, 23),
(13, 70, 2, 20, 25),
(14, 71, 2, 21, 23);

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id_paket_wisata` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_penginapan` int(11) NOT NULL,
  `id_tempat_makan` int(11) NOT NULL,
  `id_tic` int(11) NOT NULL,
  `nama_paket_wisata` varchar(50) NOT NULL,
  `deskripsi_paket_wisata` text NOT NULL,
  `foto_paket_wisata` varchar(100) NOT NULL,
  `harga_paket_wisata` bigint(100) NOT NULL,
  `durasi_paket_wisata` varchar(20) NOT NULL,
  `rating_paket_wisata` decimal(19,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_paket_wisata`, `id_admin`, `id_penginapan`, `id_tempat_makan`, `id_tic`, `nama_paket_wisata`, `deskripsi_paket_wisata`, `foto_paket_wisata`, `harga_paket_wisata`, `durasi_paket_wisata`, `rating_paket_wisata`) VALUES
(45, 24, 12, 6, 7, 'Paket Wisata Hemat 1', '<p>Paket Wisata Hemat 1 menawarkan berbagai macam destinasi wisata yang dapat dikunjungi oleh pengunjung selama satu hari penuh. Paket wisata ini juga sudah tersedia penginapan dan tempat makan yang menjadi favorite pengunjung</p>', 'eaa380b47376066863d4b9cb97ba9d77.png', 150000, '2', '2.8'),
(69, 24, 13, 7, 7, 'Paket Wisata Grape 1', '<p>Paket wisata grape 1 merupakan paket wisata yang berisi destinasi wisata yang hanya terdapat di daerah Grape, Kab. Madiun. Paket wisata ini tidak hanya menawarkan wisata alam melainkan juga wisata yang menguji ardenailin</p>', 'e678c2a2e9d2e45d3c024d2fc9f1121f.png', 350000, '4', '4.0'),
(70, 24, 19, 15, 7, 'Paket Wisata Keluarga 3', '<p>Paket Wisata yang memiliki berbagai macam destinasi wisata yang cocok untuk keluarga. Paket wisata ini juga dilengkapi dengan penginapan terbaik dan tempat makan yang memiliki menu-menu favorite</p>', 'd4463c42ff81c5906327905e95dfe097.png', 1250000, '2', '4.0'),
(71, 24, 19, 16, 7, 'Paket Wisata Hemat 2', '<p>Paket Wisata yang menyediakan berbagai destinasi alam yang tengah tranding di daerah Kabpuaten Madiun. Paket wisata ini sudah dilengkapi dengan penginapan dan tempat makan</p>', '2cfdb5e86823ff54f1f8c8ca585a3eba.png', 450000, '2', '2.0');

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id_penginapan` int(11) NOT NULL,
  `nama_penginapan` varchar(100) NOT NULL,
  `jumlah_orang` varchar(20) NOT NULL,
  `alamat_penginapan` text NOT NULL,
  `fasilitas_penginapan` varchar(200) NOT NULL,
  `foto_penginapan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id_penginapan`, `nama_penginapan`, `jumlah_orang`, `alamat_penginapan`, `fasilitas_penginapan`, `foto_penginapan`) VALUES
(12, 'Artayya Puri Homestay 2', '2', 'Jl. Kolonel Marhadi No.25, Pereng, Mejayan, Kec. Mejayan, Kabupaten Madiun, Jawa Timur', 'parkir gratis, AC, Tv Layar datar, Kamar mandi pribadi, area bebas rokok', '09a44ed506f1c2102cd964b2287052b5.PNG'),
(13, 'Login Homestay', '2', 'Jl. Musi No.13, Pandean, Kec. Taman, Kota Madiun, Jawa Timur', 'parkir gratis, Tv Layar datar, kamar mandi pribadi, Wifi, Sarapan gratis, dapur kecil, layanan kamar', '8cb464647f724d8efb46d0932280ea2e.jpg'),
(19, 'MM HOMESTAY', '2', 'Jl. Raya Solo No.27, Sumber, Kraton, Kec. Maospati, Kabupaten Magetan, Jawa Timur', 'parkir gratis, Tv Layar datar, kamar mandi pribadi, Wifi, Sarapan gratis, dapur kecil, layanan kamar', '308d87f61f6b66772f3a96e7000e8796.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `kd_kriteria` varchar(2) NOT NULL,
  `ket_sub` varchar(128) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `kd_kriteria`, `ket_sub`, `bobot`) VALUES
(1, 'C1', '1 Hari', 1),
(2, 'C1', '2 Hari', 2),
(3, 'C1', '3 Hari', 3),
(4, 'C1', '4 Hari', 4),
(5, 'C1', '5 Hari', 5),
(6, 'C2', '1 - 5 Tahun', 1),
(7, 'C2', '6 - 13 Tahun', 2),
(8, 'C2', '14 - 25 Tahun', 3),
(9, 'C2', '26 - 50 Tahun', 4),
(10, 'C2', '50 Tahun keatas', 5),
(11, 'C3', '0 – 500.000', 1),
(12, 'C3', '500.001 – 1.000.000', 2),
(13, 'C3', '1.000.001 - 2.000.000 ', 3),
(14, 'C3', '2.001.000-3.000.000', 4),
(15, 'C3', '>3.000.000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_makan`
--

CREATE TABLE `tempat_makan` (
  `id_tempat_makan` int(11) NOT NULL,
  `nama_tempat_makan` varchar(100) NOT NULL,
  `alamat_tempat_makan` text NOT NULL,
  `menu_favorite` varchar(100) NOT NULL,
  `foto_tempat_makan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_makan`
--

INSERT INTO `tempat_makan` (`id_tempat_makan`, `nama_tempat_makan`, `alamat_tempat_makan`, `menu_favorite`, `foto_tempat_makan`) VALUES
(6, 'Gado Gado dan Tahu Campur Pak Tomo', 'Jl. Biliton No.20, Madiun Lor, Kec. Manguharjo, Kota Madiun, Jawa Timur', 'gado-gado, tahu campur', 'f3cab2ef86ecda8f002d1119738b883f.jpg'),
(7, 'Ayam Goreng Kemangi', 'Jl. Sulawesi No.2A, Kartoharjo, Kec. Kartoharjo, Kota Madiun, Jawa Timur', 'ayam kemangi', '65e51067c44941869c2c6c9aaf95d040.jpg'),
(15, 'Lombok Idjo Madiun', 'Jl. Kalimantan No.36, Kartoharjo, Kec. Kartoharjo, Kota Madiun, Jawa Timur', 'ayam goreng lombok ijo, ayam bakar, gurame bakar', 'b045724af31174b1cabffef8b9b33f21.jpg'),
(16, 'Depot Es Segar', 'Jl. Dr. Sutomo No.116, Kejuron, Kec. Kartoharjo, Kota Madiun, Jawa Timur', 'es campur, es sanghai', '1042dbde5fee4864d4e377d99eedda08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tic`
--

CREATE TABLE `tic` (
  `id_tic` int(11) NOT NULL,
  `nama_tic` varchar(100) NOT NULL,
  `alamat_tic` text NOT NULL,
  `kontak_tic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tic`
--

INSERT INTO `tic` (`id_tic`, `nama_tic`, `alamat_tic`, `kontak_tic`) VALUES
(7, 'TIC Pangeran Timur', 'Jl. Singoludro, Kronggahan, Mejayan, Kec. Mejayan', '035138909834');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel_destinasi_wisata`
--
ALTER TABLE `artikel_destinasi_wisata`
  ADD PRIMARY KEY (`id_artikel_destinasi_wisata`),
  ADD KEY `Id_admin` (`id_admin`);

--
-- Indexes for table `destinasi_tujuan`
--
ALTER TABLE `destinasi_tujuan`
  ADD PRIMARY KEY (`id_destinasi_tujuan`);

--
-- Indexes for table `detail_paket_wisata`
--
ALTER TABLE `detail_paket_wisata`
  ADD PRIMARY KEY (`id_detail_paket_wisata`),
  ADD KEY `Id_destinasi_tujuan` (`id_destinasi_tujuan`),
  ADD KEY `Id_paket_wisata` (`id_paket_wisata`);

--
-- Indexes for table `detail_rating`
--
ALTER TABLE `detail_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_paket_wisata` (`id_paket_wisata`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_paket_wisata` (`id_paket_wisata`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id_paket_wisata`),
  ADD KEY `Id_admin` (`id_admin`),
  ADD KEY `Id_penginapan` (`id_penginapan`),
  ADD KEY `Id_tempat_makan` (`id_tempat_makan`),
  ADD KEY `Id_tic` (`id_tic`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `tempat_makan`
--
ALTER TABLE `tempat_makan`
  ADD PRIMARY KEY (`id_tempat_makan`);

--
-- Indexes for table `tic`
--
ALTER TABLE `tic`
  ADD PRIMARY KEY (`id_tic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `artikel_destinasi_wisata`
--
ALTER TABLE `artikel_destinasi_wisata`
  MODIFY `id_artikel_destinasi_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `destinasi_tujuan`
--
ALTER TABLE `destinasi_tujuan`
  MODIFY `id_destinasi_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `detail_paket_wisata`
--
ALTER TABLE `detail_paket_wisata`
  MODIFY `id_detail_paket_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `detail_rating`
--
ALTER TABLE `detail_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id_paket_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tempat_makan`
--
ALTER TABLE `tempat_makan`
  MODIFY `id_tempat_makan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tic`
--
ALTER TABLE `tic`
  MODIFY `id_tic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel_destinasi_wisata`
--
ALTER TABLE `artikel_destinasi_wisata`
  ADD CONSTRAINT `artikel_destinasi_wisata_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `detail_paket_wisata`
--
ALTER TABLE `detail_paket_wisata`
  ADD CONSTRAINT `detail_paket_wisata_ibfk_1` FOREIGN KEY (`id_paket_wisata`) REFERENCES `paket_wisata` (`id_paket_wisata`),
  ADD CONSTRAINT `detail_paket_wisata_ibfk_2` FOREIGN KEY (`id_destinasi_tujuan`) REFERENCES `destinasi_tujuan` (`id_destinasi_tujuan`);

--
-- Constraints for table `detail_rating`
--
ALTER TABLE `detail_rating`
  ADD CONSTRAINT `detail_rating_ibfk_1` FOREIGN KEY (`id_paket_wisata`) REFERENCES `paket_wisata` (`id_paket_wisata`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_paket_wisata`) REFERENCES `paket_wisata` (`id_paket_wisata`);

--
-- Constraints for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD CONSTRAINT `paket_wisata_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `paket_wisata_ibfk_2` FOREIGN KEY (`id_tempat_makan`) REFERENCES `tempat_makan` (`id_tempat_makan`),
  ADD CONSTRAINT `paket_wisata_ibfk_3` FOREIGN KEY (`id_tic`) REFERENCES `tic` (`id_tic`),
  ADD CONSTRAINT `paket_wisata_ibfk_4` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
