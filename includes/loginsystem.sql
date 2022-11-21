-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2022 at 04:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '5c428d8875d2948607f3e3fe134d71b4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `contactno`, `posting_date`) VALUES
(17, 'test1', 'test1', 'test1@test.co', '2c9341ca4cf3d87b9e4eb905d6a3ec45', '1234321123', '2022-11-20 16:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `workid` int(11) NOT NULL,
  `workdate` date DEFAULT NULL,
  `worktimestart` time DEFAULT NULL,
  `appointmentfree` tinyint(1) NOT NULL DEFAULT 1,
  `workinghour` int(11) NOT NULL DEFAULT 1,
  `description` varchar(500) DEFAULT NULL,
  `payed` tinyint(1) NOT NULL DEFAULT 0,
  `studentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`workid`, `workdate`, `worktimestart`, `appointmentfree`, `workinghour`, `description`, `payed`, `studentid`) VALUES
(1, '2022-11-14', '10:00:00', 1, 1, 'My first training!', 0, NULL),
(2, '2022-11-15', '13:00:00', 1, 1, 'I teach new tips and tricks that day.', 0, NULL),
(3, '2022-11-16', '16:00:00', 1, 1, 'Broda', 0, NULL),
(5, '2022-11-17', '14:00:00', 0, 1, 'I am busy.', 0, NULL),
(6, '2022-11-21', '10:00:00', 0, 1, 'I let free today', 0, 15),
(7, '2022-12-31', '13:00:00', 0, 1, 'I am free today for only one hour!', 1, 14),
(8, '2022-11-20', '13:00:00', 1, 1, NULL, 1, NULL),
(9, '2022-11-19', '16:00:00', 1, 1, '', 0, 15),
(11, '2022-11-24', '19:16:00', 0, 1, 'First insert test from new from', 0, NULL),
(12, '2022-11-25', '10:00:00', 1, 1, '', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`workid`),
  ADD KEY `studentid` (`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `workid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
