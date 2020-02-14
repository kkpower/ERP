/*
 Navicat Premium Data Transfer

 Source Server         : 1
 Source Server Type    : MySQL
 Source Server Version : 50620
 Source Host           : localhost:3306
 Source Schema         : shell

 Target Server Type    : MySQL
 Target Server Version : 50620
 File Encoding         : 65001

 Date: 03/09/2018 10:50:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '权限名称',
  `auth_pid` int(11) NULL DEFAULT NULL COMMENT '权限父级ID',
  `auth_c` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '控制器名称',
  `auth_a` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '控制器方法',
  `auth_path` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '全路径',
  `auth_level` tinyint(2) NULL DEFAULT NULL COMMENT '权限级别',
  `status` tinyint(1) NULL DEFAULT NULL COMMENT '权限状态',
  `array` int(5) NULL DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 121 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限认证表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth
-- ----------------------------
INSERT INTO `auth` VALUES (2, 'Authority management', 0, 'Login', 'index', '2', 0, 1, 1);
INSERT INTO `auth` VALUES (74, '用户管理', 2, 'System', 'usermanagement', '2-74', 1, 1, NULL);
INSERT INTO `auth` VALUES (21, '角色管理', 2, 'System', 'role', '2-21', 1, 1, NULL);
INSERT INTO `auth` VALUES (1, '个人信息', 0, 'My', 'index', '1', 0, 1, 3);
INSERT INTO `auth` VALUES (11, '我的信息', 1, 'My', 'me', '1-11', 1, 1, 6);
INSERT INTO `auth` VALUES (3, '产品信息', 0, 'Product', 'index', '3', 0, 1, 4);
INSERT INTO `auth` VALUES (77, '修改信息', 2, 'System', 'proving', '2-77', 1, 1, NULL);
INSERT INTO `auth` VALUES (22, '添加图片', 3, 'Product', 'image', '3-21', 1, 0, NULL);
INSERT INTO `auth` VALUES (23, 'product', 3, 'Product', 'index', '3-23', 1, 1, NULL);
INSERT INTO `auth` VALUES (78, '供应商信息', 0, 'supplier', 'index', '78', 0, 1, 5);
INSERT INTO `auth` VALUES (80, '仓库信息', 0, 'Warehouse', 'index', '80', 0, 1, 7);
INSERT INTO `auth` VALUES (79, '供应商管理', 78, 'supplier', 'index', '78-79', 1, 1, NULL);
INSERT INTO `auth` VALUES (81, '仓库管理', 80, 'Warehouse', 'warehouseManagement', '80-81', 1, 1, NULL);
INSERT INTO `auth` VALUES (82, '库存管理', 80, 'Warehouse', 'stock', '80-82', 1, 1, NULL);
INSERT INTO `auth` VALUES (83, '添加产品页面', 3, 'Product', 'addlist', '3-83', 1, 0, NULL);
INSERT INTO `auth` VALUES (84, '添加产品', 3, 'Product', 'add', '3-84', 1, 1, NULL);
INSERT INTO `auth` VALUES (4, '订单', 0, 'Purchase', 'index', '4', 0, 1, 3);
INSERT INTO `auth` VALUES (85, '销售订单', 4, 'Order', 'index', '4-85', 1, 1, 6);
INSERT INTO `auth` VALUES (86, '图库', 3, 'Product', 'img', '3-86', 1, 1, NULL);
INSERT INTO `auth` VALUES (87, '模板管理', 3, 'Product', 'template', '3-87', 1, 1, NULL);
INSERT INTO `auth` VALUES (88, '产品详情', 23, 'Product', 'details', '3-23-88', 1, 1, NULL);
INSERT INTO `auth` VALUES (5, '组织架构', 0, 'Organization', 'index', '5', 0, 1, 2);
INSERT INTO `auth` VALUES (92, '组织架构', 5, 'Organization', 'index', '5-92', 1, 1, NULL);
INSERT INTO `auth` VALUES (93, '产品编码', 3, 'Product', 'ProductCoding', '3-93', 1, 1, NULL);
INSERT INTO `auth` VALUES (53, '人员名录', 5, 'Employeelist', 'index', '5-53', 1, 1, NULL);
INSERT INTO `auth` VALUES (54, '节点显示', 5, 'Organization', 'getOrganizationAjax', '5-92-54', 2, 1, NULL);
INSERT INTO `auth` VALUES (101, '添加角色', 21, 'System', 'saverole', '2-21-101', 2, 1, NULL);
INSERT INTO `auth` VALUES (96, '删除用户', 74, 'System', 'delUser', '2-74-96', 2, 1, NULL);
INSERT INTO `auth` VALUES (100, '修改权限', 74, 'System', 'getUser', '2-74-100', 2, 1, NULL);
INSERT INTO `auth` VALUES (99, '添加权限', 74, 'System', 'saveUser', '2-74-99', 2, 1, NULL);
INSERT INTO `auth` VALUES (102, '分配权限', 21, 'System', 'getRoleAuthority', '2-21-102', 2, 1, NULL);
INSERT INTO `auth` VALUES (103, '删除角色', 21, 'System', 'delRole', '2-21-103', 2, 1, NULL);
INSERT INTO `auth` VALUES (104, '权限显示', 11, 'System', 'getRoleAuthority', '1-11-104', 2, 1, NULL);
INSERT INTO `auth` VALUES (105, '头像', 11, 'My', 'avatar', '1-105', 2, 1, NULL);
INSERT INTO `auth` VALUES (106, '提交上传', 11, 'My', 'upload', '1-11-106', 2, 1, NULL);
INSERT INTO `auth` VALUES (107, '查看供应商信息', 78, 'supplier', 'detail', '78-107', 2, 1, NULL);
INSERT INTO `auth` VALUES (119, '修改我的信息', 11, 'My', 'saveuserinfo', '1-11-119', 2, 1, NULL);
INSERT INTO `auth` VALUES (109, '添加编码', 3, 'Product', 'addclass', '3-93-109', 2, 1, NULL);
INSERT INTO `auth` VALUES (118, '添加修改二级编码', 93, 'Product', 'addtwoclass', '3-93-118', 2, 1, NULL);
INSERT INTO `auth` VALUES (115, '修改用户编码', 93, 'Product', 'getclassifyid', '3-93-115', 2, 1, NULL);
INSERT INTO `auth` VALUES (116, '查看下一级编码', 93, 'Product', 'getclassify', '3-93-116', 2, 1, NULL);
INSERT INTO `auth` VALUES (120, '组织架构查询', 92, 'Organization', 'getOrganizationAjax', '5-92-120', 2, 1, NULL);

-- ----------------------------
-- Table structure for classify
-- ----------------------------
DROP TABLE IF EXISTS `classify`;
CREATE TABLE `classify`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `number` int(3) NULL DEFAULT NULL COMMENT '编号,',
  `superior` int(11) NULL DEFAULT NULL COMMENT '上级',
  `level` int(1) NULL DEFAULT NULL COMMENT '级别',
  `namezh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '中文名',
  `nameus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '英文名',
  `ctime` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `state` int(1) NULL DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 289 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '产品分类表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of classify
-- ----------------------------
INSERT INTO `classify` VALUES (1, 1, NULL, 0, '', '	Standard HDMIType A Male to Type A Male', '2018-08-15 15:20:46', 1);
INSERT INTO `classify` VALUES (2, 1, 1, 1, '', 'HDMI AMAM #1 Housing Ends', '2018-08-15 15:21:02', 1);
INSERT INTO `classify` VALUES (3, 2, 1, 1, '', 'HDMI AMAM #2 Housing Ends', '2018-08-15 15:21:18', 1);
INSERT INTO `classify` VALUES (4, 3, 1, 1, '', 'HDMI AMAM #3 Housing Ends', '2018-08-15 15:21:31', 1);
INSERT INTO `classify` VALUES (5, 4, 1, 1, '', '	HDMI AMAM #4 Housing Ends', '2018-08-15 15:21:42', 1);
INSERT INTO `classify` VALUES (6, 5, 1, 1, '', 'HDMI AMAM #5 Housing Ends', '2018-08-15 15:21:56', 1);
INSERT INTO `classify` VALUES (7, 6, 1, 1, '', 'HDMI AMAM #6 Housing Ends', '2018-08-15 15:22:04', 1);
INSERT INTO `classify` VALUES (8, 7, 1, 1, '', 'HDMI AMAM #7 Housing Ends', '2018-08-15 15:22:15', 1);
INSERT INTO `classify` VALUES (9, 8, 1, 1, '', 'HDMI AMAM #8 Housing Ends', '2018-08-15 15:22:23', 1);
INSERT INTO `classify` VALUES (10, 9, 1, 1, '', 'HDMI AMAM #9 Housing Ends', '2018-08-15 15:22:31', 1);
INSERT INTO `classify` VALUES (11, 10, 1, 1, '', 'HDMI AMAM #10 Housing Ends', '2018-08-15 15:22:40', 1);
INSERT INTO `classify` VALUES (12, 11, 1, 1, '', 'HDMI AMA Metal Assembly Housing Gold', '2018-08-15 15:23:15', 1);
INSERT INTO `classify` VALUES (13, 2, NULL, 0, '', 'Mini-HDMI, Type A Male to Type C Male', '2018-08-15 15:23:36', 1);
INSERT INTO `classify` VALUES (14, 1, 13, 1, '', '	Mini-HDMI AMCM #1 Housing Ends', '2018-08-15 15:23:53', 1);
INSERT INTO `classify` VALUES (15, 2, 13, 1, '', '	Mini-HDMI AMCM #2 Housing Ends', '2018-08-15 15:24:04', 1);
INSERT INTO `classify` VALUES (16, 3, 13, 1, '', '	Mini-HDMI AMCM #3 Housing Ends', '2018-08-15 15:24:12', 1);
INSERT INTO `classify` VALUES (17, 4, 13, 1, '', '	Mini-HDMI AMCM #4 Housing Ends', '2018-08-15 15:24:25', 1);
INSERT INTO `classify` VALUES (18, 5, 13, 1, '', '	Mini-HDMI AMCM #5 Housing Ends', '2018-08-15 15:24:36', 1);
INSERT INTO `classify` VALUES (19, 6, 13, 1, '', '	Mini-HDMI AMCM #6 Housing Ends', '2018-08-15 15:24:45', 1);
INSERT INTO `classify` VALUES (20, 7, 13, 1, '', '	Mini-HDMI AMCM #7 Housing Ends', '2018-08-15 15:24:53', 1);
INSERT INTO `classify` VALUES (21, 8, 13, 1, '', '	Mini-HDMI AMCM #8 Housing Ends', '2018-08-15 15:25:03', 1);
INSERT INTO `classify` VALUES (22, 9, 13, 1, '', '	Mini-HDMI AMCM #9 Housing Ends', '2018-08-15 15:25:10', 1);
INSERT INTO `classify` VALUES (23, 10, 13, 1, '', '	Mini-HDMI AMCM #10 Housing Ends', '2018-08-15 15:25:17', 1);
INSERT INTO `classify` VALUES (24, 3, NULL, 0, '', 'Micro-HDMI, Type A Male to Type D Male', '2018-08-15 15:25:31', 1);
INSERT INTO `classify` VALUES (25, 1, 24, 1, '', 'Micro-HDMI AMDM #1 Housing Ends', '2018-08-15 15:25:57', 1);
INSERT INTO `classify` VALUES (26, 2, 24, 1, '', 'Micro-HDMI AMDM #2 Housing Ends', '2018-08-15 15:26:07', 1);
INSERT INTO `classify` VALUES (27, 3, 24, 1, '', 'Micro-HDMI AMDM #3 Housing Ends', '2018-08-15 15:26:14', 1);
INSERT INTO `classify` VALUES (28, 4, 24, 1, '', 'Micro-HDMI AMDM #4 Housing Ends', '2018-08-15 15:26:22', 1);
INSERT INTO `classify` VALUES (29, 5, 24, 1, '', 'Micro-HDMI AMDM #5 Housing Ends', '2018-08-15 15:26:35', 1);
INSERT INTO `classify` VALUES (30, 6, 24, 1, '', 'Micro-HDMI AMDM #6 Housing Ends', '2018-08-15 15:26:45', 1);
INSERT INTO `classify` VALUES (31, 7, 24, 1, '', 'Micro-HDMI AMDM #7 Housing Ends', '2018-08-15 15:26:54', 1);
INSERT INTO `classify` VALUES (32, 8, 24, 1, '', 'Micro-HDMI AMDM #8 Housing Ends', '2018-08-15 15:27:03', 1);
INSERT INTO `classify` VALUES (33, 9, 24, 1, '', 'Micro-HDMI AMDM #9 Housing Ends', '2018-08-15 15:27:13', 1);
INSERT INTO `classify` VALUES (34, 10, 24, 1, '', 'Micro-HDMI AMDM #10 Housing Ends', '2018-08-15 15:27:28', 1);
INSERT INTO `classify` VALUES (100, 3, 71, 1, '', 'DVI-I Single-Link Cable', '2018-08-15 16:02:51', 1);
INSERT INTO `classify` VALUES (99, 2, 71, 1, '', 'DVI-D Dual-Link Cable	', '2018-08-15 16:02:26', 1);
INSERT INTO `classify` VALUES (98, 1, 71, 1, '', 'DVI-D Single-Link Cable', '2018-08-15 16:02:08', 1);
INSERT INTO `classify` VALUES (38, 4, NULL, 0, '', 'Angled HDMI', '2018-08-15 15:27:49', 1);
INSERT INTO `classify` VALUES (39, 1, 38, 1, '', 'Angled HDMI AMAM #1 Housing Ends', '2018-08-15 15:28:02', 1);
INSERT INTO `classify` VALUES (40, 2, 38, 1, '', 'Angled HDMI AMAM #2 Housing Ends', '2018-08-15 15:28:14', 1);
INSERT INTO `classify` VALUES (41, 3, 38, 1, '', 'Angled HDMI AMAM #3 Housing Ends', '2018-08-15 15:28:28', 1);
INSERT INTO `classify` VALUES (42, 4, 38, 1, '', 'Angled HDMI AMAM #4 Housing Ends', '2018-08-15 15:29:51', 1);
INSERT INTO `classify` VALUES (44, 5, 38, 1, '', 'Angled HDMI AMAM #5 Housing Ends', '2018-08-15 15:30:04', 1);
INSERT INTO `classify` VALUES (56, 7, NULL, 0, '', 'Flat HDMI Cable', '2018-08-15 15:33:40', 1);
INSERT INTO `classify` VALUES (46, 6, 38, 1, '', 'Angled HDMI AMAM #6 Housing Ends', '2018-08-15 15:30:14', 1);
INSERT INTO `classify` VALUES (47, 7, 38, 1, '', 'Angled HDMI AMAM #7 Housing Ends', '2018-08-15 15:30:24', 1);
INSERT INTO `classify` VALUES (57, 1, 56, 1, '', 'Flat HDMI AMAM Cable', '2018-08-15 15:34:05', 1);
INSERT INTO `classify` VALUES (49, 8, 38, 1, '', 'Angled HDMI AMAM #8 Housing Ends', '2018-08-15 15:30:36', 1);
INSERT INTO `classify` VALUES (50, 9, 38, 1, '', 'Angled HDMI AMAM #9 Housing Ends', '2018-08-15 15:30:47', 1);
INSERT INTO `classify` VALUES (51, 10, 38, 1, '', 'Angled HDMI AMAM #10 Housing Ends', '2018-08-15 15:30:55', 1);
INSERT INTO `classify` VALUES (52, 5, NULL, 0, '', 'Swivel HDMI Cable', '2018-08-15 15:31:17', 1);
INSERT INTO `classify` VALUES (53, 6, NULL, 0, '', 'Extension HDMI Cable Male to Female', '2018-08-15 15:31:55', 1);
INSERT INTO `classify` VALUES (68, 8, NULL, 0, '', '', '2018-08-15 15:38:45', 1);
INSERT INTO `classify` VALUES (69, 9, NULL, 0, '', '', '2018-08-15 15:38:49', 1);
INSERT INTO `classify` VALUES (70, 10, NULL, 0, '', 'Adapter Cable', '2018-08-15 15:50:57', 1);
INSERT INTO `classify` VALUES (71, 11, NULL, 0, '', 'Standard DVI Cable', '2018-08-15 15:57:32', 1);
INSERT INTO `classify` VALUES (72, 1, 70, 1, '', 'HDMI - DVI Adapter Cable', '2018-08-15 15:51:29', 1);
INSERT INTO `classify` VALUES (103, 1, 102, 1, '', 'VGA M/M Cable with Cube Housing Ends', '2018-08-15 16:05:01', 1);
INSERT INTO `classify` VALUES (74, 2, 70, 1, '', 'HDMI - RCA Adapter Cable	', '2018-08-15 15:51:57', 1);
INSERT INTO `classify` VALUES (102, 12, NULL, 0, '', 'VGA SVGA Cable', '2018-08-15 16:04:36', 1);
INSERT INTO `classify` VALUES (101, 4, 71, 1, '', 'DVI-I Dual-Link Cable', '2018-08-15 16:03:11', 1);
INSERT INTO `classify` VALUES (108, 5, 102, 1, '', 'Audio-VGA M/M Cable w/AUX 3.5mm with Apple Housing Ends', '2018-08-15 16:08:01', 1);
INSERT INTO `classify` VALUES (107, 4, 102, 1, '', 'Audio-VGA M/M Cable w/AUX 3.5mm with Cube Housing Ends	', '2018-08-15 16:07:19', 1);
INSERT INTO `classify` VALUES (106, 3, 102, 1, '', 'VGA M/M Cable with Yellowknife Housing Ends', '2018-08-15 16:05:51', 1);
INSERT INTO `classify` VALUES (105, 2, 102, 1, '', 'VGA M/M Cable with Apple Housing Ends', '2018-08-15 16:05:28', 1);
INSERT INTO `classify` VALUES (104, 1, 102, 1, '', 'VGA M/M Cable with Cube Housing Ends', '2018-08-15 16:05:01', 1);
INSERT INTO `classify` VALUES (86, 3, 70, 1, '', 'HDMI - RCA Adapter Cable	', '2018-08-15 15:52:16', 1);
INSERT INTO `classify` VALUES (87, 4, 70, 1, '', 'HDMI - VGA+RCA Adapter Cable', '2018-08-15 15:52:30', 1);
INSERT INTO `classify` VALUES (88, 5, 70, 1, '', 'MHL Micro-USB to HDMI', '2018-08-15 15:52:49', 1);
INSERT INTO `classify` VALUES (89, 6, 70, 1, '', 'VGA - RCA Adapter Cable	', '2018-08-15 15:53:03', 1);
INSERT INTO `classify` VALUES (90, 7, 70, 1, '', 'DVI - VGA Adapter Cable	', '2018-08-15 15:53:17', 1);
INSERT INTO `classify` VALUES (91, 8, 70, 1, '', 'DP Adapter Cable', '2018-08-15 15:53:31', 1);
INSERT INTO `classify` VALUES (92, 9, 70, 1, '', 'MDP Adapter Cable	', '2018-08-15 15:53:44', 1);
INSERT INTO `classify` VALUES (93, 10, 70, 1, '', 'Mini-DVI Adapter Cable', '2018-08-15 15:53:59', 1);
INSERT INTO `classify` VALUES (94, 11, 70, 1, '', 'Apple 30-PIN Adapter Cable', '2018-08-15 15:54:16', 1);
INSERT INTO `classify` VALUES (95, 12, 70, 1, '', 'USB Adapter Cable', '2018-08-15 15:54:29', 1);
INSERT INTO `classify` VALUES (96, 13, 70, 1, '', 'Slimport Adapter Cable', '2018-08-15 15:54:45', 1);
INSERT INTO `classify` VALUES (97, 14, 70, 1, '', 'USB 3.1 Type C Adapter Cable', '2018-08-15 15:54:59', 1);
INSERT INTO `classify` VALUES (109, 6, 102, 1, '', 'Audio-VGA M/M Cable w/AUX 3.5mm with Yellowknife Housing Ends', '2018-08-15 16:08:22', 1);
INSERT INTO `classify` VALUES (110, 7, 102, 1, '', 'VGA M/F Extension Cable with Cube Housing Ends', '2018-08-15 16:08:36', 1);
INSERT INTO `classify` VALUES (111, 8, 102, 1, '', 'VGA M/F Extension Cable with Apple Housing Ends', '2018-08-15 16:08:50', 1);
INSERT INTO `classify` VALUES (112, 9, 102, 1, '', 'VGA M/F Extension Cable with Yellowknife Housing Ends', '2018-08-15 16:09:08', 1);
INSERT INTO `classify` VALUES (113, 10, 102, 1, '', 'VGA Splitter', '2018-08-15 16:09:25', 1);
INSERT INTO `classify` VALUES (114, 11, 102, 1, '', 'VGA Adapter Cable', '2018-08-15 16:09:49', 1);
INSERT INTO `classify` VALUES (115, 13, NULL, 0, '', 'Ethernet LAN Cable', '2018-08-15 16:10:08', 1);
INSERT INTO `classify` VALUES (116, 1, 115, 1, '', 'Cat5e LAN Cable', '2018-08-15 16:10:30', 1);
INSERT INTO `classify` VALUES (117, 2, 115, 1, '', 'Cat6 LAN Cable', '2018-08-15 16:10:46', 1);
INSERT INTO `classify` VALUES (118, 3, 115, 1, '', 'Cat7 Lan Cable', '2018-08-15 16:11:02', 1);
INSERT INTO `classify` VALUES (119, 14, NULL, 0, '', 'USB 2.0 Cable', '2018-08-15 16:11:16', 1);
INSERT INTO `classify` VALUES (120, 1, 119, 1, '', 'USB 2.0 AMAM Cable', '2018-08-15 16:11:50', 1);
INSERT INTO `classify` VALUES (121, 2, 119, 1, '', 'USB 2.0 AMAF Extension Cable	', '2018-08-15 16:12:10', 1);
INSERT INTO `classify` VALUES (122, 3, 119, 1, '', 'USB 2.0 AMBM Printer Cable', '2018-08-15 16:12:26', 1);
INSERT INTO `classify` VALUES (123, 4, 119, 1, '', 'Micro-USB 2.0 AMMB Cable', '2018-08-15 16:12:44', 1);
INSERT INTO `classify` VALUES (124, 5, 119, 1, '', 'Mini-USB 2.0 AMMBM Cable', '2018-08-15 16:12:56', 1);
INSERT INTO `classify` VALUES (125, 6, 119, 1, '', 'RS232 Cable', '2018-08-15 16:13:12', 1);
INSERT INTO `classify` VALUES (126, 15, NULL, 0, '', 'USB 3.0 Cable', '2018-08-15 16:13:29', 1);
INSERT INTO `classify` VALUES (127, 1, 126, 1, '', 'USB 3.0 AMAM Cable', '2018-08-15 16:13:48', 1);
INSERT INTO `classify` VALUES (128, 2, 126, 1, '', 'USB 3.0 AMAF Extension Cable	', '2018-08-15 16:14:08', 1);
INSERT INTO `classify` VALUES (129, 3, 126, 1, '', 'USB 3.0 AMBM Printer Cable', '2018-08-15 16:14:24', 1);
INSERT INTO `classify` VALUES (130, 4, 126, 1, '', 'Micro-USB 3.0 Cable', '2018-08-15 16:14:38', 1);
INSERT INTO `classify` VALUES (131, 5, 126, 1, '', 'Mini-USB 3.0 Cable', '2018-08-15 16:14:51', 1);
INSERT INTO `classify` VALUES (132, 16, NULL, 0, '', 'Audio/Video Cable', '2018-08-15 16:15:08', 1);
INSERT INTO `classify` VALUES (133, 1, 132, 1, '', 'AUX 3.5mm M/M Cable', '2018-08-15 16:15:25', 1);
INSERT INTO `classify` VALUES (134, 2, 132, 1, '', 'AUX 3.5mm M/F Cable', '2018-08-15 16:15:55', 1);
INSERT INTO `classify` VALUES (135, 3, 132, 1, '', '3.5mm - 2RCA Cable', '2018-08-15 16:16:15', 1);
INSERT INTO `classify` VALUES (136, 3, 132, 1, '', '3.5mm - 2RCA Cable', '2018-08-15 16:16:17', 1);
INSERT INTO `classify` VALUES (137, 4, 132, 1, '', '2RCA Cable', '2018-08-15 16:16:33', 1);
INSERT INTO `classify` VALUES (138, 5, 132, 1, '', '3RCA Component RGB Cable', '2018-08-15 16:16:45', 1);
INSERT INTO `classify` VALUES (139, 6, 132, 1, '', '3RCA Composite RYW Cable', '2018-08-15 16:17:15', 1);
INSERT INTO `classify` VALUES (140, 7, 132, 1, '', 'Audio/Video Adapter Cable', '2018-08-15 16:17:38', 1);
INSERT INTO `classify` VALUES (141, 17, NULL, 0, '', 'Coxial Cable', '2018-08-15 16:17:49', 1);
INSERT INTO `classify` VALUES (142, 1, 141, 1, '', 'Standard Coxial Cable	', '2018-08-15 16:18:19', 1);
INSERT INTO `classify` VALUES (143, 18, NULL, 0, '', 'S-Video Cable', '2018-08-15 16:18:35', 1);
INSERT INTO `classify` VALUES (144, 1, 143, 1, '', 'Standard S-Video Cable M/M', '2018-08-15 16:18:48', 1);
INSERT INTO `classify` VALUES (145, 19, NULL, 0, '', 'Data Sync Cable', '2018-08-15 16:19:02', 1);
INSERT INTO `classify` VALUES (146, 1, 145, 1, '', 'iPhone 4 Cable', '2018-08-15 16:19:18', 1);
INSERT INTO `classify` VALUES (147, 2, 145, 1, '', 'iPhone 5 Cable', '2018-08-15 16:19:33', 1);
INSERT INTO `classify` VALUES (148, 3, 145, 1, '', 'iPhone 4 to 5 Adapter Cable', '2018-08-15 16:20:08', 1);
INSERT INTO `classify` VALUES (149, 3, 145, 1, '', 'iPhone 4 to 5 Adapter Cable', '2018-08-15 16:20:09', 1);
INSERT INTO `classify` VALUES (150, 4, 145, 1, '', 'Samsung Cable', '2018-08-15 16:20:21', 1);
INSERT INTO `classify` VALUES (151, 5, 145, 1, '', 'AUSA Cable', '2018-08-15 16:20:36', 1);
INSERT INTO `classify` VALUES (152, 6, 145, 1, '', 'iPod shuffle Sync Cable', '2018-08-15 16:20:57', 1);
INSERT INTO `classify` VALUES (153, 7, 145, 1, '', 'Type C Cable	', '2018-08-15 16:21:37', 1);
INSERT INTO `classify` VALUES (154, 8, 145, 1, '', 'USB 3.1 to USB 3.0', '2018-08-15 16:21:51', 1);
INSERT INTO `classify` VALUES (155, 20, NULL, 0, '', 'Optical Fiber Cable', '2018-08-15 16:22:11', 1);
INSERT INTO `classify` VALUES (156, 1, 155, 1, '', 'Optical Toslink Cable', '2018-08-15 16:22:31', 1);
INSERT INTO `classify` VALUES (157, 2, 155, 1, '', 'Optical Mni-Toslink Cable', '2018-08-15 16:22:48', 1);
INSERT INTO `classify` VALUES (158, 21, NULL, 0, '', 'SATA Cable', '2018-08-15 16:23:22', 1);
INSERT INTO `classify` VALUES (159, 1, 158, 1, '', '18\'\' SATA Cable', '2018-08-15 16:23:40', 1);
INSERT INTO `classify` VALUES (160, 2, 158, 1, '', '36\'\' SATA Cable', '2018-08-15 16:23:50', 1);
INSERT INTO `classify` VALUES (161, 22, NULL, 0, '', 'Power Cable', '2018-08-15 16:24:08', 1);
INSERT INTO `classify` VALUES (162, 1, 161, 1, '', 'Power Cable Extension, Male to Female', '2018-08-15 16:24:31', 1);
INSERT INTO `classify` VALUES (163, 23, NULL, 0, '', 'Coupler', '2018-08-15 16:25:02', 1);
INSERT INTO `classify` VALUES (164, 1, 163, 1, '', 'HDMI Coupler', '2018-08-15 16:26:14', 1);
INSERT INTO `classify` VALUES (165, 1, 163, 1, '', 'HDMI Coupler', '2018-08-15 16:26:14', 1);
INSERT INTO `classify` VALUES (166, 2, 163, 1, '', 'VGA Coupler', '2018-08-15 16:26:35', 1);
INSERT INTO `classify` VALUES (167, 3, 163, 1, '', 'USB Coupler', '2018-08-15 16:27:00', 1);
INSERT INTO `classify` VALUES (168, 4, 163, 1, '', 'Fiber Coupler', '2018-08-15 16:30:43', 1);
INSERT INTO `classify` VALUES (169, 5, 163, 1, '', 'AUX Coupler', '2018-08-15 16:31:00', 1);
INSERT INTO `classify` VALUES (170, 6, 163, 1, '', 'DP MDP Coupler', '2018-08-15 16:31:27', 1);
INSERT INTO `classify` VALUES (171, 7, 163, 1, '', 'Network LAN Coupler', '2018-08-15 16:31:45', 1);
INSERT INTO `classify` VALUES (172, 8, 163, 1, '', 'Apple Coupler', '2018-08-15 16:32:01', 1);
INSERT INTO `classify` VALUES (173, 24, NULL, 0, '', 'Other Cables	', '2018-08-15 16:32:31', 1);
INSERT INTO `classify` VALUES (174, 1, 173, 1, '', 'Retractable Cables', '2018-08-15 16:32:50', 1);
INSERT INTO `classify` VALUES (175, 2, 173, 1, '', 'Gaming Cables', '2018-08-15 16:33:03', 1);
INSERT INTO `classify` VALUES (176, 3, 173, 1, '', 'Music Cables	', '2018-08-15 16:33:16', 1);
INSERT INTO `classify` VALUES (177, 25, NULL, 0, '', 'Screen Protector Guard', '2018-08-15 16:33:33', 1);
INSERT INTO `classify` VALUES (178, 1, 177, 1, '', 'Apple iPhone Screen Protector	', '2018-08-15 16:33:53', 1);
INSERT INTO `classify` VALUES (179, 2, 177, 1, '', 'Apple iPod Touch Screen Protector', '2018-08-15 16:34:09', 1);
INSERT INTO `classify` VALUES (180, 3, 177, 1, '', 'Apple iPad Screen Protector', '2018-08-15 16:34:24', 1);
INSERT INTO `classify` VALUES (181, 4, 177, 1, '', 'Samsung Screen Protector', '2018-08-15 16:34:37', 1);
INSERT INTO `classify` VALUES (182, 5, 177, 1, '', 'Google Screen Protector', '2018-08-15 16:34:50', 1);
INSERT INTO `classify` VALUES (183, 6, 177, 1, '', 'BlackBerry Screen Protector', '2018-08-15 16:35:07', 1);
INSERT INTO `classify` VALUES (184, 7, 177, 1, '', 'AUSA Screen Protector', '2018-08-15 16:35:20', 1);
INSERT INTO `classify` VALUES (185, 8, 177, 1, '', 'HTC Screen Protector', '2018-08-15 16:35:35', 1);
INSERT INTO `classify` VALUES (186, 9, 177, 1, '', 'Sony-Ericsson Screen Protector', '2018-08-15 16:35:46', 1);
INSERT INTO `classify` VALUES (187, 10, 177, 1, '', 'LG Screen Protector', '2018-08-15 16:37:20', 1);
INSERT INTO `classify` VALUES (188, 11, 177, 1, '', 'Lenovo Screen Protector', '2018-08-15 16:37:32', 1);
INSERT INTO `classify` VALUES (189, 12, 177, 1, '', 'HP Screen Protector', '2018-08-15 16:37:45', 1);
INSERT INTO `classify` VALUES (190, 13, 177, 1, '', 'Motorola Screen Protector', '2018-08-15 16:37:57', 1);
INSERT INTO `classify` VALUES (191, 14, 177, 1, '', 'Amazon Screen Protector', '2018-08-15 16:38:13', 1);
INSERT INTO `classify` VALUES (192, 15, 177, 1, '', 'Apple Macbook Screen Protector', '2018-08-15 16:38:27', 1);
INSERT INTO `classify` VALUES (193, 16, 177, 1, '', 'Apple Watch Screen Protector', '2018-08-15 16:38:38', 1);
INSERT INTO `classify` VALUES (194, 17, 177, 1, '', 'Game Machine Screen Protector', '2018-08-15 16:38:52', 1);
INSERT INTO `classify` VALUES (195, 26, NULL, 0, '', 'Case, Skin and Cover', '2018-08-15 16:39:03', 1);
INSERT INTO `classify` VALUES (196, 1, 195, 1, '', 'Apple iPhone Case', '2018-08-15 16:39:18', 1);
INSERT INTO `classify` VALUES (197, 2, 195, 1, '', 'Apple iPod Touch Case', '2018-08-15 16:39:30', 1);
INSERT INTO `classify` VALUES (198, 3, 195, 1, '', 'Apple iPad Case', '2018-08-15 16:39:43', 1);
INSERT INTO `classify` VALUES (199, 4, 195, 1, '', 'Samsung Case', '2018-08-15 16:39:55', 1);
INSERT INTO `classify` VALUES (200, 5, 195, 1, '', 'Google Case', '2018-08-15 16:40:09', 1);
INSERT INTO `classify` VALUES (201, 6, 195, 1, '', 'Apple MacBook', '2018-08-15 16:40:21', 1);
INSERT INTO `classify` VALUES (202, 7, 195, 1, '', 'Blackberry Case', '2018-08-15 16:40:34', 1);
INSERT INTO `classify` VALUES (203, 8, 195, 1, '', 'LG Case', '2018-08-15 16:40:46', 1);
INSERT INTO `classify` VALUES (204, 9, 195, 1, '', 'HTC Case', '2018-08-15 16:40:57', 1);
INSERT INTO `classify` VALUES (205, 10, 195, 1, '', 'Apple Watch Case', '2018-08-15 16:41:12', 1);
INSERT INTO `classify` VALUES (206, 11, 195, 1, '', 'Motorola Case', '2018-08-15 16:41:24', 1);
INSERT INTO `classify` VALUES (207, 12, 195, 1, '', 'Travel Accessories', '2018-08-15 16:41:37', 1);
INSERT INTO `classify` VALUES (208, 13, 195, 1, '', 'Computer Components', '2018-08-15 16:41:49', 1);
INSERT INTO `classify` VALUES (209, 14, 195, 1, '', 'Samrt Phone Components	', '2018-08-15 16:42:00', 1);
INSERT INTO `classify` VALUES (210, 15, 195, 1, '', 'Game Machine Cases	', '2018-08-15 16:42:11', 1);
INSERT INTO `classify` VALUES (211, 16, 195, 1, '', 'Leather Wallet', '2018-08-15 16:42:26', 1);
INSERT INTO `classify` VALUES (212, 27, NULL, 0, '', 'Touch Screen Stylus', '2018-08-15 16:42:41', 1);
INSERT INTO `classify` VALUES (213, 1, 212, 1, '', 'Bullet Stylus', '2018-08-15 16:42:54', 1);
INSERT INTO `classify` VALUES (214, 2, 212, 1, '', 'Straight Stylus', '2018-08-15 16:43:07', 1);
INSERT INTO `classify` VALUES (215, 3, 212, 1, '', 'Premium Stylus', '2018-08-15 16:43:21', 1);
INSERT INTO `classify` VALUES (216, 4, 212, 1, '', 'Mounts & Holders', '2018-08-15 16:43:34', 1);
INSERT INTO `classify` VALUES (217, 28, NULL, 0, '', 'Keyboard and Mouse', '2018-08-15 16:43:48', 1);
INSERT INTO `classify` VALUES (218, 1, 217, 1, '', 'Keyboard Skin Cover', '2018-08-15 16:44:05', 1);
INSERT INTO `classify` VALUES (219, 2, 217, 1, '', 'Mouse', '2018-08-15 16:44:17', 1);
INSERT INTO `classify` VALUES (226, 1, 225, 1, '', 'Vehicle Data Recorder', '2018-08-15 16:45:33', 1);
INSERT INTO `classify` VALUES (221, 29, NULL, 0, '', 'Power and Battery', '2018-08-15 16:44:29', 1);
INSERT INTO `classify` VALUES (222, 1, 221, 1, '', 'Power Bank', '2018-08-15 16:44:41', 1);
INSERT INTO `classify` VALUES (223, 2, 221, 1, '', 'External Battery Case', '2018-08-15 16:44:53', 1);
INSERT INTO `classify` VALUES (224, 3, 221, 1, '', 'Wireless Charger', '2018-08-15 16:45:04', 1);
INSERT INTO `classify` VALUES (225, 30, NULL, 0, '', 'Car Accessories', '2018-08-15 16:45:15', 1);
INSERT INTO `classify` VALUES (227, 31, NULL, 0, '', 'Sporting Goods', '2018-08-15 16:45:44', 1);
INSERT INTO `classify` VALUES (228, 1, 227, 1, '', 'Fishing Goods', '2018-08-15 16:46:01', 1);
INSERT INTO `classify` VALUES (229, 2, 227, 1, '', 'Fitness Goods', '2018-08-15 16:46:12', 1);
INSERT INTO `classify` VALUES (230, 32, NULL, 0, '', 'Other Electronic Assessories', '2018-08-15 16:46:23', 1);
INSERT INTO `classify` VALUES (231, 1, 230, 1, '', 'SIM Card Adapter', '2018-08-15 16:46:38', 1);
INSERT INTO `classify` VALUES (232, 33, NULL, 0, '', 'Converter and Splitter', '2018-08-15 16:46:54', 1);
INSERT INTO `classify` VALUES (233, 1, 232, 1, '', 'Audio/Video Converter', '2018-08-15 16:47:07', 1);
INSERT INTO `classify` VALUES (234, 2, 232, 1, '', 'HDMI Splitter', '2018-08-15 16:47:18', 1);
INSERT INTO `classify` VALUES (235, 34, NULL, 0, '', 'USB Device', '2018-08-15 16:47:30', 1);
INSERT INTO `classify` VALUES (236, 1, 235, 1, '', 'Adapter', '2018-08-15 16:47:45', 1);
INSERT INTO `classify` VALUES (237, 2, 235, 1, '', 'Charger', '2018-08-15 16:48:00', 1);
INSERT INTO `classify` VALUES (238, 35, NULL, 0, '', 'Car sticker Decal', '2018-08-15 16:48:17', 1);
INSERT INTO `classify` VALUES (239, 1, 238, 1, '', 'Family Car Sticker Decal', '2018-08-15 16:48:37', 1);
INSERT INTO `classify` VALUES (240, 36, NULL, 0, '', 'Home & Garden Accesories', '2018-08-15 16:48:48', 1);
INSERT INTO `classify` VALUES (241, 1, 240, 1, '', 'Kitchen Supplies', '2018-08-15 16:49:01', 1);
INSERT INTO `classify` VALUES (242, 37, NULL, 0, '', 'Pet Supplies', '2018-08-15 16:49:15', 1);
INSERT INTO `classify` VALUES (243, 1, 242, 1, '', 'Hair Removal Mitts & Rollers', '2018-08-15 16:49:27', 1);
INSERT INTO `classify` VALUES (244, 38, NULL, 0, '', 'Earphone Products', '2018-08-15 16:49:42', 1);
INSERT INTO `classify` VALUES (245, 1, 244, 1, '', 'Small Earphones', '2018-08-15 16:49:58', 1);
INSERT INTO `classify` VALUES (246, 2, 244, 1, '', 'Big Headset Products', '2018-08-15 16:50:11', 1);
INSERT INTO `classify` VALUES (247, 3, 244, 1, '', 'Headphone 3.5mm Anti Dust Plug Cap', '2018-08-15 16:50:24', 1);
INSERT INTO `classify` VALUES (248, 39, NULL, 0, '', 'Digital Camera Accessories', '2018-08-15 16:50:35', 1);
INSERT INTO `classify` VALUES (249, 1, 248, 1, '', 'Accessories', '2018-08-15 16:50:47', 1);
INSERT INTO `classify` VALUES (250, 40, NULL, 0, '', 'Bluetooth Accessories', '2018-08-15 16:51:01', 1);
INSERT INTO `classify` VALUES (251, 1, 250, 1, '', 'Bluetooth Remote Shutter', '2018-08-15 16:51:15', 1);
INSERT INTO `classify` VALUES (252, 2, 250, 1, '', 'Bluetooth Anti-lost Alarm', '2018-08-15 16:51:27', 1);
INSERT INTO `classify` VALUES (253, 41, NULL, 0, '', 'Touchscreen Winter Gloves', '2018-08-15 16:51:39', 1);
INSERT INTO `classify` VALUES (254, 1, 253, 1, '', 'Pure Color Touchscreen Winter Gloves', '2018-08-15 16:51:55', 1);
INSERT INTO `classify` VALUES (255, 2, 253, 1, '', 'Mix Touchscreen Winter Gloves', '2018-08-15 16:52:05', 1);
INSERT INTO `classify` VALUES (256, 42, NULL, 0, '', 'Beauty', '2018-08-15 16:52:15', 1);
INSERT INTO `classify` VALUES (257, 1, 256, 1, '', 'Nail Accessories', '2018-08-15 16:52:28', 1);
INSERT INTO `classify` VALUES (258, 2, 256, 1, '', 'Face Accessories', '2018-08-15 16:52:42', 1);
INSERT INTO `classify` VALUES (259, 43, NULL, 0, '', 'Home & Kitchen', '2018-08-15 16:52:55', 1);
INSERT INTO `classify` VALUES (260, 1, 259, 1, '', 'Salad Accessories', '2018-08-15 16:53:12', 1);
INSERT INTO `classify` VALUES (261, 2, 259, 1, '', 'Home Equipment', '2018-08-15 16:53:47', 1);
INSERT INTO `classify` VALUES (262, 3, 259, 1, '', 'household supplies', '2018-08-15 16:54:26', 1);
INSERT INTO `classify` VALUES (263, 44, NULL, 0, '', 'Tablet', '2018-08-15 16:54:35', 1);
INSERT INTO `classify` VALUES (264, 1, 263, 1, '', 'Android Tablet PC', '2018-08-15 16:54:59', 1);
INSERT INTO `classify` VALUES (265, 2, 263, 1, '', 'Window Tablet PC', '2018-08-15 16:55:16', 1);
INSERT INTO `classify` VALUES (266, 45, NULL, 0, '', 'Envelop', '2018-08-15 16:55:42', 1);
INSERT INTO `classify` VALUES (267, 1, 266, 1, '', 'Paper Envelop', '2018-08-15 16:56:13', 1);
INSERT INTO `classify` VALUES (268, 2, 266, 1, '', 'Bubble Envelop', '2018-08-15 16:56:21', 1);
INSERT INTO `classify` VALUES (269, 3, 266, 1, '', 'Hard Carton Envelop', '2018-08-15 16:56:35', 1);
INSERT INTO `classify` VALUES (270, 4, 266, 1, '', 'Waterproof Bag', '2018-08-15 16:56:53', 1);
INSERT INTO `classify` VALUES (271, 5, 266, 1, '', 'Packing Box', '2018-08-15 16:57:06', 1);
INSERT INTO `classify` VALUES (272, 6, 266, 1, '', 'Packing Bags	', '2018-08-15 16:57:18', 1);
INSERT INTO `classify` VALUES (273, 46, NULL, 0, '', 'Shipping', '2018-08-15 16:57:33', 1);
INSERT INTO `classify` VALUES (274, 1, 273, 1, '', 'Shipping Cost from China', '2018-08-15 16:57:48', 1);
INSERT INTO `classify` VALUES (275, 2, 273, 1, '', 'Shipping Cost from USA', '2018-08-15 16:58:00', 1);
INSERT INTO `classify` VALUES (276, 3, 273, 1, '', 'Shipping Cost from Canada', '2018-08-15 16:58:14', 1);
INSERT INTO `classify` VALUES (277, 4, 273, 1, '', 'Shipping Cost from Australia', '2018-08-15 16:58:27', 1);
INSERT INTO `classify` VALUES (278, 47, NULL, 0, '', 'Label', '2018-08-15 16:58:43', 1);
INSERT INTO `classify` VALUES (279, 1, 278, 1, '', 'N/A', '2018-08-15 16:59:03', 1);
INSERT INTO `classify` VALUES (280, 2, 278, 1, '', 'N/A', '2018-08-15 16:59:11', 1);
INSERT INTO `classify` VALUES (281, 3, 278, 1, '', 'N/A', '2018-08-15 16:59:19', 1);
INSERT INTO `classify` VALUES (282, 4, 278, 1, '', 'Self-stick Shipping Label', '2018-08-15 16:59:32', 1);
INSERT INTO `classify` VALUES (283, 48, NULL, 0, '', 'Unit Cost', '2018-08-15 16:59:44', 1);
INSERT INTO `classify` VALUES (284, 1, 283, 1, '', 'Cost in China', '2018-08-15 16:59:59', 1);
INSERT INTO `classify` VALUES (285, 2, 283, 1, '', 'Cost in USA', '2018-08-15 17:00:18', 1);
INSERT INTO `classify` VALUES (286, 3, 283, 1, '', 'Cost in Canada', '2018-08-15 17:00:30', 1);
INSERT INTO `classify` VALUES (287, 4, 283, 1, '', 'Cost in Australia', '2018-08-15 17:00:42', 1);
INSERT INTO `classify` VALUES (288, 3, 263, 2, NULL, NULL, '2018-08-22 08:58:14', NULL);

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `phone` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '电话号:13838830078',
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 95 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '联系方式表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (3, 0, '18', NULL);
INSERT INTO `contact` VALUES (26, 62, '333333', NULL);
INSERT INTO `contact` VALUES (27, 62, '444444', NULL);
INSERT INTO `contact` VALUES (28, 62, '11111', NULL);
INSERT INTO `contact` VALUES (90, 69, '', NULL);
INSERT INTO `contact` VALUES (91, 70, '', NULL);
INSERT INTO `contact` VALUES (94, 71, '123', NULL);
INSERT INTO `contact` VALUES (89, 68, '', NULL);
INSERT INTO `contact` VALUES (88, 67, '', NULL);
INSERT INTO `contact` VALUES (87, 66, '', NULL);
INSERT INTO `contact` VALUES (82, 65, '2232', NULL);
INSERT INTO `contact` VALUES (93, 1, '18638369723', NULL);
INSERT INTO `contact` VALUES (92, 1, '1233', NULL);

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spelling` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '简拼',
  `countryzh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '国家中文名',
  `countyus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '国家英文名',
  `symbol` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '货币符号',
  `exchange_rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '汇率',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '国家表	' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ebay_join
-- ----------------------------
DROP TABLE IF EXISTS `ebay_join`;
CREATE TABLE `ebay_join`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `platform_number` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT 'ebay的货号',
  `platform_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT 'ebay的变量',
  `pid` int(11) NULL DEFAULT NULL COMMENT '对应产品表id',
  `state` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '状态.',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '多变量和sku的对应连接' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ebay_join
-- ----------------------------
INSERT INTO `ebay_join` VALUES (1, '112537243408', '[iPhone 6 / iPhone 6s,Battery Case Only,Apple MFI Certified]', 1, '1');

-- ----------------------------
-- Table structure for html
-- ----------------------------
DROP TABLE IF EXISTS `html`;
CREATE TABLE `html`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NULL DEFAULT NULL COMMENT '创建者id',
  `number` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '模板号',
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '位置',
  `val` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT '内容',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1743 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '产品模板' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of html
-- ----------------------------
INSERT INTO `html` VALUES (1266, 1, '第一条测试模板', 'imgone', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1267, 1, '第一条测试模板', 'otitle1', '第一个标题');
INSERT INTO `html` VALUES (1268, 1, '第一条测试模板', 'otitle2', '第二个标题');
INSERT INTO `html` VALUES (1269, 1, '第一条测试模板', 'ocontent1', '测试内容2');
INSERT INTO `html` VALUES (1270, 1, '第一条测试模板', 'tcontent1', '这是LI标签的测试');
INSERT INTO `html` VALUES (1271, 1, '第一条测试模板', 'tcontent2', '第二LI');
INSERT INTO `html` VALUES (1272, 1, '第一条测试模板', 'thcontent1', '选择测试内容');
INSERT INTO `html` VALUES (1273, 1, '第一条测试模板', 'thcontent2', '可选择测试内容');
INSERT INTO `html` VALUES (1274, 1, '第一条测试模板', 'caution', '警告标题');
INSERT INTO `html` VALUES (1275, 1, '第一条测试模板', 'ftitle1', '标题一');
INSERT INTO `html` VALUES (1276, 1, '第一条测试模板', 'fcontent1', '内容二');
INSERT INTO `html` VALUES (1277, 1, '第一条测试模板', 'img2', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1278, 1, '第一条测试模板', 'img3', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1279, 1, '第一条测试模板', 'img4', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1280, 1, '第一条测试模板', 'img5', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1281, 1, '第一条测试模板', 'img6', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1282, 1, '第一条测试模板', 'img7', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1283, 1, '第一条测试模板', 'img8', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1284, 1, '第一条测试模板', 'img9', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1285, 1, '第一条测试模板', 'img10', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1286, 1, '第一条测试模板', 'img11', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1287, 1, '第一条测试模板', 'img12', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1360, 2, '第二条', 'imgone', '123');
INSERT INTO `html` VALUES (1361, 2, '第二条', 'otitle1', '12312');
INSERT INTO `html` VALUES (1362, 2, '第二条', 'otitle2', '123');
INSERT INTO `html` VALUES (1363, 2, '第二条', 'ocontent1', '123');
INSERT INTO `html` VALUES (1364, 2, '第二条', 'tcontent1', '13123');
INSERT INTO `html` VALUES (1365, 2, '第二条', 'thcontent1', '123123');
INSERT INTO `html` VALUES (1366, 2, '第二条', 'caution', '123123');
INSERT INTO `html` VALUES (1367, 2, '第二条', 'img2', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1368, 2, '第二条', 'img3', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1369, 2, '第二条', 'img4', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1370, 2, '第二条', 'img5', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1371, 2, '第二条', 'img6', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1372, 2, '第二条', 'img7', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1373, 2, '第二条', 'img8', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1374, 2, '第二条', 'img9', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1375, 2, '第二条', 'img10', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1376, 2, '第二条', 'img11', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1377, 2, '第二条', 'img12', 'https://www.yellow-price.com/ypadmin/i/1509617132.jpg');
INSERT INTO `html` VALUES (1525, 1, '完整模板', 'imgone', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1526, 1, '完整模板', 'otitle1', 'Yellow-Price Case');
INSERT INTO `html` VALUES (1527, 1, '完整模板', 'otitle2', 'The Premium Retro Floral Series Case');
INSERT INTO `html` VALUES (1528, 1, '完整模板', 'ocontent1', 'Yellow-Price The Premium Retro Floral Series Case is our flagship series of phone cases, built using only premium materials and the most advanced technology.');
INSERT INTO `html` VALUES (1529, 1, '完整模板', 'tcontent1', 'Touchable 3D Flower');
INSERT INTO `html` VALUES (1530, 1, '完整模板', 'tcontent2', 'Glowing in the dark Cool Design');
INSERT INTO `html` VALUES (1531, 1, '完整模板', 'tcontent3', 'Ultra Thin to keep the same design of your phone');
INSERT INTO `html` VALUES (1532, 1, '完整模板', 'thcontent1', 'Retro Floral Series 3D Vintage Flower Pattern Non-slip Rubber Feel Semi-soft Back Case for iPhone');
INSERT INTO `html` VALUES (1533, 1, '完整模板', 'thcontent2', 'Fully Cover 9H Curved Premium iPhone 3D Tempered Glass Screen Protector Edge to Edge Glass Screen Film [3D Touch Compatible]');
INSERT INTO `html` VALUES (1534, 1, '完整模板', 'thcontent3', 'REAL Clear HD Tempered Glass Screen Protector (Not Full Coverage)');
INSERT INTO `html` VALUES (1535, 1, '完整模板', 'caution', 'Note: Please dont have your WET hand to hold this case');
INSERT INTO `html` VALUES (1536, 1, '完整模板', 'fcontent1', 'Precisely Designed for your phone, which Compatible with All Carriers');
INSERT INTO `html` VALUES (1537, 1, '完整模板', 'fcontent2', 'This case could be glowing in the dark that\'s pretty cool (Case need to absorb sunshine first and then have Night light Feather)');
INSERT INTO `html` VALUES (1538, 1, '完整模板', 'fcontent3', 'QI Wireless Charge Supported: You dont need take it off when you have the wireless charge for your smart phone, which keeps your phone safe always.');
INSERT INTO `html` VALUES (1539, 1, '完整模板', 'fcontent4', '3D flower is touchable,exterior oily coating is durable');
INSERT INTO `html` VALUES (1540, 1, '完整模板', 'fcontent5', 'Precise cutouts for complete access to all buttons, cameras, speakers, and ports');
INSERT INTO `html` VALUES (1541, 1, '完整模板', 'fcontent6', 'Ultimate 0.9mm/11g, match with lightweight design iPhone, which kept the design of your phone.');
INSERT INTO `html` VALUES (1542, 1, '完整模板', 'fcontent7', 'beautiful style,beautiful life, more compliments.');
INSERT INTO `html` VALUES (1543, 1, '完整模板', 'fcontent8', 'Please Note: Please select correct model case for your phone');
INSERT INTO `html` VALUES (1544, 1, '完整模板', 'ftitle1', '3D Curved Full Coverage REAL Tempered Glass Screen Feature');
INSERT INTO `html` VALUES (1545, 1, '完整模板', 'fcontent9', '3D Curved tempered glass: comfortable touch feeling of original glass screen edge, perfect fit Apple curved screen, no even a little gaps, all-round protection for your cell phone.');
INSERT INTO `html` VALUES (1546, 1, '完整模板', 'fcontent10', '3D Touch Compatible - 3D Touch full-front glass screen protector, tailor-made for the iPhone Series. The edge-to-edge full cover glass film brilliantly matches your iPhone\'s screen');
INSERT INTO `html` VALUES (1547, 1, '完整模板', 'fcontent11', 'Perfect Anti-scratch Film: 9H greatly intensified surface hardness with Scratch-Proof Coated Surface resist sharp objects like knives and keys to protect your screen of iPhone');
INSERT INTO `html` VALUES (1548, 1, '完整模板', 'fcontent12', '100% Bubble-Free: The high quality 100% bubble-free adhesives, very easy to install and remove');
INSERT INTO `html` VALUES (1549, 1, '完整模板', 'fcontent13', 'High Transparency & High-Definition: It ensures the original touch screen sensitivity. 99% transparency ratio allow an optimal, natural viewing experience');
INSERT INTO `html` VALUES (1550, 1, '完整模板', 'fcontent14', 'Anti-Shatter Film - If iPhone 6s glass protector broken, the tempered glass will breaks into small pieces that are not sharp, protect you and you phone from danger');
INSERT INTO `html` VALUES (1551, 1, '完整模板', 'fcontent15', 'Easy installment: Self-adsorption to the screen which is very easy to apply and Please follow our instruction as bellows');
INSERT INTO `html` VALUES (1552, 1, '完整模板', 'ftitle2', 'REAL Tempered Glass Screen For Smart Phone (Not Full Coverage)');
INSERT INTO `html` VALUES (1553, 1, '完整模板', 'fcontent16', 'Please Note: The iPhone&Galaxy Note 5 screens have curved edges that our screen protectors do not cover 100%, as they would peel over time causing customer frustration. We designed our screen protectors so you will have maximum coverage on your device with ease of installation and durability.');
INSERT INTO `html` VALUES (1554, 1, '完整模板', 'img2', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1555, 1, '完整模板', 'img3', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1556, 1, '完整模板', 'img4', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1557, 1, '完整模板', 'img5', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1558, 1, '完整模板', 'img6', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1559, 1, '完整模板', 'img7', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1560, 1, '完整模板', 'img8', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1561, 1, '完整模板', 'img9', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1562, 1, '完整模板', 'img10', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1563, 1, '完整模板', 'img11', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1564, 1, '完整模板', 'img12', 'https://www.yellow-price.com/ypadmin/i/1474182574.jpg');
INSERT INTO `html` VALUES (1583, 1, '123123', 'imgone', '123');
INSERT INTO `html` VALUES (1584, 1, '123123', 'otitle1', '111');
INSERT INTO `html` VALUES (1585, 1, '123123', 'otitle2', '11');
INSERT INTO `html` VALUES (1586, 1, '123123', 'ocontent1', '111');
INSERT INTO `html` VALUES (1587, 1, '123123', 'tcontent1', '1111111');
INSERT INTO `html` VALUES (1588, 1, '123123', 'thcontent1', '<b>asdad</b>');
INSERT INTO `html` VALUES (1589, 1, '123123', 'caution', '1111123123');
INSERT INTO `html` VALUES (1590, 1, '123123', 'img2', '123');
INSERT INTO `html` VALUES (1591, 1, '123123', 'img3', '123');
INSERT INTO `html` VALUES (1592, 1, '123123', 'img4', '123');
INSERT INTO `html` VALUES (1593, 1, '123123', 'img5', '123');
INSERT INTO `html` VALUES (1594, 1, '123123', 'img6', '123');
INSERT INTO `html` VALUES (1595, 1, '123123', 'img7', '123');
INSERT INTO `html` VALUES (1596, 1, '123123', 'img8', '123');
INSERT INTO `html` VALUES (1597, 1, '123123', 'img9', '123');
INSERT INTO `html` VALUES (1598, 1, '123123', 'img10', '123');
INSERT INTO `html` VALUES (1599, 1, '123123', 'img11', '123');
INSERT INTO `html` VALUES (1600, 1, '123123', 'img12', '123');
INSERT INTO `html` VALUES (1619, 1, 'Car Charger', 'imgone', 'http://www.yellow-price.com/ypadmin/i/1530267122.jpg');
INSERT INTO `html` VALUES (1620, 1, 'Car Charger', 'otitle1', 'Yellow-Price Fast Car Charger');
INSERT INTO `html` VALUES (1621, 1, 'Car Charger', 'otitle2', 'Fast Car Charger 3.0 Adapter ');
INSERT INTO `html` VALUES (1622, 1, 'Car Charger', 'ocontent1', 'ellow-Price Quick Cigarette Lighter Charger is our flagship series of Data Cables, built using only premium materials and the most advanced technology. ');
INSERT INTO `html` VALUES (1623, 1, 'Car Charger', 'tcontent1', 'Qualcomm Quick Charge 3.0 Technology');
INSERT INTO `html` VALUES (1624, 1, 'Car Charger', 'tcontent2', 'Supports 3A+3A+2.4A Faster Speed');
INSERT INTO `html` VALUES (1625, 1, 'Car Charger', 'tcontent3', 'Built-in safeguards protection');
INSERT INTO `html` VALUES (1626, 1, 'Car Charger', 'tcontent4', 'Dual USB Charging Ports');
INSERT INTO `html` VALUES (1627, 1, 'Car Charger', 'thcontent1', 'USB-C Car Charger with 8.4A USB C & Quick Charge 3.0 Ports | Qualcomm Certified');
INSERT INTO `html` VALUES (1628, 1, 'Car Charger', 'caution', 'Note: Please choose Quick Charge 3.0 port to charge all your Quick Charge compatible devices to achieve higher power charging.');
INSERT INTO `html` VALUES (1629, 1, 'Car Charger', 'fcontent1', '<b>Faster Charging:</b> Quick Charge 3.0 charges devices up to 80% in just 35 minutes with Qualcomm Quick Charge 3.0 Technology,It can deliver the fastest possible charge to all non-Quick Charge devices. ');
INSERT INTO `html` VALUES (1630, 1, 'Car Charger', 'fcontent2', '<b>3 USB Charging Ports:</b>  Quick Charge 3.0 USB-A Port + 5V 3A USB Type-C Port + 5V 2.4A USB-A Port');
INSERT INTO `html` VALUES (1631, 1, 'Car Charger', 'fcontent3', '<b>Qualcomm Quick Charge 3.0 Technology:</b>  Provides 4x faster charging speed up to 3amps to devices for uninterrupted performance of navigation and media streaming.2.4 A USB port charges up to 2.5X faster than usual car charger.');
INSERT INTO `html` VALUES (1632, 1, 'Car Charger', 'fcontent4', '<b>Safety Usability</b>  - This USB car charger has multiple built-in voltage regulators fully protecting your devices against over-current, over-charging and over-heating for safe and rapid charging, ensuring superior performance and reliability. ');
INSERT INTO `html` VALUES (1633, 1, 'Car Charger', 'fcontent5', '<b>SMART IC INTELLIGENT ADAPTIVE TECHNOLOGY:</b>  identifies your mobile device to provide fastest possible charge automatically. ');
INSERT INTO `html` VALUES (1634, 1, 'Car Charger', 'fcontent6', '<b>Compact & Portable</b>  - Compact design with small and lightweight features for added portability, easily fits in socket with limited space.');
INSERT INTO `html` VALUES (1635, 1, 'Car Charger', 'fcontent7', '<b>USB-C Power Delivery:</b>  Equipped with advanced PD technology, offers 5V/3A and 9V/2A output, fast charging for iPhone 8 / 8 Plus / iPhone X / Galaxy S8/S8 Plus, Nexus 5X/6P, Pixel 2/Pixel 2 XL, Lumia 950/950XL, 2017 Nintendo Switch, Nokia 8 and more USB-C devices.');
INSERT INTO `html` VALUES (1636, 1, 'Car Charger', 'fcontent8', '<b>Maximum Durability + Ultra Protection:</b>  Ultra gold aluminium alloy frame can protect against drops, bumps and scrapes.');
INSERT INTO `html` VALUES (1637, 1, 'Car Charger', 'fcontent9', '<b>Universal Compatible:</b>  Smart usb type-c car charger can charge up 3 mobile devices simultaneously at high speed when you are on driving.The dual usb port are compatible with any Android & IOS mobile devices,such as iPhone X/8/7/6s/5/SE/Plus,Samsung Galaxy S8/S7/S6/Edge/Plus,LG,Nexus,HTC,Moto and More.');
INSERT INTO `html` VALUES (1638, 1, 'Car Charger', 'img2', 'http://www.yellow-price.com/ypadmin/i/1530267140.jpg');
INSERT INTO `html` VALUES (1639, 1, 'Car Charger', 'img3', 'http://www.yellow-price.com/ypadmin/i/1530267169.jpg');
INSERT INTO `html` VALUES (1640, 1, 'Car Charger', 'img4', 'http://www.yellow-price.com/ypadmin/i/1530267166.jpg');
INSERT INTO `html` VALUES (1641, 1, 'Car Charger', 'img5', 'http://www.yellow-price.com/ypadmin/i/1530267187.jpg');
INSERT INTO `html` VALUES (1642, 1, 'Car Charger', 'img6', 'http://www.yellow-price.com/ypadmin/i/1530267197.jpg');
INSERT INTO `html` VALUES (1643, 1, 'Car Charger', 'img7', 'http://www.yellow-price.com/ypadmin/i/1530267173.jpg');
INSERT INTO `html` VALUES (1644, 1, 'Car Charger', 'img8', 'http://www.yellow-price.com/ypadmin/i/1530267176.jpg');
INSERT INTO `html` VALUES (1645, 1, 'Car Charger', 'img9', 'http://www.yellow-price.com/ypadmin/i/1530267155.jpg');
INSERT INTO `html` VALUES (1646, 1, 'Car Charger', 'img10', 'http://www.yellow-price.com/ypadmin/i/1530267194.jpg');
INSERT INTO `html` VALUES (1647, 1, 'Car Charger', 'img11', 'http://www.yellow-price.com/ypadmin/i/1530267153.jpg');
INSERT INTO `html` VALUES (1648, 1, 'Car Charger', 'img12', 'http://www.yellow-price.com/ypadmin/i/1530267191.jpg');
INSERT INTO `html` VALUES (1685, 1, 'ceshi', 'imgone', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1686, 1, 'ceshi', 'otitle1', '1');
INSERT INTO `html` VALUES (1687, 1, 'ceshi', 'otitle2', '1');
INSERT INTO `html` VALUES (1688, 1, 'ceshi', 'ocontent1', '1');
INSERT INTO `html` VALUES (1689, 1, 'ceshi', 'tcontent1', '123');
INSERT INTO `html` VALUES (1690, 1, 'ceshi', 'thcontent1', '123');
INSERT INTO `html` VALUES (1691, 1, 'ceshi', 'caution', '123213');
INSERT INTO `html` VALUES (1692, 1, 'ceshi', 'img2', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1693, 1, 'ceshi', 'img3', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1694, 1, 'ceshi', 'img4', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1695, 1, 'ceshi', 'img5', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1696, 1, 'ceshi', 'img6', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1697, 1, 'ceshi', 'img7', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1698, 1, 'ceshi', 'img8', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1699, 1, 'ceshi', 'img9', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1700, 1, 'ceshi', 'img10', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1701, 1, 'ceshi', 'img11', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1702, 1, 'ceshi', 'img12', 'http://img3.imgtn.bdimg.com/it/u=907865819,430431958&fm=27&gp=0.jpg');
INSERT INTO `html` VALUES (1721, 1, '33', 'imgone', '1');
INSERT INTO `html` VALUES (1722, 1, '33', 'otitle1', '1');
INSERT INTO `html` VALUES (1723, 1, '33', 'otitle2', '1');
INSERT INTO `html` VALUES (1724, 1, '33', 'ocontent1', '1');
INSERT INTO `html` VALUES (1725, 1, '33', 'tcontent1', '1');
INSERT INTO `html` VALUES (1726, 1, '33', 'thcontent1', '1');
INSERT INTO `html` VALUES (1727, 1, '33', 'caution', '1');
INSERT INTO `html` VALUES (1728, 1, '33', 'ftitle1', '奥术大师多');
INSERT INTO `html` VALUES (1729, 1, '33', 'ftitle2', '撒打算大所 ');
INSERT INTO `html` VALUES (1730, 1, '33', 'fcontent1', '奥术大师');
INSERT INTO `html` VALUES (1731, 1, '33', 'fcontent2', '阿萨德');
INSERT INTO `html` VALUES (1732, 1, '33', 'img2', '1');
INSERT INTO `html` VALUES (1733, 1, '33', 'img3', '1');
INSERT INTO `html` VALUES (1734, 1, '33', 'img4', '1');
INSERT INTO `html` VALUES (1735, 1, '33', 'img5', '1');
INSERT INTO `html` VALUES (1736, 1, '33', 'img6', '1');
INSERT INTO `html` VALUES (1737, 1, '33', 'img7', '1');
INSERT INTO `html` VALUES (1738, 1, '33', 'img8', '1');
INSERT INTO `html` VALUES (1739, 1, '33', 'img9', '1');
INSERT INTO `html` VALUES (1740, 1, '33', 'img10', '1');
INSERT INTO `html` VALUES (1741, 1, '33', 'img11', '1');
INSERT INTO `html` VALUES (1742, 1, '33', 'img12', '1');

-- ----------------------------
-- Table structure for img
-- ----------------------------
DROP TABLE IF EXISTS `img`;
CREATE TABLE `img`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '图片类型',
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '图片路径',
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '文件名',
  `thumpath` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '缩略图地址\r\n',
  `thumfile` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '缩略图文件名',
  `status` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '状态',
  `creationtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '图片库' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of img
-- ----------------------------
INSERT INTO `img` VALUES (57, 'bclass', '/InternalSystem/Public/imgup/20180816/', '5b74cdc62f8bf.jpg', '/InternalSystem/Public/imgup/20180816/', '1.jpg', '1', '2018-08-16 09:05:10');
INSERT INTO `img` VALUES (56, 'produc', '/InternalSystem/Public/imgup/20180815/', '5b73a4dfb4ded.jpg', NULL, NULL, '1', NULL);
INSERT INTO `img` VALUES (58, 'produc', '/InternalSystem/Public/imgup/20180903/', '5b8c8c02df840.jpg', '/InternalSystem/Public/imgup/20180903/', 'thum5b8c8c02', '1', '2018-09-03 09:18:58');
INSERT INTO `img` VALUES (59, 'produc', '/InternalSystem/Public/imgup/20180903/', '5b8c8d193c742.jpg', '/InternalSystem/Public/imgup/20180903/', 'thum5b8c8d19', '1', '2018-09-03 09:23:37');
INSERT INTO `img` VALUES (60, 'produc', '/InternalSystem/Public/imgup/20180903/', '5b8c8f587cf75.jpg', '/InternalSystem/Public/imgup/20180903/', 'thum5b8c8f58', '1', '2018-09-03 09:33:12');
INSERT INTO `img` VALUES (61, 'produc', '/InternalSystem/Public/imgup/20180903/', '5b8c8f876203e.jpg', '/InternalSystem/Public/imgup/20180903/', 'thum5b8c8f87', '1', '2018-09-03 09:33:59');
INSERT INTO `img` VALUES (62, 'produc', '/InternalSystem/Public/imgup/20180903/', '5b8c8f9f68f9b.jpg', '/InternalSystem/Public/imgup/20180903/', 'thum5b8c8f9f', '1', '2018-09-03 09:34:23');
INSERT INTO `img` VALUES (63, 'produc', '/InternalSystem/Public/imgup/20180903/', '5b8c91636efa4.jpg', '/InternalSystem/Public/imgup/20180903/', 'thum5b8c9163', '1', '2018-09-03 09:41:55');

-- ----------------------------
-- Table structure for imgline
-- ----------------------------
DROP TABLE IF EXISTS `imgline`;
CREATE TABLE `imgline`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `fid` int(11) NULL DEFAULT NULL COMMENT '图库上级的id',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '父级的类型',
  `imgid` int(11) NULL DEFAULT NULL COMMENT '图库id',
  `creationtime` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `status` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '图片关系表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of imgline
-- ----------------------------
INSERT INTO `imgline` VALUES (36, 1, 'product', 57, '2018-07-30 17:08:24', '1');
INSERT INTO `imgline` VALUES (1, 68, 'bclass', 57, '2018-08-07 14:08:56', '1');
INSERT INTO `imgline` VALUES (2, 67, 'bclass', 57, '2018-08-07 14:54:47', '1');
INSERT INTO `imgline` VALUES (37, 68, 'sclass', 57, NULL, '1');
INSERT INTO `imgline` VALUES (38, NULL, 'product', NULL, '2018-09-03 09:18:59', '1');
INSERT INTO `imgline` VALUES (39, NULL, 'product', NULL, '2018-09-03 09:27:51', '1');
INSERT INTO `imgline` VALUES (40, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `imgline` VALUES (41, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `imgline` VALUES (42, 1, 'product', 63, '2018-09-03 09:41:55', '1');

-- ----------------------------
-- Table structure for order_customer
-- ----------------------------
DROP TABLE IF EXISTS `order_customer`;
CREATE TABLE `order_customer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自生成',
  `platform_id` int(11) NOT NULL COMMENT '外部账号id',
  `source_orderid` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '外部订单号码',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '订单类型',
  `source_buyerid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '外部买家ID',
  `buyer_first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '买家名',
  `buyer_last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '买家姓',
  `recipient_first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '收件人名',
  `recipient_last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '收件人姓',
  `buyer_phone` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '收件人电话',
  `buyer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '收件人联系方式',
  `street_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '收件地址1',
  `street_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '收件地址2',
  `street_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '收件地址3',
  `country` int(4) NULL DEFAULT NULL COMMENT '国家',
  `ship_level` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '邮寄方式',
  `state` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '州或省',
  `city` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '市',
  `zip` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '邮编',
  `order_price` int(8) NULL DEFAULT NULL COMMENT '订单价格',
  `pricecurrency` int(4) NULL DEFAULT NULL COMMENT '货币单位',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '销售订单表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for organization
-- ----------------------------
DROP TABLE IF EXISTS `organization`;
CREATE TABLE `organization`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '中文名:例如it部',
  `namezh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '英文名 例如IT department',
  `level` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '级别',
  `leader` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '上级',
  `state` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '状态,1启用,2禁用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '组织架构' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of organization
-- ----------------------------
INSERT INTO `organization` VALUES (1, 'headquarters', '总公司', '0', '0', '1');
INSERT INTO `organization` VALUES (2, '洛阳分公司', '洛阳分公司', '1', '1', '1');
INSERT INTO `organization` VALUES (3, 'guangzhou', '广州分公司', '1', '1', '1');
INSERT INTO `organization` VALUES (4, 'IT', '开发部', '2', '2', '1');
INSERT INTO `organization` VALUES (5, 'IT', 'IT经理', '3', '4', '1');
INSERT INTO `organization` VALUES (6, 'Programmer', '程序员', '4', '5', '2');
INSERT INTO `organization` VALUES (7, '销售部', '销售部', '2', '2', '1');
INSERT INTO `organization` VALUES (9, 'General manager', '总经理', '2', '2', '2');
INSERT INTO `organization` VALUES (10, '库管部', '库管部', '2', '3', '1');
INSERT INTO `organization` VALUES (11, '销售部', '销售部', '2', '3', '1');
INSERT INTO `organization` VALUES (42, '销售经理', '销售经理', '1', '7', '2');
INSERT INTO `organization` VALUES (43, '采购部', '采购部', '1', '3', '2');
INSERT INTO `organization` VALUES (57, 'Front-end Designer', '前端设计师', '4', '5', '2');
INSERT INTO `organization` VALUES (67, '程序员', '程序员', '4', '5', '1');
INSERT INTO `organization` VALUES (68, '', '前端', '3', '5', '1');
INSERT INTO `organization` VALUES (69, 'a', '销售经理', '3', '7', '1');
INSERT INTO `organization` VALUES (70, '采购部', '采购部', '2', '3', '1');
INSERT INTO `organization` VALUES (71, '123123', '312', '4', '5', '1');

-- ----------------------------
-- Table structure for organization_info
-- ----------------------------
DROP TABLE IF EXISTS `organization_info`;
CREATE TABLE `organization_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '组织id',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '变量名:phone-电话 personnel-人员,address-地址',
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '信息',
  `state` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '组织信息扩展表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of organization_info
-- ----------------------------
INSERT INTO `organization_info` VALUES (1, '1', 'phone', '123', '1');
INSERT INTO `organization_info` VALUES (2, '1', 'address', '33333', '1');
INSERT INTO `organization_info` VALUES (3, '1', 'personnel', 'ren', '1');
INSERT INTO `organization_info` VALUES (6, '2', 'address', '洛阳市老城区建业智慧港', '1');
INSERT INTO `organization_info` VALUES (7, '2', 'personnel', '杜经理', '1');
INSERT INTO `organization_info` VALUES (8, '2', 'phone', '1683123133123131', '1');
INSERT INTO `organization_info` VALUES (9, '3', 'address', '333', '1');
INSERT INTO `organization_info` VALUES (10, '3', 'personnel', '刘经理', '1');
INSERT INTO `organization_info` VALUES (11, '3', 'phone', '22', '1');

-- ----------------------------
-- Table structure for pl_account_user
-- ----------------------------
DROP TABLE IF EXISTS `pl_account_user`;
CREATE TABLE `pl_account_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NULL DEFAULT NULL COMMENT '用户id',
  `pl_account_id` int(11) NULL DEFAULT NULL COMMENT '平台账号',
  `status` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '1生效，2无效',
  PRIMARY KEY (`id`) USING HASH
) ENGINE = MEMORY AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '外部账号对应内部用户 表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for platform
-- ----------------------------
DROP TABLE IF EXISTS `platform`;
CREATE TABLE `platform`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '平台,例如ebay美国',
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '类型,比如ebay',
  `status` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '0,初始化.1生效.2,删除',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '平台表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of platform
-- ----------------------------
INSERT INTO `platform` VALUES (1, 'amazon中国', 'amazon', '1');
INSERT INTO `platform` VALUES (2, 'amazon美国', 'amazon', '1');
INSERT INTO `platform` VALUES (3, 'ebay中国', 'ebay', '1');
INSERT INTO `platform` VALUES (4, 'ebay美国', 'ebay', '1');

-- ----------------------------
-- Table structure for platform_account
-- ----------------------------
DROP TABLE IF EXISTS `platform_account`;
CREATE TABLE `platform_account`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '账号',
  `account_number_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '显示的名',
  `platform_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '平台id',
  `status` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '状态,1有效,2无效',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '平台-账号' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of platform_account
-- ----------------------------
INSERT INTO `platform_account` VALUES (1, '321@qq.ocm', '123@qq.com', '1', '1');
INSERT INTO `platform_account` VALUES (2, 'ebay@qq.ocm', 'ebay@qq.ocm', '3', '1');
INSERT INTO `platform_account` VALUES (3, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nameus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '职务名:如经理,主管',
  `state` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '状态:1启用,2,禁用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '职务表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES (1, '开发人员', '1');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bclass` int(11) NULL DEFAULT NULL COMMENT '一级分类',
  `sclass` int(11) NULL DEFAULT NULL COMMENT '二级分类',
  `number` int(11) NULL DEFAULT NULL COMMENT '编号',
  `nameus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '英文产品名',
  `namezh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '中文产品名',
  `weight` int(8) NULL DEFAULT NULL COMMENT '重量/k',
  `status` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '状态',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `volume` int(8) NULL DEFAULT NULL COMMENT '体积/立方厘米',
  `thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '缩略图:http://www.baidu.com/a.jpg',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `class1`(`bclass`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 165 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '产品表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, 67, 68, 8, 'name', 'IPhone', 80, '1', '2018-06-13 09:56:54', 1, '/Public/img/productthum/5b7267fcc8c29.jpg');
INSERT INTO `product` VALUES (2, 67, 68, 8, 'ppa', 'IPhone4', 4, '1', '2018-05-24 09:56:54', 2, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (3, 67, 68, 8, 'asdasd', 'IPhone5', 4, '1', '2018-05-24 09:56:54', 3, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (8, 67, 68, 8, 'a', 'diannao', 1, '1', '2018-06-13 17:30:53', 4, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (9, 67, 68, 8, 'as', '手机卡', 2, '1', '2018-06-14 13:28:21', 5, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (10, 67, 68, 9, 'a', '背包', 1, '1', '2018-06-14 13:29:23', 1, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (11, 67, 68, 9, 'd', '苹果电脑', 4, '1', '2018-06-14 13:32:01', 123, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (12, 67, 68, 9, 'a', '洛阳铲', 123, '1', '2018-06-14 14:18:49', 12, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (13, 67, 68, 9, '123', '新产品', 1, '1', '2018-06-14 14:28:32', 2, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (14, 67, 68, 9, 'asd', 'admin', 123, '1', '2018-06-19 13:45:43', 123, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (15, 67, 68, 9, 'as', '洛阳铲', 2, '1', '2018-06-19 13:46:51', 12, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (27, 67, 68, 9, 'dd', '对的', 12, '1', '2018-07-12 16:15:51', 1, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (160, 77, 67, 78, '苹果笔记本', '苹果笔记本', 120, '1', '2018-08-08 10:08:20', 20, '/Public/img/productthum/5b6a9d4daaf68.png');
INSERT INTO `product` VALUES (164, 264, 263, 288, NULL, ' ', 0, '1', '2018-08-22 08:58:14', 0, NULL);

-- ----------------------------
-- Table structure for productExtended
-- ----------------------------
DROP TABLE IF EXISTS `productExtended`;
CREATE TABLE `productExtended`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NULL DEFAULT NULL COMMENT '所属产品ID',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '键',
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '值',
  `order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '排列序号',
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '计量单位',
  `status` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '状态',
  `creationtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '扩展属性表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of productExtended
-- ----------------------------
INSERT INTO `productExtended` VALUES (1, 1, 'name', '我的121', NULL, 'char', '2', '2018-05-29 15:58:23');
INSERT INTO `productExtended` VALUES (2, 1, 'nicai', 'nicai11', NULL, 'char', '2', '2018-05-29 16:55:54');
INSERT INTO `productExtended` VALUES (5, 1, '213', '什么', NULL, NULL, '1', '2018-08-07 11:14:34');
INSERT INTO `productExtended` VALUES (6, 1, '赫兹', '120', NULL, NULL, '2', '2018-08-08 15:48:45');
INSERT INTO `productExtended` VALUES (7, 1, '赫兹', '120', NULL, NULL, '1', '2018-08-08 15:48:48');
INSERT INTO `productExtended` VALUES (35, 1, '长', '20', NULL, NULL, '1', '2018-08-08 15:54:10');
INSERT INTO `productExtended` VALUES (36, 1, '宽', '21', NULL, NULL, '1', '2018-08-08 15:54:10');

-- ----------------------------
-- Table structure for product_line_ebay
-- ----------------------------
DROP TABLE IF EXISTS `product_line_ebay`;
CREATE TABLE `product_line_ebay`  (
  `id` int(11) NOT NULL,
  `ebayid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT 'ebay编码',
  `pid` int(11) NULL DEFAULT NULL COMMENT '产品id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = 'ebay 产品编码和 自编码对应' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '角色名称',
  `role_auth_ids` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '角色权限ID',
  `role_auth_ac` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '角色权限控制器与方法',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, '超级管理员', '21,74,77,81,82', NULL);
INSERT INTO `role` VALUES (2, '洛阳', '1,105,11,104,106,2,21,101,74,96,99,77,3,23,84,93,109,115,116,118,5,92,54,81,82', NULL);
INSERT INTO `role` VALUES (10, '员工', '2', NULL);
INSERT INTO `role` VALUES (11, '采购员', NULL, NULL);
INSERT INTO `role` VALUES (30, 'wwwwwwww', '1,11,104,106', NULL);
INSERT INTO `role` VALUES (12, '录入员工', '1,105,11,104,106,2,21,101,74,96,99,77,3,23,84,93,109,115,116,118,5,92,54,81,82', NULL);
INSERT INTO `role` VALUES (33, '录入', '1,105,11,104,106,119,3,93,109,115,116,118', NULL);
INSERT INTO `role` VALUES (34, '个人信息', '1,105,11,104,106,119', NULL);
INSERT INTO `role` VALUES (35, '订单测试', '1,105,11,104,106,119,4,85', NULL);

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NULL DEFAULT NULL COMMENT '产品ID',
  `library` int(11) NULL DEFAULT NULL COMMENT '仓库id',
  `sourceORtarget` int(11) NULL DEFAULT NULL COMMENT '来源||目标',
  `type` int(3) NULL DEFAULT NULL COMMENT '类型',
  `number` int(11) NULL DEFAULT NULL COMMENT '数量',
  `uid` int(11) NULL DEFAULT NULL COMMENT '操作人ID',
  `state` int(1) NULL DEFAULT NULL COMMENT '状态',
  `creationtime` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '库存表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stock
-- ----------------------------
INSERT INTO `stock` VALUES (1, 1, 2, 3, 4, 5, 1, 1, '2018-06-15 16:54:23');
INSERT INTO `stock` VALUES (2, 2, 2, 3, 2, 2, 1, 1, '2018-06-15 16:54:26');
INSERT INTO `stock` VALUES (3, 1, 2, 3, 2, 1, 1, 1, NULL);
INSERT INTO `stock` VALUES (4, 3, 2, 2, 2, 12, 1, 1, NULL);
INSERT INTO `stock` VALUES (5, 2, 2, 2, 2, 2, 2, 1, NULL);

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `snumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '编码',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '供应商名称',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '类型',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '供应商地址',
  `contactnumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '供应商联系电话',
  `contacts` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '联系人',
  `payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '付款方式',
  `weburl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '网址',
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '开户银行',
  `account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '开户账号',
  `state` int(1) NULL DEFAULT NULL COMMENT '状态',
  `creationtime` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮箱',
  `bankname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '银行账号持有人姓名',
  `remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '供应商简介',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '供应商表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, '901', 'Apple Inc.', '1', 'beijing', '1323123', 'chen', '1', NULL, NULL, NULL, 1, '2018-06-19 09:47:40', NULL, NULL, NULL);
INSERT INTO `supplier` VALUES (2, '902', '联想', '2', '东门', '1120', '柳总', '2', NULL, NULL, NULL, 1, '2018-06-19 09:48:05', NULL, NULL, NULL);
INSERT INTO `supplier` VALUES (3, '903', '明基', '3', '222', '123123', '4444', '3', NULL, NULL, NULL, 0, '2018-05-30 10:42:27', NULL, NULL, NULL);
INSERT INTO `supplier` VALUES (4, '904', '德州仪器', '1', 'qwe', 'eqeqasd', '去weq', '1', NULL, NULL, NULL, 0, '2018-05-29 17:06:56', NULL, NULL, NULL);
INSERT INTO `supplier` VALUES (5, '905', 'amd', '2', '123123', '123123', '123123', '1', NULL, NULL, NULL, 0, '2018-05-29 17:07:26', NULL, NULL, NULL);
INSERT INTO `supplier` VALUES (19, '909', '123', '3', '3333', '33333', NULL, '1', '3333333', '333333', '333', 0, '2018-08-02 17:26:55', '33333333333333', '3333333', '333333333');
INSERT INTO `supplier` VALUES (20, '910', '33333333', '1', '333333333', '33333333333', NULL, '1', '3333333333', '333333333', '333333333', 1, '2018-08-02 17:32:14', '333333333', '333333333', '333333');
INSERT INTO `supplier` VALUES (21, '911', '211111111111', '', '333333', '11111111', NULL, '0', '1111111', '1111111', '1111111', 1, '2018-08-02 17:32:31', '111111111', '111111', '333333');
INSERT INTO `supplier` VALUES (22, '912', '供应商名称1', '1', '地址2', '电话3', NULL, '2', '网址5', '开户行6', '银行账号3', 1, '2018-08-03 17:44:00', '电子邮箱4', '持有人姓名7', '简介1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户账户',
  `ualias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户ID',
  `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL COMMENT '角色ID',
  `status` tinyint(1) NULL DEFAULT NULL COMMENT '用户状态:1启用,2禁用',
  `fid` int(3) NULL DEFAULT NULL COMMENT '上级',
  `ualiases` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 85 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '1', '333', 1, 1, 1, NULL);
INSERT INTO `user` VALUES (73, '个人', '13', '123', 34, 1, 1, NULL);
INSERT INTO `user` VALUES (71, 'asd', 'asd', '123', 33, 1, NULL, NULL);
INSERT INTO `user` VALUES (72, 'mashuang', NULL, '123', 12, 1, 1, NULL);
INSERT INTO `user` VALUES (81, 'ceshi', NULL, '123', 35, 1, 1, '测试订单');
INSERT INTO `user` VALUES (84, '2222222222', '请选择', '22222222222', 0, 0, 1, NULL);

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '记录的id',
  `uid` int(11) NULL DEFAULT NULL COMMENT '对应的用户uid',
  `numbering` int(8) NULL DEFAULT NULL COMMENT '用户编码',
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '英文姓氏',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '用户名英文名',
  `lastnamezh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '中文姓氏',
  `namezh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '用户中文名',
  `sex` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '性别',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '用户邮箱',
  `headimg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '头像',
  `identity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '身份证',
  `position_id` int(11) NULL DEFAULT NULL COMMENT '职务',
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '个人介绍',
  `organization_id` int(11) NULL DEFAULT NULL COMMENT '部门',
  `account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '银行账号',
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '开户行',
  `company_id` int(11) NULL DEFAULT NULL COMMENT '隶属公司',
  `status` int(1) NULL DEFAULT NULL COMMENT '状态',
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '人员信息' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES (1, 1, NULL, 'my', 'sql', '默默', '郭', '1', '123@qq.com', 'Penguins.jpg', '身份证', 6, '自我介绍', 4, '62221223321', '合区银行', 1, 1, '/InternalSystem/Public/uploads/5b7a58dcd4f0d.jpg');
INSERT INTO `user_info` VALUES (2, 2, NULL, '英文姓氏', 'uu', '默默', '远', '1', '123@qq.com', '5b602145ab248.jpg', '123', 6, '自我介绍', 4, '123', '合区银行', 1, 1, '/InternalSystem/Public/uploads/5b602aa39db70.jpg');
INSERT INTO `user_info` VALUES (3, 3, NULL, '英文姓氏', 'cc', '默默', '三号it经理', '1', '123@qq.com', NULL, '5', 5, '自我介绍', 4, '2', '合区银行', 1, 1, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (4, 4, NULL, '英文姓氏', 'dd', '默默', '总经理', '1', '123@qq.com', NULL, '5', 5, '自我介绍', 1, '123', '合区银行', 1, 1, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (8, 50, NULL, '英文姓氏', '1', 'chang', 'hao', '1', '123@qq.com', NULL, '111111111', 42, '自我介绍', 7, '123', '合区银行', 2, 2, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (9, 51, NULL, '英文姓氏', '123', '123123', '3123123', '1', '123@qq.com', NULL, '123', 42, '自我介绍', 7, '123', '合区银行', 2, 1, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (10, 52, NULL, '英文姓氏', '55555555', '55', '一个程序员', '1', '123@qq.com', NULL, '23', 5, '自我介绍', 67, '32', '合区银行', 1, 2, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (11, 65, 200706979, '6666', '晨晨', '姓', '郭', '1', '123@qq.com', NULL, '身份证', 69, '自我介绍', 7, '62221223321', '合区银行', 2, 1, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (12, 66, 200700023, '123123123', '12313213', '12312313', '123123', '1', '123@qq.com', NULL, '', 0, '自我介绍', 7, '123', '合区银行', 2, 1, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (13, 73, 200700088, '1231', '13213123', '123', '123123', '1', '123@qq.com', '5b5ed87802328.png', '11111', 6, '自我介绍1', 7, '123', '合区银行', 2, 1, '/InternalSystem/Public/uploads/5b751f2f85ca0.png');
INSERT INTO `user_info` VALUES (14, 68, 200700065, '11', '11111', '1123123', '12312313', '1', '123@qq.com', NULL, '', 0, '自我介绍', 7, '123', '合区银行', 2, 1, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (15, 69, 200700071, '1111', '1111', '123', '123', '1', '123@qq.com', NULL, '', 0, '自我介绍', 7, '123', '合区银行', 2, 2, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (16, 70, 200700063, '123', '123', '123', '123', '1', '123@qq.com', NULL, '', 0, '自我介绍', 7, '123', '合区银行', 2, 2, '/InternalSystem/Public/uploads/5b6a9ed680fcb.jpg');
INSERT INTO `user_info` VALUES (17, 71, 200700051, '英文姓氏1', '英文名1', '丽丽2', 'zhang', '1', '312@qq.com2', 'Penguins.jpg', '2322', 6, '我的介绍1', 7, '9999999', '洛阳银行2', 2, 1, '/InternalSystem/Public/uploads/5b74cbfe73b90.jpg');

-- ----------------------------
-- Table structure for warehouse
-- ----------------------------
DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE `warehouse`  (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '仓库名',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '地址',
  `type` int(3) NULL DEFAULT NULL,
  `state` int(3) NULL DEFAULT NULL COMMENT '状态',
  `creationtime` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = '仓库表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of warehouse
-- ----------------------------
INSERT INTO `warehouse` VALUES (1, '晨晨', '213', 1, 2, '2018-06-15 09:12:15');
INSERT INTO `warehouse` VALUES (2, '洛阳仓库', '2', NULL, 2, NULL);
INSERT INTO `warehouse` VALUES (4, 'admin', 'll', NULL, 1, '2018-06-07 13:24:18');
INSERT INTO `warehouse` VALUES (5, 'asd', 'dsa', NULL, 2, '2018-06-15 09:12:31');
INSERT INTO `warehouse` VALUES (25, '3213', '123', NULL, 1, NULL);
INSERT INTO `warehouse` VALUES (26, '123123', '地址', NULL, 1, '2018-08-07 17:11:19');

SET FOREIGN_KEY_CHECKS = 1;
