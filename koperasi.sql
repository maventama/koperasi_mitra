-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 18 Feb 2021 pada 06.20
-- Versi Server: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activitylog`
--

CREATE TABLE `activitylog` (
  `id_activitylog` int(10) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `activitylog`
--

INSERT INTO `activitylog` (`id_activitylog`, `description`, `created_at`, `userid`) VALUES
(1, 'Nama : 123IP Address : ::1 Windows 10Firefox 71.0', '2020-01-09 18:50:27', 0),
(2, 'dokumen baru [ Table: bilik]', '2020-01-10 01:01:46', 1),
(3, 'Nama : 123IP Address : ::1 Windows 10Firefox 71.0', '2020-01-11 03:39:55', 0),
(4, 'dokumen baru [ Table: siswa]', '2020-01-11 09:46:32', 1),
(5, 'Name : 123Role :y1pc5 logout admin , IP: [ ::1] Windows 10Firefox 71.0', '2020-01-11 03:47:17', 0),
(6, 'dokumen baru [ Table: host_bilik]', '2020-01-11 03:51:36', 0),
(7, 'Nama : YOGA Password : 2020-01-15 Login siswa vote  Kelas : TKJ1::1 Windows 10Firefox 71.0', '2020-01-11 03:58:47', 1),
(8, 'Name : YOGA Password :2020-01-15Kelas : TKJ1 siswa voting , IP: [ ::1] Windows 10Firefox 71.0', '2020-01-11 03:59:02', 1),
(9, 'Name : YOGA Password :2020-01-15 Kelas : 6 logout pemilih , IP: [ ::1] Windows 10Firefox 71.0', '2020-01-11 03:59:03', 1),
(10, 'Nama : 123IP Address : ::1 Windows 10Firefox 71.0', '2020-01-11 03:59:54', 0),
(11, 'User gmail@gmail.com login ', '2020-02-10 22:12:08', 1),
(12, 'User gmail@gmail.com login ', '2020-02-10 22:12:53', 1),
(13, 'User gmail@gmail.com login ', '2020-02-10 22:13:40', 1),
(14, 'User gmail@gmail.com tried to login ', '2020-02-10 22:14:49', 1),
(15, 'User gmail@gmail.com tried to login ', '2020-02-10 22:15:37', 1),
(16, 'User gmail@gmail.com login ', '2020-02-10 22:15:52', 1),
(17, 'User gmail@gmail.com login ', '2020-02-10 22:16:40', 1),
(18, 'User gmail@gmail.com login ', '2020-02-10 22:16:52', 1),
(23, 'User gmail@gmail.com login ', '2020-02-11 20:05:08', 1),
(33, 'User gmail@gmail.com login ', '2020-02-11 20:24:43', 1),
(34, 'User gmail@gmail.com login ', '2020-02-11 20:26:21', 1),
(35, 'User gmail@gmail.com login ', '2020-02-11 20:26:52', 1),
(36, 'User gmail@gmail.com login ', '2020-02-11 20:34:22', 1),
(37, 'User gmail@gmail.com login ', '2020-02-11 20:37:14', 1),
(38, 'User gmail@gmail.com login ', '2020-02-11 20:38:56', 1),
(39, 'User gmail@gmail.com login ', '2020-02-11 20:40:14', 1),
(40, 'User gmail@gmail.com login ', '2020-02-11 20:40:50', 1),
(41, 'User gmail@gmail.com login ', '2020-02-11 20:41:29', 1),
(42, 'User gmail@gmail.com login ', '2020-02-11 20:41:54', 1),
(43, 'User gmail@gmail.com login ', '2020-02-11 20:42:05', 1),
(44, 'User gmail@gmail.com login ', '2020-02-11 20:42:45', 1),
(45, 'User gmail@gmail.com login ', '2020-02-11 20:42:53', 1),
(46, 'User gmail@gmail.com login ', '2020-02-11 20:43:21', 1),
(47, 'User gmail@gmail.com login ', '2020-02-11 20:44:26', 1),
(48, 'User gmail@gmail.com login ', '2020-02-11 20:45:29', 1),
(49, 'User gmail@gmail.com login ', '2020-02-11 20:45:35', 1),
(50, 'User gmail@gmail.com login ', '2020-02-11 20:46:01', 1),
(51, 'User gmail@gmail.com login ', '2020-02-11 20:46:05', 1),
(52, 'User gmail@gmail.com login ', '2020-02-11 20:46:22', 1),
(53, 'User gmail@gmail.com login ', '2020-02-11 20:46:45', 1),
(54, 'User gmail@gmail.com login ', '2020-02-11 20:47:58', 1),
(55, 'User gmail@gmail.com login ', '2020-02-11 20:48:14', 1),
(56, 'User gmail@gmail.com login ', '2020-02-11 20:48:47', 1),
(57, 'User gmail@gmail.com tried to login ', '2020-02-11 20:54:09', 1),
(58, 'User gmail@gmail.com login ', '2020-02-12 10:23:24', 1),
(59, 'User gmail@gmail.com tried to login ', '2020-02-14 01:04:35', NULL),
(60, 'User gmail@gmail.com login ', '2020-02-14 01:05:45', 1),
(61, 'User gmail@gmail.com login ', '2020-02-15 19:52:03', 1),
(62, 'User gmail@gmail.com login ', '2020-02-16 08:32:14', 1),
(63, 'User gmail@gmail.com login ', '2020-02-20 14:03:46', 1),
(64, 'User gmail@gmail.com login ', '2020-02-22 14:47:16', 1),
(65, 'User gmail@gmail.com login ', '2020-02-25 11:43:14', 1),
(66, 'User gmail@gmail.com login ', '2020-03-09 08:25:10', 1),
(67, 'User gmail@gmail.com login ', '2020-03-14 13:20:34', 1),
(68, 'User gmail@gmail.com login ', '2020-03-16 06:55:50', 1),
(69, 'User gmail@gmail.com login ', '2020-03-18 13:03:40', 1),
(70, 'User gmail@gmail.com login ', '2020-03-27 20:51:59', 1),
(71, 'Menambahkan data di tabel anggota', '0000-00-00 00:00:00', 1),
(72, 'Menghapus data di tabel anggota', '2020-06-01 21:51:32', 1),
(73, 'Menghapus data di tabel anggota', '2020-06-04 14:03:56', 1),
(74, 'Menghapus data di tabel anggota', '2020-06-04 14:04:05', 1),
(75, 'Menghapus data di tabel anggota', '2020-06-04 15:05:06', 1),
(76, 'Menambahkan data di tabel tahun_iuran', '2020-06-14 23:40:08', 1),
(77, 'Menambahkan data di tabel tahun_iuran', '2020-06-14 23:40:39', 1),
(78, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:39', 1),
(79, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:39', 1),
(80, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:39', 1),
(81, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:39', 1),
(82, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:39', 1),
(83, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:39', 1),
(84, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:40', 1),
(85, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:40', 1),
(86, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:40', 1),
(87, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:40', 1),
(88, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:40', 1),
(89, 'Menambahkan data di tabel bulan_iuran', '2020-06-14 23:40:40', 1),
(90, 'Menambahkan data di tabel tahun_iuran', '2020-06-14 23:50:56', 1),
(91, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 14:24:09', 1),
(92, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 14:25:05', 1),
(93, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 14:25:11', 1),
(94, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 15:04:50', 1),
(95, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 15:24:30', 1),
(96, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 15:47:08', 1),
(97, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 15:47:24', 1),
(98, 'Menghapus data di tabel iuran_wajib', '2020-06-22 15:47:24', 1),
(99, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 15:47:46', 1),
(100, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 15:48:21', 1),
(101, 'Menghapus data di tabel iuran_wajib', '2020-06-22 15:48:21', 1),
(102, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 16:14:27', 1),
(103, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 16:14:38', 1),
(104, 'Menghapus data di tabel iuran_wajib', '2020-06-22 16:14:38', 1),
(105, 'Memperbarui data di tabel bulan_iuran', '2020-06-22 16:17:21', 1),
(106, 'Menghapus data di tabel tahun_iuran', '2020-06-22 17:00:09', 1),
(107, 'Menghapus data di tabel tahun_iuran', '2020-06-22 17:02:29', 1),
(108, 'Menghapus data di tabel tahun_iuran', '2020-06-22 17:06:01', 1),
(109, 'Menambahkan data di tabel tahun_iuran', '2020-06-22 17:09:40', 1),
(110, 'Menghapus data di tabel tahun_iuran', '2020-06-22 17:10:16', 1),
(111, 'Menghapus data di tabel bulan_iuran', '2020-06-22 17:10:16', 1),
(112, 'Menambahkan data di tabel tahun_iuran', '2020-06-22 17:13:18', 1),
(113, 'Menambahkan data di tabel tahun_iuran', '2020-06-22 17:13:45', 1),
(114, 'Menambahkan data di tabel tahun_iuran', '2020-06-22 17:14:25', 1),
(115, 'Menambahkan data di tabel tahun_iuran', '2020-06-22 17:14:57', 1),
(116, 'Menghapus data di tabel tahun_iuran', '2020-06-22 17:15:11', 1),
(117, 'Menghapus data di tabel bulan_iuran', '2020-06-22 17:15:11', 1),
(118, 'Menambahkan data di tabel tahun_iuran', '2020-06-22 18:02:56', 1),
(119, 'Menambahkan data di tabel tahun_iuran', '2020-06-22 18:09:43', 1),
(120, 'Menambahkan data di tabel tahun_iuran', '2020-06-22 18:11:45', 1),
(121, 'Memperbarui data di tabel tahun_iuran', '2020-06-23 00:12:31', 1),
(122, 'Memperbarui data di tabel tahun_iuran', '2020-06-23 00:21:13', 1),
(123, 'Memperbarui data di tabel tahun_iuran', '2020-06-23 00:22:25', 1),
(124, 'Memperbarui data di tabel tahun_iuran', '2020-06-23 00:22:42', 1),
(125, 'Memperbarui data di tabel tahun_iuran', '2020-06-23 00:22:48', 1),
(126, 'Menghapus data di tabel tahun_iuran', '2020-06-23 00:36:27', 1),
(127, 'Menghapus data di tabel bulan_iuran', '2020-06-23 00:36:27', 1),
(128, 'Menghapus data di tabel tahun_iuran', '2020-06-23 00:37:11', 1),
(129, 'Menghapus data di tabel bulan_iuran', '2020-06-23 00:37:12', 1),
(130, 'Menghapus data di tabel tahun_iuran', '2020-06-23 00:37:19', 1),
(131, 'Menghapus data di tabel bulan_iuran', '2020-06-23 00:37:19', 1),
(132, 'Menghapus data di tabel tahun_iuran', '2020-06-23 00:37:24', 1),
(133, 'Menghapus data di tabel bulan_iuran', '2020-06-23 00:37:24', 1),
(134, 'Menambahkan data di tabel tahun_iuran', '2020-06-23 00:38:58', 1),
(135, 'Menambahkan data di tabel peminjaman', '2020-06-24 01:16:20', 1),
(136, 'Menambahkan data di tabel peminjaman', '2020-06-27 12:48:55', 1),
(137, 'Menambahkan data di tabel peminjaman', '2020-06-27 12:51:57', 1),
(138, 'Menambahkan data di tabel peminjaman', '2020-06-27 12:52:42', 1),
(139, 'Menambahkan data di tabel peminjaman', '2020-06-27 12:53:14', 1),
(140, 'Memperbarui data di tabel peminjaman', '2020-06-27 13:55:13', 1),
(141, 'Memperbarui data di tabel peminjaman', '2020-06-27 13:58:18', 1),
(142, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:18', 1),
(143, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:18', 1),
(144, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:18', 1),
(145, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:19', 1),
(146, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:19', 1),
(147, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:19', 1),
(148, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:19', 1),
(149, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:19', 1),
(150, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:19', 1),
(151, 'Memperbarui data di tabel angsuran', '2020-06-27 13:58:19', 1),
(152, 'Menghapus data di tabel peminjaman', '2020-06-27 14:19:36', 1),
(153, 'Menghapus data di tabel peminjaman', '2020-06-27 14:20:16', 1),
(154, 'Menghapus data di tabel peminjaman', '2020-06-27 14:20:34', 1),
(155, 'Menghapus data di tabel peminjaman', '2020-06-27 14:21:30', 1),
(156, 'Menghapus data di tabel angsuran', '2020-06-27 14:21:30', 1),
(157, 'Memperbarui data di tabel angsuran', '2020-06-27 15:02:41', 1),
(158, 'Memperbarui data di tabel angsuran', '2020-06-27 15:25:28', 1),
(159, 'Memperbarui data di tabel angsuran', '2020-06-27 15:25:36', 1),
(160, 'Memperbarui data di tabel angsuran', '2020-06-28 14:11:07', 1),
(161, 'Memperbarui data di tabel angsuran', '2020-06-28 14:11:07', 1),
(162, 'Memperbarui data di tabel angsuran', '2020-06-28 14:11:07', 1),
(163, 'Memperbarui data di tabel angsuran', '2020-06-28 14:13:07', 1),
(164, 'Memperbarui data di tabel angsuran', '2020-06-28 14:13:07', 1),
(165, 'Memperbarui data di tabel angsuran', '2020-06-28 14:13:07', 1),
(166, 'Memperbarui data di tabel angsuran', '2020-06-28 14:13:07', 1),
(167, 'Memperbarui data di tabel angsuran', '2020-06-28 14:13:07', 1),
(168, 'Memperbarui data di tabel angsuran', '2020-06-28 14:13:08', 1),
(169, 'Memperbarui data di tabel angsuran', '2020-06-28 14:45:56', 1),
(170, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 14:54:48', 1),
(171, 'Memperbarui data di tabel angsuran', '2020-06-28 15:28:45', 1),
(172, 'Memperbarui data di tabel angsuran', '2020-06-28 15:29:49', 1),
(173, 'Memperbarui data di tabel angsuran', '2020-06-28 15:29:54', 1),
(174, 'Memperbarui data di tabel angsuran', '2020-06-28 15:29:54', 1),
(175, 'Memperbarui data di tabel angsuran', '2020-06-28 15:31:07', 1),
(176, 'Memperbarui data di tabel angsuran', '2020-06-28 15:31:12', 1),
(177, 'Memperbarui data di tabel angsuran', '2020-06-28 15:31:12', 1),
(178, 'Memperbarui data di tabel angsuran', '2020-06-28 15:31:40', 1),
(179, 'Memperbarui data di tabel angsuran', '2020-06-28 15:31:45', 1),
(180, 'Memperbarui data di tabel angsuran', '2020-06-28 15:31:45', 1),
(181, 'Memperbarui data di tabel angsuran', '2020-06-28 15:32:58', 1),
(182, 'Memperbarui data di tabel angsuran', '2020-06-28 15:33:02', 1),
(183, 'Memperbarui data di tabel angsuran', '2020-06-28 15:33:02', 1),
(184, 'Memperbarui data di tabel angsuran', '2020-06-28 15:36:39', 1),
(185, 'Memperbarui data di tabel angsuran', '2020-06-28 15:36:43', 1),
(186, 'Memperbarui data di tabel angsuran', '2020-06-28 15:38:40', 1),
(187, 'Memperbarui data di tabel angsuran', '2020-06-28 15:38:45', 1),
(188, 'Memperbarui data di tabel angsuran', '2020-06-28 15:39:37', 1),
(189, 'Memperbarui data di tabel angsuran', '2020-06-28 15:39:42', 1),
(190, 'Memperbarui data di tabel angsuran', '2020-06-28 15:40:13', 1),
(191, 'Memperbarui data di tabel angsuran', '2020-06-28 15:40:18', 1),
(192, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 15:40:18', 1),
(193, 'Memperbarui data di tabel angsuran', '2020-06-28 15:40:18', 1),
(194, 'Memperbarui data di tabel angsuran', '2020-06-28 15:51:35', 1),
(195, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 15:51:35', 1),
(196, 'Memperbarui data di tabel angsuran', '2020-06-28 15:51:35', 1),
(197, 'Memperbarui data di tabel angsuran', '2020-06-28 15:51:41', 1),
(198, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 15:51:41', 1),
(199, 'Memperbarui data di tabel angsuran', '2020-06-28 15:51:41', 1),
(200, 'Memperbarui data di tabel angsuran', '2020-06-28 15:52:02', 1),
(201, 'Memperbarui data di tabel angsuran', '2020-06-28 15:52:02', 1),
(202, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 15:52:02', 1),
(203, 'Memperbarui data di tabel angsuran', '2020-06-28 15:52:02', 1),
(204, 'Memperbarui data di tabel angsuran', '2020-06-28 15:52:02', 1),
(205, 'Memperbarui data di tabel angsuran', '2020-06-28 16:31:58', 1),
(206, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:31:58', 1),
(207, 'Memperbarui data di tabel angsuran', '2020-06-28 16:31:58', 1),
(208, 'Memperbarui data di tabel angsuran', '2020-06-28 16:32:02', 1),
(209, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:32:02', 1),
(210, 'Memperbarui data di tabel angsuran', '2020-06-28 16:32:02', 1),
(211, 'Memperbarui data di tabel angsuran', '2020-06-28 16:32:08', 1),
(212, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:32:08', 1),
(213, 'Memperbarui data di tabel angsuran', '2020-06-28 16:32:08', 1),
(214, 'Memperbarui data di tabel angsuran', '2020-06-28 16:32:13', 1),
(215, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:32:13', 1),
(216, 'Memperbarui data di tabel angsuran', '2020-06-28 16:32:13', 1),
(217, 'Memperbarui data di tabel angsuran', '2020-06-28 16:33:37', 1),
(218, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:33:37', 1),
(219, 'Memperbarui data di tabel angsuran', '2020-06-28 16:33:37', 1),
(220, 'Memperbarui data di tabel angsuran', '2020-06-28 16:38:28', 1),
(221, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:38:28', 1),
(222, 'Memperbarui data di tabel angsuran', '2020-06-28 16:38:28', 1),
(223, 'Memperbarui data di tabel angsuran', '2020-06-28 16:38:33', 1),
(224, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:38:33', 1),
(225, 'Memperbarui data di tabel angsuran', '2020-06-28 16:38:33', 1),
(226, 'Memperbarui data di tabel angsuran', '2020-06-28 16:38:37', 1),
(227, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:38:37', 1),
(228, 'Memperbarui data di tabel angsuran', '2020-06-28 16:38:37', 1),
(229, 'Memperbarui data di tabel angsuran', '2020-06-28 16:38:42', 1),
(230, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:38:42', 1),
(231, 'Memperbarui data di tabel angsuran', '2020-06-28 16:38:42', 1),
(232, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:13', 1),
(233, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:13', 1),
(234, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:13', 1),
(235, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:13', 1),
(236, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:14', 1),
(237, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:14', 1),
(238, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 16:39:14', 1),
(239, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:14', 1),
(240, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:14', 1),
(241, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:14', 1),
(242, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:14', 1),
(243, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:14', 1),
(244, 'Memperbarui data di tabel angsuran', '2020-06-28 16:39:14', 1),
(245, 'Memperbarui data di tabel angsuran', '2020-06-28 17:35:53', 1),
(246, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 17:35:54', 1),
(247, 'Memperbarui data di tabel angsuran', '2020-06-28 17:35:54', 1),
(248, 'Memperbarui data di tabel angsuran', '2020-06-28 17:36:00', 1),
(249, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 17:36:00', 1),
(250, 'Memperbarui data di tabel angsuran', '2020-06-28 17:36:00', 1),
(251, 'Memperbarui data di tabel angsuran', '2020-06-28 17:36:06', 1),
(252, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 17:36:06', 1),
(253, 'Memperbarui data di tabel angsuran', '2020-06-28 17:36:06', 1),
(254, 'Memperbarui data di tabel angsuran', '2020-06-28 17:36:11', 1),
(255, 'Memperbarui data di tabel peminjaman', '2020-06-28 17:36:12', 1),
(256, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 17:36:12', 1),
(257, 'Memperbarui data di tabel angsuran', '2020-06-28 17:36:12', 1),
(258, 'Memperbarui data di tabel angsuran', '2020-06-28 17:36:38', 1),
(259, 'Memperbarui data di tabel peminjaman', '2020-06-28 17:36:39', 1),
(260, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 17:36:39', 1),
(261, 'Memperbarui data di tabel angsuran', '2020-06-28 17:36:39', 1),
(262, 'Memperbarui data di tabel angsuran', '2020-06-28 17:37:10', 1),
(263, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 17:37:10', 1),
(264, 'Memperbarui data di tabel angsuran', '2020-06-28 17:37:10', 1),
(265, 'Memperbarui data di tabel angsuran', '2020-06-28 19:28:39', 1),
(266, 'Memperbarui data di tabel angsuran', '2020-06-28 19:28:39', 1),
(267, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:28:39', 1),
(268, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:28:39', 1),
(269, 'Memperbarui data di tabel angsuran', '2020-06-28 19:28:39', 1),
(270, 'Memperbarui data di tabel angsuran', '2020-06-28 19:28:40', 1),
(271, 'Memperbarui data di tabel angsuran', '2020-06-28 19:29:15', 1),
(272, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:29:16', 1),
(273, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:29:16', 1),
(274, 'Memperbarui data di tabel angsuran', '2020-06-28 19:29:16', 1),
(275, 'Memperbarui data di tabel angsuran', '2020-06-28 19:29:20', 1),
(276, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:29:20', 1),
(277, 'Memperbarui data di tabel angsuran', '2020-06-28 19:29:20', 1),
(278, 'Memperbarui data di tabel angsuran', '2020-06-28 19:30:04', 1),
(279, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:30:04', 1),
(280, 'Memperbarui data di tabel angsuran', '2020-06-28 19:30:04', 1),
(281, 'Memperbarui data di tabel angsuran', '2020-06-28 19:31:39', 1),
(282, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:31:39', 1),
(283, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:31:39', 1),
(284, 'Memperbarui data di tabel angsuran', '2020-06-28 19:31:39', 1),
(285, 'Memperbarui data di tabel angsuran', '2020-06-28 19:31:54', 1),
(286, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:31:54', 1),
(287, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:31:54', 1),
(288, 'Memperbarui data di tabel angsuran', '2020-06-28 19:31:54', 1),
(289, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:00', 1),
(290, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:32:00', 1),
(291, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:00', 1),
(292, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:23', 1),
(293, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:32:23', 1),
(294, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:23', 1),
(295, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:33', 1),
(296, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:32:33', 1),
(297, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:32:34', 1),
(298, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:34', 1),
(299, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:41', 1),
(300, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:32:41', 1),
(301, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:32:41', 1),
(302, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:41', 1),
(303, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:45', 1),
(304, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:32:45', 1),
(305, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:45', 1),
(306, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:56', 1),
(307, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:56', 1),
(308, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:32:56', 1),
(309, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:32:56', 1),
(310, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:56', 1),
(311, 'Memperbarui data di tabel angsuran', '2020-06-28 19:32:57', 1),
(312, 'Memperbarui data di tabel angsuran', '2020-06-28 19:37:39', 1),
(313, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:37:39', 1),
(314, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:37:39', 1),
(315, 'Memperbarui data di tabel angsuran', '2020-06-28 19:37:39', 1),
(316, 'Memperbarui data di tabel angsuran', '2020-06-28 19:40:18', 1),
(317, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:40:18', 1),
(318, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:40:18', 1),
(319, 'Memperbarui data di tabel angsuran', '2020-06-28 19:40:18', 1),
(320, 'Memperbarui data di tabel angsuran', '2020-06-28 19:43:22', 1),
(321, 'Memperbarui data di tabel peminjaman', '2020-06-28 19:43:23', 1),
(322, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:43:23', 1),
(323, 'Memperbarui data di tabel angsuran', '2020-06-28 19:43:23', 1),
(324, 'Memperbarui data di tabel angsuran', '2020-06-28 19:43:32', 1),
(325, 'Menambahkan data di tabel riwayat_angsuran', '2020-06-28 19:43:32', 1),
(326, 'Memperbarui data di tabel angsuran', '2020-06-28 19:43:32', 1),
(327, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 19:56:04', 1),
(328, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 19:58:58', 1),
(329, 'Menghapus data di tabel iuran_wajib', '2020-06-28 19:58:59', 1),
(330, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 19:59:21', 1),
(331, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 19:59:44', 1),
(332, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 19:59:50', 1),
(333, 'Menghapus data di tabel iuran_wajib', '2020-06-28 19:59:50', 1),
(334, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:02:39', 1),
(335, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:03:01', 1),
(336, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:03:17', 1),
(337, 'Menghapus data di tabel iuran_wajib', '2020-06-28 20:03:17', 1),
(338, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:10:40', 1),
(339, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:12:55', 1),
(340, 'Menghapus data di tabel iuran_wajib', '2020-06-28 20:12:55', 1),
(341, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:22:31', 1),
(342, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:48:17', 1),
(343, 'Menghapus data di tabel iuran_wajib', '2020-06-28 20:48:17', 1),
(344, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:48:32', 1),
(345, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:48:39', 1),
(346, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:48:43', 1),
(347, 'Menghapus data di tabel iuran_wajib', '2020-06-28 20:48:44', 1),
(348, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 20:49:16', 1),
(349, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 22:01:13', 1),
(350, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 22:01:50', 1),
(351, 'Menghapus data di tabel iuran_wajib', '2020-06-28 22:01:50', 1),
(352, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 22:02:20', 1),
(353, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 22:02:42', 1),
(354, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 22:03:11', 1),
(355, 'Menghapus data di tabel iuran_wajib', '2020-06-28 22:03:11', 1),
(356, 'Memperbarui data di tabel bulan_iuran', '2020-06-28 22:05:20', 1),
(357, 'Menghapus data di tabel iuran_wajib', '2020-06-28 22:05:20', 1),
(358, 'Menghapus data di tabel tahun_iuran', '2020-06-30 20:22:25', 1),
(359, 'Menghapus data di tabel anggota', '2020-06-30 20:25:14', 1),
(360, 'Menghapus data di tabel anggota', '2020-06-30 20:27:48', 1),
(361, 'Menghapus data di tabel anggota', '2020-06-30 20:29:22', 1),
(362, 'Menghapus data di tabel anggota', '2020-06-30 20:29:27', 1),
(363, 'Menghapus data di tabel anggota', '2020-06-30 20:29:30', 1),
(364, 'Menghapus data di tabel anggota', '2020-06-30 20:29:35', 1),
(365, 'Menambahkan data di tabel peminjaman', '2020-06-30 20:31:09', 1),
(366, 'Menghapus data di tabel anggota', '2020-06-30 20:31:43', 1),
(367, 'Menghapus data di tabel anggota', '2020-06-30 21:01:38', 1),
(368, 'Menghapus data di tabel anggota', '2020-06-30 21:13:57', 1),
(369, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:09:34', 1),
(370, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:09:58', 1),
(371, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:10:34', 1),
(372, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:11:24', 1),
(373, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:12:09', 1),
(374, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:12:28', 1),
(375, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:12:54', 1),
(376, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:13:14', 1),
(377, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:13:37', 1),
(378, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:14:15', 1),
(379, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:14:38', 1),
(380, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:14:49', 1),
(381, 'Memperbarui data di tabel notifikasi', '2020-07-01 03:15:24', 1),
(382, 'Memperbarui data di tabel role', '2020-07-01 13:44:37', 1),
(383, 'Memperbarui data di tabel role', '2020-07-01 13:45:07', 1),
(384, 'Memperbarui data di tabel role', '2020-07-01 13:45:25', 1),
(385, 'Memperbarui data di tabel role', '2020-07-01 14:04:54', 1),
(386, 'Memperbarui data di tabel role', '2020-07-01 14:05:23', 1),
(387, 'Memperbarui data di tabel role', '2020-07-01 14:14:12', 1),
(388, 'Memperbarui data di tabel role', '2020-07-01 14:14:45', 1),
(389, 'Memperbarui data di tabel role_permission', '2020-07-01 14:14:45', 1),
(390, 'Memperbarui data di tabel role_permission', '2020-07-01 14:14:45', 1),
(391, 'Memperbarui data di tabel role_permission', '2020-07-01 14:14:45', 1),
(392, 'Memperbarui data di tabel role_permission', '2020-07-01 14:14:45', 1),
(393, 'Memperbarui data di tabel role_permission', '2020-07-01 14:14:45', 1),
(394, 'Memperbarui data di tabel role_permission', '2020-07-01 14:14:45', 1),
(395, 'Memperbarui data di tabel role', '2020-07-01 14:58:39', 1),
(396, 'Memperbarui data di tabel role', '2020-07-01 15:04:30', 1),
(397, 'Memperbarui data di tabel role', '2020-07-01 15:05:26', 1),
(398, 'Memperbarui data di tabel role', '2020-07-01 15:05:37', 1),
(399, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(400, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(401, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(402, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(403, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(404, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(405, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(406, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(407, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(408, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(409, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:37', 1),
(410, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(411, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(412, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(413, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(414, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(415, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(416, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(417, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(418, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(419, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(420, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(421, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(422, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:38', 1),
(423, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(424, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(425, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(426, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(427, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(428, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(429, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(430, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(431, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(432, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(433, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(434, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(435, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(436, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(437, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(438, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(439, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(440, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(441, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(442, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(443, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:39', 1),
(444, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(445, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(446, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(447, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(448, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(449, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(450, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(451, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(452, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(453, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(454, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(455, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(456, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(457, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(458, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(459, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(460, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(461, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(462, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(463, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(464, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(465, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(466, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(467, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(468, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(469, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(470, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(471, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:40', 1),
(472, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(473, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(474, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(475, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(476, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(477, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(478, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(479, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(480, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(481, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(482, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(483, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(484, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(485, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(486, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(487, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(488, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(489, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(490, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(491, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(492, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(493, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(494, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(495, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(496, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(497, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(498, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:41', 1),
(499, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(500, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(501, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(502, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(503, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(504, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(505, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(506, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(507, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(508, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(509, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(510, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(511, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(512, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(513, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(514, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(515, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(516, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(517, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(518, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(519, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:42', 1),
(520, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(521, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(522, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(523, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(524, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(525, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(526, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(527, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(528, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(529, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(530, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(531, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(532, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(533, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(534, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(535, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:43', 1),
(536, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:44', 1),
(537, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:44', 1),
(538, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:44', 1),
(539, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:44', 1),
(540, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:44', 1),
(541, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:44', 1),
(542, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:44', 1),
(543, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:44', 1),
(544, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:44', 1),
(545, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(546, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(547, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(548, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(549, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(550, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(551, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(552, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(553, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(554, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(555, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(556, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(557, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(558, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(559, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(560, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(561, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(562, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(563, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(564, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(565, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(566, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(567, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(568, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:45', 1),
(569, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(570, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(571, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(572, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(573, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(574, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(575, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(576, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(577, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(578, 'Menghapus data di tabel role_permission', '2020-07-01 15:05:46', 1),
(579, 'Memperbarui data di tabel role', '2020-07-01 15:06:56', 1),
(580, 'Memperbarui data di tabel role', '2020-07-01 15:07:36', 1),
(581, 'Memperbarui data di tabel role', '2020-07-01 15:08:11', 1),
(582, 'Memperbarui data di tabel role', '2020-07-01 15:08:26', 1),
(583, 'Memperbarui data di tabel role', '2020-07-01 15:08:40', 1),
(584, 'Menambahkan data di tabel role', '2020-07-01 15:11:53', 1),
(585, 'Menambahkan data di tabel role', '2020-07-01 15:13:51', 1),
(586, 'Memperbarui data di tabel role', '2020-07-01 15:14:40', 1),
(587, 'Memperbarui data di tabel role', '2020-07-01 15:14:58', 1),
(588, 'Memperbarui data di tabel role', '2020-07-01 15:16:41', 1),
(589, 'Memperbarui data di tabel role', '2020-07-01 15:17:47', 1),
(590, 'Memperbarui data di tabel role', '2020-07-01 15:18:13', 1),
(591, 'Memperbarui data di tabel role', '2020-07-01 15:18:19', 1),
(592, 'Memperbarui data di tabel role', '2020-07-01 15:18:30', 1),
(593, 'Memperbarui data di tabel role', '2020-07-01 15:19:33', 1),
(594, 'Memperbarui data di tabel role', '2020-07-01 15:19:49', 1),
(595, 'Memperbarui data di tabel role', '2020-07-01 15:20:09', 1),
(596, 'Memperbarui data di tabel role', '2020-07-01 15:21:12', 1),
(597, 'Memperbarui data di tabel role', '2020-07-01 15:21:24', 1),
(598, 'Memperbarui data di tabel role', '2020-07-01 15:21:32', 1),
(599, 'Memperbarui data di tabel role', '2020-07-01 15:23:25', 1),
(600, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:25', 1),
(601, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:25', 1),
(602, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:25', 1),
(603, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(604, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(605, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(606, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(607, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(608, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(609, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(610, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(611, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(612, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(613, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(614, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(615, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(616, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(617, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(618, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(619, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(620, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(621, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(622, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(623, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(624, 'Menghapus data di tabel role_permission', '2020-07-01 15:23:26', 1),
(625, 'Menambahkan data di tabel role', '2020-07-01 15:26:32', 1),
(626, 'Memperbarui data di tabel role', '2020-07-01 15:27:06', 1),
(627, 'Memperbarui data di tabel role_permission', '2020-07-01 15:27:06', 1),
(628, 'Memperbarui data di tabel role_permission', '2020-07-01 15:27:06', 1),
(629, 'Memperbarui data di tabel role_permission', '2020-07-01 15:27:06', 1),
(630, 'Memperbarui data di tabel role_permission', '2020-07-01 15:27:07', 1),
(631, 'Memperbarui data di tabel role_permission', '2020-07-01 15:27:07', 1),
(632, 'Menambahkan data di tabel role', '2020-07-01 15:28:57', 1),
(633, 'Memperbarui data di tabel role', '2020-07-01 15:31:03', 1),
(634, 'Memperbarui data di tabel role_permission', '2020-07-01 15:31:03', 1),
(635, 'Memperbarui data di tabel role', '2020-07-01 15:31:33', 1),
(636, 'Memperbarui data di tabel role_permission', '2020-07-01 15:31:33', 1),
(637, 'Menghapus data di tabel role_permission', '2020-07-01 15:31:33', 1),
(638, 'Memperbarui data di tabel role', '2020-07-01 15:31:56', 1),
(639, 'Memperbarui data di tabel role_permission', '2020-07-01 15:31:56', 1),
(640, 'Memperbarui data di tabel role', '2020-07-01 15:32:57', 1),
(641, 'Memperbarui data di tabel role_permission', '2020-07-01 15:32:57', 1),
(642, 'Memperbarui data di tabel role', '2020-07-01 15:34:31', 1),
(643, 'Memperbarui data di tabel role_permission', '2020-07-01 15:34:31', 1),
(644, 'Memperbarui data di tabel role', '2020-07-01 15:35:02', 1),
(645, 'Memperbarui data di tabel role_permission', '2020-07-01 15:35:02', 1),
(646, 'Memperbarui data di tabel role', '2020-07-01 15:36:53', 1),
(647, 'Memperbarui data di tabel role_permission', '2020-07-01 15:36:53', 1),
(648, 'Memperbarui data di tabel role', '2020-07-01 15:37:17', 1),
(649, 'Memperbarui data di tabel role_permission', '2020-07-01 15:37:17', 1),
(650, 'Memperbarui data di tabel role', '2020-07-01 15:37:31', 1),
(651, 'Memperbarui data di tabel role_permission', '2020-07-01 15:37:31', 1),
(652, 'Memperbarui data di tabel role_permission', '2020-07-01 15:37:32', 1),
(653, 'Memperbarui data di tabel role', '2020-07-01 15:40:33', 1),
(654, 'Memperbarui data di tabel role_permission', '2020-07-01 15:40:33', 1),
(655, 'Memperbarui data di tabel role_permission', '2020-07-01 15:40:33', 1),
(656, 'Memperbarui data di tabel role', '2020-07-01 15:48:26', 1),
(657, 'Memperbarui data di tabel role_permission', '2020-07-01 15:48:27', 1),
(658, 'Memperbarui data di tabel role_permission', '2020-07-01 15:48:27', 1),
(659, 'Memperbarui data di tabel role_permission', '2020-07-01 15:48:27', 1),
(660, 'Menambahkan data di tabel role', '2020-07-01 15:56:58', 1),
(661, 'Memperbarui data di tabel role', '2020-07-01 15:57:30', 1),
(662, 'Memperbarui data di tabel role_permission', '2020-07-01 15:57:30', 1),
(663, 'Memperbarui data di tabel role', '2020-07-01 15:57:47', 1),
(664, 'Memperbarui data di tabel role_permission', '2020-07-01 15:57:47', 1),
(665, 'Memperbarui data di tabel role', '2020-07-01 15:58:04', 1),
(666, 'Memperbarui data di tabel role_permission', '2020-07-01 15:58:04', 1),
(667, 'Memperbarui data di tabel role_permission', '2020-07-01 15:58:04', 1),
(668, 'Memperbarui data di tabel role', '2020-07-01 16:08:21', 1),
(669, 'Memperbarui data di tabel role', '2020-07-01 16:08:58', 1),
(670, 'Memperbarui data di tabel role', '2020-07-01 16:09:19', 1),
(671, 'Memperbarui data di tabel role', '2020-07-01 16:09:36', 1),
(672, 'Memperbarui data di tabel role', '2020-07-01 16:10:19', 1),
(673, 'Memperbarui data di tabel role', '2020-07-01 16:10:31', 1),
(674, 'Memperbarui data di tabel role', '2020-07-01 16:10:53', 1),
(675, 'Memperbarui data di tabel role', '2020-07-01 16:11:39', 1),
(676, 'Memperbarui data di tabel role', '2020-07-01 16:12:02', 1),
(677, 'Memperbarui data di tabel role', '2020-07-01 16:12:46', 1),
(678, 'Memperbarui data di tabel role', '2020-07-01 16:13:20', 1),
(679, 'Memperbarui data di tabel role', '2020-07-01 16:15:28', 1),
(680, 'Memperbarui data di tabel role', '2020-07-01 16:15:38', 1),
(681, 'Memperbarui data di tabel role', '2020-07-01 16:16:03', 1),
(682, 'Memperbarui data di tabel role', '2020-07-01 16:19:37', 1),
(683, 'Memperbarui data di tabel role', '2020-07-01 16:19:57', 1),
(684, 'Memperbarui data di tabel role', '2020-07-01 16:21:50', 1),
(685, 'Memperbarui data di tabel role', '2020-07-01 16:22:07', 1),
(686, 'Memperbarui data di tabel role', '2020-07-01 16:23:27', 1),
(687, 'Memperbarui data di tabel role', '2020-07-01 16:23:42', 1),
(688, 'Memperbarui data di tabel role', '2020-07-01 16:23:53', 1),
(689, 'Memperbarui data di tabel role', '2020-07-01 16:24:25', 1),
(690, 'Memperbarui data di tabel role', '2020-07-01 16:24:36', 1),
(691, 'Memperbarui data di tabel role', '2020-07-01 16:25:20', 1),
(692, 'Memperbarui data di tabel role', '2020-07-01 16:34:32', 1),
(693, 'Memperbarui data di tabel role', '2020-07-01 16:50:56', 1),
(694, 'Menghapus data di tabel role_permission', '2020-07-01 16:50:56', 1),
(695, 'Memperbarui data di tabel role', '2020-07-01 16:51:27', 1),
(696, 'Memperbarui data di tabel role_permission', '2020-07-01 16:51:27', 1),
(697, 'Memperbarui data di tabel role', '2020-07-01 16:51:41', 1),
(698, 'Memperbarui data di tabel role_permission', '2020-07-01 16:51:41', 1),
(699, 'Memperbarui data di tabel role_permission', '2020-07-01 16:51:41', 1),
(700, 'Memperbarui data di tabel role', '2020-07-01 16:52:00', 1),
(701, 'Memperbarui data di tabel role_permission', '2020-07-01 16:52:00', 1),
(702, 'Memperbarui data di tabel role_permission', '2020-07-01 16:52:00', 1),
(703, 'Memperbarui data di tabel role', '2020-07-01 16:52:23', 1),
(704, 'Menghapus data di tabel role_permission', '2020-07-01 16:52:23', 1),
(705, 'Memperbarui data di tabel role_permission', '2020-07-01 16:52:23', 1),
(706, 'Memperbarui data di tabel role_permission', '2020-07-01 16:52:23', 1),
(707, 'Memperbarui data di tabel role', '2020-07-01 16:52:35', 1),
(708, 'Memperbarui data di tabel role_permission', '2020-07-01 16:52:35', 1),
(709, 'Memperbarui data di tabel role_permission', '2020-07-01 16:52:35', 1),
(710, 'Memperbarui data di tabel role', '2020-07-01 16:52:46', 1),
(711, 'Memperbarui data di tabel role_permission', '2020-07-01 16:52:46', 1),
(712, 'Memperbarui data di tabel role_permission', '2020-07-01 16:52:46', 1),
(713, 'Menghapus data di tabel role', '2020-07-01 18:25:16', 1),
(714, 'Menghapus data di tabel role_permission', '2020-07-01 18:25:16', 1),
(715, 'Menghapus data di tabel role', '2020-07-01 18:25:20', 1),
(716, 'Menghapus data di tabel role_permission', '2020-07-01 18:25:21', 1);
INSERT INTO `activitylog` (`id_activitylog`, `description`, `created_at`, `userid`) VALUES
(717, 'Menghapus data di tabel role', '2020-07-01 18:25:24', 1),
(718, 'Menghapus data di tabel role_permission', '2020-07-01 18:25:24', 1),
(719, 'Menghapus data di tabel role', '2020-07-01 18:25:27', 1),
(720, 'Menghapus data di tabel role_permission', '2020-07-01 18:25:27', 1),
(721, 'Menghapus data di tabel role', '2020-07-01 18:25:30', 1),
(722, 'Menghapus data di tabel role_permission', '2020-07-01 18:25:30', 1),
(723, 'Menghapus data di tabel role', '2020-07-01 18:25:35', 1),
(724, 'Menghapus data di tabel role_permission', '2020-07-01 18:25:35', 1),
(725, 'Menambahkan data di tabel role', '2020-07-01 19:20:18', 1),
(726, 'Memperbarui data di tabel anggota', '2020-07-01 19:36:37', 1),
(727, 'Memperbarui data di tabel anggota', '2020-07-01 19:39:06', 1),
(728, 'Memperbarui data di tabel role', '2020-07-01 19:57:31', 1),
(729, 'Memperbarui data di tabel role_permission', '2020-07-01 19:57:31', 1),
(730, 'Memperbarui data di tabel role_permission', '2020-07-01 19:57:31', 1),
(731, 'Memperbarui data di tabel role_permission', '2020-07-01 19:57:31', 1),
(732, 'Memperbarui data di tabel role_permission', '2020-07-01 19:57:31', 1),
(733, 'Memperbarui data di tabel role_permission', '2020-07-01 19:57:31', 1),
(734, 'Memperbarui data di tabel role', '2020-07-01 19:58:16', 1),
(735, 'Memperbarui data di tabel role_permission', '2020-07-01 19:58:17', 1),
(736, 'Memperbarui data di tabel role_permission', '2020-07-01 19:58:17', 1),
(737, 'Memperbarui data di tabel role_permission', '2020-07-01 19:58:17', 1),
(738, 'Memperbarui data di tabel role_permission', '2020-07-01 19:58:17', 1),
(739, 'Memperbarui data di tabel role_permission', '2020-07-01 19:58:17', 1),
(740, 'Menambahkan data di tabel role', '2020-07-01 20:01:04', 1),
(741, 'Memperbarui data di tabel role', '2020-07-01 20:32:07', 1),
(742, 'Memperbarui data di tabel role_permission', '2020-07-01 20:32:07', 1),
(743, 'Memperbarui data di tabel notifikasi', '2020-07-11 19:49:15', 1),
(744, 'Memperbarui data di tabel anggota', '2020-07-11 20:20:41', 1),
(745, 'Memperbarui data di tabel anggota', '2020-07-11 20:21:55', 1),
(746, 'Memperbarui data di tabel anggota', '2020-07-11 20:22:52', 1),
(747, 'Memperbarui data di tabel role', '2020-07-11 20:26:21', 1),
(748, 'Memperbarui data di tabel role_permission', '2020-07-11 20:26:21', 1),
(749, 'Memperbarui data di tabel role_permission', '2020-07-11 20:26:21', 1),
(750, 'Memperbarui data di tabel role_permission', '2020-07-11 20:26:21', 1),
(751, 'Memperbarui data di tabel role', '2020-07-11 20:27:18', 1),
(752, 'Menghapus data di tabel role_permission', '2020-07-11 20:27:18', 1),
(753, 'Memperbarui data di tabel role_permission', '2020-07-11 20:27:18', 1),
(754, 'Memperbarui data di tabel role_permission', '2020-07-11 20:27:18', 1),
(755, 'Memperbarui data di tabel role_permission', '2020-07-11 20:27:18', 1),
(756, 'Memperbarui data di tabel anggota', '2020-07-11 23:40:54', 1),
(757, 'Memperbarui data di tabel anggota', '2020-07-11 23:41:15', 1),
(758, 'Memperbarui data di tabel anggota', '2020-07-11 23:43:34', 1),
(759, 'Memperbarui data di tabel anggota', '2020-07-11 23:43:56', 1),
(760, 'Memperbarui data di tabel anggota', '2020-07-11 23:46:24', 1),
(761, 'Memperbarui data di tabel anggota', '2020-07-12 02:01:18', NULL),
(762, 'Memperbarui data di tabel anggota', '2020-07-12 02:03:27', NULL),
(763, 'Memperbarui data di tabel anggota', '2020-07-12 02:05:16', NULL),
(764, 'Memperbarui data di tabel anggota', '2020-07-12 02:06:35', NULL),
(765, 'Memperbarui data di tabel anggota', '2020-07-12 02:16:04', NULL),
(766, 'Memperbarui data di tabel anggota', '2020-07-12 02:16:17', NULL),
(767, 'Memperbarui data di tabel anggota', '2020-07-12 02:18:50', NULL),
(768, 'Memperbarui data di tabel anggota', '2020-07-12 02:21:04', NULL),
(769, 'Memperbarui data di tabel anggota', '2020-07-12 02:21:15', NULL),
(770, 'Memperbarui data di tabel anggota', '2020-07-12 02:26:27', NULL),
(771, 'Memperbarui data di tabel anggota', '2020-07-12 02:27:56', NULL),
(772, 'Memperbarui data di tabel anggota', '2020-07-12 02:31:37', NULL),
(773, 'Memperbarui data di tabel anggota', '2020-07-12 02:32:00', NULL),
(774, 'Memperbarui data di tabel anggota', '2020-07-12 02:32:57', NULL),
(775, 'Memperbarui data di tabel anggota', '2020-07-12 02:33:21', NULL),
(776, 'Memperbarui data di tabel anggota', '2020-07-12 02:34:50', NULL),
(777, 'Memperbarui data di tabel anggota', '2020-07-12 02:35:10', NULL),
(778, 'Memperbarui data di tabel anggota', '2020-07-12 02:35:36', NULL),
(779, 'Memperbarui data di tabel anggota', '2020-07-12 02:37:01', NULL),
(780, 'Memperbarui data di tabel anggota', '2020-07-12 02:37:30', NULL),
(781, 'Memperbarui data di tabel anggota', '2020-07-12 02:37:49', NULL),
(782, 'Memperbarui data di tabel anggota', '2020-07-12 02:38:22', NULL),
(783, 'Memperbarui data di tabel anggota', '2020-07-12 02:38:43', NULL),
(784, 'Memperbarui data di tabel anggota', '2020-07-12 02:42:26', NULL),
(785, 'Memperbarui data di tabel anggota', '2020-07-12 02:42:38', NULL),
(786, 'Memperbarui data di tabel anggota', '2020-07-12 02:49:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `foto_anggota` varchar(255) DEFAULT NULL,
  `gmail_anggota` varchar(255) NOT NULL,
  `password_anggota` varchar(255) NOT NULL,
  `token_password_anggota` int(10) DEFAULT NULL,
  `end_token_password_anggota` datetime DEFAULT NULL,
  `jk_anggota` int(2) DEFAULT NULL,
  `role_anggota` int(10) NOT NULL,
  `is_admin_anggota` int(1) DEFAULT NULL,
  `anggota_notifikasi` int(2) DEFAULT NULL,
  `ip_address_anggota` varchar(255) DEFAULT NULL,
  `ts_add_anggota` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `add_by_anggota` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `foto_anggota`, `gmail_anggota`, `password_anggota`, `token_password_anggota`, `end_token_password_anggota`, `jk_anggota`, `role_anggota`, `is_admin_anggota`, `anggota_notifikasi`, `ip_address_anggota`, `ts_add_anggota`, `add_by_anggota`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'yogastama', NULL, 'yogabagas69@gmail.com', '$2y$10$GI7poSPk8TRNmf8K5pM24uFBWTD7pKZfaJPxAOpGLJO8EhvLtzpeq', 0, '2020-07-12 02:49:34', 0, 3, 1, NULL, '1', '2020-02-04 03:44:55', 1, '2020-05-31 00:57:39', NULL, NULL),
(33, 'Bendahara', NULL, 'bendahara@gmail.com', '$2y$10$WJFoID3utZkEsVRm3xGFy.JPdif958LZGw53td0o65RCxIvrWMWRy', NULL, NULL, 0, 2, NULL, NULL, NULL, '2020-07-01 12:35:16', 0, '2020-07-01 19:35:16', NULL, NULL),
(34, 'anggota', NULL, 'anggota@gmai.com', '$2y$10$BO9kpY/rrVEPGpIHnSumx.r6E2RspoDks97zCRknd51k6WSIf/ksq', NULL, NULL, 0, 3, NULL, NULL, NULL, '2020-07-01 13:01:35', 0, '2020-07-01 20:01:35', NULL, NULL),
(35, 'anggotas2', NULL, 'anggota@gmai.com', '$2y$10$BPGSCxiMNQEkrJRT0.ClxOcIbxm.XruTABPCmHscbOH67rF/WQRAW', NULL, NULL, 0, 3, NULL, NULL, NULL, '2020-07-11 13:16:37', 0, '2020-07-11 20:16:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(10) NOT NULL,
  `peminjaman_id` int(10) NOT NULL,
  `bulan_angsuran` date NOT NULL,
  `nominal_angsuran` int(20) NOT NULL,
  `status_angsuran` int(2) NOT NULL,
  `deskripsi_angsuran` varchar(255) DEFAULT NULL,
  `riwayat_angsuran_id` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `peminjaman_id`, `bulan_angsuran`, `nominal_angsuran`, `status_angsuran`, `deskripsi_angsuran`, `riwayat_angsuran_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2020-06-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:20', 1, NULL, NULL),
