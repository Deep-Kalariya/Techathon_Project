-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 22, 2023 at 02:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitors_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `userTypeId` int(11) NOT NULL COMMENT 'FK of UserType Table',
  `flatId` int(11) NOT NULL COMMENT 'FK of Flat Table',
  `name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobileNo` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `loginDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `workingTime` time DEFAULT NULL,
  `shift` varchar(15) DEFAULT NULL COMMENT 'Day/Night'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `userTypeId`, `flatId`, `name`, `password`, `mobileNo`, `email`, `createdDate`, `loginDate`, `modifiedDate`, `workingTime`, `shift`) VALUES
(1, 1, 5, 'Bhavin', '123456', '7046074960', 'iambhavinaghera@gmail.com', '2023-02-13 17:21:05', '2023-02-13 17:21:05', '2023-02-22 05:40:21', '00:00:00', 'Select Shift');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
