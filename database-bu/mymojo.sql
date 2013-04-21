-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2013 at 07:40 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mymojo`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_contact`
--

CREATE TABLE IF NOT EXISTS `client_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `client_contact`
--

INSERT INTO `client_contact` (`id`, `first_name`, `last_name`, `username`, `created_at`, `updated_at`) VALUES
(1, 'Francois', 'Buys', 'buys.fran@gmail.com', '2013-03-07 08:00:00', '2013-04-08 11:38:49'),
(2, 'Brendon Louis', 'Venter', 'blv69@gmail.com', '2013-03-07 16:00:00', '2013-04-07 19:42:17'),
(3, 'Amanda', 'Buys', 'smiley.manna@gmail.com', '0000-00-00 00:00:00', '2013-03-20 15:03:53'),
(5, 'Lezandri', 'Buys', 'lzndri3@yahoo.com', '0000-00-00 00:00:00', '2013-03-20 21:05:14'),
(6, 'James', 'Biddlecomb', 'james@afrihost.com', '0000-00-00 00:00:00', '2013-03-20 20:07:34'),
(7, 'Warren', 'Clifton', 'warrenc@afrihost.com', '0000-00-00 00:00:00', '2013-03-20 20:07:53'),
(8, 'Bob', 'Thebuilder', 'thebuilder.co.za', '0000-00-00 00:00:00', '2013-03-27 10:36:35'),
(9, 'Barbie', 'vd Westhuizen', 'barbie.co.za', '0000-00-00 00:00:00', '2013-03-27 10:49:35'),
(10, 'Louis', 'Venter', 'l@venter.com', '0000-00-00 00:00:00', '2013-04-07 13:03:52'),
(11, 'Blistex', 'DCT', 'blistex@blistex.com', '0000-00-00 00:00:00', '2013-04-07 14:02:43'),
(12, 'Clover', 'Water', 'water@clover.com', '0000-00-00 00:00:00', '2013-04-07 19:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `client_product`
--

CREATE TABLE IF NOT EXISTS `client_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_contact_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `client_product`
--

