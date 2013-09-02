-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2013 at 06:17 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `morya`
--

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE IF NOT EXISTS `maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lat` varchar(200) NOT NULL,
  `long` varchar(200) NOT NULL,
  `temp_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `temp_id` (`temp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `lat`, `long`, `temp_id`) VALUES
(1, '19.10076904074225', '72.89425492286682', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maps`
--
ALTER TABLE `maps`
  ADD CONSTRAINT `maps_ibfk_1` FOREIGN KEY (`temp_id`) REFERENCES `temples` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
