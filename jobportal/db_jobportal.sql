-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2024 at 01:47 PM
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
-- Database: `db_jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `full_name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `full_name`, `email`, `password`) VALUES
(1, 'ImCandidate', 'imcandidate1@candidate.com', '123'),
(2, 'candidate1', 'candidate1@can.com', '123'),
(3, 'Tim Lou', 'tim509314@gmail.com', '123'),
(5, 'imEmployer2', 'imcandidate2@candidate.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `cv_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `full_name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `phone_no` int(11) NOT NULL,
  `residential_area` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`cv_id`, `candidate_id`, `full_name`, `email`, `phone_no`, `residential_area`) VALUES
(2, 1, 'imEmployer', 'imcandidate1@candidate.com', 12345678, 'Kowloon'),
(3, 3, 'Tim Lou', 'tim509314@gmail.com', 12345678, 'New Territori'),
(4, 5, 'imEmployer2', 'imcandidate2@candidate.com', 55555555, 'Kowloon');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `employer_id` int(11) NOT NULL,
  `full_name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `company` tinytext NOT NULL,
  `contact_no` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`employer_id`, `full_name`, `email`, `password`, `company`, `contact_no`) VALUES
(1, 'employer', 'imemployer1@employer.com', '123', 'companyname', 12345678),
(2, 'imEmployer', 'imemployer2@employer.com', '123', 'CompanyName', 12345678),
(3, 'employer', 'admin@admin', '123', '123', 123),
(4, 'imEmployer2', 'imemployer2@imemployer2.com', '123', 'ccc', 12312312);

-- --------------------------------------------------------

--
-- Table structure for table `jobapp`
--

CREATE TABLE `jobapp` (
  `jobapp_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `apply_datetime` datetime NOT NULL,
  `apply_status` set('accepted','rejected','hold') NOT NULL DEFAULT 'hold'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobapp`
--

INSERT INTO `jobapp` (`jobapp_id`, `candidate_id`, `employer_id`, `job_id`, `apply_datetime`, `apply_status`) VALUES
(5, 1, 1, 11, '2024-01-12 05:43:27', 'rejected'),
(7, 1, 1, 10, '2024-01-12 06:24:00', 'hold'),
(8, 3, 1, 9, '2024-01-12 07:47:07', 'hold'),
(9, 3, 1, 11, '2024-01-12 07:48:32', 'hold'),
(10, 1, 1, 9, '2024-01-12 08:09:32', 'hold'),
(11, 5, 1, 11, '2024-01-12 08:28:13', 'hold'),
(12, 5, 1, 10, '2024-01-12 08:28:26', 'hold'),
(13, 3, 4, 12, '2024-01-12 08:31:44', 'hold');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `job_title` tinytext NOT NULL,
  `company` tinytext NOT NULL,
  `job_highlight1` tinytext NOT NULL,
  `job_highlight2` tinytext NOT NULL,
  `job_highlight3` tinytext NOT NULL,
  `post_datetime` datetime NOT NULL,
  `edit_datetime` datetime DEFAULT NULL,
  `job_description` text NOT NULL,
  `contact` tinytext DEFAULT NULL,
  `company_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `employer_id`, `job_title`, `company`, `job_highlight1`, `job_highlight2`, `job_highlight3`, `post_datetime`, `edit_datetime`, `job_description`, `contact`, `company_address`) VALUES
(9, 1, 'Job 3_3', 'companyname', '1', '2', '3', '2024-01-12 04:21:12', NULL, '123', NULL, NULL),
(10, 1, '2', 'companyname', '1', '2', '3', '2024-01-12 04:24:07', NULL, '124', NULL, NULL),
(11, 1, '3', 'companyname', '123', '123', '123', '2024-01-12 04:24:12', '2024-01-12 04:24:17', '123', NULL, NULL),
(12, 4, 'EJOB1', 'ccc', '123', '123', '123', '2024-01-12 08:30:27', NULL, '123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `candidates_id` (`candidate_id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`cv_id`),
  ADD UNIQUE KEY `cv_id` (`cv_id`,`candidate_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`employer_id`),
  ADD UNIQUE KEY `employers_id` (`employer_id`);

--
-- Indexes for table `jobapp`
--
ALTER TABLE `jobapp`
  ADD PRIMARY KEY (`jobapp_id`),
  ADD UNIQUE KEY `jobapp_id` (`jobapp_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `jobs_id` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobapp`
--
ALTER TABLE `jobapp`
  MODIFY `jobapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
