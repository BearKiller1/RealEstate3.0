/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : realestate

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 24/05/2022 14:56:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for building_status
-- ----------------------------
DROP TABLE IF EXISTS `building_status`;
CREATE TABLE `building_status`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `geo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `actived` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of building_status
-- ----------------------------
INSERT INTO `building_status` VALUES (1, 'New Building', 'ახალი გარემონტებული', 1);
INSERT INTO `building_status` VALUES (2, 'Under Construction', 'მშენებარე', 1);
INSERT INTO `building_status` VALUES (3, 'Old Building', 'ძველი აშენებული', 1);

-- ----------------------------
-- Table structure for building_type
-- ----------------------------
DROP TABLE IF EXISTS `building_type`;
CREATE TABLE `building_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `geo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `actived` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of building_type
-- ----------------------------
INSERT INTO `building_type` VALUES (1, 'Apartments', 'აპარტამენტი', 1);
INSERT INTO `building_type` VALUES (2, 'Housing and Cottages', '\r\nსაცხოვრებელი და კოტეჯები', 1);
INSERT INTO `building_type` VALUES (3, 'Commerical Real Estate', '\r\nკომერციული უძრავი ქონება', 1);
INSERT INTO `building_type` VALUES (4, 'Lands', 'მიწა', 1);
INSERT INTO `building_type` VALUES (5, 'Bhotel', 'Სასტუმრო', 1);

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name_geo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `actived` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 156 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES (1, 'Tbilisi', 'თბილისი', 1);
INSERT INTO `city` VALUES (2, 'Kutaisi', 'ქუთაისი', 1);
INSERT INTO `city` VALUES (3, 'Rustavi', 'რუსთავი', 1);
INSERT INTO `city` VALUES (4, 'Batumi', 'ბათუმი', 1);
INSERT INTO `city` VALUES (5, 'Abasha', 'აბაშა', 1);
INSERT INTO `city` VALUES (6, 'Abastumani', 'აბასთუმანი', 1);
INSERT INTO `city` VALUES (7, 'Adigeni', 'ადიგენი', 1);
INSERT INTO `city` VALUES (8, 'Agara', 'აგარა', 1);
INSERT INTO `city` VALUES (9, 'Akhalkalaki', 'ახალქალაქი', 1);
INSERT INTO `city` VALUES (10, 'Akhaltsikhe', 'ახალციხე', 1);
INSERT INTO `city` VALUES (11, 'Akhmeta', 'ახმეტა', 1);
INSERT INTO `city` VALUES (12, 'Ambrolauri', 'ამბროლაური', 1);
INSERT INTO `city` VALUES (13, 'Anaklia', 'ანაკლია', 1);
INSERT INTO `city` VALUES (14, 'Aspindza', 'ასპინძა', 1);
INSERT INTO `city` VALUES (15, 'Baghdati', 'ბაღდათი', 1);
INSERT INTO `city` VALUES (16, 'Bakuriani', 'ბაკურიანი', 1);
INSERT INTO `city` VALUES (17, 'Bolnisi', 'ბოლნისი', 1);
INSERT INTO `city` VALUES (18, 'Borjomi', 'ბორჯომი', 1);
INSERT INTO `city` VALUES (19, 'Chakvi', 'ჩახვი', 1);
INSERT INTO `city` VALUES (20, 'Chiatura', 'ჭიათურა', 1);
INSERT INTO `city` VALUES (21, 'Chkhorotsku', 'ჩხოროწყუ', 1);
INSERT INTO `city` VALUES (22, 'Chokhatauri', 'ჩოხატაური', 1);
INSERT INTO `city` VALUES (23, 'Dedoplistskaro', 'დედოფლისწყარო', 1);
INSERT INTO `city` VALUES (24, 'Dmanisi', 'დმანისი', 1);
INSERT INTO `city` VALUES (25, 'Dusheti', 'დუშეთი', 1);
INSERT INTO `city` VALUES (26, 'Gagra', 'გაგრა', 1);
INSERT INTO `city` VALUES (27, 'Gali', 'გალი', 1);
INSERT INTO `city` VALUES (28, 'Gardabani', 'გარდაბანი', 1);
INSERT INTO `city` VALUES (29, 'Gori', 'გორი', 1);
INSERT INTO `city` VALUES (30, 'Gudauri', 'გუდაური', 1);
INSERT INTO `city` VALUES (31, 'Gudauta', 'გუდაუთა', 1);
INSERT INTO `city` VALUES (32, 'Gulripsh', 'გულრიფში', 1);
INSERT INTO `city` VALUES (33, 'Gurjaani', 'გურჯანი', 1);
INSERT INTO `city` VALUES (34, 'Java', 'ჯავა', 1);
INSERT INTO `city` VALUES (35, 'Jvari', 'ჯვარი', 1);
INSERT INTO `city` VALUES (36, 'Kareli', 'ქარელი', 1);
INSERT INTO `city` VALUES (37, 'Kaspi', 'კასპი', 1);
INSERT INTO `city` VALUES (38, 'Kazreti', 'კაჭრეთი', 1);
INSERT INTO `city` VALUES (39, 'Keda', 'ქედა', 1);
INSERT INTO `city` VALUES (40, 'Kharagauli', 'ხარაგაული', 1);
INSERT INTO `city` VALUES (41, 'Khashuri', 'ხაშური', 1);
INSERT INTO `city` VALUES (42, 'Khelvachauri', 'ხელვაჩაური', 1);
INSERT INTO `city` VALUES (43, 'Khobi', 'ხობი', 1);
INSERT INTO `city` VALUES (44, 'Khoni', 'ხონი', 1);
INSERT INTO `city` VALUES (45, 'Khulo', 'ხულო', 1);
INSERT INTO `city` VALUES (46, 'Kobuleti', 'ქობულეთი', 1);
INSERT INTO `city` VALUES (47, 'Kvaisa', 'კვარისი', 1);
INSERT INTO `city` VALUES (48, 'Kvareli', 'ყვარელი', 1);
INSERT INTO `city` VALUES (49, 'Lagodekhi', 'ლაგოდეხი', 1);
INSERT INTO `city` VALUES (50, 'Lanchkhuti', 'ლანჩხუტი', 1);
INSERT INTO `city` VALUES (51, 'Leningor', 'ლენიგორი', 1);
INSERT INTO `city` VALUES (52, 'Lentekhi', 'ლენტეხი', 1);
INSERT INTO `city` VALUES (53, 'Manglisi', 'მანგლისი', 1);
INSERT INTO `city` VALUES (54, 'Marneuli', 'მარნეული', 1);
INSERT INTO `city` VALUES (55, 'Martvili', 'მარტვილი', 1);
INSERT INTO `city` VALUES (56, 'Mestia', 'მესტია', 1);
INSERT INTO `city` VALUES (57, 'Mtskheta', 'მცხეთა', 1);
INSERT INTO `city` VALUES (58, 'New Athos', 'ახალი ათონი', 1);
INSERT INTO `city` VALUES (59, 'Ninotsminda', 'ნონიწმინდა', 1);
INSERT INTO `city` VALUES (60, 'Ochamchira', 'ოჩამჩირე', 1);
INSERT INTO `city` VALUES (61, 'Oni', 'ონი', 1);
INSERT INTO `city` VALUES (62, 'Ozurgeti', 'ოზურგეთი', 1);
INSERT INTO `city` VALUES (63, 'Pitsunda', 'ბიჭვინთა', 1);
INSERT INTO `city` VALUES (64, 'Poti', 'ფოთი', 1);
INSERT INTO `city` VALUES (65, 'Sachkhere', 'საჩხერე', 1);
INSERT INTO `city` VALUES (66, 'Sadakhlo', 'სადახლო', 1);
INSERT INTO `city` VALUES (67, 'Sagarejo', 'საგარეჯო', 1);
INSERT INTO `city` VALUES (68, 'Samtredia', 'სამტრედია', 1);
INSERT INTO `city` VALUES (69, 'Senaki', 'სენაკი', 1);
INSERT INTO `city` VALUES (70, 'Shaumyani', 'შაუმიანი', 1);
INSERT INTO `city` VALUES (71, 'Shuakhevi', 'შუახევი', 1);
INSERT INTO `city` VALUES (72, 'Sighnaghi', 'სიღნაღი', 1);
INSERT INTO `city` VALUES (73, 'Sioni', 'სიონი', 1);
INSERT INTO `city` VALUES (74, 'Sokhumi', 'სოხუმი', 1);
INSERT INTO `city` VALUES (75, 'Stepantsminda', 'სტეფანწმინდა', 1);
INSERT INTO `city` VALUES (76, 'Surami', 'სურამიო', 1);
INSERT INTO `city` VALUES (77, 'Telavi', 'თელავი', 1);
INSERT INTO `city` VALUES (78, 'Terjola', 'თერჯოლა', 1);
INSERT INTO `city` VALUES (79, 'Tetritskaro', 'თეთრწყარო', 1);
INSERT INTO `city` VALUES (80, 'Tianeti', 'თიანეთი', 1);
INSERT INTO `city` VALUES (81, 'Tkibuli', 'ტყიბული', 1);
INSERT INTO `city` VALUES (82, 'Tsageri', 'ცაგერი', 1);
INSERT INTO `city` VALUES (83, 'Tsalenjikha', 'წალენჯიხა', 1);
INSERT INTO `city` VALUES (84, 'Tsalka', 'წალკა', 1);
INSERT INTO `city` VALUES (85, 'Tskaltubo', 'წყალტუბო', 1);
INSERT INTO `city` VALUES (86, 'Tskhinvali', 'ცხინვალი', 1);
INSERT INTO `city` VALUES (87, 'Tsnori', 'წნორი', 1);
INSERT INTO `city` VALUES (88, 'Vale', NULL, 1);
INSERT INTO `city` VALUES (89, 'Vani', 'ვანი', 1);
INSERT INTO `city` VALUES (90, 'Zestaponi', 'ზესტაფონი', 1);
INSERT INTO `city` VALUES (91, 'Zugdidi', 'ზუგდიდი', 1);
INSERT INTO `city` VALUES (92, 'Abasha-Municipality', 'აბაშა-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (93, 'Adigeni-Municipality', 'ადიგენი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (94, 'Akhalkalaki-Municipality', 'ახალქალაქი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (95, 'Akhaltsikhe-Municipality', 'ახალციხე-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (96, 'Akhmeta-Municipality', 'ახმეტა-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (97, 'Ambrolauri-Municipality', 'ამბროლაური-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (98, 'Aspindza-Municipality', 'ასპინძა-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (99, 'Autonomous-Republic-of-Abkhazia', 'აფხაზეთის რესპუბლიკა', 1);
INSERT INTO `city` VALUES (100, 'Baghdati-Municipality', 'ბაღდათი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (101, 'Bolnisi-Municipality', 'ბოლნისი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (102, 'Borjomi-Municipality', 'ბორჯომი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (103, 'Chkhorotsqu-Municipality', 'ჩხოროწყუ-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (104, 'Chokhatauri-Municipality', 'ჩოხატაური-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (105, 'Dedoplistsqaro-Municipality', 'დედოფლისწყარო-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (106, 'Dmanisi-Municipality', 'დმანისი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (107, 'Dusheti-Municipality', 'დუშეთი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (108, 'Dzau-District', 'ძაუ-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (109, 'Gardabani-Municipality', 'გარდაბანი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (110, 'Gori-Municipality', 'გორი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (111, 'Gurjaani-Municipality', 'გურჯაანი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (112, 'Kareli-Municipality', 'ქარელი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (113, 'Kaspi-Municipality', 'კასპი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (114, 'Kazbegi-Municipality', 'ყაზბეგი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (115, 'Keda-Municipality', 'ქედა-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (116, 'Khashuri-Municipality', 'ხაშური-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (117, 'Khelvachauri-Municipality', 'ხელვაჩაური-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (118, 'Khobi-Municipality', 'ხობი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (119, 'Khoni-Municipality', 'ხონი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (120, 'Khulo-Municipality', 'ხულო-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (121, 'Kobuleti-Municipality', 'ქობულეთი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (122, 'Kvareli -Municipality', 'ყვარელი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (123, 'Lanchkhuti-Municipality', 'ლანჩხუთი', 1);
INSERT INTO `city` VALUES (124, 'Leningor-District', 'ლენიგორი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (125, 'Lentekhi-Municipality', 'ლენტეხი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (126, 'Marneuli-Municipality', 'მარნეული-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (127, 'Martvili-Municipality', 'მარტვილი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (128, 'Mestia-Municipality', 'მესტია-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (129, 'Mtskheta-Municipality', 'მცხეთა-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (130, 'Ninotsminda-Municipality', 'ნინოწმინდა-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (131, 'Oni-Georgia', 'ონი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (132, 'Ozurgeti-Municipality', 'ოზურგეთი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (133, 'Raion-Kharagauli', 'კარაგაულის რაიონი', 1);
INSERT INTO `city` VALUES (134, 'Raion-Lagodekhi', 'ლაგოდეხის რაიონი', 1);
INSERT INTO `city` VALUES (135, 'Raion-Sachkhere', 'საჩხერე რაიონი', 1);
INSERT INTO `city` VALUES (136, 'Sagarejo-Municipality', 'საგარეჯო-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (137, 'Samtredia-Municipality', 'სამტრედია-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (138, 'Senaki-Municipality', 'სენაკი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (139, 'Shuakhevi-Municipality', 'შუახევი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (140, 'Signagi-Municipality', 'სიღნაღი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (141, 'Telavi-Municipality', 'თელავი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (142, 'Terjola', 'თერჯოლა', 1);
INSERT INTO `city` VALUES (143, 'Tetritskaro-Municipality', 'თეთრიწყარო-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (144, 'Tianeti-Municipality', 'თიანეთი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (145, 'Tqibuli-Municipality', 'ტყიბული-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (146, 'Tsageri-Municipality', 'ცაგერი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (147, 'Tsalenjikha-Municipality', 'წალენჯიხა-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (148, 'Tsalka-Municipality', 'წალკა-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (149, 'Tskaltubo-Municipality', 'წყალტუბო-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (150, 'Tskhinval', 'ცხივალი', 1);
INSERT INTO `city` VALUES (152, 'Vani-Municipality', 'ვანი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (153, 'Zestaponi-Municipality', 'ზესტაფონი-მუნიციპალიტეტი', 1);
INSERT INTO `city` VALUES (155, 'Zugdidi-Municipality', 'ზუგდიდი-მუნიციპალიტეტი', 1);

-- ----------------------------
-- Table structure for condition
-- ----------------------------
DROP TABLE IF EXISTS `condition`;
CREATE TABLE `condition`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `geo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `actived` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of condition
-- ----------------------------
INSERT INTO `condition` VALUES (1, 'Newly renovated', 'ახალი გარემონტებული', 1);
INSERT INTO `condition` VALUES (2, 'Under renovation', 'რემონტის პროცესში', 1);
INSERT INTO `condition` VALUES (3, 'Not renovated', 'გასარემონტებელი', 1);
INSERT INTO `condition` VALUES (4, 'Old renovation', 'ძველი გარემონტებული', 1);
INSERT INTO `condition` VALUES (5, 'White frame', 'თეთრი კარკასი', 1);
INSERT INTO `condition` VALUES (6, 'Black frame', 'შავი კარკასი', 1);
INSERT INTO `condition` VALUES (7, 'Green frame', 'მწვანე კარკასი', 1);

