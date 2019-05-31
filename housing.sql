-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 07:19 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `log_in` varchar(50) NOT NULL,
  `log_out` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `user_id`, `log_in`, `log_out`) VALUES
(2, '4', '22/11/2015 08:46:13pm', '22/11/2015 08:46:43pm'),
(4, '4', '22/11/2015 08:49:27pm', '22/11/2015 08:52:36pm'),
(6, '5', '22/11/2015 08:52:43pm', '22/11/2015 08:53:19pm'),
(7, '5', '22/11/2015 08:53:24pm', '22/11/2015 08:58:24pm'),
(9, '1', '22/11/2015 08:58:28pm', ''),
(10, '2', '22/11/2015 08:58:50pm', '22/11/2015 09:00:24pm'),
(11, '6', '22/11/2015 09:00:33pm', ''),
(13, '2', '23/11/2015 05:03:26pm', ''),
(15, '6', '23/11/2015 08:41:10pm', '23/11/2015 08:41:13pm'),
(17, '5', '23/11/2015 10:09:15pm', '23/11/2015 10:09:21pm'),
(18, '5', '23/11/2015 10:09:15pm', ''),
(21, '7', '24/11/2015 09:27:02am', ''),
(22, '7', '24/11/2015 09:56:23am', '24/11/2015 10:13:37am'),
(24, '1', '24/11/2015 10:13:51am', ''),
(25, '1', '24/11/2015 10:53:33am', ''),
(26, '1', '24/11/2015 09:56:28pm', ''),
(27, '1', '24/11/2015 10:42:15pm', ''),
(28, '3', '25/11/2015 06:40:54am', '25/11/2015 06:48:46am'),
(29, '3', '25/11/2015 06:49:00am', '25/11/2015 07:02:32am'),
(30, '6', '25/11/2015 07:00:51am', '25/11/2015 07:10:27am'),
(31, '1', '25/11/2015 07:02:37am', ''),
(32, '8', '25/11/2015 07:11:32am', '25/11/2015 07:16:15am'),
(33, '5', '25/11/2015 07:16:34am', '');

-- --------------------------------------------------------

--
-- Table structure for table `all_transactions`
--

