/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : booking

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-05-18 18:48:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '酒店名',
  `ename` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT '酒店英文名',
  `avatar` varchar(255) DEFAULT NULL COMMENT '酒店头像',
  `province` smallint(4) NOT NULL COMMENT '所在省份id',
  `city` smallint(4) NOT NULL COMMENT '所在城市id',
  `address` varchar(600) NOT NULL DEFAULT '' COMMENT '酒店详细地址',
  `introduction` text COMMENT '酒店介绍',
  `level` tinyint(2) NOT NULL DEFAULT '0' COMMENT '星级，默认无',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES ('1', '如家酒店', 'rujia', 'http://o7cp55a9d.bkt.clouddn.com/hotel.jpeg', '18', '265', 'cbd', 'CDB 商业区', '5');
INSERT INTO `hotel` VALUES ('2', '希尔顿大酒店', 'xieerdun', 'http://o7cp55a9d.bkt.clouddn.com/hotel.jpeg', '16', '243', 'cbd', '', '0');
INSERT INTO `hotel` VALUES ('3', '迪拜帆船酒店', 'dibaifanchuan', 'http://o7cp55a9d.bkt.clouddn.com/hotel.jpeg', '18', '266', 'cbd', '', '7');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1461034823');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1461034828');
INSERT INTO `migration` VALUES ('m160505_105023_alter_user_table', '1462445674');
INSERT INTO `migration` VALUES ('m160505_105558_alter_user_table', '1462445772');
INSERT INTO `migration` VALUES ('m160505_105840_alter_user_table', '1462445961');
INSERT INTO `migration` VALUES ('m160505_110021_alter_user_table', '1462446042');
INSERT INTO `migration` VALUES ('m160512_023857_alter_room_table', '1463021105');
INSERT INTO `migration` VALUES ('m160512_031541_alter_room_table', '1463023009');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `payed_at` int(10) NOT NULL,
  `pay_price` decimal(2,2) NOT NULL DEFAULT '0.00' COMMENT '支付价格',
  `pay_state` tinyint(1) NOT NULL COMMENT '订单支付状态，0未支付，1已支付',
  `created_at` int(10) DEFAULT NULL COMMENT '订单创建时间',
  `updated_at` int(10) DEFAULT NULL COMMENT '订单更新时间',
  `remark` varchar(1000) DEFAULT NULL COMMENT '订单备注',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '订单情况，是否删除等，1已完成，0删除，2已取消',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('1', '1', '1', '1', '1463227638', '0.00', '0', '1463562223', '1463568354', '此订单打折优惠哈哈哈，，，，', '0');

