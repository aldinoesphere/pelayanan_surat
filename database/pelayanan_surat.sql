-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 09:50 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayanan_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `kode_agama` char(2) NOT NULL,
  `nama_agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `kode_agama`, `nama_agama`) VALUES
(1, '01', 'ISLAM'),
(2, '02', 'KRISTEN'),
(3, '03', 'KHATOLIK'),
(4, '04', 'HINDU'),
(5, '05', 'BUDHA'),
(6, '06', 'KONGHUCU');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `link_banner` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `link_banner`) VALUES
(1, 'LXeVo1qYhQjK9Jlldyvm.jpg'),
(2, 'kN9pAcaWDfFlGNBeuaqG.jpg'),
(3, 'ed8iDibaWexTQoGyAAzL.jpg'),
(4, 'RbFAU1XErrU1FitjjV8B.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hubungan`
--

CREATE TABLE `hubungan` (
  `id` int(11) NOT NULL,
  `kode_hubungan` char(2) NOT NULL,
  `nama_hubungan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hubungan`
--

INSERT INTO `hubungan` (`id`, `kode_hubungan`, `nama_hubungan`) VALUES
(1, '01', 'KEPALA KELUARGA'),
(2, '02', 'SUAMI'),
(3, '03', 'ISTRI'),
(4, '04', 'ANAK'),
(5, '05', 'MENANTU'),
(6, '06', 'CUCU'),
(7, '07', 'ORANG TUA'),
(8, '08', 'MERTUA'),
(9, '09', 'FAMILI LAIN'),
(10, '10', 'PEMBANTU'),
(11, '11', 'LAINNYA');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id` tinyint(4) NOT NULL,
  `kode_surat` varchar(10) NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  `file_template` varchar(100) DEFAULT NULL,
  `informasi` text NOT NULL,
  `form_field` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id`, `kode_surat`, `nama_surat`, `file_template`, `informasi`, `form_field`, `created`, `flag`) VALUES
(1, 'F.01', 'SURAT IJIN KERAMAIAN', 'surat_ijin_keramaian.rtf', '                                                                                                                                                                                                                                                                                                                                                <p><strong>PERSYARATANNYA ADALAH</strong>:</p>\r\n\r\n<ol>\r\n	<li>FOTOCOPY SKCK</li>\r\n	<li>FOTOCOPY AKTA NIKAH</li>\r\n	<li>FOTOCOPY KARTU KELUARGA (KK)</li>\r\n</ol>\r\n                                                                                                                                                                                                                                                                                                                    ', '[{\"id\":\"jenis_keramaian\",\"name\":\"jenis_keramaian\",\"placeholder\":\"Masukan nama Jenis Keramaian\",\"class\":\"form-control\",\"label\":\"JENIS KERAMAIAN\",\"type\":\"text\",\"required\":\"required\"},{\"id\":\"berlaku_dari\",\"name\":\"berlaku_dari\",\"placeholder\":\"Contoh : 30 Maret 2019\",\"class\":\"form-control\",\"label\":\"TANGGAL BERLAKU DARI\",\"type\":\"text\",\"required\":\"required\"},{\"id\":\"berlaku_sampai\",\"name\":\"berlaku_sampai\",\"placeholder\":\"Contoh : 30 Maret 2019\",\"class\":\"form-control\",\"label\":\"TANGGAL BERLAKU SAMPAIA\",\"type\":\"text\",\"required\":\"required\"},{\"id\":\"keperluan\",\"name\":\"keperluan\",\"placeholder\":\"Keperluan\",\"class\":\"form-control\",\"label\":\"KEPERLUAN\",\"type\":\"text\",\"required\":\"required\"}]', '2019-07-24 11:59:35', 0),
(3, 'F.02', 'SURAT KETERANGAN KEHILANGAN', 'surat_keterangan_kehilangan.rtf', '<p><strong>PERSYARATAN YANG HARUS DI BAWA</strong>:</p>\r\n\r\n<ol>\r\n	<li>FOTOCOPY KTP</li>\r\n	<li>FOTOCOPY AKTA NIKAH <strong>(JIKA DIPERLUKKAN)</strong></li>\r\n	<li>FOTOCOPY KARTU KELUARGA (KK) <strong>(JIKA DIPERLUKAN)</strong></li>\r\n</ol>\r\n', '[{\"id\":\"rincian\",\"name\":\"rincian\",\"placeholder\":\"MASUKAN DATA RINCIAN\",\"class\":\"form-control\",\"label\":\"RICIAN\",\"type\":\"text\",\"required\":\"required\"},{\"id\":\"keterangan\",\"name\":\"keterangan\",\"placeholder\":\"MASUKAN DATA KETERANGAN\",\"class\":\"form-control\",\"label\":\"KETERANGAN\",\"type\":\"text\",\"required\":\"required\"}]', '2019-08-06 19:04:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` char(2) NOT NULL,
  `rw` char(2) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`id`, `no_kk`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `created`, `flag`) VALUES
