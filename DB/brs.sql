-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 10:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adm_id` varchar(255) DEFAULT NULL,
  `adm_name` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adm_id`, `adm_name`, `pass`) VALUES
(2, '2', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_items`
--

CREATE TABLE `borrowed_items` (
  `id` int(11) NOT NULL,
  `ctrl_no` varchar(255) DEFAULT NULL,
  `asset_tag_no` varchar(255) DEFAULT NULL,
  `item_no` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `item_details` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `returning_plan_date` datetime DEFAULT NULL,
  `borrowed_date` datetime DEFAULT NULL,
  `borrowed_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_items`
--

INSERT INTO `borrowed_items` (`id`, `ctrl_no`, `asset_tag_no`, `item_no`, `category`, `serial_no`, `item_details`, `remarks`, `status`, `returning_plan_date`, `borrowed_date`, `borrowed_by`) VALUES
(10, 'MIS-01-007', 'SAMPLE-007', 'MOUSE-001', 'Mouse', '11111111565TR', 'MOUSE', 'MOUSE', 'BORROWED', '2022-01-28 13:53:00', '2022-01-21 13:54:00', 'jet'),
(11, 'MIS-01-001', 'SAMPLE-001', 'JABRA-001', 'Headset', '11111111', 'JABRA HEADSET', 'JABRA', 'BORROWED', '2022-01-22 13:56:00', '2022-01-21 13:56:17', 'pet1536'),
(12, 'MIS-01-007', 'SAMPLE-007', 'MOUSE-001', 'Mouse', '11111111565TR', 'MOUSE', 'MOUSE', 'BORROWED', '2022-01-22 14:02:00', '2022-01-21 14:03:02', 'pet1536'),
(13, 'MIS-01-002', 'SAMPLE-002', 'KEYBOARD-001', 'Keyboard', 'K3H493B', 'KEYBOARD', 'KEYBOARD', 'BORROWED', '2022-01-22 14:05:00', '2022-01-21 14:05:14', 'pet1536'),
(14, 'MIS-01-004', '000000', 'LAPTOP-001', 'Laptop', '10s547d83s', 'ACER LAPTOP', 'LAPTOP', 'BORROWED', '2022-01-24 14:09:00', '2022-01-21 14:09:37', 'pet2021'),
(16, 'MIS-01-004', '000000', 'LAPTOP-001', 'Laptop', '10s547d83s', 'ACER LAPTOP', 'LAPTOP', 'BORROWED', '2022-01-25 13:25:00', '2022-01-24 13:25:40', 'jet'),
(17, 'MIS-01-007', 'SAMPLE-007', 'MOUSE-001', 'Mouse', '11111111565TR', 'MOUSE', 'MOUSE', 'BORROWED', '2022-01-25 13:25:00', '2022-01-24 13:25:56', 'jet'),
(18, 'MIS-01-002', 'SAMPLE-002', 'KEYBOARD-001', 'Keyboard', 'K3H493B', 'KEYBOARD', 'KEYBOARD', 'BORROWED', '2022-01-26 08:57:00', '2022-01-25 08:57:23', 'pet2086'),
(19, 'MIS-01-001', 'SAMPLE-001', 'JABRA-001', 'Headset', '11111111', 'JABRA HEADSET', 'JABRA', 'BORROWED', '2022-01-26 07:25:00', '2022-01-25 16:22:50', 'pet2021'),
(21, 'MIS-01-007', 'SAMPLE-007', 'MOUSE-001', 'Mouse', '11111111565TR', 'MOUSE', 'MOUSE', 'BORROWED', '2022-01-26 16:52:00', '2022-01-25 16:52:50', 'jet'),
(22, 'MIS-01-008', 'SAMPLE-008', 'HDMI-CBL-001', 'HDMI Cable', '40385256546', 'HDMI CABLE', 'HDMI CABLE', 'BORROWED', '2022-01-27 10:37:00', '2022-01-26 08:35:09', 'pet2086'),
(23, 'MIS-01-004', '000000', 'LAPTOP-001', 'Laptop', '10s547d83s', 'ACER LAPTOP', 'LAPTOP', 'BORROWED', '2022-01-28 00:00:00', '2022-01-26 09:03:50', 'joy'),
(25, 'MIS-01-008', 'SAMPLE-008', 'HDMI-CBL-001', 'HDMI Cable', '40385256546', 'HDMI CABLE', 'HDMI CABLE', 'BORROWED', '2022-01-28 00:00:00', '2022-01-26 16:09:25', 'patrick'),
(26, 'MIS-01-014', 'SAMPLE-014', 'DPORT-001', 'DisplayPort Cable', '5646GTDFG54', 'DISPLAY PORT', 'DISPLAY PORT', 'BORROWED', '2022-01-27 00:00:00', '2022-01-26 16:37:37', 'patrick'),
(27, 'MIS-01-014', 'SAMPLE-014', 'DPORT-001', 'DisplayPort Cable', '5646GTDFG54', 'DISPLAY PORT', 'DISPLAY PORT', 'BORROWED', '2022-01-31 00:00:00', '2022-01-28 16:59:24', 'jet'),
(28, 'MIS-01-012', 'SAMPLE-012', 'EXT-HDD-001', 'External HDD', '2F2QAAF24R', 'EXTERNAL HDD', 'EXTERNAL HDD', 'BORROWED', '2022-02-09 00:00:00', '2022-02-08 10:12:29', 'jet'),
(29, 'MIS-01-001', 'SAMPLE-001', 'JABRA-001', 'Headset', '97803-225', 'JABRA HEADSET', 'JABRA', 'BORROWED', '2022-02-25 00:00:00', '2022-02-08 10:13:45', 'jet');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Laptop'),
(3, 'Desktop'),
(4, 'Workstation'),
(5, 'Monitor'),
(6, 'Keyboard'),
(7, 'Mouse'),
(8, 'Headset'),
(9, 'Speaker'),
(10, 'Flashdrive'),
(11, 'External HDD'),
(12, 'HDMI Cable'),
(13, 'DisplayPort Cable'),
(14, 'VGA Cable'),
(15, 'WATER DISPENSER');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'MIS'),
(2, 'JBRB'),
(3, 'EI'),
(4, 'TQM'),
(5, 'WHE'),
(6, 'PRT'),
(7, 'EV'),
(8, 'CON'),
(9, 'ADM'),
(10, 'FIN'),
(11, 'HRD'),
(12, 'TCE/CE'),
(13, 'MGMT');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `ctrl_no` varchar(255) DEFAULT NULL,
  `asset_tag_no` varchar(255) DEFAULT NULL,
  `item_no` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `item_details` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `test` int(11) DEFAULT NULL,
  `borrowed_by` varchar(255) DEFAULT NULL,
  `item_added_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `ctrl_no`, `asset_tag_no`, `item_no`, `category`, `serial_no`, `item_details`, `remarks`, `status`, `test`, `borrowed_by`, `item_added_date`) VALUES
