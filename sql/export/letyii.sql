-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2014 at 04:48 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `letyii`
--

-- --------------------------------------------------------

--
-- Table structure for table `letyii_auth_assignment`
--

DROP TABLE IF EXISTS `letyii_auth_assignment`;
CREATE TABLE IF NOT EXISTS `letyii_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `letyii_auth_item`
--

DROP TABLE IF EXISTS `letyii_auth_item`;
CREATE TABLE IF NOT EXISTS `letyii_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `letyii_auth_item_child`
--

DROP TABLE IF EXISTS `letyii_auth_item_child`;
CREATE TABLE IF NOT EXISTS `letyii_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `letyii_auth_rule`
--

DROP TABLE IF EXISTS `letyii_auth_rule`;
CREATE TABLE IF NOT EXISTS `letyii_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `letyii_user`
--

DROP TABLE IF EXISTS `letyii_user`;
CREATE TABLE IF NOT EXISTS `letyii_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password_hash` varchar(128) NOT NULL,
  `password_reset_token` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `auth_key` varchar(128) NOT NULL DEFAULT '',
  `role` varchar(128) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '10',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `letyii_user`
--

INSERT INTO `letyii_user` (`id`, `username`, `password_hash`, `password_reset_token`, `email`, `auth_key`, `role`, `status`, `create_time`, `update_time`) VALUES
(1, 'admin', '$2y$13$pZl/IKpc/MkJ097fF6BdrOt7.MzVZG72y18chRK76vp0Tp58QLqrm', '', '', 'B0T1UQEfCNt9YhANJ7b56eu3wtH06ScL ', '', 10, '2014-02-07 03:53:39', '2014-02-07 03:53:39');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `letyii_auth_assignment`
--
ALTER TABLE `letyii_auth_assignment`
  ADD CONSTRAINT `letyii_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `letyii_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `letyii_auth_item`
--
ALTER TABLE `letyii_auth_item`
  ADD CONSTRAINT `letyii_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `letyii_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `letyii_auth_item_child`
--
ALTER TABLE `letyii_auth_item_child`
  ADD CONSTRAINT `letyii_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `letyii_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `letyii_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `letyii_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
