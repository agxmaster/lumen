/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : storage

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-12-06 11:40:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) NOT NULL DEFAULT '' COMMENT '品项',
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('1', '大枣奶', '0');
INSERT INTO `items` VALUES ('2', '哇哈哈', '0');
INSERT INTO `items` VALUES ('3', '333', '0');

-- ----------------------------
-- Table structure for `store`
-- ----------------------------
DROP TABLE IF EXISTS `store`;
CREATE TABLE `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemsid` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `num` int(11) NOT NULL DEFAULT '0',
  `company` varchar(255) NOT NULL DEFAULT '',
  `reason` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `ddate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `store` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of store
-- ----------------------------
INSERT INTO `store` VALUES ('1', '1', '1', '5', '', '1', '', '2016-12-05 06:44:50', '1');
INSERT INTO `store` VALUES ('2', '1', '2', '-3', '', '3', '', '2016-12-05 06:46:38', '1');
INSERT INTO `store` VALUES ('3', '2', '2', '0', '', '2', '', '0000-00-00 00:00:00', '1');
INSERT INTO `store` VALUES ('4', '2', '1', '0', '', '23', '', '0000-00-00 00:00:00', '1');
INSERT INTO `store` VALUES ('5', '1', '1', '0', '', '22', '', '0000-00-00 00:00:00', '1');
INSERT INTO `store` VALUES ('6', '2', '1', '0', '', '12', '', '0000-00-00 00:00:00', '1');
INSERT INTO `store` VALUES ('7', '1', '1', '0', '', '112', '', '0000-00-00 00:00:00', '1');
INSERT INTO `store` VALUES ('8', '1', '3', '-1', '1', '111', '2323', '2016-12-06 03:25:33', '1');