(1, 'MIS-01-001', 'SAMPLE-001', 'JABRA-001', 'Headset', '97803-225', 'JABRA HEADSET', 'JABRA', 'AVAILABLE', NULL, '', NULL),
(8, 'MIS-01-006', 'SAMPLE-006', 'JABRA-SPK-006', 'Speaker', '234767894225', 'JABRA SPEAKER', 'JABRA', 'AVAILABLE', NULL, '', NULL),
(9, 'MIS-01-002', 'SAMPLE-002', 'KEYBOARD-001', 'Keyboard', 'K3H493B', 'KEYBOARD', 'KEYBOARD', 'AVAILABLE', NULL, '', NULL),
(10, 'MIS-01-007', 'SAMPLE-007', 'MOUSE-001', 'Mouse', '11111111565TR', 'MOUSE', 'MOUSE', 'AVAILABLE', NULL, '', NULL),
(11, 'MIS-01-008', 'SAMPLE-008', 'HDMI-CBL-001', 'HDMI Cable', '40385256546', 'HDMI CABLE', 'HDMI CABLE', 'AVAILABLE', NULL, '', '2022-01-26 08:18:45'),
(12, 'MIS-01-009', 'SAMPLE-009', 'FLASHDRIVE-001', 'Flashdrive', 'FVCAE0EA4A', 'FLASH DRIVE', 'FLASH DRIVE', 'AVAILABLE', NULL, NULL, '2022-01-26 13:18:28'),
(13, 'MIS-01-004', 'SAMPLE-003', 'LAPTOP-001', 'Laptop', '10s547d83s', 'ACER LAPTOP', 'LAPTOP', 'AVAILABLE', NULL, NULL, '2022-01-26 13:23:17'),
(14, 'MIS-01-010', 'SAMPLE-010', 'DESKTOP-001', 'Desktop', 'YE89AKSAGCV34', 'DESKTOP', 'DESKTOP', 'AVAILABLE', NULL, NULL, '2022-01-26 13:26:32'),
(15, 'MIS-01-011', 'SAMPLE-011', 'HP-WRKSTN-001', 'Workstation', 'JSKA09S76SC7A', 'WORKSTATION', 'WORKSTATION', 'AVAILABLE', NULL, NULL, '2022-01-26 13:27:32'),
(16, 'MIS-01-012', 'SAMPLE-012', 'EXT-HDD-001', 'External HDD', '2F2QAAF24R', 'EXTERNAL HDD', 'EXTERNAL HDD', 'AVAILABLE', NULL, '', '2022-01-26 13:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `log_type` varchar(255) DEFAULT NULL,
  `dated_log` datetime DEFAULT NULL,
  `log_by` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `department` text DEFAULT NULL,
  `ctrl_no` varchar(255) DEFAULT NULL,
  `asset_tag_no` varchar(255) DEFAULT NULL,
  `item_no` varchar(255) DEFAULT NULL,
  `category` text DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `item_details` varchar(255) DEFAULT NULL,
  `item_added_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `returning_plan_date` date DEFAULT NULL,
  `borrowed_date` datetime DEFAULT NULL,
  `borrowed_by` varchar(255) DEFAULT NULL,
  `returned_date` datetime DEFAULT NULL,
  `returned_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `log_type`, `dated_log`, `log_by`, `user_id`, `user_name`, `department`, `ctrl_no`, `asset_tag_no`, `item_no`, `category`, `serial_no`, `item_details`, `item_added_date`, `remarks`, `status`, `returning_plan_date`, `borrowed_date`, `borrowed_by`, `returned_date`, `returned_by`) VALUES
