/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : go4shop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-06-05 12:17:04
*/

SET FOREIGN_KEY_CHECKS=0;

USE 'go4shop';
-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'beverages');
INSERT INTO `categories` VALUES ('2', 'cakes');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `registered` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'Jack', 'zhao', 'Dhaka, Bangladesh', 'Gulshan 1', 'dkjf, lksd kl', '1200', '9879797', 'zhao@gmail.com', '1');
INSERT INTO `customers` VALUES ('2', 'Mike', 'wang', 'Dhaka', 'Coxbazar', 'Gulshan', '9879', '9898797', 'wang@gmail.com', '1');

-- ----------------------------
-- Table structure for delivery_addresses
-- ----------------------------
DROP TABLE IF EXISTS `delivery_addresses`;
CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of delivery_addresses
-- ----------------------------
INSERT INTO `delivery_addresses` VALUES ('1', 'adsasd', 'asd', 'dasd', 'dasd', 'asdas', 'dasd', 'asda', 'dasd');
INSERT INTO `delivery_addresses` VALUES ('2', 'zhangsan', 'lisi', 'beijing', 'beijing', 'beijng ', '01000', '15011111111', '38124546@11.com');
INSERT INTO `delivery_addresses` VALUES ('3', 'zhangsan', 'lisi', 'beijing', 'beijing', 'beijng ', '01000', '15011111111', '38124546@11.com');
INSERT INTO `delivery_addresses` VALUES ('4', 'zhangsan', 'lisi', 'beijing', 'beijing', 'beijng ', '01000', '15011111111', '38124546@11.com');
INSERT INTO `delivery_addresses` VALUES ('5', 'zhangsan', 'lisi', 'beijing', 'beijing', 'beijng ', '01000', '15011111111', '38124546@11.com');
INSERT INTO `delivery_addresses` VALUES ('6', '11', '11', '11', '11', '11', '11', '11', '11');
INSERT INTO `delivery_addresses` VALUES ('7', '11', '11', '11', '11', '11', '11', '11', '11');
INSERT INTO `delivery_addresses` VALUES ('8', 'zhao', 'zhao', 'zhao', 'zhao', 'zhao', 'zhao', 'zhao', 'zhao');
INSERT INTO `delivery_addresses` VALUES ('9', '3', '3', '3', '3', '3', '3', '3', '3');

-- ----------------------------
-- Table structure for logins
-- ----------------------------
DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of logins
-- ----------------------------
INSERT INTO `logins` VALUES ('1', '1', 'zhao', 'zhao', '');
INSERT INTO `logins` VALUES ('2', '2', 'wang', 'wang', '');
INSERT INTO `logins` VALUES ('12', '12', 'xu', 'xu', '381259127@qq.com');

-- ----------------------------
-- Table structure for orderitems
-- ----------------------------
DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orderitems
-- ----------------------------
INSERT INTO `orderitems` VALUES ('1', '1', '1', '1');
INSERT INTO `orderitems` VALUES ('2', '1', '2', '1');
INSERT INTO `orderitems` VALUES ('3', '2', '1', '1');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `delivery_add_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `session` varchar(100) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '2', '1', '8', '0', '2018-06-04 11:06:56', '2', '', '3.89');
INSERT INTO `orders` VALUES ('2', '12', '1', '9', '0', '2018-06-04 19:08:17', '2', '', '2.99');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '1', 'Best Bags', 'A quality pack of tea bags.200 bags in each box', '', '2.99');
INSERT INTO `products` VALUES ('2', '1', 'Best Orange Juice', 'One gallon of quality sequeezed orange juice.', 'bestorange-juice.jpg', '0.9');
