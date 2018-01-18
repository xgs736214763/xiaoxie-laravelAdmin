#MySQL 备份
#Host: 127.0.0.1 
#Date: 2017-12-29 14:02:33 
#Databases: kfclaravel 
#禁用外键约束
SET FOREIGN_KEY_CHECKS=0;
set names 'utf8'; 
# Structure for table migrations 
 DROP TABLE IF EXISTS migrations; 
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 
# Data for table kfclaravel 
 INSERT INTO migrations(`migration`,`batch`) VALUES ('2014_10_12_000000_create_users_table','1');
 INSERT INTO migrations(`migration`,`batch`) VALUES ('2014_10_12_100000_create_password_resets_table','1');
 INSERT INTO migrations(`migration`,`batch`) VALUES ('2016_05_25_054817_entrust_setup_tables','1');

