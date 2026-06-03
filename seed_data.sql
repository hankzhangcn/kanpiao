-- =====================================================
-- 看票小程序 - 演出种子数据
-- 数据来源：pythonke.com / chinaticket.com 公开信息
-- 图片来源：Unsplash 免费图片
-- =====================================================

-- 先清空已有测试数据（按外键依赖顺序删除）
DELETE FROM orders;
DELETE FROM show_session;
DELETE FROM show_item;
ALTER TABLE show_item AUTO_INCREMENT = 1;
ALTER TABLE show_session AUTO_INCREMENT = 1;
ALTER TABLE orders AUTO_INCREMENT = 1;

-- =====================================================
-- 1. 薛之谦「万兽之王」巡回演唱会 - 重庆
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '薛之谦「万兽之王」巡回演唱会-重庆站',
  'Joker Xue "King of Beasts" Tour - Chongqing',
  '薛之谦',
  '重庆',
  '重庆奥体中心体育场',
  '华语乐坛"情歌王子"薛之谦携「万兽之王」主题巡演登陆重庆！《演员》《丑八怪》《天外来物》等金曲连唱，更有全新舞台视觉震撼呈现。',
  '## 演出介绍

薛之谦「万兽之王」巡回演唱会是其出道以来规模最大的个人巡演，以"万兽之王"为核心概念，融合音乐、戏剧与视觉艺术。

本次重庆站将在可容纳6万人的重庆奥体中心体育场举办，连续演出多场。

## 演出亮点

- 全新编曲：经典歌曲重新编排，带来耳目一新的听觉体验
- 顶级舞美：国际团队打造沉浸式舞台
- 惊喜曲目：每场设有随机歌单环节

## 演出曲目（部分）

《天外来物》《演员》《丑八怪》《绅士》《刚刚好》《像风一样》《认真的雪》等经典歌曲',
  '太合音乐集团',
  'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-26 19:30:00', '2026-06-26 22:00:00', '首场', '2026-06-01 10:00:00', 317.00, 1),
  (LAST_INSERT_ID(), '2026-06-27 19:30:00', '2026-06-27 22:00:00', '第二场', '2026-06-01 10:00:00', 317.00, 1),
  (LAST_INSERT_ID(), '2026-06-28 19:30:00', '2026-06-28 22:00:00', '加场', '2026-06-05 10:00:00', 517.00, 1);

-- =====================================================
-- 2. 周深「深深的」巡回演唱会 - 郑州
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '周深2026「深深的」巡回演唱会-郑州站',
  'Zhou Shen "Deep" 2026 Tour - Zhengzhou',
  '周深',
  '郑州',
  '郑州奥林匹克体育中心-洋河·梦之蓝体育场',
  '天籁之音周深携全新巡演「深深的」降临郑州！从《大鱼》到《光亮》，用音乐穿越时空，感受独一无二的声线魅力。',
  '## 演出介绍

周深「深深的」巡回演唱会以"深海"为意象，将他极具辨识度的嗓音比作深海中回响的天籁。演唱会分为"浅海""深海""星空"三个篇章，带领观众经历一场完整的音乐旅程。

## 演出亮点

- 全息投影：首次在巡演中使用全息技术
- 多语种演绎：中文、英文、日语、意大利语歌曲轮番上阵
- 互动环节：与粉丝近距离互动的特别设计

## 代表曲目

《大鱼》《光亮》《达拉崩吧》《起风了》《Rubia》《和光同尘》',
  '梦响强音文化',
  'https://images.unsplash.com/photo-1429962714451-bb934ecdc4ec?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1429962714451-bb934ecdc4ec?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-27 19:30:00', '2026-06-27 22:00:00', '', '2026-05-15 10:00:00', 399.00, 1),
  (LAST_INSERT_ID(), '2026-06-28 19:30:00', '2026-06-28 22:00:00', '加场', '2026-05-20 10:00:00', 399.00, 1);

