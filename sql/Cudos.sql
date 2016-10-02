-- phpMyAdmin SQL Dump
-- version 4.0.10.16
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2016 at 10:29 PM
-- Server version: 5.5.51
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Cudos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `business_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `google_id` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `is_claimed` enum('True','False','Pending','') NOT NULL DEFAULT 'False',
  `is_closed` enum('True','False','','') NOT NULL DEFAULT 'False',
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`business_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`business_id`, `google_id`, `name`, `phone`, `website`, `password`, `email`, `category`, `is_claimed`, `is_closed`, `state`, `city`, `address`) VALUES
(20, 'ChIJBQA3D6PMj4ARetqtcBmIkR8', '', '', '', '', '', '', 'False', 'False', '', '', ''),
(23, 'ChIJBQA3D6PMj4ARvEAsAwRZbaI', '', '', '', '', '', '', 'False', 'False', '', '', ''),
(26, 'ChIJlwzAubjMj4ARiKlXGY6_YAE', '', '', '', '', '', '', 'False', 'False', '', '', ''),
(35, 'ChIJzd7xXsm6j4ARUp8sFUMNrWs', 'Stanford', '', '', '', '', '', 'False', 'False', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `businessadmin`
--

CREATE TABLE IF NOT EXISTS `businessadmin` (
  `business_id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businessemployee`
--

CREATE TABLE IF NOT EXISTS `businessemployee` (
  `business_id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `status` enum('Unverified','Verified','Unemployed','') NOT NULL,
  KEY `BusinessID` (`business_id`),
  KEY `EmployeeID` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `phone`, `email`, `password`) VALUES
(12, 'eya badal', '', '', 'eyabadal@yahoo.com', 'Password'),
(15, 'Troy Nguyen', '', '', 'troytroy@gmail.com', '202002');

-- --------------------------------------------------------

--
-- Table structure for table `customerreview`
--

CREATE TABLE IF NOT EXISTS `customerreview` (
  `customer_id` bigint(20) NOT NULL,
  `review_id` bigint(20) NOT NULL,
  KEY `CustomerID` (`customer_id`),
  KEY `ReviewID` (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customervote`
--

CREATE TABLE IF NOT EXISTS `customervote` (
  `customer_id` bigint(20) NOT NULL,
  `vote_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about_me` text NOT NULL,
  `img_url` longtext NOT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `EmployeeID` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `title`, `about_me`, `img_url`) VALUES
(24, 'Squirtle', '', '', '', ''),
(25, 'Charmander', '', '', '', ''),
(26, 'Pikachu', '', '', '', ''),
(28, 'Bob', '', '', '', ''),
(29, 'Sarah', '', '', '', ''),
(30, 'Eya', '', '', '', ''),
(31, 'Roya', '', '', '', ''),
(32, 'Seung', '', '', '', ''),
(34, 'Troy', '', '', '', ''),
(35, 'Troy', '', '', '', ''),
(36, 'Eya', '', '', '', ''),
(37, 'Roya', '', '', '', ''),
(38, 'Bob', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employeereview`
--

CREATE TABLE IF NOT EXISTS `employeereview` (
  `employee_id` bigint(20) NOT NULL,
  `review_id` bigint(20) NOT NULL,
  KEY `ReviewID` (`review_id`),
  KEY `EmployeeID` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `review_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `stars` tinyint(4) NOT NULL,
  `description` longtext NOT NULL,
  `IsFlagged` enum('True','False','','') NOT NULL DEFAULT 'False',
  `IsModified` enum('True','False','','') NOT NULL DEFAULT 'False',
  `ThumbsUp` int(11) NOT NULL,
  `ThumbsDown` int(11) NOT NULL,
  `businessid` int(11) NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `stars`, `description`, `IsFlagged`, `IsModified`, `ThumbsUp`, `ThumbsDown`, `businessid`) VALUES
(1, 0, 'Nice Employee! ', 'False', 'False', 0, 0, 20),
(2, 0, 'Mean and rude!', 'False', 'False', 0, 0, 23),
(3, 0, 'Anthony and his cakes are truly deserving of their stellar 5-star rating.', 'False', 'False', 0, 0, 25),
(4, 0, 'I''m probably the only female left on this planet who hasn''t given in to the gel/acrylic nail fad, so this review is only for a pedicure.\r\n\r\nI personally love the way this place looks - it''s so reminiscent of the spas down in LA with the free drinks, the comfy seats, and the awesome decor. Top coat had a wonderful selection of regular polishes - I found a color I loved so quickly thanks to their whole wall worth of options.', 'False', 'False', 0, 0, 26),
(5, 0, 'Kosse Nanat', 'False', 'False', 0, 0, 0),
(6, 0, 'Kosse Nanat', 'False', 'False', 0, 0, 0),
(7, 0, 'Kosse Nanat', 'False', 'False', 0, 0, 0),
(8, 0, 'Kosse Nanat', 'False', 'False', 0, 0, 0),
(9, 0, '', 'False', 'False', 0, 0, 0),
(10, 0, 'hi', 'False', 'False', 0, 0, 0),
(11, 0, '', 'False', 'False', 0, 0, 0),
(12, 0, 'ji', 'False', 'False', 0, 0, 0),
(13, 0, '', 'False', 'False', 0, 0, 0),
(14, 0, 'roya', 'False', 'False', 0, 0, 0),
(15, 0, 'eya', 'False', 'False', 0, 0, 0),
(16, 0, 'Amin ', 'False', 'False', 0, 0, 0),
(17, 0, '', 'False', 'False', 0, 0, 0),
(18, 0, 'eya badal abdihso ', 'False', 'False', 0, 0, 0),
(19, 0, '', 'False', 'False', 0, 0, 0),
(20, 0, '', 'False', 'False', 0, 0, 0),
(21, 0, '', 'False', 'False', 0, 0, 0),
(22, 0, '', 'False', 'False', 0, 0, 0),
(23, 0, '', 'False', 'False', 0, 0, 0),
(24, 0, '', 'False', 'False', 0, 0, 0),
(25, 0, '', 'False', 'False', 0, 0, 0),
(26, 0, '', 'False', 'False', 0, 0, 0),
(27, 0, 'eya', 'False', 'False', 0, 0, 0),
(28, 0, 'eya', 'False', 'False', 0, 0, 0),
(29, 0, '', 'False', 'False', 0, 0, 0),
(30, 0, '', 'False', 'False', 0, 0, 0),
(31, 0, '', 'False', 'False', 0, 0, 0),
(32, 0, '', 'False', 'False', 0, 0, 0),
(33, 0, '', 'False', 'False', 0, 0, 0),
(34, 0, 'sqs', 'False', 'False', 0, 0, 0),
(35, 0, '', 'False', 'False', 0, 0, 0),
(36, 0, '', 'False', 'False', 0, 0, 0),
(37, 0, '', 'False', 'False', 0, 0, 0),
(38, 0, '', 'False', 'False', 0, 0, 0),
(39, 0, '', 'False', 'False', 0, 0, 0),
(40, 0, '', 'False', 'False', 0, 0, 0),
(41, 0, '', 'False', 'False', 0, 0, 0),
(42, 0, '', 'False', 'False', 0, 0, 0),
(43, 0, '', 'False', 'False', 0, 0, 0),
(44, 0, '', 'False', 'False', 0, 0, 0),
(45, 0, 'jnj', 'False', 'False', 0, 0, 0),
(46, 0, 'n m', 'False', 'False', 0, 0, 0),
(47, 0, 'eya', 'False', 'False', 0, 0, 0),
(48, 0, '', 'False', 'False', 0, 0, 0),
(49, 0, '', 'False', 'False', 0, 0, 0),
(50, 0, 'eya', 'False', 'False', 0, 0, 0),
(51, 0, 'eya', 'False', 'False', 0, 0, 0),
(52, 0, 'ers', 'False', 'False', 0, 0, 0),
(53, 0, '', 'False', 'False', 0, 0, 0),
(54, 0, '', 'False', 'False', 0, 0, 0),
(55, 0, '', 'False', 'False', 0, 0, 0),
(56, 0, '', 'False', 'False', 0, 0, 0),
(57, 0, '', 'False', 'False', 0, 0, 0),
(58, 0, '', 'False', 'False', 0, 0, 0),
(59, 0, '', 'False', 'False', 0, 0, 0),
(60, 0, '', 'False', 'False', 0, 0, 0),
(61, 0, '', 'False', 'False', 0, 0, 0),
(62, 0, '', 'False', 'False', 0, 0, 0),
(63, 0, '', 'False', 'False', 0, 0, 0),
(64, 0, '', 'False', 'False', 0, 0, 0),
(65, 0, '', 'False', 'False', 0, 0, 0),
(66, 0, '', 'False', 'False', 0, 0, 0),
(67, 0, 'ers', 'False', 'False', 0, 0, 0),
(68, 0, 'ers', 'False', 'False', 0, 0, 0),
(69, 0, '', 'False', 'False', 0, 0, 0),
(70, 0, 'ers', 'False', 'False', 0, 0, 0),
(71, 0, 'ers', 'False', 'False', 0, 0, 0),
(72, 0, 'ers', 'False', 'False', 0, 0, 0),
(73, 0, 'ers', 'False', 'False', 0, 0, 0),
(74, 0, '', 'False', 'False', 0, 0, 0),
(75, 0, '', 'False', 'False', 0, 0, 0),
(76, 0, '', 'False', 'False', 0, 0, 0),
(77, 0, '', 'False', 'False', 0, 0, 0),
(78, 0, '', 'False', 'False', 0, 0, 0),
(79, 0, '', 'False', 'False', 0, 0, 0),
(80, 0, '', 'False', 'False', 0, 0, 0),
(81, 0, '', 'False', 'False', 0, 0, 0),
(82, 0, '', 'False', 'False', 0, 0, 0),
(83, 0, '', 'False', 'False', 0, 0, 0),
(84, 0, '', 'False', 'False', 0, 0, 0),
(85, 0, '', 'False', 'False', 0, 0, 0),
(86, 0, '', 'False', 'False', 0, 0, 0),
(87, 0, '', 'False', 'False', 0, 0, 0),
(88, 0, '', 'False', 'False', 0, 0, 0),
(89, 0, '', 'False', 'False', 0, 0, 0),
(90, 0, '', 'False', 'False', 0, 0, 0),
(91, 0, '', 'False', 'False', 0, 0, 0),
(92, 0, '', 'False', 'False', 0, 0, 0),
(93, 0, '', 'False', 'False', 0, 0, 0),
(94, 0, '', 'False', 'False', 0, 0, 0),
(95, 0, '', 'False', 'False', 0, 0, 0),
(96, 0, '', 'False', 'False', 0, 0, 0),
(97, 0, '', 'False', 'False', 0, 0, 0),
(98, 0, '', 'False', 'False', 0, 0, 0),
(99, 0, '', 'False', 'False', 0, 0, 0),
(100, 0, 'dddd', 'False', 'False', 0, 0, 0),
(101, 0, '', 'False', 'False', 0, 0, 0),
(102, 0, 'jj', 'False', 'False', 0, 0, 0),
(103, 0, '', 'False', 'False', 0, 0, 0),
(104, 0, 'dddd', 'False', 'False', 0, 0, 0),
(105, 0, 'dddd', 'False', 'False', 0, 0, 0),
(106, 0, '', 'False', 'False', 0, 0, 0),
(107, 0, '', 'False', 'False', 0, 0, 0),
(108, 0, '', 'False', 'False', 0, 0, 0),
(109, 0, '', 'False', 'False', 0, 0, 0),
(110, 0, '', 'False', 'False', 0, 0, 0),
(111, 0, '', 'False', 'False', 0, 0, 0),
(112, 0, '', 'False', 'False', 0, 0, 0),
(113, 0, '', 'False', 'False', 0, 0, 0),
(114, 0, '', 'False', 'False', 0, 0, 0),
(115, 0, '', 'False', 'False', 0, 0, 0),
(116, 0, 'hi', 'False', 'False', 0, 0, 0),
(117, 0, 'hi', 'False', 'False', 0, 0, 0),
(118, 0, 'hi', 'False', 'False', 0, 0, 0),
(119, 0, 'hi', 'False', 'False', 0, 0, 0),
(120, 0, 'kiri', 'False', 'False', 0, 0, 0),
(121, 0, 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'False', 'False', 0, 0, 0),
(122, 0, 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'False', 'False', 0, 0, 0),
(123, 0, '', 'False', 'False', 0, 0, 0),
(124, 0, '', 'False', 'False', 0, 0, 0),
(125, 0, 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'False', 'False', 0, 0, 0),
(126, 0, 'hi', 'False', 'False', 0, 0, 0),
(127, 0, '', 'False', 'False', 0, 0, 0),
(128, 0, '', 'False', 'False', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviewvote`
--

CREATE TABLE IF NOT EXISTS `reviewvote` (
  `review_id` bigint(20) NOT NULL,
  `vote_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `vote_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_helpful` tinyint(1) NOT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
