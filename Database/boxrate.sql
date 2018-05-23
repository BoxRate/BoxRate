-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 10:00 AM
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
('andik', 'andika pratama', '827ccb0eea8a706c4c34a16891f84e7b', 'andikbbl@gmail.com'),
('andika', 'andika pratama', '7e51eea5fa101ed4dade9ad3a7a072bb', 'andikalfahri@gmail.com'),
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
  `rating` int(3) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `image`, `price`, `name`, `ket`, `description`, `rating`, `store_id`) VALUES
(30, '53e724d8e7.jpg', 15000, 'Nasi uduk', 'makanan', 'Nasi Uduk dengan ayam dan nasi yang dimasak dengan bumbu khusus dari aceh', 60, 2),
(32, 'b81206e87f.jpg', 10000, 'aneka', 'minuman', 'Campura dari berbagia buah yang menciptakan rasa yang unik', 70, 2),
(33, '9052e899e1.jpg', 10000, 'Nasi Bebek', 'makanan', 'Nasi bebek khas jawa dengan bebek betina yang menjadi dagimg utama', 93, 2),
(40, '8036ec9ca6.jpg', 20000, 'Tumpeng', 'makanan', 'Tumpeng yang dibuat khusus dengan harga terjangkau', 76, 2),
(41, '1a6bb35d60.jpg', 10000, 'jus mangga', 'minuman', 'jus yang terbuat dari mangga yang segar dipetik langsung dari kebun', 79, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_menu` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_menu`, `id_store`, `jumlah`) VALUES
(30, 2, 5),
(32, 2, 16),
(33, 2, 5),
(40, 2, 7),
(41, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(200) NOT NULL,
  `owner` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `owner`) VALUES
(2, 'longtime', 'andika'),
(3, 'Solong', 'andik');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_storefk` (`store_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD KEY `id_menufk` (`id_menu`),
  ADD KEY `store_idfk` (`id_store`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `owner-fg` (`owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `id_storefk` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `id_menufk` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `store_idfk` FOREIGN KEY (`id_store`) REFERENCES `store` (`store_id`);

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `owner-fg` FOREIGN KEY (`owner`) REFERENCES `akun` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
