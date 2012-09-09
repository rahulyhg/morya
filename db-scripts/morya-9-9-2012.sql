-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2012 at 02:37 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `photo_id`, `created`) VALUES
(1, 'ganpati bappa morya', 37, 119, '2012-09-09 00:29:50');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `photoes`
--

INSERT INTO `photoes` (`id`, `type`, `caption`, `description`, `original_name`, `file_name`, `file_type`, `file_size`, `user_id`, `created`, `modified`) VALUES
(119, 0, '7404d6562b5559500df2ba232d76639c.jpg', NULL, 'Image1544.jpg', '7404d6562b5559500df2ba232d76639c.jpg', 'image/jpeg', 00000000000000309303, 36, '2012-09-05 00:14:00', '2012-09-05 00:14:00'),
(120, 0, '4fd945f32cacf9d311935396b2bc4275.jpg', NULL, 'Image1540.jpg', '4fd945f32cacf9d311935396b2bc4275.jpg', 'image/jpeg', 00000000000000251993, 37, '2012-09-08 23:53:37', '2012-09-08 23:53:37'),
(121, 0, '32c463a8238249d2ca3d5063935b3477.jpg', NULL, 'Image1545.jpg', '32c463a8238249d2ca3d5063935b3477.jpg', 'image/jpeg', 00000000000000336619, 37, '2012-09-08 23:53:38', '2012-09-08 23:53:38'),
(122, 0, 'd8bf96cffbefb9c8b595aabd8fe3a4c7.jpg', NULL, 'Image1544.jpg', 'd8bf96cffbefb9c8b595aabd8fe3a4c7.jpg', 'image/jpeg', 00000000000000309303, 37, '2012-09-09 02:17:17', '2012-09-09 02:17:17'),
(123, 0, '2aadc7a2162528c14a4fdc5670e0e39a.jpg', NULL, 'Image1547.jpg', '2aadc7a2162528c14a4fdc5670e0e39a.jpg', 'image/jpeg', 00000000000000250119, 37, '2012-09-09 02:17:38', '2012-09-09 02:17:38'),
(124, 0, 'ebd097434fe9d7a771e8941dc21d4dac.jpg', NULL, 'Winter.jpg', 'ebd097434fe9d7a771e8941dc21d4dac.jpg', 'image/jpeg', 00000000000000105542, 38, '2012-09-09 02:27:08', '2012-09-09 02:27:08'),
(125, 0, '94d43397fc2eafcef0bedcfa0814b07a.jpg', NULL, 'Water lilies.jpg', '94d43397fc2eafcef0bedcfa0814b07a.jpg', 'image/jpeg', 00000000000000083794, 38, '2012-09-09 03:16:42', '2012-09-09 03:16:42'),
(126, 0, 'a46ec506831b2b53536575dcf8257725.jpg', NULL, 'Winter.jpg', 'a46ec506831b2b53536575dcf8257725.jpg', 'image/jpeg', 00000000000000105542, 38, '2012-09-09 03:16:49', '2012-09-09 03:16:49'),
(127, 0, '70fb7d3645e92bdd4851b6ee91082827.jpg', NULL, 'Blue hills.jpg', '70fb7d3645e92bdd4851b6ee91082827.jpg', 'image/jpeg', 00000000000000028521, 38, '2012-09-09 05:42:16', '2012-09-09 05:42:16'),
(128, 0, '18ed25952fa125930cb202cedadd44c2.jpg', NULL, 'Blue hills.jpg', '18ed25952fa125930cb202cedadd44c2.jpg', 'image/jpeg', 00000000000000028521, 38, '2012-09-09 05:43:17', '2012-09-09 05:43:17'),
(129, 0, '972a8b52fd7daf100bbdf7c9818ef636.jpg', NULL, 'Sunset.jpg', '972a8b52fd7daf100bbdf7c9818ef636.jpg', 'image/jpeg', 00000000000000071189, 38, '2012-09-09 05:46:27', '2012-09-09 05:46:27'),
(130, 0, 'a7c2ee51bb429b9930144633facbbb4c.jpg', NULL, 'Water lilies.jpg', 'a7c2ee51bb429b9930144633facbbb4c.jpg', 'image/jpeg', 00000000000000083794, 38, '2012-09-09 05:46:35', '2012-09-09 05:46:35'),
(131, 0, 'ef5daa57e13663ec2e615c4869b51656.jpg', NULL, 'Sunset.jpg', 'ef5daa57e13663ec2e615c4869b51656.jpg', 'image/jpeg', 00000000000000071189, 38, '2012-09-09 05:46:47', '2012-09-09 05:46:47'),
(132, 0, 'feff3a74a6637c437f8a7f7f1388be7f.jpg', NULL, 'Blue hills.jpg', 'feff3a74a6637c437f8a7f7f1388be7f.jpg', 'image/jpeg', 00000000000000028521, 38, '2012-09-09 05:46:50', '2012-09-09 05:46:50'),
(133, 0, '8876e67fb445ae413899d95d261798ec.jpg', NULL, 'Winter.jpg', '8876e67fb445ae413899d95d261798ec.jpg', 'image/jpeg', 00000000000000105542, 38, '2012-09-09 05:47:11', '2012-09-09 05:47:11'),
(134, 0, '7c5614d106072afb83c3e4b701044d63.jpg', NULL, 'Water lilies.jpg', '7c5614d106072afb83c3e4b701044d63.jpg', 'image/jpeg', 00000000000000083794, 38, '2012-09-09 05:52:42', '2012-09-09 05:52:42'),
(135, 0, '6cd3d81aab11eadb6444136d1c9de974.jpg', NULL, 'Sunset.jpg', '6cd3d81aab11eadb6444136d1c9de974.jpg', 'image/jpeg', 00000000000000071189, 38, '2012-09-09 05:52:47', '2012-09-09 05:52:47'),
(136, 0, '556d74175a4f80ca06ace1861e2099a1.jpg', NULL, 'Winter.jpg', '556d74175a4f80ca06ace1861e2099a1.jpg', 'image/jpeg', 00000000000000105542, 38, '2012-09-09 05:53:04', '2012-09-09 05:53:04'),
(137, 0, '1ff0c671540ed2c05b7f90cbb908b9eb.jpg', NULL, 'Sunset.jpg', '1ff0c671540ed2c05b7f90cbb908b9eb.jpg', 'image/jpeg', 00000000000000071189, 38, '2012-09-09 05:57:25', '2012-09-09 05:57:25'),
(138, 0, '15a6700ecaae079056a2917e5256e33f.jpg', NULL, 'Blue hills.jpg', '15a6700ecaae079056a2917e5256e33f.jpg', 'image/jpeg', 00000000000000028521, 38, '2012-09-09 05:57:26', '2012-09-09 05:57:26'),
(139, 0, '7669781130332e9fd2be8065a609790f.jpg', NULL, 'Winter.jpg', '7669781130332e9fd2be8065a609790f.jpg', 'image/jpeg', 00000000000000105542, 38, '2012-09-09 05:57:41', '2012-09-09 05:57:41'),
(140, 0, '10166777b49756c4c63a0c7007117043.jpg', NULL, 'Image1539.jpg', '10166777b49756c4c63a0c7007117043.jpg', 'image/jpeg', 00000000000000249368, 38, '2012-09-09 07:06:00', '2012-09-09 07:06:00'),
(141, 0, '21ebbf0b170bccec73851beef32740cf.jpg', NULL, 'Image1544.jpg', '21ebbf0b170bccec73851beef32740cf.jpg', 'image/jpeg', 00000000000000309303, 36, '2012-09-09 07:11:06', '2012-09-09 07:11:06');

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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `recepies`
--

