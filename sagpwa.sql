-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2015 at 05:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sagpwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `sw_admin`
--

CREATE TABLE IF NOT EXISTS `sw_admin` (
`AdminID` int(11) NOT NULL,
  `AdminName` varchar(225) NOT NULL,
  `AdminEmail` varchar(225) NOT NULL,
  `AdminStatus` enum('1','0') NOT NULL,
  `AdminPassword` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sw_admin`
--

INSERT INTO `sw_admin` (`AdminID`, `AdminName`, `AdminEmail`, `AdminStatus`, `AdminPassword`) VALUES
(1, 'udayakumar', 'udayakumarswamy@gmail.com', '1', '0386d0220df7b7e0c9b155515062baf61e4088cc');

-- --------------------------------------------------------

--
-- Table structure for table `sw_events`
--

CREATE TABLE IF NOT EXISTS `sw_events` (
`EventID` int(11) NOT NULL,
  `EventDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EventName` varchar(225) NOT NULL,
  `EventStatus` enum('1','0') NOT NULL,
  `EventDetails` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sw_galleries`
--

CREATE TABLE IF NOT EXISTS `sw_galleries` (
`GalleryID` int(11) NOT NULL,
  `GalleryName` varchar(225) NOT NULL,
  `GalleryStatus` enum('1','0') NOT NULL,
  `GalleryDetails` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sw_images`
--

CREATE TABLE IF NOT EXISTS `sw_images` (
`ImageID` int(11) NOT NULL,
  `ImageName` varchar(225) NOT NULL,
  `GalleryID` int(11) NOT NULL,
  `ImageStatus` enum('1','0') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sw_admin`
--
ALTER TABLE `sw_admin`
 ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `sw_events`
--
ALTER TABLE `sw_events`
 ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `sw_galleries`
--
ALTER TABLE `sw_galleries`
 ADD PRIMARY KEY (`GalleryID`);

--
-- Indexes for table `sw_images`
--
ALTER TABLE `sw_images`
 ADD PRIMARY KEY (`ImageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sw_admin`
--
ALTER TABLE `sw_admin`
MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sw_events`
--
ALTER TABLE `sw_events`
MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sw_galleries`
--
ALTER TABLE `sw_galleries`
MODIFY `GalleryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sw_images`
--
ALTER TABLE `sw_images`
MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
