-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-11-19 06:09
-- 서버 버전: 10.4.24-MariaDB
-- PHP 버전: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` mediumtext NOT NULL,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) NOT NULL,
  `file_name` char(40) DEFAULT NULL,
  `file_type` char(40) DEFAULT NULL,
  `file_copied` char(40) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 3,
  `r_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`num`, `id`, `name`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`, `rating`, `r_name`) VALUES
(10, 'pipijua', '김주아', '게시판입니다', '후기를 작성할 수 있습니다', '2021-12-06 (03:56)', 16, '', '', '', 3, '네이처'),
(11, 'pipijua', '김주아', '', '', '2021-12-06 (03:56)', 22, '캡처.PNG', 'image/png', '2021_12_06_03_56_36.PNG', 3, '네이처'),
(13, '1234', '김수진', '바다룸 추천합니다', '바다룸 좋아용 수영장 있어요 굿굿', '2021-12-06 (06:05)', 11, '', '', '', 3, '네이처'),
(19, 'pipijua', '', '나도', '글쓸래욕', '2022-10-18 (14:09)', 16, '붙임1 참가 신청서 (1).hwp', 'application/vnd.hancom.hwp', '2022_10_18_14_09_47.hwp', 3, '네이처'),
(20, 'pipijua', '김주아', 'asd', 'zxczx', '2022-10-18 (16:17)', 15, '', '', '', 3, '네이처'),
(21, 'pipijua', '김주아', '글은 많이', '많이 써보는 게 좋은 거 같아요\r\n', '2022-10-18 (16:56)', 10, '', '', '', 3, '네이처'),
(22, 'qq', '황주아', '오늘도 뭐가 많네요', '잘 먹고 갑니다~!', '2022-10-18 (16:56)', 1, '', '', '', 3, '네이처'),
(23, 'wlstjd2116', '황진성', '직원들이 친절해요', '아주아주좋습니당', '2022-10-18 (16:57)', 3, '', '', '', 3, '네이처'),
(24, 'wlstjd2116', '황진성', '풍경이 맛있고 음식이 멋있어요', '으음~', '2022-10-18 (17:00)', 16, '', '', '', 3, '네이처'),
(25, 'wlstjd2116', '황진성', '많이많이 잘 쉬다 가요', '가요가요', '2022-10-18', 15, '', '', '', 3, '네이처'),
(26, 'admin', '관리자', '안녕하십니까', '노티스도넛입니다', '2022-10-19', 15, '', '', '', 3, '네이처'),
(28, 'aaa7575', '기모찌', 'gd', 'gd', '2022-11-17', 32, '모코코.png', 'image/png', '2022_11_17_09_47_25.png', 3, '네이처'),
(29, 'aaa7575', '기모찌', '응애', '으앵', '2022-11-17', 343, '모코코.png', 'image/png', '2022_11_17_09_49_27.png', 3, '네이처'),
(30, 'wlstjd2116', '황진성', 'ㅁㄴㅇ', 'dasd', '2022-11-18', 4, '', '', '', 3, '네이처'),
(31, 'wlstjd2116', '황진성', 'dd', 'zz', '2022-11-18', 1, '', '', '', 3, '네이처'),
(32, 'wlstjd2116', '황진성', 'asd', 'zz', '2022-11-18', 2, '', '', '', 3, '네이처'),
(33, 'wlstjd2116', '황진성', '허니블루 최고 ㅠㅠㅠ', 'ㄱ', '2022-11-18', 43, '', '', '', 5, '허니블루'),
(34, 'wlstjd2116', '황진성', '마운틴진짜좋아여', 'ㄴㅁㅇㄴㅁㅇ', '2022-11-18', 1, '', '', '', 4, '마운틴'),
(35, 'wlstjd2116', '황진성', '와 진짜 시원해요', '근데 너무차가움', '2022-11-18', 1, '', '', '', 2, '오션'),
(36, 'wlstjd2116', '황진성', '그냥 감동...최고', 'ㅇ', '2022-11-18', 6, '', '', '', 5, '베르데');

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `c_id` int(5) NOT NULL,
  `u_id` varchar(20) NOT NULL,
  `contents` varchar(50) NOT NULL,
  `b_num` int(10) NOT NULL,
  `time` datetime NOT NULL,
  `b_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`c_id`, `u_id`, `contents`, `b_num`, `time`, `b_type`) VALUES