CREATE TABLE `all_transactions` (
  `transaction_id` int(11) NOT NULL,
  `service_id` varchar(100) NOT NULL,
  `tenant_id` varchar(11) NOT NULL,
  `property_id` varchar(10) NOT NULL,
  `unit_id` varchar(10) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `trans_status` varchar(100) NOT NULL,
  `trans_date` varchar(50) NOT NULL,
  `trans_nature` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_transactions`
--

INSERT INTO `all_transactions` (`transaction_id`, `service_id`, `tenant_id`, `property_id`, `unit_id`, `balance`, `trans_status`, `trans_date`, `trans_nature`) VALUES
(1, '', '1', '1', '1', '-2500', 'Overdue', '22/11/2015 08:45:17pm', 'New'),
(2, '1', '1', '1', '1', '-2000', 'Overdue', '22/11/2015 08:48:08pm', 'Cons'),
(3, '12', '1', '1', '1', '-1600', 'Overdue', '22/11/2015 08:48:08pm', 'Cons'),
(4, '16', '1', '1', '1', '-1500', 'Overdue', '22/11/2015 08:48:08pm', 'Cons'),
(5, '', '2', '3', '4', '-6000', 'Overdue', '23/11/2015 06:48:09pm', 'New'),
(6, '4', '2', '3', '4', '2000', 'Paid', '23/11/2015 06:48:52pm', 'Cons'),
(7, '', '3', '4', '5', '-6000', 'Overdue', '25/11/2015 07:07:36am', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `caretakers`
--

CREATE TABLE `caretakers` (
  `caretaker_id` int(11) NOT NULL,
  `caretaker_name` varchar(100) NOT NULL,
  `cnational_id` int(11) NOT NULL,
  `caretaker_residence` varchar(100) NOT NULL,
  `caretaker_county` varchar(100) NOT NULL,
  `caretaker_mobile` varchar(110) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caretakers`
--

INSERT INTO `caretakers` (`caretaker_id`, `caretaker_name`, `cnational_id`, `caretaker_residence`, `caretaker_county`, `caretaker_mobile`, `date`) VALUES
(1, 'james mwangi', 12155455, 'machakos', 'Machakos', '0700004444', '26/10/2015 10:07:24am'),
(2, 'philemon otieno', 26875945, 'machakos', 'Embu', '0789564556', '29/10/2015 07:17:09am'),
(3, 'julius kimathi', 25656589, 'mwingi', 'Kitui', '0755689565', '31/10/2015 10:55:43am'),
(4, 'yvonne wangari', 11256489, 'nyeri', 'Nyeri', '0725894562', '31/10/2015 10:56:23am'),
(5, 'david kosgei', 24568952, 'gilgil', 'Baringo', '0700254645', '02/11/2015 11:09:03am');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `co_id` int(11) NOT NULL,
  `co_name` varchar(100) NOT NULL,
  `co_reg` varchar(100) NOT NULL,
  `co_bank` varchar(100) NOT NULL,
  `co_account` varchar(100) NOT NULL,
  `co_status` varchar(100) NOT NULL,
  `co_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`co_id`, `co_name`, `co_reg`, `co_bank`, `co_account`, `co_status`, `co_date`) VALUES
(1, 'deserid inc', 'NHXD45677', 'barclays', '1011544111111', 'Active', '09/11/2015 02:14:55pm'),
(2, 'i-trace holdings', 'THETG678', 'cooperative', '45416516516', 'Active', '10/11/2015 06:39:24am');

-- --------------------------------------------------------

--
-- Table structure for table `income_expense`
--

CREATE TABLE `income_expense` (
  `ref_id` int(11) NOT NULL,
  `ie_date` varchar(100) NOT NULL,
  `income` varchar(50) NOT NULL,
  `inc_amount` varchar(50) NOT NULL,
  `expense` varchar(50) NOT NULL,
  `exp_amount` varchar(50) NOT NULL,
  `property_id` varchar(50) NOT NULL,
  `unit_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_expense`
--

INSERT INTO `income_expense` (`ref_id`, `ie_date`, `income`, `inc_amount`, `expense`, `exp_amount`, `property_id`, `unit_id`) VALUES
(1, '22/11/2015 08:48:08pm', 'Rent(Rec-100)', '500', '-', '-', '1', '1'),
(2, '22/11/2015 08:48:08pm', 'Rent(Rec-101)', '400', '-', '-', '1', '1'),
(3, '22/11/2015 08:48:08pm', 'Rent(Rec-102)', '100', '-', '-', '1', '1'),
(4, '22/11/2015 08:57:40pm', '-', '-', 'Workorder(ID-1)', '1000', '1', '1'),
(5, '23/11/2015 06:48:52pm', 'Rent(Rec-103)', '8000', '-', '-', '3', '4'),
(6, '25/11/2015 07:17:18am', '-', '-', 'Workorder(ID-4)', '5000', '4', '5');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `onational_id` int(11) NOT NULL,
  `owner_residence` varchar(100) NOT NULL,
  `owner_county` varchar(100) NOT NULL,
  `owner_mobile` varchar(110) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owner_id`, `owner_name`, `onational_id`, `owner_residence`, `owner_county`, `owner_mobile`, `date`) VALUES
