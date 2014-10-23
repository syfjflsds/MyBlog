CREATE TABLE `leave_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL COMMENT '留言文本路径',
  `username` varchar(20) DEFAULT NULL COMMENT '用户留言名称',
  `ip` varchar(16) DEFAULT NULL COMMENT '留言者ip地址',
  `time` datetime DEFAULT NULL,
  `message_index` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `path_UNIQUE` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='留言板'