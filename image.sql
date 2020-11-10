-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-11-10 20:36:43
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `image`
--
CREATE DATABASE IF NOT EXISTS `image` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `image`;

-- --------------------------------------------------------

--
-- 表的结构 `photos`
--
-- 创建时间： 2020-10-16 09:09:47
-- 最后更新： 2020-10-16 09:10:19
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(3) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `imgsrc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hits` int(4) NOT NULL,
  `addate` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `photos`
--

INSERT INTO `photos` (`id`, `title`, `imgsrc`, `intro`, `hits`, `addate`) VALUES
(2, '1515515', '', '', 11561653, '00:00:00'),
(3, 'VUE3来了哦', './images/5f89635e4516b.png', '那就看你离开', 1, '1602839390'),
(4, 'VUE3来了哦', './images/5f896374a405b.png', '离开没看你就', 0, '1602839412');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--
-- 创建时间： 2020-10-16 08:17:55
-- 最后更新： 2020-10-16 08:19:59
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'hhb', '123456');

--
-- 转储表的索引
--

--
-- 表的索引 `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
