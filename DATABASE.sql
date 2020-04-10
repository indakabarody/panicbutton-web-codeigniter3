-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2020 pada 14.32
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13187195_db_panicbutton`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(50) NOT NULL,
  `kataSandi` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idAdmin`, `kataSandi`) VALUES
('admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alarm`
--

CREATE TABLE `alarm` (
  `idAlarm` varchar(255) NOT NULL,
  `idUser` varchar(255) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `statusTombol` varchar(8) DEFAULT NULL,
  `statusAlarm` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alarm`
--

INSERT INTO `alarm` (`idAlarm`, `idUser`, `jenis`, `latitude`, `longitude`, `waktu`, `statusTombol`, `statusAlarm`) VALUES
('20200317174918', 'indakabarody', 'Kecelakaan', '-7.5870101', '111.4388389', '2020-03-17 17:49:18', 'Aktif', 'Belum Dikonfirmasi'),
('20200331182753', 'indakabarody', 'Kecelakaan', '-7.58682721', '111.43871152', '2020-03-31 18:27:53', 'Aktif', 'Ditolak'),
('20200331183132', 'indakabarody', 'Kecelakaan', '-7.58682721', '111.43871152', '2020-03-31 18:31:32', 'Aktif', 'Ditolak'),
('20200331183217', 'indakabarody', 'Kecelakaan', '-7.58682721', '111.43871152', '2020-03-31 18:32:17', 'Aktif', 'Dikonfirmasi'),
('20200331184800', 'indakabarody', 'Kecelakaan', '-7.58682721', '111.43871152', '2020-03-31 18:48:00', 'Aktif', 'Ditolak'),
('20200331185427', 'indakabarody', 'Kecelakaan', '-7.58682721', '111.43871152', '2020-03-31 18:54:27', 'Aktif', 'Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nomortelegram`
--

CREATE TABLE `nomortelegram` (
  `idnomorTelegram` int(10) UNSIGNED NOT NULL,
  `nomorTelegram` varchar(15) DEFAULT NULL,
  `namaPemilik` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nomortelegram`
--

INSERT INTO `nomortelegram` (`idnomorTelegram`, `nomorTelegram`, `namaPemilik`) VALUES
(2, '0001212', 'Indaka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesankhusus`
--

CREATE TABLE `pesankhusus` (
  `idPesanKhusus` int(10) UNSIGNED NOT NULL,
  `idAlarm` varchar(15) DEFAULT NULL,
  `idUser` varchar(255) DEFAULT NULL,
  `pesan` varchar(512) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `statusPesan` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesankhusus`
--

INSERT INTO `pesankhusus` (`idPesanKhusus`, `idAlarm`, `idUser`, `pesan`, `waktu`, `statusPesan`) VALUES
(3, '20200331183132', 'indakabarody', 'help!', '2020-03-31 18:31:37', 'Read'),
(4, '20200331183217', 'indakabarody', 'tolong!!', '2020-03-31 18:32:23', 'Read');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` varchar(255) NOT NULL,
  `namaUser` varchar(50) DEFAULT NULL,
  `noHP` varchar(15) DEFAULT NULL,
  `kataSandi` varchar(32) DEFAULT NULL,
  `statusUser` varchar(15) DEFAULT NULL,
  `statusLogin` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `namaUser`, `noHP`, `kataSandi`, `statusUser`, `statusLogin`) VALUES
('indakabarody', 'Indaka Barody', '085330079024', '81dc9bdb52d04dc20036dbd8313ed055', 'Aktif', 'Logged In');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indeks untuk tabel `alarm`
--
ALTER TABLE `alarm`
  ADD PRIMARY KEY (`idAlarm`),
  ADD KEY `idUser` (`idUser`);

--
-- Indeks untuk tabel `nomortelegram`
--
ALTER TABLE `nomortelegram`
  ADD PRIMARY KEY (`idnomorTelegram`);

--
-- Indeks untuk tabel `pesankhusus`
--
ALTER TABLE `pesankhusus`
  ADD PRIMARY KEY (`idPesanKhusus`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idAlarm` (`idAlarm`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nomortelegram`
--
ALTER TABLE `nomortelegram`
  MODIFY `idnomorTelegram` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pesankhusus`
--
ALTER TABLE `pesankhusus`
  MODIFY `idPesanKhusus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alarm`
--
ALTER TABLE `alarm`
  ADD CONSTRAINT `alarm_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesankhusus`
--
ALTER TABLE `pesankhusus`
  ADD CONSTRAINT `pesankhusus_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pesankhusus_ibfk_2` FOREIGN KEY (`idAlarm`) REFERENCES `alarm` (`idAlarm`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
