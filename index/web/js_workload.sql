-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-06-16 03:15:49
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `js_workload`
--

-- --------------------------------------------------------

--
-- 表的结构 `administrator`
--

CREATE TABLE `administrator` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `userId` varchar(30) NOT NULL COMMENT '用户ID',
  `role` varchar(10) NOT NULL COMMENT '用户类型',
  `name` varchar(32) NOT NULL COMMENT '姓名',
  `departmentName` varchar(32) DEFAULT NULL COMMENT '部门',
  `password` varchar(48) NOT NULL COMMENT '密码',
  `status` tinyint(4) NOT NULL COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `userId`, `role`, `name`, `departmentName`, `password`, `status`) VALUES
(22, 'hzj', 'hzj', '管理员', '胡泽军', '办公室', 'cbcfb21abd7d0c4c39f002e5788e7c7ce8aeb455', 1);

-- --------------------------------------------------------

--
-- 表的结构 `basedata`
--

CREATE TABLE `basedata` (
  `id` int(11) NOT NULL COMMENT '主键',
  `workTask` int(11) NOT NULL COMMENT '工作任务',
  `baseMoney` int(11) NOT NULL COMMENT '基础奖金'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `basedata`
--

INSERT INTO `basedata` (`id`, `workTask`, `baseMoney`) VALUES
(1, 350, 0);

-- --------------------------------------------------------

--
-- 表的结构 `basedata2`
--

CREATE TABLE `basedata2` (
  `id` int(11) NOT NULL COMMENT '主键',
  `baseKey` varchar(32) NOT NULL COMMENT '键名',
  `content` text NOT NULL COMMENT '内容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `basedata2`
--

INSERT INTO `basedata2` (`id`, `baseKey`, `content`) VALUES
(1, '单位', '人年|个年|人.学期|万字|课时|人|十人|万元|十万元|百万元|年|月|天|项|篇|次|个|门|班|份|队|次.生'),
(3, '5', '5');

-- --------------------------------------------------------

--
-- 表的结构 `basedata3`
--

CREATE TABLE `basedata3` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `content` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `basedata3`
--

INSERT INTO `basedata3` (`id`, `name`, `content`) VALUES
(1, 'workyear', '2020');

-- --------------------------------------------------------

--
-- 表的结构 `bigtype`
--

CREATE TABLE `bigtype` (
  `id` int(11) NOT NULL,
  `bigType` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bigtype`
--

INSERT INTO `bigtype` (`id`, `bigType`) VALUES
(1, '科研'),
(2, '技能竞赛'),
(3, '院校建设'),
(4, '专业建设'),
(5, '课程建设'),
(6, '校外指导'),
(7, '其它工作'),
(8, '临时任务');

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL COMMENT '主键',
  `departmentName` varchar(32) NOT NULL COMMENT '部门名称',
  `dutyPerson` varchar(32) NOT NULL COMMENT '责任人'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `department`
--

INSERT INTO `department` (`id`, `departmentName`, `dutyPerson`) VALUES
(1, '办公室', 'XXXXX17777'),
(2, '软件专业群', 'AAAAA'),
(3, '网络专业群', 'BBBBB'),
(4, '广告设计专业群', 'CCCCC'),
(5, '室内设计专业群', 'DDDD'),
(6, '工业设计专业群', 'EEEEEE'),
(7, '实训中心', 'FFFFFF'),
(14, 'adfa', 'adfadsf');

-- --------------------------------------------------------

--
-- 表的结构 `teachhour`
--

CREATE TABLE `teachhour` (
  `id` int(11) NOT NULL COMMENT '主键',
  `year` char(4) NOT NULL COMMENT '年度',
  `teacherId` varchar(15) NOT NULL COMMENT '教工号',
  `classHour` int(11) NOT NULL COMMENT '教学工作量',
  `status` varchar(4) NOT NULL COMMENT '状态',
  `recorder` varchar(32) NOT NULL COMMENT '记录人'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teachhour`
--

INSERT INTO `teachhour` (`id`, `year`, `teacherId`, `classHour`, `status`, `recorder`) VALUES
(133, '2020', '123456', 100, '1', '张三'),
(134, '2020', 'aaa', 1, '通过', 'aaa'),
(142, '2021', 'aaa', 77, '通过', 'aaa'),
(143, '2022', 'aaa', 12, '保存', 'aaa');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `userId` varchar(30) NOT NULL COMMENT '用户ID',
  `role` varchar(10) NOT NULL COMMENT '用户类型',
  `name` varchar(32) NOT NULL COMMENT '姓名',
  `departmentName` varchar(32) DEFAULT NULL COMMENT '部门',
  `password` varchar(48) NOT NULL COMMENT '密码',
  `status` tinyint(4) NOT NULL COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `userId`, `role`, `name`, `departmentName`, `password`, `status`) VALUES
(102, 'aaa', 'aaa', '教师', '张三', '办公室', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 1);

-- --------------------------------------------------------

--
-- 表的结构 `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL COMMENT '主键',
  `year` varchar(4) NOT NULL COMMENT '材料年度',
  `teacherId` varchar(20) NOT NULL COMMENT '教工号',
  `bigType` varchar(32) NOT NULL COMMENT '大类',
  `typeName` varchar(32) NOT NULL COMMENT '类别名称',
  `rankName` varchar(20) NOT NULL COMMENT '级别名',
  `content` text NOT NULL COMMENT '内容',
  `amountClass` float NOT NULL COMMENT '课时工作计数',
  `classHour` int(11) DEFAULT NULL COMMENT '折算课时',
  `amountMoney` float NOT NULL COMMENT '奖金工作计数',
  `money` float DEFAULT NULL COMMENT '奖励金额',
  `evidence` varchar(200) DEFAULT NULL COMMENT '证明材料',
  `remarks` varchar(200) DEFAULT NULL COMMENT '备注',
  `recorder` varchar(32) NOT NULL COMMENT '记录人',
  `status` varchar(2) NOT NULL COMMENT '状态',
  `ignoreSign` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `work`
--

INSERT INTO `work` (`id`, `year`, `teacherId`, `bigType`, `typeName`, `rankName`, `content`, `amountClass`, `classHour`, `amountMoney`, `money`, `evidence`, `remarks`, `recorder`, `status`, `ignoreSign`) VALUES
(2085, '2020', '', '院校建设', '立项专利', '新型授权', 'adfafd', 3, 20, 3, 20, NULL, NULL, 'hzj', '确认', 0),
(2086, '2020', 'aaa', '院校建设', '教科研成果奖', '省级', 'asdfasdf', 1, 50, 1, 50, NULL, NULL, 'aaa', '确认', 0),
(2074, '2020', 'aaa', '院校建设', '教科研成果奖', '校级', 'ffff', 1, 10, 1, 30, NULL, NULL, 'aaa', '确认', 0),
(2075, '2020', 'aaa', '院校建设', '科研课题', '校级重点', 'ffff', 1, 30, 1, 30, NULL, NULL, 'aaa', '确认', 0),
(2076, '2020', 'aaa', '技能竞赛', '教科研成果奖', '省级', 'gggg', 1, 50, 1, 50, NULL, NULL, 'aaa', '确认', 0),
(2077, '2020', 'aaa', '课程建设', '科研课题', '横向立项', 'gggg', 33, 20, 3, 10, NULL, NULL, 'aaa', '确认', 0),
(2078, '2020', 'aaa', '校外指导', '立项专利', '新型受理', 'gggg', 3, 5, 3, 10, NULL, NULL, 'aaa', '确认', 0),
(2079, '2020', 'aaa', '专业建设', '教科研成果奖', '省级', 'gggg', 1, 50, 1, 50, NULL, NULL, 'aaa', '确认', 0),
(2080, '2020', 'aaa', '院校建设', '教科研成果奖', '国家级', 'gggg', 1, 100, 1, 100, NULL, NULL, 'hzj', '确认', 0),
(2081, '2020', 'aaa', '技能竞赛', '科研课题', '横向立项', 'hhhh', 4, 20, 3, 10, NULL, NULL, 'aaa', '保存', 0),
(2082, '2020', 'aaa', '科研', '科研课题', '横向立项', 'hhhhkkk', 3, 20, 3, 10, NULL, NULL, 'aaa', '保存', 0),
(2083, '2020', 'aaa', '专业建设', '教科研成果奖', '国家级', 'ffffllll', 1, 100, 1, 100, NULL, NULL, 'aaa', '保存', 0),
(2084, '2020', 'aaa', '专业建设', '教科研成果奖', '省级', 'adfa', 1, 50, 1, 50, NULL, NULL, 'aaa', '保存', 0);

-- --------------------------------------------------------

--
-- 表的结构 `worktype`
--

CREATE TABLE `worktype` (
  `id` int(11) NOT NULL COMMENT '主键',
  `bigType` varchar(30) NOT NULL COMMENT '大类',
  `typeName` varchar(32) NOT NULL COMMENT '类别名',
  `rank` varchar(32) NOT NULL COMMENT '级别',
  `content` varchar(500) NOT NULL COMMENT '内容',
  `classUnit` varchar(8) NOT NULL COMMENT '单位',
  `classHour` varchar(200) NOT NULL COMMENT '课时单价',
  `maxClassHour` varchar(11) NOT NULL COMMENT '单项最大值',
  `minClassHour` varchar(11) NOT NULL COMMENT '单项最小值',
  `moneyUnit` varchar(20) NOT NULL COMMENT '奖金单位',
  `price` varchar(200) NOT NULL COMMENT '单价',
  `maxPrice` varchar(11) NOT NULL COMMENT '单项最大值',
  `minPrice` varchar(11) NOT NULL COMMENT '单价最小值',
  `memo` varchar(100) DEFAULT NULL COMMENT '备注'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `worktype`
--

INSERT INTO `worktype` (`id`, `bigType`, `typeName`, `rank`, `content`, `classUnit`, `classHour`, `maxClassHour`, `minClassHour`, `moneyUnit`, `price`, `maxPrice`, `minPrice`, `memo`) VALUES
(19, '科研', '论文', '核心期刊', '核心期刊、国家重要报纸（学术、理论版）、一般索引全文转载。\r\n期刊级别、类别以学院高职研究所认定为准', '篇', '20', '', '1', '篇', '30', '', '1', NULL),
(13, '其它工作', '年度考核优秀', '系级', '年度考核优秀', '次', '0', '0', '0', '次', '30', '1', '1', NULL),
(12, '其它工作', '年度考核优秀', '校级', '年度考核优秀', '次', '0', '0', '0', '次', '20', '1', '1', NULL),
(18, '科研', '论文', '一般刊物', '一般刊物（含外国）、省级重要报纸（学术、理论版）、一般索引。\r\n期刊级别、类别以学院高职研究所认定为准', '篇', '10', '', '1', '篇', '10', '', '1', NULL),
(17, '临时任务', '临时任务', '校级', '在已有的类别中没有的，才在此处添加。\r\n经学院发放非授课工作量酬金发放小组讨论通过，给予相应奖励、补贴', '项', '', '', '0', '项', '', '', '0', NULL),
(20, '科研', '论文', '权威期刊', '权威期刊（含外国）、重要索引。\r\n期刊级别、类别以学院高职研究所认定为准', '篇', '40', '', '1', '篇', '50', '', '1', NULL),
(21, '科研', '教材著作', '校内教材', '经批准的校内【首次出版】的一般教材（含译著），校内出版或公开出版教材，由学院认定为初次出版的，才能给予奖励', '万字', '3', '', '0', '万字', '20', '2.5', '0', NULL),
(22, '科研', '教材著作', '一般教材', '经批准的公开【首次出版】的一般教材（含译著），校内出版或公开出版教材，由学院认定为初次出版的，才能给予奖励', '万字', '3', '', '0', '万字', '2', '25', '0', NULL),
(23, '科研', '教材著作', '专著', '经批准公开出版的专著', '万字', '10', '', '0', '万字', '2', '25', '0', NULL),
(24, '科研', '教材著作', '工学结合教材', '经学院立项公开出版的工学结合教材，校内出版或公开出版教材，由学院认定为初次出版的，才能给予奖励', '万字', '10', '', '0', '万字', '2', '25', '0', NULL),
(25, '科研', '科研课题', '校级', '校级一般项目', '项', '10', '', '1', '项', '10', '', '1', NULL),
(26, '科研', '科研课题', '校级重点', '校级重点项目', '项', '30', '', '1', '项', '30', '', '1', NULL),
(27, '科研', '科研课题', '横向立项', '横向立项课题奖励金额为项目经费的10分/万元，最高不超过30分/项；', '万元', '20', '', '0', '万元', '10', '3', '0', NULL),
(28, '科研', '科研课题', '市级立项', '市级立项课题', '项', '40', '', '1', '项', '20', '', '1', NULL),
(29, '科研', '科研课题', '省级立项', '省级立项课题', '项', '150', '', '1', '项', '30', '', '1', NULL),
(30, '科研', '科研课题', '国家级立项', '国家级立项课题', '项', '300', '', '1', '项', '50', '', '1', NULL),
(31, '科研', '立项专利', '发明受理', '发明专利（受理）', '项', '5', '', '1', '项', '10', '', '1', NULL),
(32, '科研', '立项专利', '发明授权', '发明专利（授权）', '项', '60', '', '1', '项', '30', '', '1', NULL),
(33, '科研', '立项专利', '新型受理', '实用新型专利（受理）', '项', '5', '', '1', '项', '10', '', '1', NULL),
(34, '科研', '立项专利', '新型授权', '实用新型专利（授权）', '项', '20', '', '1', '项', '20', '', '1', NULL),
(35, '科研', '立项专利', '外观授权', '外观设计专利（授权）', '项', '20', '', '1', '项', '20', '', '1', NULL),
(36, '科研', '教科研成果奖', '校级', '校级教科研成果奖', '项', '', '30', '10', '项', '30', '1', '1', NULL),
(37, '科研', '教科研成果奖', '省级', '省级', '项', '', '150', '50', '项', '50', '1', '1', NULL),
(38, '科研', '教科研成果奖', '国家级', '国家级', '项', '', '300', '100', '项', '100', '1', '1', NULL),
(97, '其它工作', '企业、社会调研', '校级', '经批准的企业、社会调研（有正式的调研报批手续或说明）', '次', '10', '', '1', '次', '10', '', '1', NULL),
(41, '技能竞赛', '指导学生参加技能竞赛获奖', '院级', '指导学生参加技能竞赛获奖，D类：互联网+创新创业大赛、挑战杯学生课外科技作品竞赛以及学生工作相关竞赛，（无限制参赛数量的比赛，以专业群认定为准。直接报名参加省赛，成功参赛即认定为院级奖项）', '项', '', '30', '10', '项', '10', '1', '1', NULL),
(42, '技能竞赛', '指导学生竞赛未获奖', '省级', '指导学生参加A、B类赛项，未获奖的情况', '项', '', '50', '20', '队', '100', '1', '1', NULL),
(43, '技能竞赛', '指导学生竞赛未获奖', '国家级', '指导学生参加A、B类赛项，未获奖', '项', '', '300', '100', '队', '100', '1', '1', NULL),
(44, '其它工作', '兼职辅导员', '校级', '兼职辅导员', '年', '60', '1', '0', '年', '0', '0', '0', NULL),
(45, '其它工作', '专业主任', '校级', '专业主任', '年', '80', '1', '0', '年', '0', '0', '0', NULL),
(46, '其它工作', '专业带头人', '校级', '专业带头人', '年', '40', '1', '0', '年', '0', '0', '0', NULL),
(48, '校外指导', '下企业指导', '广州市内', '下企业指导学生', '天', '1', '', '0', '次.生', '5', '', '1', NULL),
(49, '校外指导', '下企业指导', '广州市外', '下企业指导学生', '天', '2', '', '0', '次.生', '5', '', '1', NULL),
(50, '校外指导', '企业上课', '校级', '根据人才培养方案，在企业上课', '课时', '1', '', '0', '课时', '0', '0', '0', NULL),
(51, '校外指导', '为企业员工进行培训或讲座', '校级', '为企业员工进行培训或讲座', '十人', '1', '', '0', '次', '', '40', '0', NULL),
(52, '校外指导', '推荐学生进入企业生产实践', '校级', '推荐学生进入企业生产实践', '人', '1', '20', '0', '人', '5', '', '0', NULL),
(53, '校外指导', '推荐学生进入企业就业', '校级', '推荐每个学生进入企业就业', '人', '3', '', '1', '人', '10', '', '1', NULL),
(54, '院校建设', '成功联系校外实训基地', '校级', '成功联系校外实训基地（签协议为准）并已接收学生实习、成功联系企业并开展合作）\r\n', '个', '20', '', '1', '个', '20', '', '1', NULL),
(55, '院校建设', '校企合作', '校级', '与世界500强或中国500强或广东竞争力50强企业签协议', '个', '40', '', '1', '个', '60', '', '1', NULL),
(56, '院校建设', '引进社会捐赠设备', '校级', '引进社会捐赠设备', '十万元', '20', '', '0', '次', '', '60', '0', NULL),
(57, '院校建设', '牵线企业推动“厂中校”建设', '校级', '牵线企业，推动“厂中校”建设', '个', '40', '', '1', '个', '50', '', '1', NULL),
(58, '院校建设', '牵线企业推动“校中厂”建设', '校级', '牵线企业，推动“校中厂”建设', '个', '40', '', '1', '个', '50', '', '1', NULL),
(59, '其它工作', '大型讲座（200人左右跨年级或专业）', '200人', '大型讲座（200人左右跨年级或专业）', '次', '5', '', '1', '次', '20', '', '1', NULL),
(60, '其它工作', '大型讲座（500人左右跨系部）', '500人', '大型讲座（500人左右跨系部）', '次', '10', '', '1', '次', '30', '', '1', NULL),
(61, '其它工作', '企业锻炼', '校级', '到企业锻炼', '月', '20', '', '0', '次', '0', '', '', NULL),
(62, '专业建设', '实训室建设', '校级', '制定新实训（验）室建议方案，并完成其方案的实施（含市场研究）', '个', '', '50', '20', '万元', '1', '80', '30', NULL),
(63, '专业建设', '修订人才培养方案', '校级', '修订专业人才培养方案', '个', '10', '', '1', '个', '200', '', '1', NULL),
(64, '专业建设', '制定人才培养方案(二年制)', '校级', '制定新专业人才培养方案', '个', '20', '', '1', '个', '300', '', '1', NULL),
(65, '课程建设', '修订课程教学大纲', '校级', '修订课程教学大纲，在专业群内，根据需要进行分配奖金', '门', '2', '', '1', '门', '0', '0', '0', NULL),
(66, '课程建设', '制定课程标准', '校级', '制定课程标准', '门', '10', '', '1', '门', '50', '', '1', NULL),
(67, '课程建设', '修订课程标准', '校级', '修订课程标准，在专业群内，根据需要进行分配奖金', '门', '4', '', '1', '门', '0', '0', '0', NULL),
(68, '其它工作', '监考', '校级', '监考', '次', '1', '', '1', '年', '0', '', '', NULL),
(69, '其它工作', '出卷', '校级', '出卷，期末AB卷算两门', '门', '3', '', '1', '门', '15', '', '1', NULL),
(70, '其它工作', '改卷', '校级', '改卷', '班', '3', '', '1', '份', '0.3', '', '1', NULL),
(72, '专业建设', '专业建设规划', '校级', '制定专业建设规划', '个', '15', '', '1', '个', '10', '', '1', NULL),
(73, '专业建设', '专业教育、招聘会、高考咨询会（主讲）', '校级', '专业教育、招聘会、高考咨询会（主讲）', '次', '2', '', '1', '次', '50', '', '1', NULL),
(74, '其它工作', '指导青年教师', '校级', '指导青年教师', '人年', '10', '', '0', '人年', '20', '', '0', NULL),
(75, '其它工作', '顶岗实习及工学交替校外实习', '毕业综合实践', '指导三年制的第六学期（两年制的第四学期）按16周计算，折算工作量为3学时/生。', '人.学期', '3', '', '1', '人年', '0', '0', '0', NULL),
(76, '技能竞赛', '指导学生参加技能竞赛获奖', '校级', '指导学生参加技能竞赛获奖', '项', '', '50', '30', '项', '20', '1', '1', NULL),
(77, '技能竞赛', '指导学生参加技能竞赛获奖', '省级', '指导学生参加技能竞赛获奖', '项', '', '150', '50', '项', '30', '1', '1', NULL),
(78, '技能竞赛', '指导学生参加技能竞赛获奖', '国家级', '指导学生参加技能竞赛获奖', '项', '', '200', '100', '项', '50', '1', '1', NULL),
(80, '专业建设', '专业教学指导书', '校级', '编制专业教学指导书', '个', '5', '', '1', '个', '20', '', '1', NULL),
(81, '专业建设', '品牌专业申报成功', '省级', '省品牌建设专业申报成功', '个', '50', '', '1', '个', '30', '', '1', NULL),
(82, '专业建设', '实训基地材料撰写.申报成功', '省级', '省级实训基地材料撰写.申报成功', '个', '50', '', '1', '个', '30', '', '1', NULL),
(83, '专业建设', '实训基地申报成功', '省级', '省级实训基地申报成功', '个', '50', '', '1', '个', '30', '', '1', NULL),
(84, '专业建设', '实训基地申报成功', '国家级', '国家级实训基地申报成功', '个', '50', '', '1', '个', '30', '', '1', NULL),
(85, '课程建设', '精品课申报成功', '校级', '校级精品课申报成功', '门', '80', '', '1', '门', '30', '', '1', NULL),
(86, '专业建设', '品牌专业申报失败', '省级', '省品牌建设专业申报.失败', '个', '50', '', '1', '个', '100', '', '1', NULL),
(87, '专业建设', '实训基地申报失败', '省级', '省级实训基地申报.失败', '个', '50', '', '1', '个', '100', '', '1', NULL),
(88, '专业建设', '实训基地材料撰写.申报失败', '省级', '实训基地材料撰写.申报失败', '个', '50', '', '1', '个', '100', '', '1', NULL),
(89, '专业建设', '实训基地申报失败', '国家级', '国家级实训基地申报.失败', '个', '50', '', '1', '个', '100', '', '1', NULL),
(90, '课程建设', '精品课申报失败', '校级', '校级精品课申报.失败', '门', '80', '', '1', '门', '100', '', '1', NULL),
(91, '课程建设', '精品课申报成功', '省级', '省级精品课申报成功', '门', '70', '', '1', '门', '0', '0', '0', NULL),
(92, '课程建设', '精品课申报失败', '省级', '省级精品课申报.失败', '门', '70', '', '1', '门', '50', '', '1', NULL),
(93, '课程建设', '精品课申报成功', '国家级', '国家级精品课成功', '门', '100', '', '1', '门', '0', '0', '0', NULL),
(95, '院校建设', '设备验收', '校级', '参与学院设备验收', '个', '0.5', '', '1', '个', '0', '0', '0', NULL),
(98, '专业建设', '制定人才培养方案(三年制)', '校级', '制定新专业人才培养方案(三年制)', '个', '20', '', '1', '个', '500', '', '1', NULL),
(99, '专业建设', '专业教育、招聘会、高考咨询会（参与）', '校级', '专业教育、招聘会、高考咨询会（参与）', '次', '2', '', '1', '次', '10', '', '1', NULL),
(100, '其它工作', '指导本年度外聘教师', '校级', '指导本年度外聘教师', '人年', '10', '', '0', '人', '50', '', '0', NULL),
(101, '其它工作', '指导第二课堂（院级评委）', '校级', '指导第二课堂（院级评委）', '次', '0', '0', '0', '次', '10', '', '1', NULL),
(102, '其它工作', '顶岗实习及工学交替校外实习', '三年制第五学期', '顶岗实习及工学交替校外实习指导工作量。三年制的第五学期按18周计算，折算工作量计为4学时/生（不足18周按实际指导周数计算）；', '人.学期', '4', '', '1', '人年', '0', '0', '0', NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `basedata`
--
ALTER TABLE `basedata`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `basedata2`
--
ALTER TABLE `basedata2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keyindex` (`baseKey`);

--
-- 表的索引 `basedata3`
--
ALTER TABLE `basedata3`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `bigtype`
--
ALTER TABLE `bigtype`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departmentName` (`departmentName`);

--
-- 表的索引 `teachhour`
--
ALTER TABLE `teachhour`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `year` (`year`,`teacherId`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 表的索引 `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `worktype`
--
ALTER TABLE `worktype`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `basedata`
--
ALTER TABLE `basedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `basedata2`
--
ALTER TABLE `basedata2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `basedata3`
--
ALTER TABLE `basedata3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `bigtype`
--
ALTER TABLE `bigtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `teachhour`
--
ALTER TABLE `teachhour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=145;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=104;

--
-- 使用表AUTO_INCREMENT `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=2087;

--
-- 使用表AUTO_INCREMENT `worktype`
--
ALTER TABLE `worktype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
