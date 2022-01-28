-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jan 2022 pada 14.48
-- Versi server: 10.6.5-MariaDB-log
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reddoorz_v2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_produk` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL COMMENT '0 =  active,1 = is soft delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `type`, `jumlah`, `stok`, `price`, `image_produk`, `is_active`) VALUES
(3, 'Double', 1000000, '5', '20000', 'default.jpg', 0),
(4, 'Single', 19, '10', '23000', '86684427879c8bf7edfaa0e0a4c86b46.png', 0),
(5, 'Double', 12, '12', '20000', 'b3d0529ac933caec07a6b5a5135b4b76.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tgl_pesan` varchar(255) NOT NULL,
  `tgl_masuk` varchar(255) NOT NULL,
  `tgl_keluar` varchar(255) NOT NULL,
  `jumlah_kamar` varchar(110) NOT NULL,
  `lama_hari` varchar(255) NOT NULL,
  `total_bayar` varchar(255) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `no_rekening` varchar(225) NOT NULL,
  `nm_rekening` varchar(225) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status_pesanan` varchar(255) NOT NULL COMMENT '0 = belum dikonfirmasi, \r\n1 = sdh dikonfirmasi,\r\n2 = pesanan dibatalkan',
  `status_pembayaran` int(11) NOT NULL COMMENT ' 0 = belum dibayar,\r\n 1 = sdh bayar belum konfirmasi , \r\n 2 = sdh bayar dan sdh konfirmasi,\r\n 3 = dibatalkan',
  `status` int(11) NOT NULL COMMENT '0 = tampil, 1 = soft delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_kamar`, `tgl_pesan`, `tgl_masuk`, `tgl_keluar`, `jumlah_kamar`, `lama_hari`, `total_bayar`, `bank`, `no_rekening`, `nm_rekening`, `bukti`, `status_pesanan`, `status_pembayaran`, `status`) VALUES
(4, 24, 4, '2021-12-27 18:46:17', '2021-12-28', '2021-12-31', '6', '3', '414000', '', '', '', '', '0', 0, 0),
(5, 24, 3, '2021-12-28 20:51:41', '2021-12-28', '2022-1-25', '2', '1', '40000', 'BCA', '24123124213', 'asdasdasdad', '5e337857e28870eec1805f05141d3b29.png', '1', 1, 0),
(6, 24, 4, '2021-12-30 23:52:46', '2021-12-30', '2021-12-31', '5', '1', '115000', '', '', '', '', '2', 0, 0),
(7, 24, 3, '2021-12-30 06:09:54', '2021-12-31', '2022-01-01', '2', '1', '40000', '', '', '', '', '2', 0, 0),
(8, 25, 4, '2022-01-28 21:10:40', '2022-01-28', '2022-01-29', '3', '1', '69000', 'BCA', '090324', 'sdad', '91f97c2d0a97754262d46a8f6d0ff891.jpg', '1', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_delete` int(11) NOT NULL COMMENT ' 0 = tampil ,1 = delete',
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `address`, `phone`, `image`, `password`, `role_id`, `is_active`, `is_delete`, `date_created`) VALUES
(15, 'Demo Member', 'coba@gmail.com', '', '09865', 'apotik.jpg', '$2y$10$epGoo3J7WVOlzuR.f9Z/yuokcGeVxai9oDqxxnRPSjsn4BWGcNCAO', 1, 1, 0, 1638095552),
(24, 'Rizki Darmsss', 'rizkidarmawan.0402102@gmail.com', 'semarang', '0898768', 'istockphoto-1250436339-170667a.jpg', '$2y$10$epGoo3J7WVOlzuR.f9Z/yuokcGeVxai9oDqxxnRPSjsn4BWGcNCAO', 1, 1, 0, 1639910890),
(25, 'tring', 'qwerty@gmail.com', 'semarang', '088802680490', '47390-daftar-menu-mie-gacoan-miegacoancom.jpg', '$2y$10$epGoo3J7WVOlzuR.f9Z/yuokcGeVxai9oDqxxnRPSjsn4BWGcNCAO', 2, 1, 0, 1643378937);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(76, 1, 3),
(77, 1, 21),
(78, 1, 22),
(79, 1, 23),
(80, 1, 24),
(81, 1, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(21, 'Users'),
(22, 'Kamar'),
(23, 'Transaksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user/user', 'fas fa-fw fa-user ', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(37, 23, 'Data Transaksi', 'transaksi', 'fas fa-fw fa-warehouse', 1),
(38, 23, 'Konfirmasi Pesanan', 'transaksi/konfirmasi', 'fas fa-fw fa-money-check', 1),
(39, 23, 'Log Transaksi', 'transaksi/log', 'fas fa-fw fa-list', 1),
(40, 22, 'Data Kamar', 'kamar', 'fas fa-fw fa-warehouse', 1),
(41, 22, 'Stok Kamar', 'kamar/stok', 'fas fa-fw fa-list', 1),
(42, 21, 'Data Users', 'users', 'fas fa-fw fa-users', 1),
(43, 24, 'Chatting', 'kontak', 'fas fa-fw fa-phone', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
