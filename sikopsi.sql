-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2024 pada 03.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikopsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `nik` int(11) NOT NULL,
  `nama_anggota` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alamat_anggota` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`nik`, `nama_anggota`, `password`, `alamat_anggota`, `jenis_kelamin`, `no_telp`, `tempat_lahir`, `tgl_lahir`, `jabatan`) VALUES
(101, 'Pengurus', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Merpati No.1', 'Laki-laki', '081234567890', 'Jakarta', '1990-01-01', 'pengurus'),
(102, 'Ketua', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Kenari No.2', 'Perempuan', '081234567891', 'Bandung', '1992-02-02', 'ketua'),
(103, 'Alice Johnson', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Melati No.3', 'Perempuan', '081234567892', 'Surabaya', '1994-03-03', 'anggota'),
(104, 'Bob Brown', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Kamboja No.4', 'Laki-laki', '081234567893', 'Medan', '1991-04-04', 'anggota'),
(105, 'Charlie Davis', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Mawar No.5', 'Laki-laki', '081234567894', 'Bali', '1993-05-05', 'anggota'),
(106, 'David Evans', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Anggrek No.6', 'Laki-laki', '081234567895', 'Malang', '1995-06-06', 'anggota'),
(107, 'Eve Foster', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Sakura No.7', 'Perempuan', '081234567896', 'Semarang', '1996-07-07', 'anggota'),
(108, 'Frank Green', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Bougenville No.8', 'Laki-laki', '081234567897', 'Yogyakarta', '1990-08-08', 'anggota'),
(109, 'Grace Hill', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Flamboyan No.9', 'Perempuan', '081234567898', 'Palembang', '1992-09-09', 'anggota'),
(110, 'Henry Ivan', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', 'Jl. Teratai No.10', 'Laki-laki', '081234567899', 'Makassar', '1991-10-10', 'anggota'),
(12345, 'Albert', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', NULL, NULL, NULL, NULL, NULL, 'anggota'),
(23456, 'Hipose', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', NULL, NULL, NULL, NULL, NULL, 'anggota'),
(34567, 'Retide', '$2y$10$sTxnIRRkUNNteNPCYFLxTeLsl/.9xYkrSBwnd0Iua9Lk57PXkHsf.', NULL, NULL, NULL, NULL, NULL, 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kode_pengembalian` varchar(20) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `kode_pinjam` varchar(20) NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `jumlah_pengembalian` decimal(10,0) DEFAULT NULL,
  `bukti_pengembalian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `kode_pinjam` varchar(20) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `jumlah_pinjam` decimal(10,0) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `bukti_peminjaman` varchar(255) NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `status_pengajuan_pinjam` varchar(20) NOT NULL,
  `keterangan_pengajuan_pinjam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`kode_pinjam`, `nik`, `jumlah_pinjam`, `tgl_pinjam`, `bukti_peminjaman`, `jatuh_tempo`, `status_pengajuan_pinjam`, `keterangan_pengajuan_pinjam`) VALUES
