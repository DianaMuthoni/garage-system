-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2022 at 04:01 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prestige`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(100) NOT NULL,
  `id_number` int(11) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `date_of_repair` datetime NOT NULL,
  `client_email` text NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `phone_number`, `id_number`, `lastName`, `firstName`, `date_of_repair`, `client_email`) VALUES
(1, '', 1234567890, 'T', 'M', '2022-10-01 00:00:00', 'm@gmail.com'),
(2, '', 1234567890, 'T', 'M', '2022-10-01 00:00:00', 'm@gmail.com'),
(3, '1234567890', 1234567890, 'M', 'W', '2022-09-30 00:00:00', 'w@gmail.com'),
(4, '23456789', 1234567890, 'U', 'D', '2022-10-01 00:00:00', 'D@gmail.com'),
(5, '1234567890', 1234567890, 'Q', 'K', '2022-10-01 00:00:00', 'K@gmail.com'),
(6, '1234567890', 1234567890, 'T', 'M', '2022-10-01 00:00:00', 'm@gmail.com'),
(7, '1234567890', 1234567890, 'T', 'M', '2022-10-01 00:00:00', 'm@gmail.com'),
(8, '0799060706', 1234567890, 'wanjiru', 'mary', '2022-10-13 00:00:00', 'wanjiru@gmail'),
(9, '0799060706', 1234567890, 'wanjiru', 'mary', '2022-10-13 00:00:00', 'wanjiru@gmail'),
(10, '0799060706', 1234567890, 'Warigia', 'Anderson', '2022-10-07 00:00:00', 'anderson'),
(11, '0799030504', 234567, 'Wanjiru', 'Mary', '2022-10-06 00:00:00', 'mary@gmail.com'),
(12, '07990305066', 2345678, 'wanjiru', 'mary', '2022-10-11 00:00:00', 'mary@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `repair_request`
--

DROP TABLE IF EXISTS `repair_request`;
CREATE TABLE IF NOT EXISTS `repair_request` (
  `repair_id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `services` varchar(250) NOT NULL,
  `comments` varchar(250) NOT NULL,
  PRIMARY KEY (`repair_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_request`
--

INSERT INTO `repair_request` (`repair_id`, `Email`, `services`, `comments`) VALUES
(1, '', 'Heating & Cooling ', 'asdfhjkl;'),
(2, 'wanjiku@gmail.com', 'Air conditioning', 'haiyah!'),
(3, 'wanjiku@gmail.com', 'Brakes Repair', 'Mmmmmnh!'),
(4, 'wanjiku@gmail.com', 'Car Keys Repair', 'dfghjertyuxcvb'),
(5, 'wanjiku@gmail.com', 'Air conditioning,Heating & Cooling ', 'thr bnjgkhjxsjxksxslxk'),
(6, 'mercy@gmail.com', 'Heating & Cooling ,Car Keys Repair', 'njiklitrrrrttfeffdfdf'),
(7, 'flier@mail.com', 'Door Repair', 'my door hinges are loose');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'demo', 'demo@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'Mary', 'mburumarywanjiru@gmail.com', '$2y$10$4ane.FnOaZMhYY3BfrTeN.wEpml.n90RhzQi6/OQ.p3/pk5ENHoTm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

DROP TABLE IF EXISTS `tbl_appointment`;
CREATE TABLE IF NOT EXISTS `tbl_appointment` (
  `apoint_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `make` varchar(200) DEFAULT NULL,
  `mileage` decimal(4,0) DEFAULT NULL,
  `year` varchar(200) DEFAULT NULL,
  `adate` varchar(200) DEFAULT NULL,
  `atime` varchar(200) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `services` varchar(200) DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `bookingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(250) DEFAULT NULL,
  `status2` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status3` int(10) NOT NULL,
  `paymentM` varchar(250) DEFAULT NULL,
  `refno` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`apoint_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`apoint_id`, `email`, `username`, `make`, `mileage`, `year`, `adate`, `atime`, `model`, `services`, `comments`, `bookingdate`, `CancelledBy`, `status`, `UpdationDate`, `name`, `status2`, `cost`, `status3`, `paymentM`, `refno`) VALUES
(19, 'scola@gmail.com', 'scola ', 'BMW', '450', '2017', '2021-12-08', '03:00 - 04:00 PM', 'CX3', 'Engine Diagnostics,Oil, Lube & Filters,Engine Overhaul', 'slsl,s,s,s,s,s', '2021-12-07 07:38:20', NULL, 1, '2021-12-07 07:42:53', 'Noobie', 1, 45670, 1, 'mpesa', 'KLMPLT2TEN120'),
(20, 'ben@gmail.com', 'ben ', 'Toyota', '450', '2019', '2021-12-09', '08:00 - 09:00 AM', 'mazda', 'Air conditioning,Heating & Cooling ,Engine Diagnostics,Oil, Lube & Filters,Brakes Repair,Engine Overhaul,Door Repair,Car Keys Repair', 'good\r\n', '2021-12-09 08:01:28', NULL, 1, '2021-12-09 08:05:21', 'Noobie', 1, 75600, 1, 'cash', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autospare`
--

DROP TABLE IF EXISTS `tbl_autospare`;
CREATE TABLE IF NOT EXISTS `tbl_autospare` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `partno` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `kondation` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `warranty` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_autospare`
--

INSERT INTO `tbl_autospare` (`sp_id`, `partno`, `price`, `kondation`, `name`, `brand`, `warranty`, `image`) VALUES
(1, 99878, 4600, 'old', 'ENGINE OIL FILTER', 'Bosch', '7months', '5ff17a957965e8.07584851.jpg'),
(2, 698784, 6700, 'new', 'BMW OIL FILTER', 'Bosch', '6months', '5fe2eca355df84.64806616.jpg'),
(3, 56783, 8900, 'old', 'AUDI FRONT HEADLIGHT', 'audi', '1month', '5fe2ed0ec7d9b5.29593423.jpg'),
(4, 78967, 6420, 'new', 'TOYOTA  AC COMPRESSER', 'croxt', '1 year', '5fe2ed992240e6.78581210.jpg'),
(5, 45632, 17000, 'new', 'SUBARU BRAKE ROTORS DISC', 'fade', '3months', '5fe2ede3299eb8.31618265.jpg'),
(6, 789905, 450000, 'new', 'AUDI ENGINE 2014', 'audi', '1 year', '5fe2ee29a247b8.46784151.png'),
(7, 77890, 38000, 'new', 'BMW Sports RIM', 'Bosch', '9months', '5fe2eee04142f0.28720569.jpg'),
(8, 909087, 5000, 'new', 'Mercedes Ignition Coils', ' Genuine Mercedes', '6months', '5fe2f3cb438bc2.83737986.jpg'),
(9, 90809, 8000, 'new', 'BMW Steering Wheel', 'BMW', '3months', '5fe2f4d46f52f8.08100579.jpg'),
(10, 90809, 8000, 'old', 'BMW Steering Wheel', 'BMW', '3months', '600428564fdd10.51284731.jpg'),
(11, 9999, 4590, 'new', 'ERTWR', 'croxt', '6months', '5ff177af67fc81.75081189.jpg'),
(12, 78967, 6700, 'new', 'WROYTUIOFG', 'otyroo', '1 year', '5ff17aea1a9323.38816083.jpg'),
(13, 0, 2334, 'new', 'wwe', 'wwww', 'wwww', '61457c7b10e290.21175129.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

DROP TABLE IF EXISTS `tbl_enquiry`;
CREATE TABLE IF NOT EXISTS `tbl_enquiry` (
  `enq_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`enq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`enq_id`, `name`, `email`, `mobile`, `subject`, `message`, `date`, `status`) VALUES
(1, 'eliphas', 'eliphasmwenda18@gmail.com', '0797340200', 'test test', 'test test', '2021-01-22 22:49:03.786', 1),
(2, 'kevoo', 'kevoo@gmail.com', '0711456788', 'testing', 'demo demo ', '2021-01-23 08:34:58.346', 1),
(3, 'mum', 'mum@gmail.com', '0797340200', 'test test', 'demo demo demo', '2021-01-23 08:36:35.883', 0),
(4, 'mum', 'mum@gmail.com', '0729044466', 'test test', 'demo demo', '2021-01-24 12:12:33.252', 0),
(5, 'Dennis', 'dennis@gmail.com', '0704445675', 'test test', 'demo demo demodemo demo demo demo demo demo', '2021-01-24 13:09:04.692', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mechanic`
--

DROP TABLE IF EXISTS `tbl_mechanic`;
CREATE TABLE IF NOT EXISTS `tbl_mechanic` (
  `mec_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `specialist` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`mec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mechanic`
--

INSERT INTO `tbl_mechanic` (`mec_id`, `name`, `email`, `phone`, `specialist`, `experience`, `password`) VALUES
(1, 'Dennis', 'demo@gmail.com', '0797340200', 'Automotive Brake Specialist', '9', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'job', 'job@gmail.com', '0748646681', 'Automotive Repairer', '5', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'Scola', 'scolamwikali18@gmail.com', '0748646681', 'Expert Mechanic', '6', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'Noobie', 'noobie@gmail.com', '0797340200', 'Automobile Engineer', '9', '$5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'kimunyu', 'kimunyu@gmail.com', '0799030504', 'mechanic', '3 years', '$2y$10$sSyGa/3Ap8boo812PpYtKOZkgKClsxyY3mPou6sj/WvLpR2wk8gUy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

DROP TABLE IF EXISTS `tbl_services`;
CREATE TABLE IF NOT EXISTS `tbl_services` (
  `sev_id` int(11) NOT NULL AUTO_INCREMENT,
  `mec_id` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `apoint_id` varchar(250) DEFAULT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`sev_id`, `mec_id`, `status`, `apoint_id`, `postingdate`) VALUES
(1, '1', NULL, '1', '2020-12-19 14:24:55'),
(2, '1', NULL, '1', '2020-12-19 14:25:38'),
(3, '1', NULL, '1', '2020-12-19 14:26:50'),
(4, '1', NULL, '1', '2020-12-19 14:29:53'),
(5, '1', 1, '1', '2020-12-19 14:43:54'),
(6, '4', 1, '6', '2020-12-20 11:29:28'),
(7, '3', 1, '8', '2020-12-20 11:35:42'),
(8, '2', 1, '6', '2020-12-21 09:00:15'),
(9, '0', 1, '2', '2020-12-21 09:09:46'),
(10, '2', 1, '1', '2020-12-21 09:47:41'),
(11, '0', 1, '8', '2020-12-21 09:48:08'),
(12, '0', 1, '9', '2020-12-21 10:03:52'),
(13, '0', 1, '10', '2020-12-21 10:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribers`
--

DROP TABLE IF EXISTS `tbl_subscribers`;
CREATE TABLE IF NOT EXISTS `tbl_subscribers` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subscribers`
--

INSERT INTO `tbl_subscribers` (`sub_id`, `email`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisor`
--

DROP TABLE IF EXISTS `tbl_supervisor`;
CREATE TABLE IF NOT EXISTS `tbl_supervisor` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supervisor`
--

INSERT INTO `tbl_supervisor` (`sup_id`, `username`, `email`, `password`) VALUES
(1, 'humor', 'humor@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'Nesh', 'Nesh@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonies`
--

DROP TABLE IF EXISTS `tbl_testimonies`;
CREATE TABLE IF NOT EXISTS `tbl_testimonies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `testimonial` mediumtext NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_testimonies`
--

INSERT INTO `tbl_testimonies` (`id`, `email`, `testimonial`, `postingdate`, `status`) VALUES
(7, 'scola@gmail.com', 'your services were the best ever, thank you?', '2022-09-26 05:57:34', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(250) NOT NULL,
  `regdate` timestamp(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3) ON UPDATE CURRENT_TIMESTAMP(3),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `email`, `password`, `regdate`, `UpdationDate`) VALUES
(33, 'scola', 'scola@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-12-07 07:34:47.201', NULL),
(34, 'ben', 'ben@gmail.com', '$5f4dcc3b5aa765d61d8327deb882cf99', '2021-12-09 07:59:46.748', NULL),
(35, 'mary', 'mburumarywanjiru@gmail.com', '$2y$10$Ip0pz38tvOMExD36HyljD.Jb6ZDaRSeznrdrn0gCmKDIboVXnglPC', '2022-09-19 08:06:53.340', NULL),
(36, 'Flier', 'flier@gmail.com', '$2y$10$O6mD2FChyar3jqOF9tOZA.sSDnz0hx8hxYiwiUXjyaY.Auw5fjtmS', '2022-09-19 08:10:28.238', NULL),
(37, 'keith', 'keith@gmail.com', '$2y$10$04Pvvwf/.1hy2PTCweqKO.Mwm3Cnvlcq3EyEIYVGwnupoW8uWqFsC', '2022-09-19 10:40:39.203', NULL),
(38, 'ann', 'ann@gmail.com', '$2y$10$2TWOTpYXFfyIqzBmmQfPyOTG.PX8dQiOcV869.PUmqH5JVYrk935e', '2022-09-19 10:41:43.926', NULL),
(39, 'keremi', 'keremi@gmail.com', '$2y$10$mpLGYbezt2w5xVoTAPs05u7Ior3ItacWeXU2lyffDuWLY0wIv4mFi', '2022-09-19 10:43:26.239', NULL),
(40, 'patrick', 'patrick@gmail.com', '$2y$10$nEpFCnupQMM3dR8Zk5VsL.hZWtnhIgp2ngcEsFFp4YQkjWTeaADoa', '2022-09-19 10:43:56.469', NULL),
(41, 'kimunyu', 'kimunyu@gmail.com', '$2y$10$/FLRCI201WLG/yz.gzgfWeaTAF3WHO.yGYjBSedT2Hsc3LpsJOtUu', '2022-09-20 04:20:16.903', NULL),
(42, 'gichure', 'gichure@gmail.com', '$2y$10$iaKtb7LJ87YMNKc0rAueauM/0B49tfFWjVV6WgjvvC0pWOFVTJJZO', '2022-09-23 06:07:17.605', NULL),
(43, 'xavier', 'xavier@gmail.com', '$2y$10$1ZX8N.i78qzVxldJ3qRZWeDBtenOB.Of4hFyXnmxdICYIUOftRcgC', '2022-09-26 01:39:06.187', NULL),
(44, 'xavier', 'xavier@gmail.com', '$2y$10$bYzcewYvYJJV3fo3Z6peFOGwJwr.SdP714BZLUvazVP2tTX3cd/OO', '2022-09-26 01:39:06.197', NULL),
(45, 'xavier', 'xavier@gmail.com', '$2y$10$pl7JfAb0AIb56YKQ5w6WuOOvpQxFlccivaqmPYyOzlLddMfK.JyKW', '2022-09-26 01:39:06.188', NULL),
(46, 'purity', 'purity@gmail.com', '$2y$10$VfKdd/qYsROllor2.MPceOQTL08TUyYMiFwXTrzLXtyq3qiFr8sRq', '2022-09-26 01:39:53.031', NULL),
(47, '', 'beth@gmail.com', '$2y$10$I/SBlEnZkJT1InTZ0Mua/OkXsCyEfjsOL83Wbpihv8Sb.R6x2.OH.', '2022-09-26 06:14:34.695', '2022-09-26 06:14:34'),
(48, 'wanjiku', 'wanjiku@gmail.com', '$2y$10$FBhvYBVJd2Mpdd2.p7V96OES0ND7Cd8ybVa5Qs5q6RyhQGamOFBQe', '2022-09-26 11:00:40.231', NULL),
(49, 'wanjeri', 'wanjeri@gmail.com', '$2y$10$JEkMtTOysZ0OMWJC9qVjNen5oMGfyHyjNIEX6VPQes1x48ET7oATC', '2022-10-05 02:38:38.916', NULL),
(50, 'muchina', 'muchina@gmail.com', '$2y$10$N1W/t.HMk4icbUN1hceWE.H0zgzIkWgOhabBr5bLon1sxj736gkXe', '2022-10-05 04:48:20.627', NULL),
(51, 'mercy', 'mercy@gmail.com', '$2y$10$Gzwwn6assyIu2dWBhwSdKeK8IC4I6mhTtRpb1no/F70ELq7eXMEkG', '2022-11-03 07:27:52.847', NULL),
(52, 'mercy', 'mercy@gmail.com', '$2y$10$1t2UIm.Yj0y/zfwLZHbu3OjGGWWJ9kYc4D2G.dt/6PWGXgT04GZa2', '2022-11-03 07:27:53.043', NULL),
(53, 'flier', 'flier@mail.com', '$2y$10$k.3or6AVpyB5E6.jZksG/eJ14ArwadFkPZa4MubEUy4S7hFgPl/NC', '2022-11-05 09:46:35.394', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'eliphas', 'eliphasmwenda18@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'mum', 'mum@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_reg`
--

DROP TABLE IF EXISTS `vehicle_reg`;
CREATE TABLE IF NOT EXISTS `vehicle_reg` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type` varchar(200) NOT NULL,
  `vehicle_model` varchar(200) NOT NULL,
  `year_of_registration` varchar(200) NOT NULL,
  `Time_of_Registration` varchar(100) NOT NULL,
  `Date_of_Registration` datetime NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_reg`
--

INSERT INTO `vehicle_reg` (`vehicle_id`, `vehicle_type`, `vehicle_model`, `year_of_registration`, `Time_of_Registration`, `Date_of_Registration`) VALUES
(1, 'Audi', 'harrier', '2020', '09:00 - 10:00 AM', '2022-10-01 00:00:00'),
(2, 'Mitsubishi', 'hjkl;', '2015', '09:00 - 10:00 AM', '2022-10-07 00:00:00'),
(3, 'Mitsubishi', 'harrier', '2017', '10:00 - 11:00 AM', '2022-10-01 00:00:00'),
(4, 'Isuzu', 'crvwtwye', '2013', '02:00 - 03:00 PM', '2022-10-08 00:00:00'),
(5, 'Mitsubishi', 'harrier', '2017', '03:00 - 04:00 PM', '2022-10-27 00:00:00'),
(6, 'Mitsubishi', 'harrier', '2019', '10:00 - 11:00 AM', '2022-10-20 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
