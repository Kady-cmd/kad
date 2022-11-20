-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 20, 2022 at 02:09 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `admin_audit_logs`
--

CREATE TABLE `admin_audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `action_made` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_audit_logs`
--

INSERT INTO `admin_audit_logs` (`id`, `user_id`, `action_made`, `date_created`) VALUES
(1, 1, 'Logged into the system', '2022-11-17 19:49:34'),
(2, 1, 'Deleted question - Question 1', '2022-11-17 20:16:10'),
(3, 1, 'Updated question - Question 3', '2022-11-17 20:31:44'),
(4, 1, 'Logged out of the system', '2022-11-17 20:31:58'),
(5, 1, 'Logged into the system', '2022-11-17 20:33:30'),
(6, 1, 'Logged out of the system', '2022-11-17 20:49:48'),
(7, 1, 'Logged into the system', '2022-11-17 21:43:55'),
(8, 1, 'Logged into the system', '2022-11-19 09:35:00'),
(9, 1, 'Logged into the system', '2022-11-19 10:04:38'),
(10, 1, 'Created a new unit - ADVANCED PROGRAMMING', '2022-11-19 10:05:04'),
(11, 1, 'Logged into the system', '2022-11-19 10:06:48'),
(12, 1, 'Logged out of the system', '2022-11-19 10:06:52'),
(13, 1, 'Logged into the system', '2022-11-19 10:06:54'),
(14, 1, 'Logged into the system', '2022-11-19 10:07:37'),
(15, 1, 'Created a new unit - ADVANCED PROGRAMMING', '2022-11-19 10:07:57'),
(16, 1, 'Created a new unit - TEST UNIT NAME', '2022-11-19 10:13:25'),
(17, 1, 'Deleted unit - UPDATED UNIT NAME', '2022-11-19 10:52:04'),
(18, 1, 'Created a new exam - Essentials of Advanced Programming', '2022-11-19 12:00:47'),
(19, 1, 'Created a new unit - TEST UNIT', '2022-11-19 12:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(1000) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`cou_id`, `cou_name`, `cou_created`) VALUES
(25, 'BSHRM', '2019-11-27 09:26:08'),
(26, 'BSCRIM UPDATED', '2022-11-15 16:31:57'),
(66, 'B.SC. INFORMATION TECHNOLOGY', '2022-10-16 10:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `examinee_audit_logs`
--

CREATE TABLE `examinee_audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `action_made` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examinee_audit_logs`
--

INSERT INTO `examinee_audit_logs` (`id`, `user_id`, `action_made`, `date_created`) VALUES
(1, 9, 'Logged into the system', '2022-11-17 21:26:14'),
(2, 9, 'Logged out of the system', '2022-11-17 21:28:44'),
(3, 9, 'Logged into the system', '2022-11-17 21:28:56'),
(4, 9, 'Logged out of the system', '2022-11-17 21:29:36'),
(5, 8, 'Logged into the system', '2022-11-17 21:30:08'),
(6, 8, 'New exam attempt - Communication Skills', '2022-11-17 21:39:28'),
(7, 8, 'New feedback submitted', '2022-11-17 21:43:31'),
(8, 8, 'Logged out of the system', '2022-11-17 21:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `examinee_tbl`
--

CREATE TABLE `examinee_tbl` (
  `exmne_id` int(11) NOT NULL,
  `exmne_fullname` varchar(1000) NOT NULL,
  `exmne_course` varchar(1000) NOT NULL,
  `exmne_gender` varchar(1000) NOT NULL,
  `exmne_birthdate` varchar(1000) NOT NULL,
  `exmne_year_level` varchar(1000) NOT NULL,
  `exmne_email` varchar(1000) NOT NULL,
  `exmne_password` varchar(1000) NOT NULL,
  `exmne_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examinee_tbl`
--

INSERT INTO `examinee_tbl` (`exmne_id`, `exmne_fullname`, `exmne_course`, `exmne_gender`, `exmne_birthdate`, `exmne_year_level`, `exmne_email`, `exmne_password`, `exmne_status`) VALUES
(5, 'Jane Rivera', '25', 'female', '2019-11-14', 'second year', 'jane@gmail.com', 'jane', 'active'),
(6, 'Glenn Duerme', '26', 'female', '2019-12-24', 'third year', 'glenn@gmail.com', 'glenn', 'active'),
(7, 'Maria Duerme', '26', 'female', '2018-11-25', 'second year', 'maria@gmail.com', 'maria', 'active'),
(8, 'Dave Limasac', '66', 'female', '2019-12-21', 'second year', 'dave@gmail.com', 'dave', 'active'),
(9, 'JKUAT Student', '66', 'male', '2022-10-05', 'second year', 'jkuat@gmail.com', 'password', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `exans_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `correct`, `exans_created`) VALUES
(295, 4, 12, 25, 'Diode, inverted, pointer', 'old', 0, '2019-12-07 02:52:14'),
(296, 4, 12, 16, 'Data Block', 'old', 0, '2019-12-07 02:52:14'),
(297, 6, 12, 18, 'Programmable Logic Controller', 'old', 0, '2019-12-05 12:59:47'),
(298, 6, 12, 9, '1850s', 'old', 0, '2019-12-05 12:59:47'),
(299, 6, 12, 24, '1976', 'old', 0, '2019-12-05 12:59:47'),
(300, 6, 12, 14, 'Operating System', 'old', 0, '2019-12-05 12:59:47'),
(301, 6, 12, 19, 'WAN (Wide Area Network)', 'old', 0, '2019-12-05 12:59:47'),
(302, 6, 11, 28, 'fds', 'new', 0, '2019-12-05 12:04:28'),
(303, 6, 11, 29, 'sd', 'new', 0, '2019-12-05 12:04:28'),
(304, 6, 12, 15, 'David Filo & Jerry Yang', 'new', 0, '2019-12-05 12:59:47'),
(305, 6, 12, 17, 'System file', 'new', 0, '2019-12-05 12:59:47'),
(306, 6, 12, 10, 'Field', 'new', 0, '2019-12-05 12:59:47'),
(307, 6, 12, 9, '1880s', 'new', 0, '2019-12-05 12:59:47'),
(308, 6, 12, 21, 'Temporary file', 'new', 0, '2019-12-05 12:59:47'),
(309, 4, 11, 28, 'q1', 'new', 0, '2019-12-05 13:30:21'),
(310, 4, 11, 29, 'dfg', 'new', 0, '2019-12-05 13:30:21'),
(311, 4, 12, 16, 'Data Block', 'new', 0, '2019-12-07 02:52:14'),
(312, 4, 12, 20, 'Plancks radiation', 'new', 0, '2019-12-07 02:52:14'),
(313, 4, 12, 10, 'Report', 'new', 0, '2019-12-07 02:52:14'),
(314, 4, 12, 24, '1976', 'new', 0, '2019-12-07 02:52:14'),
(315, 4, 12, 9, '1930s', 'new', 0, '2019-12-07 02:52:14'),
(316, 8, 12, 18, 'Programmable Lift Computer', 'new', 0, '2020-01-05 03:18:35'),
(317, 8, 12, 14, 'Operating System', 'new', 0, '2020-01-05 03:18:35'),
(318, 8, 12, 20, 'Einstein oscillation', 'new', 0, '2020-01-05 03:18:35'),
(319, 8, 12, 21, 'Temporary file', 'new', 0, '2020-01-05 03:18:35'),
(320, 8, 12, 25, 'Diode, inverted, pointer', 'new', 0, '2020-01-05 03:18:35'),
(341, 9, 16, 33, 'Customer relationship management (CRM) entails all aspects of interaction that a company has with its customer', 'new', 0, '2022-10-24 13:29:56'),
(342, 9, 16, 31, 'All of the mentioned', 'new', 0, '2022-10-24 13:29:56'),
(343, 9, 16, 38, 'Data Warehouse', 'new', 0, '2022-10-24 13:29:56'),
(344, 9, 16, 37, 'RDBMS', 'new', 0, '2022-10-24 13:29:56'),
(345, 9, 16, 35, 'Business Intelligence', 'new', 0, '2022-10-24 13:29:56'),
(346, 9, 16, 39, 'Personalization', 'new', 0, '2022-10-24 17:45:38'),
(347, 9, 16, 36, 'Answer for performance management tool', 'new', 0, '2022-10-25 05:56:29'),
(348, 9, 16, 32, 'All of the mentioned', 'new', 0, '2022-10-24 13:29:56'),
(349, 8, 15, 27, 'dsf', 'new', 0, '2022-11-17 18:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `exmne_id`, `exam_id`, `examat_status`) VALUES
(51, 6, 12, 'used'),
(52, 4, 11, 'used'),
(53, 4, 12, 'used'),
(54, 8, 12, 'used'),
(58, 9, 16, 'used'),
(59, 8, 15, 'used');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `question_type` int(11) NOT NULL DEFAULT '1',
  `exam_ch1` varchar(1000) DEFAULT NULL,
  `exam_ch2` varchar(1000) DEFAULT NULL,
  `exam_ch3` varchar(1000) DEFAULT NULL,
  `exam_ch4` varchar(1000) DEFAULT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question_tbl`
--

INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `question_type`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
(9, 12, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', 1, '1850s', '1880s', '1930s', '1950s', '1880s', 'active'),
(10, 12, 'What is part of a database that holds only one type of information?', 1, 'Report', 'Field', 'Record', 'File', 'Field', 'active'),
(14, 12, 'OS computer abbreviation usually means ?', 1, 'Order of Significance', 'Open Software', 'Operating System', 'Optical Sensor', 'Operating System', 'active'),
(15, 12, 'Who developed Yahoo?', 1, 'Dennis Ritchie & Ken Thompson', 'David Filo & Jerry Yang', 'Vint Cerf & Robert Kahn', 'Steve Case & Jeff Bezos', 'David Filo & Jerry Yang', 'active'),
(16, 12, 'DB computer abbreviation usually means ?', 1, 'Database', 'Double Byte', 'Data Block', 'Driver Boot', 'Database', 'active'),
(17, 12, '.INI extension refers usually to what kind of file?', 1, 'Image file', 'System file', 'Hypertext related file', 'Image Color Matching Profile file', 'System file', 'active'),
(18, 12, 'What does the term PLC stand for?', 1, 'Programmable Lift Computer', 'Program List Control', 'Programmable Logic Controller', 'Piezo Lamp Connector', 'Programmable Logic Controller', 'active'),
(19, 12, 'What do we call a network whose elements may be separated by some distance? It usually involves two or more small networks and dedicated high-speed telephone lines.', 1, 'URL (Universal Resource Locator)', 'LAN (Local Area Network)', 'WAN (Wide Area Network)', 'World Wide Web', 'WAN (Wide Area Network)', 'active'),
(20, 12, 'After the first photons of light are produced, which process is responsible for amplification of the light?', 1, 'Blackbody radiation', 'Stimulated emission', 'Plancks radiation', 'Einstein oscillation', 'Stimulated emission', 'active'),
(21, 12, '.TMP extension refers usually to what kind of file?', 1, 'Compressed Archive file', 'Image file', 'Temporary file', 'Audio file', 'Temporary file', 'active'),
(22, 12, 'What do we call a collection of two or more computers that are located within a limited distance of each other and that are connected to each other directly or indirectly?', 1, 'Inernet', 'Interanet', 'Local Area Network', 'Wide Area Network', 'Local Area Network', 'active'),
(24, 12, '	 In what year was the \"@\" chosen for its use in e-mail addresses?', 1, '1976', '1972', '1980', '1984', '1972', 'active'),
(25, 12, 'What are three types of lasers?', 1, 'Gas, metal vapor, rock', 'Pointer, diode, CD', 'Diode, inverted, pointer', 'Gas, solid state, diode', 'Gas, solid state, diode', 'active'),
(27, 15, 'asdasd', 1, 'dsf', 'sd', 'yui', 'sdf', 'yui', 'active'),
(29, 11, 'Question 2', 1, 'asd', 'sd', 'q2', 'dfg', 'q2', 'active'),
(30, 11, 'Updated Question 3', 1, 'sd', 'q3', 'asd', 'fgh', 'q3', 'active'),
(31, 16, 'Business intelligence (BI) is a broad category of application programs which includes', 1, 'Decision support', 'Data mining', 'OLAP', 'All of the mentioned', 'All of the mentioned', 'active'),
(32, 16, 'BI can catalyze a business’s success in terms of', 1, 'Distinguish the products and services that drive revenues', 'Rank customers and locations based on profitability', 'Ranks customers and locations based on probability', 'All of the mentioned', 'Ranks customers and locations based on probability', 'active'),
(33, 16, 'Point out the wrong statement', 1, 'Data is factual information for analysis', 'BI is a category of database software that provides an interface to help users quickly and interactively scrutinize the results in a variety of dimensions of the data', 'Customer relationship management (CRM) entails all aspects of interaction that a company has with its customer', 'None of the mentioned', 'BI is a category of database software that provides an interface to help users quickly and interactively scrutinize the results in a variety of dimensions of the data', 'active'),
(35, 16, 'What is BI in full?', 1, 'Business Intelligence', 'Business Intellect', 'Business Impression', 'Business Idea', 'Business Intelligence', 'active'),
(36, 16, 'What is a performance management tool that recapitulates an organization’s performance from several standpoints on a single page?', 2, '', '', '', '', 'Balanced Scorecard', 'active'),
(37, 16, 'Data warehouse architecture is based on', 1, 'RDBMS', 'Sybase', 'SQL Server', 'DBMS', 'RDBMS', 'active'),
(38, 16, 'Record cannot be updated in:', 1, 'Files', 'OLTP', 'RDBMS', 'Data Warehouse', 'Data Warehouse', 'active'),
(39, 16, 'In an Internet context, what is the practice of tailoring Web pages to individual users’ characteristics or preferences?', 2, '', '', '', '', 'Personalization', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_type` int(11) DEFAULT '1',
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`ex_id`, `cou_id`, `unit_id`, `ex_title`, `ex_type`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(11, 26, 1, 'Duerms', 1, '1', 2, 'qwe', '2022-11-19 08:49:47'),
(12, 26, 1, 'Another Exam', 1, '1', 5, 'Mabilisang Exam', '2022-11-19 08:49:50'),
(13, 26, 1, 'Exam Again', 1, '5', 0, 'again and again', '2022-11-19 08:49:52'),
(14, 66, 1, 'Fundamentals of Computer Security', 1, '60', 10, 'Comprehensive Description for Fundamentals of Computer Security', '2022-11-19 08:49:54'),
(15, 66, 1, 'Communication Skills', 1, '3', 5, 'Description for Communication Skills', '2022-11-19 08:49:56'),
(16, 66, 1, 'Business Intelligence', 3, '50', 10, 'Business Intelligence', '2022-11-19 08:49:58'),
(17, 66, 3, 'Essentials of Advanced Programming', 2, '40', 500, 'Essentials of Advanced Programming', '2022-11-19 09:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`fb_id`, `exmne_id`, `fb_exmne_as`, `fb_feedbacks`, `fb_date`) VALUES
(4, 6, 'Glenn Duerme', 'Gwapa kay Miss Pam', 'December 05, 2019'),
(5, 6, 'Anonymous', 'Lageh, idol na nako!', 'December 05, 2019'),
(6, 4, 'Rogz Nunezsss', 'Yes', 'December 08, 2019'),
(7, 4, '', '', 'December 08, 2019'),
(8, 4, '', '', 'December 08, 2019'),
(9, 8, 'Anonymous', 'dfsdf', 'January 05, 2020'),
(10, 8, 'Dave Limasac', 'Test feedback here', 'November 17, 2022'),
(11, 8, 'Dave Limasac', 'Test feedback here', 'November 17, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `unit_tbl`
--

CREATE TABLE `unit_tbl` (
  `unit_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `unit_code` varchar(1000) NOT NULL,
  `unit_name` varchar(1000) NOT NULL,
  `unit_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_tbl`
--

INSERT INTO `unit_tbl` (`unit_id`, `cou_id`, `unit_code`, `unit_name`, `unit_created`) VALUES
(1, 66, 'BIT 2210', 'ADVANCED PROGRAMMING', '2022-11-19 07:07:57'),
(3, 26, 'BTE 4843', 'TEST UNIT', '2022-11-19 09:16:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_audit_logs`
--
ALTER TABLE `admin_audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `examinee_audit_logs`
--
ALTER TABLE `examinee_audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  ADD PRIMARY KEY (`exmne_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indexes for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`);

--
-- Indexes for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_audit_logs`
--
ALTER TABLE `admin_audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `examinee_audit_logs`
--
ALTER TABLE `examinee_audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  MODIFY `exmne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_audit_logs`
--
ALTER TABLE `admin_audit_logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin_acc` (`admin_id`) ON DELETE CASCADE;

--
-- Constraints for table `examinee_audit_logs`
--
ALTER TABLE `examinee_audit_logs`
  ADD CONSTRAINT `examinee_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `examinee_tbl` (`exmne_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
