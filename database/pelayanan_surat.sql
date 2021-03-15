-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 11:34 PM
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
-- Table structure for table `detail_permohonan_surat`
--

CREATE TABLE `detail_permohonan_surat` (
  `id` int(11) NOT NULL,
  `id_permohonan_surat` varchar(50) NOT NULL,
  `id_persyaratan` int(11) NOT NULL,
  `dokumen_persyaratan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_permohonan_surat`
--

INSERT INTO `detail_permohonan_surat` (`id`, `id_permohonan_surat`, `id_persyaratan`, `dokumen_persyaratan`) VALUES
(11, '5', 2, '3212203003950001_23112020_F.02_2.png');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `dibuat` datetime NOT NULL,
  `diubah` datetime NOT NULL,
  `cover_album` varchar(50) NOT NULL,
  `kategori` tinyint(4) NOT NULL COMMENT '0: foto, 1:video',
  `links_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `deskripsi`, `dibuat`, `diubah`, `cover_album`, `kategori`, `links_url`) VALUES
(3, 'Gotong royong', '                                                            Gotong royong                                                        ', '2019-09-26 06:58:18', '2019-09-27 11:14:47', 'XU4ttGTRG1wJbFiy3P3k.jpg', 0, 'a:2:{i:0;s:24:\"ISJDubxjzEjoa61qZS8x.jpg\";i:1;s:24:\"XU4ttGTRG1wJbFiy3P3k.jpg\";}'),
(4, 'Suasana sore', '                                                            Suasana sore                                                        ', '2019-09-26 07:01:29', '2019-09-27 03:50:10', 'w3Wd2XreHF8buNKoRrvJ.jpg', 0, 'a:3:{i:0;s:24:\"93vBJqbSTCnrlXwnjhBi.jpg\";i:1;s:24:\"sZyYGrJr57nua7JXR2vd.jpg\";i:2;s:24:\"w3Wd2XreHF8buNKoRrvJ.jpg\";}'),
(5, 'ILUX', '<p>dfsdfsfsdf</p>\r\n', '2019-10-24 09:30:44', '0000-00-00 00:00:00', 'gtk7OO7GQJyyz5DlIcM8.jpg', 1, 'a:2:{i:0;s:43:\"https://www.youtube.com/watch?v=zCmHodTpt9I\";i:1;s:43:\"https://www.youtube.com/watch?v=S0kaqFBoGqI\";}'),
(6, 'Nella Kharisma', '<p>fvsrfrf</p>\r\n', '2019-10-24 10:21:18', '0000-00-00 00:00:00', 'QFePD7B0tVd391GI3U6c.jpg', 1, 'a:2:{i:0;s:43:\"https://www.youtube.com/watch?v=yxfOekJ_t7I\";i:1;s:43:\"https://www.youtube.com/watch?v=RfTKu1qfi9g\";}');

-- --------------------------------------------------------

--
-- Table structure for table `history_surat`
--

CREATE TABLE `history_surat` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tanggal_cetak` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `persyaratan` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id`, `kode_surat`, `nama_surat`, `file_template`, `informasi`, `persyaratan`, `created`, `flag`) VALUES
(5, 'F.01', 'SURAT KETERANGAN KEHILANGAN', 'surat_keterangan_kehilangan.rtf', '                                                                                                                                                                                        ', '[\"1\",\"2\",\"5\",\"6\"]', '2020-09-05 11:22:06', 0),
(6, 'F.02', 'SURAT KELAHIRAN', 'surat_kelahiran.rtf', '                                            ', '[\"2\"]', '2020-09-05 11:22:59', 0);

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
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jk` tinyint(2) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `id_jabatan` tinyint(2) NOT NULL,
  `link_photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama_pegawai`, `jk`, `tempat_lahir`, `tgl_lahir`, `no_tlp`, `id_jabatan`, `link_photo`) VALUES
(1, '1234353456546', 'dfdgs', 1, 'Nürnberg', '2001-10-24', '024321345452', 1, 'Byx48dcJjk.jpg'),
(3, '1234353456546', 'dfdgs', 1, 'Nürnberg', '2019-11-05', '024321345452', 3, '5ustipFDJN.jpg');

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
-- Table structure for table `permohonan_surat`
--

CREATE TABLE `permohonan_surat` (
  `id` int(11) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `nomor_surat` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_hp` varchar(18) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_buat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_cetak` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: pending; 1: review; 2: printed; 3:rejected'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan_surat`
--

INSERT INTO `permohonan_surat` (`id`, `kode_surat`, `nomor_surat`, `nik`, `no_hp`, `nip`, `keterangan`, `tanggal_buat`, `tanggal_cetak`, `status`) VALUES
(5, 'F.02', '001', '3212203003950001', '56587596878888', '', 'dasfsaf', '2020-11-23 23:07:26', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan_surat`
--

CREATE TABLE `persyaratan_surat` (
  `id` int(11) NOT NULL,
  `nama_persyaratan` varchar(100) NOT NULL,
  `jenis_dokumen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persyaratan_surat`
--

INSERT INTO `persyaratan_surat` (`id`, `nama_persyaratan`, `jenis_dokumen`) VALUES
(1, 'FOTO COPY KTP', 'image/*'),
(2, 'FOTO COPY KK', 'image/*'),
(5, 'SURAT KETERANGAN RT', 'application/msword'),
(6, 'SURAT KETERANGAN RW', 'application/pdf');

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
(1, 'Penanaman seribu pohon di desa bojong kokok', 'penanaman-seribu-pohon-di-desa-bojong-kokok', '                                                                                                                                                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>\r\n                                                                                                                                                                        ', 'XVnqJ3ZE7G.jpg', 2, 'artikel', 1, '2019-08-29 19:29:27', '2019-10-17 12:55:17', 1, 0),
(2, 'PROFIL', 'profil', '                                                                                                                                                                                                                                                                                                                                                            ', '', 0, 'halaman', 1, '2019-08-30 10:29:18', '2020-08-31 19:36:52', 1, 0),
(3, 'PROFIL LEMBAGA', 'profil-lembaga', '                                                                                                                                                                                                                                                                                                                                                            ', '', 0, 'halaman', 1, '2019-08-30 10:29:51', '2020-08-31 19:37:07', 0, 0),
(4, 'test', 'test', '                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n                                                        ', '2VqmRnapzZ.jpg', 1, 'artikel', 1, '2019-09-10 09:20:06', '2019-10-16 11:23:31', 1, 0),
(5, 'Memancing di sungai', 'memancing-di-sungai', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>\r\n', 'Cuc8CN90h7.jpg', 1, 'artikel', 1, '2019-09-10 09:36:53', '2019-10-03 06:30:06', 1, 0);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL
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
-- Indexes for table `detail_permohonan_surat`
--
ALTER TABLE `detail_permohonan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_surat`
--
ALTER TABLE `history_surat`
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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
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
-- Indexes for table `permohonan_surat`
--
ALTER TABLE `permohonan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persyaratan_surat`
--
ALTER TABLE `persyaratan_surat`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `detail_permohonan_surat`
--
ALTER TABLE `detail_permohonan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_surat`
--
ALTER TABLE `history_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hubungan`
--
ALTER TABLE `hubungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `permohonan_surat`
--
ALTER TABLE `permohonan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `persyaratan_surat`
--
ALTER TABLE `persyaratan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
