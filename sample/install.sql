-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 12 月 28 日 13:50
-- 服务器版本: 5.5.28-0ubuntu0.12.10.2
-- PHP 版本: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `DNZS`
--
CREATE DATABASE `DNZS` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `DNZS`;

-- --------------------------------------------------------

--
-- 表的结构 `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `time` enum('1','2','3','4','5','6') NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `consult`
--

CREATE TABLE IF NOT EXISTS `consult` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact` varchar(40) NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
