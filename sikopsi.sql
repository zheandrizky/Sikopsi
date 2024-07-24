-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2024 pada 15.35
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
(202, NULL, '$2y$10$m8V3mDgObG41mOIQCb08XeYIbaV0DeL/hJR4XHBUgEPcspT7Z8R7u', NULL, NULL, NULL, NULL, NULL, 'anggota'),
(203, NULL, '$2y$10$YdmhV5/VtJgn1Zx83Q0RPOSEeT29uWly8cHdv1ud6OgoM2ZgAFLIu', NULL, NULL, NULL, NULL, NULL, 'anggota'),
(209, NULL, '$2y$10$PllU3lPGqerI6alN4fYEhu57Y0Nt26FxZecj3Y0MJUGWQzk9FiExG', NULL, NULL, NULL, NULL, NULL, 'anggota'),
(210, 'Angeline', '$2y$10$sHWu/eapd/.3EAgpsJUq/OqJEhMEsocN6BhdWjXklwyqWjK7QhNji', NULL, NULL, NULL, NULL, NULL, 'anggota'),
(212, NULL, '$2y$10$MYHeSJVVAzbzdhOg8vD/l.Ig4e9MtU6jbpBOZKdRZ4uvZXqVRoWbK', NULL, NULL, NULL, NULL, NULL, 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kode_pengembalian` varchar(20) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `kode_pinjam` varchar(20) NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `jumlah_pengembalian` int(11) DEFAULT NULL,
  `bukti_pengembalian` varchar(255) DEFAULT NULL,
  `status_pembayaran_pengembalian` varchar(20) NOT NULL,
  `keterangan_pembayaran_pengembalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`kode_pengembalian`, `nik`, `kode_pinjam`, `tanggal_pengembalian`, `jumlah_pengembalian`, `bukti_pengembalian`, `status_pembayaran_pengembalian`, `keterangan_pembayaran_pengembalian`) VALUES
