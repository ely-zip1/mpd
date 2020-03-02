-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 07:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diamond`
--

-- --------------------------------------------------------

--
-- Table structure for table `td_account_type`
--

CREATE TABLE `td_account_type` (
  `id` int(11) NOT NULL,
  `account_type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_account_type`
--

INSERT INTO `td_account_type` (`id`, `account_type`) VALUES
(1, 'administrator'),
(2, 'mere user'),
(3, 'root');

-- --------------------------------------------------------

--
-- Table structure for table `td_banks`
--

CREATE TABLE `td_banks` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_btc`
--

CREATE TABLE `td_btc` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_deposits`
--

CREATE TABLE `td_deposits` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `date_approved` datetime DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `deposit_options_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `is_pending` tinyint(1) NOT NULL,
  `is_expired` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_deposits`
--

INSERT INTO `td_deposits` (`id`, `member_id`, `date`, `date_approved`, `amount`, `deposit_options_id`, `package_id`, `is_pending`, `is_expired`) VALUES
(1697539212, 117, '2020-01-23 17:32:35', '2020-01-24 08:11:10', '50', 1, 1, 0, 0),
(1697539213, 112, '2020-01-24 00:49:24', '2020-01-24 08:11:13', '50', 1, 1, 0, 0),
(1697539214, 41, '2020-01-24 17:05:35', '2020-01-25 10:17:20', '5000', 1, 3, 0, 0),
(1697539215, 41, '2020-01-24 17:05:56', '2020-01-25 10:17:24', '5000', 1, 3, 0, 0),
(1697539216, 41, '2020-01-24 17:06:10', '2020-01-25 10:17:22', '5000', 1, 3, 0, 0),
(1697539217, 41, '2020-01-25 10:42:01', '2020-01-25 10:43:00', '5000', 1, 3, 0, 0),
(1697539218, 41, '2020-01-25 10:42:17', '2020-01-25 10:43:02', '5000', 1, 3, 0, 0),
(1697539219, 41, '2020-01-25 10:42:26', '2020-01-25 10:43:04', '5000', 1, 3, 0, 0),
(1697539220, 41, '2020-01-25 10:42:32', '2020-01-25 10:43:05', '5000', 1, 3, 0, 0),
(1697539221, 41, '2020-01-25 10:42:39', '2020-01-25 10:43:06', '5000', 1, 3, 0, 0),
(1697539222, 50, '2020-01-25 11:32:49', '2020-01-25 11:33:59', '100', 1, 1, 0, 0),
(1697539223, 126, '2020-01-25 11:40:29', '2020-01-25 11:45:45', '5000', 1, 3, 0, 0),
(1697539224, 126, '2020-01-25 11:40:41', '2020-01-25 11:45:47', '5000', 1, 3, 0, 0),
(1697539225, 126, '2020-01-25 11:40:52', '2020-01-25 11:45:49', '5000', 1, 3, 0, 0),
(1697539226, 126, '2020-01-25 11:41:08', '2020-01-25 11:45:50', '5000', 1, 3, 0, 0),
(1697539227, 126, '2020-01-25 11:41:23', '2020-01-25 11:45:53', '5000', 1, 3, 0, 0),
(1697539228, 126, '2020-01-25 11:41:28', '2020-01-25 11:45:54', '5000', 1, 3, 0, 0),
(1697539229, 126, '2020-01-25 11:41:34', '2020-01-25 11:45:56', '5000', 1, 3, 0, 0),
(1697539230, 126, '2020-01-25 11:41:45', '2020-01-25 11:45:58', '5000', 1, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `td_deposit_options`
--

CREATE TABLE `td_deposit_options` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `account` varchar(255) NOT NULL,
  `rule` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_deposit_options`
--

