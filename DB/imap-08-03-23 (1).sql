/*
Navicat MySQL Data Transfer

Source Server         : 148.113.138.32
Source Server Version : 80032
Source Host           : 148.113.138.32:3306
Source Database       : imap

Target Server Type    : MYSQL
Target Server Version : 80032
File Encoding         : 65001

Date: 2023-03-08 18:13:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `database`
-- ----------------------------
DROP TABLE IF EXISTS `database`;
CREATE TABLE `database` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` enum('done','inprogress','new') NOT NULL,
  `created` int NOT NULL,
  `updated` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of database
-- ----------------------------
INSERT INTO `database` VALUES ('1', '1', 'test-db-10k', 'mailPass.txt', 'from client', 'new', '1675104770', '1675104770');

-- ----------------------------
-- Table structure for `email`
-- ----------------------------
DROP TABLE IF EXISTS `email`;
CREATE TABLE `email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `databaseid` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `port` int DEFAULT NULL,
  `protocol` enum('pop3','imap') DEFAULT NULL,
  `status` int DEFAULT NULL,
  `counter` int DEFAULT NULL,
  `created` int NOT NULL,
  `last_check` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_email` (`databaseid`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of email
-- ----------------------------
INSERT INTO `email` VALUES ('9', '1', 'sportgirljo@suddenlink.net', 'sportgirljo', 'nannyjojo1', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('10', '1', 'angiecst8@suddenlink.net', 'angiecst8', 'Ricky1992', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('11', '1', 'wfranklin@suddenlink.net', 'wfranklin', 'Ncstate@1', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('12', '1', 'brianbadour@suddenlink.net', 'brianbadour', 'Man07uer', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('13', '1', 'bradlen724@suddenlink.net', 'bradlen724', 'bradlen724', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('14', '1', 'wampus1@suddenlink.net', 'wampus1', 'Timber111', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('15', '1', 'csmartin@suddenlink.net', 'csmartin', 'Bumpset@01', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('16', '1', 'dday1944@suddenlink.net', 'dday1944', 'Christ07', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('17', '1', 'timroberts@suddenlink.net', 'timroberts', 'Tpr*6228', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('18', '1', 'marcia.goodnight@suddenlink.net', 'marcia.goodnight', 'Lacey001', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('19', '1', 'myoungs3@suddenlink.net', 'myoungs3', 'Madison02', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('20', '1', 'lisa_sammy_sherman@suddenlink.net', 'lisa_sammy_sherman', 'Ls122263!', 'imap.suddenlink.net', '993', 'imap', '1', '2', '1675436303', '1675929626');
INSERT INTO `email` VALUES ('21', '1', 'francoisniederlender@lycos.com', 'francoisniederlender', 'Francois123', 'imap.lycos.com', '993', 'imap', '1', '2', '1675436303', '1675929626');

-- ----------------------------
-- Table structure for `email_source`
-- ----------------------------
DROP TABLE IF EXISTS `email_source`;
CREATE TABLE `email_source` (
  `id` int NOT NULL,
  `emailid` int DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of email_source
-- ----------------------------

-- ----------------------------
-- Table structure for `host_cache`
-- ----------------------------
DROP TABLE IF EXISTS `host_cache`;
CREATE TABLE `host_cache` (
  `id` int NOT NULL AUTO_INCREMENT,
  `domain` varchar(200) NOT NULL,
  `host` varchar(200) NOT NULL,
  `port` int NOT NULL,
  PRIMARY KEY (`id`,`domain`),
  UNIQUE KEY `domain_uniq` (`domain`)
) ENGINE=InnoDB AUTO_INCREMENT=70281 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of host_cache
-- ----------------------------


-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `variable` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `value` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'new_workers_accepted', '0');
INSERT INTO `settings` VALUES ('2', 'task_0_size', '500');
INSERT INTO `settings` VALUES ('3', 'tasl_1_size', '500');
INSERT INTO `settings` VALUES ('4', 'email_recheck_time', '600');

-- ----------------------------
-- Table structure for `tasks`
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `databaseid` int NOT NULL,
  `type` int NOT NULL,
  `status` int DEFAULT NULL,
  `timecreated` int NOT NULL,
  `timedone` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` VALUES ('34', '1', '1', '0', '1', '1675274904', null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` mediumint NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tg` varchar(255) DEFAULT NULL,
  `created` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'user', 'pass', '1111', '1675102725');

-- ----------------------------
-- Table structure for `user_keywords`
-- ----------------------------
DROP TABLE IF EXISTS `user_keywords`;
CREATE TABLE `user_keywords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `keyword` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of user_keywords
-- ----------------------------

-- ----------------------------
-- Table structure for `worker`
-- ----------------------------
DROP TABLE IF EXISTS `worker`;
CREATE TABLE `worker` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) NOT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`,`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of worker
-- ----------------------------
INSERT INTO `worker` VALUES ('1', '1.1.1.1', null);

-- ----------------------------
-- Table structure for `worker_task`
-- ----------------------------
DROP TABLE IF EXISTS `worker_task`;
CREATE TABLE `worker_task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `db_id` int NOT NULL,
  `task_type` int NOT NULL,
  `task_body` longtext NOT NULL,
  `status` int DEFAULT NULL,
  `time_start` int NOT NULL,
  `time_finish` int DEFAULT NULL,
  PRIMARY KEY (`id`,`db_id`,`task_type`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of worker_task
-- ----------------------------