INSERT INTO `recepies` (`id`, `slug`, `type`, `title`, `cooking_time`, `ingredients`, `method`, `primary_pic`, `created`, `modified`) VALUES
(1, 'उकडीचे-मोदक', 000, 'उकडीचे मोदक', '00:00:30', '१/२ कप खिरापत\r\n१/२ कप मैदा\r\n१/२ कप बारीक रवा\r\n२ टेस्पून तेल\r\nचिमूटभर मिठ\r\nतळण्यासाठी तेल/ तूप\r\n१ टीस्पून दूध\r\nओल्या नारळाचे सारण भरायचे असेल तर ओल्या नारळाच्या करंज्यांचे सारण वापरावे.', '१) मैदा आणि रव एकत्र करून घ्यावा. २ चमचे तेल कडकडीत गरम करून मोहन घालावे. किंचीत मिठ घालून हाताने मिक्स करावे. थोडे थोडे पाणी घालून घट्ट मळून घ्यावे. साधारण अर्धा तास झाकून ठेवावे.\r\n२) अर्ध्या तासाने पिठ पुन्हा एकदा चांगले मळून घ्यावे. मळलेल्या पिठाचे साधारण दिड इंचाचे समान गोळे करून घ्यावे. तळण्यासाठी तेल गरम करण्यास ठेवावे. प्रत्येक गोळ्याची पुरी लाटून घ्यावी. पुरी एका हाताच्या तळव्यावर ठेवून दुसर्‍या हानाने मुखर्‍या पाडाव्यात. मध्यभागी जो खळगा झाला असेल त्यात १ चमचा सारण भरावे. सर्व मुखर्‍या एकत्र करून कळी बनवावी आणि १ थेंब दुधाचं बोट घेवून कळी निट बंद करावी. सर्व मोदक मंद आचेवर तळून घ्यावे.\r\n\r\nटीप:\r\n१) पिठ थोडे कोरडे असल्याने बंद केलेली कळी बर्‍याचदा तेलात उघडली जाते आणि सारण बाहेर येते, नाहीतर तेल आत जाऊन मोदक तेलकट होतो. म्हणून थोडे दुध लावल्यास कळी पक्की बंद होते. फक्त अगदी कणच दुध वापरावे.\r\n२) मोदक मंद आचेवरच तळावे. मोठ्या आचेवर तळल्यास तापलेल्या तेलामुळे बाहेरून तळलेले वाटतात पण आतून कच्चे राहतात आणि लगेच मऊ पडतात.\r\n', NULL, '2012-09-06 22:54:14', '2012-09-06 22:54:14'),
(2, 'boondi-ka-ladoo', 000, 'Boondi ka Ladoo', '00:00:01', '1 cup Besan\r\n1 pinch Kesari\r\n1 pinch Cardamom powder\r\n1 tbsp Rice flour\r\n1 pinch Baking Powder\r\n1 tbsp Melon seeds\r\n1 tbsp Broken Cashew nut\r\n2 cups Oil Sugar\r\n1 cup Water ', '\r\n    Mix the flour, rice flour, baking powder and colour.\r\n    Make a smooth thick batter. Heat the oil. Take the batter and pour it over a sieve with round holes.\r\n    Tap it gently with a spoon so that small balls of dough fall into the oil. Make the balls and keep aside. Heat the sugar and water till reaches 1/2 thread consistency.\r\n    Mix in the kesari melon seed and cardamom powder and fried boondies. When the mixture is still warm make into balls. Bondi Ladoo are ready to be served\r\n    If the mixture cools balls cannot be made as the sugar crystallizes.\r\n', NULL, '2012-09-06 23:48:57', '2012-09-06 23:48:57');

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