(1, 'jonah kimani murugi', 2978956, 'kijabe', 'Kiambu', '0729313894', '26/10/2015 10:07:30am'),
(2, 'faith wangari', 31256894, 'nairobi', 'Nairobi', '0795866544', '31/10/2015 10:57:06am'),
(3, 'ann kimani', 11125645, 'lari', 'Kiambu', '072515356', '02/11/2015 11:09:49am'),
(4, 'meshack gathondu', 29732015, 'subukia', ' Nakuru', '0715199400', '03/11/2015 12:28:06pm'),
(5, 'ben kip', 28955444, 'nandi', 'Baringo', '0729565555', '08/11/2015 01:31:47pm');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `storeys` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `caretaker_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `property_name`, `storeys`, `units`, `owner_id`, `caretaker_id`, `location`, `county`, `date`) VALUES
(1, 'tinasa enterprises', 1, 20, 1, 1, 'kwa vonza', 'Kitui', '26/10/2015 10:07:58am'),
(2, 'shamarc lodgings', 5, 50, 1, 2, 'kitui', 'Kisumu', '29/10/2015 07:17:55am'),
(3, 'villa lodge', 2, 11, 2, 2, 'westlands', 'Nairobi', '31/10/2015 10:58:19am'),
(4, 'diaspora', 0, 45, 2, 1, 'kwa vonza', 'Kitui', '31/10/2015 11:00:05am');

-- --------------------------------------------------------

--
-- Table structure for table `rent_manager`
--

CREATE TABLE `rent_manager` (
  `rentmanager_id` int(11) NOT NULL,
  `tenant_id` varchar(10) NOT NULL,
  `last_payment` varchar(10) NOT NULL,
  `date_last` varchar(10) NOT NULL,
  `rent_status` varchar(50) NOT NULL,
  `balance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_transactions`
--

CREATE TABLE `service_transactions` (
  `service_id` int(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_transactions`
--

INSERT INTO `service_transactions` (`service_id`, `receipt_no`, `provider`, `code`, `date`, `account`, `amount`) VALUES
(1, '100', 'Safaricom', 'JJL9AY6X8N', '21-10-15 11:31', '123456', '500'),
(2, '', 'Safaricom', 'JJL6AY2Y9W', '21-10-15 11:16', '123457', '7000'),
(3, '', 'Safaricom', 'JJL6AX37OE', '21-10-15 09:07', '123458', '1000'),
(4, '103', 'Safaricom', 'JJK2AP5OHQ', '20-10-15 08:20', '123459', '8000'),
(5, '', 'Safaricom', 'JJJ1ANPJ95', '19-10-15 20:31', '123460', '45000'),
(6, '', 'Safaricom', 'JJJ0AJ2N3S', '19-10-15 11:57', '123461', '5000'),
(7, '', 'Safaricom', 'JJJ7AH6Q0X', '19-10-15 07:55', '123462', '5000'),
(8, '', 'Safaricom', 'JJJ6AH2V1U', '19-10-15 07:35', '123463', '5000'),
(9, '', 'Safaricom', 'JJI3AGC1Y5', '18-10-15 21:39', '123464', '5000'),
(10, '', 'Safaricom', 'JJI7AFLF7J', '18-10-15 19:54', '123465', '5000'),
(11, '', 'Safaricom', 'JJH0A3FNVI', '17-10-15 10:44', '123465', '5000'),
(12, '101', 'Safaricom', 'JJG4A17TBQ', '16-10-15 21:57', '123456', '400'),
(13, '', 'Safaricom', 'JJG6A145I8', '16-10-15 21:37', '123457', '5000'),
(14, '', 'Safaricom', 'JJF39QJQF3', '15-10-15 17:52', '123460', '5000'),
(15, '', 'Safaricom', 'JJE79GGA15', '14-10-15 13:10', '123463', '5000'),
(16, '102', 'Safaricom', 'JJD0981F3E', '13-10-15 11:46', '123456', '100'),
(17, '', 'Safaricom', 'JJD297UO9S', '13-10-15 11:22', '123461', '5000'),
(18, '', 'Safaricom', 'JJD99764AX', '13-10-15 09:55', '123463', '5000'),
(19, '', 'Safaricom', 'JJ828335PI', '08-10-15 06:52', '123463', '9800');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `tenant_id` int(11) NOT NULL,
  `tenant_name` varchar(100) NOT NULL,
  `tnational_id` int(11) NOT NULL,
  `tenant_address` varchar(100) NOT NULL,
  `tenant_mobile` varchar(100) NOT NULL,
  `tenant_county` varchar(100) NOT NULL,
  `property_id` varchar(100) NOT NULL,
  `unit_id` varchar(11) NOT NULL,
  `lease_status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`tenant_id`, `tenant_name`, `tnational_id`, `tenant_address`, `tenant_mobile`, `tenant_county`, `property_id`, `unit_id`, `lease_status`, `date`, `user`) VALUES
(1, 'jon kim', 21074545, '90-kinangop', '0729313894', 'Nyandarua', '1', '1', 'Active', '22/11/2015 08:45:17pm', '29'),
(2, 'faith james', 10101010, '56-karatina', '0711515151', 'Nyeri', '3', '4', 'Active', '23/11/2015 06:48:09pm', '1'),
(3, 'samson yegon', 23232323, '12-nandi', '0703948858', 'Nandi', '4', '5', 'Pending', '25/11/2015 07:07:36am', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_issues`
--

