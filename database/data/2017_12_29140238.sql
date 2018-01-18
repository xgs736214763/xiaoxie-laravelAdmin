#MySQL 备份
#Host: 127.0.0.1 
#Date: 2017-12-29 14:02:38 
#Databases: kfclaravel 
#禁用外键约束
SET FOREIGN_KEY_CHECKS=0;
set names 'utf8'; 
# Structure for table permission_role 
 DROP TABLE IF EXISTS permission_role; 
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 
# Data for table kfclaravel 

