/*
Navicat MySQL Data Transfer

Source Server         : MySQL v8
Source Server Version : 80018
Source Host           : localhost:3306
Source Database       : waste

Target Server Type    : MYSQL
Target Server Version : 80018
File Encoding         : 65001

Date: 2020-06-28 15:15:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bin
-- ----------------------------
DROP TABLE IF EXISTS `bin`;
CREATE TABLE `bin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `capacity_current` decimal(10,3) DEFAULT '0.000',
  `capacity_max` decimal(10,3) DEFAULT '0.000',
  `type_id` int(20) NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'empty',
  `cp_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of bin
-- ----------------------------
INSERT INTO `bin` VALUES ('1', '1.000', '100.000', '1', 'empty', '1');
INSERT INTO `bin` VALUES ('2', '8.000', '100.000', '2', 'empty', '1');
INSERT INTO `bin` VALUES ('3', '3.000', '100.000', '3', 'empty', '1');
INSERT INTO `bin` VALUES ('4', '2.000', '100.000', '4', 'empty', '1');
INSERT INTO `bin` VALUES ('5', '0.000', '100.000', '5', 'empty', '1');
INSERT INTO `bin` VALUES ('6', '0.000', '100.000', '1', 'empty', '2');
INSERT INTO `bin` VALUES ('7', '0.000', '100.000', '2', 'empty', '2');
INSERT INTO `bin` VALUES ('8', '0.000', '100.000', '3', 'empty', '2');
INSERT INTO `bin` VALUES ('9', '0.000', '100.000', '4', 'empty', '2');
INSERT INTO `bin` VALUES ('10', '0.000', '100.000', '5', 'empty', '2');
INSERT INTO `bin` VALUES ('11', '0.000', '100.000', '1', 'empty', '3');
INSERT INTO `bin` VALUES ('12', '0.000', '100.000', '2', 'empty', '3');
INSERT INTO `bin` VALUES ('13', '0.000', '100.000', '3', 'empty', '3');
INSERT INTO `bin` VALUES ('14', '0.000', '100.000', '4', 'empty', '3');
INSERT INTO `bin` VALUES ('15', '0.000', '100.000', '5', 'empty', '3');
INSERT INTO `bin` VALUES ('16', '0.000', '100.000', '6', 'empty', '3');

-- ----------------------------
-- Table structure for collection_point
-- ----------------------------
DROP TABLE IF EXISTS `collection_point`;
CREATE TABLE `collection_point` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone_no` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fax_no` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `social_media_tag` char(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `state` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of collection_point
-- ----------------------------
INSERT INTO `collection_point` VALUES ('1', 'Ayer Keroh', '06-232 0986', '06-232 6561', '@nonbiowaste_HQ', 'No. 1 & 3,\r\nJalan KF4,Kota Fesyen – MITC,\r\nHang Tuah Jaya,\r\n75450 Ayer Keroh,<br> Melaka', 'Melaka');
INSERT INTO `collection_point` VALUES ('2', 'Bandar Melaka', '06-232 0986', '06-232 6561', '@nonbiowaste_BM', 'Lot G1, G2 & G3,Wisma Air,Jalan Hang Tuah,75300 Melaka', 'Melaka');
INSERT INTO `collection_point` VALUES ('3', 'Ampang', '06-232 0986', '06-232 6561', '@nonbiowaste_AP', 'No. 1 & 3,\r\nJalan Pandan Prima 2,\r\nDataran Prima Ampang,\r\n68000 Ampang, Selangor', 'Selangor');
INSERT INTO `collection_point` VALUES ('4', 'Johor Bahru 1', '08-10293736', '08-67894532', '@nonbiowaste_JB', 'Jalan Firma 2/2, Kawasan Perindustrian Tebrau 1, 81100 Johor Bahru, Johor', 'Johor');

-- ----------------------------
-- Table structure for collector
-- ----------------------------
DROP TABLE IF EXISTS `collector`;
CREATE TABLE `collector` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `type_id` int(20) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` varchar(300) DEFAULT NULL,
  `tel_no` varchar(20) DEFAULT NULL,
  `fax_no` varchar(20) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of collector
-- ----------------------------
INSERT INTO `collector` VALUES ('1', '4', 'DILO Armaturen und Anlagen GmbH	', 'No. 1 & 3,\r\nJalan Pandan Prima 2,\r\nDataran Prima Ampang,\r\n68000 Ampang, Selangor	', '06-232 0986', '06-232 6561', 'Selangor');
INSERT INTO `collector` VALUES ('2', '4', 'GHD Pty Ltd	', 'A-G-01 & A-1-01, Block A,\r\nNo. 2, Jalan PJU 1A/7A,\r\nAra Damansara, PJU 1A,\r\n47301 Petaling Jaya, Selangor	', '06-232 0986', '06-232 6561', 'Selangor');
INSERT INTO `collector` VALUES ('3', '4', 'Crudesco Sdn Bhd	', 'No. 2 & 4,\r\nJalan 6C/7,\r\n43650 Bandar Baru Bangi, Selangor', '06-232 0986', '06-232 6561', 'Selangor');
INSERT INTO `collector` VALUES ('4', '4', 'Cycle Trend Industries	', '	Suite 0-55 & 0-56,\r\n4812 Central Business District Perdana 2,\r\nJalan Perdana, Cyber 12,\r\n63000 Cyberjaya, Selangor', '06-232 0986', '06-232 6561', 'Selangor');
INSERT INTO `collector` VALUES ('5', '4', 'ESP (International) Ltd.	', 'Lot 336,\r\nKompleks Majlis Agama Islam Selangor,\r\nSection 23, Jalan Kapar,\r\n41400 Klang, Selangor', '06-232 0986', '06-232 6561', 'Selangor');

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contact_no` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `preferred_comm` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `feedback_date` date DEFAULT '0000-00-00',
  `feedback_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `feedback_content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `cp_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of feedback
-- ----------------------------
INSERT INTO `feedback` VALUES ('1', 'test name', 'test_email', '111-111111', '3', '2020-06-22', '3', 'test', '2');
INSERT INTO `feedback` VALUES ('2', 'Lee', 'lee@email.com', '012-3456789', '3', '2020-06-25', '1', '', '1');

-- ----------------------------
-- Table structure for pick_up_request
-- ----------------------------
DROP TABLE IF EXISTS `pick_up_request`;
CREATE TABLE `pick_up_request` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contact_no` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `waste_type` varchar(255) DEFAULT NULL,
  `request_date` date DEFAULT '0000-00-00',
  `address` varchar(500) DEFAULT NULL,
  `cp_id` int(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `staff_id` int(11) DEFAULT NULL,
  `pickup_date` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of pick_up_request
-- ----------------------------
INSERT INTO `pick_up_request` VALUES ('1', 'aaa', '111-111111', '1, 2, ', '2020-06-22', 'testtt', '2', 'Done', '1', '2020-06-26 14:41:43');
INSERT INTO `pick_up_request` VALUES ('2', 'David', '011-2344456', '1, ', '2020-06-26', 'test', '1', 'Done', '1', '2020-06-26 15:01:20');
INSERT INTO `pick_up_request` VALUES ('5', 'Li Yong-Rui', '015-6789345', '1, 2, 3, 4, ', '2020-06-26', '715C, Jalan Emas 1, Taman Kerjasama, 75470 Bukit Beruang, Melaka', '1', 'Pending', null, '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `cp_id` int(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(400) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `staff_username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `type` varchar(20) DEFAULT 'Normal',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', '1', 'Test', 'aaa@aaa.com', '111-1111111', 'test1', '123456', 'Normal');
INSERT INTO `staff` VALUES ('2', '1', 'John', 'john@gmail.com', '012-3456789', 'test2', '123456', 'Normal');
INSERT INTO `staff` VALUES ('3', '2', 'Admin Test', 'admintest@email.com', '012-3456789', 'admin1', '123456', 'Admin');

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `staff_id` int(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_no` char(20) DEFAULT NULL,
  `transaction_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of transaction
-- ----------------------------
INSERT INTO `transaction` VALUES ('1', '1', 'David Lee', 'david@email.com', '012-3434567', '2020-06-25');
INSERT INTO `transaction` VALUES ('2', '1', 'Aziz ', 'aziz@email.com', '014-8899123', '2020-06-25');
INSERT INTO `transaction` VALUES ('3', '3', 'Khairul', 'khairul@email.com', '013-3421789', '2020-06-25');
INSERT INTO `transaction` VALUES ('4', '3', 'Test1', 'testemail@email.com', '012-2347890', '2020-06-26');
INSERT INTO `transaction` VALUES ('6', '1', 'John Cena', 'johncena@email.com', '013-23144801', '2020-06-27');
INSERT INTO `transaction` VALUES ('7', '1', 'Alisha Dual', 'alishadual@email.com', '014-5588910', '2020-06-27');

-- ----------------------------
-- Table structure for transaction_bin
-- ----------------------------
DROP TABLE IF EXISTS `transaction_bin`;
CREATE TABLE `transaction_bin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(20) NOT NULL,
  `bin_id` int(20) NOT NULL,
  `weight` decimal(10,3) DEFAULT '0.000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of transaction_bin
-- ----------------------------
INSERT INTO `transaction_bin` VALUES ('1', '1', '1', '5.000');
INSERT INTO `transaction_bin` VALUES ('2', '1', '2', '2.000');
INSERT INTO `transaction_bin` VALUES ('3', '1', '3', '2.000');
INSERT INTO `transaction_bin` VALUES ('4', '2', '4', '5.000');
INSERT INTO `transaction_bin` VALUES ('5', '2', '1', '7.000');
INSERT INTO `transaction_bin` VALUES ('6', '3', '6', '10.000');
INSERT INTO `transaction_bin` VALUES ('7', '3', '8', '7.000');
INSERT INTO `transaction_bin` VALUES ('9', '6', '1', '1.000');
INSERT INTO `transaction_bin` VALUES ('10', '6', '2', '5.000');
INSERT INTO `transaction_bin` VALUES ('11', '6', '3', '3.000');
INSERT INTO `transaction_bin` VALUES ('12', '7', '4', '2.000');
INSERT INTO `transaction_bin` VALUES ('13', '7', '2', '3.000');

-- ----------------------------
-- Table structure for waste_type
-- ----------------------------
DROP TABLE IF EXISTS `waste_type`;
CREATE TABLE `waste_type` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of waste_type
-- ----------------------------
INSERT INTO `waste_type` VALUES ('1', 'Paper');
INSERT INTO `waste_type` VALUES ('2', 'Glass');
INSERT INTO `waste_type` VALUES ('3', 'Metal');
INSERT INTO `waste_type` VALUES ('4', 'Plastic');
INSERT INTO `waste_type` VALUES ('5', 'Fabric');
INSERT INTO `waste_type` VALUES ('6', 'Chemical');
INSERT INTO `waste_type` VALUES ('7', 'Electric and Electronics');
INSERT INTO `waste_type` VALUES ('8', 'Wood');
