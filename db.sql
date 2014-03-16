CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `width` int(5) unsigned NOT NULL,
  `height` int(5) unsigned NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `owner` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `height` (`height`),
  KEY `width` (`width`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;