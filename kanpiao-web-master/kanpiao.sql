-- ============================================================
-- 看票 Kanpiao 票务系统 - 数据库初始化脚本
-- 数据库名称: kanpiao
-- 字符集: utf8mb4（支持 emoji 和特殊字符）
-- MySQL 版本要求: 5.7+
-- 生成日期: 2026-06-03
-- ============================================================

-- 创建数据库
CREATE DATABASE IF NOT EXISTS `kanpiao`
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;

USE `kanpiao`;

-- ============================================================
-- 1. wx_user - 微信用户表
-- 说明: 存储通过微信小程序登录的用户信息
-- ============================================================
DROP TABLE IF EXISTS `wx_user`;
CREATE TABLE `wx_user` (
  `user_id`      INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户序号（主键）',
  `openid`       VARCHAR(255)     NOT NULL                COMMENT '微信用户唯一标识 openid',
  `nickname`     VARCHAR(255)     DEFAULT NULL            COMMENT '用户昵称',
  `avatarurl`    VARCHAR(512)     DEFAULT NULL            COMMENT '用户头像 URL',
  `gender`       TINYINT(1)       DEFAULT NULL            COMMENT '性别: 0=女, 1=男',
  `mobile`       VARCHAR(20)      DEFAULT NULL            COMMENT '手机号码',
  `country`      VARCHAR(64)      DEFAULT NULL            COMMENT '国家',
  `province`     VARCHAR(64)      DEFAULT NULL            COMMENT '省份',
  `city`         VARCHAR(64)      DEFAULT NULL            COMMENT '城市',
  `language`     VARCHAR(32)      DEFAULT NULL            COMMENT '语言',
  `is_checker`   TINYINT(1)       NOT NULL DEFAULT 0      COMMENT '检票员标识: 0=普通用户, 1=检票员',
  `is_banned`    TINYINT(1)       NOT NULL DEFAULT 0      COMMENT '封禁标识: 0=正常, 1=已封禁',
  `last_login`   DATETIME         DEFAULT NULL            COMMENT '上次登录时间',
  `create_time`  DATETIME         DEFAULT NULL            COMMENT '用户创建时间',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `uk_openid` (`openid`),
  KEY `idx_nickname` (`nickname`(191)),
  KEY `idx_is_checker` (`is_checker`),
  KEY `idx_is_banned` (`is_banned`),
  KEY `idx_create_time` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='微信用户表';

-- ============================================================
-- 2. admin_user - 管理员表
-- 说明: 存储管理后台的管理员和客服账号
-- ============================================================
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `admin_id`    INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理员序号（主键）',
  `name`        VARCHAR(255)     NOT NULL                COMMENT '管理员姓名（登录账号）',
  `password`    VARCHAR(255)     NOT NULL                COMMENT '管理员密码（MD5 散列存储）',
  `avatar_url`  VARCHAR(512)     DEFAULT NULL            COMMENT '管理员头像地址',
  `is_service`  TINYINT(1)       NOT NULL DEFAULT 0      COMMENT '客服标识: 0=管理员, 1=受限客服',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `uk_name` (`name`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='管理员表';

-- ============================================================
-- 3. login - 登录记录表
-- 说明: 记录每次用户和管理员的登录流水
-- ============================================================
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `login_id`      INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '登录序号（主键）',
  `openid`        VARCHAR(255)     NOT NULL                COMMENT '用户 openid',
  `platform`      TINYINT(1)       NOT NULL DEFAULT 0      COMMENT '登录平台: 0=小程序, 1=管理端',
  `login_time`    DATETIME         NOT NULL                COMMENT '登录时间',
  `is_new_login`  TINYINT(1)       NOT NULL DEFAULT 1      COMMENT '新登录标识: 0=已有token续期, 1=全新登录',
  PRIMARY KEY (`login_id`),
  KEY `idx_openid` (`openid`(191)),
  KEY `idx_login_time` (`login_time`),
  KEY `idx_openid_time` (`openid`(191), `login_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='登录记录表';

-- ============================================================
-- 4. show_item - 演出表
-- 说明: 存储演出的基本信息
-- ============================================================
DROP TABLE IF EXISTS `show_item`;
CREATE TABLE `show_item` (
  `show_id`                INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '演出 ID（主键）',
  `show_name`              VARCHAR(255)     NOT NULL                COMMENT '演出名称',
  `show_foreign_name`      VARCHAR(255)     DEFAULT NULL            COMMENT '外文名称',
  `show_cast`              TEXT             DEFAULT NULL            COMMENT '卡司（演职人员）',
  `show_city`              VARCHAR(128)     DEFAULT NULL            COMMENT '演出城市',
  `show_place`             VARCHAR(255)     DEFAULT NULL            COMMENT '演出地点/场馆',
  `show_abstract`          VARCHAR(512)     DEFAULT NULL            COMMENT '演出概要/摘要',
  `show_detail`            TEXT             DEFAULT NULL            COMMENT '演出详细信息',
  `show_issuing_company`   VARCHAR(255)     DEFAULT NULL            COMMENT '发行公司',
  `show_poster_horizontal` VARCHAR(512)     DEFAULT NULL            COMMENT '横版海报图片 URL',
  `show_poster_vertical`   VARCHAR(512)     DEFAULT NULL            COMMENT '竖版海报图片 URL',
  PRIMARY KEY (`show_id`),
  KEY `idx_show_name` (`show_name`(191)),
  KEY `idx_show_city` (`show_city`),
  KEY `idx_show_place` (`show_place`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='演出表';

-- ============================================================
-- 5. show_session - 场次表
-- 说明: 存储每个演出下的不同场次安排
-- ============================================================
DROP TABLE IF EXISTS `show_session`;
CREATE TABLE `show_session` (
  `session_id`        INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '场次 ID（主键）',
  `show_id`           INT(11) UNSIGNED NOT NULL                COMMENT '所属演出 ID',
  `session_time`      DATETIME         NOT NULL                COMMENT '场次开始时间',
  `session_end_time`  DATETIME         DEFAULT NULL            COMMENT '场次结束时间',
  `session_sub`       VARCHAR(512)     DEFAULT NULL            COMMENT '场次说明/备注',
  `session_sell_time` DATETIME         DEFAULT NULL            COMMENT '发售开始时间',
  `session_price`     DECIMAL(10,2)    NOT NULL DEFAULT 0.00   COMMENT '票价（单张）',
  `session_status`    TINYINT(1)       NOT NULL DEFAULT 1      COMMENT '场次状态: 0=已取消, 1=正常',
  PRIMARY KEY (`session_id`),
  KEY `idx_show_id` (`show_id`),
  KEY `idx_session_time` (`session_time`),
  KEY `idx_session_status` (`session_status`),
  CONSTRAINT `fk_session_show` FOREIGN KEY (`show_id`) REFERENCES `show_item` (`show_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='场次表';

-- ============================================================
-- 6. orders - 订单表
-- 说明: 核心业务表，记录用户的购票订单
-- ============================================================
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id`           INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '订单号（主键）',
  `order_session_id`   INT(11) UNSIGNED NOT NULL                COMMENT '购入的场次 ID',
  `order_user_id`      INT(11) UNSIGNED NOT NULL                COMMENT '购买用户 ID',
  `order_multi_id`     INT(11) UNSIGNED NOT NULL DEFAULT 1      COMMENT '多票序号（同一订单多张票时的序号 1~N）',
  `order_multi_code`   VARCHAR(64)      DEFAULT NULL            COMMENT '多票订单标识码（同一订单多张票共享同一标识）',
  `order_price`        DECIMAL(10,2)    NOT NULL DEFAULT 0.00   COMMENT '单票金额',
  `order_multi_price`  DECIMAL(10,2)    NOT NULL DEFAULT 0.00   COMMENT '订单总金额（含所有票）',
  `order_create_time`  DATETIME         NOT NULL                COMMENT '订单创建时间',
  `order_pay_time`     DATETIME         DEFAULT NULL            COMMENT '支付完成时间',
  `order_close_time`   DATETIME         DEFAULT NULL            COMMENT '订单关闭/退款时间',
  `order_status`       TINYINT(2)       NOT NULL DEFAULT 2      COMMENT '订单状态: 0=等待检票, 1=已检票入场, 2=待付款, 3=退款中, 4=已退款',
  PRIMARY KEY (`order_id`),
  KEY `idx_order_session` (`order_session_id`),
  KEY `idx_order_user` (`order_user_id`),
  KEY `idx_order_status` (`order_status`),
  KEY `idx_order_multi` (`order_multi_code`(64)),
  KEY `idx_order_create_time` (`order_create_time`),
  CONSTRAINT `fk_order_session` FOREIGN KEY (`order_session_id`) REFERENCES `show_session` (`session_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_order_user` FOREIGN KEY (`order_user_id`) REFERENCES `wx_user` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='订单表';

-- ============================================================
-- 7. banner - 轮播图表
-- 说明: 存储小程序首页轮播图的图片 URL
-- ============================================================
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `banner_id`  INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '轮播图 ID（主键）',
  `img`        VARCHAR(512)     NOT NULL                COMMENT '轮播图图片 URL',
  `sort_order` INT(11)          NOT NULL DEFAULT 0      COMMENT '排序序号（数字越小越靠前）',
  `is_show`    TINYINT(1)       NOT NULL DEFAULT 1      COMMENT '是否显示: 0=隐藏, 1=显示',
  `create_time` DATETIME        DEFAULT NULL            COMMENT '创建时间',
  PRIMARY KEY (`banner_id`),
  KEY `idx_sort` (`sort_order`, `is_show`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='轮播图表';

-- ============================================================
-- 初始化数据
-- ============================================================

-- 插入默认管理员账号（密码: admin123，MD5: 0192023a7bbd73250516f069df18b500）
-- 首次部署后请立即修改密码！
INSERT INTO `admin_user` (`name`, `password`, `is_service`) VALUES
('admin', MD5('admin123'), 0);
