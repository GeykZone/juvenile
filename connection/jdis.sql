-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 08:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jdis`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay_tbl`
--

CREATE TABLE `barangay_tbl` (
  `id` int(11) NOT NULL,
  `barangay` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay_tbl`
--

INSERT INTO `barangay_tbl` (`id`, `barangay`) VALUES
(91, 'Alegria'),
(2, 'Bagong Silang'),
(3, 'Biasong'),
(4, 'Bonifacio'),
(5, 'Burgos'),
(6, 'Dalacon'),
(7, 'Dampalan'),
(8, 'Don Andres Soriano'),
(9, 'Eastern Poblacion'),
(10, 'Estante'),
(11, 'Hasaan'),
(12, 'Katipa'),
(13, 'Luzaran'),
(14, 'Mabas'),
(15, 'Macalibre Alto'),
(16, 'Macalibre Bajo'),
(17, 'Mahayahay'),
(18, 'Manguehan'),
(19, 'Mansabay Alto'),
(20, 'Mansabay Bajo'),
(21, 'Molatuhan Alto'),
(22, 'Molatuhan Bajo'),
(23, 'Peniel'),
(24, 'Puntod'),
(25, 'Rizal'),
(26, 'Sibugon'),
(27, 'Sibula'),
(28, 'Western Poblacion');

-- --------------------------------------------------------

--
-- Table structure for table `jd_tbl`
--

CREATE TABLE `jd_tbl` (
  `jd_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `barangay_tbl_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `offense_id` int(11) NOT NULL,
  `date_of_offense` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offense_tbl`
--

CREATE TABLE `offense_tbl` (
  `id` int(11) NOT NULL,
  `offense_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `barangay_tbl_id` int(11) DEFAULT NULL,
  `role` int(2) NOT NULL DEFAULT 2,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `barangay_tbl_id`, `role`, `status`) VALUES
(1, 'main_admin', 'R0RqanE3MUJlRVp3d3B3ZDN4M0I5QT09', NULL, 1, 1),
(25, 'admin_bagong_silang', 'alZQdlRvbFQ2UHR6bXpEWk5Cd3FlbUV4eHZjbWxrNHl4TzRxbTBUNXJnOD0=', 2, 2, 1),
(26, 'admin_biasong', 'RWN0VFQyTzNVSG0wOUg3ZHd4elEwZz09', 3, 2, 0),
(27, 'admin_bonifacio', 'blo5UW5kTlhkbVUzdjVjeGg0MEwxdz09', 4, 2, 0),
(28, 'admin_burgos', 'MzV3Z3BuSTVMVnk5VHlBTVU4RGU0QT09', 5, 2, 0),
(29, 'admin_dalacon', 'MTlIc21aS1Z1a0ErdkhGdW9tMnZGdz09', 6, 2, 0),
(30, 'admin_dampalan', 'N085ODBmNW42NUdRYkN5R1EwUXcvQT09', 7, 2, 0),
(31, 'admin_don_andres_soriano', 'QTJHT0NFQ05aQ0NDbHpEVXBTTTBkc1ZmamticFp4RVpqanJvNHJPV0NQYz0=', 8, 2, 0),
(32, 'admin_eastern_poblacion', 'TG1yT2NGbzVFMUlQRTljNmwydjdHMDFXU01pWjBUSjJXS0pQQkIwV0w4MD0=', 9, 2, 0),
(34, 'admin_estante', 'M0JLS0FnbUtQYVRyUlRsc3htUDlKQT09', 10, 2, 0),
(35, 'admin_sibugon', 'OUNOS1FoS044S3dySkpLYlplQXJFZz09', 26, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay_tbl`
--
ALTER TABLE `barangay_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barangay` (`barangay`);

--
-- Indexes for table `jd_tbl`
--
ALTER TABLE `jd_tbl`
  ADD PRIMARY KEY (`jd_id`),
  ADD KEY `barangay_tbl_id` (`barangay_tbl_id`),
  ADD KEY `barangay_tbl_id_2` (`barangay_tbl_id`),
  ADD KEY `offense_id` (`offense_id`);

--
-- Indexes for table `offense_tbl`
--
ALTER TABLE `offense_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offense_name` (`offense_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `barangay` (`barangay_tbl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay_tbl`
--
ALTER TABLE `barangay_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `jd_tbl`
--
ALTER TABLE `jd_tbl`
  MODIFY `jd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offense_tbl`
--
ALTER TABLE `offense_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jd_tbl`
--
ALTER TABLE `jd_tbl`
  ADD CONSTRAINT `jd_tbl_ibfk_1` FOREIGN KEY (`offense_id`) REFERENCES `offense_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test` FOREIGN KEY (`barangay_tbl_id`) REFERENCES `barangay_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `barangay` FOREIGN KEY (`barangay_tbl_id`) REFERENCES `barangay_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
