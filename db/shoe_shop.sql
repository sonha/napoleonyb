/*
Navicat MySQL Data Transfer

Source Server         : Sonha
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : kaki8x

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2013-05-07 17:48:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `rank` smallint(10) DEFAULT '0',
  `status` smallint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_category_category` (`parentId`),
  CONSTRAINT `FK_category_category` FOREIGN KEY (`parentId`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('3', null, 'ÁO', '0', '1');
INSERT INTO `category` VALUES ('4', '3', 'Áo Vest', '0', '1');
INSERT INTO `category` VALUES ('5', '3', 'Áo Sơ mi', '0', '1');
INSERT INTO `category` VALUES ('6', null, 'Quần', '0', '1');
INSERT INTO `category` VALUES ('7', '6', 'Quần Jeans', '0', '1');
INSERT INTO `category` VALUES ('8', null, 'Giày đá bóng', '0', '1');
INSERT INTO `category` VALUES ('9', '8', 'Giày Kodad', '0', '1');

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `emmail` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------

-- ----------------------------
-- Table structure for `page`
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('1', 'huongdan', 'Hướng dẫn mua hàng', '<p><strong>Hướng dẫn mua h&agrave;ng</strong></p>', '2013-02-28 10:19:30');
INSERT INTO `page` VALUES ('2', 'khachhang', 'Thẻ khách hàng', '<p>Kh&aacute;ch h&agrave;ng</p>', '2013-03-01 14:42:27');
INSERT INTO `page` VALUES ('3', 'saleoff', 'Khuyến mãi', '<p>Khuyến m&atilde;i</p>', '2013-03-01 14:42:42');
INSERT INTO `page` VALUES ('4', 'cauhoi', 'Những câu hỏi thường gặp', '<p>C&acirc;u hỏi</p>', '2013-03-01 14:42:55');
INSERT INTO `page` VALUES ('5', 'lienhe', 'Liên hệ', '<p>Li&ecirc;n hệ</p>', '2013-03-01 14:43:10');
INSERT INTO `page` VALUES ('6', 'gioithieu', 'Giới thiệu', '<p>Giới thiệu</p>', '2013-03-01 14:43:29');
INSERT INTO `page` VALUES ('7', 'thongtinmuahang', 'Thông tin mua hàng', '<p>C&aacute;ch mua h&agrave;ng ở đ&acirc;y</p>', '2013-03-01 15:45:49');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `price` int(11) DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` smallint(1) DEFAULT '0',
  `home` smallint(1) DEFAULT '0',
  `feature` smallint(1) DEFAULT '0',
  `rank` smallint(10) DEFAULT '0',
  `detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_category` (`categoryId`),
  CONSTRAINT `FK_product_category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '3', '346', '/upload/2013-05-06/Desert.jpg', '1212', '2013-05-07 11:08:03', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('2', '4', 'testset', '/upload/2013-05-06/Hydrangeas.jpg', '1212', '2013-05-06 15:04:18', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('3', '3', 'p17kg383sug1nql5e923fd1vv24', '/upload/2013-05-06/Chrysanthemum.jpg', '1212', '2013-05-07 11:08:05', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('4', '4', 'the_best_of_the_skeptical_3rd_world_kid_meme', '/upload/2013-05-06/Jellyfish.jpg', '12', '2013-05-06 15:04:19', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('6', '3', 'logo', '/upload/2013-05-06/Tulips.jpg', '12', '2013-05-06 15:04:20', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('7', '3', 'lucky', '/upload/2013-05-06/Lighthouse.jpg', '12', '2013-05-07 14:02:58', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('8', '4', '00DA5F_1', '/upload/2013-05-06/Koala.jpg', '12', '2013-05-06 15:06:16', '0', '0', '0', '0', null);
INSERT INTO `product` VALUES ('9', '4', '00E141_1', '/upload/2013-05-06/Hydrangeas.jpg', '12', '2013-05-06 15:05:14', '0', '0', '0', '0', null);
INSERT INTO `product` VALUES ('38', '4', '403032_1', '/upload/2013-05-06/Hydrangeas.jpg', '45', '2013-05-06 15:05:16', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('39', '4', '191491403e2cffb1', '/upload/2013-05-06/Hydrangeas.jpg', '45', '2013-05-06 15:05:59', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('40', '4', '20081220005', '/upload/2013-05-06/Hydrangeas.jpg', '45', '2013-05-06 15:05:57', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('41', '4', 'a37487a71ecf4bea', '/upload/2013-05-06/Koala.jpg', '45', '2013-05-06 15:06:12', '1', '1', '0', '0', null);
INSERT INTO `product` VALUES ('42', '9', 'aa77539a44bf8f2e', '/upload/2013-05-06/Penguins.jpg', '45', '2013-05-06 15:05:43', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('43', '8', '21385_120801_giay_da_bong_san_co_nhan_tao_big', '/upload/2013-05-06/Penguins.jpg', '45', '2013-05-06 15:05:41', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('44', '8', '413_vapper_9', '/upload/2013-05-06/Hydrangeas.jpg', '45', '2013-05-06 15:06:04', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('45', '8', '413_nike9_ca', '/upload/2013-05-06/Koala.jpg', '45', '2013-05-06 15:05:21', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('46', '8', '413_nike9_xa', '/upload/2013-05-06/Jellyfish.jpg', '45', '2013-05-06 15:05:30', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('47', '8', '413_nike9', '/upload/2013-05-06/Hydrangeas.jpg', '45', '2013-05-06 15:05:55', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('48', '8', '413_untitled_2_copy', '/upload/2013-05-06/Koala.jpg', '45', '2013-05-06 15:05:19', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('49', '8', '413_vapper_9_1', '/upload/2013-05-06/Penguins.jpg', '45', '2013-05-06 15:05:36', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('50', '8', '21385_120801_giay_da_bong_san_co_nhan_tao_big_1', '/upload/2013-05-06/Jellyfish.jpg', '56', '2013-05-06 15:05:26', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('51', '8', '786057582_2241nhan_tao', '/upload/2013-05-06/Penguins.jpg', '67', '2013-05-06 15:05:38', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('52', '8', '1325433405_296021619_5_BaN_GIaY_da_BANH_SaN_C_NHaN_TO_NIKE_ADIDAS_TI_BIeN_HoA_dong_Nai', '/upload/2013-05-06/Jellyfish.jpg', '12', '2013-05-06 15:05:28', '1', '0', '0', '0', null);
INSERT INTO `product` VALUES ('53', '8', 'DSC01541', '/upload/2013-05-06/Tulips.jpg', '12', '2013-05-06 15:04:11', '1', '0', '1', '0', null);
INSERT INTO `product` VALUES ('54', '8', 'dscf1770', '/upload/2013-05-06/Lighthouse.jpg', '12', '2013-05-06 15:04:11', '1', '0', '1', '0', null);
INSERT INTO `product` VALUES ('55', '8', 'goc_1365597851', '/upload/2013-05-06/Jellyfish.jpg', '12', '2013-05-06 15:04:10', '1', '0', '1', '0', null);
INSERT INTO `product` VALUES ('56', '9', 'goc_1366648368', '/upload/2013-05-06/Penguins.jpg', '12', '2013-05-06 15:04:10', '1', '0', '1', '0', null);
INSERT INTO `product` VALUES ('57', '3', 'mr_387014_02676737b12c03b8', '/upload/2013-05-06/Hydrangeas.jpg', '12', '2013-05-06 15:04:09', '1', '0', '1', '0', null);
INSERT INTO `product` VALUES ('58', '3', 'prowin_do_mau_moi', '/upload/2013-05-06/Koala.jpg', '12', '2013-05-06 15:04:09', '1', '0', '1', '0', null);
INSERT INTO `product` VALUES ('59', '3', 'untitl1ed_3', '/upload/2013-05-06/Desert.jpg', '12', '2013-05-06 15:04:08', '1', '0', '1', '0', null);
INSERT INTO `product` VALUES ('60', '6', 'bánh đa', '/upload/2013-05-06/Koala.jpg', '12', '2013-05-06 15:04:07', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('61', '6', 'bánh ba', '/upload/2013-05-06/Tulips.jpg', '12', '2013-05-06 15:04:07', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('62', '6', 'bánh bao', '/upload/2013-05-06/Lighthouse.jpg', '12', '2013-05-06 15:04:06', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('63', '6', 'bánh mì', '/upload/2013-05-06/Jellyfish.jpg', '12', '2013-05-06 15:04:05', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('64', '6', 'bánh gối', '/upload/2013-05-06/Penguins.jpg', '12', '2013-05-06 15:04:04', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('65', '6', 'bánh canh', '/upload/2013-05-06/Chrysanthemum.jpg', '12', '2013-05-06 15:04:04', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('66', '6', 'bánh tôm', '/upload/2013-05-06/Hydrangeas.jpg', '12', '2013-05-06 15:04:03', '1', '1', '1', '0', null);
INSERT INTO `product` VALUES ('67', '6', 'bánh cua', '/upload/2013-05-06/Desert.jpg', '12', '2013-05-06 15:04:03', '1', '1', '1', '0', null);

-- ----------------------------
-- Table structure for `sh_boss`
-- ----------------------------
DROP TABLE IF EXISTS `sh_boss`;
CREATE TABLE `sh_boss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_address1` varchar(255) DEFAULT NULL,
  `shop_address2` varchar(255) DEFAULT NULL,
  `shop_phone1` varchar(255) DEFAULT NULL,
  `shop_phone2` varchar(255) DEFAULT NULL,
  `bank_number1` varchar(255) DEFAULT NULL,
  `owner_bank1` varchar(255) DEFAULT NULL,
  `bank_name1` varchar(255) DEFAULT NULL,
  `bank_number2` varchar(255) DEFAULT NULL,
  `owner_bank2` varchar(255) DEFAULT NULL,
  `bank_name2` varchar(255) DEFAULT NULL,
  `bank_number3` varchar(255) DEFAULT NULL,
  `owner_bank3` varchar(255) DEFAULT NULL,
  `bank_name3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_boss
-- ----------------------------
INSERT INTO `sh_boss` VALUES ('1', 'Ngõ 94 phố Nhân Hòa - Nhân Chính - Thanh Xuân - Hà Nội', 'Số 8 Nguyễn Văn Hới, Cát Bi, Hải Phòng', '0936 456 190', '0982 238 357', '066704060008465', 'Hà Anh Sơn ', 'NH Quốc Tế VIB(Chi nhánh Minh Khai - Hai Bà Trưng - Hà Nội)', '10322872502012', ' Hà Anh Sơn ', 'NH Techcombank ( Chi nhánh quận Cầu Giấy )', null, null, null);

-- ----------------------------
-- Table structure for `sh_categories`
-- ----------------------------
DROP TABLE IF EXISTS `sh_categories`;
CREATE TABLE `sh_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `create_at` int(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '= 1 : Danh muc thu, =0 : Danh muc chi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_categories
-- ----------------------------
INSERT INTO `sh_categories` VALUES ('1', 'Đi lại - Lưu trú', null, null, null, null, '0');
INSERT INTO `sh_categories` VALUES ('2', 'Hóa đơn', null, null, null, null, '0');
INSERT INTO `sh_categories` VALUES ('3', 'Sức khỏe', null, null, null, null, '0');
INSERT INTO `sh_categories` VALUES ('4', 'Ăn uống', null, null, null, null, '0');
INSERT INTO `sh_categories` VALUES ('5', 'Gia đình', null, null, null, null, '0');
INSERT INTO `sh_categories` VALUES ('6', 'Thời trang - làm đẹp', null, null, null, null, '0');
INSERT INTO `sh_categories` VALUES ('7', 'Giáo dục - sách vở', null, null, null, null, '0');
INSERT INTO `sh_categories` VALUES ('8', 'Giải trí - du lịch - thể thao', null, '1366864743', '', '', '0');
INSERT INTO `sh_categories` VALUES ('9', 'Nhà cửa - vật dụng', null, '1366864758', '', '', '0');
INSERT INTO `sh_categories` VALUES ('10', 'Đồ điện tử-điện thoại-laptop', null, '1366864772', '', '', '0');
INSERT INTO `sh_categories` VALUES ('11', 'Tài chính', null, '1366864778', '', '', '0');
INSERT INTO `sh_categories` VALUES ('12', 'Thuế', null, '1366864785', '', '', '0');
INSERT INTO `sh_categories` VALUES ('13', 'Xã giao–tiệc tùng–bạn bè', null, '1366864793', '', '', '0');
INSERT INTO `sh_categories` VALUES ('14', 'Khác', null, '1366864800', '', '', '0');
INSERT INTO `sh_categories` VALUES ('15', 'Xăng xe', '1', '1366864840', '', '', '0');
INSERT INTO `sh_categories` VALUES ('16', 'Gửi xe', '5', '1366864878', '', '', '0');
INSERT INTO `sh_categories` VALUES ('17', 'Thu nhập', null, '1366865083', '', '', '1');
INSERT INTO `sh_categories` VALUES ('18', 'Lương ', '17', '1366865097', '', '', '1');
INSERT INTO `sh_categories` VALUES ('19', 'Làm thêm', '17', '1366865107', '', '', '1');
INSERT INTO `sh_categories` VALUES ('20', 'Vay và cho vay', null, '1367410269', '', 'các khoản vay mượn tạm thời', '0');
INSERT INTO `sh_categories` VALUES ('21', 'Nợ', '20', '1367410219', '', '', '0');
INSERT INTO `sh_categories` VALUES ('22', 'Cho vay', '20', '1367410248', '', '', '0');

-- ----------------------------
-- Table structure for `sh_contact`
-- ----------------------------
DROP TABLE IF EXISTS `sh_contact`;
CREATE TABLE `sh_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_contact
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_incomes`
-- ----------------------------
DROP TABLE IF EXISTS `sh_incomes`;
CREATE TABLE `sh_incomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL COMMENT 'note',
  `reference` varchar(255) DEFAULT NULL COMMENT 'nguoi lien quan toi khoan tien',
  `value` int(255) DEFAULT NULL,
  `time` int(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sub_cat_id` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '=1 : Tien cua minh, = 0 : tien di vay',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_incomes
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_spends`
-- ----------------------------
DROP TABLE IF EXISTS `sh_spends`;
CREATE TABLE `sh_spends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `value` int(255) DEFAULT NULL,
  `time` int(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sub_cat_id` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '=1 : Tien tieu, 0 : tien vay',
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_spends
-- ----------------------------
INSERT INTO `sh_spends` VALUES ('5', 'Mua thắt lưng vải để mặc vs quần rằn ri', 'Mua ở Army Box( hình như đắt hơn) ngày 26/4', '', '150000', '1367366400', '6', null, null);
INSERT INTO `sh_spends` VALUES ('6', 'Mua đồ ăn chuẩn bị đi Cực Đông', 'Mua ngày 26/4', '', '200000', '1367366400', '4', null, null);
INSERT INTO `sh_spends` VALUES ('7', 'Bó gót để đá bóng + trekking', '40k 1 chiếc', '', '80000', '1367366400', '8', null, null);
INSERT INTO `sh_spends` VALUES ('8', 'Bọc gối để đá bóng + trekking', '60k 1 chiếc ', '', '120000', '1367366400', '8', null, null);
INSERT INTO `sh_spends` VALUES ('9', 'Đóng tiền đi Cực Đông ', '', '', '2000000', '1367366400', '8', null, null);

-- ----------------------------
-- Table structure for `sh_unexpected`
-- ----------------------------
DROP TABLE IF EXISTS `sh_unexpected`;
CREATE TABLE `sh_unexpected` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `value` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_unexpected
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_users`
-- ----------------------------
DROP TABLE IF EXISTS `sh_users`;
CREATE TABLE `sh_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usename` varchar(255) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_users
-- ----------------------------
