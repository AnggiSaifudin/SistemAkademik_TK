-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2024 pada 12.23
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakadtk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `nuptk` bigint(20) NOT NULL,
  `nama_guru` varchar(60) NOT NULL,
  `ttl` date DEFAULT NULL,
  `jk` enum('laki-laki','perempuan') DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto_guru` blob DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`nuptk`, `nama_guru`, `ttl`, `jk`, `alamat`, `foto_guru`, `password`) VALUES
(1143776677230020, 'YUSTIKA AMELIA PUTRI ', '1998-08-11', 'perempuan', 'BOJONGBATA', NULL, '$2y$10$sY75YKH9Ocixe901pZBsLe/dDcH9PS0cpyIzGyWRXJvZnCke5AHv2'),
(2456772673230120, 'RITA TRI WAHJANSEN ', '1994-01-24', 'perempuan', 'KRAMAT', NULL, '$2y$10$HzsAkVll9aEdFkbi4Gqw0O5enW.gqJOjG9jIqv05BeouIT0FXV642'),
(5544772673130040, 'DEWI PERMATA SARI', '1994-12-12', 'perempuan', 'KARANGASEM', NULL, '$2y$10$F1fSrCkHssf.l/mCNLgIcuUDumLzMtsf8f1m2KCru.c0kmYOX2J8S'),
(8340768669230210, 'NENSI NURJANAH', '1990-10-08', 'perempuan', 'Bojongbata', NULL, '$2y$10$5XbiQT6btqaeiXjSgE2eHuiTGLeMVtptawHNIDxIam4chEa.NDCb6'),
(123446670987676545, 'Ayu1', '2023-06-21', 'perempuan', 'Desa Kramat', 0x313638373134333132375f37626138313633646162633932643838353032662e706e67, '$2y$10$CGimvMqfxak57TE.TXQfw.9O7TkoSCqo28l26yRU.1k3F5X/iodOC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hadir`
--