-- ----------------------------
-- Table structure for region
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `id` smallint(4) NOT NULL COMMENT '地区id',
  `pid` smallint(4) NOT NULL COMMENT '父级id',
  `name` varchar(20) NOT NULL COMMENT '地区名',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='中国省市表';

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO `region` VALUES ('1', '0', '北京');
INSERT INTO `region` VALUES ('2', '0', '上海');
INSERT INTO `region` VALUES ('3', '0', '广东');
INSERT INTO `region` VALUES ('4', '0', '广西');
INSERT INTO `region` VALUES ('5', '0', '江苏');
INSERT INTO `region` VALUES ('6', '0', '浙江');
INSERT INTO `region` VALUES ('7', '0', '安徽');
INSERT INTO `region` VALUES ('8', '0', '江西');
INSERT INTO `region` VALUES ('9', '0', '福建');
INSERT INTO `region` VALUES ('10', '0', '山东');
INSERT INTO `region` VALUES ('11', '0', '山西');
INSERT INTO `region` VALUES ('12', '0', '河北');
INSERT INTO `region` VALUES ('13', '0', '河南');
INSERT INTO `region` VALUES ('14', '0', '天津');
INSERT INTO `region` VALUES ('15', '0', '辽宁');
INSERT INTO `region` VALUES ('16', '0', '黑龙江');
INSERT INTO `region` VALUES ('17', '0', '吉林');
INSERT INTO `region` VALUES ('18', '0', '湖北');
INSERT INTO `region` VALUES ('19', '0', '湖南');
INSERT INTO `region` VALUES ('20', '0', '四川');
INSERT INTO `region` VALUES ('21', '0', '重庆');
INSERT INTO `region` VALUES ('22', '0', '陕西');
INSERT INTO `region` VALUES ('23', '0', '甘肃');
INSERT INTO `region` VALUES ('24', '0', '云南');
INSERT INTO `region` VALUES ('25', '0', '新疆');
INSERT INTO `region` VALUES ('26', '0', '内蒙古');
INSERT INTO `region` VALUES ('27', '0', '海南');
INSERT INTO `region` VALUES ('28', '0', '贵州');
INSERT INTO `region` VALUES ('29', '0', '青海');
INSERT INTO `region` VALUES ('30', '0', '宁夏');
INSERT INTO `region` VALUES ('31', '0', '西藏');
INSERT INTO `region` VALUES ('32', '1', '朝阳');
INSERT INTO `region` VALUES ('33', '1', '海淀');
INSERT INTO `region` VALUES ('34', '1', '西城');
INSERT INTO `region` VALUES ('35', '1', '东城');
INSERT INTO `region` VALUES ('36', '1', '丰台');
INSERT INTO `region` VALUES ('37', '1', '大兴');
INSERT INTO `region` VALUES ('38', '1', '昌平');
INSERT INTO `region` VALUES ('39', '1', '石景山');
INSERT INTO `region` VALUES ('40', '1', '通州');
INSERT INTO `region` VALUES ('41', '1', '房山');
INSERT INTO `region` VALUES ('42', '1', '顺义');
INSERT INTO `region` VALUES ('43', '1', '怀柔');
INSERT INTO `region` VALUES ('44', '1', '平谷');
INSERT INTO `region` VALUES ('45', '1', '门头沟');
INSERT INTO `region` VALUES ('46', '1', '延庆');
INSERT INTO `region` VALUES ('47', '2', '浦东新');
INSERT INTO `region` VALUES ('48', '2', '徐汇');
INSERT INTO `region` VALUES ('49', '2', '黄浦');
INSERT INTO `region` VALUES ('50', '2', '长宁');
INSERT INTO `region` VALUES ('51', '2', '杨浦');
INSERT INTO `region` VALUES ('52', '2', '普陀');
INSERT INTO `region` VALUES ('53', '2', '虹口');
INSERT INTO `region` VALUES ('54', '2', '闸北');
INSERT INTO `region` VALUES ('55', '2', '闵行');
INSERT INTO `region` VALUES ('56', '2', '静安');
INSERT INTO `region` VALUES ('57', '2', '嘉定');
INSERT INTO `region` VALUES ('58', '2', '宝山');
INSERT INTO `region` VALUES ('59', '2', '金山');
INSERT INTO `region` VALUES ('60', '2', '奉贤');
INSERT INTO `region` VALUES ('61', '2', '松江');
INSERT INTO `region` VALUES ('62', '2', '崇明');
INSERT INTO `region` VALUES ('63', '2', '青浦');
INSERT INTO `region` VALUES ('64', '3', '广州');
INSERT INTO `region` VALUES ('65', '3', '深圳');
INSERT INTO `region` VALUES ('66', '3', '佛山');
INSERT INTO `region` VALUES ('67', '3', '东莞');
INSERT INTO `region` VALUES ('68', '3', '江门');
INSERT INTO `region` VALUES ('69', '3', '汕头');
INSERT INTO `region` VALUES ('70', '3', '惠州');
INSERT INTO `region` VALUES ('71', '3', '湛江');
INSERT INTO `region` VALUES ('72', '3', '肇庆');
INSERT INTO `region` VALUES ('73', '3', '茂名');
INSERT INTO `region` VALUES ('74', '3', '珠海');
INSERT INTO `region` VALUES ('75', '3', '中山');
INSERT INTO `region` VALUES ('76', '3', '阳江');
INSERT INTO `region` VALUES ('77', '3', '梅州');
INSERT INTO `region` VALUES ('78', '3', '韶关');
INSERT INTO `region` VALUES ('79', '3', '清远');
INSERT INTO `region` VALUES ('80', '3', '揭阳');
INSERT INTO `region` VALUES ('81', '3', '河源');
INSERT INTO `region` VALUES ('82', '3', '潮州');
INSERT INTO `region` VALUES ('83', '3', '汕尾');
INSERT INTO `region` VALUES ('84', '3', '云浮');
INSERT INTO `region` VALUES ('85', '4', '南宁');
INSERT INTO `region` VALUES ('86', '4', '桂林');
INSERT INTO `region` VALUES ('87', '4', '柳州');
INSERT INTO `region` VALUES ('88', '4', '玉林');
INSERT INTO `region` VALUES ('89', '4', '梧州');
INSERT INTO `region` VALUES ('90', '4', '钦州');
INSERT INTO `region` VALUES ('91', '4', '河池');
INSERT INTO `region` VALUES ('92', '4', '北海');
INSERT INTO `region` VALUES ('93', '4', '贺州');
INSERT INTO `region` VALUES ('94', '4', '贵港');
INSERT INTO `region` VALUES ('95', '4', '防城港');
INSERT INTO `region` VALUES ('96', '4', '崇左');
INSERT INTO `region` VALUES ('97', '4', '百色');
INSERT INTO `region` VALUES ('98', '4', '来宾');
INSERT INTO `region` VALUES ('99', '5', '南京');
INSERT INTO `region` VALUES ('100', '5', '苏州');
INSERT INTO `region` VALUES ('101', '5', '南通');
INSERT INTO `region` VALUES ('102', '5', '徐州');
INSERT INTO `region` VALUES ('103', '5', '无锡');
INSERT INTO `region` VALUES ('104', '5', '扬州');
INSERT INTO `region` VALUES ('105', '5', '盐城');
INSERT INTO `region` VALUES ('106', '5', '泰州');
INSERT INTO `region` VALUES ('107', '5', '常州');
INSERT INTO `region` VALUES ('108', '5', '连云港');
INSERT INTO `region` VALUES ('109', '5', '镇江');
INSERT INTO `region` VALUES ('110', '5', '宿迁');
INSERT INTO `region` VALUES ('111', '5', '淮安');
INSERT INTO `region` VALUES ('112', '6', '杭州');
INSERT INTO `region` VALUES ('113', '6', '宁波');
INSERT INTO `region` VALUES ('114', '6', '温州');
INSERT INTO `region` VALUES ('115', '6', '金华');
INSERT INTO `region` VALUES ('116', '6', '台州');
INSERT INTO `region` VALUES ('117', '6', '绍兴');
INSERT INTO `region` VALUES ('118', '6', '嘉兴');
INSERT INTO `region` VALUES ('119', '6', '湖州');
INSERT INTO `region` VALUES ('120', '6', '丽水');
INSERT INTO `region` VALUES ('121', '6', '衢州');
INSERT INTO `region` VALUES ('122', '6', '舟山');
INSERT INTO `region` VALUES ('123', '7', '合肥');
INSERT INTO `region` VALUES ('124', '7', '蚌埠');
INSERT INTO `region` VALUES ('125', '7', '安庆');
INSERT INTO `region` VALUES ('126', '7', '芜湖');
INSERT INTO `region` VALUES ('127', '7', '阜阳');
INSERT INTO `region` VALUES ('128', '7', '宣城');
INSERT INTO `region` VALUES ('129', '7', '淮南');
INSERT INTO `region` VALUES ('130', '7', '六安');
INSERT INTO `region` VALUES ('131', '7', '巢湖');
INSERT INTO `region` VALUES ('132', '7', '亳州');
INSERT INTO `region` VALUES ('133', '7', '马鞍山');
INSERT INTO `region` VALUES ('134', '7', '黄山');
INSERT INTO `region` VALUES ('135', '7', '淮北');
INSERT INTO `region` VALUES ('136', '7', '池州');
INSERT INTO `region` VALUES ('137', '7', '铜陵');
INSERT INTO `region` VALUES ('138', '7', '滁州');
INSERT INTO `region` VALUES ('139', '7', '宿州');
INSERT INTO `region` VALUES ('140', '8', '南昌');
INSERT INTO `region` VALUES ('141', '8', '赣州');
INSERT INTO `region` VALUES ('142', '8', '上饶');
INSERT INTO `region` VALUES ('143', '8', '九江');
INSERT INTO `region` VALUES ('144', '8', '宜春');
INSERT INTO `region` VALUES ('145', '8', '吉安');
INSERT INTO `region` VALUES ('146', '8', '景德镇');
INSERT INTO `region` VALUES ('147', '8', '萍乡');
INSERT INTO `region` VALUES ('148', '8', '新余');
INSERT INTO `region` VALUES ('149', '8', '鹰潭');
INSERT INTO `region` VALUES ('150', '8', '抚州');
INSERT INTO `region` VALUES ('151', '9', '福州');
INSERT INTO `region` VALUES ('152', '9', '泉州');
INSERT INTO `region` VALUES ('153', '9', '厦门');
INSERT INTO `region` VALUES ('154', '9', '三明');
INSERT INTO `region` VALUES ('155', '9', '南平');
INSERT INTO `region` VALUES ('156', '9', '龙岩');
INSERT INTO `region` VALUES ('157', '9', '宁德');
INSERT INTO `region` VALUES ('158', '9', '莆田');
INSERT INTO `region` VALUES ('159', '9', '漳州');
INSERT INTO `region` VALUES ('160', '10', '济南');
INSERT INTO `region` VALUES ('161', '10', '潍坊');
INSERT INTO `region` VALUES ('162', '10', '青岛');
INSERT INTO `region` VALUES ('163', '10', '临沂');
INSERT INTO `region` VALUES ('164', '10', '济宁');
INSERT INTO `region` VALUES ('165', '10', '泰安');
INSERT INTO `region` VALUES ('166', '10', '聊城');
INSERT INTO `region` VALUES ('167', '10', '烟台');
INSERT INTO `region` VALUES ('168', '10', '淄博');
INSERT INTO `region` VALUES ('169', '10', '菏泽');
INSERT INTO `region` VALUES ('170', '10', '德州');
INSERT INTO `region` VALUES ('171', '10', '滨州');
INSERT INTO `region` VALUES ('172', '10', '枣庄');
INSERT INTO `region` VALUES ('173', '10', '威海');
INSERT INTO `region` VALUES ('174', '10', '东营');
INSERT INTO `region` VALUES ('175', '10', '日照');
INSERT INTO `region` VALUES ('176', '10', '莱芜');
INSERT INTO `region` VALUES ('177', '11', '太原');
INSERT INTO `region` VALUES ('178', '11', '长治');
INSERT INTO `region` VALUES ('179', '11', '运城');
INSERT INTO `region` VALUES ('180', '11', '大同');
INSERT INTO `region` VALUES ('181', '11', '临汾');
INSERT INTO `region` VALUES ('182', '11', '晋中');
INSERT INTO `region` VALUES ('183', '11', '晋城');
INSERT INTO `region` VALUES ('184', '11', '阳泉');
INSERT INTO `region` VALUES ('185', '11', '吕梁');
INSERT INTO `region` VALUES ('186', '11', '忻州');
INSERT INTO `region` VALUES ('187', '11', '朔州');
INSERT INTO `region` VALUES ('188', '12', '石家庄');
INSERT INTO `region` VALUES ('189', '12', '邯郸');
INSERT INTO `region` VALUES ('190', '12', '保定');
INSERT INTO `region` VALUES ('191', '12', '邢台');
INSERT INTO `region` VALUES ('192', '12', '唐山');
INSERT INTO `region` VALUES ('193', '12', '张家口');
INSERT INTO `region` VALUES ('194', '12', '沧州');
INSERT INTO `region` VALUES ('195', '12', '秦皇岛');
INSERT INTO `region` VALUES ('196', '12', '廊坊');
INSERT INTO `region` VALUES ('197', '12', '承德');
INSERT INTO `region` VALUES ('198', '12', '衡水');
INSERT INTO `region` VALUES ('199', '13', '郑州');
INSERT INTO `region` VALUES ('200', '13', '洛阳');
INSERT INTO `region` VALUES ('201', '13', '南阳');
INSERT INTO `region` VALUES ('202', '13', '安阳');
INSERT INTO `region` VALUES ('203', '13', '新乡');
INSERT INTO `region` VALUES ('204', '13', '开封');
INSERT INTO `region` VALUES ('205', '13', '商丘');
INSERT INTO `region` VALUES ('206', '13', '平顶山');
INSERT INTO `region` VALUES ('207', '13', '焦作');
INSERT INTO `region` VALUES ('208', '13', '濮阳');
INSERT INTO `region` VALUES ('209', '13', '驻马店');
INSERT INTO `region` VALUES ('210', '13', '周口');
INSERT INTO `region` VALUES ('211', '13', '漯河');
INSERT INTO `region` VALUES ('212', '13', '许昌');
INSERT INTO `region` VALUES ('213', '13', '信阳');
INSERT INTO `region` VALUES ('214', '13', '三门峡');
INSERT INTO `region` VALUES ('215', '13', '济源');
INSERT INTO `region` VALUES ('216', '13', '鹤壁');
INSERT INTO `region` VALUES ('217', '14', '南开');
INSERT INTO `region` VALUES ('218', '14', '河西');
INSERT INTO `region` VALUES ('219', '14', '和平');
INSERT INTO `region` VALUES ('220', '14', '河北');
INSERT INTO `region` VALUES ('221', '14', '塘沽');
INSERT INTO `region` VALUES ('222', '14', '津南');
INSERT INTO `region` VALUES ('223', '14', '河东');
INSERT INTO `region` VALUES ('224', '14', '红桥');
INSERT INTO `region` VALUES ('225', '14', '北辰');
INSERT INTO `region` VALUES ('226', '14', '汉沽');
INSERT INTO `region` VALUES ('227', '14', '大港');
INSERT INTO `region` VALUES ('228', '14', '宝坻');
INSERT INTO `region` VALUES ('229', '15', '沈阳');
INSERT INTO `region` VALUES ('230', '15', '大连');
INSERT INTO `region` VALUES ('231', '15', '鞍山');
INSERT INTO `region` VALUES ('232', '15', '锦州');
INSERT INTO `region` VALUES ('233', '15', '辽阳');
INSERT INTO `region` VALUES ('234', '15', '朝阳');
INSERT INTO `region` VALUES ('235', '15', '阜新');
INSERT INTO `region` VALUES ('236', '15', '抚顺');
INSERT INTO `region` VALUES ('237', '15', '丹东');
INSERT INTO `region` VALUES ('238', '15', '营口');
INSERT INTO `region` VALUES ('239', '15', '铁岭');
INSERT INTO `region` VALUES ('240', '15', '本溪');
INSERT INTO `region` VALUES ('241', '15', '葫芦岛');
INSERT INTO `region` VALUES ('242', '15', '盘锦');
INSERT INTO `region` VALUES ('243', '16', '哈尔滨');
INSERT INTO `region` VALUES ('244', '16', '齐齐哈尔');
INSERT INTO `region` VALUES ('245', '16', '大庆');
INSERT INTO `region` VALUES ('246', '16', '牡丹江');
INSERT INTO `region` VALUES ('247', '16', '佳木斯');
INSERT INTO `region` VALUES ('248', '16', '鸡西');
INSERT INTO `region` VALUES ('249', '16', '双鸭山');
INSERT INTO `region` VALUES ('250', '16', '绥化');
INSERT INTO `region` VALUES ('251', '16', '黑河');
INSERT INTO `region` VALUES ('252', '16', '七台河');
INSERT INTO `region` VALUES ('253', '16', '鹤岗');
INSERT INTO `region` VALUES ('254', '16', '大兴安岭');
INSERT INTO `region` VALUES ('255', '17', '长春');
INSERT INTO `region` VALUES ('256', '17', '吉林');
INSERT INTO `region` VALUES ('257', '17', '延边');
INSERT INTO `region` VALUES ('258', '17', '通化');
INSERT INTO `region` VALUES ('259', '17', '松原');
INSERT INTO `region` VALUES ('260', '17', '四平');
INSERT INTO `region` VALUES ('261', '17', '辽源');
INSERT INTO `region` VALUES ('262', '17', '白城');
INSERT INTO `region` VALUES ('263', '17', '白山');
INSERT INTO `region` VALUES ('264', '18', '武汉');
INSERT INTO `region` VALUES ('265', '18', '宜昌');
INSERT INTO `region` VALUES ('266', '18', '十堰');
INSERT INTO `region` VALUES ('267', '18', '荆州');
INSERT INTO `region` VALUES ('268', '18', '襄阳');
INSERT INTO `region` VALUES ('269', '18', '孝感');
INSERT INTO `region` VALUES ('270', '18', '荆门');
INSERT INTO `region` VALUES ('271', '18', '黄冈');
INSERT INTO `region` VALUES ('272', '18', '咸宁');
INSERT INTO `region` VALUES ('273', '18', '随州');
INSERT INTO `region` VALUES ('274', '18', '黄石');
INSERT INTO `region` VALUES ('275', '18', '恩施');
INSERT INTO `region` VALUES ('276', '18', '鄂州');
INSERT INTO `region` VALUES ('277', '18', '仙桃');
INSERT INTO `region` VALUES ('278', '18', '潜江');
INSERT INTO `region` VALUES ('279', '19', '长沙');
INSERT INTO `region` VALUES ('280', '19', '郴州');
INSERT INTO `region` VALUES ('281', '19', '衡阳');
INSERT INTO `region` VALUES ('282', '19', '常德');
INSERT INTO `region` VALUES ('283', '19', '株洲');
INSERT INTO `region` VALUES ('284', '19', '湘潭');
INSERT INTO `region` VALUES ('285', '19', '岳阳');
INSERT INTO `region` VALUES ('286', '19', '邵阳');
INSERT INTO `region` VALUES ('287', '19', '娄底');
INSERT INTO `region` VALUES ('288', '19', '永州');
INSERT INTO `region` VALUES ('289', '19', '益阳');
INSERT INTO `region` VALUES ('290', '19', '怀化');
INSERT INTO `region` VALUES ('291', '19', '张家界');
INSERT INTO `region` VALUES ('292', '19', '湘西');
INSERT INTO `region` VALUES ('293', '20', '成都');
INSERT INTO `region` VALUES ('294', '20', '绵阳');
INSERT INTO `region` VALUES ('295', '20', '广元');
INSERT INTO `region` VALUES ('296', '20', '自贡');
INSERT INTO `region` VALUES ('297', '20', '泸州');
INSERT INTO `region` VALUES ('298', '20', '乐山');
INSERT INTO `region` VALUES ('299', '20', '宜宾');
INSERT INTO `region` VALUES ('300', '20', '德阳');
INSERT INTO `region` VALUES ('301', '20', '攀枝花');
INSERT INTO `region` VALUES ('302', '20', '凉山');
INSERT INTO `region` VALUES ('303', '20', '达州');
INSERT INTO `region` VALUES ('304', '20', '南充');
INSERT INTO `region` VALUES ('305', '20', '资阳');
INSERT INTO `region` VALUES ('306', '20', '内江');
INSERT INTO `region` VALUES ('307', '20', '雅安');
INSERT INTO `region` VALUES ('308', '20', '眉山');
INSERT INTO `region` VALUES ('309', '20', '遂宁');
INSERT INTO `region` VALUES ('310', '20', '巴中');
INSERT INTO `region` VALUES ('311', '20', '广安');
INSERT INTO `region` VALUES ('312', '21', '渝中');
INSERT INTO `region` VALUES ('313', '21', '万州');
INSERT INTO `region` VALUES ('314', '21', '沙坪坝');
INSERT INTO `region` VALUES ('315', '21', '南岸');
INSERT INTO `region` VALUES ('316', '21', '江北');
INSERT INTO `region` VALUES ('317', '21', '涪陵');
INSERT INTO `region` VALUES ('318', '21', '渝北');
INSERT INTO `region` VALUES ('319', '21', '九龙坡');
INSERT INTO `region` VALUES ('320', '21', '巴南');
INSERT INTO `region` VALUES ('321', '21', '江津');
INSERT INTO `region` VALUES ('322', '21', '长寿');
INSERT INTO `region` VALUES ('323', '21', '北碚');
INSERT INTO `region` VALUES ('324', '21', '黔江');
INSERT INTO `region` VALUES ('325', '22', '西安');
INSERT INTO `region` VALUES ('326', '22', '宝鸡');
INSERT INTO `region` VALUES ('327', '22', '咸阳');
INSERT INTO `region` VALUES ('328', '22', '渭南');
INSERT INTO `region` VALUES ('329', '22', '榆林');
INSERT INTO `region` VALUES ('330', '22', '汉中');
INSERT INTO `region` VALUES ('331', '22', '安康');
INSERT INTO `region` VALUES ('332', '22', '商洛');
INSERT INTO `region` VALUES ('333', '22', '延安');
INSERT INTO `region` VALUES ('334', '22', '铜川');
INSERT INTO `region` VALUES ('335', '23', '兰州');
INSERT INTO `region` VALUES ('336', '23', '武威');
INSERT INTO `region` VALUES ('337', '23', '庆阳');
INSERT INTO `region` VALUES ('338', '23', '酒泉');
INSERT INTO `region` VALUES ('339', '23', '平凉');
INSERT INTO `region` VALUES ('340', '23', '陇南');
INSERT INTO `region` VALUES ('341', '23', '白银');
INSERT INTO `region` VALUES ('342', '23', '张掖');
INSERT INTO `region` VALUES ('343', '23', '天水');
INSERT INTO `region` VALUES ('344', '23', '临夏');
INSERT INTO `region` VALUES ('345', '23', '嘉峪关');
INSERT INTO `region` VALUES ('346', '23', '定西');
INSERT INTO `region` VALUES ('347', '23', '金昌');
INSERT INTO `region` VALUES ('348', '24', '昆明');
INSERT INTO `region` VALUES ('349', '24', '红河');
INSERT INTO `region` VALUES ('350', '24', '大理');
INSERT INTO `region` VALUES ('351', '24', '曲靖');
INSERT INTO `region` VALUES ('352', '24', '楚雄');
INSERT INTO `region` VALUES ('353', '24', '昭通');
INSERT INTO `region` VALUES ('354', '24', '玉溪');
INSERT INTO `region` VALUES ('355', '24', '西双版纳');
INSERT INTO `region` VALUES ('356', '24', '文山');
INSERT INTO `region` VALUES ('357', '24', '保山');
INSERT INTO `region` VALUES ('358', '24', '普洱');
INSERT INTO `region` VALUES ('359', '24', '怒江');
INSERT INTO `region` VALUES ('360', '24', '临沧');
INSERT INTO `region` VALUES ('361', '24', '丽江');
INSERT INTO `region` VALUES ('362', '24', '德宏');
INSERT INTO `region` VALUES ('363', '25', '乌鲁木齐');
INSERT INTO `region` VALUES ('364', '25', '昌吉');
INSERT INTO `region` VALUES ('365', '25', '喀什');
INSERT INTO `region` VALUES ('366', '25', '阿克苏');
INSERT INTO `region` VALUES ('367', '25', '伊犁');
INSERT INTO `region` VALUES ('368', '25', '哈密');
INSERT INTO `region` VALUES ('369', '25', '巴音郭楞');
INSERT INTO `region` VALUES ('370', '25', '石河子');
INSERT INTO `region` VALUES ('371', '25', '克孜勒苏');
INSERT INTO `region` VALUES ('372', '25', '克拉玛依');
INSERT INTO `region` VALUES ('373', '25', '和田');
INSERT INTO `region` VALUES ('374', '25', '博尔塔拉');
INSERT INTO `region` VALUES ('375', '25', '塔城');
INSERT INTO `region` VALUES ('376', '25', '阿勒泰');
INSERT INTO `region` VALUES ('377', '26', '呼和浩特');
INSERT INTO `region` VALUES ('378', '26', '赤峰');
INSERT INTO `region` VALUES ('379', '26', '包头');
INSERT INTO `region` VALUES ('380', '26', '通辽');
INSERT INTO `region` VALUES ('381', '26', '呼伦贝尔');
INSERT INTO `region` VALUES ('382', '26', '巴彦淖尔');
INSERT INTO `region` VALUES ('383', '26', '乌兰察布');
INSERT INTO `region` VALUES ('384', '26', '鄂尔多斯');
INSERT INTO `region` VALUES ('385', '26', '兴安盟');
INSERT INTO `region` VALUES ('386', '26', '锡林郭勒盟');
INSERT INTO `region` VALUES ('387', '26', '乌海');
INSERT INTO `region` VALUES ('388', '26', '阿拉善盟');
INSERT INTO `region` VALUES ('389', '28', '贵阳');
INSERT INTO `region` VALUES ('390', '28', '遵义');
INSERT INTO `region` VALUES ('391', '28', '黔南州');
INSERT INTO `region` VALUES ('392', '28', '毕节');
INSERT INTO `region` VALUES ('393', '28', '黔西南州');
INSERT INTO `region` VALUES ('394', '28', '黔东南州');
INSERT INTO `region` VALUES ('395', '28', '六盘水');
INSERT INTO `region` VALUES ('396', '28', '铜仁');
INSERT INTO `region` VALUES ('397', '28', '安顺');
INSERT INTO `region` VALUES ('398', '29', '西宁');
INSERT INTO `region` VALUES ('399', '29', '海西');
INSERT INTO `region` VALUES ('400', '29', '海东');
INSERT INTO `region` VALUES ('401', '30', '银川');
INSERT INTO `region` VALUES ('402', '30', '石嘴山');
INSERT INTO `region` VALUES ('403', '30', '吴忠');
INSERT INTO `region` VALUES ('404', '30', '中卫');
INSERT INTO `region` VALUES ('405', '30', '固原');
INSERT INTO `region` VALUES ('406', '31', '日喀则');
INSERT INTO `region` VALUES ('407', '31', '那曲');
INSERT INTO `region` VALUES ('408', '31', '阿里');
INSERT INTO `region` VALUES ('409', '31', '昌都');
INSERT INTO `region` VALUES ('410', '31', '拉萨');

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房间id',
  `hotel_id` int(11) NOT NULL COMMENT '房间所在酒店id',
  `room_number` int(11) NOT NULL COMMENT '房间号',
  `price` decimal(10,2) DEFAULT NULL COMMENT '房间价格',
  `type` tinyint(1) NOT NULL COMMENT '房间类型',
  `introduction` varchar(255) DEFAULT NULL COMMENT '房间介绍',
  `reserved_at` int(10) DEFAULT NULL COMMENT '房间预订时间',
  `status` tinyint(1) NOT NULL COMMENT '房间当前状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES ('1', '1', '12344', '99.00', '1', '', '1463041531', '2');
