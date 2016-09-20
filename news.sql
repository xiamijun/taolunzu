-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-31 12:54:08
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `author` varchar(10) NOT NULL,
  `subject` tinytext NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `author`, `subject`, `content`, `date`) VALUES
(1, 'a', 'aaa', 'aaa', '2016-08-30 20:58:45'),
(2, 'ab', 'bbbb', 'bbbb', '2016-08-30 20:59:00'),
(3, 'cc', 'ccc', 'cccc', '2016-08-30 20:59:07'),
(4, 'ddd', 'dddd', 'ddd', '2016-08-30 20:59:31'),
(5, '333', '44', '35555', '2016-08-30 20:59:37'),
(6, 'wwww', 'wwww', 'wwww', '2016-08-30 20:59:44'),
(7, 'qqq', 'qqq', '111', '2016-08-30 20:59:49');

-- --------------------------------------------------------

--
-- 表的结构 `reply_message`
--

CREATE TABLE `reply_message` (
  `id` int(11) NOT NULL,
  `author` varchar(10) NOT NULL,
  `subject` tinytext NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reply_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `reply_message`
--

INSERT INTO `reply_message` (`id`, `author`, `subject`, `content`, `date`, `reply_id`) VALUES
(1, 'asda', 'asdad', 'asdass', '2016-08-31 17:59:27', 7),
(2, 'asd', 'asdad', 'asda', '2016-08-31 17:59:39', 7),
(3, '213', 'qweq', 'qwdq', '2016-08-31 17:59:50', 6),
(6, '777', '777', '77777', '2016-08-31 12:53:26', 7),
(7, '666', '666', '666666', '2016-08-31 12:53:30', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_message`
--
ALTER TABLE `reply_message`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `reply_message`
--
ALTER TABLE `reply_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