-- =====================================================
-- 3. 林子祥&叶蒨文「白头到老」演唱会 - 上海
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '林子祥&叶蒨文「白头到老」演唱会-上海站',
  'George Lam & Sally Yeh "Grow Old Together" Concert - Shanghai',
  '林子祥、叶蒨文',
  '上海',
  '浦发银行东方体育中心',
  '华语乐坛神仙眷侣林子祥与叶蒨文联袂献唱！《选择》《祝福》《男儿当自强》等时代金曲，带你重温港乐黄金年代。',
  '## 演出介绍

林子祥与叶蒨文，这对华语乐坛最具传奇色彩的夫妻档，以「白头到老」为主题首次联袂开启大型巡回演唱会。

## 演出亮点

- 经典对唱：《选择》《爱到分离仍是爱》现场重现
- 各自代表作：林子祥《男儿当自强》《十分十二寸》，叶蒨文《祝福》《潇洒走一回》
- 回忆杀：大屏幕播放两人从相恋到白头的珍贵影像

这场演唱会不仅是一场音乐盛宴，更是一段跨越时代的爱情见证。',
  '英皇娱乐',
  'https://images.unsplash.com/photo-1501386761578-eac5c94b800a?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1501386761578-eac5c94b800a?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-27 19:30:00', '2026-06-27 22:30:00', '', '2026-05-20 10:00:00', 480.00, 1);

-- =====================================================
-- 4. 李健「万物安生时」巡回演唱会 - 佛山
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '「万物安生时」李健巡回演唱会-佛山站',
  'Li Jian "All Things in Peace" Tour - Foshan',
  '李健',
  '佛山',
  '佛山国际体育文化演艺中心',
  '"音乐诗人"李健再度开唱！用温暖嗓音诠释《贝加尔湖畔》《传奇》《风吹麦浪》，在喧嚣都市中寻一处心灵栖息地。',
  '## 演出介绍

李健「万物安生时」巡回演唱会，以"自然与人文"为内核，将他音乐中特有的诗意与哲思融入舞台设计。演唱会的舞美灵感来源于山水画卷，以极简的东方美学呈现"万物安生"的意境。

## 演出亮点

- 不插电环节：经典歌曲首次以不插电形式呈现
- 文学朗诵：李健将亲自诵读原创诗歌
- 弦乐团合作：特邀广州交响乐团弦乐组

## 代表曲目

《贝加尔湖畔》《传奇》《风吹麦浪》《异乡人》《假如爱有天意》',
  '北京听见时代',
  'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-27 19:30:00', '2026-06-27 22:00:00', '', '2026-05-25 10:00:00', 380.00, 1),
  (LAST_INSERT_ID(), '2026-06-28 19:30:00', '2026-06-28 22:00:00', '', '2026-05-25 10:00:00', 380.00, 1);

-- =====================================================
-- 5. 伍佰 & China Blue ROCK STAR 2 巡回演唱会 - 大连
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '伍佰 & China Blue ROCK STAR 2 巡回演唱会-大连站',
  'Wu Bai & China Blue ROCK STAR 2 Tour - Dalian',
  '伍佰 & China Blue',
  '大连',
  '大连体育中心体育馆',
  '摇滚诗人伍佰携 China Blue 再度来袭！《挪威的森林》《Last Dance》《浪人情歌》，全场大合唱的摇滚之夜！',
  '## 演出介绍

伍佰 & China Blue ROCK STAR 2 巡回演唱会是继 ROCK STAR 系列后的全新升级。伍佰以其独树一帜的台客摇滚风格，结合浪漫与狂野，为乐迷带来一场无与伦比的摇滚盛宴。

## 演出亮点

- 经典重现：《挪威的森林》《Last Dance》《浪人情歌》《突然的自我》
- 即兴演奏：伍佰标志性的吉他 Solo 环节
- 全民KTV：全场大合唱是伍佰演唱会的标配

伍佰的现场魅力在于那份不加修饰的真实——他弹琴，你唱歌。',
  '滚石唱片',
  'https://images.unsplash.com/photo-1459749411175-04bf5292ceea?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1459749411175-04bf5292ceea?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-27 19:30:00', '2026-06-27 22:00:00', '', '2026-05-20 10:00:00', 480.00, 1);

