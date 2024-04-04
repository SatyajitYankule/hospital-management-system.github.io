-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 10:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helth-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `name`, `username`, `email`, `mobile`, `password`, `role`, `created_at`) VALUES
(8, 'satyajit', 'satyajit', 'satyajityankule33@gmail.com', '8999740097', '$2y$10$1OUsxECsN7twM5jcex43DOU3Arx.JFXubVhvnPTeKZMIQFbFI1a/a', 'case_paper', '2023-09-15 12:31:24'),
(9, 'admin', 'admin', 'admin', '8999740097', '$2y$10$7tq2Yfzw25amEjJFdqVtAOheOY2owElfU3wWt4jah3DDT8rRYyNXi', 'admin', '2023-09-15 12:32:53'),
(11, 'nitin', 'nitin', 'nitin@gmail.com', '91303056385', '$2y$10$szKStgeXhpfJw3ymydv7yu3ex47qHqlnd94IeI89k/4bCKdQ6AUNW', 'medical_shop', '2023-09-15 12:37:26'),
(12, 'vinayak', 'vinayak', 'vinayakshinde@gmail.com', '9745612365', '$2y$10$7p3Ll2bv5OmPOlhmVuiJE.a/9HQPE6EK9whHNLP6hMiTp7DV/wxDK', 'doctor', '2023-09-15 12:40:15'),
(13, 'case_paper', 'case_paper', 'case_paper@gmail.com', '8999740097', '$2y$10$MxNAMIkqL6zuggRaCvkcfuMPMArOqwhLIy5PWOPbQh9jLS7Sfq3Qa', 'case_paper', '2023-09-15 12:41:07'),
(14, 'doctor', 'doctor', 'doctor@gmail.com', '7894561230', '$2y$10$Woy34L0TosfMsjQWFLGQqewcfycoTLoSv8zRAz93y5y3IHPAakQki', 'doctor', '2023-09-15 12:41:48'),
(15, 'medical_shop', 'medical_shop', 'medical_shop@gmail.com', '9874563210', '$2y$10$MCYeKK07Ml/lbnliZWekXe0ee6aqyifkSNJm4TsSTmjE6WGAHOZwy', 'medical_shop', '2023-09-15 12:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_list`
--

CREATE TABLE `medicine_list` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_list`
--

INSERT INTO `medicine_list` (`id`, `medicine_name`, `price`) VALUES
(3, 'Dictionary', '5874'),
(4, 'Acetylsalicylic acid in 2', '789'),
(6, 'Atorvastatin', '325');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(11) NOT NULL,
  `case_paper_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `case_paper_id`, `doctor_id`, `token`, `name`, `age`, `mobile`, `email`, `address`, `disease`, `created_at`, `status`) VALUES
(1, 1, 0, '386396', 'Satyajit Yankule', '23', '8999740097', 'satyajityankule33@gmail.com', 'pimpri', 'Malaria', '2023-05-18 16:49:06', 0),
(2, 1, 12, '655361', 'vidya', '18', '8977745597', 'vidya@gmail.com', 'pimpri', 'Malaria', '2023-05-28 13:54:38', 1),
(3, 4, 0, '604441', 'rasika', '21', '9877899870', 'rasika@gmail.com', 'pimpri', 'heart transplant', '2023-05-28 13:58:41', 0),
(4, 1, 0, '262770', 'vidya', '18', '8977745597', 'vidya@gmail.com', 'pimpri', 'Malaria', '2023-05-28 14:01:53', 0),
(5, 13, 12, '572423', 'admin admin admi', '22', '897456125', 'admin@gmail.com', 'kharalwadi', 'Babesiosis', '2023-09-15 12:52:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_medicine_list`
--

CREATE TABLE `patient_medicine_list` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_medicine_list`
--

INSERT INTO `patient_medicine_list` (`id`, `patient_id`, `medicine_name`, `qty`, `price`) VALUES
(1, '1', 'xyz Golya', '5', '150'),
(2, '1', 'xyz Golya', '4', '150'),
(3, '1', 'xyz Golya', '4', '150'),
(4, '1', '', '1', ''),
(5, '2', 'xyz Golya', '4', '150'),
(6, '2', 'xyz Golya', '4', '150'),
(7, '2', 'xyz Golya', '4', '150'),
(8, '2', 'xyz Golya', '4', '150'),
(9, '2', 'xyz Golya', '4', '150'),
(10, '2', '', '1', ''),
(11, '2', 'Dictionary', '5', '5874'),
(12, '2', 'Acetylsalicylic acid in 2', '2', '789'),
(13, '2', 'Acetylsalicylic acid in 2', '1', '789'),
(14, '2', 'Atorvastatin', '3', '325'),
(15, '5', 'Dictionary', '1', '5874'),
(16, '5', 'Acetylsalicylic acid in 2', '1', '789'),
(17, '5', 'Atorvastatin', '1', '325'),
(18, '5', 'Atorvastatin', '10', '325'),
(19, '5', 'Dictionary', '5', '5874'),
(20, '5', 'Acetylsalicylic acid in 2', '15', '789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_list`
--
ALTER TABLE `medicine_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_medicine_list`
--
ALTER TABLE `patient_medicine_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medicine_list`
--
ALTER TABLE `medicine_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_medicine_list`
--
ALTER TABLE `patient_medicine_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
