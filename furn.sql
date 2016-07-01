-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2016 at 03:04 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `furn`
--

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE IF NOT EXISTS `homepage` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `content`) VALUES
(1, '<h1>Home Page</h1>\r\n<p>\r\n	This is homepage\r\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `url` varchar(255) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `url`, `parent`) VALUES
(1, 'About Us', 'about_us', 0),
(2, 'contacts', 'contacts', 0),
(3, 'More About', 'more_about', 1),
(6, 'My new Page', 'my_new_page', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE IF NOT EXISTS `page_content` (
  `page_id` int(10) NOT NULL,
  `content` longtext NOT NULL,
  UNIQUE KEY `page_id` (`page_id`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`page_id`, `content`) VALUES
(1, '<p>\r\n	<img src="/public/images/9bd72073452f0f201f067ba23e162e15.jpg">\r\n</p>\r\n<p>\r\n	 <img src="/public/images/d72f46f80167fc2e9344ca7b64d40518.jpg" style="width: 137px;">\r\n</p>\r\n<h1> <span style="font-weight: normal;">barev bjishk</span></h1>'),
(2, '<p>\n	 samdnb asmdasmb msdbf bf mCONTACTS\n</p>\n<p>\n	 dhjd asdj\n</p>\n<p>\n	<img src="/public/images/8a726c8f8615fecd634661b5bdec10ef.jpg" style="width: 146px;">\n</p>\n<h2>dsfsdfsd</h2>');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `page_content`
--
ALTER TABLE `page_content`
  ADD CONSTRAINT `page_content_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