-- =====================================================
-- 6. 凤凰传奇「吉祥如意」巡回演唱会 - 广州
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '凤凰传奇「吉祥如意」2026巡回演唱会-广州站',
  'Phoenix Legend "Auspicious" 2026 Tour - Guangzhou',
  '凤凰传奇（玲花、曾毅）',
  '广州',
  '广东省奥林匹克体育中心体育场',
  '国民天团凤凰传奇携「吉祥如意」主题巡演奔赴广州！《最炫民族风》《月亮之上》《海底》，万人广场舞狂欢派对！',
  '## 演出介绍

凤凰传奇「吉祥如意」巡回演唱会是近年来最具国民度的演唱会IP之一。从《月亮之上》到《海底》，玲花与曾毅用音乐串起了几代人的共同记忆。

广州站将在容纳8万人的广东省奥体中心体育场举办，这也是凤凰传奇首次在广州举办连续多日的大型演唱会。

## 演出亮点

- 万人广场舞：全场观众一起跳《最炫民族风》
- 全新国风舞美：融合传统与科技
- 惊喜翻唱：意想不到的歌曲改编

## 代表曲目

《最炫民族风》《月亮之上》《荷塘月色》《自由飞翔》《海底》《山河图》',
  '孔雀廊文化',
  'https://images.unsplash.com/photo-1574169208507-84376144848b?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1574169208507-84376144848b?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-12 19:30:00', '2026-06-12 22:00:00', '', '2026-05-01 10:00:00', 380.00, 1),
  (LAST_INSERT_ID(), '2026-06-13 19:30:00', '2026-06-13 22:00:00', '', '2026-05-01 10:00:00', 380.00, 1),
  (LAST_INSERT_ID(), '2026-06-14 19:30:00', '2026-06-14 22:00:00', '周末场', '2026-05-01 10:00:00', 580.00, 1);

-- =====================================================
-- 7. 蔡依林 PLEASURE 巡回演唱会 - 沈阳
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '蔡依林 PLEASURE 巡回演唱会2026-沈阳站',
  'Jolin Tsai PLEASURE Tour 2026 - Shenyang',
  '蔡依林',
  '沈阳',
  '沈阳奥林匹克体育中心体育场',
  '亚洲天后蔡依林 PLEASURE 巡演降临沈阳！《舞娘》《Play 我呸》《玫瑰少年》，极致唱跳，感官盛宴！',
  '## 演出介绍

蔡依林 PLEASURE 巡回演唱会以"愉悦"为核心概念，将音乐、舞蹈、时尚与视觉艺术完美融合。演唱会由国际顶级团队打造，每一帧都是视觉大片。

## 演出亮点

- 百变造型：每场更换8套以上高定服装
- 高难度舞蹈：钢管舞、Voguing 等多元舞风
- 全新编曲：经典歌曲焕发新生
- 沉浸式舞台：360度环绕屏幕

## 代表曲目

《舞娘》《Play 我呸》《玫瑰少年》《大艺术家》《倒带》《说爱你》',
  '华纳音乐',
  'https://images.unsplash.com/photo-1533176952548-3f039eba9b3f?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1533176952548-3f039eba9b3f?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-20 19:30:00', '2026-06-20 22:30:00', '', '2026-05-10 10:00:00', 490.00, 1);

-- =====================================================
-- 8. 汪苏泷「明日世界」巡回演唱会 - 成都
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '汪苏泷2026「明日世界」世界巡回演唱会-成都站',
  'Silence Wang "Tomorrow World" 2026 Tour - Chengdu',
  '汪苏泷',
  '成都',
  '成都东安湖体育公园主体育场',
  '创作才子汪苏泷以「明日世界」为主题开启全新巡演！《有点甜》《不分手的恋爱》《一笑倾城》等青春回忆杀轮番上演。',
  '## 演出介绍

