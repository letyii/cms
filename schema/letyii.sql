/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : letyii

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-04-25 14:40:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for letyii_auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `letyii_auth_assignment`;
CREATE TABLE `letyii_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `letyii_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `letyii_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letyii_auth_assignment
-- ----------------------------

-- ----------------------------
-- Table structure for letyii_auth_item
-- ----------------------------
DROP TABLE IF EXISTS `letyii_auth_item`;
CREATE TABLE `letyii_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `letyii_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `letyii_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letyii_auth_item
-- ----------------------------

-- ----------------------------
-- Table structure for letyii_auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `letyii_auth_item_child`;
CREATE TABLE `letyii_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `letyii_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `letyii_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `letyii_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `letyii_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letyii_auth_item_child
-- ----------------------------

-- ----------------------------
-- Table structure for letyii_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `letyii_auth_rule`;
CREATE TABLE `letyii_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letyii_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for letyii_category
-- ----------------------------
DROP TABLE IF EXISTS `letyii_category`;
CREATE TABLE `letyii_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `root` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `root` (`root`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letyii_category
-- ----------------------------

-- ----------------------------
-- Table structure for letyii_user
-- ----------------------------
DROP TABLE IF EXISTS `letyii_user`;
CREATE TABLE `letyii_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letyii_user
-- ----------------------------
INSERT INTO `letyii_user` VALUES ('1', 'admin', '$2y$13$pZl/IKpc/MkJ097fF6BdrOt7.MzVZG72y18chRK76vp0Tp58QLqrm', '', '', 'B0T1UQEfCNt9YhANJ7b56eu3wtH06ScL ', '', '10', '2014-02-07 03:53:39', '2014-02-07 03:53:39');
