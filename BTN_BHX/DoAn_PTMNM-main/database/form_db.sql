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
-- Database: `form_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangky`
--

CREATE TABLE `dangky` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `phone` int(11) NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dangky`
--

INSERT INTO `dangky` (`id`, `fullname`, `username`, `email`, `phone`, `password`, `gender`) VALUES
(1, 'congloi', 'congloi2002', 'congloi3114@gmail.com', 123456789, 'Congloi@2002', 'male'),
(2, 'congloi', 'congloi2002', 'congloi3114@gmail.com', 123456789, 'Congloi@2002', 'male'),
(3, 'congloi', 'congloi2002', 'congloi3114@gmail.com', 123456789, '$2y$10$MBy3Wh6yuSbApqpr8mI/oO3I42733w7boFuHchLgueQq0Mzy9A.Gq', 'male'),
(4, 'congloi', 'congloi2002', 'congloi3114@gmail.com', 123456789, '$2y$10$4zATpN9UI6vGCZvKzZUxuOlEqDy8X4FfsdCi0cBuACk6ZWSzVAV7K', 'male'),
(5, 'congloi', 'congloi123', 'congloi1112@gmail.com', 123456789, '$2y$10$ClBRpw6ucNJH38UMls6EEeVmY/6qiwPy/eQBMQnxW7U9tL7zuD1rS', 'female'),
(6, 'congloi', 'ádasdsadas', 'congloi123@gmail.com', 123456789, '$2y$10$4fUQ2V/w3UTmVChko0/rJ.OcOK5NAh/ttzFRMP4RaXtXSfAaUIJH.', 'male'),
(7, 'congloi', 'acb', 'congloi1112@gmail.com', 123456789, '$2y$10$TYwU3c44nCl9iRcGokIrqu9YByvzkm3w5XHOR0Ngvx7qsdcnby4Cq', 'male'),
(8, 'congloi', 'acb', 'congloi1112@gmail.com', 123456789, '$2y$10$CEDHtKJeh0ULM0MvSLWvle0zHwcoGVNfQknDEBtA.Ojv0q0K7K.Oa', 'male'),
(9, 'congloi', 'acb', 'congloi1112@gmail.com', 123456789, '$2y$10$MJkMg9hiOLlu6QbkIF4seOduHjLX2f9iUBglhihUSuWtstm5ikWAq', 'male'),
(10, 'congloi', 'acb', 'congloi1112@gmail.com', 123456789, '$2y$10$dp/27mf8qR/URfzzoQxqdOWzp/GeGF/Xp6jXO.MxORknSun2ELpxa', 'male'),
(11, 'congloi', 'acb', 'congloi1112@gmail.com', 123456789, '$2y$10$B0axLzki0z8p6UKev/p4meDkZ/57lt45eyZA4QWSVyqkd9jpZxsqa', 'male'),
(12, 'congloi', 'acb', 'congloi1112@gmail.com', 123456789, '$2y$10$4laoWWOACR.z6u89dR4OGuLbjyawzVssry34M6DamS.4nr7XOFRmO', 'male'),
(13, 'congloi', 'acb', 'congloi1112@gmail.com', 123456789, '$2y$10$mdcKqQ7Zoai1MKo6ijZhbOxyKMW3iYuJBfadQksWPEwQpVk1AoEhK', 'male'),
(14, 'congloi', 'acb', 'congloi1112@gmail.com', 123456789, '$2y$10$Nf8qB5SpNQljrk5F4fyvO.M2P7i4m80Oacu9/EX8ydOj3YxphSnZG', 'male'),
(15, 'congloi', 'acb', 'congloi1112@gmail.com', 123456789, '$2y$10$EvZ1wg7gl/EsEUjvH79CWu6KxmCW34HlomVH6ebwYSFlL9TkLQHYi', 'male'),
(16, 'congloi', 'acb', 'congloi123456@gmail.com', 123456789, '$2y$10$NqysBuZVEyoCp5yk1VVYDODACog2GaQuSUXhlChRbHmB3Cy4SioDG', 'male'),
(17, 'congloi', 'acb', 'congloi1234563@gmail.com', 123456789, '$2y$10$QqFgQ7Cp10GqW4oewNVSo.4f5Eh3ZKUwtsTRq8eSOKjtDRLIwNzYm', 'male'),
(18, 'congloi', '62133105', 'congloi3214@gmail.com', 123456789, '$2y$10$W5byycqxzx3Raht3T/kENeeYzTrCU28D7gDmGsdrclH4uWG0Oafzq', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dangky`
--
ALTER TABLE `dangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