汪苏泷「明日世界」世界巡回演唱会是其出道以来最具野心的巡演企划。以"未来感"为视觉核心，打造充满科幻色彩的舞台世界。

成都站选址东安湖体育公园主体育场，将连续三日开唱。

## 演出亮点

- 科幻舞台：首次采用激光矩阵与全息纱幕
- 经典曲目：从出道金曲到最新专辑全涵盖
- 原创首唱：多首未发行新歌现场首演

## 代表曲目

《有点甜》《不分手的恋爱》《一笑倾城》《万有引力》《追光者》',
  '大象音乐',
  'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-19 19:30:00', '2026-06-19 22:00:00', '首场', '2026-05-05 10:00:00', 380.00, 1),
  (LAST_INSERT_ID(), '2026-06-20 19:30:00', '2026-06-20 22:00:00', '', '2026-05-05 10:00:00', 380.00, 1),
  (LAST_INSERT_ID(), '2026-06-21 19:30:00', '2026-06-21 22:00:00', '收官场', '2026-05-05 10:00:00', 580.00, 1);

-- =====================================================
-- 9. 话剧《雷雨》 - 北京
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '曹禺经典话剧《雷雨》-北京站',
  'Cao Yu Classic "Thunderstorm" - Beijing',
  '北京人民艺术剧院',
  '北京',
  '首都剧场',
  '中国话剧史上不朽的经典！曹禺代表作《雷雨》再度上演。两代人的恩怨纠葛，一个雷雨夜的命运审判，震撼人心。',
  '## 剧目介绍

《雷雨》是中国现代话剧的奠基之作，由曹禺创作于1933年。该剧以1925年前后的中国社会为背景，描写了一个带有浓厚封建色彩的资产阶级家庭的悲剧。

## 剧情概要

周朴园之妻蘩漪不堪丈夫的专横冷酷，与继子周萍发生不伦之恋。周萍后与侍女四凤相爱。四凤之母鲁侍萍来到周家，发现周朴园正是三十年前抛弃她的恋人。雷雨之夜，真相大白，悲剧无可挽回……

## 演出团队

北京人民艺术剧院是中国最负盛名的话剧院团之一，本次演出由人艺实力派演员倾情演绎。',
  '北京人民艺术剧院',
  'https://images.unsplash.com/photo-1460723237483-7a6dc9d0b212?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1460723237483-7a6dc9d0b212?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-07 19:30:00', '2026-06-07 22:00:00', '', '2026-05-01 10:00:00', 180.00, 1),
  (LAST_INSERT_ID(), '2026-06-08 14:30:00', '2026-06-08 17:00:00', '下午场', '2026-05-01 10:00:00', 120.00, 1),
  (LAST_INSERT_ID(), '2026-06-08 19:30:00', '2026-06-08 22:00:00', '', '2026-05-01 10:00:00', 180.00, 1);

-- =====================================================
-- 10. 话剧《原野》 - 北京
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '曹禺经典话剧《原野》',
  'Cao Yu "The Wilderness"',
  '北京人民艺术剧院',
  '北京',
  '北京人艺实验剧场',
  '曹禺"生命三部曲"之一《原野》，一部关于复仇与救赎的黑暗史诗。原始欲望与宿命的激烈碰撞，直击灵魂深处。',
  '## 剧目介绍

《原野》是曹禺于1937年创作的三幕剧，与《雷雨》《日出》并称"生命三部曲"。故事讲述了农民仇虎从监狱逃出后向地主焦阎王复仇的悲剧。

## 剧情概要

仇虎越狱归来，却发现仇人焦阎王已死，昔日恋人金子已嫁焦阎王之子焦大星。复仇的火焰在心中燃烧，爱与恨的漩涡将所有人卷入深渊……

## 演出特色

