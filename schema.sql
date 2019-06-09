# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25)
# Database: adventistcommons
# Generation Time: 2019-06-09 15:25:03 +0000
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

DROP TABLE IF EXISTS `groups`;

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

DROP TABLE IF EXISTS `languages`;

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

DROP TABLE IF EXISTS `login_attempts`;

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`)
VALUES
	(1,'::1','bob@jones.bob',1559787186);

/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_attachments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_attachments`;

LOCK TABLES `product_attachments` WRITE;
/*!40000 ALTER TABLE `product_attachments` DISABLE KEYS */;

INSERT INTO `product_attachments` (`id`, `language_id`, `file`, `file_type`, `product_id`)
VALUES
	(2,3,'83eccf6fc5ca3effb79173a9e6aad2e9.pdf','pdf_printing',16);

/*!40000 ALTER TABLE `product_attachments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_content
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_content`;

LOCK TABLES `product_content` WRITE;
/*!40000 ALTER TABLE `product_content` DISABLE KEYS */;

INSERT INTO `product_content` (`id`, `product_id`, `content`, `section_id`, `is_hidden`)
VALUES
	(5,16,'Hey there',3,0);

/*!40000 ALTER TABLE `product_content` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_content_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_content_log`;

LOCK TABLES `product_content_log` WRITE;
/*!40000 ALTER TABLE `product_content_log` DISABLE KEYS */;

INSERT INTO `product_content_log` (`id`, `content_id`, `user_id`, `project_id`, `comment`, `created_at`, `type`, `is_resolved`, `resolved_by`, `resolved_on`)
VALUES
	(50,5,3,6,NULL,'2019-06-05 19:06:19','approved',0,NULL,NULL),
	(51,5,3,6,'h','2019-06-05 19:06:30','error',0,NULL,NULL),
	(52,5,3,6,'6','2019-06-05 19:07:36','error',0,NULL,NULL);

/*!40000 ALTER TABLE `product_content_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_content_revisions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_content_revisions`;

LOCK TABLES `product_content_revisions` WRITE;
/*!40000 ALTER TABLE `product_content_revisions` DISABLE KEYS */;

INSERT INTO `product_content_revisions` (`id`, `content_id`, `user_id`, `project_id`, `content`, `created_at`)
VALUES
	(16,5,3,6,'Test','2019-06-05 19:04:59'),
	(17,5,3,6,'Test77','2019-06-06 12:32:50');

/*!40000 ALTER TABLE `product_content_revisions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_sections`;

LOCK TABLES `product_sections` WRITE;
/*!40000 ALTER TABLE `product_sections` DISABLE KEYS */;

INSERT INTO `product_sections` (`id`, `product_id`, `name`, `xliff_region`)
VALUES
	(3,16,'Test',NULL);

/*!40000 ALTER TABLE `product_sections` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `description`, `cover_image`, `author`, `page_count`, `type`, `xliff_file`, `audience`, `publisher`, `format_open`, `format_closed`, `cover_colors`, `cover_paper`, `interior_colors`, `interior_paper`, `binding`, `finishing`, `publisher_website`)
VALUES
	(16,'Bible Answers ','Violence, rape, tornadoes, floods, abuse, fires, random shootings. Is there hope? Do you have a future? Can you survive without God answering life’s greatest challenges?','89fb4ae4491c99f60b13ef212af65cfe.jpg','Unkown',120,'magabook',NULL,'Christian','Pacific Press','10.4 x 41 cm','10.4 x 20.5 cm','4 CMYK / 0','Intercoat 220 GSM','4 CMYK / 4 CMYK','Woodfree 100 GSM','Spiral Bound','Cellophane Glossy Recto',NULL);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_content_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_content_status`;

LOCK TABLES `project_content_status` WRITE;
/*!40000 ALTER TABLE `project_content_status` DISABLE KEYS */;

INSERT INTO `project_content_status` (`id`, `content_id`, `project_id`, `is_approved`, `approved_by`)
VALUES
	(9,5,6,0,NULL);

/*!40000 ALTER TABLE `project_content_status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_members`;

LOCK TABLES `project_members` WRITE;
/*!40000 ALTER TABLE `project_members` DISABLE KEYS */;

INSERT INTO `project_members` (`id`, `user_id`, `project_id`, `type`)
VALUES
	(8,4,6,'translator'),
	(9,3,6,'translator');

/*!40000 ALTER TABLE `project_members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`id`, `product_id`, `language_id`, `status`)
VALUES
	(6,16,5,0);

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_languages`;

LOCK TABLES `user_languages` WRITE;
/*!40000 ALTER TABLE `user_languages` DISABLE KEYS */;

INSERT INTO `user_languages` (`id`, `user_id`, `language_id`)
VALUES
	(32,3,2),
	(33,3,3);

/*!40000 ALTER TABLE `user_languages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `location`, `bio`, `mother_language_id`, `skills`)
VALUES
	(1,'127.0.0.1','administrator','$2y$12$BJo4uOfqIRXdRu4vcgpXBu6rDFuVfm2CZJfeeoFNtGs1I.Mqk1u9u','admin@admin.com',NULL,'',NULL,NULL,NULL,NULL,NULL,1268889823,1553122313,1,'Admin','istrator','ADMIN','0',NULL,NULL,NULL,NULL),
	(3,'127.0.0.1','akjackson1@gmail.com','$2y$12$JwffLCBR46i/mYBlD5xpe.9Q6rYpcTVhfY2I14ysMYIGyvCLJRUi.','akjackson1@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1553183644,1559768138,1,'Adam','Jackson',NULL,NULL,'Oregon','Australian',3,'a:2:{i:0;s:14:\"Graphic design\";i:1;s:15:\"Web development\";}'),
	(4,'212.36.208.50','eckertdm@gmail.com','$2y$10$S4KGFYo6ZUMk4sI/Uy5BI.PqbO/m3txePSwa7uW0ef4DRWEuz/IWy','eckertdm@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1553796703,1556630034,1,'Michael','Eckert',NULL,NULL,'Lebanon','Publishing director',NULL,NULL),
	(5,'::1','bob@jones.com','$2y$10$1vpUAjKb4hXAawaDjh/lbuJrmgyRuNsu9iv9SeXo9OmOBVguw.3m2','bob@jones.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1559786931,1559787191,1,'Bob','Jones',NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_groups`;

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`)
VALUES
	(2,1,2),
	(4,3,1),
	(7,4,2),
	(8,5,2);

/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
