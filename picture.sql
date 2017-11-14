-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-01 12:26:17
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `picture`
--
CREATE DATABASE IF NOT EXISTS `picture` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `picture`;

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `username` varchar(600) NOT NULL,
  `pictureid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`cartid`, `username`, `pictureid`, `number`, `time`) VALUES
(1, '6', 8, 1, '2017-08-29 10:24:22');

-- --------------------------------------------------------

--
-- 表的结构 `picture`
--

CREATE TABLE `picture` (
  `pictureid` int(11) NOT NULL,
  `picturename` varchar(600) NOT NULL,
  `img` varchar(150) NOT NULL,
  `type` varchar(8) NOT NULL,
  `say` varchar(1000) NOT NULL,
  `photographer` varchar(30) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `picture`
--

INSERT INTO `picture` (`pictureid`, `picturename`, `img`, `type`, `say`, `photographer`) VALUES
(1, '舞动青春', 'image/p1.jpg', '人物', '舞动的精灵', 'admin'),
(2, '海岸线', 'image/p2.jpg', '风景', '别太理会人家背后怎么说你 因为那些比你强的人 根本懒得提起你 诋毁 本身就是一种仰望', 'admin'),
(3, '山有木兮木有枝', 'image/p3.jpg', '风景', '自然之美', 'admin'),
(4, '星空', 'image/p4.jpg', '风景', '是星星啊', 'admin'),
(5, '时光静好', 'image/p5.jpg', '创意', '城市，书籍，静谧，喧嚣', 'admin'),
(6, '天人合一', 'image/p6.jpg', '创意', '我站在风景里，风景在我的脑海里', 'admin'),
(7, '让兴趣，更有趣', 'image/p7.jpg', '美食', '饿了吧哈哈', 'admin'),
(8, '午后时光', 'image/p8.jpg', '美食', '听说咖啡与音乐更配呦~', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, '666666', '666666'),
(2, '1', '123456789'),
(3, '6', '666'),
(4, '00001', '123456789'),
(5, '00002', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pictureid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `picture`
--
ALTER TABLE `picture`
  MODIFY `pictureid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
