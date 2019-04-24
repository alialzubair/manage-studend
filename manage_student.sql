-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 01:56 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_confirmation` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `email`, `username`, `password`, `password_confirmation`, `gender`) VALUES
(556456554, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(56563, 'efef', 'eff@yahoo.com', 'bfjbfj', '8b3c634880c63335a439fbc2b92a719b', '72721d34677af78ab5a3108ed491a48c', 'male'),
(253646, 'Rawan', 'rawan@yahoo.com', 'rawan 123', '252525252', '252525252', 'female'),
(254544545, 'ffffff', 'ff@yahoo.com', 'fffff', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_id` int(11) NOT NULL,
  `Appointment_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(200) NOT NULL,
  `studend_id` int(11) NOT NULL,
  `hull_id` int(11) DEFAULT NULL,
  `booking_time_start` time DEFAULT NULL,
  `booking_time_end` time DEFAULT NULL,
  `booking_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_id`, `Appointment_timestamp`, `message`, `studend_id`, `hull_id`, `booking_time_start`, `booking_time_end`, `booking_date`) VALUES
(17, '2019-04-24 23:44:23', 'good', 20150656, 32, '06:02:00', '20:58:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `hulls_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_emp`
--

CREATE TABLE `booking_emp` (
  `id` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `servse` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_emp`
--

INSERT INTO `booking_emp` (`id`, `id_emp`, `servse`, `create_at`, `student_id`) VALUES
(1, 201501112, 'Register courses for students', '2019-04-22 14:38:21', 0),
(2, 201501112, 'Register courses for students', '2019-04-22 14:38:21', 0),
(3, 2016011427, ' Academic guidance', '2019-04-22 14:38:57', 0),
(4, 201501122, ' Academic guidance', '2019-04-22 18:47:40', 0),
(6, 201501122, 'Register courses for students', '2019-04-22 19:13:48', 20150656),
(7, 201501122, 'Help the student in the courses', '2019-04-22 20:43:14', 20150656);

-- --------------------------------------------------------

--
-- Table structure for table `booking_female`
--

CREATE TABLE `booking_female` (
  `booking_female_id` int(11) NOT NULL,
  `booking_female_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_female_uid` int(11) NOT NULL,
  `booking_female_name` varchar(50) NOT NULL,
  `booking_female_email` varchar(100) NOT NULL,
  `booking_female_mobile` varchar(15) NOT NULL,
  `booking_female_lid` int(11) NOT NULL,
  `booking_female_pn` int(11) NOT NULL,
  `booking_female_api` int(11) NOT NULL,
  `booking_female_stauts` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `reference_table_link` varchar(250) NOT NULL,
  `requirements_name` varchar(199) NOT NULL,
  `total_hours` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `reference_table_link`, `requirements_name`, `total_hours`, `section_id`) VALUES
(1, 'M109(.NET Programming)', '	 https://www.youtube.com/results?search_query=c%23', 'Faculty Requirements/ Electives', 6, 27),
(2, 'M133', 'https://www.youtube.com/results?search_query=%D9%85%D9%87%D8%A7%D8%B1%D8%A7%D8%AA+%D8%A7%D9%84%D8%AA%D8%B9%D9%84%D9%85+%D8%A7%D9%84%D8%B0%D8%A7%D8%AA%D9%8A', 'University Requirements/ Elective', 7, 26),
(3, 'M106', 'https://www.youtube.com/results?search_query=TM105', 'Mandatory Specialization Requirements', 100, 23),
(4, 'GR111', 'https://www.youtube.com/results?search_query=M132', 'Foundation Program Requirements', 12, 24);

-- --------------------------------------------------------

--
-- Table structure for table `date_employee`
--

