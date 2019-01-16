-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2014 at 10:02 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xpoliem`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE IF NOT EXISTS `auctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `user_id`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `my_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `roomid`, `my_id`, `bid`) VALUES
(1, 1, 3, 15),
(2, 1, 3, 10),
(5, 1, 3, 5),
(6, 1, 3, 25),
(8, 1, 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categorie_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(150) NOT NULL,
  PRIMARY KEY (`categorie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `my_id` int(10) NOT NULL,
  `userid_2` int(10) NOT NULL,
  `mesg` mediumtext NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `my_id`, `userid_2`, `mesg`, `name`) VALUES
(135, 3, 7, 'ewqewqew', 'jacques14h'),
(134, 3, 7, 'dewhwe', 'jacques14h'),
(133, 3, 7, '2131231', 'jacques14h'),
(136, 3, 7, 'ewqewqe', 'jacques14h'),
(137, 3, 7, 'rtweqtrew', 'jacques14h'),
(138, 3, 7, 'treqtretr', 'jacques14h'),
(139, 3, 7, 'trewt', 'jacques14h'),
(140, 7, 3, 'testing', 'jacques14h'),
(141, 3, 7, 'hey', 'jacques14h'),
(142, 3, 7, 'hey', 'jacques14h'),
(143, 3, 7, 'hey', 'jacques14h'),
(144, 3, 7, '12', 'jacques14h'),
(145, 3, 7, '213', 'jacques14h'),
(146, 3, 7, '534534', 'jacques14h'),
(147, 3, 7, 'dsfsa', 'jacques14h'),
(148, 3, 7, 'hey', 'jacques14h'),
(149, 3, 7, 'hey', 'jacques14h'),
(150, 3, 7, 'hey', 'jacques14h'),
(151, 3, 7, 'hey', 'jacques14h'),
(152, 3, 7, 'dusahduw', 'jacques14h'),
(153, 3, 7, 'hey', 'jacques14h'),
(154, 3, 7, 'hey', 'jacques14h'),
(155, 3, 7, 'hey', 'jacques14h'),
(156, 3, 7, 'hey', 'jacques14h');

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE IF NOT EXISTS `chat_rooms` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `numofuser` int(10) NOT NULL,
  `file` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `chat_rooms`
--

INSERT INTO `chat_rooms` (`id`, `name`, `numofuser`, `file`) VALUES
(5, 'dirty shit', 10, 'dirty_shit'),
(4, 'testing', 10, 'text.txt'),
(8, 'tyest', 54, 'tyest.txt');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users_rooms`
--

CREATE TABLE IF NOT EXISTS `chat_users_rooms` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `mod_time` int(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1478 ;

--
-- Dumping data for table `chat_users_rooms`
--

INSERT INTO `chat_users_rooms` (`id`, `username`, `room`, `mod_time`) VALUES
(1477, 'q', 'testing', 1391963318);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `up` int(11) unsigned NOT NULL,
  `down` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `full_name`, `email`, `comment`, `date`, `active`, `up`, `down`) VALUES
(8, 'Sebastian Sulinski', 'email@mail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2012-01-25 11:58:59', 1, 0, 1),
(9, 'Sebastian Sulinski', 'email@mail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2012-01-25 11:59:00', 1, 1, 0),
(10, 'Sebastian Sulinski', 'email@mail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2012-01-25 11:59:01', 1, 0, 1),
(11, 'Sebastian Sulinski', 'email@mail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2012-01-25 11:59:03', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE IF NOT EXISTS `drink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `my_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `drink` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`id`, `my_id`, `u_id`, `drink`) VALUES
(48, 3, 7, 'scaotch\r\n'),
(49, 3, 7, 'scotch'),
(50, 3, 7, 'scotch'),
(51, 3, 7, 'scotch'),
(52, 3, 7, 'tequila'),
(53, 3, 7, 'scotch'),
(54, 3, 7, 'vodka'),
(55, 3, 7, 'tequila'),
(56, 3, 7, 'shot'),
(57, 3, 7, 'shot'),
(58, 3, 7, 'shot'),
(59, 3, 7, 'shot'),
(60, 3, 7, 'shot'),
(61, 3, 7, 'shot'),
(62, 3, 7, 'shot'),
(63, 3, 7, 'shot'),
(64, 3, 7, 'shot'),
(65, 3, 7, 'shot'),
(66, 3, 7, 'shot'),
(67, 3, 7, 'shot'),
(68, 3, 7, 'shot'),
(69, 3, 7, 'shot'),
(70, 3, 7, 'shot'),
(71, 3, 7, 'shot'),
(72, 3, 8, 'beer'),
(73, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `user_one`, `user_two`) VALUES
(30, 8, 7),
(32, 9, 8),
(33, 10, 8),
(34, 11, 8),
(35, 12, 8),
(36, 13, 8),
(37, 14, 8),
(38, 15, 8),
(39, 16, 8),
(54, 8, 9),
(58, 7, 8),
(59, 7, 3),
(72, 3, 9),
(74, 21, 3),
(82, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lib`
--

