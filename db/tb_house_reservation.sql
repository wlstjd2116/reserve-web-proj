-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-12-08 09:33
-- 서버 버전: 10.4.21-MariaDB
-- PHP 버전: 8.0.12

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
  `insert_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `tb_house_reservation`
--

INSERT INTO `tb_house_reservation` (`rs_id`, `user_id`, `house_id`, `rs_year`, `rs_month`, `rs_day`, `tot_man`, `insert_date`) VALUES
(7, 'a', 1, 2021, 12, 19, 5, '2021-12-03 21:16:08.000000'),
(8, 'asd', 1, 2021, 5, 2, 6, '2021-12-05 21:30:23.000000'),
(9, 'pipijua', 2, 2021, 12, 31, 2, '2021-12-06 14:09:50.000000'),
(10, 'admin', 3, 2022, 5, 12, 2, '2021-12-06 14:45:13.000000'),
(11, 'admin', 2, 2021, 12, 19, 5, '2021-12-06 15:05:29.000000');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `tb_house_reservation`
--
ALTER TABLE `tb_house_reservation`
  ADD PRIMARY KEY (`rs_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `tb_house_reservation`
--
ALTER TABLE `tb_house_reservation`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
