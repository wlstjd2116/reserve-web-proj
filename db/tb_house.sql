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
-- 테이블 구조 `tb_house`
--

CREATE TABLE `tb_house` (
  `house_id` int(11) NOT NULL,
  `house_name` varchar(50) NOT NULL,
  `house_address` varchar(50) NOT NULL,
  `contents` varchar(50) NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `tb_house`
--

INSERT INTO `tb_house` (`house_id`, `house_name`, `house_address`, `contents`, `insert_date`) VALUES
(1, '자연룸', '안동시 안동로 8길 101호', '자연뷰로 가득한 방', '2021-12-05 15:01:11'),
(2, '마운틴룸', '안동시 안동로 8길 201호', '마운틴뷰로 가득한 방', '2021-12-05 15:01:11'),
(3, '바다룸', '안동시 안동로 8길 301호', '오션뷰로 가득한 방', '2021-12-05 15:02:06'),
(4, '냇가룸', '안동시 안동로 8길 401호', '냇가뷰로 가득한 방', '2021-12-05 15:02:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
