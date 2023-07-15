-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 10:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `bidang_id` bigint(20) NOT NULL,
  `bidang_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`bidang_id`, `bidang_name`) VALUES
(1, 'Operasi'),
(2, 'Pemeliharaan'),
(3, 'Logistik'),
(4, 'Keuangan & Administrasi'),
(5, 'Enjiniring & Quality Assurance'),
(8, 'CNG');

-- --------------------------------------------------------

--
-- Table structure for table `fungsi`
--

CREATE TABLE `fungsi` (
  `fungsi_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `fungsi_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fungsi`
--

INSERT INTO `fungsi` (`fungsi_id`, `unit_id`, `fungsi_name`) VALUES
(5, 1, 'Manajemen'),
(7, 1, 'Rendal Operasi'),
(9, 1, 'Rendal Niaga'),
(10, 1, 'Operator PLTGU Blok 1-2 A'),
(11, 1, 'Operator PLTGU Blok 1-2 B'),
(12, 1, 'Operator PLTGU Blok 1-2 C'),
(13, 1, 'Operator PLTGU Blok 1-2 D'),
(14, 1, 'Operator PLTGU Blok 3-4 A'),
(15, 1, 'Operator PLTGU Blok 3-4 B'),
(16, 1, 'Operator PLTGU Blok 3-4 C'),
(17, 1, 'Operator PLTGU Blok 3-4 D'),
(18, 1, 'Operator PLTGU Blok 5 A'),
(19, 1, 'Operator PLTGU Blok 5 B'),
(20, 1, 'Operator PLTGU Blok 5 C'),
(21, 1, 'Operator PLTGU Blok 5 D'),
(22, 1, 'Rendal Pemeliharaan'),
(23, 1, 'Sarana'),
(24, 1, 'K3'),
(25, 1, 'Lingkungan'),
(26, 1, 'Manajemen Outage'),
(27, 1, 'Har Mekanik'),
(28, 1, 'Har Listrik'),
(29, 1, 'Har Konin'),
(30, 1, 'Pengadaan'),
(31, 1, 'Inventori'),
(32, 1, 'Gudang'),
(33, 1, 'Sekretariat, Umum, & CSR'),
(34, 1, 'Keuangan'),
(35, 1, 'SDM'),
(36, 1, 'System Owner Blok 1-2-5'),
(37, 1, 'System Owner 3-4'),
(38, 1, 'MRK'),
(39, 1, 'MMK'),
(40, 1, 'Technology Owner');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` bigint(20) NOT NULL,
  `jabatan_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_name`) VALUES
(1, 'Senior Manager'),
(2, 'Manager'),
(3, 'Asisten Manager'),
(5, 'Senior Technician'),
(6, 'Technician'),
(7, 'Junior Technician'),
(8, 'Senior Officer'),
(9, 'Officer'),
(10, 'Junior Officer'),
(11, 'Spesialis');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` bigint(20) NOT NULL,
  `unit_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'UP Muara Tawar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `user_nid` varchar(15) NOT NULL,
  `user_nama` varchar(30) NOT NULL,
  `jabatan_id` bigint(20) NOT NULL,
  `bidang_id` bigint(20) NOT NULL,
  `fungsi_id` bigint(20) NOT NULL,
  `user_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nid`, `user_nama`, `jabatan_id`, `bidang_id`, `fungsi_id`, `user_password`) VALUES
(1, '1234567zjy', 'Admin MSI', 6, 5, 5, '123456'),
(2, '11223344aa', 'jdfjfj', 7, 1, 19, '12345');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_fungsi`
-- (See below for the actual view)
--
CREATE TABLE `view_fungsi` (
`fungsi_id` bigint(20)
,`unit_id` bigint(20)
,`fungsi_name` varchar(300)
,`unit_name` varchar(300)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
-- (See below for the actual view)
--
CREATE TABLE `view_user` (
`user_id` bigint(20)
,`user_nid` varchar(15)
,`user_nama` varchar(30)
,`user_password` varchar(35)
,`jabatan_id` bigint(20)
,`jabatan_name` varchar(255)
,`bidang_id` bigint(20)
,`bidang_name` varchar(50)
,`fungsi_id` bigint(20)
,`fungsi_name` varchar(300)
,`unit_id` bigint(20)
,`unit_name` varchar(300)
);

-- --------------------------------------------------------

--
-- Structure for view `view_fungsi`
--
DROP TABLE IF EXISTS `view_fungsi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_fungsi`  AS SELECT `fungsi`.`fungsi_id` AS `fungsi_id`, `fungsi`.`unit_id` AS `unit_id`, `fungsi`.`fungsi_name` AS `fungsi_name`, `unit`.`unit_name` AS `unit_name` FROM (`fungsi` join `unit` on(`fungsi`.`unit_id` = `unit`.`unit_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user`  AS SELECT `user`.`user_id` AS `user_id`, `user`.`user_nid` AS `user_nid`, `user`.`user_nama` AS `user_nama`, `user`.`user_password` AS `user_password`, `user`.`jabatan_id` AS `jabatan_id`, `jabatan`.`jabatan_name` AS `jabatan_name`, `user`.`bidang_id` AS `bidang_id`, `bidang`.`bidang_name` AS `bidang_name`, `user`.`fungsi_id` AS `fungsi_id`, `fungsi`.`fungsi_name` AS `fungsi_name`, `fungsi`.`unit_id` AS `unit_id`, `unit`.`unit_name` AS `unit_name` FROM ((((`user` join `jabatan` on(`user`.`jabatan_id` = `jabatan`.`jabatan_id`)) join `bidang` on(`user`.`bidang_id` = `bidang`.`bidang_id`)) join `fungsi` on(`user`.`fungsi_id` = `fungsi`.`fungsi_id`)) join `unit` on(`fungsi`.`unit_id` = `unit`.`unit_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`bidang_id`);

--
-- Indexes for table `fungsi`
--
ALTER TABLE `fungsi`
  ADD PRIMARY KEY (`fungsi_id`),
  ADD KEY `unit_id` (`unit_id`) USING BTREE;

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `bidang_id` (`bidang_id`),
  ADD KEY `unit_id` (`fungsi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `bidang_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fungsi`
--
ALTER TABLE `fungsi`
  MODIFY `fungsi_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fungsi`
--
ALTER TABLE `fungsi`
  ADD CONSTRAINT `fungsi_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`bidang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`fungsi_id`) REFERENCES `fungsi` (`fungsi_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
