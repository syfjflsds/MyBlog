CREATE TABLE `leave_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL COMMENT '�����ı�·��',
  `username` varchar(20) DEFAULT NULL COMMENT '�û���������',
  `ip` varchar(16) DEFAULT NULL COMMENT '������ip��ַ',
  `time` datetime DEFAULT NULL,
  `message_index` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `path_UNIQUE` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='���԰�'