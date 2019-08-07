CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`)
VALUES
	(1,'admin','Admin'),
	(2,'members','Member');

CREATE TABLE `languages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `google_code` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `languages` (`id`, `name`, `code`, `google_code`)
VALUES
	(1,'Abkhazian','abk',NULL),
	(2,'Afar','aar',NULL),
	(3,'Afrikaans','afr',NULL),
	(4,'Akan','aka',NULL),
	(5,'Albanian','alb','sq'),
	(6,'Amharic','amh','am'),
	(7,'Arabic (Standard)','arb','ar'),
	(8,'Aragonese','arg',NULL),
	(9,'Armenian','arm',NULL),
	(10,'Assamese','asm',NULL),
	(11,'Avaric','ava',NULL),
	(12,'Avestan','ave',NULL),
	(13,'Aymara','aym',NULL),
	(14,'Azerbaijani','aze',NULL),
	(15,'Bambara','bam',NULL),
	(16,'Bashkir','bak',NULL),
	(17,'Basque','baq','eu'),
	(18,'Belarusian','bel',NULL),
	(19,'Bengali','ben','bn'),
	(20,'Bihari languages','bih',NULL),
	(21,'Bislama','bis',NULL),
	(22,'Bosnian','bos',NULL),
	(23,'Breton','bre',NULL),
	(24,'Bulgarian','bul','bg'),
	(25,'Burmese','bur',NULL),
	(26,'Catalan, Valencian','cat',NULL),
	(27,'Chamorro','cha',NULL),
	(28,'Chechen','che',NULL),
	(29,'Chichewa, Chewa, Nyanja','nya',NULL),
	(30,'Chinese','chi','zh'),
	(31,'Chuvash','chv',NULL),
	(32,'Cornish','cor',NULL),
	(33,'Corsican','cos',NULL),
	(34,'Cree','cre',NULL),
	(35,'Croatian','hrv','hr'),
	(36,'Czech','cze','cs'),
	(37,'Danish','dan','da'),
	(38,'Divehi, Dhivehi, Maldivian','div',NULL),
	(39,'Dutch, Flemish','dut','nl'),
	(40,'Dzongkha','dzo',NULL),
	(41,'English','eng',NULL),
	(42,'Esperanto','epo',NULL),
	(43,'Estonian','est','et'),
	(44,'Ewe','ewe',NULL),
	(45,'Faroese','fao',NULL),
	(46,'Fijian','fij',NULL),
	(47,'Finnish','fin','fi'),
	(48,'French','fre','fr'),
	(49,'Fulah','ful',NULL),
	(50,'Galician','glg',NULL),
	(51,'Georgian','geo',NULL),
	(52,'German','ger','de'),
	(53,'Greek, Modern (1453-)','gre','el'),
	(54,'Guarani','grn',NULL),
	(55,'Gujarati','guj','gu'),
	(56,'Haitian, Haitian Creole','hat',NULL),
	(57,'Hausa','hau',NULL),
	(58,'Hebrew','heb','iw'),
	(59,'Herero','her',NULL),
	(60,'Hindi','hin','hi'),
	(61,'Hiri Motu','hmo',NULL),
	(62,'Hungarian','hun','hu'),
	(63,'Indonesian','ind','id'),
	(64,'Interlingue, Occidental','ile',NULL),
	(65,'Irish','gle',NULL),
	(66,'Igbo','ibo',NULL),
	(67,'Inupiaq','ipk',NULL),
	(68,'Ido','ido',NULL),
	(69,'Icelandic','ice','is'),
	(70,'Italian','ita','it'),
	(71,'Inuktitut','iku',NULL),
	(72,'Japanese','jpn','ja'),
	(73,'Javanese','jav',NULL),
	(74,'Kalaallisut, Greenlandic','kal',NULL),
	(75,'Kannada','kan','kn'),
	(76,'Kanuri','kau',NULL),
	(77,'Kashmiri','kas',NULL),
	(78,'Kazakh','kaz',NULL),
	(79,'Central Khmer','khm',NULL),
	(80,'Kikuyu, Gikuyu','kik',NULL),
	(81,'Kinyarwanda','kin',NULL),
	(82,'Kirghiz, Kyrgyz','kir',NULL),
	(83,'Komi','kom',NULL),
	(84,'Kongo','kon',NULL),
	(85,'Korean','kor','ko'),
	(86,'Kurdish','kur',NULL),
	(87,'Kuanyama, Kwanyama','kua',NULL),
	(88,'Latin','lat',NULL),
	(89,'Luxembourgish, Letzeburgesch','ltz',NULL),
	(90,'Ganda','lug',NULL),
	(91,'Limburgan, Limburger, Limburgish','lim',NULL),
	(92,'Lingala','lin',NULL),
	(93,'Lao','lao',NULL),
	(94,'Lithuanian','lit','lt'),
	(95,'Luba-Katanga','lub',NULL),
	(96,'Latvian','lav',NULL),
	(97,'Manx','glv',NULL),
	(98,'Macedonian','mac',NULL),
	(99,'Malagasy','mlg',NULL),
	(100,'Malay','may','ms'),
	(101,'Malayalam','mal','ml'),
	(102,'Maltese','mlt',NULL),
	(103,'Maori','mao',NULL),
	(104,'Marathi','mar','mr'),
	(105,'Marshallese','mah',NULL),
	(106,'Mongolian','mon',NULL),
	(107,'Nauru','nau',NULL),
	(108,'Navajo, Navaho','nav',NULL),
	(109,'North Ndebele','nde',NULL),
	(110,'Nepali','nep',NULL),
	(111,'Ndonga','ndo',NULL),
	(112,'Norwegian Bokmål','nob',NULL),
	(113,'Norwegian Nynorsk','nno',NULL),
	(114,'Norwegian','nor','no'),
	(115,'Sichuan Yi, Nuosu','iii',NULL),
	(116,'South Ndebele','nbl',NULL),
	(117,'Occitan','oci',NULL),
	(118,'Ojibwa','oji',NULL),
	(119,'Oromo','orm',NULL),
	(120,'Oriya','ori',NULL),
	(121,'Ossetian, Ossetic','oss',NULL),
	(122,'Panjabi, Punjabi','pan',NULL),
	(123,'Pali','pli',NULL),
	(124,'Persian','per',NULL),
	(125,'Polish','pol','pl'),
	(126,'Pashto, Pushto','pus',NULL),
	(127,'Portuguese','por','pt'),
	(128,'Quechua','que',NULL),
	(129,'Romansh','roh',NULL),
	(130,'Rundi','run',NULL),
	(131,'Romanian, Moldavian, Moldovan','rum','ro'),
	(132,'Russian','rus','ru'),
	(133,'Sanskrit','san',NULL),
	(134,'Sardinian','srd',NULL),
	(135,'Sindhi','snd',NULL),
	(136,'Northern Sami','sme',NULL),
	(137,'Samoan','smo',NULL),
	(138,'Sango','sag',NULL),
	(139,'Serbian','srp','sr'),
	(140,'Gaelic, Scottish Gaelic','gla',NULL),
	(141,'Shona','sna',NULL),
	(142,'Sinhala, Sinhalese','sin',NULL),
	(143,'Slovak','slo','sk'),
	(144,'Slovenian','slv','sl'),
	(145,'Somali','som',NULL),
	(146,'Southern Sotho','sot',NULL),
	(147,'Spanish, Castilian','spa','es'),
	(148,'Sundanese','sun',NULL),
	(149,'Swahili','swa','sw'),
	(150,'Swati','ssw',NULL),
	(151,'Swedish','swe','sv'),
	(152,'Tamil','tam','ta'),
	(153,'Telugu','tel','te'),
	(154,'Tajik','tgk',NULL),
	(155,'Thai','tha','th'),
	(156,'Tigrinya','tir',NULL),
	(157,'Tibetan','tib',NULL),
	(158,'Turkmen','tuk',NULL),
	(159,'Tagalog','tgl','fil'),
	(160,'Tswana','tsn',NULL),
	(161,'Tonga (Tonga Islands)','ton',NULL),
	(162,'Turkish','tur','tr'),
	(163,'Tsonga','tso',NULL),
	(164,'Tatar','tat',NULL),
	(165,'Twi','twi',NULL),
	(166,'Tahitian','tah',NULL),
	(167,'Uighur, Uyghur','uig',NULL),
	(168,'Ukrainian','ukr','uk'),
	(169,'Urdu','urd','ur'),
	(170,'Uzbek','uzb',NULL),
	(171,'Venda','ven',NULL),
	(172,'Vietnamese','vie','vi'),
	(173,'Volapük','vol',NULL),
	(174,'Walloon','wln',NULL),
	(175,'Welsh','wel','cy'),
	(176,'Wolof','wol',NULL),
	(177,'Western Frisian','fry',NULL),
	(178,'Xhosa','xho',NULL),
	(179,'Yiddish','yid',NULL),
	(180,'Yoruba','yor',NULL),
	(181,'Zhuang, Chuang','zha',NULL),
	(182,'Zulu','zul',NULL);


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
  `pro_translator` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  KEY `mother_language_id` (`mother_language_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`mother_language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `cover_image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `page_count` int(4) DEFAULT NULL,
  `type` enum('book','booklet','magabook','tract') DEFAULT 'book',
  `xliff_file` varchar(255) DEFAULT NULL,
  `audience` varchar(255) DEFAULT NULL,
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
  `series_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `series_id` (`series_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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

CREATE TABLE `product_sections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `xliff_region` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_sections_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


CREATE TABLE `product_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text,
  `section_id` int(11) unsigned NOT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT '0',
  `xliff_tag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `product_content_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `product_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `project_content_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `is_approved` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_content_status_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `product_content` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_content_status_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `project_content_approval` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `approved_by` int(11) unsigned NOT NULL,
  `approved_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `approved_by` (`approved_by`),
  KEY `content_id` (`content_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_content_approval_ibfk_5` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  CONSTRAINT `project_content_approval_ibfk_6` FOREIGN KEY (`content_id`) REFERENCES `product_content` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_content_approval_ibfk_7` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `project_members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `type` enum('translator','reviewer', 'manager') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_members_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `user_languages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `language_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_languages` (`user_id`,`language_id`),
  KEY `user_id` (`user_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `user_languages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `user_languages_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
