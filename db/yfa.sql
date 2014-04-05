/*
Navicat MySQL Data Transfer

Source Server         : Sonha
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : yfa

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-04-05 10:22:30
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', null, 'Sản phẩm chính', '0', '1');
INSERT INTO `category` VALUES ('2', null, 'Sản phẩm phụ', '0', '1');

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
  `description` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_category` (`categoryId`),
  CONSTRAINT `FK_product_category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '1', 'Kaolin phong hóa', '/upload/2013-06-05/kaolin phong hoa.jpg', '0', '2013-05-31 14:05:31', '0', '0', '0', '0', null, '', '');
INSERT INTO `product` VALUES ('2', '1', 'Kaolin men', '/upload/2013-06-05/Kaolin YFA1 (2).jpg', '0', '2013-05-31 14:05:31', '0', '0', '0', '0', null, '', '');
INSERT INTO `product` VALUES ('3', '1', 'Talc A1', '/upload/2013-06-05/Talc1.jpg', '0', '2013-05-31 14:05:32', '0', '0', '0', '0', null, '', '');
INSERT INTO `product` VALUES ('4', '1', 'Talc A2', '/upload/2013-06-05/kaolin phong hoa.jpg', '0', '2013-05-31 14:05:32', '0', '0', '0', '0', null, '', '');
INSERT INTO `product` VALUES ('5', '1', 'Talc B', '/upload/2013-06-05/Talc1.jpg', '0', '2013-05-31 14:05:32', '0', '0', '0', '0', null, '', '');
INSERT INTO `product` VALUES ('6', '1', 'Fenpat YFA1', '/upload/2013-06-05/Fenspat YFA1.jpg', '0', '2013-05-31 14:05:32', '0', '0', '0', '0', null, '', '');
INSERT INTO `product` VALUES ('7', '1', 'Fenpat YFA2', '/upload/2013-06-05/Fenspat YFA2.jpg', '0', '2013-05-31 14:05:33', '0', '0', '0', '0', null, '', '');
INSERT INTO `product` VALUES ('8', '2', 'baba', '', '34', '2014-03-24 16:18:29', '1', '1', '0', '0', null, '<p>\r\n	fgfg</p>\r\n', '<p>\r\n	baba</p>\r\n');
INSERT INTO `product` VALUES ('9', '1', 'babartrt', '/upload/2014-03-24/Jellyfish.jpg', '34', '2014-03-24 16:20:05', '1', '0', '1', '3', null, '<p>\r\n	fdfdf</p>\r\n', '<p>\r\n	dfd</p>\r\n');

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
-- Table structure for `sh_company_info`
-- ----------------------------
DROP TABLE IF EXISTS `sh_company_info`;
CREATE TABLE `sh_company_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `address1` varchar(500) DEFAULT NULL,
  `address2` varchar(500) DEFAULT NULL,
  `phone1` varchar(500) DEFAULT NULL,
  `phone2` varchar(500) DEFAULT NULL,
  `email1` varchar(500) DEFAULT NULL,
  `email2` varchar(500) DEFAULT NULL,
  `website` varchar(500) DEFAULT NULL,
  `facebook` varchar(500) DEFAULT NULL,
  `desc1` text,
  `desc2` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_company_info
-- ----------------------------
INSERT INTO `sh_company_info` VALUES ('1', 'Công ty TNHH YFA', 'Thị trấn Thanh Thủy- Thanh Thủy- Phú Thọ', 'Cự Lộc - Thanh Xuân - Hà Nội', '02103.877.552', '02103.877.552', 'sonha@gmail.com', 'hason61vN@gmail.com', 'http://yfa.com.vn/', 'http://www.facebook.com/yfa', 'YFA luôn luôn tìm kiếm mở rộng kinh doanh của chúng tôi và tìm kiếm đối tác mới, quốc gia và những\r\n                    người quốc tế. Hơn nữa, YFA luôn luôn tôn trọng hỗ trợ và đóng góp của người bạn đời và có cơ hội để  làm việc chặt chẽ với các đối tác càng nhiều càng tốt.                        YFA đảm bảo rằng chúng tôi luôn cung cấp\r\n', 'YFA Công ty TNHH là một công ty khai thác khoáng sản resourse chuyên ngành khai thác\r\n                        mỏ, xử lý và cung cấp các tài liệu của các Caolins và Feldspars ngành công nghiệp giấy, gốm và\r\n                        sơn.\r\n                        YFA hiện nay đã trở thành một trong những nhà cung cấp nổi tiếng để cung cấp nguyên liệu hoàn\r\n                        thành.</p>\r\n                    YFA nằm ở huyện Thanh Thủy, Phú Thọ, khoảng 100 Km phía đông bắc từ hà nội, thành phố thủ đô của Việt Nam. Khu vực này là rất thuận tiện cho việc cải thiện du lịch y tế, và đặc biệt là phát triển doanh nghiệp. Kể từ khi thành lập công ty vào năm 2003, YFA đã độc lập xử lý và sản xuất một số sản phẩm chất lượng cao, chẳng hạn như Caolins tráng men và Caolins cơ thể. Những sản phẩm này được sử dụng không chỉ trong các ngành công nghiệp gốm sứ mà còn trong nhiều lĩnh vực khác nhau như giấy và các ngành công nghiệp sơn. Sản phẩm YFA đã được bán trên khắp các quốc gia, và đã thu hút được nhiều khách hàng lớn như Tập đoàn Vĩnh Phúc-VPG, nhóm Viglacera, Cosevco Group, Hàn Quốc, Nhật Bản, vv ...');

-- ----------------------------
-- Table structure for `sh_contact`
-- ----------------------------
DROP TABLE IF EXISTS `sh_contact`;
CREATE TABLE `sh_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
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
-- Table structure for `sh_news`
-- ----------------------------
DROP TABLE IF EXISTS `sh_news`;
CREATE TABLE `sh_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(1250) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `time` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_news
-- ----------------------------
INSERT INTO `sh_news` VALUES ('1', 'Bale – Suarez: Real nên chọn ai?', 'Mùa giải vừa qua Gareth Bale của Tottenham và Luis Suarez bên phía Liverpool nổi lên như 2 ngôi sao hàng đầu NHA. Và mới đây nhất, cả 2 đều “ngỏ lời” muốn chuyển tới thi đấu cho Real. Thế nhưng, đội bóng Hoàng gia Tây Ban Nha khó có thể chiều lòng tất cả.', 'Mùa giải vừa qua Gareth Bale của Tottenham và Luis Suarez bên phía Liverpool nổi lên như 2 ngôi sao hàng đầu NHA. Và mới đây nhất, cả 2 đều “ngỏ lời” muốn chuyển tới thi đấu cho Real. Thế nhưng, đội bóng Hoàng gia Tây Ban Nha khó có thể chiều lòng tất cả.', null);
INSERT INTO `sh_news` VALUES ('2', 'Trắng tay, Real vẫn lập kỉ lục châu Âu', 'Dù nhận được rất nhiều sự kì vọng, nhưng Real của Mourinho đã thất bại trên cả 3 mặt trận chính ở mùa giải năm nay (Liga, Champions League và cúp nhà Vua). Với kết quả bết bát như vậy, “Người đặc biệt” chắc chắn sẽ ra đi sau khi mùa giải khép lại và đích đến tiếp theo của chiến lược gia người Bồ là đội bóng cũ Chelsea.', 'Dù nhận được rất nhiều sự kì vọng, nhưng Real của Mourinho đã thất bại trên cả 3 mặt trận chính ở mùa giải năm nay (Liga, Champions League và cúp nhà Vua). Với kết quả bết bát như vậy, “Người đặc biệt” chắc chắn sẽ ra đi sau khi mùa giải khép lại và đích ', null);
INSERT INTO `sh_news` VALUES ('3', 'Suarez đang trên đường tới Real?', 'Ngày hôm qua, Suarez đã đăng đàn cho biết, thật khó để từ chối lời mời của Real và xem ra điều này đang dần trở thành sự thực khi tờ Marca cho hay, chân sút người Uruguay đã đồng ý chuyển tới Bernabeu thi đấu vì muốn được chơi cho đội bóng có tiềm lực và tham vọng như Los Blancos.', 'Ngày hôm qua, Suarez đã đăng đàn cho biết, thật khó để từ chối lời mời của Real và xem ra điều này đang dần trở thành sự thực khi tờ Marca cho hay, chân sút người Uruguay đã đồng ý chuyển tới Bernabeu thi đấu vì muốn được chơi cho đội bóng có tiềm lực và ', null);
INSERT INTO `sh_news` VALUES ('4', 'Torres về quê nhà xả stress', 'Sau một mùa giải dài thi đấu trong màu áo Chelsea, Torres cuối cùng đã có quãng thời gian để nghỉ ngơi. Tận dụng khoảng thời gian ít ỏi trước khi cùng ĐT Tây Ban Nha tham dự Confederations Cup, “El Nino” đã cùng vợ con đi nghỉ mát tại bãi biển thơ mộng Ibiza trên đảo Balearic.', 'Sau một mùa giải dài thi đấu trong màu áo Chelsea, Torres cuối cùng đã có quãng thời gian để nghỉ ngơi. Tận dụng khoảng thời gian ít ỏi trước khi cùng ĐT Tây Ban Nha tham dự Confederations Cup, “El Nino” đã cùng vợ con đi nghỉ mát tại bãi biển thơ mộng Ib', null);

-- ----------------------------
-- Table structure for `sh_partner`
-- ----------------------------
DROP TABLE IF EXISTS `sh_partner`;
CREATE TABLE `sh_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` tinyint(11) DEFAULT NULL COMMENT '0 : trong nuoc, 1 : ngoai nuoc',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_partner
-- ----------------------------
INSERT INTO `sh_partner` VALUES ('1', 'Công ty TNHH Sơn Hà', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('2', 'Công ty TNHH Viglacera Thăng Long', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('3', 'Công ty TNHH Viglacera Vĩnh Phúc', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('4', 'Công ty TNHH gốm Sơn Hà', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('5', 'Công ty TNHH gốm sứ Thăng Long', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('6', 'Công ty TNHH gốm sứ Yên Bái', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('7', 'Công ty TNHH gốm sứ Bát Tràng', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('8', 'Công ty TNHH gốm sứ Hải Dương', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('9', 'Công ty TNHH gốm sứ Cao Bằng', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('10', 'Công ty TNHH gốm sứ Thăng Long', null, null, null, '0');
INSERT INTO `sh_partner` VALUES ('11', 'Canoe/Kayak Dock - Portsmouth, NH', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('12', 'North Pier - Portsmouth, NH', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('13', 'Observation Pier - Portsmouth, NH', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('14', 'Pile Replacement - Portsmouth, NH', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('15', 'Boat Launch - Portsmouth, NH', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('16', 'Freedom Boat Club - Portsmouth, NH', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('17', 'Commercial Dock System - Kittery, ME', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('18', 'Creek Farm - Portsmouth, NH', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('19', 'Kittery Point Yacht Yard - Eliot, ME', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('20', 'Johnson Pier - Portsmouth, NH', null, null, null, '1');
INSERT INTO `sh_partner` VALUES ('21', 'Noble Island - Portsmouth, NH', null, null, null, '2');
INSERT INTO `sh_partner` VALUES ('22', 'Back Channel - Portsmouth, NH', null, null, null, '2');
INSERT INTO `sh_partner` VALUES ('23', 'Great Bay - Greenland, NH', null, null, null, '2');

-- ----------------------------
-- Table structure for `sh_services`
-- ----------------------------
DROP TABLE IF EXISTS `sh_services`;
CREATE TABLE `sh_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_services
-- ----------------------------
INSERT INTO `sh_services` VALUES ('1', 'Sản xuất và phân phối các sản phẩm cao lanh', 'Những sản phẩm này được sử dụng không chỉ trong các ngành công nghiệp gốm sứ mà còn trong nhiều lĩnh vực khác nhau.');
INSERT INTO `sh_services` VALUES ('2', 'Sản xuất và phân phối các sản phẩm felsfat', 'Sản phẩm YFA đã được bán trên khắp các quốc gia, và đã thu hút được nhiều khách hàng lớn như Tập đoàn Cosevco Group, Hàn Quốc, Nhật Bản...');
INSERT INTO `sh_services` VALUES ('3', 'Sản xuất và phân phối các sản phẩm dolomit', 'Sản phẩm YFA đã được bán trên khắp các quốc gia, và đã thu hút được nhiều khách hàng lớn.');

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
