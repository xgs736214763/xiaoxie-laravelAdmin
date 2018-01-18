#MySQL 备份
#Host: 127.0.0.1 
#Date: 2018-01-02 13:57:55 
#Databases: kfclaravel 
#禁用外键约束
SET FOREIGN_KEY_CHECKS=0;
set names 'utf8'; 
# Structure for table users_0102
 DROP TABLE IF EXISTS users_0102;
CREATE TABLE `users_0102` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uname` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名@sometimes|required|alpha_dash|between:6,18|unique:users_0102,uname',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '密码$password@sometimes|required|digits_between:6,18',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '昵称@required',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '电子邮箱@sometimes|required|email|unique:users_0102,email',
  `mobile_phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '手机号码@sometimes|required|mobile_phone|unique:users_0102,mobile_phone',
  `qq` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'QQ号码@sometimes|required|integer|unique:users_0102,qq',
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
 INSERT INTO users_0102(`id`,`uname`,`password`,`name`,`email`,`mobile_phone`,`qq`,`remember_token`,`status`,`description`,`created_at`,`updated_at`) VALUES ('1','admin','$2y$10$jpBM306L2nh98u7YAuKb0uLjJW5eRDixhXCCzi.gIlD9CCObFpRgy','Xiaoxie','736214763@qq.com','13699411148','73621476312','','1','','2017-11-14 17:29:31','2017-12-26 17:59:48');
 INSERT INTO users_0102(`id`,`uname`,`password`,`name`,`email`,`mobile_phone`,`qq`,`remember_token`,`status`,`description`,`created_at`,`updated_at`) VALUES ('2','root','$2y$10$C2gIPUffllpkzzgfbkmEoOEhAc4yXOKZUihIUvKi5zhu8ygh6V3MS','root','admin@admin.com','18770673724','736214763','feYFNWFaGXaOqFoVAElbw30ozoX6QdVBPx08fKUeJrv5pU5UijmuCySM3nDx','1','','2017-12-11 07:22:28','2017-12-11 06:37:37');