CREATE TABLE IF NOT EXISTS `lib` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_exp_date` datetime NOT NULL,
  `post_extension` varchar(11) NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `lib`
--

INSERT INTO `lib` (`post_id`, `user_id`, `title`, `category_id`, `post_date`, `post_exp_date`, `post_extension`, `views`) VALUES
(81, 3, 'fxzg', 0, '2014-04-26 15:54:13', '2015-01-23 20:17:36', 'ogv', 18),
(82, 3, 'assad', 0, '2014-04-26 12:10:21', '2015-01-23 22:03:05', 'bmp', 23),
(83, 3, 'penguins', 0, '2014-01-29 17:55:52', '2015-01-25 13:03:49', 'jpg', 1),
(84, 3, 'beasr', 0, '2014-01-25 11:40:19', '2015-01-25 13:04:06', 'jpg', 2),
(86, 3, 'fdsadfdsa', 0, '2014-04-01 11:14:38', '2015-04-01 13:14:38', 'jpg', 0),
(87, 3, 'gfffffffh', 0, '2014-04-01 11:15:46', '2015-04-01 13:15:46', 'jpg', 0),
(88, 3, 'fdgfdgdf', 0, '2014-04-01 13:12:45', '2015-04-01 15:12:45', 'jpg', 0),
(89, 3, 'adsasdadsa', 0, '2014-04-01 13:20:20', '2015-04-01 15:20:20', 'jpg', 0),
(94, 3, 'Videomax', 0, '2014-07-04 15:17:49', '2015-07-04 17:17:49', 'ogv', 0),
(99, 21, 'Titty warrior', 0, '2014-07-04 16:10:54', '2015-07-04 18:10:54', 'jpg', 0),
(100, 21, 'Warrior', 0, '2014-07-04 16:10:54', '2015-07-04 18:10:54', 'jpg', 0),
(101, 21, 'Water vs light', 0, '2014-07-04 16:10:54', '2015-07-04 18:10:54', 'jpg', 0),
(102, 3, 'test', 0, '2014-07-14 19:40:10', '2015-07-14 21:40:10', 'jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lib 2.0`
--

CREATE TABLE IF NOT EXISTS `lib 2.0` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `body` text NOT NULL,
  `Special` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `post_exp_date` datetime NOT NULL,
  `post_extension` varchar(11) NOT NULL,
  `pre_views` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `Last_check_Week` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `body`, `Special`, `post_date`, `post_exp_date`, `post_extension`, `pre_views`, `views`, `Last_check_Week`) VALUES