(3, 'aa', 'asd', 29, '2022-11-18 00:00:00', 'board'),
(4, 'aa', 'sad', 29, '2022-11-18 00:00:00', 'board'),
(5, 'aa', 'zz', 29, '2022-11-18 00:00:00', 'board'),
(6, 'wlstjd2116', 'asd', 29, '2022-11-18 00:00:00', 'board'),
(7, 'wlstjd2116', 'ㅇㅇ', 26, '2022-11-18 00:00:00', 'board'),
(8, 'admin', '다시요 다시', 29, '2022-11-18 00:00:00', 'board'),
(9, 'admin', '안영', 28, '2022-11-18 14:14:00', 'board'),
(10, 'admin', 'asd', 28, '2022-11-18 22:18:20', 'board'),
(11, 'admin', 'd', 29, '2022-11-18 22:18:37', 'board'),
(12, 'admin', 'sad', 29, '2022-11-18 22:31:38', 'board'),
(13, 'admin', 'asdsad', 29, '2022-11-18 22:34:13', 'board'),
(14, 'admin', '반갑습니다', 28, '2022-11-18 23:29:23', 'board'),
(15, 'admin', '됐어요?', 28, '2022-11-18 23:32:06', 'board'),
(16, 'admin', 'test', 28, '2022-11-18 23:33:59', 'board'),
(17, 'admin', 'test2', 28, '2022-11-18 23:34:15', 'board'),
(18, 'admin', '안녕', 28, '2022-11-18 23:34:51', 'board'),
(19, 'admin', '비동기', 29, '2022-11-18 23:36:18', 'board'),
(20, 'admin', '굿굿', 13, '2022-11-18 23:36:44', 'board'),
(21, 'admin', '비동기처리 연습', 17, '2022-11-18 23:37:04', 'board'),
(22, 'admin', '맞아요 ', 24, '2022-11-18 23:38:30', 'board'),
(23, 'admin', '괜찮아요', 24, '2022-11-18 23:38:34', 'board'),
(24, 'admin', '아 역시', 24, '2022-11-18 23:38:36', 'board'),
(25, 'admin', 'test2', 24, '2022-11-18 23:39:17', 'board'),
(26, 'admin', '댓글입니다', 20, '2022-11-18 23:44:33', 'board'),
(27, 'admin', '두 번째 댓글이에요', 20, '2022-11-19 00:28:11', 'board'),
(28, 'admin', '', 20, '2022-11-19 00:28:12', 'board'),
(29, 'admin', '마음껐쓰세용!!!!!!!!!!!!!', 19, '2022-11-19 00:35:40', 'board'),
(30, 'admin', '두구두구두구', 16, '2022-11-19 00:46:30', 'qna'),
(31, 'admin', '', 29, '2022-11-19 01:50:31', 'board'),
(32, '', '저도 써봤어여', 36, '2022-11-19 07:16:43', 'board'),
(33, 'test123', 'test1234', 29, '2022-11-19 07:20:42', 'board'),
(34, 'test123', 'delete', 38, '2022-11-19 07:21:19', 'board');

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `pass` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `email` char(80) DEFAULT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`num`, `id`, `pass`, `name`, `email`, `regist_day`, `level`, `point`) VALUES
(3, 'admin', 'admin', '관리자', NULL, NULL, 1, 11499),
(8, 'pipijua', '1234', '김주아', 'pipijua@naver.com', '2021-12-06 (03:54)', 9, 800),
(9, 'wlstjd2116', '1234', '황진성', '@', '2021-12-06 (03:57)', 9, 1500),
(10, '1234', '1234', '김수진', 'sujin@naver.com', '2021-12-06 (06:05)', 9, 200),
(11, 'aaaaa', '1234', '황진성', 'wlstjd2116@naver.com', '2021-12-06 (06:49)', 9, 0),
(12, 'aa', 'aa', 'jisng', 'aa@bb', '2022-10-18 (13:50)', 9, 0),
(13, 'asd', '', '황주아', '@', '2022-10-18 (13:51)', 9, 0),
(14, 'qq', '1234', '황주아', '@', '2022-10-18 (13:53)', 9, 100),
(15, 'wdd', 'wdd', 'asd', 'as@asd.com', '2022-10-20 (06:03)', 9, 0),
(17, 'qq', '1234222', '김주아', 'asd', '2022-11-11 (14:00)', 9, 0),
(18, 'wndk0029', 'ju547535!', '김주아', '@', '2022-11-17 (09:07)', 9, 0),
(19, 'ddaa6378', '123456', '123456', 'ddaa637878@gmail.com', '2022-11-17 (09:13)', 9, 0),
(20, 'Zka', 'Zkaka', 'Zka', 'Zka@naver.com', '2022-11-17 (09:22)', 9, 0),
(21, 'aaa7575', 'aaa1111', '기모찌aaa', '@', '2022-11-17 (09:45)', 9, 200),
(22, 'ljs', '1234', '이재석', NULL, '2022-11-18 (08:26)', 9, 0),
(23, 'ljs1', '1234', 'ddsd', '', '2022-11-18 (11:03)', 9, 0),
(24, 'ms', '1234', 'dd', NULL, '2022-11-18 (11:04)', 9, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` mediumtext NOT NULL,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) NOT NULL,
  `file_name` char(40) DEFAULT NULL,
  `file_type` char(40) DEFAULT NULL,
  `file_copied` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`num`, `id`, `name`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`) VALUES