CREATE TABLE `date_employee` (
  `date_employee_id` int(11) NOT NULL,
  `date_employee_date` varchar(50) NOT NULL,
  `employee_no` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `date_employee`
--

INSERT INTO `date_employee` (`date_employee_id`, `date_employee_date`, `employee_no`) VALUES
(1, '2019-02-25', '201500004'),
(2, '2019-02-26', '201500004'),
(3, '2019-02-25', '201500002'),
(4, '2019-02-28', '201500002'),
(5, '2019-02-27', '201500003'),
(6, '2019-02-28', '201500004'),
(7, '2019-02-03', '201500004'),
(8, '2019-02-5', '201500004'),
(9, '2019-02-11', '201500003'),
(10, '2019-03-15', '201500005'),
(11, '2019-03-17', '201500005'),
(12, '2019-03-18', '201500006'),
(13, '2019-03-11', '201500007'),
(14, '2019-03-12', '201500009'),
(15, '2019-03-15', '201500009'),
(16, '2019-03-12', '201500011'),
(17, '2019-03-9', '201500011'),
(18, '2019-02-22', '201500012'),
(19, '2019-02-28', '201500008'),
(20, '2019-03-2', '201500010'),
(21, '2019-03-11', '201500010'),
(22, '2019-02-22', '201500013'),
(23, '2019-02-28', '201500013'),
(54, '2019-03-23', '201500025'),
(52, '2019-03-18', '201500023'),
(53, '2019-03-20', '201500024'),
(26, '2019-03-15', '201500014'),
(27, '2019-03-22', '201500014'),
(28, '2019-03-23', '201500016'),
(29, '2019-03-25', '201500015'),
(30, '2019-03-27', '201500017'),
(31, '2019-04-05', '201500017'),
(32, '2019-03-15', '201500014'),
(33, '2019-03-22', '201500014'),
(34, '2019-03-23', '201500016'),
(35, '2019-03-25', '201500015'),
(36, '2019-03-27', '201500017'),
(37, '2019-04-05', '201500017'),
(38, '2019-03-26', '201500018'),
(39, '2019-04-04', '201500018'),
(40, '2019-04-1', '201500019'),
(41, '2019-04-07', '201500019'),
(42, '2019-04-12', '201500020'),
(43, '2019-04-15', '201500021'),
(44, '2019-04-17', '201500021'),
(45, '2019-03-26', '201500018'),
(46, '2019-04-04', '201500018'),
(47, '2019-04-1', '201500019'),
(48, '2019-04-07', '201500019'),
(49, '2019-04-12', '201500022'),
(50, '2019-04-15', '201500022'),
(51, '2019-04-17', '201500022'),
(55, '2019-03-21', '201500025'),
(56, '2019-03-25', '201500026'),
(57, '2019-03-27', '201500028'),
(58, '2019-03-28', '201500028'),
(59, '2019-04-2', '201500029'),
(60, '2019-04-02', '201500030'),
(61, '2019-04-05', '201500031'),
(62, '2019-04-07', '201500032'),
(63, '2019-04-10', '201500032'),
(64, '2019-03-18', '201500033'),
(65, '2019-03-20', '201500034'),
(66, '2019-03-23', '201500034'),
(67, '2019-03-21', '201500035'),
(68, '2019-03-25', '201500036'),
(69, '2019-03-27', '201500036'),
(70, '2019-03-28', '201500037'),
(71, '2019-04-2', '201500037'),
(72, '2019-04-02', '201500038'),
(73, '2019-04-05', '201500039'),
(74, '2019-04-07', '201500040'),
(75, '2019-04-10', '201500041');

-- --------------------------------------------------------

--
-- Table structure for table `date_table`
--

CREATE TABLE `date_table` (
  `date_table_id` int(11) NOT NULL,
  `date_table_date` varchar(50) NOT NULL,
  `hull_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `date_table`
--

INSERT INTO `date_table` (`date_table_id`, `date_table_date`, `hull_id`) VALUES
(4, '2019-02-28', 2),
(5, '2019-03-02', 2),
(6, '2019-03-04', 2),
(7, '2019-03-10', 3),
(8, '2019-03-12', 3),
(9, '2019-03-15', 4),
(10, '2019-03-16', 4),
(11, '2019-03-18', 4),
(12, '2019-03-22', 5),
(13, '2019-03-25', 5),
(14, '2019-03-3', 5),
(15, '2019-02-27', 7),
(16, '2019-03-8', 7),
(17, '2019-03-15', 6),
(18, '2019-03-22', 11),
(19, '2019-03-25', 12),
(20, '2019-03-27', 10),
(21, '2019-03-16', 11),
(22, '2019-03-18', 12),
(23, '2019-03-19', 13),
(24, '2019-03-19', 14),
(25, '2019-03-25', 16),
(26, '2019-03-16', 11),
(27, '2019-03-18', 12),
(28, '2019-03-19', 13),
(29, '2019-03-19', 14),
(30, '2019-03-25', 16),
(31, '2019-03-26', 16),
(32, '2019-03-23', 17),
(33, '2019-03-27', 19),
(34, '2019-03-27', 15),
(35, '2019-03-26', 16),
(36, '2019-03-23', 17),
(37, '2019-03-27', 19),
(38, '2019-03-27', 15),
(39, '2019-03-22', 17),
(40, '2019-03-21', 19),
(41, '2019-03-28', 15),
(42, '2018-03-28', 13),
(43, '2019-03-22', 17),
(44, '2019-03-21', 19),
(45, '2019-03-28', 15),
(46, '2018-03-28', 13);

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `employee_table_id` int(11) NOT NULL,
  `employee_table_pass` varchar(50) NOT NULL,
  `employee_table_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `employee_table_status` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `major_id` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `office_no` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `groups` varchar(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` int(199) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`employee_table_id`, `employee_table_pass`, `employee_table_name`, `email`, `employee_table_status`, `type`, `major_id`, `gender`, `office_no`, `status`, `groups`, `username`, `address`, `phone`, `create_at`, `time_start`, `time_end`, `section_id`) VALUES
(201500004, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Dr.SAMAN IFTIKHAR', 'osman@gmali.ocm', 'busy', 'ACs', 3, 'female', '', 'yes', 'emplyoee', 'SAMAN', 'sudan', 2147483647, '2019-04-19 03:22:10', '07:17:17', '03:00:00', 24),
(201500005, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Ms.Nesreen Aboumar', 'omer@gmali.com', 'avaliable', 'AC', 3, '', '', 'yes', 'admin', 'Nesreen', 'sudan', 988763635, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 24),
(201500037, '', 'Sami Nawar Awad ALrabie', '', 'avaliable', 'AC', 3, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(201500038, '', 'Mr.Saeed Saleh AlGhamdi', '', 'avaliable', 'AC', 3, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(201500039, '', 'Dr. Saleem Alsolami', '', 'avaliable', 'AC', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(201500040, '', 'Abdulrahman AlMalki', '', 'avaliable', 'AC', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(201500041, '', 'Mater Alotaiby', '', 'avaliable', 'AC', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(10150001, '', 'Ms.Ohood Arab', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500002, '', 'Ms.Aisha Rifai', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500003, '', 'Ms.Maram Jasser', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500004, '', 'Ms.Abeer Madani', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500005, '', 'Ms.Aisha Habib', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500006, '', 'Ms.Maha Ashour', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500007, '', 'Ms.Haifa Sobhan', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500008, '', 'Ms.Amal Dabbias', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500009, '', 'Ms.Afnan Al-Hujairi', '', 'busy', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500010, '', 'Ms.Reham Nashar', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500011, '', 'Ms.Shazah', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500012, '', 'Ms.Esraa', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(101500013, '', 'Mr.Ramy', '', 'avaliable', 'AD', 0, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(201501122, 'e10adc3949ba59abbe56e057f20f883e', 'Rana kayal', 's201501122@arabou.edu.sa', 'avaliable', 'Adminstative', 0, 'female', 'A320', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 24),
(201501112, 'a426bb27465d836866c2c7232e42ec00', 'Bander Ali AL-ramyi', 's201501112@arabou.edu.sa', 'avaliable', 'Academic', 1, 'male', 'A205', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 23),
(2016011426, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', '', 1, '', '', '', '', '', '', 0, '2019-04-19 03:22:10', '00:00:00', '00:00:00', 0),
(2016011428, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', '', 0, '', '', '', '', '', '', 0, '2019-04-19 03:52:38', '00:00:00', '00:00:00', 27),
(0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'aaaa', 'osman@gmali.ocm', '', 'AC', 19, 'Female', '', '', '', 'osman', 'sund', 988763635, '2019-04-24 19:27:44', '06:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `entertainment_table`
--

CREATE TABLE `entertainment_table` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `places` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `best_price` varchar(20) NOT NULL,
  `Suggest` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entertainment_table`
--

INSERT INTO `entertainment_table` (`id`, `email`, `places`, `time`, `cost`, `best_price`, `Suggest`) VALUES
(0, 's201502205@aou.edu.sa', '', '', '', '', ''),
(0, 's20150@yahoo.com', '', '', '', '', ''),
(0, 'nkrnjkrn@yahoo.com', '', '', '', '', ''),
(0, '5n@yahoo.com', '1', '1', '', '', ''),
(0, 'efr@yahoo.com', '1', '1', '', '', ''),
(0, 'nj@yahoo.com', '1', '1', '', '', ''),
(0, 's201502205@yahoo.vom', 'option1,option2', '2-', '', '', ''),
(0, 's201502205@yahoo.vom', 'option1,option2', '2-4', 'yes', '50-60', 'more'),
(25255565, 'df@yahoo.com', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fanswer`
--

CREATE TABLE `fanswer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fquestions`
--

CREATE TABLE `fquestions` (
  `id` int(4) NOT NULL,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fquestions`
--

INSERT INTO `fquestions` (`id`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`) VALUES
(2, '', '', '', '', '2020-03-19 05:35:13', 0, 'fgregr'),
(3, '', '', '', '', '2020-03-19 05:35:33', 0, '0'),
(4, '', '', '', '', '2020-03-19 05:38:18', 0, '0'),
(5, '', '', '', '', '2020-03-19 05:41:43', 0, '0'),
(6, '', '', '', '', '2020-03-19 05:41:48', 0, 'hhhhhhhhhhhhhhhhh'),
(7, '', '', '', '', '2020-03-19 05:42:30', 0, '0'),
(8, '', '', '', '', '2020-03-19 05:44:25', 0, '0'),
(9, '', '', '', '', '2020-03-19 05:45:27', 0, '0'),
(10, 'Questionare', 'about holiday', 'sara', 'soso@yahoo.com', '2020-03-19 06:05:44', 0, 'jjhjk'),
(11, 'homework m253', 'Today we are going to build a registration system that keeps track of which users are admin and which are normal users. The normal users in our application are not allowed to access admin pages. All users (Admins as well as normal users) use the same form to login. After logging in, the normal users are redirected to the index page while the admin users are redirected to the admin pages.', 'mohammed', 'mohammed@yahoo.com', '2020-03-19 06:06:41', 0, '0'),
(12, '', '', '', '', '2021-03-19 06:19:53', 0, '0'),
(13, 'Homework of M253', 'I want someone in my section to comment on my topic in LMS', 'Asmaa Jumaa', 's201502205@aou.edu.sa', '2021-03-19 06:20:46', 0, '0'),
(14, 'T175 forms', 'Please can you help me ,', 'Ahmed', 'a123@aou.edu.sa', '2024-03-19 06:44:17', 0, '0'),
(15, 'hhhhh', 'jfjkeffg4', 'asma', 'kjkfj', '2026-03-19 04:04:23', 0, '0'),
(16, 'memo', '471', 'soso', 'soso.yaho..', '2028-03-19 04:04:04', 0, '0'),
(17, 'jhjn', 'jnk', 'kmk', 'jij', '2028-03-19 04:12:00', 0, ''),
(18, 'jhjn', 'jnk', 'kmk', 'jij', '2028-03-19 04:14:43', 0, '0'),
(19, 'nkl', 'jlk', 'lkj', 'kmk,', '2028-03-19 04:46:08', 0, '0'),
(20, 'nkl', 'jlk', 'lkj', 'kmk,', '2028-03-19 04:47:25', 0, '0'),
(21, 'htrh', 'y', 'yy', 'yt', '2030-03-19 12:34:09', 0, '0'),
(22, 'mmmmmmmmmmmmmmmmmmmmmm', 'ed', 'weeq', 'ed', '2030-03-19 12:34:39', 0, '0'),
(23, '', '', '', '', '2030-03-19 12:41:19', 0, '0'),
(24, '', '', '', '', '2030-03-19 12:44:44', 0, '0'),
(25, 'grg', 'rgr', 'rg', 'rg', '2031-03-19 12:18:42', 0, '0'),
(26, '', '', '', '', '2031-03-19 12:20:00', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `hulls`
--

CREATE TABLE `hulls` (
  `Hulls_id` int(11) NOT NULL,
  `Hulls_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Hulls_name` varchar(50) NOT NULL,
  `Hulls_cordinator` varchar(50) NOT NULL,
  `Hulls_capacity` int(11) NOT NULL,
  `Hulls_status` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hulls`
--

INSERT INTO `hulls` (`Hulls_id`, `Hulls_time`, `Hulls_name`, `Hulls_cordinator`, `Hulls_capacity`, `Hulls_status`, `section`) VALUES
(32, '2019-04-24 14:33:38', 'omer', 'ali alzubair', 22, 'busy', 'female'),
(3, '2019-02-18 13:05:11', 'Lab 3', 'cooperative students', 33, 'avaliable', 'female'),
(4, '2019-02-19 06:33:05', 'Lab 4', 'cooperative students', 35, 'open', 'female'),
(5, '2019-02-19 09:57:54', 'Lab 5', 'cooperative students', 35, 'open', ''),
(6, '2019-02-21 09:02:38', 'Lab 6', 'cooperative students', 35, 'open', 'male'),
(7, '2019-02-21 22:12:34', 'Lab 7', 'cooperative students', 6, 'open', 'male'),
(9, '2019-02-21 22:14:42', 'Conference Hall-3rd Floor', 'Ms.Afnan Al-Hujairi', 300, 'open', ''),
(10, '2019-02-21 22:14:42', 'Library -Ground Floor', 'Ms.Aisha Habib', 10, 'close', ''),
(12, '2019-02-21 22:20:06', 'F206 - 2nd Floor', '', 30, 'open', ''),
(13, '2019-03-16 17:18:57', 'F205 - 2nd Floor', '', 30, 'open', ''),
(14, '2019-03-16 17:19:00', 'F202 - 2nd Floor', '', 30, 'open', ''),
(15, '2019-03-16 17:28:49', 'F101 - 1st Floor', '', 30, 'open', ''),
(16, '2019-03-16 17:29:08', 'F102 - 1st Floor', '', 30, 'open', ''),
(17, '2019-03-19 07:47:35', 'F105 - 1st Floor', '', 30, 'open', ''),
(18, '2019-03-19 07:47:35', 'F106 - 1st Floor', '', 30, 'open', ''),
(19, '2019-03-19 07:47:37', 'F105 - 1st Floor', '', 30, 'open', ''),
(24, '2019-03-25 06:55:32', 'lab4', 'ali', 50, 'busy', ''),
(25, '2019-03-25 07:00:30', 'lab4', 'ali', 50, 'busy', ''),
(26, '2019-03-25 14:48:18', 'lab 4', 'mohammed', 10, 'avaliable', ''),
(27, '2019-03-25 15:01:20', 'Meteting room ', 'DR.Bander Ali', 20, 'avaliable', ''),
(28, '2019-03-25 15:16:25', 'Lab 5', 'dr.Ammar', 30, 'busy', ''),
(29, '2019-03-26 21:43:39', 'A205', 'Ms.Nessern', 30, 'avaliable', 'avaliable'),
(30, '2019-04-01 07:47:40', 'room1', 'Dr.Omar', 20, 'avaliable', 'busy'),
(31, '2019-04-24 13:42:45', 'ali', 'osman', 21, 'avaliable', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `joining_table`
--

CREATE TABLE `joining_table` (
  `id` int(11) NOT NULL,
  `join_name` varchar(50) NOT NULL,
  `join_email` varchar(50) NOT NULL,
  `join_id` int(11) NOT NULL,
  `join_major` varchar(50) NOT NULL,
  `join_club` varchar(50) NOT NULL,
  `join_role` varchar(50) NOT NULL,
  `join_file` blob NOT NULL,
  `join_hoppies` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joining_table`
--

INSERT INTO `joining_table` (`id`, `join_name`, `join_email`, `join_id`, `join_major`, `join_club`, `join_role`, `join_file`, `join_hoppies`) VALUES
(23, 'Ahamd', 'Ahmad20150@yahoo.com', 201601147, 'Bussines', 'Media Club', 'President', 0x35323637333038365f313631343037333830323037323433375f333833363037313338323131343839333832345f6e2e6a7067, 'photographer'),
(24, 'Nesreen', 'seso123@yahoo.com', 201526999, 'Bussines', 'Business Club', 'planner & create events', 0x576861747341707020496d61676520323031382d31312d313420617420312e35322e323720504d2e6a706567, 'hhhh'),
(25, 'sososs', 'ff@yahoo.com', 5151545, 'E-language', 'Languages Club', 'planner & create events', '', 'jk'),
(26, 'gtg', 'r@yahoo.com', 2564564, 'E-language', 'Languages Club', 'planner & create events', '', 'nknkj'),
(27, 'Nora Mohammed', 's2015025@yahoo.com', 2056545646, 'Bussines', 'Languages Club', 'Tecenically', '', 'efrgrgrgrg');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `major_id` int(11) NOT NULL,
  `major_name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `major_name`, `description`) VALUES
(1, 'Information Technology', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non voluptates, iste repudiandae temporibus quis vitae minima, ullam deleniti dolore ipsam accusantium! Dolorem.'),
(19, ' Student Affairs', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non voluptates, iste repudiandae temporibus quis vitae minima, ullam deleniti dolore ipsam accusantium! Dolorem.'),
(3, 'Englishs', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non voluptates, iste repudiandae temporibus quis vitae minima, ullam deleniti dolore ipsam accusantium! Dolorem.'),
(22, 'Technical', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non voluptates, iste repudiandae temporibus quis vitae minima, ullam deleniti dolore ipsam accusantium! Dolorem.'),
(21, ' Resources', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non voluptates, iste repudiandae temporibus quis vitae minima, ullam deleniti dolore ipsam accusantium! Dolorem.'),
(20, 'Finance', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non voluptates, iste repudiandae temporibus quis vitae minima, ullam deleniti dolore ipsam accusantium! Dolorem.');

-- --------------------------------------------------------

--
-- Table structure for table `more_suggestions`
--

CREATE TABLE `more_suggestions` (
  `more` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reference_table`
--

CREATE TABLE `reference_table` (
  `reference_table_id` int(11) NOT NULL,
  `reference_table_link` varchar(255) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reference_table`
--

INSERT INTO `reference_table` (`reference_table_id`, `reference_table_link`, `id_course`) VALUES
(1, 'https://www.youtube.com/results?search_query=c%23', 1),
(2, 'https://www.youtube.com/results?search_query=MATLAB', 3),
(3, 'https://www.youtube.com/results?search_query=%D9%85%D9%87%D8%A7%D8%B1%D8%A7%D8%AA+%D8%A7%D9%84%D8%AA%D8%B9%D9%84%D9%85+%D8%A7%D9%84%D8%B0%D8%A7%D8%AA%D9%8A', 4),
(4, 'https://www.youtube.com/results?search_query=TM105', 8),
(5, 'https://www.youtube.com/results?search_query=M132', 9),
(6, 'https://www.youtube.com/results?search_query=M132', 10),
(7, 'https://www.youtube.com/results?search_query=M130', 11),
(8, 'https://www.youtube.com/results?search_query=M131', 12),
(9, 'https://www.youtube.com/results?search_query=M269', 13),
(10, 'https://www.youtube.com/results?search_query=TM354', 14),
(11, 'https://www.youtube.com/results?search_query=T215A', 15),
(12, 'https://www.youtube.com/results?search_query=T215B', 16),
(13, 'https://www.youtube.com/results?search_query=T103', 17),
(14, 'https://www.youtube.com/results?search_query=TM111', 18),
(15, 'https://www.youtube.com/results?search_query=TM112', 19),
(16, 'https://www.youtube.com/results?search_query=TM355', 20),
(17, 'https://www.youtube.com/results?search_query=M180', 21),
(18, 'https://www.youtube.com/results?search_query=T471', 22),
(19, 'http://learnenglishteens.britishcouncil.org/skills', 29),
(20, 'http://www.bbc.co.uk/learningenglish/', 30),
(21, 'https://www.tofluency.com/how-to-learn-english/', 31),
(22, 'https://www.youtube.com/results?search_query=%D8%AA%D8%B9%D9%84%D9%85+%D9%82%D9%88%D8%A7%D8%B9%D8%AF+%D8%A7%D9%84%D9%84%D8%BA%D8%A9+%D8%A7%D9%84%D8%B9%D8%B1%D8%A8%D9%8A%D8%A9+%D8%A7%D9%84%D8%A7%D8%B3%D8%A7%D8%B3%D9%8A%D8%A9', 32),
(23, 'https://www.youtube.com/results?search_query=%D9%82%D9%88%D8%A7%D8%B9%D8%AF+%D8%A7%D9%84%D9%84%D8%BA%D8%A9+%D8%A7%D9%84%D8%B9%D8%B1%D8%A8%D9%8A%D8%A9', 33),
(24, 'https://www.youtube.com/results?search_query=book+english+skills+level4', 34),
(25, 'https://www.youtube.com/results?search_query=book+english+skills+', 35),
(26, 'https://www.youtube.com/results?search_query=%D9%85%D9%87%D8%A7%D8%B1%D8%A7%D8%AA+%D8%A7%D9%84%D8%AA%D8%B9%D9%84%D9%85+%D8%A7%D9%84%D8%B0%D8%A7%D8%AA%D9%8A', 36),
(27, 'https://www.youtube.com/results?search_query=TU170', 37),
(28, 'https://www.youtube.com/results?search_query=M275', 38);

-- --------------------------------------------------------

--
-- Table structure for table `requirements_table`
--

CREATE TABLE `requirements_table` (
  `requirements_id` int(11) NOT NULL,
  `requirements_name` varchar(50) NOT NULL,
  `id_section` int(11) NOT NULL,
  `total_hours` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requirements_table`
--

INSERT INTO `requirements_table` (`requirements_id`, `requirements_name`, `id_section`, `total_hours`) VALUES
(1, 'Faculty Requirements/ Electives', 1, 6),
(2, 'University Requirements/ Elective', 1, 3),
(3, 'Mandatory Specialization Requirements', 1, 98),
(4, 'Foundation Program Requirements', 1, 0),
(5, 'Foundation Program Requirements', 1, 18),
(6, 'Faculty Requirements/ Mandatory', 1, 6),
(7, 'Faculty Requirements/ Electives', 2, 6),
(8, 'University Requirements/ Elective', 2, 3),
(9, 'Mandatory Specialization Requirements', 2, 96),
(10, 'Foundation Program Requirements', 2, 0),
(11, 'University Requirements/ Mandatory', 2, 18),
(12, 'Faculty Requirements/ Mandatory', 2, 8),
(13, 'Faculty Requirements/ Electives', 9, 4),
(14, 'University Requirements/ Elective', 9, 3),
(15, 'Mandatory Specialization Requirements', 9, 64),
(16, 'Foundation Program Requirements', 9, 0),
(17, 'University Requirements/ Mandatory', 9, 18),
(18, 'Faculty Requirements/ Mandatory', 9, 8),
(19, ' Requirements/Electives ( Language)', 9, 16),
(20, 'Requirements/Electives ( Literature)', 9, 16);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `id_major` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `id_major`, `create_at`) VALUES
(27, 'section tow', 1, '2019-04-01 18:22:25'),
(26, 'section one', 1, '2019-04-01 18:22:25'),
(25, 'part thee', 3, '2019-04-01 18:22:25'),
(24, 'part tow', 3, '2019-04-01 18:22:25'),
(23, 'part one', 3, '2019-04-01 18:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `address`, `gender`, `designation`, `age`, `image`) VALUES
(1, 'Bruce Tom', '656 Edsel Road\r\nSherman Oaks, CA 91403', 'Male', 'Driver', 36, '1.jpg'),
(5, 'Clara Gilliam', '63 Woodridge Lane\r\nMemphis, TN 38138', 'Female', 'Programmer', 24, '2.jpg'),
(6, 'Barbra K. Hurley', '1241 Canis Heights Drive\r\nLos Angeles, CA 90017', 'Female', 'Service technician', 26, '3.jpg'),
(7, 'Antonio J. Forbes', '403 Snyder Avenue\r\nCharlotte, NC 28208', 'Male', 'Faller', 32, '4.jpg'),
(8, 'Charles D. Horst', '1636 Walnut Hill Drive\r\nCincinnati, OH 45202', 'Male', 'Financial investigator', 29, '5.jpg'),
(175, 'Ronald D. Colella', '1571 Bingamon Branch Road, Barrington, IL 60010', 'Male', 'Top executive', 32, '6.jpg'),
(174, 'Martha B. Tomlinson', '4005 Bird Spring Lane, Houston, TX 77002', 'Female', 'Systems programmer', 38, '7.jpg'),
(161, 'Glenda J. Stewart', '3482 Pursglove Court, Rossburg, OH 45362', 'Female', 'Cost consultant', 28, '8.jpg'),
(162, 'Jarrod D. Jones', '3827 Bingamon Road, Garfield Heights, OH 44125', 'Male', 'Manpower development advisor', 64, '9.jpg'),
(163, 'William C. Wright', '2653 Pyramid Valley Road, Cedar Rapids, IA 52404', 'Male', 'Political geographer', 33, '10.jpg'),
(178, 'Sara K. Ebert', '1197 Nelm Street\r\nMc Lean, VA 22102', 'Female', 'Billing machine operator', 50, ''),
(177, 'Patricia L. Scott', '1584 Dennison Street\r\nModesto, CA 95354', 'Female', 'Urban and regional planner', 54, ''),
(179, 'James K. Ridgway', '3462 Jody Road\r\nWayne, PA 19088', 'Female', 'Recreation leader', 41, ''),
(180, 'Stephen A. Crook', '448 Deercove Drive\r\nDallas, TX 75201', 'Male', 'Optical goods worker', 36, ''),
(181, 'Kimberly J. Ellis', '4905 Holt Street\r\nFort Lauderdale, FL 33301', 'Male', 'Dressing room attendant', 24, ''),
(182, 'Elizabeth N. Bradley', '1399 Randall Drive\r\nHonolulu, HI 96819', 'Female', ' Software quality assurance analyst', 25, ''),
(183, 'Steve John', '108, Vile Parle, CL', 'Male', 'Software Engineer', 29, ''),
(184, 'Marks Johnson', '021, Big street, NY', 'Male', 'Head of IT', 41, ''),
(185, 'Mak Pub', '1462 Juniper Drive\r\nBreckenridge, MI 48612', 'Male', 'Mental health counselor', 40, ''),
(186, 'mohammed', '1462 Juniper Drive\r\nBreckenridge, MI 48612', 'Male', 'Mental health counselor', 25, '');

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `id` int(11) NOT NULL,
  `checks` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`id`, `checks`) VALUES
(3, 'on'),
(4, 'on,Modify and delete registration tables,on');

-- --------------------------------------------------------

--
-- Table structure for table `time_employee`
--

CREATE TABLE `time_employee` (
  `time_employee_id` int(11) NOT NULL,
  `time_employee_start_time` varchar(50) NOT NULL,
  `time_employee_end_time` varchar(50) NOT NULL,
  `date_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_employee`
--

INSERT INTO `time_employee` (`time_employee_id`, `time_employee_start_time`, `time_employee_end_time`, `date_id`) VALUES
(1, '1:00', '3:00', 1),
(2, '11:00', '1:00', 1),
(3, '3:00', '4:00', 2),
(4, '11:00', '12:00', 3),
(5, '9:00', '10:00', 3),
(6, '1:00', '2:00', 4),
(7, '1:00', '3:00', 6),
(8, '2:00', '4:00', 7),
(9, '9:00', '10:00', 8),
(10, '11:00', '12:00', 8),
(11, '1:00', '2:00', 9),
(12, '2:00', '3:00', 10),
(13, '9:00', '10:00', 11),
(14, '1:00', '2:00', 11),
(15, '2:00', '3:00', 12),
(16, '9:00', '10:00', 13),
(17, '1:00', '1:30', 14),
(18, '12:00', '2:00', 15),
(19, '1:00', '1:30', 16),
(20, '12:00', '2:00', 17),
(21, '1:00', '2:00', 18),
(22, '2:00', '3:00', 19),
(23, '11:00', '12:00', 20),
(24, '1:00', '2:00', 21),
(25, '2:00', '3:00', 22),
(26, '11:00', '12:00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `time_table_id` int(11) NOT NULL,
  `time_table_start_time` varchar(50) NOT NULL,
  `time_table_end_time` varchar(50) NOT NULL,
  `hull_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`time_table_id`, `time_table_start_time`, `time_table_end_time`, `hull_id`, `create_at`) VALUES
(38, '01:02', '17:01', 32, '2019-04-24 22:52:18'),
(37, '06:02', '20:58', 32, '2019-04-24 22:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `university_issues`
--

CREATE TABLE `university_issues` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `Suggest` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `major_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `section_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstName`, `lastName`, `ID`, `mobile`, `email`, `username`, `password`, `gender`, `major_id`, `status`, `section_id`) VALUES
('Asmaa ', 'JUmaa', 20150656, 536548441, 's201502205@aou.edu.sa.com', 'asmaa123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'female', 3, 1, 0),
('Asmaa ', 'JUmaa', 2147483647, 988763635, 'osman@gmali.ocm', 'osman', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'female', 3, 1, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `booking_emp`
--
ALTER TABLE `booking_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_female`
--
ALTER TABLE `booking_female`
  ADD PRIMARY KEY (`booking_female_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `date_employee`
--
ALTER TABLE `date_employee`
  ADD PRIMARY KEY (`date_employee_id`);

--
-- Indexes for table `date_table`
--
ALTER TABLE `date_table`
  ADD PRIMARY KEY (`date_table_id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`employee_table_id`);

--
-- Indexes for table `fanswer`
--
ALTER TABLE `fanswer`
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `fquestions`
--
ALTER TABLE `fquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hulls`
--
ALTER TABLE `hulls`
  ADD PRIMARY KEY (`Hulls_id`);

--
-- Indexes for table `joining_table`
--
ALTER TABLE `joining_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `reference_table`
--
ALTER TABLE `reference_table`
  ADD PRIMARY KEY (`reference_table_id`);

--
-- Indexes for table `requirements_table`
--
ALTER TABLE `requirements_table`
  ADD PRIMARY KEY (`requirements_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_employee`
--
ALTER TABLE `time_employee`
  ADD PRIMARY KEY (`time_employee_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`time_table_id`);

--
-- Indexes for table `university_issues`
--
ALTER TABLE `university_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_emp`
--
ALTER TABLE `booking_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking_female`
--
ALTER TABLE `booking_female`
  MODIFY `booking_female_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `date_employee`
--
ALTER TABLE `date_employee`
  MODIFY `date_employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `date_table`
--
ALTER TABLE `date_table`
  MODIFY `date_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `fquestions`
--
ALTER TABLE `fquestions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hulls`
--
ALTER TABLE `hulls`
  MODIFY `Hulls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `joining_table`
--
ALTER TABLE `joining_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reference_table`
--
ALTER TABLE `reference_table`
  MODIFY `reference_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `requirements_table`
--
ALTER TABLE `requirements_table`
  MODIFY `requirements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time_employee`
--
ALTER TABLE `time_employee`
  MODIFY `time_employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `time_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
