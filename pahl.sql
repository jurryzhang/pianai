/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : pahl

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-18 09:31:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pahl_admin
-- ----------------------------
DROP TABLE IF EXISTS `pahl_admin`;
CREATE TABLE `pahl_admin` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL COMMENT '管理员名称',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `addtime` int(11) unsigned NOT NULL COMMENT '注册时间',
  `addip` varchar(15) NOT NULL COMMENT '添加ip',
  `logintime` int(11) unsigned NOT NULL COMMENT '登录时间',
  `loginip` varchar(15) NOT NULL COMMENT '登录ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of pahl_admin
-- ----------------------------
INSERT INTO `pahl_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1428232414', '127.0.0.1', '1428232414', '127.0.0.1');
INSERT INTO `pahl_admin` VALUES ('5', '123', '202cb962ac59075b964b07152d234b70', '1503898887', '', '1503898887', '');

-- ----------------------------
-- Table structure for pahl_admininfo
-- ----------------------------
DROP TABLE IF EXISTS `pahl_admininfo`;
CREATE TABLE `pahl_admininfo` (
  `aid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AID',
  `adminName` varchar(255) NOT NULL COMMENT '管理员名',
  `password` char(32) NOT NULL COMMENT '密码',
  `addTime` int(11) NOT NULL COMMENT '添加时间',
  `addIp` varchar(20) DEFAULT NULL COMMENT '注册IP',
  `loginTime` int(11) DEFAULT '0' COMMENT '登陆时间',
  `loginIp` varchar(20) DEFAULT NULL COMMENT '登陆IP',
  PRIMARY KEY (`aid`),
  UNIQUE KEY `adminName` (`adminName`),
  KEY `adminName_2` (`adminName`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pahl_admininfo
-- ----------------------------
INSERT INTO `pahl_admininfo` VALUES ('1', 'admin', '1bbd886460827015e5d605ed44252251', '1428232414', '1212121212', '1428232414', '12121');

-- ----------------------------
-- Table structure for pahl_articles
-- ----------------------------
DROP TABLE IF EXISTS `pahl_articles`;
CREATE TABLE `pahl_articles` (
  `tid` int(80) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `content` text,
  `addtime` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `praise` int(255) DEFAULT '0',
  `uid` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pahl_articles
-- ----------------------------
INSERT INTO `pahl_articles` VALUES ('1', null, null, '建立客户经理SOG，新客户经理对客户经理界面的业务流程（内部流程的流程、面向客户的商务礼仪、内部沟通的形式）不熟悉，会导致业务受理变慢、客户感知变差；建立客户经理SOG后，可针对以上几个方面进行覆盖、优化、迭代；\n形式上可参照线上类似于百度词条的形式，对某项业务或者某方面进行阐述解答，添加词条越多经验值越多，可以按季度、年中、年终对贡献最多进行表彰。\n', null, null, '11', '0/240/245/229/262/244/243/253/235/237/248/234');
INSERT INTO `pahl_articles` VALUES ('2', '12121', '12', '12', '1489642779', '58ca251b937aa.png', '0', '0');

-- ----------------------------
-- Table structure for pahl_chouser
-- ----------------------------
DROP TABLE IF EXISTS `pahl_chouser`;
CREATE TABLE `pahl_chouser` (
  `uid` int(8) unsigned NOT NULL COMMENT '用户id',
  `age` varchar(10) NOT NULL COMMENT '年龄',
  `height` varchar(10) NOT NULL COMMENT '身高',
  `nation` varchar(5) NOT NULL COMMENT '民族',
  `qualification` varchar(10) NOT NULL COMMENT '学历',
  `housing` tinyint(2) unsigned NOT NULL COMMENT '3：无房；1：有房有贷，2：无房无贷',
  `work` varchar(15) NOT NULL COMMENT '从事工作',
  `monthly` varchar(15) NOT NULL COMMENT '月薪',
  `marriage` tinyint(2) unsigned NOT NULL COMMENT '3：未婚，1：离婚，2丧偶',
  `child` tinyint(2) unsigned NOT NULL COMMENT '3：无，1：有不同主；2：有同住',
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of pahl_chouser
-- ----------------------------
INSERT INTO `pahl_chouser` VALUES ('104', '20~25', '170~175', '汉族', '博士研究生', '3', 'it', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('103', '20~25', '170~175', '汉族', '博士研究生', '3', '设计', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('102', '20~25', '170~175', '汉族', '博士研究生', '3', '插画师', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('101', '20~25', '170~175', '汉族', '博士研究生', '3', '程序', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('100', '20~25', '170~175', '汉族', '博士研究生', '3', '装修', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('35', '30~35', '175~180', '汉族', '博士研究生', '2', '热武器', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('33', '20~25', '170~175', '汉族', '博士研究生', '2', '发 ', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('99', '20~25', '170~175', '汉族', '博士研究生', '3', '销售', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('98', '20~25', '170~175', '汉族', '博士研究生', '3', '医生', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('97', '20~25', '170~175', '汉族', '博士研究生', '3', '医生', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('96', '20~25', '170~175', '汉族', '博士研究生', '3', '设计', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('95', '20~25', '170~175', '汉族', '博士研究生', '3', 'it', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('94', '20~25', '170~175', '汉族', '博士研究生', '3', '销售', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('93', '20~25', '170~175', '汉族', '博士研究生', '3', 'it', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('88', '20~25', '170~175', '汉族', '博士研究生', '3', '123', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('92', '20~25', '170~175', '汉族', '博士研究生', '3', 'it', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('105', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('106', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('107', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('108', '20~25', '170~175', '汉族', '博士研究生', '3', '婚恋', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('109', '20~25', '170~175', '汉族', '博士研究生', '3', '婚恋', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('110', '20~25', '170~175', '汉族', '博士研究生', '3', '婚恋', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('111', '20~25', '170~175', '汉族', '博士研究生', '3', '婚恋', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('112', '20~25', '170~175', '汉族', '博士研究生', '3', '婚恋', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('114', '20~25', '170~175', '汉族', '博士研究生', '3', '婚恋', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('115', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('116', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('117', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('118', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('120', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('121', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('122', '', '', '', '', '0', '', '', '0', '0');
INSERT INTO `pahl_chouser` VALUES ('123', '', '', '', '', '0', '', '', '0', '0');
INSERT INTO `pahl_chouser` VALUES ('124', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('125', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('126', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('127', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('128', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('129', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('145', '20~25', '170~175', '汉族', '博士研究生', '3', 'PHP', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('146', '20~25', '170~175', '汉族', '博士研究生', '3', 'PHP', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('147', '20~25', '170~175', '汉族', '博士研究生', '3', 'PHP', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('148', '20~25', '170~175', '汉族', '博士研究生', '3', 'PHP', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('149', '20~25', '170~175', '汉族', '博士研究生', '3', '传媒', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('150', '20~25', '170~175', '汉族', '博士研究生', '3', '传媒', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('151', '20~25', '170~175', '汉族', '博士研究生', '3', '设计', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('152', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('153', '20~25', '170~175', '汉族', '中专/高中', '3', '无', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('154', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('155', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('156', '20~25', '170~175', '汉族', '博士研究生', '3', '设计', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('157', '20~25', '170~175', '汉族', '博士研究生', '3', '设计', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('158', '20~25', '170~175', '汉族', '博士研究生', '3', '设计', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('159', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('160', '20~25', '170~175', '汉族', '博士研究生', '3', '11', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('161', '20~25', '170~175', '汉族', '博士研究生', '3', '国家干部', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('162', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('163', '', '', '', '', '0', '', '', '0', '0');
INSERT INTO `pahl_chouser` VALUES ('164', '20~25', '170~175', '汉族', '博士研究生', '3', '卫生', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('165', '', '', '', '', '0', '', '', '0', '0');
INSERT INTO `pahl_chouser` VALUES ('166', '20~25', '170~175', '汉族', '专科', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('167', '20~25', '170~175', '汉族', '博士研究生', '3', 'ti', '20000以上', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('168', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('1', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('6', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('7', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('8', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('9', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');
INSERT INTO `pahl_chouser` VALUES ('10', '20~25', '170~175', '汉族', '博士研究生', '3', '', '5000以下', '3', '3');

-- ----------------------------
-- Table structure for pahl_lovetype
-- ----------------------------
DROP TABLE IF EXISTS `pahl_lovetype`;
CREATE TABLE `pahl_lovetype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL COMMENT '偏爱分类名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of pahl_lovetype
-- ----------------------------
INSERT INTO `pahl_lovetype` VALUES ('1', '优质推荐');
INSERT INTO `pahl_lovetype` VALUES ('2', '优质VCR');
INSERT INTO `pahl_lovetype` VALUES ('3', '婚恋家庭教育');
INSERT INTO `pahl_lovetype` VALUES ('4', '同城佳丽');
INSERT INTO `pahl_lovetype` VALUES ('7', '节目视频');
INSERT INTO `pahl_lovetype` VALUES ('8', '活动派对');
INSERT INTO `pahl_lovetype` VALUES ('9', '成功案例');

-- ----------------------------
-- Table structure for pahl_n
-- ----------------------------
DROP TABLE IF EXISTS `pahl_n`;
CREATE TABLE `pahl_n` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cons` varchar(255) CHARACTER SET utf8 NOT NULL,
  `intro` text CHARACTER SET utf8 NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `addtime` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`nid`),
  KEY `nid` (`nid`),
  KEY `nid_2` (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of pahl_n
-- ----------------------------
INSERT INTO `pahl_n` VALUES ('1', '1223', '2323', '&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;h1 style=&quot;text-indent:76.65pt;&quot;&gt;\r\n	贵州君勇梦文化传播有限公司\r\n&lt;/h1&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	&lt;span&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;企业文化版\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	（1）企业名称\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	企业全名——贵州君勇梦文化传播有限公司\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	连锁店名称——JYM偏爱\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	（2）企业商标\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	公司将以“JYM偏爱”作为注册商标。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	①企业标志\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	商标说明：\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	“商标图案：一个圈代表（圆满）里面有个M有两个意思。一·分解看是JYM就是公司的名字君勇梦。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	②企业形象标识\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	形象说明：\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	本标识以相M就是（梦）缘满梦。皇冠代表忠诚，高尚，高质，有梦，有爱，有心，浪漫、幸福。不需要没有质量的爱，我就去寻找自己偏爱。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	企业文化：\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp;君勇梦\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	追源知人出阁楼，深爱苦甜皆拥有。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	星月作证守承诺，梦里骏马追君勇。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;margin-left:17.95pt;text-indent:396.0pt;&quot;&gt;\r\n	&amp;nbsp;企业文化是企业的灵魂，是企业的形象。是以企业全体成员共同价值为基础\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	的思想观念和行为观念的总和，是全体成员认可和遵循的基本原则，带有本企业不可移植的思想意识、理想信念、行为准则和经营作风，其中包括制度文化、营销文化、人才文化、团队文化等。我们将把文化作为推动JYM偏爱婚恋进步的动力。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:24.0pt;&quot;&gt;\r\n	所以我们把婚恋教育分成几大板块。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:24.0pt;&quot;&gt;\r\n	1如何告别单身&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;2.如何使用恋爱技巧。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:24.0pt;&quot;&gt;\r\n	3.如何解决情侣之间的矛盾&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;4.如何挽回破裂的爱情\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:24.0pt;&quot;&gt;\r\n	5.婚后家庭保鲜之道&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;6.\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:24.0pt;&quot;&gt;\r\n	6.婆媳关系的保持之&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 7.家庭教育重要性。&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:24.0pt;&quot;&gt;\r\n	。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	&lt;span&gt;&amp;nbsp;&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	市场需求的婚恋如何年轻化。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 现在随着相亲节目的发展比如：非诚勿扰，和真人秀节目的红火，如奔跑吧兄弟，每个人其实都想上电视节目也想去参加，但因为工作原因和其大多都是明星参加的节目，所以我们在想可不可以草根化呢。而现在的年轻人对婚介都是持怀疑态度，加上自己还年轻，没必要去刻意去找对象，介绍的也很尴尬，见了面也不知道说什么。所以我们把节目和活动搬到客户身边呢？\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:30.0pt;&quot;&gt;\r\n	1我们把节目制作放在星期5或者星期6晚上，在当地的酒店会议室里能够容纳100多的人参加相亲节目。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:30.0pt;&quot;&gt;\r\n	2我们把旅游和相亲结合，我们会在全州或者全省包括全国国外举行相亲旅游活动，我们会在旅游过程中设计游戏环节，让大家参加自己的奔跑吧爱情在旅游中相识，相知，甚至相恋。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:30.0pt;&quot;&gt;\r\n	3.现在年轻人喜欢高尚的生活，我们把派对放在星期2，如红酒派对，风情派对，上流派对，等。地点可以是花园，可以是酒店，让单身的年轻人在此展示自己，寻找自己的偏爱。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:30.0pt;&quot;&gt;\r\n	这样的形式和模式会比较让年轻人接受，现在的年轻人不是酒吧，就是KTV花了钱不说还真的找不到自己喜欢的，我们把兴趣爱好作为匹配，让大家在节目里活动里相识相知相恋，打破了传统的一对一介绍，也把传统婚介革命一次，这就是偏爱婚恋想达到的目的。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:30.0pt;&quot;&gt;\r\n	&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot;&gt;\r\n	市场需求的婚恋教育\r\n&lt;/p&gt;\r\n&lt;p class=&quot;MsoNormal&quot; style=&quot;text-indent:24.0pt;&quot;&gt;\r\n	婚恋既需要感性，又需要理性，更需要智慧。婚恋教育已经成为了中国教育的严重缺失、中国家庭的迫切、和谐社会的大势所趋。如何破解婚恋问题这一全社会的热点问题、也是难点问题，推几档相亲节目、办几个相亲网站、做几次万人相亲会，当然有作用，但非决定性作用。婚恋问题的根本解决之道还是要以教育为切入点，帮助青年朋友优化婚恋观和价值观、扩大交际圈、增强爱的能力。有人或许在质疑：“谈恋爱、过日子、爱来爱去，这不是人人都会吗？还需要专门请人来教吗?”其实，如果弄清楚了“爱”的概念，他可能就会收回质疑了。而战术上的爱，是需要后天的学习与成长来完善的。比如如何优化婚恋观、如何巧妙地表达爱、如何用心地经营爱、如何幸福地保养爱、如何得体地拒绝爱、如何预防与化解爱的危机等等等等，无师不通，的确需要教育的帮助提升自我能力。爱的学问、婚恋的教育，其意义之重、其范围之广、其层次之深，其实，在国外，“爱情课进教室”已经是非常普遍。孔子先生说：“有教无类”。原意是无论何种类别的人，都有受教育的权利和必要。我想把“有教无类”这一观点拓展一下：只要是对人的成长与发展有益的教育内容，无论何种类别，都要去组织、去接受。很显然，婚恋教育属于其中之一。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;', '1', '');
INSERT INTO `pahl_n` VALUES ('2', '', '', '&lt;ul class=&quot;share&quot;&gt;\r\n	&lt;li&gt;\r\n		&lt;div class=&quot;title&quot;&gt;\r\n			&lt;div class=&quot;safty&quot;&gt;\r\n				&lt;div class=&quot;list-main1-rcon&quot;&gt;\r\n					&lt;ul&gt;\r\n						&lt;li&gt;\r\n							&lt;h1&gt;\r\n								【注册会员的基本要求】\r\n							&lt;/h1&gt;\r\n							&lt;p&gt;\r\n								&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;1. 必须以爱情或婚姻为目的；\r\n							&lt;/p&gt;\r\n							&lt;p&gt;\r\n								&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;2. 必须是独身状态（未婚、离异或丧偶）；\r\n							&lt;/p&gt;\r\n							&lt;p&gt;\r\n								&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;3. 必须年满18周岁；\r\n							&lt;/p&gt;\r\n						&lt;/li&gt;\r\n						&lt;li&gt;\r\n							&lt;h1&gt;\r\n								【注册会员资料，必须如实填写自己的资料，不得发布虚假信息】\r\n							&lt;/h1&gt;\r\n							&lt;p&gt;\r\n								用户的帐号、密码和安全性您一旦注册成功成为用户，您将有一个属于自己帐号和密码。如果您未保管好自己的帐号和密\r\n码而对您造成的损失，偏爱婚恋网概不承担责任。另外，每个用户都要对其帐户中的所有活动和事件负全责。您可随时改变您的密码，也可以结束旧的帐户重开一个\r\n新帐户，但不允许同时注册两个帐户。\r\n							&lt;/p&gt;\r\n							&lt;p&gt;\r\n								会员必须遵守中华人民共和国法律法规和社会公德，不得在偏爱婚恋网散布违背政策法令或有违社会公德的信息内容。 \r\n禁止在网站内公布或传送任何诽谤、侮辱、不雅的信息内容，包括脏话和色情文字（包括照片）。 \r\n禁止蓄意骚扰、诽谤、污辱、非法威胁、或恐吓其他会员，尤其是那些已对您明确表明不希望再继续跟您联系的会员。 \r\n严禁通过偏爱婚恋网利用各种方式进行各类钱财诈骗活动，一经发现，偏爱婚恋网将通报公安机关。\r\n							&lt;/p&gt;\r\n							&lt;p&gt;\r\n								会员向偏爱婚恋网提供的本人的真实身份证明材料(包括照片)，无论是原件、复印件还是电子格式的文件，必须是真实有效的，不得伪造、涂改或使用假冒材料。\r\n							&lt;/p&gt;\r\n							&lt;p&gt;\r\n								会员不得在偏爱婚恋网上发送或发布未经许可的广告或推销信息内容，不得发布与会员本人征婚目的无关的信息内容。 会员不得私下组织各类会员聚会活动，不能私设QQ群。\r\n							&lt;/p&gt;\r\n						&lt;/li&gt;\r\n					&lt;/ul&gt;\r\n				&lt;/div&gt;\r\n			&lt;/div&gt;\r\n		&lt;/div&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;div class=&quot;title&quot;&gt;\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;share-text&quot;&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;', '2', '');
INSERT INTO `pahl_n` VALUES ('3', '', '', '<ul class=\"share\">\n	<li>\n		<div class=\"title\">\n			【我喜欢面对面的交友，为什我要选择到互联网上寻找爱情呢？】\n		</div>\n		<div class=\"share-text\">\n			<p>\n				越来越多的成功恋爱关系向我们揭示，只有通过更多的选择途径我们才能认识更多的人，而众所周知的是，我们只能从我们认识的人中\n选择我们的终身伴侣！许多选择偏爱婚恋的会员发现：互联网最伟大之处就是让我们从工作场所、住所等狭窄的空间中跳了出来，可以通过网络了解到传统生活中永\n远都不会认识到的人。 \n也有许多偏爱婚恋的会员选择网络交友代替了在酒吧、娱乐场所里结识新朋友的方式，因为，只用花几分钟的时间注册成为我们的会员会员，就可以轻松从数十万会\n员中找到与你志趣相投的她/他，这是互联网时代最高效最经济的交友新潮流了。 \n如果你不想再有父母要求下相亲尴尬，不想再有被追问是否找到对象的无奈，也不想再见到在酒吧里与人争强的场面，为什么不为自己准备多一条偶遇爱情的途径\n呢，随着互联网的普及和电子生活方式的发展，偏爱婚恋的网络交友服务已经成为越来越重要的择偶途径了，今天就为自己创建一份互联网交友档案吧，这是完全免\n费的！\n			</p>\n		</div>\n	</li>\n	<li>\n		<div class=\"title\">\n			【网络交友真的有效吗？】\n		</div>\n		<div class=\"share-text\">\n			<p>\n				有效性是用事实和数据来说话的。这个问题应该问一下那些相信我们选择我们的老会员们，2年来已有近万会员在偏爱婚恋发现了爱\n情，我们推出了其中一些终成眷属的案例，他们用自己在偏爱婚恋的亲身故事来回答了您刚才的问题。现在就开始您的网络情缘吗？点击这里，给自己建立一份免费\n交友档案吧。\n			</p>\n		</div>\n	</li>\n	<li>\n		<div class=\"title\">\n			【我喜欢面对面的交友，为什我要选择到互联网上寻找爱情呢？】\n		</div>\n		<div class=\"share-text\">\n			<p>\n				越来越多的成功恋爱关系向我们揭示，只有通过更多的选择途径我们才能认识更多的人，而众所周知的是，我们只能从我们认识的人中\n选择我们的终身伴侣！许多选择偏爱婚恋的会员发现：互联网最伟大之处就是让我们从工作场所、住所等狭窄的空间中跳了出来，可以通过网络了解到传统生活中永\n远都不会认识到的人。 \n也有许多偏爱婚恋的会员选择网络交友代替了在酒吧、娱乐场所里结识新朋友的方式，因为，只用花几分钟的时间注册成为我们的会员会员，就可以轻松从数十万会\n员中找到与你志趣相投的她/他，这是互联网时代最高效最经济的交友新潮流了。 \n如果你不想再有父母要求下相亲尴尬，不想再有被追问是否找到对象的无奈，也不想再见到在酒吧里与人争强的场面，为什么不为自己准备多一条偶遇爱情的途径\n呢，随着互联网的普及和电子生活方式的发展，偏爱婚恋的网络交友服务已经成为越来越重要的择偶途径了，今天就为自己创建一份互联网交友档案吧，这是完全免\n费的！\n			</p>\n		</div>\n	</li>\n	<li>\n		<div class=\"title\">\n			【网络交友真的有效吗？】\n		</div>\n		<div class=\"share-text\">\n			<p>\n				有效性是用事实和数据来说话的。这个问题应该问一下那些相信我们选择我们的老会员们，2年来已有近万会员在偏爱婚恋发现了爱\n情，我们推出了其中一些终成眷属的案例，他们用自己在偏爱婚恋的亲身故事来回答了您刚才的问题。现在就开始您的网络情缘吗？点击这里，给自己建立一份免费\n交友档案吧。\n			</p>\n		</div>\n	</li>\n</ul>', '', '');
INSERT INTO `pahl_n` VALUES ('4', '', '', '&lt;div class=&quot;safty&quot;&gt;\r\n	&lt;div class=&quot;list-main1-rcon&quot;&gt;\r\n		&lt;ul&gt;\r\n			&lt;li&gt;\r\n				&lt;h1&gt;\r\n					【增强隐私信息的保护意识】\r\n				&lt;/h1&gt;\r\n				&lt;p&gt;\r\n					填写注册信息时，您所注册的个人隐私信息，是受到中国红娘信息保护的，我们绝不会公开您的个人隐私，例如手机\r\n号码、家庭地址、工作单位等。为了安全考虑，您在交友过程中必须要增强隐私信息的保护意识，不要随意泄漏您的任何真实的隐私信息，以免给您的生活和工作带\r\n来不愉快。 　　\r\n真实姓名、住宅电话、手机号码、办公电话、家庭住址、公司名称，银行卡号等，这些信息都是可能让他人直接找到您或能对您的生活造成影响的。在充分了解和信\r\n任对方之前，请您务必要加强警惕性。\r\n				&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				&lt;h1&gt;\r\n					【戒备多次索要您的私密信息的人】\r\n				&lt;/h1&gt;\r\n				&lt;p&gt;\r\n					若有人三番五次索要您的私人通信方式，一味打听您的住址或单位，请您一定要保持冷静。切勿一时忘情就全盘托出。要理性分析，慎重对待，分情况对待。\r\n				&lt;/p&gt;\r\n			&lt;/li&gt;\r\n			&lt;li&gt;\r\n				&lt;h1&gt;\r\n					【与人约见要谨慎】\r\n				&lt;/h1&gt;\r\n				&lt;p&gt;\r\n					通过一定时间的交流，会员与会员之间就会发出约见的信号。尽管中国红娘网站一再声明会员要遵守严肃交友的原则，不要蓄意欺骗，伤害他人，但我们仍然有义务提醒您，不要轻易接受会员的约会，除非您与对方已经有了相当长时间的认识和交流，并且对其情况有了一定的信任感。\r\n				&lt;/p&gt;\r\n				&lt;p&gt;\r\n					对于那些对约会有充分信心，想与对方做进一步了解或发展的会员，我们还是得提醒约会四点：\r\n				&lt;/p&gt;\r\n				&lt;p&gt;\r\n					1. 约会之前尽量多沟通，多交流，并且选择自己熟悉的约会地点和合适的约会时间。我们建议您选择公共场所约会，并提前告知自己的朋友和家人自己的去向；\r\n				&lt;/p&gt;\r\n				&lt;p&gt;\r\n					2. 把握好约会时间，不深夜赴约，坚持自己回家；\r\n				&lt;/p&gt;\r\n				&lt;p&gt;\r\n					3. 约会时候察言观色。一个人的品行修养往往会通过他的神态和动作表露出来。大部分情况下，一个初中毕业的人，是不会有本科生的气质和学识的。\r\n				&lt;/p&gt;\r\n				&lt;p&gt;\r\n					4. 在与人面对面交流中，也请保护好手机号码和随身财物，不要被对方知道号码或欺骗性借用；看管好身份证；不要在言谈话语中随意说出自己的电话号码、真实住址、公司等信息。\r\n				&lt;/p&gt;\r\n			&lt;/li&gt;\r\n		&lt;/ul&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;', '', '');

-- ----------------------------
-- Table structure for pahl_news
-- ----------------------------
DROP TABLE IF EXISTS `pahl_news`;
CREATE TABLE `pahl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `addTime` int(11) NOT NULL,
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `cons` varchar(255) DEFAULT NULL COMMENT '介简',
  `intro` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `thumb` varchar(50) NOT NULL,
  `is_push` tinyint(3) NOT NULL,
  `upTime` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `sequence` int(255) DEFAULT '0',
  `clickCount` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pahl_news
-- ----------------------------
INSERT INTO `pahl_news` VALUES ('17', 'xxx', '0', '', '2112', '21', '1', '589a8b1628cdd.jpg', '0', '1503552989', '', '1', '0');
INSERT INTO `pahl_news` VALUES ('18', '122312', '0', '2122121', '1221', '1212', '1', '589a8bf4c9fbc.jpg', '0', '1486523380', '', '212121', '0');
INSERT INTO `pahl_news` VALUES ('19', '1544', '0', '854', '的人生股份的是非得失', '对方是个好哥哥和空间合理规划', '1', '58abb31134123.png', '0', '1487647505', '', '5456', '0');
INSERT INTO `pahl_news` VALUES ('20', '111', '0', '', '1111', '快接啊各大水库和噶客户实际发生', '0', '599e7bfdb2898.jpg', '0', '1503558653', '', '6', '0');
INSERT INTO `pahl_news` VALUES ('21', '42', '0', '123', '123', '12312321', '2', '599e63e97b90f.png', '0', '1503552489', '', '7', '0');
INSERT INTO `pahl_news` VALUES ('22', '1', '0', '1111', '1111', '1', '1', '599e6423193fe.png', '0', '1503552547', '', '1', '0');
INSERT INTO `pahl_news` VALUES ('27', '2335', '0', '123', '45', '457457', '3', '', '0', '1503552688', '', '66', '0');
INSERT INTO `pahl_news` VALUES ('28', '67', '0', '9870', '34', '76', '6', '599e64c4aef79.png', '0', '1503552708', '', '769', '0');
INSERT INTO `pahl_news` VALUES ('29', '爱在旅途1', '0', '', '123456789', '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '1', '59a3b3c7cdbb3.jpg', '0', '1503901554', '', '95', '0');

-- ----------------------------
-- Table structure for pahl_user
-- ----------------------------
DROP TABLE IF EXISTS `pahl_user`;
CREATE TABLE `pahl_user` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '登录名',
  `name` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `nickname` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '昵称',
  `password` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `addtime` int(11) NOT NULL COMMENT '注册时间',
  `addip` varchar(20) COLLATE utf8_bin NOT NULL,
  `logintime` int(11) NOT NULL,
  `loginip` varchar(20) COLLATE utf8_bin NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:男，2：女',
  `age` varchar(15) COLLATE utf8_bin NOT NULL COMMENT '年龄',
  `year` smallint(4) NOT NULL COMMENT '年',
  `month` tinyint(2) NOT NULL COMMENT '月',
  `height` varchar(15) COLLATE utf8_bin NOT NULL COMMENT '身高',
  `weight` varchar(15) COLLATE utf8_bin NOT NULL COMMENT '体重',
  `blood` varchar(4) COLLATE utf8_bin NOT NULL COMMENT '血型',
  `ani` varchar(3) COLLATE utf8_bin NOT NULL COMMENT '生肖',
  `const` varchar(5) COLLATE utf8_bin NOT NULL COMMENT '星座',
  `nation` varchar(5) COLLATE utf8_bin NOT NULL COMMENT '民族',
  `child` tinyint(2) NOT NULL COMMENT '3：无，1：有不同主；2：有同住',
  `qualification` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '学历',
  `housing` tinyint(2) NOT NULL DEFAULT '0' COMMENT '3：无房；1：有房有贷，2：无房无贷',
  `monthly` varchar(15) COLLATE utf8_bin NOT NULL COMMENT '月薪',
  `work` varchar(15) COLLATE utf8_bin NOT NULL COMMENT '从事工作',
  `workad` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '工作地点',
  `marriage` tinyint(2) NOT NULL DEFAULT '3' COMMENT '3：未婚，1：离婚，2丧偶',
  `wxnum` varchar(30) COLLATE utf8_bin NOT NULL COMMENT '微信号',
  `qqnum` varchar(15) COLLATE utf8_bin NOT NULL COMMENT 'qq号',
  `intro` text COLLATE utf8_bin NOT NULL COMMENT '自我介绍',
  `photo` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '照片',
  `isrecom` int(2) DEFAULT '0',
  `likeme` varchar(255) CHARACTER SET utf8 NOT NULL,
  `smoking` varchar(10) CHARACTER SET utf8 NOT NULL,
  `drinking` varchar(10) CHARACTER SET utf8 NOT NULL,
  `car` varchar(10) CHARACTER SET utf8 NOT NULL,
  `consumption` varchar(255) CHARACTER SET utf8 NOT NULL,
  `shopping` varchar(255) CHARACTER SET utf8 NOT NULL,
  `beliefs` varchar(255) CHARACTER SET utf8 NOT NULL,
  `livingwithparents` varchar(10) CHARACTER SET utf8 NOT NULL,
  `housework` varchar(255) CHARACTER SET utf8 NOT NULL,
  `getchild` varchar(20) CHARACTER SET utf8 NOT NULL,
  `whenmarried` varchar(20) CHARACTER SET utf8 NOT NULL,
  `wishlivewithparents` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ranking` varchar(10) CHARACTER SET utf8 NOT NULL,
  `parents` varchar(100) CHARACTER SET utf8 NOT NULL,
  `parentshealth` varchar(20) CHARACTER SET utf8 NOT NULL,
  `brothersandsisters` varchar(100) CHARACTER SET utf8 NOT NULL,
  `parentseconomic` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vcrpath` varchar(30) CHARACTER SET utf8 NOT NULL,
  `idcardpic` varchar(255) CHARACTER SET utf8 DEFAULT '0' COMMENT '是否是会员',
  `ismember` int(2) NOT NULL,
  `pic` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sex` (`sex`,`age`,`height`,`weight`),
  KEY `child` (`child`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of pahl_user
-- ----------------------------
INSERT INTO `pahl_user` VALUES ('1', '111', '', 'hahaha', '111', '1503559273', '', '1503904376', '0', '2', '20~25', '1996', '4', '170~175', '0', '保密11', '保密', '保密   ', '汉族', '0', '', '2', '', '', '', '3', '', '', 0x090909313131, ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/59a3d6b0c8e39.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/59a3d6b0cb161.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/59a3d6b0cdc5a.jpg', '1', ',1,10', '', '  11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '599e8b232afc2.jpg');
INSERT INTO `pahl_user` VALUES ('2', '111', '', '', '111', '1503559273', '', '1503559449', '0', '2', '20~25', '0', '0', '170~175', '0', '保密11', '保密', '保密', '汉族', '0', '博士研究生', '2', '5000以下', '', '', '3', '', '', 0x090909313131, ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/Hydrangeas.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072058_53492.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072106_28646.jpg', '1', ',10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '599e8b232afc2.jpg');
INSERT INTO `pahl_user` VALUES ('3', '111', '', '', '111', '1503559273', '', '1503559449', '0', '2', '20~25', '0', '0', '170~175', '0', '保密11', '保密', '保密', '汉族', '0', '博士研究生', '2', '5000以下', '', '', '3', '', '', 0x090909313131, ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/Hydrangeas.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072058_53492.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072106_28646.jpg', '1', ',1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '599e8b232afc2.jpg');
INSERT INTO `pahl_user` VALUES ('4', '111', '', '', '111', '1503559273', '', '1503559449', '0', '2', '20~25', '0', '0', '170~175', '0', '保密11', '保密', '保密', '汉族', '0', '博士研究生', '2', '5000以下', '', '', '3', '', '', 0x090909313131, ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/Hydrangeas.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072058_53492.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072106_28646.jpg', '1', ',1,10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '599e8b232afc2.jpg');
INSERT INTO `pahl_user` VALUES ('5', '111', '', '', '111', '1503559273', '', '1503559449', '0', '2', '20~25', '0', '0', '170~175', '0', '保密11', '保密', '保密', '汉族', '0', '博士研究生', '2', '5000以下', '', '', '3', '', '', 0x090909313131, ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/Hydrangeas.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072058_53492.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072106_28646.jpg', '1', ',1,10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '599e8b232afc2.jpg');
INSERT INTO `pahl_user` VALUES ('6', 'admin', '', '', '123', '1503884103', '', '1503911666', '0', '1', '20~25', '1980', '1', '170~175', '0', '保密', '保密', '保密', '汉族', '0', '', '2', '', '', '', '3', '', '', 0x090909, ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/59a3df071ebdc.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/59a3df0720f04.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/59a3df0723615.jpg', '0', '', '', '111', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '');
INSERT INTO `pahl_user` VALUES ('8', '33333', '', '', '321', '1503903012', '', '1503903091', '0', '2', '20~25', '0', '0', '170~175', '0', '保密', '保密', '保密', '汉族', '0', '博士研究生', '2', '5000以下', '', '', '3', '', '', 0x090909, ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170828/20170828065008_74970.jpg', '1', ',10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '');
INSERT INTO `pahl_user` VALUES ('9', '123123123', '', '', '123', '1503910733', '', '1503910757', '0', '2', '20~25', '0', '0', '170~175', '0', '保密', '保密', '保密', '汉族', '0', '博士研究生', '2', '5000以下', '', '', '3', '', '', '', ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170828/20170828085847_37638.jpg', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '');
INSERT INTO `pahl_user` VALUES ('10', '11123', '', '', '123', '1503911733', '', '1503990665', '0', '2', '20~25', '0', '0', '170~175', '', '保密', '保密', '保密', '汉族', '0', '博士研究生', '2', '5000以下', '', '', '1', '', '', 0x090909, ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/59a3e4fae6bb1.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/59a3e4fae96aa.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/59a3e4faeb9d3.jpg', '0', '', '111', '2', '333', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '');

-- ----------------------------
-- Table structure for pahl_userpd
-- ----------------------------
DROP TABLE IF EXISTS `pahl_userpd`;
CREATE TABLE `pahl_userpd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1name` varchar(30) DEFAULT NULL,
  `user1id` int(11) DEFAULT NULL,
  `user2name` varchar(30) DEFAULT NULL,
  `user2id` int(11) DEFAULT NULL,
  `lovem` varchar(30) DEFAULT NULL,
  `lovemid` int(11) DEFAULT NULL,
  `love` text,
  `userpdn` varchar(40) DEFAULT NULL,
  `userpdy` varchar(40) DEFAULT NULL,
  `userpdr` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user1id` (`user1id`),
  KEY `lovemid` (`lovemid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of pahl_userpd
-- ----------------------------
INSERT INTO `pahl_userpd` VALUES ('1', '柜台', '2', '7385', '5', '453', '453', '543', null, null, null);
INSERT INTO `pahl_userpd` VALUES ('2', '345', '543', '453', '453', '453', '453', '453', null, null, null);
INSERT INTO `pahl_userpd` VALUES ('3', '345', '453', '453', '453', '45358', '453', '453', '2018年', '1月', '1日');
INSERT INTO `pahl_userpd` VALUES ('4', '今天又', '85', '87', '786', '876', '876', '876', '2017年', '1月', '1日');
INSERT INTO `pahl_userpd` VALUES ('5', 'afdasf', '0', 'asfasfd', '0', 'adfasdf', '0', 'dfgdsgfgsdfg', '2018年', '1月', '1日');

-- ----------------------------
-- Table structure for pahl_video
-- ----------------------------
DROP TABLE IF EXISTS `pahl_video`;
CREATE TABLE `pahl_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ltid` mediumint(3) unsigned NOT NULL COMMENT '恋爱分类id',
  `video` text NOT NULL COMMENT '视频',
  PRIMARY KEY (`id`),
  KEY `ltid` (`ltid`),
  KEY `ltid_2` (`ltid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of pahl_video
-- ----------------------------
INSERT INTO `pahl_video` VALUES ('9', '2', '/pahl/Public/Admin/kindeditor-4.1.10/attached/media/20170206/20170206171316_51330.rm,/pahl/Public/Admin/kindeditor-4.1.10/attached/media/20170206/20170206171319_37688.rm');
INSERT INTO `pahl_video` VALUES ('10', '3', '/pahl/Public/Admin/kindeditor-4.1.10/attached/media/20170206/20170206171506_11774.rm');
INSERT INTO `pahl_video` VALUES ('11', '1', '/pahl/Public/Admin/kindeditor-4.1.10/attached/media/20170206/20170206172948_10131.avi');
INSERT INTO `pahl_video` VALUES ('12', '1', '/pahl/Public/Admin/kindeditor-4.1.10/attached/media/20170206/20170206173158_80172.avi');
INSERT INTO `pahl_video` VALUES ('13', '1', '/pahl/Public/Admin/kindeditor-4.1.10/attached/media/20170206/20170206173419_91123.avi,/pahl/Public/Admin/kindeditor-4.1.10/attached/media/20170206/20170206173431_58023.avi');