CREATE TABLE `tbl_hadir` (
  `id_hadir` int(10) NOT NULL,
  `id_ta` int(4) NOT NULL,
  `nuptk` bigint(20) NOT NULL,
  `nisn` bigint(20) NOT NULL,
  `sakit` varchar(10) NOT NULL,
  `ijin` varchar(10) NOT NULL,
  `tp` varchar(10) NOT NULL,
  `tb` varchar(5) NOT NULL,
  `bb` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_hadir`
--

INSERT INTO `tbl_hadir` (`id_hadir`, `id_ta`, `nuptk`, `nisn`, `sakit`, `ijin`, `tp`, `tb`, `bb`) VALUES
(21, 5, 123446670987676545, 1776, '4', '1', '3', '-', '-'),
(22, 5, 123446670987676545, 1792, '3', '1', '1', '-', '-'),
(23, 5, 123446670987676545, 1815, '1', '3', '1', '-', '-'),
(35, 6, 123446670987676545, 1776, '3', '3', '1', '-', '-'),
(36, 6, 123446670987676545, 1809, '1', '2', '3', '-', '60');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nuptk` bigint(20) NOT NULL,
  `kode_mapel` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_kelas`, `nuptk`, `kode_mapel`) VALUES
(131, 45, 1143776677230023, 'AGM'),
(132, 45, 1143776677230023, 'BHS'),
(133, 45, 1143776677230023, 'FM'),
(134, 45, 2456772673230122, 'KOG'),
(135, 45, 2456772673230122, 'S'),
(136, 45, 2456772673230122, 'SOE'),
(137, 44, 5544772673130043, 'AGM'),
(139, 44, 5544772673130043, 'FM'),
(140, 44, 5544772673130043, 'KOG'),
(141, 44, 5544772673130043, 'S'),
(142, 44, 5544772673130043, 'SOE'),
(143, 42, 8340768669230213, 'AGM'),
(144, 42, 8340768669230213, 'BHS'),
(145, 42, 8340768669230213, 'FM'),
(146, 46, 123446670987676545, 'AGM'),
(147, 46, 123446670987676545, 'BHS'),
(148, 46, 123446670987676545, 'FM'),
(150, 42, 7942735637300012, 'KOG'),
(151, 42, 7942735637300012, 'S'),
(152, 42, 7942735637300012, 'SOE'),
(153, 44, 5544772673130043, 'BHS'),
(154, 48, 123446670987676545, 'AGM'),
(155, 48, 123446670987676545, 'BHS'),
(157, 46, 5544772673130040, 'S'),
(158, 48, 123446670987676545, 'FM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `id_ta` int(4) DEFAULT NULL,
  `nuptk` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `id_ta`, `nuptk`) VALUES
(46, 'Kelas U', 5, 123446670987676545),
(48, 'Kelas U', 6, 123446670987676545),
(52, 'Kelas D1', 5, 5544772673130040);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komen`
--

CREATE TABLE `tbl_komen` (
  `id_komen` int(10) NOT NULL,
  `komen` longtext NOT NULL,
  `nisn` bigint(20) NOT NULL,
  `nuptk` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_komen`
--

INSERT INTO `tbl_komen` (`id_komen`, `komen`, `nisn`, `nuptk`) VALUES
(11, 'kamu siapa', 1776, 123446670987676545),
(13, 'nama saya nandisya', 1815, 123446670987676545),
(14, 'hallo ibu', 3186268579, 5544772673130040);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `kode_mapel` varchar(5) NOT NULL,
  `mapel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`kode_mapel`, `mapel`) VALUES
('AGM', 'Agama dan Moral'),
('BHS', 'Bahasa'),
('FM', 'Fisik Motorik'),
('KOG', 'Kognitif'),
('S', 'SENI'),
('SOE', 'Sosial dan Emosi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nisn` bigint(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `tgl_nilai` date DEFAULT NULL,
  `nilai_quis` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `nisn`, `id_jadwal`, `tgl_nilai`, `nilai_quis`) VALUES
(933, 1776, 146, '2023-08-05', 'pada dasarnya perkembangan nilai-nilai agama dan moral mas adit berkembangan sesuai harapan. mas adit mampu : \r\n-membaca doa sehari-hari -membaca surat-surat pendek \r\n-melaksanakan gerakan beribadah seperti gerakan sholat dan gerakan berwudhu \r\n-bersikap ramah\r\n-suka menolong teman dan orang dewasa                                                                                 '),
(934, 1809, 146, '2023-08-03', 'pada dasarnya perkembangan nilai-nilai agama dan moral mas adit berkembangan sesuai harapan. mas Raka mampu : \r\n-membaca doa sehari-hari -membaca surat-surat pendek \r\n-melaksanakan gerakan beribadah seperti gerakan sholat dan gerakan berwudhu \r\n-bersikap ramah\r\n-suka menolong teman dan orang dewasa                                                                                                     '),
(935, 1815, 146, '2023-08-05', 'pada dasarnya perkembangan nilai-nilai agama dan moral mba Nandisya berkembangan sesuai harapan. mba Nandisya mampu : \r\n-membaca doa sehari-hari -membaca surat-surat pendek \r\n-melaksanakan gerakan beribadah seperti gerakan sholat dan gerakan berwudhu \r\n-bersikap ramah\r\n-suka menolong teman dan orang dewasa                                                                                                                    '),
(936, 1776, 147, '2023-08-03', 'Pada umumnya perkembangan bahasa pada mas adit sudah berkembang sesuai harapan. Mas adit mampu :\r\n-melakukan percakapan dengan teman sebaya\r\n-mampu menyebutkan nama sendiri\r\n-bercerita tentang gambat yang dibuat sendiri'),
(937, 1809, 147, '2023-08-03', 'Pada umumnya perkembangan bahasa pada mas raka sudah berkembang sesuai harapan. Mas raka mampu :\r\n-melakukan percakapan dengan teman sebaya\r\n-mampu menyebutkan nama sendiri\r\n-bercerita tentang gambat yang dibuat sendiri'),
(938, 1815, 147, '2023-08-03', 'Pada umumnya perkembangan bahasa pada mas nandisya sudah berkembang sesuai harapan. Mas nandisya mampu :\r\n-melakukan percakapan dengan teman sebaya\r\n-mampu menyebutkan nama sendiri\r\n-bercerita tentang gambat yang dibuat sendiri'),
(939, 1776, 148, '2023-08-04', 'Perkembangan fisik motorik mas adit sudah berkembangan sesuai harapan. mas adit sudah mampu :\r\n-melompat keberbagai arah dengan satu kaki\r\n-mengekspresikan berbagai gerakan kepala, tangan atau kaki sesuai irama musik\r\n-melemparkan bola kesasaran dengan satu tangan'),
(940, 1809, 148, '2023-08-04', 'Perkembangan fisik motorik mas raka sudah berkembangan sesuai harapan. Mas raka sudah mampu :\r\n-melompat keberbagai arah dengan satu kaki\r\n-mengekspresikan berbagai gerakan kepala, tangan atau kaki sesuai irama musik\r\n-melemparkan bola kesasaran dengan satu tangan'),
(941, 1815, 148, '2023-08-04', 'Perkembangan fisik motorik mba nandisya sudah berkembangan sesuai harapan. Mba nandisya sudah mampu :\r\n-melompat keberbagai arah dengan satu kaki\r\n-mengekspresikan berbagai gerakan kepala, tangan atau kaki sesuai irama musik\r\n-melemparkan bola kesasaran dengan satu tangan'),
(942, 1809, 154, '2023-08-05', 'mas Raka berkembangan sesuai harapan, mampu :\r\nberdoa dan belajar sholat bersama'),
(943, 1776, 155, '2023-08-05', 'mas adit berkembang sangat baik mampu :\r\nberkomunikasi dengan ibu guru dan teman'),
(944, 1809, 155, '2023-08-05', 'mas Raka berkembang sesuai harapan mampu :\r\nberkomunikasi dengan ibu guru dan teman'),
(945, 1776, 154, '2023-08-05', 'mas adit berkembangan sangat baik, mampu :\r\nberdoa dan belajar sholat bersama'),
(946, 1792, 154, '2023-08-05', 'mas ibrahim berkembangan sesuai harapan, mampu :\r\nberdoa dan belajar sholat bersama'),
(947, 1792, 155, '2023-08-05', 'mas ibrahim berkembang sesuai harapan mampu :\r\nberkomunikasi dengan ibu guru dan teman'),
(968, 3189179550, 146, '2023-08-05', 'pada dasarnya perkembangan nilai-nilai agama dan moral mba ILMA berkembangan sesuai harapan. mba ILMA mampu : \r\n-membaca doa sehari-hari -membaca surat-surat pendek \r\n-melaksanakan gerakan beribadah seperti gerakan sholat dan gerakan berwudhu \r\n-bersikap ramah\r\n-suka menolong teman dan orang dewasa                                                                                                                    ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nisn` bigint(11) NOT NULL,
  `nama_siswa` varchar(60) DEFAULT NULL,
  `ttl_siswa` date DEFAULT NULL,
  `jk_siswa` enum('laki-laki','perempuan','','') DEFAULT NULL,
  `alamat_siswa` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `foto_siswa` blob DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nisn`, `nama_siswa`, `ttl_siswa`, `jk_siswa`, `alamat_siswa`, `password`, `foto_siswa`, `id_kelas`, `agama`) VALUES
(1776, 'Aditya Wibowo', '2017-03-09', 'laki-laki', 'Bojongbata', '$2y$10$PBENpQmRF88yL2YQYik8ie5hcYxt4WnqTUJQmMn5rtoPe4ZdUzvOi', 0x313637303431373438305f35336331666161613333396666373936353965392e6a7067, 48, 'Islam'),
(1780, 'Akbar Ibrahim', '2018-06-20', 'laki-laki', 'Bojongbata', '$2y$10$nrTqflmCnk44HVpZxCZRuewa9d/OONMjfshYk2dv.LNuEt9LuJfR2', 0x313637323634333436325f33303934343731623163623466616363306431312e706e67, NULL, 'Islam'),
(1792, 'Ibrahim Pasha', '2015-06-11', 'laki-laki', 'Bojongbata', '$2y$10$oHq4DXJ4G9IdBusB/3tfaurWV6JshlEXYl8zrr3xKo98qUMph0LQu', 0x54616d612e6a7067, 46, 'islam'),
(1801, 'Aishanaya Janeeta Hardiandi', '2017-10-25', 'perempuan', 'Bojongbata', '$2y$10$JG1WQcvvaQ8Ym3sGoFhbp.rndcPJ3nkfy.9ovq5hcEkhSpt6FzHzO', 0x726172612e6a7067, NULL, 'Islam'),
(1807, 'Adeeva Kirana Rasyadah Utomo', '2017-08-12', 'perempuan', 'Bojongbata', '$2y$10$PkoeDZhnOSnQtiIYX2r0NeJCIaLlRzfA3MSSkiUwkaj4OtqYGC3M2', 0x313637303638313537355f36613332646130643663373934653230666665372e6a7067, NULL, 'Islam'),
(1809, 'Raka Alardo Adhitama', '2017-05-12', 'laki-laki', 'Bojongbata', '$2y$10$WAgPpSXw.YU3KsGp1LBFdOoYc3MvEU3SXBWpo9ENnC1Kf32UnXgTO', 0x616e6767612e706e67, 48, 'Islam'),
(1815, 'Nandisya Azqiara Zhafira', '2017-08-15', 'perempuan', 'Bojongbata', '$2y$10$UmIpXRT.45H9zlgtz/mxB.hTyb.xf6UfTG8p1PUCIHOc1y3YveK7i', 0x322e6a7067, 46, 'islam'),
(135705531, 'AKBAR IBRAHIM', '2016-08-12', 'laki-laki', 'KEPUNGAN', '$2y$10$F5fwU9kUItWtjXkq4njNfOjdPKndZ.dmtZffR2PQU.Twu.V0j3Xlq', NULL, NULL, 'Islam'),
(136237734, 'SAFINA MEZZALUNA NAJA', '2016-12-05', 'perempuan', 'JALAN DI PANJAITAN', '$2y$10$Zv/xQVaq2.KOxxF3pyVmYenw44CMjluN6QflWmlm4EoKKpTx82VSe', NULL, NULL, 'Islam'),
(137545568, 'ADNAN ALFATAH', '2017-03-11', 'laki-laki', 'JALAN ANGGUR', '$2y$10$PvZsICIiernOKs4ZpCxGOOvWH/t1n4m.Gi82zvkhCYmhWc8nz3kvO', NULL, NULL, 'Islam'),
(162078077, 'AIDAH HANIFAH MUHAMMAD', '2016-07-11', 'perempuan', 'MENGONENG', '$2y$10$c1g105xWC7o02cwFPpsVvuFSpkxlgdU6xks8iA00OqpNT2//yEdTK', NULL, NULL, 'Islam'),
(168615338, 'NAKEISHA SABINA NALADIPA', '2016-09-17', 'perempuan', 'JALAN SAMOSIR TIMUR IV/237', '$2y$10$xgQA16ytLHAsh2JkcIl2QO7nU/hVCqaoiGFSXJCWKWxjj2tm7UDru', NULL, NULL, 'Islam'),
(3159253088, 'IBRAHIM PASHA', '2015-11-07', 'laki-laki', 'BOJONGBATA', '$2y$10$u7zO/xv67Yay8CCf1yL9T.aMtPlnsb3qpmI62.I3MBE3V.n.t0qqW', NULL, NULL, 'Islam'),
(3160385232, 'AMANDA ZAHSY SALSABILA', '2016-05-02', 'perempuan', 'MENGONENG', '$2y$10$HbP9hjYicQtR73mddXVgF.Gj.iROo7nES3LiL5VLNy4KUtXCpk29q', NULL, NULL, 'Islam'),
(3160411685, 'NAUFAL ALFATHAN', '2016-08-29', 'laki-laki', 'BOJONGBATA', '$2y$10$tp2ti15AZxF1GqFRnDAKYON/JrRZYM37OaHqKhGybQC/1eE4k.oSO', NULL, NULL, 'Islam'),
(3160603356, 'CHAIRIL SHAFAR RAFKY', '2016-11-19', 'laki-laki', 'JALAN GATOT SUBROTO', '$2y$10$g5IMugmrgTGENqMST3etYOLa41DZkvQIGZKYlkFney5xXoiKcB3UG', NULL, NULL, 'Islam'),
(3160647800, 'ASIILA SAIDAH', '2016-12-18', 'perempuan', 'KEPUNGAN', '$2y$10$UxujE16HClK4zmsItJuTQOzVEAnEP1NIvTKP7SDQC5zDMi4ybfjSi', NULL, NULL, 'Islam'),
(3160675564, 'MUHAMMAD EMIR NABHANI', '2016-11-22', 'laki-laki', 'JALAN TENTARA PELAJAR', '$2y$10$0lVAp7bC4vqQrt.qCWsUl.3j7NUgMlP.dlpR2A2Sr4uqjs2lsc4FC', NULL, NULL, 'Islam'),
(3160870425, 'HANIA SYAKIRA', '2016-08-13', 'perempuan', 'BOJONGBATA', '$2y$10$fiI9uP7DchX4EqV6W5ESLudv.EDojRXm9i1X/6P81gOKmLVgfAzvS', NULL, NULL, 'Islam'),
(3161141106, 'ALMIRA MAULIDA SYAHNUR', '2016-12-30', 'perempuan', 'BOJONGBATA', '$2y$10$o6hhGUesSkPZDAp5zWjQzOchn7oGJ8Ykexh28XaxyDUCD/eK/9zke', NULL, NULL, 'Islam'),
(3161187441, 'DEA SEKAR ARUM', '2016-12-08', 'perempuan', 'KEPUNGAN', '$2y$10$LxcnasOonW8nIrfG2JyqA.MhegM1srR.nS6Z2WYF.bMGsZXSj31Fi', NULL, NULL, 'Islam'),
(3161923161, 'AZAM RIZKI ALFARIZI', '2016-07-14', 'laki-laki', 'MENGONENG', '$2y$10$ACpQ/CABBRw/HbWUjQ2G4.GSTTUdRNa0DyXXUkNJU367ZvM6lceni', NULL, NULL, 'Islam'),
(3162232264, 'RADELLA BELLVANIA ARIFTI', '2016-12-16', 'perempuan', 'JALAN IR. SUTAMI NO 30', '$2y$10$64xnfM3zwtG1GEfqKkGfKuCNYhr1rJBE5VIiIoYy8ACs9CjJbUQxy', NULL, NULL, 'Islam'),
(3162607749, 'NAUFAL YAZID ABIYYU', '2016-02-09', 'laki-laki', 'BOJONGBATA', '$2y$10$6hO3Qoae4fP0YHlkLqR0xuKLpOv3S2mIcrMklkt1U3lkRdTPJhvOW', NULL, NULL, 'Islam'),
(3162857712, 'HISYAM ZAIDI UMRAN', '2016-08-07', 'laki-laki', 'MENGONENG', '$2y$10$6QugzOXwObChrYahOrDH1ejX5LnfgDKY1sZ0D5Ao69gx/l6sM6YLe', NULL, NULL, 'Islam'),
(3163177859, 'MUHAMMAD HANAN AGUSTI', '2016-08-30', 'laki-laki', 'MENGONENG', '$2y$10$vGBrko44Rmz3EPUAfUVdvOnBUQwruBzrGUwFxsPgCyCvngDZU3UBK', NULL, NULL, 'Islam'),
(3163708446, 'ADITYA WIBOWO', '2016-08-27', 'laki-laki', 'KEPUNGAN', '$2y$10$UAxtUM082d84fkTf0F9cOOGGO8u.o/o8UykkSUBhRfAlt/OqTBj9q', NULL, NULL, 'Islam'),
(3163842876, 'MUHAMMAD ABDURAHMAN SYADID', '2016-10-10', 'laki-laki', 'JALAN ANGGUR', '$2y$10$WtnmKfDu1u90wNs7UndWDugOoWQz4Sg.lATP7Cqhacs2PNCXVzR76', NULL, NULL, 'Islam'),
(3164052647, 'SATRIO AL GAZALI', '2016-10-23', 'laki-laki', 'MENGONENG', '$2y$10$3I2IwcUuJ0R2BpLQW0csP.V/RD.C1n0AiTXj0Mv0aTUHjSibkSXdO', NULL, NULL, 'Islam'),
(3164849843, 'SYAHIRA KAYLA PUTRI', '2016-09-07', 'perempuan', 'BOJONGBATA', '$2y$10$K.lv5XfKO7JvaTTBKcqtIOhXYj/ZeKykmoResL/.jc0tjjRHQrrmm', NULL, NULL, 'Islam'),
(3165020345, 'RAYA JOVITA FEBRYANA', '2016-02-15', 'perempuan', 'JALAN IR. SUTAMI', '$2y$10$CrjOIUiBAEA2qY8Lc30zdOLj94vcne8Cy4bsd/jC.9lcvYMAYE1t.', NULL, NULL, 'Islam'),
(3165747138, 'AERILYN BELVANIA YULIANTI', '2016-10-16', 'perempuan', 'MENGONENG', '$2y$10$JT6rnFC7036GcqhL6ayyLeX3eFJeOtkhm.h4c5MqGzR7OyeK0t5LW', NULL, NULL, 'Islam'),
(3166175359, 'BELLVANIA CALLYSTA SURYA', '2016-05-04', 'perempuan', 'JALAN DR. CIPTO NO. 3A', '$2y$10$I89ZVCdOqK5p9Tia9Tt1I.byPRkyg7Qp9Qou4HZF61j5Afq7IgELG', NULL, NULL, 'Islam'),
(3166278505, 'HAFIZAH ASHFA RAMADHANI', '2016-06-28', 'laki-laki', 'MENGONENG', '$2y$10$sqNwUpAjRC55NqiGF9hTSeltEQc.zkTFWKz84Z4plW/Axzj8ytvxa', NULL, NULL, 'Islam'),
(3166534761, 'SITI APRILIA ALINDA', '2016-04-29', 'perempuan', 'JRAKAH', '$2y$10$sNtXToaBs8aOIIfITgIA6.S93chNe2kg3f7BGY.Px9.sPgJWW3b82', NULL, NULL, 'Islam'),
(3166878096, 'MUHAMAD ALFIN SADAN', '2016-05-17', 'laki-laki', 'MENGONENG', '$2y$10$RgkWjkRjzzCfCD12XoGZG.0rMboQBg5ISsachcjxtIZte4erSz40O', NULL, NULL, 'Islam'),
(3167301504, 'FALAH FATAH HILAH', '2016-06-03', 'laki-laki', 'JATIMULYA', '$2y$10$3xlxxtsEszoN/Zgoi6rXYuAGBpeGb17jXLqQJwOjWKAzJ5EoXIQsS', NULL, NULL, 'Islam'),
(3167409965, 'MUHAMMAD RAFA AZKA PUTRA', '2016-11-24', 'laki-laki', 'PERUM INDAH REGENCY', '$2y$10$rLVCAets1YUqzWyoh0lleeqKRf1AFEHSHvGEnEHEReAc6ulmdXZfq', NULL, NULL, 'Islam'),
(3167475331, 'NAZOLA ALMIZATUL NUJUM', '2016-06-21', 'perempuan', 'MENGONENG', '$2y$10$ptdJclUDMroVF9WJGOI.lu5ZH7pISj9ktmyIa8mkCOpMh1dd86Ewe', NULL, NULL, 'Islam'),
(3167865567, 'NOVAL ARSYA DINATA', '2016-06-23', 'laki-laki', 'KEPUNGAN', '$2y$10$st/Cpirxbc.KFsKK6niWveQDad9FGiMhHg7e7rlPpps2Cm2enLGeO', NULL, NULL, 'Islam'),
(3167965653, 'YAHYA YAFI AFIFUDIN', '2016-03-23', 'laki-laki', 'MENGONENG', '$2y$10$iwhBZy9RU7rQMSJ7oxD2Yu2bxKNiunS85DmU2gP50y8l2URXiJBMy', NULL, NULL, 'Islam'),
(3168234336, 'MUHAMMAD ARSYA ATHALA', '2016-11-08', 'laki-laki', 'KEPUNGAN', '$2y$10$A42DxpMSL9PKFx.Ay2eedOgTCInoTI2hOagG4BjKOgZT0pXxiJo06', NULL, NULL, 'Islam'),
(3168239808, 'AGIL ALFARIZI', '2016-09-08', 'laki-laki', 'KEPUNGAN', '$2y$10$w4uWs1YTKR2MZfOIecEjHOmVEisMGAN2xArSLqJncs8xYMim2SXHq', NULL, NULL, 'Islam'),
(3168598455, 'MUHAMMAD PRASETYO AL-FATIH', '2016-11-29', 'laki-laki', 'BOJONGBATA', '$2y$10$.Vtk5Usty92jWCqiSpR4B.tjENiix0f4LKwDgnqFRvJ0CchTP6bYW', NULL, NULL, 'Islam'),
(3168610142, 'HAIKAL ADISTA RAMADHAN', '2016-06-20', 'laki-laki', 'JATIMULYA', '$2y$10$yFtRxzrEcFS1T9p6MTQ3muHaatlonsY3EkQ6FSoGBPPzhhn4plGtG', NULL, NULL, 'Islam'),
(3168975844, 'WIKO ALFATIH', '2016-07-27', 'laki-laki', 'BOJONGBATA', '$2y$10$uuZ9g8SbeNU1ai3spnmWV.dFJVxkLPyTZtweiRIyFc/tp4f44ZOhy', NULL, NULL, 'Islam'),
(3169037501, 'BILLAL AZKA SYAPUTRA', '2016-12-16', 'laki-laki', 'BOJONGBATA', '$2y$10$T33Wjymk/alwU7paWmk2u.TwUhmCjz/.MaU8hYkQ00tFoJRcCIJL6', NULL, NULL, 'Islam'),
(3169129009, 'AINUN NUR AENI', '2016-02-25', 'perempuan', 'MENGONENG', '$2y$10$KDXqM7C50.RIzZwT1bu4a.LuCddOVIzu6tU8v6hwM9smHtAp7RG6q', NULL, NULL, 'Islam'),
(3169359460, 'ANINDITA GHANIA SYAFRINA', '2016-08-15', 'perempuan', 'MENGONENG', '$2y$10$5SzeaUrYqfHtyh3gcWla7eqXV2sl2kslWDLW7bOmlSeB7xmToQ9H2', NULL, NULL, 'Islam'),
(3169671199, 'CANDRA IRAWAN', '2016-08-30', 'laki-laki', 'MENGONENG', '$2y$10$8MWLM8bPSDCb9RODiuHR9OSEjNdPlm2Xw8s8/SZ0VZ3LdaPIXmPEm', NULL, NULL, 'Islam'),
(3170230474, 'MUHAMMAD DAWAM RIZKY A.', '2017-09-27', 'laki-laki', 'MENGONENG', '$2y$10$Z.XC3CqRO01pdzZtazO8g.Jhne2BOTXgbgUxh2v2L4REAP/i/U97K', NULL, NULL, 'Islam'),
(3170529166, 'NADA SALSABILA SYAWALUNA', '2017-07-07', 'perempuan', 'BOJONGBATA', '$2y$10$msQYOPWioKVlKTe5zHOi7ug8k8mSWoN1OdxNYD54g8gwFd2uSF.lC', NULL, NULL, 'Islam'),
(3170711521, 'NURNISSA SALSABILANAJAH', '2017-02-03', 'perempuan', 'BOJONGBATA', '$2y$10$7KlvXQZrR07fcEcVd.v.SuHei2IIOE8drlDVMTCzoh/xsAiiuxdde', NULL, NULL, 'Islam'),
(3171103888, 'KHARISMA SITI JENAR', '2017-02-09', 'perempuan', 'KARANGAYU', '$2y$10$qJORRhxb27t3boWtxXAJguh25qDAMQo21DTcjj7nz4WxER4lMuo3W', NULL, NULL, 'Islam'),
(3171254695, 'RAKA ALARDO ADHITAMA', '2017-10-23', 'laki-laki', 'KEPUNGAN', '$2y$10$5.XtZ9AxCu.NWrxrMRUr1uPYfXtzdQ6sYZRJPSsJE72wAmWXEAGk2', NULL, NULL, 'Islam'),
(3171559131, 'BILQEES KINTANIA RAMADHANI', '2017-06-15', 'perempuan', 'JALAN IR. SUTAMI', '$2y$10$.f5ReJOTNc4GtKFcfqmseueV8gCxDnrOMGj82Bs4H.z0WcxfD3cvK', NULL, NULL, 'Islam'),
(3171587286, 'ARSY NATHANIA ANGESTI', '2017-03-18', 'perempuan', 'KEPUNGAN', '$2y$10$6gp0bPHS5tB3hBYXmpNW7.PdwGSJttzCCQqBc4NpJ.os91RpsAG.6', NULL, NULL, 'Islam'),
(3171633934, 'SHAFIYAH HUMAIRA', '2017-06-11', 'perempuan', 'JALAN RAJAWALI III PIR', '$2y$10$wZKrLdcMtz26ie4hMt6OVOAuhUFu3x9UyYVoFt8slOA6KTw2ogJJG', NULL, NULL, 'Islam'),
(3172042589, 'ASHILLA MECCA', '2017-10-12', 'perempuan', 'PERUM KBA BLOK C 21', '$2y$10$1lOjmhUvtOcUsqUl6SkVJ.w65WYx7NdvcFXudnVaLDe/BKkThV1Fe', NULL, NULL, 'Islam'),
(3172251080, 'FATIYYA BADZLIN NUR ABIDAH', '2017-03-19', 'perempuan', 'KEPUNGAN', '$2y$10$GbSWIslO8EAIuvoNUSXYwu803xccdOkFp1GwqPzXHQD88tuW79tB.', NULL, NULL, 'Islam'),
(3172887270, 'FATHIA GENDIS AZKIYA', '2017-04-01', 'perempuan', 'MENGONENG', '$2y$10$.xVXlUml5XDqm9UXouGKaOC0LclGFRK/Au87ccYfqqY2nVWJfHiMS', NULL, NULL, 'Islam'),
(3172960999, 'ADIBAH PUTRI AL AZARA', '2017-03-24', 'perempuan', 'BOJONGBATA', '$2y$10$33pWw5cYPC5psR/1uPgsMu.3hNd0.HncikmM4XI93EHiHIoqvg4xK', NULL, NULL, 'Islam'),
(3173105742, 'KHANSA ADELIA NAIFAH', '2017-05-13', 'perempuan', 'BOJONGBATA', '$2y$10$2ffBnCq8yz80/0kxz2F6vODDpB3pFSypPjlxoq3FnnYVxY9oYhl4m', NULL, NULL, 'Islam'),
(3173166296, 'FANYA CRISSA ARTALITA', '2017-04-28', 'perempuan', 'GLINTANG UTARA', '$2y$10$EoWAOsuSRyt1aSx42BNliuveIJ1P/FIpjrGxb1OzNMvA3xPPA0nvO', NULL, NULL, 'Islam'),
(3173303176, 'NARESWARI SAE PANGAYUH', '2017-07-12', 'perempuan', 'JALAN DR. CIPTO MANGUNKUSUMO', '$2y$10$Hfr5leo33N6YRQHdbGEw9eherI7vidvn51k1mrem.JUZPWG0TEC.O', NULL, NULL, 'Islam'),
(3173360257, 'AKBAR RESKY ADITYA', '2017-07-27', 'laki-laki', 'BOJONGBATA', '$2y$10$cpp5bU0kAENDKUTeiMlKYux75O0j/kAJ5meVWw3CPPmZPsK7aMMDW', NULL, NULL, 'Islam'),
(3173519553, 'YUMNA FATHIN HUSNA', '2017-01-24', 'perempuan', 'GLINTANG', '$2y$10$NHJQgWNGoqaM7mRbMGEWJOGBKJDPviGjaCLnvMMR0Y9J/iffQh1qC', NULL, NULL, 'Islam'),
(3173784158, 'RADITYA ARKHAN MAULANA', '2017-04-07', 'laki-laki', 'JATIMULYA', '$2y$10$61RQJUuZR.XHz7elTV8S3ee8lfFUlBb2FwDsvIyHxtdhSGESKD5BK', NULL, NULL, 'Islam'),
(3173819741, 'TYAS SHAKILA MUSYAFA', '2017-03-27', 'laki-laki', 'PERUM REGENCY 7 BLOK G10', '$2y$10$CREIRgL960J13YWldIel9OG9hbxks2qr7c2qLcyoAEb6ahKNTRONS', NULL, NULL, 'Islam'),
(3175414556, 'MAOMETTANO AL RAHNOVE', '2017-07-22', 'laki-laki', 'KEPUNGAN', '$2y$10$dYJrxu2bvZMbZAnwc7r3Z.PGETCZkmjkfZGbtlVH/7SeTlg/y0VcS', NULL, NULL, 'Islam'),
(3175491111, 'SYAMIL ABDUL FALAH', '2017-08-24', 'laki-laki', 'GLINTANG UTARA', '$2y$10$H4pt.HBkCVWC9wHnuAw8i.doBthV9GMq6eJniEiVrJ9xvuX7IKDGa', NULL, NULL, 'Islam'),
(3175631670, 'ADIBA SYAFIRA ARDIANSYAH', '2017-07-13', 'perempuan', 'JALAN DI PANJAITAN', '$2y$10$gocpSsEcA66lTFawWApEbOGoF4XjZLsCq/xdqFhrz.Zw8g0dcjZ06', NULL, NULL, 'Islam'),
(3175952153, 'ALVITO HANIF ANDELOV', '2017-05-25', 'laki-laki', 'SEWAKA', '$2y$10$6eSIC/I/rvUyxAgraY0Pguk87xoAnPq9vFpxOGBI4em0IIh0WFZ2W', NULL, NULL, 'Islam'),
(3176308330, 'MEDDINA AURORA HAMESTY', '2017-05-11', 'perempuan', 'MENGONENG', '$2y$10$BXZhd/G75ZkAnLiL3p2nKe97OSkgi6dpykCYvD4bg90mPPl2h9yaK', NULL, NULL, 'Islam'),
(3176495481, 'MUHAMMAD HARLAN FEBRIANSYAH', '2017-02-09', 'laki-laki', 'KEPUNGAN', '$2y$10$ZwOTfFjatzp8KX68NqgmgOuVO9rZDF.foaqIdWZSkeJJLI9KmDkza', NULL, NULL, 'Islam'),
(3177080027, 'RACHEL ALEZIA', '2017-07-11', 'perempuan', 'BOJONGBATA', '$2y$10$PGX8CfK7BjJFO3.WAoxIdu1p7OhqhAyHHQm3.uLks4OhKkC/co0Bm', NULL, NULL, 'Islam'),
(3177295576, 'MUHAMMAD MAHREZ ROMANDIKA', '2017-06-03', 'laki-laki', 'MENGONENG', '$2y$10$eGTdhDii2pHb.7Ywcvo8X.Jrqw6asgqOobgMrGcEbs4HHFFL6Miey', NULL, NULL, 'Islam'),
(3177987006, 'RAFARDHAN ATHALLA NARENDRA P.', '2017-01-31', 'laki-laki', 'PERUM INDAH REGENCY', '$2y$10$MCBrSZ9PdU25OAx5uhhC0OWYXmhsWntWv9L/skJg1MW/LIFBPfkUG', NULL, NULL, 'Islam'),
(3178010701, 'MUHAMAD AINUL YAQIN', '2017-09-23', 'laki-laki', 'MENGONENG', '$2y$10$GS5piYCt4BCk3QFQ4AVHJutF2MFczIAMKpcs8FGdGRUZo0leoeILO', NULL, NULL, 'Islam'),
(3178273959, 'ARSY AZZAHRA UTARI ROHIM', '2017-08-04', 'perempuan', 'KARANG AYU', '$2y$10$k/SbXEcuMeNi4NZSsd64q.CH6yEdGluFjgZOLkNfFx2/IZ4u.oHo2', NULL, NULL, 'Islam'),
(3178315885, 'ARSYILA FARAH ILYANA', '2017-08-16', 'perempuan', 'BOJONGBATA', '$2y$10$ifCMZ6dTn2.PH5VVgs5tZOLe1BgGivcuKhZo..2fdnCFrOoJ.v1M6', NULL, NULL, 'Islam'),
(3178829385, 'TAZKYA DWI ALMAHYRA', '2017-03-03', 'laki-laki', 'KARANG AYU', '$2y$10$bLfeh7zrbZsKWdJuGmYWNumiXCEZPYDN8.NloAu67iEsvS7iV4wC6', NULL, NULL, 'Islam'),
(3178997826, 'MUHAMAD AL GIFARI', '2017-06-15', 'laki-laki', 'BOJONGNANGKA', '$2y$10$NZbMdu7wCHfR0MYsBI8cp.XcQ4gq4FEkoiRn0FHrNlx8ljuwo2pzG', NULL, NULL, 'Islam'),
(3179361556, 'MUKHAMMAD NAUFAL', '2017-01-27', 'laki-laki', 'CANGKLIK BARU', '$2y$10$wc4hRng7vzc5CGMPhz.Ad.8mCbUuXv5JYi5N.sycq2CsPyPM2ilN.', NULL, NULL, 'Islam'),
(3179455754, 'AL KHALIFI ZIKRI HAMIZAN', '2017-07-20', 'laki-laki', 'KEPUNGAN', '$2y$10$SJ0QyLyk35je85PMFXTE7uk3eFg84VL4HraDYodbirLrL52dF9f46', NULL, NULL, 'Islam'),
(3181159656, 'KARAISSA GISKA AQILA', '2018-04-14', 'perempuan', 'KEPUNGAN', '$2y$10$ReESshjUjkYRyUn/oTphV.rJgz6QMVVZEyFfSyji.olni669of7ee', NULL, NULL, 'Islam'),
(3181398797, 'ALIF IBRAHIM ROMADHAN', '2018-06-01', 'laki-laki', 'JATIMULYA', '$2y$10$3A3/niHJYiMMtUd/Ff.0wu16TYF.ark7A0yoEl0zEFkByc1TzEESK', NULL, NULL, 'Islam'),
(3181652437, 'WERDY ARKA SAPUTRA', '2018-03-29', 'laki-laki', 'MULYOHARJO', '$2y$10$yt2ccCoYn50S36QI4mscv.xhBgIFElJb3JK2T4tG2dA2RWxkvKEcG', NULL, NULL, 'Islam'),
(3183569624, 'ADELLIARAMADHANI KUSTONI', '2018-05-27', 'perempuan', 'MENGONENG', '$2y$10$TvJ7NeHfDnPOHz3TB7Hqs.4yBqTZApy9fOHmAQkcxHDTaxWV3G9GO', NULL, NULL, 'Islam'),
(3184833861, 'NADIA MIKAYLA NURBASMA', '2018-03-22', 'perempuan', 'PERUM KBA BLOK C 22', '$2y$10$xZPxBfQjUuWnyhjGFVN22uyGqRKQeboP4BKvp0bJD9DT.GqHiCZQq', NULL, NULL, 'Islam'),
(3186268579, 'ANDROMEDA FAEYZA', '2018-06-23', 'laki-laki', 'PERUM SAMPIR DAMAI BLOK C1', '$2y$10$g.A4YzMqCUY6aMcRNzsuTeHX/hDKshhAGmCUKRZiz2y0qJjdxET3q', NULL, NULL, 'Islam'),
(3189047390, 'ADYATMA WIAR RAMAZAN', '2018-05-26', 'laki-laki', 'GATOT SUBROTO', '$2y$10$iFpkejRSwdXlNAJ2Txa7b.0Oega7g40l2t/KWBTTMloQaNMltYXjm', NULL, 48, 'Islam'),
(3189179550, 'ILMA ALTHAFUNNISA', '2018-02-19', 'perempuan', 'KEPUNGAN', '$2y$10$VLiWjqw5Um3Tu7gzI3bsUeByjh8F0hy9TsOgG/hFBQ1imsB9UcITK', NULL, 46, 'Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ta`
--

CREATE TABLE `tbl_ta` (
  `id_ta` int(4) NOT NULL,
  `ta` varchar(10) DEFAULT NULL,
  `semester` enum('ganjil','genap') DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ta`
--

INSERT INTO `tbl_ta` (`id_ta`, `ta`, `semester`, `status`) VALUES
(1, '2020/2021', 'ganjil', 0),
(2, '2020/2021', 'genap', 0),
(3, '2021/2022', 'ganjil', 0),
(4, '2021/2022', 'genap', 0),
(5, '2022/2023', 'ganjil', 0),
(6, '2022/2023', 'genap', 1),
(9, '2023/2024', 'ganjil', 0),
(10, '2023/2024', 'genap', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nama_user` varchar(60) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `foto` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`nama_user`, `username`, `password`, `foto`) VALUES
('admin098', 'admin098', '$2y$10$gHbSY.Rc8gPhW0OzbpvveuUgPheirsW6iqFLWglRCinuVe8D/aY1W', 0x313638353933333530315f35356261663762383834366661653461363461372e706e67),
('Yustika Amelia Putri', 'admin1', '$2y$10$k0/k6/mjtScaq3qH/KfslO0zom80hjJZrlUCR80KIFhOqH8/s8TlW', 0x313639303338353839375f65633036623833336262376361653531386536612e706e67);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`nuptk`);

--
-- Indeks untuk tabel `tbl_hadir`
--
ALTER TABLE `tbl_hadir`
  ADD PRIMARY KEY (`id_hadir`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_komen`
--
ALTER TABLE `tbl_komen`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `tbl_ta`
--
ALTER TABLE `tbl_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_hadir`
--
ALTER TABLE `tbl_hadir`
  MODIFY `id_hadir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tbl_komen`
--
ALTER TABLE `tbl_komen`
  MODIFY `id_komen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=970;

--
-- AUTO_INCREMENT untuk tabel `tbl_ta`
--
ALTER TABLE `tbl_ta`
  MODIFY `id_ta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
