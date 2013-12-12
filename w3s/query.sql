CREATE TABLE `ИМЯ_ТАБЛИЦЫ` (
 `url` varchar(255) NOT NULL default '',
 `referrer` text NOT NULL,
 `title` text NOT NULL,
 `text` mediumtext NOT NULL,
 `md5` varchar(33) NOT NULL default '',
 `lastupdate` int(10) unsigned NOT NULL default '0',
 UNIQUE KEY `url` (`url`),
 UNIQUE KEY `md5` (`md5`)
);

INSERT INTO `ИМЯ_ТАБЛИЦЫ` VALUES ('/', '', '', '', '', 0);

CREATE TABLE `ИМЯ_ТАБЛИЦЫ_cache` (
  `key` varchar(32) NOT NULL default '',
  `date` int(10) unsigned NOT NULL default '0',
  `count` int(10) unsigned NOT NULL default '0',
  `pages` text,
  `query` varchar(255) NOT NULL default '',
  `words` text NOT NULL,
  PRIMARY KEY  (`key`)
);