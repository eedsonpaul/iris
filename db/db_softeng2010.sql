-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2010 at 12:25 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_softeng2010`
--
CREATE DATABASE IF NOT EXISTS `db_softeng2010` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

USE `db_softeng2010`;

-- --------------------------------------------------------

--
-- Table structure for table `access_levels`
--

CREATE TABLE IF NOT EXISTS `access_levels` (
  `access_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_level_name` char(30) NOT NULL,
  PRIMARY KEY (`access_level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `access_levels`
--

INSERT INTO `access_levels` (`access_level_id`, `access_level_name`) VALUES
(1, 'Student'),
(2, 'Faculty'),
(3, 'System Administrator'),
(4, 'Accounting'),
(5, 'Library'),
(6, 'Cashier'),
(7, 'CSO'),
(8, 'OSA'),
(9, 'Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `accountability`
--

CREATE TABLE IF NOT EXISTS `accountability` (
  `accountability_id` int(11) NOT NULL AUTO_INCREMENT,
  `accountability_type_id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `year_incurred` int(11) NOT NULL,
  `semester_incurred` int(11) NOT NULL,
  `date_added` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `accountability_status` char(7) NOT NULL,
  `date_cleared` int(11) NOT NULL,
  PRIMARY KEY (`accountability_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `accountability`
--

INSERT INTO `accountability` (`accountability_id`, `accountability_type_id`, `student_number`, `details`, `amount_due`, `year_incurred`, `semester_incurred`, `date_added`, `employee_id`, `accountability_status`, `date_cleared`) VALUES
(57, 3, 200700000, 'Rakenrol', 1000000, 2011, 2, 20100930, 1, 'cleared', 20100930),
(61, 1, 200700000, 'cmsc11', 300, 2010, 2, 20101002, 1, 'cleared', 20101002),
(63, 4, 200700000, 'student loan', 100, 2010, 1, 20101002, 1, 'cleared', 20101002),
(70, 5, 200700000, 'lacking envelope', 18, 2010, 2, 20101212, 7, 'cleared', 2147483647),
(69, 4, 200700000, 'student loan', 100, 2010, 1, 20101002, 1, 'cleared', 0),
(68, 5, 200758548, 'lacking envelope', 18, 2010, 1, 20100328, 7, 'cleared', 2147483647),
(76, 3, 200700000, 'cmsc 11 Lab fee', 300, 2010, 1, 20101002, 1, 'cleared', 20101002);

-- --------------------------------------------------------

--
-- Table structure for table `accountability_type`
--

CREATE TABLE IF NOT EXISTS `accountability_type` (
  `accountability_type_id` int(11) NOT NULL,
  `accountability_type` char(30) NOT NULL,
  PRIMARY KEY (`accountability_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountability_type`
--

INSERT INTO `accountability_type` (`accountability_type_id`, `accountability_type`) VALUES
(1, 'Scholarship'),
(2, 'Book'),
(3, 'Other'),
(4, 'SLB'),
(5, 'Envelope w/o Stamp'),
(6, 'NSO Birth Certificate');

-- --------------------------------------------------------

--
-- Table structure for table `adviser_history`
--

CREATE TABLE IF NOT EXISTS `adviser_history` (
  `student_number` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY (`student_number`,`employee_id`,`semester`,`academic_year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adviser_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `building_id` int(11) NOT NULL,
  `building_name` char(10) NOT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`building_id`, `building_name`) VALUES
(1, 'AS'),
(2, 'Undergrad');

-- --------------------------------------------------------

--
-- Table structure for table `clerk`
--

CREATE TABLE IF NOT EXISTS `clerk` (
  `employee_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clerk`
--

INSERT INTO `clerk` (`employee_id`, `unit_id`) VALUES
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `degree_program`
--

CREATE TABLE IF NOT EXISTS `degree_program` (
  `degree_program_id` int(11) NOT NULL,
  `program_code` int(11) NOT NULL,
  `degree_level` char(15) NOT NULL,
  `required_years` tinyint(1) NOT NULL,
  `required_units` smallint(3) NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `major` int(11) NOT NULL,
  `minor` int(11) NOT NULL,
  `degree_title` varchar(255) NOT NULL,
  `credited` int(11) NOT NULL,
  `currently_offered` char(3) NOT NULL,
  `entrance_code` int(11) NOT NULL,
  `enrolment_quota` int(11) NOT NULL,
  `date_proposed` int(11) NOT NULL,
  `date_revised` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  PRIMARY KEY (`degree_program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree_program`
--

INSERT INTO `degree_program` (`degree_program_id`, `program_code`, `degree_level`, `required_years`, `required_units`, `degree_name`, `major`, `minor`, `degree_title`, `credited`, `currently_offered`, `entrance_code`, `enrolment_quota`, `date_proposed`, `date_revised`, `description`, `unit_id`) VALUES
(100, 1212, '4', 4, 141, 'BS in Computer Science', 0, 0, 'Bachelor of Science', 1, 'yes', 10000, 70, 128467366, 128467366, 'bscs', 1),
(2000, 2000, '4', 4, 139, 'BS in Mathematics', 1, 1, 'Bachelor of Science', 1, 'yes', 10000, 50, 128382983, 128389723, 'mathematics circle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `degree_study_plan`
--

CREATE TABLE IF NOT EXISTS `degree_study_plan` (
  `study_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `degree_program_id` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `max_units_allowed` int(2) NOT NULL,
  PRIMARY KEY (`study_plan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `degree_study_plan`
--


-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`designation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation`) VALUES
(1, 'clerk'),
(2, 'faculty'),
(3, 'head');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL,
  `maiden_name` varchar(225) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employee_type` char(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` char(6) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `parent_address` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `guardian` varchar(255) NOT NULL,
  `guardian_address` varchar(255) NOT NULL,
  `civil_status` char(7) NOT NULL,
  `birthdate` int(11) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `spouse_name` varchar(255) NOT NULL,
  `spouse_contact_number` int(11) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL,
  `housing_type` varchar(255) NOT NULL,
  `citizenship` char(30) NOT NULL,
  `access_level_id` int(11) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `maiden_name`, `username`, `password`, `employee_type`, `first_name`, `middle_name`, `last_name`, `gender`, `email_address`, `designation_id`, `parent_address`, `present_address`, `guardian`, `guardian_address`, `civil_status`, `birthdate`, `contact_number`, `spouse_name`, `spouse_contact_number`, `father_name`, `mother_name`, `last_updated_by`, `last_updated`, `housing_type`, `citizenship`, `access_level_id`, `security_question`, `security_answer`, `unit_id`) VALUES
(9, '', 'clerk', '34776981fa47aa6cf3f2915d11bae051', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 9, '', '', 0),
(8, '', 'osa', '43f38d003c06cca6687b5991a52787c1', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 8, '', '', 0),
(7, '', 'cso', '7521b62854f6491f263af3090ab9e759', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 7, '', '', 0),
(6, '', 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 6, '', '', 0),
(5, '', 'library', 'd521f765a49c72507257a2620612ee96', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 5, '', '', 0),
(4, '', 'accounting', 'd4c143f004d88b7286e6f999dea9d0d7', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 4, '', '', 0),
(3, '', 'demigod', '61c3592a7e2a61bc2f53e9a72b73feda', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 3, '', '', 0),
(2, '', 'faculty', 'd561c7c03c1f2831904823a95835ff5f', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 0),
(123545, '', 'test', '098f6bcd4621d373cade4e832627b4f6', '', 'test', 'test', 'test', 'Male', 'test@test.com', 0, 'test', 'test', '', '', 'Single', 9091990, 2147483647, 'test', 0, 'test', 'test', 0, 0, 'Apartment', 'test', 3, 'Who is your favorite teacher?', 'test', 0),
(12121, '', 'u1', 'ec6ef230f1828039ee794566b9c58adc', '', 'RObert', '', 'roxas', '', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 0),
(12345, '', 'esemorio', '21232f297a57a5a743894a0e4a801fc3', '', 'edson paul', 'ababon', 'semorio', 'Male', '', 1, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 3, '', '', 6),
(1111, '', 'kmiranda', '21232f297a57a5a743894a0e4a801fc3', '', 'kae karen', '', 'miranda', 'Female', '', 1, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 3, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `employee_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `employment_type` char(8) NOT NULL,
  `designation_id` char(10) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--


-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `course_code` varchar(255) NOT NULL,
  `section_label` char(1) NOT NULL,
  `student_number` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date_incurred` int(11) NOT NULL,
  `initial_grade` float NOT NULL,
  `completion_grade` float NOT NULL,
  `grade_status` enum('failed','passed','inc','removal') NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY (`course_code`,`section_label`,`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`course_code`, `section_label`, `student_number`, `remarks`, `date_incurred`, `initial_grade`, `completion_grade`, `grade_status`, `semester`, `academic_year`) VALUES
('cmsc11', 'A', 200700000, '', 0, 5, 5, 'failed', 0, 0),
('cmsc11', 'a', 200700002, 'hehe', 128398129, 3, 0, 'passed', 2, 2011);

-- --------------------------------------------------------

--
-- Table structure for table `offered_subjects`
--

CREATE TABLE IF NOT EXISTS `offered_subjects` (
  `course_code` varchar(255) NOT NULL,
  `degree_program_id` int(11) NOT NULL,
  PRIMARY KEY (`course_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offered_subjects`
--

INSERT INTO `offered_subjects` (`course_code`, `degree_program_id`) VALUES
('bio1', 0),
('cmsc11', 0),
('cs170', 0),
('cmsc123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `official_receipt_number` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `date_paid` int(11) NOT NULL,
  `accountability_id` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY (`official_receipt_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `prerequisite`
--

CREATE TABLE IF NOT EXISTS `prerequisite` (
  `course_code` varchar(255) NOT NULL,
  `prereq_course_code` varchar(255) NOT NULL,
  PRIMARY KEY (`course_code`,`prereq_course_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequisite`
--

INSERT INTO `prerequisite` (`course_code`, `prereq_course_code`) VALUES
('cmsc21', 'cmsc11');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--


-- --------------------------------------------------------

--
-- Table structure for table `scholars`
--

CREATE TABLE IF NOT EXISTS `scholars` (
  `scholarship_id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  PRIMARY KEY (`scholarship_id`,`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholars`
--


-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE IF NOT EXISTS `scholarship` (
  `scholarship_id` int(11) NOT NULL,
  `scholarship_name` varchar(255) NOT NULL,
  `amount_shouldered` int(11) NOT NULL,
  PRIMARY KEY (`scholarship_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`scholarship_id`, `scholarship_name`, `amount_shouldered`) VALUES
(100, 'SWAT', 2000),
(1, 'DOST', 7000),
(12, 'Government Support', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `course_code` varchar(255) NOT NULL,
  `section_label` varchar(2) NOT NULL,
  `room_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `total_slots` int(11) NOT NULL,
  `available_slots` int(11) NOT NULL,
  `waitlist_count` int(11) NOT NULL,
  `confirmed_count` int(11) NOT NULL,
  `enrolled_count` int(11) NOT NULL,
  `class_type` enum('lec','lab') NOT NULL,
  `dissolved` int(1) NOT NULL,
  PRIMARY KEY (`course_code`,`section_label`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`course_code`, `section_label`, `room_id`, `employee_id`, `total_slots`, `available_slots`, `waitlist_count`, `confirmed_count`, `enrolled_count`, `class_type`, `dissolved`) VALUES
('cmsc11', 'A', 0, 0, 3, 0, 2, 0, 0, 'lec', 0),
('cmsc11', 'B', 0, 0, 25, 25, 0, 0, 0, 'lec', 0),
('Bio1', 'A', 115, 0, 30, 28, 0, 0, 0, 'lec', 0),
('cmsc21', 'A', 0, 0, 25, 25, 0, 0, 0, 'lec', 0),
('cs170', 'A', 121, 0, 2, 1, 0, 0, 0, 'lec', 0),
('Bio1', 'B', 200, 0, 20, 20, 0, 0, 0, 'lec', 0),
('cmsc123', 'G', 200, 12121, 30, 30, 0, 0, 0, 'lec', 0),
('', '2', 2, 0, 2, 2, 0, 0, 0, '', 0),
('cmsc198', 'A', 200, 12121, 30, 30, 0, 0, 0, 'lec', 0);

-- --------------------------------------------------------

--
-- Table structure for table `section_schedules`
--

CREATE TABLE IF NOT EXISTS `section_schedules` (
  `course_code` varchar(255) NOT NULL,
  `section_label` varchar(2) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day_of_the_week` enum('M','T','W','Th','F','MTh','TF','S') NOT NULL,
  PRIMARY KEY (`course_code`,`section_label`,`day_of_the_week`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_schedules`
--

INSERT INTO `section_schedules` (`course_code`, `section_label`, `start_time`, `end_time`, `day_of_the_week`) VALUES
('cmsc11', 'A', '07:30:00', '09:00:00', 'MTh'),
('cmsc11', 'B', '07:30:00', '09:00:00', 'TF'),
('Bio1', 'A', '01:00:00', '02:30:00', 'W'),
('cmsc21', 'A', '09:00:00', '10:30:00', 'MTh'),
('cs170', 'A', '01:00:00', '02:00:00', 'MTh'),
('Bio1', 'B', '09:00:00', '12:00:00', 'MTh'),
('', '2', '00:00:02', '00:00:02', ''),
('cmsc123', 'G', '09:00:00', '10:30:00', 'M'),
('cmsc198', 'A', '09:00:00', '11:00:00', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_type` char(20) NOT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_type`) VALUES
(0, 'Summer'),
(1, '1st Semester'),
(2, '2nd Semester'),
(3, '1st Trimester'),
(4, '2nd Trimester');

-- --------------------------------------------------------

--
-- Table structure for table `slb`
--

CREATE TABLE IF NOT EXISTS `slb` (
  `slb_id` int(11) NOT NULL AUTO_INCREMENT,
  `loaned_amount` float NOT NULL,
  `employee_id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `term_incurred` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY (`slb_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `slb`
--


-- --------------------------------------------------------

--
-- Table structure for table `stfap`
--

CREATE TABLE IF NOT EXISTS `stfap` (
  `stfap_bracket_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `stfap_bracket` char(2) NOT NULL,
  `amount_per_unit` int(11) NOT NULL,
  `income_lower_limit` int(11) NOT NULL,
  `income_upper_limit` int(11) NOT NULL,
  PRIMARY KEY (`stfap_bracket_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stfap`
--

INSERT INTO `stfap` (`stfap_bracket_id`, `stfap_bracket`, `amount_per_unit`, `income_lower_limit`, `income_upper_limit`) VALUES
(0, 'A', 1000, 1000000, 10000000),
(1, 'B', 600, 500000, 999999),
(2, 'C', 400, 200000, 500000),
(3, 'D', 200, 75000, 200000),
(4, 'E1', 0, 0, 75000),
(5, 'E2', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_number` int(11) NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `degree_program` char(100) NOT NULL,
  `year_level` tinyint(1) NOT NULL,
  `degree_level` char(15) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `stfap_bracket_id` tinyint(1) NOT NULL,
  `student_type` char(1) NOT NULL,
  `student_status` tinyint(1) NOT NULL,
  `gender` char(6) NOT NULL,
  `civil_status` char(10) NOT NULL,
  `program_code` int(11) NOT NULL,
  `program_rev_code` int(11) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `registration_stat` char(1) NOT NULL,
  `grade_info` char(1) NOT NULL,
  `foreign_info` char(1) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `employment` varchar(255) NOT NULL,
  `family_income` int(11) NOT NULL,
  `add_info` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `birthdate` int(11) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `graduating` char(3) NOT NULL,
  `present_house_number` int(11) NOT NULL,
  `residency` char(3) NOT NULL,
  `guardian` varchar(255) NOT NULL,
  `entry_academic_year` int(11) NOT NULL,
  `entry_semester` tinyint(1) NOT NULL,
  `academic_standing` char(25) NOT NULL,
  `degree_program_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `home_house_number` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL,
  `home_street` varchar(255) NOT NULL,
  `home_barangay` varchar(255) NOT NULL,
  `home_city_municipality` varchar(255) NOT NULL,
  `home_province` varchar(255) NOT NULL,
  `home_contact_number` int(11) NOT NULL,
  `present_home_number` int(11) NOT NULL,
  `present_street` varchar(255) NOT NULL,
  `present_barangay` varchar(255) NOT NULL,
  `present_city_municipality` varchar(255) NOT NULL,
  `present_province` varchar(255) NOT NULL,
  `present_contact_number` int(11) NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `guardian_house_number` int(11) NOT NULL,
  `guardian_street` varchar(255) NOT NULL,
  `guardian_barangay` varchar(255) NOT NULL,
  `guardian_city_municipality` varchar(255) NOT NULL,
  `guardian_province` varchar(255) NOT NULL,
  `guardian_contact_number` int(11) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_street` varchar(255) NOT NULL,
  `recipient_city` varchar(255) NOT NULL,
  `recipient_zipcode` varchar(255) NOT NULL,
  `recipient_phone` varchar(255) NOT NULL,
  `access_level_id` int(11) NOT NULL,
  `max_units_allowed` int(2) NOT NULL,
  `login_expiration` int(11) NOT NULL,
  PRIMARY KEY (`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_number`, `scholarship_id`, `unit_id`, `degree_program`, `year_level`, `degree_level`, `academic_year`, `semester`, `stfap_bracket_id`, `student_type`, `student_status`, `gender`, `civil_status`, `program_code`, `program_rev_code`, `contact_number`, `registration_stat`, `grade_info`, `foreign_info`, `citizenship`, `employment`, `family_income`, `add_info`, `first_name`, `last_name`, `middle_name`, `password`, `security_question`, `answer`, `birthdate`, `father_name`, `mother_name`, `graduating`, `present_house_number`, `residency`, `guardian`, `entry_academic_year`, `entry_semester`, `academic_standing`, `degree_program_id`, `employee_id`, `email_address`, `home_house_number`, `last_updated`, `home_street`, `home_barangay`, `home_city_municipality`, `home_province`, `home_contact_number`, `present_home_number`, `present_street`, `present_barangay`, `present_city_municipality`, `present_province`, `present_contact_number`, `last_updated_by`, `guardian_house_number`, `guardian_street`, `guardian_barangay`, `guardian_city_municipality`, `guardian_province`, `guardian_contact_number`, `recipient_name`, `recipient_street`, `recipient_city`, `recipient_zipcode`, `recipient_phone`, `access_level_id`, `max_units_allowed`, `login_expiration`) VALUES
(200700000, 0, 0, '', 0, '', 0, '', 1, '', 0, '', '', 0, 0, 0, '', '', '', '', '', 0, '', 'First Name', 'Last Name', 'Middle', 'd7abb6a3e6439060c4d7547cc9d43ac6', 'What was the name of your first school?', 'USJ-R', 0, '', '', '', 0, '', '', 2010, 1, '', 0, 0, '', 0, 1286015238, '', '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 0),
(200700001, 100, 0, 'BAMC', 4, '', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', 0, '', 'Santana', 'Catubig', 'Lopez', 'cd73502828457d15655bbd7a63fb0bc8', '', '', 0, '', '', '', 0, '', '', 0, 0, '', 0, 0, '', 0, 1285846430, '', '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 0),
(200700004, 0, 0, '100', 0, '', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', 'Filipino', '', 0, '', 'FistName', 'LastName', 'MiddleName', 'd18ec62abb02c392392c2807b9f8258d', '', '', 0, '', '', '', 0, '', '', 2010, 0, '', 0, 0, '', 0, 1286017950, '', '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 20140601),
(200700002, 0, 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, 0, 0, '', '', '', '', '', 0, '', '', '', '', '3a539d3ea09f12d313008c46d724bd6d', 'What was the name of your first school?', 'monkey', 0, '', '', '', 0, '', '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 0),
(200700003, 0, 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, 0, 0, '', '', '', '', '', 0, '', '', '', '', '1f0e3dad99908345f7439f8ffabdffc4', 'What was the name of your first school?', '19', 0, '', '', '', 0, '', '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 0),
(200700005, 0, 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, 0, 0, '', '', '', '', '', 0, '', '', '', 'V', '2c006e347ef780a76e2ed17527759012', '', '', 0, '', '', '', 0, '', '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 0),
(200700006, 0, 0, '100', 0, '', 0, '', 0, '', 0, 'Male', '', 0, 0, 0, '', '', '', 'Filipino', '', 0, '', 'John Mart', 'Aguilar', 'Dante', 'd0b9fba13c0c46dc71cad6a3ee199721', '', '', 0, '', '', '', 0, '', '', 2010, 1, '', 0, 0, '', 0, 1286018296, '', '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', 0, 0, 20140601),
(200700007, 0, 0, '100', 0, '', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', 'Korean', '', 0, '', 'Ann', 'Mae', 'Ann', '69aac532c0814c19ae92f55d966c9339', '', '', 0, '', '', '', 0, '', '', 2008, 1, '', 0, 0, '', 0, 1286019047, '', '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 20120403),
(200700008, 0, 0, '100', 0, '', 0, '', 0, '', 0, 'Male', '', 0, 0, 0, '', '', '', 'Korean', '', 0, '', 'Sungmin', 'Lee', 'Lee', '5658e484aa2d05310a5991f8bfcac165', '', '', 0, '', '', '', 0, '', '', 2008, 2, '', 0, 0, '', 0, 1286019391, '', '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 20120403);

-- --------------------------------------------------------

--
-- Table structure for table `students_degree`
--

CREATE TABLE IF NOT EXISTS `students_degree` (
  `student_number` int(11) NOT NULL,
  `degree_program_id` int(11) NOT NULL,
  `entry_academic_year` int(11) NOT NULL,
  `entry_semester` tinyint(1) NOT NULL,
  `last_updated` int(11) NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`student_number`,`degree_program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_degree`
--

INSERT INTO `students_degree` (`student_number`, `degree_program_id`, `entry_academic_year`, `entry_semester`, `last_updated`, `last_updated_by`) VALUES
(200791042, 0, 0, 0, 1285844342, 0),
(12, 0, 3123, 0, 1285844619, 0),
(200711111, 100, 2010, 0, 1286017877, 0),
(200758548, 0, 2010, 0, 1285851965, 0),
(200722222, 0, 0, 0, 1286017033, 0),
(200758555, 0, 2008, 1, 1286017522, 0),
(200700005, 100, 2010, 1, 1286018013, 0),
(200700006, 100, 2010, 1, 1286018296, 0),
(200700007, 100, 2008, 1, 1286019047, 0),
(200700008, 100, 2008, 2, 1286019391, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_assessment`
--

CREATE TABLE IF NOT EXISTS `student_assessment` (
  `assessment_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_pay_amount` float NOT NULL,
  `assessment_status` varchar(7) NOT NULL,
  `student_number` int(11) NOT NULL,
  PRIMARY KEY (`assessment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `student_assessment`
--

INSERT INTO `student_assessment` (`assessment_id`, `to_pay_amount`, `assessment_status`, `student_number`) VALUES
(8, 1251.5, 'paid', 200700000),
(9, 1251.5, 'paid', 200700001);

-- --------------------------------------------------------

--
-- Table structure for table `student_status`
--

CREATE TABLE IF NOT EXISTS `student_status` (
  `student_number` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `section_label` char(1) NOT NULL,
  `status` enum('confirmed','unconfirmed','waitlisted','enrolled') NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `waitlist_counter` int(11) NOT NULL,
  PRIMARY KEY (`student_number`,`course_code`,`section_label`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_status`
--

INSERT INTO `student_status` (`student_number`, `course_code`, `section_label`, `status`, `semester`, `academic_year`, `waitlist_counter`) VALUES
(200700001, 'cmsc11', 'A', 'unconfirmed', 0, 0, 0),
(200700005, 'cmsc11', 'A', 'waitlisted', 0, 0, 1),
(200700001, 'bio1', 'A', 'confirmed', 0, 0, 0),
(200700000, 'cmsc11', 'A', 'confirmed', 0, 0, 0),
(200700004, 'cmsc11', 'A', 'confirmed', 0, 0, 0),
(200700002, 'bio1', 'A', 'unconfirmed', 0, 0, 0),
(200700002, 'cmsc11', 'A', 'confirmed', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `course_code` varchar(255) NOT NULL,
  `subject_title` varchar(255) NOT NULL,
  `action_taken` enum('added','updated') NOT NULL,
  `date_proposed` int(11) NOT NULL,
  `date_approved` int(11) NOT NULL,
  `date_first_implemented` int(11) NOT NULL,
  `date_revision_implemented` int(11) NOT NULL,
  `date_abolished_in_offering` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `degree_level` enum('undergraduate','graduate') NOT NULL,
  `semester_offered` int(1) NOT NULL,
  `abolished` tinyint(1) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  PRIMARY KEY (`course_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`course_code`, `subject_title`, `action_taken`, `date_proposed`, `date_approved`, `date_first_implemented`, `date_revision_implemented`, `date_abolished_in_offering`, `description`, `academic_year`, `units`, `degree_level`, `semester_offered`, `abolished`, `lab_fee`) VALUES
('cmsc11', 'Introduction to Computer Science', 'added', 0, 0, 0, 0, 0, '', 0, 3, 'undergraduate', 0, 0, 0),
('cmsc123', 'Computer Science', 'added', 1008201600, 1008201600, 1285843950, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 0),
('Bio1', 'Introduction to Biology', 'added', 0, 0, 0, 0, 0, '', 0, 3, 'undergraduate', 0, 0, 0),
('cmsc124', 'Computer Science', 'added', 1008201600, 1008201600, 1285843994, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 200),
('cmsc21', 'Advanced Programming', 'added', 1008201600, 1008201600, 1285844056, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 450),
('cmsc130', 'comsci', 'added', 234234, 324234, 1285844317, 324234234, 1285845289, '', 2011, 3, 'undergraduate', 1, 1, 450),
('cs170', 'Computer Science', 'added', 1008201600, 1008201600, 1285844741, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 450),
('cmsc134', 'ccss', 'added', 1226880000, 1226880000, 1285846043, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 0),
('cmsc128', 'Softeng', 'added', 911606400, 911606400, 1285851466, 0, 1285851499, '', 2011, 3, 'undergraduate', 1, 1, 450),
('cmsc198', 'GIS', 'added', 718848000, 718848000, 1286012931, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 300),
('cmsc190', 'comsci', 'added', 662601600, 662601600, 1286016615, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 300);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` char(255) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(3, 'Humanities Division'),
(2, 'Social Sciences Division'),
(1, 'Department of Computer Science'),
(4, 'Natural Sciences and Mathematics Division'),
(5, 'Management Division'),
(6, 'Administrators');
