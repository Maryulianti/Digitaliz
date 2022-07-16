-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2022 pada 15.26
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitaliz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `Project_Name` varchar(255) NOT NULL,
  `Client` varchar(255) NOT NULL,
  `Project_Leader` varchar(255) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Progress` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`id`, `Project_Name`, `Client`, `Project_Leader`, `Start_Date`, `End_Date`, `Progress`, `Foto`) VALUES
(5, 'Aplikasi Mobile Bangking BRI', 'BRI', 'Muhammad Afdal', '2018-07-19', '2019-01-06', '100%', '2.jpg'),
(8, 'Aplikasi Donor Darah Berbasis Android', 'RS Wahidin', 'Maryulianti', '2019-10-20', '2020-10-13', '100%', '5.jpg'),
(9, 'Aplikasi Dokter Gigi', 'Halodoc', 'Yuniar', '2019-02-08', '2020-02-16', '60%', '6.jpg'),
(10, 'Pencarian Rumah Makan Berbasis Android', 'Rezpecto Resto', 'M. Yadi Nugraha', '2019-09-20', '2022-05-20', '70%', '7.jpg'),
(11, 'Aplikasi Pemesanan Tiket Bioskop', 'XXI', 'A. Al Migdad', '2018-11-27', '2021-07-19', '78%', '8.jpg'),
(12, 'Aplikasi Pengenalan Tanaman Obat Keluarga Berbasis Android', 'RS Digitaliz', 'Andi Tenri Wulan', '2020-12-20', '2021-10-19', '56%', '9.jpg'),
(13, 'Aplikasi E-Learning', 'PNUP', 'Nurul Syafika', '2019-06-27', '2021-07-19', '70%', '10.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