INSERT INTO `td_deposit_options` (`id`, `name`, `account`, `rule`) VALUES
(1, 'Bitcoin', '1MsR76wjdzqPV7KNHMBD2H1mVWoy5rdL8T', ''),
(2, 'Ethereum', '0x5658440dCE0482f0BB88Aad75D70f0E36cAe9bb3', ''),
(3, 'Bitcoin Cash', 'rjwkmu0n7sj2khj3dnk6ujlzjqkcnw7uqtgmef4ts', ''),
(4, 'GCash', '09677737515', 'minimim of P2,500 max P25,000'),
(5, 'Paypal', 'turkizoilphilippines@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `td_gcash`
--

CREATE TABLE `td_gcash` (
  `id` int(11) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `td_members`
--

CREATE TABLE `td_members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `referral_code_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `account_type_id` int(11) NOT NULL DEFAULT 2,
  `contact_number` varchar(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `source_of_income` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_members`
--

INSERT INTO `td_members` (`id`, `first_name`, `last_name`, `email_address`, `referral_code_id`, `date`, `password`, `country`, `account_type_id`, `contact_number`, `street`, `barangay`, `city`, `province`, `zipcode`, `source_of_income`) VALUES
(1, 'root', 'root', 'root@diamonds.com', 31, '2020-01-25 00:00:00', '123456', 'Philippines', 3, '09999999999', 'tip', 'cam', 'cdo', 'misor', 9000, 'Business'),
(2, 'El', 'La', 'elias@gmail.com', 1, '2020-01-25 15:43:45', '$2y$11$vU52lToGnt6xUW0ZJoOkteQ2cjk/MxtKUqJt9cCqEPtkmRzEjev7W', 'Philippines', 2, '45645641234', 'tip', 'cam', 'cag', 'mis', 9000, 'Business'),
(3, 'mpd', 'admin', 'admin@mpd.com', 2, '2020-01-27 07:22:50', '$2y$11$6JNNF32/Nh4d1trLXOtyt.kv8TnwsSsfd9695LRR/PlOZElD.gLLi', 'Philippines', 1, '09061231234', 'admin', 'admin', 'admin', 'admin', 9000, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `td_member_investments`
--

CREATE TABLE `td_member_investments` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `current_profit` decimal(65,0) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_packages`
--

CREATE TABLE `td_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `daily_rate` float NOT NULL,
  `minimum_amount` float NOT NULL,
  `maximum_amount` float NOT NULL,
  `duration_in_days` int(11) NOT NULL,
  `expected_profit` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_packages`
--

INSERT INTO `td_packages` (`id`, `package_name`, `daily_rate`, `minimum_amount`, `maximum_amount`, `duration_in_days`, `expected_profit`) VALUES
(1, 'Knight', 1.75, 2500, 24000, 60, '2100'),
(2, 'Tower', 2, 25000, 149000, 50, '23750'),
(3, 'Queen', 2.3, 150000, 1e16, 40, '144000');

-- --------------------------------------------------------

--
-- Table structure for table `td_referrals`
--

CREATE TABLE `td_referrals` (
  `id` int(11) NOT NULL,
  `referrer_id` int(11) NOT NULL,
  `referee_id` int(11) NOT NULL,
  `referral_bonus` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_referrals`
--

INSERT INTO `td_referrals` (`id`, `referrer_id`, `referee_id`, `referral_bonus`) VALUES
(98, 1, 2, '0'),
(99, 1, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `td_referral_bonus`
--

CREATE TABLE `td_referral_bonus` (
  `id` int(11) NOT NULL,
  `deposit_id` int(11) NOT NULL,
  `referrer_id` int(11) NOT NULL,
  `amount` decimal(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_referral_bonus`
--

INSERT INTO `td_referral_bonus` (`id`, `deposit_id`, `referrer_id`, `amount`) VALUES
(5, 1697539181, 39, '100.00000'),
(6, 1697539182, 39, '100.00000'),
(7, 1697539183, 44, '50.00000'),
(8, 1697539186, 44, '20.00000'),
(9, 1697539188, 39, '5.00000'),
(10, 1697539185, 42, '5.00000'),
(11, 1697539189, 39, '500.00000'),
(12, 1697539187, 39, '5.00000'),
(13, 1697539190, 39, '120.00000');

-- --------------------------------------------------------

--
-- Table structure for table `td_referral_codes`
--

CREATE TABLE `td_referral_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `is_taken` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_referral_codes`
--

INSERT INTO `td_referral_codes` (`id`, `code`, `is_taken`) VALUES
(1, 'o469dA', 1),
(2, '4RlyFb', 1),
(3, '1HnID2', 0),
(4, 'djl137', 0),
(5, 'Vhqeby', 0),
(6, '197YbT', 0),
(7, '5vXuRt', 0),
(8, 'DMgYh2', 0),
(9, 'hAMZor', 0),
(10, 'RSEhvP', 0),
(11, 'JXtPf5', 0),
(12, 'iSW6vB', 0),
(13, 'wsa2EB', 0),
(14, 'nS1sQT', 0),
(15, 'd2Enfp', 0),
(16, 'Og56jI', 0),
(17, 'WnFh5R', 0),
(18, '2YAzok', 0),
(19, '0jfsPX', 0),
(20, 'HxItLR', 0),
(21, '6N1jCp', 0),
(22, 'jfi08X', 0),
(23, '0XOo7D', 0),
(24, 'NVDhnI', 0),
(25, 'NfWUG2', 0),
(26, '87BRLe', 0),
(27, 'rX72iS', 0),
(28, 'p4zFdJ', 0),
(29, 'idsCTX', 0),
(30, 'a1muze', 0),
(31, '1NKOQ4', 0),
(32, 'fajL7Z', 0),
(33, 'braywF', 0),
(34, 'tN6Y2r', 0),
(35, '7q3jiZ', 0),
(36, 'iZl3Ur', 0),
(37, 'FC7lQh', 0),
(38, 'ZJbj4Y', 0),
(39, 'P9XnOM', 0),
(40, '8y7khu', 0),
(41, 'NUaGBj', 0),
(42, 'gLOCiA', 0),
(43, '1L5b2o', 0),
(44, 'bGIpcE', 0),
(45, 'Xz6a4S', 0),
(46, 'pYT3rm', 0),
(47, 'GBHQNr', 0),
(48, 'PZk0ys', 0),
(49, 'IwRcjk', 0),
(50, 'yYbTtI', 0),
(51, 'SXDiH2', 0),
(52, '6McJLs', 0),
(53, 'vEyjxw', 0),
(54, 'h61jvG', 0),
(55, 'bUF51Q', 0),
(56, 'i1Md9t', 0),
(57, 'a46Bfh', 0),
(58, 'gouwzx', 0),
(59, 'xHP0Kf', 0),
(60, 'kEGBga', 0),
(61, 'xzyFG5', 0),
(62, '4K2vTe', 0),
(63, 'mexL9H', 0),
(64, 'CXrVUd', 0),
(65, 'lvwzZ9', 0),
(66, '5aBwq3', 0),
(67, 'kh1lWV', 0),
(68, 'ubzCLD', 0),
(69, '7zUJOE', 0),
(70, 'eSu4po', 0),
(71, '26osud', 0),
(72, '4kU103', 0),
(73, 'zQSDGn', 0),
(74, 'sGoSuB', 0),
(75, 'fYmi1a', 0),
(76, 'sutECF', 0),
(77, 'CbdNG4', 0),
(78, 'x06Zug', 0),
(79, 'GyklKD', 0),
(80, 'SgVaWD', 0),
(81, '0wyjiA', 0),
(82, 'DRwhMi', 0),
(83, 'MzwsFH', 0),
(84, 'FGytfz', 0),
(85, 'enVJG4', 0),
(86, 'zyY8de', 0),
(87, 'wGgbl7', 0),
(88, 'bav16J', 0),
(89, 'rGWUX8', 0),
(90, 'HX7q0a', 0),
(91, 'nAS5Zr', 0),
(92, 'uNvyAw', 0),
(93, 'cd0zAN', 0),
(94, 'NjPU5A', 0),
(95, '3fdymu', 0),
(96, 'Wlb0vG', 0),
(97, 'EDLvrg', 0),
(98, '3Yg74M', 0),
(99, '7dO21I', 0),
(100, 'atP762', 0);

-- --------------------------------------------------------

--
-- Table structure for table `td_remittance`
--

CREATE TABLE `td_remittance` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `remittance_center` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `td_withdrawals`
--

CREATE TABLE `td_withdrawals` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `date_approved` datetime NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `is_pending` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_withdrawal_mode`
--

CREATE TABLE `td_withdrawal_mode` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_withdrawal_mode`
--

INSERT INTO `td_withdrawal_mode` (`id`, `description`) VALUES
(1, 'bitcoin'),
(2, 'gcash'),
(3, 'bank'),
(4, 'remittance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `td_account_type`
--
ALTER TABLE `td_account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_banks`
--
ALTER TABLE `td_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_btc`
--
ALTER TABLE `td_btc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_deposits`
--
ALTER TABLE `td_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_deposit_options`
--
ALTER TABLE `td_deposit_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_gcash`
--
ALTER TABLE `td_gcash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_members`
--
ALTER TABLE `td_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referral_code_id` (`referral_code_id`) USING BTREE;

--
-- Indexes for table `td_member_investments`
--
ALTER TABLE `td_member_investments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_packages`
--
ALTER TABLE `td_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_referrals`
--
ALTER TABLE `td_referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_referral_bonus`
--
ALTER TABLE `td_referral_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_referral_codes`
--
ALTER TABLE `td_referral_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `td_remittance`
--
ALTER TABLE `td_remittance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_withdrawals`
--
ALTER TABLE `td_withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_withdrawal_mode`
--
ALTER TABLE `td_withdrawal_mode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `td_account_type`
--
ALTER TABLE `td_account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `td_banks`
--
ALTER TABLE `td_banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `td_btc`
--
ALTER TABLE `td_btc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `td_deposits`
--
ALTER TABLE `td_deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1697539231;

--
-- AUTO_INCREMENT for table `td_deposit_options`
--
ALTER TABLE `td_deposit_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `td_gcash`
--
ALTER TABLE `td_gcash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `td_members`
--
ALTER TABLE `td_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `td_member_investments`
--
ALTER TABLE `td_member_investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_packages`
--
ALTER TABLE `td_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `td_referrals`
--
ALTER TABLE `td_referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `td_referral_bonus`
--
ALTER TABLE `td_referral_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `td_referral_codes`
--
ALTER TABLE `td_referral_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `td_remittance`
--
ALTER TABLE `td_remittance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_withdrawals`
--
ALTER TABLE `td_withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `td_withdrawal_mode`
--
ALTER TABLE `td_withdrawal_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