(5, 'admin', '관리자', '※필독 공지사항입니다', '공지사항입니다 공지읽으세요 공지입니다', '2021-12-06 (06:07)', 10, '', '', ''),
(6, 'admin', '관리자', '기본 수칙입니다', '청소 깨끗 뒷정리 깨끗', '2021-12-06 (06:07)', 4, '', '', ''),
(7, 'admin', '관리자', '애완동물 동반 금지입니다', '저희 숙소는 애완동물 동반 숙소가 아닙니다', '2021-12-06 (06:08)', 94, '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `qna`
--

CREATE TABLE `qna` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` mediumtext NOT NULL,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) NOT NULL,
  `file_name` char(40) DEFAULT NULL,
  `file_type` char(40) DEFAULT NULL,
  `file_copied` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `qna`
--

INSERT INTO `qna` (`num`, `id`, `name`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`) VALUES
(11, 'wlstjd2116', '황진성', 'QNA 게시판입니다', '문의하세요', '2021-12-06 (03:58)', 3, '', '', ''),
(12, 'wlstjd2116', '황진성', '질문을 할 수 있습니다', 'ㅇ ㅇ', '2021-12-06 (03:58)', 52, '', '', ''),
(13, 'pipijua', '김주아', '가격이 얼마인가요', '가격궁금합니다', '2021-12-06 (06:08)', 5, '', '', ''),
(14, 'pipijua', '김주아', '최대 며칠까지 가능한가요', '궁금합니다d', '2021-12-06 (06:09)', 32, '', '', ''),
(16, 'whdghksqkqh', '종환바보', '바보입니까 저는?', '그렇읍니다.', '2022-11-02', 47, '', '', ''),
(17, 'test1234', '김진성', 'ddd', 'ddd', '2022-11-18', 1, '', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `survey`
--

CREATE TABLE `survey` (
  `ans1` int(11) DEFAULT NULL,
  `ans2` int(11) DEFAULT NULL,
  `ans3` int(11) DEFAULT NULL,
  `ans4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `survey`
--

INSERT INTO `survey` (`ans1`, `ans2`, `ans3`, `ans4`) VALUES
(18, 15, 9, 17);

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_house`
--

CREATE TABLE `tb_house` (
  `house_id` int(11) NOT NULL,
  `house_name` varchar(50) NOT NULL,
  `house_address` varchar(50) NOT NULL,
  `contents` varchar(50) NOT NULL,
  `insert_date` datetime NOT NULL,
  `house_pay` int(10) DEFAULT NULL,
  `people` varchar(30) DEFAULT NULL,
  `max_people` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `tb_house`
--

INSERT INTO `tb_house` (`house_id`, `house_name`, `house_address`, `contents`, `insert_date`, `house_pay`, `people`, `max_people`) VALUES
(1, '네이처', '경주시 보문로 20 T&R펜션 101호', '자연뷰로 가득한 방', '2021-12-05 15:01:11', 90000, '기준 2인 / 최대 4인', 4),
(2, '마운틴', '경주시 보문로 20 T&R펜션 201호', '마운틴뷰로 가득한 방', '2021-12-05 15:01:11', 90000, '기준 2인 / 최대 4인', 4),
(3, '오션', '경주시 보문로 20 T&R펜션 301호', '오션뷰로 가득한 방', '2021-12-05 15:02:06', 90000, '기준 2인 / 최대 4인', 4),
(4, '베르데', '경주시 보문로 20 T&R펜션 401호', '냇가뷰로 가득한 방', '2021-12-05 15:02:06', 90000, '기준 2인 / 최대 4인', 4),
(5, '허니블루', '경주시 보문로 20 T&R펜션 203호', '푸른 배경의 달콤한 분위기의 방', '2022-10-23 02:44:28', 140000, '기준 6인 / 최대 8인', 8),
(6, '아마빌레', '경주시 보문로 20 T&R펜션 303호', '고급진 분위기의 방', '2022-10-23 15:50:14', 200000, '기준 8인 / 최대 10인', 10);

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_house_reservation`
--

CREATE TABLE `tb_house_reservation` (
  `rs_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `house_id` int(50) NOT NULL,
  `rs_year` int(4) NOT NULL,
  `rs_month` int(2) NOT NULL,
  `rs_day` int(2) NOT NULL,
  `tot_man` int(10) NOT NULL,
  `insert_date` datetime(6) NOT NULL,
  `rs_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `tb_house_reservation`
--

INSERT INTO `tb_house_reservation` (`rs_id`, `user_id`, `house_id`, `rs_year`, `rs_month`, `rs_day`, `tot_man`, `insert_date`, `rs_date`) VALUES
(78, 'qq', 1, 2022, 11, 4, 4, '2022-11-03 01:32:17.000000', '2022-11-04'),
(80, 'wlstjd2116', 1, 2022, 11, 15, 2, '2022-11-13 22:50:56.000000', '2022-11-15'),
(82, 'wlstjd2116', 2, 2022, 11, 15, 2, '2022-11-13 22:51:22.000000', '2022-11-15'),
(83, 'wlstjd2116', 3, 0, 0, 0, 2, '2022-11-13 22:53:38.000000', '2022-11-16'),
(84, 'wlstjd2116', 3, 0, 0, 0, 4, '2022-11-16 04:58:56.000000', '2022-11-18'),
(85, 'wndk0029', 1, 0, 0, 0, 3, '2022-11-17 17:10:24.000000', '2022-11-26'),
(86, 'aaa7575', 1, 0, 0, 0, 3, '2022-11-17 17:48:08.000000', '2022-11-19'),
(87, 'admin', 1, 0, 0, 0, 4, '2022-11-19 01:39:05.000000', '2022-11-21'),
(88, 'test1234', 3, 0, 0, 0, 2, '2022-11-19 07:04:18.000000', '2022-11-30'),
(89, 'test1234', 6, 0, 0, 0, 4, '2022-11-19 07:05:01.000000', '2022-11-24'),
(90, 'test123', 3, 0, 0, 0, 3, '2022-11-19 07:20:03.000000', '2022-11-29');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`);

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `tb_house_reservation`
--
ALTER TABLE `tb_house_reservation`
  ADD PRIMARY KEY (`rs_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 테이블의 AUTO_INCREMENT `qna`
--
ALTER TABLE `qna`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 테이블의 AUTO_INCREMENT `tb_house_reservation`
--
ALTER TABLE `tb_house_reservation`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
