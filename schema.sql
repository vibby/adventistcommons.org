# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25)
# Database: adventistcommons
# Generation Time: 2019-06-12 16:13:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table groups
# ------------------------------------------------------------

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `description`)
VALUES
	(1,'admin','Admin'),
	(2,'members','Member');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table languages
# ------------------------------------------------------------

CREATE TABLE `languages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;

INSERT INTO `languages` (`id`, `name`, `code`)
VALUES
	(1,'Abkhazian','abk'),
	(2,'Afar','aar'),
	(3,'Afrikaans','afr'),
	(4,'Akan','aka'),
	(5,'Albanian','alb'),
	(6,'Amharic','amh'),
	(7,'Arabic (Standard)','arb'),
	(8,'Aragonese','arg'),
	(9,'Armenian','arm'),
	(10,'Assamese','asm'),
	(11,'Avaric','ava'),
	(12,'Avestan','ave'),
	(13,'Aymara','aym'),
	(14,'Azerbaijani','aze'),
	(15,'Bambara','bam'),
	(16,'Bashkir','bak'),
	(17,'Basque','baq'),
	(18,'Belarusian','bel'),
	(19,'Bengali','ben'),
	(20,'Bihari languages','bih'),
	(21,'Bislama','bis'),
	(22,'Bosnian','bos'),
	(23,'Breton','bre'),
	(24,'Bulgarian','bul'),
	(25,'Burmese','bur'),
	(26,'Catalan, Valencian','cat'),
	(27,'Chamorro','cha'),
	(28,'Chechen','che'),
	(29,'Chichewa, Chewa, Nyanja','nya'),
	(30,'Chinese','chi'),
	(31,'Chuvash','chv'),
	(32,'Cornish','cor'),
	(33,'Corsican','cos'),
	(34,'Cree','cre'),
	(35,'Croatian','hrv'),
	(36,'Czech','cze'),
	(37,'Danish','dan'),
	(38,'Divehi, Dhivehi, Maldivian','div'),
	(39,'Dutch, Flemish','dut'),
	(40,'Dzongkha','dzo'),
	(41,'English','eng'),
	(42,'Esperanto','epo'),
	(43,'Estonian','est'),
	(44,'Ewe','ewe'),
	(45,'Faroese','fao'),
	(46,'Fijian','fij'),
	(47,'Finnish','fin'),
	(48,'French','fre'),
	(49,'Fulah','ful'),
	(50,'Galician','glg'),
	(51,'Georgian','geo'),
	(52,'German','ger'),
	(53,'Greek, Modern (1453-)','gre'),
	(54,'Guarani','grn'),
	(55,'Gujarati','guj'),
	(56,'Haitian, Haitian Creole','hat'),
	(57,'Hausa','hau'),
	(58,'Hebrew','heb'),
	(59,'Herero','her'),
	(60,'Hindi','hin'),
	(61,'Hiri Motu','hmo'),
	(62,'Hungarian','hun'),
	(63,'Indonesian','ind'),
	(64,'Interlingue, Occidental','ile'),
	(65,'Irish','gle'),
	(66,'Igbo','ibo'),
	(67,'Inupiaq','ipk'),
	(68,'Ido','ido'),
	(69,'Icelandic','ice'),
	(70,'Italian','ita'),
	(71,'Inuktitut','iku'),
	(72,'Japanese','jpn'),
	(73,'Javanese','jav'),
	(74,'Kalaallisut, Greenlandic','kal'),
	(75,'Kannada','kan'),
	(76,'Kanuri','kau'),
	(77,'Kashmiri','kas'),
	(78,'Kazakh','kaz'),
	(79,'Central Khmer','khm'),
	(80,'Kikuyu, Gikuyu','kik'),
	(81,'Kinyarwanda','kin'),
	(82,'Kirghiz, Kyrgyz','kir'),
	(83,'Komi','kom'),
	(84,'Kongo','kon'),
	(85,'Korean','kor'),
	(86,'Kurdish','kur'),
	(87,'Kuanyama, Kwanyama','kua'),
	(88,'Latin','lat'),
	(89,'Luxembourgish, Letzeburgesch','ltz'),
	(90,'Ganda','lug'),
	(91,'Limburgan, Limburger, Limburgish','lim'),
	(92,'Lingala','lin'),
	(93,'Lao','lao'),
	(94,'Lithuanian','lit'),
	(95,'Luba-Katanga','lub'),
	(96,'Latvian','lav'),
	(97,'Manx','glv'),
	(98,'Macedonian','mac'),
	(99,'Malagasy','mlg'),
	(100,'Malay','may'),
	(101,'Malayalam','mal'),
	(102,'Maltese','mlt'),
	(103,'Maori','mao'),
	(104,'Marathi','mar'),
	(105,'Marshallese','mah'),
	(106,'Mongolian','mon'),
	(107,'Nauru','nau'),
	(108,'Navajo, Navaho','nav'),
	(109,'North Ndebele','nde'),
	(110,'Nepali','nep'),
	(111,'Ndonga','ndo'),
	(112,'Norwegian Bokmål','nob'),
	(113,'Norwegian Nynorsk','nno'),
	(114,'Norwegian','nor'),
	(115,'Sichuan Yi, Nuosu','iii'),
	(116,'South Ndebele','nbl'),
	(117,'Occitan','oci'),
	(118,'Ojibwa','oji'),
	(119,'Oromo','orm'),
	(120,'Oriya','ori'),
	(121,'Ossetian, Ossetic','oss'),
	(122,'Panjabi, Punjabi','pan'),
	(123,'Pali','pli'),
	(124,'Persian','per'),
	(125,'Polish','pol'),
	(126,'Pashto, Pushto','pus'),
	(127,'Portuguese','por'),
	(128,'Quechua','que'),
	(129,'Romansh','roh'),
	(130,'Rundi','run'),
	(131,'Romanian, Moldavian, Moldovan','rum'),
	(132,'Russian','rus'),
	(133,'Sanskrit','san'),
	(134,'Sardinian','srd'),
	(135,'Sindhi','snd'),
	(136,'Northern Sami','sme'),
	(137,'Samoan','smo'),
	(138,'Sango','sag'),
	(139,'Serbian','srp'),
	(140,'Gaelic, Scottish Gaelic','gla'),
	(141,'Shona','sna'),
	(142,'Sinhala, Sinhalese','sin'),
	(143,'Slovak','slo'),
	(144,'Slovenian','slv'),
	(145,'Somali','som'),
	(146,'Southern Sotho','sot'),
	(147,'Spanish, Castilian','spa'),
	(148,'Sundanese','sun'),
	(149,'Swahili','swa'),
	(150,'Swati','ssw'),
	(151,'Swedish','swe'),
	(152,'Tamil','tam'),
	(153,'Telugu','tel'),
	(154,'Tajik','tgk'),
	(155,'Thai','tha'),
	(156,'Tigrinya','tir'),
	(157,'Tibetan','tib'),
	(158,'Turkmen','tuk'),
	(159,'Tagalog','tgl'),
	(160,'Tswana','tsn'),
	(161,'Tonga (Tonga Islands)','ton'),
	(162,'Turkish','tur'),
	(163,'Tsonga','tso'),
	(164,'Tatar','tat'),
	(165,'Twi','twi'),
	(166,'Tahitian','tah'),
	(167,'Uighur, Uyghur','uig'),
	(168,'Ukrainian','ukr'),
	(169,'Urdu','urd'),
	(170,'Uzbek','uzb'),
	(171,'Venda','ven'),
	(172,'Vietnamese','vie'),
	(173,'Volapük','vol'),
	(174,'Walloon','wln'),
	(175,'Welsh','wel'),
	(176,'Wolof','wol'),
	(177,'Western Frisian','fry'),
	(178,'Xhosa','xho'),
	(179,'Yiddish','yid'),
	(180,'Yoruba','yor'),
	(181,'Zhuang, Chuang','zha'),
	(182,'Zulu','zul');

/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table login_attempts
# ------------------------------------------------------------

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table product_attachments
# ------------------------------------------------------------

CREATE TABLE `product_attachments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(11) unsigned DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_type` enum('pdf_printing','pdf_personal','indd') DEFAULT NULL,
  `product_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `language_id` (`language_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_attachments_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `product_attachments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table product_content
# ------------------------------------------------------------

CREATE TABLE `product_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `content` text,
  `section_id` int(11) unsigned NOT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `product_content_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_content_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `product_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table product_content_log
# ------------------------------------------------------------

CREATE TABLE `product_content_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `project_id` int(11) unsigned DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` enum('approved','error') DEFAULT NULL,
  `is_resolved` tinyint(1) NOT NULL,
  `resolved_by` int(11) unsigned DEFAULT NULL,
  `resolved_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`),
  KEY `resolved_by` (`resolved_by`),
  CONSTRAINT `product_content_log_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `product_content` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_content_log_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_content_log_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_content_log_ibfk_4` FOREIGN KEY (`resolved_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table product_content_revisions
# ------------------------------------------------------------

CREATE TABLE `product_content_revisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `product_content_revisions_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `product_content` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_content_revisions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_content_revisions_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table product_sections
# ------------------------------------------------------------

CREATE TABLE `product_sections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `xliff_region` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_sections_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table products
# ------------------------------------------------------------

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `cover_image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `page_count` int(4) DEFAULT NULL,
  `type` enum('book','booklet','magabook','tract') DEFAULT 'book',
  `xliff_file` varchar(255) DEFAULT NULL,
  `audience` varchar(32) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `format_open` varchar(32) DEFAULT NULL,
  `format_closed` varchar(32) DEFAULT NULL,
  `cover_colors` varchar(32) DEFAULT NULL,
  `cover_paper` varchar(32) DEFAULT NULL,
  `interior_colors` varchar(32) DEFAULT NULL,
  `interior_paper` varchar(32) DEFAULT NULL,
  `binding` varchar(32) DEFAULT NULL,
  `finishing` varchar(32) DEFAULT NULL,
  `publisher_website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table project_content_status
# ------------------------------------------------------------

CREATE TABLE `project_content_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `is_approved` tinyint(1) unsigned NOT NULL,
  `approved_by` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `project_id` (`project_id`),
  KEY `approved_by` (`approved_by`),
  CONSTRAINT `project_content_status_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `product_content` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_content_status_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_content_status_ibfk_3` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table project_members
# ------------------------------------------------------------

CREATE TABLE `project_members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `type` enum('translator','reviewer') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_members_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table projects
# ------------------------------------------------------------

CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `language_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user_languages
# ------------------------------------------------------------

CREATE TABLE `user_languages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `language_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `user_languages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `user_languages_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `bio` text,
  `mother_language_id` int(11) unsigned DEFAULT NULL,
  `skills` text,
  `product_notify` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  KEY `mother_language_id` (`mother_language_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`mother_language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users_groups
# ------------------------------------------------------------

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
