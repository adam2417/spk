-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 09:55 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbspk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasus`
--

DROP TABLE IF EXISTS `tb_kasus`;
CREATE TABLE `tb_kasus` (
  `id_kasus` int(5) NOT NULL COMMENT 'Id kasus mahasiswa',
  `id_atribut` varchar(25) NOT NULL,
  `id_masalah` varchar(25) DEFAULT NULL COMMENT 'Id masalah akademik mahasiswa',
  `id_solusi` varchar(25) DEFAULT NULL COMMENT 'Id solusi masalah',
  `active` int(1) DEFAULT '1',
  `bobot` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kasus`
--

INSERT INTO `tb_kasus` (`id_kasus`, `id_atribut`, `id_masalah`, `id_solusi`, `active`, `bobot`) VALUES
(1, 'EK03', 'M01', 'S17', 1, 0),
(1, 'SE07', 'M01', 'S17', 1, 0),
(1, 'NL03', 'M01', 'S17', 1, 1),
(1, 'PS01', 'M01', 'S17', 1, 1),
(1, 'PR10', 'M01', 'S17', 1, 1),
(1, 'PR11', 'M01', 'S17', 1, 1),
(1, 'PR14', 'M01', 'S17', 1, 1),
(1, 'KE07', 'M01', 'S17', 1, 0),
(1, 'LI06', 'M01', 'S17', 1, 1),
(2, 'EK03', 'M09', 'S21', 1, 0),
(2, 'SE07', 'M09', 'S21', 1, 0),
(2, 'NL04', 'M09', 'S21', 1, 0),
(2, 'PS02', 'M09', 'S21', 1, 1),
(2, 'PS03', 'M09', 'S21', 1, 1),
(2, 'PR05', 'M09', 'S21', 1, 1),
(2, 'KE04', 'M09', 'S21', 1, 1),
(2, 'KE05', 'M09', 'S21', 1, 1),
(2, 'LI02', 'M09', 'S21', 1, 1),
(3, 'EK03', 'M05', 'S08', 1, 0),
(3, 'SE07', 'M05', 'S08', 1, 0),
(3, 'NL04', 'M05', 'S08', 1, 0),
(3, 'PS01', 'M05', 'S08', 1, 1),
(3, 'PS02', 'M05', 'S08', 1, 1),
(3, 'PR05', 'M05', 'S08', 1, 1),
(3, 'PR16', 'M05', 'S08', 1, 1),
(3, 'KE07', 'M05', 'S08', 1, 0),
(3, 'LI09', 'M05', 'S08', 1, 0),
(4, 'EK03', 'M09', 'S08', 1, 0),
(4, 'SE07', 'M09', 'S08', 1, 0),
(4, 'NL02', 'M09', 'S08', 1, 1),
(4, 'PS01', 'M09', 'S08', 1, 1),
(4, 'PR05', 'M09', 'S08', 1, 1),
(4, 'KE07', 'M09', 'S08', 1, 0),
(4, 'LI08', 'M09', 'S08', 1, 1),
(5, 'EK03', 'M07', 'S02', 1, 0),
(5, 'SE04', 'M07', 'S02', 1, 1),
(5, 'NL04', 'M07', 'S02', 1, 0),
(5, 'PS05', 'M07', 'S02', 1, 0),
(1, 'PR01', 'M07', 'S02', 1, 1),
(5, 'PR10', 'M07', 'S02', 1, 1),
(5, 'KE07', 'M07', 'S02', 1, 0),
(5, 'LI09', 'M07', 'S02', 1, 0),
(6, 'EK03', 'M02', 'S02', 1, 0),
(6, 'SE07', 'M02', 'S02', 1, 0),
(6, 'NL04', 'M02', 'S02', 1, 0),
(6, 'PS05', 'M02', 'S02', 1, 0),
(6, 'PR11', 'M02', 'S02', 1, 1),
(6, 'PR12', 'M02', 'S02', 1, 1),
(6, 'PR14', 'M02', 'S02', 1, 1),
(6, 'PR15', 'M02', 'S02', 1, 1),
(6, 'PR16', 'M02', 'S02', 1, 1),
(6, 'KE07', 'M02', 'S02', 1, 0),
(6, 'LI06', 'M02', 'S02', 1, 1),
(7, 'EK03', 'M06', 'S14', 1, 0),
(7, 'SE07', 'M06', 'S14', 1, 0),
(7, 'PS05', 'M06', 'S14', 1, 0),
(7, 'PR05', 'M06', 'S14', 1, 1),
(7, 'PR07', 'M06', 'S14', 1, 1),
(7, 'PR09', 'M06', 'S14', 1, 1),
(7, 'KE07', 'M06', 'S14', 1, 0),
(7, 'LI02', 'M06', 'S14', 1, 1),
(7, 'LI03', 'M06', 'S14', 1, 1),
(7, 'LI04', 'M06', 'S14', 1, 1),
(8, 'PR10', 'M10', 'S05', 1, 1),
(8, 'EK03', 'M10', 'S05', 1, 0),
(8, 'SE07', 'M10', 'S05', 1, 0),
(8, 'PS05', 'M10', 'S05', 1, 0),
(8, 'NL04', 'M10', 'S05', 1, 0),
(8, 'PR08', 'M10', 'S05', 1, 1),
(8, 'PR12', 'M10', 'S05', 1, 1),
(8, 'KE07', 'M10', 'S05', 1, 0),
(8, 'LI06', 'M10', 'S05', 1, 1),
(9, 'EK03', 'M03', 'S13', 1, 0),
(9, 'SE07', 'M03', 'S13', 1, 0),
(9, 'NL04', 'M03', 'S13', 1, 0),
(9, 'PS05', 'M03', 'S13', 1, 0),
(9, 'PR06', 'M03', 'S13', 1, 1),
(9, 'PR08', 'M03', 'S13', 1, 1),
(9, 'PR15', 'M03', 'S13', 1, 1),
(9, 'KE07', 'M03', 'S13', 1, 0),
(9, 'LI09', 'M03', 'S13', 1, 0),
(10, 'EK02', 'M10', 'S11', 1, 1),
(10, 'SE07', 'M10', 'S11', 1, 0),
(10, 'NL01', 'M10', 'S11', 1, 1),
(10, 'PS04', 'M10', 'S11', 1, 1),
(10, 'PR21', 'M10', 'S11', 1, 0),
(10, 'KE02', 'M10', 'S11', 1, 1),
(10, 'LI09', 'M10', 'S11', 1, 0),
(11, 'EK03', 'M06', 'S07', 1, 0),
(11, 'SE04', 'M06', 'S07', 1, 1),
(11, 'NL03', 'M06', 'S07', 1, 1),
(11, 'PS02', 'M06', 'S07', 1, 1),
(11, 'PR01', 'M06', 'S07', 1, 1),
(11, 'PR05', 'M06', 'S07', 1, 1),
(11, 'PR10', 'M06', 'S07', 1, 1),
(11, 'KE07', 'M06', 'S07', 1, 0),
(11, 'LI09', 'M06', 'S07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluhan`
--

DROP TABLE IF EXISTS `tb_keluhan`;
CREATE TABLE `tb_keluhan` (
  `id_keluhan` int(5) NOT NULL COMMENT 'Id keluhan mahasiswa',
  `nis` varchar(25) DEFAULT NULL COMMENT 'nama mahasiswa',
  `id_atribut` varchar(25) NOT NULL DEFAULT '' COMMENT 'id atribut',
  `active` int(1) DEFAULT '1',
  `bobot` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keluhan`
--

INSERT INTO `tb_keluhan` (`id_keluhan`, `nis`, `id_atribut`, `active`, `bobot`) VALUES
(1, '10144', 'PS01', 1, 1),
(1, '10144', 'SE07', 1, 1),
(1, '10144', 'PR05', 1, 1),
(1, '10144', 'LI04', 1, 1),
(1, '10144', 'LI08', 1, 1),
(1, '10144', 'EK03', 1, 0),
(1, '10144', 'KE07', 1, 0),
(1, '10144', 'NL02', 1, 1),
(2, '10145', 'PS02', 0, 1),
(2, '10145', 'SE04', 0, 1),
(2, '10145', 'PR01', 0, 1),
(2, '10145', 'PR05', 0, 1),
(2, '10145', 'PR10', 0, 1),
(2, '10145', 'LI09', 0, 0),
(2, '10145', 'EK03', 0, 0),
(2, '10145', 'KE07', 0, 0),
(2, '10145', 'NL02', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

DROP TABLE IF EXISTS `tb_level`;
CREATE TABLE `tb_level` (
  `Id_level` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id Level pengguna',
  `keterangan` varchar(35) DEFAULT NULL COMMENT 'Keterangan',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_masalah`
--

DROP TABLE IF EXISTS `tb_masalah`;
CREATE TABLE `tb_masalah` (
  `id_masalah` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id masalah mahasiswa',
  `ket` text COMMENT 'Keterangan masalah akademik mahasiswa',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masalah`
--

INSERT INTO `tb_masalah` (`id_masalah`, `ket`, `active`) VALUES
('M01', 'Terancam dikeluarkan dari sekolah', 1),
('M02', 'Terancam diskorsing dari sekolah', 1),
('M03', 'Adanya kegiatan belajar yang salah', 1),
('M04', 'Masalah dalam mempelajari pelajaran tertentu', 1),
('M05', 'Rendahnya kepercayaan diri untuk menghadapi pelajaran tertentu', 1),
('M06', 'Kurang termotivasi untuk belajar', 1),
('M07', 'Masalah dalam mengatur waktu belajar dengan baik', 1),
('M08', 'Tertekan karna banyak kegiatan diluar sekolah yang menyebabkan turunnya kosentrasi belajar', 1),
('M09', 'Masalah dengan orang tua yang selalu menekan anak untuk berprestasi', 1),
('M10', 'Berkelakuan tidak baik terhadap siswa lain dan guru', 1),
('M11', 'Tidak dapat membayar uang sekolah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_msnumbering`
--

DROP TABLE IF EXISTS `tb_msnumbering`;
CREATE TABLE `tb_msnumbering` (
  `iid` int(11) NOT NULL,
  `num_format` varchar(25) DEFAULT NULL,
  `modul` varchar(15) DEFAULT NULL,
  `app` varchar(25) DEFAULT NULL,
  `last_num` int(3) DEFAULT NULL,
  `keterangan` text,
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_msnumbering`
--

INSERT INTO `tb_msnumbering` (`iid`, `num_format`, `modul`, `app`, `last_num`, `keterangan`, `active`) VALUES
(3, 'PSym4N', 'MS', 'psi', 0, 'Untuk penomoran master psikologi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna` (
  `id_pengguna` varchar(25) NOT NULL DEFAULT '' COMMENT 'Nama pengguna',
  `nama` varchar(35) DEFAULT NULL COMMENT 'Nama lengkap pengguna',
  `password` varchar(15) DEFAULT NULL COMMENT 'Kata kunci pengguna',
  `email` varchar(25) DEFAULT NULL COMMENT 'Elektronik mail pengguna',
  `Id_level` varchar(25) DEFAULT NULL COMMENT 'level > id_level ID Level penguna',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prm_asalmhs`
--

DROP TABLE IF EXISTS `tb_prm_asalmhs`;
CREATE TABLE `tb_prm_asalmhs` (
  `id_asal` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id asal mahasiswa',
  `ket` varchar(35) DEFAULT NULL COMMENT 'Keterangan asal mahasiswa',
  `Bobot` int(5) DEFAULT NULL COMMENT 'Bobot variabel/atribut',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prm_ekonomi`
--

DROP TABLE IF EXISTS `tb_prm_ekonomi`;
CREATE TABLE `tb_prm_ekonomi` (
  `id_eko` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id keadaan ekonomi mahasiswa',
  `ket` varchar(35) DEFAULT NULL COMMENT 'Keterangan keadaan ekonomi mahasiswa',
  `bobot` int(5) DEFAULT NULL COMMENT 'Bobot sub variabel/atribut',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prm_ekonomi`
--

INSERT INTO `tb_prm_ekonomi` (`id_eko`, `ket`, `bobot`, `active`) VALUES
('EK01', 'Mampu', 1, 1),
('EK02', 'Tidak Mampu', 1, 1),
('EK03', 'Diabaikan', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prm_keluarga`
--

DROP TABLE IF EXISTS `tb_prm_keluarga`;
CREATE TABLE `tb_prm_keluarga` (
  `id_keluarga` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id keluarga mahasiswa',
  `ket` varchar(100) DEFAULT NULL COMMENT 'Keterangan keluarga mahasiswa',
  `bobot` int(5) DEFAULT NULL COMMENT 'Bobot sub variabel/atribut',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prm_keluarga`
--

INSERT INTO `tb_prm_keluarga` (`id_keluarga`, `ket`, `bobot`, `active`) VALUES
('KE01', 'Perceraian orang tua', 1, 1),
('KE02', 'Orang tua meninggal ', 1, 1),
('KE03', 'Pertengkaran orang tua  (KDRT)', 1, 1),
('KE04', 'Orang tua egois', 1, 1),
('KE05', 'Komunikasi dengan keluarga kurang harmonis', 1, 1),
('KE06', 'Tidak bermasalah', 1, 1),
('KE07', 'Diabaikan', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prm_kondisiawal`
--

DROP TABLE IF EXISTS `tb_prm_kondisiawal`;
CREATE TABLE `tb_prm_kondisiawal` (
  `id_kondisi` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id kondisi',
  `id_psikologi` varchar(25) DEFAULT NULL COMMENT 'Id psikologi mahasiswa',
  `id_asal` varchar(25) DEFAULT NULL COMMENT 'Id asal mahasiswa',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prm_lingkungan`
--

DROP TABLE IF EXISTS `tb_prm_lingkungan`;
CREATE TABLE `tb_prm_lingkungan` (
  `id_lingkungan` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id lingkungan mahasiswa',
  `ket` varchar(100) DEFAULT NULL COMMENT 'Keterangan',
  `bobot` int(5) DEFAULT NULL COMMENT 'Bobot sub variabel/atribut',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prm_lingkungan`
--

INSERT INTO `tb_prm_lingkungan` (`id_lingkungan`, `ket`, `bobot`, `active`) VALUES
('LI01', 'Cara mengajar guru terlalu membosankan', 1, 1),
('LI02', 'Terlalu susah tugas rumah yang diberikan', 1, 1),
('LI03', 'Guru jarang masuk ke kelas', 1, 1),
('LI04', 'Guru susah sekali ditemui', 1, 1),
('LI05', 'Sering berselisih dengan teman sekelas', 1, 1),
('LI06', 'Teman sering mengajak bolos', 1, 1),
('LI07', 'Sarana laboratorium yang tidak mendukung', 1, 1),
('LI08', 'Perpustakaan yang kurang mendukung', 1, 1),
('LI09', 'Diabaikan', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prm_nilai`
--

DROP TABLE IF EXISTS `tb_prm_nilai`;
CREATE TABLE `tb_prm_nilai` (
  `id_ipk` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id IPK mahasiswa',
  `ket` varchar(35) DEFAULT NULL COMMENT 'Keterangan',
  `bobot` int(5) DEFAULT NULL COMMENT 'Bobot variabel/atribut',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prm_nilai`
--

INSERT INTO `tb_prm_nilai` (`id_ipk`, `ket`, `bobot`, `active`) VALUES
('NL01', 'Tinggi ( rata-rata di atas 8)', 1, 1),
('NL02', 'Standar (rata-rata diantara 6 dan 8', 1, 1),
('NL03', 'Rendah ( rata-rata di bawah 6)', 1, 1),
('NL04', 'Diabaikan', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prm_pribadi`
--

DROP TABLE IF EXISTS `tb_prm_pribadi`;
CREATE TABLE `tb_prm_pribadi` (
  `id_pribadi` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id kondisi pribadi mahasiswa',
  `ket` varchar(100) DEFAULT NULL COMMENT 'Keterangan kondisi pribadi mahasiswa',
  `bobot` int(5) DEFAULT NULL COMMENT 'Bobot sub variabel/atribut',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prm_pribadi`
--

INSERT INTO `tb_prm_pribadi` (`id_pribadi`, `ket`, `bobot`, `active`) VALUES
('PR01', 'Mudah bergaul', 1, 1),
('PR02', 'Tidak bermasalah (aktif di dalam kelas)', 1, 1),
('PR03', 'Tidak bermasalah (rajin)', 1, 1),
('PR04', 'Tidak bermasalah (cerdas)', 1, 1),
('PR05', 'Kurang percaya diri', 1, 1),
('PR06', 'Aktif dalam kegiatan ekstra kurikuler', 1, 1),
('PR07', 'Bingung menangkap materi pelajaran', 1, 1),
('PR08', 'Sulit bergaul dengan siswa lain', 1, 1),
('PR09', 'Sering mengantuk di kelas', 1, 1),
('PR10', 'Sering membuat gaduh di kelas', 1, 1),
('PR11', 'Sering lalai mengerjakan tugas rumah', 1, 1),
('PR12', 'Sering bolos di jam pelajaran', 1, 1),
('PR13', 'Punya gangguan kesehatan / fisik', 1, 1),
('PR14', 'Malas masuk sekolah', 1, 1),
('PR15', 'Sering terlambat sekolah', 1, 1),
('PR16', 'Sulit bergaul dengan siswa lainnya', 1, 1),
('PR17', 'Suka berkelahi dengan siswa lain', 1, 1),
('PR18', 'Suka menyontek di kelas', 1, 1),
('PR19', 'Suka merusak fasilitas sekolah', 1, 1),
('PR20', 'Tidak berlaku sopan dengan sesama', 1, 1),
('PR21', 'Diabaikan', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prm_psikologis`
--

DROP TABLE IF EXISTS `tb_prm_psikologis`;
CREATE TABLE `tb_prm_psikologis` (
  `id_psikologis` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id kondisi awal',
  `ket` varchar(35) DEFAULT NULL COMMENT 'Keterangan kondisi',
  `Bobot` int(5) DEFAULT NULL COMMENT 'Bobot variabel/atribut',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prm_psikologis`
--

INSERT INTO `tb_prm_psikologis` (`id_psikologis`, `ket`, `Bobot`, `active`) VALUES
('PS01', 'Tertutup', 1, 1),
('PS02', 'Tertekan', 1, 1),
('PS03', 'Murung', 1, 1),
('PS04', 'Normal', 5, 1),
('PS05', 'Diabaikan', 0, 1),
('PS06', 'Normal', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prm_semester`
--

DROP TABLE IF EXISTS `tb_prm_semester`;
CREATE TABLE `tb_prm_semester` (
  `id_semester` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id semester mahasiswa',
  `ket` varchar(35) DEFAULT NULL COMMENT 'Keterangan',
  `bobot` int(5) DEFAULT NULL COMMENT 'Bobot variabel/atribut',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prm_semester`
--

INSERT INTO `tb_prm_semester` (`id_semester`, `ket`, `bobot`, `active`) VALUES
('SE01', 'Semester 1 Kelas VII', 1, 1),
('SE02', 'Semester 2 Kelas VII', 1, 1),
('SE03', 'Semester 1 Kelas VIII', 1, 1),
('SE04', 'Semester 2 Kelas VIII', 1, 1),
('SE05', 'Semester 1 Kelas IX', 1, 1),
('SE06', ' Semester 2 Kelas IX', 1, 1),
('SE07', 'Diabaikan', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `desc`, `active`) VALUES
(1, 'Administrator', 1),
(2, 'Pakar', 1),
(3, 'Konsultan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--
-- in use(#1932 - Table 'dbspk.tb_siswa' doesn't exist in engine)
-- Error reading data: (#1932 - Table 'dbspk.tb_siswa' doesn't exist in engine)

-- --------------------------------------------------------

--
-- Table structure for table `tb_solusi`
--

DROP TABLE IF EXISTS `tb_solusi`;
CREATE TABLE `tb_solusi` (
  `id_solusi` varchar(25) NOT NULL DEFAULT '' COMMENT 'Id solusi masalah',
  `ket` text COMMENT 'Keterangan solusi masalah',
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_solusi`
--

INSERT INTO `tb_solusi` (`id_solusi`, `ket`, `active`) VALUES
('S01', 'Diminta untuk mengundurkan diri', 1),
('S02', 'Diskors selama 1 minggu', 1),
('S03', 'Diskors selama 1 semester', 1),
('S04', 'Diskors selama 1 tahun pelajaran', 1),
('S05', 'Pemberitahuan ke orang tua', 1),
('S06', 'Mengurangi kegiatan luar sekolah', 1),
('S07', 'Memotivasi siswa untuk lebih giat belajar', 1),
('S08', 'Diberi latihan untuk meningkatkan kepercayaan diri siswa', 1),
('S09', 'Diminta untuk menyelesaikan masalah yang terjadi diluar lingkungan pendidikan', 1),
('S10', 'Melakukan pemeriksaan absen guna mediasi dengan guru mata pelajaran', 1),
('S11', 'Diberikan dispensasi pelunasaan SPP', 1),
('S12', 'Diberikan beasiswa untuk membantu siswa', 1),
('S13', 'Memotivasi siswa untuk mengatur waktu diluar waktu sekolah', 1),
('S14', 'Membantu wali kelas dalam hal membimbing siswa untuk menjadi lebih baik', 1),
('S15', 'Memberi peringatan ringan kepada siswa untuk tidak mengulang kesalahan yang sama', 1),
('S16', 'Memberi teguran keras dan sanksi kepada siswa yang bersangkutan', 1),
('S17', 'Dikeluarkan dari sekolah', 1),
('S18', 'Belajar untuk mencari informasi mengenai tugas rumah yang diberikan', 1),
('S19', 'Diminta untuk lebih fokus pada mata pelajaran yang dianggap kurang', 1),
('S20', 'Membantu siswa dalam mengatur jadwal aktifitas baik didalam maupun diluar jam sekolah', 1),
('S21', 'Orang tua lebih memperhatikan anak dalam kegiatan diluar kegiatan sekolah', 1),
('S22', 'Mengganti fasiliatas sekolah yang rusak dengan fasilitas baru', 1),
('S23', 'Perlu adanya bimbingan rohani kepada siswa untuk berakhlak lebih baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sysparam`
--
-- in use(#1932 - Table 'dbspk.tb_sysparam' doesn't exist in engine)
-- Error reading data: (#1932 - Table 'dbspk.tb_sysparam' doesn't exist in engine)

-- --------------------------------------------------------

--
-- Table structure for table `tb_treshold`
--
-- in use(#1932 - Table 'dbspk.tb_treshold' doesn't exist in engine)
-- Error reading data: (#1932 - Table 'dbspk.tb_treshold' doesn't exist in engine)

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `fullname` varchar(150) DEFAULT NULL,
  `pass` varchar(250) NOT NULL,
  `active` int(1) DEFAULT '1',
  `role` int(11) DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `uname`, `fullname`, `pass`, `active`, `role`, `last_login`, `email`) VALUES
(1, 'admin', 'Administrator', 'admin', 1, 1, '2016-03-22', ''),
(2, 'ali', 'Administrator', 'ali', 1, 3, '2016-03-21', ''),
(4, 'guru', 'Administrator', 'guru', 1, 2, '2016-03-22', '');

-- --------------------------------------------------------
--
-- Structure for view `vw_detail_kasus`
--
DROP TABLE IF EXISTS `vw_detail_kasus`;

CREATE or replace VIEW `vw_detail_kasus`  AS  select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,`a`.`id_atribut` AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,`a`.`id_masalah` AS `id_masalah`,`a`.`id_solusi` AS `id_solusi`,'Asal' AS `Keterangan`,`a`.`bobot` AS `Bobot` from (`tb_kasus` `a` join `tb_prm_asalmhs` `b`) where (`a`.`id_atribut` = `b`.`id_asal`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,`b`.`ket` AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,`a`.`id_atribut` AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,`a`.`id_masalah` AS `id_masalah`,`a`.`id_solusi` AS `id_solusi`,'Ekonomi' AS `Keterangan`,`a`.`bobot` AS `Bobot` from (`tb_kasus` `a` join `tb_prm_ekonomi` `b`) where (`a`.`id_atribut` = `b`.`id_eko`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,`b`.`ket` AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,`a`.`id_atribut` AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,`a`.`id_masalah` AS `id_masalah`,`a`.`id_solusi` AS `id_solusi`,'IPK' AS `Keterangan`,`a`.`bobot` AS `Bobot` from (`tb_kasus` `a` join `tb_prm_nilai` `b`) where (`a`.`id_atribut` = `b`.`id_ipk`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,`b`.`ket` AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,`a`.`id_atribut` AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,`a`.`id_masalah` AS `id_masalah`,`a`.`id_solusi` AS `id_solusi`,'Keluarga' AS `Keterangan`,`a`.`bobot` AS `Bobot` from (`tb_kasus` `a` join `tb_prm_keluarga` `b`) where (`a`.`id_atribut` = `b`.`id_keluarga`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,`b`.`ket` AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,`a`.`id_atribut` AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,`a`.`id_masalah` AS `id_masalah`,`a`.`id_solusi` AS `id_solusi`,'Lingkungan' AS `Keterangan`,`a`.`bobot` AS `Bobot` from (`tb_kasus` `a` join `tb_prm_lingkungan` `b`) where (`a`.`id_atribut` = `b`.`id_lingkungan`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,`b`.`ket` AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,`a`.`id_atribut` AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,`a`.`id_masalah` AS `id_masalah`,`a`.`id_solusi` AS `id_solusi`,'Pribadi' AS `Keterangan`,`a`.`bobot` AS `Bobot` from (`tb_kasus` `a` join `tb_prm_pribadi` `b`) where (`a`.`id_atribut` = `b`.`id_pribadi`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,`b`.`ket` AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,`a`.`id_atribut` AS `IDPsikologis`,'' AS `IDSemester`,`a`.`id_masalah` AS `id_masalah`,`a`.`id_solusi` AS `id_solusi`,'Psikologis' AS `Keterangan`,`a`.`bobot` AS `Bobot` from (`tb_kasus` `a` join `tb_prm_psikologis` `b`) where (`a`.`id_atribut` = `b`.`id_psikologis`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,`b`.`ket` AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,`a`.`id_atribut` AS `IDSemester`,`a`.`id_masalah` AS `id_masalah`,`a`.`id_solusi` AS `id_solusi`,'Semester' AS `Keterangan`,`a`.`bobot` AS `Bobot` from (`tb_kasus` `a` join `tb_prm_semester` `b`) where (`a`.`id_atribut` = `b`.`id_semester`) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_detail_kasus_onecolumn`
--
DROP TABLE IF EXISTS `vw_detail_kasus_onecolumn`;

CREATE or replace VIEW `vw_detail_kasus_onecolumn`  AS  select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `ket`,`a`.`bobot` AS `bobot` from (`tb_kasus` `a` join `tb_prm_asalmhs` `b`) where (`a`.`id_atribut` = `b`.`id_asal`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `ket`,`a`.`bobot` AS `bobot` from (`tb_kasus` `a` join `tb_prm_ekonomi` `b`) where (`a`.`id_atribut` = `b`.`id_eko`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `ket`,`a`.`bobot` AS `bobot` from (`tb_kasus` `a` join `tb_prm_nilai` `b`) where (`a`.`id_atribut` = `b`.`id_ipk`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `ket`,`a`.`bobot` AS `bobot` from (`tb_kasus` `a` join `tb_prm_keluarga` `b`) where (`a`.`id_atribut` = `b`.`id_keluarga`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `ket`,`a`.`bobot` AS `bobot` from (`tb_kasus` `a` join `tb_prm_lingkungan` `b`) where (`a`.`id_atribut` = `b`.`id_lingkungan`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `ket`,`a`.`bobot` AS `bobot` from (`tb_kasus` `a` join `tb_prm_pribadi` `b`) where (`a`.`id_atribut` = `b`.`id_pribadi`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `ket`,`a`.`bobot` AS `bobot` from (`tb_kasus` `a` join `tb_prm_psikologis` `b`) where (`a`.`id_atribut` = `b`.`id_psikologis`) union all select `a`.`id_kasus` AS `id_kasus`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `ket`,`a`.`bobot` AS `bobot` from (`tb_kasus` `a` join `tb_prm_semester` `b`) where (`a`.`id_atribut` = `b`.`id_semester`) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_jml_gejala_cocok`
--
DROP TABLE IF EXISTS `vw_jml_gejala_cocok`;

CREATE or replace VIEW `vw_jml_gejala_cocok`  AS  select `a`.`id_kasus` AS `ID_KASUS`,`a`.`id_masalah` AS `ID_MASALAH`,`a`.`id_solusi` AS `ID_SOLUSI`,`b`.`id_keluhan` AS `ID_KELUHAN`,sum(`a`.`Bobot`) AS `JML_GEJALA_COCOK` from (`vw_detail_kasus` `a` join `tb_keluhan` `b`) where (`a`.`id_atribut` = `b`.`id_atribut`) group by `a`.`id_kasus`,`a`.`id_masalah`,`a`.`id_solusi`,`b`.`id_keluhan` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_jml_gejala_dipilih`
--
DROP TABLE IF EXISTS `vw_jml_gejala_dipilih`;

CREATE or replace VIEW `vw_jml_gejala_dipilih`  AS  select `vw_rekap_keluhan`.`ID_KELUHAN` AS `id_keluhan`,sum(`vw_rekap_keluhan`.`bobot`) AS `jml_gejala_dipilih` from `vw_rekap_keluhan` group by `vw_rekap_keluhan`.`ID_KELUHAN` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_jml_gejala_kasus`
--
DROP TABLE IF EXISTS `vw_jml_gejala_kasus`;

CREATE or replace VIEW `vw_jml_gejala_kasus`  AS  select `vw_detail_kasus`.`id_kasus` AS `ID_KASUS`,sum(`vw_detail_kasus`.`Bobot`) AS `JML_GEJALA_KASUS` from `vw_detail_kasus` group by `vw_detail_kasus`.`id_kasus` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_knds_basis_kasus`
--
DROP TABLE IF EXISTS `vw_knds_basis_kasus`;

CREATE or replace VIEW `vw_knds_basis_kasus`  AS  select `vw_detail_kasus_onecolumn`.`id_kasus` AS `id_kasus`,sum(`vw_detail_kasus_onecolumn`.`bobot`) AS `jml_knds_basis_kasus` from `vw_detail_kasus_onecolumn` where (not((`vw_detail_kasus_onecolumn`.`ket` like '%DIABAIKAN%'))) group by `vw_detail_kasus_onecolumn`.`id_kasus` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_max_nilai_kasus`
--
DROP TABLE IF EXISTS `vw_max_nilai_kasus`;

CREATE or replace VIEW `vw_max_nilai_kasus`  AS  select `vw_rekap_cbr`.`id_keluhan` AS `ID_KELUHAN`,max(`vw_rekap_cbr`.`nilai`) AS `NILAI` from `vw_rekap_cbr` group by `vw_rekap_cbr`.`id_keluhan` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rekap_cbr`
--
DROP TABLE IF EXISTS `vw_rekap_cbr`;

CREATE or replace VIEW `vw_rekap_cbr`  AS  select `a`.`id_kasus` AS `id_kasus`,`b`.`id_keluhan` AS `id_keluhan`,`c`.`JML_GEJALA_COCOK` AS `jml_gejala_cocok`,`a`.`jml_knds_basis_kasus` AS `jml_knds_basis_kasus`,`b`.`jml_gejala_dipilih` AS `jml_gejala_dipilih`,if((`a`.`jml_knds_basis_kasus` > `b`.`jml_gejala_dipilih`),`a`.`jml_knds_basis_kasus`,`b`.`jml_gejala_dipilih`) AS `pembagi`,round(((`c`.`JML_GEJALA_COCOK` / if((`a`.`jml_knds_basis_kasus` > `b`.`jml_gejala_dipilih`),`a`.`jml_knds_basis_kasus`,`b`.`jml_gejala_dipilih`)) * 100),2) AS `nilai` from ((`vw_knds_basis_kasus` `a` join `vw_jml_gejala_dipilih` `b`) join `vw_jml_gejala_cocok` `c`) where ((`c`.`ID_KASUS` = `a`.`id_kasus`) and (`c`.`ID_KELUHAN` = `b`.`id_keluhan`)) order by `b`.`id_keluhan` desc,`a`.`id_kasus` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rekap_hasil_solusi`
--
DROP TABLE IF EXISTS `vw_rekap_hasil_solusi`;

CREATE or replace VIEW `vw_rekap_hasil_solusi`  AS  select `a`.`id_kasus` AS `id_kasus`,`a`.`id_keluhan` AS `id_keluhan`,`a`.`nilai` AS `nilai`,`c`.`ket` AS `solusi` from (((`vw_rekap_cbr` `a` join `vw_rekap_kasus_solusi` `b` on((`a`.`id_kasus` = `b`.`id_kasus`))) join `tb_solusi` `c` on((`c`.`id_solusi` = `b`.`id_solusi`))) join `tb_treshold` `d` on((`a`.`nilai` >= `d`.`Nilai`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rekap_kasus`
--
DROP TABLE IF EXISTS `vw_rekap_kasus`;

CREATE or replace VIEW `vw_rekap_kasus`  AS  select `vw_detail_kasus`.`id_kasus` AS `id_kasus`,`vw_detail_kasus`.`id_masalah` AS `id_masalah`,`vw_detail_kasus`.`id_solusi` AS `id_solusi`,`tb_solusi`.`ket` AS `solusi`,max(`vw_detail_kasus`.`IDAsal`) AS `idasal`,max(`vw_detail_kasus`.`Asal`) AS `asal`,max(`vw_detail_kasus`.`IDEkonomi`) AS `idekonomi`,max(`vw_detail_kasus`.`Ekonomi`) AS `ekonomi`,max(`vw_detail_kasus`.`IDIPK`) AS `idipk`,max(`vw_detail_kasus`.`IPK`) AS `ipk`,max(`vw_detail_kasus`.`IDKeluarga`) AS `idkeluarga`,max(`vw_detail_kasus`.`Keluarga`) AS `keluarga`,max(`vw_detail_kasus`.`IDLingkungan`) AS `idlingkungan`,max(`vw_detail_kasus`.`Lingkungan`) AS `lingkungan`,max(`vw_detail_kasus`.`IDPribadi`) AS `idpribadi`,max(`vw_detail_kasus`.`Pribadi`) AS `pribadi`,max(`vw_detail_kasus`.`IDPsikologis`) AS `idpsikologis`,max(`vw_detail_kasus`.`Psikologis`) AS `psikologis`,max(`vw_detail_kasus`.`IDSemester`) AS `idsemester`,max(`vw_detail_kasus`.`Semester`) AS `semester` from (`vw_detail_kasus` join `tb_solusi`) where (`vw_detail_kasus`.`id_solusi` = `tb_solusi`.`id_solusi`) group by `vw_detail_kasus`.`id_kasus`,`vw_detail_kasus`.`id_masalah`,`vw_detail_kasus`.`id_solusi`,`tb_solusi`.`ket` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rekap_kasus_solusi`
--
DROP TABLE IF EXISTS `vw_rekap_kasus_solusi`;

CREATE or replace VIEW `vw_rekap_kasus_solusi`  AS  select distinct `tb_kasus`.`id_kasus` AS `id_kasus`,`tb_kasus`.`id_masalah` AS `id_masalah`,`tb_kasus`.`id_solusi` AS `id_solusi` from `tb_kasus` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rekap_keluhan`
--
DROP TABLE IF EXISTS `vw_rekap_keluhan`;

CREATE or replace VIEW `vw_rekap_keluhan`  AS  select `a`.`id_keluhan` AS `ID_KELUHAN`,`a`.`id_atribut` AS `id_atribut`,`b`.`ket` AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,`a`.`id_atribut` AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,'Asal' AS `Keterangan`,`b`.`Bobot` AS `bobot` from (`tb_keluhan` `a` join `tb_prm_asalmhs` `b`) where (`a`.`id_atribut` = `b`.`id_asal`) union all select `a`.`id_keluhan` AS `ID_KELUHAN`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,`b`.`ket` AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,`a`.`id_atribut` AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,'Ekonomi' AS `Keterangan`,`b`.`bobot` AS `bobot` from (`tb_keluhan` `a` join `tb_prm_ekonomi` `b`) where (`a`.`id_atribut` = `b`.`id_eko`) union all select `a`.`id_keluhan` AS `ID_KELUHAN`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,`b`.`ket` AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,`a`.`id_atribut` AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,'IPK' AS `Keterangan`,`b`.`bobot` AS `bobot` from (`tb_keluhan` `a` join `tb_prm_nilai` `b`) where (`a`.`id_atribut` = `b`.`id_ipk`) union all select `a`.`id_keluhan` AS `ID_KELUHAN`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,`b`.`ket` AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,`a`.`id_atribut` AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,'Keluarga' AS `Keterangan`,`b`.`bobot` AS `bobot` from (`tb_keluhan` `a` join `tb_prm_keluarga` `b`) where (`a`.`id_atribut` = `b`.`id_keluarga`) union all select `a`.`id_keluhan` AS `ID_KELUHAN`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,`b`.`ket` AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,`a`.`id_atribut` AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,'Lingkungan' AS `Keterangan`,`b`.`bobot` AS `bobot` from (`tb_keluhan` `a` join `tb_prm_lingkungan` `b`) where (`a`.`id_atribut` = `b`.`id_lingkungan`) union all select `a`.`id_keluhan` AS `ID_KELUHAN`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,`b`.`ket` AS `Pribadi`,'' AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,`a`.`id_atribut` AS `IDPribadi`,'' AS `IDPsikologis`,'' AS `IDSemester`,'Pribadi' AS `Keterangan`,`b`.`bobot` AS `bobot` from (`tb_keluhan` `a` join `tb_prm_pribadi` `b`) where (`a`.`id_atribut` = `b`.`id_pribadi`) union all select `a`.`id_keluhan` AS `ID_KELUHAN`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,`b`.`ket` AS `Psikologis`,'' AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,`a`.`id_atribut` AS `IDPsikologis`,'' AS `IDSemester`,'Psikologis' AS `Keterangan`,`b`.`Bobot` AS `bobot` from (`tb_keluhan` `a` join `tb_prm_psikologis` `b`) where (`a`.`id_atribut` = `b`.`id_psikologis`) union all select `a`.`id_keluhan` AS `ID_KELUHAN`,`a`.`id_atribut` AS `id_atribut`,'' AS `Asal`,'' AS `Ekonomi`,'' AS `IPK`,'' AS `Keluarga`,'' AS `Lingkungan`,'' AS `Pribadi`,'' AS `Psikologis`,`b`.`ket` AS `Semester`,'' AS `IDAsal`,'' AS `IDEkonomi`,'' AS `IDIPK`,'' AS `IDKeluarga`,'' AS `IDLingkungan`,'' AS `IDPribadi`,'' AS `IDPsikologis`,`a`.`id_atribut` AS `IDSemester`,'Semester' AS `Keterangan`,`b`.`bobot` AS `bobot` from (`tb_keluhan` `a` join `tb_prm_semester` `b`) where (`a`.`id_atribut` = `b`.`id_semester`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kasus`
--
ALTER TABLE `tb_kasus`
  ADD PRIMARY KEY (`id_kasus`,`id_atribut`);

--
-- Indexes for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`id_keluhan`,`id_atribut`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`Id_level`);

--
-- Indexes for table `tb_masalah`
--
ALTER TABLE `tb_masalah`
  ADD PRIMARY KEY (`id_masalah`);

--
-- Indexes for table `tb_msnumbering`
--
ALTER TABLE `tb_msnumbering`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `nama` (`nama`,`password`);

--
-- Indexes for table `tb_prm_asalmhs`
--
ALTER TABLE `tb_prm_asalmhs`
  ADD PRIMARY KEY (`id_asal`),
  ADD KEY `ket` (`ket`);

--
-- Indexes for table `tb_prm_ekonomi`
--
ALTER TABLE `tb_prm_ekonomi`
  ADD PRIMARY KEY (`id_eko`),
  ADD KEY `ket` (`ket`);

--
-- Indexes for table `tb_prm_keluarga`
--
ALTER TABLE `tb_prm_keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `ket` (`ket`);

--
-- Indexes for table `tb_prm_kondisiawal`
--
ALTER TABLE `tb_prm_kondisiawal`
  ADD PRIMARY KEY (`id_kondisi`),
  ADD UNIQUE KEY `id_kondisi` (`id_kondisi`,`id_psikologi`,`id_asal`),
  ADD KEY `id_psikologi` (`id_psikologi`,`id_asal`);

--
-- Indexes for table `tb_prm_lingkungan`
--
ALTER TABLE `tb_prm_lingkungan`
  ADD PRIMARY KEY (`id_lingkungan`),
  ADD KEY `ket` (`ket`);

--
-- Indexes for table `tb_prm_nilai`
--
ALTER TABLE `tb_prm_nilai`
  ADD PRIMARY KEY (`id_ipk`),
  ADD KEY `ket` (`ket`);

--
-- Indexes for table `tb_prm_pribadi`
--
ALTER TABLE `tb_prm_pribadi`
  ADD PRIMARY KEY (`id_pribadi`),
  ADD KEY `ket` (`ket`);

--
-- Indexes for table `tb_prm_psikologis`
--
ALTER TABLE `tb_prm_psikologis`
  ADD PRIMARY KEY (`id_psikologis`),
  ADD KEY `ket` (`ket`);

--
-- Indexes for table `tb_prm_semester`
--
ALTER TABLE `tb_prm_semester`
  ADD PRIMARY KEY (`id_semester`),
  ADD KEY `ket` (`ket`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_solusi`
--
ALTER TABLE `tb_solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_msnumbering`
--
ALTER TABLE `tb_msnumbering`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
