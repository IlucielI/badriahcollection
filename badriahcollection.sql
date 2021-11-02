-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 06:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badriahcollection`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int(1) NOT NULL,
  `Username_Admin` varchar(20) NOT NULL,
  `Password_Admin` varchar(255) NOT NULL,
  `Nama_Admin` varchar(30) NOT NULL,
  `Foto_Admin` varchar(255) NOT NULL,
  `Terakhir_Login` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_Admin`, `Username_Admin`, `Password_Admin`, `Nama_Admin`, `Foto_Admin`, `Terakhir_Login`) VALUES
(1, 'Wonderkid_Admin', '$2y$10$7d0.whuDoBOTIqHmJVMjbOJ.Di7ca3baNcFOXMJVk9tsYWhkxPvbe', 'Wonderkid', 'indo1.png', '2021-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `Id_Banner` int(11) NOT NULL,
  `Nama_Banner` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`Id_Banner`, `Nama_Banner`) VALUES
(1, 'banner1.jpg'),
(2, 'banner2.jpg'),
(3, 'banner3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `Id_Barang` int(11) NOT NULL,
  `Id_Kategori` int(11) NOT NULL,
  `Id_SubKategori` int(11) NOT NULL,
  `Nama_Barang` varchar(30) NOT NULL,
  `Harga_Barang` int(7) NOT NULL,
  `Stok_Barang` int(4) NOT NULL,
  `Ukuran_Barang` varchar(30) NOT NULL,
  `Foto_Barang` varchar(255) NOT NULL,
  `Berat_Barang` decimal(4,2) NOT NULL,
  `Deskripsi_Barang` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`Id_Barang`, `Id_Kategori`, `Id_SubKategori`, `Nama_Barang`, `Harga_Barang`, `Stok_Barang`, `Ukuran_Barang`, `Foto_Barang`, `Berat_Barang`, `Deskripsi_Barang`) VALUES
(197, 2, 2, 'Gamis rayon', 145000, 7, 'LD 110 cm panjang 140cm', '24104401b1a697ce18e51c49cc09a770.jpg', '99.99', 'Bahan katun rayon. <br>Wanita Dewasa maupun Remaja yang ingin terlihat Anggun, Casual, Elegan, Mewah, Branded dan Berkualitas, Original, namun dengan harga Terjangkau!'),
(207, 1, 3, 'sasxa', 12213123, 12, '212121', 'Noimage.png', '21.00', 'qwdqwdqwjdwhjwd'),
(201, 2, 2, 'Raisa dress 2', 155000, 4, 'LD 110 cm panjang 140cm', 'Raisadress_2_merahmuda.jpg', '99.99', '<br>Mengikuti gerak tubuh, tidak menerawang dan tidak panas. <br>Dipadukan dengan hijab syar\'i praktis, tidak ribet bisa untuk dipakai formal atau non formal.'),
(198, 2, 2, 'Gamis bangkok Hitam', 165000, 3, 'LD 110 cm panjang 140cm', 'c2b65e4d4e916430d8b839dc17a27cff.jpg', '99.99', 'Motif bangkok Hitam. <br>Mengikuti gerak tubuh, tidak menerawang dan tidak panas. <br>Dipadukan dengan hijab syar\'i praktis, tidak ribet bisa untuk dipakai formal atau non formal.'),
(203, 2, 2, 'Gamis Import', 280000, 1, 'LD 110 cm panjang 140cm', 'f92f09326b3e5e763bd225b8a5d8d4e3.jpg', '99.99', '<br>Wanita Dewasa maupun Remaja yang ingin terlihat Anggun, Casual, Elegan, Mewah, Branded dan Berkualitas, Original, namun dengan harga Terjangkau!'),
(199, 2, 2, 'Gamis bangkok Canary', 165000, 2, 'LD 110 cm panjang 140cm', 'fbcf6ca8-2e0d-46be-867f-2d6d9dc4745e.jpg', '99.99', 'Motif bangkok Canary. <br>Mengikuti gerak tubuh, tidak menerawang dan tidak panas. <br>Dipadukan dengan hijab syar\'i praktis, tidak ribet bisa untuk dipakai formal atau non formal.'),
(195, 1, 3, 'Kopiah merk Kyai Gedhe', 500000, 4, 'Lingkar kepala 51-61 cm', 'kopiahpria.jpg', '50.50', 'Tinggi 9 & 10.\r\n<br>Motif menggunakan tehnik full Graver. \r\n<br>Memakai bahan dasar bludru'),
(200, 2, 2, 'Gamis bangkok Biru', 165000, 7, 'LD 110 cm panjang 140cm', 'logo-biru.jpg', '99.99', 'Motif bangkok Biru. <br>Mengikuti gerak tubuh, tidak menerawang dan tidak panas. <br>Dipadukan dengan hijab syar\'i praktis, tidak ribet bisa untuk dipakai formal atau non formal.');