INSERT INTO `temples` (`id`, `slug`, `name`, `description`, `established`, `how_to_go`, `history`, `primary_pic`, `secondary_pic1`, `secondary_pic2`, `secondary_pic3`, `secondary_pic4`, `user_id`, `created`, `modified`) VALUES
(1, 'siddhivinayak-mandir', 'siddhivinayak mandir', 'siddhivinayak mandir is asnka nasnda nalksndkandk nasn', 1992, 'siddhivinayak mandir is asnka nasnda nalksndkandk nasn', 'siddhivinayak mandir is asnka nasnda nalksndkandk nasn', 128, NULL, NULL, NULL, NULL, 38, '2012-09-09 05:44:00', '2012-09-09 05:44:00'),
(2, 'siddhivinayak-mandir-1', 'siddhivinayak mandir', '        case  1 : $("#photo_id").append(''<input type="hidden" name="Temple[secondary_pic1]" value="'' + responseJSON.id + ''" />'');\r\n            uploaded = uploaded + 1;\r\n            break;', 2000, '        case  1 : $("#photo_id").append(''<input type="hidden" name="Temple[secondary_pic1]" value="'' + responseJSON.id + ''" />'');\r\n            uploaded = uploaded + 1;\r\n            break;', '        case  1 : $("#photo_id").append(''<input type="hidden" name="Temple[secondary_pic1]" value="'' + responseJSON.id + ''" />'');\r\n            uploaded = uploaded + 1;\r\n            break;', 135, NULL, NULL, NULL, NULL, 38, '2012-09-09 05:53:31', '2012-09-09 05:53:31'),
(3, 'lalbaug-cha-raja', 'lalbaug cha raja', 'lalbaug cha raja', 1999, 'lalbaug cha raja', 'lalbaug cha raja', 137, 138, NULL, NULL, NULL, 38, '2012-09-09 05:57:42', '2012-09-09 05:57:42');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `authentication_type`, `open_id`, `email`, `password`, `name`, `profile_pic`, `contact`, `ganpati_pic`, `add_line_1`, `add_line_2`, `city`, `created`, `modified`) VALUES
(36, 000, NULL, 'mayuresh.naik001@gmail.com', '6382d4ea6f269ab59ccf0942f2a523c7', 'mayuresh Yashwant Naik', NULL, NULL, NULL, NULL, NULL, NULL, '2012-09-05 00:08:18', '2012-09-05 00:08:18'),
(37, 000, NULL, 'swapnil@gmail.com', 'e2798af12a7a0f4f70b4d69efbc25f4d', 'Swapnil SUnil Gondkar', NULL, NULL, NULL, NULL, NULL, NULL, '2012-09-08 23:53:17', '2012-09-08 23:53:17'),
(38, 000, NULL, 'mayuresh.naik@gmail.com', '6974c42cd0c6aba9fd7c7360b4fcf2eb', 'mayuresh Yashwant Naik', NULL, '9870773759', NULL, NULL, NULL, NULL, '2012-09-09 02:25:44', '2012-09-09 07:00:02');

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

INSERT INTO `vedics` (`id`, `type`, `name_of_god`, `title`, `slug`, `text`, `audio_path`, `audio_length`, `audio_size`, `user_id`, `created`, `modified`) VALUES
(1, 0, 'गणपतीची आरती', 'सुखकर्ता दुखहर्ता', 'सुखकर्ता-दुखहर्ता', 'सुखकर्ता दुखहर्ता', NULL, NULL, NULL, 36, '2012-09-06 00:10:52', '2012-09-06 00:10:52'),
(2, 0, 'श्री शंकराची आरती', 'दुर्गे दुर्घट भारी', 'दुर्गे-दुर्घट-भारी', 'दुर्गे दुर्घट भारी', NULL, NULL, NULL, 38, '2012-09-09 06:44:32', '2012-09-09 06:44:32');

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