本次演出在人艺实验剧场以沉浸式方式呈现，观众与演员的距离被极大缩短，带来前所未有的观剧体验。',
  '北京人民艺术剧院',
  'https://images.unsplash.com/photo-1503095396549-807759245b35?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1503095396549-807759245b35?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-06 19:30:00', '2026-06-06 22:00:00', '', '2026-05-01 10:00:00', 120.00, 1),
  (LAST_INSERT_ID(), '2026-06-07 19:30:00', '2026-06-07 22:00:00', '', '2026-05-01 10:00:00', 120.00, 1);

-- =====================================================
-- 11. 话剧《倾城之恋》五周年特别版 - 广州
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '话剧《倾城之恋》五周年特别版-广州站',
  '"Love in a Fallen City" 5th Anniversary Special - Guangzhou',
  '朱洁静、乔振宇',
  '广州',
  '白云国际会议中心世纪大会堂',
  '张爱玲经典之作搬上舞台！朱洁静×乔振宇联袂主演，一座城的倾覆成全一段爱情。五周年特别版，舞美全面升级。',
  '## 剧目介绍

话剧《倾城之恋》改编自张爱玲同名小说，自首演以来好评如潮。五周年特别版由原班主创团队精心打磨，舞美与服装全面升级。

## 剧情概要

上海白家小姐白流苏离婚后回到娘家，被兄嫂嫌弃。在一次相亲中，她结识了富商范柳原。两人从互相试探到真心相许，恰逢香港沦陷——一座城的倾覆，成全了他们的爱情。

## 演出团队

- 白流苏：朱洁静（上海歌舞团首席舞者）
- 范柳原：乔振宇（著名影视演员）
- 导演：叶锦添

五周年特别版新增原创舞蹈段落与多媒体视觉设计，以更现代的语汇诠释张爱玲笔下的乱世情缘。',
  '广州大剧院',
  'https://images.unsplash.com/photo-1514306191717-452ec28c7814?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1514306191717-452ec28c7814?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-05 19:30:00', '2026-06-05 22:00:00', '首演', '2026-05-10 10:00:00', 280.00, 1),
  (LAST_INSERT_ID(), '2026-06-06 19:30:00', '2026-06-06 22:00:00', '', '2026-05-10 10:00:00', 280.00, 1);

-- =====================================================
-- 12. 话剧《茶馆》专属版 - 北京
-- =====================================================
INSERT INTO show_item (show_name, show_foreign_name, show_cast, show_city, show_place,
  show_abstract, show_detail, show_issuing_company, show_poster_horizontal, show_poster_vertical)
VALUES (
  '老舍经典话剧《茶馆》专属版',
  'Lao She Classic "Teahouse" Exclusive Edition',
  '北京人民艺术剧院',
  '北京',
  '首都剧场',
  '老舍不朽名作、北京人艺镇院之宝《茶馆》专属版！一个茶馆，三个时代，半部中国近代史。不可错过的话剧盛宴！',
  '## 剧目介绍

《茶馆》是老舍先生于1957年创作的三幕话剧，是中国话剧史上演出场次最多、最具国际影响力的作品之一。本次专属版由北京人艺经典阵容出演。

## 剧情概要

全剧以北京裕泰茶馆为场景，展示了从清末到抗战胜利后近50年间北京的社会风貌和各阶层人物的命运变迁。王利发苦心经营茶馆，却终究敌不过时代的洪流……

## 经典台词

"我爱国，可谁爱我啊？"
"改良改良，越改越凉！"

## 演出团队

北京人民艺术剧院《茶馆》专属版，由人艺黄金阵容出演，是公认的"中国话剧天花板"。',
  '北京人民艺术剧院',
  'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=800&h=450&fit=crop',
  'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=600&h=800&fit=crop'
);

INSERT INTO show_session (show_id, session_time, session_end_time, session_sub, session_sell_time, session_price, session_status)
VALUES
  (LAST_INSERT_ID(), '2026-06-20 19:30:00', '2026-06-20 22:00:00', '', '2026-05-15 10:00:00', 280.00, 1),
  (LAST_INSERT_ID(), '2026-06-21 19:30:00', '2026-06-21 22:00:00', '', '2026-05-15 10:00:00', 280.00, 1);