(2, 1, '2020-07-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:20', 1, NULL, NULL),
(3, 1, '2020-08-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:20', 1, NULL, NULL),
(4, 1, '2020-09-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:20', 1, NULL, NULL),
(5, 1, '2020-10-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:20', 1, NULL, NULL),
(6, 1, '2020-11-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:20', 1, NULL, NULL),
(7, 1, '2020-12-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:20', 1, NULL, NULL),
(8, 1, '2021-01-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:20', 1, NULL, NULL),
(9, 1, '2021-02-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:20', 1, NULL, NULL),
(10, 1, '2021-03-27', 770000, 1, NULL, NULL, '2020-06-24 01:16:21', 1, NULL, NULL),
(11, 2, '2020-06-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(12, 2, '2020-07-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(13, 2, '2020-08-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(14, 2, '2020-09-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(15, 2, '2020-10-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(16, 2, '2020-11-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(17, 2, '2020-12-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(18, 2, '2021-01-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(19, 2, '2021-02-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(20, 2, '2021-03-27', 660000, 1, NULL, NULL, '2020-06-27 12:48:55', 1, NULL, NULL),
(21, 3, '2020-06-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:57', 1, NULL, NULL),
(22, 3, '2020-07-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:57', 1, NULL, NULL),
(23, 3, '2020-08-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:57', 1, NULL, NULL),
(24, 3, '2020-09-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:57', 1, NULL, NULL),
(25, 3, '2020-10-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:57', 1, NULL, NULL),
(26, 3, '2020-11-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:57', 1, NULL, NULL),
(27, 3, '2020-12-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:57', 1, NULL, NULL),
(28, 3, '2021-01-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:57', 1, NULL, NULL),
(29, 3, '2021-02-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:58', 1, NULL, NULL),
(30, 3, '2021-03-27', 1100000, 1, NULL, NULL, '2020-06-27 12:51:58', 1, NULL, NULL),
(41, 5, '2020-06-27', 3300000, 3, NULL, 22, '2020-06-27 12:53:14', 1, '2020-06-28 16:39:13', 1),
(42, 5, '2020-07-27', 3300000, 3, NULL, 22, '2020-06-27 12:53:14', 1, '2020-06-28 16:39:13', 1),
(43, 5, '2020-08-27', 3300000, 3, NULL, 22, '2020-06-27 12:53:14', 1, '2020-06-28 16:39:13', 1),
(44, 5, '2020-09-27', 3300000, 3, NULL, 22, '2020-06-27 12:53:14', 1, '2020-06-28 16:39:13', 1),
(45, 5, '2020-10-27', 3300000, 3, NULL, 22, '2020-06-27 12:53:14', 1, '2020-06-28 16:39:13', 1),
(46, 5, '2020-11-27', 3300000, 3, NULL, 22, '2020-06-27 12:53:14', 1, '2020-06-28 16:39:14', 1),
(47, 5, '2020-12-27', 3300000, 3, NULL, 23, '2020-06-27 12:53:14', 1, '2020-06-28 17:35:53', 1),
(48, 5, '2021-01-27', 3300000, 3, NULL, 24, '2020-06-27 12:53:14', 1, '2020-06-28 17:36:00', 1),
(49, 5, '2021-02-27', 3300000, 1, NULL, 44, '2020-06-27 12:53:14', 1, '2020-06-28 19:43:32', 1),
(50, 5, '2021-03-27', 3300000, 1, NULL, 43, '2020-06-27 12:53:14', 1, '2020-06-28 19:43:22', 1),
(51, 6, '2020-06-30', 660000, 1, NULL, NULL, '2020-06-30 20:31:09', 1, NULL, NULL),
(52, 6, '2020-07-30', 660000, 1, NULL, NULL, '2020-06-30 20:31:09', 1, NULL, NULL),
(53, 6, '2020-08-30', 660000, 1, NULL, NULL, '2020-06-30 20:31:09', 1, NULL, NULL),
(54, 6, '2020-09-30', 660000, 1, NULL, NULL, '2020-06-30 20:31:09', 1, NULL, NULL),
(55, 6, '2020-10-30', 660000, 1, NULL, NULL, '2020-06-30 20:31:09', 1, NULL, NULL),
(56, 6, '2020-11-30', 660000, 1, NULL, NULL, '2020-06-30 20:31:10', 1, NULL, NULL),
(57, 6, '2020-12-30', 660000, 1, NULL, NULL, '2020-06-30 20:31:10', 1, NULL, NULL),
(58, 6, '2021-01-30', 660000, 1, NULL, NULL, '2020-06-30 20:31:10', 1, NULL, NULL),
(59, 6, '0000-00-00', 660000, 1, NULL, NULL, '2020-06-30 20:31:10', 1, NULL, NULL),
(60, 6, '2021-03-30', 660000, 1, NULL, NULL, '2020-06-30 20:31:10', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan_iuran`
--

CREATE TABLE `bulan_iuran` (
  `id_bulan_iuran` int(10) NOT NULL,
  `bulan_iuran` varchar(3) NOT NULL,
  `anggota_bulan_iuran` text,
  `total_bulan_iuran` int(20) NOT NULL,
  `tahun_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan_iuran`
--

INSERT INTO `bulan_iuran` (`id_bulan_iuran`, `bulan_iuran`, `anggota_bulan_iuran`, `total_bulan_iuran`, `tahun_id`) VALUES
(1, '1', NULL, 0, 3),
(2, '2', NULL, 0, 3),
(3, '3', NULL, 0, 3),
(4, '4', NULL, 0, 3),
(5, '5', NULL, 0, 3),
(6, '6', NULL, 0, 3),
(7, '7', NULL, 0, 3),
(8, '8', NULL, 0, 3),
(9, '9', NULL, 0, 3),
(10, '10', NULL, 0, 3),
(11, '11', NULL, 0, 3),
(12, '12', NULL, 0, 3),
(13, '1', NULL, 0, 4),
(14, '2', NULL, 0, 4),
(15, '3', NULL, 0, 4),
(16, '4', NULL, 0, 4),
(17, '5', NULL, 0, 4),
(18, '6', NULL, 0, 4),
(19, '7', NULL, 0, 4),
(20, '8', '16', 10000, 4),
(21, '9', NULL, 0, 4),
(22, '10', NULL, 0, 4),
(23, '11', NULL, 0, 4),
(24, '12', NULL, 0, 4),
(37, '1', NULL, 0, 6),
(38, '2', NULL, 0, 6),
(39, '3', NULL, 0, 6),
(40, '4', NULL, 0, 6),
(41, '5', NULL, 0, 6),
(42, '6', NULL, 0, 6),
(43, '7', NULL, 0, 6),
(44, '8', '17|1', 572800, 6),
(45, '9', NULL, 0, 6),
(46, '10', NULL, 0, 6),
(47, '11', NULL, 0, 6),
(48, '12', NULL, 0, 6),
(49, '1', NULL, 0, 7),
(50, '2', NULL, 0, 7),
(51, '3', NULL, 0, 7),
(52, '4', NULL, 0, 7),
(53, '5', NULL, 0, 7),
(54, '6', NULL, 0, 7),
(55, '7', NULL, 0, 7),
(56, '8', '', 0, 7),
(57, '9', NULL, 0, 7),
(58, '10', NULL, 0, 7),
(59, '11', NULL, 0, 7),
(60, '12', NULL, 0, 7),
(121, '1', NULL, 0, 13),
(122, '2', NULL, 0, 13),
(123, '3', NULL, 0, 13),
(124, '4', NULL, 0, 13),
(125, '5', NULL, 0, 13),
(126, '6', NULL, 0, 13),
(127, '7', NULL, 0, 13),
(128, '8', NULL, 0, 13),
(129, '9', NULL, 0, 13),
(130, '10', NULL, 0, 13),
(131, '11', NULL, 0, 13),
(132, '12', NULL, 0, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id_info` int(10) NOT NULL,
  `nama_info` text NOT NULL,
  `tipe_info` int(2) NOT NULL,
  `waktu_mulai_info` date NOT NULL,
  `waktu_selesai_info` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id_info`, `nama_info`, `tipe_info`, `waktu_mulai_info`, `waktu_selesai_info`) VALUES
(1, 'tes 1', 1, '2019-10-01', '2019-10-31'),
(2, 'setelah melakukan voting, silakan masuk ke kelas masing-masing', 1, '2019-11-18', '2019-11-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iuran_wajib`
--

CREATE TABLE `iuran_wajib` (
  `id_iuran_wajib` int(10) NOT NULL,
  `anggota_id` int(10) NOT NULL,
  `nominal_iuran_wajib` int(10) NOT NULL,
  `bulan_id` int(10) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `add_by` int(10) NOT NULL,
  `update_at` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iuran_wajib`
--

INSERT INTO `iuran_wajib` (`id_iuran_wajib`, `anggota_id`, `nominal_iuran_wajib`, `bulan_id`, `create_at`, `add_by`, `update_at`, `update_by`) VALUES
(6, 16, 10000, 20, '2020-06-22 16:17:21', 1, NULL, NULL),
(14, 16, 100, 44, '2020-06-28 20:22:31', 1, NULL, NULL),
(15, 14, 900, 44, '2020-06-28 20:48:32', 1, NULL, NULL),
(16, 17, 900, 44, '2020-06-28 20:48:39', 1, NULL, NULL),
(17, 1, 900, 44, '2020-06-28 20:49:17', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iuran_wajib2`
--

CREATE TABLE `iuran_wajib2` (
  `id_iuran_wajib` int(10) NOT NULL,
  `anggota_iuran_wajib` text,
  `nominal_iuran_wajib` int(20) NOT NULL,
  `ts_add_by` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `add_by_iuran_wajib` int(10) NOT NULL,
  `waktu_iuran_wajib` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iuran_wajib2`
--

INSERT INTO `iuran_wajib2` (`id_iuran_wajib`, `anggota_iuran_wajib`, `nominal_iuran_wajib`, `ts_add_by`, `add_by_iuran_wajib`, `waktu_iuran_wajib`) VALUES
(23, '1|', 40000, '2020-02-15 13:01:25', 1, '2020-02-01'),
(24, NULL, 40000, '2020-02-15 13:02:26', 1, '2020-03-01'),
(25, NULL, 40000, '2020-02-15 13:02:26', 1, '2020-04-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(20) NOT NULL,
  `pesan_notifikasi` varchar(100) NOT NULL,
  `link_notifikasi` varchar(100) NOT NULL,
  `dari_notifikasi` varchar(10) NOT NULL,
  `user_notifikasi` varchar(10) NOT NULL,
  `baca_notifikasi` int(1) NOT NULL,
  `create_notifikasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `pesan_notifikasi`, `link_notifikasi`, `dari_notifikasi`, `user_notifikasi`, `baca_notifikasi`, `create_notifikasi`) VALUES
(1, 'Hai, yogas anda belum membayarkan iuran wajib bulan ini', 'dashboard', '1', '1', 1, '2020-06-30 18:36:39'),
(2, 'Hai, yogas anda belum membayarkan iuran wajib bulan ini', 'dashboard', '1', '1', 1, '2020-06-30 18:45:10'),
(3, 'Hai, yogas anda belum membayarkan iuran wajib bulan ini', 'dashboard', '1', '1', 1, '2020-06-30 18:46:48'),
(4, 'Hai, yogas anda belum membayarkan iuran wajib bulan ini', 'dashboard', '1', '1', 1, '2020-06-30 18:47:39'),
(5, 'Hai, nama anda belum membayarkan iuran wajib bulan ini', 'dashboard', '1', '19', 0, '2020-06-30 18:47:40'),
(6, 'Hai, nama anda belum membayarkan iuran wajib bulan ini', 'dashboard', '1', '20', 0, '2020-06-30 18:47:40'),
(7, 'Hai, nama anda belum membayarkan iuran wajib bulan ini', 'dashboard', '1', '21', 0, '2020-06-30 18:47:40'),
(8, 'Hai, nama anda belum membayarkan iuran wajib bulan ini', 'dashboard', '1', '22', 0, '2020-06-30 18:47:40'),
(9, 'Hai,  anda belum membayarkan iuran wajib bulan ini', 'dashboard', '1', '23', 0, '2020-06-30 18:47:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(10) NOT NULL,
  `anggota_id` varchar(10) NOT NULL,
  `hutang_pokok_peminjaman` int(20) NOT NULL,
  `persen_jasa_peminjaman` int(20) NOT NULL,
  `jml_bulan_angsuran_peminjaman` int(10) NOT NULL,
  `status_peminjaman` int(2) NOT NULL,
  `desc_peminjaman` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(20) NOT NULL,
  `updated_at` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `anggota_id`, `hutang_pokok_peminjaman`, `persen_jasa_peminjaman`, `jml_bulan_angsuran_peminjaman`, `status_peminjaman`, `desc_peminjaman`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(5, '1', 30000000, 10, 10, 1, '', '2020-06-27 12:53:14', 1, NULL, NULL),
(6, '17', 6000000, 10, 10, 1, '', '2020-06-30 20:31:09', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `revisi`
--

CREATE TABLE `revisi` (
  `id_revisi` int(10) NOT NULL,
  `modul_id` int(3) NOT NULL,
  `isi_revisi` text NOT NULL,
  `user_revisi` varchar(10) NOT NULL,
  `status_revisi` int(1) NOT NULL,
  `create_revisi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ok_revisi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `revisi_jawab`
--

CREATE TABLE `revisi_jawab` (
  `id_revisi_jawab` int(10) NOT NULL,
  `user_revisi_jawab` varchar(10) NOT NULL,
  `revisi_id` int(10) NOT NULL,
  `isi_revisi_jawab` text NOT NULL,
  `create_revisi_jawab` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_angsuran`
--

CREATE TABLE `riwayat_angsuran` (
  `id_riwayat_angsuran` int(11) NOT NULL,
  `angsuran_id` varchar(255) NOT NULL,
  `peminjaman_id` int(10) DEFAULT NULL,
  `tipe_riwayat_angsuran` int(10) DEFAULT NULL,
  `nominal_angsuran` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_angsuran`
--

INSERT INTO `riwayat_angsuran` (`id_riwayat_angsuran`, `angsuran_id`, `peminjaman_id`, `tipe_riwayat_angsuran`, `nominal_angsuran`, `created_at`, `created_by`) VALUES
(1, '42|43|44', NULL, NULL, 9300000, '2020-06-28 14:11:07', 1),
(2, '45|46|47', NULL, NULL, 9300000, '2020-06-28 14:13:08', 1),
(3, '48', NULL, NULL, 3300000, '2020-06-28 14:45:56', 1),
(4, '49', NULL, NULL, 3300000, '2020-06-28 15:28:45', 1),
(5, '49', NULL, NULL, 3300000, '2020-06-28 15:29:54', 1),
(6, '49', NULL, NULL, 3300000, '2020-06-28 15:31:12', 1),
(7, '48', NULL, NULL, 3300000, '2020-06-28 15:31:45', 1),
(8, '49', NULL, NULL, 3300000, '2020-06-28 15:33:02', 1),
(9, '49', NULL, NULL, 3300000, '2020-06-28 15:40:18', 1),
(10, '49', NULL, 2, 3300000, '2020-06-28 15:51:35', 1),
(11, '48', NULL, 2, 3300000, '2020-06-28 15:51:41', 1),
(12, '48|49', NULL, 2, 6300000, '2020-06-28 15:52:02', 1),
(13, '49', NULL, 2, 3300000, '2020-06-28 16:31:58', 1),
(14, '48', NULL, 2, 3300000, '2020-06-28 16:32:02', 1),
(15, '47', NULL, 2, 3300000, '2020-06-28 16:32:08', 1),
(16, '46', NULL, 2, 3300000, '2020-06-28 16:32:13', 1),
(17, '45', 5, 2, 3300000, '2020-06-28 16:33:37', 1),
(18, '44', 5, 2, 3300000, '2020-06-28 16:38:28', 1),
(19, '43', 5, 2, 3300000, '2020-06-28 16:38:33', 1),
(20, '42', 5, 2, 3300000, '2020-06-28 16:38:37', 1),
(21, '41', 5, 2, 3300000, '2020-06-28 16:38:42', 1),
(22, '41|42|43|44|45|46', 5, 2, 18300000, '2020-06-28 16:39:14', 1),
(23, '47', 5, 1, 3300000, '2020-06-28 17:35:53', 1),
(24, '48', 5, 1, 3300000, '2020-06-28 17:36:00', 1),
(25, '49', 5, 1, 3300000, '2020-06-28 17:36:06', 1),
(26, '50', 5, 1, 3300000, '2020-06-28 17:36:12', 1),
(27, '50', 5, 2, 3300000, '2020-06-28 17:36:39', 1),
(28, '49', 5, 2, 3300000, '2020-06-28 17:37:10', 1),
(29, '49|50', 5, 1, 6300000, '2020-06-28 19:28:39', 1),
(30, '50', 5, 2, 3300000, '2020-06-28 19:29:16', 1),
(31, '49', 5, 2, 3300000, '2020-06-28 19:29:20', 1),
(32, '49', 5, 1, 3300000, '2020-06-28 19:30:04', 1),
(33, '50', 5, 1, 3300000, '2020-06-28 19:31:39', 1),
(34, '50', 5, 2, 3300000, '2020-06-28 19:31:54', 1),
(35, '49', 5, 2, 3300000, '2020-06-28 19:32:00', 1),
(36, '49', 5, 1, 3300000, '2020-06-28 19:32:23', 1),
(37, '50', 5, 1, 3300000, '2020-06-28 19:32:33', 1),
(38, '50', 5, 2, 3300000, '2020-06-28 19:32:41', 1),
(39, '49', 5, 2, 3300000, '2020-06-28 19:32:45', 1),
(40, '49|50', 5, 1, 6300000, '2020-06-28 19:32:56', 1),
(41, '50', 5, 2, 3300000, '2020-06-28 19:37:39', 1),
(42, '50', 5, 1, 3300000, '2020-06-28 19:40:18', 1),
(43, '50', 5, 2, 3300000, '2020-06-28 19:43:23', 1),
(44, '49', 5, 2, 3300000, '2020-06-28 19:43:32', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_bayar`
--

CREATE TABLE `riwayat_bayar` (
  `id_riwayat_bayar` int(10) NOT NULL,
  `kategori_riwayat_bayar` int(10) NOT NULL,
  `tipe_kegiatan` int(10) NOT NULL,
  `bulan_riwayat_bayar` date NOT NULL,
  `nominal_riwayat_bayar` int(20) NOT NULL,
  `ts_add_riwayat_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `relasi_riwayat_bayar` int(10) NOT NULL,
  `anggota_riwayat_bayar` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_bayar`
--

INSERT INTO `riwayat_bayar` (`id_riwayat_bayar`, `kategori_riwayat_bayar`, `tipe_kegiatan`, `bulan_riwayat_bayar`, `nominal_riwayat_bayar`, `ts_add_riwayat_bayar`, `relasi_riwayat_bayar`, `anggota_riwayat_bayar`, `created_by`, `created_at`) VALUES
(1, 1, 2, '2020-02-01', 40000, '2020-02-16 00:02:54', 23, 5, 1, '2020-06-28 13:14:00'),
(2, 1, 2, '2020-02-01', 40000, '2020-02-16 00:05:10', 23, 5, 1, '2020-06-28 13:14:00'),
(3, 1, 2, '2020-02-01', 40000, '2020-02-16 01:08:23', 23, 1, 1, '2020-06-28 13:14:00'),
(4, 1, 2, '2020-02-01', 40000, '2020-02-16 01:08:38', 23, 1, 1, '2020-06-28 13:14:00'),
(5, 1, 2, '2020-02-01', 40000, '2020-02-16 01:09:08', 23, 5, 1, '2020-06-28 13:14:00'),
(6, 1, 1, '2020-02-01', 40000, '2020-02-16 01:09:11', 23, 5, 1, '2020-06-28 13:14:00'),
(7, 1, 1, '2020-02-01', 40000, '2020-02-16 01:32:39', 23, 1, 1, '2020-06-28 13:14:00'),
(8, 1, 2, '2020-02-01', 40000, '2020-02-16 01:32:51', 23, 5, 1, '2020-06-28 13:14:00'),
(9, 1, 2, '2020-02-01', 40000, '2020-02-16 01:33:25', 23, 1, 1, '2020-06-28 13:14:00'),
(10, 1, 1, '2020-02-01', 40000, '2020-02-16 01:45:10', 23, 1, 1, '2020-06-28 13:14:00'),
(11, 1, 1, '2020-02-01', 40000, '2020-02-20 07:05:02', 23, 5, 1, '2020-06-28 13:14:00'),
(12, 1, 2, '2020-02-01', 40000, '2020-02-20 07:05:10', 23, 1, 1, '2020-06-28 13:14:00'),
(13, 1, 1, '2020-02-01', 40000, '2020-03-09 01:28:04', 23, 1, 1, '2020-06-28 13:14:00'),
(14, 1, 2, '2020-02-01', 40000, '2020-03-09 01:28:07', 23, 5, 1, '2020-06-28 13:14:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pinjam`
--

CREATE TABLE `riwayat_pinjam` (
  `id_riwayat_pinjam` int(10) NOT NULL,
  `simpan_pinjam_id` int(10) NOT NULL,
  `tgl_riwayat_pinjam` date NOT NULL,
  `sudah_bayar_riwayat_pinjam` int(2) NOT NULL,
  `waktu_telat_riwayat_pinjam` int(10) NOT NULL,
  `ts_add_riwayat_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(10) NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'super admin'),
(2, 'Bendahara'),
(3, 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_permission`
--

CREATE TABLE `role_permission` (
  `id_rolep` int(10) NOT NULL,
  `role_id` varchar(10) NOT NULL,
  `menu_rolep` varchar(100) NOT NULL,
  `view_rolep` int(1) NOT NULL,
  `add_rolep` int(1) NOT NULL,
  `edit_rolep` int(1) NOT NULL,
  `del_rolep` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_permission`
--

INSERT INTO `role_permission` (`id_rolep`, `role_id`, `menu_rolep`, `view_rolep`, `add_rolep`, `edit_rolep`, `del_rolep`) VALUES
(213, '3', 'iuran_wajib', 1, 0, 0, 0),
(116, 'ubw2a', 'bilik', 1, 1, 1, 1),
(115, 'ubw2a', 'data_sekolah', 1, 1, 1, 1),
(112, 'ubw2a', 'guru', 1, 1, 1, 1),
(113, 'ubw2a', 'siswa', 1, 1, 1, 1),
(114, 'ubw2a', 'log_activity', 1, 0, 0, 0),
(111, 'ubw2a', 'calon', 1, 1, 1, 1),
(110, 'ubw2a', 'live_count', 1, 0, 0, 0),
(109, 'ubw2a', 'dashboard', 1, 0, 0, 0),
(85, 'y1pc5', 'guru_real', 1, 0, 0, 0),
(84, 'y1pc5', 'all_user_login', 1, 0, 0, 0),
(83, 'y1pc5', 'live_count', 1, 0, 0, 0),
(82, 'y1pc5', 'dashboard', 1, 0, 0, 0),
(81, 'k1lmh', 'guru_real', 1, 0, 0, 0),
(80, 'k1lmh', 'all_user_login', 1, 0, 0, 0),
(79, 'k1lmh', 'live_count', 1, 0, 0, 0),
(78, 'k1lmh', 'dashboard', 1, 0, 0, 0),
(214, '3', 'peminjaman', 1, 0, 0, 0),
(212, '3', 'dashboard', 1, 0, 0, 0),
(211, '2', 'role', 1, 1, 0, 0),
(210, '2', 'peminjaman', 1, 1, 1, 1),
(209, '2', 'iuran_wajib', 1, 1, 1, 1),
(208, '2', 'anggota', 1, 1, 1, 1),
(207, '2', 'dashboard', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_iuran`
--

CREATE TABLE `tahun_iuran` (
  `id_tahun_iuran` int(10) NOT NULL,
  `tahun_iuran` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_iuran`
--

INSERT INTO `tahun_iuran` (`id_tahun_iuran`, `tahun_iuran`) VALUES
(4, 2022),
(6, 2020),
(7, 2021),
(13, 2023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userautologin`
--

CREATE TABLE `userautologin` (
  `key_id` char(32) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `tipe_userautologin` int(2) DEFAULT NULL,
  `user_agent` varchar(150) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `userautologin`
--

INSERT INTO `userautologin` (`key_id`, `user_id`, `tipe_userautologin`, `user_agent`, `last_ip`, `last_login`) VALUES
('3ddcd9a21f3c86d6eeee7d2870bf71d9', '6bmgy', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '182.253.230.203', '2019-03-15 07:23:03'),
('1ef02357c0cb60eba5e58f533b483bfa', '6bmgy', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.75 Safari/537.36', '36.70.231.35', '2019-03-15 21:44:19'),
('a8d424b5d6a257c9fc89b26e814d32f7', '6bmgy', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '61.94.122.215', '2019-04-11 07:19:30'),
('85c314a6cb5940dc8006a1f4156d5536', '6bmgy', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '36.70.226.13', '2019-04-23 05:17:18'),
('fb1742675c678da7b6e9a25bd7a0661a', '6bmgy', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '36.70.226.13', '2019-04-24 03:15:58'),
('4dea2015915f2a547f50031018ff56fd', '6bmgy', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '36.70.226.13', '2019-04-25 12:49:57'),
('1b3fd412caee67ae907e324eb1cbedc4', '6bmgy', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '202.169.36.218', '2019-04-26 07:09:30'),
('0027d47f4e132943ad749caaaa96ab81', '326', NULL, 'Mozilla/5.0 (Linux; Android 9; Redmi Note 6 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.136 Mobile Safari/537.36', '180.245.87.224', '2019-05-09 04:49:54'),
('7e43879624f2c75ca746533eba2aefca', '326', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '180.252.197.82', '2019-07-26 23:56:06'),
('a04e741624ea53781297fa39bed28c10', '326', NULL, 'Mozilla/5.0 (Linux; Android 9; Redmi Note 6 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.89 Mobile Safari/537.36', '36.77.206.13', '2019-08-08 14:38:48'),
('f35acbcaac37d0f08cf751e5133d9813', '326', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '36.77.206.13', '2019-08-09 01:32:10'),
('02f9c3c10bd54722fd6c19352035746c', '50', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '::1', '2019-11-18 07:27:04'),
('18a1866bd67923577aabeda6e1964f1e', '17', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '::1', '2019-12-11 04:13:09'),
('52390c71e46a78085a46475ba6798919', '17', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '::1', '2019-12-11 04:14:40'),
('984a4b5a5f463ddaf3e0be99db321a74', '17', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '::1', '2019-12-11 04:27:20'),
('58a79fa54166dbe018aaf48a3eefc7ff', '18', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '127.0.0.1', '2019-12-16 13:42:54'),
('20a255bbf0c3f4ca203246e2850cc078', '18', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '::1', '2020-01-02 11:10:34'),
('$2y$10$odnsIIfzws2h0p9Wp7cNDug9h', '1', NULL, 'Firefox 72.0   ', '::1', '2020-02-11 13:48:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_permission`
--

CREATE TABLE `user_permission` (
  `id_user_permission` int(10) NOT NULL,
  `nama_user_permission` varchar(255) NOT NULL,
  `pass_user_permission` varchar(255) NOT NULL,
  `role_user_permission` varchar(255) NOT NULL,
  `notif_user_permission` int(2) NOT NULL,
  `ip_user_permission` varchar(255) NOT NULL,
  `last_login_user_permission` datetime DEFAULT NULL,
  `note_user_permission` text NOT NULL,
  `is_admin_user_permission` int(2) NOT NULL,
  `active_user_permission` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_permission`
--

INSERT INTO `user_permission` (`id_user_permission`, `nama_user_permission`, `pass_user_permission`, `role_user_permission`, `notif_user_permission`, `ip_user_permission`, `last_login_user_permission`, `note_user_permission`, `is_admin_user_permission`, `active_user_permission`) VALUES
(1, '123', '$2y$10$pcwcHIKljZ04pRPXh1HCWOY44u8l8kdhMvksqaGlfkSBzt0qMW9jS', 'y1pc5', 1, '::1', '2020-01-11 10:02:32', '1234', 1, 1),
(2, 'osis', '$2y$10$QKuG394/aAOFyp0TFZISyOxPYThvDs8kQN6ZSkLB1mijxH/k.smBq', 'ubw2a', 1, '::1', '2019-11-18 14:57:29', '123', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`id_activitylog`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `bulan_iuran`
--
ALTER TABLE `bulan_iuran`
  ADD PRIMARY KEY (`id_bulan_iuran`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `iuran_wajib`
--
ALTER TABLE `iuran_wajib`
  ADD PRIMARY KEY (`id_iuran_wajib`);

--
-- Indexes for table `iuran_wajib2`
--
ALTER TABLE `iuran_wajib2`
  ADD PRIMARY KEY (`id_iuran_wajib`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id_revisi`);

--
-- Indexes for table `revisi_jawab`
--
ALTER TABLE `revisi_jawab`
  ADD PRIMARY KEY (`id_revisi_jawab`);

--
-- Indexes for table `riwayat_angsuran`
--
ALTER TABLE `riwayat_angsuran`
  ADD PRIMARY KEY (`id_riwayat_angsuran`);

--
-- Indexes for table `riwayat_bayar`
--
ALTER TABLE `riwayat_bayar`
  ADD PRIMARY KEY (`id_riwayat_bayar`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id_rolep`);

--
-- Indexes for table `tahun_iuran`
--
ALTER TABLE `tahun_iuran`
  ADD PRIMARY KEY (`id_tahun_iuran`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id_user_permission`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `id_activitylog` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=787;
--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `bulan_iuran`
--
ALTER TABLE `bulan_iuran`
  MODIFY `id_bulan_iuran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `iuran_wajib`
--
ALTER TABLE `iuran_wajib`
  MODIFY `id_iuran_wajib` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `iuran_wajib2`
--
ALTER TABLE `iuran_wajib2`
  MODIFY `id_iuran_wajib` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id_revisi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `revisi_jawab`
--
ALTER TABLE `revisi_jawab`
  MODIFY `id_revisi_jawab` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riwayat_angsuran`
--
ALTER TABLE `riwayat_angsuran`
  MODIFY `id_riwayat_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `riwayat_bayar`
--
ALTER TABLE `riwayat_bayar`
  MODIFY `id_riwayat_bayar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id_rolep` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT for table `tahun_iuran`
--
ALTER TABLE `tahun_iuran`
  MODIFY `id_tahun_iuran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id_user_permission` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;