(17, 3, 'fxzg', '', 'Admin', '2014-07-09 11:46:01', '2015-01-23 20:17:36', 'ogv', 40, 100, 28),
(18, 3, 'assad', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaafsdgggggggggggggggggggggggggggggggggggggggggggggg', 'Admin', '2014-07-09 11:46:01', '2015-01-23 22:03:05', 'bmp', 2, 0, 28),
(19, 3, 'hey hey', '', 'Admin', '2014-07-09 11:46:02', '2015-04-01 13:09:13', 'jpg', 2, 0, 28),
(20, 3, 'zzzzzz', 'hhhhhhhhhhhhhhh', 'Admin', '2014-07-09 11:46:02', '2015-04-01 13:12:28', '', 2, 0, 28),
(22, 3, 'ggggggggg', 'dddddddd', 'Admin', '2014-07-09 11:46:02', '2015-04-01 13:13:53', '', 2, 0, 28),
(23, 3, 'fdsadfdsa', '', 'Admin', '2014-07-09 11:46:02', '2015-04-01 13:14:38', 'jpg', 2, 0, 28),
(24, 3, 'gfffffffh', 'sdaaaaaaaa', 'Admin', '2014-07-09 11:46:02', '2015-04-01 13:15:46', 'jpg', 2, 0, 28),
(25, 3, 'fdgfdgdf', '', 'Admin', '2014-07-09 11:46:02', '2015-04-01 15:12:45', 'jpg', 2, 0, 28),
(26, 3, 'adsasdadsa', '', 'Admin', '2014-07-09 11:46:02', '2015-04-01 15:20:20', 'jpg', 2000, 12, 28),
(31, 3, 'Videomax', '', 'Admin', '2014-07-09 11:46:02', '2015-07-04 17:17:49', 'ogv', 2, 0, 28),
(36, 21, 'Titty warrior', '', '', '2014-07-09 10:53:11', '2015-07-04 18:10:54', 'jpg', 2, 0, 28),
(37, 21, 'Warrior', '', '', '2014-07-09 11:10:47', '2015-07-04 18:10:54', 'jpg', 42, 89, 28),
(38, 21, 'Water vs light', '', '', '2014-07-09 10:53:11', '2015-07-04 18:10:54', 'jpg', 2, 0, 28);

-- --------------------------------------------------------

--
-- Table structure for table `random_text_users`
--

CREATE TABLE IF NOT EXISTS `random_text_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `Priority` tinyint(1) NOT NULL DEFAULT '0',
  `session_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `random_video_users`
--

CREATE TABLE IF NOT EXISTS `random_video_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `Priority` tinyint(1) NOT NULL DEFAULT '0',
  `session_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `random_video_users`
--

INSERT INTO `random_video_users` (`ID`, `user_id`, `Priority`, `session_start`) VALUES
(29, 3, 0, '2014-07-05 19:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(15) NOT NULL,
  `item` int(11) unsigned NOT NULL,
  `rate` tinyint(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user`, `item`, `rate`, `date`) VALUES
(2, '127.0.0.1', 3, 1, '2014-03-30 17:26:11'),
(3, '127.0.0.1', 7, 1, '2014-04-01 09:40:05'),
(4, '127.0.0.1', 8, 1, '2014-04-03 14:04:26'),
(5, '127.0.0.1', 9, 1, '2014-04-11 18:13:00'),
(6, '127.0.0.1', 1, 1, '2014-05-05 18:27:23'),
(7, '127.0.0.1', 2, 0, '2014-05-05 18:27:25'),
(8, '127.0.0.1', 5, 0, '2014-05-05 18:29:40'),
(9, '127.0.0.1', 14, 1, '2014-05-05 18:29:43'),
(12, '::1', 7, 0, '2014-07-11 19:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `email` varchar(254) NOT NULL,
  `joined` datetime NOT NULL,
  `userGroup` int(11) NOT NULL,
  `ip_address` varchar(254) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `lastLoggedIn` datetime NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `personal_message` text NOT NULL,
  `pp_extension` varchar(30) NOT NULL,
  `Post` text NOT NULL,
  `post_title` varchar(30) NOT NULL,
  `active` int(254) NOT NULL,
  `up` int(254) NOT NULL,
  `down` int(254) NOT NULL,
  `countryName` varchar(254) NOT NULL,
  `cityName` varchar(254) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `salt`, `email`, `joined`, `userGroup`, `ip_address`, `gender`, `lastLoggedIn`, `display_name`, `personal_message`, `pp_extension`, `Post`, `post_title`, `active`, `up`, `down`, `countryName`, `cityName`, `latitude`, `longitude`) VALUES
(3, 'jacques14', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', ')x/âOˆÚH;yä\0ÕñJù±‡\\ËÇ^ï½`Iœ6Ÿõ¤»', 'jacques.pieterse13@gmail.com', '2014-01-05 10:54:42', 1, '127.0.0.1', 'he-she', '2014-07-14 21:44:43', 'he-she', 'working?', 'jpg', 'Small as shit', 'my dick', 0, 1, 0, '', '', 0, 0),
(7, 'h', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 3, 1, '', '', 0, 0),
(8, 'o', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 1, -1, '', '', 0, 0),
(9, 'KarthiKeyan', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(10, 'Roger', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, -1, '', '', 0, 0),
(11, 'Alexander Mani', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, -1, 0, '', '', 0, 0),
(12, 'Sasi Kumar', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(13, 'Hevron Roger', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(14, 'Karthi', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 1, 0, '', '', 0, 0),
(15, 'Toeng Sikung', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(16, 'Kumar', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(17, 'Hevron Roger', '5693e3ed1d1ec630b8ab038f06abd2554258262826db34d8771938a34000b7d7', '', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(18, 'Austin', '814b526f2f61ef972d7ef6c579287d4ad9ab8bf38128fb808d4117e1a1917352', 'žBè.1Lø9í$‡«¡Ü¶C"qåäê¢Òó?’å', 'aalabuschagne@gmail.com', '2014-01-14 13:07:28', 1, '::1', 'male', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(19, 'dick', '0aa2c342e974e83503eb7ac59386c60caeaad538dd26c7637d20f1b19fad0308', 'Í? z\\Oª\\Íw[êñ;XX6<XÆ°=8…vÜ', 'jacques.pieterse13@gmail.com', '2014-04-11 20:26:03', 1, '127.0.0.1', 'male', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(20, 'jsadsa', 'abb6992de84e3ec38e22e3528be4d0aec950017869cab8a4d43c1add8efe2f37', '@xÙ3},2r“CtuYÒ''ýeð¦CPìöùF¶;', 'jacques.pieterse13@gmail.com', '2014-04-15 21:57:48', 1, '127.0.0.1', 'male', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(21, 'Jacques11', '7099375b98fc686d9ed83048cfc80b973c7300a049562ad59b3568daf5eae8a1', '¨Ý€ç‹Œ8"Ecú¹©ÄÐ.¥éð\ZÅ¯ÐÑã0', 'jacques.pieterse134@gmail.com', '2014-06-29 15:30:33', 1, '127.0.0.1', 'male', '2014-07-05 14:35:45', '', '', '', '', '', 0, 0, 0, '', '', 0, 0),
(22, 'NewUser', '9d69199fe7585dc085d132ab9b80359b0021a53677addac79cbcab65c31c9c7c', 'Ç²iduÊ»ïê—ïüÏ|`åNÞ|gq—ét', 'LeBush@gmail.com', '2014-07-14 18:49:18', 1, '::1', 'female', '2014-07-14 21:57:36', '', '', '', '', '', 0, 0, 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userssessions`
--

CREATE TABLE IF NOT EXISTS `userssessions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userssessions`
--

INSERT INTO `userssessions` (`ID`, `userID`, `hash`) VALUES
(1, 1, 'bc54ec088006b31f8b1dbfe4d1afa9be1061c7f3d886351142');

-- --------------------------------------------------------

--
-- Table structure for table `video_rooms`
--

CREATE TABLE IF NOT EXISTS `video_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `room` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `video_rooms`
--

INSERT INTO `video_rooms` (`id`, `user_1`, `user_2`, `room`) VALUES
(2, 3, 7, '10'),
(3, 3, 7, '10'),
(4, 3, 0, '3'),
(5, 3, 0, '3'),
(6, 3, 0, '3'),
(8, 3, 7, 'jacques14h'),
(9, 3, 7, 'jacques14h'),
(10, 3, 7, 'jacques14h'),
(11, 3, 7, 'jacques14h'),
(12, 3, 7, 'jacques14h'),
(13, 3, 7, 'jacques14h'),
(14, 3, 7, 'jacques14h'),
(15, 3, 7, 'jacques14h'),
(16, 3, 3, 'jacques14jacques14'),
(17, 21, 7, 'hJacques11'),
(18, 21, 7, 'hJacques11'),
(19, 21, 7, 'hJacques11'),
(20, 21, 7, 'hJacques11'),
(21, 21, 7, 'hJacques11'),
(22, 21, 7, 'hJacques11'),
(23, 21, 7, 'hJacques11'),
(24, 21, 7, 'hJacques11'),
(25, 21, 7, 'hJacques11'),
(26, 21, 7, 'hJacques11'),
(27, 21, 7, 'hJacques11'),
(28, 21, 7, 'hJacques11'),
(29, 21, 7, 'hJacques11'),
(30, 21, 7, 'hJacques11'),
(31, 21, 7, 'hJacques11'),
(32, 21, 7, 'hJacques11'),
(33, 21, 7, 'hJacques11'),
(34, 21, 7, 'hJacques11'),
(35, 21, 7, 'hJacques11'),
(36, 21, 7, 'hJacques11'),
(37, 21, 7, 'hJacques11'),
(38, 21, 7, 'hJacques11'),
(39, 21, 7, 'hJacques11'),
(40, 21, 7, 'hJacques11'),
(41, 21, 7, 'hJacques11'),
(42, 21, 7, 'hJacques11'),
(43, 21, 7, 'hJacques11'),
(44, 21, 7, 'hJacques11'),
(45, 21, 7, 'hJacques11'),
(46, 21, 7, 'hJacques11'),
(47, 21, 7, 'hJacques11'),
(48, 21, 7, 'hJacques11'),
(49, 21, 7, 'hJacques11'),
(50, 21, 7, 'hJacques11'),
(51, 21, 7, 'hJacques11'),
(52, 21, 7, 'hJacques11'),
(53, 21, 7, 'hJacques11'),
(54, 21, 7, 'hJacques11'),
(55, 21, 7, 'hJacques11'),
(56, 21, 7, 'hJacques11'),
(57, 21, 7, 'hJacques11'),
(58, 21, 7, 'hJacques11'),
(59, 21, 7, 'hJacques11'),
(60, 21, 7, 'hJacques11'),
(61, 21, 7, 'hJacques11'),
(62, 21, 7, 'hJacques11'),
(63, 21, 7, 'hJacques11'),
(64, 21, 7, 'hJacques11'),
(65, 21, 7, 'hJacques11'),
(66, 21, 7, 'hJacques11'),
(67, 21, 7, 'hJacques11'),
(68, 21, 7, 'hJacques11'),
(69, 3, 7, 'jacques14h'),
(70, 21, 7, 'hJacques11'),
(71, 3, 7, 'jacques14h'),
(72, 3, 7, 'jacques14h'),
(73, 3, 7, 'jacques14h'),
(74, 3, 7, 'jacques14h'),
(75, 3, 7, 'jacques14h'),
(76, 3, 7, 'jacques14h'),
(77, 3, 7, 'jacques14h'),
(78, 3, 7, 'jacques14h'),
(79, 3, 7, 'jacques14h'),
(80, 3, 7, 'jacques14h'),
(81, 3, 7, 'jacques14h'),
(82, 3, 7, 'jacques14h'),
(83, 3, 7, 'jacques14h'),
(84, 3, 7, 'jacques14h'),
(85, 3, 7, 'jacques14h'),
(86, 3, 7, 'jacques14h'),
(87, 3, 7, 'jacques14h'),
(88, 3, 7, 'jacques14h'),
(89, 3, 7, 'jacques14h'),
(90, 3, 7, 'jacques14h'),
(91, 3, 7, 'jacques14h'),
(92, 3, 7, 'jacques14h'),
(93, 3, 7, 'jacques14h'),
(94, 3, 7, 'jacques14h'),
(95, 3, 7, 'jacques14h'),
(96, 3, 7, 'jacques14h'),
(97, 3, 7, 'jacques14h'),
(98, 3, 7, 'jacques14h'),
(99, 3, 7, 'jacques14h'),
(100, 3, 7, 'jacques14h'),
(101, 3, 7, 'jacques14h'),
(102, 3, 7, 'jacques14h'),
(103, 3, 7, 'jacques14h'),
(104, 3, 7, 'jacques14h'),
(105, 3, 7, 'jacques14h'),
(106, 3, 7, 'jacques14h'),
(107, 3, 7, 'jacques14h'),
(108, 3, 7, 'jacques14h'),
(109, 3, 7, 'jacques14h'),
(110, 3, 7, 'jacques14h'),
(111, 3, 7, 'jacques14h'),
(112, 3, 7, 'jacques14h'),
(113, 3, 7, 'jacques14h'),
(114, 3, 7, 'jacques14h'),
(115, 3, 7, 'jacques14h'),
(116, 3, 7, 'jacques14h'),
(117, 3, 7, 'jacques14h'),
(118, 3, 7, 'jacques14h'),
(119, 3, 7, 'jacques14h'),
(120, 3, 7, 'jacques14h'),
(121, 3, 7, 'jacques14h'),
(122, 3, 7, 'jacques14h'),
(123, 3, 7, 'jacques14h'),
(124, 3, 7, 'jacques14h'),
(125, 3, 7, 'jacques14h'),
(126, 3, 7, 'jacques14h'),
(127, 3, 7, 'jacques14h'),
(128, 3, 7, 'jacques14h'),
(129, 3, 7, 'jacques14h'),
(130, 3, 7, 'jacques14h'),
(131, 3, 7, 'jacques14h'),
(132, 3, 7, 'jacques14h'),
(133, 3, 7, 'jacques14h'),
(134, 3, 7, 'jacques14h'),
(135, 3, 7, 'jacques14h'),
(136, 3, 7, 'jacques14h'),
(137, 3, 7, 'jacques14h'),
(138, 3, 7, 'jacques14h'),
(139, 3, 7, 'jacques14h'),
(140, 3, 7, 'jacques14h'),
(141, 3, 7, 'jacques14h'),
(142, 3, 7, 'jacques14h');

-- --------------------------------------------------------

--
-- Table structure for table `videochatbids`
--

CREATE TABLE IF NOT EXISTS `videochatbids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `my_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `videochatbids`
--

INSERT INTO `videochatbids` (`id`, `my_id`, `user_id`, `bid`) VALUES
(6, 3, 7, 12323),
(7, 3, 7, 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
