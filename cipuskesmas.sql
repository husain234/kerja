-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2021 pada 04.33
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cipuskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `norm` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `rak` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`norm`, `nama`, `jk`, `ttl`, `alamat`, `rak`, `status`) VALUES
('001', 'Petruk', 'L', '2020-07-27', 'Ajung', '', 'Dipinjam'),
('002', 'Hasna', 'P', '2020-07-26', 'Patrang', '', ''),
('003', 'Mujib', 'L', '2020-07-26', 'Penangan', '', ''),
('401', 'testing', 'L', '2020-10-28', 'jember', 'C', 'Dipinjam'),
('501', 'tesss', 'P', '2020-10-12', 'lampung', '', 'Dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `telat` varchar(2) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_transaksi`, `tgl_pengembalian`, `telat`, `id_petugas`) VALUES
('20200802001', '2020-08-02', 'N', 8),
('20200802002', '2020-08-02', 'N', 8),
('20200802003', '2020-08-02', 'N', 8),
('20200802004', '2020-08-02', 'N', 8),
('20200802004', '2020-08-02', 'N', 8),
('20200802004', '2020-08-02', 'N', 8),
('20200802004', '2020-08-02', 'N', 8),
('20200802005', '2020-08-02', 'N', 8),
('20200802006', '2020-08-02', 'N', 8),
('20200802007', '2020-08-02', 'Y', 8),
('20200802008', '2020-08-02', 'Y', 8),
('20200802008', '2020-08-02', 'Y', 8),
('20200802008', '2020-08-02', 'Y', 8),
('20200802008', '2020-08-02', 'Y', 8),
('20200802008', '2020-08-02', 'Y', 8),
('20200802009', '2020-08-02', 'N', 8),
('20200802010', '2020-08-02', 'Y', 8),
('20200802011', '2020-08-02', 'Y', 8),
('20200802012', '2020-08-02', 'Y', 8),
('20200802013', '2020-08-02', 'Y', 8),
('20200802013', '2020-08-02', 'Y', 8),
('20200802013', '2020-08-02', 'Y', 8),
('20200914014', '2020-09-14', 'N', 8),
('20201031015', '2020-10-31', 'N', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `full_name`, `password`, `role`) VALUES
(8, 'admin', 'Admin Perpus', '$2y$05$0RfFGKdD.I9/9SRZd9../.kIQg7pwgDxhICT0t1aPZh29Ia2oRA3u', 'admin'),
(9, 'abc', 'Fendy', '$2y$05$mdep.SuT1FcurTIkLRdWFOIm7hR.48lB3lm41arhaUBDH180KTBVy', 'petugas'),
(10, 'hasna', 'hasna febrilya', '$2y$05$myXoWHg3CZNtEn/2e5YLR.XYjmqW6S/BzL6AMvPyD33P40iDmew5e', 'kepala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_unit` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_unit`, `nama`, `unit`) VALUES
(1, 'Fendy', 'Poli THT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp`
--

CREATE TABLE `tmp` (
  `norm` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `id_unit` varchar(10) DEFAULT NULL,
  `norm` varchar(5) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_unit`, `norm`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `id_petugas`) VALUES
('20200802001', '1', '003', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802002', '1', '002', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802003', '1', '001', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802004', '1', '001', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802005', '1', '001', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802006', '1', '001', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802007', '1', '002', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802008', '1', '002', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802009', '1', '001', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802010', '1', '003', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802011', '1', '001', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802012', '1', '001', '2020-08-02', '2020-08-09', 'Y', 8),
('20200802013', '1', '001', '2020-08-02', '2020-08-09', 'Y', 8),
('20200914014', '1', '001', '2020-09-14', '2020-09-21', 'Y', 8),
('20201031015', '1', '501', '2020-10-31', '2020-11-07', 'Y', 8),
('20201101016', '1', '401', '2020-11-01', '2020-11-08', 'N', 8),
('20210121017', '1', '001', '2021-01-21', '2021-01-28', 'N', 8),
('20210121018', '1', '001', '2021-01-21', '2021-01-28', 'N', 8),
('20210121019', '1', '001', '2021-01-21', '2021-01-28', 'N', 8);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`norm`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
