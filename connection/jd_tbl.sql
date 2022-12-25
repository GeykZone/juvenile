-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 09:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `jd_tbl`
--

CREATE TABLE `jd_tbl` (
  `jd_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `barangay_tbl_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `offense_id` int(11) NOT NULL,
  `date_of_offense` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jd_tbl`
--

INSERT INTO `jd_tbl` (`jd_id`, `fullname`, `email`, `address`, `barangay_tbl_id`, `dob`, `age`, `gender`, `phone`, `offense_id`, `date_of_offense`) VALUES
(1, 'Mario Maurer', 'Maurer@gmail.com', 'Purok 1, Biasong, Lopez Jaena', 12, '2006-10-01', 16, '', '09348983434', 3, '2022-10-12'),
(2, 'dafdfadfa dafdaf', 'dafdaf@gmail.com', 'Sibugon, Lopez Jaena', 26, '2004-07-24', 16, '', '09564573535', 12, '2022-11-01'),
(3, 'dfadfadf dafda f', 'dafdafdfa@gmail.com', 'Alegria, Lopez Jaena', 1, '2007-07-18', 15, 'male', '09754567845', 2, '2022-10-27'),
(4, 'dfadfadf dafda f', 'dafdafdfa@gmail.com', 'Alegria, Lopez Jaena', 1, '2007-07-18', 15, 'male', '09754567845', 2, '2022-10-27'),
(5, 'dfadfadf dafda f', 'dafdafdfa@gmail.com', 'Alegria, Lopez Jaena', 1, '2007-07-18', 15, 'male', '09754567845', 2, '2022-10-27'),
(6, 'dfadfadf dafda f', 'dafdafdfa@gmail.com', 'Alegria, Lopez Jaena', 1, '2007-07-18', 15, 'male', '09754567845', 2, '2022-10-27'),
(10, 'dafdafdfadfa', 'dafdafdafd@gmail.com', 'purok 1, biasong, lopez jaena, misamis occidental, philippines', 7, '2012-07-19', 10, 'male', '09674564564', 7, '2022-11-01'),
(11, 'dafdafdfadfa', 'dafdafdafd@gmail.com', 'purok 1, biasong, lopez jaena, misamis occidental, philippines', 7, '2012-07-19', 10, 'male', '09674564564', 7, '2022-11-01'),
(12, 'dafdafdfadfa', 'dafdafdafd@gmail.com', 'purok 1, biasong, lopez jaena, misamis occidental, philippines', 7, '2012-07-19', 10, 'male', '09674564564', 7, '2022-11-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jd_tbl`
--
ALTER TABLE `jd_tbl`
  ADD PRIMARY KEY (`jd_id`),
  ADD KEY `barangay_tbl_id` (`barangay_tbl_id`),
  ADD KEY `barangay_tbl_id_2` (`barangay_tbl_id`),
  ADD KEY `offense_id` (`offense_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jd_tbl`
--
ALTER TABLE `jd_tbl`
  MODIFY `jd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jd_tbl`
--
ALTER TABLE `jd_tbl`
  ADD CONSTRAINT `jd_tbl_ibfk_1` FOREIGN KEY (`offense_id`) REFERENCES `offense_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test` FOREIGN KEY (`barangay_tbl_id`) REFERENCES `barangay_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