-- --------------------------------------------------------

--
-- Table structure for table `berlangganan`
--

CREATE TABLE `berlangganan` (
  `Id_Langganan` int(11) NOT NULL,
  `Email_Langganan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berlangganan`
--

INSERT INTO `berlangganan` (`Id_Langganan`, `Email_Langganan`) VALUES
(1, 'natsu.nana97@gmail.com'),
(3, '99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `diskusibarang`
--

CREATE TABLE `diskusibarang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Diskusi` text NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `Tanggal_Diskusi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskusibarang`
--

INSERT INTO `diskusibarang` (`id`, `id_barang`, `Username`, `Diskusi`, `Avatar`, `Tanggal_Diskusi`) VALUES
(1, 207, 'luciel', 'a', 'Noimage.png', '2021-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `fotobarang`
--

CREATE TABLE `fotobarang` (
  `Id` int(11) NOT NULL,
  `Id_Barang` int(11) NOT NULL,
  `FotoAlter_Barang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotobarang`
--

INSERT INTO `fotobarang` (`Id`, `Id_Barang`, `FotoAlter_Barang`) VALUES
(2, 169, 'stars_on_the_ground_ii_by_caringwong_dcvgkm82.jpg'),
(3, 169, 'qingkuang_by_caringwong_ddsdd3s3.jpg'),
(4, 169, 'stars_on_the_ground_ii_by_caringwong_dcvgkm86.jpg'),
(6, 165, 'qingkuang_by_caringwong_ddsdd3s5.jpg'),
(7, 165, 'stars_on_the_ground_ii_by_caringwong_dcvgkm87.jpg'),
(8, 165, 'qingkuang_by_caringwong_ddsdd3s6.jpg'),
(9, 201, 'Raisadress_2_kuning.jpg'),
(10, 201, 'Raisadress_2_putih.jpg'),
(11, 204, 'sarunggajahd2.jpg'),
(12, 204, 'sarunggajahd3.jpg'),
(13, 200, 'UJIAN-ONLINE-UNIVERSITAS-GUNADARMA1.png'),
(14, 200, 'logo-BW.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `Id_Kategori` int(11) NOT NULL,
  `Nama_Kategori` varchar(30) NOT NULL,
  `Foto_Kategori` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`Id_Kategori`, `Nama_Kategori`, `Foto_Kategori`) VALUES
(1, 'Pria Muslim', 'baju-kurta-solusi-kebutuhan-pria-muslim-dalam-berbusana-syari-yang-trendi.jpg'),
(2, 'Wanita Muslim', '1a36a037f6bcfef284b4f65bd8b0a4cb1767a2bc_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `metodepembayaran`
--

CREATE TABLE `metodepembayaran` (
  `Id_Metode` int(1) NOT NULL,
  `Nama_Metode` varchar(25) NOT NULL,
  `Nomor_Tujuan` varchar(25) NOT NULL,
  `AtasNama` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metodepembayaran`
--

INSERT INTO `metodepembayaran` (`Id_Metode`, `Nama_Metode`, `Nomor_Tujuan`, `AtasNama`) VALUES
(1, 'Ovo', '087788763749', 'A.N. Bayu Anugerah'),
(3, 'Bank BCA', '27819282', 'A.N. Bayu Anugerah');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `Id_Ongkir` int(3) NOT NULL,
  `Provinsi` varchar(30) NOT NULL,
  `Harga_Ongkir` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`Id_Ongkir`, `Provinsi`, `Harga_Ongkir`) VALUES
(1, 'Jawa timur', 13000),
(2, 'Banda Aceh', 70000),
(3, 'Sumatera Utara', 57000),
(4, 'Sumatera Barat', 55000),
(5, 'Riau', 49000),
(6, 'Kepulauan Riau', 51000),
(7, 'Jambi', 50000),
(8, 'Bengkulu', 54000),
(9, 'Sumatera Selatan', 40000),
(10, 'Kepulauan Bangka Belitung', 41000),
(11, 'Lampung', 38000),
(12, 'Banten', 23000),
(13, 'Jawa Barat', 18000),
(14, 'Jakarta', 15000),
(15, 'Jawa Tengah', 16000),
(16, 'Yogyakarta', 15000),
(17, 'Bali', 18000),
(18, 'Nusa Tenggara Barat', 20000),
(19, 'Nusa Tenggara Timur', 54000),
(20, 'Kalimantan Barat', 40000),
(21, 'Kalimantan Selatan', 29000),
(22, 'Kalimantan Tengah', 40000),
(23, 'Kalimantan Timur', 39000),
(24, 'Kalimantan Utara', 52000),
(25, 'Gorontalo', 77000),
(26, 'Sulawesi Selatan', 49000),
(27, 'Sulawesi Selatan', 38000),
(28, 'Sulawesi Tengah', 52000),
(29, 'Sulawesi Tenggara', 62000),
(30, 'Sulawesi Utara', 70000),
(31, 'Maluku', 60000),
(32, 'Maluku Utara', 75000),
(33, 'Papua Barat', 152000),
(34, 'Papua', 113000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Id_Pelanggan` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Nama_Pelanggan` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `No_Hp` varchar(20) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `Kode_Pos` varchar(5) NOT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `Aktivasi` int(1) NOT NULL,
  `Terakhir_Login` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Id_Pelanggan`, `Username`, `Nama_Pelanggan`, `Password`, `Email`, `No_Hp`, `Alamat`, `Kode_Pos`, `Avatar`, `Aktivasi`, `Terakhir_Login`) VALUES
(1, 'wonderkid', 'Bayu Anugerah', '$2y$10$z7SJWS/uyMHtUNF5lkVUa.feuQit9BtFBlXRSZKnmwx9NbpTHD8tS', 'bayu.anugerah99@gmail.com', '+6287788763744', 'Jln.Kencana V No.107 Cilandak Barat,Cilandak,Jakarta Selatan', '12430', 'qingkuang_by_caringwong_ddsdd3s.jpg', 1, '2021-11-01'),
(23, 'nowan', 'Nanatsu', '$2y$10$VrmjEavDy/2ht8cGXAonROQEMIufHmPT2Gop4cmvnxKPOAnGiMaOi', 'natsu.nana97@gmail.com', '0909090909', 'ea', '12430', 'background1.jpg', 1, '2020-06-23'),
(24, 'amelia', '', '$2y$10$AgCwfL8qZvAUdw4khX5sluOu5zv4o4U/AoKcMs9rVTFVoqvJb/cgK', 'test@gmail.com', '', '', '', 'Noimage.png', 0, '0000-00-00'),
(25, 'amelcantik', 'Amel Cantik', '$2y$10$SkH/ZL.JYhsaTDWi3OPbxu1apOp7x4h0qf4hFQWaCfnkjo7jM7u1m', 'ameliadwi27@gmail.com', '12345678', 'Test test', '12430', 'Noimage.png', 1, '0000-00-00'),
(26, 'hamtaro', '', '$2y$10$YecouEAL.nu8PLnE6GU9NuzTO/l4CP3e6CXM29DNc7UsTSiS30npG', 'wardamasfufah@student.gunadarma.ac.', '', '', '', 'Noimage.png', 0, '0000-00-00'),
(27, 'nekoya', '', '$2y$10$qD.JQyIGvvdF/dLleOWRR.LH0FrMCp7dSye5pTZxCR9DAV3JlXwL6', 'wardamasfufah@gmail.com', '', '', '', 'Noimage.png', 1, '0000-00-00'),
(28, 'kucingggg', 'Nadya', '$2y$10$BCyvBi/wtyhclL..ItWkiuSQuhYjNoHBegrAolBTEuslzoCAI9p7i', 'nadyaaswarani0@gmail.com', '12345', 'Jln gandun', '123', 'Noimage.png', 1, '0000-00-00'),
(29, 'febriani', 'Febriani', '$2y$10$.YOiyfA4s7Qdbcu8Qj.P8eKrgxW1yAND0UfpvdkhJYYV.6Q5Y2sCe', 'f3briani@yahoo.co.id', '08161639815', 'Jl.margonada raya 100', '16513', 'Noimage.png', 1, '2020-07-12'),
(30, 'himynameis', '', '$2y$10$.TgZ3FTVWALfgUILGXEw6u9EZ3HeGIsuITZF6TIdsBLRvLRVsafsW', 'natsu.nana98@gmail.com', '', '', '', 'Noimage.png', 0, '0000-00-00'),
(31, 'tryit1234', '', '$2y$10$3S4XaZfFBiBDZELRjnhLZOhpQFm5x23Ku56jchHzMXuJPzdC4kvVG', 'tryit123@gmail.com', '', '', '', 'Noimage.png', 0, '0000-00-00'),
(32, 'miwa123', '', '$2y$10$KUR7rVZelITxC8aPBrkUne8MpB3L24qcxA3/AYIWQkgmcq.ugJVCa', 'mirakrtika08@gmail.com', '', '', '', 'Noimage.png', 1, '0000-00-00'),
(33, 'wawawa', '', '$2y$10$lHUSHXK/gQm3z7TX9me6V.KpLzdgjsXKzX.3lbMsPpGPH0GKL82yq', '123@gmail.com', '', '', '', 'Noimage.png', 0, '0000-00-00'),
(42, 'luciel99', '', '$2y$10$r398.nga3RoU6CgqwCFd4OjSjO1pp7AhpURjYVWLkAyj2sLzHYg5e', '1versus.channel1@gmail.com', '', '', '', 'Noimage.png', 1, '0000-00-00'),
(41, 'luciel', '', '$2y$10$es.cbih/KYBEALdRRhMG4.x7yMKcATtXBZTMFLbU6yzw3YbQnXwfO', 'emailuntukdota99@gmail.com', '', '', '', 'Noimage.png', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `reviewbarang`
--

CREATE TABLE `reviewbarang` (
  `Id_Diskusi` int(11) NOT NULL,
  `Id_Barang` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `Diskusi` text NOT NULL,
  `Tanggal_Diskusi` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewbarang`
--

INSERT INTO `reviewbarang` (`Id_Diskusi`, `Id_Barang`, `Username`, `Avatar`, `Diskusi`, `Tanggal_Diskusi`) VALUES
(17, 204, 'wonderkid', 'qingkuang_by_caringwong_ddsdd3s.jpg', 'bagus sekali', '2020-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `Id_SubKategori` int(11) NOT NULL,
  `Id_Kategori` int(11) NOT NULL,
  `Nama_SubKategori` varchar(30) NOT NULL,
  `Foto_SubKategori` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`Id_SubKategori`, `Id_Kategori`, `Nama_SubKategori`, `Foto_SubKategori`) VALUES
(2, 2, 'Gamis', '11_-Gamis-Remaja-Kekinian-Tips-Memilih-Style-Sesuai-Usia-Sebenarnya.jpg'),
(3, 1, 'Aksesoris Pria', 'Muslim-Bonnet-Cap-Topi-Arab-Pria-Doa-Islam-Mesir-Kufi-Topi-Aksesoris-Pria-Arab-Saudi-Afrika_jpg_Q90.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Id` int(11) NOT NULL,
  `Id_Transaksi` varchar(255) NOT NULL,
  `Id_Pelanggan` int(11) NOT NULL,
  `Id_StatusKirim` int(1) NOT NULL,
  `Id_StatusBayar` int(1) NOT NULL,
  `Id_Metode` int(1) NOT NULL,
  `Tanggal_Transaksi` date NOT NULL,
  `Alamat_Pengiriman` text NOT NULL,
  `Total_Pembayaran` int(8) NOT NULL,
  `Foto_Pembayaran` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`Id`, `Id_Transaksi`, `Id_Pelanggan`, `Id_StatusKirim`, `Id_StatusBayar`, `Id_Metode`, `Tanggal_Transaksi`, `Alamat_Pengiriman`, `Total_Pembayaran`, `Foto_Pembayaran`) VALUES
(41, 'TRX-41', 1, 1, 1, 1, '2021-07-15', 'Bayu Anugerah +6287788763744, Jln.Kencana V No.107 Cilandak Barat,Cilandak,Jakarta Selatan, jaksel, Jakarta, 12430', 160000, 'Noimage.png'),
(40, 'TRX-40', 1, 1, 2, 1, '2020-08-02', 'Bayu Anugerah +6287788763744, Jln.Kencana V No.107 Cilandak Barat,Cilandak,Jakarta Selatan, Jakarta Selatan, Jakarta, 12430', 170000, 'codeigniter-logo.png'),
(21, 'TRX-15', 29, 1, 1, 3, '2020-07-12', 'Febriani 08161839815, Jl.margonda raya no.100, Depok, Jawa Barat, 164214', 2108000, 'Noimage.png'),
(22, 'TRX-22', 1, 4, 3, 1, '2020-07-12', 'Bayu Anugerah +6287788763744, Jln.Kencana V No.107 Cilandak Barat,Cilandak,Jakarta Selatan, jakarta selatan, Jakarta, 12430', 0, 'Noimage.png'),
(14, 'TRX-14', 28, 1, 1, 3, '2020-06-28', 'Nadya Aswarani 123447778, Jl h gandun, Jakarta, Jakarta, 12440', 145000, 'Noimage.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksidetail`
--

CREATE TABLE `transaksidetail` (
  `Id_Detail` int(11) NOT NULL,
  `Id_Transaksi` varchar(255) NOT NULL,
  `Id_Barang` int(11) NOT NULL,
  `Jumlah_Barang` int(4) NOT NULL,
  `Keterangan_Tambahan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksidetail`
--

INSERT INTO `transaksidetail` (`Id_Detail`, `Id_Transaksi`, `Id_Barang`, `Jumlah_Barang`, `Keterangan_Tambahan`) VALUES
(46, 'TRX-40', 201, 1, 'Warna Utama'),
(47, 'TRX-41', 197, 1, 'Warna Utama'),
(31, 'TRX-22', 197, 3, 'Warna Utama'),
(30, 'TRX-15', 195, 2, 'ukuran M'),
(29, 'TRX-15', 204, 5, 'warna hitam'),
(28, 'TRX-15', 203, 3, 'warna kuning'),
(19, 'TRX-14', 197, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksistatusbayar`
--

CREATE TABLE `transaksistatusbayar` (
  `Id_StatusBayar` int(1) NOT NULL,
  `Status_Bayar` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksistatusbayar`
--

INSERT INTO `transaksistatusbayar` (`Id_StatusBayar`, `Status_Bayar`) VALUES
(2, 'Menunggu Pemeriksaan'),
(4, 'Telah Dibayar'),
(3, 'Dibatalkan'),
(1, 'Belum transfer');

-- --------------------------------------------------------

--
-- Table structure for table `transaksistatuskirim`
--

CREATE TABLE `transaksistatuskirim` (
  `Id_StatusKirim` int(1) NOT NULL,
  `Status_Kirim` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksistatuskirim`
--

INSERT INTO `transaksistatuskirim` (`Id_StatusKirim`, `Status_Kirim`) VALUES
(1, 'Dikemas'),
(2, 'Dikirim'),
(3, 'Terkirim'),
(4, 'Dibatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `usertoken`
--

CREATE TABLE `usertoken` (
  `Id_Token` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Date_Created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertoken`
--

INSERT INTO `usertoken` (`Id_Token`, `Username`, `Token`, `Date_Created`) VALUES
(26, 'wawawa', 'lMIGYMIODmZDI0WqctsiQTjF40I4GZ8yjfBzSXif2hM%3D', 1596402504);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`Id_Banner`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Id_Barang`);

--
-- Indexes for table `berlangganan`
--
ALTER TABLE `berlangganan`
  ADD PRIMARY KEY (`Id_Langganan`);

--
-- Indexes for table `diskusibarang`
--
ALTER TABLE `diskusibarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotobarang`
--
ALTER TABLE `fotobarang`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`Id_Kategori`);

--
-- Indexes for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  ADD PRIMARY KEY (`Id_Metode`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`Id_Ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Id_Pelanggan`);

--
-- Indexes for table `reviewbarang`
--
ALTER TABLE `reviewbarang`
  ADD PRIMARY KEY (`Id_Diskusi`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`Id_SubKategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transaksidetail`
--
ALTER TABLE `transaksidetail`
  ADD PRIMARY KEY (`Id_Detail`);

--
-- Indexes for table `transaksistatusbayar`
--
ALTER TABLE `transaksistatusbayar`
  ADD PRIMARY KEY (`Id_StatusBayar`);

--
-- Indexes for table `transaksistatuskirim`
--
ALTER TABLE `transaksistatuskirim`
  ADD PRIMARY KEY (`Id_StatusKirim`);

--
-- Indexes for table `usertoken`
--
ALTER TABLE `usertoken`
  ADD PRIMARY KEY (`Id_Token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Admin` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `Id_Banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `Id_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `berlangganan`
--
ALTER TABLE `berlangganan`
  MODIFY `Id_Langganan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diskusibarang`
--
ALTER TABLE `diskusibarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fotobarang`
--
ALTER TABLE `fotobarang`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `Id_Kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  MODIFY `Id_Metode` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `Id_Ongkir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `Id_Pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `reviewbarang`
--
ALTER TABLE `reviewbarang`
  MODIFY `Id_Diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `Id_SubKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `transaksidetail`
--
ALTER TABLE `transaksidetail`
  MODIFY `Id_Detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `transaksistatusbayar`
--
ALTER TABLE `transaksistatusbayar`
  MODIFY `Id_StatusBayar` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksistatuskirim`
--
ALTER TABLE `transaksistatuskirim`
  MODIFY `Id_StatusKirim` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertoken`
--
ALTER TABLE `usertoken`
  MODIFY `Id_Token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
