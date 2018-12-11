/*
 Navicat MySQL Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost:3306
 Source Schema         : gent_hairsalon

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 12/12/2018 00:58:26
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
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 1, 'Dầu gội X-Men FOR BOSS', 'Dầu gội hương nước hoa mạnh mẽ', 'images/product/1/product-img.png', 'xmen', '<h1>Dầu gội nước hoa X-Men for Boss </h1>\r\n<p>Với công thức chuyên biệt dành cho nam giới Dầu gội nước hoa X-Men for Boss Intense 380g giúp gội sạch dầu nhờn và bụi bẩn trên da đầu. Kết hợp thành phần cao cấp gỗ Đàn Hường và Hổ Phách tạo nên hương nước hoa trầm đầy nội lực dành cho người đàn ông thành công.</p>\r\n<p>Tạo nên nốt hương trầm đầy nội lực.</p>\r\n<p>Làm sạch, nuôi dưỡng tóc và da đầu.</p>\r\n<p>Thành phần gỗ Đàn Hương và Hổ Phách.</p>\r\n<p>Chai nhỏ tiết kiệm diện tích, thuận tiện khi đem theo công tác/du lịch.</p>\r\n<p>Nên dùng trọn bộ sản phẩm để toàn bộ cơ thể có cùng hương thơm lịch lãm.</p>');
INSERT INTO `products` VALUES (18, 1, 'Dầu Gội Cao Cấp Cho Nam Romano VIP', 'Dầu Gội Cao Cấp Cho Nam Romano VIP', 'images/product/18/product-img.png', 'romano', '<h1>Dầu Gội Cao Cấp Cho Nam Romano VIP</h1>\r\n<p>C&oacute; c&ocirc;ng thức d&agrave;nh ri&ecirc;ng cho người đ&agrave;n &ocirc;ng c&aacute; t&iacute;nh gi&uacute;p m&aacute;i t&oacute;c bạn sẽ trở n&ecirc;n mượt m&agrave;, dễ d&agrave;ng v&agrave;o nếp v&agrave; kh&ocirc;ng c&ograve;n dấu hiệu của g&agrave;u, đem lại cảm gi&aacute;c sảng kho&aacute;i c&ugrave;ng m&ugrave;i hương nam t&iacute;nh lưu lại tr&ecirc;n t&oacute;c sau khi sử dụng.</p>\r\n<p>Romano VIP l&agrave; sự kết hợp tinh tế giữa phong c&aacute;ch lịch l&atilde;m c&ugrave;ng chất trẻ trung hiện đại với hương nước hoa nam t&iacute;nh, mạnh mẽ cho ph&aacute;i mạnh.</p>');
INSERT INTO `products` VALUES (19, 1, 'Dầu gội nước hoa X-Men Metal', 'Hương Citrus tươi mát cùng công thức 3Dmatrix giúp cắt sạch gàu', 'images/product/19/product-img.png\r\n', 'xmen', '<h1>Dầu gội nước hoa X-Men Metal</h1>\r\n<p>Hương Citrus tươi mát cùng công thức 3D matrix giúp cắt sạch gàu, X-men Kim Sạch gàu lịch lãm cho mái tóc vẻ lịch lãm đầy uy lực, để bạn có niềm tin thép xuyên phá mọi rào cản.</p>\r\n<p>Cách dùng: Thoa đều dầu gội lên tóc ướt. Xoa nhẹ nhàng rồi xả sạch với nước.</p>\r\n<p>Thành phần: Water, Sodium Laureth Sulfate, Dimethiconol, Dimethicane, Cocamidopropyl Betaine, Perfume, Zinc Pyrithione, Carbomer, Menthol, Sodium PCA, Sodium Hydroxide, Guar Hydraxypropyttrinonium Chloride, Citric Acid, TEA-Dodecylbenzenesulfonate, Polyquaternium-10, Castoryl Maleate, C12-15 Pareth-3, Tocopheryl Acetate, Betaine, Sorbitol, Serine, Glycine, Glutamic Acid, Alanine, Lysine, Arginine, Threonine, Proline, Sodium Cumenesulfonate, Sodium Chloride, Methylchloroisothiazolinone, Methylisothiazolone, CI 42090.</p>');
INSERT INTO `products` VALUES (20, 1, 'Dầu Gội Bùn Khoáng Sạch Gàu Mát Lạnh Nivea Men Ice Mud Anti Dandruf Shampoo', 'Hương bạc hà tươi mát, tạo cảm giác thư giãn, sảng khoái', 'images/product/20/product-img.png', 'nivea', '<h1>Dầu Gội Bùn Khoáng Sạch Gàu Mát Lạnh Nivea Men Ice Mud Anti Dandruf Shampoo </h1>\r\n<p>Công thức chứa khoáng chất từ bùn mát lạnh, cho khả năng làm sạch mạnh mẽ, xoáy bay bụi bẩn trên da đầu. Sản phẩm có hương bạc hà tươi mát, tạo cảm giác thư giãn, sảng khoái khi sử dụng. Ngoài ra, còn mang đến cho nam giới một trải nghiệm hoàn toàn khác.</p>\r\n<p>Dầu gội đầu với công thức bùn khoáng chứa phân tử siêu nhỏ hoạt động như các thỏi nam châm giúp xoáy bay bụi bẩn, xoa dịu và nuôi dưỡng da đầu, ngăn nhờn ngứa cả ngày. Loại sạch vảy gàu từ gốc, nuôi dưỡng da đầu và ngăn ngừa gàu quay trở lại. Tạo cảm giác mát lạnh với mùi hương bạc hà sản khoái.\r\n</p>');
INSERT INTO `products` VALUES (21, 1, 'Dầu Gội Nam Kerasys Homme Deep Cleansing Cool Shampoo ', 'Thành phần 100% thiên nhiên với tinh chất bạc hà', 'images/product/21/product-img.png\r\n', 'kerasys', '<h1>Dầu Gội Nam Kerasys Homme Deep Cleansing Cool Shampoo</h1>\r\n<p>Có thành phần 100% thiên nhiên với tinh chất bạc hà, được kiểm nghiệm theo tiêu chuẩn của Climbasol và Sodiumsalicylate, không chứa hóa chất độc hại cho sức khỏe. Sản phẩm giúp gội sạch hoàn toàn nhưng không hề gây ngứa hay kích ứng da đầu. Tinh chất bạc hà mát lạnh mang lại cho bạn cảm giác thư thái, dịu mát cho ngày hè năng động.</p>\r\n<p> Thông qua những hạt siêu vi thẩm thấu mạnh mẽ vào từng sợi tóc giúp loại bỏ ngay những bụi bẩn, các chất nhờn, mồ hôi đầu, mảng bám gàu. Mái tóc của bạn sẽ trở nên óng mượt, giữ nếp cả ngày dài khi sử dụng với keo tạo kiểu.</p>');
INSERT INTO `products` VALUES (22, 1, 'Dầu Gội Ngăn Lão Hóa Tóc Oxy Prime RMV-O-Pr-Sh', 'Chiết xuất từ thảo mộc thiên nhiên, không chứa Silicone, Sulfate', 'images/product/22/product-img.png\r\n', 'Oxy', '<h1>Dầu Gội Ngăn Lão Hóa Tóc Oxy Prime RMV-O-Pr-Sh</h1>\r\n<p>Có chiết xuất từ thảo mộc thiên nhiên, không chứa Silicone, Sulfate – tác nhân gây rụng tóc.</p>\r\n<p>Kết hợp với các dưỡng chất giúp tóc phát triển chắc khỏe giúp ngăn lõa hóa tóc và giúp tóc giảm gãy rụng, phát triển nhanh, chắc khỏe và sáng bóng.</p>\r\n<p>Sản phẩm sử dụng chai vòi tiện dụng, giúp bạn dễ dàng lấy ra lượng dầu gội thích hợp để sử dụng.</p>\r\n<p>Dầu Gội Ngăn Lão Hóa Tóc Oxy Prime RMV-O-Pr-Sh đến từ thương hiệu nổi tiếng, uy tín từ Nhật Bản</p>');
INSERT INTO `products` VALUES (23, 1, 'Dầu Gội Romano Deluxe Classic', 'Ứng dụng công thức cải tiến chứa Pro-Vitamin B5 cho mái tóc mềm mại, chắc khỏe.', 'images/product/23/product-img.png', 'romano', '<h1>Dầu Gội Romano Deluxe Classic</h1>\r\n<p>Dành cho phái mạnh ứng dụng công thức cải tiến chứa Pro-Vitamin B5 cho mái tóc mềm mại, chắc khỏe.</p>\r\n<p>Ngoài ra, hương thơm độc đáo, nam tính từ Romano sẽ mang đến cho bạn một phong cách lịch lãm và quyến rũ.</p>\r\n<p>Dầu gội với công thức cải tiến giúp làm sạch da đầu hiệu quả và và mang đến cho bạn một mái tóc mềm mượt và khỏe mạnh cả ngày dài với thành phần Pro Vitamin B5.</p>\r\n<p>Romano có hương thơm sảng khoái, mát lạnh và nam tính sẽ cho bạn phong cách trẻ trung, năng động và quyến rũ.</p>\r\n<p>Sản phẩm dành cho mọi loại tóc.</p>');
INSERT INTO `products` VALUES (24, 2, 'Dầu Gội Trà Xanh Phục Hồi Và Ngăn Rụng Tóc Follow Me Hair Rivitalizer', 'Giữ ẩm cho tóc, bổ sung dưỡng chất và phục hồi mái tóc khô, hư tổn', 'images/product/24/product-img.png', 'rivitalizer', '<h1>Dầu Gội Trà Xanh Phục Hồi Và Ngăn Rụng Tóc Follow Me Hair Rivitalizer</h1>\r\n<p>Chiết xuất từ trà xanh, chiết xuất mầm lúa mì, hạt nho cung cấp và giữ ẩm cho tóc, bổ sung dưỡng chất và phục hồi mái tóc khô, hư tổn do tác nhân sấy, duỗi, uốn, nhuộm.</p>\r\n<p>Đặc biệt, sản phẩm nhẹ nhàng gội sạch chất nhờn, bụi bẩn đồng thời để các dưỡng chất dễ dàng thấm sâu vào tóc, nuôi dưỡng và bảo vệ tóc tránh gãy rụng.</p> \r\n<p>Bên cạnh đó, dầu gội mang mùi hương mát dịu của lá trà xanh mang đến cho bạn cảm giác sảng khoái cũng như tự tin tỏa hương thơm quyến rũ, dễ chịu trên suối tóc óng mượt.</p>\r\n<p>Sản phẩm được làm từ những thành phần chiết xuất từ thiên nhiên kết hợp quy trình kiểm tra nghiêm ngặt không gây kích ứng da an toàn với người sử dụng.</p>\r\n<p>Thiết kế dạng chai có vòi tiện lợi, chắc chắn giúp bạn dễ dàng mang theo mọi lúc, mọi nơi để bảo vệ, chăm sóc cho mái tóc của mình.</p>');
INSERT INTO `products` VALUES (25, 2, 'Dầu Gội Phục Hồi Tóc Chiết Xuất Dầu Ngựa Nagano NG1043 ', 'Bảo vệ chống khô và gãy rụng cho tóc,chăm sóc chuyên sâu cho tóc hư tổn', 'images/product/25/product-img.png', 'nagano', '<h1>Dầu Gội Phục Hồi Tóc Chiết Xuất Dầu Ngựa Nagano NG1043 </h1>\r\n<p>Thành phần chủ yếu là dầu ngựa dễ dàng thẩm thấu sâu nuôi dưỡng da đầu khỏe mạnh.</p>\r\n<p>Tinh chất dầu ngựa bổ sung dưỡng chất, cải tạo cấu trúc bên trong của tóc, kích thích tuần hoàn máu, giúp tóc luôn chắc khỏe, bóng đẹp.</p>\r\n<p>Bổ sung tăng cường các loại vitamin, protein cám gạo, chiết xuất hoa đậu biếc… giúp cải thiện các vấn đề về tóc như: hư tổn, gàu, ngứa, gãy rụng, xơ, chẻ ngọn… trả lại cho bạn một mái tóc dày, bóng đẹp, bồng bềnh mà không gây bết dính.</p>\r\n<p>Chất chiết xuất từ dầu ngựa, protein cám gạo, chiết xuất hoa đậu biếc, vitamin… dưỡng tóc bóng mượt, chắc khỏe.</p>');
INSERT INTO `products` VALUES (26, 2, 'Dầu Gội Dr. Sante Argan Hair Phục Hồi Tóc Hư Tổn ', 'Giảm thiểu và khôi phục tối đa sợi tóc bị khô, chẻ ngọn', 'images/product/26/product-img.png', 'argan', '<h1>Dầu Gội Dr. Sante Argan Hair Phục Hồi Tóc Hư Tổn </h1>\r\n<p>Được đặc chế theo công nghệ riêng của hãng mỹ phẩm châu Âu nổi tiếng - Dr.Sante dành riêng cho mái tóc đã bị hư tổn. Với các dưỡng chất từ dầu Argan và Keratin giúp thấm sâu, giảm thiểu tóc hư tổn và xoăn cứng, dầu gội sẽ mang đến cho bạn mái tóc bóng khỏe từ gốc đến ngọn.</p>\r\n<p>Argan Oil: thành phần dầu Argan từ lâu đã nổi tiếng trong việc dưỡng ẩm sâu, đặc biệt phục hồi và tăng cường dinh dưỡng cho từng sợi tóc để giảm thiểu tối đa tóc chẻ ngọn, cải thiện độ sang, bóng của tóc.</p>\r\n<p>Keratin: là một trong những thành phần cơ bản của mái tóc, tuy nhiên, theo thời gian, dưới tác động của môi trường, tóc sẽ bị mất dần lượng Keratin. Chính vì vậy, việc trong sản phẩm có chứa thành phần Keratin sẽ giúp bổ sung lượng chất đạm tự nhiên bị mất, phục hồi mái tóc hư tổn. Keratin sẽ thâm nhập vào từng sợi tóc, làm đầy các vết nhám, khô, xơ trên tóc, giúp tóc trở nên bóng mượt hơn, đồng thời ngăn ngừa gãy rụng và chẻ ngọn.</p>');
INSERT INTO `products` VALUES (27, 2, 'Kem Phục Hồi Tóc Hư Tổn MH Natural Haircare', 'Dưỡng tóc mềm mại, chống rụng tóc, giúp mọc tóc, chống gàu', 'images/product/27/product-img.png', 'haircare', '<h1>Kem Phục Hồi Tóc Hư Tổn MH Natural Haircare</h1>\r\n<p>Chiết xuất từ những nguyên liệu từ thiên nhiên như dầu dừa, dầu castor, bơ hạt mỡ, vitamin E tinh dầu dưỡng và mọc tóc Rosemary.</p>\r\n<p>Sản phẩm giúp dưỡng cho mái tóc mềm mại, chống rụng tóc, giúp mọc tóc nhanh và hạn chế gàu.</p>\r\n<p>Hương thơm nhẹ dịu suốt cả ngày.</p>\r\n');
INSERT INTO `products` VALUES (28, 2, 'Dầu gội bưởi & Bồ Kết Herbario giảm rụng tóc, phục hồi tóc ', 'Giảm rụng tóc, cung cấp dưỡng chất nuôi dưỡng từ gốc đến ngọn, phục hồi tóc hư tổn sâu, giúp tóc suôn mượt tự nhiên', 'images/product/28/product-img.png', 'herbario', '<h1>Dầu gội bưởi & Bồ Kết Herbario giảm rụng tóc, phục hồi tóc </h1>\r\n<p>Dầu gội vỏ bưởi & bồ kết HERBARIO giúp giảm rụng tóc*, nuôi dưỡng tóc từ sâu bên trong, cung cấp dưỡng chất giúp tóc chắc khỏe, phục hồi tóc hư tổn do tác động của môi trường và hóa chất, giúp tóc luôn khỏe mạnh, suôn mượt và mềm mại.</p>\r\n<p>Dùng cho các trường hợp rụng tóc nhiều và sau rụng tóc do các nguyên nhân: thay đổi nội tiết, lão hóa, sử dụng các loại thuốc, hóa chất, thiếu dinh dưỡng, làm việc căng thẳng, thay đổi nguồn nước, hoặc tóc rụng nhiều không có nguyên nhân; những người tóc thưa, xơ, chẻ ngọn, tóc có nhiều dầu, người có nguy cơ hói đầu và bệnh nhân rụng tóc sau thời gian hóa trị, xạ trị ung thư.</p>\r\n');
INSERT INTO `products` VALUES (29, 2, 'Tinh Chất Phục Hồi Tóc Hư Tổn Từ Olive Aspasia Oilve Essence ', 'Khôi phục lại sức sống và dinh dưỡng cho tóc yếu, tóc chẻ ngọn, hương thơm quyến rũ  và đem lại sự mượt mà óng mượt cho tóc', 'images/product/29/product-img.png', 'aspasia', '<h1>Tinh Chất Phục Hồi Tóc Hư Tổn Từ Olive Aspasia Oilve Essence </h1>\r\n<p>Thành phần siêu đậm đặc, chiết xuất từ trái Olive cùng hàng loạt các Vitamin, các acid béo  dưỡng tóc giúp cho tóc mềm mại và giảm xơ rối tức thì. Dưỡng chất trong Olive cùng với hàm lượng dưỡng ẩm cho tóc khô, xơ giúp cung cấp dinh dưỡng cho mái tóc yếu, chẻ ngọn một cách hiệu quả và lâu dài. Ngoài ra,hương thơm quyến rũ lưu lại trên tóc suốt cả ngày và đem lại sự mượt mà óng mượt cho tóc.</p>\r\n<p>Tinh chất dưỡng tóc Aspasia Olive Essence với chiết xuất trái olive giúp phục hồi sức sống và dinh dưỡng cho mái tóc khô và chẻ ngọn.</p>\r\n<p>Hương thơm dịu nhẹ quyến rũ lưu lại trên tóc suốt cả ngày và đem lại sự óng mượt cho mái tóc.</p>\r\n');
INSERT INTO `products` VALUES (30, 2, 'Dầu Xả Phục Hồi Và Bảo Vệ Tóc Chiết Xuất Olive Và Argan ', 'Giúp tóc chắc khỏe, cân bằng độ ẩm và bóng mượt, làm mềm và mượt tóc, giúp tóc nhanh vào nếp', 'images/product/30/product-img.png', 'olive', '<h1>Dầu Xả Phục Hồi Và Bảo Vệ Tóc Chiết Xuất Olive Và Argan </h1>\r\n<p>Chứa hàm lượng lớn oleic axit giúp củng cố và bảo vệ tóc bằng cách liên kết lại các tế bào gốc tự nhiên.</p>\r\n<p>Kết hợp với hàm lượng cao Protein Complex tạo nên bởi protein của đậu nành, lúa mạch và ngô, dầu xả tóc olive và argan giúp tóc chắc khỏe, cân bằng độ ẩm và bóng mượt.</p>\r\n<p>Tinh dầu Olive Giúp làm mềm và mượt tóc, giúp tóc nhanh vào nếp, thấm sâu kích thích tóc nhanh mọc dài, dưỡng ẩm tránh bong tróc da đầu. Trị gàu, giảm khô da đầu, có thể trị nấm da đầu giảm ngứa do gầu gây ra. Các dưỡng chất trong dầu oliu có tác dụng kích thích chân tóc, giúp tóc nhanh mọc dài, giảm gãy rụng, tạo độ dày cho mái tóc.</p>\r\n');
INSERT INTO `products` VALUES (31, 3, 'Gel Tạo Tóc Gatsby Wg Uh-Gel Siêu Cứng Level 9 ', 'Tạo kiểu tóc siêu cứng ấn tượng, tính năng độc đáo giữ được độ cứng cho tóc', 'images/product/31/product-img.png', 'gatsby', '<h1>Gel Tạo Tóc Gatsby Wg Uh-Gel Siêu Cứng Level 9 </h1>\r\n<p>Tạo kiểu tóc siêu cứng ấn tượng</p>\r\n<p>Tính năng độc đáo giữ được độ cứng cho tóc.</p>\r\n<p>Bổ sung tính năng không bết dính</p>\r\n<p>Giúp tạo kiểu đa dạng</p>\r\n<p>Giữ độ bóng tốt</p>');
INSERT INTO `products` VALUES (32, 3, 'Wax Tạo Kiểu Tóc Amby London Hex Twisted Fibre', 'Tạo kiểu, làm bóng, giữ nếp và bảo vệ tóc, khô nhanh, không gây bết dính', 'images/product/32/product-img.png', 'amby', '<h1>Wax Tạo Kiểu Tóc Amby London Hex Twisted Fibre</h1>\r\n<p>Sáp tạo kiểu giữ nếp tốt, hương thơm nhẹ nhàng, dễ dàng gội sạch và không làm nặng tóc.</p>\r\n<p>Wax với công thức độc đáo giúp tóc dễ vào nếp đồng thời tạo lớp màng bảo vệ tóc khỏi các tác hại của môi trường và ánh nắng mặt trời, đem lại mái tóc phong cách, cá tính như ý muốn.</p>\r\n<p>Sản phẩm được sản xuất tại Malaysia với các thành phần an toàn với mái tóc người sử dụng.</p>\r\n');
INSERT INTO `products` VALUES (33, 3, 'Gel Tạo Kiểu Tóc Goodlook Hard Hair Gel ', 'Bảo vệ tóc, giúp tóc bóng mượt, hương thơm nam tính, phù hợp với mọi loại tóc', 'images/product/33/product-img.png', 'goodluck', '<h1>Gel Tạo Kiểu Tóc Goodlook Hard Hair Gel </h1>\r\n<p>Được sản xuất từ thành phần giàu protein, chiết xuất hạnh nhân, tiền Vitamin B5 và hoạt chất lọc tia UV.</p>\r\n<p>Gel giúp tạo kiểu tóc đứng và giữ nếp lâu, hương thơm nam tính, phù hợp với mọi loại tóc.</p>\r\n<p>Không chỉ vậy, gel còn giúp bảo vệ tóc trước tác hại của bụi bẩn, ô nhiễm và tia bức xạ mặt trời, giúp tóc luôn khỏe mạnh, bóng mượt và dễ chải.</p>\r\n');
INSERT INTO `products` VALUES (34, 3, 'Gel Gatsby Vuốt Tóc Siêu Cứng SH', 'Nhanh khô và tạo kiểu tóc không dính và sáng bóng, chứa tác nhân tạo kiểu chống ẩm có khả năng chống mồ hôi và độ ẩm', 'images/product/34/product-img.png', 'gatsby', '<h1>Gel Gatsby Vuốt Tóc Siêu Cứng SH</h1>\r\n<p>Nhanh khô và tạo kiểu tóc không dính và sáng bóng. Chứa tác nhân tạo kiểu chống ẩm có khả năng chống mồ hôi và độ ẩm.</p>\r\n<p>Dễ dàng để restyle với nước.</p>\r\n<p>Làm mới hương thơm cam quýt và chứa pro-vitamin B5.</p>\r\n');
INSERT INTO `products` VALUES (35, 3, 'Gel Tạo Kiểu Tóc Goodlook Wet Hard Styling Gel', 'Bảo vệ tóc, giúp tóc bóng mượt, hương thơm nam tính, phù hợp với mọi loại tóc', 'images/product/35/product-img.png', 'goodluck', '<h1>Gel Tạo Kiểu Tóc Goodlook Wet Hard Styling Gel</h1>\r\n<p>Được sản xuất từ thành phần giàu vitamin E, chiết xuất hạnh nhân, tiền Vitamin B5 và hoạt chất lọc tia UV.</p>\r\n<p>Gel giúp tạo kiểu tóc đứng và giữ nếp lâu, hương thơm nam tính, phù hợp với mọi loại tóc.</p>\r\n<p>Không chỉ vậy, gel còn giúp bảo vệ tóc trước tác hại của bụi bẩn, ô nhiễm và tia bức xạ mặt trời, giúp tóc luôn khỏe mạnh, bóng mượt và dễ chải.</p>\r\n');
INSERT INTO `products` VALUES (36, 3, 'Gel vuốt tóc Romano Classic Siêu cứng', 'Giữ nếp siêu cứng, hương thơm nam tính, giúp tóc bóng khỏe, phù hợp với mọi loại tóc', 'images/product/36/product-img.png', 'romano', '<h1>Gel vuốt tóc Romano Classic Siêu cứng</h1>\r\n<p>Giữ nếp siêu cứng</p>\r\n<p>Giúp tóc bóng khỏe</p>\r\n<p>Phù hợp với mọi loại tóc</p>\r\n<p>Giúp tạo những kiểu tóc ấn tượng với độ giữ nếp cứng.\r\nGel tạo kiểu tóc Romano Classic siêu cứng với công thức cải thiện giàu chất giữ ẩm giúp cho tóc bóng khỏe.\r\nKhông làm dính tóc, chứa thành phần ngăn tia UV.\r\nHương thơm độc đáo Romano Classic cho bạn một phong cách lịch lãm và đầy quyến rũ.\r\n​Hướng dẫn sử dụng\r\nCho lượng gel vừa đủ vào lòng bàn tay, xoa đều và vuốt lên tóc để tạo kiểu theo ý muốn.\r\nSau khi đội mũ bảo hiểm, làm ẩm tóc để tạo lại kiểu tóc ưng ý.\r\nBảo quản\r\nTránh để ở nhiệt độ cao.\r\nĐóng nắp sau khi sử dụng.\r\n </p>');
INSERT INTO `products` VALUES (37, 3, 'Gel X-Men Siêu Cứng & Bóng Tóc', 'Giải pháp giúp tóc không bị mất nếp, giúp giữ nếp siêu cứng ở cấp độ 6, dễ dàng tạo lại kiểu tóc sau khi đội mũ bảo hiểm', 'images/product/37/product-img.png', 'xmen', '<h1>Gel X-Men Siêu Cứng & Bóng Tóc</h1>\r\n<p>Giải pháp giúp tóc không bị mất nếp và dễ dàng tạo những kiểu tóc thật thời trang theo ý muốn.</p>\r\n<p>Gel với hợp chất Copolymer và Panthenol giúp giữ nếp siêu cứng ở cấp độ 6, dễ dàng tạo lại kiểu tóc sau khi đội mũ bảo hiểm và nuôi dưỡng tóc chắc khỏe.</p>\r\n<p>Với X-men, bạn sẽ khẳng định được phong cách nam tính của mình với những kiểu tóc ấn tượng và hoàn hảo nhất.</p>\r\n');
INSERT INTO `products` VALUES (38, 3, 'Gel X-Men Cứng Tóc', 'Giữ nếp tóc tự nhiên, ít bết dính, dễ dàng tạo kiểu tóc, hương gỗ trầm đỏ và hỗ phách, phù hợp với mọi loại tóc', 'images/product/38/product-img.png', 'xmen', '<h1>Gel X-Men Cứng Tóc</h1>\r\n<p>Với công thức \"Strong Hold\" giữ lâu nếp tóc, giữ độ ẩm tự nhiên cho tóc và không gây nhờn.</p>\r\n<p>Gel vuốt tóc Xmen giúp bạn tạo những nếp tóc theo ý muốn, giữ nếp tóc lâu và cho mái tóc bóng mượt.</p>\r\n<p>Quan trọng hơn là hương thơm độc đáo, quý phái của nước hoa Xmen Sport sẽ tạo cho bạn một phong cách, một cá tính đàn ông đúng nghĩa.</p>\r\n<p>Dành cho mọi loại tóc.</p>\r\n');

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
