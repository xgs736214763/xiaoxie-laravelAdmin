#MySQL 备份
#Host: 127.0.0.1 
#Date: 2018-01-02 14:02:13 
#Databases: kfclaravel 
#禁用外键约束
SET FOREIGN_KEY_CHECKS=0;
set names 'utf8'; 
# Structure for table logs
 DROP TABLE IF EXISTS logs;
CREATE TABLE `logs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `ip` char(15) DEFAULT NULL COMMENT 'ip',
  `city` varchar(25) DEFAULT NULL COMMENT '城市名称',
  `info` varchar(255) DEFAULT NULL COMMENT '操作信息',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '登陆时间',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='登录日志';
# Data for table kfclaravel
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('1','1','127.0.0.1','','登陆成功','2017-12-14 18:12:44','2017-12-14 18:12:44');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('2','1','127.0.0.1','','登陆成功','2017-12-14 18:14:25','2017-12-14 18:14:25');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('3','1','127.0.0.1','','退出','2017-12-14 18:14:33','2017-12-14 18:14:33');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('4','1','127.0.0.1','','登陆成功','2017-12-14 18:15:26','2017-12-14 18:15:26');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('5','1','127.0.0.1','','退出','2017-12-14 18:16:54','2017-12-14 18:16:54');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('6','1','127.0.0.1','','登陆成功','2017-12-14 18:17:10','2017-12-14 18:17:10');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('7','1','127.0.0.1','','退出','2017-12-14 18:17:23','2017-12-14 18:17:23');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('8','1','127.0.0.1','','登陆成功','2017-12-14 18:18:05','2017-12-14 18:18:05');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('9','1','127.0.0.1','','退出','2017-12-14 18:21:25','2017-12-14 18:21:25');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('10','1','127.0.0.1','','登陆成功','2017-12-17 17:11:48','2017-12-17 17:11:48');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('11','1','127.0.0.1','','登陆成功','2017-12-17 22:10:10','2017-12-17 22:10:10');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('12','1','127.0.0.1','','登陆成功','2017-12-18 13:09:15','2017-12-18 13:09:15');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('13','1','127.0.0.1','','登陆成功','2017-12-19 13:53:03','2017-12-19 13:53:03');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('14','1','127.0.0.1','','登陆成功','2017-12-20 09:21:44','2017-12-20 09:21:44');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('15','1','127.0.0.1','','登陆成功','2017-12-20 14:12:48','2017-12-20 14:12:48');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('16','1','127.0.0.1','  ','登陆成功','2017-12-20 19:05:07','2017-12-20 19:05:07');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('17','1','127.0.0.1','  ','登陆成功','2017-12-25 10:47:22','2017-12-25 10:47:22');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('18','1','127.0.0.1','  ','登陆成功','2017-12-26 17:52:40','2017-12-26 17:52:40');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('19','1','127.0.0.1','  ','登陆成功','2017-12-27 09:43:55','2017-12-27 09:43:55');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('20','1','127.0.0.1','  ','登陆成功','2017-12-28 09:05:58','2017-12-28 09:05:58');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('21','1','127.0.0.1','  ','登陆成功','2017-12-28 13:31:08','2017-12-28 13:31:08');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('22','1','127.0.0.1','  ','登陆成功','2017-12-28 14:05:46','2017-12-28 14:05:46');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('23','1','127.0.0.1','  ','登陆成功','2017-12-28 15:26:56','2017-12-28 15:26:56');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('24','1','127.0.0.1','  ','登陆成功','2017-12-28 15:31:06','2017-12-28 15:31:06');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('25','1','127.0.0.1','  ','登陆成功','2017-12-29 09:11:21','2017-12-29 09:11:21');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('26','1','127.0.0.1','  ','登陆成功','2017-12-29 10:27:36','2017-12-29 10:27:36');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('27','1','127.0.0.1','  ','登陆成功','2017-12-29 12:03:05','2017-12-29 12:03:05');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('28','1','127.0.0.1','  ','登陆成功','2017-12-29 17:15:12','2017-12-29 17:15:12');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('29','1','127.0.0.1','  ','登陆成功','2017-12-29 17:26:33','2017-12-29 17:26:33');
 INSERT INTO logs(`Id`,`user_id`,`ip`,`city`,`info`,`created_at`,`updated_at`) VALUES ('30','1','127.0.0.1','  ','登陆成功','2018-01-02 09:49:29','2018-01-02 09:49:29');

# Structure for table messages
 DROP TABLE IF EXISTS messages;
CREATE TABLE `messages` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) DEFAULT '' COMMENT '标题',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `content` text COMMENT '内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='留言板';
# Data for table kfclaravel
 INSERT INTO messages(`Id`,`title`,`email`,`content`,`created_at`,`updated_at`) VALUES ('1','test','736214763@qq.com','this is test','2017-12-27 12:03:38','2017-12-27 12:03:38');
 INSERT INTO messages(`Id`,`title`,`email`,`content`,`created_at`,`updated_at`) VALUES ('2','test','736214763@qq.com','dsfdfsd','2017-12-27 12:07:11','2017-12-27 12:07:11');
 INSERT INTO messages(`Id`,`title`,`email`,`content`,`created_at`,`updated_at`) VALUES ('3','test','736214763@qq.com','234werwer','2017-12-27 12:12:09','2017-12-27 12:12:09');
 INSERT INTO messages(`Id`,`title`,`email`,`content`,`created_at`,`updated_at`) VALUES ('4','cesgu','736214763@qq.com','dasdas','2017-12-27 12:53:07','2017-12-27 12:53:07');
 INSERT INTO messages(`Id`,`title`,`email`,`content`,`created_at`,`updated_at`) VALUES ('5','1111','736214763@qq.com','111111','2017-12-27 12:53:46','2017-12-27 12:53:46');
 INSERT INTO messages(`Id`,`title`,`email`,`content`,`created_at`,`updated_at`) VALUES ('6','2323','736214763@qq.com','fdsfdfds','2017-12-27 12:55:04','2017-12-27 12:55:04');
 INSERT INTO messages(`Id`,`title`,`email`,`content`,`created_at`,`updated_at`) VALUES ('7','7777','736214763@qq.com','fsdfsf','2017-12-27 13:03:58','2017-12-27 13:03:58');
 INSERT INTO messages(`Id`,`title`,`email`,`content`,`created_at`,`updated_at`) VALUES ('8','thfg','736214763@qq.com','ghhhf','2017-12-27 13:19:09','2017-12-27 13:19:09');
 INSERT INTO messages(`Id`,`title`,`email`,`content`,`created_at`,`updated_at`) VALUES ('9','dfgf','736214763@qq.com','fhjfgh','2017-12-27 13:19:51','2017-12-27 13:19:51');

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

# Structure for table password_resets
 DROP TABLE IF EXISTS password_resets;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
# Data for table kfclaravel

# Structure for table permission_role
 DROP TABLE IF EXISTS permission_role;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
# Data for table kfclaravel

# Structure for table permissions
 DROP TABLE IF EXISTS permissions;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cid` int(10) unsigned DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'fa fa-circle-o',
  `isdisplay` int(4) DEFAULT '1' COMMENT '是否显示0 不显示 1显示',
  `sorts` varchar(255) COLLATE utf8_unicode_ci DEFAULT '1' COMMENT '菜单排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
