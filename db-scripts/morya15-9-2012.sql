-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2012 at 12:14 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `photo_id` int(11) unsigned NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comments`
--


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

--
-- Dumping data for table `durvas`
--


-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `comment_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`comment_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--


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

--
-- Dumping data for table `logins`
--


-- --------------------------------------------------------

--
-- Table structure for table `photoes`
--

CREATE TABLE IF NOT EXISTS `photoes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(2) unsigned NOT NULL DEFAULT '0',
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
  KEY `user_id` (`user_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `photoes`
--


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

--
-- Dumping data for table `photo_comment`
--


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

--
-- Dumping data for table `photo_hits`
--


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

--
-- Dumping data for table `photo_tag`
--


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

--
-- Dumping data for table `pic_of_day`
--


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

--
-- Dumping data for table `prizes`
--


-- --------------------------------------------------------

--
-- Table structure for table `recepies`
--

CREATE TABLE IF NOT EXISTS `recepies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(30) NOT NULL,
  `type` tinyint(3) unsigned zerofill NOT NULL DEFAULT '000',
  `title` varchar(50) NOT NULL,
  `cooking_time` time DEFAULT NULL,
  `ingredients` text,
  `method` text NOT NULL,
  `primary_pic` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recepies`
--

INSERT INTO `recepies` (`id`, `slug`, `type`, `title`, `cooking_time`, `ingredients`, `method`, `primary_pic`, `user_id`, `created`, `modified`) VALUES
(3, 'उकडीचे-मोदक', 000, 'उकडीचे मोदक', '00:00:10', ' एक वाटी स्वच्छ तांदूळ धुऊन, सावलीत वाळवून<br />\r\nदळून चाळलेली पिठी<br />\r\nएक वाटी साखर किंवा गूळ<br />\r\nएक नारळ<br />\r\nदोन चमचे तूप<br />\r\nवेलची पूड<br />\r\nतेल<br />\r\nआवडत असल्यास भाजून कुटलेली अर्धी वाटी खसखस पूड.', 'सारण: खोवलेल्या नारळाच्या चवात साखर किंवा गूळ घालून मंद आचेवर शिजत ठेवावे. शिजत असताना मधून मधून हलवावे व भांड्‍याच्या तळाला चिकटू देऊ नये. शिजत आल्यावर त्यात चमचाभर तांदळाची पिठी व खसखस पूड घालावी. वेलची पूड घालून हलवून सारण सारखे करावे. पुन्हा थोडे शिजवून आचेवरून उतरवावे.<br />\r\n<br />\r\nउकड : जितकी तांदळाची पिठी, तितकेच पाणी उकळून घ्यावे. त्यात चवीपुरते मीठ, दोन चमचे तूप आणि अर्धा चमचा तेल घालावे. पाणी उकळल्यावर खाली घेवून त्यात पिठी घालून हलवावे. झाकण ठेवून मंद गॅसवर दोन वाफा काढाव्या. आचेवरुन खाली उतरवून ही उकड गरम असतानाच एखाद्या भांड्याच्या मदतीने मळावी. हाताने मळण्याइतपत झाल्यानंतर तेलपाण्याचा हात लावत मोदक घडवता येईल इतपत मउसर ठेवावे.<br />\r\n<br />\r\nमोदक : या उकडीचे लहान गोळे करून त्याची हाताने पारी बनवावी. वाटीचा आकार देवून त्यात सारण भरावे आणि पारीच्या कडा थोड्या थोड्या अंतरावर चिमटीने दाबून बंद कराव्या व टोक आणावे. मोदकाच्या कळ्या नेहमी विषम संख्येत म्हणजे तीन, पाच, सात किंवा नउ अशा पाडाव्यात. काही जणी आपल्या आवडीनुसार आधी कळ्यापाडून नंतर सारण भरतात. हे तयार केलेले मोदक थोड्या पाण्‍यात बुडवून एका चाळणीत स्वच्छ पांढरे कापड घालून किंवा केळीच्या पानावर थोडे तुपाचे बोट लावून उकडायला ठेवावे. आणि गरम असतानाच त्यावर साजूक तूप घालून खाण्‍यास द्यावे.', NULL, 1, '2012-09-14 23:10:48', '2012-09-14 23:10:48');

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

--
-- Dumping data for table `tags`
--


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
  `primary_pic` int(11) unsigned NOT NULL,
  `secondary_pic1` int(11) unsigned DEFAULT NULL,
  `secondary_pic2` int(11) unsigned DEFAULT NULL,
  `secondary_pic3` int(11) unsigned DEFAULT NULL,
  `secondary_pic4` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `temples`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `authentication_type`, `open_id`, `email`, `password`, `name`, `profile_pic`, `contact`, `ganpati_pic`, `add_line_1`, `add_line_2`, `city`, `created`, `modified`) VALUES
(1, 000, NULL, 'mayuresh.naik001@gmail.com', '0506797e1e9d3058926816987ead8933', 'mayuresh Naik', NULL, NULL, NULL, NULL, NULL, NULL, '2012-09-14 23:07:25', '2012-09-14 23:07:25');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vedics`
--


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
-- Dumping data for table `vedic_comment`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `durvas`
--
ALTER TABLE `durvas`
  ADD CONSTRAINT `durvas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `durvas_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
