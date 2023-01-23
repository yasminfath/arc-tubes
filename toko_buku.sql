-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2023 pada 08.18
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
-- Database: `toko_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` enum('customer','seller') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `email`, `password`, `role`) VALUES
(1, 'seller@gmail.com', 'seller123', 'seller'),
(2, 'customer@gmail.com', 'customer', 'customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `id_buku` int(11) NOT NULL,
  `kd_buku` varchar(15) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `kategori_buku` varchar(30) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `penerbit_buku` varchar(50) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`id_buku`, `kd_buku`, `judul_buku`, `kategori_buku`, `penulis_buku`, `penerbit_buku`, `tahun_terbit`, `jumlah`) VALUES
(1, 'B01', 'Empat Sehat Lima Sempurna', 'rainbow', 'Mizann', 'Penerbit100', '2023', 18),
(7, 'B04', 'Ngoding Yuk', 'code', 'Amida', 'Penerbit4', '2010', 23),
(9, 'B09', 'Cara install OS', 'windows', 'Penerbit10', 'Penerbit10', '2020', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `keranjang` enum('ya','tidak') NOT NULL DEFAULT 'ya',
  `tanggal_beli` date DEFAULT current_timestamp(),
  `tanggal_konfirmasi_beli` date DEFAULT NULL,
  `tanggal_dikirim` date DEFAULT NULL,
  `estimasi_sampai` date DEFAULT NULL,
  `tanggal_sampai` date DEFAULT NULL,
  `konfirmasi_sampai` enum('','belum terkonfirmasi','sudah terkonfirmasi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `id_buku`, `id_pembeli`, `keranjang`, `tanggal_beli`, `tanggal_konfirmasi_beli`, `tanggal_dikirim`, `estimasi_sampai`, `tanggal_sampai`, `konfirmasi_sampai`) VALUES
(52, 1, 2, 'ya', '2023-01-09', '2023-01-14', '2023-01-14', '2023-01-19', '2023-01-15', NULL),
(64, 7, 2, 'ya', '2023-01-15', '2023-01-15', '2023-01-15', '2023-01-20', '2023-01-15', NULL),
(66, 7, 2, 'ya', '2023-01-15', '2023-01-15', '2023-01-15', '2023-01-20', '2023-01-15', NULL),
(67, 9, 2, 'ya', '2023-01-15', '2023-01-16', '2023-01-23', '2023-01-28', NULL, NULL),
(69, 1, 2, 'ya', '2023-01-16', '2023-01-23', '2023-01-23', '2023-01-28', '2023-01-23', NULL),
(70, 9, 2, 'ya', '2023-01-23', '2023-01-23', '2023-01-23', '2023-01-28', '2023-01-23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
