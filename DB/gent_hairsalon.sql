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

 Date: 08/12/2018 01:09:03
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
  INDEX `fk_article_category_id`(`article_category_id`) USING BTREE
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
-- Table structure for branches
-- ----------------------------
DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches`  (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `branch_phonenumber` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`branch_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of branches
-- ----------------------------
INSERT INTO `branches` VALUES (1, '123 Trần Hưng Đạo, Phường Phạm Ngũ Lão, Quận 1, Hồ Chí Minh', '0909090909');
INSERT INTO `branches` VALUES (2, '321 Hồng Bàng, Phường 11, Quận 5, Hồ Chí Minh', '0606060606');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Chăm sóc tóc');
INSERT INTO `categories` VALUES (2, 'Phục hồi tóc');
INSERT INTO `categories` VALUES (3, 'Kiểu tóc');
INSERT INTO `categories` VALUES (4, 'Khuyến mãi');

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
INSERT INTO `customers` VALUES ('0906007937', '123', 'Customer', 1);
INSERT INTO `customers` VALUES ('0906070000', '123', 'Pipipip', 1);
INSERT INTO `customers` VALUES ('0906070937', '0906070937', 'Thông', 1);
INSERT INTO `customers` VALUES ('0924883811', '123', 'Méo Meo', 0);

