/*
Navicat MySQL Data Transfer

Source Server         : PREVIEW
Source Server Version : 50547
Source Host           : 88.80.188.110:3306
Source Database       : innovative_nail_design

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2018-03-14 13:29:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for collections
-- ----------------------------
DROP TABLE IF EXISTS `collections`;
CREATE TABLE `collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `to_homepage` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of collections
-- ----------------------------
INSERT INTO `collections` VALUES ('1', 'collection-1', null, 'Collection 1', '1', '2018-03-03 09:43:53');
INSERT INTO `collections` VALUES ('2', 'collection-2', null, 'Collection 2', '1', '2018-03-03 09:44:57');
INSERT INTO `collections` VALUES ('3', 'collection-3', null, 'Collection 3', '1', '2018-03-03 09:45:09');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', 'Test', 'test@test.com', 'asdasdasdasd', '2018-03-06 00:36:16');
INSERT INTO `contacts` VALUES ('2', 'Kalvin Nhan', 'kalvinnhan@yahoo.com', 'hello, I am testing', '2018-03-11 01:19:22');

-- ----------------------------
-- Table structure for log_users
-- ----------------------------
DROP TABLE IF EXISTS `log_users`;
CREATE TABLE `log_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_edit` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_users
-- ----------------------------
INSERT INTO `log_users` VALUES ('3', '1', '$2y$10$PsSZVevgmacQ7mcAGLvdXu6X43iqHMZ/Rt0jyEOpXaXLhfBJTcpTy', '2018-01-24 15:14:44', null, '2017-09-20 15:01:01');

-- ----------------------------
-- Table structure for newsletters
-- ----------------------------
DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `subscribed` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of newsletters
-- ----------------------------
INSERT INTO `newsletters` VALUES ('1', 'vecnubu@rukzalor.net', '1', '2018-02-17 14:22:33');

-- ----------------------------
-- Table structure for product_descriptions
-- ----------------------------
DROP TABLE IF EXISTS `product_descriptions`;
CREATE TABLE `product_descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `textblock_1` text,
  `imageblock_1` varchar(255) DEFAULT NULL,
  `textblock_2` text,
  `imageblock_2` varchar(255) DEFAULT NULL,
  `textblock_3` text,
  `imageblock_3` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_descriptions
-- ----------------------------

-- ----------------------------
-- Table structure for product_types
-- ----------------------------
DROP TABLE IF EXISTS `product_types`;
CREATE TABLE `product_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_types
-- ----------------------------
INSERT INTO `product_types` VALUES ('1', 'uv-free-gel', 'UV Free Gel', '2018-03-02 22:54:34');
INSERT INTO `product_types` VALUES ('2', 'finishes', 'Finishes', '2018-03-02 22:54:46');
INSERT INTO `product_types` VALUES ('3', 'dip-powder', 'Dip Powder (Coming Soon)', '2018-03-07 17:39:04');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `color_group` int(11) DEFAULT NULL,
  `is_new` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Salmon - 101', 'Gel polish with red salmon color ', '1', 'files/upload/products/1/101.jpg', '10', '1', '1', '2018-03-06 00:08:06', '2018-03-06 00:08:06');
INSERT INTO `products` VALUES ('2', 'Midnight Black - 102', 'Get polish with midnight black color', '1', 'files/upload/products/2/102.jpg', '1', '0', '1', '2018-03-06 00:09:33', '2018-03-11 13:40:10');
INSERT INTO `products` VALUES ('3', 'Powder Blue - 103', 'Get polish with powder blue color', '1', 'files/upload/products/3/103.jpg', '2', '0', '1', '2018-03-06 00:10:05', '2018-03-11 13:42:58');
INSERT INTO `products` VALUES ('4', 'Ruby Pink - 104', 'Get polish with ruby pink color', '1', 'files/upload/products/4/104.jpg', '8', '0', '1', '2018-03-06 00:10:40', '2018-03-11 13:43:03');
INSERT INTO `products` VALUES ('5', 'Champagne Pink - 105', 'Get polish with champagne pink color', '1', 'files/upload/products/5/105.jpg', '8', '1', '1', '2018-03-06 00:11:14', '2018-03-06 00:11:14');
INSERT INTO `products` VALUES ('6', 'Ocean Blue - 106', 'Get polish with ocean blue color', '1', 'files/upload/products/6/106.jpg', '2', '1', '1', '2018-03-06 00:11:42', '2018-03-06 00:11:42');
INSERT INTO `products` VALUES ('7', 'Vanillia - 107', 'Get polish with vanilla color', '1', 'files/upload/products/7/107.jpg', '6', '1', '1', '2018-03-06 00:12:13', '2018-03-06 00:12:13');
INSERT INTO `products` VALUES ('8', 'Strawberry Pink - 108', 'Get polish with strawberry pink color', '1', 'files/upload/products/8/108.jpg', '8', '1', '1', '2018-03-06 00:12:45', '2018-03-06 00:12:45');
INSERT INTO `products` VALUES ('9', 'Blue Sea - 109', 'Get polish with blue sea color', '1', 'files/upload/products/9/109.jpg', '2', '1', '1', '2018-03-06 00:13:19', '2018-03-06 00:13:19');
INSERT INTO `products` VALUES ('10', 'Light Pink - 110', 'Get polish with light pink color', '1', 'files/upload/products/10/110.jpg', '8', '0', '1', '2018-03-06 00:13:53', '2018-03-11 13:42:45');
INSERT INTO `products` VALUES ('11', 'Hazelnut - 111', 'Get polish with hazelnut color', '1', 'files/upload/products/11/111.jpg', '3', '0', '1', '2018-03-06 00:14:24', '2018-03-11 13:40:14');
INSERT INTO `products` VALUES ('12', 'Metalic Pink - 112', 'Get polish with metalic pink color', '1', 'files/upload/products/12/112.jpg', '5', '0', '1', '2018-03-06 00:15:08', '2018-03-11 13:40:15');
INSERT INTO `products` VALUES ('13', 'Brave Pink - 113', 'Get polish with brave pink color', '1', 'files/upload/products/13/113.jpg', '8', '0', '1', '2018-03-06 00:15:29', '2018-03-11 13:41:51');
INSERT INTO `products` VALUES ('14', 'Atlantic Blue - 114', 'Get polish with atlantic blue color', '1', 'files/upload/products/14/114.jpg', '2', '0', '1', '2018-03-06 00:16:06', '2018-03-11 13:44:03');
INSERT INTO `products` VALUES ('15', 'Tropical Sand - 115', 'Get polish with tropical sand color', '1', 'files/upload/products/15/115.jpg', '10', '0', '1', '2018-03-06 00:16:44', '2018-03-11 13:42:00');
INSERT INTO `products` VALUES ('16', 'Pistachio - 116', 'Get polish with pistachio color', '1', 'files/upload/products/16/116.jpg', '4', '0', '1', '2018-03-06 00:17:13', '2018-03-11 13:40:20');
INSERT INTO `products` VALUES ('17', 'Grey Skies - 117', 'Get polish with grey skies color', '1', 'files/upload/products/17/117.jpg', '1', '0', '1', '2018-03-06 00:17:41', '2018-03-11 13:35:30');
INSERT INTO `products` VALUES ('18', 'Amethyst - 118', 'Get polish with amethyst color', '1', 'files/upload/products/18/118.jpg', '9', '0', '1', '2018-03-06 00:18:07', '2018-03-06 00:18:07');
INSERT INTO `products` VALUES ('19', 'Rosewood - 119', 'Get polish with rosewood color', '1', 'files/upload/products/19/119.jpg', '10', '0', '1', '2018-03-06 00:18:29', '2018-03-06 00:18:29');
INSERT INTO `products` VALUES ('20', 'Nude - 120', 'Get polish with nude color', '1', 'files/upload/products/20/120.jpg', '6', '0', '1', '2018-03-06 00:18:45', '2018-03-11 13:42:21');
INSERT INTO `products` VALUES ('21', 'Base Gel', 'Base gel for polish', '2', 'files/upload/products/21/BaseGel.jpg', '1', '0', '1', '2018-03-06 01:09:59', '2018-03-06 01:09:59');
INSERT INTO `products` VALUES ('22', 'Prep', 'Prep gel for polish applications', '2', 'files/upload/products/22/Prep.jpg', '1', '0', '1', '2018-03-06 01:10:19', '2018-03-06 01:10:19');
INSERT INTO `products` VALUES ('23', 'Finish Gel', 'Finish gel to apply when polish application have finished in order to protect the color coat gel', '2', 'files/upload/products/23/FinishGel.jpg', '1', '0', '1', '2018-03-06 01:11:08', '2018-03-06 01:11:09');
INSERT INTO `products` VALUES ('24', 'Blush Cream - 121', 'Polish color coat with blush cream color', '1', 'files/upload/products/24/121.jpg', '6', '0', '1', '2018-03-06 23:28:57', '2018-03-11 13:42:18');
INSERT INTO `products` VALUES ('25', 'Boysenberry - 122', 'Color coat polish gel with boysenberry color', '1', 'files/upload/products/25/122.jpg', '9', '0', '1', '2018-03-06 23:30:02', '2018-03-11 13:41:01');
INSERT INTO `products` VALUES ('26', 'Deep Blue Sea - 123', 'Color coat polish gel with deep blue sea color', '1', 'files/upload/products/26/123.jpg', '2', '1', '1', '2018-03-06 23:30:39', '2018-03-06 23:30:39');
INSERT INTO `products` VALUES ('27', 'Coral - 124', 'Color coat polish gel with coral color', '1', 'files/upload/products/27/124.jpg', '10', '0', '1', '2018-03-06 23:31:18', '2018-03-11 13:42:09');
INSERT INTO `products` VALUES ('28', 'Sangria - 125', 'Color coat polish gel with sangria color', '1', 'files/upload/products/28/125.jpg', '10', '1', '1', '2018-03-06 23:32:00', '2018-03-06 23:32:00');
INSERT INTO `products` VALUES ('29', 'Platinum Blonde - 126', 'Color coat polish gel with platinum blonde color', '1', 'files/upload/products/29/126.jpg', '5', '0', '1', '2018-03-06 23:32:32', '2018-03-06 23:35:33');
INSERT INTO `products` VALUES ('30', 'Carnation Pink - 127', 'Color coat polish gel with carnation pink color', '1', 'files/upload/products/30/127_edit.jpg', '8', '0', '1', '2018-03-06 23:33:05', '2018-03-08 22:00:07');
INSERT INTO `products` VALUES ('31', 'Rust Orange - 128', 'Nail polish color coat with rust orange color', '1', 'files/upload/products/31/128.jpg', '7', '0', '1', '2018-03-07 10:19:38', '2018-03-07 10:19:38');
INSERT INTO `products` VALUES ('32', 'Cashmere - 129', 'Nail polish color coat with cashmere  color', '1', 'files/upload/products/32/129.jpg', '6', '0', '1', '2018-03-07 10:20:22', '2018-03-07 10:20:22');
INSERT INTO `products` VALUES ('33', 'Fruit - 130', 'Nail polish color coat with fruit color', '1', 'files/upload/products/33/130.jpg', '8', '0', '1', '2018-03-07 10:21:04', '2018-03-07 10:21:04');
INSERT INTO `products` VALUES ('34', 'Copper Orange - 131', 'Nail polish color coat with copper orange color', '1', 'files/upload/products/34/131.jpg', '7', '0', '1', '2018-03-07 10:21:38', '2018-03-07 10:21:38');
INSERT INTO `products` VALUES ('35', 'Mahogany - 132', 'Nail polish color coat with mahogany color', '1', 'files/upload/products/35/132.jpg', '9', '0', '1', '2018-03-07 10:22:10', '2018-03-07 10:23:04');
INSERT INTO `products` VALUES ('36', 'Garnet Red - 133', 'Nail polish color coat with garnet red color', '1', 'files/upload/products/36/133.jpg', '10', '0', '1', '2018-03-07 10:23:50', '2018-03-07 10:30:30');
INSERT INTO `products` VALUES ('37', 'Emerald Blue - 134', 'Nail polish color coat', '1', 'files/upload/products/37/134.jpg', '2', '1', '1', '2018-03-08 22:09:01', '2018-03-11 13:43:56');
INSERT INTO `products` VALUES ('38', 'Apricot - 135', 'Color coat polish gel with apricot color', '1', 'files/upload/products/38/135.jpg', '10', '0', '1', '2018-03-08 22:13:46', '2018-03-08 22:13:46');
INSERT INTO `products` VALUES ('39', 'All Natural - 136', 'Color coat polish gel with all natural color', '1', 'files/upload/products/39/136.jpg', '8', '0', '1', '2018-03-08 22:14:36', '2018-03-08 22:14:36');
INSERT INTO `products` VALUES ('40', 'Beige - 137', 'Color coat polish gel with beige color', '1', 'files/upload/products/40/137.jpg', '8', '0', '1', '2018-03-08 22:15:02', '2018-03-08 22:15:02');
INSERT INTO `products` VALUES ('41', 'Scarlet - 138', 'Color coat polish gel with scarlet color', '1', 'files/upload/products/41/138.jpg', '9', '0', '1', '2018-03-08 22:17:05', '2018-03-08 22:17:05');
INSERT INTO `products` VALUES ('42', 'Cranberry Red - 139', 'Color coat polish gel with cranberry red color', '1', 'files/upload/products/42/139.jpg', '10', '0', '1', '2018-03-08 22:17:44', '2018-03-08 22:17:44');
INSERT INTO `products` VALUES ('43', 'Aqua Blue - 140', 'Color coat polish gel with aqua blue color', '1', 'files/upload/products/43/140.jpg', '2', '0', '1', '2018-03-08 22:18:18', '2018-03-08 22:18:18');
INSERT INTO `products` VALUES ('44', 'Gossip - 141', 'Color coat polish gel with gossip color', '1', 'files/upload/products/44/141.jpg', '9', '0', '1', '2018-03-08 22:18:55', '2018-03-08 22:18:55');
INSERT INTO `products` VALUES ('45', 'Tangerine - 142', 'Color coat polish gel with tangerine color', '1', 'files/upload/products/45/142.jpg', '7', '0', '1', '2018-03-08 22:20:02', '2018-03-08 22:23:06');
INSERT INTO `products` VALUES ('46', 'Neutral Cream - 143', 'Color coat polish gel with neutral cream color', '1', 'files/upload/products/46/143.jpg', '6', '0', '1', '2018-03-08 22:21:56', '2018-03-08 22:21:56');
INSERT INTO `products` VALUES ('47', 'Arctic White - 144', 'Color coat polish gel with arctic color', '1', 'files/upload/products/47/144.jpg', '1', '0', '1', '2018-03-08 22:22:47', '2018-03-08 22:22:47');
INSERT INTO `products` VALUES ('48', 'Electric Purple - 145', 'Color coat polish gel with electric purple color', '1', 'files/upload/products/48/145.jpg', '9', '0', '1', '2018-03-08 22:24:05', '2018-03-08 22:24:05');
INSERT INTO `products` VALUES ('49', 'Havana Green - 146', 'Color coat polish gel with havana green color', '1', 'files/upload/products/49/146.jpg', '4', '0', '1', '2018-03-08 22:24:40', '2018-03-08 22:24:40');
INSERT INTO `products` VALUES ('50', 'Soft Pink - 147', 'Color coat polish gel with soft pink color', '1', 'files/upload/products/50/147.jpg', '8', '0', '1', '2018-03-08 22:25:10', '2018-03-08 22:25:10');
INSERT INTO `products` VALUES ('51', 'Bare Pink - 148', 'Color coat polish gel with bare pink color', '1', 'files/upload/products/51/148.jpg', '8', '0', '1', '2018-03-08 22:25:51', '2018-03-08 22:25:51');
INSERT INTO `products` VALUES ('52', 'Cosmo Grey - 149', 'Color coat polish gel with cosmo grey color', '1', 'files/upload/products/52/149.jpg', '1', '0', '1', '2018-03-08 22:26:31', '2018-03-08 22:44:41');
INSERT INTO `products` VALUES ('53', 'Summer - 150', 'Color coat polish gel with summer color', '1', 'files/upload/products/53/150.jpg', '8', '0', '1', '2018-03-08 22:27:20', '2018-03-08 22:27:20');
INSERT INTO `products` VALUES ('54', 'Cherry Red - 151', 'Color coat polish gel with cherry red color', '1', 'files/upload/products/54/151.jpg', '10', '0', '1', '2018-03-08 22:27:59', '2018-03-08 22:27:59');
INSERT INTO `products` VALUES ('55', 'Indigo - 152', 'Color coat polish gel with indigo color', '1', 'files/upload/products/55/152.jpg', '2', '1', '1', '2018-03-08 22:29:43', '2018-03-11 13:43:58');
INSERT INTO `products` VALUES ('56', 'Scarlet Red - 153', 'Color coat polish gel with scarlet red color', '1', 'files/upload/products/56/153.jpg', '10', '0', '1', '2018-03-08 22:31:05', '2018-03-08 22:31:05');
INSERT INTO `products` VALUES ('57', 'Petal Pink - 154', 'Color coat polish gel with petal pink color', '1', 'files/upload/products/57/154.jpg', '8', '0', '1', '2018-03-08 22:31:43', '2018-03-08 22:31:43');
INSERT INTO `products` VALUES ('58', 'Cocoa Bean - 155', 'Color coat polish gel with cocoa bean color', '1', 'files/upload/products/58/155.jpg', '6', '0', '1', '2018-03-08 22:32:26', '2018-03-08 22:32:26');
INSERT INTO `products` VALUES ('59', 'Popsicle Red - 156', 'Color coat polish gel with popsicle red color', '1', 'files/upload/products/59/156.jpg', '10', '0', '1', '2018-03-08 22:33:11', '2018-03-08 22:33:11');
INSERT INTO `products` VALUES ('60', 'Arctic Blue - 157', 'Color coat polish gel with arctic blue color', '1', 'files/upload/products/60/157.jpg', '2', '0', '1', '2018-03-08 22:33:54', '2018-03-08 22:33:54');
INSERT INTO `products` VALUES ('61', 'Bronze - 158', 'Color coat polish gel with bronze color', '1', 'files/upload/products/61/158.jpg', '5', '0', '1', '2018-03-08 22:34:28', '2018-03-08 22:43:04');
INSERT INTO `products` VALUES ('62', 'Crimson Red - 159', 'Color coat polish gel with crimson red color', '1', 'files/upload/products/62/159.jpg', '10', '0', '1', '2018-03-08 22:35:05', '2018-03-08 22:35:05');
INSERT INTO `products` VALUES ('63', 'French White - 160', 'Color coat polish gel with french white color', '1', 'files/upload/products/63/160.jpg', '1', '0', '1', '2018-03-08 22:35:41', '2018-03-08 22:35:41');
INSERT INTO `products` VALUES ('64', 'Jet Black - 161', 'Color coat polish gel with jet black color', '1', 'files/upload/products/64/161.jpg', '1', '0', '1', '2018-03-08 22:36:17', '2018-03-08 22:36:17');
INSERT INTO `products` VALUES ('65', 'Fresh Mint - 162', 'Color coat polish gel with fresh mint color', '1', 'files/upload/products/65/162.jpg', '4', '0', '1', '2018-03-08 22:37:39', '2018-03-08 22:37:39');
INSERT INTO `products` VALUES ('66', 'Royal Blue - 163', 'Color coat polish gel with royal blue color', '1', 'files/upload/products/66/163.jpg', '2', '0', '1', '2018-03-08 22:38:07', '2018-03-08 22:44:10');
INSERT INTO `products` VALUES ('67', 'Magenta - 164', 'Color coat polish gel with magenta color', '1', 'files/upload/products/67/164.jpg', '8', '0', '1', '2018-03-08 22:38:43', '2018-03-08 22:38:43');
INSERT INTO `products` VALUES ('68', 'Fawn - 165', 'Color coat polish gel with fawn color', '1', 'files/upload/products/68/165.jpg', '10', '0', '1', '2018-03-08 22:39:15', '2018-03-08 22:39:15');
INSERT INTO `products` VALUES ('69', 'Cosmo Blue - 166', 'Color coat polish gel with cosmo blue color', '1', 'files/upload/products/69/166.jpg', '2', '0', '1', '2018-03-08 22:39:44', '2018-03-08 22:39:44');
INSERT INTO `products` VALUES ('70', 'Sparkling Red - 167', 'Color coat polish gel with sparkling red color', '1', 'files/upload/products/70/167.jpg', '10', '0', '1', '2018-03-08 22:40:30', '2018-03-08 22:40:30');
INSERT INTO `products` VALUES ('71', 'Taffy - 168', 'Color coat polish gel with taffy color', '1', 'files/upload/products/71/168.jpg', '8', '0', '1', '2018-03-08 22:41:10', '2018-03-08 22:41:10');
INSERT INTO `products` VALUES ('72', 'Mulberry - 169', 'Color coat polish gel with mulberry color', '1', 'files/upload/products/72/169.jpg', '9', '0', '1', '2018-03-08 22:41:56', '2018-03-08 22:43:49');
INSERT INTO `products` VALUES ('73', 'Turquoise - 170', 'Color coat polish gel with turquoise color', '1', 'files/upload/products/73/170.jpg', '2', '0', '1', '2018-03-08 22:42:30', '2018-03-08 22:43:31');
INSERT INTO `products` VALUES ('74', 'Pink Fuchsia - 171', 'Color coat polish gel with pink fuchsia color', '1', 'files/upload/products/74/171.jpg', '8', '0', '1', '2018-03-08 22:49:41', '2018-03-08 22:50:11');
INSERT INTO `products` VALUES ('75', 'Phoenix Red - 172', 'Color coat polish gel with phoenix red color', '1', 'files/upload/products/75/172.jpg', '10', '0', '1', '2018-03-08 22:50:58', '2018-03-08 22:50:58');
INSERT INTO `products` VALUES ('76', 'Rose Gold - 173', 'Color coat polish gel with rose gold color', '1', 'files/upload/products/76/173.jpg', '5', '0', '1', '2018-03-08 22:51:40', '2018-03-08 22:51:40');
INSERT INTO `products` VALUES ('77', 'Beige Cream - 174', 'Color coat polish gel with beige cream color', '1', 'files/upload/products/77/174.jpg', '6', '0', '1', '2018-03-08 22:52:41', '2018-03-08 22:52:41');
INSERT INTO `products` VALUES ('78', 'Lemon Chiffon - 175', 'Color coat polish gel with lemon chiffon color', '1', 'files/upload/products/78/175.jpg', '11', '1', '1', '2018-03-08 22:53:24', '2018-03-11 13:45:00');
INSERT INTO `products` VALUES ('79', 'Poppy Red - 176', 'Color coat polish gel with poppy red color', '1', 'files/upload/products/79/176.jpg', '10', '0', '1', '2018-03-08 22:53:53', '2018-03-08 22:53:53');
INSERT INTO `products` VALUES ('80', 'Red Wine - 177', 'Color coat polish gel with red wine color', '1', 'files/upload/products/80/177.jpg', '10', '0', '1', '2018-03-08 22:54:46', '2018-03-08 22:54:46');
INSERT INTO `products` VALUES ('81', 'Rose Pink - 178', 'Color coat polish gel with rose pink color', '1', 'files/upload/products/81/178.jpg', '8', '0', '1', '2018-03-08 22:55:16', '2018-03-08 22:55:16');
INSERT INTO `products` VALUES ('82', 'Red Violet - 179', 'Color coat polish gel with red violet color', '1', 'files/upload/products/82/179.jpg', '10', '0', '1', '2018-03-08 22:56:20', '2018-03-08 22:56:20');
INSERT INTO `products` VALUES ('83', 'Apple Red - 180', 'Color coat polish gel with apple red color', '1', 'files/upload/products/83/180.jpg', '10', '0', '1', '2018-03-08 22:58:18', '2018-03-08 22:58:18');
INSERT INTO `products` VALUES ('84', 'Flamingo - 181', 'Color coat polish gel with flamingo color', '1', 'files/upload/products/84/181.jpg', '8', '0', '1', '2018-03-08 22:58:59', '2018-03-08 22:58:59');
INSERT INTO `products` VALUES ('85', 'Blueberry - 182', 'Color coat polish gel with blueberry color', '1', 'files/upload/products/85/182 (1).jpg', '2', '1', '1', '2018-03-08 22:59:40', '2018-03-11 13:44:01');
INSERT INTO `products` VALUES ('86', 'Red Velvet - 183', 'Color coat polish gel with red velvet color', '1', 'files/upload/products/86/183.jpg', '10', '0', '1', '2018-03-08 23:00:13', '2018-03-08 23:00:13');
INSERT INTO `products` VALUES ('87', 'Desert Red - 184', 'Color coat polish gel with desert red color', '1', 'files/upload/products/87/184.jpg', '10', '1', '1', '2018-03-08 23:00:51', '2018-03-11 13:41:06');
INSERT INTO `products` VALUES ('88', 'Lava Red - 185', 'Color coat polish gel with lava red color', '1', 'files/upload/products/88/185.jpg', '10', '0', '1', '2018-03-08 23:01:20', '2018-03-11 13:55:31');
INSERT INTO `products` VALUES ('89', 'Honey - 186', 'Color coat polish gel with honey color', '1', 'files/upload/products/89/186.jpg', '6', '0', '1', '2018-03-08 23:01:47', '2018-03-08 23:31:31');
INSERT INTO `products` VALUES ('90', 'Pink Swan - 187', 'Color coat polish gel with pink swan color', '1', 'files/upload/products/90/187.jpg', '8', '0', '1', '2018-03-08 23:02:22', '2018-03-08 23:02:22');
INSERT INTO `products` VALUES ('91', 'Bubble Gum - 188', 'Color coat polish gel with bubble gum color', '1', 'files/upload/products/91/188.jpg', '8', '1', '1', '2018-03-08 23:02:51', '2018-03-11 13:43:39');
INSERT INTO `products` VALUES ('92', 'Natural Pink - 189', 'Color coat polish gel with natural pink color', '1', 'files/upload/products/92/189.jpg', '8', '0', '1', '2018-03-08 23:03:25', '2018-03-08 23:03:25');
INSERT INTO `products` VALUES ('93', 'Petal Soft - 190', 'Color coat polish gel with petal soft color', '1', 'files/upload/products/93/190.jpg', '8', '0', '1', '2018-03-08 23:04:08', '2018-03-08 23:31:51');
INSERT INTO `products` VALUES ('94', 'Amethyst Stone - 191', 'Color coat polish gel with amethyst stone color', '1', 'files/upload/products/94/191.jpg', '2', '0', '1', '2018-03-08 23:05:02', '2018-03-08 23:05:02');
INSERT INTO `products` VALUES ('95', 'Burnt Roses - 192', 'Gel polish with burnt roses color', '1', 'files/upload/products/95/192.jpg', '10', '0', '1', '2018-03-08 23:06:28', '2018-03-08 23:06:28');
INSERT INTO `products` VALUES ('96', 'Cherry Blossom Pink - 193', 'Get polish with cherry blossom pink color', '1', 'files/upload/products/96/193.jpg', '8', '0', '1', '2018-03-08 23:07:25', '2018-03-08 23:07:25');
INSERT INTO `products` VALUES ('97', 'Pewter - 194', 'Get polish with pewter color', '1', 'files/upload/products/97/194.jpg', '5', '0', '1', '2018-03-08 23:08:08', '2018-03-08 23:08:08');
INSERT INTO `products` VALUES ('98', 'Orchid - 195', 'Get polish with orchid color', '1', 'files/upload/products/98/195.jpg', '8', '0', '1', '2018-03-08 23:08:49', '2018-03-08 23:08:49');
INSERT INTO `products` VALUES ('99', 'Orange Peel - 196', 'Get polish with orange peel color', '1', 'files/upload/products/99/196.jpg', '7', '0', '1', '2018-03-08 23:09:36', '2018-03-08 23:09:36');
INSERT INTO `products` VALUES ('100', 'Red Gold - 197', 'Get polish with red gold color', '1', 'files/upload/products/100/197.jpg', '5', '0', '1', '2018-03-08 23:10:09', '2018-03-08 23:32:14');
INSERT INTO `products` VALUES ('101', 'Pearlescent - 198', 'Get polish with pearlescent color', '1', 'files/upload/products/101/198.jpg', '5', '0', '1', '2018-03-08 23:11:02', '2018-03-08 23:11:02');
INSERT INTO `products` VALUES ('102', 'Bright Pink - 199', 'Get polish with bright pink color', '1', 'files/upload/products/102/199.jpg', '8', '0', '1', '2018-03-08 23:11:44', '2018-03-08 23:11:44');
INSERT INTO `products` VALUES ('103', 'Cotton Candy - 200', 'Get polish with cotton candy color', '1', 'files/upload/products/103/200.jpg', '5', '0', '1', '2018-03-08 23:12:19', '2018-03-08 23:12:19');
INSERT INTO `products` VALUES ('104', 'Cherry Pink - 201', 'Get polish with cherry pink color', '1', 'files/upload/products/104/201.jpg', '8', '0', '1', '2018-03-08 23:12:58', '2018-03-08 23:12:58');
INSERT INTO `products` VALUES ('105', 'Deep Orange - 202', 'Get polish with deep orange color', '1', 'files/upload/products/105/202.jpg', '7', '0', '1', '2018-03-08 23:13:28', '2018-03-08 23:13:28');
INSERT INTO `products` VALUES ('106', 'Diamond White - 203', 'Get polish with diamond white color', '1', 'files/upload/products/106/203.jpg', '1', '0', '1', '2018-03-08 23:14:06', '2018-03-08 23:14:06');
INSERT INTO `products` VALUES ('107', 'Desert Pink - 204', 'Get polish with desert pink color', '1', 'files/upload/products/107/204.jpg', '8', '0', '1', '2018-03-08 23:14:36', '2018-03-08 23:14:36');
INSERT INTO `products` VALUES ('108', 'Chestnut Brown - 205', 'Get polish with chestnut brown color', '1', 'files/upload/products/108/205.jpg', '3', '0', '1', '2018-03-08 23:15:21', '2018-03-08 23:15:21');
INSERT INTO `products` VALUES ('109', 'Tropical Tan - 206', 'Get polish with tropical tan color', '1', 'files/upload/products/109/206.jpg', '3', '0', '1', '2018-03-08 23:16:02', '2018-03-08 23:16:02');
INSERT INTO `products` VALUES ('110', 'Red Red - 207', 'Get polish with red red color', '1', 'files/upload/products/110/207.jpg', '10', '0', '1', '2018-03-08 23:16:33', '2018-03-08 23:16:33');
INSERT INTO `products` VALUES ('111', 'Pink Orchid - 208', 'Get polish with pink orchid color', '1', 'files/upload/products/111/208.jpg', '8', '0', '1', '2018-03-08 23:17:09', '2018-03-08 23:17:09');
INSERT INTO `products` VALUES ('112', 'Pink Rose - 209', 'Get polish with pink rose color', '1', 'files/upload/products/112/209.jpg', '8', '0', '1', '2018-03-08 23:17:39', '2018-03-08 23:17:39');
INSERT INTO `products` VALUES ('113', 'Snow - 210', 'Get polish with snow color', '1', 'files/upload/products/113/210.jpg', '1', '0', '1', '2018-03-08 23:18:05', '2018-03-08 23:18:05');
INSERT INTO `products` VALUES ('114', 'Neutral Pink - 211', 'Get polish with neutral pink color', '1', 'files/upload/products/114/211.jpg', '8', '0', '1', '2018-03-08 23:18:54', '2018-03-08 23:18:54');
INSERT INTO `products` VALUES ('115', 'Orange Crush - 212', 'Get polish with orange crush color', '1', 'files/upload/products/115/212.jpg', '7', '0', '1', '2018-03-08 23:19:40', '2018-03-08 23:19:40');
INSERT INTO `products` VALUES ('116', 'Deep Pink - 213', 'Get polish with deep pink color', '1', 'files/upload/products/116/213.jpg', '8', '0', '1', '2018-03-08 23:20:18', '2018-03-08 23:20:18');
INSERT INTO `products` VALUES ('117', 'Baby Pink - 214', 'Get polish with baby pink color', '1', 'files/upload/products/117/214.jpg', '8', '1', '1', '2018-03-08 23:20:51', '2018-03-11 13:43:46');
INSERT INTO `products` VALUES ('118', 'Titanium Silver - 215', 'Get polish with titanium silver color', '1', 'files/upload/products/118/215.jpg', '5', '0', '1', '2018-03-08 23:21:26', '2018-03-08 23:21:26');
INSERT INTO `products` VALUES ('119', 'Pretty In Pink - 216', 'Get polish with pretty in pink color', '1', 'files/upload/products/119/216.jpg', '8', '0', '1', '2018-03-08 23:21:59', '2018-03-08 23:21:59');
INSERT INTO `products` VALUES ('120', 'Jam - 217', 'Get polish with jam color', '1', 'files/upload/products/120/217.jpg', '10', '0', '1', '2018-03-08 23:23:15', '2018-03-08 23:23:15');
INSERT INTO `products` VALUES ('121', 'Soft Pink - 218', 'Get polish with new soft pink color', '1', 'files/upload/products/121/218.jpg', '8', '0', '1', '2018-03-08 23:25:52', '2018-03-08 23:25:52');
INSERT INTO `products` VALUES ('122', 'Latte - 219', 'Get polish with latte color', '1', 'files/upload/products/122/219.jpg', '8', '1', '1', '2018-03-08 23:26:25', '2018-03-11 13:43:34');
INSERT INTO `products` VALUES ('123', 'Carbon Blue - 220', 'Get polish with carbon blue color', '1', 'files/upload/products/123/220_edit2.jpg', '2', '1', '1', '2018-03-08 23:30:53', '2018-03-11 13:44:06');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `role` varchar(20) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_edit` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'admin', 'admin@mail.com', '$2y$10$eql/gxt8flfcWbGbCKyDBeZ4SAzsgrN1ZjGocJlQX12V.WRJkPJL2', '1', 'admin', null, '2018-01-24 15:14:44', null, '2018-01-24 15:14:44');
