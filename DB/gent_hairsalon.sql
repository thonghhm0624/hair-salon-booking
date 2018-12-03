/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost:3306
 Source Schema         : gent_hairsalon

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 03/12/2018 20:13:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_category_id` int(11) NOT NULL,
  `article_title` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `article_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `article_image` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `article_keyword` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `article_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`article_id`) USING BTREE,
  INDEX `fk_article_category_id`(`article_category_id`) USING BTREE,
  CONSTRAINT `fk_article_category_id` FOREIGN KEY (`article_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES (1, 1, 'Article 1 Title', 'Article 1 Description', NULL, 'article 1 , articles', '<h1>Arrticle 1 content</h1>');
INSERT INTO `articles` VALUES (2, 1, 'Article 2 Title', 'Article 2 Description', NULL, 'article 2 , articles', '<h1>Article 2 content</h1>');
INSERT INTO `articles` VALUES (3, 2, 'Article 3 Title', 'Article 3 Description', NULL, 'article 3 , articles', '<h1>Article 3 content</h1>');
INSERT INTO `articles` VALUES (4, 2, 'Article 4 Title', 'Article 4 Description', NULL, 'article 4 , articles', '<h1>Article 4 content</h1>');
INSERT INTO `articles` VALUES (5, 3, 'Article 5 Title', 'Article 5 Description', NULL, 'article 5 , articles', '<h1>Article 5 content</h1>');
INSERT INTO `articles` VALUES (6, 3, 'Article 6 Title', 'Article 6 Description', NULL, 'article 6 , articles', '<h1>Article 6 content</h1>');

-- ----------------------------
-- Table structure for branch
-- ----------------------------
DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch`  (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `branch_phonenumber` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`branch_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of branch
-- ----------------------------
INSERT INTO `branch` VALUES (1, '123 Trần Hưng Đạo, Phường Phạm Ngũ Lão, Quận 1, Hồ Chí Minh', '0909090909');
INSERT INTO `branch` VALUES (2, '321 Hồng Bàng, Phường 11, Quận 5, Hồ Chí Minh', '0606060606');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Chăm sóc tóc');
INSERT INTO `categories` VALUES (2, 'Phục hồi tóc');
INSERT INTO `categories` VALUES (3, 'Kiểu tóc');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `customer_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_password` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '123',
  `customer_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Customer',
  `customer_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('0906070937', '123', 'Thông', 0);
INSERT INTO `customers` VALUES ('0924883811', '123', 'Méo Meo', 0);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `product_title` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `product_image` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `product_keyword` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`product_id`) USING BTREE,
  INDEX `fk_product_category_id`(`product_category_id`) USING BTREE,
  CONSTRAINT `fk_product_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 1, 'Dầu gội X-Men FOR BOSS', 'Dầu gội hương nước hoa mạnh mẽ', NULL, 'xmen', '<h1>Product 1 content</h1>');
INSERT INTO `products` VALUES (2, 1, 'Dầu gội HEAD&SHOULDER bạc hà (2018)', 'Mát lạnh cả ngày', NULL, 'head, shoulder, head and shoulder', '<h1>Product 2 content</h1>');
INSERT INTO `products` VALUES (3, 2, 'Dầu gội HEAD&SHOULDER ULTRA MEN', 'ANTI-HAIRFAIL', NULL, 'ngan trung toc, head and shoulder', '<h1>Product 3 content</h1>');
INSERT INTO `products` VALUES (4, 3, 'Sáp vuốt tóc VOLCANIC CLAY APESTOMEN 2018', 'Sáp giữ nếp ổn định, không gây bết dính', NULL, 'volcanic clay, sáp, apestomen', '<h1>Product 4 content</h1>');
INSERT INTO `products` VALUES (5, 2, 'Dầu gội CLEAR Thảo dược', 'Tinh chất thảo dược phục hồi tóc nhanh chóng', NULL, 'Clear', '<h1>Product 5 content</h1>');
INSERT INTO `products` VALUES (6, 3, 'Gel vuốt tóc Romano', 'Giữ nếp cho kiểu tóc yêu thích của bạn cả ngày', NULL, 'romano, sáp', '<h1>Product 6 content</h1>');

-- ----------------------------
-- Table structure for reservations
-- ----------------------------
DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations`  (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_status` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` int(11) NOT NULL,
  `reservation_marks` int(11) NOT NULL,
  `reservation_remark` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `customer_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stylist_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`) USING BTREE,
  INDEX `fk_reserve_customer_id`(`customer_id`) USING BTREE,
  INDEX `fk_reserve_stylist_id`(`stylist_id`) USING BTREE,
  INDEX `fk_reserve_branch_id`(`branch_id`) USING BTREE,
  CONSTRAINT `fk_reserve_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_reserve_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_reserve_stylist_id` FOREIGN KEY (`stylist_id`) REFERENCES `stylist` (`stylist_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `services_id` int(11) NOT NULL AUTO_INCREMENT,
  `services_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Service',
  `services_duration` int(11) NOT NULL DEFAULT 1,
  `services_price` int(11) NOT NULL DEFAULT 100000,
  `service_image` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`services_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES (1, 'Cắt tóc', 1, 100000, NULL);
INSERT INTO `services` VALUES (2, 'Nhuộm tóc', 1, 100000, NULL);
INSERT INTO `services` VALUES (3, 'Uốn tóc', 1, 200000, NULL);
INSERT INTO `services` VALUES (4, 'Combo Cắt và Nhuộm tóc', 2, 180000, NULL);
INSERT INTO `services` VALUES (5, 'Combo Cắt, Nhuộm, Uốn tóc', 3, 350000, NULL);
INSERT INTO `services` VALUES (6, 'Dưỡng tóc', 2, 150000, NULL);

-- ----------------------------
-- Table structure for stylist
-- ----------------------------
DROP TABLE IF EXISTS `stylist`;
CREATE TABLE `stylist`  (
  `stylist_id` int(11) NOT NULL AUTO_INCREMENT,
  `stylist_branch_id` int(11) NOT NULL,
  `stylist_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Stylist',
  `stylist_password` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '123',
  `stylist_image` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `stylist_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`stylist_id`) USING BTREE,
  INDEX `fk_stylist_branch_id`(`stylist_branch_id`) USING BTREE,
  CONSTRAINT `fk_stylist_branch_id` FOREIGN KEY (`stylist_branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stylist
-- ----------------------------
INSERT INTO `stylist` VALUES (1, 1, 'David Beckham', '123', NULL, 1);
INSERT INTO `stylist` VALUES (2, 1, 'Taylor Swift', '123', NULL, 1);
INSERT INTO `stylist` VALUES (5, 1, 'Selena Gomez', '123', NULL, 1);
INSERT INTO `stylist` VALUES (6, 2, 'Chris Pratt', '123', NULL, 1);
INSERT INTO `stylist` VALUES (7, 2, 'Irelia', '123', NULL, 1);
INSERT INTO `stylist` VALUES (8, 1, 'Dr. Mundo', '123', NULL, 1);

SET FOREIGN_KEY_CHECKS = 1;
