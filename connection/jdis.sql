-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 09:19 AM
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
  `phone` varchar(13) NOT NULL,
  `offense_id` int(11) NOT NULL,
  `date_of_offense` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jd_tbl`
--

INSERT INTO `jd_tbl` (`jd_id`, `fullname`, `guardian_name`, `address`, `barangay_tbl_id`, `dob`, `age`, `gender`, `phone`, `offense_id`, `date_of_offense`) VALUES
(19, 'Geykson Matildo Maravillas', 'Sample Guardian Full Name', 'Upper Langcangan Oroquieta City', 23, '2000-08-24', 22, 'Male', '+639276003238', 27, '2022-01-31'),
(20, 'Jamarcus Maddox', 'Sample Guardian Full Name', 'Upper Langcangan Oroquieta City', 91, '2003-02-21', 19, 'Male', '+639856556456', 17, '2022-12-25'),
(21, 'Jehan Ivy Ibasan', 'Sample Guardian Full Name', 'Binuangan, Oroquieta City', 27, '2004-06-17', 18, 'Female', '+639565655522', 8, '2022-06-08'),
(22, 'Dorothy Lee Sumaylo', 'Sample Guardian Full Name', 'Ambot Lang Oroquieta City', 25, '2003-03-20', 19, 'Female', '+639888565652', 1, '2022-12-21'),
(23, 'Krizza Cane Bacus', 'Sample Guardian Full Name', 'Ambot Lang Oroquieta City', 24, '2004-06-17', 18, 'Female', '+639276565655', 11, '2022-03-10'),
(24, 'Ernan Tayone', 'Sample Guardian Full Name', 'Basta Aloran', 28, '2003-03-12', 19, 'Male', '+639885656522', 7, '2022-04-01'),
(25, 'Dyn Mild Dagohoy', 'Sample Guardian Full Name', 'Taga Kasagbutan', 22, '2007-03-20', 15, 'Female', '+639855532322', 1, '2022-12-21'),
(27, 'Atanasio Hernández', 'Sample Guardian Full Name', 'Taga Kasagbutan', 22, '2003-12-25', 19, 'Male', '+639255502232', 13, '2022-12-21'),
(28, 'Mauricio Gutiérrez', 'Sample Guardian Full Name', 'Taga Earth Ni Sha', 19, '1956-03-15', 66, 'Male', '+639565650222', 23, '2022-02-21'),
(29, 'Name Sa Tawo', 'Sample Guardian Full Name', 'Taga Bundok Sss', 24, '2003-03-20', 19, 'Male', '+639555656565', 13, '2022-06-23'),
(30, 'Wewsss Chuy2x', 'Sample Guardian Full Name', 'Basta Taga Lugar Nis Sha', 26, '2008-04-25', 14, 'Male', '+639555650023', 8, '2022-05-11'),
(31, 'Abu Bakar Wews', 'Sample Guardian Full Name', 'Taga Planet Namik', 14, '2000-02-10', 22, 'Male', '+639550222002', 13, '2022-04-01'),
(32, 'Rrr Wew Wew', 'Sample Guardian Full Name', 'Basta Address Ni Sha Uiii', 3, '2003-12-10', 19, 'Male', '+639555600236', 26, '2022-12-25'),
(33, 'Asasqaaa Xsdsd', 'Assaxxx', 'Sdsdsdxzx  Sdsdsd', 2, '2004-02-12', 18, 'Male', '+639854545554', 8, '2022-07-14'),
(34, 'Dfdfccc Dfdsffddsf C', 'Sample Guardian Full Name', 'Xccxcc Xcxcxcxc Xcxcx', 4, '2003-03-14', 19, 'Male', '+639554522224', 8, '2022-07-14'),
(35, 'Sdsdsd Ssds Xxxxzxxzx', 'Sample Guardian Full Name', 'Xzxasasasasasas', 3, '2008-12-11', 14, 'Male', '+639944411142', 8, '2022-03-10'),
(36, 'Sssdsd Dsdsd Sdsd', 'Sample Guardian Full Name', 'Sdsdsd Sdsdss Dddd', 26, '2006-12-07', 16, 'Male', '+639885454221', 23, '2022-04-15'),
(37, 'Kkkvxcxcx Cxcx  Xcc', 'Sample Guardian Full Name', 'Ghghgh Dfdfccv Vvcv ', 22, '2003-12-18', 19, 'Male', '+639884545111', 23, '2022-04-15'),
(38, 'Iiuihgh Ghgh Vb', 'Sample Guardian Full Name', 'Vbvbbvc  Dfdfcxc ', 18, '2004-03-19', 18, 'Female', '+639774454222', 23, '2022-02-05'),
(39, 'Aasaszdszzz Sdsdsd', 'wew', 'Xcxc Vvvv Xddfdf', 12, '2004-03-12', 18, 'Female', '+639645452223', 23, '2022-03-10'),
(40, 'Xxx Xcxcxc Xcxc', 'Sample Guardian Full Name', 'Xcxcsdd Cxcxcc', 24, '2003-02-13', 19, 'Male', '+639552455541', 23, '2022-03-16'),
(41, 'Asaszx Zxxzx ', 'Sample Guardian Full Name', 'Xzxzxzxzzxv Fxc', 3, '2003-01-15', 19, 'Female', '+639885220022', 4, '2022-12-02'),
(42, 'Ggg Zsdsd Cxcxc', 'Sample Guardian Full Name', 'Asas Asas Sasasas', 25, '2005-12-02', 17, 'Female', '+639888655650', 14, '2022-12-27'),
(43, 'Ffasas Sssssa Xz', 'Sample Guardian Full Name', 'Sasasasxxz Xxcxc Sdsdsdsd', 2, '2008-06-20', 14, 'Male', '+639888656555', 5, '2022-12-28'),
(44, 'Basasa Ansklskas Xcx', 'Sample Guardian Full Name', 'Masasas  Xmsdkmaks Mmdsd', 2, '2008-01-18', 14, 'Female', '+639888652344', 5, '2022-12-28'),
(46, 'Vvasasazxx', 'Sample Guardian Full Name', 'Xxzxasasasasas', 2, '2005-03-10', 17, 'Female', '+639888556223', 5, '2022-12-28'),
(47, 'Gggc Dsdsdc Sdxcxcdsd', 'Sample Guardian Full Name', 'Sdsdsd Xccc Wdwdadadada', 2, '2005-04-09', 17, 'Male', '+639886555002', 22, '2022-12-28'),
(48, 'Bsdsdsad Xcccs Xzxzx', 'Sample Guardian Full Name', 'Sasasasxxz Xxcxc Sdsdsdsdsasa', 2, '2010-03-26', 12, 'Male', '+639785545622', 3, '2022-12-01'),
(49, 'Markdy Y Urong', 'Si Ante', 'Taga Bukid', 25, '2005-01-12', 17, 'Male', '+639555646565', 17, '2023-01-10'),
(50, 'Ssasas', 'Asasasas', 'Asasas', 2, '2006-01-12', 16, 'Male', '+639855565655', 17, '2023-01-04'),
(51, 'Sdsdsds', 'Sdsdsdaaaa', 'Sdsdsd', 26, '2005-01-19', 17, 'Male', '+639855562032', 21, '2023-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `offense_tbl`
--

CREATE TABLE `offense_tbl` (
  `id` int(11) NOT NULL,
  `offense_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense_tbl`
--

INSERT INTO `offense_tbl` (`id`, `offense_name`) VALUES
(1, 'Underage drinking'),
(2, 'Burglary'),
(3, 'Larceny'),
(4, 'Theft'),
(5, 'Arson'),
(6, 'Murder'),
(7, 'Rape'),
(8, 'Robbery'),
(9, 'Malicious mischief'),
(10, 'Estafa'),
(11, 'Physical injuries'),
(12, 'Illegal gambling'),
(13, 'Attempted murder'),
(14, 'Seduction'),
(15, 'Grave threats'),
(17, 'Aggravated assault'),
(18, 'Illegal use of prohibited drugs'),
(19, 'Illegal possession of firearms'),
(20, 'Bullying'),
(21, 'Attempted rape'),
(22, 'Acts of lasciviousness'),
(23, 'Drug trafficking'),
(26, 'Abduction'),
(27, 'Gwapo ');

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
  MODIFY `jd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `offense_tbl`
--
ALTER TABLE `offense_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
