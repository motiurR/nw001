-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 01:12 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `adminUser` varchar(100) NOT NULL,
  `adminEmail` varchar(60) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `adminUser`, `adminEmail`, `adminPassword`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ncategory`
--

CREATE TABLE `tbl_ncategory` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(150) NOT NULL,
  `category_url` varchar(150) NOT NULL,
  `category_seo_title` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ncategory`
--

INSERT INTO `tbl_ncategory` (`category_id`, `category_title`, `category_url`, `category_seo_title`, `status`, `create_date`) VALUES
(6, 'à¦¨à§€à§œ à¦ªà¦¾à¦¤à¦¾', 'à¦¨à§€à§œ-à¦ªà¦¾à¦¤à¦¾', 'à¦¨à§€à§œ à¦ªà¦¾à¦¤à¦¾', 1, '2017-10-27 10:39:42'),
(7, 'à¦°à¦¾à¦œà¦¨à§€à¦¤à¦¿', 'à¦°à¦¾à¦œà¦¨à§€à¦¤à¦¿', 'à¦°à¦¾à¦œà¦¨à§€à¦¤à¦¿', 1, '2017-10-27 10:47:08'),
(8, 'à¦¸à¦¾à¦°à¦¾ à¦¬à¦¾à¦‚à¦²à¦¾', 'à¦¸à¦¾à¦°à¦¾-à¦¬à¦¾à¦‚à¦²à¦¾', 'à¦¸à¦¾à¦°à¦¾ à¦¬à¦¾à¦‚à¦²à¦¾', 1, '2017-10-27 10:48:59'),
(9, 'à¦…à¦°à§à¦¥à¦¨à§€à¦¤à¦¿', 'à¦…à¦°à§à¦¥à¦¨à§€à¦¤à¦¿', 'à¦…à¦°à§à¦¥à¦¨à§€à¦¤à¦¿', 1, '2017-10-27 10:50:24'),
(10, 'à¦†à¦¨à§à¦¤à¦°à§à¦œà¦¾à¦¤à¦¿à¦•', 'à¦†à¦¨à§à¦¤à¦°à§à¦œà¦¾à¦¤à¦¿à¦•', 'à¦†à¦¨à§à¦¤à¦°à§à¦œà¦¾à¦¤à¦¿à¦•', 1, '2017-10-27 10:59:57'),
(11, 'à¦–à§‡à¦²à¦¾ à¦§à§‚à¦²à¦¾', 'à¦–à§‡à¦²à¦¾-à¦§à§‚à¦²à¦¾', 'à¦–à§‡à¦²à¦¾ à¦§à§‚à¦²à¦¾', 1, '2017-10-27 11:02:41'),
(12, 'à¦¬à¦¿à¦¨à§‹à¦¦à¦¨', 'à¦¬à¦¿à¦¨à§‹à¦¦à¦¨', 'à¦¬à¦¿à¦¨à§‹à¦¦à¦¨', 1, '2017-10-27 11:04:58'),
(13, 'à¦«à¦¿à¦šà¦¾à¦°', 'à¦«à¦¿à¦šà¦¾à¦°', 'à¦«à¦¿à¦šà¦¾à¦°', 1, '2017-10-27 11:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newses`
--

CREATE TABLE `tbl_newses` (
  `news_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `top_news` tinyint(1) NOT NULL,
  `news_title` varchar(150) NOT NULL,
  `news_url` varchar(150) NOT NULL,
  `news_seo_title` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL,
  `news_summery` text NOT NULL,
  `news_details` text NOT NULL,
  `hits` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_title` varchar(150) NOT NULL,
  `category_url` varchar(150) NOT NULL,
  `subcategory_seo_title` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_ncategory`
--
ALTER TABLE `tbl_ncategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_newses`
--
ALTER TABLE `tbl_newses`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ncategory`
--
ALTER TABLE `tbl_ncategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_newses`
--
ALTER TABLE `tbl_newses`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