(1, 'ADD ITEM', '2022-02-08 09:53:45', 'admin', '', '', '', 'MIS-01-013', 'SAMPLE-013', 'DPORT-001', 'DisplayPort Cable', '34CS98F', 'DISPLAY PORT', '2022-02-08', 'DISPLAY PORT', 'AVAILABLE', '0000-00-00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'UPDATE ITEM', '2022-02-08 09:56:29', 'admin', '', '', '', 'MIS-01-013', 'SAMPLE-013', 'DPORT-001', 'DisplayPort Cable', '34CS98', 'DISPLAY PORT', '0000-00-00', 'DISPLAY PORT', 'AVAILABLE', '0000-00-00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'DELETE ITEM', '2022-02-08 09:57:35', 'admin', '', '', '', 'MIS-01-013', 'SAMPLE-013', 'DPORT-001', '', '34CS98', 'DISPLAY PORT', '0000-00-00', 'DISPLAY PORT', '', '0000-00-00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 'ADD USER', '2022-02-08 10:01:05', 'admin', 'user-006', 'JOEL', 'WHE', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 'ADD USER', '2022-02-08 10:03:22', 'admin', 'user-005', 'KAISER', 'FIN', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(6, 'UPDATE USER', '2022-02-08 10:03:47', 'admin', 'user-005', 'KAISER', 'FIN', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(7, 'BORROW', '2022-02-08 10:12:29', 'jet', '', '', '', 'MIS-01-012', 'SAMPLE-012', 'EXT-HDD-001', '', '2F2QAAF24R', 'EXTERNAL HDD', '0000-00-00', 'EXTERNAL HDD', 'BORROWED', '2022-02-09', '2022-02-08 00:00:00', 'jet', '0000-00-00 00:00:00', ''),
(8, 'BORROW', '2022-02-08 10:13:45', 'jet', '', '', '', 'MIS-01-001', 'SAMPLE-001', 'JABRA-001', 'Headset', '97803-225', 'JABRA HEADSET', '0000-00-00', 'JABRA', 'BORROWED', '2022-02-25', '2022-02-08 00:00:00', 'jet', '0000-00-00 00:00:00', ''),
(9, 'RETURNED', '2022-02-08 10:17:05', 'jet', '', '', '', 'MIS-01-001', 'SAMPLE-001', 'JABRA-001', 'Headset', '97803-225', 'JABRA HEADSET', '0000-00-00', 'JABRA', 'RETURNED', '0000-00-00', '0000-00-00 00:00:00', '', '2022-02-08 00:00:00', 'jet');

-- --------------------------------------------------------

--
-- Table structure for table `returned_items`
--

CREATE TABLE `returned_items` (
  `id` int(11) NOT NULL,
  `ctrl_no` varchar(255) DEFAULT NULL,
  `asset_tag_no` varchar(255) DEFAULT NULL,
  `item_no` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `item_details` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `returned_date` datetime DEFAULT NULL,
  `returned_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returned_items`
--

INSERT INTO `returned_items` (`id`, `ctrl_no`, `asset_tag_no`, `item_no`, `category`, `serial_no`, `item_details`, `remarks`, `status`, `returned_date`, `returned_by`) VALUES
(10, 'MIS-01-007', 'SAMPLE-007', 'MOUSE-001', 'Mouse', '11111111565TR', 'MOUSE', 'MOUSE', 'RETURNED', '2022-01-21 13:55:35', 'jet'),
(11, 'MIS-01-007', 'SAMPLE-007', 'MOUSE-001', 'Mouse', '11111111565TR', 'MOUSE', 'MOUSE', 'RETURNED', '2022-01-21 14:07:18', 'jet'),
(12, 'MIS-01-001', 'SAMPLE-001', 'JABRA-001', 'Headset', '11111111', 'JABRA HEADSET', 'JABRA', 'RETURNED', '2022-01-21 14:07:22', 'jet'),
(13, 'MIS-01-002', 'SAMPLE-002', 'KEYBOARD-001', 'Keyboard', 'K3H493B', 'KEYBOARD', 'KEYBOARD', 'RETURNED', '2022-01-21 14:07:25', 'jet'),
(14, 'MIS-01-004', '000000', 'LAPTOP-001', 'Laptop', '10s547d83s', 'ACER LAPTOP', 'LAPTOP', 'RETURNED', '2022-01-21 14:11:36', 'jet'),
(15, 'MIS-01-006', 'SAMPLE-006', 'JABRA-SPK-006', 'Speaker', '55555555555555', 'JABRA SPEAKER', 'JABRA', 'RETURNED', '2022-01-24 13:19:44', 'joy'),
(17, 'MIS-01-004', '000000', 'LAPTOP-001', 'Laptop', '10s547d83s', 'ACER LAPTOP', 'LAPTOP', 'RETURNED', '2022-01-24 13:25:43', 'jet'),
(18, 'MIS-01-007', 'SAMPLE-007', 'MOUSE-001', 'Mouse', '11111111565TR', 'MOUSE', 'MOUSE', 'RETURNED', '2022-01-24 13:26:13', 'jet'),
(19, 'MIS-01-001', 'SAMPLE-001', 'JABRA-001', 'Headset', '11111111', 'JABRA HEADSET', 'JABRA', 'RETURNED', '2022-01-25 16:27:43', 'jet'),
(20, 'MIS-01-002', 'SAMPLE-002', 'KEYBOARD-001', 'Keyboard', 'K3H493B', 'KEYBOARD', 'KEYBOARD', 'RETURNED', '2022-01-25 16:27:46', 'jet'),
(22, 'MIS-01-007', 'SAMPLE-007', 'MOUSE-001', 'Mouse', '11111111565TR', 'MOUSE', 'MOUSE', 'RETURNED', '2022-01-26 08:10:18', 'jet'),
(23, 'MIS-01-008', 'SAMPLE-008', 'HDMI-CBL-001', 'HDMI Cable', '40385256546', 'HDMI CABLE', 'HDMI CABLE', 'RETURNED', '2022-01-26 08:36:10', 'joy'),
(25, 'MIS-01-008', 'SAMPLE-008', 'HDMI-CBL-001', 'HDMI Cable', '40385256546', 'HDMI CABLE', 'HDMI CABLE', 'RETURNED', '2022-01-26 16:10:41', 'patrick'),
(26, 'MIS-01-014', 'SAMPLE-014', 'DPORT-001', 'DisplayPort Cable', '5646GTDFG54', 'DISPLAY PORT', 'DISPLAY PORT', 'RETURNED', '2022-01-26 16:37:42', 'patrick'),
(27, 'MIS-01-014', 'SAMPLE-014', 'DPORT-001', 'DisplayPort Cable', '5646GTDFG54', 'DISPLAY PORT', 'DISPLAY PORT', 'RETURNED', '2022-01-31 11:09:49', 'jet'),
(28, 'MIS-01-012', 'SAMPLE-012', 'EXT-HDD-001', 'External HDD', '2F2QAAF24R', 'EXTERNAL HDD', 'EXTERNAL HDD', 'RETURNED', '2022-02-08 10:13:38', 'jet'),
(29, 'MIS-01-001', 'SAMPLE-001', 'JABRA-001', 'Headset', '97803-225', 'JABRA HEADSET', 'JABRA', 'RETURNED', '2022-02-08 10:17:05', 'jet');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `department` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_name`, `pass`, `department`) VALUES
(1, 'user-001', 'jet', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'MIS'),
(4, 'user-002', 'joy', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', 'ADM'),
(6, 'user-003', 'patrick', 'd5f12e53a182c062b6bf30c1445153faff12269a', 'MIS'),
(7, 'user-004', 'nancy', 'c73efdc073373206c96f3243cedaa0718ca698e9', 'WHE'),
(8, 'user-005', 'KAISER', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'FIN'),
(9, 'user-006', 'JOEL', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'WHE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returned_items`
--
ALTER TABLE `returned_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `returned_items`
--
ALTER TABLE `returned_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
