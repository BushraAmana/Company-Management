-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 01:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `absentrequest`
--

CREATE TABLE `absentrequest` (
  `A_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `absensedate` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absentrequest`
--

INSERT INTO `absentrequest` (`A_id`, `name`, `absensedate`, `description`, `username`, `status`) VALUES
(1, 'Ria Dhar', '2020-09-25', 'because of sickness', 'RDhar', 'Rejected'),
(2, 'Ria Dhar', '2020-09-26', 'for covid-19 testing', 'RDhar', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_id`, `name`, `email`, `username`, `password`, `Gender`, `phone`, `Address`) VALUES
(7, 'Bushra Amana', 'bushra8@gmail.com', 'BAmana', '$2y$10$fvFlEOO0iHtjoSsuK2fgueTcM/N7AcAh2LxzeBwHjLYuj9JhzXxry ', 'female', 198890055, 'Mirpur '),
(8, 'showkat', 'showkat.879@gmail.com', 'Showkat.ali', '$2y$10$XYF5cDzTlyII6jsgylV2ieY6n7gDX5KCC8qHzOGH/to5FEAlJE9Qi', 'male', 198890055, 'mohammadpur,dhaka'),
(9, 'sadik', 'sadik.abdullah555@gmail.com', 'abdullahsadik', '$2y$10$1011K61trpWqcUqZh5B6j.NMk81My1SoYN7HaFBJAgUIJvyDWvTvO ', 'male', 1716977255, 'Dhaka '),
(12, 'Shamanta Sanju', 'shamanta98@gmail.com', 'ShamantaSanju', '$2y$10$5jZ9qf6CMq3788h8Ph1Q5OQ8WzAXgMfAMqJoVc/mbWEVpuW87UqT.', 'female', 198895677, 'mohammadpur,dhaka'),
(13, 'katapa', 'katapa11@gmail.com', 'katapa', '$2y$10$uaODXMnnR.tQjsOWE2rovONHkZYunF.B5K4TxI1R3Q4JmA7hfyf5y', 'female', 198890055, 'dhaka'),
(64, 'Atia Ferdous ', 'atia@gmail.com', 'atia123', '$2y$10$2ZDfaDU0siLdnWUxyuZ8MOWYEOcIhTroRnXihhS5BptpLS6o0OM8C', 'female', 1997564677, 'Basabo,malibag,Dhaka ');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `e_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `Gender` varchar(30) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`e_id`, `name`, `email`, `username`, `password`, `Gender`, `phone`, `Address`) VALUES
(1, 'Ria Dhar ', 'ria88@gmail.com', 'RDhar', '$2y$10$ZYamABBqKGt/SzuYJu4/..S1JRFGZlZwN9SU6BPQ8pMhHomr6wr8a', 'female', 198897755, 'mohammadpur'),
(3, 'Taj Tanvir', 'taj@gmail.com', 'T.Tanvir', '$2y$10$4EseU6Y96VmdzbFrLdtJeOjUaXsg5kfHt4e6t05WQdbVJ.0nZ6OFW', 'male', 137483647, 'khulna'),
(4, 'Abdullah Sadik', 'sadik000001@gmail.com', 'abdullahsadik', '$2y$10$ezMEa/e.AB9krj2n8KXJXumdf4RZ7nYI3q/MTZApq7v7bynWxY4LO', 'male', 1988932234, 'mohammadpur,dhaka'),
(6, 'Menhaj', 'megamind@gmail.com', 'megamind', '$2y$10$lwrNBPAWTyxFgSm/JBGlZOSbSXpHb/Qn7/enrAMF8O0DTp2VO.QbO', 'male', 137483647, 'fagotpara'),
(7, 'hishika', 'hishika@gmail.com', 'hishika', '$2y$10$AuzQh77bYmG4gtlSdDEwr.SkXMHEuaqnKcZ3NHtn5BSxIQVZ2BUmy', 'female', 1347483647, 'tokyo'),
(8, 'Bushra Amana', 'shamanta98@gmail.com', 'munia', '$2y$10$c.27vKo.m/beujGDlkzHfO9R1Eszm8OnFHwfvJYJkCsVauHI.lsH6', 'female', 198890055, 'mohammadpur,dhaka'),
(10, 'kalapahar', 'kalapahar@gmail.com', 'kalapahar', '$2y$10$3RNY7VAmIlsom5.pqX9Mp.37mGXY7N8Xz2K9dkNoov1pSXRFJWzCi', 'male', 137483647, 'kalapahar'),
(11, 'bablu bhai', 'bablu@gmail.com', 'keherman', '$2y$10$ml96N3P4l0yK3t5gdDyf6uSAM3T3EUD357ReXZSxzwaaIKHtf90SO', 'male', 154561564, 'aliph layla'),
(12, 'kyle tepa', 'kyle@gmail.com', 'keletepa', '$2y$10$5knOizqjG2Ud2EcKK/PKhuUrgTzZaursKoG7HfBh38eB2OSFrP3Ji', 'male', 216546545, 'goergia, usa'),
(13, 'musically', 'tiktok@gmail.com', 'infamoususer', '$2y$10$D/M17kW1fCE.6qVPzr/ZP.02WGMvfzpLILuQx/juQWhT/39dfU1EW', 'male', 2147483647, 'catarpool'),
(14, 'Sharmin Mumu', 'mumu98@gmail.com', 'SMumu', '$2y$10$okOkwAnlZJIBufpHz1E1GeXdWVj./QAKxOXegfQbW03AOQ6OihbCi', 'female', 1988933445, 'mohammadpur,dhaka'),
(15, 'Nazifa Sruti', 'sruti8@gmail.com', 'Nazifa234', '$2y$10$R.3wL5fP.b72SWXpww8i2ejLzNGyipklXjp72sna../ZlfgCeddaG', 'female', 1988933112, 'mohammadpur,dhaka'),
(16, 'Ali Baba', 'ali@gmail.com', 'Ababa', '$2y$10$zhVOLlYEbESNsLPvYsespOOi7gI4JK3gdX3lQFKnZc1eqQU8DovKq', 'male', 1988999887, 'Mohakhali'),
(17, 'Munia muni', 'smuni8@gmail.com', 'Muni', '$2y$10$w72bm9p1ou52nQb5KgBFtefuuMTcWwnUOJwE8M/QdimcVsGLgLEsC', 'female', 1474836478, 'Mirpur'),
(19, 'aaa', 'shta98@gmail.com', 'asfdrrt', '$2y$10$MtfdxsCFTvmRFMVw.tHpS.iyqNrb82/7.C1y1Q6IgdQ1ISNM8ne2i', 'female', 198890055, 'mohammadpur,dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `hrs`
--

CREATE TABLE `hrs` (
  `H_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hrs`
--

INSERT INTO `hrs` (`H_id`, `name`, `email`, `username`, `password`, `Gender`, `phone`, `Address`) VALUES
(1, 'Bushra Amana', 'shamanta98@gmail.com', 'BushraAmana', '$2y$10$cHC1gzR2eCQM2lmi7ol9TuFxCvrMzTl8l18FUXa.o6gkukGN96W7u', 'female', 1988600966, '12,mohammadpur,dhaka'),
(2, 'Arshad Hasan Aywon', 'aywon@gmail.com', 'A.aywon', '$2y$10$edQHKmV2XWMq3NGezbwK1eubhJHE0/fmZwJ.VGq9GyZXpD5HMg2mq', 'male', 2147483647, 'mirpur'),
(3, 'Mina Akter', 'mina12@gmail.com', 'mina12', '$2y$10$nimmIgiCLwEek4iGcoZXgehWAiQj0oAGq7XA4elIenmyEUUF5PIua', 'female', 1988900552, 'dhaka'),
(6, 'Aseya Ava', 'ava@gmail.com', 'A.Ava', '$2y$10$ZM6Fo.ULWaxOnMzhLm0qg.Ss35mTxv3j6JMUdJL5UDEyTrmGXCclW', 'female', 1777777223, 'Barisal'),
(7, 'Nayma Islam', 'nayma123@gmail.com', 'nayma123', '$2y$10$3mCzE346k6enPQ7oIk9zkur.a9uKHx.1sa3PZ9UV3Q6aPyC5fG0L6', 'female', 1987435751, 'Mohakhali,Dhaka'),
(8, 'Nushrat Jahan', 'nushrat123@gmail.com', 'NJahan', '$2y$10$Shc10/CojL.UF.o40yLiDepo1kHU2wEts6MnYLIgt/DiU8hOv/6U6', 'female', 1988900552, 'mohammadpur,dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `loanrequest`
--

CREATE TABLE `loanrequest` (
  `l_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `amount` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loanrequest`
--

INSERT INTO `loanrequest` (`l_id`, `name`, `username`, `phone`, `amount`) VALUES
(1, 'Ria Dhar', 'RDhar', 198890055, 50000),
(2, 'Bushra Amana', 'BushraAmana', 198890055, 3000),
(6, 'Hishika', 'hisika', 1988600966, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `m_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `Gender` varchar(30) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`m_id`, `name`, `email`, `username`, `password`, `Gender`, `phone`, `Address`) VALUES
(1, 'Sajida Tasnim', 'sanjida@gmail.com', 'STasnim', '$2y$10$qlPK.P6XzV.XcKr62z43deVXt206tk5vVjocfjqE56LdRKvOEni2e', 'female', 1988900444, 'mohammadpur,dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absentrequest`
--
ALTER TABLE `absentrequest`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `hrs`
--
ALTER TABLE `hrs`
  ADD PRIMARY KEY (`H_id`);

--
-- Indexes for table `loanrequest`
--
ALTER TABLE `loanrequest`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absentrequest`
--
ALTER TABLE `absentrequest`
  MODIFY `A_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `e_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hrs`
--
ALTER TABLE `hrs`
  MODIFY `H_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loanrequest`
--
ALTER TABLE `loanrequest`
  MODIFY `l_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `m_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
