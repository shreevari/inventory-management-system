-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2018 at 04:50 PM
-- Server version: 5.7.24-0ubuntu0.18.10.1
-- PHP Version: 7.2.10-0ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `show_defaulters()` ()  READS SQL DATA
SELECT * FROM `borrow` WHERE (`borrow`.`borrow_date`+`borrow`.`term`) < (SELECT CURRENT_DATE())$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `component` int(10) NOT NULL,
  `borrower` varchar(10) COLLATE utf32_bin NOT NULL,
  `maintainer` varchar(10) COLLATE utf32_bin NOT NULL,
  `borrow_id` int(10) NOT NULL,
  `borrow_date` date DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `comments` varchar(256) COLLATE utf32_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`component`, `borrower`, `maintainer`, `borrow_id`, `borrow_date`, `term`, `return_date`, `comments`) VALUES
(1231231235, '4VV16CS084', '4VV16CS104', 1234561238, '2018-12-06', 14, NULL, NULL);

--
-- Triggers `borrow`
--
DELIMITER $$
CREATE TRIGGER `update_component` AFTER INSERT ON `borrow` FOR EACH ROW UPDATE `component` SET `component`.`borrow_id`= new.`borrow_id` WHERE `component`.`id`=new.`component`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_return` AFTER UPDATE ON `borrow` FOR EACH ROW UPDATE `component` SET `component`.`borrow_id`=NULL WHERE `component`.`id`=new.`component`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `id` int(10) NOT NULL,
  `product` bigint(10) NOT NULL,
  `owner` varchar(10) COLLATE utf32_bin DEFAULT NULL,
  `state` varchar(256) COLLATE utf32_bin NOT NULL,
  `borrow_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id`, `product`, `owner`, `state`, `borrow_id`) VALUES
(1231231230, 1234567890, '4VV16CS101', 'Mint', NULL),
(1231231231, 1234567890, '4VV16CS101', 'Mint', NULL),
(1231231232, 1234567890, '4VV16CS101', 'Mint', NULL),
(1231231233, 1234567891, '4VV16CS101', 'Mint', NULL),
(1231231234, 1234567891, '4VV16CS101', 'Mint', NULL),
(1231231235, 1234567892, '4VV16CS101', 'Mint', 1234561238),
(1231231236, 1234567892, '4VV16CS101', 'Mint', NULL),
(1231231237, 1234567893, '4VV16CS101', 'Mint', NULL),
(1231231238, 1234567893, '4VV16CS101', 'Mint', NULL),
(1231231239, 1234567893, '4VV16CS101', 'Mint', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintainer`
--

CREATE TABLE `maintainer` (
  `id` varchar(10) COLLATE utf32_bin NOT NULL,
  `role` varchar(32) COLLATE utf32_bin DEFAULT NULL,
  `start_date` date NOT NULL,
  `term` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `maintainer`
--

INSERT INTO `maintainer` (`id`, `role`, `start_date`, `term`) VALUES
('4VV16CS100', 'Maintainer', '2018-03-01', 365),
('4VV16CS104', 'Maintainer', '2018-03-01', 365);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` varchar(10) COLLATE utf32_bin NOT NULL,
  `contact` bigint(10) NOT NULL,
  `name` varchar(32) COLLATE utf32_bin DEFAULT NULL,
  `department` varchar(32) COLLATE utf32_bin DEFAULT NULL,
  `batch` int(4) DEFAULT NULL,
  `section` char(1) COLLATE utf32_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `contact`, `name`, `department`, `batch`, `section`) VALUES
('4VV16CS084', 9886738741, 'Praveen R', 'Computer Science', 2016, 'B'),
('4VV16CS097', 9445769125, 'Sesa Sai Charan', 'Computer Science', 2016, 'B'),
('4VV16CS100', 9886739496, 'Shreevari SP', 'Computer Science', 2016, 'B'),
('4VV16CS104', 9731421876, 'Siddesh Aradhya', 'Computer Science', 2016, 'B'),
('4VV16CS107', 9731457895, 'Sonika Kariappa', 'Computer Science', 2016, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` varchar(10) COLLATE utf32_bin NOT NULL,
  `name` varchar(32) COLLATE utf32_bin DEFAULT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `name`, `contact`) VALUES
('4VV16CS101', 'Matthews', 9731741258);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(10) NOT NULL,
  `name` varchar(32) COLLATE utf32_bin NOT NULL,
  `description` varchar(256) COLLATE utf32_bin DEFAULT NULL,
  `category` varchar(32) COLLATE utf32_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category`) VALUES
(1234567890, 'Arduino Uno', 'Arduino Uno', 'Development board'),
(1234567891, 'Arduino Nano', 'Arduino Nano', 'Development board'),
(1234567892, 'Arduino Mega', 'Arduino Mega', 'Development board'),
(1234567893, 'NodeMCU', 'NodeMCU', 'Development board');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(10) COLLATE utf32_bin NOT NULL,
  `password` varchar(255) COLLATE utf32_bin NOT NULL,
  `type` varchar(32) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `type`) VALUES
('4VV16CS100', 'password', 'admin'),
('4VV16CS104', '123', 'maintainer'),
('4VV16CS107', '123', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`component`),
  ADD KEY `borrower` (`borrower`),
  ADD KEY `maintainer` (`maintainer`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`),
  ADD KEY `component_ibfk_3` (`product`);

--
-- Indexes for table `maintainer`
--
ALTER TABLE `maintainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`component`) REFERENCES `component` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`borrower`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_ibfk_3` FOREIGN KEY (`maintainer`) REFERENCES `maintainer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `component`
--
ALTER TABLE `component`
  ADD CONSTRAINT `component_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `owner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `component_ibfk_3` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintainer`
--
ALTER TABLE `maintainer`
  ADD CONSTRAINT `maintainer_ibfk_1` FOREIGN KEY (`id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`username`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
