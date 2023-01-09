-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2022 pada 03.12
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpw_tubes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` enum('anggota','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `email`, `password`, `role`) VALUES
(1, 'yasmin@gmail.com', 'passyasmin', 'anggota'),
(2, 'nazma@gmail.com', 'passnazma', 'petugas'),
(3, 'ara@gmail.com', 'passara', 'petugas'),
(5, 'herbert@gmail.com', '123', 'anggota'),
(7, 'yasminfzakiyyah@gmail.com', '966828134', 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_lengkap` varchar(250) DEFAULT NULL,
  `jenis_kelamin` enum('','Laki-laki','Perempuan') DEFAULT NULL,
  `asal_kota` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_akun`, `nama_lengkap`, `jenis_kelamin`, `asal_kota`, `tanggal_lahir`, `foto`) VALUES
(1, 1, 'Yasmin Fathanah Zakiyyah', 'Perempuan', 'Sukabumi', '2022-06-20', 'interface4.png'),
(2, 7, 'Yasmin Zakiyyah', 'Perempuan', 'Bandung', '2022-06-25', 'interface2.png'),
(5, 5, 'Herbert Siregar', 'Laki-laki', 'Bandung', '1990-02-23', 'tp5.c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `id_buku` int(11) NOT NULL,
  `kd_buku` varchar(15) NOT NULL,
  `cover_buku` varchar(25) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `penerbit_buku` varchar(50) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`id_buku`, `kd_buku`, `cover_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_terbit`, `jumlah`, `id_petugas`) VALUES
(1, 'B01', 'pelangi.jpeg', 'Pelangi', 'Mizan', 'Mizan', '2023', 11, 2),
(5, 'B02', 'Acara_1.png', 'Macam-macam Kucing Lucu', 'Penerbit2', 'Penerbit2', '2018', 11, 2),
(7, 'B04', 'Poster-medpart.png', 'Ngoding Yuk', 'Amida', 'Penerbit4', '2010', 13, 2),
(9, 'B09', 'vbg.jpeg', 'Cara install OS', 'Yasmin', 'Penerbit10', '2020', 10, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `email_pelaku` varchar(50) NOT NULL,
  `kejadian` varchar(50) NOT NULL,
  `kd_buku` varchar(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `tanggal`, `email_pelaku`, `kejadian`, `kd_buku`, `judul_buku`, `jumlah`, `keterangan`) VALUES
(1, '2022-06-24', 'budi@gmail.com', 'Peminjaman Buku', 'B09', 'Cara install OS', '1', NULL),
(2, '2022-06-24', 'nazma@gmail.com', 'Konfirmasi Peminjaman Buku', 'B09', 'Cara install OS', '1', NULL),
(3, '2022-06-24', 'budi@gmail.com', 'Pengembalian Buku', 'B09', 'Cara install OS', '1', NULL),
(4, '2022-06-24', 'nazma@gmail.com', 'Konfirmasi Pengembalian Buku', 'B09', 'Cara install OS', '1', NULL),
(5, '2022-06-24', 'nazma@gmail.com', 'Konfirmasi Pengembalian Buku', 'B09', 'Cara install OS', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sirkulasi`
--

