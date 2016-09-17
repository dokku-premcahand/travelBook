-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2016 at 12:13 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration_type_master`
--

DROP TABLE IF EXISTS `registration_type_master`;
CREATE TABLE IF NOT EXISTS `registration_type_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registration_type` varchar(45) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `registration_type_master`
--

INSERT INTO `registration_type_master` (`id`, `registration_type`, `created_on`) VALUES
(1, 'website', '2016-09-06 00:17:21'),
(2, 'facebook', '2016-09-06 00:17:21'),
(3, 'google', '2016-09-06 00:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_type` enum('1','2','3') NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '3' COMMENT '1- admin; 2 - modrator; 3 - user.',
  `activation_link` varchar(255) NOT NULL,
  `profile_picture` text NOT NULL,
  `last_login` timestamp NOT NULL,
  `created_on` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `registration_type`, `user_type`, `activation_link`, `profile_picture`, `last_login`, `created_on`) VALUES
(1, 'dokku.premchand1@gmail.com', 'ed72a124ed565ab0deed670135c4ff73', '1', 3, '', '', '2016-08-11 23:32:47', '2016-08-11 23:32:47'),
(5, 'dokku.premchand@gmail2.com', '', '2', 3, '', '', '2016-08-16 00:16:16', '2016-08-16 00:16:16'),
(6, 'dokku.premchand@gmail.com', '', '3', 3, '', '', '2016-08-15 20:47:17', '2016-08-15 20:47:17'),
(9, 'dokku.premchand4@gmail.com', 'ed72a124ed565ab0deed670135c4ff73', '1', 3, '', '1471805460.jpg', '2016-08-21 20:51:00', '2016-08-21 20:51:00'),
(10, 'admin@travelbook.com', 'bdceeabb82a99431f86055177b20f3b3', '1', 1, '', '', '2016-09-04 20:51:00', '2016-09-04 20:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_type_master`
--

DROP TABLE IF EXISTS `user_type_master`;
CREATE TABLE IF NOT EXISTS `user_type_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL DEFAULT '',
  `created_on` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_type_master`
--

INSERT INTO `user_type_master` (`id`, `role`, `created_on`) VALUES
(1, 'admin', '2016-09-06 00:17:21'),
(2, 'moderator', '2016-09-06 00:17:21'),
(3, 'blogger', '2016-09-06 00:17:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
