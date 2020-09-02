-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2020 at 04:11 AM
-- Server version: 8.0.20
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rudabi`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int NOT NULL,
  `uname` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'using case sensitive',
  `pwd` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'using SHA1 and case sensitive',
  `hak_akses` int DEFAULT NULL COMMENT '1. Admin IT\r\n2. user',
  `stat` int DEFAULT NULL COMMENT '1. aktif\r\n2. delete',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT '1970-01-01 00:00:00',
  `sysupduser` int DEFAULT NULL,
  `sysupddate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `uname`, `pwd`, `hak_akses`, `stat`, `syscreateuser`, `syscreatedate`, `sysupduser`, `sysupddate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'admin', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 1, 1, NULL, '1970-01-01 00:00:00', NULL, NULL, NULL, NULL),
(2, 'sekertariat', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 2, 2, NULL, '2020-07-29 10:45:47', NULL, '2020-07-29 12:39:36', NULL, '2020-07-29 14:13:15'),
(3, 'admin sekertariat', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 2, 1, NULL, '2020-07-29 15:46:57', NULL, NULL, NULL, NULL),
(4, 'admin binsyar', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 3, 1, NULL, '2020-07-29 15:47:06', NULL, NULL, NULL, NULL),
(5, 'admin kua', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 4, 1, NULL, '2020-07-29 15:47:18', NULL, NULL, NULL, NULL),
(6, 'admin PAI', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 5, 1, NULL, '2020-07-29 15:47:28', NULL, NULL, NULL, NULL),
(7, 'admin siwak', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 6, 1, NULL, '2020-07-29 15:47:37', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subdit`
--

CREATE TABLE `subdit` (
  `id` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `stat` int DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT '1970-01-01 00:00:00',
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT '1970-01-01 00:00:00',
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT '1970-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `subdit`
--

INSERT INTO `subdit` (`id`, `nama`, `keterangan`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'Super Admin', '', 1, 1, '2020-07-29 09:53:52', NULL, '1970-01-01 00:00:00', NULL, '1970-01-01 00:00:00'),
(2, 'sekertariat', 'Sub Direktorat Sekertariat', 1, 1, '1970-01-01 00:00:00', NULL, '2020-07-29 14:11:00', NULL, '2020-07-29 14:16:20'),
(3, 'urusan agama & binsyar', 'DIREKTORAT URUSAN AGAMA ISLAM DAN PEMBINAAN SYARIAH', 1, NULL, '2020-07-29 14:17:24', NULL, '1970-01-01 00:00:00', NULL, '1970-01-01 00:00:00'),
(4, 'BINA KUA DAN KELUARGA SAKINAH', 'DIREKTORAT BINA KUA DAN KELUARGA SAKINAH', 1, NULL, '2020-07-29 14:17:52', NULL, '1970-01-01 00:00:00', NULL, '2020-07-29 15:45:54'),
(5, 'Penerangan Agama Islam', 'DIREKTORAT PENERANGAN AGAMA ISLAM', 1, NULL, '2020-07-29 14:18:15', NULL, '1970-01-01 00:00:00', NULL, '1970-01-01 00:00:00'),
(6, 'Pemberdayaan Zakat & Wakaf', 'DIREKTORAT PEMBERDAYAAN ZAKAT DAN WAKAF', 1, NULL, '2020-07-29 14:18:32', NULL, '1970-01-01 00:00:00', NULL, '1970-01-01 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `subdit`
--
ALTER TABLE `subdit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subdit`
--
ALTER TABLE `subdit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