('PGM001', 101, 'PJM001', '2024-02-20', 5000000, 'bukti_pg_001.jpg', 'diterima', ''),
('PGM002', 102, 'PJM002', '2024-03-05', 3000000, 'bukti_pg_002.jpg', 'diterima', ''),
('PGM004', 104, 'PJM004', '2024-05-20', 2500000, 'bukti_pg_004.jpg', 'diterima', ''),
('PGM005', 103, 'PJM005', '2024-06-15', 80883, 'bukti_pg_005.jpg', 'diterima', ''),
('PGM006', 105, 'PJM004', '2024-06-25', 2500000, 'bukti_pg_006.jpg', 'diterima', ''),
('PGM007', 106, 'PJM002', '2024-07-10', 3000000, 'bukti_pg_007.jpg', 'diterima', ''),
('PGM009', 108, 'PJM001', '2024-09-15', 5000000, 'bukti_pg_009.jpg', 'diterima', ''),
('PGM010', 109, 'PJM007', NULL, 5000, NULL, 'diproses', 'Saat ini, pembayaran saham Anda sedang diproses untuk diverifikasi. Proses ini memastikan bahwa semua informasi dan dokumen terkait terverifikasi dengan benar.'),
('PGM011', 109, 'PJM007', NULL, 45000, '1718553867_WhatsApp_Image_2024-02-14_at_07_50_09_e262d1ea.jpg', 'ditolak', 'Maaf, pembayaran saham Anda tidak dapat kami terima setelah melalui proses verifikasi.'),
('PGM012', 109, 'PJM007', NULL, 600000, '1718553906_WhatsApp_Image_2024-02-14_at_07_51_53_9e6029f3.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.'),
('PGM013', 103, 'PJM005', '2024-06-19', 300000, '1718775833_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.'),
('PGM014', 210, 'PJM009', '2024-06-21', 1000000, '1718922635_bukti_tf_1541571851_aaa3d39f_progressive.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.'),
('PGM015', 210, 'PJM009', '2024-06-21', 500000, '1718943965_bukti_tf_1541571851_aaa3d39f_progressive.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.'),
('PGM016', 210, 'PJM009', '2024-06-21', 500000, '1718944180_bukti_tf_1541571851_aaa3d39f_progressive.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `kode_pinjam` varchar(20) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `jumlah_pinjam` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `bukti_peminjaman` varchar(255) NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `status_pengajuan_pinjam` varchar(20) NOT NULL,
  `keterangan_pengajuan_pinjam` text NOT NULL,
  `bunga_pinjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`kode_pinjam`, `nik`, `jumlah_pinjam`, `tgl_pinjam`, `bukti_peminjaman`, `jatuh_tempo`, `status_pengajuan_pinjam`, `keterangan_pengajuan_pinjam`, `bunga_pinjaman`) VALUES
('PJM001', 101, 5000000, '2024-01-15', '', '2024-02-15', 'ditolak', '', 0),
('PJM002', 102, 3000000, '2024-02-01', '', '2024-03-01', 'ditolak', '', 0),
('PJM003', 103, 4500000, '2024-03-05', '', '2024-04-05', 'ditolak', '', 0),
('PJM004', 104, 2500000, '2024-03-15', '', '2024-04-15', 'diterima', '', 0),
('PJM005', 103, 2500000, '2024-06-09', '1717927097_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', '2024-11-09', 'diterima', 'asdfghjfdsd', 0),
('PJM006', 109, 5000000, NULL, '', NULL, 'ditolak', 'Maaf, pembayaran saham Anda tidak dapat kami terima setelah melalui proses verifikasi.', 0),
('PJM007', 109, 5000000, '2024-06-16', '1718527597_WhatsApp_Image_2024-02-14_at_07_46_51_15beda3c.jpg', '2024-11-16', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', 250000),
('PJM008', 106, 5000000, '2024-06-19', '1718768187_button.png', '2024-11-19', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', 250000),
('PJM009', 210, 2000000, '2024-06-21', '1718922551_bukti_tf_1541571851_aaa3d39f_progressive.jpg', '2024-11-21', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', 100000),
('PJM010', 212, 50000, '2024-07-24', '1721827776_bukti_tf_1541571851_aaa3d39f_progressive.jpg', '2024-12-24', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', 2500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saham`
--

CREATE TABLE `saham` (
  `kode_saham` varchar(20) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `jumlah_saham` int(11) DEFAULT NULL,
  `bukti_pembayaran_saham` varchar(255) NOT NULL,
  `status_pembayaran_saham` varchar(12) NOT NULL,
  `keterangan_pembayaran_saham` text NOT NULL,
  `tanggal_pembayaran_saham` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saham`
--

INSERT INTO `saham` (`kode_saham`, `nik`, `jumlah_saham`, `bukti_pembayaran_saham`, `status_pembayaran_saham`, `keterangan_pembayaran_saham`, `tanggal_pembayaran_saham`) VALUES
('SHM001', 101, 100, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'jumlah dan bukti tidak sinkron', '2024-06-07'),
('SHM002', 102, 200, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Pembayaran saham kedua', '2024-06-14'),
('SHM003', 103, 210000, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Pembayaran saham ketiga', '2024-06-10'),
('SHM004', 104, 240000, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Pembayaran saham keempat', '2024-06-14'),
('SHM005', 105, 300, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Pembayaran saham kelima', '2024-06-14'),
('SHM006', 106, 250, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', 'Pembayaran saham keenam', '2024-06-14'),
('SHM007', 107, 180, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', 'Pembayaran saham ketujuh', '2024-06-14'),
('SHM008', 108, 220, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', 'Pembayaran saham kedelapan', '2024-06-14'),
('SHM009', 109, 270, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', 'Pembayaran saham kesembilan', '2024-06-14'),
('SHM010', 110, 160, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', 'Pembayaran saham kesepuluh', '2024-06-14'),
('SHM011', 101, 12312, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', '', '2024-06-14'),
('SHM012', 101, 12312312, '1717321942_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diproses', '', '2024-06-14'),
('SHM015', 104, 10000, '1718375111_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', '2024-06-14'),
('SHM016', 103, 10000, '1718429384_WhatsApp_Image_2024-02-14_at_07_43_56_eed80ae3.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', '2024-06-15'),
('SHM017', 107, 250000, '1718432051_WhatsApp_Image_2024-02-14_at_07_50_09_e262d1ea.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', '2024-06-15'),
('SHM018', 103, 30000, '1718439785_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', '2024-06-15'),
('SHM019', 109, 250000, '1718523187_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', '2024-06-16'),
('SHM020', 106, 250000, '1718768099_button.png', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', '2024-06-19'),
('SHM021', 210, 250000, '1718920278_bukti_tf_1541571851_aaa3d39f_progressive.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', '2024-06-20'),
('SHM022', 212, 250000, '1721827718_bukti_tf_1541571851_aaa3d39f_progressive.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.', '2024-07-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `kode_tabungan` varchar(20) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `tanggal_nabung` date DEFAULT NULL,
  `jumlah_nabung` int(11) DEFAULT NULL,
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
('TAB003', 103, '2024-02-01', 2000000, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.'),
('TAB004', 104, '2024-02-15', 2500000, '1717315288_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab8.jpg', 'ditolak', ''),
('TAB005', 105, '2024-03-01', 3000000, 'bukti5.jpg', 'diterima', ''),
('TAB006', 106, '2024-03-15', 3500000, 'bukti5.jpg', 'diterima', ''),
('TAB007', 107, '2024-04-01', 4000000, 'bukti5.jpg', 'ditolak', ''),
('TAB008', 108, '2024-04-15', 4500000, 'bukti5.jpg', 'diterima', ''),
('TAB009', 109, '2024-05-01', 5000000, 'bukti5.jpg', 'ditolak', ''),
('TAB010', 110, '2024-05-15', 5500000, 'bukti5.jpg', 'ditolak', ''),
('TAB011', 104, '2024-06-15', 123123123, '1718456200_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab81.jpg', 'ditolak', 'Maaf, pembayaran saham Anda tidak dapat kami terima setelah melalui proses verifikasi.'),
('TAB012', 104, '2024-06-15', 150000, '1718458945_WhatsApp_Image_2024-02-14_at_07_51_53_9e6029f3.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.'),
('TAB013', 103, '2024-06-16', 20000, '1718495942_WhatsApp_Image_2024-02-14_at_07_41_59_6c27eab81.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.'),
('TAB014', 103, '2024-06-19', 200000, '1718775604_WhatsApp_Image_2024-02-14_at_07_51_53_9e6029f3.jpg', 'diterima', 'Selamat! Pembayaran saham Anda telah berhasil diverifikasi dan diterima.');

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
