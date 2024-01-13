-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 
-- 伺服器版本: 10.1.30-MariaDB
-- PHP 版本： 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db_jobportal`
--

-- --------------------------------------------------------

--
-- 資料表結構 `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `full_name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `full_name`, `email`, `password`) VALUES
(6, 'Tim Lou', 'tim509314@gmail.com', '$2y$10$zlTVbs8t1tERKnEKJHpd/.ByMJb5wcp.VwgQ70BOrIdqFLwFqbzpG'),
(7, '123', '123@1231', '$2y$10$ZPcgB.2h/5B/l4Ew33Gn8uyoTIkbfcNKThHIF1lEowAuolrh4knda');

-- --------------------------------------------------------

--
-- 資料表結構 `cvs`
--

CREATE TABLE `cvs` (
  `cv_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `full_name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `phone_no` int(11) NOT NULL,
  `residential_area` tinytext NOT NULL,
  `cv_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `cvs`
--

INSERT INTO `cvs` (`cv_id`, `candidate_id`, `full_name`, `email`, `phone_no`, `residential_area`, `cv_img`) VALUES
(19, 6, '123', 'admin@admin', 12345678, 'Kowloon', 'img/3339009.png');

-- --------------------------------------------------------

--
-- 資料表結構 `employers`
--

CREATE TABLE `employers` (
  `employer_id` int(11) NOT NULL,
  `full_name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `company` tinytext NOT NULL,
  `contact_no` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `employers`
--

INSERT INTO `employers` (`employer_id`, `full_name`, `email`, `password`, `company`, `contact_no`) VALUES
(1, 'employer', 'imemployer1@employer.com', '123', 'companyname', 12345678),
(2, 'imEmployer', 'imemployer2@employer.com', '123', 'CompanyName', 12345678),
(3, 'employer', 'admin@admin', '123', '123', 123),
(4, 'imEmployer2', 'imemployer2@imemployer2.com', '123', 'ccc', 12312312),
(5, '123', '123@123', '$2y$10$.15uhu/QZDsJkbX49I0OkOzGXpZqw5idBniCyBFCf2tGGkfNlHj0q', '123', 123);

-- --------------------------------------------------------

--
-- 資料表結構 `jobapp`
--

CREATE TABLE `jobapp` (
  `jobapp_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `apply_datetime` datetime NOT NULL,
  `apply_status` set('accepted','rejected','hold') NOT NULL DEFAULT 'hold'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `jobapp`
--

INSERT INTO `jobapp` (`jobapp_id`, `candidate_id`, `employer_id`, `job_id`, `apply_datetime`, `apply_status`) VALUES
(15, 6, 5, 13, '2024-01-13 01:25:36', 'hold'),
(16, 6, 4, 12, '2024-01-13 01:27:13', 'hold');

-- --------------------------------------------------------

--
-- 資料表結構 `jobs`
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
  `contact` tinytext,
  `company_address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `jobs`
--

INSERT INTO `jobs` (`job_id`, `employer_id`, `job_title`, `company`, `job_highlight1`, `job_highlight2`, `job_highlight3`, `post_datetime`, `edit_datetime`, `job_description`, `contact`, `company_address`) VALUES
(9, 1, 'Job 3_3', 'companyname', '1', '2', '3', '2024-01-12 04:21:12', NULL, '123', NULL, NULL),
(10, 1, '2', 'companyname', '1', '2', '3', '2024-01-12 04:24:07', NULL, '124', NULL, NULL),
(11, 1, '3', 'companyname', '123', '123', '123', '2024-01-12 04:24:12', '2024-01-12 04:24:17', '123', NULL, NULL),
(12, 4, 'EJOB1', 'ccc', '123', '123', '123', '2024-01-12 08:30:27', NULL, '123', NULL, NULL),
(13, 5, 'job 3', '123', '1', '2', '3', '2024-01-13 12:31:11', NULL, '123', NULL, NULL);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `candidates_id` (`candidate_id`);

--
-- 資料表索引 `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`cv_id`),
  ADD UNIQUE KEY `cv_id` (`cv_id`,`candidate_id`);

--
-- 資料表索引 `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`employer_id`),
  ADD UNIQUE KEY `employers_id` (`employer_id`);

--
-- 資料表索引 `jobapp`
--
ALTER TABLE `jobapp`
  ADD PRIMARY KEY (`jobapp_id`),
  ADD UNIQUE KEY `jobapp_id` (`jobapp_id`);

--
-- 資料表索引 `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `jobs_id` (`job_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `cvs`
--
ALTER TABLE `cvs`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表 AUTO_INCREMENT `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `jobapp`
--
ALTER TABLE `jobapp`
  MODIFY `jobapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表 AUTO_INCREMENT `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
