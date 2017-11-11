-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 09:14 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mafiagamev2`
--

-- --------------------------------------------------------

--
-- Table structure for table `biltyveri`
--

CREATE TABLE `biltyveri` (
  `username` text NOT NULL,
  `biltyveri1` varchar(200) NOT NULL,
  `biltyveri1a` varchar(200) NOT NULL,
  `biltyveri1_sjanse` int(2) NOT NULL,
  `biltyveri2` varchar(200) NOT NULL,
  `biltyveri2a` varchar(200) NOT NULL,
  `biltyveri2_sjanse` int(2) NOT NULL,
  `biltyveri3` varchar(200) NOT NULL,
  `biltyveri3a` varchar(200) NOT NULL,
  `biltyveri3_sjanse` int(2) NOT NULL,
  `biltyveri4` varchar(200) NOT NULL,
  `biltyveri4a` varchar(200) NOT NULL,
  `biltyveri4_sjanse` int(2) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eiendel`
--

CREATE TABLE `eiendel` (
  `username` varchar(50) NOT NULL,
  `eiendel1` varchar(1) NOT NULL DEFAULT '0',
  `eiendel2` varchar(1) NOT NULL DEFAULT '0',
  `eiendel3` varchar(1) NOT NULL DEFAULT '0',
  `eiendel4` varchar(1) NOT NULL DEFAULT '0',
  `eiendel5` varchar(1) NOT NULL DEFAULT '0',
  `eiendel6` varchar(1) NOT NULL DEFAULT '0',
  `eiendel7` varchar(1) NOT NULL DEFAULT '0',
  `eiendel8` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flyplass`
--

CREATE TABLE `flyplass` (
  `osl_eier` varchar(55) NOT NULL,
  `osl_pris` varchar(20) NOT NULL,
  `krs_eier` varchar(55) NOT NULL,
  `krs_pris` int(20) NOT NULL,
  `stc_eier` varchar(55) NOT NULL,
  `stc_pris` int(20) NOT NULL,
  `got_eier` varchar(55) NOT NULL,
  `got_pris` int(20) NOT NULL,
  `kob_eier` varchar(55) NOT NULL,
  `kob_pris` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flyplass`
--

INSERT INTO `flyplass` (`osl_eier`, `osl_pris`, `krs_eier`, `krs_pris`, `stc_eier`, `stc_pris`, `got_eier`, `got_pris`, `kob_eier`, `kob_pris`) VALUES
('STATEN', 15000, 'STATEN', 15000, 'STATEN', 15000, 'STATEN', 15000, 'STATEN', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `garasje`
--

CREATE TABLE `garasje` (
  `username` varchar(50) NOT NULL,
  `bil1` varchar(1) NOT NULL,
  `bil2` varchar(1) NOT NULL,
  `bil3` varchar(1) NOT NULL,
  `bil4` varchar(1) NOT NULL,
  `bil5` varchar(1) NOT NULL,
  `bil6` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `krim`
--

CREATE TABLE `krim` (
  `username` text NOT NULL,
  `krim1` varchar(200) NOT NULL DEFAULT '0',
  `krim1a` varchar(200) NOT NULL DEFAULT '0',
  `krim1_sjanse` int(2) NOT NULL DEFAULT '10',
  `krim2` varchar(200) NOT NULL DEFAULT '0',
  `krim2a` varchar(200) NOT NULL DEFAULT '0',
  `krim2_sjanse` int(2) NOT NULL DEFAULT '10',
  `krim3` varchar(200) NOT NULL DEFAULT '0',
  `krim3a` varchar(200) NOT NULL DEFAULT '0',
  `krim3_sjanse` int(2) NOT NULL DEFAULT '10',
  `krim4` varchar(200) NOT NULL DEFAULT '0',
  `krim4a` varchar(200) NOT NULL DEFAULT '0',
  `krim4_sjanse` int(2) NOT NULL DEFAULT '10',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(100) NOT NULL,
  `news_author` varchar(255) NOT NULL,
  `news_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_title` varchar(255) NOT NULL,
  `news_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sendto` varchar(20) NOT NULL DEFAULT '',
  `sendfrom` varchar(20) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `del` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `privatklinikk`
--

CREATE TABLE `privatklinikk` (
  `pk_osl_eier` varchar(55) NOT NULL,
  `pk_osl_pris` int(20) NOT NULL,
  `pk_krs_eier` varchar(55) NOT NULL,
  `pk_krs_pris` int(20) NOT NULL,
  `pk_stc_eier` varchar(55) NOT NULL,
  `pk_stc_pris` int(20) NOT NULL,
  `pk_got_eier` varchar(55) NOT NULL,
  `pk_got_pris` int(20) NOT NULL,
  `pk_kob_eier` varchar(55) NOT NULL,
  `pk_kob_pris` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privatklinikk`
--

INSERT INTO `privatklinikk` (`pk_osl_eier`, `pk_osl_pris`, `pk_krs_eier`, `pk_krs_pris`, `pk_stc_eier`, `pk_stc_pris`, `pk_got_eier`, `pk_got_pris`, `pk_kob_eier`, `pk_kob_pris`) VALUES
('STATEN', 10000, 'STATEN', 10000, 'STATEN', 10000, 'STATEN', 10000, 'STATEN', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profilinfo` text NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `account_type` char(1) NOT NULL DEFAULT '1',
  `lastactive` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '',
  `money` varchar(20) NOT NULL DEFAULT '55500',
  `bank_money` varchar(255) NOT NULL DEFAULT '0',
  `exp` varchar(20) NOT NULL DEFAULT '1',
  `rank` char(2) NOT NULL DEFAULT '0',
  `health` char(3) NOT NULL DEFAULT '100',
  `email` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'images/profiles/avatar.png',
  `banner_img` varchar(255) NOT NULL DEFAULT 'images/profiles/header.png',
  `kuler` int(11) NOT NULL,
  `ant_drap` int(6) NOT NULL,
  `vapen` text NOT NULL,
  `bil` text NOT NULL,
  `house_type` int(11) NOT NULL,
  `protect_type` int(11) NOT NULL,
  `city` text NOT NULL,
  `support` text NOT NULL,
  `newmail` char(1) NOT NULL DEFAULT '1',
  `messages` varchar(9) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biltyveri`
--
ALTER TABLE `biltyveri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eiendel`
--
ALTER TABLE `eiendel`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `flyplass`
--
ALTER TABLE `flyplass`
  ADD PRIMARY KEY (`osl_eier`);

--
-- Indexes for table `garasje`
--
ALTER TABLE `garasje`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `krim`
--
ALTER TABLE `krim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privatklinikk`
--
ALTER TABLE `privatklinikk`
  ADD PRIMARY KEY (`pk_osl_eier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biltyveri`
--
ALTER TABLE `biltyveri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `krim`
--
ALTER TABLE `krim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pm`
--
ALTER TABLE `pm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137686;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3081;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