-- ----------------------------
-- Table structure for designs
-- ----------------------------
DROP TABLE IF EXISTS `designs`;
CREATE TABLE `designs`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `geo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `actived` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of designs
-- ----------------------------
INSERT INTO `designs` VALUES (1, 'Nonstandard', 'არასტანდარტული', '1');
INSERT INTO `designs` VALUES (2, 'Tuxareli', 'ტუხარელი', '1');
INSERT INTO `designs` VALUES (3, 'Moskow', 'მოსკოვი', '1');
INSERT INTO `designs` VALUES (4, 'City', 'ქალაქი', '1');
INSERT INTO `designs` VALUES (5, 'Khrushchov', 'ხრუშჩოვი', '1');
INSERT INTO `designs` VALUES (6, 'Czech', 'ჩეხური', '1');
INSERT INTO `designs` VALUES (8, 'Lvov', 'ლვოვი', '1');
INSERT INTO `designs` VALUES (9, 'Italian-Court', 'იტალიური', '1');

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `geo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `parent_id` int NULL DEFAULT NULL,
  `actived` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 119 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of districts
-- ----------------------------
INSERT INTO `districts` VALUES (1, 'Gldani', 'გლდანი', 0, 1);
INSERT INTO `districts` VALUES (2, 'Didube', 'დიდუბე', 0, 1);
INSERT INTO `districts` VALUES (3, 'Vake', 'ვაკე', 0, 1);
INSERT INTO `districts` VALUES (4, 'Isani', 'ისანი', 0, 1);
INSERT INTO `districts` VALUES (5, 'Krtsanisi', 'კრწანისი', 0, 1);
INSERT INTO `districts` VALUES (6, 'Mtatsminda', 'მთაწმინდა', 0, 1);
INSERT INTO `districts` VALUES (7, 'Nadzaladevi', 'ნაძალადევი', 0, 1);
INSERT INTO `districts` VALUES (8, 'Saburtalo', 'საბურთალო', 0, 1);
INSERT INTO `districts` VALUES (9, 'Samgori', 'სამგორი', 0, 1);
INSERT INTO `districts` VALUES (10, 'Chugureti', 'ჩუღურეთი', 0, 1);
INSERT INTO `districts` VALUES (11, 'Other', 'სხვა', 0, 1);
INSERT INTO `districts` VALUES (12, 'Avchala', 'ავჭალა', 1, 1);
INSERT INTO `districts` VALUES (13, 'Bertubati', 'ბერთუბნაი', 1, 1);
INSERT INTO `districts` VALUES (14, 'Gldani Massive', 'გლდანის მასივი', 1, 1);
INSERT INTO `districts` VALUES (15, 'Gldanula', 'გლდანულა', 1, 1);
INSERT INTO `districts` VALUES (16, 'Zahesi', 'ზაჰესი', 1, 1);
INSERT INTO `districts` VALUES (17, 'Upper Avchala', 'ზემო ავჭალა', 1, 1);
INSERT INTO `districts` VALUES (18, 'Koniaki district', 'კონიაკის დასახლება', 1, 1);
INSERT INTO `districts` VALUES (19, 'Mukhiani', 'მუხიანი', 1, 1);
INSERT INTO `districts` VALUES (20, 'Mukhiani villas', 'მუხიანის ველი', 1, 1);
INSERT INTO `districts` VALUES (21, 'Gldani', 'გლდანი', 1, 1);
INSERT INTO `districts` VALUES (22, 'Didube', 'დიდუბე', 2, 1);
INSERT INTO `districts` VALUES (23, 'Digomi Massive', 'დიღმის მასივი', 2, 1);
INSERT INTO `districts` VALUES (24, 'Agaraki', 'აგარაკი', 3, 1);
INSERT INTO `districts` VALUES (25, 'Akhaldaba', 'ახალდაბა', 3, 1);
INSERT INTO `districts` VALUES (26, 'Bagebi', 'ბაგები', 3, 1);
INSERT INTO `districts` VALUES (27, 'Betania', 'ბეთანია', 3, 1);
INSERT INTO `districts` VALUES (28, 'Vake', 'ვაკე', 3, 1);
INSERT INTO `districts` VALUES (29, 'Tkhinvali', 'ცხინვალი', 3, 1);
INSERT INTO `districts` VALUES (30, 'Nearby Lisi Lake (Vake)', 'ლისის მიმდებარე ტერიტორია', 3, 1);
INSERT INTO `districts` VALUES (31, 'Nutsubidze micro-districts (I-V)', 'ნუცუბიძე', 3, 1);
INSERT INTO `districts` VALUES (32, 'Students Settlement', 'სტუდ-ქალაქი', 3, 1);
INSERT INTO `districts` VALUES (33, 'VIII. Legion Block', NULL, 4, 1);
INSERT INTO `districts` VALUES (34, 'Avlabari', 'ავლაბარი', 4, 1);
INSERT INTO `districts` VALUES (35, 'Elia', 'ელია', 4, 1);
INSERT INTO `districts` VALUES (36, 'Vazisubani', 'ვაზისუბანი', 4, 1);
INSERT INTO `districts` VALUES (37, 'Isani', 'ისანი', 4, 1);
INSERT INTO `districts` VALUES (38, 'Metekhi', 'მეტეხი', 4, 1);
INSERT INTO `districts` VALUES (39, 'Metromsheni', 'მეტრომშენი', 4, 1);
INSERT INTO `districts` VALUES (40, 'Navtlughi', 'ნავთლუხი', 4, 1);
INSERT INTO `districts` VALUES (41, '31st', '31-ქუჩა', 4, 1);
INSERT INTO `districts` VALUES (42, 'Samgori', 'სამგორი', 4, 1);
INSERT INTO `districts` VALUES (43, 'Abanotubani', 'აბანოთუბანი', 5, 1);
INSERT INTO `districts` VALUES (44, 'Betlemi Historic Quarter', 'ბეთლემი', 5, 1);
INSERT INTO `districts` VALUES (45, 'Zemo Phonichala', 'ზემო ფონიჭალა', 5, 1);
INSERT INTO `districts` VALUES (46, 'Ortachala', 'ორთაჭალა', 5, 1);
INSERT INTO `districts` VALUES (47, 'Soghanlugi', 'სოღანლუღი', 5, 1);
INSERT INTO `districts` VALUES (48, 'Fonichala', 'ფონიჭალა', 5, 1);
INSERT INTO `districts` VALUES (49, 'Kvemo Ponichala', 'ქვემო ფონიჭალა', 5, 1);
INSERT INTO `districts` VALUES (51, 'Garetubani', 'გარეთუბანი', 6, 1);
INSERT INTO `districts` VALUES (52, 'Vera', 'ვერა', 6, 1);
INSERT INTO `districts` VALUES (53, 'Zemo Vera', 'ზემო ვერა', 6, 1);
INSERT INTO `districts` VALUES (54, 'Kveseti', 'კვესეთი', 6, 1);
INSERT INTO `districts` VALUES (55, 'Kojori', 'კოჯორი', 6, 1);
INSERT INTO `districts` VALUES (56, 'Krtsanisi', 'კრწანისი', 6, 1);
INSERT INTO `districts` VALUES (57, 'Mtatsminda', 'მთაწმინდა', 6, 1);
INSERT INTO `districts` VALUES (58, 'Okrokana', 'ოქროყანა', 6, 1);
INSERT INTO `districts` VALUES (59, 'Samadlo', 'სამადლო', 6, 1);
INSERT INTO `districts` VALUES (60, 'Sololaki', 'სოლოლაკი', 6, 1);
INSERT INTO `districts` VALUES (61, 'Tabakhmela', 'ტაბახმელა', 6, 1);
INSERT INTO `districts` VALUES (62, 'Fikris gora', 'ფიქრის გორა', 6, 1);
INSERT INTO `districts` VALUES (63, 'Shindisi', 'შინდისი', 6, 1);
INSERT INTO `districts` VALUES (64, 'Tsavkisi', 'წავკისი', 6, 1);
INSERT INTO `districts` VALUES (65, 'Tsavkisi Valley', 'წავკისის ველი', 6, 1);
INSERT INTO `districts` VALUES (66, 'Avshniani', 'ავშნიანი', 7, 1);
INSERT INTO `districts` VALUES (67, 'Zghvisubani - Temka', 'ზღვისუბანი-თემქა', 7, 1);
INSERT INTO `districts` VALUES (68, 'Lotkini', 'ლოტკინი', 7, 1);
INSERT INTO `districts` VALUES (69, 'Surrounding area of metro Guramishvili', 'გურამიშვილის მეტროს მიმდებარე ტერიტორია', 7, 1);
INSERT INTO `districts` VALUES (70, 'Surrounding area of metro Grmaghele', 'ღრმაღელეს მეტროს მიმდებარე ტერიტორია', 7, 1);
INSERT INTO `districts` VALUES (71, 'Nadzaladevi', 'ნაძალადევი', 7, 1);
INSERT INTO `districts` VALUES (72, 'Sanzona', 'სანზონა', 7, 1);
INSERT INTO `districts` VALUES (73, 'Feikrebi Settlement', 'ფეიქრები', 7, 1);
INSERT INTO `districts` VALUES (74, 'Didgori', 'დიდგორი', 8, 1);
INSERT INTO `districts` VALUES (75, 'Didi Digomi', 'დიდი დიღომი', 8, 1);
INSERT INTO `districts` VALUES (76, 'Dighmis Chala', 'დიღმის ჩალა', 8, 1);
INSERT INTO `districts` VALUES (77, 'Vazha-Pshavela Blocks', 'ვაჟა-ფშაველა', 8, 1);
INSERT INTO `districts` VALUES (78, 'Vashlijvari', 'ვაშლიჯვარი', 8, 1);
INSERT INTO `districts` VALUES (79, 'Vedzisi', 'ვეძისი', 8, 1);
INSERT INTO `districts` VALUES (81, 'Telovani', 'თელოვანი', 8, 1);
INSERT INTO `districts` VALUES (82, 'Lisi', 'ლისი', 8, 1);
INSERT INTO `districts` VALUES (83, 'Nearby Lisi Lake (Saburtalo)', 'ლისის მიმდებარე ტერიტორია', 8, 1);
INSERT INTO `districts` VALUES (84, 'Saburtalo', 'საბურთალო', 8, 1);
INSERT INTO `districts` VALUES (85, 'Village Dighomi', 'სოფელი დიღომი', 8, 1);
INSERT INTO `districts` VALUES (86, 'Kvemo Lisi', 'ქვემო ლისი', 8, 1);
INSERT INTO `districts` VALUES (87, 'Koshigora', 'კოშიგორა', 8, 1);
INSERT INTO `districts` VALUES (88, 'Dzveli Vedzlisi', 'ძველი ვეძისი', 8, 1);
INSERT INTO `districts` VALUES (89, 'Airport Settlement', 'აეროპორტის დასახლება', 9, 1);
INSERT INTO `districts` VALUES (91, 'Africa', 'აფრიკა', 9, 1);
INSERT INTO `districts` VALUES (92, 'Dampalo', 'დამპალო', 9, 1);
INSERT INTO `districts` VALUES (93, 'Didi Lilo', 'დიდი ლილო', 9, 1);
INSERT INTO `districts` VALUES (94, 'Varketili', 'ვარკეთილი', 9, 1);
INSERT INTO `districts` VALUES (95, 'Lilo District', 'ლილოს დასახლება', 9, 1);
INSERT INTO `districts` VALUES (96, 'Third Massive', 'მესამე მასივი', 9, 1);
INSERT INTO `districts` VALUES (97, 'Moscow Avenue', 'მოსკოვის გამზირი', 9, 1);
INSERT INTO `districts` VALUES (98, 'Navtlughi-2', 'ნავთლუხი', 9, 1);
INSERT INTO `districts` VALUES (99, 'Samgorski', 'სამგორი', 9, 1);
INSERT INTO `districts` VALUES (100, 'Orkhevi', 'ორხევი', 9, 1);
INSERT INTO `districts` VALUES (101, 'Patara Lilo', 'პატარა ლილო', 9, 1);
INSERT INTO `districts` VALUES (102, 'Samkhedro Kalaki', 'სამხედრო ქალაქი', 9, 1);
INSERT INTO `districts` VALUES (103, 'Saqnavtobi Dasakhleba', 'საქნავთობის დასახლება', 9, 1);
INSERT INTO `districts` VALUES (104, 'Sakhidroenergomsheni', 'სახიდო ენერგომშენი', 9, 1);
INSERT INTO `districts` VALUES (105, 'Meurneoba Varketili', 'ვარკეთილის მეურენობა', 9, 1);
INSERT INTO `districts` VALUES (106, 'Tsinubani', 'ცინუბანი', 9, 1);
INSERT INTO `districts` VALUES (107, 'Saint Barbare (ZMK)', 'წმინდა ბარბარეს ქუჩა (ZMK)', 9, 1);
INSERT INTO `districts` VALUES (108, 'Vorontsovi', 'ვორონცოვი', 10, 1);
INSERT INTO `districts` VALUES (109, 'Ivertubani', 'ივერთუბანი', 10, 1);
INSERT INTO `districts` VALUES (110, 'Kukia', 'კუკია', 10, 1);
INSERT INTO `districts` VALUES (111, 'Okros ubani', 'ოქროს უბანი', 10, 1);
INSERT INTO `districts` VALUES (112, 'Plekhanovi', 'პლეხანოვი', 10, 1);
INSERT INTO `districts` VALUES (113, 'Svanetis Ubani', 'სვანეთის უბანი', 10, 1);
INSERT INTO `districts` VALUES (114, 'Chugureti', 'ჩუღურეთი', 10, 1);
INSERT INTO `districts` VALUES (115, 'Giorgitsminda Settlement', 'გიორგიწმინდა', 11, 1);
INSERT INTO `districts` VALUES (116, 'New city of Tbilisi sea', 'თბილისის ახალი უბნები', 11, 1);
INSERT INTO `districts` VALUES (117, 'Kalaubani', 'ქალაუბანი', 11, 1);
INSERT INTO `districts` VALUES (118, 'Old Nadzaladevi', 'ძველი ნაძალადევი', 11, 1);

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `actived` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 513 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (204, NULL, NULL, 105, 1);
INSERT INTO `files` VALUES (251, NULL, 'assets/uploads/Historic_House.jpg', 125, 1);
INSERT INTO `files` VALUES (252, NULL, 'assets/uploads/Residentail-Lawn-Sunset-203268350.jpg', 125, 1);
INSERT INTO `files` VALUES (253, NULL, 'assets/uploads/Rufus_Rand_Summer_House.jpg', 125, 1);
INSERT INTO `files` VALUES (254, NULL, 'assets/uploads/VhouseHiRes.jpg', 125, 1);
INSERT INTO `files` VALUES (255, NULL, 'assets/uploads/bechedi.png', 125, 1);
INSERT INTO `files` VALUES (277, NULL, 'assets/images/nophoto.webp', 132, 1);
INSERT INTO `files` VALUES (278, NULL, 'assets/images/nophoto.webp', 133, 1);
INSERT INTO `files` VALUES (279, NULL, 'assets/images/nophoto.webp', 134, 1);
INSERT INTO `files` VALUES (360, NULL, 'assets/uploads/home-banner-2020-02-min.jpg', 115, 1);
INSERT INTO `files` VALUES (361, NULL, 'assets/uploads/asd.jpg', 115, 1);
INSERT INTO `files` VALUES (362, NULL, 'assets/uploads/asdasdasd.jpg', 115, 1);
INSERT INTO `files` VALUES (363, NULL, 'assets/uploads/average-home-sale-price.jpg', 115, 1);
INSERT INTO `files` VALUES (373, NULL, 'assets/images/nophoto.webp', 135, 1);
INSERT INTO `files` VALUES (374, NULL, 'assets/uploads/Historic_House.jpg', 114, 1);
INSERT INTO `files` VALUES (375, NULL, 'assets/uploads/Residentail-Lawn-Sunset-203268350.jpg', 114, 1);
INSERT INTO `files` VALUES (376, NULL, 'assets/uploads/Rufus_Rand_Summer_House.jpg', 114, 1);
INSERT INTO `files` VALUES (377, NULL, 'assets/uploads/VhouseHiRes.jpg', 114, 1);
INSERT INTO `files` VALUES (378, NULL, 'assets/uploads/Historic_House.jpg', 114, 1);
INSERT INTO `files` VALUES (379, NULL, 'assets/uploads/Residentail-Lawn-Sunset-203268350.jpg', 114, 1);
INSERT INTO `files` VALUES (380, NULL, 'assets/uploads/Rufus_Rand_Summer_House.jpg', 114, 1);
INSERT INTO `files` VALUES (381, NULL, 'assets/uploads/VhouseHiRes.jpg', 114, 1);
INSERT INTO `files` VALUES (504, NULL, 'assets/uploads/asdasdasd.jpg', 136, 1);
INSERT INTO `files` VALUES (505, NULL, 'assets/uploads/bechedi.png', 136, 1);
INSERT INTO `files` VALUES (506, NULL, 'assets/uploads/chart.PNG', 136, 1);
INSERT INTO `files` VALUES (507, NULL, 'assets/uploads/download.jpg', 136, 1);
INSERT INTO `files` VALUES (508, NULL, 'assets/uploads/LoadFee.PNG', 136, 1);
INSERT INTO `files` VALUES (509, NULL, 'assets/uploads/logo1.png', 136, 1);
INSERT INTO `files` VALUES (510, NULL, 'assets/uploads/lol.PNG', 136, 1);
INSERT INTO `files` VALUES (511, NULL, 'assets/uploads/newsa.PNG', 136, 1);
INSERT INTO `files` VALUES (512, NULL, 'assets/uploads/numbers.PNG', 136, 1);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `datetime` datetime(0) NULL DEFAULT NULL COMMENT 'Uplaod time',
  `mobile_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `price_id` int NULL DEFAULT NULL COMMENT '1 - total || 0 - price per m2',
  `price_value` int NULL DEFAULT NULL COMMENT '1 - GEL  || 0 - USD',
  `transaction_type` int NULL DEFAULT NULL COMMENT '1 - gasayidi || 2 - gira || 3 - rend || 4 - daily rent',
  `building_year` int NULL DEFAULT NULL,
  `building_type` int NULL DEFAULT NULL COMMENT 'kodshi weria karoche ra ra ari',
  `building_status` int NULL DEFAULT NULL COMMENT 'kodshi weria karoche ra ra ari',
  `city_id` int NULL DEFAULT NULL,
  `district_id` int NULL DEFAULT NULL,
  `sub_district_id` int NULL DEFAULT NULL,
  `cadastral` int NULL DEFAULT NULL,
  `size` double NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `description_en` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `description_rus` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `designs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `floor` int NULL DEFAULT NULL,
  `number_of_storeys` int NULL DEFAULT 0,
  `number_of_rooms` int NULL DEFAULT 0,
  `bedroom` int NULL DEFAULT NULL,
  `balcony` int NULL DEFAULT NULL COMMENT 'yes/no',
  `loggia` int NULL DEFAULT NULL COMMENT 'yes/no',
  `veranda` int NULL DEFAULT NULL COMMENT 'yes/no',
  `bathroom` int NULL DEFAULT NULL COMMENT '1/2/3+',
  `shared` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'idk',
  `gas` int NULL DEFAULT NULL COMMENT 'yes/no',
  `telephone` int NULL DEFAULT NULL COMMENT 'yes/no',
  `internet` int NULL DEFAULT NULL COMMENT 'yes/no',
  `television` int NULL DEFAULT NULL COMMENT 'yes/no',
  `air_conditioner` int NULL DEFAULT NULL COMMENT 'yes/no',
  `hot_water` int NULL DEFAULT NULL COMMENT 'yes/no',
  `heating` int NULL DEFAULT NULL COMMENT 'yes/no',
  `parking` int NULL DEFAULT NULL COMMENT 'yes/no',
  `storeroom` int NULL DEFAULT NULL COMMENT 'yes/no',
  `service_elevator` int NULL DEFAULT NULL COMMENT 'selector -> Passenger elevator || Service elevator',
  `passenger_elevator` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fireplace` int NULL DEFAULT NULL COMMENT 'yes/no',
  `furniture` int NULL DEFAULT NULL COMMENT 'yes/no',
  `ceiling_height` double NULL DEFAULT NULL COMMENT 'some selects idk i have to check ',
  `condition_id` int NULL DEFAULT NULL COMMENT 'selector -> Newly renovated || under renovation || Not renovated || Old renovation || white fram || black fram || green fram',
  `exchange` int NULL DEFAULT 0 COMMENT '1 - yes || 0 - no',
  `uploaded` int NULL DEFAULT 0 COMMENT '1 - uploaded || 0 - need to be accepted',
  `x` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `actived` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 137 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (114, 48, '2022-05-22 16:24:57', '568141665', NULL, 123123.00, 0, 0, 1, 500, 1, 1, 1, 1, 0, 123123, 123123, 'Avlabari martyopi turn 26', 'House is great big and lorem ipsum', 'House is great big and lorem ipsum', NULL, '8', 12, 1, 2, 3, 1, 1, 1, 2, '0', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1', 1, 1, 2.55, 4, 1, 1, '41.72449819147855', '44.77938842773437', 1);
INSERT INTO `products` VALUES (115, 48, '2022-05-22 16:04:27', '568141665', NULL, 123123.00, 0, 0, 1, 500, 1, 1, 1, 1, 0, 123123, 123123, 'Avlabari martyopi turn 26', 'House is great big and lorem ipsum', 'House is great big and lorem ipsum', NULL, '8', 12, 1, 2, 3, 1, 1, 1, 2, '0', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1', 1, 1, 2.55, 4, 1, 1, '41.7267082251971', '44.78389453887939', 1);
INSERT INTO `products` VALUES (135, 48, '2022-05-22 16:12:55', '', NULL, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', NULL, '  ', 0, 0, 0, 0, 1, 1, 1, 1, '0', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1', 1, 1, 0, 0, 0, 1, '41.72100682389585', '44.79376506805419', 1);
INSERT INTO `products` VALUES (136, 50, '2022-05-24 10:37:40', '568141665', NULL, 124124.00, 0, 0, 2, 1209000, 1, 2, 5, 4, 0, 2147483647, 124124, 'asdasdasdasdaaaaaasdasdasd', '12412412412', '12412412412', NULL, '2', 13, 13, 13, 3, 0, 0, 0, 1, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 0, 0, 13, 2, 0, 0, '41.732377094501004', '44.7970266342163', 1);

-- ----------------------------
-- Table structure for transaction_type
-- ----------------------------
DROP TABLE IF EXISTS `transaction_type`;
CREATE TABLE `transaction_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `geo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `actived` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaction_type
-- ----------------------------
INSERT INTO `transaction_type` VALUES (1, 'For Sale', 'იყიდება', '1');
INSERT INTO `transaction_type` VALUES (2, 'Mortgage', 'გირავდება', '1');
INSERT INTO `transaction_type` VALUES (3, 'For Rent', 'ქირავდება', '1');
INSERT INTO `transaction_type` VALUES (4, 'For daily rent', 'ქირავდება დღიურად', '1');

-- ----------------------------
-- Table structure for user_bookmarks
-- ----------------------------
DROP TABLE IF EXISTS `user_bookmarks`;
CREATE TABLE `user_bookmarks`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `actived` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_bookmarks
-- ----------------------------
INSERT INTO `user_bookmarks` VALUES (27, 43, 101, 1);
INSERT INTO `user_bookmarks` VALUES (29, 43, 109, 1);
INSERT INTO `user_bookmarks` VALUES (40, 48, 115, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `show_perm` int NULL DEFAULT 1,
  `gender` int NULL DEFAULT 0,
  `actived` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (48, 'ADMIN', '202cb962ac59075b964b07152d234b70', 'Admin', '666666666', 'assets/profile/home-banner-2020-02-min.jpg', 'ywerwer', 1, 1, 1);
INSERT INTO `users` VALUES (49, 'Dachi', '202cb962ac59075b964b07152d234b70', 'dachi', '568141665', NULL, 'Khutsishvili', 1, 1, 1);
INSERT INTO `users` VALUES (50, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'tester', '568141665', NULL, 'asdasd', 1, 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