# Data for table kfclaravel
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('5','index/index','用户管理','用户管理','2016-05-27 09:14:31','2017-11-30 09:43:39','0','fa-users','1','2');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('6','admin/permission','菜单列表','菜单列表','2016-05-27 09:15:01','2017-12-18 13:10:21','5','fa-wrench','1','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('7','admin/permission/create','添加菜单','添加菜单','2016-05-27 09:15:22','2017-12-18 13:10:42','5','fa-sliders','0','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('8','admin/permission/edit','修改菜单','修改菜单','2016-05-27 09:15:34','2017-12-18 13:11:10','5','fa-edit','0','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('9','admin/permission/delete','删除菜单','删除菜单节点','2016-05-27 09:15:56','2017-12-18 13:13:19','5','fa-trash','0','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('13','admin/user/edit','编辑用户','编辑用户','2016-05-27 10:56:26','2017-12-18 13:13:42','5','fa-edit','0','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('14','admin/user/delete','删除用户','删除用户','2016-05-27 10:56:44','2017-12-18 13:13:59','5','fa-trash','0','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('15','admin/role','管理组列表','管理组','2016-05-27 10:57:35','2017-12-08 06:42:12','5','fa-user-plus','1','2');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('16','admin/role/create','添加角色','添加角色','2016-05-27 10:57:53','2017-12-18 13:15:47','5','fa-plus','0','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('17','admin/role/edit','编辑角色','编辑角色','2016-05-27 10:58:13','2017-12-18 13:16:11','5','fa-pencil-square-o','0','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('18','admin/role/delete','删除角色','删除角色','2016-05-27 10:58:48','2017-12-18 13:16:40','5','fa-trash-o','0','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('36','admin/user','管理员列表','后台管理员列表','2017-12-07 10:06:17','2017-12-07 10:06:17','5','fa-user','1','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('23','admin/admin/1234','二级菜单','分手大师123','2017-12-01 01:40:48','2017-12-07 06:46:58','1','fa-sliders','1','1');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('47','admin/database','数据库管理','数据库管理','2017-12-27 13:52:04','2017-12-27 13:52:04','0','fa-database','1','');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('48','admin/database/index','数据表备份','数据表备份','2017-12-27 14:06:55','2017-12-27 14:06:55','47','fa-database','1','');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('46','admin/index/index','控制面板','控制面板','2017-12-20 10:18:40','2017-12-20 10:18:40','0','fa-dashboard','1','3');
 INSERT INTO permissions(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`,`cid`,`icon`,`isdisplay`,`sorts`) VALUES ('49','admin/database/restore','数据表还原','数据表还原','2017-12-29 11:19:04','2017-12-29 11:19:04','47','fa-mail-reply-all','1','');

# Structure for table role_user
 DROP TABLE IF EXISTS role_user;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
# Data for table kfclaravel
 INSERT INTO role_user(`user_id`,`role_id`) VALUES ('1','1');

# Structure for table roles
 DROP TABLE IF EXISTS roles;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
# Data for table kfclaravel
 INSERT INTO roles(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) VALUES ('1','admin','超级管理员','编辑测试11','2017-11-21 02:36:45','2017-12-07 06:57:56');

# Structure for table test123
 DROP TABLE IF EXISTS test123;
CREATE TABLE `test123` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
# Data for table kfclaravel

# Structure for table users
 DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uname` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名@sometimes|required|alpha_dash|between:6,18|unique:users,uname',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '密码$password@sometimes|required|digits_between:6,18',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '昵称@required',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '电子邮箱@sometimes|required|email|unique:users,email',
  `mobile_phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '手机号码@sometimes|required|mobile_phone|unique:users,mobile_phone',
  `qq` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'QQ号码@sometimes|required|integer|unique:users,qq',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '状态:0-注销,1-有效,2-停用$radio@nullable|in:0,1,2',
  `description` text COLLATE utf8_unicode_ci COMMENT '备注$textarea',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `users_uname_index` (`uname`) USING BTREE,
  KEY `users_email_index` (`email`) USING BTREE,
  KEY `users_mobile_phone_index` (`mobile_phone`) USING BTREE,
  KEY `users_qq_index` (`qq`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户';
# Data for table kfclaravel
 INSERT INTO users(`id`,`uname`,`password`,`name`,`email`,`mobile_phone`,`qq`,`remember_token`,`status`,`description`,`created_at`,`updated_at`) VALUES ('1','admin','$2y$10$jpBM306L2nh98u7YAuKb0uLjJW5eRDixhXCCzi.gIlD9CCObFpRgy','Xiaoxie','736214763@qq.com','13699411148','73621476312','','1','','2017-11-14 17:29:31','2017-12-26 17:59:48');
 INSERT INTO users(`id`,`uname`,`password`,`name`,`email`,`mobile_phone`,`qq`,`remember_token`,`status`,`description`,`created_at`,`updated_at`) VALUES ('2','root','$2y$10$C2gIPUffllpkzzgfbkmEoOEhAc4yXOKZUihIUvKi5zhu8ygh6V3MS','root','admin@admin.com','18770673724','736214763','feYFNWFaGXaOqFoVAElbw30ozoX6QdVBPx08fKUeJrv5pU5UijmuCySM3nDx','1','','2017-12-11 07:22:28','2017-12-11 06:37:37');

# Structure for table visitcnts
 DROP TABLE IF EXISTS visitcnts;
CREATE TABLE `visitcnts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `cnts` int(11) DEFAULT '0' COMMENT '访问量',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='访问量';
# Data for table kfclaravel
 INSERT INTO visitcnts(`Id`,`cnts`) VALUES ('1','193');

