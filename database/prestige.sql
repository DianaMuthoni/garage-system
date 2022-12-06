-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 02:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
-- Table structure for table `tbl_admin`
--
USE prestige;

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'mary', 'mary@gmail.com', 'password');

-- --------------------------------------------------------

-- Table structure for table `client`

CREATE TABLE `client` ( 
  `client_id` int(11) NOT NULL,
  `firstName` varchar(11) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `client_email` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `id_number` varchar(250) NOT NULL,
  `date_of_repair` int(250) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `firstName`, `lastName`, `client_email`, `phone_number`, `id_number`, `date_of_repair` ) VALUES
(1, 'lizie', 'muthoni', 'lizie@gmail.com', '0712345678', '2345786', '01-05-2019');
-- --------------------------------------------------------



--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `apoint_id` int(11) NOT NULL,
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
  `bookingdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `CancelledBy` varchar(5) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(250) DEFAULT NULL,
  `status2` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status3` int(10) NOT NULL,
  `paymentM` varchar(250) DEFAULT NULL,
  `refno` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tbl_autospare` (
  `sp_id` int(11) NOT NULL,
  `partno` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `kondation` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `warranty` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tbl_enquiry` (
  `enq_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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


-- Table structure for table `repair_request`
--

CREATE TABLE `repair_request` (
  `repair_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `services` varchar(250) NOT NULL,
  `comments` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair_request`
--

INSERT INTO `repair_request` (`repair_id`,`email`, `services`, `comments`) VALUES
(1, 'lizie@gmail.com','heating', 'sample repair');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mechanic`
--

CREATE TABLE `tbl_mechanic` (
  `mec_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `specialist` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mechanic`
--

INSERT INTO `tbl_mechanic` (`mec_id`, `name`, `email`, `phone`, `specialist`, `experience`, `password`) VALUES
(1, 'Dennis', 'demo@gmail.com', '0797340200', 'Automotive Brake Specialist', '9', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'job', 'job@gmail.com', '0748646681', 'Automotive Repairer', '5', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'Scola', 'scolamwikali18@gmail.com', '0748646681', 'Expert Mechanic', '6', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'Noobie', 'noobie@gmail.com', '0797340200', 'Automobile Engineer', '9', '$5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------


-- Table structure for table `vehicle_reg`

--

CREATE TABLE `vehicle_reg` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_type` varchar(200) NOT NULL,
  `vehicle_model` varchar(200) NOT NULL,
  `year_of_registration` varchar(200) NOT NULL,
  `time_of_registration` varchar(200) NOT NULL,
  `date_of_registration` varchar(200) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 

-- Dumping data for table `vehicle_reg`
--

INSERT INTO `vehicle_reg` (`vehicle_id`, `vehicle_type`, `vehicle_model`, `year_of_registration`, `time_of_registration`, `date_of_registration`) VALUES
(1, 'Audi', 'harrier', '2019', '09:00-12:00PM', '12/05/2020');

-- --------------------------------------------------------
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `sev_id` int(11) NOT NULL,
  `mec_id` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `apoint_id` varchar(250) DEFAULT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tbl_subscribers` (
  `sub_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisor`
--

CREATE TABLE `tbl_supervisor` (
  `sup_id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tbl_testimonies` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `testimonial` mediumtext NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_testimonies`
--

INSERT INTO `tbl_testimonies` (`id`, `email`, `testimonial`, `postingdate`, `status`) VALUES
(7, 'scola@gmail.com', 'your services were the best ever, thank you?', '2021-12-07 07:47:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(250) NOT NULL,
  `regdate` timestamp(3) NOT NULL DEFAULT current_timestamp(3) ON UPDATE current_timestamp(3),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `email`, `password`, `regdate`, `UpdationDate`) VALUES
(33, 'scola', 'scola@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-12-07 07:34:47.201', NULL),
(34, 'ben', 'ben@gmail.com', '$5f4dcc3b5aa765d61d8327deb882cf99', '2021-12-09 07:59:46.748', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'eliphas', 'eliphasmwenda18@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'mum', 'mum@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--

-- Indexes for table `client`

--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

-- Indexes for table `vehicle_reg`

--
ALTER TABLE `vehicle_reg`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`apoint_id`);

--
-- Indexes for table `tbl_autospare`
--
ALTER TABLE `tbl_autospare`
  ADD PRIMARY KEY (`sp_id`);

--

-- Indexes for table `repair_request`
--
ALTER TABLE `repair_request`
  ADD PRIMARY KEY (`repair_id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `tbl_mechanic`
--
ALTER TABLE `tbl_mechanic`
  ADD PRIMARY KEY (`mec_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`sev_id`);

--
-- Indexes for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `tbl_testimonies`
--
ALTER TABLE `tbl_testimonies`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `apoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vehicle_reg`
--
ALTER TABLE `vehicle_reg`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `repair_request`
--
ALTER TABLE `repair_request`
  MODIFY `repair_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_autospare`
--
ALTER TABLE `tbl_autospare`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `enq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mechanic`
--
ALTER TABLE `tbl_mechanic`
  MODIFY `mec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `sev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_testimonies`
--
ALTER TABLE `tbl_testimonies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
