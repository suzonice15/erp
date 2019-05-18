-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 09:01 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_assigning_dept_head`
--

CREATE TABLE `hr_assigning_dept_head` (
  `id` int(10) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `department_id` int(10) NOT NULL,
  `start_date` varchar(14) NOT NULL,
  `end_date` varchar(14) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_assigning_dept_head`
--

INSERT INTO `hr_assigning_dept_head` (`id`, `user_id`, `department_id`, `start_date`, `end_date`, `status`) VALUES
(2, '17002', 4, '2018-01-03', '2018-01-31', 1),
(3, '17003', 2, '2018-01-01', '2018-01-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_assigning_roster`
--

CREATE TABLE `hr_assigning_roster` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `from_date` varchar(14) NOT NULL,
  `to_date` varchar(14) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_assigning_roster`
--

INSERT INTO `hr_assigning_roster` (`id`, `emp_id`, `from_date`, `to_date`, `status`) VALUES
(1, '17001', '2018-01-01', '2018-01-31', 1),
(2, '17002', '2018-01-01', '2018-01-31', 0),
(3, '17004', '2018-01-01', '2018-01-31', 0),
(4, '17005', '2018-01-01', '2018-01-31', 0),
(5, '17006', '2018-01-01', '2018-01-31', 0),
(6, '17008', '2018-01-01', '2018-01-31', 0),
(7, '17007', '2018-01-01', '2018-01-31', 1),
(8, '17003', '2018-01-01', '2018-01-31', 1),
(9, '17002', '2018-02-01', '2018-02-22', 1),
(10, '17004', '2018-02-01', '2018-02-28', 1),
(11, '17005', '2018-02-01', '2018-02-28', 1),
(12, '17006', '2018-02-01', '2018-02-28', 1),
(13, '17008', '2018-02-01', '2018-02-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_assigning_weekend`
--

CREATE TABLE `hr_assigning_weekend` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `from_date` varchar(16) NOT NULL,
  `to_date` varchar(16) NOT NULL,
  `weekend_id` int(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_assigning_weekend`
--

INSERT INTO `hr_assigning_weekend` (`id`, `emp_id`, `from_date`, `to_date`, `weekend_id`, `status`) VALUES
(1, '17001', '2018-01-01', '2018-04-31', 1, 1),
(2, '17002', '2018-01-01', '2018-01-31', 2, 0),
(7, '17002', '2018-02-01', '2018-02-28', 1, 0),
(12, '17002', '2018-03-01', '2018-03-31', 3, 0),
(17, '17002', '2018-04-01', '2018-04-11', 7, 1),
(3, '17004', '2018-01-01', '2018-01-31', 2, 0),
(8, '17004', '2018-02-01', '2018-02-28', 1, 0),
(13, '17004', '2018-03-01', '2018-03-31', 3, 0),
(18, '17004', '2018-04-01', '2018-04-30', 2, 1),
(4, '17005', '2018-01-01', '2018-01-31', 2, 0),
(9, '17005', '2018-02-01', '2018-02-28', 1, 0),
(14, '17005', '2018-03-01', '2018-03-31', 3, 0),
(19, '17005', '2018-04-01', '2018-04-30', 2, 1),
(5, '17006', '2018-01-01', '2018-01-31', 2, 0),
(10, '17006', '2018-02-01', '2018-02-28', 1, 0),
(15, '17006', '2018-03-01', '2018-03-31', 3, 0),
(20, '17006', '2018-04-01', '2018-04-30', 2, 1),
(6, '17008', '2018-01-01', '2018-01-31', 2, 0),
(11, '17008', '2018-02-01', '2018-02-28', 1, 0),
(16, '17008', '2018-03-01', '2018-03-31', 3, 0),
(21, '17008', '2018-04-01', '2018-04-30', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_attendance`
--

CREATE TABLE `hr_attendance` (
  `id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `present_date` varchar(16) NOT NULL,
  `in_time` varchar(16) DEFAULT NULL,
  `out_time` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_attendance`
--

INSERT INTO `hr_attendance` (`id`, `emp_id`, `present_date`, `in_time`, `out_time`) VALUES
(3, 17002, '2018-01-07', '10:10', '6:00'),
(8, 17002, '2018-01-08', '10:00', '6:00'),
(13, 17002, '2018-01-09', '10:00', '6:00'),
(18, 17002, '2018-01-10', '10:00', '6:00'),
(23, 17002, '2018-01-11', '10:00', '6:00'),
(4, 17004, '2018-01-07', '10:10', '6:00'),
(9, 17004, '2018-01-08', '10:00', '6:00'),
(14, 17004, '2018-01-09', '10:00', '6:00'),
(19, 17004, '2018-01-10', '10:00', '6:00'),
(24, 17004, '2018-01-11', '10:00', '6:00'),
(5, 17005, '2018-01-07', '10:10', '6:00'),
(10, 17005, '2018-01-08', '10:00', '6:00'),
(15, 17005, '2018-01-09', '10:00', '6:00'),
(20, 17005, '2018-01-10', '10:00', '6:00'),
(25, 17005, '2018-01-11', '10:00', '6:00'),
(6, 17006, '2018-01-07', '10:10', '6:00'),
(11, 17006, '2018-01-08', '10:00', '6:00'),
(16, 17006, '2018-01-09', '10:00', '6:00'),
(21, 17006, '2018-01-10', '10:00', '6:00'),
(26, 17006, '2018-01-11', '10:00', '6:00'),
(7, 17008, '2018-01-07', '10:10', '6:00'),
(12, 17008, '2018-01-08', '10:00', '6:00'),
(17, 17008, '2018-01-09', '10:00', '6:00'),
(22, 17008, '2018-01-10', '10:00', '6:00'),
(27, 17008, '2018-01-11', '10:00', '6:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_academic_info`
--

CREATE TABLE `hr_emp_academic_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `exam_degree_id` int(10) NOT NULL,
  `grade_marks` varchar(20) NOT NULL,
  `academic_session` varchar(20) NOT NULL,
  `year_of_passing` varchar(14) NOT NULL,
  `institute` varchar(200) NOT NULL,
  `study_group_id` int(10) NOT NULL,
  `board_id` int(10) NOT NULL,
  `exam_name_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_academic_info`
--

INSERT INTO `hr_emp_academic_info` (`id`, `emp_id`, `exam_degree_id`, `grade_marks`, `academic_session`, `year_of_passing`, `institute`, `study_group_id`, `board_id`, `exam_name_id`) VALUES
(1, '17001', 8, 'B', 'B', 'B', 'B', 3, 7, 2),
(2, '17001', 1, '5.00', '2000-2002', '2002', 'DD', 1, 1, 1),
(3, '17001', 1, '5.00', '2000-2002', '2002', 'DD', 1, 1, 1),
(4, '17001', 7, 'A', 'A', 'A', 'A', 2, 8, 1),
(5, '17001', 4, 'A', 'A', 'A', 'A', 2, 8, 1),
(6, '17002', 3, 'B', 'B', 'B', 'B', 3, 9, 1),
(7, '17002', 3, 'B', 'B', 'B', 'B', 3, 9, 1),
(8, '17003', 4, 'B', 'B', 'B', 'B', 1, 8, 1),
(9, '1703', 5, 'A', 'A', 'A', 'A', 1, 8, 2),
(10, '17004', 1, 'A', 'A', 'A', 'A', 2, 8, 1),
(11, '17004', 4, 'B', 'B', 'B', 'B', 1, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_award_and_honors`
--

CREATE TABLE `hr_emp_award_and_honors` (
  `id` int(10) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `award_honors_title` varchar(100) NOT NULL,
  `awards_type` int(2) NOT NULL,
  `country` varchar(100) NOT NULL,
  `receiving_date` varchar(14) NOT NULL,
  `organization_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_award_and_honors`
--

INSERT INTO `hr_emp_award_and_honors` (`id`, `emp_id`, `award_honors_title`, `awards_type`, `country`, `receiving_date`, `organization_name`) VALUES
(1, 17004, 'Book fire', 2, 'Bangladesh', '2018-01-01', 'Book'),
(2, 17001, 'Golobar warming', 2, 'India', '2000-01-01', 'KSDK'),
(3, 17001, 'Award', 1, 'Bangladesh', '2003-01-01', 'DITT'),
(4, 17004, 'Book', 2, 'BD', '2018-01-18', 'Book'),
(5, 17002, 'Test data2', 2, 'fdhgfh', '', 'fgh'),
(6, 17003, 'gfj', 1, 'fgjh', '2018-01-04', 'gjhg'),
(7, 17003, 'gfjf', 2, 'ggfj', '2018-01-11', 'gfjfgjg');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_basic_info`
--

CREATE TABLE `hr_emp_basic_info` (
  `id` int(10) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_nid` varchar(30) NOT NULL,
  `mobile_no1` varchar(16) NOT NULL,
  `email_address` varchar(60) NOT NULL,
  `date_of_birth` varchar(16) NOT NULL,
  `gender_id` int(10) NOT NULL,
  `division_id` int(10) NOT NULL,
  `district_id` int(10) NOT NULL,
  `thana_id` int(10) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `passport_number` varchar(60) NOT NULL,
  `passport_number_exp_date` varchar(16) NOT NULL,
  `birth_certificate` varchar(30) NOT NULL,
  `present_address` varchar(500) NOT NULL,
  `permanent_address` varchar(500) NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `blood_group_id` int(10) NOT NULL,
  `religion_id` int(10) NOT NULL,
  `freedom_fighter_family` int(2) NOT NULL,
  `freedom_fighter_relation_id` int(10) NOT NULL,
  `freedom_fighter_id` varchar(30) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_basic_info`
--

INSERT INTO `hr_emp_basic_info` (`id`, `emp_name`, `emp_id`, `emp_nid`, `mobile_no1`, `email_address`, `date_of_birth`, `gender_id`, `division_id`, `district_id`, `thana_id`, `father_name`, `mother_name`, `passport_number`, `passport_number_exp_date`, `birth_certificate`, `present_address`, `permanent_address`, `profile_picture`, `blood_group_id`, `religion_id`, `freedom_fighter_family`, `freedom_fighter_relation_id`, `freedom_fighter_id`, `signature`, `status`) VALUES
(1, 'Khan ataur rahman', '17004', '756756', '01557268135', 'a4@gmail.com', '2017-12-01', 2, 3, 2, 5, 'dsfgsad', 'fsdfs', '67', '2017-12-28', '54654', 'dsgdsfgsdf', 'sdfgdsfgsdfg', '08-12-2017_1512758911.jpg', 0, 3, 1, 2, '6576', '08-12-2017_1512758911.png', 1),
(2, 'Shoriful', '17001', '5675476575', '546475', 'a1@gmail.com', '2017-12-07', 2, 3, 2, 4, 'dfgdsfg', 'dsgsdfgds', '563754', '', '7657567', 'fdhdgf', 'dhgfghfg', '08-12-2017_1512758820.jpg', 3, 3, 1, 1, '657856', '08-12-2017_1512758820.png', 1),
(3, 'Tamanna Khan', '17002', '54645373665', '4565', 'a2@gmail.com', '2017-12-13', 2, 3, 2, 4, 'dgsdfsg', 'dsfgdsf', '', '', 'sdfgdsf', 'gsdfgsd', 'fgsdfgsdfg', '08-12-2017_1512758848.jpg', 4, 3, 1, 2, '6765', '08-12-2017_15127588481.jpg', 1),
(4, 'Kazi sirazum monir', '17003', '213456123123', '67', 'a3@gmail.com', '2017-12-07', 2, 3, 2, 5, 'sdg', 'fdsgdsfgfd', '567', '2017-12-27', '564756', 'dhfgh', 'gfhd', '08-12-2017_1512758941.jpg', 6, 2, 1, 2, '678567', '09-12-2017_1512792899.png', 1),
(5, 'fdgdsf', '17005', '567537657', '6576', 'a5@gmail.com', '2017-12-09', 1, 3, 2, 3, 'ghd', 'fgfgf', '678776', '2017-12-28', '6547567', 'tyuty', 'gfhd', '09-12-2017_1512793707.jpg', 4, 3, 0, 0, '', '09-12-2017_1512793707.png', 1),
(6, 'grty', '17006', '6587', '765876', 'a6@gmail.com', '2017-12-07', 2, 3, 2, 2, 'fdsg', 'dsfgsdfg', '67868', '2017-12-28', '56744', 'fdhfgh', 'hg', '09-12-2017_1512793805.jpg', 3, 2, 1, 1, '67567', '09-12-2017_15127938051.jpg', 1),
(7, 'Jarin sultan', '17007', '75665657', '7546756', 'a7@gmail.com', '2017-12-07', 2, 3, 2, 4, 'sadfasd', 'fasdf', 'dg6756', '2017-12-27', 'fhdf', 'dfhfggf', 'dfhfg', '09-12-2017_1512794157.jpg', 6, 3, 0, 0, '', '09-12-2017_15127941571.jpg', 1),
(8, 'Alam uddin', '17008', 'htryutyrt', '6554', 'a8@gmail.com', '2017-12-06', 1, 3, 2, 3, 'xcvbcxvbcxv', 'bxcbcxv', 'xcvbcxvbvc', '2017-12-07', 'xcvbcxvbcvx', 'xcvbcvxbvcx', 'xcvbcxvb', '09-12-2017_1512794228.jpg', 3, 3, 0, 0, '', '09-12-2017_1512794228.png', 1),
(9, 'Asraful alam', '17009', '67', 'd5657567', 'a9@gmail.com', '2017-12-14', 1, 3, 2, 4, 'dfgh', 'gdf', 'gdfgh', '2017-12-28', '67456', '75hfghgh', 'dfghfg', '09-12-2017_1512794296.jpg', 6, 1, 0, 0, '', '09-12-2017_15127942961.jpg', 1),
(10, 'Istiak', '17010', '6575567', '6757465', 'a10@gmail.com', '2017-12-27', 1, 3, 2, 5, 'dsfgdsfg', 'dsfgdsfgdsdf', '65756', '2017-12-07', 'dfhdfh', 'dfghdfghgf', 'dghd', '09-12-2017_1512794414.jpg', 3, 1, 1, 1, '57654756756756756', '09-12-2017_15127944141.jpg', 1),
(11, 'Mishon Ali', '17011', '76575', '765756', 'a11@gmail.com', '2017-12-13', 1, 3, 2, 5, 'dsgfds', 'gsdfg', 'dfs', '2017-12-22', 'sdfg', 'dsfgdfg', 'fdsgdsfgdf', '09-12-2017_1512794608.jpg', 4, 1, 0, 0, '', '09-12-2017_15127946081.jpg', 1),
(12, 'Imran alam', '17012', '567565', '7657', 'a12@gmail.com', '2017-12-07', 1, 3, 2, 4, 'sdgdfs', 'gdsfg', 'dfg', '2017-12-21', '57567', 'dfhdfgh', 'hdfgh', '09-12-2017_1512794695.jpg', 5, 1, 1, 1, '56756754675', '09-12-2017_1512794695.png', 1),
(13, 'Sohag Khan', '17013', '7567567', '67465', 'a13@gmail.com', '2017-12-06', 1, 3, 2, 4, 'dsfgsdf', 'gsdfgdsf', 'sdfg', '2017-12-07', 'sdfgsdf', 'gsdfgsdfg', 'dfsgdsgdsf', '09-12-2017_1512794802.jpg', 6, 3, 0, 0, '', '09-12-2017_15127948021.jpg', 1),
(14, 'Sahana parvin', '17014', '567567', '6575567', 'a14@gmail.com', '2017-12-06', 1, 3, 2, 4, 'dsfgdsf', 'gdfsgds', '567', '2017-12-28', 'fgfdgds', 'fgsdf', 'gsdfgdsf', '09-12-2017_1512795046.jpg', 2, 4, 0, 0, '', '09-12-2017_15127950461.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_bonus_info`
--

CREATE TABLE `hr_emp_bonus_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `department_id` int(10) NOT NULL,
  `shift_id` int(10) NOT NULL,
  `section_id` int(10) NOT NULL,
  `bonus_type_id` int(10) NOT NULL,
  `amount_type_id` int(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `year` varchar(6) NOT NULL,
  `month` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_child_info`
--

CREATE TABLE `hr_emp_child_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `child_name` varchar(200) NOT NULL,
  `gender_id` int(10) NOT NULL,
  `profession_id` int(10) NOT NULL,
  `class` varchar(60) NOT NULL,
  `institute` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_child_info`
--

INSERT INTO `hr_emp_child_info` (`id`, `emp_id`, `child_name`, `gender_id`, `profession_id`, `class`, `institute`) VALUES
(1, '17001', 'Huzaifa Bin Sharif', 1, 1, 'Class One', 'DDI'),
(2, '17001', 'Huzaifa', 3, 5, 'Class Two', 'DD'),
(3, '17001', 'KK', 3, 5, 'Class Three', 'DD'),
(4, '17002', 'LL', 2, 5, 'Class Four', 'DD'),
(5, '17003', 'Kalam', 3, 5, 'Class Five', 'KK'),
(6, '17003', 'LL', 3, 5, 'Class Six', 'DD');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_contact_info`
--

CREATE TABLE `hr_emp_contact_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `present_address` varchar(500) NOT NULL,
  `present_post_office` varchar(100) NOT NULL,
  `present_post_code` varchar(10) NOT NULL,
  `present_division_id` int(10) NOT NULL,
  `present_district_id` int(10) NOT NULL,
  `present_thana_id` int(10) NOT NULL,
  `present_email` varchar(100) NOT NULL,
  `present_phone` varchar(20) NOT NULL,
  `present_mobile` varchar(20) NOT NULL,
  `is_address_same` int(2) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `permanent_post_office` varchar(11) NOT NULL,
  `permanent_post_code` varchar(11) NOT NULL,
  `permanent_division_id` int(11) NOT NULL,
  `permanent_district_id` int(11) NOT NULL,
  `permanent_thana_id` int(11) NOT NULL,
  `permanent_email` varchar(60) NOT NULL,
  `permanent_phone` varchar(16) NOT NULL,
  `permanent_mobile` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_contact_info`
--

INSERT INTO `hr_emp_contact_info` (`id`, `emp_id`, `present_address`, `present_post_office`, `present_post_code`, `present_division_id`, `present_district_id`, `present_thana_id`, `present_email`, `present_phone`, `present_mobile`, `is_address_same`, `permanent_address`, `permanent_post_office`, `permanent_post_code`, `permanent_division_id`, `permanent_district_id`, `permanent_thana_id`, `permanent_email`, `permanent_phone`, `permanent_mobile`) VALUES
(1, '17001', 'A', 'A', 'A', 1, 1, 1, 'A', 'AA', 'A', 1, 'A', 'A', 'A', 1, 1, 1, 'A', 'A', 'A'),
(2, '17002', 'A', 'A', 'A', 1, 1, 1, 'A', 'A', 'A', 1, 'A', 'A', 'A', 1, 1, 1, 'A', 'A', 'A'),
(3, '17002', 'D', 'D', 'D', 3, 2, 6, 'D', 'D', 'D', 2, 'H', 'H', 'H', 3, 2, 5, 'H', 'H', 'H'),
(4, '17003', 'U', 'U', 'U', 3, 2, 4, 'U', 'U', 'U', 1, '', '', '', 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_co_curricular_activities`
--

CREATE TABLE `hr_emp_co_curricular_activities` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_co_curricular_activities`
--

INSERT INTO `hr_emp_co_curricular_activities` (`id`, `emp_id`, `description`) VALUES
(1, '17001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, '17002', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, '17003', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4, '17004', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(5, '17005', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(6, '17006', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(7, '17007', '<span style=\"background-color:rgb(245, 245, 245); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:14px\">ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>'),
(8, '17007', '<span style=\"background-color:rgb(245, 245, 245); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:14px\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_experience_info`
--

CREATE TABLE `hr_emp_experience_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `institute` varchar(200) NOT NULL,
  `business` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `joined_on` varchar(16) NOT NULL,
  `release_on` varchar(16) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `area_of_concentration` varchar(500) NOT NULL,
  `position_hold` varchar(100) NOT NULL,
  `job_details` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_experience_info`
--

INSERT INTO `hr_emp_experience_info` (`id`, `emp_id`, `institute`, `business`, `department`, `joined_on`, `release_on`, `duration`, `area_of_concentration`, `position_hold`, `job_details`) VALUES
(1, '17001', 'dsfgg', 'dsg', 'dfgdf', '2018-01-01', '2018-01-20', '20', 'gdfgfdgdf', 'dsfgdfg', 'dsfgdfgdf'),
(2, '17001', 'fdgdf', 'gdsfgfdsg', 'fdsgdfs', '2018-01-01', '2018-01-31', '8', 'dgh', 'fghf', ''),
(3, '17003', 'fdgh', 'fghfgh', 'fgh', '2018-01-31', '2018-01-30', '2', 'dfghfg', 'hfdgh', 'fghdfhfghfgh'),
(4, '17003', 'ng', 'jghj', 'gjghj', '2018-01-01', '2018-01-02', '2', 'gfjhhg', 'jhg', ''),
(5, '17004', 'ghjgfjh', 'gfjhghj', 'gfjhh', '2018-01-04', '2018-01-06', '3', 'gjfgjg', 'hgh', 'jhghgh'),
(6, '17005', 'fghfg', 'hfdhfg', 'hfghdfgh', '2016-01-01', '2018-12-31', '1096', 'fghgfg', 'hgfg', ''),
(7, '17005', 'hfdghg', 'fgfggfh', 'ghggf', '2016-01-08', '2018-01-24', '748', 'gfh', 'gfg', 'fghfg gh gh ghghgfhfg'),
(8, '17006', 'bvcvb ', 'gfjgh', 'fgjhhg', '2017-01-01', '2018-01-24', '389', 'gjh', 'ghj', ''),
(9, '17006', 'ghj', 'hg', 'jgfjhfgj', '2018-01-03', '2018-01-31', '29', 'fgj', 'h', 'jhgj'),
(10, '17007', 'fghfdghd', 'fhdfhdf', 'hfdhfdhfg', '2018-01-01', '2018-01-31', '31', 'fdgh', 'ffhfgh', ''),
(11, '17007', 'gfhgh ', 'gfhghghfgh', 'ghjh', '2015-11-30', '2018-01-30', '793', 'hgjg', 'gjgfjghgfh', 'fgjgfgh');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_family_info`
--

CREATE TABLE `hr_emp_family_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `spouse_name` varchar(100) NOT NULL,
  `profession_id` int(10) NOT NULL,
  `organization` varchar(200) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `total_family_members` int(4) NOT NULL,
  `no_of_other_dependents` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_family_info`
--

INSERT INTO `hr_emp_family_info` (`id`, `emp_id`, `spouse_name`, `profession_id`, `organization`, `designation_id`, `contact_no`, `total_family_members`, `no_of_other_dependents`) VALUES
(1, '17001', 'sdfasdf', 1, 'dfgfd', 1, '5654645645', 10, 5),
(2, '17002', 'Bonni', 4, 'house', 2, '345432543', 12, 12),
(3, '17002', 'gfdg', 4, 'dsfgdf', 2, '565', 50, 5),
(4, '17003', 'dsfgdsf', 4, 'sdfgdsf', 1, '567657', 6, 5),
(5, '17004', 'a', 5, 'sdgfd', 3, '546546', 12, 12),
(6, '17005', 'B', 4, 'DD', 2, '123456', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_job_info`
--

CREATE TABLE `hr_emp_job_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `department_id` int(10) NOT NULL,
  `shift_id` int(10) NOT NULL,
  `section_id` int(10) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `joining_date` varchar(16) NOT NULL,
  `released_note` varchar(500) NOT NULL,
  `date` varchar(14) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_job_info`
--

INSERT INTO `hr_emp_job_info` (`id`, `emp_id`, `department_id`, `shift_id`, `section_id`, `designation_id`, `joining_date`, `released_note`, `date`, `status`) VALUES
(1, '17001', 1, 1, 3, 1, '2017-01-01', '', '', 1),
(2, '17002', 5, 1, 3, 2, '2017-12-01', '', '', 1),
(3, '17003', 4, 1, 3, 1, '2017-12-10', '', '', 1),
(4, '17004', 2, 1, 3, 2, '2017-12-10', '', '', 1),
(5, '17005', 4, 1, 3, 2, '2017-12-26', '', '', 1),
(6, '17006', 4, 1, 3, 3, '2017-12-05', '', '', 1),
(7, '17007', 4, 1, 3, 2, '2017-12-12', '', '', 1),
(8, '17008', 4, 1, 3, 2, '2017-12-11', '', '', 1),
(9, '17009', 2, 1, 4, 1, '2017-12-26', '', '', 1),
(10, '17010', 3, 1, 3, 1, '2017-12-27', '', '', 1),
(11, '17011', 2, 1, 3, 1, '2017-12-12', '', '', 1),
(12, '17012', 2, 1, 4, 1, '2017-12-20', '', '', 1),
(13, '17013', 1, 1, 3, 1, '2017-12-06', '', '', 1),
(14, '17014', 5, 1, 4, 2, '2017-12-13', '', '', 1),
(15, '17015', 4, 1, 3, 2, '2017-12-12', '', '', 1),
(16, '17016', 3, 1, 3, 1, '2017-12-13', '', '', 1),
(17, '17017', 4, 1, 3, 1, '2017-12-12', '', '', 1),
(18, '17018', 4, 1, 3, 3, '2017-12-12', '', '', 1),
(19, '17019', 3, 1, 3, 2, '2017-12-15', '', '', 1),
(20, '17020', 3, 1, 3, 1, '2017-12-12', '', '', 1),
(21, '17021', 3, 1, 3, 2, '2017-12-19', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_job_posting`
--

CREATE TABLE `hr_emp_job_posting` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `basic_salary` varchar(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `shift_id` int(10) NOT NULL,
  `section_id` int(10) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `job_type_id` int(10) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `joining_date` varchar(16) NOT NULL,
  `confirmation_date` varchar(16) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_job_posting`
--

INSERT INTO `hr_emp_job_posting` (`id`, `emp_id`, `basic_salary`, `department_id`, `shift_id`, `section_id`, `designation_id`, `job_type_id`, `post_name`, `joining_date`, `confirmation_date`, `status`) VALUES
(1, '17001', '50000', 4, 1, 3, 1, 0, 'manager', '2017-10-10', '2017-10-10', 0),
(2, '17002', '50000', 4, 1, 3, 2, 0, 'Officer', '2017-12-01', '2017-12-31', 1),
(3, '17003', '20000', 2, 1, 3, 2, 0, 'manager', '2017-12-11', '2017-12-30', 1),
(4, '17004', '40000', 4, 1, 3, 2, 0, 'md', '2017-12-06', '2017-12-27', 1),
(5, '17005', '60000', 4, 1, 3, 2, 0, 'dmd', '2017-12-11', '2017-12-30', 1),
(6, '17006', '70000', 4, 1, 3, 3, 0, 'md', '2017-12-06', '2017-12-28', 1),
(7, '17007', '80000', 5, 1, 3, 2, 0, 'manager', '2017-12-11', '2017-12-29', 1),
(8, '17008', '40000', 4, 1, 3, 3, 0, 'md', '2017-12-11', '2017-12-30', 1),
(9, '17009', '45100', 4, 1, 2, 2, 0, 'DJ', '2017-12-12', '2017-12-31', 1),
(10, '17010', '54020', 5, 2, 5, 2, 0, 'MD', '2017-12-12', '2017-12-30', 1),
(11, '17011', '78000', 4, 2, 5, 2, 0, 'MD', '2017-12-12', '2017-12-29', 1),
(12, '17012', '4500', 3, 1, 4, 2, 0, 'MD', '2017-12-13', '2017-12-27', 1),
(13, '17001', '12500', 5, 1, 2, 2, 0, 'DD', '2017-12-28', '2017-12-29', 0),
(14, '17001', '15000', 4, 2, 5, 1, 0, 'LL', '2017-12-30', '2018-01-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_loan_info`
--

CREATE TABLE `hr_emp_loan_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `loan_type_id` int(10) NOT NULL,
  `issue_date` varchar(16) NOT NULL,
  `loan_amount` varchar(10) NOT NULL,
  `no_of_installment` int(10) NOT NULL,
  `amount_of_installment` int(10) NOT NULL,
  `deduction_year` varchar(6) NOT NULL,
  `deduction_month` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_nominee_info`
--

CREATE TABLE `hr_emp_nominee_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `spouse_name` varchar(100) NOT NULL,
  `national_id` varchar(60) NOT NULL,
  `passport_number` varchar(60) NOT NULL,
  `present_address` varchar(200) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `percent` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_nominee_info`
--

INSERT INTO `hr_emp_nominee_info` (`id`, `emp_id`, `name`, `father_name`, `mother_name`, `spouse_name`, `national_id`, `passport_number`, `present_address`, `permanent_address`, `percent`) VALUES
(1, '17001', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 'S', '100'),
(2, '17001', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '10'),
(5, '17007', 'K', 'K', 'K', 'K', 'K', 'K', 'KD', 'KD', 'K'),
(6, '17002', 'm', 'm', 'm', 'm', 'm', 'm', 'mD', 'mD', 'm'),
(7, '17002', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A'),
(8, '17001', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 'S', '20'),
(9, '17003', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A'),
(10, '17004', 'W', 'W', 'W', 'W', 'W', 'W', 'W', 'W', 'W'),
(11, '17005', 'W', 'W', 'W', 'W', 'W', 'W', 'W', 'W', 'W'),
(12, '17006', 'Q', 'Q', 'Q', 'Q', 'Q', 'Q', 'Q', 'Q', 'Q');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_previous_job_history_info`
--

CREATE TABLE `hr_emp_previous_job_history_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `organization_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `from_date` varchar(20) NOT NULL,
  `to_date` varchar(20) NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_previous_job_history_info`
--

INSERT INTO `hr_emp_previous_job_history_info` (`id`, `emp_id`, `organization_name`, `address`, `position`, `job_type`, `from_date`, `to_date`, `duration`) VALUES
(1, '17001', 'f', 'f', 'fghf', 'fdgfdgfd', '2018-01-01', '2018-01-25', '25'),
(2, '17001', 'gdsfg', 'd', 'dsfgdsfgdf', 'f', '2017-01-06', '2018-01-11', '371'),
(3, '17001', 'fh', 'd', 'fgfg', 'f', '2016-01-01', '2018-01-31', '762'),
(4, '17002', 'fhdf', 'fghff', 'hfdhf', 'dghfdg', '2018-01-18', '2018-01-31', '14'),
(5, '17003', 'fghfgh', 'fghfg', 'dfghdfg', 'dfhfg', '2018-01-04', '2018-01-24', '21'),
(6, '17004', 'fghf', 'fdghfdfg', 'ghdfgh', 'fdf', '2018-01-03', '2018-01-24', '22'),
(7, '17005', 'fdgdsfg', 'dfgdsfgdf', 'sdfgsd', 'fgdfsgdf', '2017-01-06', '2018-01-24', '384');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_reference_info`
--

CREATE TABLE `hr_emp_reference_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_emp_reference_info`
--

INSERT INTO `hr_emp_reference_info` (`id`, `emp_id`, `name`, `designation`, `organization`, `address`, `email`, `phone`, `mobile`) VALUES
(1, '17001', 'A', 'wwr', 'wer', 'ertwer', 'wert', 'wert', 'werter'),
(2, '17001', 'b', 'S', 'S', 'S', 'S', 'S', 'S'),
(3, '17001', 'b', 'S', 'S', 'S', 'S', 'S', 'S'),
(4, '17002', 'h', 'Q', 'Q', 'Q', 'Q', 'Q', 'Q'),
(5, '17002', 'h', 'W', 'W', 'W', 'W', 'W', 'W'),
(6, '17003', 'h', 'Q', 'Q', 'W', 'W', 'W', 'W'),
(7, '17003', 'h', 'W', 'W', 'W', 'W', 'W', 'W'),
(8, '17003', 'h', 'W', 'W', 'W', 'W', 'W', 'W'),
(9, '17004', '', 'E', 'E', 'E', 'E', 'E', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `hr_leave`
--

CREATE TABLE `hr_leave` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `leave_type_id` int(10) NOT NULL,
  `from_date` varchar(14) NOT NULL,
  `to_date` varchar(14) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `leave_reason` varchar(500) NOT NULL,
  `attachment_file` varchar(100) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_leave`
--

INSERT INTO `hr_leave` (`id`, `emp_id`, `leave_type_id`, `from_date`, `to_date`, `duration`, `leave_reason`, `attachment_file`, `employee_id`, `status`) VALUES
(1, '17010', 1, '2018-01-01', '2018-01-03', '3', 'Personal', '', '17005', '0'),
(2, '17004', 2, '2018-01-01', '2018-01-10', '10', 'ff', '31-12-2017_1514739516.docx', '17006', '100'),
(3, '17010', 3, '2018-01-01', '2018-01-04', '4', 'Personal', '', '17005', '0'),
(5, '17004', 3, '2018-01-03', '2018-01-06', '4', 'N/A', '06-01-2018_1515248722.jpg', '17020', '6'),
(6, '17011', 3, '2018-01-09', '2018-01-12', '4', 'Personal', '09-01-2018_1515512476.docx', '17020', '6'),
(7, '17011', 2, '2018-01-15', '2018-01-18', '4', 'Personal', '09-01-2018_1515512507.docx', '17020', '6'),
(8, '17012', 2, '2018-01-10', '2018-01-12', '3', 'gg', '09-01-2018_1515512550.docx', '17020', ''),
(9, '17020', 1, '2018-01-09', '2018-01-30', '22', 'dd', '09-01-2018_1515512573.docx', '17020', ''),
(10, '17012', 2, '2018-01-10', '2018-01-18', '9', 'gg', '09-01-2018_1515512605.docx', '17020', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_leave_comment`
--

CREATE TABLE `hr_leave_comment` (
  `id` int(10) NOT NULL,
  `leave_id` int(10) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_leave_comment`
--

INSERT INTO `hr_leave_comment` (`id`, `leave_id`, `user_id`, `comment`, `status`) VALUES
(16, 2, '17001', 'Forward', 1),
(17, 2, '17003', 'Reject', 3),
(18, 2, '17001', 'Yes', 1),
(19, 2, '17003', 'Forward', 1),
(20, 2, '17002', 'reject', 3),
(21, 2, '17003', 'Approve', 2),
(22, 5, '17001', 'Forward comment', 1),
(23, 6, '17001', 'fgdgdf', 1),
(24, 7, '17001', 'fdgfdgfd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_research_and_publication`
--

CREATE TABLE `hr_research_and_publication` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `title_article` varchar(100) NOT NULL,
  `journal_name` varchar(100) NOT NULL,
  `publish_by` varchar(100) NOT NULL,
  `journal_type` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `issn_number` varchar(20) NOT NULL,
  `published_date` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_research_and_publication`
--

INSERT INTO `hr_research_and_publication` (`id`, `emp_id`, `title_article`, `journal_name`, `publish_by`, `journal_type`, `country`, `issn_number`, `published_date`) VALUES
(1, '17001', 'gdsfgdfg', 'dfsgdsfgdfs', 'dfsgdsfgdf', '1', 'fdsgfdsgfd', '21456321', '2018-01-31'),
(2, '17001', 'D', 'D', 'D', '0', 'A', 'A', '2018-01-30'),
(3, '17002', 'A', 'A', 'A', '0', 'A', 'A', '2018-01-03'),
(4, '17003', 'f', 'f', 'f', '0', 'f', 'f', '2018-01-10'),
(5, '17003', 'g', 'g', 'g', '0', 'g', 'g', '2018-01-24'),
(6, '17004', 'h', 'h', 'h', 'bangladesh', 'h', 'h', '2018-01-02'),
(7, '17004', 'h', 'h', 'h', 'national', 'h', 'h', '2018-01-09'),
(8, '17005', 'f', 'f', 'f', '0', 'f', 'f', '2018-01-02'),
(9, '17005', '', 'f', 'f', '0', 'ff', 'f', '2018-01-02'),
(10, '17006', 'f', 'f', 'f', '0', 'f', 'f', '2018-01-24'),
(11, '17007', 'f', 'f', 'f', '0', 'f', 'f', '2018-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `hr_salary_basic_info`
--

CREATE TABLE `hr_salary_basic_info` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `salary_type_id` int(10) NOT NULL,
  `salary_categoey_id` int(10) NOT NULL,
  `payment_method_id` int(10) NOT NULL,
  `basic` varchar(100) NOT NULL,
  `house_rent` varchar(100) NOT NULL,
  `house_rent_type` int(10) NOT NULL,
  `medical` varchar(100) NOT NULL,
  `medical_type` int(10) NOT NULL,
  `conveyance` varchar(100) NOT NULL,
  `conveyance_type` int(10) NOT NULL,
  `gross_total` varchar(100) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `tax_type` int(10) NOT NULL,
  `extra_duty` varchar(100) NOT NULL,
  `provident_fund` varchar(100) NOT NULL,
  `provident_fund_type` int(10) NOT NULL,
  `charge_allowance` varchar(100) NOT NULL,
  `charge_allowance_type` int(10) NOT NULL,
  `welfare_fund` varchar(100) NOT NULL,
  `welfare_fund_type` int(10) NOT NULL,
  `other` varchar(100) NOT NULL,
  `other_type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_salary_info`
--

CREATE TABLE `hr_salary_info` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `emp_name` varchar(1000) NOT NULL,
  `department` varchar(100) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `joining_date` varchar(20) NOT NULL,
  `days_of_month` varchar(10) NOT NULL,
  `days_of_attend` varchar(10) NOT NULL,
  `days_of_weekend` varchar(10) NOT NULL,
  `days_of_holiday` varchar(10) NOT NULL,
  `days_of_medical` int(11) NOT NULL,
  `days_of_casual_leave` varchar(10) NOT NULL,
  `days_of_meratnity_leave` varchar(10) NOT NULL,
  `days_of_absent` varchar(10) NOT NULL,
  `total_payable_days` varchar(10) NOT NULL,
  `basic_salary` varchar(100) NOT NULL,
  `house_rent` varchar(10) NOT NULL,
  `medical` varchar(10) NOT NULL,
  `conveyance` varchar(10) NOT NULL,
  `arrear` varchar(10) NOT NULL,
  `extra_duty` varchar(100) NOT NULL,
  `other` varchar(10) NOT NULL,
  `total_addition` varchar(100) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `provident_fund` varchar(100) NOT NULL,
  `charge_allowance` varchar(100) NOT NULL,
  `welfare_fund` varchar(100) NOT NULL,
  `other_deduction` varchar(100) NOT NULL,
  `loan` varchar(100) NOT NULL,
  `advance` varchar(100) NOT NULL,
  `absent` varchar(100) NOT NULL,
  `stamp` varchar(10) NOT NULL,
  `deduction_total` varchar(100) NOT NULL,
  `net_payable_total` varchar(100) NOT NULL,
  `payment_type` int(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(4) NOT NULL,
  `salary_type_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_shift_schedule`
--

CREATE TABLE `hr_shift_schedule` (
  `id` int(10) NOT NULL,
  `shift_id` int(10) NOT NULL,
  `in_time` varchar(10) NOT NULL,
  `out_time` varchar(10) NOT NULL,
  `late_time` varchar(10) NOT NULL,
  `early_out` varchar(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_shift_schedule`
--

INSERT INTO `hr_shift_schedule` (`id`, `shift_id`, `in_time`, `out_time`, `late_time`, `early_out`, `status`) VALUES
(1, 1, '9:00', '6:00', '9:30', '5:50', 1),
(2, 2, '9:30', '6:00', '10:00', '5:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_training`
--

CREATE TABLE `hr_training` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `training_title` varchar(100) NOT NULL,
  `topics_covered` varchar(200) NOT NULL,
  `institute` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `duration` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_training`
--

INSERT INTO `hr_training` (`id`, `emp_id`, `training_title`, `topics_covered`, `institute`, `country`, `location`, `duration`) VALUES
(1, '17001', 'dfg', 'gdfs', 'dfgds', 'hghg', 'fd', 'ghfgdf'),
(2, '17001', 'ghfg', 'hfghf', 'ghf', 'ghfg', 'hfgh', 'fghfg'),
(3, '17001', 'fhfghfd', 'ghfd', 'ghfdgh', 'fdhfd', 'fdgh', '2'),
(4, '17001', 'dfg', 'gdfs', 'dfgds', 'hghg', 'fd', 'ghfgdf'),
(5, '17002', 'f', 'f', 'f', 'f', 'f', '2'),
(6, '17002', 'f', 'f', 'f', 'f', 'f', '2'),
(7, '17003', 'dfsg', 'dsfg', 'sdfg', 'dsfg', 'dsgfds', '2'),
(8, '17004', 'vbxb', 'cxvbcx', 'vbcxv', 'bxcvbcx', 'vcxvbc', '4'),
(9, '17004', 'xcvb', 'xcvb', 'cxvb', 'xcvbx', 'cvbxcb', '5'),
(10, '17005', 'xcvb', 'cxvb', 'cxvb', 'cxvb', 'xcb', '1'),
(11, '17006', 'cxvbc', 'cvbxc', 'xvbx', 'vbcx', 'vbxcv', '3');

-- --------------------------------------------------------

--
-- Table structure for table `master_bank`
--

CREATE TABLE `master_bank` (
  `id` int(10) NOT NULL,
  `bank_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bank`
--

INSERT INTO `master_bank` (`id`, `bank_name`) VALUES
(1, 'AB Bank'),
(2, 'Islami Bank'),
(3, 'BRACK BANK'),
(4, 'EBL Bank');

-- --------------------------------------------------------

--
-- Table structure for table `master_bank_branch`
--

CREATE TABLE `master_bank_branch` (
  `id` int(10) NOT NULL,
  `bank_id` int(10) NOT NULL,
  `bank_branch_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bank_branch`
--

INSERT INTO `master_bank_branch` (`id`, `bank_id`, `bank_branch_name`) VALUES
(1, 1, 'Mirpur'),
(3, 2, 'Mirpur');

-- --------------------------------------------------------

--
-- Table structure for table `master_blood_group`
--

CREATE TABLE `master_blood_group` (
  `id` int(10) NOT NULL,
  `blood_group_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_blood_group`
--

INSERT INTO `master_blood_group` (`id`, `blood_group_name`) VALUES
(1, 'O+'),
(2, 'O-'),
(3, 'A+'),
(4, 'A-'),
(5, 'B+'),
(6, 'B-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `master_board`
--

CREATE TABLE `master_board` (
  `id` int(10) NOT NULL,
  `board_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_board`
--

INSERT INTO `master_board` (`id`, `board_name`) VALUES
(1, 'Dhaka Board'),
(2, 'Rajshahi Board'),
(3, 'Comilla Board'),
(4, 'Jessore Board'),
(5, 'Chittagong Board'),
(6, 'Barisal Board'),
(7, 'Sylhet Board'),
(8, 'Dinajpur Board'),
(9, 'Madrasah Board'),
(10, 'Technical Board');

-- --------------------------------------------------------

--
-- Table structure for table `master_department`
--

CREATE TABLE `master_department` (
  `id` int(10) NOT NULL,
  `department_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_department`
--

INSERT INTO `master_department` (`id`, `department_name`) VALUES
(1, 'Audit'),
(2, 'Chief Engineer'),
(3, 'HR'),
(4, 'Accounting'),
(5, 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `master_designation`
--

CREATE TABLE `master_designation` (
  `id` int(10) NOT NULL,
  `designation_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_designation`
--

INSERT INTO `master_designation` (`id`, `designation_name`) VALUES
(1, 'Accounts officer'),
(2, 'System Analyst'),
(3, 'MD');

-- --------------------------------------------------------

--
-- Table structure for table `master_district`
--

CREATE TABLE `master_district` (
  `id` int(10) NOT NULL,
  `division_id` int(10) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_district`
--

INSERT INTO `master_district` (`id`, `division_id`, `district_name`) VALUES
(1, 3, 'Faridpur'),
(2, 3, 'Dhaka'),
(3, 3, 'Gazipur'),
(4, 3, 'Gopalganj'),
(5, 3, 'Jamalpur'),
(6, 3, 'Kishoreganj'),
(7, 3, 'Madaripur'),
(8, 3, 'Manikganj'),
(9, 3, 'Munshiganj'),
(10, 3, 'Mymensingh'),
(11, 3, 'Narayanganj'),
(12, 3, 'Norshingdi'),
(13, 3, 'Netrokona'),
(14, 3, 'Rajbari'),
(15, 3, 'Shariatpur'),
(16, 3, 'Sherpur'),
(17, 3, 'Tangail'),
(18, 2, 'Bagerhat'),
(19, 2, 'Chuadanga'),
(20, 2, 'Jessore'),
(21, 2, 'Jhenaidah'),
(22, 2, 'Khulna'),
(23, 2, 'Kushtia'),
(24, 2, 'Magura'),
(25, 2, 'Meherpur'),
(26, 2, 'Narail'),
(27, 2, 'Satkhira');

-- --------------------------------------------------------

--
-- Table structure for table `master_division`
--

CREATE TABLE `master_division` (
  `id` int(10) NOT NULL,
  `division_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_division`
--

INSERT INTO `master_division` (`id`, `division_name`) VALUES
(1, 'Rajshahi '),
(2, 'Khulna'),
(3, 'Dhaka'),
(4, 'Sylhet'),
(5, 'Barisal '),
(6, 'Chittagong'),
(7, 'Rangpur ');

-- --------------------------------------------------------

--
-- Table structure for table `master_exam_degree`
--

CREATE TABLE `master_exam_degree` (
  `id` int(10) NOT NULL,
  `degree_name` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_exam_degree`
--

INSERT INTO `master_exam_degree` (`id`, `degree_name`) VALUES
(1, 'A+'),
(2, 'A'),
(3, 'A-'),
(4, 'B+'),
(5, 'B'),
(6, 'B-'),
(7, 'C+'),
(8, 'C'),
(9, 'C-');

-- --------------------------------------------------------

--
-- Table structure for table `master_exam_name`
--

CREATE TABLE `master_exam_name` (
  `id` int(10) NOT NULL,
  `exam_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_exam_name`
--

INSERT INTO `master_exam_name` (`id`, `exam_name`) VALUES
(1, 'S.S.C'),
(2, 'H.S.C');

-- --------------------------------------------------------

--
-- Table structure for table `master_freedom_fighter_relation`
--

CREATE TABLE `master_freedom_fighter_relation` (
  `id` int(10) NOT NULL,
  `relation_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_freedom_fighter_relation`
--

INSERT INTO `master_freedom_fighter_relation` (`id`, `relation_name`) VALUES
(1, 'Son'),
(2, 'Doughter');

-- --------------------------------------------------------

--
-- Table structure for table `master_gender`
--

CREATE TABLE `master_gender` (
  `id` int(10) NOT NULL,
  `gender_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_gender`
--

INSERT INTO `master_gender` (`id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `master_holiday`
--

CREATE TABLE `master_holiday` (
  `id` int(10) NOT NULL,
  `holiday_name` varchar(100) NOT NULL,
  `start_date` varchar(12) NOT NULL,
  `end_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_holiday`
--

INSERT INTO `master_holiday` (`id`, `holiday_name`, `start_date`, `end_date`) VALUES
(1, 'Sheikh Mujibur Rahman’s birthday', '2017-01-10', '2017-01-10'),
(2, 'Language Martyrs\' Day', '2017-01-10', '2017-01-10'),
(3, 'Independence Day', '2017-20-20', '2017-20-20');

-- --------------------------------------------------------

--
-- Table structure for table `master_job_type`
--

CREATE TABLE `master_job_type` (
  `id` int(10) NOT NULL,
  `job_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_job_type`
--

INSERT INTO `master_job_type` (`id`, `job_type`) VALUES
(1, 'Daily Basis'),
(2, 'Permanent'),
(3, 'Contractual'),
(4, 'Deputed');

-- --------------------------------------------------------

--
-- Table structure for table `master_leave_type`
--

CREATE TABLE `master_leave_type` (
  `id` int(10) NOT NULL,
  `leave_name` varchar(30) NOT NULL,
  `duration` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_leave_type`
--

INSERT INTO `master_leave_type` (`id`, `leave_name`, `duration`) VALUES
(1, 'Maternity Leave', '20'),
(2, 'Casual Leave', '10'),
(3, 'Earned Leave', '23');

-- --------------------------------------------------------

--
-- Table structure for table `master_loan_type`
--

CREATE TABLE `master_loan_type` (
  `id` int(10) NOT NULL,
  `loan_type_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_marital_status`
--

CREATE TABLE `master_marital_status` (
  `id` int(10) NOT NULL,
  `marital_status_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_marital_status`
--

INSERT INTO `master_marital_status` (`id`, `marital_status_name`) VALUES
(1, 'Married'),
(2, 'Unmarried'),
(3, 'Separated'),
(4, 'Single'),
(5, 'Widowed');

-- --------------------------------------------------------

--
-- Table structure for table `master_menu`
--

CREATE TABLE `master_menu` (
  `id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `menu_sort` int(3) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_menu`
--

INSERT INTO `master_menu` (`id`, `module_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_sort`, `status`) VALUES
(1, 1, 'User Configuration', 'javascript:;', 'fa fa-share', 1, 1),
(2, 1, 'Master Configuration', 'javascript:;', 'fa fa-share', 2, 1),
(3, 2, 'Employee Info', 'javascript:;', 'fa fa-share', 1, 1),
(4, 2, 'Attendance', 'javascript:;', 'fa fa-share', 2, 1),
(5, 2, 'Leave Management', 'javascript:;', 'fa fa-share', 3, 1),
(6, 2, 'Roster', 'javascript:;', 'fa fa-share', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_module`
--

CREATE TABLE `master_module` (
  `id` int(10) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `module_url` varchar(100) NOT NULL,
  `module_icon` varchar(100) NOT NULL,
  `sort` int(3) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_module`
--

INSERT INTO `master_module` (`id`, `module_name`, `module_url`, `module_icon`, `sort`, `status`) VALUES
(1, 'Configuration', 'javacsript:;', 'fa fa-fw fa-sitemap', 1, 1),
(2, 'HR', 'javacsript:;', 'fa fa-fw fa-sitemap', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_profession`
--

CREATE TABLE `master_profession` (
  `id` int(10) NOT NULL,
  `profession_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_profession`
--

INSERT INTO `master_profession` (`id`, `profession_name`) VALUES
(1, 'Student'),
(2, 'Private Service'),
(3, 'Government Service'),
(4, 'Housewife'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `master_religion`
--

CREATE TABLE `master_religion` (
  `id` int(10) NOT NULL,
  `religion_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_religion`
--

INSERT INTO `master_religion` (`id`, `religion_name`) VALUES
(1, 'Muslim'),
(2, 'Hindu'),
(3, 'Christian'),
(4, 'Buddist');

-- --------------------------------------------------------

--
-- Table structure for table `master_role`
--

CREATE TABLE `master_role` (
  `id` int(10) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `leave_status` int(2) NOT NULL,
  `loan_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_role`
--

INSERT INTO `master_role` (`id`, `role_name`, `status`, `leave_status`, `loan_status`) VALUES
(1, 'Admin', 1, 0, 0),
(2, 'Superadmin', 1, 0, 0),
(3, 'Department Head', 1, 0, 0),
(5, 'MD', 1, 1, 0),
(6, 'GM', 1, 1, 0),
(7, 'User', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_section`
--

CREATE TABLE `master_section` (
  `id` int(10) NOT NULL,
  `shift_id` int(10) NOT NULL,
  `section_name` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_section`
--

INSERT INTO `master_section` (`id`, `shift_id`, `section_name`) VALUES
(1, 1, 'D'),
(2, 1, 'C'),
(3, 1, 'A'),
(4, 1, 'B'),
(5, 2, 'A'),
(6, 2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `master_shift`
--

CREATE TABLE `master_shift` (
  `id` int(10) NOT NULL,
  `shift_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_shift`
--

INSERT INTO `master_shift` (`id`, `shift_name`) VALUES
(1, 'Day'),
(2, 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `master_study_group`
--

CREATE TABLE `master_study_group` (
  `id` int(10) NOT NULL,
  `group_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_study_group`
--

INSERT INTO `master_study_group` (`id`, `group_name`) VALUES
(1, 'Science'),
(2, 'Arth'),
(3, 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `master_sub_menu`
--

CREATE TABLE `master_sub_menu` (
  `id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `sub_menu_name` varchar(100) NOT NULL,
  `sub_menu_url` varchar(100) NOT NULL,
  `sub_menu_icon` varchar(100) NOT NULL,
  `sub_menu_sort` int(3) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_sub_menu`
--

INSERT INTO `master_sub_menu` (`id`, `module_id`, `menu_id`, `sub_menu_name`, `sub_menu_url`, `sub_menu_icon`, `sub_menu_sort`, `status`) VALUES
(1, 1, 2, 'Module', 'master/module/all_module', 'fa fa-files-o', 1, 1),
(2, 1, 2, 'Menu', 'master/menu/all_menu', 'fa fa-files-o', 2, 1),
(3, 1, 2, 'Sub-Menu', 'master/sub_menu/all_sub_menu', 'fa fa-files-o', 3, 1),
(4, 1, 1, 'User Role', 'master/user/all_role', 'fa fa-files-o', 1, 1),
(5, 1, 1, 'Create user', 'master/user/all_user', 'fa fa-files-o', 2, 1),
(6, 1, 1, 'User Privilege', 'master/user/all_privilege', 'fa fa-files-o', 3, 1),
(7, 1, 2, 'Division', 'master/division/all_division', 'fa fa-files-o', 4, 1),
(8, 1, 2, 'District', 'master/district/all_district', 'fa fa-files-o', 5, 1),
(9, 1, 2, 'Thana', 'master/thana/all_thana', 'fa fa-files-o', 6, 1),
(10, 1, 2, 'Bank', 'master/bank/all_bank', 'fa fa-files-o', 7, 1),
(11, 1, 2, 'Bank Branch', 'master/bank_branch/all_bank_branch', 'fa fa-files-o', 8, 1),
(12, 1, 2, 'Department', 'master/department/all_department', 'fa fa-files-o', 9, 1),
(13, 1, 2, 'Designation', 'master/designation/all_designation', 'fa fa-files-o', 10, 1),
(15, 1, 2, 'Weekend', 'master/weekend/all_weekend', 'fa fa-files-o', 11, 1),
(16, 1, 2, 'Section', 'master/section/all_section', 'fa fa-files-o', 12, 1),
(17, 1, 2, 'Leave Type', 'master/leave_type/all_leave_type', 'fa fa-files-o', 13, 1),
(18, 1, 2, 'Holiday', 'master/holiday/all_holiday', 'fa fa-files-o', 14, 1),
(19, 2, 3, 'Basic Info', 'hr/emp_basic_info/all_emp_basic_info', 'fa fa-files-o', 3, 1),
(20, 2, 4, 'Monthly Report', 'hr/attendance_report/all_monthly_report', ' fa fa-files-o', 2, 1),
(21, 2, 3, 'Family Info', 'hr/family_info/all_family_info', 'fa fa-files-o', 4, 1),
(22, 2, 3, 'Job Info', 'hr/job_info/all_job_info', 'fa fa-files-o', 1, 1),
(23, 2, 3, 'Job Posting', 'hr/job_posting/all_job_posting', 'fa fa-files-o', 2, 1),
(24, 2, 3, 'Child Info', 'hr/child_info/all_child_info', 'fa fa-files-o', 5, 1),
(25, 2, 3, 'Academic Info', 'hr/academic_info/all_academic_info', 'fa fa-files-o', 6, 1),
(26, 2, 4, 'Create Attendance', 'hr/attendance_info/all_attendance_info', 'fa fa-files-o', 1, 1),
(27, 2, 5, 'Leave Application', 'hr/leave_info/all_leave_info', 'fa fa-files-o', 1, 1),
(28, 2, 3, 'Assigning Dept Head', 'hr/department_head/all_department_head', 'fa fa-files-o', 7, 1),
(29, 2, 6, 'Assigning Weekend', 'hr/weekend_info/all_weekend_info', 'fa fa-files-o', 1, 1),
(30, 2, 6, 'Assigning Roster ', 'hr/roster_info/all_roster_info', 'fa fa-files-o', 2, 1),
(31, 2, 6, 'Shift Schedule', 'hr/shift_schedule/all_shift_schedule', 'fa fa-files-o', 3, 1),
(32, 2, 3, 'Ward and Honour', 'hr/ward_and_honours/all_ward_and_honours', 'fa fa-files-o', 8, 1),
(33, 2, 3, 'Contact Info', 'hr/contact_info/all_contact_info', 'fa fa-files-o', 9, 1),
(34, 2, 3, 'Co-curricular activities', 'hr/co_curricular_activities/all_co_curricular_activities', 'fa fa-files-o', 10, 1),
(35, 2, 3, 'Experience Info', 'hr/experience_info/all_experience_info', 'fa fa-files-o', 11, 1),
(36, 2, 3, 'Nominee Info', 'hr/nominee_info/all_nominee_info', 'fa fa-files-o', 12, 1),
(37, 2, 3, 'Previous Job History', 'hr/previous_job_history_info/all_previous_job_history_info', 'fa fa-files-o', 13, 1),
(38, 2, 3, 'Reference Info', 'hr/reference_info/all_reference_info', 'fa fa-files-o', 14, 1),
(39, 2, 3, 'Research and Publication', 'hr/research_and_publication/all_research_and_publication', 'fa fa-files-o', 15, 1),
(40, 2, 3, 'Training', 'hr/training/all_training', 'fa fa-files-o', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_thana`
--

CREATE TABLE `master_thana` (
  `id` int(10) NOT NULL,
  `division_id` int(10) NOT NULL,
  `district_id` int(10) NOT NULL,
  `thana_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_thana`
--

INSERT INTO `master_thana` (`id`, `division_id`, `district_id`, `thana_name`) VALUES
(2, 3, 2, 'Dohar'),
(3, 3, 2, 'Dhamrai'),
(4, 3, 2, 'Keraniganj'),
(5, 3, 2, 'Savar'),
(6, 3, 2, 'Nawabganj');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id`, `user_name`, `password`, `role_id`, `status`) VALUES
(1, 'admin', '123456', 1, 1),
(2, 'superadmin', '123456', 2, 1),
(3, '17001', '123456', 3, 1),
(4, '17002', '123456', 5, 1),
(5, '17003', '123456', 6, 1),
(6, '17004', '123456', 7, 1),
(7, '17010', '123456', 7, 1),
(8, '17011', '123456', 7, 1),
(9, '17012', '123456', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_weekend`
--

CREATE TABLE `master_weekend` (
  `id` int(10) NOT NULL,
  `weekend_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_weekend`
--

INSERT INTO `master_weekend` (`id`, `weekend_name`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permission`
--

CREATE TABLE `user_role_permission` (
  `id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `sub_menu_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role_permission`
--

INSERT INTO `user_role_permission` (`id`, `module_id`, `menu_id`, `sub_menu_id`, `user_id`, `status`) VALUES
(509, 2, 5, 27, 7, 1),
(510, 2, 5, 27, 3, 1),
(511, 2, 5, 27, 6, 1),
(513, 2, 5, 27, 5, 1),
(820, 2, 3, 19, 1, 1),
(821, 2, 3, 21, 1, 1),
(822, 2, 3, 22, 1, 1),
(823, 2, 3, 23, 1, 1),
(824, 2, 3, 24, 1, 1),
(825, 2, 3, 25, 1, 1),
(826, 2, 3, 28, 1, 1),
(827, 2, 3, 32, 1, 1),
(828, 2, 3, 33, 1, 1),
(829, 2, 3, 34, 1, 1),
(830, 2, 3, 35, 1, 1),
(831, 2, 3, 36, 1, 1),
(832, 2, 3, 37, 1, 1),
(833, 2, 3, 38, 1, 1),
(834, 2, 3, 39, 1, 1),
(835, 2, 3, 40, 1, 1),
(836, 2, 4, 20, 1, 1),
(837, 2, 4, 26, 1, 1),
(838, 2, 5, 27, 1, 1),
(839, 2, 6, 29, 1, 1),
(840, 2, 6, 30, 1, 1),
(841, 2, 6, 31, 1, 1),
(842, 1, 1, 4, 1, 1),
(843, 1, 1, 5, 1, 1),
(844, 1, 1, 6, 1, 1),
(845, 1, 2, 1, 1, 1),
(846, 1, 2, 2, 1, 1),
(847, 1, 2, 3, 1, 1),
(848, 1, 2, 7, 1, 1),
(849, 1, 2, 8, 1, 1),
(850, 1, 2, 9, 1, 1),
(851, 1, 2, 10, 1, 1),
(852, 1, 2, 11, 1, 1),
(853, 1, 2, 12, 1, 1),
(854, 1, 2, 13, 1, 1),
(855, 1, 2, 15, 1, 1),
(856, 1, 2, 16, 1, 1),
(857, 1, 2, 17, 1, 1),
(858, 1, 2, 18, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr_assigning_dept_head`
--
ALTER TABLE `hr_assigning_dept_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_assigning_roster`
--
ALTER TABLE `hr_assigning_roster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_assigning_weekend`
--
ALTER TABLE `hr_assigning_weekend`
  ADD PRIMARY KEY (`emp_id`,`from_date`,`to_date`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `hr_attendance`
--
ALTER TABLE `hr_attendance`
  ADD PRIMARY KEY (`emp_id`,`present_date`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `hr_emp_academic_info`
--
ALTER TABLE `hr_emp_academic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_award_and_honors`
--
ALTER TABLE `hr_emp_award_and_honors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_basic_info`
--
ALTER TABLE `hr_emp_basic_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `hr_emp_bonus_info`
--
ALTER TABLE `hr_emp_bonus_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_child_info`
--
ALTER TABLE `hr_emp_child_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_contact_info`
--
ALTER TABLE `hr_emp_contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_co_curricular_activities`
--
ALTER TABLE `hr_emp_co_curricular_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_experience_info`
--
ALTER TABLE `hr_emp_experience_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_family_info`
--
ALTER TABLE `hr_emp_family_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_job_info`
--
ALTER TABLE `hr_emp_job_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `hr_emp_job_posting`
--
ALTER TABLE `hr_emp_job_posting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_loan_info`
--
ALTER TABLE `hr_emp_loan_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_nominee_info`
--
ALTER TABLE `hr_emp_nominee_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_previous_job_history_info`
--
ALTER TABLE `hr_emp_previous_job_history_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_emp_reference_info`
--
ALTER TABLE `hr_emp_reference_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_leave`
--
ALTER TABLE `hr_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_leave_comment`
--
ALTER TABLE `hr_leave_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_research_and_publication`
--
ALTER TABLE `hr_research_and_publication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_salary_basic_info`
--
ALTER TABLE `hr_salary_basic_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `hr_salary_info`
--
ALTER TABLE `hr_salary_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_shift_schedule`
--
ALTER TABLE `hr_shift_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_training`
--
ALTER TABLE `hr_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_bank`
--
ALTER TABLE `master_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_bank_branch`
--
ALTER TABLE `master_bank_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_blood_group`
--
ALTER TABLE `master_blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_board`
--
ALTER TABLE `master_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_department`
--
ALTER TABLE `master_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_designation`
--
ALTER TABLE `master_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_district`
--
ALTER TABLE `master_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_division`
--
ALTER TABLE `master_division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_exam_degree`
--
ALTER TABLE `master_exam_degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_exam_name`
--
ALTER TABLE `master_exam_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_freedom_fighter_relation`
--
ALTER TABLE `master_freedom_fighter_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_gender`
--
ALTER TABLE `master_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_holiday`
--
ALTER TABLE `master_holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_job_type`
--
ALTER TABLE `master_job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_leave_type`
--
ALTER TABLE `master_leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_loan_type`
--
ALTER TABLE `master_loan_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_marital_status`
--
ALTER TABLE `master_marital_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_menu`
--
ALTER TABLE `master_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_module`
--
ALTER TABLE `master_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_profession`
--
ALTER TABLE `master_profession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_religion`
--
ALTER TABLE `master_religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_role`
--
ALTER TABLE `master_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_section`
--
ALTER TABLE `master_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_shift`
--
ALTER TABLE `master_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_study_group`
--
ALTER TABLE `master_study_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_sub_menu`
--
ALTER TABLE `master_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_thana`
--
ALTER TABLE `master_thana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_weekend`
--
ALTER TABLE `master_weekend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_permission`
--
ALTER TABLE `user_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr_assigning_dept_head`
--
ALTER TABLE `hr_assigning_dept_head`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hr_assigning_roster`
--
ALTER TABLE `hr_assigning_roster`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `hr_assigning_weekend`
--
ALTER TABLE `hr_assigning_weekend`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `hr_attendance`
--
ALTER TABLE `hr_attendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `hr_emp_academic_info`
--
ALTER TABLE `hr_emp_academic_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hr_emp_award_and_honors`
--
ALTER TABLE `hr_emp_award_and_honors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hr_emp_basic_info`
--
ALTER TABLE `hr_emp_basic_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hr_emp_bonus_info`
--
ALTER TABLE `hr_emp_bonus_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_emp_child_info`
--
ALTER TABLE `hr_emp_child_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hr_emp_contact_info`
--
ALTER TABLE `hr_emp_contact_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hr_emp_co_curricular_activities`
--
ALTER TABLE `hr_emp_co_curricular_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `hr_emp_experience_info`
--
ALTER TABLE `hr_emp_experience_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hr_emp_family_info`
--
ALTER TABLE `hr_emp_family_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hr_emp_job_info`
--
ALTER TABLE `hr_emp_job_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `hr_emp_job_posting`
--
ALTER TABLE `hr_emp_job_posting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hr_emp_loan_info`
--
ALTER TABLE `hr_emp_loan_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_emp_nominee_info`
--
ALTER TABLE `hr_emp_nominee_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hr_emp_previous_job_history_info`
--
ALTER TABLE `hr_emp_previous_job_history_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hr_emp_reference_info`
--
ALTER TABLE `hr_emp_reference_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `hr_leave`
--
ALTER TABLE `hr_leave`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hr_leave_comment`
--
ALTER TABLE `hr_leave_comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `hr_research_and_publication`
--
ALTER TABLE `hr_research_and_publication`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hr_salary_basic_info`
--
ALTER TABLE `hr_salary_basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_salary_info`
--
ALTER TABLE `hr_salary_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_shift_schedule`
--
ALTER TABLE `hr_shift_schedule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hr_training`
--
ALTER TABLE `hr_training`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `master_bank`
--
ALTER TABLE `master_bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_bank_branch`
--
ALTER TABLE `master_bank_branch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_blood_group`
--
ALTER TABLE `master_blood_group`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `master_board`
--
ALTER TABLE `master_board`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `master_department`
--
ALTER TABLE `master_department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_designation`
--
ALTER TABLE `master_designation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_district`
--
ALTER TABLE `master_district`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `master_division`
--
ALTER TABLE `master_division`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master_exam_degree`
--
ALTER TABLE `master_exam_degree`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_exam_name`
--
ALTER TABLE `master_exam_name`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_freedom_fighter_relation`
--
ALTER TABLE `master_freedom_fighter_relation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_gender`
--
ALTER TABLE `master_gender`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_holiday`
--
ALTER TABLE `master_holiday`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_job_type`
--
ALTER TABLE `master_job_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_leave_type`
--
ALTER TABLE `master_leave_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_loan_type`
--
ALTER TABLE `master_loan_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_marital_status`
--
ALTER TABLE `master_marital_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_menu`
--
ALTER TABLE `master_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_module`
--
ALTER TABLE `master_module`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_profession`
--
ALTER TABLE `master_profession`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_religion`
--
ALTER TABLE `master_religion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_role`
--
ALTER TABLE `master_role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master_section`
--
ALTER TABLE `master_section`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_shift`
--
ALTER TABLE `master_shift`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_study_group`
--
ALTER TABLE `master_study_group`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_sub_menu`
--
ALTER TABLE `master_sub_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `master_thana`
--
ALTER TABLE `master_thana`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_weekend`
--
ALTER TABLE `master_weekend`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_role_permission`
--
ALTER TABLE `user_role_permission`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=859;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
