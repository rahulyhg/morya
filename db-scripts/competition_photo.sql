-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2013 at 08:09 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `morya`
--

-- --------------------------------------------------------

--
-- Table structure for table `competition_photo`
--

CREATE TABLE IF NOT EXISTS `competition_photo` (
  `comp_id` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `photo_id` int(11) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`comp_id`,`user_id`),
  KEY `photo_id` (`photo_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competition_photo`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `competition_photo`
--
ALTER TABLE `competition_photo`
  ADD CONSTRAINT `competition_photo_ibfk_3` FOREIGN KEY (`photo_id`) REFERENCES `photoes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `competition_photo_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `competition` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `competition_photo_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
