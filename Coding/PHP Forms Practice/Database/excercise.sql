-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 11:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excercise`
--

-- --------------------------------------------------------

--
-- Table structure for table `form1`
--

CREATE TABLE `form1` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `game` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `age` int(20) NOT NULL,
  `file` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form1`
--

INSERT INTO `form1` (`id`, `name`, `password`, `address`, `game`, `gender`, `age`, `file`) VALUES
(52, 'Mayur vasudev purushvani', '21ad88bcdfc17d836d476d346945f1', 'rajkot', 'cricket', 'male', 20, '877910-free-wallpaper-laptops-1920x1080-for-iphone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `form2`
--

CREATE TABLE `form2` (
  `id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `games` varchar(150) NOT NULL,
  `marital` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form2`
--

INSERT INTO `form2` (`id`, `fname`, `password`, `gender`, `address`, `dob`, `games`, `marital`) VALUES
(27, 'Mayur', '21ad88bcdfc17d836d476d346945f1', 'male', 'rajkot', '1999-05-13', 'cricket', 'unmarried');

-- --------------------------------------------------------

--
-- Table structure for table `form3`
--

CREATE TABLE `form3` (
  `id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form3`
--

INSERT INTO `form3` (`id`, `fname`, `lname`, `dob`, `gender`, `country`, `email`, `phone`, `password`) VALUES
(43, 'Mayur', 'purushvani', '1999-5-13', 'male', 'India', 'mayurpurushvani@gmail.com', 8320639653, '21ad88bcdfc17d836d476d346945f1');

-- --------------------------------------------------------

--
-- Table structure for table `form4`
--

CREATE TABLE `form4` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form4`
--

INSERT INTO `form4` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Mayur vasudev purushvani', 'mayurpurushvani@gmail.com', 'For Delivery', 'I don\'t receive my parcel yet!');

-- --------------------------------------------------------

--
-- Table structure for table `form5`
--

CREATE TABLE `form5` (
  `id` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form5`
--

INSERT INTO `form5` (`id`, `email`, `password`) VALUES
(3, 'mayur@gmail.com', 'Mayur@652'),
(4, 'rakshit@gmail.com', 'rakshit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form1`
--
ALTER TABLE `form1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form2`
--
ALTER TABLE `form2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form3`
--
ALTER TABLE `form3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form4`
--
ALTER TABLE `form4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form5`
--
ALTER TABLE `form5`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form1`
--
ALTER TABLE `form1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `form2`
--
ALTER TABLE `form2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `form3`
--
ALTER TABLE `form3`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `form4`
--
ALTER TABLE `form4`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form5`
--
ALTER TABLE `form5`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