CREATE TABLE `sirkulasi` (
  `id_sirkulasi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL DEFAULT current_timestamp(),
  `konfirmasi_pinjam` enum('belum terkonfirmasi','sudah terkonfirmasi') NOT NULL DEFAULT 'belum terkonfirmasi',
  `batas_kembali` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `konfirmasi_kembali` enum('','belum terkonfirmasi','sudah terkonfirmasi') DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sirkulasi`
--

INSERT INTO `sirkulasi` (`id_sirkulasi`, `id_buku`, `id_peminjam`, `tanggal_pinjam`, `konfirmasi_pinjam`, `batas_kembali`, `tanggal_kembali`, `konfirmasi_kembali`, `id_petugas`) VALUES
(22, 1, 1, '2022-06-21', 'sudah terkonfirmasi', '2022-06-28', '2022-06-21', 'sudah terkonfirmasi', 3),
(23, 7, 1, '2022-06-21', 'sudah terkonfirmasi', '2022-06-09', '2022-06-23', 'belum terkonfirmasi', 2),
(24, 1, 1, '2022-06-21', 'sudah terkonfirmasi', '2022-06-28', '2022-06-21', 'sudah terkonfirmasi', 2),
(25, 1, 1, '2022-06-23', 'sudah terkonfirmasi', '2022-06-30', NULL, NULL, 2),
(26, 1, 1, '2022-06-23', 'belum terkonfirmasi', NULL, NULL, NULL, 0),
(28, 1, 1, '2022-06-23', 'belum terkonfirmasi', NULL, NULL, NULL, 0),
(31, 5, 1, '2022-06-24', 'sudah terkonfirmasi', '2022-07-01', NULL, NULL, 2);

--
-- Trigger `sirkulasi`
--
DELIMITER $$
CREATE TRIGGER `tr_pinjam_req` AFTER INSERT ON `sirkulasi` FOR EACH ROW BEGIN
INSERT INTO riwayat (tanggal, email_pelaku, kejadian, kd_buku, judul_buku, jumlah) VALUES (CURRENT_DATE(), (SELECT email FROM akun WHERE id_akun = NEW.id_peminjam), 'Peminjaman Buku', (SELECT kd_buku FROM data_buku WHERE id_buku = NEW.id_buku), (SELECT judul_buku FROM data_buku WHERE id_buku = NEW.id_buku), 1);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_pinjam_update` AFTER UPDATE ON `sirkulasi` FOR EACH ROW BEGIN
IF NEW.konfirmasi_kembali != OLD.konfirmasi_kembali
THEN
INSERT INTO riwayat (tanggal, email_pelaku, kejadian, kd_buku, judul_buku, jumlah) VALUES (CURRENT_DATE(), (SELECT email FROM akun WHERE id_akun = NEW.id_petugas), 'Konfirmasi Pengembalian Buku', (SELECT kd_buku FROM data_buku WHERE id_buku = (SELECT id_buku FROM sirkulasi WHERE id_sirkulasi = NEW.id_sirkulasi)), (SELECT judul_buku FROM data_buku WHERE id_buku = (SELECT id_buku FROM sirkulasi WHERE id_sirkulasi = NEW.id_sirkulasi)), 1);
UPDATE data_buku SET jumlah = jumlah + 1 WHERE id_buku = (SELECT id_buku FROM sirkulasi WHERE id_sirkulasi = NEW.id_sirkulasi);
ELSEIF NEW.konfirmasi_pinjam != OLD.konfirmasi_pinjam
THEN
INSERT INTO riwayat (tanggal, email_pelaku, kejadian, kd_buku, judul_buku, jumlah) VALUES (CURRENT_DATE(), (SELECT email FROM akun WHERE id_akun = NEW.id_petugas), 'Konfirmasi Peminjaman Buku', (SELECT kd_buku FROM data_buku WHERE id_buku = (SELECT id_buku FROM sirkulasi WHERE id_sirkulasi = NEW.id_sirkulasi)), (SELECT judul_buku FROM data_buku WHERE id_buku = (SELECT id_buku FROM sirkulasi WHERE id_sirkulasi = NEW.id_sirkulasi)), 1);
UPDATE data_buku SET jumlah = jumlah - 1 WHERE id_buku = (SELECT id_buku FROM sirkulasi WHERE id_sirkulasi = NEW.id_sirkulasi);
ELSEIF NEW.tanggal_kembali IS NOT NULL
THEN
INSERT INTO riwayat (tanggal, email_pelaku, kejadian, kd_buku, judul_buku, jumlah) VALUES (CURRENT_DATE(), (SELECT email FROM akun WHERE id_akun = OLD.id_peminjam), 'Pengembalian Buku', (SELECT kd_buku FROM data_buku WHERE id_buku = (SELECT id_buku FROM sirkulasi WHERE id_sirkulasi = NEW.id_sirkulasi)), (SELECT judul_buku FROM data_buku WHERE id_buku = (SELECT id_buku FROM sirkulasi WHERE id_sirkulasi = NEW.id_sirkulasi)), 1);
ELSE
INSERT INTO temp (apaaja) VALUES ('tess');
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `apaaja` text NOT NULL,
  `waktu` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temp`
--

INSERT INTO `temp` (`id`, `apaaja`, `waktu`) VALUES
(6, 'tess', '2022-06-21'),
(7, 'tess', '2022-06-21'),
(8, 'tess', '2022-06-21'),
(9, 'tess', '2022-06-21'),
(10, 'tess', '2022-06-21'),
(11, 'tess', '2022-06-21'),
(12, 'tess', '2022-06-21'),
(13, 'tess', '2022-06-21'),
(14, 'tess', '2022-06-21'),
(15, 'tess', '2022-06-21'),
(16, 'tess', '2022-06-21'),
(17, 'tess', '2022-06-21'),
(18, 'tess', '2022-06-21'),
(19, 'tess', '2022-06-21'),
(20, 'tess', '2022-06-21'),
(21, 'tess', '2022-06-21'),
(22, 'tess', '2022-06-21'),
(23, 'tess', '2022-06-21'),
(24, 'tess', '2022-06-21'),
(25, 'tess', '2022-06-21'),
(26, 'tess', '2022-06-21'),
(27, 'tess', '2022-06-21'),
(28, 'tess', '2022-06-21'),
(29, 'tess', '2022-06-21'),
(30, 'tess', '2022-06-21'),
(31, 'tess', '2022-06-21'),
(32, 'tess', '2022-06-21'),
(33, 'tess', '2022-06-21'),
(34, 'tess', '2022-06-21'),
(35, 'tess', '2022-06-21'),
(36, 'tess', '2022-06-21'),
(37, 'tess', '2022-06-21'),
(38, 'tess', '2022-06-21'),
(39, 'tess', '2022-06-21'),
(40, 'tess', '2022-06-21'),
(41, 'tess', '2022-06-21'),
(42, 'tess', '2022-06-21'),
(43, 'tess', '2022-06-21'),
(44, 'tess', '2022-06-21'),
(45, 'tess', '2022-06-21'),
(46, 'tess', '2022-06-21'),
(47, 'tess', '2022-06-21'),
(48, 'tess', '2022-06-21'),
(49, 'tess', '2022-06-21'),
(50, 'tess', '2022-06-21'),
(51, 'tess', '2022-06-21'),
(52, 'tess', '2022-06-21'),
(53, 'tess', '2022-06-21'),
(54, 'tess', '2022-06-21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indeks untuk tabel `sirkulasi`
--
ALTER TABLE `sirkulasi`
  ADD PRIMARY KEY (`id_sirkulasi`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sirkulasi`
--
ALTER TABLE `sirkulasi`
  MODIFY `id_sirkulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
