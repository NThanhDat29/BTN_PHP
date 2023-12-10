-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 06:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanly_ban_sua`
--

-- --------------------------------------------------------

--
-- Table structure for table `sua`
--

CREATE TABLE `sua` (
  `MaSua` int(11) NOT NULL,
  `TenSua` text NOT NULL,
  `HangSua` text NOT NULL,
  `LoaiSua` text NOT NULL,
  `TrongLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `ThanhPhan` text NOT NULL,
  `LoiIch` text NOT NULL,
  `Hinh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sua`
--

INSERT INTO `sua` (`MaSua`, `TenSua`, `HangSua`, `LoaiSua`, `TrongLuong`, `DonGia`, `ThanhPhan`, `LoiIch`, `Hinh`) VALUES
(1, 'Sua Chua 4', 'Dumex', 'Sua Chua', 250, 10, 'Thanh phan A', 'Loi ich A', 'dumex_1.jpg'),
(2, 'Sua Bot 4', 'Mead Johnson', 'Sua bot', 350, 15, 'Thanh phan B', 'Loi ich B', 'mead_2.jpg'),
(3, 'Sua Tuoi 4', 'Vinamilk', 'Sua Tuoi', 450, 20, 'Thanh phan C', 'Loi ich C', 'vinamilk_2.webp'),
(4, 'Sua Dac 1', 'Vinamilk', 'Sua dac', 200, 8, 'Thanh phan D1', 'Loi ich D1', 'vinamilk_1.jpg'),
(5, 'Sua Dac 2', 'Nutifood', 'Sua dac', 250, 9, 'Thanh phan D2', 'Loi ich D2', 'nutifood_1.png'),
(6, 'Sua Tuoi 1', 'Abbott', 'Sua tuoi', 180, 7, 'Thanh phan T1', 'Loi ich T1', 'abbott_1.png'),
(7, 'Sua Tuoi 2', 'Daisy', 'Sua tuoi', 220, 9, 'Thanh phan T2', 'Loi ich T2', 'daisy_1.jpg'),
(8, 'Sua Chua 1', 'Dutch Lady', 'Sua chua', 150, 6, 'Thanh phan C1', 'Loi ich C1', 'dutch_1.png'),
(9, 'Sua Chua 2', 'Dumex', 'Sua chua', 180, 7, 'Thanh phan C2', 'Loi ich C2', 'dumex_2.jpg'),
(10, 'Sua Bot 1', 'Mead Johnson', 'Sua bot', 250, 10, 'Thanh phan B1', 'Loi ich B1', 'mead_1.jpg'),
(11, 'Sua Bot 2', 'Confrantlait', 'Sua bot', 220, 9, 'Thanh phan B2', 'Loi ich B2', 'confrantlpre_1.jpg'),
(12, 'Sua Dac 3', 'Vinamilk', 'Sua dac', 230, 9, 'Thanh phan D3', 'Loi ich D3', 'vinamilk_3.jpg'),
(13, 'Sua Tuoi 3', 'Mead Johnson', 'Sua tuoi', 200, 8, 'Thanh phan T3', 'Loi ich T3', 'mead_3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sua`
--
ALTER TABLE `sua`
  ADD PRIMARY KEY (`MaSua`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sua`
--
ALTER TABLE `sua`
  MODIFY `MaSua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