CREATE TABLE `tenant_issues` (
  `issue_id` int(11) NOT NULL,
  `tenant_id` varchar(10) NOT NULL,
  `unit_id` varchar(10) NOT NULL,
  `issue` varchar(1000) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date_raised` varchar(100) NOT NULL,
  `issue_status` varchar(100) NOT NULL,
  `approval_date` varchar(50) NOT NULL,
  `workorder_info` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_issues`
--

INSERT INTO `tenant_issues` (`issue_id`, `tenant_id`, `unit_id`, `issue`, `category`, `date_raised`, `issue_status`, `approval_date`, `workorder_info`) VALUES
(1, '1', '1', 'brocken window', 'maintanance', '22/11/2015 08:50:28pm', 'Approved', '22/11/2015 08:56:26pm', 'Passed'),
(2, '2', '4', 'leaking roof', 'maintanance', '24/11/2015 09:27:25am', 'Pending', '', ''),
(3, '2', '4', 'noisy neighbor', 'complaint', '24/11/2015 09:56:48am', 'Pending', '', ''),
(4, '3', '5', 'blocked sewer', 'maintanance', '25/11/2015 07:13:16am', 'Approved', '25/11/2015 07:16:44am', 'Passed');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_messages`
--

CREATE TABLE `tenant_messages` (
  `message_id` int(11) NOT NULL,
  `tenant_id` int(10) NOT NULL,
  `property_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `message_type` varchar(100) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `msg_date` varchar(50) NOT NULL,
  `priority` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_messages`
--

INSERT INTO `tenant_messages` (`message_id`, `tenant_id`, `property_id`, `unit_id`, `message_type`, `message`, `msg_date`, `priority`) VALUES
(1, 1, 1, 1, 'Welcome', 'Thankyou for choosing us.Please pay Ksh.2500 using your phone to <b>Paybill Number 15158</b>  and <b>Paybill Account No.123456</b>.  so as  to activate lease.', '22/11/2015 08:45:17pm', 'Normal'),
(2, 1, 1, 1, 'Rent', 'Receipt No.100.Rent of Ksh.500.Received Successfully on 21-10-15 11:31.Current Overpayments/Arrears(-) are Ksh.-2000', '22/11/2015 08:48:08pm', 'Normal'),
(3, 1, 1, 1, 'Rent', 'Receipt No.101.Rent of Ksh.400.Received Successfully on 16-10-15 21:57.Current Overpayments/Arrears(-) are Ksh.-1600', '22/11/2015 08:48:08pm', 'Normal'),
(4, 1, 1, 1, 'Rent', 'Receipt No.102.Rent of Ksh.100.Received Successfully on 13-10-15 11:46.Current Overpayments/Arrears(-) are Ksh.-1500', '22/11/2015 08:48:08pm', 'Normal'),
(5, 2, 3, 4, 'Welcome', 'Thankyou for choosing us.Please pay Ksh.6000 using your phone to <b>Paybill Number 15158</b>  and <b>Paybill Account No.123459</b>.  so as  to activate lease.', '23/11/2015 06:48:09pm', 'Normal'),
(6, 2, 3, 4, 'Rent', 'Receipt No.103.Rent of Ksh.8000.Received Successfully on 20-10-15 08:20.Current Overpayments/Arrears(-) are Ksh.2000', '23/11/2015 06:48:52pm', 'Normal'),
(7, 3, 4, 5, 'Welcome', 'Thankyou for choosing us.Please pay Ksh.6000 using your phone to <b>Paybill Number 15158</b>  and <b>Paybill Account No.123460</b>.  so as  to activate lease.', '25/11/2015 07:07:36am', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `unit_size` varchar(100) NOT NULL,
  `tenant_id` varchar(11) NOT NULL,
  `property_id` varchar(11) NOT NULL,
  `lipa_kodi` varchar(100) NOT NULL,
  `rent` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `unit_size`, `tenant_id`, `property_id`, `lipa_kodi`, `rent`, `status`, `date`) VALUES
(1, 'room-10', 'single', '1', '1', '123456', '2500', 'Occupied', '22/11/2015 08:36:57pm'),
(2, 'room-01', 'double', '', '1', '123457', '5000', 'Unoccupied', '22/11/2015 08:37:21pm'),
(3, 'villa-1', 'onebedroom', '', '3', '123458', '15000', 'Unoccupied', '22/11/2015 08:38:06pm'),
(4, 'villa-2', 'shop', '2', '3', '123459', '6000', 'Occupied', '22/11/2015 08:38:23pm'),
(5, 'tbh-1', 'single', '3', '4', '123460', '6000', 'Reserved', '22/11/2015 08:39:02pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unational_id` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unational_id`, `username`, `password`, `category`, `date_added`) VALUES
(1, '1000000', 'admin', 'admin', 'administrator', ''),
(2, '11125645', 'ann', 'ann', 'owner', ''),
(3, '26875945', 'phil', 'phil', 'caretaker', ''),
(4, '21074545', 'kim', 'kimani', 'tenant', '22/11/2015 08:46:05pm'),
(5, '12155455', 'jymo', 'jymo', 'caretaker', ''),
(6, '2978956', 'jon', 'jon', 'owner', ''),
(7, '10101010', 'fai', 'faifai', 'tenant', '24/11/2015 09:26:55am'),
(8, '23232323', 'yegon', '123456', 'tenant', '25/11/2015 07:11:01am');

-- --------------------------------------------------------

--
-- Table structure for table `workorders`
--

CREATE TABLE `workorders` (
  `work_id` int(11) NOT NULL,
  `issue_id` varchar(100) NOT NULL,
  `summary` varchar(100) NOT NULL,
  `date_opened` varchar(100) NOT NULL,
  `date_due` varchar(100) NOT NULL,
  `work_status` varchar(100) NOT NULL,
  `co_id` varchar(100) NOT NULL,
  `work_cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workorders`
--

INSERT INTO `workorders` (`work_id`, `issue_id`, `summary`, `date_opened`, `date_due`, `work_status`, `co_id`, `work_cost`) VALUES
(1, '1', 'replacing glass', '22/11/2015 08:57:40pm', '23/11/2015', 'Open', '1', '1000'),
(2, '4', 'unblock the sewer', '25/11/2015 07:17:18am', '28/11/2015', 'Open', '1', '5000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `all_transactions`
--
ALTER TABLE `all_transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `caretakers`
--
ALTER TABLE `caretakers`
  ADD PRIMARY KEY (`caretaker_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `income_expense`
--
ALTER TABLE `income_expense`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `rent_manager`
--
ALTER TABLE `rent_manager`
  ADD PRIMARY KEY (`rentmanager_id`);

--
-- Indexes for table `service_transactions`
--
ALTER TABLE `service_transactions`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`tenant_id`);

--
-- Indexes for table `tenant_issues`
--
ALTER TABLE `tenant_issues`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `tenant_messages`
--
ALTER TABLE `tenant_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workorders`
--
ALTER TABLE `workorders`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `all_transactions`
--
ALTER TABLE `all_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `caretakers`
--
ALTER TABLE `caretakers`
  MODIFY `caretaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `income_expense`
--
ALTER TABLE `income_expense`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rent_manager`
--
ALTER TABLE `rent_manager`
  MODIFY `rentmanager_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_transactions`
--
ALTER TABLE `service_transactions`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `tenant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tenant_issues`
--
ALTER TABLE `tenant_issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tenant_messages`
--
ALTER TABLE `tenant_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `workorders`
--
ALTER TABLE `workorders`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
