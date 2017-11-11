-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: s579.loopia.se
-- Generation Time: Nov 06, 2017 at 08:27 AM
-- Server version: 5.7.20-log
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandinavianmafia_no`
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
  `biltyveri2_sjanse` int(2) NOT NULL,
  `biltyveri3_sjanse` int(2) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biltyveri`
--

INSERT INTO `biltyveri` (`username`, `biltyveri1`, `biltyveri1a`, `biltyveri1_sjanse`, `biltyveri2_sjanse`, `biltyveri3_sjanse`, `id`) VALUES
('dot', '1509952265', '1', 70, 56, 35, 12),
('Netflix', '0', '0', 99, 99, 21, 13),
('Suspected', '1509875749', '1', 40, 44, 24, 14),
('Christoffer', '0', '0', 5, 2, 28, 15),
('Pesca', '0', '0', 70, 26, 35, 16),
('A$AP COCKY', '0', '0', 0, 0, 0, 17),
('ruru', '0', '0', 10, 0, 0, 18),
('caring_bear', '0', '0', 70, 0, 0, 19),
('Antichrist', '0', '0', 0, 0, 1, 20);

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

--
-- Dumping data for table `eiendel`
--

INSERT INTO `eiendel` (`username`, `eiendel1`, `eiendel2`, `eiendel3`, `eiendel4`, `eiendel5`, `eiendel6`, `eiendel7`, `eiendel8`) VALUES
('A$AP COCKY', '0', '0', '0', '0', '0', '0', '0', '0'),
('Antichrist', '0', '0', '0', '0', '0', '0', '0', '0'),
('caring_bear', '1', '1', '1', '1', '0', '0', '0', '0'),
('Christoffer', '1', '1', '1', '1', '0', '0', '0', '0'),
('dot', '1', '1', '0', '0', '0', '0', '0', '0'),
('Netflix', '1', '1', '1', '1', '0', '0', '0', '0'),
('Pesca', '1', '1', '1', '1', '0', '0', '0', '0'),
('ruru', '0', '0', '0', '0', '0', '0', '0', '0'),
('Suspected', '1', '1', '1', '1', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `firma`
--

CREATE TABLE `firma` (
  `username` varchar(55) NOT NULL,
  `ks_eier` varchar(1) NOT NULL DEFAULT '0',
  `ks_vente` varchar(200) NOT NULL DEFAULT '0',
  `ks_ventetid` varchar(200) NOT NULL DEFAULT '0',
  `rd_eier` varchar(1) NOT NULL DEFAULT '0',
  `rd_vente` varchar(200) NOT NULL DEFAULT '0',
  `rd_ventetid` varchar(200) NOT NULL DEFAULT '0',
  `kl_eier` varchar(1) NOT NULL DEFAULT '0',
  `kl_vente` varchar(200) NOT NULL DEFAULT '0',
  `kl_ventetid` varchar(200) NOT NULL DEFAULT '0',
  `os_eier` varchar(1) NOT NULL DEFAULT '0',
  `os_vente` varchar(200) NOT NULL DEFAULT '0',
  `os_ventetid` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firma`
--

INSERT INTO `firma` (`username`, `ks_eier`, `ks_vente`, `ks_ventetid`, `rd_eier`, `rd_vente`, `rd_ventetid`, `kl_eier`, `kl_vente`, `kl_ventetid`, `os_eier`, `os_vente`, `os_ventetid`) VALUES
('A$AP COCKY', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('Antichrist', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('caring_bear', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('Christoffer', '1', '1', '1509740499', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('dot', '1', '1', '1509955555', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('Netflix', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0'),
('Pesca', '1', '1', '1509899870', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('ruru', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('Suspected', '1', '1', '1509657924', '0', '0', '0', '0', '0', '0', '0', '0', '0');

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
('dot', '0', 'Christoffer', 1000000000, 'Suspected', 0, 'Pesca', 0, 'Suspected', 0);

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

--
-- Dumping data for table `krim`
--

INSERT INTO `krim` (`username`, `krim1`, `krim1a`, `krim1_sjanse`, `krim2`, `krim2a`, `krim2_sjanse`, `krim3`, `krim3a`, `krim3_sjanse`, `krim4`, `krim4a`, `krim4_sjanse`, `id`) VALUES
('dot', '1509952407', '1', 85, '0', '0', 35, '0', '0', 15, '0', '0', 75, 29),
('Netflix', '0', '0', 90, '0', '0', 15, '0', '0', 10, '0', '0', 15, 30),
('Suspected', '1509875893', '1', 25, '0', '0', 20, '0', '0', 10, '0', '0', 75, 31),
('Christoffer', '0', '0', 10, '0', '0', 10, '0', '0', 10, '0', '0', 75, 32),
('Pesca', '1509896680', '1', 20, '0', '0', 10, '0', '0', 10, '0', '0', 75, 33),
('A$AP COCKY', '0', '0', 10, '0', '0', 10, '0', '0', 10, '0', '0', 10, 34),
('ruru', '0', '0', 10, '0', '0', 10, '0', '0', 10, '0', '0', 10, 35),
('caring_bear', '0', '0', 50, '0', '0', 10, '0', '0', 10, '0', '0', 30, 36),
('Antichrist', '0', '0', 10, '0', '0', 10, '0', '0', 10, '0', '0', 15, 37);

-- --------------------------------------------------------

--
-- Table structure for table `kulefabrikk`
--

CREATE TABLE `kulefabrikk` (
  `osl_eier` varchar(55) NOT NULL,
  `osl_pris` int(10) NOT NULL,
  `osl_lvl` int(2) NOT NULL,
  `osl_ant_kuler` int(55) NOT NULL,
  `krs_eier` varchar(55) NOT NULL,
  `krs_pris` int(10) NOT NULL,
  `krs_lvl` int(2) NOT NULL,
  `krs_ant_kuler` int(55) NOT NULL,
  `stc_eier` varchar(55) NOT NULL,
  `stc_pris` int(10) NOT NULL,
  `stc_lvl` int(2) NOT NULL,
  `stc_ant_kuler` int(55) NOT NULL,
  `got_eier` varchar(55) NOT NULL,
  `got_pris` int(10) NOT NULL,
  `got_lvl` int(2) NOT NULL,
  `got_ant_kuler` int(55) NOT NULL,
  `kob_eier` varchar(55) NOT NULL,
  `kob_pris` int(10) NOT NULL,
  `kob_lvl` int(2) NOT NULL,
  `kob_ant_kuler` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kulefabrikk`
--

INSERT INTO `kulefabrikk` (`osl_eier`, `osl_pris`, `osl_lvl`, `osl_ant_kuler`, `krs_eier`, `krs_pris`, `krs_lvl`, `krs_ant_kuler`, `stc_eier`, `stc_pris`, `stc_lvl`, `stc_ant_kuler`, `got_eier`, `got_pris`, `got_lvl`, `got_ant_kuler`, `kob_eier`, `kob_pris`, `kob_lvl`, `kob_ant_kuler`) VALUES
('Netflix', 1, 2, 1089, 'dot', 55, 1, 6404, 'dot', 5000, 3, 0, 'dot', 5000, 1, 0, 'dot', 5000, 1, 0);

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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_author`, `news_published`, `news_title`, `news_desc`) VALUES
(1, 'dot', '2017-10-31 18:57:05', 'Da er vi oppe Ã¥ gÃ¥r', '31. Oktober 2017 Ã¥pnet vi fÃ¥r fÃ¸rste offentlige versjon av Scandinavian Mafia. Vi er stolte over Ã¥ endelig kunne lansere denne nyheten og er spent pÃ¥ Ã¥ se hvor det kommer til Ã¥ gÃ¥. \r\n\r\nVi setter stor pris pÃ¥ alle tilbakemeldinger som blir sendt, vennligst send all feedback og ting du trenger hjelp med til support@scandinavianmafia.no\r\n\r\n'),
(2, 'netflix', '2017-11-01 12:33:58', 'Ny link', 'Da er underdomene beta.scandinavianmafia.no oppe og gÃ¥r, gjerne bli vandt til Ã¥ bruke den da domenet scandinavianmafia.no ikke vil vÃ¦re funksjonell fra 03.11.2017'),
(3, 'netflix', '2017-11-05 15:55:57', 'Nye firma', 'Vi har med gleden Ã¥ lansere nye firmaer. Disse har rank-krav og derfor mÃ¥ dere bare ranke i vei! Vi har lansert: rederi, klesproduksjon i Kina og oljeselskap!');

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
  `del` varchar(1) NOT NULL DEFAULT '1',
  `lest` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `message`, `sendto`, `sendfrom`, `time`, `del`, `lest`) VALUES
(137686, 'heil', 'dot', 'Netflix', '2017-11-02 09:21:04', '2', 1),
(137687, 'hei douchebag', 'Netflix', 'dot', '2017-11-02 08:58:43', '2', 1),
(137688, 'hei', 'dot', 'Netflix', '2017-11-02 09:21:04', '2', 1),
(137689, 'come at be bruv\r\n', 'Netflix', 'dot', '2017-11-02 08:58:43', '2', 1),
(137690, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a suscipit tellus. Quisque quis ex risus. Mauris vestibulum purus mi, vel sagittis dui porttitor ut. Quisque convallis ligula turpis, id sodales diam interdum sit amet. Praesent luctus quis metus vitae rutrum. Nam id luctus mi. Duis porta venenatis hendrerit. Pellentesque venenatis dolor turpis, id eleifend diam congue ut. Cras enim odio, blandit ut risus ut, ultrices dapibus ex.\r\n\r\nSed rhoncus luctus ligula in ultricies. Cras orci velit, suscipit vel hendrerit eget, accumsan eget lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla facilisi. Suspendisse non maximus neque, ac maximus dolor. Proin vitae est vel odio fermentum rutrum eu sed tortor. Pellentesque tempus pulvinar sem vel tempus. Donec et urna efficitur diam consectetur sodales sed nec justo. Vivamus venenatis et ligula id tristique. Nulla gravida placerat pulvinar. Nulla egestas in ligula id auctor.\r\n\r\nNunc justo ex, porttitor id accumsan sit amet, rutrum at augue. Phasellus magna sapien, euismod in condimentum vel, bibendum id arcu. Aenean semper suscipit erat, convallis faucibus justo pellentesque a. Maecenas lobortis sapien nec venenatis sollicitudin. Ut egestas augue eget pellentesque posuere. Duis justo massa, tempor et nunc porta, auctor consequat risus. Nulla nisi mauris, semper in quam non, tempus laoreet quam. Sed rhoncus tellus felis, at interdum ligula mollis id. Donec in elit egestas, dignissim lectus vel, euismod est. In in nibh at ligula aliquet placerat semper vitae risus. Suspendisse potenti. Aliquam tincidunt augue id egestas commodo. Vivamus cursus sollicitudin massa, ut congue odio suscipit ac. Vivamus vitae sapien venenatis, bibendum massa a, gravida velit. Aenean at libero venenatis, accumsan lectus eu, posuere leo.\r\n\r\nEtiam laoreet orci eu metus feugiat mollis. Integer molestie arcu non viverra vestibulum. Donec ultricies elit eget scelerisque placerat. Curabitur odio mauris, gravida in lectus sit amet, rhoncus porttitor tellus. Ut rutrum faucibus nisi vel viverra. Integer at tristique purus. Nam lectus nisi, pretium nec vulputate ut, lacinia eget sem. Quisque sed metus sit amet ligula facilisis vulputate. Aenean vel augue sed nisl fermentum rutrum eget vitae ligula. Quisque molestie orci eget turpis placerat, in lobortis risus ultrices. Suspendisse fringilla, sem eget auctor finibus, velit nunc sagittis eros, ac mollis erat arcu sed dui. Nam porttitor maximus leo vitae interdum. Suspendisse ac metus velit. Aliquam cursus suscipit consectetur. Vestibulum sed urna luctus, lacinia magna at, aliquam nisl. Praesent eget nisi vel leo pellentesque pulvinar nec at lectus.\r\n\r\nDuis nec tellus id lorem condimentum facilisis quis nec neque. Nulla dolor turpis, porta et dignissim vitae, semper maximus est. Maecenas et accumsan metus. Donec molestie blandit erat nec efficitur. Donec bibendum vehicula gravida. Nulla vulputate mattis velit, eget sollicitudin urna hendrerit vel. Integer posuere tellus et justo laoreet accumsan. Duis vel blandit diam. Nullam consectetur lacus et massa elementum semper in et lacus.', 'Netflix', 'dot', '2017-11-02 08:58:43', '2', 1),
(137691, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a suscipit tellus. Quisque quis ex risus. Mauris vestibulum purus mi, vel sagittis dui porttitor ut. Quisque convallis ligula turpis, id sodales diam interdum sit amet. Praesent luctus quis metus vitae rutrum. Nam id luctus mi. Duis porta venenatis hendrerit. Pellentesque venenatis dolor turpis, id eleifend diam congue ut. Cras enim odio, blandit ut risus ut, ultrices dapibus ex.\r\n\r\nSed rhoncus luctus ligula in ultricies. Cras orci velit, suscipit vel hendrerit eget, accumsan eget lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla facilisi. Suspendisse non maximus neque, ac maximus dolor. Proin vitae est vel odio fermentum rutrum eu sed tortor. Pellentesque tempus pulvinar sem vel tempus. Donec et urna efficitur diam consectetur sodales sed nec justo. Vivamus venenatis et ligula id tristique. Nulla gravida placerat pulvinar. Nulla egestas in ligula id auctor.\r\n\r\nNunc justo ex, porttitor id accumsan sit amet, rutrum at augue. Phasellus magna sapien, euismod in condimentum vel, bibendum id arcu. Aenean semper suscipit erat, convallis faucibus justo pellentesque a. Maecenas lobortis sapien nec venenatis sollicitudin. Ut egestas augue eget pellentesque posuere. Duis justo massa, tempor et nunc porta, auctor consequat risus. Nulla nisi mauris, semper in quam non, tempus laoreet quam. Sed rhoncus tellus felis, at interdum ligula mollis id. Donec in elit egestas, dignissim lectus vel, euismod est. In in nibh at ligula aliquet placerat semper vitae risus. Suspendisse potenti. Aliquam tincidunt augue id egestas commodo. Vivamus cursus sollicitudin massa, ut congue odio suscipit ac. Vivamus vitae sapien venenatis, bibendum massa a, gravida velit. Aenean at libero venenatis, accumsan lectus eu, posuere leo.\r\n\r\nEtiam laoreet orci eu metus feugiat mollis. Integer molestie arcu non viverra vestibulum. Donec ultricies elit eget scelerisque placerat. Curabitur odio mauris, gravida in lectus sit amet, rhoncus porttitor tellus. Ut rutrum faucibus nisi vel viverra. Integer at tristique purus. Nam lectus nisi, pretium nec vulputate ut, lacinia eget sem. Quisque sed metus sit amet ligula facilisis vulputate. Aenean vel augue sed nisl fermentum rutrum eget vitae ligula. Quisque molestie orci eget turpis placerat, in lobortis risus ultrices. Suspendisse fringilla, sem eget auctor finibus, velit nunc sagittis eros, ac mollis erat arcu sed dui. Nam porttitor maximus leo vitae interdum. Suspendisse ac metus velit. Aliquam cursus suscipit consectetur. Vestibulum sed urna luctus, lacinia magna at, aliquam nisl. Praesent eget nisi vel leo pellentesque pulvinar nec at lectus.\r\n\r\nDuis nec tellus id lorem condimentum facilisis quis nec neque. Nulla dolor turpis, porta et dignissim vitae, semper maximus est. Maecenas et accumsan metus. Donec molestie blandit erat nec efficitur. Donec bibendum vehicula gravida. Nulla vulputate mattis velit, eget sollicitudin urna hendrerit vel. Integer posuere tellus et justo laoreet accumsan. Duis vel blandit diam. Nullam consectetur lacus et massa elementum semper in et lacus.', 'Netflix', 'dot', '2017-11-02 08:58:43', '2', 1),
(137692, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a suscipit tellus. Quisque quis ex risus. Mauris vestibulum purus mi, vel sagittis dui porttitor ut. Quisque convallis ligula turpis, id sodales diam interdum sit amet. Praesent luctus quis metus vitae rutrum. Nam id luctus mi. Duis porta venenatis hendrerit. Pellentesque venenatis dolor turpis, id eleifend diam congue ut. Cras enim odio, blandit ut risus ut, ultrices dapibus ex.\r\n\r\nSed rhoncus luctus ligula in ultricies. Cras orci velit, suscipit vel hendrerit eget, accumsan eget lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla facilisi. Suspendisse non maximus neque, ac maximus dolor. Proin vitae est vel odio fermentum rutrum eu sed tortor. Pellentesque tempus pulvinar sem vel tempus. Donec et urna efficitur diam consectetur sodales sed nec justo. Vivamus venenatis et ligula id tristique. Nulla gravida placerat pulvinar. Nulla egestas in ligula id auctor.\r\n\r\nNunc justo ex, porttitor id accumsan sit amet, rutrum at augue. Phasellus magna sapien, euismod in condimentum vel, bibendum id arcu. Aenean semper suscipit erat, convallis faucibus justo pellentesque a. Maecenas lobortis sapien nec venenatis sollicitudin. Ut egestas augue eget pellentesque posuere. Duis justo massa, tempor et nunc porta, auctor consequat risus. Nulla nisi mauris, semper in quam non, tempus laoreet quam. Sed rhoncus tellus felis, at interdum ligula mollis id. Donec in elit egestas, dignissim lectus vel, euismod est. In in nibh at ligula aliquet placerat semper vitae risus. Suspendisse potenti. Aliquam tincidunt augue id egestas commodo. Vivamus cursus sollicitudin massa, ut congue odio suscipit ac. Vivamus vitae sapien venenatis, bibendum massa a, gravida velit. Aenean at libero venenatis, accumsan lectus eu, posuere leo.\r\n\r\nEtiam laoreet orci eu metus feugiat mollis. Integer molestie arcu non viverra vestibulum. Donec ultricies elit eget scelerisque placerat. Curabitur odio mauris, gravida in lectus sit amet, rhoncus porttitor tellus. Ut rutrum faucibus nisi vel viverra. Integer at tristique purus. Nam lectus nisi, pretium nec vulputate ut, lacinia eget sem. Quisque sed metus sit amet ligula facilisis vulputate. Aenean vel augue sed nisl fermentum rutrum eget vitae ligula. Quisque molestie orci eget turpis placerat, in lobortis risus ultrices. Suspendisse fringilla, sem eget auctor finibus, velit nunc sagittis eros, ac mollis erat arcu sed dui. Nam porttitor maximus leo vitae interdum. Suspendisse ac metus velit. Aliquam cursus suscipit consectetur. Vestibulum sed urna luctus, lacinia magna at, aliquam nisl. Praesent eget nisi vel leo pellentesque pulvinar nec at lectus.\r\n\r\nDuis nec tellus id lorem condimentum facilisis quis nec neque. Nulla dolor turpis, porta et dignissim vitae, semper maximus est. Maecenas et accumsan metus. Donec molestie blandit erat nec efficitur. Donec bibendum vehicula gravida. Nulla vulputate mattis velit, eget sollicitudin urna hendrerit vel. Integer posuere tellus et justo laoreet accumsan. Duis vel blandit diam. Nullam consectetur lacus et massa elementum semper in et lacus.', 'Netflix', 'dot', '2017-11-02 08:58:43', '2', 1),
(137693, 'Helluuuu', 'Netflix', 'Pesca', '2017-11-02 08:58:43', '2', 1),
(137694, 'Im gon kill u', 'dot', 'Pesca', '2017-11-02 09:21:04', '2', 1),
(137695, 'Im gon kill u', 'Netflix', 'Pesca', '2017-11-02 08:58:43', '2', 1),
(137696, 'rude', 'Pesca', 'Netflix', '2017-11-02 08:57:30', '1', 1),
(137697, 'Make me owner of bulletfabric', 'Netflix', 'Pesca', '2017-11-02 08:58:43', '2', 1),
(137698, 'Com on', 'Netflix', 'Pesca', '2017-11-02 08:58:43', '2', 1),
(137699, 'It\'s not even scripted fam ;_;', 'Pesca', 'Netflix', '2017-11-02 08:58:26', '1', 1),
(137700, 'Plz fam', 'Netflix', 'Pesca', '2017-11-02 09:22:27', '2', 1),
(137701, 'I can do this i promise', 'Netflix', 'Pesca', '2017-11-02 09:22:27', '2', 1),
(137702, 'I will make you monez', 'Netflix', 'Pesca', '2017-11-02 09:22:27', '2', 1),
(137703, 'Thank you fam, im zo happey noaaaw', 'Netflix', 'Pesca', '2017-11-02 09:22:27', '2', 1),
(137704, 'np', 'Pesca', 'Netflix', '2017-11-02 08:58:26', '1', 1),
(137705, 'dsadsa', 'Netflix', 'dot', '2017-11-02 09:22:27', '2', 1),
(137706, 'jhe', 'dot', 'Netflix', '2017-11-02 09:38:36', '2', 1),
(137707, 'lol\r\n', 'Netflix', 'dot', '2017-11-02 09:22:27', '2', 1),
(137708, 'test', 'Pesca', 'dot', '2017-11-02 09:22:44', '1', 1),
(137709, 'test', 'Pesca', '', '2017-11-02 09:26:02', '1', 1),
(137710, 'test', 'Netflix', 'dot', '2017-11-02 17:17:24', '2', 1),
(137711, 'test', 'Pesca', 'dot', '2017-11-02 09:26:02', '1', 1),
(137712, 'test', 'dot', 'Netflix', '2017-11-02 09:38:36', '2', 1),
(137713, 'test', 'Netflix', 'dot', '2017-11-02 17:17:24', '2', 1),
(137714, 'lol du suge', 'dot', 'Netflix', '2017-11-02 10:40:04', '2', 1),
(137715, 'hei', 'Netflix', 'dot', '2017-11-02 17:17:23', '2', 1),
(137716, 'Test', 'Pesca', 'dot', '2017-11-02 13:05:36', '1', 1),
(137717, 'hey bae', 'dot', 'Pesca', '2017-11-02 18:16:25', '2', 1),
(137718, 'hey, driver Ã¥ fikser pÃ¥ administrasjon av kulefabrikk sÃ¥ den funker ikke sÃ¥ bra atm', 'Pesca', 'dot', '2017-11-02 13:08:09', '1', 1),
(137719, '__â—__ â—\r\n _ â–ˆ___â–ˆ\r\n __ â–ˆ__ â–ˆ_\r\n __ â–ˆ__ â–ˆ\r\n __ â–ˆâ–ˆâ–ˆ____________â–ˆâ–ˆâ–ˆâ–ˆâ–ˆ ã€€ã€€ã€€\r\n _â–ˆâ–’â–‘â–‘â–ˆ_________â–ˆâ–ˆâ–“â–’â–’â–“â–ˆâ–ˆ â˜†\r\n â–ˆâ–’â–‘â—â–‘â–‘â–ˆ___ â–ˆâ–ˆâ–“â–’â–ˆâ–ˆâ–“â–’â–’â–“â–ˆã€€ã€€ â˜…\r\n â–ˆâ–‘â–ˆâ–’â–‘â–‘â–ˆâ–ˆ_ â–ˆâ–ˆâ–“â–’â–ˆâ–ˆâ–“â–’â–‘â–’â–“â–ˆ\r\n _â–ˆâ–ˆâ–’â–‘â–‘â–ˆâ–ˆ â–ˆâ–ˆâ–“â–’â–‘â–ˆâ–ˆâ–“â–’â–‘â–’â–“â–ˆ ã€€ã€€ã€€â˜…\r\n ____â–ˆâ–’â–‘â–ˆâ–ˆ â–ˆâ–ˆâ–“â–’â–‘â–‘ â–ˆâ–ˆâ–ˆâ–ˆâ–“â–ˆ\r\n ___â–ˆâ–’â–‘â–ˆâ–ˆ__â–ˆâ–ˆâ–“â–“â–’â–’â–‘â–‘â–‘â–ˆâ–ˆ ã€€ â˜…â˜…\r\n ____â–ˆâ–’â–‘â–ˆâ–ˆ___â–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆ\r\n _____â–ˆâ–’â–‘â–ˆâ–’â–’â–’â–’â–’â–’â–’â–’â–’â–’â–’â–’â–ˆ\r\n ______â–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆâ–ˆ.â€¢Â°*â€ËœÒˆ.â€¢Â°*â€ËœÒˆ.\r\n', 'dot', 'Pesca', '2017-11-02 18:16:24', '2', 1),
(137720, 'oki', 'dot', 'Pesca', '2017-11-02 18:16:23', '2', 1),
(137721, 'fin snegle', 'Pesca', 'dot', '2017-11-02 13:08:57', '1', 1),
(137722, 'thank you =)', 'dot', 'Pesca', '2017-11-02 18:16:23', '2', 1),
(137723, 'Fette noob xd', 'Suspected', 'Netflix', '2017-11-02 13:28:51', '1', 1),
(137724, 'fuk off mom im 12', 'Netflix', 'Suspected', '2017-11-02 17:17:23', '2', 1),
(137725, 'Hei du og velkommen til det mest fancy og ettertraktete spillet noen gang, dette er Lesh og Co sin utgave av et nettbasert spel, lolz enjoy.. \r\n\r\nPS JOIN DISCORD!!', 'Suspected', 'dot', '2017-11-02 18:28:58', '1', 1),
(137726, 'Kanskje fÃ¥ til en \"send pm\" knapp etter nicket pÃ¥ profilen?', 'dot', 'Netflix', '2017-11-02 18:16:22', '2', 1),
(137727, 'Kanskje det, driver Ã¥ facker rundt med oppgradering knappen nÃ¥ men det funker maen meg ikke, nettsiden velger bare Ã¥ ikke funkere i stedenfor. :( ', 'Netflix', 'dot', '2017-11-02 17:17:00', '1', 1),
(137728, 'Hva er det som ikke funker?', 'dot', 'Netflix', '2017-11-02 18:16:22', '2', 1),
(137729, 'hei\r\n', 'dot', 'ruru', '2017-11-02 18:16:20', '2', 1),
(137730, 'Hello! :) ', 'ruru', 'dot', '2017-11-02 18:16:16', '1', 0),
(137731, 'gg med gjenoppliving  ', 'Christoffer', 'Suspected', '2017-11-02 20:21:47', '2', 1),
(137732, 'Hvordan er fÃ¸rsteinntrykket? :P', 'caring_bear', 'Netflix', '2017-11-03 12:00:37', '1', 1),
(137733, 'Er stuck i Kristiansand. ;( ;( ;( ;( ;(', 'Netflix', 'caring_bear', '2017-11-03 16:06:08', '1', 1),
(137734, 'Ikke nÃ¥ lenger for Jonas \"fiksa\" det. Osloooo<3', 'Netflix', 'caring_bear', '2017-11-03 16:06:08', '1', 1),
(137735, 'Ã˜nsker du Ã¥ fÃ¥ tilbake eierskap Ã¸nsker vi gjerne at du blir en del av Discord gruppen slik at vi fÃ¥r tilbakemeldingene vi trenger. \r\n\r\nMvh\r\ndot', 'Christoffer', 'dot', '2017-11-03 16:11:00', '1', 1),
(137736, 'Nor stuck i krsand och fuck liven', 'caring_bear', 'Netflix', '2017-11-03 18:38:15', '1', 1),
(137737, 'link?', 'dot', 'Christoffer', '2017-11-03 19:16:57', '1', 1),
(137738, 'link til discord chat? :)', 'Netflix', 'Christoffer', '2017-11-03 16:17:14', '1', 1),
(137739, 'https://discord.gg/WxfUeY', 'Christoffer', 'Netflix', '2017-11-03 16:19:51', '1', 1),
(137740, 'funket ikke?', 'Netflix', 'Christoffer', '2017-11-03 17:09:24', '1', 1),
(137741, 'Uhm, spÃ¸r dot, haha', 'Christoffer', 'Netflix', '2017-11-03 17:27:02', '1', 1),
(137742, 'https://discord.gg/4bkNMx', 'Christoffer', 'dot', '2017-11-03 19:18:44', '1', 1);

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
('Christoffer', 1000000, 'Christoffer', 10000000, 'Suspected', 10000, 'Christoffer', 10000, 'Christoffer', 1000000);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profilinfo`, `username`, `account_type`, `lastactive`, `password`, `money`, `bank_money`, `exp`, `rank`, `health`, `email`, `img`, `banner_img`, `kuler`, `ant_drap`, `vapen`, `bil`, `house_type`, `protect_type`, `city`, `support`, `newmail`, `messages`) VALUES
(3081, '[center][size=20][b]Velkommen til min profil[/b][/size][/center]\r\n\r\n[center][i]â€œNo one will ever kill me, they wouldnâ€™t dareâ€ ~ Carmine Galante\r\n\r\n[/i][/center]\r\n\r\n[center][img]https://media.giphy.com/media/NMqW4abjShaQ8/giphy.gif[/img]\r\n[/center]\r\n\r\n\r\n[center]Du utpresset Pesca for 544 142,-[/center]', 'dot', '3', '2017-11-06 08:06:38', '4606f680f2405ac8d26aacf297884184', '0', '507675551.19868157251', '273245', '8', '100', 'dot@dot.dot', 'http://haytham-hacker.e-monsite.com/medias/images/206507-555607654467467-1486910054-n.jpg', 'images/profiles/header.png', 2312312, 3, 'AWP', 'Rolls Royce', 4, 4, 'Oslo', '', '0', '21'),
(3082, '[color=#0f0e0e]<3<3<3<3[/color]Velkommen til min profil.\r\n\r\n[color=#0f0e0e]<3<3<3<3[/color]Mitt navn er Lars Fredrik og jeg er medeier av Scandinavian Mafia\r\n[color=#0f0e0e]<3<3<3<3[/color]Det betyr at det er mitt og dot sitt ansvar at spillet gÃ¥r som det skal.\r\n\r\n[color=#0f0e0e]<3<3<3<3[/color]Om du har noen spÃ¸rsmÃ¥l sÃ¥ send meg en mail pÃ¥ support@scandinavianmafia.no\r\n\r\n[color=#0f0e0e]https://i.imgur.com/f98YFHo.png[/color]\r\n\r\nklllllllllllllhjklllllllllllllhjhjklllllllllllllhjhjklllllllllllllhjhjklllllllllllllhjhjklllllllllllllhjhjklllllllllllllhjhjklllllllllllllhjhjklllllllllllllhjhjklllllllllllllhjhjklllllllllllllhjhjklllllllllllllhj\r\n\r\n', 'Netflix', '3', '2017-11-06 08:26:28', '21c603dbf852f78063f98674640ab339', '0', '23132113793163', '299529', '8', '100', 'lars.fr.97@hotmail.com', 'https://images.genius.com/ee0d261d77936566084ea67113e740c5.750x750x1.jpg', 'images/profiles/header.png', 2908, 1337, 'Bazooka', 'Tesla Model S', 4, 4, 'Oslo', '', '0', '15'),
(3083, '[center]=)\r\n\r\n[img]https://i.imgur.com/DQ8qf1d.jpg[/img][img]https://i.imgur.com/8PPrg7N.png[/img]\r\n[/center]', 'Suspected', '2', '2017-11-05 10:51:13', '18808f662d22140ee8aa963de378e079', '0', '99998833204250452406.64', '42319', '3', '100', 'o97@outlook.com', 'https://i.imgur.com/Bq4zyoT_d.jpg?maxwidth=640&shape=thumb&fidelity=medium', 'images/profiles/header.png', 2147483647, 0, 'Bazooka', 'Rolls Royce', 4, 4, 'KÃ¸benhavn', '', '0', '2'),
(3084, '\r\n', 'Christoffer', '1', '2017-11-04 22:43:43', '0c01d052cae944b745a197b3ea43f466', '139417.752279450', '3005192756.570590662', '46355', '3', '100', 'Chb2001@live.no', 'images/profiles/avatar.png', 'images/profiles/header.png', 2147483647, 0, 'Bazooka', 'Rolls Royce', 4, 4, 'Kristiansand', '', '0', '3'),
(3088, '', 'caring_bear', '1', '2017-11-03 19:38:24', 'b9fe6a9509412b6472ce6460fdbdad5b', '48000', '0', '1620', '1', '100', 'bjorn_harbo_dahle@hotmail.com', 'images/profiles/avatar.png', 'images/profiles/header.png', 520, 0, 'Kniv', 'VW Golf R32', 1, 1, 'Oslo', '', '0', '2'),
(3085, '', 'Pesca', '1', '2017-11-05 16:42:28', '424eb7446cd5cdc63370d793d205e7b9', '0', '1001114329.728', '26345', '3', '100', 'pesca@hotmail.com', 'https://68.media.tumblr.com/6eb7f282703094055e410e1b1382d4ee/tumblr_ngya2zbGhm1so1g8io1_500.jpg', 'images/profiles/header.png', 30, 0, 'Bazooka', 'Rolls Royce', 3, 3, 'GÃ¶teborg', '', '0', '13'),
(3086, '', 'A$AP COCKY', '2', '2017-11-01 13:49:24', '0493cf983f5edbd1377774acd5c1e445', '44400', '0', '1', '0', '100', 'lars.fredrik@hotmail.com', 'images/profiles/avatar.png', 'images/profiles/header.png', 0, 0, 'SlÃ¥sshansker', 'Busskort', 0, 0, 'Oslo', '', '1', '0'),
(3087, '', 'ruru', '1', '2017-11-02 19:20:23', 'a3d722da0bca1ffa247ce88851e2b6eb', '55500', '0', '1', '0', '100', 'ruru.chester@gmail.com', 'images/profiles/avatar.png', 'images/profiles/header.png', 0, 0, 'SlÃ¥sshansker', 'Busskort', 0, 0, 'Oslo', '', '0', '1'),
(3089, '', 'Antichrist', '1', '2017-11-04 22:21:31', 'a4642c7624c95387244e8c07775f82c0', '55500', '0', '1', '0', '100', 'audunhilden@live.no', 'images/profiles/avatar.png', 'images/profiles/header.png', 0, 0, 'SlÃ¥sshansker', 'Busskort', 0, 0, 'Oslo', '', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `utpressning`
--

CREATE TABLE `utpressning` (
  `username` varchar(50) NOT NULL,
  `utpressning1` varchar(255) NOT NULL,
  `utpressning1a` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utpressning`
--

INSERT INTO `utpressning` (`username`, `utpressning1`, `utpressning1a`) VALUES
('A$AP COCKY', '0', '0'),
('Antichrist', '0', '0'),
('caring_bear', '0', '0'),
('Christoffer', '0', '0'),
('dot', '1509952117', '1'),
('Netflix', '0', '0'),
('Pesca', '1509896600', '1'),
('ruru', '0', '0'),
('Suspected', '0', '0');

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
-- Indexes for table `firma`
--
ALTER TABLE `firma`
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
-- Indexes for table `kulefabrikk`
--
ALTER TABLE `kulefabrikk`
  ADD PRIMARY KEY (`osl_eier`);

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
-- Indexes for table `utpressning`
--
ALTER TABLE `utpressning`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biltyveri`
--
ALTER TABLE `biltyveri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `krim`
--
ALTER TABLE `krim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pm`
--
ALTER TABLE `pm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137743;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3090;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
