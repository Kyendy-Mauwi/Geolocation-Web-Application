-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 09:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geolocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `ADMIN_NAME` varchar(50) NOT NULL,
  `ADMIN_PHONE_NUMBER` int(50) NOT NULL,
  `ADMIN_LOGIN_ID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_NAME`, `ADMIN_PHONE_NUMBER`, `ADMIN_LOGIN_ID`) VALUES
(20, 'Sheila Nzai', 722792329, 63);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `AGENT_ID` int(11) NOT NULL,
  `AGENT_NAME` varchar(50) NOT NULL,
  `AGENT_EMAIL` varchar(50) NOT NULL,
  `AGENT_PHONE_NUMBER` int(50) NOT NULL,
  `AGENT_LATITUDE` float(10,6) NOT NULL,
  `AGENT_LONGITUDE` float(10,6) NOT NULL,
  `AGENT_DATE_FROM` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `AGENT_LOGIN_ID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`AGENT_ID`, `AGENT_NAME`, `AGENT_EMAIL`, `AGENT_PHONE_NUMBER`, `AGENT_LATITUDE`, `AGENT_LONGITUDE`, `AGENT_DATE_FROM`, `AGENT_LOGIN_ID`) VALUES
(50, 'Mutio Nzai', 'mutionzai@gmail.com', 756810328, -1.147613, 36.665268, '2021-12-21 03:45:15', 64),
(51, 'Caleb Zwingli', 'calebzwingli@gmail.com', 701256649, -1.312586, 36.902718, '2021-12-31 13:31:45', 65),
(55, 'Mirriam Nzai', 'mirry@gmail.com', 756789021, -1.310654, 36.906281, '2021-12-31 12:45:35', 69),
(59, 'Derrick Mwomore', 'dero@gmail.com', 728260722, -1.312595, 36.906895, '2022-01-01 08:41:32', 73),
(60, 'Malcom Mwai', 'malc@gmail.com', 728260722, -1.312671, 36.907555, '2022-01-01 09:33:56', 74),
(61, 'karuga', 'karuga@gmail.com', 728260722, -1.313036, 36.906651, '2022-01-01 10:24:27', 75);

-- --------------------------------------------------------

--
-- Table structure for table `agents_location_change`
--

CREATE TABLE `agents_location_change` (
  `AGENT_LOCATION_CHANGE_ID` int(11) NOT NULL,
  `AGENT_LOCATION_CHANGE_LATITUDE` float(10,6) NOT NULL,
  `AGENT_LOCATION_CHANGE_LONGITUDE` float(10,6) NOT NULL,
  `AGENT_LOCATION_CHANGE_DATE_FROM` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `AGENT_LOCATION_CHANGE_AGENT_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents_location_change`
--

INSERT INTO `agents_location_change` (`AGENT_LOCATION_CHANGE_ID`, `AGENT_LOCATION_CHANGE_LATITUDE`, `AGENT_LOCATION_CHANGE_LONGITUDE`, `AGENT_LOCATION_CHANGE_DATE_FROM`, `AGENT_LOCATION_CHANGE_AGENT_ID`) VALUES
(19, -1.149364, 36.667740, '2021-12-19 15:11:22.211019', 50),
(20, -1.291964, 36.842838, '2021-12-21 01:08:41.822216', 50),
(21, -1.147613, 36.665268, '2021-12-21 01:11:12.603760', 50),
(26, -1.310654, 36.906281, '2021-12-31 12:45:35.955245', 55),
(27, -1.315654, 36.900703, '2021-12-31 13:28:44.732513', 51),
(28, -1.314645, 36.903854, '2021-12-31 13:29:50.534972', 51),
(33, -1.313036, 36.906651, '2022-01-01 10:24:28.041389', 61);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LOGIN_ID` int(11) NOT NULL,
  `LOGIN_NAME` varchar(50) NOT NULL,
  `LOGIN_PASSWORD` varchar(300) NOT NULL,
  `LOGIN_RANK` varchar(50) NOT NULL,
  `LOGIN_STATUS` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LOGIN_ID`, `LOGIN_NAME`, `LOGIN_PASSWORD`, `LOGIN_RANK`, `LOGIN_STATUS`) VALUES
(63, 'SheilaNzai', '$2y$10$FEkh6PtLRwhPEnCMBeoVz.Z95Nixfud4QXVLupQmXG0MQ7yAwx9vW', 'admin', '1'),
(64, 'mutioNzai', '$2y$10$p.CMIpg/tk0cx3i3BUC8u.AWwH4MwvzyMipVMJNlx18UbF0Ff37Ji', 'agent', '0'),
(65, 'Caleb Zwingli', '$2y$10$UhSYBGnIvL4STYzzWETH3OKNWNwS5zY7ts67N.9oRmCIjHyZj4bIe', 'agent', '0'),
(69, 'mirryNzai', '$2y$10$6.DEKuw7pU3puoC6Twf2weRdNx4.UzE7Zo/8nqfLQJ1f4vFHUk2ey', 'agent', '0'),
(73, 'DerrickM', '$2y$10$z6xkYMh25kO596QLcQCqbeGEnfutOOU3oTeK62TQDshKhhnyCZn0m', 'agent', '0'),
(74, 'Malcom Mwai', '$2y$10$8aU3HZT4G9q/K2asilwr9erfq1Cc0pR4cVBUhiVVqXgwKUvjk3nFm', 'agent', '0'),
(75, 'karuga', '$2y$10$jAcWFXJhjLSeCWWYciKNmOKmy6Nv3nX07wb5yg8fLFMdDZSKcQVWW', 'agent', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`),
  ADD KEY `ADMIN_LOGIN_ID` (`ADMIN_LOGIN_ID`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`AGENT_ID`),
  ADD KEY `AGENT_LOGIN_ID` (`AGENT_LOGIN_ID`);

--
-- Indexes for table `agents_location_change`
--
ALTER TABLE `agents_location_change`
  ADD PRIMARY KEY (`AGENT_LOCATION_CHANGE_ID`),
  ADD KEY `AGENT_LOCATION_CHANGE_AGENT_ID` (`AGENT_LOCATION_CHANGE_AGENT_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LOGIN_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `AGENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `agents_location_change`
--
ALTER TABLE `agents_location_change`
  MODIFY `AGENT_LOCATION_CHANGE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LOGIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_ibfk_1` FOREIGN KEY (`AGENT_LOGIN_ID`) REFERENCES `login` (`LOGIN_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agents_location_change`
--
ALTER TABLE `agents_location_change`
  ADD CONSTRAINT `agents_location_change_ibfk_1` FOREIGN KEY (`AGENT_LOCATION_CHANGE_AGENT_ID`) REFERENCES `agents` (`AGENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