INSERT INTO `client_product` (`id`, `client_contact_id`, `product_id`, `created_at`, `updated_at`) VALUES
(24, 2, 49, '2013-03-13 22:21:25', '2013-03-13 22:21:25'),
(30, 2, 66, '2013-03-13 22:33:47', '2013-03-13 22:33:47'),
(32, 1, 68, '2013-03-14 10:25:09', '2013-03-14 10:25:09'),
(33, 1, 69, '2013-03-14 21:41:25', '2013-03-14 21:41:25'),
(35, 5, 71, '2013-03-20 21:03:17', '2013-03-20 21:03:17'),
(36, 0, 72, '2013-04-07 14:58:21', '2013-04-07 14:58:21'),
(37, 0, 74, '2013-04-07 14:59:36', '2013-04-07 14:59:36'),
(38, 0, 75, '2013-04-07 15:00:33', '2013-04-07 15:00:33'),
(39, 0, 76, '2013-04-07 15:01:21', '2013-04-07 15:01:21'),
(40, 11, 79, '2013-04-07 15:18:05', '2013-04-07 15:18:05'),
(41, 11, 80, '2013-04-07 17:12:56', '2013-04-07 17:12:56'),
(43, 12, 82, '2013-04-07 19:44:45', '2013-04-07 19:44:45'),
(44, 1, 83, '2013-04-08 11:41:07', '2013-04-08 11:41:07'),
(45, 1, 84, '2013-04-08 11:41:18', '2013-04-08 11:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `dnscluster`
--

CREATE TABLE IF NOT EXISTS `dnscluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `ttl` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `dnscluster`
--

INSERT INTO `dnscluster` (`id`, `record`, `type`, `priority`, `ttl`, `content`, `created_at`, `updated_at`) VALUES
(40, 'mail.worldmusicfans.com', 'A', 0, 600, '172.0.0.0', '2013-04-07 16:53:55', '2013-04-07 16:53:55'),
(41, 'worldmuscifans.com', 'A', 0, 600, '172.0.0.0', '2013-04-07 17:02:16', '2013-04-07 17:02:16'),
(42, '*.worldmusicfans.com', 'A', 0, 600, '172.0.0.0', '2013-04-07 17:02:47', '2013-04-07 17:02:47'),
(44, 'ftp.blistex.co', 'A', 0, 7200, '172.0.1.1', '2013-04-07 17:04:27', '2013-04-08 11:59:15'),
(50, 'mail.blistex.com', 'A', 0, 60, '172.0.0.0', '2013-04-07 17:13:19', '2013-04-07 19:24:03'),
(55, 'ftp.ece.com', 'A', 0, 60, '172.0.0.0', '2013-04-07 19:42:38', '2013-04-07 19:44:00'),
(57, 'www.ok8.co.za', 'A', 0, 60, '172.0.0.0', '2013-04-07 19:46:07', '2013-04-07 19:46:07'),
(58, 'mail.ok8.co.za', 'A', 0, 60, '172.0.0.0', '2013-04-07 19:46:22', '2013-04-07 19:46:22'),
(59, '*.ok8.co.za', 'A', 0, 60, '172.0.0.0', '2013-04-07 19:46:45', '2013-04-07 19:46:45'),
(60, 'ftp.ok8.co.za', 'A', 0, 60, '172.0.0.0', '2013-04-07 19:47:07', '2013-04-07 19:47:07'),
(61, 'ok8.co.za', 'NS', 0, 7200, 'ns.dns1.co.za', '2013-04-07 19:47:32', '2013-04-07 19:47:32'),
(62, 'ok8.co.za', 'NS', 0, 7200, 'ns.dns2.co.za', '2013-04-07 19:47:48', '2013-04-07 19:47:48'),
(64, 'ok8.co.za', 'NS', 0, 7200, 'ns.otherdns.net', '2013-04-07 19:49:57', '2013-04-07 19:49:57'),
(65, 'cpanel.ok8.co.za', 'A', 0, 600, '172.0.0.0', '2013-04-08 11:42:22', '2013-04-08 11:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `group` varchar(100) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `group`, `vendor`, `created_at`, `updated_at`) VALUES
(49, 'worldmusicfans.com', 'Hosting', 'Uniform', '2013-03-13 22:21:25', '2013-03-13 22:21:25'),
(66, 'ece.com', 'Hosting', 'Opensrs', '2013-03-13 22:33:47', '2013-03-13 22:33:47'),
(69, 'ok8.co.za', 'Hosting', 'Uniform', '2013-03-14 21:41:25', '2013-03-14 21:41:25'),
(71, 'up.ac.za', 'Hosting', 'Opensrs', '2013-03-20 21:03:17', '2013-03-20 21:03:17'),
(79, 'blistex.co.za', 'Hosting', 'Uniform', '2013-04-07 15:18:05', '2013-04-07 15:18:05'),
(80, 'blistex.com', 'Hosting', 'Opensrs', '2013-04-07 17:12:56', '2013-04-07 17:12:56'),
(82, 'clover.com', 'Hosting', 'Opensrs', '2013-04-07 19:44:45', '2013-04-07 19:44:45'),
(83, 'googl.co.za', 'Hosting', 'Uniform', '2013-04-08 11:41:07', '2013-04-08 11:41:07'),
(84, 'google.co.za', 'Hosting', 'Uniform', '2013-04-08 11:41:18', '2013-04-08 11:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_dns`
--

CREATE TABLE IF NOT EXISTS `product_dns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dns_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dns_id` (`dns_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `product_dns`
--

INSERT INTO `product_dns` (`id`, `dns_id`, `product_id`, `created_at`, `updated_at`) VALUES
(41, 40, 49, '2013-04-07 16:53:55', '2013-04-07 16:53:55'),
(42, 41, 49, '2013-04-07 17:02:16', '2013-04-07 17:02:16'),
(43, 42, 49, '2013-04-07 17:02:47', '2013-04-07 17:02:47'),
(45, 44, 79, '2013-04-07 17:04:27', '2013-04-07 17:04:27'),
(46, 45, 79, '2013-04-07 17:04:42', '2013-04-07 17:04:42'),
(47, 46, 79, '2013-04-07 17:05:02', '2013-04-07 17:05:02'),
(48, 47, 79, '2013-04-07 17:07:20', '2013-04-07 17:07:20'),
(49, 48, 79, '2013-04-07 17:08:53', '2013-04-07 17:08:53'),
(51, 50, 80, '2013-04-07 17:13:19', '2013-04-07 17:13:19'),
(56, 55, 66, '2013-04-07 19:42:38', '2013-04-07 19:42:38'),
(58, 57, 69, '2013-04-07 19:46:07', '2013-04-07 19:46:07'),
(59, 58, 69, '2013-04-07 19:46:22', '2013-04-07 19:46:22'),
(60, 59, 69, '2013-04-07 19:46:45', '2013-04-07 19:46:45'),
(61, 60, 69, '2013-04-07 19:47:07', '2013-04-07 19:47:07'),
(62, 61, 69, '2013-04-07 19:47:32', '2013-04-07 19:47:32'),
(63, 62, 69, '2013-04-07 19:47:48', '2013-04-07 19:47:48'),
(65, 64, 69, '2013-04-07 19:49:57', '2013-04-07 19:49:57'),
(66, 65, 69, '2013-04-08 11:42:22', '2013-04-08 11:42:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