('PJM001', 101, 5000000, '2024-01-15', '', '2024-02-15', 'ditolak', ''),
('PJM002', 102, 3000000, '2024-02-01', '', '2024-03-01', 'ditolak', ''),
('PJM003', 103, 4500000, '2024-03-05', '', '2024-04-05', 'ditolak', ''),
('PJM004', 104, 2500000, '2024-03-15', '', '2024-04-15', 'diterima', ''),
('PJM005', 105, 3500000, '2024-04-01', '', '2024-05-01', 'diproses', ''),
('TAB006', 103, 5000000, NULL, '', NULL, 'diproses', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saham`
--

CREATE TABLE `saham` (
  `kode_saham` varchar(20) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `bukti_pembayaran_saham` varchar(255) NOT NULL,
  `status_pembayaran_saham` varchar(12) NOT NULL,
  `keterangan_pembayaran_saham` text NOT NULL,
  `tanggal_pembayaran_saham` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saham`
--

INSERT INTO `saham` (`kode_saham`, `nik`, `jumlah`, `bukti_pembayaran_saham`, `status_pembayaran_saham`, `keterangan_pembayaran_saham`, `tanggal_pembayaran_saham`) VALUES
('SHM001', 101, 100, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'jumlah dan bukti tidak sinkron', NULL),
('SHM002', 102, 200, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Pembayaran saham kedua', NULL),
('SHM003', 103, 150, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Pembayaran saham ketiga', NULL),
('SHM004', 104, 120, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', 'Pembayaran saham keempat', NULL),
('SHM005', 105, 300, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Pembayaran saham kelima', NULL),
('SHM006', 106, 250, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', 'Pembayaran saham keenam', NULL),
('SHM007', 107, 180, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', 'Pembayaran saham ketujuh', NULL),
('SHM008', 108, 220, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', 'Pembayaran saham kedelapan', NULL),
('SHM009', 109, 270, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', 'Pembayaran saham kesembilan', NULL),
('SHM010', 110, 160, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', 'Pembayaran saham kesepuluh', NULL),
('SHM011', 101, 12312, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', '', NULL),
('SHM012', 101, 12312312, '1717321942_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', '', NULL),
('SHM013', NULL, 98765, '1717526238_WhatsApp_Image_2024-02-14_at_07_43_56_eed80ae3.jpg', 'diproses', '', NULL),
('SHM014', NULL, 87685785, '1717550583_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `kode_tabungan` varchar(20) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `tanggal_nabung` date DEFAULT NULL,
  `jumlah_nabung` decimal(10,0) DEFAULT NULL,
  `bukti_pembayaran_tabungan` varchar(255) DEFAULT NULL,
  `status_pembayaran_tabungan` varchar(20) NOT NULL,
  `keterangan_pembayaran_tabungan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`kode_tabungan`, `nik`, `tanggal_nabung`, `jumlah_nabung`, `bukti_pembayaran_tabungan`, `status_pembayaran_tabungan`, `keterangan_pembayaran_tabungan`) VALUES
('TAB001', 101, '2024-01-01', 1000000, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', ''),
('TAB002', 102, '2024-01-05', 1500000, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', ''),
('TAB003', 103, '2024-02-01', 2000000, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', ''),
('TAB004', 104, '2024-02-15', 2500000, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', ''),
('TAB005', 105, '2024-03-01', 3000000, 'bukti5.jpg', 'diterima', ''),
('TAB006', 106, '2024-03-15', 3500000, 'bukti5.jpg', 'diterima', ''),
('TAB007', 107, '2024-04-01', 4000000, 'bukti5.jpg', 'ditolak', ''),
('TAB008', 108, '2024-04-15', 4500000, 'bukti5.jpg', 'diterima', ''),
('TAB009', 109, '2024-05-01', 5000000, 'bukti5.jpg', 'ditolak', ''),
('TAB010', 110, '2024-05-15', 5500000, 'bukti5.jpg', 'ditolak', ''),
('TAB011', NULL, NULL, 132312, '1717550548_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab81.jpg', 'diproses', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `anggota_pk` (`nik`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kode_pengembalian`),
  ADD UNIQUE KEY `pengembalian_pk` (`kode_pengembalian`),
  ADD KEY `mengembalikan_fk` (`nik`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD UNIQUE KEY `pinjam_pk` (`kode_pinjam`),
  ADD KEY `meminjam_fk` (`nik`);

--
-- Indeks untuk tabel `saham`
--
ALTER TABLE `saham`
  ADD PRIMARY KEY (`kode_saham`),
  ADD UNIQUE KEY `saham_pk` (`kode_saham`),
  ADD KEY `membayar_fk` (`nik`);

--
-- Indeks untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`kode_tabungan`),
  ADD UNIQUE KEY `tabungan_pk` (`kode_tabungan`),
  ADD KEY `menabung_fk` (`nik`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `fk_pengemba_mengembal_anggota` FOREIGN KEY (`nik`) REFERENCES `anggota` (`nik`);

--
-- Ketidakleluasaan untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `fk_pinjam_meminjam_anggota` FOREIGN KEY (`nik`) REFERENCES `anggota` (`nik`);

--
-- Ketidakleluasaan untuk tabel `saham`
--
ALTER TABLE `saham`
  ADD CONSTRAINT `fk_saham_membayar_anggota` FOREIGN KEY (`nik`) REFERENCES `anggota` (`nik`);

--
-- Ketidakleluasaan untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `fk_tabungan_menabung_anggota` FOREIGN KEY (`nik`) REFERENCES `anggota` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
