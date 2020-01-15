-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 05:11 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detection`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `userid`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `imgLink` varchar(200) NOT NULL,
  `localUrl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `label`, `imgLink`, `localUrl`) VALUES
(2, 'deen Park', 'http://media.pixlab.xyz/7472p5d65d231c5bb5.jpg', 'tempFile/deen_Park.jpg'),
(3, 'rtghy', 'http://media.pixlab.xyz/7472p5d66c7b471dd4.jpg', 'tempFile/rtghy.jpg'),
(6, 'Jerry Amilo', 'http://media.pixlab.xyz/7472p5d69199d35b05.jpg', 'tempFile/Jerry_Amilo.jpg'),
(7, 'Harrys Olik', 'http://media.pixlab.xyz/7472p5d691a60c7c8e.jpg', 'tempFile/Harrys_Olik.jpg'),
(8, '', 'http://media.pixlab.xyz/7472p5d691db22ccb4.jpg', 'tempFile/.jpg'),
(9, '', 'http://media.pixlab.xyz/7472p5d691db65124a.jpg', 'tempFile/.jpg'),
(10, '', 'http://media.pixlab.xyz/7472p5d691e07931b0.jpg', 'tempFile/.jpg'),
(11, '', 'http://media.pixlab.xyz/7472p5d691e0913601.jpg', 'tempFile/.jpg'),
(12, '', 'http://media.pixlab.xyz/7472p5d691e60a6086.jpg', 'tempFile/.jpg'),
(13, '', 'http://media.pixlab.xyz/7472p5d691eae47029.jpg', 'tempFile/.jpg'),
(14, '', 'http://media.pixlab.xyz/7472p5d69203e89f50.jpg', 'tempFile/.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
