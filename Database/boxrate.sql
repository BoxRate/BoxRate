-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 02:54 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boxrate`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `name`, `password`, `email`, `alamat`, `no_hp`) VALUES
('h1', 'name', '33112ee14ee469c3eb52fe90322ec81dd404a0093d565a6d71ce77cbc8124e3b', 'h1@gamul.com', 'h1', '081231313131'),
('h2', '', 'f998fe06afa0cfbe73e0449dc2b1698309e1b5714960f027b2858312b152c275', 'h2@gmail.com', 'h2', '081234563456'),
('h3', '', '97fb5f8538b89f6c1accfd19836b65a73b61fbc2e0cbf84bb858a0fffa3f1592', 'h3@gmail.com', 'h3', '081343214312');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `name` text NOT NULL,
  `ket` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `image`, `price`, `name`, `ket`, `description`) VALUES
(30, '53e724d8e7.jpg', 15000, 'Nasi uduk', 'makanan', 'pake Ayam'),
(32, 'b81206e87f.jpg', 10000, 'aneka', 'minuman', ''),
(33, '9052e899e1.jpg', 10000, 'Nasi Bebek', 'makanan', ''),
(36, 'c201179c12.jpg', 100000, 'Tumpeng', 'makanan', ''),
(40, '8036ec9ca6.jpg', 20000, 'Tumpeng', 'makanan', 'gk pake ayam\r\n'),
(41, '1a6bb35d60.jpg', 10000, 'jus mangga', 'minuman', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email_1` (`email`),
  ADD UNIQUE KEY `email_nomor_hp` (`no_hp`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