(9, '3212200106095627', 'DESA KRIMUN', '13', '05', 'KRIMUN', 'LOSARANG', 'INDRAMAYU', '45253', '2019-06-25 00:00:00', 0),
(10, '3212200106095626', 'DESA KRIMUN', '13', '05', 'KRIMUN', 'LOSARANG', 'INDRAMAYU', '45253', '2019-06-25 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `alias` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `alias`) VALUES
(1, 'Berita', 'berita'),
(2, 'Kependudukan', 'kependudukan');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `kode_pekerjaan` char(2) NOT NULL,
  `nama_pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `kode_pekerjaan`, `nama_pekerjaan`) VALUES
(1, '01', 'PETANI'),
(2, '02', 'NELAYAN'),
(3, '03', 'GURU');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `kode_pendidikan` char(2) NOT NULL,
  `nama_pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `kode_pendidikan`, `nama_pendidikan`) VALUES
(1, '01', 'TIDAK / BELUM SEKOLAH'),
(2, '02', 'BELUM TAMAT SD/SEDERAJAT'),
(3, '03', 'TAMAT SD/SEDERAJAT'),
(4, '04', 'SLTP/SEDERAJAT'),
(5, '05', 'SLTA/SEDERAJAT'),
(6, '06', 'DIPLOMA III'),
(7, '07', 'AKADEMI/DIPLOMA III/SARJANA MUDA'),
(8, '08', 'DIPLOMA IV/STRATA I'),
(9, '09', 'STRATA II'),
(10, '10', 'STRATA III');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL COMMENT '1: laki-laki ; 2: Perempuan',
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kode_agama` char(2) NOT NULL,
  `kode_pendidikan` char(2) NOT NULL,
  `kode_pekerjaan` char(2) NOT NULL,
  `kode_status_kawin` char(2) NOT NULL,
  `kode_hubungan` char(2) NOT NULL,
  `warganegara` varchar(20) NOT NULL,
  `paspor` varchar(50) NOT NULL,
  `kitas` varchar(50) NOT NULL,
  `ayah` varchar(50) NOT NULL,
  `ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `no_kk`, `nama_lengkap`, `jk`, `tempat_lahir`, `tgl_lahir`, `kode_agama`, `kode_pendidikan`, `kode_pekerjaan`, `kode_status_kawin`, `kode_hubungan`, `warganegara`, `paspor`, `kitas`, `ayah`, `ibu`) VALUES
