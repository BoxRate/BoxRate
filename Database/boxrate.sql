-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 04:28 PM
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
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `name`, `password`, `email`) VALUES
('Andika', '', '7e51eea5fa101ed4dade9ad3a7a072bb', 'apratama@gmail.com'),
('Andika2', 'Andika Pratama', '7e51eea5fa101ed4dade9ad3a7a072bb', 'a@mail.com'),
('andika7', 'andika pratama', '7e51eea5fa101ed4dade9ad3a7a072bb', 'apratama9@gmail.com'),
('siti', 'siti alifah', 'db04eb4b07e0aaf8d1d477ae342bdff9', 'siti@gmail.com');

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
  `description` varchar(200) NOT NULL,
  `rating` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `image`, `price`, `name`, `ket`, `description`, `rating`) VALUES
(30, '53e724d8e7.jpg', 15000, 'Nasi uduk', 'makanan', 'pake Ayam', 60),
(32, 'b81206e87f.jpg', 10000, 'aneka', 'minuman', '', 70),
(33, '9052e899e1.jpg', 10000, 'Nasi Bebek', 'makanan', '', 93),
(40, '8036ec9ca6.jpg', 20000, 'Tumpeng', 'makanan', 'gk pake ayam\r\n', 76),
(41, '1a6bb35d60.jpg', 10000, 'jus mangga', 'minuman', '', 79);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email_1` (`email`);

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
