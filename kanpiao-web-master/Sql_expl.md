# 看票 Kanpiao - 数据库表结构说明

> 对应 SQL 建表脚本: `kanpiao.sql`

---

## 1. wx_user（微信用户表）

| 字段 | 描述 | 类型 | 备注 |
|------|------|------|------|
| user_id | 用户序号 | INT(11) UNSIGNED | 主键，非空，自动递增 |
| openid | 微信用户唯一标识 | VARCHAR(255) | 非空，唯一索引 |
| nickname | 用户昵称 | VARCHAR(255) | |
| avatarurl | 用户头像 URL | VARCHAR(512) | |
| gender | 用户性别 | TINYINT(1) | 0=女, 1=男 |
| mobile | 手机号码 | VARCHAR(20) | |
| country | 国家 | VARCHAR(64) | |
| province | 省份 | VARCHAR(64) | |
| city | 城市 | VARCHAR(64) | |
| language | 语言 | VARCHAR(32) | |
| is_checker | 检票员标识 | TINYINT(1) | 非空，默认 0。0=普通用户, 1=检票员 |
| is_banned | 封禁标识 | TINYINT(1) | 非空，默认 0。0=正常, 1=已封禁 |
| last_login | 上次登录时间 | DATETIME | |
| create_time | 创建时间 | DATETIME | 用户首次注册时间 |

---

## 2. admin_user（管理员表）

| 字段 | 描述 | 类型 | 备注 |
|------|------|------|------|
| admin_id | 管理员序号 | INT(11) UNSIGNED | 主键，非空，自动递增 |
| name | 管理员姓名/登录账号 | VARCHAR(255) | 非空，唯一索引 |
| password | 管理员密码 | VARCHAR(255) | 非空，MD5 散列存储 |
| avatar_url | 管理员头像地址 | VARCHAR(512) | |
| is_service | 客服标识 | TINYINT(1) | 非空，默认 0。0=管理员（完整权限）, 1=客服（受限权限，不可管理用户） |

---

## 3. login（登录记录表）

| 字段 | 描述 | 类型 | 备注 |
|------|------|------|------|
| login_id | 登录序号 | INT(11) UNSIGNED | 主键，非空，自动递增 |
| openid | 用户 openid | VARCHAR(255) | 非空 |
| platform | 登录平台 | TINYINT(1) | 非空，默认 0。0=小程序, 1=管理端 |
| login_time | 登录时间 | DATETIME | 非空 |
| is_new_login | 新登录标识 | TINYINT(1) | 非空，默认 1。0=已有 token 续期, 1=全新登录 |

---

## 4. show_item（演出表）

| 字段 | 描述 | 类型 | 备注 |
|------|------|------|------|
| show_id | 演出 ID | INT(11) UNSIGNED | 主键，非空，自动递增 |
| show_name | 演出名称 | VARCHAR(255) | 非空 |
| show_foreign_name | 外文名称 | VARCHAR(255) | |
| show_cast | 卡司（演职人员） | TEXT | |
| show_city | 演出城市 | VARCHAR(128) | |
| show_place | 演出地点/场馆 | VARCHAR(255) | |
| show_abstract | 演出概要/摘要 | VARCHAR(512) | |
| show_detail | 演出详细信息 | TEXT | |
| show_issuing_company | 发行公司 | VARCHAR(255) | |
| show_poster_horizontal | 横版海报图片 URL | VARCHAR(512) | |
| show_poster_vertical | 竖版海报图片 URL | VARCHAR(512) | |

---

## 5. show_session（场次表）

| 字段 | 描述 | 类型 | 备注 |
|------|------|------|------|
| session_id | 场次 ID | INT(11) UNSIGNED | 主键，非空，自动递增 |
| show_id | 所属演出 ID | INT(11) UNSIGNED | 非空，外键关联 `show_item.show_id` |
| session_time | 场次开始时间 | DATETIME | 非空 |
| session_end_time | 场次结束时间 | DATETIME | |
| session_sub | 场次说明/备注 | VARCHAR(512) | |
| session_sell_time | 发售开始时间 | DATETIME | |
| session_price | 票价（单张） | DECIMAL(10,2) | 非空，默认 0.00 |
| session_status | 场次状态 | TINYINT(1) | 非空，默认 1。0=已取消, 1=正常 |

---

## 6. orders（订单表）

订单表是本系统的核心业务表。单个订单可包含多张票（通过 `order_multi_id` 和 `order_multi_code` 标识）。

| 字段 | 描述 | 类型 | 备注 |
|------|------|------|------|
| order_id | 订单号 | INT(11) UNSIGNED | 主键，非空，自动递增 |
| order_session_id | 购入场次 ID | INT(11) UNSIGNED | 非空，外键关联 `show_session.session_id` |
| order_user_id | 购买用户 ID | INT(11) UNSIGNED | 非空，外键关联 `wx_user.user_id` |
| order_multi_id | 多票序号 | INT(11) UNSIGNED | 非空，默认 1。同一订单内多张票的序号（1 到 N） |
| order_multi_code | 多票订单标识码 | VARCHAR(64) | 同一订单多张票共享同一标识码，便于批量查找 |
| order_price | 单票金额 | DECIMAL(10,2) | 非空，默认 0.00 |
| order_multi_price | 订单总金额 | DECIMAL(10,2) | 非空，默认 0.00。包含该订单所有票的总金额 |
| order_create_time | 订单创建时间 | DATETIME | 非空 |
| order_pay_time | 支付完成时间 | DATETIME | |
| order_close_time | 订单关闭/退款时间 | DATETIME | |
| order_status | 订单状态 | TINYINT(2) | 非空，默认 2（待付款）。0=等待检票, 1=已检票入场, 2=待付款, 3=退款中, 4=已退款 |

---

## 7. banner（轮播图表）

| 字段 | 描述 | 类型 | 备注 |
|------|------|------|------|
| banner_id | 轮播图 ID | INT(11) UNSIGNED | 主键，非空，自动递增 |
| img | 轮播图图片 URL | VARCHAR(512) | 非空 |
| sort_order | 排序序号 | INT(11) | 非空，默认 0。数字越小越靠前 |
| is_show | 是否显示 | TINYINT(1) | 非空，默认 1。0=隐藏, 1=显示 |
| create_time | 创建时间 | DATETIME | |

---

## 表关系图

```
wx_user (用户)              admin_user (管理员)
    │                            │
    │ 1:N                        │
    ▼                            │
  orders (订单)                   │
    │                            │
    │ N:1                        │
    ▼                            │
show_session (场次)               │
    │                            │
    │ N:1                        │
    ▼                            ▼
show_item (演出)            login (登录记录，关联 wx_user.openid)

banner (轮播图，独立表)
```

---

## 初始化默认数据

| 表 | 说明 |
|----|------|
| admin_user | 默认管理员账号 `admin`，密码 `admin123`（MD5 加密）。部署后请立即修改！ |

## 数据库配置

参见 `function/pub/conn.php`：
- 数据库名: `kanpiao`
- 主机: `localhost:3306`
- 字符集: `utf8mb4`
