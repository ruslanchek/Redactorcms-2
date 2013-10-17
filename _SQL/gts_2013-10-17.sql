# ************************************************************
# Sequel Pro SQL dump
# Версия 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Адрес: 127.0.0.1 (MySQL 5.5.29)
# Схема: gts
# Время создания: 2013-10-17 00:57:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы datasets
# ------------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `datasets` WRITE;
/*!40000 ALTER TABLE `datasets` DISABLE KEYS */;

INSERT INTO `datasets` (`id`, `section_id`, `type`, `label`, `default`, `required`, `unique`, `options_source`, `options_custom`, `options_table`, `use_editor`, `description`, `sort`, `embed`, `embed_name`, `list`, `email`, `rows`, `randomize`, `number`, `multiple`, `extensions`, `thumbs`, `folder`, `prefix`, `suffix`, `min`, `max`, `mode`, `interval`)
VALUES
	(7,3,'checkbox','Публиковать','0',0,0,0,'','',0,'Публиковать элемент',1,1,'publish',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(8,3,'separator','Разделитель','',0,0,0,'','',0,'',3,1,'main',0,0,0,0,0,0,'','','','','',0,0,0,0),
	(9,3,'text','Название','',1,0,0,'','',0,'Название элемента',2,1,'name',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(33,3,'textarea','Текст','',0,0,0,'','',1,'',4,0,NULL,0,0,19,0,0,0,'','','','','',0,0,0,0),
	(161,22,'text','Страна-производитель','',0,0,0,'','',0,'',6,0,NULL,1,0,0,0,0,0,'','','','','',0,0,0,0),
	(159,22,'separator','Разделитель','',0,0,0,'','',0,'',5,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(158,22,'image','Логотип (195x195)','',0,0,0,'','',0,'',4,0,NULL,1,0,0,0,0,0,'','195,195,sq,4','','','',0,0,0,0),
	(157,22,'textarea','Полное описание','',0,0,0,'','',1,'',9,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(120,18,'checkbox','Публиковать','0',0,0,0,'','',0,'Публиковать элемент',1,1,'publish',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(121,18,'separator','Разделитель','',0,0,0,'','',0,'',2,1,'main',0,0,0,0,0,0,'','','','','',0,0,0,0),
	(128,19,'checkbox','Публиковать','0',0,0,0,'','',0,'Публиковать элемент',1,1,'publish',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(126,18,'separator','Разделитель','',0,0,0,'','',0,'',5,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(127,18,'url','Ссылка со слайда','',0,0,0,'','',0,'',6,0,NULL,0,0,0,0,0,0,'','','','','',0,0,1,0),
	(124,18,'separator','Разделитель','',0,0,0,'','',0,'',7,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(125,18,'image','Картинка (940x350)','',0,0,0,'','',0,'',8,0,NULL,1,0,0,0,0,0,'','','slides','','',0,0,0,0),
	(123,18,'textarea','Текст','',0,0,0,'','',1,'',4,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(122,18,'text','Название','',1,0,0,'','',0,'Название элемента',3,1,'name',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(129,19,'separator','Разделитель','',0,0,0,'','',0,'',3,1,'main',0,0,0,0,0,0,'','','','','',0,0,0,0),
	(130,19,'text','Название','',1,0,0,'','',0,'Название элемента',2,1,'name',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(131,19,'separator','Разделитель','',0,0,0,'','',0,'',5,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(132,19,'calendar','Дата и время','',0,0,0,'','',0,'',6,0,NULL,1,0,0,0,0,0,'','','','','',0,0,0,0),
	(133,19,'separator','Разделитель','',0,0,0,'','',0,'',7,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(134,19,'textarea','Текст','',0,0,0,'','',1,'',9,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(136,19,'textarea','Анонс','',0,0,0,'','',1,'',8,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(137,20,'checkbox','Публиковать','0',0,0,0,'','',0,'Публиковать элемент',1,1,'publish',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(138,20,'separator','Разделитель','',0,0,0,'','',0,'',2,1,'main',0,0,0,0,0,0,'','','','','',0,0,0,0),
	(139,20,'text','Название','',1,0,0,'','',0,'Название элемента',3,1,'name',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(140,20,'separator','Разделитель','',0,0,0,'','',0,'',4,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(141,20,'text','Имя','',1,0,0,'','',0,'',5,0,NULL,1,0,0,0,0,0,'','','','','',0,0,0,0),
	(142,20,'text','E-mail','',1,0,0,'','',0,'',6,0,NULL,1,1,0,0,0,0,'','','','','',0,0,0,0),
	(156,22,'textarea','Краткое описание','',0,0,0,'','',1,'',8,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0),
	(155,22,'text','Название','',1,0,0,'','',0,'Название элемента',2,1,'name',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(154,22,'separator','Разделитель','',0,0,0,'','',0,'',3,1,'main',0,0,0,0,0,0,'','','','','',0,0,0,0),
	(153,22,'checkbox','Публиковать','0',0,0,0,'','',0,'Публиковать элемент',1,1,'publish',1,0,0,0,0,0,'','','','','',0,0,0,0),
	(152,19,'image','Картинка','',0,0,0,'','',0,'',4,0,NULL,1,0,0,0,0,0,'','180,360,pic,2;180,180,pic_sq,4','','','',0,0,0,0),
	(151,20,'select','Категория прайс-листа','0',0,0,0,'1=Кабель;2=Металлопрокат','section_3',0,'',7,0,NULL,1,0,0,0,0,0,'','','','','',0,0,0,0),
	(162,22,'separator','Разделитель','',0,0,0,'','',0,'',7,0,NULL,0,0,0,0,0,0,'','','','','',0,0,0,0);

/*!40000 ALTER TABLE `datasets` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы images
# ------------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `name`, `extension`, `path`, `type`, `relative_id`, `form_item`, `date`, `size`, `metaname`, `metadesc`, `width`, `height`, `relative_table`, `sort`)
VALUES
	(184,'koala','jpg','/data/images/section_9/3/albums_covers/',0,3,'col_46','2012-03-19 20:54:53',780831,NULL,NULL,1024,768,'section_9',184),
	(185,'hydrangeas','jpg','/data/images/section_9/3/photos/',1,3,'col_47','2012-03-19 20:54:57',595284,NULL,NULL,1024,768,'section_9',185),
	(186,'koala','jpg','/data/images/section_9/3/photos/',1,3,'col_47','2012-03-19 20:54:58',780831,NULL,NULL,1024,768,'section_9',186),
	(188,'jellyfish_6928','jpg','/data/images/section_9/3/photos/',1,3,'col_47','2012-03-19 20:55:00',775702,NULL,NULL,1024,768,'section_9',188),
	(189,'penguins_9242','jpg','/data/images/section_9/3/photos/',1,3,'col_47','2012-03-19 20:55:01',777835,NULL,NULL,1024,768,'section_9',189),
	(190,'desert_2645','jpg','/data/images/section_9/3/photos/',1,3,'col_47','2012-03-19 20:55:02',845941,NULL,NULL,1024,768,'section_9',190),
	(191,'tulips','jpg','/data/images/section_9/3/photos/',1,3,'col_47','2012-03-19 20:55:03',620888,NULL,NULL,1024,768,'section_9',191),
	(228,'koala_43','jpg','/data/images/section_10/1/projects/',1,1,'col_59','2012-03-20 00:06:30',780831,NULL,NULL,1024,768,'section_10',228),
	(227,'lighthouse','jpg','/data/images/section_10/1/projects/',1,1,'col_59','2012-03-20 00:06:29',561276,NULL,NULL,1024,768,'section_10',227),
	(193,'penguins','jpg','/data/images/section_9/4/albums_covers/',0,4,'col_46','2012-03-19 20:55:15',777835,NULL,NULL,1024,768,'section_9',193),
	(194,'koala_1145','jpg','/data/images/section_9/4/photos/',1,4,'col_47','2012-03-19 20:55:18',780831,NULL,NULL,1024,768,'section_9',194),
	(195,'lighthouse_705','jpg','/data/images/section_9/4/photos/',1,4,'col_47','2012-03-19 20:55:20',561276,NULL,NULL,1024,768,'section_9',195),
	(196,'jellyfish','jpg','/data/images/section_9/4/photos/',1,4,'col_47','2012-03-19 20:55:21',775702,NULL,NULL,1024,768,'section_9',196),
	(197,'penguins','jpg','/data/images/section_9/4/photos/',1,4,'col_47','2012-03-19 20:55:22',777835,NULL,NULL,1024,768,'section_9',197),
	(198,'desert','jpg','/data/images/section_9/4/photos/',1,4,'col_47','2012-03-19 20:55:23',845941,NULL,NULL,1024,768,'section_9',198),
	(199,'tulips','jpg','/data/images/section_9/4/photos/',1,4,'col_47','2012-03-19 20:55:24',620888,NULL,NULL,1024,768,'section_9',199),
	(200,'chrysanthemum','jpg','/data/images/section_9/4/photos/',1,4,'col_47','2012-03-19 20:55:26',879394,NULL,NULL,1024,768,'section_9',200),
	(201,'lighthouse_4340','jpg','/data/images/section_9/5/albums_covers/',0,5,'col_46','2012-03-19 20:55:42',561276,NULL,NULL,1024,768,'section_9',201),
	(202,'hydrangeas_4416','jpg','/data/images/section_9/5/photos/',1,5,'col_47','2012-03-19 20:55:46',595284,NULL,NULL,1024,768,'section_9',202),
	(203,'koala_43','jpg','/data/images/section_9/5/photos/',1,5,'col_47','2012-03-19 20:55:47',780831,NULL,NULL,1024,768,'section_9',203),
	(204,'tulips','jpg','/data/images/section_9/6/albums_covers/',0,6,'col_46','2012-03-19 20:55:53',620888,NULL,NULL,1024,768,'section_9',204),
	(205,'jellyfish_305','jpg','/data/images/section_9/6/photos/',1,6,'col_47','2012-03-19 20:55:56',775702,NULL,NULL,1024,768,'section_9',205),
	(225,'penguins_3240','jpg','/data/images/section_10/1/projects/',1,1,'col_59','2012-03-20 00:06:28',777835,NULL,NULL,1024,768,'section_10',225),
	(226,'tulips','jpg','/data/images/section_10/1/projects/',1,1,'col_59','2012-03-20 00:06:28',620888,NULL,NULL,1024,768,'section_10',226),
	(215,'penguins','jpg','/data/images/section_10/1/projects/',0,1,'col_58','2012-03-19 23:56:27',777835,NULL,NULL,1024,768,'section_10',215),
	(216,'tulips_4880','jpg','/data/images/section_10/2/projects/',0,2,'col_58','2012-03-19 23:56:38',620888,NULL,NULL,1024,768,'section_10',216),
	(231,'lighthouse','jpg','/data/images/section_10/2/projects/',1,2,'col_59','2012-03-20 00:06:48',561276,NULL,NULL,1024,768,'section_10',231),
	(230,'tulips','jpg','/data/images/section_10/2/projects/',1,2,'col_59','2012-03-20 00:06:47',620888,NULL,NULL,1024,768,'section_10',230),
	(229,'penguins','jpg','/data/images/section_10/2/projects/',1,2,'col_59','2012-03-20 00:06:46',777835,NULL,NULL,1024,768,'section_10',229),
	(232,'koala_43','jpg','/data/images/section_10/2/projects/',1,2,'col_59','2012-03-20 00:06:49',780831,NULL,NULL,1024,768,'section_10',232),
	(233,'penguins','jpg','/data/images/section_10/3/projects/',0,3,'col_58','2012-03-20 00:10:16',777835,NULL,NULL,1024,768,'section_10',233),
	(234,'55','jpg','/data/images/section_12/1/video_covers/',0,1,'col_77','2012-03-26 16:17:35',4936,NULL,NULL,50,50,'section_12',234),
	(253,'man','png','/data/images/section_13/1/projects_covers/',0,1,'col_97','2012-03-31 13:54:52',19933,NULL,NULL,150,150,'section_13',253),
	(252,'ill1_4676','jpg','/data/images/section_13/1/projects_covers/',0,1,'col_98','2012-03-31 13:54:07',176323,NULL,NULL,830,285,'section_13',252),
	(254,'man','png','/data/images/section_13/2/projects_covers/',0,2,'col_97','2012-03-31 14:03:39',19933,NULL,NULL,150,150,'section_13',254),
	(255,'ill1','jpg','/data/images/section_13/2/projects_covers/',0,2,'col_98','2012-03-31 14:03:42',176323,NULL,NULL,830,285,'section_13',255),
	(256,'client_logo','png','/data/images/section_13/3/projects_covers/',0,3,'col_97','2012-03-31 20:13:53',9282,NULL,NULL,248,248,'section_13',256),
	(257,'ill1','jpg','/data/images/section_13/3/projects_covers/',0,3,'col_98','2012-03-31 20:13:59',176323,NULL,NULL,830,285,'section_13',257),
	(258,'man','png','/data/images/section_13/4/projects_covers/',0,4,'col_97','2012-03-31 20:14:38',19933,NULL,NULL,150,150,'section_13',258),
	(259,'ill1','jpg','/data/images/section_13/4/projects_covers/',0,4,'col_98','2012-03-31 20:14:42',176323,NULL,NULL,830,285,'section_13',259),
	(260,'man','png','/data/images/section_13/5/projects_covers/',0,5,'col_97','2012-03-31 20:44:19',19933,NULL,NULL,150,150,'section_13',260),
	(261,'ill1','jpg','/data/images/section_13/5/projects_covers/',0,5,'col_98','2012-03-31 20:44:21',176323,NULL,NULL,830,285,'section_13',261),
	(262,'ill1','jpg','/data/images/section_13/6/projects_covers/',0,6,'col_97','2012-03-31 22:58:21',176323,NULL,NULL,830,285,'section_13',262),
	(263,'man','png','/data/images/section_13/6/projects_covers/',0,6,'col_98','2012-03-31 22:58:25',19933,NULL,NULL,150,150,'section_13',263),
	(275,'2_3005','jpg','/data/images/section_13/8/projects_covers/',0,8,'col_98','2012-04-01 22:41:33',65387,NULL,NULL,543,403,'section_13',275),
	(274,'2','jpg','/data/images/section_13/8/projects_covers/',0,8,'col_97','2012-04-01 22:41:30',65387,NULL,NULL,543,403,'section_13',274),
	(266,'man_810x250','png','/data/images/section_13/9/projects_covers/',0,9,'col_97','2012-04-01 22:18:28',22737,NULL,NULL,150,150,'section_13',266),
	(267,'ill1','jpg','/data/images/section_13/9/projects_covers/',0,9,'col_98','2012-04-01 22:18:32',176323,NULL,NULL,830,285,'section_13',267),
	(268,'man','png','/data/images/section_13/10/projects_covers/',0,10,'col_97','2012-04-01 22:18:51',19933,NULL,NULL,150,150,'section_13',268),
	(269,'ill1','jpg','/data/images/section_13/10/projects_covers/',0,10,'col_98','2012-04-01 22:18:54',176323,NULL,NULL,830,285,'section_13',269),
	(270,'man_810x250','png','/data/images/section_13/11/projects_covers/',0,11,'col_97','2012-04-01 22:19:15',22737,NULL,NULL,150,150,'section_13',270),
	(271,'ill1_250x250','jpg','/data/images/section_13/11/projects_covers/',0,11,'col_98','2012-04-01 22:19:19',31972,NULL,NULL,250,85,'section_13',271),
	(272,'man_810x250','png','/data/images/section_13/12/projects_covers/',0,12,'col_97','2012-04-01 22:19:37',22737,NULL,NULL,150,150,'section_13',272),
	(273,'man','png','/data/images/section_13/12/projects_covers/',0,12,'col_98','2012-04-01 22:19:40',19933,NULL,NULL,150,150,'section_13',273),
	(276,'trilobis_pm1','jpg','/data/images/section_13/13/projects_covers/',0,13,'col_97','2012-04-01 22:49:34',48507,NULL,NULL,500,353,'section_13',276),
	(277,'trilobis_pm1_5103','jpg','/data/images/section_13/13/projects_covers/',0,13,'col_98','2012-04-01 22:49:37',48507,NULL,NULL,500,353,'section_13',277),
	(278,'2','jpg','/data/images/section_13/14/projects_covers/',0,14,'col_97','2012-04-01 22:50:53',65387,NULL,NULL,543,403,'section_13',278),
	(279,'2_2438','jpg','/data/images/section_13/14/projects_covers/',0,14,'col_98','2012-04-01 22:50:56',65387,NULL,NULL,543,403,'section_13',279),
	(280,'22','jpg','/data/images/section_13/15/projects_covers/',0,15,'col_97','2012-04-01 22:51:44',73323,NULL,NULL,640,480,'section_13',280),
	(281,'22_4014','jpg','/data/images/section_13/15/projects_covers/',0,15,'col_98','2012-04-01 22:51:48',73323,NULL,NULL,640,480,'section_13',281),
	(282,'venus_project','jpg','/data/images/section_13/16/projects_covers/',0,16,'col_97','2012-04-01 22:52:22',103901,NULL,NULL,500,403,'section_13',282),
	(283,'venus_project_1743','jpg','/data/images/section_13/16/projects_covers/',0,16,'col_98','2012-04-01 22:52:25',103901,NULL,NULL,500,403,'section_13',283),
	(284,'22','jpg','/data/images/section_13/17/projects_covers/',0,17,'col_97','2012-04-01 22:54:27',73323,NULL,NULL,640,480,'section_13',284),
	(285,'22_3586','jpg','/data/images/section_13/17/projects_covers/',0,17,'col_98','2012-04-01 22:54:29',73323,NULL,NULL,640,480,'section_13',285),
	(286,'22','jpg','/data/images/section_13/18/projects_covers/',0,18,'col_97','2012-04-01 23:12:19',73323,NULL,NULL,640,480,'section_13',286),
	(287,'22_9476','jpg','/data/images/section_13/18/projects_covers/',0,18,'col_98','2012-04-01 23:12:23',73323,NULL,NULL,640,480,'section_13',287),
	(288,'trilobis_pm1','jpg','/data/images/section_13/19/projects_covers/',0,19,'col_98','2012-04-01 23:16:32',48507,NULL,NULL,500,353,'section_13',288),
	(289,'trilobis_pm1_9486','jpg','/data/images/section_13/19/projects_covers/',0,19,'col_97','2012-04-01 23:16:35',48507,NULL,NULL,500,353,'section_13',289),
	(290,'ill1','jpg','/data/images/section_6/17/news_giant_pics/',0,17,'col_78','2012-04-02 01:07:20',176323,NULL,NULL,830,285,'section_6',290),
	(291,'ill1','jpg','/data/images/section_6/18/news_giant_pics/',0,18,'col_78','2012-04-02 01:08:20',176323,NULL,NULL,830,285,'section_6',291),
	(292,'project_info','jpg','/data/images/section_6/19/news_giant_pics/',0,19,'col_78','2012-04-02 01:08:48',535834,NULL,NULL,1000,700,'section_6',292),
	(293,'koala','jpg','/data/images/section_16/1/videos/',0,1,'col_114','2012-04-12 18:07:44',780831,NULL,NULL,1024,768,'section_16',293),
	(294,'desert','jpg','/data/images/section_16/2/videos/',0,2,'col_114','2012-04-12 18:07:51',845941,NULL,NULL,1024,768,'section_16',294),
	(295,'lighthouse','jpg','/data/images/section_16/3/videos/',0,3,'col_114','2012-04-12 18:07:58',561276,NULL,NULL,1024,768,'section_16',295),
	(296,'tulips','jpg','/data/images/section_16/4/videos/',0,4,'col_114','2012-04-12 18:08:03',620888,NULL,NULL,1024,768,'section_16',296),
	(304,'slide-1','jpg','/data/images/section_18/1/slides/',0,1,'col_125','2013-10-16 18:21:16',83087,NULL,NULL,600,310,'section_18',304),
	(309,'logo-akg','png','/data/images/section_22/1/',0,1,'col_158','2013-10-17 04:40:44',12460,NULL,NULL,200,200,'section_22',309),
	(307,'photo-2','jpg','/data/images/section_19/2/',0,2,'col_152','2013-10-16 18:27:26',133103,NULL,NULL,582,437,'section_19',307),
	(308,'slide-1','jpg','/data/images/section_19/1/',0,1,'col_152','2013-10-16 18:27:35',83087,NULL,NULL,600,310,'section_19',308),
	(306,'photo-1','jpg','/data/images/section_18/2/slides/',0,2,'col_125','2013-10-16 18:21:43',68278,NULL,NULL,582,327,'section_18',306),
	(310,'logo-abrasivos-manhattan','png','/data/images/section_22/2/',0,2,'col_158','2013-10-17 04:41:46',11949,NULL,NULL,200,200,'section_22',310),
	(311,'logo-ace','png','/data/images/section_22/3/',0,3,'col_158','2013-10-17 04:42:10',10982,NULL,NULL,200,200,'section_22',311),
	(312,'logo-agilent','png','/data/images/section_22/4/',0,4,'col_158','2013-10-17 04:42:29',10683,NULL,NULL,200,200,'section_22',312),
	(313,'cigar-room','jpg','/data/images/section_22/6/',0,6,'col_158','2013-10-17 04:43:14',95726,NULL,NULL,284,279,'section_22',313);

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы maps_objects
# ------------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `maps_objects` WRITE;
/*!40000 ALTER TABLE `maps_objects` DISABLE KEYS */;

INSERT INTO `maps_objects` (`id`, `type`, `name`, `description`, `data`, `relative_id`, `section_id`, `module`, `form_item`)
VALUES
	(8,1,NULL,NULL,'55.714537792126194;37.685320800781255',6,13,0,'col_84'),
	(7,1,NULL,NULL,'55.75783522837833;37.78007788085938',1,13,0,'col_84'),
	(3,1,NULL,NULL,'55.73696567477626;37.633135742187505',3,13,0,'col_84'),
	(4,1,NULL,NULL,'55.684355841658956;37.578204101562505',4,13,0,'col_84'),
	(5,1,NULL,NULL,'55.6835816390055;37.663348144531255',5,13,0,'col_84'),
	(6,1,NULL,NULL,'55.75087995086029;37.561724609375005',2,13,0,'col_84'),
	(9,1,NULL,NULL,'55.73696567477626;37.60155004882813',8,13,0,'col_84'),
	(10,1,NULL,NULL,'55.73541933780969;37.690813964843755',9,13,0,'col_84'),
	(11,1,NULL,NULL,'55.77251451944497;37.48619360351563',10,13,0,'col_84'),
	(12,1,NULL,NULL,'55.77792128623281;37.69150061035157',11,13,0,'col_84'),
	(13,1,NULL,NULL,'55.77174206295924;37.627642578125005',12,13,0,'col_84'),
	(14,1,NULL,NULL,'55.68590420098671;37.657854980468755',13,13,0,'col_84'),
	(15,1,NULL,NULL,'55.5750419200453;37.76428503417969',14,13,0,'col_84'),
	(16,1,NULL,NULL,'55.807259220093584;37.49168676757813',15,13,0,'col_84'),
	(17,1,NULL,NULL,'60.00705048779266;30.259249633789068',16,13,0,'col_84'),
	(18,1,NULL,NULL,'39.931586044052914;32.82593054199219',17,13,0,'col_84'),
	(19,1,NULL,NULL,'55.71531138184872;37.39349645996094',18,13,0,'col_84'),
	(20,1,NULL,NULL,'59.9397051071213;30.040896362304693',19,13,0,'col_84');

/*!40000 ALTER TABLE `maps_objects` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `sort` int(11) NOT NULL,
  `publish` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `sort`, `publish`)
VALUES
	(3,'Главное меню',3,1);

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы public_users
# ------------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `public_users` WRITE;
/*!40000 ALTER TABLE `public_users` DISABLE KEYS */;

INSERT INTO `public_users` (`id`, `ip`, `active`, `online`, `subscriber`, `login`, `password`, `hash`, `email`, `name`, `reg_date`, `last_login`, `last_activity`, `last_remember`, `remember_code`, `vk_id`, `fb_id`, `publish`, `sort`, `last`, `group`)
VALUES
	(26,522176527,0,1,0,'ruslanchek_192612290','2461ff8a74d0e6984e37c22b43b048f7','9c8ff7bfb18df1e94b77af8f38245c24','ruslanchek@me.com','ruslanchek_192612290','2012-03-26 18:55:28','2012-03-26 18:57:50','2012-03-27 00:30:39','2012-03-26 18:55:55','',NULL,NULL,NULL,NULL,NULL,NULL),
	(24,522176527,0,1,0,'minaevstas','60abfcd92346f220df107315a5374c21','e2b54e6e6200374466f20d38bee15ad7','minaevstas@gmail.com','minaevstas','2012-03-26 17:52:59','2012-03-26 17:53:00','2012-03-26 17:53:03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(25,522176527,0,0,0,'ruslanchek','d9b1d7db4cd6e70935368a1efb10e377','','ruslanchek@gmail.com','ruslanchek','2012-03-26 17:58:36','2012-03-26 17:59:35','2012-03-26 18:03:04','2012-03-26 18:53:20','84f7c61384654bcc1a2369d1106bf56b',NULL,NULL,NULL,NULL,NULL,NULL),
	(27,2130706433,0,0,0,'rus1','9648d3fc871ec77bc6bb7dfa95b8fe4b','','rus1@gmail.com','rus1','2012-04-12 18:26:59','2012-04-12 18:27:00','2012-04-12 18:36:57',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `public_users` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы section_18
# ------------------------------------------------------------

DROP TABLE IF EXISTS `section_18`;

CREATE TABLE `section_18` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `name` tinytext,
  `sort` int(11) NOT NULL DEFAULT '1',
  `creator_id` int(11) NOT NULL,
  `changer_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT '2013-07-21 16:00:00',
  `change_date` datetime NOT NULL DEFAULT '2013-07-21 16:00:00',
  `col_123` longtext,
  `col_125` text,
  `col_127` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `section_18` WRITE;
/*!40000 ALTER TABLE `section_18` DISABLE KEYS */;

INSERT INTO `section_18` (`id`, `publish`, `name`, `sort`, `creator_id`, `changer_id`, `creation_date`, `change_date`, `col_123`, `col_125`, `col_127`)
VALUES
	(1,1,'ООО «Тимбермаш Байкал»',1,1,1,'2013-07-21 16:24:30','2013-10-16 18:21:17','C момента основания в 2003 году является официальным дилером компании «John Deere» – ведущего мирового производителя лесозаготовительного оборудования (харвестеров, форвардеров, трелевочных тракторов, валочнопакетирующих машин и процессоров).','1',''),
	(2,1,'ООО «Тимбермаш Байкал» 1',2,1,1,'2013-07-21 16:44:33','2013-10-16 18:20:44','C момента основания в 2003 году является официальным дилером компании «John Deere» – ведущего мирового производителя лесозаготовительного оборудования (харвестеров, форвардеров, трелевочных тракторов, валочнопакетирующих машин и процессоров).','1','');

/*!40000 ALTER TABLE `section_18` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы section_19
# ------------------------------------------------------------

DROP TABLE IF EXISTS `section_19`;

CREATE TABLE `section_19` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `name` tinytext,
  `sort` int(11) NOT NULL DEFAULT '1',
  `creator_id` int(11) NOT NULL,
  `changer_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT '2013-07-21 16:59:00',
  `change_date` datetime NOT NULL DEFAULT '2013-07-21 16:59:00',
  `col_132` datetime NOT NULL DEFAULT '2013-07-21 17:00:00',
  `col_134` longtext,
  `col_136` longtext,
  `col_152` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `section_19` WRITE;
/*!40000 ALTER TABLE `section_19` DISABLE KEYS */;

INSERT INTO `section_19` (`id`, `publish`, `name`, `sort`, `creator_id`, `changer_id`, `creation_date`, `change_date`, `col_132`, `col_134`, `col_136`, `col_152`)
VALUES
	(1,1,'Наряду с нейтральной лексикой логоэпистема многопланово',1,1,1,'2013-07-21 19:34:26','2013-10-17 04:01:17','2013-07-19 17:00:00','<div class=\"photo-box\"><div class=\"photo\">\r\n<p><img src=\"/data/content/images/photo-1.jpg\" style=\"\"></p>\r\n</div>\r\n<div class=\"info\"><div class=\"desc\">Сергей Гуриев</div>\r\n<div class=\"author color-gray\">Фото: Рамиль Ситдиков / РИА Новости </div>\r\n</div>\r\n<div class=\"clear\"></div>\r\n</div>\r\n\r\n<p> Вы так же можете легко найти интересующее вас оборудование промышленного назначения, воспользовавшись поиском по сайту. Если вас интересует определенное оборудование или комплектующие для промышленного оборудования, то вы можете заказать все необходимое вам оборудование и уточнить цены на него с помощью удобной формы для оформления заказа. </p>\r\n\r\n<p> Компания GTS-Moscow имеет возможности поставки практически любых запасных частей и оборудование промышленного назначения иностранных производителей и даже тех производителей, которые работают на Российском рынке через свои официальные представительства Компания GTS-Moscow имеет возможности поставки практически любых запасных частей и оборудование промышленного назначения иностранных производителей и даже тех производителей, которые работают на Российском рынке через свои официальные представительства. </p>\r\n<h2>Фотографии</h2>\r\n<div class=\"photo-roll\"><div class=\"roll\"><a class=\"arrow left\" href=\"#\"></a><a class=\"arrow right\" href=\"#\"></a><div class=\"roll-viewport\"><div class=\"roll-container\"><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2-small.jpg\" alt=\"Photo 1\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1-small.jpg\" alt=\"Photo 2\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2-small.jpg\" alt=\"Photo 3\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1-small.jpg\" alt=\"Photo 4\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2-small.jpg\" alt=\"Photo 5\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1-small.jpg\" alt=\"Photo 6\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2-small.jpg\" alt=\"Photo 7\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1-small.jpg\" alt=\"Photo 8\"></a></div>\r\n</div>\r\n</div>\r\n<div class=\"picture\"><div class=\"picture-viewport\"><div class=\"picture-container\"><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2.jpg\" alt=\"Photo 1\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1.jpg\" alt=\"Photo 2\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2.jpg\" alt=\"Photo 3\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1.jpg\" alt=\"Photo 4\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2.jpg\" alt=\"Photo 5\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1.jpg\" alt=\"Photo 6\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2.jpg\" alt=\"Photo 7\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1.jpg\" alt=\"Photo 8\"></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n<h2>Видео</h2>\r\n<div class=\"video-container\"><iframe width=\"100%\" height=\"450\" src=\"http://www.youtube.com/embed/GlWpNeIudkE\" frameborder=\"0\" allowfullscreen=\"\"></iframe></div>\r\n<div class=\"postscript\">Mercedes 2014 E-Class «Evening Star» Trailer</div>\r\n<br>\r\n<br>','<p>Вы так же можете легко найти интересующее Вас оборудование промышленного назначения, воспользовавшись поиском по сайту. Если Вас интересует определенное оборудование или комплектующие для промышленного оборудования, то вы можете заказать все необходимое Вам оборудование и уточнить цены на него с помощью удобной формы для оформления заказа.<br></p>\r\n','1'),
	(2,1,'Метр, без использования формальных признаков поэзии, интуитивно понятен',2,1,1,'2013-07-21 19:34:36','2013-10-16 19:27:46','2013-07-21 17:00:00','<div class=\"photo-box\"><div class=\"photo\">\r\n<p><img src=\"/data/content/images/photo-1.jpg\"></p>\r\n</div>\r\n<div class=\"info\"><div class=\"desc\">Сергей Гуриев</div>\r\n<div class=\"author color-gray\">Фото: Рамиль Ситдиков&nbsp;/ РИА Новости </div>\r\n</div>\r\n<div class=\"clear\"></div>\r\n</div>\r\n\r\n\r\n\r\n\r\n<p> Вы&nbsp;так&nbsp;же можете легко найти интересующее вас оборудование промышленного назначения, воспользовавшись поиском по&nbsp;сайту. Если вас интересует определенное оборудование или комплектующие для промышленного оборудования, то&nbsp;вы&nbsp;можете заказать все необходимое вам оборудование и&nbsp;уточнить цены на&nbsp;него с&nbsp;помощью удобной формы для оформления заказа. </p>\r\n\r\n\r\n\r\n\r\n<p> Компания GTS-Moscow имеет возможности поставки практически любых запасных частей и&nbsp;оборудование промышленного назначения иностранных производителей и&nbsp;даже тех производителей, которые работают на&nbsp;Российском рынке через свои официальные представительства Компания GTS-Moscow имеет возможности поставки практически любых запасных частей и&nbsp;оборудование промышленного назначения иностранных производителей и&nbsp;даже тех производителей, которые работают на&nbsp;Российском рынке через свои официальные представительства. </p>\r\n<h2>Фотографии</h2>\r\n<div class=\"photo-roll\"><div class=\"roll\"><a class=\"arrow left\" href=\"#\"></a><a class=\"arrow right\" href=\"#\"></a><div class=\"roll-viewport\"><div class=\"roll-container\"><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2-small.jpg\" alt=\"Photo 1\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1-small.jpg\" alt=\"Photo 2\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2-small.jpg\" alt=\"Photo 3\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1-small.jpg\" alt=\"Photo 4\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2-small.jpg\" alt=\"Photo 5\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1-small.jpg\" alt=\"Photo 6\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2-small.jpg\" alt=\"Photo 7\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1-small.jpg\" alt=\"Photo 8\"></a></div>\r\n</div>\r\n</div>\r\n<div class=\"picture\"><div class=\"picture-viewport\"><div class=\"picture-container\"><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2.jpg\" alt=\"Photo 1\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1.jpg\" alt=\"Photo 2\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2.jpg\" alt=\"Photo 3\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1.jpg\" alt=\"Photo 4\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2.jpg\" alt=\"Photo 5\"></a><a href=\"#\" class=\"photo\"><img src=\"img/photo-1.jpg\" alt=\"Photo 6\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-2.jpg\" alt=\"Photo 7\"></a><a href=\"#\" class=\"photo\"><img src=\"/data/samples/photo-1.jpg\" alt=\"Photo 8\"></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n<h2>Видео</h2>\r\n<div class=\"video-container\"><iframe width=\"100%\" height=\"450\" src=\"http://www.youtube.com/embed/GlWpNeIudkE\" frameborder=\"0\" allowfullscreen=\"\"></iframe></div>\r\n<div class=\"postscript\">Mercedes 2014 E-Class «Evening Star» Trailer</div>\r\n<br>\r\n<br>','<p>Вы так же можете легко найти интересующее Вас оборудование промышленного назначения, воспользовавшись поиском по сайту. Если Вас интересует определенное оборудование или комплектующие для промышленного оборудования, то вы можете заказать все необходимое Вам оборудование и уточнить цены на него с помощью удобной формы для оформления заказа.<br>\r\n</p>','1');

/*!40000 ALTER TABLE `section_19` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы section_20
# ------------------------------------------------------------

DROP TABLE IF EXISTS `section_20`;

CREATE TABLE `section_20` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `name` tinytext,
  `sort` int(11) NOT NULL DEFAULT '1',
  `creator_id` int(11) NOT NULL,
  `changer_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT '2013-07-21 22:33:00',
  `change_date` datetime NOT NULL DEFAULT '2013-07-21 22:33:00',
  `col_141` text,
  `col_142` text,
  `col_151` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `section_20` WRITE;
/*!40000 ALTER TABLE `section_20` DISABLE KEYS */;

INSERT INTO `section_20` (`id`, `publish`, `name`, `sort`, `creator_id`, `changer_id`, `creation_date`, `change_date`, `col_141`, `col_142`, `col_151`)
VALUES
	(147,1,'Заказ №147',147,0,0,'2013-07-21 22:33:00','2013-07-21 22:33:00','jkj','ruslanchek@me.com',2);

/*!40000 ALTER TABLE `section_20` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы section_22
# ------------------------------------------------------------

DROP TABLE IF EXISTS `section_22`;

CREATE TABLE `section_22` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `name` tinytext,
  `sort` int(11) NOT NULL DEFAULT '1',
  `creator_id` int(11) NOT NULL,
  `changer_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT '2013-10-17 04:19:00',
  `change_date` datetime NOT NULL DEFAULT '2013-10-17 04:19:00',
  `col_156` longtext,
  `col_157` longtext,
  `col_158` text,
  `col_161` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `section_22` WRITE;
/*!40000 ALTER TABLE `section_22` DISABLE KEYS */;

INSERT INTO `section_22` (`id`, `publish`, `name`, `sort`, `creator_id`, `changer_id`, `creation_date`, `change_date`, `col_156`, `col_157`, `col_158`, `col_161`)
VALUES
	(1,1,'AKG',1,1,1,'2013-10-17 04:40:12','2013-10-17 04:41:20','<p>Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;</p>','<p>Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;<br></p>','1','США'),
	(2,1,'Abrasivos Manhattan',2,1,1,'2013-10-17 04:41:27','2013-10-17 04:41:55','<p>Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;<br></p>','<p>Описание бренда&nbsp;Описание бренда&nbsp;<br></p>','1','США'),
	(3,1,'Ace Controls',3,1,1,'2013-10-17 04:41:56','2013-10-17 04:42:19','<p>Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;<br></p>','<p>Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;<br></p>','1','США'),
	(4,1,'Agilent Techologies',4,1,1,'2013-10-17 04:42:21','2013-10-17 04:42:44','<p>Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;<br></p>','<p>Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;Описание бренда&nbsp;<br></p>','1','США'),
	(6,1,'Test',5,1,1,'2013-10-17 04:43:07','2013-10-17 04:43:29','<p>TestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;Test<br></p>','<p>TestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;TestTestTestTest&nbsp;Test<br></p>','1','Test');

/*!40000 ALTER TABLE `section_22` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы section_3
# ------------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `section_3` WRITE;
/*!40000 ALTER TABLE `section_3` DISABLE KEYS */;

INSERT INTO `section_3` (`id`, `publish`, `name`, `sort`, `creator_id`, `changer_id`, `creation_date`, `change_date`, `col_33`)
VALUES
	(73,1,'Контакты',1,1,1,'2013-10-16 17:24:32','2013-10-16 17:26:08','<h4>Адрес</h4>\r\n<p> Россия, 121357, Москва, ул. Академика Королева, дом&nbsp;12, кор.&nbsp;3, пом. IV, ком. <nobr>1-9</nobr> </p>\r\n<h4>Телефоны</h4>\r\n<p> Общие вопросы: <nobr class=\"phone\">+7 (499) 792-68-04</nobr>;<br/>\r\n Факс: <nobr class=\"phone\">+7 (499) 792-68-05</nobr>;<br/>\r\n Отдел продаж: <nobr class=\"phone\">+7 (499) 792-69-65</nobr>;\r\n</p>\r\n<h4>E-mail</h4>\r\n<p> <a href=\"mailto:info@gtsmoscow.ru\">info@gtsmoscow.ru</a></p>\r\n<h4>Web</h4>\r\n<p> <a href=\"http://www.gts-moskow.ru\">www.gts-moskow.ru</a></p>');

/*!40000 ALTER TABLE `section_3` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text NOT NULL,
  `color` varchar(6) NOT NULL DEFAULT 'FFFFFF',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;

INSERT INTO `sections` (`id`, `name`, `description`, `color`, `sort`)
VALUES
	(3,'Страницы','','759494',NULL),
	(19,'Новости','','69DF1F',NULL),
	(18,'Слайдер','','376AA7',NULL),
	(20,'Заказы из формы','','CD6708',NULL),
	(22,'Производители','','BCED49',NULL);

/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы shop_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shop_categories`;

CREATE TABLE `shop_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `sort` int(11) DEFAULT NULL,
  `publish` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `shop_categories` WRITE;
/*!40000 ALTER TABLE `shop_categories` DISABLE KEYS */;

INSERT INTO `shop_categories` (`id`, `name`, `sort`, `publish`)
VALUES
	(3,'Категория товаров 3',3,1),
	(4,'Категория товаров 4',4,1);

/*!40000 ALTER TABLE `shop_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы shop_goods
# ------------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `shop_goods` WRITE;
/*!40000 ALTER TABLE `shop_goods` DISABLE KEYS */;

INSERT INTO `shop_goods` (`id`, `name`, `sort`, `publish`, `item_article`, `price`, `discount`, `category`, `item_picture`, `item_gallery`, `description`, `short_description`)
VALUES
	(10,'Товар 10',10,0,'',0,0,NULL,0,0,NULL,NULL);

/*!40000 ALTER TABLE `shop_goods` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы structure
# ------------------------------------------------------------

DROP TABLE IF EXISTS `structure`;

CREATE TABLE `structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `structure` WRITE;
/*!40000 ALTER TABLE `structure` DISABLE KEYS */;

INSERT INTO `structure` (`id`, `pid`)
VALUES
	(1,0),
	(50,1),
	(17,1),
	(70,1),
	(48,1),
	(53,17),
	(54,17),
	(49,1),
	(44,1);

/*!40000 ALTER TABLE `structure` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы structure_data
# ------------------------------------------------------------

DROP TABLE IF EXISTS `structure_data`;

CREATE TABLE `structure_data` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
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
  `private` tinyint(4) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `just_created` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `path` (`path`(2)),
  KEY `menu` (`menu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `structure_data` WRITE;
/*!40000 ALTER TABLE `structure_data` DISABLE KEYS */;

INSERT INTO `structure_data` (`id`, `pid`, `name`, `path`, `part`, `title`, `description`, `keywords`, `publish`, `sort`, `menu`, `mode`, `template`, `private`, `content_id`, `just_created`)
VALUES
	(1,0,'Главная','/',NULL,'','','',1,0,3,1,1,0,3,0),
	(44,1,'Контакты','/contacts/','contacts','','','',1,3,3,1,4,0,73,0),
	(17,1,'Новости','/news/','news','','','',1,4,0,2,2,0,0,0),
	(53,17,'Наряду с нейтральной лексикой логоэпистема многопланово','/news/naryadu-s-neytralnoy-leksikoy-logoepistema-mnogoplanovo/','naryadu-s-neytralnoy-leksikoy-logoepistema-mnogoplanovo','','','',1,5,0,3,2,NULL,1,0),
	(54,17,'Метр, без использования формальных признаков поэзии, интуитивно понятен','/news/metr_bez_ispolzovaniya/','metr_bez_ispolzovaniya','','','',1,6,0,3,2,NULL,2,0),
	(50,1,'Поиск','/search/','search','','','',1,7,0,10,3,0,3,0),
	(48,1,'Каталог','/catalog/','catalog','','','',1,1,3,0,10,0,3,0),
	(49,1,'Производители','/makers/','makers','','','',1,2,3,0,11,0,3,0),
	(70,1,'Карта сайта','/sitemap/','sitemap','Карта сайта','','',1,8,0,11,3,NULL,0,0);

/*!40000 ALTER TABLE `structure_data` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `va` (`name`),
  KEY `name` (`name`(2))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Дамп таблицы templates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `templates`;

CREATE TABLE `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `sort` int(11) DEFAULT NULL,
  `publish` tinyint(4) DEFAULT NULL,
  `file` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;

INSERT INTO `templates` (`id`, `name`, `sort`, `publish`, `file`)
VALUES
	(2,'Для новостей',4,1,'news.tpl'),
	(1,'Главная страница',6,1,'main.tpl'),
	(4,'Для контактов',7,1,'contacts.tpl'),
	(10,'Для каталога',10,1,'catalog.tpl'),
	(3,'Для внутренних (4/5)',8,1,'inner.tpl'),
	(11,'Для производителей',11,1,'makers.tpl');

/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `login`, `name`, `email`, `password`, `hash`, `ip`, `last`, `activity`, `group`, `publish`, `sort`)
VALUES
	(1,'admin','Admin','ruslanchek@gmail.com','d9b1d7db4cd6e70935368a1efb10e377','d810b3737917c3dbd0524ac596d816a1',0,'2013-10-17 04:55:54','2013-10-17 04:55:57',4,1,0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `auth_code` tinytext NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;

INSERT INTO `users_groups` (`id`, `name`, `auth_code`, `publish`, `sort`)
VALUES
	(4,'Администраторы','',1,4);

/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
