-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2019 pada 09.21
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_warna`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(15) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_supplier` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `harga`, `stok`, `gambar`, `id_supplier`) VALUES
(2, 'BJ001', 'Baju', 50000, -1, '1569942669_1823.jpg', 1),
(6, 'BJ003', 'Baju2', 200000, -1, '1570369590_7521.jpg', 1),
(10, 'BJ003', 'Baju koko', 330000, -4, '1570421167_7995.jpg', 3),
(11, 'BJ002', 'Baju Batik', 220000, 0, '1570421200_7725.jpg', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_barang`
--

CREATE TABLE `history_barang` (
  `id` int(15) NOT NULL,
  `id_item` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `stok` int(255) NOT NULL,
  `total_harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_barang`
--

INSERT INTO `history_barang` (`id`, `id_item`, `tanggal`, `stok`, `total_harga`) VALUES
(1, 0, '0000-00-00', 0, 0),
(2, 0, '2019-10-09', 2, 0),
(3, 0, '2019-10-10', 2, 0),
(7, 10, '2019-10-09', 2, 660000),
(9, 6, '2019-10-11', 3, 600000),
(10, 2, '2019-10-09', 3, 150000),
(11, 10, '2019-10-11', 5, 1650000),
(12, 10, '2019-10-10', 3, 990000),
(13, 10, '2019-10-23', 6, 1980000),
(14, 11, '2019-10-10', 2, 440000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(15) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat_supplier` varchar(255) NOT NULL,
  `kontak_supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat_supplier`, `kontak_supplier`) VALUES
(1, 'Maju Jaya', 'Surabaya, Indonesia', '081334678'),
(3, 'Mbah Kung', 'Malang, Sawojajar', '08176543212'),
(4, 'Pres.Co', 'Kediri', '089776554321'),
(5, 'Zaki', 'Malang', '0817654321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `image`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '1568698089_4711.jpg'),
(2, 'pegawai', 'pegawai', 'pegawai', 'pegawai', '1568002460_4183.jpg'),
(9, 'yusron', 'yusron', 'yusron', 'admin', '1569307896_4760.jpg'),
(11, 'helmi', 'helmi', 'helmi', 'admin', '1570420636_9146.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `history_barang`
--
ALTER TABLE `history_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `history_barang`
--
ALTER TABLE `history_barang`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
