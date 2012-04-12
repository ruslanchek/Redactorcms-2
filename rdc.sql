/*
Navicat MySQL Data Transfer

Source Server         : loc
Source Server Version : 50140
Source Host           : localhost:3306
Source Database       : rdc

Target Server Type    : MYSQL
Target Server Version : 50140
File Encoding         : 65001

Date: 2012-04-12 18:40:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `datasets`
-- ----------------------------
DROP TABLE IF EXISTS `datasets`;
CREATE TABLE `datasets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(10) unsigned NOT NULL,
  `type` tinytext NOT NULL,
  `label` tinytext,
  `default` text,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `unique` tinyint(1) NOT NULL,
  `options_source` tinyint(4) NOT NULL DEFAULT '0',
  `options_custom` text,
  `options_table` text,
  `use_editor` tinyint(1) DEFAULT NULL,
  `description` text,
  `sort` int(11) NOT NULL DEFAULT '0',
  `embed` tinyint(1) NOT NULL DEFAULT '0',
  `embed_name` tinytext,
  `list` tinyint(1) NOT NULL DEFAULT '0',
  `email` tinyint(1) DEFAULT '0',
  `rows` tinyint(2) DEFAULT '3',
  `randomize` tinyint(1) DEFAULT '0',
  `number` tinyint(1) DEFAULT '0',
  `multiple` tinyint(1) DEFAULT '0',
  `extensions` text,
  `thumbs` text,
  `folder` tinytext,
  `prefix` tinytext,
  `suffix` tinytext,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `mode` tinyint(1) NOT NULL DEFAULT '1',
  `interval` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of datasets
-- ----------------------------
INSERT INTO `datasets` VALUES ('7', '3', 'checkbox', 'Публиковать', '0', '0', '0', '0', '', '', '0', 'Публиковать элемент', '1', '1', 'publish', '1', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('8', '3', 'separator', 'Разделитель', '', '0', '0', '0', '', '', '0', '', '3', '1', 'main', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('9', '3', 'text', 'Название', '', '1', '0', '0', '', '', '0', 'Название элемента', '2', '1', 'name', '1', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('33', '3', 'textarea', 'Текст', '', '0', '0', '0', '', '', '1', '', '4', '0', null, '0', '0', '19', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('29', '6', 'text', 'Название', '', '1', '0', '0', '', '', '0', 'Название элемента', '2', '1', 'name', '1', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('28', '6', 'separator', 'Разделитель', '', '0', '0', '0', '', '', '0', '', '5', '1', 'main', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('27', '6', 'checkbox', 'Публиковать', '0', '0', '0', '0', '', '', '0', 'Публиковать элемент', '1', '1', 'publish', '1', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('32', '6', 'calendar', 'Дата и время', '', '0', '0', '0', '', '', '0', '', '4', '0', null, '1', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('31', '6', 'textarea', 'Текст', '', '0', '0', '0', '', '', '1', '', '7', '0', null, '0', '0', '14', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('30', '6', 'textarea', 'Анонс', '', '0', '0', '0', '', '', '1', '', '6', '0', null, '0', '0', '5', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('78', '6', 'image', 'Большая картинка', '', '0', '0', '0', '', '', '0', '', '3', '0', null, '1', '0', '0', '0', '0', '0', '', '810,1000,810x1000,2', 'news_giant_pics', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('109', '16', 'text', 'Название', '', '1', '0', '0', '', '', '0', 'Название элемента', '2', '1', 'name', '1', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('110', '16', 'separator', 'Разделитель', '', '0', '0', '0', '', '', '0', '', '4', '0', null, '0', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('111', '16', 'textarea', 'Код ролика', '', '0', '0', '0', '', '', '0', '', '5', '0', null, '0', '0', '3', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('112', '16', 'textarea', 'Анонс', '', '0', '0', '0', '', '', '1', '', '7', '0', null, '0', '0', '9', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('113', '16', 'textarea', 'Описание', '', '0', '0', '0', '', '', '1', '', '8', '0', null, '0', '0', '14', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('114', '16', 'image', 'Картинка', '', '0', '0', '0', '', '', '0', '', '3', '0', null, '1', '0', '0', '0', '0', '0', '', '260,180,260x180,2', 'videos', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('107', '16', 'checkbox', 'Публиковать', '0', '0', '0', '0', '', '', '0', 'Публиковать элемент', '1', '1', 'publish', '1', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');
INSERT INTO `datasets` VALUES ('108', '16', 'separator', 'Разделитель', '', '0', '0', '0', '', '', '0', '', '6', '1', 'main', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `extension` tinytext,
  `path` tinytext,
  `type` tinyint(1) DEFAULT '0',
  `relative_id` int(11) DEFAULT NULL,
  `form_item` tinytext,
  `date` datetime DEFAULT NULL,
  `size` int(50) DEFAULT '0',
  `metaname` tinytext,
  `metadesc` text,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `relative_table` tinytext,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=297 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('184', 'koala', 'jpg', '/data/images/section_9/3/albums_covers/', '0', '3', 'col_46', '2012-03-19 20:54:53', '780831', null, null, '1024', '768', 'section_9', '184');
INSERT INTO `images` VALUES ('185', 'hydrangeas', 'jpg', '/data/images/section_9/3/photos/', '1', '3', 'col_47', '2012-03-19 20:54:57', '595284', null, null, '1024', '768', 'section_9', '185');
INSERT INTO `images` VALUES ('186', 'koala', 'jpg', '/data/images/section_9/3/photos/', '1', '3', 'col_47', '2012-03-19 20:54:58', '780831', null, null, '1024', '768', 'section_9', '186');
INSERT INTO `images` VALUES ('188', 'jellyfish_6928', 'jpg', '/data/images/section_9/3/photos/', '1', '3', 'col_47', '2012-03-19 20:55:00', '775702', null, null, '1024', '768', 'section_9', '188');
INSERT INTO `images` VALUES ('189', 'penguins_9242', 'jpg', '/data/images/section_9/3/photos/', '1', '3', 'col_47', '2012-03-19 20:55:01', '777835', null, null, '1024', '768', 'section_9', '189');
INSERT INTO `images` VALUES ('190', 'desert_2645', 'jpg', '/data/images/section_9/3/photos/', '1', '3', 'col_47', '2012-03-19 20:55:02', '845941', null, null, '1024', '768', 'section_9', '190');
INSERT INTO `images` VALUES ('191', 'tulips', 'jpg', '/data/images/section_9/3/photos/', '1', '3', 'col_47', '2012-03-19 20:55:03', '620888', null, null, '1024', '768', 'section_9', '191');
INSERT INTO `images` VALUES ('228', 'koala_43', 'jpg', '/data/images/section_10/1/projects/', '1', '1', 'col_59', '2012-03-20 00:06:30', '780831', null, null, '1024', '768', 'section_10', '228');
INSERT INTO `images` VALUES ('227', 'lighthouse', 'jpg', '/data/images/section_10/1/projects/', '1', '1', 'col_59', '2012-03-20 00:06:29', '561276', null, null, '1024', '768', 'section_10', '227');
INSERT INTO `images` VALUES ('193', 'penguins', 'jpg', '/data/images/section_9/4/albums_covers/', '0', '4', 'col_46', '2012-03-19 20:55:15', '777835', null, null, '1024', '768', 'section_9', '193');
INSERT INTO `images` VALUES ('194', 'koala_1145', 'jpg', '/data/images/section_9/4/photos/', '1', '4', 'col_47', '2012-03-19 20:55:18', '780831', null, null, '1024', '768', 'section_9', '194');
INSERT INTO `images` VALUES ('195', 'lighthouse_705', 'jpg', '/data/images/section_9/4/photos/', '1', '4', 'col_47', '2012-03-19 20:55:20', '561276', null, null, '1024', '768', 'section_9', '195');
INSERT INTO `images` VALUES ('196', 'jellyfish', 'jpg', '/data/images/section_9/4/photos/', '1', '4', 'col_47', '2012-03-19 20:55:21', '775702', null, null, '1024', '768', 'section_9', '196');
INSERT INTO `images` VALUES ('197', 'penguins', 'jpg', '/data/images/section_9/4/photos/', '1', '4', 'col_47', '2012-03-19 20:55:22', '777835', null, null, '1024', '768', 'section_9', '197');
INSERT INTO `images` VALUES ('198', 'desert', 'jpg', '/data/images/section_9/4/photos/', '1', '4', 'col_47', '2012-03-19 20:55:23', '845941', null, null, '1024', '768', 'section_9', '198');
INSERT INTO `images` VALUES ('199', 'tulips', 'jpg', '/data/images/section_9/4/photos/', '1', '4', 'col_47', '2012-03-19 20:55:24', '620888', null, null, '1024', '768', 'section_9', '199');
INSERT INTO `images` VALUES ('200', 'chrysanthemum', 'jpg', '/data/images/section_9/4/photos/', '1', '4', 'col_47', '2012-03-19 20:55:26', '879394', null, null, '1024', '768', 'section_9', '200');
INSERT INTO `images` VALUES ('201', 'lighthouse_4340', 'jpg', '/data/images/section_9/5/albums_covers/', '0', '5', 'col_46', '2012-03-19 20:55:42', '561276', null, null, '1024', '768', 'section_9', '201');
INSERT INTO `images` VALUES ('202', 'hydrangeas_4416', 'jpg', '/data/images/section_9/5/photos/', '1', '5', 'col_47', '2012-03-19 20:55:46', '595284', null, null, '1024', '768', 'section_9', '202');
INSERT INTO `images` VALUES ('203', 'koala_43', 'jpg', '/data/images/section_9/5/photos/', '1', '5', 'col_47', '2012-03-19 20:55:47', '780831', null, null, '1024', '768', 'section_9', '203');
INSERT INTO `images` VALUES ('204', 'tulips', 'jpg', '/data/images/section_9/6/albums_covers/', '0', '6', 'col_46', '2012-03-19 20:55:53', '620888', null, null, '1024', '768', 'section_9', '204');
INSERT INTO `images` VALUES ('205', 'jellyfish_305', 'jpg', '/data/images/section_9/6/photos/', '1', '6', 'col_47', '2012-03-19 20:55:56', '775702', null, null, '1024', '768', 'section_9', '205');
INSERT INTO `images` VALUES ('225', 'penguins_3240', 'jpg', '/data/images/section_10/1/projects/', '1', '1', 'col_59', '2012-03-20 00:06:28', '777835', null, null, '1024', '768', 'section_10', '225');
INSERT INTO `images` VALUES ('226', 'tulips', 'jpg', '/data/images/section_10/1/projects/', '1', '1', 'col_59', '2012-03-20 00:06:28', '620888', null, null, '1024', '768', 'section_10', '226');
INSERT INTO `images` VALUES ('215', 'penguins', 'jpg', '/data/images/section_10/1/projects/', '0', '1', 'col_58', '2012-03-19 23:56:27', '777835', null, null, '1024', '768', 'section_10', '215');
INSERT INTO `images` VALUES ('216', 'tulips_4880', 'jpg', '/data/images/section_10/2/projects/', '0', '2', 'col_58', '2012-03-19 23:56:38', '620888', null, null, '1024', '768', 'section_10', '216');
INSERT INTO `images` VALUES ('231', 'lighthouse', 'jpg', '/data/images/section_10/2/projects/', '1', '2', 'col_59', '2012-03-20 00:06:48', '561276', null, null, '1024', '768', 'section_10', '231');
INSERT INTO `images` VALUES ('230', 'tulips', 'jpg', '/data/images/section_10/2/projects/', '1', '2', 'col_59', '2012-03-20 00:06:47', '620888', null, null, '1024', '768', 'section_10', '230');
INSERT INTO `images` VALUES ('229', 'penguins', 'jpg', '/data/images/section_10/2/projects/', '1', '2', 'col_59', '2012-03-20 00:06:46', '777835', null, null, '1024', '768', 'section_10', '229');
INSERT INTO `images` VALUES ('232', 'koala_43', 'jpg', '/data/images/section_10/2/projects/', '1', '2', 'col_59', '2012-03-20 00:06:49', '780831', null, null, '1024', '768', 'section_10', '232');
INSERT INTO `images` VALUES ('233', 'penguins', 'jpg', '/data/images/section_10/3/projects/', '0', '3', 'col_58', '2012-03-20 00:10:16', '777835', null, null, '1024', '768', 'section_10', '233');
INSERT INTO `images` VALUES ('234', '55', 'jpg', '/data/images/section_12/1/video_covers/', '0', '1', 'col_77', '2012-03-26 16:17:35', '4936', null, null, '50', '50', 'section_12', '234');
INSERT INTO `images` VALUES ('253', 'man', 'png', '/data/images/section_13/1/projects_covers/', '0', '1', 'col_97', '2012-03-31 13:54:52', '19933', null, null, '150', '150', 'section_13', '253');
INSERT INTO `images` VALUES ('252', 'ill1_4676', 'jpg', '/data/images/section_13/1/projects_covers/', '0', '1', 'col_98', '2012-03-31 13:54:07', '176323', null, null, '830', '285', 'section_13', '252');
INSERT INTO `images` VALUES ('254', 'man', 'png', '/data/images/section_13/2/projects_covers/', '0', '2', 'col_97', '2012-03-31 14:03:39', '19933', null, null, '150', '150', 'section_13', '254');
INSERT INTO `images` VALUES ('255', 'ill1', 'jpg', '/data/images/section_13/2/projects_covers/', '0', '2', 'col_98', '2012-03-31 14:03:42', '176323', null, null, '830', '285', 'section_13', '255');
INSERT INTO `images` VALUES ('256', 'client_logo', 'png', '/data/images/section_13/3/projects_covers/', '0', '3', 'col_97', '2012-03-31 20:13:53', '9282', null, null, '248', '248', 'section_13', '256');
INSERT INTO `images` VALUES ('257', 'ill1', 'jpg', '/data/images/section_13/3/projects_covers/', '0', '3', 'col_98', '2012-03-31 20:13:59', '176323', null, null, '830', '285', 'section_13', '257');
INSERT INTO `images` VALUES ('258', 'man', 'png', '/data/images/section_13/4/projects_covers/', '0', '4', 'col_97', '2012-03-31 20:14:38', '19933', null, null, '150', '150', 'section_13', '258');
INSERT INTO `images` VALUES ('259', 'ill1', 'jpg', '/data/images/section_13/4/projects_covers/', '0', '4', 'col_98', '2012-03-31 20:14:42', '176323', null, null, '830', '285', 'section_13', '259');
INSERT INTO `images` VALUES ('260', 'man', 'png', '/data/images/section_13/5/projects_covers/', '0', '5', 'col_97', '2012-03-31 20:44:19', '19933', null, null, '150', '150', 'section_13', '260');
INSERT INTO `images` VALUES ('261', 'ill1', 'jpg', '/data/images/section_13/5/projects_covers/', '0', '5', 'col_98', '2012-03-31 20:44:21', '176323', null, null, '830', '285', 'section_13', '261');
INSERT INTO `images` VALUES ('262', 'ill1', 'jpg', '/data/images/section_13/6/projects_covers/', '0', '6', 'col_97', '2012-03-31 22:58:21', '176323', null, null, '830', '285', 'section_13', '262');
INSERT INTO `images` VALUES ('263', 'man', 'png', '/data/images/section_13/6/projects_covers/', '0', '6', 'col_98', '2012-03-31 22:58:25', '19933', null, null, '150', '150', 'section_13', '263');
INSERT INTO `images` VALUES ('275', '2_3005', 'jpg', '/data/images/section_13/8/projects_covers/', '0', '8', 'col_98', '2012-04-01 22:41:33', '65387', null, null, '543', '403', 'section_13', '275');
INSERT INTO `images` VALUES ('274', '2', 'jpg', '/data/images/section_13/8/projects_covers/', '0', '8', 'col_97', '2012-04-01 22:41:30', '65387', null, null, '543', '403', 'section_13', '274');
INSERT INTO `images` VALUES ('266', 'man_810x250', 'png', '/data/images/section_13/9/projects_covers/', '0', '9', 'col_97', '2012-04-01 22:18:28', '22737', null, null, '150', '150', 'section_13', '266');
INSERT INTO `images` VALUES ('267', 'ill1', 'jpg', '/data/images/section_13/9/projects_covers/', '0', '9', 'col_98', '2012-04-01 22:18:32', '176323', null, null, '830', '285', 'section_13', '267');
INSERT INTO `images` VALUES ('268', 'man', 'png', '/data/images/section_13/10/projects_covers/', '0', '10', 'col_97', '2012-04-01 22:18:51', '19933', null, null, '150', '150', 'section_13', '268');
INSERT INTO `images` VALUES ('269', 'ill1', 'jpg', '/data/images/section_13/10/projects_covers/', '0', '10', 'col_98', '2012-04-01 22:18:54', '176323', null, null, '830', '285', 'section_13', '269');
INSERT INTO `images` VALUES ('270', 'man_810x250', 'png', '/data/images/section_13/11/projects_covers/', '0', '11', 'col_97', '2012-04-01 22:19:15', '22737', null, null, '150', '150', 'section_13', '270');
INSERT INTO `images` VALUES ('271', 'ill1_250x250', 'jpg', '/data/images/section_13/11/projects_covers/', '0', '11', 'col_98', '2012-04-01 22:19:19', '31972', null, null, '250', '85', 'section_13', '271');
INSERT INTO `images` VALUES ('272', 'man_810x250', 'png', '/data/images/section_13/12/projects_covers/', '0', '12', 'col_97', '2012-04-01 22:19:37', '22737', null, null, '150', '150', 'section_13', '272');
INSERT INTO `images` VALUES ('273', 'man', 'png', '/data/images/section_13/12/projects_covers/', '0', '12', 'col_98', '2012-04-01 22:19:40', '19933', null, null, '150', '150', 'section_13', '273');
INSERT INTO `images` VALUES ('276', 'trilobis_pm1', 'jpg', '/data/images/section_13/13/projects_covers/', '0', '13', 'col_97', '2012-04-01 22:49:34', '48507', null, null, '500', '353', 'section_13', '276');
INSERT INTO `images` VALUES ('277', 'trilobis_pm1_5103', 'jpg', '/data/images/section_13/13/projects_covers/', '0', '13', 'col_98', '2012-04-01 22:49:37', '48507', null, null, '500', '353', 'section_13', '277');
INSERT INTO `images` VALUES ('278', '2', 'jpg', '/data/images/section_13/14/projects_covers/', '0', '14', 'col_97', '2012-04-01 22:50:53', '65387', null, null, '543', '403', 'section_13', '278');
INSERT INTO `images` VALUES ('279', '2_2438', 'jpg', '/data/images/section_13/14/projects_covers/', '0', '14', 'col_98', '2012-04-01 22:50:56', '65387', null, null, '543', '403', 'section_13', '279');
INSERT INTO `images` VALUES ('280', '22', 'jpg', '/data/images/section_13/15/projects_covers/', '0', '15', 'col_97', '2012-04-01 22:51:44', '73323', null, null, '640', '480', 'section_13', '280');
INSERT INTO `images` VALUES ('281', '22_4014', 'jpg', '/data/images/section_13/15/projects_covers/', '0', '15', 'col_98', '2012-04-01 22:51:48', '73323', null, null, '640', '480', 'section_13', '281');
INSERT INTO `images` VALUES ('282', 'venus_project', 'jpg', '/data/images/section_13/16/projects_covers/', '0', '16', 'col_97', '2012-04-01 22:52:22', '103901', null, null, '500', '403', 'section_13', '282');
INSERT INTO `images` VALUES ('283', 'venus_project_1743', 'jpg', '/data/images/section_13/16/projects_covers/', '0', '16', 'col_98', '2012-04-01 22:52:25', '103901', null, null, '500', '403', 'section_13', '283');
INSERT INTO `images` VALUES ('284', '22', 'jpg', '/data/images/section_13/17/projects_covers/', '0', '17', 'col_97', '2012-04-01 22:54:27', '73323', null, null, '640', '480', 'section_13', '284');
INSERT INTO `images` VALUES ('285', '22_3586', 'jpg', '/data/images/section_13/17/projects_covers/', '0', '17', 'col_98', '2012-04-01 22:54:29', '73323', null, null, '640', '480', 'section_13', '285');
INSERT INTO `images` VALUES ('286', '22', 'jpg', '/data/images/section_13/18/projects_covers/', '0', '18', 'col_97', '2012-04-01 23:12:19', '73323', null, null, '640', '480', 'section_13', '286');
INSERT INTO `images` VALUES ('287', '22_9476', 'jpg', '/data/images/section_13/18/projects_covers/', '0', '18', 'col_98', '2012-04-01 23:12:23', '73323', null, null, '640', '480', 'section_13', '287');
INSERT INTO `images` VALUES ('288', 'trilobis_pm1', 'jpg', '/data/images/section_13/19/projects_covers/', '0', '19', 'col_98', '2012-04-01 23:16:32', '48507', null, null, '500', '353', 'section_13', '288');
INSERT INTO `images` VALUES ('289', 'trilobis_pm1_9486', 'jpg', '/data/images/section_13/19/projects_covers/', '0', '19', 'col_97', '2012-04-01 23:16:35', '48507', null, null, '500', '353', 'section_13', '289');
INSERT INTO `images` VALUES ('290', 'ill1', 'jpg', '/data/images/section_6/17/news_giant_pics/', '0', '17', 'col_78', '2012-04-02 01:07:20', '176323', null, null, '830', '285', 'section_6', '290');
INSERT INTO `images` VALUES ('291', 'ill1', 'jpg', '/data/images/section_6/18/news_giant_pics/', '0', '18', 'col_78', '2012-04-02 01:08:20', '176323', null, null, '830', '285', 'section_6', '291');
INSERT INTO `images` VALUES ('292', 'project_info', 'jpg', '/data/images/section_6/19/news_giant_pics/', '0', '19', 'col_78', '2012-04-02 01:08:48', '535834', null, null, '1000', '700', 'section_6', '292');
INSERT INTO `images` VALUES ('293', 'koala', 'jpg', '/data/images/section_16/1/videos/', '0', '1', 'col_114', '2012-04-12 18:07:44', '780831', null, null, '1024', '768', 'section_16', '293');
INSERT INTO `images` VALUES ('294', 'desert', 'jpg', '/data/images/section_16/2/videos/', '0', '2', 'col_114', '2012-04-12 18:07:51', '845941', null, null, '1024', '768', 'section_16', '294');
INSERT INTO `images` VALUES ('295', 'lighthouse', 'jpg', '/data/images/section_16/3/videos/', '0', '3', 'col_114', '2012-04-12 18:07:58', '561276', null, null, '1024', '768', 'section_16', '295');
INSERT INTO `images` VALUES ('296', 'tulips', 'jpg', '/data/images/section_16/4/videos/', '0', '4', 'col_114', '2012-04-12 18:08:03', '620888', null, null, '1024', '768', 'section_16', '296');

-- ----------------------------
-- Table structure for `maps_objects`
-- ----------------------------
DROP TABLE IF EXISTS `maps_objects`;
CREATE TABLE `maps_objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT NULL,
  `name` text,
  `description` text,
  `data` text,
  `relative_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `module` tinyint(1) DEFAULT NULL,
  `form_item` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of maps_objects
-- ----------------------------
INSERT INTO `maps_objects` VALUES ('8', '1', null, null, '55.714537792126194;37.685320800781255', '6', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('7', '1', null, null, '55.75783522837833;37.78007788085938', '1', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('3', '1', null, null, '55.73696567477626;37.633135742187505', '3', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('4', '1', null, null, '55.684355841658956;37.578204101562505', '4', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('5', '1', null, null, '55.6835816390055;37.663348144531255', '5', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('6', '1', null, null, '55.75087995086029;37.561724609375005', '2', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('9', '1', null, null, '55.73696567477626;37.60155004882813', '8', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('10', '1', null, null, '55.73541933780969;37.690813964843755', '9', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('11', '1', null, null, '55.77251451944497;37.48619360351563', '10', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('12', '1', null, null, '55.77792128623281;37.69150061035157', '11', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('13', '1', null, null, '55.77174206295924;37.627642578125005', '12', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('14', '1', null, null, '55.68590420098671;37.657854980468755', '13', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('15', '1', null, null, '55.5750419200453;37.76428503417969', '14', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('16', '1', null, null, '55.807259220093584;37.49168676757813', '15', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('17', '1', null, null, '60.00705048779266;30.259249633789068', '16', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('18', '1', null, null, '39.931586044052914;32.82593054199219', '17', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('19', '1', null, null, '55.71531138184872;37.39349645996094', '18', '13', '0', 'col_84');
INSERT INTO `maps_objects` VALUES ('20', '1', null, null, '59.9397051071213;30.040896362304693', '19', '13', '0', 'col_84');

-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `sort` int(11) NOT NULL,
  `publish` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('3', 'Главное меню', '3', '1');

-- ----------------------------
-- Table structure for `public_users`
-- ----------------------------
DROP TABLE IF EXISTS `public_users`;
CREATE TABLE `public_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT '0',
  `subscriber` tinyint(1) DEFAULT '0',
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `email` tinytext,
  `name` tinytext,
  `reg_date` datetime NOT NULL,
  `last_login` datetime DEFAULT '2010-01-01 00:00:00',
  `last_activity` datetime DEFAULT '2010-01-01 00:00:00',
  `last_remember` datetime DEFAULT NULL,
  `remember_code` varchar(32) DEFAULT NULL,
  `vk_id` text,
  `fb_id` text,
  `publish` tinyint(1) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `last` datetime DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vk_id` (`vk_id`(8))
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of public_users
-- ----------------------------
INSERT INTO `public_users` VALUES ('26', '522176527', '0', '1', '0', 'ruslanchek_192612290', '2461ff8a74d0e6984e37c22b43b048f7', '9c8ff7bfb18df1e94b77af8f38245c24', 'ruslanchek@me.com', 'ruslanchek_192612290', '2012-03-26 18:55:28', '2012-03-26 18:57:50', '2012-03-27 00:30:39', '2012-03-26 18:55:55', '', null, null, null, null, null, null);
INSERT INTO `public_users` VALUES ('24', '522176527', '0', '1', '0', 'minaevstas', '60abfcd92346f220df107315a5374c21', 'e2b54e6e6200374466f20d38bee15ad7', 'minaevstas@gmail.com', 'minaevstas', '2012-03-26 17:52:59', '2012-03-26 17:53:00', '2012-03-26 17:53:03', null, null, null, null, null, null, null, null);
INSERT INTO `public_users` VALUES ('25', '522176527', '0', '0', '0', 'ruslanchek', 'd9b1d7db4cd6e70935368a1efb10e377', '', 'ruslanchek@gmail.com', 'ruslanchek', '2012-03-26 17:58:36', '2012-03-26 17:59:35', '2012-03-26 18:03:04', '2012-03-26 18:53:20', '84f7c61384654bcc1a2369d1106bf56b', null, null, null, null, null, null);
INSERT INTO `public_users` VALUES ('27', '2130706433', '0', '0', '0', 'rus1', '9648d3fc871ec77bc6bb7dfa95b8fe4b', '', 'rus1@gmail.com', 'rus1', '2012-04-12 18:26:59', '2012-04-12 18:27:00', '2012-04-12 18:36:57', null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `sections`
-- ----------------------------
DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text NOT NULL,
  `color` varchar(6) NOT NULL DEFAULT 'FFFFFF',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sections
-- ----------------------------
INSERT INTO `sections` VALUES ('3', 'Страницы', '', '759494');
INSERT INTO `sections` VALUES ('6', 'Новости', '', '69DF1F');
INSERT INTO `sections` VALUES ('16', 'Видеоролики', '', '8032C9');

-- ----------------------------
-- Table structure for `section_16`
-- ----------------------------
DROP TABLE IF EXISTS `section_16`;
CREATE TABLE `section_16` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `name` tinytext,
  `sort` int(11) NOT NULL DEFAULT '1',
  `creator_id` int(11) NOT NULL,
  `changer_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT '2012-04-12 17:21:00',
  `change_date` datetime NOT NULL DEFAULT '2012-04-12 17:21:00',
  `col_111` text,
  `col_112` text,
  `col_113` text,
  `col_114` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of section_16
-- ----------------------------
INSERT INTO `section_16` VALUES ('1', '1', '10 Greatest Fighter Planes', '1', '1', '1', '2012-04-12 17:22:18', '2012-04-12 18:10:35', '<iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/7qu_20XlvKo\" frameborder=\"0\" allowfullscreen></iframe>', '\r\n<p><span>Phasellus vulputate neque id massa mollis vitae auctor elit faucibus. Sed lorem tellus, congue et ornare in, suscipit id ipsum. Aenean id pulvinar elit.</span></p>', '\r\n<p><span>Phasellus vulputate neque id massa mollis vitae auctor elit faucibus. Sed lorem tellus, congue et ornare in, suscipit id ipsum. Aenean id pulvinar elit. Nullam tristique nulla ac elit gravida et faucibus purus mattis. Praesent eget sapien vitae nulla venenatis ornare ac et nisi. In vehicula posuere tortor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</span></p>', '1');
INSERT INTO `section_16` VALUES ('2', '1', 'Evergreen Airlines Boeing 747 Fire Plane Supertanker VLAT', '2', '1', '1', '2012-04-12 17:23:17', '2012-04-12 18:10:41', '<iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/uUEqbLVfpGc\" frameborder=\"0\" allowfullscreen></iframe>', '\r\n<p>Phasellus vulputate neque id massa mollis vitae auctor elit faucibus. Sed lorem tellus, congue et ornare in, suscipit id ipsum. Aenean id pulvinar elit. </p>', '\r\n<p><span>Phasellus vulputate neque id massa mollis vitae auctor elit faucibus. Sed lorem tellus, congue et ornare in, suscipit id ipsum. Aenean id pulvinar elit. Nullam tristique nulla ac elit gravida et faucibus purus mattis. Praesent eget sapien vitae nulla venenatis ornare ac et nisi. In vehicula posuere tortor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</span></p>', '1');
INSERT INTO `section_16` VALUES ('3', '1', 'Two Guys Crash Plane Despite Alarm', '3', '1', '1', '2012-04-12 17:23:56', '2012-04-12 18:10:44', '<iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/Hs5ChcYbaNU\" frameborder=\"0\" allowfullscreen></iframe>', '\r\n<p>Phasellus vulputate neque id massa mollis vitae auctor elit faucibus. Sed lorem tellus, congue et ornare in, suscipit id ipsum. Aenean id pulvinar elit. </p>', '\r\n<p><span>Phasellus vulputate neque id massa mollis vitae auctor elit faucibus. Sed lorem tellus, congue et ornare in, suscipit id ipsum. Aenean id pulvinar elit. Nullam tristique nulla ac elit gravida et faucibus purus mattis. Praesent eget sapien vitae nulla venenatis ornare ac et nisi. In vehicula posuere tortor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</span></p>', '1');
INSERT INTO `section_16` VALUES ('4', '1', 'Banana Hobby OFFICIAL 2011 Commercial in HD!', '4', '1', '1', '2012-04-12 17:30:35', '2012-04-12 18:10:50', '<iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/w-nGNLoNubw\" frameborder=\"0\" allowfullscreen></iframe>', '\r\n<p>Phasellus vulputate neque id massa mollis vitae auctor elit faucibus. Sed lorem tellus, congue et ornare in, suscipit id ipsum. Aenean id pulvinar elit. </p>', '\r\n<p><span>Phasellus vulputate neque id massa mollis vitae auctor elit faucibus. Sed lorem tellus, congue et ornare in, suscipit id ipsum. Aenean id pulvinar elit. Nullam tristique nulla ac elit gravida et faucibus purus mattis. Praesent eget sapien vitae nulla venenatis ornare ac et nisi. In vehicula posuere tortor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</span></p>', '1');

-- ----------------------------
-- Table structure for `section_3`
-- ----------------------------
DROP TABLE IF EXISTS `section_3`;
CREATE TABLE `section_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `name` tinytext,
  `sort` int(11) NOT NULL DEFAULT '1',
  `creator_id` int(11) NOT NULL,
  `changer_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT '2011-11-09 22:17:00',
  `change_date` datetime NOT NULL DEFAULT '2011-11-09 22:17:00',
  `col_33` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of section_3
-- ----------------------------
INSERT INTO `section_3` VALUES ('43', '1', 'Контакты', '1', '1', '1', '2012-03-24 11:00:30', '2012-04-12 17:34:07', '\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt ultricies mauris, vel rutrum augue hendrerit id. In sed justo dignissim mauris hendrerit egestas. Ut felis sem, pharetra vitae vehicula et, scelerisque id dolor. Suspendisse vel mi neque. Maecenas vestibulum urna vel turpis posuere eu tempor massa posuere. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam erat erat, venenatis at tempus quis, pretium quis neque. Nullam neque massa, rhoncus et porta at, sagittis ac purus. Nulla eget felis eget turpis iaculis pellentesque a sollicitudin arcu. In leo augue, volutpat tincidunt mattis vitae, tempor vestibulum arcu. Cras mattis est quis orci vestibulum euismod. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur velit justo, facilisis placerat ornare ac, pretium et leo. Sed id orci turpis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi dolor sem, dictum a rhoncus id, mattis nec sem. Cras id elit et est accumsan rutrum. In vulputate libero sed ipsum venenatis rutrum. Donec semper tempus ipsum, quis condimentum mi dapibus vel. Cras viverra, lorem et scelerisque pharetra, est libero euismod augue, nec posuere mi nunc in odio. Nunc pellentesque iaculis magna ut rhoncus.</p>\r\n<p>Vestibulum ac ipsum vitae tortor accumsan pellentesque. Integer et elit nunc. Maecenas ut augue dui, quis aliquam nisi. Etiam aliquet aliquam neque, a ornare felis bibendum vel. Suspendisse ac eros mauris, et vestibulum tortor. Suspendisse feugiat massa quis magna ultricies tristique. Integer mattis nibh quis quam elementum ac viverra quam posuere. Phasellus dui diam, tempus ultrices mattis et, lacinia ac justo. Nulla ac tellus ac augue venenatis mollis nec hendrerit libero.</p>\r\n<p>Nulla ullamcorper accumsan nisl, et consequat enim porta in. Morbi metus massa, adipiscing ut ultricies sed, auctor non nibh. Nunc scelerisque lectus in erat sodales gravida. Nam consequat libero at augue sodales euismod. Suspendisse potenti. Duis luctus feugiat nisl et adipiscing. Quisque eleifend sollicitudin cursus. Suspendisse feugiat mi eu nisl ultrices elementum. Fusce pellentesque turpis in lacus feugiat venenatis. Aliquam pulvinar mattis sem eu sagittis.</p>\r\n<p>Nullam nec justo ut neque luctus mollis ac in urna. In neque nunc, mattis ut vestibulum euismod, faucibus sed justo. Phasellus in lacus dui. Aliquam fermentum hendrerit pretium. Duis tristique ligula pretium nunc facilisis pharetra. Sed leo tortor, tempor quis bibendum in, viverra ac lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer eget augue ligula, sed consequat nulla. Vivamus elementum egestas nulla, ac facilisis ipsum tempus quis. Quisque sodales venenatis nisl eu ultricies.</p>');
INSERT INTO `section_3` VALUES ('46', '1', 'Главная страница', '4', '1', '1', '2012-04-01 23:54:00', '2012-04-02 01:56:51', '<h1>Digital Bakery /«Цифровая Пекарня»/</h1>\r\n<p>Digital Bakery /«Цифровая Пекарня»/ – это открытый проект, направленный на изменение парадигмы архитектурного проектирования. Посредством своих реализованных объектов, курсов, лекций и выездных семинаров мы пропагандируем новые методики проектирования и, как результат, новую архитектуру. Мы представляем новый формат проведения семинаров – ONLINE СЕМИНАРЫ. Если вам не столь важно личное присутствие в аудитории. Если вы цените своё время и деньги.</p>');

-- ----------------------------
-- Table structure for `section_6`
-- ----------------------------
DROP TABLE IF EXISTS `section_6`;
CREATE TABLE `section_6` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `name` tinytext,
  `sort` int(11) NOT NULL DEFAULT '1',
  `creator_id` int(11) NOT NULL,
  `changer_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT '2012-03-19 16:03:00',
  `change_date` datetime NOT NULL DEFAULT '2012-03-19 16:03:00',
  `col_30` text,
  `col_31` text,
  `col_32` datetime NOT NULL DEFAULT '2012-03-19 16:06:00',
  `col_78` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of section_6
-- ----------------------------
INSERT INTO `section_6` VALUES ('18', '1', '\"Киев-Сити\" начнут строить в конце 2014 года', '2', '1', '1', '2012-04-02 01:07:27', '2012-04-02 01:08:22', '\r\n<p><span>Главный архитектор Киева&nbsp;<i>Сергей Целовальник</i>&nbsp;<wbr>заявил, что все эти малоэтажные здания находятся&nbsp;<wbr>ниже уровня подтопления и их судьба так или иначе&nbsp;<wbr>обречена. Однако окончательного решения&nbsp;<wbr>относительно места размещения \"Киев-<wbr>Сити\" пока еще не принято, по этой причине&nbsp;<wbr>главархитектор посоветовал проживающим на&nbsp;<wbr>Осокорках-Северных киевлянам не пугаться раньше&nbsp;<wbr>времени.</span><span>&nbsp;</span><a class=\"source\" href=\"http://www.finobzor.com.ua/novosti/nid/4054/\" target=\"_blank\">Финансовый обзор</a><span>&nbsp;</span><span class=\"time\">30.03.12&nbsp;18:15</span></p>', '\r\n<p>Строительство международного делового центра&nbsp;<i>\"<wbr>Киев-Сити\"</i>&nbsp;планируется начать в четвертом&nbsp;<wbr>квартале 2014 года. Об этом, как сообщает&nbsp;<wbr>\"Интерфакс\", заявил начальник главного&nbsp;<wbr>управления градостроения и архитектуры украинской&nbsp;<wbr>столицы&nbsp;<a href=\"http://news.yandex.ru/people/tseloval1nik_sergej.html\" title=\"Главное управление градостроительства и архитектуры Киева, начальник\">Сергей Целовальник</a>.&nbsp;<a class=\"source\" href=\"http://realty.lenta.ru/news/2012/03/29/kievcity/\" target=\"_blank\">Лента.Ру:Недвижимость</a>&nbsp;<span class=\"time\">29.03.12&nbsp;18:15</span></p>\r\n<p class=\"text\">Как сообщил&nbsp;<i>С. Целовальник</i>&nbsp;во время презентации&nbsp;<wbr>проекта, Киев определил пять возможных земельных&nbsp;<wbr>участков для реализации данного проекта, три из&nbsp;<wbr>которых расположены на левом берегу Днепра. Речь&nbsp;<wbr>идет об участках в районе Осокорков-Северных (&nbsp;<wbr>150 га ), в районе&nbsp;<a href=\"http://maps.yandex.ru/?t=map&amp;text=%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0,%20%D0%9A%D0%B8%D0%B5%D0%B2,%20%D0%93%D0%BE%D0%BB%D0%BE%D1%81%D0%B5%D0%B5%D0%B2%D1%81%D0%BA%D0%B8%D0%B9%20%D1%80%D0%B0%D0%B9%D0%BE%D0%BD,%20%D0%9E%D0%B4%D0%B5%D1%81%D1%81%D0%BA%D0%B0%D1%8F%20%D0%BF%D0%BB%D0%BE%D1%89%D0%B0%D0%B4%D1%8C&amp;sll=30.458664,50.370034&amp;sspn=0.004788,0.003407\">Одесской площади</a>&nbsp;( 240 га ),&nbsp;<wbr>Нижней Телички ( 160 га ) и о. Вырлыця ( 110 га<wbr>&nbsp;), а также земучасток на&nbsp;<a href=\"http://maps.yandex.ru/?t=map&amp;text=%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0,%20%D0%9A%D0%B8%D0%B5%D0%B2,%20%D0%94%D0%B0%D1%80%D0%BD%D0%B8%D1%86%D0%BA%D0%B8%D0%B9%20%D1%80%D0%B0%D0%B9%D0%BE%D0%BD,%20%D0%94%D0%BD%D0%B5%D0%BF%D1%80%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F%20%D0%BD%D0%B0%D0%B1%D0%B5%D1%80%D0%B5%D0%B6%D0%BD%D0%B0%D1%8F&amp;sll=30.601883,50.409316&amp;sspn=0.024120,0.033759\">Днепровской набережной</a><wbr>&nbsp;( 140 га ).</p>', '2012-03-19 16:06:00', '1');
INSERT INTO `section_6` VALUES ('17', '1', 'Инвесторы смогут арендовать памятники архитектуры за рубль', '1', '1', '1', '2012-04-02 01:04:29', '2012-04-02 01:07:23', '\r\n<p><span>В результате в прошлом году типография оказалась&nbsp;</span><wbr><span>должна банка около 600 миллионов рублей, а после&nbsp;</span><wbr><span>банкротства банка права кредитора прибрел «</span><wbr><span>Вергиллиос ЛСМ Лимитед». Претензия Росимущества&nbsp;</span><wbr><span>заключается в том, что такие поручительства&nbsp;</span><wbr><span>противоречат уставу ФГУП, целям и предмету их&nbsp;</span><wbr><span>деятельности; отчуждение имущества также нарушит&nbsp;</span><wbr><span>закон, так как типография не сможет осуществлять&nbsp;</span><wbr><span>уставную деятельность.</span></p>', '\r\n<p><span>В результате в прошлом году типография оказалась&nbsp;<wbr>должна банка около 600 миллионов рублей, а после&nbsp;<wbr>банкротства банка права кредитора прибрел «<wbr>Вергиллиос ЛСМ Лимитед». Претензия Росимущества&nbsp;<wbr>заключается в том, что такие поручительства&nbsp;<wbr>противоречат уставу ФГУП, целям и предмету их&nbsp;<wbr>деятельности; отчуждение имущества также нарушит&nbsp;<wbr>закон, так как типография не сможет осуществлять&nbsp;<wbr>уставную деятельность.</span><span>&nbsp;</span><a class=\"source\" href=\"http://www.radidomapro.ru/ryedktzij/gosudartsvo/zakon/sud-zapretil-otdavatg-pamiatnik-architektury-za-do-1586.php\" target=\"_blank\">Ради Дома Про</a><span>&nbsp;</span><span class=\"time\">30.03.12&nbsp;13:17</span></p>\r\n<p class=\"text\"><span>Как пояснил московский мэр, была принята&nbsp;<wbr>программа города Москвы по восстановлению&nbsp;<wbr>памятников архитектуры, храмов и исторических&nbsp;<wbr>зданий. В рамках этой программы в 2012 году&nbsp;<wbr>впервые предусмотрено выделение субсидий&nbsp;<wbr>религиозным организациям на проведение&nbsp;<wbr>реставрации объектов культурного наследия.</span><a class=\"source\" href=\"http://www.russkiymir.ru/russkiymir/ru/news/ruregions/news5380.html\" target=\"_blank\">Русский мир</a>&nbsp;<span class=\"time\">29.03.12&nbsp;14:02</span></p>\r\n<p class=\"text\"><span>Таков неполный список первых памятников&nbsp;<wbr>архитектуры, которые инвесторы после реставрации&nbsp;<wbr>смогут получить в аренду на 49 лет за&nbsp;<wbr>символическую плату — 1 рубль за квадратный метр<wbr>. Все здания находятся в аварийном состоянии.</span>&nbsp;<a class=\"source\" href=\"http://vmdaily.ru/news/investori-smogyt-arendovat-pamyatniki-arhitektyri-za-rybl1332974552.html\" target=\"_blank\">Вечерняя Москва</a>&nbsp;<span class=\"time\">29.03.12&nbsp;02:50</span></p>', '2012-03-19 16:06:00', '1');
INSERT INTO `section_6` VALUES ('19', '1', 'Эксперт: Украина не поддержит систему ПРО Европы из-за позиции России', '3', '1', '1', '2012-04-02 01:08:27', '2012-04-02 01:09:05', '\r\n<p>Украина не присоединится к системе&nbsp;<wbr>противоракетной обороны Европы, которую&nbsp;<wbr>развертывает&nbsp;<i>НАТО</i>, несмотря на негативное&nbsp;<wbr>отношение к этой системе России. Такое мнение УНН&nbsp;<wbr>высказал директор&nbsp;<i>Центра армии, конверсии и&nbsp;<wbr>разоружения</i>&nbsp;<a href=\"http://news.yandex.ru/people/badrak_valentin.html\" title=\"Центр исследований армии, директор\">Валентин Бадрак</a>.&nbsp;<a class=\"source\" href=\"http://www.unn.com.ua/ru/exclusive/664267-ukraina-ne-prisoedinitsya-k-sisteme-protivoraketnoy-oborony-evropy-iz-za-pozitsii-rossii---ekspert\" target=\"_blank\">Украинские национальные новости</a>&nbsp;<span class=\"time\">01.04.12&nbsp;16:00</span></p>', '\r\n<p><span>Украина не присоединится к системе&nbsp;<wbr>противоракетной обороны Европы, которую&nbsp;<wbr>развертывает&nbsp;<i>НАТО</i>, несмотря на негативное&nbsp;<wbr>отношение к этой системе России. Такое мнение УНН&nbsp;<wbr>высказал директор&nbsp;<i>Центра армии, конверсии и&nbsp;<wbr>разоружения</i>&nbsp;<a href=\"http://news.yandex.ru/people/badrak_valentin.html\" title=\"Центр исследований армии, директор\">Валентин Бадрак</a>.</span><span>&nbsp;</span><a class=\"source\" href=\"http://www.unn.com.ua/ru/exclusive/664267-ukraina-ne-prisoedinitsya-k-sisteme-protivoraketnoy-oborony-evropy-iz-za-pozitsii-rossii---ekspert\" target=\"_blank\">Украинские национальные новости</a><span>&nbsp;</span><span class=\"time\">01.04.12&nbsp;16:00</span></p>\r\n<p class=\"text\"><span><i>НАТО</i>&nbsp;призывает Украину сформировать свою позицию&nbsp;<wbr>относительно развертывания системы&nbsp;<wbr>противоракетной обороны в Европе. Как передает&nbsp;<wbr>корреспондент&nbsp;<i>УНИАН</i>, об этом во время круглого&nbsp;<wbr>стола на тему \"Трансатлантическая&nbsp;<wbr>безопасность, новые вызовы и архитектура&nbsp;<wbr>противоракетной обороны; приоритеты и перспективы&nbsp;<wbr>для Центральной и Восточной Европы и&nbsp;<wbr>Украины\" сообщил руководитель Офиса связи&nbsp;<i><wbr>НАТО</i>&nbsp;в Украине Марчин Кожиел.</span>&nbsp;<a class=\"source\" href=\"http://www.unian.net/rus/news/495300-nato-prizyivaet-ukrainu-opredelitsya.html\" target=\"_blank\">УНИАН</a>&nbsp;<span class=\"time\">31.03.12&nbsp;08:56</span></p>\r\n<p class=\"text\"><span>Председатель Офиса связи&nbsp;<i>НАТО</i>&nbsp;подчеркнул, что&nbsp;<wbr>консультации все еще носят неформальный характер<wbr>, \"поскольку&nbsp;<i>НАТО</i>&nbsp;должен сначала определить&nbsp;<wbr>форму собственной ПРО\". Кроме того, убежден&nbsp;<wbr>Кожиел, украинская сторона также должна занять&nbsp;<wbr>четкую стратегическую позицию по этому вопросу.</span></p>', '2012-03-19 16:06:00', '1');

-- ----------------------------
-- Table structure for `shop_categories`
-- ----------------------------
DROP TABLE IF EXISTS `shop_categories`;
CREATE TABLE `shop_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `sort` int(11) DEFAULT NULL,
  `publish` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_categories
-- ----------------------------
INSERT INTO `shop_categories` VALUES ('3', 'Категория товаров 3', '3', '1');
INSERT INTO `shop_categories` VALUES ('4', 'Категория товаров 4', '4', '1');

-- ----------------------------
-- Table structure for `shop_goods`
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods`;
CREATE TABLE `shop_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `sort` int(11) DEFAULT NULL,
  `publish` tinyint(1) DEFAULT NULL,
  `item_article` tinytext,
  `price` float DEFAULT '0',
  `discount` tinyint(3) DEFAULT '0',
  `category` int(11) DEFAULT NULL,
  `item_picture` int(11) DEFAULT NULL,
  `item_gallery` int(11) DEFAULT NULL,
  `description` text,
  `short_description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_goods
-- ----------------------------
INSERT INTO `shop_goods` VALUES ('10', 'Товар 10', '10', '0', '', '0', '0', null, '0', '0', null, null);

-- ----------------------------
-- Table structure for `structure`
-- ----------------------------
DROP TABLE IF EXISTS `structure`;
CREATE TABLE `structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of structure
-- ----------------------------
INSERT INTO `structure` VALUES ('1', '0');
INSERT INTO `structure` VALUES ('40', '41');
INSERT INTO `structure` VALUES ('17', '1');
INSERT INTO `structure` VALUES ('26', '1');
INSERT INTO `structure` VALUES ('38', '41');
INSERT INTO `structure` VALUES ('42', '1');
INSERT INTO `structure` VALUES ('27', '26');
INSERT INTO `structure` VALUES ('28', '26');
INSERT INTO `structure` VALUES ('29', '1');
INSERT INTO `structure` VALUES ('30', '29');
INSERT INTO `structure` VALUES ('39', '1');
INSERT INTO `structure` VALUES ('41', '1');

-- ----------------------------
-- Table structure for `structure_data`
-- ----------------------------
DROP TABLE IF EXISTS `structure_data`;
CREATE TABLE `structure_data` (
  `id` int(11) NOT NULL,
  `name` tinytext,
  `path` tinytext,
  `part` tinytext,
  `title` tinytext,
  `description` tinytext,
  `keywords` tinytext,
  `publish` tinyint(1) DEFAULT '0',
  `sort` tinyint(4) DEFAULT '0',
  `menu` int(11) NOT NULL,
  `mode` tinyint(1) NOT NULL,
  `template` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `private` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `path` (`path`(2)),
  KEY `menu` (`menu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of structure_data
-- ----------------------------
INSERT INTO `structure_data` VALUES ('1', 'Главная страница', '/', null, 'Главная страницаasdasd', 'Главная страницаasdasd', 'Главная странsdasaицаd', '1', '0', '3', '16', '6', '46', '0');
INSERT INTO `structure_data` VALUES ('17', 'Новости', '/news/', 'news', '', '', '', '1', '2', '3', '2', '4', '0', '0');
INSERT INTO `structure_data` VALUES ('40', 'Карта проезда', '/about/map/', 'map', '', '', '', '1', '4', '3', '1', '4', '43', '0');
INSERT INTO `structure_data` VALUES ('41', 'О компании', '/about/', 'about', '', '', '', '1', '3', '3', '1', '4', '43', '0');
INSERT INTO `structure_data` VALUES ('42', 'Закрытый раздел', '/closed/', 'closed', '', '', '', '1', '6', '3', '1', '4', '43', '1');
INSERT INTO `structure_data` VALUES ('26', 'Авторизация', '/auth/', 'auth', '', '', '', '1', '7', '0', '5', '4', '0', '0');
INSERT INTO `structure_data` VALUES ('27', 'Регистрация', '/auth/register/', 'register', '', '', '', '1', '8', '3', '6', '4', '0', '0');
INSERT INTO `structure_data` VALUES ('28', 'Напомнить пароль', '/auth/remember_pass/', 'remember_pass', '', '', '', '1', '9', '3', '7', '4', '0', '0');
INSERT INTO `structure_data` VALUES ('29', 'Личный кабинет', '/personal/', 'personal', '', '', '', '1', '10', '0', '8', '4', '0', '0');
INSERT INTO `structure_data` VALUES ('30', 'Сменить пароль', '/personal/change_pass/', 'change_pass', '', '', '', '1', '11', '0', '9', '4', '0', '0');
INSERT INTO `structure_data` VALUES ('38', 'Контакты', '/about/contacts/', 'contacts', '', '', '', '1', '5', '3', '1', '4', '43', '0');
INSERT INTO `structure_data` VALUES ('39', 'Видеоролики', '/videos/', 'videos', '', '', '', '1', '1', '3', '11', '4', '0', '0');

-- ----------------------------
-- Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `va` (`name`),
  KEY `name` (`name`(2))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------

-- ----------------------------
-- Table structure for `templates`
-- ----------------------------
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `sort` int(11) DEFAULT NULL,
  `publish` tinyint(4) DEFAULT NULL,
  `file` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of templates
-- ----------------------------
INSERT INTO `templates` VALUES ('4', 'Для внутренних', '4', '1', 'inner.tpl');
INSERT INTO `templates` VALUES ('6', 'Главная страница', '6', '1', 'main.tpl');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `name` tinytext,
  `email` tinytext,
  `password` varchar(32) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `last` datetime DEFAULT '2010-01-01 00:00:00',
  `activity` datetime DEFAULT '2010-01-01 00:00:00',
  `group` int(11) DEFAULT NULL,
  `publish` tinyint(4) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=369 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'Admin', 'ruslanchek@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'e938252983233539d177890f9a8dfaa6', '0', '2012-04-12 16:54:57', '2012-04-12 18:39:39', '4', '1', '0');

-- ----------------------------
-- Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `auth_code` tinytext NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('4', 'Администраторы', '', '1', '4');