INSERT INTO `room` VALUES ('3', '1', '23456', '200012.10', '1', '', '0', '4');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT '0' COMMENT '用户类型，0普通用户,否则管理员',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `realname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'cookie使用，认证key',
  `access_token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT '访问口令，如api中每次请求使用',
  `password_reset_token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT '密码重置口令',
  `password_hash` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT '加密密码',
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT '邮箱',
  `status` smallint(6) DEFAULT '10' COMMENT '当前状态，0-10,0为删除，10活动',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  UNIQUE KEY `password_reset_token` (`password_reset_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '1', 'admin', '施瓦辛格', '286lGadLRUkFHHJ8VPcShwy3NqAmyzG9', 'PSlKw0RVQaDLiv_WINJsz3iCGwIxzX7u_1463550407', null, '$2y$13$bpg4pydQ99IsF6YtHrgpeOEJ8tNRFDBgrAZe7cIBl2uqFP4FbN41O', '1518867738@qq.com', '10', '1462527593', '1463225063');
INSERT INTO `user` VALUES ('4', '2', 'heiheihei', '曹操', 'nyPaHZg7rCMiGjy5obHcfUdKEoznee_l', 'ymO4_5blx6vecHdAHBgkYt-ildOPbD8G_1463550421', null, '$2y$13$8ikf06rLd3aqnRJQKriRR.tTT1BX3XEej16RNB8ijpFpRByKNL5ju', '152@qq.com', '10', '1462527593', '1463225081');
INSERT INTO `user` VALUES ('6', '0', '123456', '时迁', 'hNUTV_wvMJEhM-Mfp2TDhpviGjKjDmFu', 'fMAYz3KsmJZPm2zfaEX7rrwRda_TKw6B_1463550428', null, '$2y$13$HM12OMKvz9gyZaf8WLPha.lMYV31kRloECyDTlo235S8vSFtjkXii', '123456@123.com', '10', '1462535582', '1463225097');
