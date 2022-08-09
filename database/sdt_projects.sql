-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 08:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'yayanfr20', '$2y$10$YUNyQKpsZ3suVDhii8iM5e4Q1ViS8G7zNlxRzaUwm217IHg8pNP.a'),
(2, 'imron01', '$2y$10$ICHg4COFDM8mz/15Odp/UugYYM1C2yUaQdOU.P2TmizNdoETSSrLS'),
(3, 'yanz', '$2y$10$Hs7bnsFNKKFtuA73l8Spl.l1ifeLOrDQqMa.9HXzCT2L/9lRe19ei');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'template'),
(2, 'php'),
(3, 'javascript');

-- --------------------------------------------------------

--
-- Table structure for table `multi_user`
--

CREATE TABLE `multi_user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multi_user`
--

INSERT INTO `multi_user` (`id`, `username`, `password`, `level`, `img`) VALUES
(1, 'yayanfr20', '$2y$10$YUNyQKpsZ3suVDhii8iM5e4Q1ViS8G7zNlxRzaUwm217IHg8pNP.a', 'admin', '62f296c65c3af.png'),
(2, 'imron01', '$2y$10$ICHg4COFDM8mz/15Odp/UugYYM1C2yUaQdOU.P2TmizNdoETSSrLS', 'user', '62f296c65c3af.png'),
(3, 'yanz', '$2y$10$Hs7bnsFNKKFtuA73l8Spl.l1ifeLOrDQqMa.9HXzCT2L/9lRe19ei', 'user', '62f296c65c3af.png');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `author`, `title`, `date`) VALUES
(1, 'yanz', 'Web olshop PHP native ', 'August 9, 2022, 11:43 pm'),
(2, 'yanz', 'testing', 'August 10, 2022, 12:38 am');

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
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
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id`, `title`, `demo`, `source`, `images`, `deskripsi`, `author`, `date`, `kategori`) VALUES
(6, 'Web olshop PHP native ', 'http://yanzshop.rf.gd', 'https://github.com/Yayanfr20/web-olshop-php-mysqli', '62f28f068dcbb.png', 'web olshop dibuat menggunakan php native, mysqli, dan bootstrap.', 'yanz', 'August 9, 2022, 11:43 pm', 'php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_user`
--
ALTER TABLE `multi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `multi_user`
--
ALTER TABLE `multi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
