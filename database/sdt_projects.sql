-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Agu 2022 pada 03.48
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdt_projects`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'yayanfr20', '$2y$10$YUNyQKpsZ3suVDhii8iM5e4Q1ViS8G7zNlxRzaUwm217IHg8pNP.a'),
(2, 'imron01', '$2y$10$ICHg4COFDM8mz/15Odp/UugYYM1C2yUaQdOU.P2TmizNdoETSSrLS'),
(3, 'yanz', '$2y$10$Hs7bnsFNKKFtuA73l8Spl.l1ifeLOrDQqMa.9HXzCT2L/9lRe19ei'),
(6, 'testing', '$2y$10$Avqjs9Oj5WYZK6iVklx2F.dAkL0UHVzZ9lFPz3HxGDuLfHLCVRCO.'),
(7, 'riki', '$2y$10$vkdA6lPPjcdiand9qy8T3uvXItm2tHp3PfSaXQIoSSokrWR7hNOme'),
(8, 'riki', '$2y$10$IIOD.Th3JpFmnoIkMnvHneaVqB8WD1gUX0VuWWlvgCl2I2UiOUQXa'),
(9, 'fian', '$2y$10$XL4ZltT7GBogbI4W3Bl0..6RauBzgu07CfS.goIRYkUPyfPEqqcKG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'template'),
(2, 'php'),
(3, 'javascript');

-- --------------------------------------------------------

--
-- Struktur dari tabel `multi_user`
--

CREATE TABLE `multi_user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `multi_user`
--

INSERT INTO `multi_user` (`id`, `username`, `password`, `level`, `img`) VALUES
(1, 'yayanfr20', '$2y$10$YUNyQKpsZ3suVDhii8iM5e4Q1ViS8G7zNlxRzaUwm217IHg8pNP.a', 'admin', '62f296c65c3af.png'),
(2, 'imron01', '$2y$10$ICHg4COFDM8mz/15Odp/UugYYM1C2yUaQdOU.P2TmizNdoETSSrLS', 'user', '62f3d638294c5.jpg'),
(3, 'yanz', '$2y$10$Hs7bnsFNKKFtuA73l8Spl.l1ifeLOrDQqMa.9HXzCT2L/9lRe19ei', 'user', '62f3f8ec9c954.png'),
(12, 'riki', '$2y$10$IIOD.Th3JpFmnoIkMnvHneaVqB8WD1gUX0VuWWlvgCl2I2UiOUQXa', 'user', 'avatar.jpg'),
(13, 'fian', '$2y$10$XL4ZltT7GBogbI4W3Bl0..6RauBzgu07CfS.goIRYkUPyfPEqqcKG', 'admin', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notif`
--

INSERT INTO `notif` (`id`, `author`, `title`, `date`) VALUES
(1, 'yanz', 'Web olshop PHP native ', 'August 9, 2022, 11:43 pm'),
(2, 'yanz', 'testing', 'August 10, 2022, 12:38 am'),
(3, 'yanz', 'testing', 'August 11, 2022, 2:01 am'),
(4, 'imron01', 'Shshsh', 'August 11, 2022, 10:13 am'),
(5, 'imron01', 'Shshsh', 'August 11, 2022, 10:13 am'),
(6, 'imron01', 'Shshsh', 'August 11, 2022, 10:13 am'),
(7, 'imron01', 'Test', 'August 11, 2022, 10:19 am');

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
--

CREATE TABLE `postingan` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `demo` varchar(300) NOT NULL,
  `source` varchar(300) NOT NULL,
  `images` varchar(300) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `author` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`id`, `title`, `demo`, `source`, `images`, `deskripsi`, `author`, `date`, `kategori`) VALUES
(6, 'Web olshop PHP native ', 'http://yanzshop.rf.gd', 'https://github.com/Yayanfr20/web-olshop-php-mysqli', '62f28f068dcbb.png', 'web olshop dibuat menggunakan php native, mysqli, dan bootstrap.', 'yanz', 'August 9, 2022, 11:43 pm', 'php');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nophone` varchar(16) NOT NULL,
  `old` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `name`, `address`, `email`, `nophone`, `old`) VALUES
(3, 'riki', '...', '...', '...', '...'),
(4, 'yanz', 'Pandeglang banten', 'yayanfathurohman20@gmail.com', '083873614764', '17'),
(5, 'imron01', '....', '....', '...', '...');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `multi_user`
--
ALTER TABLE `multi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `multi_user`
--
ALTER TABLE `multi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