-- ----------------------------
-- Table structure for log_users
-- ----------------------------
DROP TABLE IF EXISTS `log_users`;
CREATE TABLE `log_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_edit` datetime(0) NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `modified` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_users
-- ----------------------------
INSERT INTO `log_users` VALUES (3, 1, '$2y$10$PsSZVevgmacQ7mcAGLvdXu6X43iqHMZ/Rt0jyEOpXaXLhfBJTcpTy', '2018-01-24 15:14:44', NULL, '2017-09-20 15:01:01');
INSERT INTO `log_users` VALUES (4, 1, '$2y$10$eql/gxt8flfcWbGbCKyDBeZ4SAzsgrN1ZjGocJlQX12V.WRJkPJL2', '2018-12-03 20:20:33', NULL, '2018-01-24 15:14:44');

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
  INDEX `fk_product_category_id`(`product_category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 4, 'Dầu gội X-Men FOR BOSS', 'Dầu gội hương nước hoa mạnh mẽ', 'images/product/1/product-img.png', 'xmen', '<h1>Product 1 content</h1>');
INSERT INTO `products` VALUES (2, 1, 'Dầu gội HEAD&SHOULDER bạc hà (2018)', 'Mát lạnh cả ngày', 'images/product/1/product-img.png', 'head, shoulder, head and shoulder', '<h1>Product 2 content</h1>');
INSERT INTO `products` VALUES (3, 2, 'Dầu gội HEAD&SHOULDER ULTRA MEN', 'ANTI-HAIRFAIL', 'images/product/1/product-img.png', 'ngan trung toc, head and shoulder', '<h1>Product 3 content</h1>');
INSERT INTO `products` VALUES (4, 3, 'Sáp vuốt tóc VOLCANIC CLAY APESTOMEN 2018', 'Sáp giữ nếp ổn định, không gây bết dính', 'images/product/1/product-img.png', 'volcanic clay, sáp, apestomen', '<h1>Product 4 content</h1>');
INSERT INTO `products` VALUES (5, 2, 'Dầu gội CLEAR Thảo dược', 'Tinh chất thảo dược phục hồi tóc nhanh chóng', 'images/product/1/product-img.png', 'Clear', '<h1>Product 5 content</h1>');
INSERT INTO `products` VALUES (6, 3, 'Gel vuốt tóc Romano', 'Giữ nếp cho kiểu tóc yêu thích của bạn cả ngày', 'images/product/1/product-img.png', 'romano, sáp', 'Dầu gội X-Men FOR BOSS');
INSERT INTO `products` VALUES (7, 1, 'Dầu gội X-Men FOR BOSS', 'Dầu gội hương nước hoa mạnh mẽ 2', 'images/product/1/product-img.png', 'xmen', '<h1>Product 1 content</h1>');
INSERT INTO `products` VALUES (8, 1, 'Dầu gội HEAD&SHOULDER bạc hà (2018)', 'Mát lạnh cả ngày 2', 'images/product/1/product-img.png', 'head, shoulder, head and shoulder', '<h1>Product 2 content</h1>');
INSERT INTO `products` VALUES (9, 2, 'Dầu gội HEAD&SHOULDER ULTRA MEN', 'ANTI-HAIRFAIL 2', 'images/product/1/product-img.png', 'ngan trung toc, head and shoulder', '<h1>Product 3 content</h1>');
INSERT INTO `products` VALUES (10, 3, 'Sáp vuốt tóc VOLCANIC CLAY APESTOMEN 2018', 'Sáp giữ nếp ổn định, không gây bết dính 2', 'images/product/1/product-img.png', 'volcanic clay, sáp, apestomen', '<h1>Product 4 content</h1>');
INSERT INTO `products` VALUES (11, 2, 'Dầu gội CLEAR Thảo dược', 'Tinh chất thảo dược phục hồi tóc nhanh chóng 2', 'images/product/1/product-img.png', 'Clear', '<h1>Product 5 content</h1>');
INSERT INTO `products` VALUES (12, 3, 'Gel vuốt tóc Romano', 'Giữ nếp cho kiểu tóc yêu thích của bạn cả ngày 2', 'images/product/1/product-img.png', 'romano, sáp', 'Dầu gội X-Men FOR BOSS');
INSERT INTO `products` VALUES (13, 3, 'Gel vuốt tóc Romano', 'Giữ nếp cho kiểu tóc yêu thích của bạn cả ngày 2', 'images/product/1/product-img.png', 'romano, sáp', 'Dầu gội X-Men FOR BOSS');
INSERT INTO `products` VALUES (17, 0, 'TEST', 'TESTETET', 'files/upload/products//thumb-1920-587508 (2).png', 'tetetet', '<p>sdsdasdasdasd</p>');

-- ----------------------------
-- Table structure for reservations
-- ----------------------------
DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations`  (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_status` int(11) NOT NULL,
  `reservation_date` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reservation_time` int(11) NOT NULL,
  `reservation_marks` int(11) NOT NULL DEFAULT 0,
  `reservation_remark` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `customer_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stylist_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`) USING BTREE,
  INDEX `fk_reserve_customer_id`(`customer_id`) USING BTREE,
  INDEX `fk_reserve_stylist_id`(`stylist_id`) USING BTREE,
  INDEX `fk_reserve_branch_id`(`branch_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reservations
-- ----------------------------
INSERT INTO `reservations` VALUES (9, 3, '12/10/2018', 15, 0, '', '0906070000', 2, 1, 2);
INSERT INTO `reservations` VALUES (10, 3, '12/10/2018', 13, 0, '', '0906007937', 8, 1, 3);
INSERT INTO `reservations` VALUES (11, 4, '12/10/2018', 14, 0, '', '0906007937', 8, 1, 3);
INSERT INTO `reservations` VALUES (12, 4, '12/12/2018', 13, 0, '', '0906070937', 2, 1, 5);
INSERT INTO `reservations` VALUES (13, 3, '12/12/2018', 17, 0, '', '0906070937', 2, 1, 5);
INSERT INTO `reservations` VALUES (14, 3, '12/12/2018', 11, 5, 'Good!', '0906070937', 2, 1, 1);
INSERT INTO `reservations` VALUES (15, 3, '12/12/2018', 19, 0, '', '0906070937', 2, 1, 3);
INSERT INTO `reservations` VALUES (16, 0, '12/12/2018', 17, 0, NULL, '0906070937', 2, 1, 4);

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Service',
  `service_duration` int(11) NOT NULL DEFAULT 1,
  `service_price` int(11) NOT NULL DEFAULT 100000,
  `service_image` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`service_id`) USING BTREE
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
-- Table structure for stylists
-- ----------------------------
DROP TABLE IF EXISTS `stylists`;
CREATE TABLE `stylists`  (
  `stylist_id` int(11) NOT NULL AUTO_INCREMENT,
  `stylist_branch_id` int(11) NOT NULL,
  `stylist_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Stylist',
  `stylist_password` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '123',
  `stylist_image` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `stylist_status` int(11) NOT NULL DEFAULT 1,
  `stylist_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`stylist_id`) USING BTREE,
  INDEX `fk_stylist_branch_id`(`stylist_branch_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stylists
-- ----------------------------
INSERT INTO `stylists` VALUES (1, 1, 'David Beckham', '123', NULL, 1, '0123456789');
INSERT INTO `stylists` VALUES (2, 1, 'Taylor Swift', '0906070937', NULL, 1, '0123456788');
INSERT INTO `stylists` VALUES (5, 1, 'Selena Gomez', '123', NULL, 1, '0123456787');
INSERT INTO `stylists` VALUES (6, 2, 'Chris Pratt', '123', NULL, 1, '0123456786');
INSERT INTO `stylists` VALUES (7, 2, 'Irelia', '123', NULL, 1, '0123456785');
INSERT INTO `stylists` VALUES (8, 1, 'Dr. Mundo', '123', NULL, 1, '0123456784');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lastname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_active` tinyint(1) NULL DEFAULT 0,
  `role` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  `last_edit` datetime(0) NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `modified` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin', 'admin@mail.com', '$2y$10$R7qK0UgtTyOeJ/GRVQYNoua7g1Jbli/Y.hTruHdt9R6StAcYlUI06', 1, 'admin', NULL, '2018-12-03 20:20:33', NULL, '2018-12-03 20:20:33');

SET FOREIGN_KEY_CHECKS = 1;