('3212203003950001', '3212200106095627', 'ALDINO SAID', '1', 'INDRAMAYU', '1995-03-30', '01', '08', '01', '02', '01', 'INDONESIA', '-', '-', 'SUHENDI', 'ROSIDAH');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_pengaturan` varchar(50) NOT NULL,
  `pengaturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_pengaturan`, `pengaturan`) VALUES
(1, 'nama_website', 'Desa Jatisawit Lor | Lohbener'),
(2, 'instagram', 'https://www.instagram.com/jatisawitlor/'),
(3, 'facebook', 'https://www.facebook.com/jatisawit.lor'),
(4, 'email_admin', 'aldinosaid@gmail.com'),
(5, 'twitter', 'https://twitter.com/jatisawit_lor'),
(6, 'link_banner', 'oq79tUU6TFAUDgSW9NZ1pSDuS.jpg'),
(7, 'alamat', '                                                        <p>Jalan Jatisawit - Jatibarang no. xx,</p>\r\n\r\n<p>Jatisawit, Kabupaten Indramayu, Jawa Barat 45273</p>\r\n                                                    '),
(8, 'no_tlp', '+6289695464262'),
(9, 'profil_desa', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>\r\n'),
(10, 'profil_lembaga', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `alias` varchar(120) NOT NULL,
  `konten` text NOT NULL,
  `post_thumbnail` varchar(250) NOT NULL,
  `kategori` int(11) NOT NULL,
  `tipe` varchar(10) NOT NULL COMMENT 'artikel, halaman',
  `penulis` int(11) NOT NULL,
  `dibuat` datetime NOT NULL,
  `diubah` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: draft, 1: publish',
  `induk` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `alias`, `konten`, `post_thumbnail`, `kategori`, `tipe`, `penulis`, `dibuat`, `diubah`, `status`, `induk`) VALUES
(1, 'Penanaman seribu pohon di desa bojong kokok', 'penanaman-seribu-pohon-di-desa-bojong-kokok', '                                                                                                                                                                                                                                                                                                            <p><em>dsfege</em></p>\r\n                                                                                                                                                                                                                                                                                        ', 'HsP4ryyzGV.jpg', 1, 'artikel', 1, '2019-08-29 19:29:27', '2019-09-10 08:46:01', 1, 0),
(2, 'PROFIL', 'profil', '                                                                                                                    ', 'JptWkGvsRN.jpg', 0, 'halaman', 1, '2019-08-30 10:29:18', '2019-09-11 19:19:21', 1, 0),
(3, 'PROFIL LEMBAGA', 'profil-lembaga', '                                                                                                                                                                                                                                        ', 'AIWs3cESLR.jpg', 0, 'halaman', 1, '2019-08-30 10:29:51', '2019-09-11 19:19:39', 1, 0),
(4, 'test', 'test', '                                                                                                                                                                                    <p><s>vdfgdg</s></p>\r\n                                                                                                                                                                        ', 'MfXoHFPedr.jpg', 1, 'artikel', 1, '2019-09-10 09:20:06', '2019-09-10 09:31:44', 1, 0),
(5, 'Memancing di sungai', 'memancing-di-sungai', '<p>vbdfvdfb <s>fvdfbfdbgb</s></p>\r\n', 'Bc4YwFsEiS.jpg', 1, 'artikel', 1, '2019-09-10 09:36:53', '2019-09-10 09:36:53', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_kawin`
--

CREATE TABLE `status_kawin` (
  `id` int(11) NOT NULL,
  `kode_status_kawin` char(2) NOT NULL,
  `nama_status_kawin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_kawin`
--

INSERT INTO `status_kawin` (`id`, `kode_status_kawin`, `nama_status_kawin`) VALUES
(1, '01', 'BELUM KAWIN'),
(2, '02', 'KAWIN'),
(3, '03', 'CERAI HIDUP'),
(4, '04', 'CERAI MATI');

-- --------------------------------------------------------

--
-- Table structure for table `status_tinggal`
--

CREATE TABLE `status_tinggal` (
  `id` int(11) NOT NULL,
  `kode_status_tinggal` char(2) NOT NULL,
  `nama_status_tinggal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_tinggal`
--

INSERT INTO `status_tinggal` (`id`, `kode_status_tinggal`, `nama_status_tinggal`) VALUES
(1, '01', 'WNI'),
(2, '02', 'WNA');

-- --------------------------------------------------------

--
-- Table structure for table `trans_surat`
--

CREATE TABLE `trans_surat` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(10) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `tanggal_buat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_cetak` datetime NOT NULL,
  `data_field` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: pending; 1: review; 2: printed; 3:rejected'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hubungan`
--
ALTER TABLE `hubungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_kk` (`no_kk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_kawin`
--
ALTER TABLE `status_kawin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_tinggal`
--
ALTER TABLE `status_tinggal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_surat`
--
ALTER TABLE `trans_surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hubungan`
--
ALTER TABLE `hubungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_kawin`
--
ALTER TABLE `status_kawin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_tinggal`
--
ALTER TABLE `status_tinggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trans_surat`
--
ALTER TABLE `trans_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
