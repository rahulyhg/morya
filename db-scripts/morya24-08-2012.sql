-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2012 at 10:44 AM
-- Server version: 5.6.5-m8
-- PHP Version: 5.4.6-Win64

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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `durvas`
--

CREATE TABLE IF NOT EXISTS `durvas` (
  `user_id` int(11) unsigned DEFAULT NULL,
  `photo_id` int(11) unsigned NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `user_id` int(11) unsigned NOT NULL,
  `login_time` datetime NOT NULL,
  `is_loggedin` tinyint(1) NOT NULL,
  `logout_time` datetime NOT NULL,
  `ip_address` varchar(20) CHARACTER SET ascii NOT NULL,
  `browser_info` text CHARACTER SET ascii NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modaks`
--

CREATE TABLE IF NOT EXISTS `modaks` (
  `comment_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photoes`
--

CREATE TABLE IF NOT EXISTS `photoes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) DEFAULT NULL,
  `description` text,
  `original_name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_size` bigint(20) unsigned zerofill NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

-- --------------------------------------------------------

--
-- Table structure for table `photo_comment`
--

CREATE TABLE IF NOT EXISTS `photo_comment` (
  `photo_id` int(11) unsigned NOT NULL,
  `comment_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`photo_id`,`comment_id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo_hits`
--

CREATE TABLE IF NOT EXISTS `photo_hits` (
  `photo_id` int(11) unsigned NOT NULL,
  `timestamp` datetime NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo_tag`
--

CREATE TABLE IF NOT EXISTS `photo_tag` (
  `photo_id` int(11) unsigned NOT NULL,
  `tag_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`tag_id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pic_of_day`
--

CREATE TABLE IF NOT EXISTS `pic_of_day` (
  `photo_id` int(11) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `category` tinyint(4) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prizes`
--

CREATE TABLE IF NOT EXISTS `prizes` (
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `category` tinyint(4) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recepies`
--

CREATE TABLE IF NOT EXISTS `recepies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `cooking_time` time DEFAULT NULL,
  `ingredients` text,
  `method` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temples`
--

CREATE TABLE IF NOT EXISTS `temples` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `established` year(4) DEFAULT NULL,
  `how_to_go` text NOT NULL,
  `history` text NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temple_photo`
--

CREATE TABLE IF NOT EXISTS `temple_photo` (
  `temple_id` int(11) unsigned NOT NULL,
  `photo_id` int(11) unsigned NOT NULL,
  KEY `temple_id` (`temple_id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `authentication_type` tinyint(3) unsigned zerofill NOT NULL DEFAULT '000',
  `open_id` int(11) unsigned DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `profile_pic` varchar(255) CHARACTER SET ascii DEFAULT NULL,
  `contact` char(11) DEFAULT NULL,
  `ganpati_pic` int(11) unsigned DEFAULT NULL,
  `add_line_1` varchar(255) DEFAULT NULL,
  `add_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `vedics`
--

CREATE TABLE IF NOT EXISTS `vedics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `name_of_god` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `text` text NOT NULL,
  `audio_path` varchar(255) CHARACTER SET ascii DEFAULT NULL,
  `audio_length` double(5,2) DEFAULT NULL,
  `audio_size` bigint(20) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vedic_comment`
--

CREATE TABLE IF NOT EXISTS `vedic_comment` (
  `vedic_id` int(11) unsigned NOT NULL,
  `comment_id` int(11) unsigned NOT NULL,
  KEY `comment_id` (`comment_id`),
  KEY `vedic_id` (`vedic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `durvas`
--
ALTER TABLE `durvas`
  ADD CONSTRAINT `durvas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `durvas_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modaks`
--
ALTER TABLE `modaks`
  ADD CONSTRAINT `modaks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modaks_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photoes`
--
ALTER TABLE `photoes`
  ADD CONSTRAINT `photoes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `photo_comment`
--
ALTER TABLE `photo_comment`
  ADD CONSTRAINT `photo_comment_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `photoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photo_comment_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photo_hits`
--
ALTER TABLE `photo_hits`
  ADD CONSTRAINT `photo_hits_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `photoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photo_hits_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `photo_tag`
--
ALTER TABLE `photo_tag`
  ADD CONSTRAINT `photo_tag_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `photoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photo_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temples`
--
ALTER TABLE `temples`
  ADD CONSTRAINT `temples_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `temple_photo`
--
ALTER TABLE `temple_photo`
  ADD CONSTRAINT `temple_photo_ibfk_1` FOREIGN KEY (`temple_id`) REFERENCES `temples` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `temple_photo_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vedics`
--
ALTER TABLE `vedics`
  ADD CONSTRAINT `vedics_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `vedic_comment`
--
ALTER TABLE `vedic_comment`
  ADD CONSTRAINT `vedic_comment_ibfk_1` FOREIGN KEY (`vedic_id`) REFERENCES `vedics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vedic_comment_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
