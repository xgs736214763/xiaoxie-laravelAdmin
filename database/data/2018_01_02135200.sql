#MySQL 备份
#Host: 127.0.0.1 
#Date: 2018-01-02 13:52:00 
#Databases: kfclaravel 
#禁用外键约束
SET FOREIGN_KEY_CHECKS=0;
set names 'utf8'; 
# Structure for table test123
 DROP TABLE IF EXISTS test123;
CREATE TABLE `test123` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
# Data for table kfclaravel

