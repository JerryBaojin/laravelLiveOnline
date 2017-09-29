/*
Navicat MySQL Data Transfer

Source Server         : live
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : live

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-29 20:00:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'eyJpdiI6IklDMnJDVGVySnhvN1FSZUloQ3V1MWc9PSIsInZhbHVlIjoiVnliRE1HRGl5Y1F1b2x3bmd0aHpZUT09IiwibWFjIjoiNzQwNWNkZDZlYWQxNjUxNTI4M2FjZDYwNTYxNDZiOTk0MTU2MmZmNGY4ZGJlMWI5ZGUzMmViYzYyMDBiYzU2MSJ9', 'X4rsW9KO4JDCxIKeRGppZDC9YbgTlTy67POvrweP', '2017-09-29 06:57:02', 'Bugger');

-- ----------------------------
-- Table structure for adminuser
-- ----------------------------
DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE `adminuser` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) DEFAULT NULL,
  `count` varchar(25) DEFAULT NULL,
  `active` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adminuser
-- ----------------------------
INSERT INTO `adminuser` VALUES ('4', 'asd', 'approver', null, 'asd', 'asd', '1');
INSERT INTO `adminuser` VALUES ('5', 'meiko', 'approver', null, '123123', '13981122915', '1');
INSERT INTO `adminuser` VALUES ('6', 'me', 'approver', null, '123123', '13981122915', '1');
INSERT INTO `adminuser` VALUES ('7', '123', 'approver', null, '199629', '13981122915', '1');
INSERT INTO `adminuser` VALUES ('8', '123', 'approver', '2017-09-29 03:25:24', '199629', '13981122915', '1');

-- ----------------------------
-- Table structure for createscene
-- ----------------------------
DROP TABLE IF EXISTS `createscene`;
CREATE TABLE `createscene` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `coverPic` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `rtmpUrl` varchar(255) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `seter` varchar(255) DEFAULT NULL,
  `reports` int(25) DEFAULT '0',
  `setTop` int(2) DEFAULT '0',
  `status` int(3) DEFAULT '1',
  `viewCount` int(255) DEFAULT '0',
  `pid` int(11) DEFAULT NULL,
  `viewUrl` varchar(255) DEFAULT NULL,
  `partakeState` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of createscene
-- ----------------------------
INSERT INTO `createscene` VALUES ('6', 'test', 'content', '/uploads/030209-59cdb7b14b9e2.jpg', '4', 'rtmp://220.166.83.187:1935/live/|||59cb5f0120567?pass=njrb', '2017-09-27 08:19:00', null, '0', '0', '16', '0', '1506500353', 'www.oa.com/scen/1506500353', '1');

-- ----------------------------
-- Table structure for livecounts
-- ----------------------------
DROP TABLE IF EXISTS `livecounts`;
CREATE TABLE `livecounts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pid` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `creat_at` datetime DEFAULT NULL,
  `UV` int(255) DEFAULT NULL,
  `PV` int(255) DEFAULT NULL,
  `reports` int(255) DEFAULT NULL,
  `commets` int(255) DEFAULT NULL,
  `zans` int(255) DEFAULT NULL,
  `fromeReporter` int(25) DEFAULT '0',
  `fromeUser` int(25) DEFAULT NULL,
  `Fapp` int(25) DEFAULT NULL,
  `Fwebchat` int(255) DEFAULT NULL,
  `Fweibo` int(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of livecounts
-- ----------------------------

-- ----------------------------
-- Table structure for pusers
-- ----------------------------
DROP TABLE IF EXISTS `pusers`;
CREATE TABLE `pusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) DEFAULT NULL,
  `sex` int(2) DEFAULT NULL,
  `typeGet` varchar(255) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pusers
-- ----------------------------

-- ----------------------------
-- Table structure for sitecount
-- ----------------------------
DROP TABLE IF EXISTS `sitecount`;
CREATE TABLE `sitecount` (
  `id` int(11) NOT NULL,
  `totalViews` int(255) DEFAULT NULL,
  `totalUser` int(255) DEFAULT NULL,
  `totalScen` int(255) DEFAULT NULL,
  `totalReport` int(255) DEFAULT NULL,
  `totalComments` int(255) DEFAULT NULL,
  `editers` int(255) DEFAULT NULL,
  `reporter` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sitecount
-- ----------------------------
