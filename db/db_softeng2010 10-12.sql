-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2010 at 12:51 PM
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
CREATE DATABASE `db_softeng2010` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Dumping data for table `accountability`
--

INSERT INTO `accountability` (`accountability_id`, `accountability_type_id`, `student_number`, `details`, `amount_due`, `year_incurred`, `semester_incurred`, `date_added`, `employee_id`, `accountability_status`, `date_cleared`) VALUES
(159, 1, 200733333, 'DOST', 1000, 2010, 1, 20101012, 1238001, 'cleared', 20101012),
(161, 7, 200733333, 'enrollment', 3253, 2010, 1, 20101012, 6, 'cleared', 20101012),
(162, 7, 200799999, 'enrollment', 4452, 2010, 1, 20101012, 6, 'cleared', 20101012),
(163, 7, 200710101, 'enrollment', 4452, 2010, 1, 20101012, 6, 'cleared', 20101012),
(158, 1, 200733333, 'sdfsdf12312', 4234234, 2010, 0, 20101012, 1238001, 'cleared', 20101012),
(157, 1, 200733333, '312das', 2147483647, 2010, 4, 20101012, 1238001, 'cleared', 20101012),
(160, 4, 200733333, 'student loan', 100, 2010, 1, 0, 1238001, 'cleared', 20101012),
(155, 1, 200733333, 'dasdasd', 13122, 2010, 0, 20101012, 1238001, 'cleared', 20101012),
(156, 3, 200733333, 'fsdfsd', 12312312, 2010, 1, 20101012, 1238001, 'cleared', 20101012),
(153, 2, 200733333, 'haha', 10, 2010, 0, 20101012, 7856565, 'cleared', 20101012),
(151, 1, 200800000, 'haha', 10, 2010, 0, 20101012, 1238001, 'cleared', 20101012),
(152, 2, 200733333, 'returned', 6, 2010, 1, 20101012, 7856565, 'cleared', 20101012),
(149, 1, 200700000, 'lab fees', 100, 2010, 1, 20101012, 1238001, 'cleared', 20101012),
(150, 1, 200700000, 'EC', 100, 2010, 1, 20101012, 1238001, 'cleared', 20101012),
(148, 4, 200700000, 'student loan', 10, 2010, 1, 20101011, 1, 'cleared', 20101011),
(147, 1, 200700000, 'haha', 90, 2009, 0, 20101011, 1238001, 'cleared', 20101012),
(146, 1, 200700000, 'wala', 90, 2009, 0, 20101011, 1238001, 'cleared', 20101011),
(144, 1, 200700000, 'jhjk', 90, 2009, 0, 20101011, 1238001, 'cleared', 20101011),
(145, 1, 200700000, 'haha', 0, 2009, 0, 20101011, 1238001, 'cleared', 20101011);

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
(6, 'NSO Birth Certificate'),
(7, 'Enrollment');

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
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `student_number` int(11) NOT NULL,
  `unit_count` float NOT NULL,
  `lab_count` float NOT NULL,
  `nstp` int(1) NOT NULL,
  `non_citizen_fee` float NOT NULL,
  `entrance` float NOT NULL,
  `deposit` float NOT NULL,
  `id_fee` float NOT NULL,
  `in_residence` float NOT NULL,
  `assessment_status` enum('assessed','paid') NOT NULL,
  `assessed_by` int(20) NOT NULL,
  PRIMARY KEY (`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`student_number`, `unit_count`, `lab_count`, `nstp`, `non_citizen_fee`, `entrance`, `deposit`, `id_fee`, `in_residence`, `assessment_status`, `assessed_by`) VALUES
(201000000, 17, 2, 1, 0, 0, 0, 1, 0, 'assessed', 0),
(201000001, 17, 2, 0, 0, 0, 0, 1, 0, 'assessed', 0),
(200736615, 0, 0, 0, 0, 1, 1, 0, 0, '', 0),
(200700000, 0, 0, 0, 0, 0, 0, 0, 0, 'assessed', 122323),
(200733333, 3, 0, 0, 0, 0, 0, 1, 0, 'paid', 0),
(200799999, 3, 0, 0, 0, 0, 0, 0, 0, 'assessed', 6566523),
(200710101, 3, 0, 0, 0, 0, 0, 0, 0, 'paid', 6566523);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_table`
--

CREATE TABLE IF NOT EXISTS `assessment_table` (
  `look_up` char(1) NOT NULL,
  `athletics` float NOT NULL,
  `cultural` float NOT NULL,
  `energy` float NOT NULL,
  `internet` float NOT NULL,
  `library` float NOT NULL,
  `medical` float NOT NULL,
  `registration` float NOT NULL,
  `community_chest` float NOT NULL,
  `publication` float NOT NULL,
  `student_council` float NOT NULL,
  `laboratory_fee` float NOT NULL,
  `nstp_cwts` float NOT NULL,
  `non_citizen_fee` float NOT NULL,
  `entrance` float NOT NULL,
  `deposit` float NOT NULL,
  `id_fee` float NOT NULL,
  `in_residence` float NOT NULL,
  PRIMARY KEY (`look_up`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_table`
--

INSERT INTO `assessment_table` (`look_up`, `athletics`, `cultural`, `energy`, `internet`, `library`, `medical`, `registration`, `community_chest`, `publication`, `student_council`, `laboratory_fee`, `nstp_cwts`, `non_citizen_fee`, `entrance`, `deposit`, `id_fee`, `in_residence`) VALUES
('1', 55, 50, 250, 260, 700, 50, 40, 0.5, 40, 6, 300, 100, 450, 100, 100, 100, 100);

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
(2, 'Undergrad'),
(3, 'BM'),
(4, 'Confe');

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
-- Table structure for table `current_semester_id`
--

CREATE TABLE IF NOT EXISTS `current_semester_id` (
  `current_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_id` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY (`current_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `current_semester_id`
--

INSERT INTO `current_semester_id` (`current_id`, `semester_id`, `academic_year`) VALUES
(1, 1, 2010);

-- --------------------------------------------------------

--
-- Table structure for table `degree_program`
--

CREATE TABLE IF NOT EXISTS `degree_program` (
  `degree_program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_code` int(11) NOT NULL,
  `degree_level` enum('undergraduate','graduate') NOT NULL,
  `required_years` tinyint(1) NOT NULL,
  `required_units` smallint(3) NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `minor` varchar(255) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2002 ;

--
-- Dumping data for table `degree_program`
--

INSERT INTO `degree_program` (`degree_program_id`, `program_code`, `degree_level`, `required_years`, `required_units`, `degree_name`, `major`, `minor`, `degree_title`, `credited`, `currently_offered`, `entrance_code`, `enrolment_quota`, `date_proposed`, `date_revised`, `description`, `unit_id`) VALUES
(100, 1212, 'undergraduate', 4, 141, 'BS in Computer Science', 'BS', 'Computer Science', 'Bachelor of Science', 1, '1', 10000, 70, 128390400, 1286774697, 'bscs', 1),
(2000, 2000, 'undergraduate', 4, 139, 'BS in Mathematics', '1', '1', 'Bachelor of Science', 1, 'yes', 10000, 50, 128382983, 128389723, 'mathematics circle', 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation`) VALUES
(1, 'clerk'),
(2, 'faculty'),
(3, 'head'),
(4, 'administrative aide');

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
(9, '', 'clerk', '34776981fa47aa6cf3f2915d11bae051', '', 'Kim', '', 'Jong Il', '', '', 1, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 9, '', '', 1),
(8, '', 'osa', '43f38d003c06cca6687b5991a52787c1', '', 'Proctor and', '', 'Gamble', 'Male', '', 4, '', '', '', '', 'Married', 0, 0, '', 0, '', '', 0, 0, 'Apartment', '', 8, '', '', 6),
(7, '', 'cso        ', '7521b62854f6491f263af3090ab9e759', '', 'CSO', 'CSO', 'CSO', 'Male', '', 1, 'asdad', 'asdad', '', '', 'NULL', 0, 0, 'asdad', 0, 'asdad', 'asd', 0, 1286355104, 'Apartment', '', 7, 'Where is your hometown?', 'Bayugan', 7),
(6, '', 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf', '', 'Fiona', 'Haha', 'Protestas', '', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 6, 'What is the name of your first school?<', '', 6),
(5, '', 'ssagun\n               ', 'ssagun', '', 'Stefany', 'Serino', 'Sagun', 'Male', '', 3, '', '', '', '', 'NULL', 0, 0, '', 0, '', '', 0, 0, 'NULL', '', 5, 'What is the name of your first school?', '', 1),
(4, '', 'jebrado\n               ', 'd4c143f004d88b7286e6f999dea9d0d7', '', 'Jm', 'x', 'Ebrado', 'Male', 'naj_asdasd.com', 1, 'aasd', 'asdljasd', '', '', 'NULL', 0, 0, 'aslkdjalkj', 0, 'alskjdlkaj', 'aslkjdlkasjd', 0, 0, 'NULL', '', 4, 'What is the name of your first school?', 'lahug', 1),
(122323, '', 'faculty', 'd561c7c03c1f2831904823a95835ff5f', '', 'Stefanu', 'Esperanza', 'Balugo', 'Male', 'sasdasdas', 3, 'asdasdas', 'asdasdas', '', '', 'Single', 312423423, 23423423, 'sdasdasda', 23423423, 'sdasdasd', 'asdasdasd', 0, 0, 'Boarding House Off Campus', 'dasdasdas', 2, '', '', 6),
(6566523, '', 'jalmocera', 'd561c7c03c1f2831904823a95835ff5f', '', 'Jonas', 'Clyde', 'Almocera', 'Male', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 1),
(1111, '', 'kmiranda', '21232f297a57a5a743894a0e4a801fc3', '', 'kae karen', 'middle', 'miranda', 'Female', '', 1, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 3, 'Who is your favorite teacher?', 'Ms wade', 2),
(12913, '', 'demigod', 'd41d8cd98f00b204e9800998ecf8427e', '', 'd', 'god', 'emigod', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 0, 'Where is your hometown?', 'sdasdas', 0),
(111, '', 'fpot', 'ecbfde1394f2dfe02d50081d8a35dba6', '', 'fio', 'vill', 'pot', 'Female', '', 3, '', '', '', '', 'Single', 7, 9327136, '', 0, '', '', 0, 0, 'NULL', '', 7, '', '', 7),
(8945, '', 'llogs', '47bce5c74f589f4867dbd57e9ca9f808', '', 'logs', 'logs', 'logs', 'Male', 'sadasd', 2, 'sdsadas', 'sdasds', '', '', 'Single', 1232, 1232, 'sadasda', 123123, 'dasdas', 'das', 0, 0, 'Apartment', 'asdasdas', 4, '', '', 2),
(2007, '', 'oosadfd3434\n               ', '43f38d003c06cca6687b5991a52787c1', '', 'osa3434', 'osa3434', 'osadfd3434', 'Male', '', 2, '3434', '43434', '', '', 'Married', 3434, 3434, 'dsdas', 0, 'sdasdas', 'dasdasas', 0, 0, 'Apartment', '4343', 8, '', '', 3),
(1238001, '', 'accounting', 'd4c143f004d88b7286e6f999dea9d0d7', '', 'a', 'a', 'ccounting', 'Male', '', 1, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 4, '', '', 3),
(12089238, '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'blah', 'semoriossaasas', 'dmin', 'Female', 'nico@google.com', 1, '', '', '', '', 'Married', 111290, 2324567, 'Alfred Queue dfgdfgdf', 0, '', '', 0, 0, 'Boarding House on Campus', '', 3, 'NULL', '', 1),
(123, '', 'rpaldo', '3517a619001d4eceabfaaced51a83166', '', 'Razel ', 'Nacilla', 'Paldo', 'Female', 'razelp2000', 3, '', '', '', '', 'Single', 10, 12323, '', 0, '', '', 0, 0, 'Apartment', '', 7, '', '', 7),
(7856565, '', 'library', 'd521f765a49c72507257a2620612ee96', '', 'library', 'rakenrol', 'ibrary', 'Male', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 5, '', '', 4),
(10001, '', 'jjuario', 'd561c7c03c1f2831904823a95835ff5f', '', 'Jesus', 'V', 'Juario', 'Male', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 4),
(10003, '', 'framos', 'd561c7c03c1f2831904823a95835ff5f', '', 'Fidel', 'V', 'Ramos', 'Male', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 7),
(878787878, '', 'Rakenrol', '202cb962ac59075b964b07152d234b70', '', 'asasds', 'fsd', 'fsdfsdfs', 'Male', 'paulgutib@gmail.com', 2, '', '', '', '', 'Single', 1990, 1331231, '', 0, '', '', 0, 0, 'Boarding House on Campus', '', 2, '', '', 3),
(999999, '', 'eblah', '202cb962ac59075b964b07152d234b70', '', 'errrwrew', 'wewrwerwrew', 'blah', 'Male', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 2),
(230428, '', 'pgutib', '21232f297a57a5a743894a0e4a801fc3', '', 'Paul Andrew', 'Semorio', 'Gutib', 'Male', '', 1, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 3),
(2147483647, '', 'eababon', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Edson Paul', 'Semorio', 'Ababon', 'Male', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 3, 'What is your favorite past-time?', 'rakenrol', 3),
(340234890, '', 'esemorio', '21232f297a57a5a743894a0e4a801fc3', '', 'Edson Paul', 'Ababon', 'Semorio', 'Male', '', 4, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 3, '', '', 6),
(345445, '', 'aasdas', 'adbf5a778175ee757c34d0eba4e932bc', '', 'asds', 'asd', 'asdas', 'Male', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `date_of_event` date NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event`
--


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

INSERT INTO `faculty` (`employee_id`, `unit_id`, `employment_type`, `designation_id`) VALUES
(1111, 2, '', ''),
(12345, 6, '', '');

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
('math17', '', 200700000, '', 0, 5, 5, 'failed', 1, 2010),
('comm1', '', 200700000, '', 0, 3, 3, 'passed', 1, 2010),
('cmsc11', 'A', 200700000, '', 0, 3, 0, 'passed', 2, 2010);

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
('math53', 0),
('cmsc123', 0),
('cmsc11', 0),
('comm1', 0),
('nstp2', 0),
('sts40', 0),
('cs170', 0);

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

INSERT INTO `payment` (`official_receipt_number`, `employee_id`, `amount_paid`, `date_paid`, `accountability_id`, `semester`, `academic_year`) VALUES
(2132, 1238001, 1000, 20101012, 159, 1, 2010),
(12412, 1238001, 10, 20101012, 151, 0, 2010),
(123, 1238001, 100, 20101012, 150, 1, 2010),
(12345, 1238001, 90, 20101012, 147, 0, 2009),
(20000000, 1238001, 90, 20101011, 144, 0, 2009),
(98908, 1238001, 90, 20101011, 146, 0, 2009),
(76876, 1238001, 0, 20101011, 145, 0, 2009),
(124, 1238001, 4234234, 20101012, 158, 0, 2010),
(12312, 6, 100, 20101012, 160, 1, 2010),
(23523, 6, 4452, 20101012, 162, 1, 2010);

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
('cmsc11', 'math17'),
('cmsc123', 'cmsc21'),
('cmsc21', 'cmsc11'),
('math53', 'math17');

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

INSERT INTO `room` (`room_id`, `building_id`) VALUES
(302, 1),
(303, 1),
(218, 2),
(116, 2),
(1, 4),
(241, 1),
(242, 1),
(235, 1),
(301, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scholars`
--

CREATE TABLE IF NOT EXISTS `scholars` (
  `scholarship_id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `set_by` int(11) NOT NULL,
  PRIMARY KEY (`scholarship_id`,`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholars`
--

INSERT INTO `scholars` (`scholarship_id`, `student_number`, `set_by`) VALUES
(11, 200700000, 8),
(12, 200720010, 8),
(1, 200733333, 8);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE IF NOT EXISTS `scholarship` (
  `scholarship_id` int(11) NOT NULL AUTO_INCREMENT,
  `scholarship_name` varchar(255) NOT NULL,
  `amount_shouldered` int(11) NOT NULL,
  PRIMARY KEY (`scholarship_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`scholarship_id`, `scholarship_name`, `amount_shouldered`) VALUES
(100, 'SEO', 2000),
(1, 'DOST', 7000),
(12, 'Government Support', 10000),
(11, 'DILG', 1000),
(103, 'werwe', 0);

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
('cmsc11', 'A2', 242, 6566523, 15, 13, 0, 0, 0, 'lab', 0),
('cmsc11', 'A', 302, 6566523, 30, 33, 0, 0, 0, 'lec', 0),
('comm1', 'B', 218, 10002, 30, 29, 0, 1, 0, 'lec', 0),
('comm1', 'A', 218, 10002, 30, 28, 0, 2, -10, 'lec', 0),
('cmsc11', 'A1', 241, 6566523, 15, 15, 0, 0, 0, 'lab', 0),
('Bio1', 'A', 116, 10001, 30, 30, 0, 0, 0, 'lec', 0),
('STS40', 'A', 116, 10001, 30, 29, 0, 1, 0, 'lec', 0),
('STS40', 'B', 116, 10001, 30, 30, 0, 0, 0, 'lec', 0),
('NSTP', 'C', 1, 10003, 30, 30, 0, 0, 0, 'lec', 0),
('NSTP', 'B', 1, 10003, 30, 30, 0, 0, 0, 'lec', 0),
('NSTP', 'A', 1, 10003, 30, 30, 0, 0, 0, 'lec', 0),
('cmsc123', 'A', 301, 6566523, 35, 30, 0, 0, 0, 'lec', 0),
('cmsc123', 'B', 301, 6566523, 30, 29, 0, 0, 0, 'lec', 0),
('cs170', 'A', 301, 6566523, 30, 30, 0, 0, 0, 'lec', 0),
('math53', 'A', 235, 12121, 30, 30, 0, 0, 0, 'lec', 0),
('math53', 'B', 235, 12121, 30, 30, 0, 0, 0, 'lec', 0),
('Math17', 'A', 235, 12121, 30, 30, 0, 0, 0, 'lec', 0),
('NSTP', 'Z', 1, 12121, 30, 30, 0, 0, 0, 'lec', 0);

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
('cmsc123', 'A', '04:00:00', '05:30:00', 'MTh'),
('cmsc11', 'A2', '01:00:00', '02:30:00', 'MTh'),
('cmsc11', 'A1', '10:30:00', '12:00:00', 'MTh'),
('cmsc11', 'A', '09:00:00', '10:30:00', 'MTh'),
('Bio1', 'A', '01:00:00', '02:30:00', 'MTh'),
('comm1', 'B', '10:30:00', '12:00:00', 'TF'),
('comm1', 'A', '09:00:00', '10:30:00', 'TF'),
('STS40', 'B', '10:30:00', '12:00:00', 'MTh'),
('STS40', 'A', '09:00:00', '10:30:00', 'MTh'),
('NSTP', 'C', '09:00:00', '12:00:00', 'S'),
('NSTP', 'B', '01:00:00', '04:00:00', 'W'),
('NSTP', 'A', '09:00:00', '12:00:00', 'W'),
('cmsc123', 'B', '04:00:00', '05:30:00', 'TF'),
('cs170', 'A', '09:00:00', '10:30:00', 'MTh'),
('math53', 'A', '09:00:00', '10:30:00', 'MTh'),
('math53', 'B', '10:30:00', '12:00:00', 'MTh'),
('Math17', 'A', '01:00:00', '02:30:00', 'MTh'),
('NSTP', 'Z', '09:00:00', '10:30:00', 'TF');

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
  `date_incurred` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY (`slb_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
  `degree_program` int(100) NOT NULL,
  `year_level` tinyint(1) NOT NULL,
  `degree_level` enum('undergraduate','graduate') NOT NULL,
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
  `employer_name` varchar(255) NOT NULL,
  `employer_address` varchar(255) NOT NULL,
  `employer_zipcode` int(5) NOT NULL,
  `employer_number` int(11) NOT NULL,
  `personal_income` int(11) NOT NULL,
  `family_income` int(11) NOT NULL,
  `add_info` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `birthdate` int(11) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `graduating` char(3) NOT NULL,
  `residency` char(3) NOT NULL,
  `entry_academic_year` int(11) NOT NULL,
  `entry_semester` tinyint(1) NOT NULL,
  `academic_standing` char(25) NOT NULL,
  `degree_program_id` int(11) NOT NULL,
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
  `guardian` varchar(255) NOT NULL,
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
  `date_graduated` int(11) NOT NULL,
  `academic_year_graduated` int(11) NOT NULL,
  `semester_graduated` int(11) NOT NULL,
  `gwa_graduated` float NOT NULL,
  `honor_received` varchar(255) NOT NULL,
  `course_graduated` int(11) NOT NULL,
  `login_expiration` int(11) NOT NULL,
  PRIMARY KEY (`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_number`, `scholarship_id`, `unit_id`, `degree_program`, `year_level`, `degree_level`, `academic_year`, `semester`, `stfap_bracket_id`, `student_type`, `student_status`, `gender`, `civil_status`, `program_code`, `program_rev_code`, `contact_number`, `registration_stat`, `grade_info`, `foreign_info`, `citizenship`, `employment`, `employer_name`, `employer_address`, `employer_zipcode`, `employer_number`, `personal_income`, `family_income`, `add_info`, `first_name`, `last_name`, `middle_name`, `password`, `security_question`, `answer`, `birthdate`, `birthplace`, `father_name`, `mother_name`, `graduating`, `residency`, `entry_academic_year`, `entry_semester`, `academic_standing`, `degree_program_id`, `email_address`, `home_house_number`, `last_updated`, `home_street`, `home_barangay`, `home_city_municipality`, `home_province`, `home_contact_number`, `present_home_number`, `present_street`, `present_barangay`, `present_city_municipality`, `present_province`, `present_contact_number`, `last_updated_by`, `guardian`, `guardian_house_number`, `guardian_street`, `guardian_barangay`, `guardian_city_municipality`, `guardian_province`, `guardian_contact_number`, `recipient_name`, `recipient_street`, `recipient_city`, `recipient_zipcode`, `recipient_phone`, `access_level_id`, `max_units_allowed`, `date_graduated`, `academic_year_graduated`, `semester_graduated`, `gwa_graduated`, `honor_received`, `course_graduated`, `login_expiration`) VALUES
(200900004, 0, 0, 0, 4, '', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Brittany', 'Snow', 'Ice', 'cd73502828457d15655bbd7a63fb0bc8', 'What was the name of your first school?', 'UP', 0, '', 'Papa Snow', 'Mama Snow', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 7, 0, 0, 0, 0, '', 0, 2011),
(200900003, 0, 0, 0, 1, '', 0, '', 0, '', 0, 'Male', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Jeremiah', 'Sy', 'Tan', 'cd73502828457d15655bbd7a63fb0bc8', 'What was the name of your first school?', 'UP', 0, '', 'Papa Sy', 'Mama Sy', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 7, 0, 0, 0, 0, '', 0, 2014),
(200900002, 0, 0, 0, 3, '', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Ivy', 'Tamayo', 'Bella', 'cd73502828457d15655bbd7a63fb0bc8', 'What was the name of your first school?', 'UP', 0, '', 'Papa Tamayo', 'Mama Tamayo', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 7, 0, 0, 0, 0, '', 0, 2011),
(200900000, 0, 0, 0, 1, '', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Edsona', 'Semoria', 'Maldita', 'cd73502828457d15655bbd7a63fb0bc8', 'What was the name of your first school?', 'UP', 0, '', 'Ed Semoria', 'Sona Semoria', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 7, 0, 0, 0, 0, '', 0, 2014),
(0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', 0, 2014),
(200900001, 0, 0, 0, 2, '', 0, '', 0, '', 0, 'Male', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Justin', 'Pala', 'Cortes', 'cd73502828457d15655bbd7a63fb0bc8', 'What was the name of your first school?', 'UP', 0, '', 'Papa Pala', 'Mama Pala', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 7, 0, 0, 0, 0, '', 0, 2012),
(200800000, 0, 0, 0, 1, '', 0, '', 0, '', 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Nico Martin', 'Enego', 'Aniceto', '200800000', '', '', 0, '', '', '', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 0, 12, 0, 0, 0, 0, '', 0, 20151010),
(200911111, 0, 0, 0, 3, '', 0, '', 0, '', 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Mae Ann', 'Paldo', 'Amarado', '200911111', '', '', 0, '', '', '', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 0, 9, 0, 0, 0, 0, '', 0, 2015),
(200733333, 0, 0, 0, 2, 'undergraduate', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Carmielle', 'de Guzman', 'Ocampo', '200733333', 'Who is your crush?', 'wala', 0, '', 'Daddy de Guzman', 'Mommy de Guzman', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 0, 12, 0, 0, 0, 0, '', 0, 2013),
(200700000, 11, 0, 100, 4, 'undergraduate', 0, '', 2, 'D', 0, 'Female', 'separated', 0, 0, 2147483647, 'A', '', 'n', 'korea', 'part-time', 'wahah', 'wahaha', 0, 0, 123456, 123456, '', 'John Paul', 'Catubig', 'D', 'cd73502828457d15655bbd7a63fb0bc8', '', '', 20101232, 'cebu', 'papa', 'papa', 'yes', 'yes', 2007, 1, 'Good Standing', 100, 'paula@paula.com', 0, 1286886241, 'wa', 'Barangay', 'city', 'province', 0, 0, 'wa', 'Barangay', 'city', 'province', 0, 7, 'Person', 0, 'wa', 'Barangay', 'City', '2wa', 0, 'duuuuh', 'wa', 'wa', '12344', '1231231244', 1, 7, 0, 0, 0, 0, '', 0, 20111111),
(200712344, 0, 0, 100, 1, 'undergraduate', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Jedalisa', 'Sevilla', 'Strawberry', 'b1fcc3da91efe20f1e2ab889f13a932d', '', '', 0, '', '', '', 'No', '', 2010, 0, 'Good Standing', 100, '', 0, 1286779584, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 3, 0, 0, 0, 0, '', 0, 20101212),
(200900005, 0, 0, 0, 2, '', 0, '', 0, '', 0, 'Male', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Joseph', 'Lim', 'Bryan', 'cd73502828457d15655bbd7a63fb0bc8', 'What was the name of your first school?', 'UP', 0, '', 'Papa Lim', 'Mama Lim', '', '', 0, 0, 'Good Standing', 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 7, 0, 0, 0, 0, '', 0, 2012),
(200799999, 0, 0, 100, 1, 'undergraduate', 0, '', 0, 'D', 0, 'Male', 'single', 0, 0, 0, 'A', '', 'n', 'dual', 'no', '', '', 0, 0, 100, 100, '', 'Damon', 'Salvator', 'Stefan', 'ae49b57a65e398274237aa7e67b81fed', '', '', 2222222, 'Tac', 'asa', 'asas', 'no', 'no', 2014, 1, 'Good Standing', 100, 'dawn@dawm.com', 453, 1286885257, 'cvb', 'dfgd', 'dfgdf', 'dfgd', 25, 453, 'cvb', 'dfgd', 'dfgdf', 'dfgd', 25, 111, 'afsa', 1241, 'zs', 'asfa', 'asfas', 'asfas', 34534, 'sdgfs', 'sdgfsd', 'sdgsd', '243', '345634', 1, 6, 0, 0, 0, 0, '', 0, 20151010),
(200710101, 0, 0, 100, 1, 'undergraduate', 0, '', 0, '', 0, 'Male', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'james', 'lafferty', 'fio', '41ef2faab1d95697db1fa46b8b137faf', '', '', 0, '', '', '', 'No', '', 2014, 1, 'Good Standing', 100, '', 0, 1286886181, '', '', '', '', 0, 0, '', '', '', '', 0, 111, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 12, 0, 0, 0, 0, '', 0, 20151010);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `student_assessment`
--

INSERT INTO `student_assessment` (`assessment_id`, `to_pay_amount`, `assessment_status`, `student_number`) VALUES
(14, 3252.5, 'paid', 200733333),
(12, 6451.5, 'unpaid', 200720010),
(15, 4451.5, 'paid', 200799999),
(16, 4451.5, 'unpaid', 200799999),
(17, 4451.5, 'paid', 200710101);

-- --------------------------------------------------------

--
-- Table structure for table `student_status`
--

CREATE TABLE IF NOT EXISTS `student_status` (
  `student_number` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `section_label` char(1) NOT NULL,
  `status` enum('confirmed','unconfirmed','waitlisted','enrolled','assessed','paid') NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `waitlist_counter` int(11) NOT NULL,
  PRIMARY KEY (`student_number`,`course_code`,`section_label`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_status`
--

INSERT INTO `student_status` (`student_number`, `course_code`, `section_label`, `status`, `semester`, `academic_year`, `waitlist_counter`) VALUES
(200799999, 'comm1', 'A', 'enrolled', 1, 2010, 0),
(200711111, 'NSTP', 'A', 'confirmed', 0, 0, 0),
(200800000, 'cmsc21', 'A', 'paid', 0, 0, 0),
(200733333, 'cs198', 'A', 'paid', 0, 0, 0),
(200711111, 'comm1', 'A', 'paid', 0, 0, 0),
(200712344, 'comm1', 'A', 'enrolled', 0, 0, 0),
(200710101, 'comm1', 'B', 'enrolled', 0, 0, 0),
(200911111, 'math17', 'A', 'enrolled', 0, 0, 0),
(200700000, 'cmsc123', 'B', 'unconfirmed', 0, 0, 0);

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
(200700000, 2000, 2008, 1, 1286884763, 7),
(12, 0, 3123, 0, 1285844619, 0),
(4, 100, 432, 0, 1286778777, 7),
(200758548, 0, 2010, 0, 1285851965, 0),
(200722222, 0, 0, 0, 1286017033, 0),
(200758555, 0, 2008, 1, 1286017522, 0),
(200700005, 100, 2010, 1, 1286018013, 0),
(200735057, 100, 2011, 1, 1286454277, 7),
(200700007, 100, 2008, 1, 1286019047, 0),
(200756012, 100, 2010, 1, 1286531141, 7),
(200700009, 100, 2010, 3, 1286253160, 7),
(200720010, 100, 2000, 0, 1286355943, 7),
(200700004, 100, 2010, 0, 1286452284, 7),
(200700008, 0, 0, 0, 1286451907, 7),
(201012345, 100, 2011, 1, 1286715800, 7),
(200758563, 2000, 2008, 1, 1286702140, 7),
(20070010, 100, 1231, 1, 1286703383, 7),
(200712344, 100, 2010, 0, 1286779584, 7),
(200712345, 100, 2001, 0, 1286716468, 1111),
(200758572, 100, 2010, 1, 1286716549, 7),
(0, 100, 2, 0, 1286766121, 7),
(200799999, 100, 2014, 1, 1286884944, 111),
(200700000, 100, 2007, 1, 1286886040, 7),
(200710101, 100, 2014, 1, 1286886095, 111);

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
('NSTP', 'National Service Training Program', 'added', 978220800, 978220800, 1286779624, 0, 0, '', 2011, 2, 'undergraduate', 1, 0, 0),
('STS40', 'Science Technology and Society', 'added', 978220800, 978220800, 1286779581, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 0),
('cmsc21', 'Object Oriented Programming', 'added', 978220800, 978220800, 1286779492, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 300),
('Math17', 'Intro to Mathematics', 'added', 978220800, 978220800, 1286779454, 0, 0, '', 2011, 5, 'undergraduate', 1, 0, 0),
('math53', 'Intro to Calculus', 'added', 978220800, 978220800, 1286779398, 0, 0, '', 2011, 5, 'undergraduate', 1, 0, 0),
('cs170', 'Elective CompSci', 'added', 978220800, 978220800, 1286779330, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 300),
('Bio1', 'Intro to Biology', 'added', 978220800, 978220800, 1286779297, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 0),
('cmsc11', 'Intro to Computer Science', 'added', 978220800, 978220800, 1286779274, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 300),
('comm1', 'Communications', 'added', 978220800, 978220800, 1286779210, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 0),
('cs198', 'GIS', 'added', 660960000, 660960000, 1286779055, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 0),
('cmsc123', 'Data Structures', 'added', 660960000, 660960000, 1286779025, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 0);

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
(6, 'Administrators'),
(7, 'NonDivision');
--
-- Database: `information_schema`
--
CREATE DATABASE `information_schema` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `information_schema`;

-- --------------------------------------------------------

--
-- Table structure for table `CHARACTER_SETS`
--

CREATE TEMPORARY TABLE `CHARACTER_SETS` (
  `CHARACTER_SET_NAME` varchar(32) NOT NULL DEFAULT '',
  `DEFAULT_COLLATE_NAME` varchar(32) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(60) NOT NULL DEFAULT '',
  `MAXLEN` bigint(3) NOT NULL DEFAULT '0'
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CHARACTER_SETS`
--

INSERT INTO `CHARACTER_SETS` (`CHARACTER_SET_NAME`, `DEFAULT_COLLATE_NAME`, `DESCRIPTION`, `MAXLEN`) VALUES
('big5', 'big5_chinese_ci', 'Big5 Traditional Chinese', 2),
('dec8', 'dec8_swedish_ci', 'DEC West European', 1),
('cp850', 'cp850_general_ci', 'DOS West European', 1),
('hp8', 'hp8_english_ci', 'HP West European', 1),
('koi8r', 'koi8r_general_ci', 'KOI8-R Relcom Russian', 1),
('latin1', 'latin1_swedish_ci', 'cp1252 West European', 1),
('latin2', 'latin2_general_ci', 'ISO 8859-2 Central European', 1),
('swe7', 'swe7_swedish_ci', '7bit Swedish', 1),
('ascii', 'ascii_general_ci', 'US ASCII', 1),
('ujis', 'ujis_japanese_ci', 'EUC-JP Japanese', 3),
('sjis', 'sjis_japanese_ci', 'Shift-JIS Japanese', 2),
('hebrew', 'hebrew_general_ci', 'ISO 8859-8 Hebrew', 1),
('tis620', 'tis620_thai_ci', 'TIS620 Thai', 1),
('euckr', 'euckr_korean_ci', 'EUC-KR Korean', 2),
('koi8u', 'koi8u_general_ci', 'KOI8-U Ukrainian', 1),
('gb2312', 'gb2312_chinese_ci', 'GB2312 Simplified Chinese', 2),
('greek', 'greek_general_ci', 'ISO 8859-7 Greek', 1),
('cp1250', 'cp1250_general_ci', 'Windows Central European', 1),
('gbk', 'gbk_chinese_ci', 'GBK Simplified Chinese', 2),
('latin5', 'latin5_turkish_ci', 'ISO 8859-9 Turkish', 1),
('armscii8', 'armscii8_general_ci', 'ARMSCII-8 Armenian', 1),
('utf8', 'utf8_general_ci', 'UTF-8 Unicode', 3),
('ucs2', 'ucs2_general_ci', 'UCS-2 Unicode', 2),
('cp866', 'cp866_general_ci', 'DOS Russian', 1),
('keybcs2', 'keybcs2_general_ci', 'DOS Kamenicky Czech-Slovak', 1),
('macce', 'macce_general_ci', 'Mac Central European', 1),
('macroman', 'macroman_general_ci', 'Mac West European', 1),
('cp852', 'cp852_general_ci', 'DOS Central European', 1),
('latin7', 'latin7_general_ci', 'ISO 8859-13 Baltic', 1),
('cp1251', 'cp1251_general_ci', 'Windows Cyrillic', 1),
('cp1256', 'cp1256_general_ci', 'Windows Arabic', 1),
('cp1257', 'cp1257_general_ci', 'Windows Baltic', 1),
('binary', 'binary', 'Binary pseudo charset', 1),
('geostd8', 'geostd8_general_ci', 'GEOSTD8 Georgian', 1),
('cp932', 'cp932_japanese_ci', 'SJIS for Windows Japanese', 2),
('eucjpms', 'eucjpms_japanese_ci', 'UJIS for Windows Japanese', 3);

-- --------------------------------------------------------

--
-- Table structure for table `COLLATIONS`
--

CREATE TEMPORARY TABLE `COLLATIONS` (
  `COLLATION_NAME` varchar(32) NOT NULL DEFAULT '',
  `CHARACTER_SET_NAME` varchar(32) NOT NULL DEFAULT '',
  `ID` bigint(11) NOT NULL DEFAULT '0',
  `IS_DEFAULT` varchar(3) NOT NULL DEFAULT '',
  `IS_COMPILED` varchar(3) NOT NULL DEFAULT '',
  `SORTLEN` bigint(3) NOT NULL DEFAULT '0'
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COLLATIONS`
--

INSERT INTO `COLLATIONS` (`COLLATION_NAME`, `CHARACTER_SET_NAME`, `ID`, `IS_DEFAULT`, `IS_COMPILED`, `SORTLEN`) VALUES
('big5_chinese_ci', 'big5', 1, 'Yes', 'Yes', 1),
('big5_bin', 'big5', 84, '', 'Yes', 1),
('dec8_swedish_ci', 'dec8', 3, 'Yes', 'Yes', 1),
('dec8_bin', 'dec8', 69, '', 'Yes', 1),
('cp850_general_ci', 'cp850', 4, 'Yes', 'Yes', 1),
('cp850_bin', 'cp850', 80, '', 'Yes', 1),
('hp8_english_ci', 'hp8', 6, 'Yes', 'Yes', 1),
('hp8_bin', 'hp8', 72, '', 'Yes', 1),
('koi8r_general_ci', 'koi8r', 7, 'Yes', 'Yes', 1),
('koi8r_bin', 'koi8r', 74, '', 'Yes', 1),
('latin1_german1_ci', 'latin1', 5, '', 'Yes', 1),
('latin1_swedish_ci', 'latin1', 8, 'Yes', 'Yes', 1),
('latin1_danish_ci', 'latin1', 15, '', 'Yes', 1),
('latin1_german2_ci', 'latin1', 31, '', 'Yes', 2),
('latin1_bin', 'latin1', 47, '', 'Yes', 1),
('latin1_general_ci', 'latin1', 48, '', 'Yes', 1),
('latin1_general_cs', 'latin1', 49, '', 'Yes', 1),
('latin1_spanish_ci', 'latin1', 94, '', 'Yes', 1),
('latin2_czech_cs', 'latin2', 2, '', 'Yes', 4),
('latin2_general_ci', 'latin2', 9, 'Yes', 'Yes', 1),
('latin2_hungarian_ci', 'latin2', 21, '', 'Yes', 1),
('latin2_croatian_ci', 'latin2', 27, '', 'Yes', 1),
('latin2_bin', 'latin2', 77, '', 'Yes', 1),
('swe7_swedish_ci', 'swe7', 10, 'Yes', 'Yes', 1),
('swe7_bin', 'swe7', 82, '', 'Yes', 1),
('ascii_general_ci', 'ascii', 11, 'Yes', 'Yes', 1),
('ascii_bin', 'ascii', 65, '', 'Yes', 1),
('ujis_japanese_ci', 'ujis', 12, 'Yes', 'Yes', 1),
('ujis_bin', 'ujis', 91, '', 'Yes', 1),
('sjis_japanese_ci', 'sjis', 13, 'Yes', 'Yes', 1),
('sjis_bin', 'sjis', 88, '', 'Yes', 1),
('hebrew_general_ci', 'hebrew', 16, 'Yes', 'Yes', 1),
('hebrew_bin', 'hebrew', 71, '', 'Yes', 1),
('tis620_thai_ci', 'tis620', 18, 'Yes', 'Yes', 4),
('tis620_bin', 'tis620', 89, '', 'Yes', 1),
('euckr_korean_ci', 'euckr', 19, 'Yes', 'Yes', 1),
('euckr_bin', 'euckr', 85, '', 'Yes', 1),
('koi8u_general_ci', 'koi8u', 22, 'Yes', 'Yes', 1),
('koi8u_bin', 'koi8u', 75, '', 'Yes', 1),
('gb2312_chinese_ci', 'gb2312', 24, 'Yes', 'Yes', 1),
('gb2312_bin', 'gb2312', 86, '', 'Yes', 1),
('greek_general_ci', 'greek', 25, 'Yes', 'Yes', 1),
('greek_bin', 'greek', 70, '', 'Yes', 1),
('cp1250_general_ci', 'cp1250', 26, 'Yes', 'Yes', 1),
('cp1250_czech_cs', 'cp1250', 34, '', 'Yes', 2),
('cp1250_croatian_ci', 'cp1250', 44, '', 'Yes', 1),
('cp1250_bin', 'cp1250', 66, '', 'Yes', 1),
('cp1250_polish_ci', 'cp1250', 99, '', 'Yes', 1),
('gbk_chinese_ci', 'gbk', 28, 'Yes', 'Yes', 1),
('gbk_bin', 'gbk', 87, '', 'Yes', 1),
('latin5_turkish_ci', 'latin5', 30, 'Yes', 'Yes', 1),
('latin5_bin', 'latin5', 78, '', 'Yes', 1),
('armscii8_general_ci', 'armscii8', 32, 'Yes', 'Yes', 1),
('armscii8_bin', 'armscii8', 64, '', 'Yes', 1),
('utf8_general_ci', 'utf8', 33, 'Yes', 'Yes', 1),
('utf8_bin', 'utf8', 83, '', 'Yes', 1),
('utf8_unicode_ci', 'utf8', 192, '', 'Yes', 8),
('utf8_icelandic_ci', 'utf8', 193, '', 'Yes', 8),
('utf8_latvian_ci', 'utf8', 194, '', 'Yes', 8),
('utf8_romanian_ci', 'utf8', 195, '', 'Yes', 8),
('utf8_slovenian_ci', 'utf8', 196, '', 'Yes', 8),
('utf8_polish_ci', 'utf8', 197, '', 'Yes', 8),
('utf8_estonian_ci', 'utf8', 198, '', 'Yes', 8),
('utf8_spanish_ci', 'utf8', 199, '', 'Yes', 8),
('utf8_swedish_ci', 'utf8', 200, '', 'Yes', 8),
('utf8_turkish_ci', 'utf8', 201, '', 'Yes', 8),
('utf8_czech_ci', 'utf8', 202, '', 'Yes', 8),
('utf8_danish_ci', 'utf8', 203, '', 'Yes', 8),
('utf8_lithuanian_ci', 'utf8', 204, '', 'Yes', 8),
('utf8_slovak_ci', 'utf8', 205, '', 'Yes', 8),
('utf8_spanish2_ci', 'utf8', 206, '', 'Yes', 8),
('utf8_roman_ci', 'utf8', 207, '', 'Yes', 8),
('utf8_persian_ci', 'utf8', 208, '', 'Yes', 8),
('utf8_esperanto_ci', 'utf8', 209, '', 'Yes', 8),
('utf8_hungarian_ci', 'utf8', 210, '', 'Yes', 8),
('ucs2_general_ci', 'ucs2', 35, 'Yes', 'Yes', 1),
('ucs2_bin', 'ucs2', 90, '', 'Yes', 1),
('ucs2_unicode_ci', 'ucs2', 128, '', 'Yes', 8),
('ucs2_icelandic_ci', 'ucs2', 129, '', 'Yes', 8),
('ucs2_latvian_ci', 'ucs2', 130, '', 'Yes', 8),
('ucs2_romanian_ci', 'ucs2', 131, '', 'Yes', 8),
('ucs2_slovenian_ci', 'ucs2', 132, '', 'Yes', 8),
('ucs2_polish_ci', 'ucs2', 133, '', 'Yes', 8),
('ucs2_estonian_ci', 'ucs2', 134, '', 'Yes', 8),
('ucs2_spanish_ci', 'ucs2', 135, '', 'Yes', 8),
('ucs2_swedish_ci', 'ucs2', 136, '', 'Yes', 8),
('ucs2_turkish_ci', 'ucs2', 137, '', 'Yes', 8),
('ucs2_czech_ci', 'ucs2', 138, '', 'Yes', 8),
('ucs2_danish_ci', 'ucs2', 139, '', 'Yes', 8),
('ucs2_lithuanian_ci', 'ucs2', 140, '', 'Yes', 8),
('ucs2_slovak_ci', 'ucs2', 141, '', 'Yes', 8),
('ucs2_spanish2_ci', 'ucs2', 142, '', 'Yes', 8),
('ucs2_roman_ci', 'ucs2', 143, '', 'Yes', 8),
('ucs2_persian_ci', 'ucs2', 144, '', 'Yes', 8),
('ucs2_esperanto_ci', 'ucs2', 145, '', 'Yes', 8),
('ucs2_hungarian_ci', 'ucs2', 146, '', 'Yes', 8),
('cp866_general_ci', 'cp866', 36, 'Yes', 'Yes', 1),
('cp866_bin', 'cp866', 68, '', 'Yes', 1),
('keybcs2_general_ci', 'keybcs2', 37, 'Yes', 'Yes', 1),
('keybcs2_bin', 'keybcs2', 73, '', 'Yes', 1),
('macce_general_ci', 'macce', 38, 'Yes', 'Yes', 1),
('macce_bin', 'macce', 43, '', 'Yes', 1),
('macroman_general_ci', 'macroman', 39, 'Yes', 'Yes', 1),
('macroman_bin', 'macroman', 53, '', 'Yes', 1),
('cp852_general_ci', 'cp852', 40, 'Yes', 'Yes', 1),
('cp852_bin', 'cp852', 81, '', 'Yes', 1),
('latin7_estonian_cs', 'latin7', 20, '', 'Yes', 1),
('latin7_general_ci', 'latin7', 41, 'Yes', 'Yes', 1),
('latin7_general_cs', 'latin7', 42, '', 'Yes', 1),
('latin7_bin', 'latin7', 79, '', 'Yes', 1),
('cp1251_bulgarian_ci', 'cp1251', 14, '', 'Yes', 1),
('cp1251_ukrainian_ci', 'cp1251', 23, '', 'Yes', 1),
('cp1251_bin', 'cp1251', 50, '', 'Yes', 1),
('cp1251_general_ci', 'cp1251', 51, 'Yes', 'Yes', 1),
('cp1251_general_cs', 'cp1251', 52, '', 'Yes', 1),
('cp1256_general_ci', 'cp1256', 57, 'Yes', 'Yes', 1),
('cp1256_bin', 'cp1256', 67, '', 'Yes', 1),
('cp1257_lithuanian_ci', 'cp1257', 29, '', 'Yes', 1),
('cp1257_bin', 'cp1257', 58, '', 'Yes', 1),
('cp1257_general_ci', 'cp1257', 59, 'Yes', 'Yes', 1),
('binary', 'binary', 63, 'Yes', 'Yes', 1),
('geostd8_general_ci', 'geostd8', 92, 'Yes', 'Yes', 1),
('geostd8_bin', 'geostd8', 93, '', 'Yes', 1),
('cp932_japanese_ci', 'cp932', 95, 'Yes', 'Yes', 1),
('cp932_bin', 'cp932', 96, '', 'Yes', 1),
('eucjpms_japanese_ci', 'eucjpms', 97, 'Yes', 'Yes', 1),
('eucjpms_bin', 'eucjpms', 98, '', 'Yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `COLLATION_CHARACTER_SET_APPLICABILITY`
--

CREATE TEMPORARY TABLE `COLLATION_CHARACTER_SET_APPLICABILITY` (
  `COLLATION_NAME` varchar(32) NOT NULL DEFAULT '',
  `CHARACTER_SET_NAME` varchar(32) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COLLATION_CHARACTER_SET_APPLICABILITY`
--

INSERT INTO `COLLATION_CHARACTER_SET_APPLICABILITY` (`COLLATION_NAME`, `CHARACTER_SET_NAME`) VALUES
('big5_chinese_ci', 'big5'),
('big5_bin', 'big5'),
('dec8_swedish_ci', 'dec8'),
('dec8_bin', 'dec8'),
('cp850_general_ci', 'cp850'),
('cp850_bin', 'cp850'),
('hp8_english_ci', 'hp8'),
('hp8_bin', 'hp8'),
('koi8r_general_ci', 'koi8r'),
('koi8r_bin', 'koi8r'),
('latin1_german1_ci', 'latin1'),
('latin1_swedish_ci', 'latin1'),
('latin1_danish_ci', 'latin1'),
('latin1_german2_ci', 'latin1'),
('latin1_bin', 'latin1'),
('latin1_general_ci', 'latin1'),
('latin1_general_cs', 'latin1'),
('latin1_spanish_ci', 'latin1'),
('latin2_czech_cs', 'latin2'),
('latin2_general_ci', 'latin2'),
('latin2_hungarian_ci', 'latin2'),
('latin2_croatian_ci', 'latin2'),
('latin2_bin', 'latin2'),
('swe7_swedish_ci', 'swe7'),
('swe7_bin', 'swe7'),
('ascii_general_ci', 'ascii'),
('ascii_bin', 'ascii'),
('ujis_japanese_ci', 'ujis'),
('ujis_bin', 'ujis'),
('sjis_japanese_ci', 'sjis'),
('sjis_bin', 'sjis'),
('hebrew_general_ci', 'hebrew'),
('hebrew_bin', 'hebrew'),
('filename', 'filename'),
('tis620_thai_ci', 'tis620'),
('tis620_bin', 'tis620'),
('euckr_korean_ci', 'euckr'),
('euckr_bin', 'euckr'),
('koi8u_general_ci', 'koi8u'),
('koi8u_bin', 'koi8u'),
('gb2312_chinese_ci', 'gb2312'),
('gb2312_bin', 'gb2312'),
('greek_general_ci', 'greek'),
('greek_bin', 'greek'),
('cp1250_general_ci', 'cp1250'),
('cp1250_czech_cs', 'cp1250'),
('cp1250_croatian_ci', 'cp1250'),
('cp1250_bin', 'cp1250'),
('cp1250_polish_ci', 'cp1250'),
('gbk_chinese_ci', 'gbk'),
('gbk_bin', 'gbk'),
('latin5_turkish_ci', 'latin5'),
('latin5_bin', 'latin5'),
('armscii8_general_ci', 'armscii8'),
('armscii8_bin', 'armscii8'),
('utf8_general_ci', 'utf8'),
('utf8_bin', 'utf8'),
('utf8_unicode_ci', 'utf8'),
('utf8_icelandic_ci', 'utf8'),
('utf8_latvian_ci', 'utf8'),
('utf8_romanian_ci', 'utf8'),
('utf8_slovenian_ci', 'utf8'),
('utf8_polish_ci', 'utf8'),
('utf8_estonian_ci', 'utf8'),
('utf8_spanish_ci', 'utf8'),
('utf8_swedish_ci', 'utf8'),
('utf8_turkish_ci', 'utf8'),
('utf8_czech_ci', 'utf8'),
('utf8_danish_ci', 'utf8'),
('utf8_lithuanian_ci', 'utf8'),
('utf8_slovak_ci', 'utf8'),
('utf8_spanish2_ci', 'utf8'),
('utf8_roman_ci', 'utf8'),
('utf8_persian_ci', 'utf8'),
('utf8_esperanto_ci', 'utf8'),
('utf8_hungarian_ci', 'utf8'),
('ucs2_general_ci', 'ucs2'),
('ucs2_bin', 'ucs2'),
('ucs2_unicode_ci', 'ucs2'),
('ucs2_icelandic_ci', 'ucs2'),
('ucs2_latvian_ci', 'ucs2'),
('ucs2_romanian_ci', 'ucs2'),
('ucs2_slovenian_ci', 'ucs2'),
('ucs2_polish_ci', 'ucs2'),
('ucs2_estonian_ci', 'ucs2'),
('ucs2_spanish_ci', 'ucs2'),
('ucs2_swedish_ci', 'ucs2'),
('ucs2_turkish_ci', 'ucs2'),
('ucs2_czech_ci', 'ucs2'),
('ucs2_danish_ci', 'ucs2'),
('ucs2_lithuanian_ci', 'ucs2'),
('ucs2_slovak_ci', 'ucs2'),
('ucs2_spanish2_ci', 'ucs2'),
('ucs2_roman_ci', 'ucs2'),
('ucs2_persian_ci', 'ucs2'),
('ucs2_esperanto_ci', 'ucs2'),
('ucs2_hungarian_ci', 'ucs2'),
('cp866_general_ci', 'cp866'),
('cp866_bin', 'cp866'),
('keybcs2_general_ci', 'keybcs2'),
('keybcs2_bin', 'keybcs2'),
('macce_general_ci', 'macce'),
('macce_bin', 'macce'),
('macroman_general_ci', 'macroman'),
('macroman_bin', 'macroman'),
('cp852_general_ci', 'cp852'),
('cp852_bin', 'cp852'),
('latin7_estonian_cs', 'latin7'),
('latin7_general_ci', 'latin7'),
('latin7_general_cs', 'latin7'),
('latin7_bin', 'latin7'),
('cp1251_bulgarian_ci', 'cp1251'),
('cp1251_ukrainian_ci', 'cp1251'),
('cp1251_bin', 'cp1251'),
('cp1251_general_ci', 'cp1251'),
('cp1251_general_cs', 'cp1251'),
('cp1256_general_ci', 'cp1256'),
('cp1256_bin', 'cp1256'),
('cp1257_lithuanian_ci', 'cp1257'),
('cp1257_bin', 'cp1257'),
('cp1257_general_ci', 'cp1257'),
('binary', 'binary'),
('geostd8_general_ci', 'geostd8'),
('geostd8_bin', 'geostd8'),
('cp932_japanese_ci', 'cp932'),
('cp932_bin', 'cp932'),
('eucjpms_japanese_ci', 'eucjpms'),
('eucjpms_bin', 'eucjpms');

-- --------------------------------------------------------

--
-- Table structure for table `COLUMNS`
--

CREATE TEMPORARY TABLE `COLUMNS` (
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `COLUMN_NAME` varchar(64) NOT NULL DEFAULT '',
  `ORDINAL_POSITION` bigint(21) unsigned NOT NULL DEFAULT '0',
  `COLUMN_DEFAULT` longtext,
  `IS_NULLABLE` varchar(3) NOT NULL DEFAULT '',
  `DATA_TYPE` varchar(64) NOT NULL DEFAULT '',
  `CHARACTER_MAXIMUM_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `CHARACTER_OCTET_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `NUMERIC_PRECISION` bigint(21) unsigned DEFAULT NULL,
  `NUMERIC_SCALE` bigint(21) unsigned DEFAULT NULL,
  `CHARACTER_SET_NAME` varchar(32) DEFAULT NULL,
  `COLLATION_NAME` varchar(32) DEFAULT NULL,
  `COLUMN_TYPE` longtext NOT NULL,
  `COLUMN_KEY` varchar(3) NOT NULL DEFAULT '',
  `EXTRA` varchar(27) NOT NULL DEFAULT '',
  `PRIVILEGES` varchar(80) NOT NULL DEFAULT '',
  `COLUMN_COMMENT` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COLUMNS`
--

INSERT INTO `COLUMNS` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `COLUMN_NAME`, `ORDINAL_POSITION`, `COLUMN_DEFAULT`, `IS_NULLABLE`, `DATA_TYPE`, `CHARACTER_MAXIMUM_LENGTH`, `CHARACTER_OCTET_LENGTH`, `NUMERIC_PRECISION`, `NUMERIC_SCALE`, `CHARACTER_SET_NAME`, `COLLATION_NAME`, `COLUMN_TYPE`, `COLUMN_KEY`, `EXTRA`, `PRIVILEGES`, `COLUMN_COMMENT`) VALUES
(NULL, 'information_schema', 'CHARACTER_SETS', 'CHARACTER_SET_NAME', 1, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'CHARACTER_SETS', 'DEFAULT_COLLATE_NAME', 2, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'CHARACTER_SETS', 'DESCRIPTION', 3, '', 'NO', 'varchar', 60, 180, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(60)', '', '', 'select', ''),
(NULL, 'information_schema', 'CHARACTER_SETS', 'MAXLEN', 4, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'COLLATION_NAME', 1, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'CHARACTER_SET_NAME', 2, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'ID', 3, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(11)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'IS_DEFAULT', 4, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'IS_COMPILED', 5, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'SORTLEN', 6, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATION_CHARACTER_SET_APPLICABILITY', 'COLLATION_NAME', 1, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATION_CHARACTER_SET_APPLICABILITY', 'CHARACTER_SET_NAME', 2, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'TABLE_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'TABLE_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'TABLE_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_NAME', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'ORDINAL_POSITION', 5, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_DEFAULT', 6, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'IS_NULLABLE', 7, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'DATA_TYPE', 8, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'CHARACTER_MAXIMUM_LENGTH', 9, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'CHARACTER_OCTET_LENGTH', 10, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'NUMERIC_PRECISION', 11, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'NUMERIC_SCALE', 12, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'CHARACTER_SET_NAME', 13, NULL, 'YES', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLLATION_NAME', 14, NULL, 'YES', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_TYPE', 15, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_KEY', 16, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'EXTRA', 17, '', 'NO', 'varchar', 27, 81, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(27)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'PRIVILEGES', 18, '', 'NO', 'varchar', 80, 240, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(80)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_COMMENT', 19, '', 'NO', 'varchar', 255, 765, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(255)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'GRANTEE', 1, '', 'NO', 'varchar', 81, 243, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(81)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'TABLE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'TABLE_SCHEMA', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'TABLE_NAME', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'COLUMN_NAME', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'PRIVILEGE_TYPE', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'IS_GRANTABLE', 7, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'ENGINES', 'ENGINE', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ENGINES', 'SUPPORT', 2, '', 'NO', 'varchar', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8)', '', '', 'select', ''),
(NULL, 'information_schema', 'ENGINES', 'COMMENT', 3, '', 'NO', 'varchar', 80, 240, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(80)', '', '', 'select', ''),
(NULL, 'information_schema', 'ENGINES', 'TRANSACTIONS', 4, NULL, 'YES', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'ENGINES', 'XA', 5, NULL, 'YES', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'ENGINES', 'SAVEPOINTS', 6, NULL, 'YES', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'EVENT_CATALOG', 1, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'EVENT_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'EVENT_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'DEFINER', 4, '', 'NO', 'varchar', 77, 231, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(77)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'TIME_ZONE', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'EVENT_BODY', 6, '', 'NO', 'varchar', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'EVENT_DEFINITION', 7, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'EVENT_TYPE', 8, '', 'NO', 'varchar', 9, 27, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(9)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'EXECUTE_AT', 9, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'INTERVAL_VALUE', 10, NULL, 'YES', 'varchar', 256, 768, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(256)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'INTERVAL_FIELD', 11, NULL, 'YES', 'varchar', 18, 54, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(18)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'SQL_MODE', 12, '', 'NO', 'varchar', 8192, 24576, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8192)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'STARTS', 13, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'ENDS', 14, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'STATUS', 15, '', 'NO', 'varchar', 18, 54, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(18)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'ON_COMPLETION', 16, '', 'NO', 'varchar', 12, 36, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(12)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'CREATED', 17, '0000-00-00 00:00:00', 'NO', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'LAST_ALTERED', 18, '0000-00-00 00:00:00', 'NO', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'LAST_EXECUTED', 19, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'EVENT_COMMENT', 20, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'ORIGINATOR', 21, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'CHARACTER_SET_CLIENT', 22, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'COLLATION_CONNECTION', 23, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'EVENTS', 'DATABASE_COLLATION', 24, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'FILE_ID', 1, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'FILE_NAME', 2, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'FILE_TYPE', 3, '', 'NO', 'varchar', 20, 60, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'TABLESPACE_NAME', 4, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'TABLE_CATALOG', 5, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'TABLE_SCHEMA', 6, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'TABLE_NAME', 7, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'LOGFILE_GROUP_NAME', 8, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'LOGFILE_GROUP_NUMBER', 9, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'ENGINE', 10, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'FULLTEXT_KEYS', 11, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'DELETED_ROWS', 12, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'UPDATE_COUNT', 13, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'FREE_EXTENTS', 14, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'TOTAL_EXTENTS', 15, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'EXTENT_SIZE', 16, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'INITIAL_SIZE', 17, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'MAXIMUM_SIZE', 18, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'AUTOEXTEND_SIZE', 19, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'CREATION_TIME', 20, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'LAST_UPDATE_TIME', 21, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'LAST_ACCESS_TIME', 22, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'RECOVER_TIME', 23, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'TRANSACTION_COUNTER', 24, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'VERSION', 25, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'ROW_FORMAT', 26, NULL, 'YES', 'varchar', 10, 30, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'TABLE_ROWS', 27, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'AVG_ROW_LENGTH', 28, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'DATA_LENGTH', 29, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'MAX_DATA_LENGTH', 30, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'INDEX_LENGTH', 31, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'DATA_FREE', 32, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'CREATE_TIME', 33, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'UPDATE_TIME', 34, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'CHECK_TIME', 35, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'CHECKSUM', 36, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'STATUS', 37, '', 'NO', 'varchar', 20, 60, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'FILES', 'EXTRA', 38, NULL, 'YES', 'varchar', 255, 765, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(255)', '', '', 'select', ''),
(NULL, 'information_schema', 'GLOBAL_STATUS', 'VARIABLE_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'GLOBAL_STATUS', 'VARIABLE_VALUE', 2, NULL, 'YES', 'varchar', 1024, 3072, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(1024)', '', '', 'select', ''),
(NULL, 'information_schema', 'GLOBAL_VARIABLES', 'VARIABLE_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'GLOBAL_VARIABLES', 'VARIABLE_VALUE', 2, NULL, 'YES', 'varchar', 1024, 3072, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(1024)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'CONSTRAINT_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'CONSTRAINT_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'CONSTRAINT_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'TABLE_CATALOG', 4, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'TABLE_SCHEMA', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'TABLE_NAME', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'COLUMN_NAME', 7, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'ORDINAL_POSITION', 8, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'POSITION_IN_UNIQUE_CONSTRAINT', 9, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'REFERENCED_TABLE_SCHEMA', 10, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'REFERENCED_TABLE_NAME', 11, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'REFERENCED_COLUMN_NAME', 12, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'TABLE_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'TABLE_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'TABLE_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'PARTITION_NAME', 4, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'SUBPARTITION_NAME', 5, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'PARTITION_ORDINAL_POSITION', 6, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'SUBPARTITION_ORDINAL_POSITION', 7, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'PARTITION_METHOD', 8, NULL, 'YES', 'varchar', 12, 36, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(12)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'SUBPARTITION_METHOD', 9, NULL, 'YES', 'varchar', 12, 36, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(12)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'PARTITION_EXPRESSION', 10, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'SUBPARTITION_EXPRESSION', 11, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'PARTITION_DESCRIPTION', 12, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'TABLE_ROWS', 13, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'AVG_ROW_LENGTH', 14, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'DATA_LENGTH', 15, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'MAX_DATA_LENGTH', 16, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'INDEX_LENGTH', 17, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'DATA_FREE', 18, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'CREATE_TIME', 19, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'UPDATE_TIME', 20, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'CHECK_TIME', 21, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'CHECKSUM', 22, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'PARTITION_COMMENT', 23, '', 'NO', 'varchar', 80, 240, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(80)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'NODEGROUP', 24, '', 'NO', 'varchar', 12, 36, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(12)', '', '', 'select', ''),
(NULL, 'information_schema', 'PARTITIONS', 'TABLESPACE_NAME', 25, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_VERSION', 2, '', 'NO', 'varchar', 20, 60, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_STATUS', 3, '', 'NO', 'varchar', 10, 30, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_TYPE', 4, '', 'NO', 'varchar', 80, 240, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(80)', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_TYPE_VERSION', 5, '', 'NO', 'varchar', 20, 60, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_LIBRARY', 6, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_LIBRARY_VERSION', 7, NULL, 'YES', 'varchar', 20, 60, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_AUTHOR', 8, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_DESCRIPTION', 9, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'PLUGINS', 'PLUGIN_LICENSE', 10, NULL, 'YES', 'varchar', 80, 240, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(80)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROCESSLIST', 'ID', 1, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROCESSLIST', 'USER', 2, '', 'NO', 'varchar', 16, 48, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(16)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROCESSLIST', 'HOST', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROCESSLIST', 'DB', 4, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROCESSLIST', 'COMMAND', 5, '', 'NO', 'varchar', 16, 48, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(16)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROCESSLIST', 'TIME', 6, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(7)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROCESSLIST', 'STATE', 7, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROCESSLIST', 'INFO', 8, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'QUERY_ID', 1, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SEQ', 2, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'STATE', 3, '', 'NO', 'varchar', 30, 90, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(30)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'DURATION', 4, '0.000000', 'NO', 'decimal', NULL, NULL, 9, 6, NULL, NULL, 'decimal(9,6)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'CPU_USER', 5, NULL, 'YES', 'decimal', NULL, NULL, 9, 6, NULL, NULL, 'decimal(9,6)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'CPU_SYSTEM', 6, NULL, 'YES', 'decimal', NULL, NULL, 9, 6, NULL, NULL, 'decimal(9,6)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'CONTEXT_VOLUNTARY', 7, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'CONTEXT_INVOLUNTARY', 8, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'BLOCK_OPS_IN', 9, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'BLOCK_OPS_OUT', 10, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'MESSAGES_SENT', 11, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'MESSAGES_RECEIVED', 12, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'PAGE_FAULTS_MAJOR', 13, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'PAGE_FAULTS_MINOR', 14, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SWAPS', 15, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SOURCE_FUNCTION', 16, NULL, 'YES', 'varchar', 30, 90, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(30)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SOURCE_FILE', 17, NULL, 'YES', 'varchar', 20, 60, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SOURCE_LINE', 18, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'CONSTRAINT_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'CONSTRAINT_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'CONSTRAINT_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'UNIQUE_CONSTRAINT_CATALOG', 4, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'UNIQUE_CONSTRAINT_SCHEMA', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'UNIQUE_CONSTRAINT_NAME', 6, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'MATCH_OPTION', 7, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'UPDATE_RULE', 8, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'DELETE_RULE', 9, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'TABLE_NAME', 10, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'REFERENCED_TABLE_NAME', 11, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SPECIFIC_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_SCHEMA', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_NAME', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_TYPE', 5, '', 'NO', 'varchar', 9, 27, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(9)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'DTD_IDENTIFIER', 6, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_BODY', 7, '', 'NO', 'varchar', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_DEFINITION', 8, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'EXTERNAL_NAME', 9, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'EXTERNAL_LANGUAGE', 10, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'PARAMETER_STYLE', 11, '', 'NO', 'varchar', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'IS_DETERMINISTIC', 12, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SQL_DATA_ACCESS', 13, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SQL_PATH', 14, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SECURITY_TYPE', 15, '', 'NO', 'varchar', 7, 21, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(7)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'CREATED', 16, '0000-00-00 00:00:00', 'NO', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'LAST_ALTERED', 17, '0000-00-00 00:00:00', 'NO', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SQL_MODE', 18, '', 'NO', 'varchar', 8192, 24576, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8192)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_COMMENT', 19, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'DEFINER', 20, '', 'NO', 'varchar', 77, 231, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(77)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'CHARACTER_SET_CLIENT', 21, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'COLLATION_CONNECTION', 22, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'DATABASE_COLLATION', 23, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'CATALOG_NAME', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'SCHEMA_NAME', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'DEFAULT_CHARACTER_SET_NAME', 3, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'DEFAULT_COLLATION_NAME', 4, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'SQL_PATH', 5, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'GRANTEE', 1, '', 'NO', 'varchar', 81, 243, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(81)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'TABLE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'TABLE_SCHEMA', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'PRIVILEGE_TYPE', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'IS_GRANTABLE', 5, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'SESSION_STATUS', 'VARIABLE_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SESSION_STATUS', 'VARIABLE_VALUE', 2, NULL, 'YES', 'varchar', 1024, 3072, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(1024)', '', '', 'select', ''),
(NULL, 'information_schema', 'SESSION_VARIABLES', 'VARIABLE_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SESSION_VARIABLES', 'VARIABLE_VALUE', 2, NULL, 'YES', 'varchar', 1024, 3072, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(1024)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'TABLE_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'TABLE_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'TABLE_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'NON_UNIQUE', 4, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(1)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'INDEX_SCHEMA', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'INDEX_NAME', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'SEQ_IN_INDEX', 7, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(2)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'COLUMN_NAME', 8, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'COLLATION', 9, NULL, 'YES', 'varchar', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(1)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'CARDINALITY', 10, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'SUB_PART', 11, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'PACKED', 12, NULL, 'YES', 'varchar', 10, 30, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'NULLABLE', 13, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'INDEX_TYPE', 14, '', 'NO', 'varchar', 16, 48, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(16)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'COMMENT', 15, NULL, 'YES', 'varchar', 16, 48, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(16)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_TYPE', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'ENGINE', 5, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'VERSION', 6, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'ROW_FORMAT', 7, NULL, 'YES', 'varchar', 10, 30, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_ROWS', 8, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'AVG_ROW_LENGTH', 9, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'DATA_LENGTH', 10, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'MAX_DATA_LENGTH', 11, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'INDEX_LENGTH', 12, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'DATA_FREE', 13, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'AUTO_INCREMENT', 14, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'CREATE_TIME', 15, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'UPDATE_TIME', 16, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'CHECK_TIME', 17, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_COLLATION', 18, NULL, 'YES', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'CHECKSUM', 19, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21) unsigned', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'CREATE_OPTIONS', 20, NULL, 'YES', 'varchar', 255, 765, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(255)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_COMMENT', 21, '', 'NO', 'varchar', 80, 240, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(80)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'CONSTRAINT_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'CONSTRAINT_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'CONSTRAINT_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'TABLE_SCHEMA', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'TABLE_NAME', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'CONSTRAINT_TYPE', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'GRANTEE', 1, '', 'NO', 'varchar', 81, 243, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(81)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'TABLE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'TABLE_SCHEMA', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'TABLE_NAME', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'PRIVILEGE_TYPE', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'IS_GRANTABLE', 6, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'TRIGGER_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'TRIGGER_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'TRIGGER_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'EVENT_MANIPULATION', 4, '', 'NO', 'varchar', 6, 18, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(6)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'EVENT_OBJECT_CATALOG', 5, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'EVENT_OBJECT_SCHEMA', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'EVENT_OBJECT_TABLE', 7, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_ORDER', 8, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_CONDITION', 9, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_STATEMENT', 10, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_ORIENTATION', 11, '', 'NO', 'varchar', 9, 27, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(9)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_TIMING', 12, '', 'NO', 'varchar', 6, 18, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(6)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_REFERENCE_OLD_TABLE', 13, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_REFERENCE_NEW_TABLE', 14, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_REFERENCE_OLD_ROW', 15, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_REFERENCE_NEW_ROW', 16, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'CREATED', 17, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'SQL_MODE', 18, '', 'NO', 'varchar', 8192, 24576, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8192)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'DEFINER', 19, '', 'NO', 'varchar', 77, 231, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(77)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'CHARACTER_SET_CLIENT', 20, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'COLLATION_CONNECTION', 21, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', '');
INSERT INTO `COLUMNS` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `COLUMN_NAME`, `ORDINAL_POSITION`, `COLUMN_DEFAULT`, `IS_NULLABLE`, `DATA_TYPE`, `CHARACTER_MAXIMUM_LENGTH`, `CHARACTER_OCTET_LENGTH`, `NUMERIC_PRECISION`, `NUMERIC_SCALE`, `CHARACTER_SET_NAME`, `COLLATION_NAME`, `COLUMN_TYPE`, `COLUMN_KEY`, `EXTRA`, `PRIVILEGES`, `COLUMN_COMMENT`) VALUES
(NULL, 'information_schema', 'TRIGGERS', 'DATABASE_COLLATION', 22, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'GRANTEE', 1, '', 'NO', 'varchar', 81, 243, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(81)', '', '', 'select', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'TABLE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'PRIVILEGE_TYPE', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'IS_GRANTABLE', 4, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'TABLE_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'TABLE_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'TABLE_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'VIEW_DEFINITION', 4, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'CHECK_OPTION', 5, '', 'NO', 'varchar', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'IS_UPDATABLE', 6, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'DEFINER', 7, '', 'NO', 'varchar', 77, 231, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(77)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'SECURITY_TYPE', 8, '', 'NO', 'varchar', 7, 21, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(7)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'CHARACTER_SET_CLIENT', 9, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'COLLATION_CONNECTION', 10, '', 'NO', 'varchar', 32, 96, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(32)', '', '', 'select', ''),
(NULL, 'db_softeng2010', 'access_levels', 'access_level_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'access_levels', 'access_level_name', 2, NULL, 'NO', 'char', 30, 30, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(30)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'accountability_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'accountability_type_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'student_number', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'details', 4, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'amount_due', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'year_incurred', 6, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'semester_incurred', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'date_added', 8, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'employee_id', 9, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'accountability_status', 10, NULL, 'NO', 'char', 7, 7, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(7)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability', 'date_cleared', 11, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability_type', 'accountability_type_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'accountability_type', 'accountability_type', 2, NULL, 'NO', 'char', 30, 30, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(30)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'adviser_history', 'student_number', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'adviser_history', 'employee_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'adviser_history', 'semester', 3, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'adviser_history', 'academic_year', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'student_number', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'unit_count', 2, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'lab_count', 3, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'nstp', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'non_citizen_fee', 5, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'entrance', 6, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'deposit', 7, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'id_fee', 8, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'in_residence', 9, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'assessment_status', 10, NULL, 'NO', 'enum', 8, 8, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''assessed'',''paid'')', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment', 'assessed_by', 11, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'look_up', 1, NULL, 'NO', 'char', 1, 1, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(1)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'athletics', 2, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'cultural', 3, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'energy', 4, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'internet', 5, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'library', 6, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'medical', 7, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'registration', 8, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'community_chest', 9, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'publication', 10, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'student_council', 11, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'laboratory_fee', 12, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'nstp_cwts', 13, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'non_citizen_fee', 14, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'entrance', 15, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'deposit', 16, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'id_fee', 17, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'in_residence', 18, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'building', 'building_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'building', 'building_name', 2, NULL, 'NO', 'char', 10, 10, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(10)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'clerk', 'employee_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'clerk', 'unit_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'current_semester_id', 'current_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'current_semester_id', 'semester_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'current_semester_id', 'academic_year', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'degree_program_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'program_code', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'degree_level', 3, NULL, 'NO', 'enum', 13, 13, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''undergraduate'',''graduate'')', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'required_years', 4, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'required_units', 5, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(3)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'degree_name', 6, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'major', 7, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'minor', 8, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'degree_title', 9, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'credited', 10, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'currently_offered', 11, NULL, 'NO', 'char', 3, 3, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(3)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'entrance_code', 12, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'enrolment_quota', 13, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'date_proposed', 14, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'date_revised', 15, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'description', 16, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_program', 'unit_id', 17, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_study_plan', 'study_plan_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_study_plan', 'degree_program_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_study_plan', 'academic_year', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_study_plan', 'semester', 4, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'degree_study_plan', 'max_units_allowed', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(2)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'designation', 'designation_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'designation', 'designation', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'employee_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'maiden_name', 2, NULL, 'NO', 'varchar', 225, 225, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(225)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'username', 3, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'password', 4, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'employee_type', 5, NULL, 'NO', 'char', 10, 10, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(10)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'first_name', 6, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'middle_name', 7, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'last_name', 8, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'gender', 9, NULL, 'NO', 'char', 6, 6, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'email_address', 10, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'designation_id', 11, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'parent_address', 12, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'present_address', 13, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'guardian', 14, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'guardian_address', 15, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'civil_status', 16, NULL, 'NO', 'char', 7, 7, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(7)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'birthdate', 17, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'contact_number', 18, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'spouse_name', 19, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'spouse_contact_number', 20, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'father_name', 21, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'mother_name', 22, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'last_updated_by', 23, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'last_updated', 24, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'housing_type', 25, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'citizenship', 26, NULL, 'NO', 'char', 30, 30, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(30)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'access_level_id', 27, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'security_question', 28, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'security_answer', 29, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'employee', 'unit_id', 30, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'event', 'event_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'event', 'event', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'event', 'academic_year', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'event', 'semester_id', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'event', 'date_of_event', 5, NULL, 'NO', 'date', NULL, NULL, NULL, NULL, NULL, NULL, 'date', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'faculty', 'employee_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'faculty', 'unit_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'faculty', 'employment_type', 3, NULL, 'NO', 'char', 8, 8, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(8)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'faculty', 'designation_id', 4, NULL, 'NO', 'char', 10, 10, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(10)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'course_code', 1, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'section_label', 2, NULL, 'NO', 'char', 1, 1, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(1)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'student_number', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'remarks', 4, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'date_incurred', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'initial_grade', 6, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'completion_grade', 7, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'grade_status', 8, NULL, 'NO', 'enum', 7, 7, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''failed'',''passed'',''inc'',''removal'')', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'semester', 9, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'grade', 'academic_year', 10, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'offered_subjects', 'course_code', 1, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'offered_subjects', 'degree_program_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'payment', 'official_receipt_number', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'payment', 'employee_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'payment', 'amount_paid', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'payment', 'date_paid', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'payment', 'accountability_id', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'payment', 'semester', 6, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'payment', 'academic_year', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'prerequisite', 'course_code', 1, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'prerequisite', 'prereq_course_code', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'room', 'room_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'room', 'building_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'scholars', 'scholarship_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'scholars', 'student_number', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'scholars', 'set_by', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'scholarship', 'scholarship_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'scholarship', 'scholarship_name', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'scholarship', 'amount_shouldered', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'course_code', 1, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'section_label', 2, NULL, 'NO', 'varchar', 2, 2, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(2)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'room_id', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'employee_id', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'total_slots', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'available_slots', 6, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'waitlist_count', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'confirmed_count', 8, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'enrolled_count', 9, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'class_type', 10, NULL, 'NO', 'enum', 3, 3, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''lec'',''lab'')', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section', 'dissolved', 11, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section_schedules', 'course_code', 1, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section_schedules', 'section_label', 2, NULL, 'NO', 'varchar', 2, 2, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(2)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section_schedules', 'start_time', 3, NULL, 'NO', 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'time', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section_schedules', 'end_time', 4, NULL, 'NO', 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'time', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'section_schedules', 'day_of_the_week', 5, NULL, 'NO', 'enum', 3, 3, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''M'',''T'',''W'',''Th'',''F'',''MTh'',''TF'',''S'')', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'semester', 'semester_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'semester', 'semester_type', 2, NULL, 'NO', 'char', 20, 20, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(20)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'slb', 'slb_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'slb', 'loaned_amount', 2, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'slb', 'employee_id', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'slb', 'student_number', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'slb', 'term_incurred', 5, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'slb', 'date_incurred', 6, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'slb', 'academic_year', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'stfap', 'stfap_bracket_id', 1, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'stfap', 'stfap_bracket', 2, NULL, 'NO', 'char', 2, 2, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(2)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'stfap', 'amount_per_unit', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'stfap', 'income_lower_limit', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'stfap', 'income_upper_limit', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'student_number', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'scholarship_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'unit_id', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'degree_program', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(100)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'year_level', 5, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'degree_level', 6, NULL, 'NO', 'enum', 13, 13, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''undergraduate'',''graduate'')', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'academic_year', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'semester', 8, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'stfap_bracket_id', 9, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'student_type', 10, NULL, 'NO', 'char', 1, 1, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'student_status', 11, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'gender', 12, NULL, 'NO', 'char', 6, 6, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'civil_status', 13, NULL, 'NO', 'char', 10, 10, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(10)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'program_code', 14, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'program_rev_code', 15, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'contact_number', 16, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'registration_stat', 17, NULL, 'NO', 'char', 1, 1, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'grade_info', 18, NULL, 'NO', 'char', 1, 1, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'foreign_info', 19, NULL, 'NO', 'char', 1, 1, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'citizenship', 20, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'employment', 21, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'employer_name', 22, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'employer_address', 23, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'employer_zipcode', 24, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(5)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'employer_number', 25, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'personal_income', 26, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'family_income', 27, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'add_info', 28, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'first_name', 29, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'last_name', 30, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'middle_name', 31, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'password', 32, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'security_question', 33, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'answer', 34, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'birthdate', 35, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'birthplace', 36, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'father_name', 37, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'mother_name', 38, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'graduating', 39, NULL, 'NO', 'char', 3, 3, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(3)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'residency', 40, NULL, 'NO', 'char', 3, 3, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(3)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'entry_academic_year', 41, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'entry_semester', 42, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'academic_standing', 43, NULL, 'NO', 'char', 25, 25, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(25)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'degree_program_id', 44, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'email_address', 45, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'home_house_number', 46, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'last_updated', 47, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'home_street', 48, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'home_barangay', 49, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'home_city_municipality', 50, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'home_province', 51, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'home_contact_number', 52, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'present_home_number', 53, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'present_street', 54, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'present_barangay', 55, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'present_city_municipality', 56, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'present_province', 57, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'present_contact_number', 58, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'last_updated_by', 59, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'guardian', 60, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'guardian_house_number', 61, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'guardian_street', 62, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'guardian_barangay', 63, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'guardian_city_municipality', 64, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'guardian_province', 65, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'guardian_contact_number', 66, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'recipient_name', 67, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'recipient_street', 68, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'recipient_city', 69, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'recipient_zipcode', 70, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'recipient_phone', 71, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'access_level_id', 72, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'max_units_allowed', 73, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(2)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'date_graduated', 74, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'academic_year_graduated', 75, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'semester_graduated', 76, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'gwa_graduated', 77, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'honor_received', 78, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'course_graduated', 79, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student', 'login_expiration', 80, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_assessment', 'assessment_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_assessment', 'to_pay_amount', 2, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_assessment', 'assessment_status', 3, NULL, 'NO', 'varchar', 7, 7, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(7)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_assessment', 'student_number', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_status', 'student_number', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_status', 'course_code', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', '');
INSERT INTO `COLUMNS` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `COLUMN_NAME`, `ORDINAL_POSITION`, `COLUMN_DEFAULT`, `IS_NULLABLE`, `DATA_TYPE`, `CHARACTER_MAXIMUM_LENGTH`, `CHARACTER_OCTET_LENGTH`, `NUMERIC_PRECISION`, `NUMERIC_SCALE`, `CHARACTER_SET_NAME`, `COLLATION_NAME`, `COLUMN_TYPE`, `COLUMN_KEY`, `EXTRA`, `PRIVILEGES`, `COLUMN_COMMENT`) VALUES
(NULL, 'db_softeng2010', 'student_status', 'section_label', 3, NULL, 'NO', 'char', 1, 1, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(1)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_status', 'status', 4, NULL, 'NO', 'enum', 11, 11, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''confirmed'',''unconfirmed'',''waitlisted'',''enrolled'',''assessed'',''paid'')', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_status', 'semester', 5, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_status', 'academic_year', 6, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'student_status', 'waitlist_counter', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'students_degree', 'student_number', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'students_degree', 'degree_program_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'students_degree', 'entry_academic_year', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'students_degree', 'entry_semester', 4, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'students_degree', 'last_updated', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'students_degree', 'last_updated_by', 6, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'course_code', 1, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'subject_title', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'action_taken', 3, NULL, 'NO', 'enum', 7, 7, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''added'',''updated'')', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'date_proposed', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'date_approved', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'date_first_implemented', 6, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'date_revision_implemented', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'date_abolished_in_offering', 8, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'description', 9, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'academic_year', 10, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'units', 11, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'degree_level', 12, NULL, 'NO', 'enum', 13, 13, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''undergraduate'',''graduate'')', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'semester_offered', 13, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'abolished', 14, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'subject', 'lab_fee', 15, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'unit', 'unit_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'db_softeng2010', 'unit', 'unit_name', 2, NULL, 'NO', 'char', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'columns_priv', 'Host', 1, '', 'NO', 'char', 60, 180, NULL, NULL, 'utf8', 'utf8_bin', 'char(60)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'columns_priv', 'Db', 2, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'columns_priv', 'User', 3, '', 'NO', 'char', 16, 48, NULL, NULL, 'utf8', 'utf8_bin', 'char(16)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'columns_priv', 'Table_name', 4, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'columns_priv', 'Column_name', 5, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'columns_priv', 'Timestamp', 6, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', 'on update CURRENT_TIMESTAMP', 'select,insert,update,references', ''),
(NULL, 'mysql', 'columns_priv', 'Column_priv', 7, '', 'NO', 'set', 31, 93, NULL, NULL, 'utf8', 'utf8_general_ci', 'set(''Select'',''Insert'',''Update'',''References'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Host', 1, '', 'NO', 'char', 60, 180, NULL, NULL, 'utf8', 'utf8_bin', 'char(60)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Db', 2, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'User', 3, '', 'NO', 'char', 16, 48, NULL, NULL, 'utf8', 'utf8_bin', 'char(16)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Select_priv', 4, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Insert_priv', 5, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Update_priv', 6, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Delete_priv', 7, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Create_priv', 8, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Drop_priv', 9, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Grant_priv', 10, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'References_priv', 11, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Index_priv', 12, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Alter_priv', 13, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Create_tmp_table_priv', 14, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Lock_tables_priv', 15, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Create_view_priv', 16, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Show_view_priv', 17, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Create_routine_priv', 18, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Alter_routine_priv', 19, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Execute_priv', 20, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Event_priv', 21, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'db', 'Trigger_priv', 22, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'db', 1, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'name', 2, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'body', 3, NULL, 'NO', 'longblob', 4294967295, 4294967295, NULL, NULL, NULL, NULL, 'longblob', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'definer', 4, '', 'NO', 'char', 77, 231, NULL, NULL, 'utf8', 'utf8_bin', 'char(77)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'execute_at', 5, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'interval_value', 6, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'interval_field', 7, NULL, 'YES', 'enum', 18, 54, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''YEAR'',''QUARTER'',''MONTH'',''DAY'',''HOUR'',''MINUTE'',''WEEK'',''SECOND'',''MICROSECOND'',''YEAR_MONTH'',''DAY_HOUR'',''DAY_MINUTE'',''DAY_SECOND'',''HOUR_MINUTE'',''HOUR_SECOND'',''MINUTE_SECOND'',''DAY_MICROSECOND'',''HOUR_MICROSECOND'',''MINUTE_MICROSECOND'',''SECOND_MICROSECOND'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'created', 8, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', 'on update CURRENT_TIMESTAMP', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'modified', 9, '0000-00-00 00:00:00', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'last_executed', 10, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'starts', 11, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'ends', 12, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'status', 13, 'ENABLED', 'NO', 'enum', 18, 54, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''ENABLED'',''DISABLED'',''SLAVESIDE_DISABLED'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'on_completion', 14, 'DROP', 'NO', 'enum', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''DROP'',''PRESERVE'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'sql_mode', 15, '', 'NO', 'set', 478, 1434, NULL, NULL, 'utf8', 'utf8_general_ci', 'set(''REAL_AS_FLOAT'',''PIPES_AS_CONCAT'',''ANSI_QUOTES'',''IGNORE_SPACE'',''NOT_USED'',''ONLY_FULL_GROUP_BY'',''NO_UNSIGNED_SUBTRACTION'',''NO_DIR_IN_CREATE'',''POSTGRESQL'',''ORACLE'',''MSSQL'',''DB2'',''MAXDB'',''NO_KEY_OPTIONS'',''NO_TABLE_OPTIONS'',''NO_FIELD_OPTIONS'',''MYSQL323'',''MYSQL40'',''ANSI'',''NO_AUTO_VALUE_ON_ZERO'',''NO_BACKSLASH_ESCAPES'',''STRICT_TRANS_TABLES'',''STRICT_ALL_TABLES'',''NO_ZERO_IN_DATE'',''NO_ZERO_DATE'',''INVALID_DATES'',''ERROR_FOR_DIVISION_BY_ZERO'',''TRADITIONAL'',''NO_AUTO_CREATE_USER'',''HIGH_NOT_PRECEDENCE'',''NO_ENGINE_SUBSTITUTION'',''PAD_CHAR_TO_FULL_LENGTH'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'comment', 16, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'originator', 17, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'time_zone', 18, 'SYSTEM', 'NO', 'char', 64, 64, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'character_set_client', 19, NULL, 'YES', 'char', 32, 96, NULL, NULL, 'utf8', 'utf8_bin', 'char(32)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'collation_connection', 20, NULL, 'YES', 'char', 32, 96, NULL, NULL, 'utf8', 'utf8_bin', 'char(32)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'db_collation', 21, NULL, 'YES', 'char', 32, 96, NULL, NULL, 'utf8', 'utf8_bin', 'char(32)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'event', 'body_utf8', 22, NULL, 'YES', 'longblob', 4294967295, 4294967295, NULL, NULL, NULL, NULL, 'longblob', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'func', 'name', 1, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'func', 'ret', 2, '0', 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'func', 'dl', 3, '', 'NO', 'char', 128, 384, NULL, NULL, 'utf8', 'utf8_bin', 'char(128)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'func', 'type', 4, NULL, 'NO', 'enum', 9, 27, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''function'',''aggregate'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'general_log', 'event_time', 1, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', 'on update CURRENT_TIMESTAMP', 'select,insert,update,references', ''),
(NULL, 'mysql', 'general_log', 'user_host', 2, NULL, 'NO', 'mediumtext', 16777215, 16777215, NULL, NULL, 'utf8', 'utf8_general_ci', 'mediumtext', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'general_log', 'thread_id', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'general_log', 'server_id', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'general_log', 'command_type', 5, NULL, 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'general_log', 'argument', 6, NULL, 'NO', 'mediumtext', 16777215, 16777215, NULL, NULL, 'utf8', 'utf8_general_ci', 'mediumtext', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_category', 'help_category_id', 1, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(5) unsigned', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_category', 'name', 2, NULL, 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', 'UNI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_category', 'parent_category_id', 3, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(5) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_category', 'url', 4, NULL, 'NO', 'char', 128, 384, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(128)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_keyword', 'help_keyword_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_keyword', 'name', 2, NULL, 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', 'UNI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_relation', 'help_topic_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_relation', 'help_keyword_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_topic', 'help_topic_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_topic', 'name', 2, NULL, 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', 'UNI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_topic', 'help_category_id', 3, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(5) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_topic', 'description', 4, NULL, 'NO', 'text', 65535, 65535, NULL, NULL, 'utf8', 'utf8_general_ci', 'text', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_topic', 'example', 5, NULL, 'NO', 'text', 65535, 65535, NULL, NULL, 'utf8', 'utf8_general_ci', 'text', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'help_topic', 'url', 6, NULL, 'NO', 'char', 128, 384, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(128)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Host', 1, '', 'NO', 'char', 60, 180, NULL, NULL, 'utf8', 'utf8_bin', 'char(60)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Db', 2, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Select_priv', 3, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Insert_priv', 4, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Update_priv', 5, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Delete_priv', 6, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Create_priv', 7, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Drop_priv', 8, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Grant_priv', 9, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'References_priv', 10, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Index_priv', 11, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Alter_priv', 12, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Create_tmp_table_priv', 13, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Lock_tables_priv', 14, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Create_view_priv', 15, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Show_view_priv', 16, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Create_routine_priv', 17, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Alter_routine_priv', 18, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Execute_priv', 19, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'host', 'Trigger_priv', 20, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'ndb_binlog_index', 'Position', 1, NULL, 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'ndb_binlog_index', 'File', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'ndb_binlog_index', 'epoch', 3, NULL, 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20) unsigned', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'ndb_binlog_index', 'inserts', 4, NULL, 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'ndb_binlog_index', 'updates', 5, NULL, 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'ndb_binlog_index', 'deletes', 6, NULL, 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'ndb_binlog_index', 'schemaops', 7, NULL, 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'plugin', 'name', 1, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'plugin', 'dl', 2, '', 'NO', 'char', 128, 384, NULL, NULL, 'utf8', 'utf8_bin', 'char(128)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'db', 1, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'name', 2, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'type', 3, NULL, 'NO', 'enum', 9, 27, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''FUNCTION'',''PROCEDURE'')', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'specific_name', 4, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'language', 5, 'SQL', 'NO', 'enum', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''SQL'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'sql_data_access', 6, 'CONTAINS_SQL', 'NO', 'enum', 17, 51, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''CONTAINS_SQL'',''NO_SQL'',''READS_SQL_DATA'',''MODIFIES_SQL_DATA'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'is_deterministic', 7, 'NO', 'NO', 'enum', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''YES'',''NO'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'security_type', 8, 'DEFINER', 'NO', 'enum', 7, 21, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''INVOKER'',''DEFINER'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'param_list', 9, NULL, 'NO', 'blob', 65535, 65535, NULL, NULL, NULL, NULL, 'blob', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'returns', 10, NULL, 'NO', 'longblob', 4294967295, 4294967295, NULL, NULL, NULL, NULL, 'longblob', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'body', 11, NULL, 'NO', 'longblob', 4294967295, 4294967295, NULL, NULL, NULL, NULL, 'longblob', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'definer', 12, '', 'NO', 'char', 77, 231, NULL, NULL, 'utf8', 'utf8_bin', 'char(77)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'created', 13, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', 'on update CURRENT_TIMESTAMP', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'modified', 14, '0000-00-00 00:00:00', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'sql_mode', 15, '', 'NO', 'set', 478, 1434, NULL, NULL, 'utf8', 'utf8_general_ci', 'set(''REAL_AS_FLOAT'',''PIPES_AS_CONCAT'',''ANSI_QUOTES'',''IGNORE_SPACE'',''NOT_USED'',''ONLY_FULL_GROUP_BY'',''NO_UNSIGNED_SUBTRACTION'',''NO_DIR_IN_CREATE'',''POSTGRESQL'',''ORACLE'',''MSSQL'',''DB2'',''MAXDB'',''NO_KEY_OPTIONS'',''NO_TABLE_OPTIONS'',''NO_FIELD_OPTIONS'',''MYSQL323'',''MYSQL40'',''ANSI'',''NO_AUTO_VALUE_ON_ZERO'',''NO_BACKSLASH_ESCAPES'',''STRICT_TRANS_TABLES'',''STRICT_ALL_TABLES'',''NO_ZERO_IN_DATE'',''NO_ZERO_DATE'',''INVALID_DATES'',''ERROR_FOR_DIVISION_BY_ZERO'',''TRADITIONAL'',''NO_AUTO_CREATE_USER'',''HIGH_NOT_PRECEDENCE'',''NO_ENGINE_SUBSTITUTION'',''PAD_CHAR_TO_FULL_LENGTH'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'comment', 16, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'character_set_client', 17, NULL, 'YES', 'char', 32, 96, NULL, NULL, 'utf8', 'utf8_bin', 'char(32)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'collation_connection', 18, NULL, 'YES', 'char', 32, 96, NULL, NULL, 'utf8', 'utf8_bin', 'char(32)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'db_collation', 19, NULL, 'YES', 'char', 32, 96, NULL, NULL, 'utf8', 'utf8_bin', 'char(32)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'proc', 'body_utf8', 20, NULL, 'YES', 'longblob', 4294967295, 4294967295, NULL, NULL, NULL, NULL, 'longblob', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'procs_priv', 'Host', 1, '', 'NO', 'char', 60, 180, NULL, NULL, 'utf8', 'utf8_bin', 'char(60)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'procs_priv', 'Db', 2, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'procs_priv', 'User', 3, '', 'NO', 'char', 16, 48, NULL, NULL, 'utf8', 'utf8_bin', 'char(16)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'procs_priv', 'Routine_name', 4, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'procs_priv', 'Routine_type', 5, NULL, 'NO', 'enum', 9, 27, NULL, NULL, 'utf8', 'utf8_bin', 'enum(''FUNCTION'',''PROCEDURE'')', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'procs_priv', 'Grantor', 6, '', 'NO', 'char', 77, 231, NULL, NULL, 'utf8', 'utf8_bin', 'char(77)', 'MUL', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'procs_priv', 'Proc_priv', 7, '', 'NO', 'set', 27, 81, NULL, NULL, 'utf8', 'utf8_general_ci', 'set(''Execute'',''Alter Routine'',''Grant'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'procs_priv', 'Timestamp', 8, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', 'on update CURRENT_TIMESTAMP', 'select,insert,update,references', ''),
(NULL, 'mysql', 'servers', 'Server_name', 1, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'servers', 'Host', 2, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'servers', 'Db', 3, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'servers', 'Username', 4, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'servers', 'Password', 5, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'servers', 'Port', 6, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'servers', 'Socket', 7, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'servers', 'Wrapper', 8, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'servers', 'Owner', 9, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'start_time', 1, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', 'on update CURRENT_TIMESTAMP', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'user_host', 2, NULL, 'NO', 'mediumtext', 16777215, 16777215, NULL, NULL, 'utf8', 'utf8_general_ci', 'mediumtext', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'query_time', 3, NULL, 'NO', 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'time', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'lock_time', 4, NULL, 'NO', 'time', NULL, NULL, NULL, NULL, NULL, NULL, 'time', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'rows_sent', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'rows_examined', 6, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'db', 7, NULL, 'NO', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'last_insert_id', 8, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'insert_id', 9, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'server_id', 10, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'slow_log', 'sql_text', 11, NULL, 'NO', 'mediumtext', 16777215, 16777215, NULL, NULL, 'utf8', 'utf8_general_ci', 'mediumtext', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'tables_priv', 'Host', 1, '', 'NO', 'char', 60, 180, NULL, NULL, 'utf8', 'utf8_bin', 'char(60)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'tables_priv', 'Db', 2, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'tables_priv', 'User', 3, '', 'NO', 'char', 16, 48, NULL, NULL, 'utf8', 'utf8_bin', 'char(16)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'tables_priv', 'Table_name', 4, '', 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_bin', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'tables_priv', 'Grantor', 5, '', 'NO', 'char', 77, 231, NULL, NULL, 'utf8', 'utf8_bin', 'char(77)', 'MUL', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'tables_priv', 'Timestamp', 6, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', 'on update CURRENT_TIMESTAMP', 'select,insert,update,references', ''),
(NULL, 'mysql', 'tables_priv', 'Table_priv', 7, '', 'NO', 'set', 98, 294, NULL, NULL, 'utf8', 'utf8_general_ci', 'set(''Select'',''Insert'',''Update'',''Delete'',''Create'',''Drop'',''Grant'',''References'',''Index'',''Alter'',''Create View'',''Show view'',''Trigger'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'tables_priv', 'Column_priv', 8, '', 'NO', 'set', 31, 93, NULL, NULL, 'utf8', 'utf8_general_ci', 'set(''Select'',''Insert'',''Update'',''References'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone', 'Time_zone_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone', 'Use_leap_seconds', 2, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''Y'',''N'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_leap_second', 'Transition_time', 1, NULL, 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_leap_second', 'Correction', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_name', 'Name', 1, NULL, 'NO', 'char', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(64)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_name', 'Time_zone_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_transition', 'Time_zone_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_transition', 'Transition_time', 2, NULL, 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_transition', 'Transition_type_id', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_transition_type', 'Time_zone_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_transition_type', 'Transition_type_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(10) unsigned', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_transition_type', 'Offset', 3, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_transition_type', 'Is_DST', 4, '0', 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(3) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'time_zone_transition_type', 'Abbreviation', 5, '', 'NO', 'char', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'char(8)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Host', 1, '', 'NO', 'char', 60, 180, NULL, NULL, 'utf8', 'utf8_bin', 'char(60)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'User', 2, '', 'NO', 'char', 16, 48, NULL, NULL, 'utf8', 'utf8_bin', 'char(16)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Password', 3, '', 'NO', 'char', 41, 41, NULL, NULL, 'latin1', 'latin1_bin', 'char(41)', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Select_priv', 4, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Insert_priv', 5, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Update_priv', 6, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Delete_priv', 7, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Create_priv', 8, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Drop_priv', 9, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Reload_priv', 10, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Shutdown_priv', 11, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Process_priv', 12, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'File_priv', 13, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Grant_priv', 14, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'References_priv', 15, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Index_priv', 16, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Alter_priv', 17, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Show_db_priv', 18, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Super_priv', 19, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Create_tmp_table_priv', 20, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Lock_tables_priv', 21, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Execute_priv', 22, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Repl_slave_priv', 23, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Repl_client_priv', 24, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Create_view_priv', 25, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Show_view_priv', 26, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Create_routine_priv', 27, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Alter_routine_priv', 28, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Create_user_priv', 29, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Event_priv', 30, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'Trigger_priv', 31, 'N', 'NO', 'enum', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum(''N'',''Y'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'ssl_type', 32, '', 'NO', 'enum', 9, 27, NULL, NULL, 'utf8', 'utf8_general_ci', 'enum('''',''ANY'',''X509'',''SPECIFIED'')', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'ssl_cipher', 33, NULL, 'NO', 'blob', 65535, 65535, NULL, NULL, NULL, NULL, 'blob', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'x509_issuer', 34, NULL, 'NO', 'blob', 65535, 65535, NULL, NULL, NULL, NULL, 'blob', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'x509_subject', 35, NULL, 'NO', 'blob', 65535, 65535, NULL, NULL, NULL, NULL, 'blob', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'max_questions', 36, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'max_updates', 37, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'max_connections', 38, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'mysql', 'user', 'max_user_connections', 39, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11) unsigned', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'access_levels', 'access_level_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'access_levels', 'access_level_name', 2, NULL, 'NO', 'char', 30, 30, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(30)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'accountability_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'accountability_type_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'student_number', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'details', 4, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'amount_due', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'year_incurred', 6, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'semester_incurred', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'date_added', 8, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'employee_id', 9, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'accountability_status', 10, NULL, 'NO', 'char', 7, 7, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(7)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability', 'date_cleared', 11, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability_type', 'accountability_type_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'accountability_type', 'accountability_type', 2, NULL, 'NO', 'char', 30, 30, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(30)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'adviser_history', 'student_number', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'adviser_history', 'employee_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'adviser_history', 'semester', 3, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'adviser_history', 'academic_year', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'student_number', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'unit_count', 2, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'lab_count', 3, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'nstp', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'non_citizen_fee', 5, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'entrance', 6, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'deposit', 7, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'id_fee', 8, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'in_residence', 9, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'assessment_status', 10, NULL, 'NO', 'enum', 8, 8, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''assessed'',''paid'')', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment', 'assessed_by', 11, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(20)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'look_up', 1, NULL, 'NO', 'char', 1, 1, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(1)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'athletics', 2, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'cultural', 3, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'energy', 4, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'internet', 5, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', '');
INSERT INTO `COLUMNS` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `COLUMN_NAME`, `ORDINAL_POSITION`, `COLUMN_DEFAULT`, `IS_NULLABLE`, `DATA_TYPE`, `CHARACTER_MAXIMUM_LENGTH`, `CHARACTER_OCTET_LENGTH`, `NUMERIC_PRECISION`, `NUMERIC_SCALE`, `CHARACTER_SET_NAME`, `COLLATION_NAME`, `COLUMN_TYPE`, `COLUMN_KEY`, `EXTRA`, `PRIVILEGES`, `COLUMN_COMMENT`) VALUES
(NULL, 'razel''s database', 'assessment_table', 'library', 6, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'medical', 7, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'registration', 8, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'community_chest', 9, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'publication', 10, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'student_council', 11, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'laboratory_fee', 12, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'nstp_cwts', 13, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'non_citizen_fee', 14, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'entrance', 15, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'deposit', 16, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'id_fee', 17, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'assessment_table', 'in_residence', 18, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'building', 'building_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'building', 'building_name', 2, NULL, 'NO', 'char', 10, 10, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(10)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'clerk', 'employee_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'clerk', 'unit_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'current_semester_id', 'current_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'current_semester_id', 'semester_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'current_semester_id', 'academic_year', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'degree_program_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'program_code', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'degree_level', 3, NULL, 'NO', 'enum', 13, 13, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''undergraduate'',''graduate'')', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'required_years', 4, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'required_units', 5, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(3)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'degree_name', 6, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'major', 7, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'minor', 8, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'degree_title', 9, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'credited', 10, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'currently_offered', 11, NULL, 'NO', 'char', 3, 3, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(3)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'entrance_code', 12, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'enrolment_quota', 13, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'date_proposed', 14, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'date_revised', 15, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'description', 16, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_program', 'unit_id', 17, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_study_plan', 'study_plan_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_study_plan', 'degree_program_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_study_plan', 'academic_year', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_study_plan', 'semester', 4, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'degree_study_plan', 'max_units_allowed', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(2)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'designation', 'designation_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'designation', 'designation', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'employee_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'maiden_name', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'username', 3, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'password', 4, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'employee_type', 5, NULL, 'NO', 'char', 10, 10, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(10)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'first_name', 6, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'middle_name', 7, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'last_name', 8, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'gender', 9, NULL, 'NO', 'char', 6, 6, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'email_address', 10, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'designation_id', 11, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'parent_address', 12, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'present_address', 13, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'guardian', 14, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'guardian_address', 15, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'civil_status', 16, NULL, 'NO', 'char', 7, 7, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(7)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'birthdate', 17, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'contact_number', 18, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'spouse_name', 19, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'spouse_contact_number', 20, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'father_name', 21, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'mother_name', 22, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'last_updated_by', 23, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'last_updated', 24, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'housing_type', 25, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'citizenship', 26, NULL, 'NO', 'char', 30, 30, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(30)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'access_level_id', 27, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'security_question', 28, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'security_answer', 29, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'employee', 'unit_id', 30, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'event', 'event_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'event', 'event', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'event', 'academic_year', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'event', 'semester_id', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'event', 'date_of_event', 5, NULL, 'NO', 'date', NULL, NULL, NULL, NULL, NULL, NULL, 'date', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'faculty', 'employee_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'faculty', 'unit_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'faculty', 'employment_type', 3, NULL, 'NO', 'char', 8, 8, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(8)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'faculty', 'designation_id', 4, NULL, 'NO', 'char', 10, 10, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(10)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'course_code', 1, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'section_label', 2, NULL, 'NO', 'char', 1, 1, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(1)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'student_number', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'remarks', 4, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'date_incurred', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'initial_grade', 6, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'completion_grade', 7, NULL, 'NO', 'float', NULL, NULL, 12, NULL, NULL, NULL, 'float', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'grade_status', 8, NULL, 'NO', 'enum', 7, 7, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'enum(''failed'',''passed'',''inc'',''removal'')', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'semester', 9, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'grade', 'academic_year', 10, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'offered_subjects', 'course_code', 1, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'offered_subjects', 'degree_program_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'payment', 'official_receipt_number', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'payment', 'employee_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'payment', 'amount_paid', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'payment', 'date_paid', 4, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'payment', 'accountability_id', 5, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'payment', 'semester', 6, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'payment', 'academic_year', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'prerequisite', 'course_code', 1, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'prerequisite', 'prereq_cpurse_code', 2, NULL, 'NO', 'varchar', 255, 255, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(255)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'room', 'room_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'room', 'building_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'scholars', 'scholarship_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'scholars', 'student_number', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', '', 'select,insert,update,references', ''),
(NULL, 'razel''s database', 'scholars', 'set_by', 3, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', '');

-- --------------------------------------------------------

--
-- Table structure for table `COLUMN_PRIVILEGES`
--

CREATE TEMPORARY TABLE `COLUMN_PRIVILEGES` (
  `GRANTEE` varchar(81) NOT NULL DEFAULT '',
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `COLUMN_NAME` varchar(64) NOT NULL DEFAULT '',
  `PRIVILEGE_TYPE` varchar(64) NOT NULL DEFAULT '',
  `IS_GRANTABLE` varchar(3) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COLUMN_PRIVILEGES`
--


-- --------------------------------------------------------

--
-- Table structure for table `ENGINES`
--

CREATE TEMPORARY TABLE `ENGINES` (
  `ENGINE` varchar(64) NOT NULL DEFAULT '',
  `SUPPORT` varchar(8) NOT NULL DEFAULT '',
  `COMMENT` varchar(80) NOT NULL DEFAULT '',
  `TRANSACTIONS` varchar(3) DEFAULT NULL,
  `XA` varchar(3) DEFAULT NULL,
  `SAVEPOINTS` varchar(3) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ENGINES`
--

INSERT INTO `ENGINES` (`ENGINE`, `SUPPORT`, `COMMENT`, `TRANSACTIONS`, `XA`, `SAVEPOINTS`) VALUES
('MEMORY', 'YES', 'Hash based, stored in memory, useful for temporary tables', 'NO', 'NO', 'NO'),
('FEDERATED', 'NO', 'Federated MySQL storage engine', NULL, NULL, NULL),
('MyISAM', 'DEFAULT', 'Default engine as of MySQL 3.23 with great performance', 'NO', 'NO', 'NO'),
('BLACKHOLE', 'YES', '/dev/null storage engine (anything you write to it disappears)', 'NO', 'NO', 'NO'),
('MRG_MYISAM', 'YES', 'Collection of identical MyISAM tables', 'NO', 'NO', 'NO'),
('CSV', 'YES', 'CSV storage engine', 'NO', 'NO', 'NO'),
('ARCHIVE', 'YES', 'Archive storage engine', 'NO', 'NO', 'NO'),
('InnoDB', 'YES', 'Supports transactions, row-level locking, and foreign keys', 'YES', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `EVENTS`
--

CREATE TEMPORARY TABLE `EVENTS` (
  `EVENT_CATALOG` varchar(64) DEFAULT NULL,
  `EVENT_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `EVENT_NAME` varchar(64) NOT NULL DEFAULT '',
  `DEFINER` varchar(77) NOT NULL DEFAULT '',
  `TIME_ZONE` varchar(64) NOT NULL DEFAULT '',
  `EVENT_BODY` varchar(8) NOT NULL DEFAULT '',
  `EVENT_DEFINITION` longtext NOT NULL,
  `EVENT_TYPE` varchar(9) NOT NULL DEFAULT '',
  `EXECUTE_AT` datetime DEFAULT NULL,
  `INTERVAL_VALUE` varchar(256) DEFAULT NULL,
  `INTERVAL_FIELD` varchar(18) DEFAULT NULL,
  `SQL_MODE` varchar(8192) NOT NULL DEFAULT '',
  `STARTS` datetime DEFAULT NULL,
  `ENDS` datetime DEFAULT NULL,
  `STATUS` varchar(18) NOT NULL DEFAULT '',
  `ON_COMPLETION` varchar(12) NOT NULL DEFAULT '',
  `CREATED` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LAST_ALTERED` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LAST_EXECUTED` datetime DEFAULT NULL,
  `EVENT_COMMENT` varchar(64) NOT NULL DEFAULT '',
  `ORIGINATOR` bigint(10) NOT NULL DEFAULT '0',
  `CHARACTER_SET_CLIENT` varchar(32) NOT NULL DEFAULT '',
  `COLLATION_CONNECTION` varchar(32) NOT NULL DEFAULT '',
  `DATABASE_COLLATION` varchar(32) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EVENTS`
--


-- --------------------------------------------------------

--
-- Table structure for table `FILES`
--

CREATE TEMPORARY TABLE `FILES` (
  `FILE_ID` bigint(4) NOT NULL DEFAULT '0',
  `FILE_NAME` varchar(64) DEFAULT NULL,
  `FILE_TYPE` varchar(20) NOT NULL DEFAULT '',
  `TABLESPACE_NAME` varchar(64) DEFAULT NULL,
  `TABLE_CATALOG` varchar(64) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) DEFAULT NULL,
  `TABLE_NAME` varchar(64) DEFAULT NULL,
  `LOGFILE_GROUP_NAME` varchar(64) DEFAULT NULL,
  `LOGFILE_GROUP_NUMBER` bigint(4) DEFAULT NULL,
  `ENGINE` varchar(64) NOT NULL DEFAULT '',
  `FULLTEXT_KEYS` varchar(64) DEFAULT NULL,
  `DELETED_ROWS` bigint(4) DEFAULT NULL,
  `UPDATE_COUNT` bigint(4) DEFAULT NULL,
  `FREE_EXTENTS` bigint(4) DEFAULT NULL,
  `TOTAL_EXTENTS` bigint(4) DEFAULT NULL,
  `EXTENT_SIZE` bigint(4) NOT NULL DEFAULT '0',
  `INITIAL_SIZE` bigint(21) unsigned DEFAULT NULL,
  `MAXIMUM_SIZE` bigint(21) unsigned DEFAULT NULL,
  `AUTOEXTEND_SIZE` bigint(21) unsigned DEFAULT NULL,
  `CREATION_TIME` datetime DEFAULT NULL,
  `LAST_UPDATE_TIME` datetime DEFAULT NULL,
  `LAST_ACCESS_TIME` datetime DEFAULT NULL,
  `RECOVER_TIME` bigint(4) DEFAULT NULL,
  `TRANSACTION_COUNTER` bigint(4) DEFAULT NULL,
  `VERSION` bigint(21) unsigned DEFAULT NULL,
  `ROW_FORMAT` varchar(10) DEFAULT NULL,
  `TABLE_ROWS` bigint(21) unsigned DEFAULT NULL,
  `AVG_ROW_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `DATA_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `MAX_DATA_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `INDEX_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `DATA_FREE` bigint(21) unsigned DEFAULT NULL,
  `CREATE_TIME` datetime DEFAULT NULL,
  `UPDATE_TIME` datetime DEFAULT NULL,
  `CHECK_TIME` datetime DEFAULT NULL,
  `CHECKSUM` bigint(21) unsigned DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT '',
  `EXTRA` varchar(255) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FILES`
--


-- --------------------------------------------------------

--
-- Table structure for table `GLOBAL_STATUS`
--

CREATE TEMPORARY TABLE `GLOBAL_STATUS` (
  `VARIABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `VARIABLE_VALUE` varchar(1024) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `GLOBAL_STATUS`
--

INSERT INTO `GLOBAL_STATUS` (`VARIABLE_NAME`, `VARIABLE_VALUE`) VALUES
('ABORTED_CLIENTS', '0'),
('ABORTED_CONNECTS', '0'),
('BINLOG_CACHE_DISK_USE', '0'),
('BINLOG_CACHE_USE', '19'),
('BYTES_RECEIVED', '35755913'),
('BYTES_SENT', '272575544'),
('COM_ADMIN_COMMANDS', '0'),
('COM_ASSIGN_TO_KEYCACHE', '0'),
('COM_ALTER_DB', '0'),
('COM_ALTER_DB_UPGRADE', '0'),
('COM_ALTER_EVENT', '0'),
('COM_ALTER_FUNCTION', '0'),
('COM_ALTER_PROCEDURE', '0'),
('COM_ALTER_SERVER', '0'),
('COM_ALTER_TABLE', '32'),
('COM_ALTER_TABLESPACE', '0'),
('COM_ANALYZE', '0'),
('COM_BACKUP_TABLE', '0'),
('COM_BEGIN', '0'),
('COM_BINLOG', '0'),
('COM_CALL_PROCEDURE', '0'),
('COM_CHANGE_DB', '5587'),
('COM_CHANGE_MASTER', '0'),
('COM_CHECK', '0'),
('COM_CHECKSUM', '0'),
('COM_COMMIT', '0'),
('COM_CREATE_DB', '1'),
('COM_CREATE_EVENT', '0'),
('COM_CREATE_FUNCTION', '0'),
('COM_CREATE_INDEX', '0'),
('COM_CREATE_PROCEDURE', '0'),
('COM_CREATE_SERVER', '0'),
('COM_CREATE_TABLE', '21'),
('COM_CREATE_TRIGGER', '0'),
('COM_CREATE_UDF', '0'),
('COM_CREATE_USER', '0'),
('COM_CREATE_VIEW', '0'),
('COM_DEALLOC_SQL', '0'),
('COM_DELETE', '55'),
('COM_DELETE_MULTI', '0'),
('COM_DO', '0'),
('COM_DROP_DB', '0'),
('COM_DROP_EVENT', '0'),
('COM_DROP_FUNCTION', '0'),
('COM_DROP_INDEX', '0'),
('COM_DROP_PROCEDURE', '0'),
('COM_DROP_SERVER', '0'),
('COM_DROP_TABLE', '0'),
('COM_DROP_TRIGGER', '0'),
('COM_DROP_USER', '0'),
('COM_DROP_VIEW', '0'),
('COM_EMPTY_QUERY', '0'),
('COM_EXECUTE_SQL', '0'),
('COM_FLUSH', '0'),
('COM_GRANT', '0'),
('COM_HA_CLOSE', '0'),
('COM_HA_OPEN', '0'),
('COM_HA_READ', '0'),
('COM_HELP', '0'),
('COM_INSERT', '94'),
('COM_INSERT_SELECT', '0'),
('COM_INSTALL_PLUGIN', '0'),
('COM_KILL', '0'),
('COM_LOAD', '0'),
('COM_LOAD_MASTER_DATA', '0'),
('COM_LOAD_MASTER_TABLE', '0'),
('COM_LOCK_TABLES', '0'),
('COM_OPTIMIZE', '0'),
('COM_PRELOAD_KEYS', '0'),
('COM_PREPARE_SQL', '0'),
('COM_PURGE', '0'),
('COM_PURGE_BEFORE_DATE', '0'),
('COM_RELEASE_SAVEPOINT', '0'),
('COM_RENAME_TABLE', '0'),
('COM_RENAME_USER', '0'),
('COM_REPAIR', '0'),
('COM_REPLACE', '0'),
('COM_REPLACE_SELECT', '0'),
('COM_RESET', '0'),
('COM_RESTORE_TABLE', '0'),
('COM_REVOKE', '0'),
('COM_REVOKE_ALL', '0'),
('COM_ROLLBACK', '0'),
('COM_ROLLBACK_TO_SAVEPOINT', '0'),
('COM_SAVEPOINT', '0'),
('COM_SELECT', '366960'),
('COM_SET_OPTION', '4492'),
('COM_SHOW_AUTHORS', '0'),
('COM_SHOW_BINLOG_EVENTS', '0'),
('COM_SHOW_BINLOGS', '19'),
('COM_SHOW_CHARSETS', '12'),
('COM_SHOW_COLLATIONS', '12'),
('COM_SHOW_COLUMN_TYPES', '0'),
('COM_SHOW_CONTRIBUTORS', '0'),
('COM_SHOW_CREATE_DB', '0'),
('COM_SHOW_CREATE_EVENT', '0'),
('COM_SHOW_CREATE_FUNC', '0'),
('COM_SHOW_CREATE_PROC', '0'),
('COM_SHOW_CREATE_TABLE', '324'),
('COM_SHOW_CREATE_TRIGGER', '0'),
('COM_SHOW_DATABASES', '132'),
('COM_SHOW_ENGINE_LOGS', '0'),
('COM_SHOW_ENGINE_MUTEX', '0'),
('COM_SHOW_ENGINE_STATUS', '0'),
('COM_SHOW_EVENTS', '0'),
('COM_SHOW_ERRORS', '0'),
('COM_SHOW_FIELDS', '710'),
('COM_SHOW_FUNCTION_STATUS', '0'),
('COM_SHOW_GRANTS', '12'),
('COM_SHOW_KEYS', '348'),
('COM_SHOW_MASTER_STATUS', '0'),
('COM_SHOW_NEW_MASTER', '0'),
('COM_SHOW_OPEN_TABLES', '0'),
('COM_SHOW_PLUGINS', '650'),
('COM_SHOW_PRIVILEGES', '0'),
('COM_SHOW_PROCEDURE_STATUS', '0'),
('COM_SHOW_PROCESSLIST', '0'),
('COM_SHOW_PROFILE', '0'),
('COM_SHOW_PROFILES', '0'),
('COM_SHOW_SLAVE_HOSTS', '0'),
('COM_SHOW_SLAVE_STATUS', '0'),
('COM_SHOW_STATUS', '0'),
('COM_SHOW_STORAGE_ENGINES', '28'),
('COM_SHOW_TABLE_STATUS', '808'),
('COM_SHOW_TABLES', '690'),
('COM_SHOW_TRIGGERS', '0'),
('COM_SHOW_VARIABLES', '90'),
('COM_SHOW_WARNINGS', '26'),
('COM_SLAVE_START', '0'),
('COM_SLAVE_STOP', '0'),
('COM_STMT_CLOSE', '0'),
('COM_STMT_EXECUTE', '0'),
('COM_STMT_FETCH', '0'),
('COM_STMT_PREPARE', '0'),
('COM_STMT_REPREPARE', '0'),
('COM_STMT_RESET', '0'),
('COM_STMT_SEND_LONG_DATA', '0'),
('COM_TRUNCATE', '0'),
('COM_UNINSTALL_PLUGIN', '0'),
('COM_UNLOCK_TABLES', '0'),
('COM_UPDATE', '272'),
('COM_UPDATE_MULTI', '0'),
('COM_XA_COMMIT', '0'),
('COM_XA_END', '0'),
('COM_XA_PREPARE', '0'),
('COM_XA_RECOVER', '0'),
('COM_XA_ROLLBACK', '0'),
('COM_XA_START', '0'),
('COMPRESSION', 'OFF'),
('CONNECTIONS', '3957'),
('CREATED_TMP_DISK_TABLES', '1737'),
('CREATED_TMP_FILES', '5'),
('CREATED_TMP_TABLES', '3982'),
('DELAYED_ERRORS', '0'),
('DELAYED_INSERT_THREADS', '0'),
('DELAYED_WRITES', '0'),
('FLUSH_COMMANDS', '1'),
('HANDLER_COMMIT', '19'),
('HANDLER_DELETE', '30'),
('HANDLER_DISCOVER', '0'),
('HANDLER_PREPARE', '0'),
('HANDLER_READ_FIRST', '832'),
('HANDLER_READ_KEY', '36878'),
('HANDLER_READ_NEXT', '2683'),
('HANDLER_READ_PREV', '0'),
('HANDLER_READ_RND', '51'),
('HANDLER_READ_RND_NEXT', '1401859'),
('HANDLER_ROLLBACK', '0'),
('HANDLER_SAVEPOINT', '0'),
('HANDLER_SAVEPOINT_ROLLBACK', '0'),
('HANDLER_UPDATE', '266'),
('HANDLER_WRITE', '42405'),
('INNODB_BUFFER_POOL_PAGES_DATA', '19'),
('INNODB_BUFFER_POOL_PAGES_DIRTY', '0'),
('INNODB_BUFFER_POOL_PAGES_FLUSHED', '0'),
('INNODB_BUFFER_POOL_PAGES_FREE', '493'),
('INNODB_BUFFER_POOL_PAGES_MISC', '0'),
('INNODB_BUFFER_POOL_PAGES_TOTAL', '512'),
('INNODB_BUFFER_POOL_READ_AHEAD_RND', '1'),
('INNODB_BUFFER_POOL_READ_AHEAD_SEQ', '0'),
('INNODB_BUFFER_POOL_READ_REQUESTS', '77'),
('INNODB_BUFFER_POOL_READS', '12'),
('INNODB_BUFFER_POOL_WAIT_FREE', '0'),
('INNODB_BUFFER_POOL_WRITE_REQUESTS', '0'),
('INNODB_DATA_FSYNCS', '3'),
('INNODB_DATA_PENDING_FSYNCS', '0'),
('INNODB_DATA_PENDING_READS', '0'),
('INNODB_DATA_PENDING_WRITES', '0'),
('INNODB_DATA_READ', '2494464'),
('INNODB_DATA_READS', '29'),
('INNODB_DATA_WRITES', '3'),
('INNODB_DATA_WRITTEN', '1536'),
('INNODB_DBLWR_PAGES_WRITTEN', '0'),
('INNODB_DBLWR_WRITES', '0'),
('INNODB_LOG_WAITS', '0'),
('INNODB_LOG_WRITE_REQUESTS', '0'),
('INNODB_LOG_WRITES', '1'),
('INNODB_OS_LOG_FSYNCS', '3'),
('INNODB_OS_LOG_PENDING_FSYNCS', '0'),
('INNODB_OS_LOG_PENDING_WRITES', '0'),
('INNODB_OS_LOG_WRITTEN', '512'),
('INNODB_PAGE_SIZE', '16384'),
('INNODB_PAGES_CREATED', '0'),
('INNODB_PAGES_READ', '19'),
('INNODB_PAGES_WRITTEN', '0'),
('INNODB_ROW_LOCK_CURRENT_WAITS', '0'),
('INNODB_ROW_LOCK_TIME', '0'),
('INNODB_ROW_LOCK_TIME_AVG', '0'),
('INNODB_ROW_LOCK_TIME_MAX', '0'),
('INNODB_ROW_LOCK_WAITS', '0'),
('INNODB_ROWS_DELETED', '0'),
('INNODB_ROWS_INSERTED', '0'),
('INNODB_ROWS_READ', '0'),
('INNODB_ROWS_UPDATED', '0'),
('KEY_BLOCKS_NOT_FLUSHED', '0'),
('KEY_BLOCKS_UNUSED', '14323'),
('KEY_BLOCKS_USED', '32'),
('KEY_READ_REQUESTS', '72473'),
('KEY_READS', '287'),
('KEY_WRITE_REQUESTS', '212'),
('KEY_WRITES', '145'),
('LAST_QUERY_COST', '0.000000'),
('MAX_USED_CONNECTIONS', '3'),
('NOT_FLUSHED_DELAYED_ROWS', '0'),
('OPEN_FILES', '116'),
('OPEN_STREAMS', '0'),
('OPEN_TABLE_DEFINITIONS', '77'),
('OPEN_TABLES', '57'),
('OPENED_FILES', '18589'),
('OPENED_TABLE_DEFINITIONS', '191'),
('OPENED_TABLES', '762'),
('PREPARED_STMT_COUNT', '0'),
('QCACHE_FREE_BLOCKS', '0'),
('QCACHE_FREE_MEMORY', '0'),
('QCACHE_HITS', '0'),
('QCACHE_INSERTS', '0'),
('QCACHE_LOWMEM_PRUNES', '0'),
('QCACHE_NOT_CACHED', '0'),
('QCACHE_QUERIES_IN_CACHE', '0'),
('QCACHE_TOTAL_BLOCKS', '0'),
('QUERIES', '385477'),
('QUESTIONS', '385477'),
('RPL_STATUS', 'NULL'),
('SELECT_FULL_JOIN', '80'),
('SELECT_FULL_RANGE_JOIN', '0'),
('SELECT_RANGE', '102'),
('SELECT_RANGE_CHECK', '0'),
('SELECT_SCAN', '333635'),
('SLAVE_OPEN_TEMP_TABLES', '0'),
('SLAVE_RETRIED_TRANSACTIONS', '0'),
('SLAVE_RUNNING', 'OFF'),
('SLOW_LAUNCH_THREADS', '0'),
('SLOW_QUERIES', '0'),
('SORT_MERGE_PASSES', '0'),
('SORT_RANGE', '0'),
('SORT_ROWS', '1433'),
('SORT_SCAN', '449'),
('SSL_ACCEPT_RENEGOTIATES', '0'),
('SSL_ACCEPTS', '0'),
('SSL_CALLBACK_CACHE_HITS', '0'),
('SSL_CIPHER', ''),
('SSL_CIPHER_LIST', ''),
('SSL_CLIENT_CONNECTS', '0'),
('SSL_CONNECT_RENEGOTIATES', '0'),
('SSL_CTX_VERIFY_DEPTH', '0'),
('SSL_CTX_VERIFY_MODE', '0'),
('SSL_DEFAULT_TIMEOUT', '0'),
('SSL_FINISHED_ACCEPTS', '0'),
('SSL_FINISHED_CONNECTS', '0'),
('SSL_SESSION_CACHE_HITS', '0'),
('SSL_SESSION_CACHE_MISSES', '0'),
('SSL_SESSION_CACHE_MODE', 'NONE'),
('SSL_SESSION_CACHE_OVERFLOWS', '0'),
('SSL_SESSION_CACHE_SIZE', '0'),
('SSL_SESSION_CACHE_TIMEOUTS', '0'),
('SSL_SESSIONS_REUSED', '0'),
('SSL_USED_SESSION_CACHE_ENTRIES', '0'),
('SSL_VERIFY_DEPTH', '0'),
('SSL_VERIFY_MODE', '0'),
('SSL_VERSION', ''),
('TABLE_LOCKS_IMMEDIATE', '367698'),
('TABLE_LOCKS_WAITED', '0'),
('TC_LOG_MAX_PAGES_USED', '0'),
('TC_LOG_PAGE_SIZE', '0'),
('TC_LOG_PAGE_WAITS', '0'),
('THREADS_CACHED', '0'),
('THREADS_CONNECTED', '1'),
('THREADS_CREATED', '3956'),
('THREADS_RUNNING', '1'),
('UPTIME', '29548'),
('UPTIME_SINCE_FLUSH_STATUS', '29548');

-- --------------------------------------------------------

--
-- Table structure for table `GLOBAL_VARIABLES`
--

CREATE TEMPORARY TABLE `GLOBAL_VARIABLES` (
  `VARIABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `VARIABLE_VALUE` varchar(1024) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `GLOBAL_VARIABLES`
--

INSERT INTO `GLOBAL_VARIABLES` (`VARIABLE_NAME`, `VARIABLE_VALUE`) VALUES
('MAX_PREPARED_STMT_COUNT', '16382'),
('CHARACTER_SET_CONNECTION', 'latin1'),
('HAVE_CRYPT', 'NO'),
('INIT_FILE', ''),
('MYISAM_REPAIR_THREADS', '1'),
('AUTOMATIC_SP_PRIVILEGES', 'ON'),
('MAX_ERROR_COUNT', '64'),
('BACK_LOG', '50'),
('WAIT_TIMEOUT', '28800'),
('LOG_QUERIES_NOT_USING_INDEXES', 'OFF'),
('LOG_WARNINGS', '1'),
('MYISAM_USE_MMAP', 'OFF'),
('DELAYED_INSERT_TIMEOUT', '300'),
('FLUSH', 'OFF'),
('LOG_BIN_TRUST_ROUTINE_CREATORS', 'OFF'),
('REPORT_USER', ''),
('OPEN_FILES_LIMIT', '755'),
('CHARACTER_SETS_DIR', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\share\\charsets\\'),
('IDENTITY', '0'),
('BINLOG_CACHE_SIZE', '32768'),
('UPDATABLE_VIEWS_WITH_LIMIT', 'YES'),
('MAX_RELAY_LOG_SIZE', '0'),
('SLOW_LAUNCH_TIME', '2'),
('COMPLETION_TYPE', '0'),
('INNODB_LOCK_WAIT_TIMEOUT', '50'),
('FT_QUERY_EXPANSION_LIMIT', '20'),
('RELAY_LOG_INDEX', ''),
('AUTOCOMMIT', 'ON'),
('SQL_QUOTE_SHOW_CREATE', 'ON'),
('MAX_LENGTH_FOR_SORT_DATA', '1024'),
('SQL_LOG_UPDATE', 'ON'),
('DELAYED_QUEUE_SIZE', '1000'),
('INNODB_USE_LEGACY_CARDINALITY_ALGORITHM', 'ON'),
('FT_MAX_WORD_LEN', '84'),
('OPTIMIZER_SWITCH', 'index_merge=on,index_merge_union=on,index_merge_sort_union=on,index_merge_intersection=on'),
('MAX_SEEKS_FOR_KEY', '4294967295'),
('OPTIMIZER_PRUNE_LEVEL', '1'),
('RAND_SEED2', ''),
('REPORT_HOST', ''),
('MIN_EXAMINED_ROW_LIMIT', '0'),
('SSL_KEY', ''),
('DELAYED_INSERT_LIMIT', '100'),
('TIMED_MUTEXES', 'OFF'),
('INTERACTIVE_TIMEOUT', '28800'),
('SLAVE_SKIP_ERRORS', 'OFF'),
('SQL_LOW_PRIORITY_UPDATES', 'OFF'),
('INSERT_ID', '0'),
('CONCURRENT_INSERT', '1'),
('RELAY_LOG_PURGE', 'ON'),
('DELAY_KEY_WRITE', 'ON'),
('SKIP_SHOW_DATABASE', 'OFF'),
('CONNECT_TIMEOUT', '10'),
('GROUP_CONCAT_MAX_LEN', '1024'),
('AUTO_INCREMENT_OFFSET', '1'),
('INNODB_LOG_BUFFER_SIZE', '1048576'),
('FT_STOPWORD_FILE', '(built-in)'),
('OPTIMIZER_SEARCH_DEPTH', '62'),
('JOIN_BUFFER_SIZE', '131072'),
('INNODB_MAX_PURGE_LAG', '0'),
('COLLATION_DATABASE', 'latin1_swedish_ci'),
('TRANSACTION_PREALLOC_SIZE', '4096'),
('MAX_BINLOG_SIZE', '1073741824'),
('VERSION_COMPILE_OS', 'Win32'),
('LARGE_PAGES', 'OFF'),
('SQL_NOTES', 'ON'),
('CHARACTER_SET_RESULTS', 'latin1'),
('LOW_PRIORITY_UPDATES', 'OFF'),
('MAX_CONNECT_ERRORS', '10'),
('REPORT_PASSWORD', ''),
('SERVER_ID', '1'),
('MAX_INSERT_DELAYED_THREADS', '20'),
('MAX_CONNECTIONS', '151'),
('HAVE_COMPRESS', 'YES'),
('SSL_CAPATH', ''),
('TRANSACTION_ALLOC_BLOCK_SIZE', '8192'),
('LOG_SLOW_QUERIES', 'OFF'),
('THREAD_CACHE_SIZE', '0'),
('LANGUAGE', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\share\\english\\'),
('INNODB_DOUBLEWRITE', 'ON'),
('STORAGE_ENGINE', 'MyISAM'),
('SLAVE_EXEC_MODE', 'STRICT'),
('LOWER_CASE_TABLE_NAMES', '1'),
('DEFAULT_WEEK_FORMAT', '0'),
('PSEUDO_THREAD_ID', '0'),
('LOG_OUTPUT', 'FILE'),
('FT_MIN_WORD_LEN', '4'),
('COLLATION_SERVER', 'latin1_swedish_ci'),
('LOG_BIN', 'ON'),
('PROTOCOL_VERSION', '10'),
('LONG_QUERY_TIME', '10.000000'),
('HAVE_SYMLINK', 'YES'),
('FT_BOOLEAN_SYNTAX', '+ -><()~*:""&|'),
('TIME_ZONE', 'SYSTEM'),
('MAX_HEAP_TABLE_SIZE', '16777216'),
('INNODB_TABLE_LOCKS', 'ON'),
('TABLE_LOCK_WAIT_TIMEOUT', '50'),
('INNODB_AUTOEXTEND_INCREMENT', '8'),
('KEY_CACHE_AGE_THRESHOLD', '300'),
('MYISAM_DATA_POINTER_SIZE', '6'),
('NET_RETRY_COUNT', '10'),
('INNODB_THREAD_SLEEP_DELAY', '10000'),
('NET_BUFFER_LENGTH', '8192'),
('SQL_AUTO_IS_NULL', 'ON'),
('OLD_PASSWORDS', 'OFF'),
('SLAVE_TRANSACTION_RETRIES', '10'),
('INIT_SLAVE', ''),
('LOG', 'OFF'),
('INNODB_CONCURRENCY_TICKETS', '500'),
('GENERAL_LOG', 'OFF'),
('TX_ISOLATION', 'REPEATABLE-READ'),
('TABLE_TYPE', 'MyISAM'),
('SLOW_QUERY_LOG', 'OFF'),
('QUERY_CACHE_MIN_RES_UNIT', '4096'),
('QUERY_PREALLOC_SIZE', '8192'),
('INNODB_STATS_ON_METADATA', 'ON'),
('FLUSH_TIME', '1800'),
('INNODB_ROLLBACK_ON_TIMEOUT', 'OFF'),
('OLD_ALTER_TABLE', 'OFF'),
('PROFILING_HISTORY_SIZE', '15'),
('MAX_TMP_TABLES', '32'),
('INNODB_ADDITIONAL_MEM_POOL_SIZE', '1048576'),
('MAX_BINLOG_CACHE_SIZE', '4294963200'),
('READ_RND_BUFFER_SIZE', '524288'),
('READ_BUFFER_SIZE', '262144'),
('SECURE_AUTH', 'OFF'),
('CHARACTER_SET_SERVER', 'latin1'),
('BIG_TABLES', 'OFF'),
('MYISAM_MAX_SORT_FILE_SIZE', '2146435072'),
('SQL_SELECT_LIMIT', '18446744073709551615'),
('NET_WRITE_TIMEOUT', '60'),
('DATE_FORMAT', '%Y-%m-%d'),
('SQL_MAX_JOIN_SIZE', '18446744073709551615'),
('READ_ONLY', 'OFF'),
('BULK_INSERT_BUFFER_SIZE', '8388608'),
('RAND_SEED1', ''),
('QUERY_CACHE_LIMIT', '1048576'),
('INNODB_DATA_FILE_PATH', 'ibdata1:10M:autoextend'),
('MULTI_RANGE_COUNT', '256'),
('PID_FILE', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\data\\ilclab-09.pid'),
('QUERY_CACHE_SIZE', '0'),
('PROFILING', 'OFF'),
('HAVE_INNODB', 'YES'),
('THREAD_STACK', '196608'),
('LC_TIME_NAMES', 'en_US'),
('KEY_CACHE_DIVISION_LIMIT', '100'),
('MYISAM_SORT_BUFFER_SIZE', '8388608'),
('GENERAL_LOG_FILE', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\data\\ilclab-09.log'),
('SSL_CERT', ''),
('HOSTNAME', 'ilclab-09'),
('MAX_USER_CONNECTIONS', '0'),
('AUTO_INCREMENT_INCREMENT', '1'),
('QUERY_ALLOC_BLOCK_SIZE', '8192'),
('TMPDIR', 'C:\\WINDOWS\\TEMP'),
('QUERY_CACHE_TYPE', 'ON'),
('EXPIRE_LOGS_DAYS', '0'),
('LARGE_PAGE_SIZE', '0'),
('HAVE_PARTITIONING', 'YES'),
('THREAD_HANDLING', 'one-thread-per-connection'),
('FOREIGN_KEY_CHECKS', 'ON'),
('MAX_WRITE_LOCK_COUNT', '4294967295'),
('RELAY_LOG_INFO_FILE', 'relay-log.info'),
('MYISAM_RECOVER_OPTIONS', 'OFF'),
('INNODB_AUTOINC_LOCK_MODE', '1'),
('MYISAM_STATS_METHOD', 'nulls_unequal'),
('INNODB_COMMIT_CONCURRENCY', '0'),
('SYSTEM_TIME_ZONE', 'China Standard Time'),
('INNODB_MIRRORED_LOG_GROUPS', '1'),
('CHARACTER_SET_SYSTEM', 'utf8'),
('UNIQUE_CHECKS', 'ON'),
('QUERY_CACHE_WLOCK_INVALIDATE', 'OFF'),
('VERSION', '5.1.36-community-log'),
('SSL_CIPHER', ''),
('INNODB_SUPPORT_XA', 'ON'),
('EVENT_SCHEDULER', 'OFF'),
('INNODB_SYNC_SPIN_LOOPS', '20'),
('TMP_TABLE_SIZE', '16777216'),
('COLLATION_CONNECTION', 'latin1_swedish_ci'),
('CHARACTER_SET_DATABASE', 'latin1'),
('HAVE_QUERY_CACHE', 'YES'),
('RPL_RECOVERY_RANK', '0'),
('INNODB_ADAPTIVE_HASH_INDEX', 'ON'),
('VERSION_COMPILE_MACHINE', 'ia32'),
('INIT_CONNECT', ''),
('TABLE_DEFINITION_CACHE', '256'),
('DIV_PRECISION_INCREMENT', '4'),
('SLOW_QUERY_LOG_FILE', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\data\\ilclab-09-slow.log'),
('DATADIR', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\data\\'),
('BASEDIR', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\'),
('INNODB_DATA_HOME_DIR', ''),
('NAMED_PIPE', 'OFF'),
('SHARED_MEMORY', 'OFF'),
('INNODB_FLUSH_METHOD', ''),
('SQL_SLAVE_SKIP_COUNTER', ''),
('ENGINE_CONDITION_PUSHDOWN', 'ON'),
('TIME_FORMAT', '%H:%i:%s'),
('LAST_INSERT_ID', '0'),
('INNODB_FORCE_RECOVERY', '0'),
('SQL_BIG_TABLES', 'OFF'),
('INNODB_LOG_FILES_IN_GROUP', '2'),
('LOG_ERROR', 'c:\\wamp\\logs\\mysql.log'),
('ERROR_COUNT', '0'),
('MAX_SP_RECURSION_DEPTH', '0'),
('HAVE_DYNAMIC_LOADING', 'YES'),
('SQL_BIG_SELECTS', 'ON'),
('SYNC_BINLOG', '0'),
('LOWER_CASE_FILE_SYSTEM', 'ON'),
('RELAY_LOG_SPACE_LIMIT', '0'),
('LARGE_FILES_SUPPORT', 'ON'),
('INNODB_OPEN_FILES', '300'),
('KEEP_FILES_ON_CREATE', 'OFF'),
('OLD', 'OFF'),
('CHARACTER_SET_FILESYSTEM', 'binary'),
('INNODB_MAX_DIRTY_PAGES_PCT', '90'),
('TABLE_OPEN_CACHE', '64'),
('SECURE_FILE_PRIV', ''),
('HAVE_COMMUNITY_FEATURES', 'YES'),
('KEY_BUFFER_SIZE', '16777216'),
('REPORT_PORT', '3306'),
('HAVE_NDBCLUSTER', 'NO'),
('SQL_BUFFER_RESULT', 'OFF'),
('SQL_LOG_BIN', 'ON'),
('KEY_CACHE_BLOCK_SIZE', '1024'),
('INNODB_LOG_GROUP_HOME_DIR', '.\\'),
('NEW', 'OFF'),
('INNODB_FAST_SHUTDOWN', '1'),
('HAVE_CSV', 'YES'),
('SSL_CA', ''),
('SQL_SAFE_UPDATES', 'OFF'),
('INNODB_THREAD_CONCURRENCY', '8'),
('PRELOAD_BUFFER_SIZE', '32768'),
('SLAVE_NET_TIMEOUT', '3600'),
('SLAVE_COMPRESSED_PROTOCOL', 'OFF'),
('INNODB_BUFFER_POOL_SIZE', '8388608'),
('HAVE_GEOMETRY', 'YES'),
('LOCAL_INFILE', 'ON'),
('SQL_MODE', ''),
('HAVE_RTREE_KEYS', 'YES'),
('RELAY_LOG', ''),
('BINLOG_FORMAT', 'MIXED'),
('PLUGIN_DIR', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\lib/plugin'),
('SHARED_MEMORY_BASE_NAME', 'MYSQL'),
('IGNORE_BUILTIN_INNODB', 'OFF'),
('SQL_WARNINGS', 'OFF'),
('NET_READ_TIMEOUT', '30'),
('SQL_LOG_OFF', 'OFF'),
('SYNC_FRM', 'ON'),
('TIMESTAMP', '1286887876'),
('RANGE_ALLOC_BLOCK_SIZE', '4096'),
('MAX_DELAYED_THREADS', '20'),
('WARNING_COUNT', '0'),
('DATETIME_FORMAT', '%Y-%m-%d %H:%i:%s'),
('MAX_ALLOWED_PACKET', '1048576'),
('INNODB_FLUSH_LOG_AT_TRX_COMMIT', '1'),
('SKIP_NETWORKING', 'OFF'),
('INNODB_FILE_IO_THREADS', '4'),
('INNODB_CHECKSUMS', 'ON'),
('LICENSE', 'GPL'),
('INNODB_LOCKS_UNSAFE_FOR_BINLOG', 'OFF'),
('HAVE_SSL', 'DISABLED'),
('INNODB_LOG_FILE_SIZE', '5242880'),
('PORT', '3306'),
('LOG_SLAVE_UPDATES', 'OFF'),
('MAX_JOIN_SIZE', '18446744073709551615'),
('SORT_BUFFER_SIZE', '524288'),
('LOG_BIN_TRUST_FUNCTION_CREATORS', 'OFF'),
('INNODB_FILE_PER_TABLE', 'OFF'),
('MAX_SORT_LENGTH', '1024'),
('CHARACTER_SET_CLIENT', 'latin1'),
('HAVE_OPENSSL', 'DISABLED'),
('SKIP_EXTERNAL_LOCKING', 'ON'),
('VERSION_COMMENT', 'MySQL Community Server (GPL)'),
('SLAVE_LOAD_TMPDIR', 'C:\\WINDOWS\\TEMP');

-- --------------------------------------------------------

--
-- Table structure for table `KEY_COLUMN_USAGE`
--

CREATE TEMPORARY TABLE `KEY_COLUMN_USAGE` (
  `CONSTRAINT_CATALOG` varchar(512) DEFAULT NULL,
  `CONSTRAINT_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `CONSTRAINT_NAME` varchar(64) NOT NULL DEFAULT '',
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `COLUMN_NAME` varchar(64) NOT NULL DEFAULT '',
  `ORDINAL_POSITION` bigint(10) NOT NULL DEFAULT '0',
  `POSITION_IN_UNIQUE_CONSTRAINT` bigint(10) DEFAULT NULL,
  `REFERENCED_TABLE_SCHEMA` varchar(64) DEFAULT NULL,
  `REFERENCED_TABLE_NAME` varchar(64) DEFAULT NULL,
  `REFERENCED_COLUMN_NAME` varchar(64) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `KEY_COLUMN_USAGE`
--

INSERT INTO `KEY_COLUMN_USAGE` (`CONSTRAINT_CATALOG`, `CONSTRAINT_SCHEMA`, `CONSTRAINT_NAME`, `TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `COLUMN_NAME`, `ORDINAL_POSITION`, `POSITION_IN_UNIQUE_CONSTRAINT`, `REFERENCED_TABLE_SCHEMA`, `REFERENCED_TABLE_NAME`, `REFERENCED_COLUMN_NAME`) VALUES
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'access_levels', 'access_level_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'accountability', 'accountability_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'accountability_type', 'accountability_type_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'adviser_history', 'student_number', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'adviser_history', 'employee_id', 2, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'adviser_history', 'semester', 3, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'adviser_history', 'academic_year', 4, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'assessment', 'student_number', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'assessment_table', 'look_up', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'building', 'building_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'clerk', 'employee_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'current_semester_id', 'current_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'degree_program', 'degree_program_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'degree_study_plan', 'study_plan_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'designation', 'designation_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'employee', 'employee_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'event', 'event_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'faculty', 'employee_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'grade', 'course_code', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'grade', 'section_label', 2, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'grade', 'student_number', 3, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'offered_subjects', 'course_code', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'payment', 'official_receipt_number', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'prerequisite', 'course_code', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'prerequisite', 'prereq_course_code', 2, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'room', 'room_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'scholars', 'scholarship_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'scholars', 'student_number', 2, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'scholarship', 'scholarship_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'section', 'course_code', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'section', 'section_label', 2, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'section_schedules', 'course_code', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'section_schedules', 'section_label', 2, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'section_schedules', 'day_of_the_week', 3, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'semester', 'semester_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'slb', 'slb_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'stfap', 'stfap_bracket_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'student', 'student_number', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'student_assessment', 'assessment_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'student_status', 'student_number', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'student_status', 'course_code', 2, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'student_status', 'section_label', 3, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'students_degree', 'student_number', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'students_degree', 'degree_program_id', 2, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'subject', 'course_code', 1, NULL, NULL, NULL, NULL),
(NULL, 'db_softeng2010', 'PRIMARY', NULL, 'db_softeng2010', 'unit', 'unit_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'columns_priv', 'Host', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'columns_priv', 'Db', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'columns_priv', 'User', 3, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'columns_priv', 'Table_name', 4, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'columns_priv', 'Column_name', 5, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'db', 'Host', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'db', 'Db', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'db', 'User', 3, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'event', 'db', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'event', 'name', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'func', 'name', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'help_category', 'help_category_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'name', NULL, 'mysql', 'help_category', 'name', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'help_keyword', 'help_keyword_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'name', NULL, 'mysql', 'help_keyword', 'name', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'help_relation', 'help_keyword_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'help_relation', 'help_topic_id', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'help_topic', 'help_topic_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'name', NULL, 'mysql', 'help_topic', 'name', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'host', 'Host', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'host', 'Db', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'ndb_binlog_index', 'epoch', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'plugin', 'name', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'proc', 'db', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'proc', 'name', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'proc', 'type', 3, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'procs_priv', 'Host', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'procs_priv', 'Db', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'procs_priv', 'User', 3, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'procs_priv', 'Routine_name', 4, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'procs_priv', 'Routine_type', 5, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'servers', 'Server_name', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'tables_priv', 'Host', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'tables_priv', 'Db', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'tables_priv', 'User', 3, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'tables_priv', 'Table_name', 4, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'time_zone', 'Time_zone_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'time_zone_leap_second', 'Transition_time', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'time_zone_name', 'Name', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'time_zone_transition', 'Time_zone_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'time_zone_transition', 'Transition_time', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'time_zone_transition_type', 'Time_zone_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'time_zone_transition_type', 'Transition_type_id', 2, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'user', 'Host', 1, NULL, NULL, NULL, NULL),
(NULL, 'mysql', 'PRIMARY', NULL, 'mysql', 'user', 'User', 2, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'access_levels', 'access_level_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'accountability', 'accountability_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'accountability_type', 'accountability_type_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'adviser_history', 'student_number', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'adviser_history', 'employee_id', 2, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'adviser_history', 'semester', 3, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'adviser_history', 'academic_year', 4, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'assessment', 'student_number', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'assessment_table', 'look_up', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'building', 'building_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'clerk', 'employee_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'current_semester_id', 'current_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'degree_program', 'degree_program_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'degree_study_plan', 'study_plan_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'designation', 'designation_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'employee', 'employee_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'event', 'event_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'faculty', 'employee_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'grade', 'course_code', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'grade', 'section_label', 2, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'grade', 'student_number', 3, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'offered_subjects', 'course_code', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'payment', 'official_receipt_number', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'prerequisite', 'course_code', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'prerequisite', 'prereq_cpurse_code', 2, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'room', 'room_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'scholars', 'scholarship_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'razel''s database', 'PRIMARY', NULL, 'razel''s database', 'scholars', 'student_number', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PARTITIONS`
--

CREATE TEMPORARY TABLE `PARTITIONS` (
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `PARTITION_NAME` varchar(64) DEFAULT NULL,
  `SUBPARTITION_NAME` varchar(64) DEFAULT NULL,
  `PARTITION_ORDINAL_POSITION` bigint(21) unsigned DEFAULT NULL,
  `SUBPARTITION_ORDINAL_POSITION` bigint(21) unsigned DEFAULT NULL,
  `PARTITION_METHOD` varchar(12) DEFAULT NULL,
  `SUBPARTITION_METHOD` varchar(12) DEFAULT NULL,
  `PARTITION_EXPRESSION` longtext,
  `SUBPARTITION_EXPRESSION` longtext,
  `PARTITION_DESCRIPTION` longtext,
  `TABLE_ROWS` bigint(21) unsigned NOT NULL DEFAULT '0',
  `AVG_ROW_LENGTH` bigint(21) unsigned NOT NULL DEFAULT '0',
  `DATA_LENGTH` bigint(21) unsigned NOT NULL DEFAULT '0',
  `MAX_DATA_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `INDEX_LENGTH` bigint(21) unsigned NOT NULL DEFAULT '0',
  `DATA_FREE` bigint(21) unsigned NOT NULL DEFAULT '0',
  `CREATE_TIME` datetime DEFAULT NULL,
  `UPDATE_TIME` datetime DEFAULT NULL,
  `CHECK_TIME` datetime DEFAULT NULL,
  `CHECKSUM` bigint(21) unsigned DEFAULT NULL,
  `PARTITION_COMMENT` varchar(80) NOT NULL DEFAULT '',
  `NODEGROUP` varchar(12) NOT NULL DEFAULT '',
  `TABLESPACE_NAME` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PARTITIONS`
--

INSERT INTO `PARTITIONS` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `PARTITION_NAME`, `SUBPARTITION_NAME`, `PARTITION_ORDINAL_POSITION`, `SUBPARTITION_ORDINAL_POSITION`, `PARTITION_METHOD`, `SUBPARTITION_METHOD`, `PARTITION_EXPRESSION`, `SUBPARTITION_EXPRESSION`, `PARTITION_DESCRIPTION`, `TABLE_ROWS`, `AVG_ROW_LENGTH`, `DATA_LENGTH`, `MAX_DATA_LENGTH`, `INDEX_LENGTH`, `DATA_FREE`, `CREATE_TIME`, `UPDATE_TIME`, `CHECK_TIME`, `CHECKSUM`, `PARTITION_COMMENT`, `NODEGROUP`, `TABLESPACE_NAME`) VALUES
(NULL, 'information_schema', 'CHARACTER_SETS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 384, 0, 16604160, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'COLLATIONS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 231, 0, 16704765, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'COLLATION_CHARACTER_SET_APPLICABILITY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 195, 0, 16691610, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'COLUMNS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 20:51:16', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2565, 0, 16757145, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'ENGINES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 490, 0, 16709000, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'EVENTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 20:51:16', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'FILES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2677, 0, 16758020, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'GLOBAL_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3268, 0, 16755036, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'GLOBAL_VARIABLES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3268, 0, 16755036, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4637, 0, 16762755, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'PARTITIONS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 20:51:16', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'PLUGINS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 20:51:16', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'PROCESSLIST', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 20:51:16', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'PROFILING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 308, 0, 16562084, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4814, 0, 16767162, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'ROUTINES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 20:51:16', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'SCHEMATA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3464, 0, 16755368, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2179, 0, 16767405, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'SESSION_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3268, 0, 16755036, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'SESSION_VARIABLES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3268, 0, 16755036, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'STATISTICS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2679, 0, 16770540, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'TABLES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3545, 0, 16760760, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2504, 0, 16749256, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2372, 0, 16748692, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'TRIGGERS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 20:51:16', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'USER_PRIVILEGES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1986, 0, 16759854, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'information_schema', 'VIEWS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 20:51:16', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'access_levels', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 35, 315, 9851624184872959, 2048, 0, '2010-09-30 18:42:34', '2010-09-30 18:42:38', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'accountability', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 74, 3908, 281474976710655, 2048, 2484, '2010-09-30 18:42:34', '2010-10-12 20:38:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'accountability_type', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 35, 245, 9851624184872959, 2048, 0, '2010-09-30 18:51:09', '2010-10-06 16:30:58', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'adviser_history', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 3940649673949183, 1024, 0, '2010-09-30 18:42:34', '2010-09-30 18:42:34', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'assessment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 42, 294, 11821949021847551, 2048, 0, '2010-10-10 18:17:01', '2010-10-12 20:38:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'assessment_table', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 70, 70, 19703248369745919, 2048, 0, '2010-10-07 18:21:45', '2010-10-07 18:21:53', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 15, 60, 4222124650659839, 2048, 0, '2010-09-30 18:42:34', '2010-10-11 14:51:53', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'clerk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, 9, 2533274790395903, 2048, 0, '2010-09-30 18:42:34', '2010-09-30 18:42:38', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'current_semester_id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 13, 26, 3659174697238527, 2048, 13, '2010-10-10 19:00:48', '2010-10-10 19:35:04', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'degree_program', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 118, 236, 281474976710655, 2048, 0, '2010-10-10 18:15:28', '2010-10-11 13:25:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'degree_study_plan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 5066549580791807, 1024, 0, '2010-09-30 18:42:34', '2010-09-30 18:42:34', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'designation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 22, 88, 281474976710655, 2048, 0, '2010-09-30 18:42:34', '2010-10-10 18:54:34', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'employee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 161, 4288, 281474976710655, 2048, 240, '2010-09-30 18:42:34', '2010-10-12 20:38:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'event', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-10 17:29:23', '2010-10-10 17:29:23', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'faculty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 27, 54, 7599824371187711, 2048, 0, '2010-09-30 18:42:35', '2010-10-06 16:48:09', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'grade', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 37, 112, 281474976710655, 4096, 0, '2010-09-30 19:09:01', '2010-10-12 20:08:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'offered_subjects', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 20, 140, 281474976710655, 4096, 0, '2010-10-02 16:22:25', '2010-10-11 16:10:01', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'payment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 26, 260, 7318349394477055, 2048, 0, '2010-10-02 16:21:18', '2010-10-12 20:11:32', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'prerequisite', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 20, 80, 281474976710655, 7168, 0, '2010-09-30 18:42:35', '2010-10-11 15:25:13', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'room', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 9, 81, 2533274790395903, 2048, 0, '2010-09-30 18:42:35', '2010-10-11 14:54:11', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'scholars', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 13, 39, 3659174697238527, 2048, 0, '2010-10-10 18:23:58', '2010-10-11 19:20:41', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'scholarship', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 22, 172, 281474976710655, 2048, 60, '2010-10-10 18:15:56', '2010-10-11 13:55:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'section', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 40, 740, 281474976710655, 4096, 20, '2010-10-02 16:34:28', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'section_schedules', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 24, 436, 281474976710655, 4096, 0, '2010-10-02 17:12:14', '2010-10-11 19:04:43', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'semester', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 25, 125, 7036874417766399, 2048, 0, '2010-09-30 18:42:35', '2010-09-30 18:42:38', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'slb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 26, 7318349394477055, 2048, 26, '2010-10-12 17:19:20', '2010-10-12 19:08:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'stfap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 16, 96, 4503599627370495, 2048, 0, '2010-09-30 18:42:36', '2010-09-30 20:55:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 209, 2928, 281474976710655, 2048, 0, '2010-10-11 12:18:33', '2010-10-12 20:38:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'student_assessment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 35, 176, 281474976710655, 2048, 0, '2010-09-30 18:42:36', '2010-10-12 20:38:14', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'student_status', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 37, 336, 281474976710655, 4096, 0, '2010-10-07 19:57:39', '2010-10-12 20:51:16', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'students_degree', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 22, 528, 6192449487634431, 2048, 0, '2010-09-30 18:42:36', '2010-10-12 20:21:39', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'subject', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 91, 1052, 281474976710655, 4096, 44, '2010-10-07 18:32:10', '2010-10-11 18:55:13', NULL, NULL, '', '', NULL),
(NULL, 'db_softeng2010', 'unit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 260, 1820, 73183493944770559, 2048, 0, '2010-09-30 18:42:36', '2010-10-10 19:15:24', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'columns_priv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 227994731135631359, 4096, 0, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'db', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 440, 880, 123848989752688639, 5120, 0, '2008-11-15 01:31:31', '2008-11-14 19:31:32', '2008-11-15 01:31:32', NULL, '', '', NULL),
(NULL, 'mysql', 'event', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 2048, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'func', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 162974011515469823, 1024, 0, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'general_log', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'help_category', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 38, 581, 22078, 163536961468891135, 3072, 0, '2008-11-15 01:31:31', '2008-11-14 19:31:34', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'help_keyword', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 450, 197, 88650, 55450570411999231, 16384, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:34', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'help_relation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 975, 9, 8775, 2533274790395903, 16384, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:34', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'help_topic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 497, 812, 403852, 281474976710655, 20480, 0, '2008-11-15 01:31:31', '2008-11-14 19:31:34', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'host', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 110056715893866495, 2048, 0, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'ndb_binlog_index', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'plugin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 162411061562048511, 1024, 0, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'proc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 2048, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'procs_priv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 239253730204057599, 4096, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'servers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 433752939111120895, 1024, 0, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'slow_log', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'tables_priv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 239535205180768255, 4096, 0, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'time_zone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1970324836974591, 1024, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'time_zone_leap_second', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 3659174697238527, 1024, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'time_zone_name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 55450570411999231, 1024, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'time_zone_transition', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 4785074604081151, 1024, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'time_zone_transition_type', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 10696049115004927, 1024, 0, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, NULL, '', '', NULL),
(NULL, 'mysql', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 52, 152, 281474976710655, 2048, 48, '2008-11-15 01:31:31', '2009-03-06 18:08:32', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'access_levels', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 35, 315, 9851624184872959, 2048, 0, '2010-10-12 17:04:01', '2010-10-12 17:07:09', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'accountability', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 17:10:48', '2010-10-12 17:10:48', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'accountability_type', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 35, 210, 9851624184872959, 2048, 0, '2010-10-12 17:29:20', '2010-10-12 17:29:20', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'adviser_history', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 3940649673949183, 1024, 0, '2010-10-12 20:03:41', '2010-10-12 20:03:41', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'assessment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 11821949021847551, 1024, 0, '2010-10-12 17:29:56', '2010-10-12 17:29:56', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'assessment_table', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 70, 70, 19703248369745919, 2048, 0, '2010-10-12 18:53:58', '2010-10-12 18:53:58', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 15, 60, 4222124650659839, 2048, 0, '2010-10-12 18:54:18', '2010-10-12 18:54:18', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'clerk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 2533274790395903, 1024, 0, '2010-10-12 18:55:38', '2010-10-12 18:55:38', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'current_semester_id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 13, 13, 3659174697238527, 2048, 0, '2010-10-12 18:56:46', '2010-10-12 18:58:18', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'degree_program', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 110, 220, 281474976710655, 2048, 0, '2010-10-12 19:19:54', '2010-10-12 19:19:54', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'degree_study_plan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 5066549580791807, 1024, 0, '2010-10-12 19:19:21', '2010-10-12 19:19:21', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'designation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 22, 88, 281474976710655, 2048, 0, '2010-10-12 19:39:16', '2010-10-12 19:39:52', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'employee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 19:51:49', '2010-10-12 19:51:49', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'event', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 1024, 0, '2010-10-12 19:52:03', '2010-10-12 19:52:03', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'faculty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 7599824371187711, 1024, 0, '2010-10-12 19:54:00', '2010-10-12 19:54:00', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'grade', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 2048, 0, '2010-10-12 19:58:32', '2010-10-12 19:58:32', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'offered_subjects', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 2048, 0, '2010-10-12 20:00:12', '2010-10-12 20:00:12', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'payment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 7318349394477055, 1024, 0, '2010-10-12 20:05:36', '2010-10-12 20:05:36', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'prerequisite', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 281474976710655, 4096, 0, '2010-10-12 20:02:50', '2010-10-12 20:02:50', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'room', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 9, 72, 2533274790395903, 2048, 0, '2010-10-12 20:08:22', '2010-10-12 20:09:37', NULL, NULL, '', '', NULL),
(NULL, 'razel''s database', 'scholars', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 3659174697238527, 1024, 0, '2010-10-12 20:11:06', '2010-10-12 20:11:06', NULL, NULL, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PLUGINS`
--

CREATE TEMPORARY TABLE `PLUGINS` (
  `PLUGIN_NAME` varchar(64) NOT NULL DEFAULT '',
  `PLUGIN_VERSION` varchar(20) NOT NULL DEFAULT '',
  `PLUGIN_STATUS` varchar(10) NOT NULL DEFAULT '',
  `PLUGIN_TYPE` varchar(80) NOT NULL DEFAULT '',
  `PLUGIN_TYPE_VERSION` varchar(20) NOT NULL DEFAULT '',
  `PLUGIN_LIBRARY` varchar(64) DEFAULT NULL,
  `PLUGIN_LIBRARY_VERSION` varchar(20) DEFAULT NULL,
  `PLUGIN_AUTHOR` varchar(64) DEFAULT NULL,
  `PLUGIN_DESCRIPTION` longtext,
  `PLUGIN_LICENSE` varchar(80) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PLUGINS`
--

INSERT INTO `PLUGINS` (`PLUGIN_NAME`, `PLUGIN_VERSION`, `PLUGIN_STATUS`, `PLUGIN_TYPE`, `PLUGIN_TYPE_VERSION`, `PLUGIN_LIBRARY`, `PLUGIN_LIBRARY_VERSION`, `PLUGIN_AUTHOR`, `PLUGIN_DESCRIPTION`, `PLUGIN_LICENSE`) VALUES
('binlog', '1.0', 'ACTIVE', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'MySQL AB', 'This is a pseudo storage engine to represent the binlog in a transaction', 'GPL'),
('MEMORY', '1.0', 'ACTIVE', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'MySQL AB', 'Hash based, stored in memory, useful for temporary tables', 'GPL'),
('MyISAM', '1.0', 'ACTIVE', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'MySQL AB', 'Default engine as of MySQL 3.23 with great performance', 'GPL'),
('MRG_MYISAM', '1.0', 'ACTIVE', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'MySQL AB', 'Collection of identical MyISAM tables', 'GPL'),
('ARCHIVE', '3.0', 'ACTIVE', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'Brian Aker, MySQL AB', 'Archive storage engine', 'GPL'),
('BLACKHOLE', '1.0', 'ACTIVE', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'MySQL AB', '/dev/null storage engine (anything you write to it disappears)', 'GPL'),
('CSV', '1.0', 'ACTIVE', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'Brian Aker, MySQL AB', 'CSV storage engine', 'GPL'),
('InnoDB', '1.0', 'ACTIVE', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'Innobase OY', 'Supports transactions, row-level locking, and foreign keys', 'GPL'),
('partition', '1.0', 'ACTIVE', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'Mikael Ronstrom, MySQL AB', 'Partition Storage Engine Helper', 'GPL'),
('FEDERATED', '1.0', 'DISABLED', 'STORAGE ENGINE', '50136.0', NULL, NULL, 'Patrick Galbraith and Brian Aker, MySQL AB', 'Federated MySQL storage engine', 'GPL');

-- --------------------------------------------------------

--
-- Table structure for table `PROCESSLIST`
--

CREATE TEMPORARY TABLE `PROCESSLIST` (
  `ID` bigint(4) NOT NULL DEFAULT '0',
  `USER` varchar(16) NOT NULL DEFAULT '',
  `HOST` varchar(64) NOT NULL DEFAULT '',
  `DB` varchar(64) DEFAULT NULL,
  `COMMAND` varchar(16) NOT NULL DEFAULT '',
  `TIME` int(7) NOT NULL DEFAULT '0',
  `STATE` varchar(64) DEFAULT NULL,
  `INFO` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PROCESSLIST`
--

INSERT INTO `PROCESSLIST` (`ID`, `USER`, `HOST`, `DB`, `COMMAND`, `TIME`, `STATE`, `INFO`) VALUES
(3956, 'root', 'localhost:3056', NULL, 'Query', 0, 'executing', 'SELECT * FROM `information_schema`.`PROCESSLIST`');

-- --------------------------------------------------------

--
-- Table structure for table `PROFILING`
--

CREATE TEMPORARY TABLE `PROFILING` (
  `QUERY_ID` int(20) NOT NULL DEFAULT '0',
  `SEQ` int(20) NOT NULL DEFAULT '0',
  `STATE` varchar(30) NOT NULL DEFAULT '',
  `DURATION` decimal(9,6) NOT NULL DEFAULT '0.000000',
  `CPU_USER` decimal(9,6) DEFAULT NULL,
  `CPU_SYSTEM` decimal(9,6) DEFAULT NULL,
  `CONTEXT_VOLUNTARY` int(20) DEFAULT NULL,
  `CONTEXT_INVOLUNTARY` int(20) DEFAULT NULL,
  `BLOCK_OPS_IN` int(20) DEFAULT NULL,
  `BLOCK_OPS_OUT` int(20) DEFAULT NULL,
  `MESSAGES_SENT` int(20) DEFAULT NULL,
  `MESSAGES_RECEIVED` int(20) DEFAULT NULL,
  `PAGE_FAULTS_MAJOR` int(20) DEFAULT NULL,
  `PAGE_FAULTS_MINOR` int(20) DEFAULT NULL,
  `SWAPS` int(20) DEFAULT NULL,
  `SOURCE_FUNCTION` varchar(30) DEFAULT NULL,
  `SOURCE_FILE` varchar(20) DEFAULT NULL,
  `SOURCE_LINE` int(20) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PROFILING`
--


-- --------------------------------------------------------

--
-- Table structure for table `REFERENTIAL_CONSTRAINTS`
--

CREATE TEMPORARY TABLE `REFERENTIAL_CONSTRAINTS` (
  `CONSTRAINT_CATALOG` varchar(512) DEFAULT NULL,
  `CONSTRAINT_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `CONSTRAINT_NAME` varchar(64) NOT NULL DEFAULT '',
  `UNIQUE_CONSTRAINT_CATALOG` varchar(512) DEFAULT NULL,
  `UNIQUE_CONSTRAINT_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `UNIQUE_CONSTRAINT_NAME` varchar(64) DEFAULT NULL,
  `MATCH_OPTION` varchar(64) NOT NULL DEFAULT '',
  `UPDATE_RULE` varchar(64) NOT NULL DEFAULT '',
  `DELETE_RULE` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `REFERENCED_TABLE_NAME` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `REFERENTIAL_CONSTRAINTS`
--


-- --------------------------------------------------------

--
-- Table structure for table `ROUTINES`
--

CREATE TEMPORARY TABLE `ROUTINES` (
  `SPECIFIC_NAME` varchar(64) NOT NULL DEFAULT '',
  `ROUTINE_CATALOG` varchar(512) DEFAULT NULL,
  `ROUTINE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `ROUTINE_NAME` varchar(64) NOT NULL DEFAULT '',
  `ROUTINE_TYPE` varchar(9) NOT NULL DEFAULT '',
  `DTD_IDENTIFIER` varchar(64) DEFAULT NULL,
  `ROUTINE_BODY` varchar(8) NOT NULL DEFAULT '',
  `ROUTINE_DEFINITION` longtext,
  `EXTERNAL_NAME` varchar(64) DEFAULT NULL,
  `EXTERNAL_LANGUAGE` varchar(64) DEFAULT NULL,
  `PARAMETER_STYLE` varchar(8) NOT NULL DEFAULT '',
  `IS_DETERMINISTIC` varchar(3) NOT NULL DEFAULT '',
  `SQL_DATA_ACCESS` varchar(64) NOT NULL DEFAULT '',
  `SQL_PATH` varchar(64) DEFAULT NULL,
  `SECURITY_TYPE` varchar(7) NOT NULL DEFAULT '',
  `CREATED` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LAST_ALTERED` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SQL_MODE` varchar(8192) NOT NULL DEFAULT '',
  `ROUTINE_COMMENT` varchar(64) NOT NULL DEFAULT '',
  `DEFINER` varchar(77) NOT NULL DEFAULT '',
  `CHARACTER_SET_CLIENT` varchar(32) NOT NULL DEFAULT '',
  `COLLATION_CONNECTION` varchar(32) NOT NULL DEFAULT '',
  `DATABASE_COLLATION` varchar(32) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ROUTINES`
--


-- --------------------------------------------------------

--
-- Table structure for table `SCHEMATA`
--

CREATE TEMPORARY TABLE `SCHEMATA` (
  `CATALOG_NAME` varchar(512) DEFAULT NULL,
  `SCHEMA_NAME` varchar(64) NOT NULL DEFAULT '',
  `DEFAULT_CHARACTER_SET_NAME` varchar(32) NOT NULL DEFAULT '',
  `DEFAULT_COLLATION_NAME` varchar(32) NOT NULL DEFAULT '',
  `SQL_PATH` varchar(512) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SCHEMATA`
--

INSERT INTO `SCHEMATA` (`CATALOG_NAME`, `SCHEMA_NAME`, `DEFAULT_CHARACTER_SET_NAME`, `DEFAULT_COLLATION_NAME`, `SQL_PATH`) VALUES
(NULL, 'information_schema', 'utf8', 'utf8_general_ci', NULL),
(NULL, 'db_softeng2010', 'latin1', 'latin1_swedish_ci', NULL),
(NULL, 'mysql', 'latin1', 'latin1_swedish_ci', NULL),
(NULL, 'razel''s database', 'latin1', 'latin1_swedish_ci', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SCHEMA_PRIVILEGES`
--

CREATE TEMPORARY TABLE `SCHEMA_PRIVILEGES` (
  `GRANTEE` varchar(81) NOT NULL DEFAULT '',
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `PRIVILEGE_TYPE` varchar(64) NOT NULL DEFAULT '',
  `IS_GRANTABLE` varchar(3) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SCHEMA_PRIVILEGES`
--

INSERT INTO `SCHEMA_PRIVILEGES` (`GRANTEE`, `TABLE_CATALOG`, `TABLE_SCHEMA`, `PRIVILEGE_TYPE`, `IS_GRANTABLE`) VALUES
('''''@''%''', NULL, 'test', 'SELECT', 'NO'),
('''''@''%''', NULL, 'test', 'INSERT', 'NO'),
('''''@''%''', NULL, 'test', 'UPDATE', 'NO'),
('''''@''%''', NULL, 'test', 'DELETE', 'NO'),
('''''@''%''', NULL, 'test', 'CREATE', 'NO'),
('''''@''%''', NULL, 'test', 'DROP', 'NO'),
('''''@''%''', NULL, 'test', 'REFERENCES', 'NO'),
('''''@''%''', NULL, 'test', 'INDEX', 'NO'),
('''''@''%''', NULL, 'test', 'ALTER', 'NO'),
('''''@''%''', NULL, 'test', 'CREATE TEMPORARY TABLES', 'NO'),
('''''@''%''', NULL, 'test', 'LOCK TABLES', 'NO'),
('''''@''%''', NULL, 'test', 'CREATE VIEW', 'NO'),
('''''@''%''', NULL, 'test', 'SHOW VIEW', 'NO'),
('''''@''%''', NULL, 'test', 'CREATE ROUTINE', 'NO'),
('''''@''%''', NULL, 'test', 'EVENT', 'NO'),
('''''@''%''', NULL, 'test', 'TRIGGER', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'SELECT', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'INSERT', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'UPDATE', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'DELETE', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'CREATE', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'DROP', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'REFERENCES', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'INDEX', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'ALTER', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'CREATE TEMPORARY TABLES', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'LOCK TABLES', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'CREATE VIEW', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'SHOW VIEW', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'CREATE ROUTINE', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'EVENT', 'NO'),
('''''@''%''', NULL, 'test\\_%', 'TRIGGER', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `SESSION_STATUS`
--

CREATE TEMPORARY TABLE `SESSION_STATUS` (
  `VARIABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `VARIABLE_VALUE` varchar(1024) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SESSION_STATUS`
--

INSERT INTO `SESSION_STATUS` (`VARIABLE_NAME`, `VARIABLE_VALUE`) VALUES
('ABORTED_CLIENTS', '0'),
('ABORTED_CONNECTS', '0'),
('BINLOG_CACHE_DISK_USE', '0'),
('BINLOG_CACHE_USE', '19'),
('BYTES_RECEIVED', '24455'),
('BYTES_SENT', '342817'),
('COM_ADMIN_COMMANDS', '0'),
('COM_ASSIGN_TO_KEYCACHE', '0'),
('COM_ALTER_DB', '0'),
('COM_ALTER_DB_UPGRADE', '0'),
('COM_ALTER_EVENT', '0'),
('COM_ALTER_FUNCTION', '0'),
('COM_ALTER_PROCEDURE', '0'),
('COM_ALTER_SERVER', '0'),
('COM_ALTER_TABLE', '0'),
('COM_ALTER_TABLESPACE', '0'),
('COM_ANALYZE', '0'),
('COM_BACKUP_TABLE', '0'),
('COM_BEGIN', '0'),
('COM_BINLOG', '0'),
('COM_CALL_PROCEDURE', '0'),
('COM_CHANGE_DB', '0'),
('COM_CHANGE_MASTER', '0'),
('COM_CHECK', '0'),
('COM_CHECKSUM', '0'),
('COM_COMMIT', '0'),
('COM_CREATE_DB', '0'),
('COM_CREATE_EVENT', '0'),
('COM_CREATE_FUNCTION', '0'),
('COM_CREATE_INDEX', '0'),
('COM_CREATE_PROCEDURE', '0'),
('COM_CREATE_SERVER', '0'),
('COM_CREATE_TABLE', '0'),
('COM_CREATE_TRIGGER', '0'),
('COM_CREATE_UDF', '0'),
('COM_CREATE_USER', '0'),
('COM_CREATE_VIEW', '0'),
('COM_DEALLOC_SQL', '0'),
('COM_DELETE', '0'),
('COM_DELETE_MULTI', '0'),
('COM_DO', '0'),
('COM_DROP_DB', '0'),
('COM_DROP_EVENT', '0'),
('COM_DROP_FUNCTION', '0'),
('COM_DROP_INDEX', '0'),
('COM_DROP_PROCEDURE', '0'),
('COM_DROP_SERVER', '0'),
('COM_DROP_TABLE', '0'),
('COM_DROP_TRIGGER', '0'),
('COM_DROP_USER', '0'),
('COM_DROP_VIEW', '0'),
('COM_EMPTY_QUERY', '0'),
('COM_EXECUTE_SQL', '0'),
('COM_FLUSH', '0'),
('COM_GRANT', '0'),
('COM_HA_CLOSE', '0'),
('COM_HA_OPEN', '0'),
('COM_HA_READ', '0'),
('COM_HELP', '0'),
('COM_INSERT', '0'),
('COM_INSERT_SELECT', '0'),
('COM_INSTALL_PLUGIN', '0'),
('COM_KILL', '0'),
('COM_LOAD', '0'),
('COM_LOAD_MASTER_DATA', '0'),
('COM_LOAD_MASTER_TABLE', '0'),
('COM_LOCK_TABLES', '0'),
('COM_OPTIMIZE', '0'),
('COM_PRELOAD_KEYS', '0'),
('COM_PREPARE_SQL', '0'),
('COM_PURGE', '0'),
('COM_PURGE_BEFORE_DATE', '0'),
('COM_RELEASE_SAVEPOINT', '0'),
('COM_RENAME_TABLE', '0'),
('COM_RENAME_USER', '0'),
('COM_REPAIR', '0'),
('COM_REPLACE', '0'),
('COM_REPLACE_SELECT', '0'),
('COM_RESET', '0'),
('COM_RESTORE_TABLE', '0'),
('COM_REVOKE', '0'),
('COM_REVOKE_ALL', '0'),
('COM_ROLLBACK', '0'),
('COM_ROLLBACK_TO_SAVEPOINT', '0'),
('COM_SAVEPOINT', '0'),
('COM_SELECT', '107'),
('COM_SET_OPTION', '56'),
('COM_SHOW_AUTHORS', '0'),
('COM_SHOW_BINLOG_EVENTS', '0'),
('COM_SHOW_BINLOGS', '0'),
('COM_SHOW_CHARSETS', '0'),
('COM_SHOW_COLLATIONS', '0'),
('COM_SHOW_COLUMN_TYPES', '0'),
('COM_SHOW_CONTRIBUTORS', '0'),
('COM_SHOW_CREATE_DB', '0'),
('COM_SHOW_CREATE_EVENT', '0'),
('COM_SHOW_CREATE_FUNC', '0'),
('COM_SHOW_CREATE_PROC', '0'),
('COM_SHOW_CREATE_TABLE', '53'),
('COM_SHOW_CREATE_TRIGGER', '0'),
('COM_SHOW_DATABASES', '1'),
('COM_SHOW_ENGINE_LOGS', '0'),
('COM_SHOW_ENGINE_MUTEX', '0'),
('COM_SHOW_ENGINE_STATUS', '0'),
('COM_SHOW_EVENTS', '0'),
('COM_SHOW_ERRORS', '0'),
('COM_SHOW_FIELDS', '0'),
('COM_SHOW_FUNCTION_STATUS', '0'),
('COM_SHOW_GRANTS', '0'),
('COM_SHOW_KEYS', '0'),
('COM_SHOW_MASTER_STATUS', '0'),
('COM_SHOW_NEW_MASTER', '0'),
('COM_SHOW_OPEN_TABLES', '0'),
('COM_SHOW_PLUGINS', '1'),
('COM_SHOW_PRIVILEGES', '0'),
('COM_SHOW_PROCEDURE_STATUS', '0'),
('COM_SHOW_PROCESSLIST', '0'),
('COM_SHOW_PROFILE', '0'),
('COM_SHOW_PROFILES', '0'),
('COM_SHOW_SLAVE_HOSTS', '0'),
('COM_SHOW_SLAVE_STATUS', '0'),
('COM_SHOW_STATUS', '0'),
('COM_SHOW_STORAGE_ENGINES', '0'),
('COM_SHOW_TABLE_STATUS', '55'),
('COM_SHOW_TABLES', '2'),
('COM_SHOW_TRIGGERS', '0'),
('COM_SHOW_VARIABLES', '0'),
('COM_SHOW_WARNINGS', '0'),
('COM_SLAVE_START', '0'),
('COM_SLAVE_STOP', '0'),
('COM_STMT_CLOSE', '0'),
('COM_STMT_EXECUTE', '0'),
('COM_STMT_FETCH', '0'),
('COM_STMT_PREPARE', '0'),
('COM_STMT_REPREPARE', '0'),
('COM_STMT_RESET', '0'),
('COM_STMT_SEND_LONG_DATA', '0'),
('COM_TRUNCATE', '0'),
('COM_UNINSTALL_PLUGIN', '0'),
('COM_UNLOCK_TABLES', '0'),
('COM_UPDATE', '0'),
('COM_UPDATE_MULTI', '0'),
('COM_XA_COMMIT', '0'),
('COM_XA_END', '0'),
('COM_XA_PREPARE', '0'),
('COM_XA_RECOVER', '0'),
('COM_XA_ROLLBACK', '0'),
('COM_XA_START', '0'),
('COMPRESSION', 'OFF'),
('CONNECTIONS', '3957'),
('CREATED_TMP_DISK_TABLES', '118'),
('CREATED_TMP_FILES', '5'),
('CREATED_TMP_TABLES', '333'),
('DELAYED_ERRORS', '0'),
('DELAYED_INSERT_THREADS', '0'),
('DELAYED_WRITES', '0'),
('FLUSH_COMMANDS', '1'),
('HANDLER_COMMIT', '0'),
('HANDLER_DELETE', '0'),
('HANDLER_DISCOVER', '0'),
('HANDLER_PREPARE', '0'),
('HANDLER_READ_FIRST', '9'),
('HANDLER_READ_KEY', '0'),
('HANDLER_READ_NEXT', '4'),
('HANDLER_READ_PREV', '0'),
('HANDLER_READ_RND', '0'),
('HANDLER_READ_RND_NEXT', '2684'),
('HANDLER_ROLLBACK', '0'),
('HANDLER_SAVEPOINT', '0'),
('HANDLER_SAVEPOINT_ROLLBACK', '0'),
('HANDLER_UPDATE', '0'),
('HANDLER_WRITE', '2457'),
('INNODB_BUFFER_POOL_PAGES_DATA', '19'),
('INNODB_BUFFER_POOL_PAGES_DIRTY', '0'),
('INNODB_BUFFER_POOL_PAGES_FLUSHED', '0'),
('INNODB_BUFFER_POOL_PAGES_FREE', '493'),
('INNODB_BUFFER_POOL_PAGES_MISC', '0'),
('INNODB_BUFFER_POOL_PAGES_TOTAL', '512'),
('INNODB_BUFFER_POOL_READ_AHEAD_RND', '1'),
('INNODB_BUFFER_POOL_READ_AHEAD_SEQ', '0'),
('INNODB_BUFFER_POOL_READ_REQUESTS', '77'),
('INNODB_BUFFER_POOL_READS', '12'),
('INNODB_BUFFER_POOL_WAIT_FREE', '0'),
('INNODB_BUFFER_POOL_WRITE_REQUESTS', '0'),
('INNODB_DATA_FSYNCS', '3'),
('INNODB_DATA_PENDING_FSYNCS', '0'),
('INNODB_DATA_PENDING_READS', '0'),
('INNODB_DATA_PENDING_WRITES', '0'),
('INNODB_DATA_READ', '2494464'),
('INNODB_DATA_READS', '29'),
('INNODB_DATA_WRITES', '3'),
('INNODB_DATA_WRITTEN', '1536'),
('INNODB_DBLWR_PAGES_WRITTEN', '0'),
('INNODB_DBLWR_WRITES', '0'),
('INNODB_LOG_WAITS', '0'),
('INNODB_LOG_WRITE_REQUESTS', '0'),
('INNODB_LOG_WRITES', '1'),
('INNODB_OS_LOG_FSYNCS', '3'),
('INNODB_OS_LOG_PENDING_FSYNCS', '0'),
('INNODB_OS_LOG_PENDING_WRITES', '0'),
('INNODB_OS_LOG_WRITTEN', '512'),
('INNODB_PAGE_SIZE', '16384'),
('INNODB_PAGES_CREATED', '0'),
('INNODB_PAGES_READ', '19'),
('INNODB_PAGES_WRITTEN', '0'),
('INNODB_ROW_LOCK_CURRENT_WAITS', '0'),
('INNODB_ROW_LOCK_TIME', '0'),
('INNODB_ROW_LOCK_TIME_AVG', '0'),
('INNODB_ROW_LOCK_TIME_MAX', '0'),
('INNODB_ROW_LOCK_WAITS', '0'),
('INNODB_ROWS_DELETED', '0'),
('INNODB_ROWS_INSERTED', '0'),
('INNODB_ROWS_READ', '0'),
('INNODB_ROWS_UPDATED', '0'),
('KEY_BLOCKS_NOT_FLUSHED', '0'),
('KEY_BLOCKS_UNUSED', '14347'),
('KEY_BLOCKS_USED', '32'),
('KEY_READ_REQUESTS', '72473'),
('KEY_READS', '287'),
('KEY_WRITE_REQUESTS', '212'),
('KEY_WRITES', '145'),
('LAST_QUERY_COST', '10.499000'),
('MAX_USED_CONNECTIONS', '3'),
('NOT_FLUSHED_DELAYED_ROWS', '0'),
('OPEN_FILES', '130'),
('OPEN_STREAMS', '0'),
('OPEN_TABLE_DEFINITIONS', '77'),
('OPEN_TABLES', '64'),
('OPENED_FILES', '19187'),
('OPENED_TABLE_DEFINITIONS', '7'),
('OPENED_TABLES', '274'),
('PREPARED_STMT_COUNT', '0'),
('QCACHE_FREE_BLOCKS', '0'),
('QCACHE_FREE_MEMORY', '0'),
('QCACHE_HITS', '0'),
('QCACHE_INSERTS', '0'),
('QCACHE_LOWMEM_PRUNES', '0'),
('QCACHE_NOT_CACHED', '0'),
('QCACHE_QUERIES_IN_CACHE', '0'),
('QCACHE_TOTAL_BLOCKS', '0'),
('QUERIES', '385532'),
('QUESTIONS', '275'),
('RPL_STATUS', 'NULL'),
('SELECT_FULL_JOIN', '0'),
('SELECT_FULL_RANGE_JOIN', '0'),
('SELECT_RANGE', '0'),
('SELECT_RANGE_CHECK', '0'),
('SELECT_SCAN', '159'),
('SLAVE_OPEN_TEMP_TABLES', '0'),
('SLAVE_RETRIED_TRANSACTIONS', '0'),
('SLAVE_RUNNING', 'OFF'),
('SLOW_LAUNCH_THREADS', '0'),
('SLOW_QUERIES', '0'),
('SORT_MERGE_PASSES', '0'),
('SORT_RANGE', '0'),
('SORT_ROWS', '0'),
('SORT_SCAN', '0'),
('SSL_ACCEPT_RENEGOTIATES', '0'),
('SSL_ACCEPTS', '0'),
('SSL_CALLBACK_CACHE_HITS', '0'),
('SSL_CIPHER', ''),
('SSL_CIPHER_LIST', ''),
('SSL_CLIENT_CONNECTS', '0'),
('SSL_CONNECT_RENEGOTIATES', '0'),
('SSL_CTX_VERIFY_DEPTH', '0'),
('SSL_CTX_VERIFY_MODE', '0'),
('SSL_DEFAULT_TIMEOUT', '0'),
('SSL_FINISHED_ACCEPTS', '0'),
('SSL_FINISHED_CONNECTS', '0'),
('SSL_SESSION_CACHE_HITS', '0'),
('SSL_SESSION_CACHE_MISSES', '0'),
('SSL_SESSION_CACHE_MODE', 'NONE'),
('SSL_SESSION_CACHE_OVERFLOWS', '0'),
('SSL_SESSION_CACHE_SIZE', '0'),
('SSL_SESSION_CACHE_TIMEOUTS', '0'),
('SSL_SESSIONS_REUSED', '0'),
('SSL_USED_SESSION_CACHE_ENTRIES', '0'),
('SSL_VERIFY_DEPTH', '0'),
('SSL_VERIFY_MODE', '0'),
('SSL_VERSION', ''),
('TABLE_LOCKS_IMMEDIATE', '367699'),
('TABLE_LOCKS_WAITED', '0'),
('TC_LOG_MAX_PAGES_USED', '0'),
('TC_LOG_PAGE_SIZE', '0'),
('TC_LOG_PAGE_WAITS', '0'),
('THREADS_CACHED', '0'),
('THREADS_CONNECTED', '1'),
('THREADS_CREATED', '3956'),
('THREADS_RUNNING', '1'),
('UPTIME', '29550'),
('UPTIME_SINCE_FLUSH_STATUS', '29550');

-- --------------------------------------------------------

--
-- Table structure for table `SESSION_VARIABLES`
--

CREATE TEMPORARY TABLE `SESSION_VARIABLES` (
  `VARIABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `VARIABLE_VALUE` varchar(1024) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SESSION_VARIABLES`
--

INSERT INTO `SESSION_VARIABLES` (`VARIABLE_NAME`, `VARIABLE_VALUE`) VALUES
('MAX_PREPARED_STMT_COUNT', '16382'),
('CHARACTER_SET_CONNECTION', 'utf8'),
('HAVE_CRYPT', 'NO'),
('INIT_FILE', ''),
('MYISAM_REPAIR_THREADS', '1'),
('AUTOMATIC_SP_PRIVILEGES', 'ON'),
('MAX_ERROR_COUNT', '64'),
('BACK_LOG', '50'),
('WAIT_TIMEOUT', '28800'),
('LOG_QUERIES_NOT_USING_INDEXES', 'OFF'),
('LOG_WARNINGS', '1'),
('MYISAM_USE_MMAP', 'OFF'),
('DELAYED_INSERT_TIMEOUT', '300'),
('FLUSH', 'OFF'),
('LOG_BIN_TRUST_ROUTINE_CREATORS', 'OFF'),
('REPORT_USER', ''),
('OPEN_FILES_LIMIT', '755'),
('CHARACTER_SETS_DIR', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\share\\charsets\\'),
('IDENTITY', '0'),
('BINLOG_CACHE_SIZE', '32768'),
('UPDATABLE_VIEWS_WITH_LIMIT', 'YES'),
('MAX_RELAY_LOG_SIZE', '0'),
('SLOW_LAUNCH_TIME', '2'),
('COMPLETION_TYPE', '0'),
('INNODB_LOCK_WAIT_TIMEOUT', '50'),
('FT_QUERY_EXPANSION_LIMIT', '20'),
('RELAY_LOG_INDEX', ''),
('AUTOCOMMIT', 'ON'),
('SQL_QUOTE_SHOW_CREATE', 'ON'),
('MAX_LENGTH_FOR_SORT_DATA', '1024'),
('SQL_LOG_UPDATE', 'ON'),
('DELAYED_QUEUE_SIZE', '1000'),
('INNODB_USE_LEGACY_CARDINALITY_ALGORITHM', 'ON'),
('FT_MAX_WORD_LEN', '84'),
('OPTIMIZER_SWITCH', 'index_merge=on,index_merge_union=on,index_merge_sort_union=on,index_merge_intersection=on'),
('MAX_SEEKS_FOR_KEY', '4294967295'),
('OPTIMIZER_PRUNE_LEVEL', '1'),
('RAND_SEED2', ''),
('REPORT_HOST', ''),
('MIN_EXAMINED_ROW_LIMIT', '0'),
('SSL_KEY', ''),
('DELAYED_INSERT_LIMIT', '100'),
('TIMED_MUTEXES', 'OFF'),
('INTERACTIVE_TIMEOUT', '28800'),
('SLAVE_SKIP_ERRORS', 'OFF'),
('SQL_LOW_PRIORITY_UPDATES', 'OFF'),
('INSERT_ID', '0'),
('CONCURRENT_INSERT', '1'),
('RELAY_LOG_PURGE', 'ON'),
('DELAY_KEY_WRITE', 'ON'),
('SKIP_SHOW_DATABASE', 'OFF'),
('CONNECT_TIMEOUT', '10'),
('GROUP_CONCAT_MAX_LEN', '1024'),
('AUTO_INCREMENT_OFFSET', '1'),
('INNODB_LOG_BUFFER_SIZE', '1048576'),
('FT_STOPWORD_FILE', '(built-in)'),
('OPTIMIZER_SEARCH_DEPTH', '62'),
('JOIN_BUFFER_SIZE', '131072'),
('INNODB_MAX_PURGE_LAG', '0'),
('COLLATION_DATABASE', 'latin1_swedish_ci'),
('TRANSACTION_PREALLOC_SIZE', '4096'),
('MAX_BINLOG_SIZE', '1073741824'),
('VERSION_COMPILE_OS', 'Win32'),
('LARGE_PAGES', 'OFF'),
('SQL_NOTES', 'ON'),
('CHARACTER_SET_RESULTS', 'utf8'),
('LOW_PRIORITY_UPDATES', 'OFF'),
('MAX_CONNECT_ERRORS', '10'),
('REPORT_PASSWORD', ''),
('SERVER_ID', '1'),
('MAX_INSERT_DELAYED_THREADS', '20'),
('MAX_CONNECTIONS', '151'),
('HAVE_COMPRESS', 'YES'),
('SSL_CAPATH', ''),
('TRANSACTION_ALLOC_BLOCK_SIZE', '8192'),
('LOG_SLOW_QUERIES', 'OFF'),
('THREAD_CACHE_SIZE', '0'),
('LANGUAGE', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\share\\english\\'),
('INNODB_DOUBLEWRITE', 'ON'),
('STORAGE_ENGINE', 'MyISAM'),
('SLAVE_EXEC_MODE', 'STRICT'),
('LOWER_CASE_TABLE_NAMES', '1'),
('DEFAULT_WEEK_FORMAT', '0'),
('PSEUDO_THREAD_ID', '3956'),
('LOG_OUTPUT', 'FILE'),
('FT_MIN_WORD_LEN', '4'),
('COLLATION_SERVER', 'latin1_swedish_ci'),
('LOG_BIN', 'ON'),
('PROTOCOL_VERSION', '10'),
('LONG_QUERY_TIME', '10.000000'),
('HAVE_SYMLINK', 'YES'),
('FT_BOOLEAN_SYNTAX', '+ -><()~*:""&|'),
('TIME_ZONE', 'SYSTEM'),
('MAX_HEAP_TABLE_SIZE', '16777216'),
('INNODB_TABLE_LOCKS', 'ON'),
('TABLE_LOCK_WAIT_TIMEOUT', '50'),
('INNODB_AUTOEXTEND_INCREMENT', '8'),
('KEY_CACHE_AGE_THRESHOLD', '300'),
('MYISAM_DATA_POINTER_SIZE', '6'),
('NET_RETRY_COUNT', '10'),
('INNODB_THREAD_SLEEP_DELAY', '10000'),
('NET_BUFFER_LENGTH', '8192'),
('SQL_AUTO_IS_NULL', 'ON'),
('OLD_PASSWORDS', 'OFF'),
('SLAVE_TRANSACTION_RETRIES', '10'),
('INIT_SLAVE', ''),
('LOG', 'OFF'),
('INNODB_CONCURRENCY_TICKETS', '500'),
('GENERAL_LOG', 'OFF'),
('TX_ISOLATION', 'REPEATABLE-READ'),
('TABLE_TYPE', 'MyISAM'),
('SLOW_QUERY_LOG', 'OFF'),
('QUERY_CACHE_MIN_RES_UNIT', '4096'),
('QUERY_PREALLOC_SIZE', '8192'),
('INNODB_STATS_ON_METADATA', 'ON'),
('FLUSH_TIME', '1800'),
('INNODB_ROLLBACK_ON_TIMEOUT', 'OFF'),
('OLD_ALTER_TABLE', 'OFF'),
('PROFILING_HISTORY_SIZE', '15'),
('MAX_TMP_TABLES', '32'),
('INNODB_ADDITIONAL_MEM_POOL_SIZE', '1048576'),
('MAX_BINLOG_CACHE_SIZE', '4294963200'),
('READ_RND_BUFFER_SIZE', '524288'),
('READ_BUFFER_SIZE', '262144'),
('SECURE_AUTH', 'OFF'),
('CHARACTER_SET_SERVER', 'latin1'),
('BIG_TABLES', 'OFF'),
('MYISAM_MAX_SORT_FILE_SIZE', '2146435072'),
('SQL_SELECT_LIMIT', '18446744073709551615'),
('NET_WRITE_TIMEOUT', '60'),
('DATE_FORMAT', '%Y-%m-%d'),
('SQL_MAX_JOIN_SIZE', '18446744073709551615'),
('READ_ONLY', 'OFF'),
('BULK_INSERT_BUFFER_SIZE', '8388608'),
('RAND_SEED1', ''),
('QUERY_CACHE_LIMIT', '1048576'),
('INNODB_DATA_FILE_PATH', 'ibdata1:10M:autoextend'),
('MULTI_RANGE_COUNT', '256'),
('PID_FILE', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\data\\ilclab-09.pid'),
('QUERY_CACHE_SIZE', '0'),
('PROFILING', 'OFF'),
('HAVE_INNODB', 'YES'),
('THREAD_STACK', '196608'),
('LC_TIME_NAMES', 'en_US'),
('KEY_CACHE_DIVISION_LIMIT', '100'),
('MYISAM_SORT_BUFFER_SIZE', '8388608'),
('GENERAL_LOG_FILE', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\data\\ilclab-09.log'),
('SSL_CERT', ''),
('HOSTNAME', 'ilclab-09'),
('MAX_USER_CONNECTIONS', '0'),
('AUTO_INCREMENT_INCREMENT', '1'),
('QUERY_ALLOC_BLOCK_SIZE', '8192'),
('TMPDIR', 'C:\\WINDOWS\\TEMP'),
('QUERY_CACHE_TYPE', 'ON'),
('EXPIRE_LOGS_DAYS', '0'),
('LARGE_PAGE_SIZE', '0'),
('HAVE_PARTITIONING', 'YES'),
('THREAD_HANDLING', 'one-thread-per-connection'),
('FOREIGN_KEY_CHECKS', 'ON'),
('MAX_WRITE_LOCK_COUNT', '4294967295'),
('RELAY_LOG_INFO_FILE', 'relay-log.info'),
('MYISAM_RECOVER_OPTIONS', 'OFF'),
('INNODB_AUTOINC_LOCK_MODE', '1'),
('MYISAM_STATS_METHOD', 'nulls_unequal'),
('INNODB_COMMIT_CONCURRENCY', '0'),
('SYSTEM_TIME_ZONE', 'China Standard Time'),
('INNODB_MIRRORED_LOG_GROUPS', '1'),
('CHARACTER_SET_SYSTEM', 'utf8'),
('UNIQUE_CHECKS', 'ON'),
('QUERY_CACHE_WLOCK_INVALIDATE', 'OFF'),
('VERSION', '5.1.36-community-log'),
('SSL_CIPHER', ''),
('INNODB_SUPPORT_XA', 'ON'),
('EVENT_SCHEDULER', 'OFF'),
('INNODB_SYNC_SPIN_LOOPS', '20'),
('TMP_TABLE_SIZE', '16777216'),
('COLLATION_CONNECTION', 'utf8_general_ci'),
('CHARACTER_SET_DATABASE', 'latin1'),
('HAVE_QUERY_CACHE', 'YES'),
('RPL_RECOVERY_RANK', '0'),
('INNODB_ADAPTIVE_HASH_INDEX', 'ON'),
('VERSION_COMPILE_MACHINE', 'ia32'),
('INIT_CONNECT', ''),
('TABLE_DEFINITION_CACHE', '256'),
('DIV_PRECISION_INCREMENT', '4'),
('SLOW_QUERY_LOG_FILE', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\data\\ilclab-09-slow.log'),
('DATADIR', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\data\\'),
('BASEDIR', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\'),
('INNODB_DATA_HOME_DIR', ''),
('NAMED_PIPE', 'OFF'),
('SHARED_MEMORY', 'OFF'),
('INNODB_FLUSH_METHOD', ''),
('SQL_SLAVE_SKIP_COUNTER', ''),
('ENGINE_CONDITION_PUSHDOWN', 'ON'),
('TIME_FORMAT', '%H:%i:%s'),
('LAST_INSERT_ID', '0'),
('INNODB_FORCE_RECOVERY', '0'),
('SQL_BIG_TABLES', 'OFF'),
('INNODB_LOG_FILES_IN_GROUP', '2'),
('LOG_ERROR', 'c:\\wamp\\logs\\mysql.log'),
('ERROR_COUNT', '0'),
('MAX_SP_RECURSION_DEPTH', '0'),
('HAVE_DYNAMIC_LOADING', 'YES'),
('SQL_BIG_SELECTS', 'ON'),
('SYNC_BINLOG', '0'),
('LOWER_CASE_FILE_SYSTEM', 'ON'),
('RELAY_LOG_SPACE_LIMIT', '0'),
('LARGE_FILES_SUPPORT', 'ON'),
('INNODB_OPEN_FILES', '300'),
('KEEP_FILES_ON_CREATE', 'OFF'),
('OLD', 'OFF'),
('CHARACTER_SET_FILESYSTEM', 'binary'),
('INNODB_MAX_DIRTY_PAGES_PCT', '90'),
('TABLE_OPEN_CACHE', '64'),
('SECURE_FILE_PRIV', ''),
('HAVE_COMMUNITY_FEATURES', 'YES'),
('KEY_BUFFER_SIZE', '16777216'),
('REPORT_PORT', '3306'),
('HAVE_NDBCLUSTER', 'NO'),
('SQL_BUFFER_RESULT', 'OFF'),
('SQL_LOG_BIN', 'ON'),
('KEY_CACHE_BLOCK_SIZE', '1024'),
('INNODB_LOG_GROUP_HOME_DIR', '.\\'),
('NEW', 'OFF'),
('INNODB_FAST_SHUTDOWN', '1'),
('HAVE_CSV', 'YES'),
('SSL_CA', ''),
('SQL_SAFE_UPDATES', 'OFF'),
('INNODB_THREAD_CONCURRENCY', '8'),
('PRELOAD_BUFFER_SIZE', '32768'),
('SLAVE_NET_TIMEOUT', '3600'),
('SLAVE_COMPRESSED_PROTOCOL', 'OFF'),
('INNODB_BUFFER_POOL_SIZE', '8388608'),
('HAVE_GEOMETRY', 'YES'),
('LOCAL_INFILE', 'ON'),
('SQL_MODE', ''),
('HAVE_RTREE_KEYS', 'YES'),
('RELAY_LOG', ''),
('BINLOG_FORMAT', 'MIXED'),
('PLUGIN_DIR', 'c:\\wamp\\bin\\mysql\\mysql5.1.36\\lib/plugin'),
('SHARED_MEMORY_BASE_NAME', 'MYSQL'),
('IGNORE_BUILTIN_INNODB', 'OFF'),
('SQL_WARNINGS', 'OFF'),
('NET_READ_TIMEOUT', '30'),
('SQL_LOG_OFF', 'OFF'),
('SYNC_FRM', 'ON'),
('TIMESTAMP', '1286887877'),
('RANGE_ALLOC_BLOCK_SIZE', '4096'),
('MAX_DELAYED_THREADS', '20'),
('WARNING_COUNT', '0'),
('DATETIME_FORMAT', '%Y-%m-%d %H:%i:%s'),
('MAX_ALLOWED_PACKET', '1048576'),
('INNODB_FLUSH_LOG_AT_TRX_COMMIT', '1'),
('SKIP_NETWORKING', 'OFF'),
('INNODB_FILE_IO_THREADS', '4'),
('INNODB_CHECKSUMS', 'ON'),
('LICENSE', 'GPL'),
('INNODB_LOCKS_UNSAFE_FOR_BINLOG', 'OFF'),
('HAVE_SSL', 'DISABLED'),
('INNODB_LOG_FILE_SIZE', '5242880'),
('PORT', '3306'),
('LOG_SLAVE_UPDATES', 'OFF'),
('MAX_JOIN_SIZE', '18446744073709551615'),
('SORT_BUFFER_SIZE', '524288'),
('LOG_BIN_TRUST_FUNCTION_CREATORS', 'OFF'),
('INNODB_FILE_PER_TABLE', 'OFF'),
('MAX_SORT_LENGTH', '1024'),
('CHARACTER_SET_CLIENT', 'utf8'),
('HAVE_OPENSSL', 'DISABLED'),
('SKIP_EXTERNAL_LOCKING', 'ON'),
('VERSION_COMMENT', 'MySQL Community Server (GPL)'),
('SLAVE_LOAD_TMPDIR', 'C:\\WINDOWS\\TEMP');

-- --------------------------------------------------------

--
-- Table structure for table `STATISTICS`
--

CREATE TEMPORARY TABLE `STATISTICS` (
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `NON_UNIQUE` bigint(1) NOT NULL DEFAULT '0',
  `INDEX_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `INDEX_NAME` varchar(64) NOT NULL DEFAULT '',
  `SEQ_IN_INDEX` bigint(2) NOT NULL DEFAULT '0',
  `COLUMN_NAME` varchar(64) NOT NULL DEFAULT '',
  `COLLATION` varchar(1) DEFAULT NULL,
  `CARDINALITY` bigint(21) DEFAULT NULL,
  `SUB_PART` bigint(3) DEFAULT NULL,
  `PACKED` varchar(10) DEFAULT NULL,
  `NULLABLE` varchar(3) NOT NULL DEFAULT '',
  `INDEX_TYPE` varchar(16) NOT NULL DEFAULT '',
  `COMMENT` varchar(16) DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `STATISTICS`
--

INSERT INTO `STATISTICS` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `NON_UNIQUE`, `INDEX_SCHEMA`, `INDEX_NAME`, `SEQ_IN_INDEX`, `COLUMN_NAME`, `COLLATION`, `CARDINALITY`, `SUB_PART`, `PACKED`, `NULLABLE`, `INDEX_TYPE`, `COMMENT`) VALUES
(NULL, 'db_softeng2010', 'access_levels', 0, 'db_softeng2010', 'PRIMARY', 1, 'access_level_id', 'A', 9, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'accountability', 0, 'db_softeng2010', 'PRIMARY', 1, 'accountability_id', 'A', 19, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'accountability_type', 0, 'db_softeng2010', 'PRIMARY', 1, 'accountability_type_id', 'A', 7, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'adviser_history', 0, 'db_softeng2010', 'PRIMARY', 1, 'student_number', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'adviser_history', 0, 'db_softeng2010', 'PRIMARY', 2, 'employee_id', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'adviser_history', 0, 'db_softeng2010', 'PRIMARY', 3, 'semester', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'adviser_history', 0, 'db_softeng2010', 'PRIMARY', 4, 'academic_year', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'assessment', 0, 'db_softeng2010', 'PRIMARY', 1, 'student_number', 'A', 7, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'assessment_table', 0, 'db_softeng2010', 'PRIMARY', 1, 'look_up', 'A', 1, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'building', 0, 'db_softeng2010', 'PRIMARY', 1, 'building_id', 'A', 4, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'clerk', 0, 'db_softeng2010', 'PRIMARY', 1, 'employee_id', 'A', 1, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'current_semester_id', 0, 'db_softeng2010', 'PRIMARY', 1, 'current_id', 'A', 1, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'degree_program', 0, 'db_softeng2010', 'PRIMARY', 1, 'degree_program_id', 'A', 2, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'degree_study_plan', 0, 'db_softeng2010', 'PRIMARY', 1, 'study_plan_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'designation', 0, 'db_softeng2010', 'PRIMARY', 1, 'designation_id', 'A', 4, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'employee', 0, 'db_softeng2010', 'PRIMARY', 1, 'employee_id', 'A', 25, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'event', 0, 'db_softeng2010', 'PRIMARY', 1, 'event_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'faculty', 0, 'db_softeng2010', 'PRIMARY', 1, 'employee_id', 'A', 2, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'grade', 0, 'db_softeng2010', 'PRIMARY', 1, 'course_code', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'grade', 0, 'db_softeng2010', 'PRIMARY', 2, 'section_label', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'grade', 0, 'db_softeng2010', 'PRIMARY', 3, 'student_number', 'A', 3, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'offered_subjects', 0, 'db_softeng2010', 'PRIMARY', 1, 'course_code', 'A', 7, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'payment', 0, 'db_softeng2010', 'PRIMARY', 1, 'official_receipt_number', 'A', 10, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'prerequisite', 0, 'db_softeng2010', 'PRIMARY', 1, 'course_code', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'prerequisite', 0, 'db_softeng2010', 'PRIMARY', 2, 'prereq_course_code', 'A', 4, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'room', 0, 'db_softeng2010', 'PRIMARY', 1, 'room_id', 'A', 9, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'scholars', 0, 'db_softeng2010', 'PRIMARY', 1, 'scholarship_id', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'scholars', 0, 'db_softeng2010', 'PRIMARY', 2, 'student_number', 'A', 3, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'scholarship', 0, 'db_softeng2010', 'PRIMARY', 1, 'scholarship_id', 'A', 5, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'section', 0, 'db_softeng2010', 'PRIMARY', 1, 'course_code', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'section', 0, 'db_softeng2010', 'PRIMARY', 2, 'section_label', 'A', 18, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'section_schedules', 0, 'db_softeng2010', 'PRIMARY', 1, 'course_code', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'section_schedules', 0, 'db_softeng2010', 'PRIMARY', 2, 'section_label', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'section_schedules', 0, 'db_softeng2010', 'PRIMARY', 3, 'day_of_the_week', 'A', 18, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'semester', 0, 'db_softeng2010', 'PRIMARY', 1, 'semester_id', 'A', 5, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'slb', 0, 'db_softeng2010', 'PRIMARY', 1, 'slb_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'stfap', 0, 'db_softeng2010', 'PRIMARY', 1, 'stfap_bracket_id', 'A', 6, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'student', 0, 'db_softeng2010', 'PRIMARY', 1, 'student_number', 'A', 14, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'student_assessment', 0, 'db_softeng2010', 'PRIMARY', 1, 'assessment_id', 'A', 5, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'student_status', 0, 'db_softeng2010', 'PRIMARY', 1, 'student_number', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'student_status', 0, 'db_softeng2010', 'PRIMARY', 2, 'course_code', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'student_status', 0, 'db_softeng2010', 'PRIMARY', 3, 'section_label', 'A', 9, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'students_degree', 0, 'db_softeng2010', 'PRIMARY', 1, 'student_number', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'students_degree', 0, 'db_softeng2010', 'PRIMARY', 2, 'degree_program_id', 'A', 24, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'subject', 0, 'db_softeng2010', 'PRIMARY', 1, 'course_code', 'A', 11, NULL, NULL, '', 'BTREE', ''),
(NULL, 'db_softeng2010', 'unit', 0, 'db_softeng2010', 'PRIMARY', 1, 'unit_id', 'A', 7, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'columns_priv', 0, 'mysql', 'PRIMARY', 1, 'Host', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'columns_priv', 0, 'mysql', 'PRIMARY', 2, 'Db', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'columns_priv', 0, 'mysql', 'PRIMARY', 3, 'User', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'columns_priv', 0, 'mysql', 'PRIMARY', 4, 'Table_name', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'columns_priv', 0, 'mysql', 'PRIMARY', 5, 'Column_name', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'db', 0, 'mysql', 'PRIMARY', 1, 'Host', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'db', 0, 'mysql', 'PRIMARY', 2, 'Db', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'db', 0, 'mysql', 'PRIMARY', 3, 'User', 'A', 2, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'db', 1, 'mysql', 'User', 1, 'User', 'A', 1, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'event', 0, 'mysql', 'PRIMARY', 1, 'db', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'event', 0, 'mysql', 'PRIMARY', 2, 'name', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'func', 0, 'mysql', 'PRIMARY', 1, 'name', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'help_category', 0, 'mysql', 'PRIMARY', 1, 'help_category_id', 'A', 38, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'help_category', 0, 'mysql', 'name', 1, 'name', 'A', 38, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'help_keyword', 0, 'mysql', 'PRIMARY', 1, 'help_keyword_id', 'A', 450, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'help_keyword', 0, 'mysql', 'name', 1, 'name', 'A', 450, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'help_relation', 0, 'mysql', 'PRIMARY', 1, 'help_keyword_id', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'help_relation', 0, 'mysql', 'PRIMARY', 2, 'help_topic_id', 'A', 975, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'help_topic', 0, 'mysql', 'PRIMARY', 1, 'help_topic_id', 'A', 497, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'help_topic', 0, 'mysql', 'name', 1, 'name', 'A', 497, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'host', 0, 'mysql', 'PRIMARY', 1, 'Host', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'host', 0, 'mysql', 'PRIMARY', 2, 'Db', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'ndb_binlog_index', 0, 'mysql', 'PRIMARY', 1, 'epoch', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'plugin', 0, 'mysql', 'PRIMARY', 1, 'name', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'proc', 0, 'mysql', 'PRIMARY', 1, 'db', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'proc', 0, 'mysql', 'PRIMARY', 2, 'name', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'proc', 0, 'mysql', 'PRIMARY', 3, 'type', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'procs_priv', 0, 'mysql', 'PRIMARY', 1, 'Host', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'procs_priv', 0, 'mysql', 'PRIMARY', 2, 'Db', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'procs_priv', 0, 'mysql', 'PRIMARY', 3, 'User', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'procs_priv', 0, 'mysql', 'PRIMARY', 4, 'Routine_name', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'procs_priv', 0, 'mysql', 'PRIMARY', 5, 'Routine_type', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'procs_priv', 1, 'mysql', 'Grantor', 1, 'Grantor', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'servers', 0, 'mysql', 'PRIMARY', 1, 'Server_name', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'tables_priv', 0, 'mysql', 'PRIMARY', 1, 'Host', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'tables_priv', 0, 'mysql', 'PRIMARY', 2, 'Db', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'tables_priv', 0, 'mysql', 'PRIMARY', 3, 'User', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'tables_priv', 0, 'mysql', 'PRIMARY', 4, 'Table_name', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'tables_priv', 1, 'mysql', 'Grantor', 1, 'Grantor', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'time_zone', 0, 'mysql', 'PRIMARY', 1, 'Time_zone_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'time_zone_leap_second', 0, 'mysql', 'PRIMARY', 1, 'Transition_time', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'time_zone_name', 0, 'mysql', 'PRIMARY', 1, 'Name', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'time_zone_transition', 0, 'mysql', 'PRIMARY', 1, 'Time_zone_id', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'time_zone_transition', 0, 'mysql', 'PRIMARY', 2, 'Transition_time', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'time_zone_transition_type', 0, 'mysql', 'PRIMARY', 1, 'Time_zone_id', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'time_zone_transition_type', 0, 'mysql', 'PRIMARY', 2, 'Transition_type_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'user', 0, 'mysql', 'PRIMARY', 1, 'Host', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'mysql', 'user', 0, 'mysql', 'PRIMARY', 2, 'User', 'A', 2, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'access_levels', 0, 'razel''s database', 'PRIMARY', 1, 'access_level_id', 'A', 9, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'accountability', 0, 'razel''s database', 'PRIMARY', 1, 'accountability_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'accountability_type', 0, 'razel''s database', 'PRIMARY', 1, 'accountability_type_id', 'A', 6, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'adviser_history', 0, 'razel''s database', 'PRIMARY', 1, 'student_number', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'adviser_history', 0, 'razel''s database', 'PRIMARY', 2, 'employee_id', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'adviser_history', 0, 'razel''s database', 'PRIMARY', 3, 'semester', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'adviser_history', 0, 'razel''s database', 'PRIMARY', 4, 'academic_year', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'assessment', 0, 'razel''s database', 'PRIMARY', 1, 'student_number', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'assessment_table', 0, 'razel''s database', 'PRIMARY', 1, 'look_up', 'A', 1, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'building', 0, 'razel''s database', 'PRIMARY', 1, 'building_id', 'A', 4, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'clerk', 0, 'razel''s database', 'PRIMARY', 1, 'employee_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'current_semester_id', 0, 'razel''s database', 'PRIMARY', 1, 'current_id', 'A', 1, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'degree_program', 0, 'razel''s database', 'PRIMARY', 1, 'degree_program_id', 'A', 2, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'degree_study_plan', 0, 'razel''s database', 'PRIMARY', 1, 'study_plan_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'designation', 0, 'razel''s database', 'PRIMARY', 1, 'designation_id', 'A', 4, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'employee', 0, 'razel''s database', 'PRIMARY', 1, 'employee_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'event', 0, 'razel''s database', 'PRIMARY', 1, 'event_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'faculty', 0, 'razel''s database', 'PRIMARY', 1, 'employee_id', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'grade', 0, 'razel''s database', 'PRIMARY', 1, 'course_code', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'grade', 0, 'razel''s database', 'PRIMARY', 2, 'section_label', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'grade', 0, 'razel''s database', 'PRIMARY', 3, 'student_number', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'offered_subjects', 0, 'razel''s database', 'PRIMARY', 1, 'course_code', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'payment', 0, 'razel''s database', 'PRIMARY', 1, 'official_receipt_number', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'prerequisite', 0, 'razel''s database', 'PRIMARY', 1, 'course_code', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'prerequisite', 0, 'razel''s database', 'PRIMARY', 2, 'prereq_cpurse_code', 'A', 0, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'room', 0, 'razel''s database', 'PRIMARY', 1, 'room_id', 'A', 8, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'scholars', 0, 'razel''s database', 'PRIMARY', 1, 'scholarship_id', 'A', NULL, NULL, NULL, '', 'BTREE', ''),
(NULL, 'razel''s database', 'scholars', 0, 'razel''s database', 'PRIMARY', 2, 'student_number', 'A', 0, NULL, NULL, '', 'BTREE', '');

-- --------------------------------------------------------

--
-- Table structure for table `TABLES`
--

CREATE TEMPORARY TABLE `TABLES` (
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `TABLE_TYPE` varchar(64) NOT NULL DEFAULT '',
  `ENGINE` varchar(64) DEFAULT NULL,
  `VERSION` bigint(21) unsigned DEFAULT NULL,
  `ROW_FORMAT` varchar(10) DEFAULT NULL,
  `TABLE_ROWS` bigint(21) unsigned DEFAULT NULL,
  `AVG_ROW_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `DATA_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `MAX_DATA_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `INDEX_LENGTH` bigint(21) unsigned DEFAULT NULL,
  `DATA_FREE` bigint(21) unsigned DEFAULT NULL,
  `AUTO_INCREMENT` bigint(21) unsigned DEFAULT NULL,
  `CREATE_TIME` datetime DEFAULT NULL,
  `UPDATE_TIME` datetime DEFAULT NULL,
  `CHECK_TIME` datetime DEFAULT NULL,
  `TABLE_COLLATION` varchar(32) DEFAULT NULL,
  `CHECKSUM` bigint(21) unsigned DEFAULT NULL,
  `CREATE_OPTIONS` varchar(255) DEFAULT NULL,
  `TABLE_COMMENT` varchar(80) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TABLES`
--

INSERT INTO `TABLES` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `TABLE_TYPE`, `ENGINE`, `VERSION`, `ROW_FORMAT`, `TABLE_ROWS`, `AVG_ROW_LENGTH`, `DATA_LENGTH`, `MAX_DATA_LENGTH`, `INDEX_LENGTH`, `DATA_FREE`, `AUTO_INCREMENT`, `CREATE_TIME`, `UPDATE_TIME`, `CHECK_TIME`, `TABLE_COLLATION`, `CHECKSUM`, `CREATE_OPTIONS`, `TABLE_COMMENT`) VALUES
(NULL, 'information_schema', 'CHARACTER_SETS', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 384, 0, 16604160, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=43690', ''),
(NULL, 'information_schema', 'COLLATIONS', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 231, 0, 16704765, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=72628', ''),
(NULL, 'information_schema', 'COLLATION_CHARACTER_SET_APPLICABILITY', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 195, 0, 16691610, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=86037', ''),
(NULL, 'information_schema', 'COLUMNS', 'SYSTEM VIEW', 'MyISAM', 10, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2010-10-12 20:51:17', '2010-10-12 20:51:17', NULL, 'utf8_general_ci', NULL, 'max_rows=4560', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 2565, 0, 16757145, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=6540', ''),
(NULL, 'information_schema', 'ENGINES', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 490, 0, 16709000, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=34239', ''),
(NULL, 'information_schema', 'EVENTS', 'SYSTEM VIEW', 'MyISAM', 10, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2010-10-12 20:51:17', '2010-10-12 20:51:17', NULL, 'utf8_general_ci', NULL, 'max_rows=618', ''),
(NULL, 'information_schema', 'FILES', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 2677, 0, 16758020, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=6267', ''),
(NULL, 'information_schema', 'GLOBAL_STATUS', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 3268, 0, 16755036, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=5133', ''),
(NULL, 'information_schema', 'GLOBAL_VARIABLES', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 3268, 0, 16755036, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=5133', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 4637, 0, 16762755, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=3618', ''),
(NULL, 'information_schema', 'PARTITIONS', 'SYSTEM VIEW', 'MyISAM', 10, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2010-10-12 20:51:17', '2010-10-12 20:51:17', NULL, 'utf8_general_ci', NULL, 'max_rows=5612', ''),
(NULL, 'information_schema', 'PLUGINS', 'SYSTEM VIEW', 'MyISAM', 10, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2010-10-12 20:51:17', '2010-10-12 20:51:17', NULL, 'utf8_general_ci', NULL, 'max_rows=13025', ''),
(NULL, 'information_schema', 'PROCESSLIST', 'SYSTEM VIEW', 'MyISAM', 10, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2010-10-12 20:51:17', '2010-10-12 20:51:17', NULL, 'utf8_general_ci', NULL, 'max_rows=23899', ''),
(NULL, 'information_schema', 'PROFILING', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 308, 0, 16562084, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=54471', ''),
(NULL, 'information_schema', 'REFERENTIAL_CONSTRAINTS', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 4814, 0, 16767162, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=3485', ''),
(NULL, 'information_schema', 'ROUTINES', 'SYSTEM VIEW', 'MyISAM', 10, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2010-10-12 20:51:17', '2010-10-12 20:51:17', NULL, 'utf8_general_ci', NULL, 'max_rows=588', ''),
(NULL, 'information_schema', 'SCHEMATA', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 3464, 0, 16755368, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=4843', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 2179, 0, 16767405, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=7699', ''),
(NULL, 'information_schema', 'SESSION_STATUS', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 3268, 0, 16755036, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=5133', ''),
(NULL, 'information_schema', 'SESSION_VARIABLES', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 3268, 0, 16755036, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=5133', ''),
(NULL, 'information_schema', 'STATISTICS', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 2679, 0, 16770540, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=6262', ''),
(NULL, 'information_schema', 'TABLES', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 3545, 0, 16760760, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=4732', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 2504, 0, 16749256, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=6700', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 2372, 0, 16748692, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=7073', ''),
(NULL, 'information_schema', 'TRIGGERS', 'SYSTEM VIEW', 'MyISAM', 10, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2010-10-12 20:51:17', '2010-10-12 20:51:17', NULL, 'utf8_general_ci', NULL, 'max_rows=569', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'SYSTEM VIEW', 'MEMORY', 10, 'Fixed', NULL, 1986, 0, 16759854, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=8447', ''),
(NULL, 'information_schema', 'VIEWS', 'SYSTEM VIEW', 'MyISAM', 10, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2010-10-12 20:51:17', '2010-10-12 20:51:17', NULL, 'utf8_general_ci', NULL, 'max_rows=6932', ''),
(NULL, 'db_softeng2010', 'access_levels', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 9, 35, 315, 9851624184872959, 2048, 0, 11, '2010-09-30 18:42:34', '2010-09-30 18:42:38', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'accountability', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 19, 74, 3908, 281474976710655, 2048, 2484, 164, '2010-09-30 18:42:34', '2010-10-12 20:38:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'accountability_type', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 7, 35, 245, 9851624184872959, 2048, 0, NULL, '2010-09-30 18:51:09', '2010-10-06 16:30:58', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'adviser_history', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 3940649673949183, 1024, 0, NULL, '2010-09-30 18:42:34', '2010-09-30 18:42:34', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'assessment', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 7, 42, 294, 11821949021847551, 2048, 0, NULL, '2010-10-10 18:17:01', '2010-10-12 20:38:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'assessment_table', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 1, 70, 70, 19703248369745919, 2048, 0, NULL, '2010-10-07 18:21:45', '2010-10-07 18:21:53', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'building', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 4, 15, 60, 4222124650659839, 2048, 0, NULL, '2010-09-30 18:42:34', '2010-10-11 14:51:53', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'clerk', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 1, 9, 9, 2533274790395903, 2048, 0, NULL, '2010-09-30 18:42:34', '2010-09-30 18:42:38', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'current_semester_id', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 1, 13, 26, 3659174697238527, 2048, 13, 3, '2010-10-10 19:00:48', '2010-10-10 19:35:04', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'degree_program', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 2, 118, 236, 281474976710655, 2048, 0, 2002, '2010-10-10 18:15:28', '2010-10-11 13:25:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'degree_study_plan', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 5066549580791807, 1024, 0, 1, '2010-09-30 18:42:34', '2010-09-30 18:42:34', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'designation', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 4, 22, 88, 281474976710655, 2048, 0, 5, '2010-09-30 18:42:34', '2010-10-10 18:54:34', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'employee', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 25, 161, 4288, 281474976710655, 2048, 240, NULL, '2010-09-30 18:42:34', '2010-10-12 20:38:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'event', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 1024, 0, 1, '2010-10-10 17:29:23', '2010-10-10 17:29:23', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'faculty', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 2, 27, 54, 7599824371187711, 2048, 0, NULL, '2010-09-30 18:42:35', '2010-10-06 16:48:09', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'grade', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 3, 37, 112, 281474976710655, 4096, 0, NULL, '2010-09-30 19:09:01', '2010-10-12 20:08:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'offered_subjects', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 7, 20, 140, 281474976710655, 4096, 0, NULL, '2010-10-02 16:22:25', '2010-10-11 16:10:01', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'payment', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 10, 26, 260, 7318349394477055, 2048, 0, NULL, '2010-10-02 16:21:18', '2010-10-12 20:11:32', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'prerequisite', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 4, 20, 80, 281474976710655, 7168, 0, NULL, '2010-09-30 18:42:35', '2010-10-11 15:25:13', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'room', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 9, 9, 81, 2533274790395903, 2048, 0, NULL, '2010-09-30 18:42:35', '2010-10-11 14:54:11', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'scholars', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 3, 13, 39, 3659174697238527, 2048, 0, NULL, '2010-10-10 18:23:58', '2010-10-11 19:20:41', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'scholarship', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 5, 22, 172, 281474976710655, 2048, 60, 105, '2010-10-10 18:15:56', '2010-10-11 13:55:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'section', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 18, 40, 740, 281474976710655, 4096, 20, NULL, '2010-10-02 16:34:28', '2010-10-12 20:51:16', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'section_schedules', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 18, 24, 436, 281474976710655, 4096, 0, NULL, '2010-10-02 17:12:14', '2010-10-11 19:04:43', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'semester', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 5, 25, 125, 7036874417766399, 2048, 0, 6, '2010-09-30 18:42:35', '2010-09-30 18:42:38', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'slb', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 26, 7318349394477055, 2048, 26, 7, '2010-10-12 17:19:20', '2010-10-12 19:08:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'stfap', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 6, 16, 96, 4503599627370495, 2048, 0, 8, '2010-09-30 18:42:36', '2010-09-30 20:55:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'student', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 14, 209, 2928, 281474976710655, 2048, 0, NULL, '2010-10-11 12:18:33', '2010-10-12 20:38:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'student_assessment', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 5, 35, 176, 281474976710655, 2048, 0, 18, '2010-09-30 18:42:36', '2010-10-12 20:38:14', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'student_status', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 9, 37, 336, 281474976710655, 4096, 0, NULL, '2010-10-07 19:57:39', '2010-10-12 20:51:16', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'students_degree', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 24, 22, 528, 6192449487634431, 2048, 0, NULL, '2010-09-30 18:42:36', '2010-10-12 20:21:39', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'subject', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 11, 91, 1052, 281474976710655, 4096, 44, NULL, '2010-10-07 18:32:10', '2010-10-11 18:55:13', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'db_softeng2010', 'unit', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 7, 260, 1820, 73183493944770559, 2048, 0, NULL, '2010-09-30 18:42:36', '2010-10-10 19:15:24', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'mysql', 'columns_priv', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 227994731135631359, 4096, 0, NULL, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, 'utf8_bin', NULL, '', 'Column privileges'),
(NULL, 'mysql', 'db', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 2, 440, 880, 123848989752688639, 5120, 0, NULL, '2008-11-15 01:31:31', '2008-11-14 19:31:32', '2008-11-15 01:31:32', 'utf8_bin', NULL, '', 'Database privileges'),
(NULL, 'mysql', 'event', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 2048, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, 'utf8_general_ci', NULL, '', 'Events'),
(NULL, 'mysql', 'func', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 162974011515469823, 1024, 0, NULL, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, 'utf8_bin', NULL, '', 'User defined functions'),
(NULL, 'mysql', 'general_log', 'BASE TABLE', 'CSV', 10, 'Dynamic', 2, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, '', 'General log'),
(NULL, 'mysql', 'help_category', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 38, 581, 22078, 163536961468891135, 3072, 0, NULL, '2008-11-15 01:31:31', '2008-11-14 19:31:34', NULL, 'utf8_general_ci', NULL, '', 'help categories'),
(NULL, 'mysql', 'help_keyword', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 450, 197, 88650, 55450570411999231, 16384, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:34', NULL, 'utf8_general_ci', NULL, '', 'help keywords'),
(NULL, 'mysql', 'help_relation', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 975, 9, 8775, 2533274790395903, 16384, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:34', NULL, 'utf8_general_ci', NULL, '', 'keyword-topic relation'),
(NULL, 'mysql', 'help_topic', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 497, 812, 403852, 281474976710655, 20480, 0, NULL, '2008-11-15 01:31:31', '2008-11-14 19:31:34', NULL, 'utf8_general_ci', NULL, '', 'help topics'),
(NULL, 'mysql', 'host', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 110056715893866495, 2048, 0, NULL, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, 'utf8_bin', NULL, '', 'Host privileges;  Merged with database privileges'),
(NULL, 'mysql', 'ndb_binlog_index', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 1024, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'mysql', 'plugin', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 162411061562048511, 1024, 0, NULL, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, 'utf8_bin', NULL, '', 'MySQL plugins'),
(NULL, 'mysql', 'proc', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 2048, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, 'utf8_general_ci', NULL, '', 'Stored Procedures'),
(NULL, 'mysql', 'procs_priv', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 239253730204057599, 4096, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, 'utf8_bin', NULL, '', 'Procedure privileges'),
(NULL, 'mysql', 'servers', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 433752939111120895, 1024, 0, NULL, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, 'utf8_general_ci', NULL, '', 'MySQL Foreign Servers table'),
(NULL, 'mysql', 'slow_log', 'BASE TABLE', 'CSV', 10, 'Dynamic', 2, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, '', 'Slow log'),
(NULL, 'mysql', 'tables_priv', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 239535205180768255, 4096, 0, NULL, '2008-11-15 01:31:31', '2008-11-14 19:31:32', NULL, 'utf8_bin', NULL, '', 'Table privileges'),
(NULL, 'mysql', 'time_zone', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 1970324836974591, 1024, 0, 1, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, 'utf8_general_ci', NULL, '', 'Time zones'),
(NULL, 'mysql', 'time_zone_leap_second', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 3659174697238527, 1024, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, 'utf8_general_ci', NULL, '', 'Leap seconds information for time zones'),
(NULL, 'mysql', 'time_zone_name', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 55450570411999231, 1024, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, 'utf8_general_ci', NULL, '', 'Time zone names'),
(NULL, 'mysql', 'time_zone_transition', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 4785074604081151, 1024, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, 'utf8_general_ci', NULL, '', 'Time zone transitions'),
(NULL, 'mysql', 'time_zone_transition_type', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 10696049115004927, 1024, 0, NULL, '2008-11-15 01:31:32', '2008-11-14 19:31:32', NULL, 'utf8_general_ci', NULL, '', 'Time zone transition types'),
(NULL, 'mysql', 'user', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 2, 52, 152, 281474976710655, 2048, 48, NULL, '2008-11-15 01:31:31', '2009-03-06 18:08:32', NULL, 'utf8_bin', NULL, '', 'Users and global privileges'),
(NULL, 'razel''s database', 'access_levels', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 9, 35, 315, 9851624184872959, 2048, 0, 10, '2010-10-12 17:04:01', '2010-10-12 17:07:09', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'accountability', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 1024, 0, 1, '2010-10-12 17:10:48', '2010-10-12 17:10:48', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'accountability_type', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 6, 35, 210, 9851624184872959, 2048, 0, NULL, '2010-10-12 17:29:20', '2010-10-12 17:29:20', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'adviser_history', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 3940649673949183, 1024, 0, NULL, '2010-10-12 20:03:41', '2010-10-12 20:03:41', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'assessment', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 11821949021847551, 1024, 0, NULL, '2010-10-12 17:29:56', '2010-10-12 17:29:56', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'assessment_table', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 1, 70, 70, 19703248369745919, 2048, 0, NULL, '2010-10-12 18:53:58', '2010-10-12 18:53:58', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'building', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 4, 15, 60, 4222124650659839, 2048, 0, NULL, '2010-10-12 18:54:18', '2010-10-12 18:54:18', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'clerk', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 2533274790395903, 1024, 0, NULL, '2010-10-12 18:55:38', '2010-10-12 18:55:38', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'current_semester_id', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 1, 13, 13, 3659174697238527, 2048, 0, 2, '2010-10-12 18:56:46', '2010-10-12 18:58:18', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'degree_program', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 2, 110, 220, 281474976710655, 2048, 0, 2001, '2010-10-12 19:19:54', '2010-10-12 19:19:54', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'degree_study_plan', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 5066549580791807, 1024, 0, 1, '2010-10-12 19:19:21', '2010-10-12 19:19:21', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'designation', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 4, 22, 88, 281474976710655, 2048, 0, 5, '2010-10-12 19:39:16', '2010-10-12 19:39:52', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'employee', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 1024, 0, NULL, '2010-10-12 19:51:49', '2010-10-12 19:51:49', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'event', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 1024, 0, 1, '2010-10-12 19:52:03', '2010-10-12 19:52:03', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'faculty', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 7599824371187711, 1024, 0, NULL, '2010-10-12 19:54:00', '2010-10-12 19:54:00', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'grade', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 2048, 0, NULL, '2010-10-12 19:58:32', '2010-10-12 19:58:32', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'offered_subjects', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 2048, 0, NULL, '2010-10-12 20:00:12', '2010-10-12 20:00:12', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'payment', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 7318349394477055, 1024, 0, NULL, '2010-10-12 20:05:36', '2010-10-12 20:05:36', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'prerequisite', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 0, 0, 0, 281474976710655, 4096, 0, NULL, '2010-10-12 20:02:50', '2010-10-12 20:02:50', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'room', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 8, 9, 72, 2533274790395903, 2048, 0, NULL, '2010-10-12 20:08:22', '2010-10-12 20:09:37', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'razel''s database', 'scholars', 'BASE TABLE', 'MyISAM', 10, 'Fixed', 0, 0, 0, 3659174697238527, 1024, 0, NULL, '2010-10-12 20:11:06', '2010-10-12 20:11:06', NULL, 'latin1_swedish_ci', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `TABLE_CONSTRAINTS`
--

CREATE TEMPORARY TABLE `TABLE_CONSTRAINTS` (
  `CONSTRAINT_CATALOG` varchar(512) DEFAULT NULL,
  `CONSTRAINT_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `CONSTRAINT_NAME` varchar(64) NOT NULL DEFAULT '',
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `CONSTRAINT_TYPE` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TABLE_CONSTRAINTS`
--

INSERT INTO `TABLE_CONSTRAINTS` (`CONSTRAINT_CATALOG`, `CONSTRAINT_SCHEMA`, `CONSTRAINT_NAME`, `TABLE_SCHEMA`, `TABLE_NAME`, `CONSTRAINT_TYPE`) VALUES
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'access_levels', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'accountability', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'accountability_type', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'adviser_history', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'assessment', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'assessment_table', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'building', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'clerk', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'current_semester_id', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'degree_program', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'degree_study_plan', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'designation', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'employee', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'event', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'faculty', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'grade', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'offered_subjects', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'payment', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'prerequisite', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'room', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'scholars', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'scholarship', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'section', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'section_schedules', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'semester', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'slb', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'stfap', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'student', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'student_assessment', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'student_status', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'students_degree', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'subject', 'PRIMARY KEY'),
(NULL, 'db_softeng2010', 'PRIMARY', 'db_softeng2010', 'unit', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'columns_priv', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'db', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'event', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'func', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'help_category', 'PRIMARY KEY'),
(NULL, 'mysql', 'name', 'mysql', 'help_category', 'UNIQUE'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'help_keyword', 'PRIMARY KEY'),
(NULL, 'mysql', 'name', 'mysql', 'help_keyword', 'UNIQUE'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'help_relation', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'help_topic', 'PRIMARY KEY'),
(NULL, 'mysql', 'name', 'mysql', 'help_topic', 'UNIQUE'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'host', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'ndb_binlog_index', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'plugin', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'proc', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'procs_priv', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'servers', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'tables_priv', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'time_zone', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'time_zone_leap_second', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'time_zone_name', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'time_zone_transition', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'time_zone_transition_type', 'PRIMARY KEY'),
(NULL, 'mysql', 'PRIMARY', 'mysql', 'user', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'access_levels', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'accountability', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'accountability_type', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'adviser_history', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'assessment', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'assessment_table', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'building', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'clerk', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'current_semester_id', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'degree_program', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'degree_study_plan', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'designation', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'employee', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'event', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'faculty', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'grade', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'offered_subjects', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'payment', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'prerequisite', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'room', 'PRIMARY KEY'),
(NULL, 'razel''s database', 'PRIMARY', 'razel''s database', 'scholars', 'PRIMARY KEY');

-- --------------------------------------------------------

--
-- Table structure for table `TABLE_PRIVILEGES`
--

CREATE TEMPORARY TABLE `TABLE_PRIVILEGES` (
  `GRANTEE` varchar(81) NOT NULL DEFAULT '',
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `PRIVILEGE_TYPE` varchar(64) NOT NULL DEFAULT '',
  `IS_GRANTABLE` varchar(3) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TABLE_PRIVILEGES`
--


-- --------------------------------------------------------

--
-- Table structure for table `TRIGGERS`
--

CREATE TEMPORARY TABLE `TRIGGERS` (
  `TRIGGER_CATALOG` varchar(512) DEFAULT NULL,
  `TRIGGER_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TRIGGER_NAME` varchar(64) NOT NULL DEFAULT '',
  `EVENT_MANIPULATION` varchar(6) NOT NULL DEFAULT '',
  `EVENT_OBJECT_CATALOG` varchar(512) DEFAULT NULL,
  `EVENT_OBJECT_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `EVENT_OBJECT_TABLE` varchar(64) NOT NULL DEFAULT '',
  `ACTION_ORDER` bigint(4) NOT NULL DEFAULT '0',
  `ACTION_CONDITION` longtext,
  `ACTION_STATEMENT` longtext NOT NULL,
  `ACTION_ORIENTATION` varchar(9) NOT NULL DEFAULT '',
  `ACTION_TIMING` varchar(6) NOT NULL DEFAULT '',
  `ACTION_REFERENCE_OLD_TABLE` varchar(64) DEFAULT NULL,
  `ACTION_REFERENCE_NEW_TABLE` varchar(64) DEFAULT NULL,
  `ACTION_REFERENCE_OLD_ROW` varchar(3) NOT NULL DEFAULT '',
  `ACTION_REFERENCE_NEW_ROW` varchar(3) NOT NULL DEFAULT '',
  `CREATED` datetime DEFAULT NULL,
  `SQL_MODE` varchar(8192) NOT NULL DEFAULT '',
  `DEFINER` varchar(77) NOT NULL DEFAULT '',
  `CHARACTER_SET_CLIENT` varchar(32) NOT NULL DEFAULT '',
  `COLLATION_CONNECTION` varchar(32) NOT NULL DEFAULT '',
  `DATABASE_COLLATION` varchar(32) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TRIGGERS`
--


-- --------------------------------------------------------

--
-- Table structure for table `USER_PRIVILEGES`
--

CREATE TEMPORARY TABLE `USER_PRIVILEGES` (
  `GRANTEE` varchar(81) NOT NULL DEFAULT '',
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `PRIVILEGE_TYPE` varchar(64) NOT NULL DEFAULT '',
  `IS_GRANTABLE` varchar(3) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USER_PRIVILEGES`
--

INSERT INTO `USER_PRIVILEGES` (`GRANTEE`, `TABLE_CATALOG`, `PRIVILEGE_TYPE`, `IS_GRANTABLE`) VALUES
('''root''@''localhost''', NULL, 'SELECT', 'YES'),
('''root''@''localhost''', NULL, 'INSERT', 'YES'),
('''root''@''localhost''', NULL, 'UPDATE', 'YES'),
('''root''@''localhost''', NULL, 'DELETE', 'YES'),
('''root''@''localhost''', NULL, 'CREATE', 'YES'),
('''root''@''localhost''', NULL, 'DROP', 'YES'),
('''root''@''localhost''', NULL, 'RELOAD', 'YES'),
('''root''@''localhost''', NULL, 'SHUTDOWN', 'YES'),
('''root''@''localhost''', NULL, 'PROCESS', 'YES'),
('''root''@''localhost''', NULL, 'FILE', 'YES'),
('''root''@''localhost''', NULL, 'REFERENCES', 'YES'),
('''root''@''localhost''', NULL, 'INDEX', 'YES'),
('''root''@''localhost''', NULL, 'ALTER', 'YES'),
('''root''@''localhost''', NULL, 'SHOW DATABASES', 'YES'),
('''root''@''localhost''', NULL, 'SUPER', 'YES'),
('''root''@''localhost''', NULL, 'CREATE TEMPORARY TABLES', 'YES'),
('''root''@''localhost''', NULL, 'LOCK TABLES', 'YES'),
('''root''@''localhost''', NULL, 'EXECUTE', 'YES'),
('''root''@''localhost''', NULL, 'REPLICATION SLAVE', 'YES'),
('''root''@''localhost''', NULL, 'REPLICATION CLIENT', 'YES'),
('''root''@''localhost''', NULL, 'CREATE VIEW', 'YES'),
('''root''@''localhost''', NULL, 'SHOW VIEW', 'YES'),
('''root''@''localhost''', NULL, 'CREATE ROUTINE', 'YES'),
('''root''@''localhost''', NULL, 'ALTER ROUTINE', 'YES'),
('''root''@''localhost''', NULL, 'CREATE USER', 'YES'),
('''root''@''localhost''', NULL, 'EVENT', 'YES'),
('''root''@''localhost''', NULL, 'TRIGGER', 'YES'),
('''root''@''127.0.0.1''', NULL, 'SELECT', 'YES'),
('''root''@''127.0.0.1''', NULL, 'INSERT', 'YES'),
('''root''@''127.0.0.1''', NULL, 'UPDATE', 'YES'),
('''root''@''127.0.0.1''', NULL, 'DELETE', 'YES'),
('''root''@''127.0.0.1''', NULL, 'CREATE', 'YES'),
('''root''@''127.0.0.1''', NULL, 'DROP', 'YES'),
('''root''@''127.0.0.1''', NULL, 'RELOAD', 'YES'),
('''root''@''127.0.0.1''', NULL, 'SHUTDOWN', 'YES'),
('''root''@''127.0.0.1''', NULL, 'PROCESS', 'YES'),
('''root''@''127.0.0.1''', NULL, 'FILE', 'YES'),
('''root''@''127.0.0.1''', NULL, 'REFERENCES', 'YES'),
('''root''@''127.0.0.1''', NULL, 'INDEX', 'YES'),
('''root''@''127.0.0.1''', NULL, 'ALTER', 'YES'),
('''root''@''127.0.0.1''', NULL, 'SHOW DATABASES', 'YES'),
('''root''@''127.0.0.1''', NULL, 'SUPER', 'YES'),
('''root''@''127.0.0.1''', NULL, 'CREATE TEMPORARY TABLES', 'YES'),
('''root''@''127.0.0.1''', NULL, 'LOCK TABLES', 'YES'),
('''root''@''127.0.0.1''', NULL, 'EXECUTE', 'YES'),
('''root''@''127.0.0.1''', NULL, 'REPLICATION SLAVE', 'YES'),
('''root''@''127.0.0.1''', NULL, 'REPLICATION CLIENT', 'YES'),
('''root''@''127.0.0.1''', NULL, 'CREATE VIEW', 'YES'),
('''root''@''127.0.0.1''', NULL, 'SHOW VIEW', 'YES'),
('''root''@''127.0.0.1''', NULL, 'CREATE ROUTINE', 'YES'),
('''root''@''127.0.0.1''', NULL, 'ALTER ROUTINE', 'YES'),
('''root''@''127.0.0.1''', NULL, 'CREATE USER', 'YES'),
('''root''@''127.0.0.1''', NULL, 'EVENT', 'YES'),
('''root''@''127.0.0.1''', NULL, 'TRIGGER', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `VIEWS`
--

CREATE TEMPORARY TABLE `VIEWS` (
  `TABLE_CATALOG` varchar(512) DEFAULT NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL DEFAULT '',
  `TABLE_NAME` varchar(64) NOT NULL DEFAULT '',
  `VIEW_DEFINITION` longtext NOT NULL,
  `CHECK_OPTION` varchar(8) NOT NULL DEFAULT '',
  `IS_UPDATABLE` varchar(3) NOT NULL DEFAULT '',
  `DEFINER` varchar(77) NOT NULL DEFAULT '',
  `SECURITY_TYPE` varchar(7) NOT NULL DEFAULT '',
  `CHARACTER_SET_CLIENT` varchar(32) NOT NULL DEFAULT '',
  `COLLATION_CONNECTION` varchar(32) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `VIEWS`
--

--
-- Database: `mysql`
--
CREATE DATABASE `mysql` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mysql`;

-- --------------------------------------------------------

--
-- Table structure for table `columns_priv`
--

CREATE TABLE IF NOT EXISTS `columns_priv` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(16) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Table_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Column_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Column_priv` set('Select','Insert','Update','References') CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`Host`,`Db`,`User`,`Table_name`,`Column_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column privileges';

--
-- Dumping data for table `columns_priv`
--


-- --------------------------------------------------------

--
-- Table structure for table `db`
--

CREATE TABLE IF NOT EXISTS `db` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(16) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Select_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Insert_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Update_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Delete_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Drop_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Grant_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `References_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Index_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_tmp_table_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Lock_tables_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Show_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Execute_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Event_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Trigger_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  PRIMARY KEY (`Host`,`Db`,`User`),
  KEY `User` (`User`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database privileges';

--
-- Dumping data for table `db`
--

INSERT INTO `db` (`Host`, `Db`, `User`, `Select_priv`, `Insert_priv`, `Update_priv`, `Delete_priv`, `Create_priv`, `Drop_priv`, `Grant_priv`, `References_priv`, `Index_priv`, `Alter_priv`, `Create_tmp_table_priv`, `Lock_tables_priv`, `Create_view_priv`, `Show_view_priv`, `Create_routine_priv`, `Alter_routine_priv`, `Execute_priv`, `Event_priv`, `Trigger_priv`) VALUES
('%', 'test', '', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'Y', 'Y'),
('%', 'test\\_%', '', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 'N', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `db` char(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `name` char(64) NOT NULL DEFAULT '',
  `body` longblob NOT NULL,
  `definer` char(77) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `execute_at` datetime DEFAULT NULL,
  `interval_value` int(11) DEFAULT NULL,
  `interval_field` enum('YEAR','QUARTER','MONTH','DAY','HOUR','MINUTE','WEEK','SECOND','MICROSECOND','YEAR_MONTH','DAY_HOUR','DAY_MINUTE','DAY_SECOND','HOUR_MINUTE','HOUR_SECOND','MINUTE_SECOND','DAY_MICROSECOND','HOUR_MICROSECOND','MINUTE_MICROSECOND','SECOND_MICROSECOND') DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_executed` datetime DEFAULT NULL,
  `starts` datetime DEFAULT NULL,
  `ends` datetime DEFAULT NULL,
  `status` enum('ENABLED','DISABLED','SLAVESIDE_DISABLED') NOT NULL DEFAULT 'ENABLED',
  `on_completion` enum('DROP','PRESERVE') NOT NULL DEFAULT 'DROP',
  `sql_mode` set('REAL_AS_FLOAT','PIPES_AS_CONCAT','ANSI_QUOTES','IGNORE_SPACE','NOT_USED','ONLY_FULL_GROUP_BY','NO_UNSIGNED_SUBTRACTION','NO_DIR_IN_CREATE','POSTGRESQL','ORACLE','MSSQL','DB2','MAXDB','NO_KEY_OPTIONS','NO_TABLE_OPTIONS','NO_FIELD_OPTIONS','MYSQL323','MYSQL40','ANSI','NO_AUTO_VALUE_ON_ZERO','NO_BACKSLASH_ESCAPES','STRICT_TRANS_TABLES','STRICT_ALL_TABLES','NO_ZERO_IN_DATE','NO_ZERO_DATE','INVALID_DATES','ERROR_FOR_DIVISION_BY_ZERO','TRADITIONAL','NO_AUTO_CREATE_USER','HIGH_NOT_PRECEDENCE','NO_ENGINE_SUBSTITUTION','PAD_CHAR_TO_FULL_LENGTH') NOT NULL DEFAULT '',
  `comment` char(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `originator` int(10) NOT NULL,
  `time_zone` char(64) CHARACTER SET latin1 NOT NULL DEFAULT 'SYSTEM',
  `character_set_client` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `collation_connection` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `db_collation` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `body_utf8` longblob,
  PRIMARY KEY (`db`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Events';

--
-- Dumping data for table `event`
--


-- --------------------------------------------------------

--
-- Table structure for table `func`
--

CREATE TABLE IF NOT EXISTS `func` (
  `name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ret` tinyint(1) NOT NULL DEFAULT '0',
  `dl` char(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `type` enum('function','aggregate') CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User defined functions';

--
-- Dumping data for table `func`
--


-- --------------------------------------------------------

--
-- Table structure for table `general_log`
--

CREATE TABLE IF NOT EXISTS `general_log` (
  `event_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_host` mediumtext NOT NULL,
  `thread_id` int(11) NOT NULL,
  `server_id` int(11) NOT NULL,
  `command_type` varchar(64) NOT NULL,
  `argument` mediumtext NOT NULL
) ENGINE=CSV DEFAULT CHARSET=utf8 COMMENT='General log';

--
-- Dumping data for table `general_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `help_category`
--

CREATE TABLE IF NOT EXISTS `help_category` (
  `help_category_id` smallint(5) unsigned NOT NULL,
  `name` char(64) NOT NULL,
  `parent_category_id` smallint(5) unsigned DEFAULT NULL,
  `url` char(128) NOT NULL,
  PRIMARY KEY (`help_category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='help categories';

--
-- Dumping data for table `help_category`
--

INSERT INTO `help_category` (`help_category_id`, `name`, `parent_category_id`, `url`) VALUES
(1, 'Geographic', 0, ''),
(2, 'Polygon properties', 33, ''),
(3, 'WKT', 33, ''),
(4, 'Numeric Functions', 37, ''),
(5, 'Plugins', 34, ''),
(6, 'MBR', 33, ''),
(7, 'Control flow functions', 37, ''),
(8, 'Transactions', 34, ''),
(9, 'Account Management', 34, ''),
(10, 'Point properties', 33, ''),
(11, 'Encryption Functions', 37, ''),
(12, 'LineString properties', 33, ''),
(13, 'Logical operators', 37, ''),
(14, 'Miscellaneous Functions', 37, ''),
(15, 'Information Functions', 37, ''),
(16, 'Functions and Modifiers for Use with GROUP BY', 34, ''),
(17, 'Storage Engines', 34, ''),
(18, 'Comparison operators', 37, ''),
(19, 'Bit Functions', 37, ''),
(20, 'Table Maintenance', 34, ''),
(21, 'Data Types', 34, ''),
(22, 'User-Defined Functions', 34, ''),
(23, 'Compound Statements', 34, ''),
(24, 'Geometry constructors', 33, ''),
(25, 'GeometryCollection properties', 1, ''),
(26, 'Administration', 34, ''),
(27, 'Data Manipulation', 34, ''),
(28, 'Utility', 34, ''),
(29, 'Language Structure', 34, ''),
(30, 'Geometry relations', 33, ''),
(31, 'Date and Time Functions', 37, ''),
(32, 'WKB', 33, ''),
(33, 'Geographic Features', 34, ''),
(34, 'Contents', 0, ''),
(35, 'Geometry properties', 33, ''),
(36, 'String Functions', 37, ''),
(37, 'Functions', 34, ''),
(38, 'Data Definition', 34, '');

-- --------------------------------------------------------

--
-- Table structure for table `help_keyword`
--

CREATE TABLE IF NOT EXISTS `help_keyword` (
  `help_keyword_id` int(10) unsigned NOT NULL,
  `name` char(64) NOT NULL,
  PRIMARY KEY (`help_keyword_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='help keywords';

--
-- Dumping data for table `help_keyword`
--

INSERT INTO `help_keyword` (`help_keyword_id`, `name`) VALUES
(0, 'JOIN'),
(1, 'HOST'),
(2, 'REPEAT'),
(3, 'SERIALIZABLE'),
(4, 'REPLACE'),
(5, 'AT'),
(6, 'SCHEDULE'),
(7, 'RETURNS'),
(8, 'STARTS'),
(9, 'MASTER_SSL_CA'),
(10, 'NCHAR'),
(11, 'COLUMNS'),
(12, 'COMPLETION'),
(13, 'WORK'),
(14, 'DATETIME'),
(15, 'MODE'),
(16, 'OPEN'),
(17, 'INTEGER'),
(18, 'ESCAPE'),
(19, 'VALUE'),
(20, 'MASTER_SSL_VERIFY_SERVER_CERT'),
(21, 'SQL_BIG_RESULT'),
(22, 'DROP'),
(23, 'GEOMETRYCOLLECTIONFROMWKB'),
(24, 'EVENTS'),
(25, 'MONTH'),
(26, 'INFO'),
(27, 'PROFILES'),
(28, 'DUPLICATE'),
(29, 'REPLICATION'),
(30, 'UNLOCK'),
(31, 'INNODB'),
(32, 'YEAR_MONTH'),
(33, 'SUBJECT'),
(34, 'PREPARE'),
(35, 'LOCK'),
(36, 'NDB'),
(37, 'CHECK'),
(38, 'FULL'),
(39, 'INT4'),
(40, 'BY'),
(41, 'NO'),
(42, 'MINUTE'),
(43, 'PARTITION'),
(44, 'DATA'),
(45, 'DAY'),
(46, 'SHARE'),
(47, 'REAL'),
(48, 'SEPARATOR'),
(49, 'MASTER_HEARTBEAT_PERIOD'),
(50, 'DELETE'),
(51, 'ON'),
(52, 'CONNECTION'),
(53, 'CLOSE'),
(54, 'X509'),
(55, 'USE'),
(56, 'WHERE'),
(57, 'PRIVILEGES'),
(58, 'SPATIAL'),
(59, 'EVENT'),
(60, 'SUPER'),
(61, 'SQL_BUFFER_RESULT'),
(62, 'IGNORE'),
(63, 'QUICK'),
(64, 'SIGNED'),
(65, 'OFFLINE'),
(66, 'SECURITY'),
(67, 'AUTOEXTEND_SIZE'),
(68, 'NDBCLUSTER'),
(69, 'POLYGONFROMWKB'),
(70, 'FALSE'),
(71, 'LEVEL'),
(72, 'FORCE'),
(73, 'BINARY'),
(74, 'TO'),
(75, 'CHANGE'),
(76, 'CURRENT_USER'),
(77, 'HOUR_MINUTE'),
(78, 'UPDATE'),
(79, 'PRESERVE'),
(80, 'INTO'),
(81, 'FEDERATED'),
(82, 'VARYING'),
(83, 'MAX_SIZE'),
(84, 'HOUR_SECOND'),
(85, 'VARIABLE'),
(86, 'ROLLBACK'),
(87, 'RTREE'),
(88, 'PROCEDURE'),
(89, 'TIMESTAMP'),
(90, 'IMPORT'),
(91, 'AGAINST'),
(92, 'CHECKSUM'),
(93, 'COUNT'),
(94, 'LONGBINARY'),
(95, 'THEN'),
(96, 'INSERT'),
(97, 'ENGINES'),
(98, 'HANDLER'),
(99, 'PORT'),
(100, 'DAY_SECOND'),
(101, 'EXISTS'),
(102, 'MUTEX'),
(103, 'RELEASE'),
(104, 'BOOLEAN'),
(105, 'MOD'),
(106, 'DEFAULT'),
(107, 'TYPE'),
(108, 'NO_WRITE_TO_BINLOG'),
(109, 'OPTIMIZE'),
(110, 'RESET'),
(111, 'ITERATE'),
(112, 'INSTALL'),
(113, 'DO'),
(114, 'BIGINT'),
(115, 'SET'),
(116, 'ISSUER'),
(117, 'DATE'),
(118, 'STATUS'),
(119, 'FULLTEXT'),
(120, 'COMMENT'),
(121, 'MASTER_CONNECT_RETRY'),
(122, 'INNER'),
(123, 'STOP'),
(124, 'MASTER_LOG_FILE'),
(125, 'MRG_MYISAM'),
(126, 'PRECISION'),
(127, 'REQUIRE'),
(128, 'TRAILING'),
(129, 'PARTITIONS'),
(130, 'LONG'),
(131, 'OPTION'),
(132, 'REORGANIZE'),
(133, 'ELSE'),
(134, 'DEALLOCATE'),
(135, 'IO_THREAD'),
(136, 'CASE'),
(137, 'CIPHER'),
(138, 'CONTINUE'),
(139, 'FROM'),
(140, 'READ'),
(141, 'LEFT'),
(142, 'ELSEIF'),
(143, 'MINUTE_SECOND'),
(144, 'COMPACT'),
(145, 'RESTORE'),
(146, 'DEC'),
(147, 'FOR'),
(148, 'WARNINGS'),
(149, 'MIN_ROWS'),
(150, 'CONDITION'),
(151, 'STRING'),
(152, 'ENCLOSED'),
(153, 'FUNCTION'),
(154, 'AGGREGATE'),
(155, 'FIELDS'),
(156, 'INT3'),
(157, 'ARCHIVE'),
(158, 'AVG_ROW_LENGTH'),
(159, 'ADD'),
(160, 'KILL'),
(161, 'FLOAT4'),
(162, 'TABLESPACE'),
(163, 'VIEW'),
(164, 'REPEATABLE'),
(165, 'INFILE'),
(166, 'ORDER'),
(167, 'USING'),
(168, 'MIDDLEINT'),
(169, 'GRANT'),
(170, 'UNSIGNED'),
(171, 'DECIMAL'),
(172, 'GEOMETRYFROMTEXT'),
(173, 'INDEXES'),
(174, 'FOREIGN'),
(175, 'CACHE'),
(176, 'HOSTS'),
(177, 'COMMIT'),
(178, 'SCHEMAS'),
(179, 'LEADING'),
(180, 'SNAPSHOT'),
(181, 'DECLARE'),
(182, 'LOAD'),
(183, 'SQL_CACHE'),
(184, 'CONVERT'),
(185, 'DYNAMIC'),
(186, 'COLLATE'),
(187, 'POLYGONFROMTEXT'),
(188, 'BYTE'),
(189, 'GLOBAL'),
(190, 'LINESTRINGFROMWKB'),
(191, 'WHEN'),
(192, 'COLUMN_FORMAT'),
(193, 'HAVING'),
(194, 'AS'),
(195, 'STARTING'),
(196, 'RELOAD'),
(197, 'AUTOCOMMIT'),
(198, 'REVOKE'),
(199, 'GRANTS'),
(200, 'OUTER'),
(201, 'FLOOR'),
(202, 'EXPLAIN'),
(203, 'WITH'),
(204, 'AFTER'),
(205, 'STD'),
(206, 'CSV'),
(207, 'DISABLE'),
(208, 'UNINSTALL'),
(209, 'OUTFILE'),
(210, 'LOW_PRIORITY'),
(211, 'FILE'),
(212, 'NODEGROUP'),
(213, 'SCHEMA'),
(214, 'SONAME'),
(215, 'POW'),
(216, 'DUAL'),
(217, 'MULTIPOINTFROMWKB'),
(218, 'INDEX'),
(219, 'BACKUP'),
(220, 'MULTIPOINTFROMTEXT'),
(221, 'DEFINER'),
(222, 'MASTER_BIND'),
(223, 'REMOVE'),
(224, 'EXTENDED'),
(225, 'MULTILINESTRINGFROMWKB'),
(226, 'CROSS'),
(227, 'CONTRIBUTORS'),
(228, 'NATIONAL'),
(229, 'GROUP'),
(230, 'SHA'),
(231, 'ONLINE'),
(232, 'UNDO'),
(233, 'ZEROFILL'),
(234, 'CLIENT'),
(235, 'MASTER_PASSWORD'),
(236, 'OWNER'),
(237, 'RELAY_LOG_FILE'),
(238, 'TRUE'),
(239, 'CHARACTER'),
(240, 'MASTER_USER'),
(241, 'TABLE'),
(242, 'ENGINE'),
(243, 'INSERT_METHOD'),
(244, 'CASCADE'),
(245, 'RELAY_LOG_POS'),
(246, 'SQL_CALC_FOUND_ROWS'),
(247, 'UNION'),
(248, 'MYISAM'),
(249, 'LEAVE'),
(250, 'MODIFY'),
(251, 'MATCH'),
(252, 'MASTER_LOG_POS'),
(253, 'DISTINCTROW'),
(254, 'DESC'),
(255, 'TIME'),
(256, 'NUMERIC'),
(257, 'EXPANSION'),
(258, 'CURSOR'),
(259, 'CODE'),
(260, 'GEOMETRYCOLLECTIONFROMTEXT'),
(261, 'CHAIN'),
(262, 'LOGFILE'),
(263, 'FLUSH'),
(264, 'CREATE'),
(265, 'DESCRIBE'),
(266, 'EXTENT_SIZE'),
(267, 'MAX_UPDATES_PER_HOUR'),
(268, 'INT2'),
(269, 'PROCESSLIST'),
(270, 'ENDS'),
(271, 'LOGS'),
(272, 'DISCARD'),
(273, 'HEAP'),
(274, 'SOUNDS'),
(275, 'BETWEEN'),
(276, 'MULTILINESTRINGFROMTEXT'),
(277, 'REPAIR'),
(278, 'PACK_KEYS'),
(279, 'FAST'),
(280, 'VALUES'),
(281, 'CALL'),
(282, 'LOOP'),
(283, 'VARCHARACTER'),
(284, 'BEFORE'),
(285, 'TRUNCATE'),
(286, 'SHOW'),
(287, 'ALL'),
(288, 'REDUNDANT'),
(289, 'USER_RESOURCES'),
(290, 'PARTIAL'),
(291, 'BINLOG'),
(292, 'END'),
(293, 'SECOND'),
(294, 'AND'),
(295, 'FLOAT8'),
(296, 'PREV'),
(297, 'HOUR'),
(298, 'SELECT'),
(299, 'DATABASES'),
(300, 'OR'),
(301, 'IDENTIFIED'),
(302, 'WRAPPER'),
(303, 'MASTER_SSL_CIPHER'),
(304, 'SQL_SLAVE_SKIP_COUNTER'),
(305, 'BOTH'),
(306, 'BOOL'),
(307, 'YEAR'),
(308, 'MASTER_PORT'),
(309, 'CONCURRENT'),
(310, 'HELP'),
(311, 'UNIQUE'),
(312, 'TRIGGERS'),
(313, 'PROCESS'),
(314, 'OPTIONS'),
(315, 'CONSISTENT'),
(316, 'MASTER_SSL'),
(317, 'DATE_ADD'),
(318, 'MAX_CONNECTIONS_PER_HOUR'),
(319, 'LIKE'),
(320, 'PLUGIN'),
(321, 'FETCH'),
(322, 'IN'),
(323, 'COLUMN'),
(324, 'DUMPFILE'),
(325, 'USAGE'),
(326, 'EXECUTE'),
(327, 'MEMORY'),
(328, 'CEIL'),
(329, 'QUERY'),
(330, 'MASTER_HOST'),
(331, 'LINES'),
(332, 'SQL_THREAD'),
(333, 'SERVER'),
(334, 'MAX_QUERIES_PER_HOUR'),
(335, 'MASTER_SSL_CERT'),
(336, 'MULTIPOLYGONFROMWKB'),
(337, 'TRANSACTION'),
(338, 'DAY_MINUTE'),
(339, 'STDDEV'),
(340, 'DATE_SUB'),
(341, 'REBUILD'),
(342, 'GEOMETRYFROMWKB'),
(343, 'INT1'),
(344, 'RENAME'),
(345, 'PARSER'),
(346, 'RIGHT'),
(347, 'ALTER'),
(348, 'MAX_ROWS'),
(349, 'SOCKET'),
(350, 'STRAIGHT_JOIN'),
(351, 'NATURAL'),
(352, 'VARIABLES'),
(353, 'ESCAPED'),
(354, 'SHA1'),
(355, 'KEY_BLOCK_SIZE'),
(356, 'PASSWORD'),
(357, 'OFFSET'),
(358, 'CHAR'),
(359, 'NEXT'),
(360, 'SQL_LOG_BIN'),
(361, 'ERRORS'),
(362, 'TEMPORARY'),
(363, 'COMMITTED'),
(364, 'SQL_SMALL_RESULT'),
(365, 'UPGRADE'),
(366, 'BEGIN'),
(367, 'DELAY_KEY_WRITE'),
(368, 'PROFILE'),
(369, 'MEDIUM'),
(370, 'INTERVAL'),
(371, 'SSL'),
(372, 'DAY_HOUR'),
(373, 'NAME'),
(374, 'REFERENCES'),
(375, 'AES_ENCRYPT'),
(376, 'STORAGE'),
(377, 'ISOLATION'),
(378, 'CEILING'),
(379, 'EVERY'),
(380, 'INT8'),
(381, 'AUTHORS'),
(382, 'RESTRICT'),
(383, 'UNCOMMITTED'),
(384, 'LINESTRINGFROMTEXT'),
(385, 'IS'),
(386, 'NOT'),
(387, 'ANALYSE'),
(388, 'DATAFILE'),
(389, 'DES_KEY_FILE'),
(390, 'COMPRESSED'),
(391, 'START'),
(392, 'PLUGINS'),
(393, 'SAVEPOINT'),
(394, 'IF'),
(395, 'PRIMARY'),
(396, 'PURGE'),
(397, 'LAST'),
(398, 'USER'),
(399, 'INNOBASE'),
(400, 'EXIT'),
(401, 'KEYS'),
(402, 'LIMIT'),
(403, 'KEY'),
(404, 'MERGE'),
(405, 'UNTIL'),
(406, 'SQL_NO_CACHE'),
(407, 'DELAYED'),
(408, 'ANALYZE'),
(409, 'CONSTRAINT'),
(410, 'SERIAL'),
(411, 'ACTION'),
(412, 'WRITE'),
(413, 'INITIAL_SIZE'),
(414, 'SESSION'),
(415, 'DATABASE'),
(416, 'NULL'),
(417, 'POWER'),
(418, 'USE_FRM'),
(419, 'TERMINATED'),
(420, 'SLAVE'),
(421, 'NVARCHAR'),
(422, 'ASC'),
(423, 'RETURN'),
(424, 'OPTIONALLY'),
(425, 'ENABLE'),
(426, 'DIRECTORY'),
(427, 'WHILE'),
(428, 'MAX_USER_CONNECTIONS'),
(429, 'LOCAL'),
(430, 'DISTINCT'),
(431, 'AES_DECRYPT'),
(432, 'MASTER_SSL_KEY'),
(433, 'NONE'),
(434, 'TABLES'),
(435, '<>'),
(436, 'RLIKE'),
(437, 'TRIGGER'),
(438, 'COLLATION'),
(439, 'SHUTDOWN'),
(440, 'HIGH_PRIORITY'),
(441, 'BTREE'),
(442, 'FIRST'),
(443, 'COALESCE'),
(444, 'WAIT'),
(445, 'TYPES'),
(446, 'MASTER'),
(447, 'FIXED'),
(448, 'MULTIPOLYGONFROMTEXT'),
(449, 'ROW_FORMAT');

-- --------------------------------------------------------

--
-- Table structure for table `help_relation`
--

CREATE TABLE IF NOT EXISTS `help_relation` (
  `help_topic_id` int(10) unsigned NOT NULL,
  `help_keyword_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`help_keyword_id`,`help_topic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='keyword-topic relation';

--
-- Dumping data for table `help_relation`
--

INSERT INTO `help_relation` (`help_topic_id`, `help_keyword_id`) VALUES
(1, 0),
(348, 0),
(463, 1),
(225, 2),
(439, 3),
(3, 4),
(414, 4),
(86, 5),
(86, 6),
(399, 6),
(94, 7),
(86, 8),
(182, 9),
(422, 10),
(21, 11),
(339, 11),
(414, 11),
(86, 12),
(399, 12),
(142, 13),
(223, 14),
(85, 15),
(348, 15),
(16, 16),
(103, 16),
(129, 16),
(339, 16),
(94, 17),
(489, 17),
(373, 18),
(3, 19),
(101, 19),
(235, 19),
(182, 20),
(348, 21),
(9, 22),
(30, 22),
(34, 22),
(84, 22),
(183, 22),
(229, 22),
(256, 22),
(269, 22),
(293, 22),
(324, 22),
(398, 22),
(408, 22),
(409, 22),
(453, 22),
(468, 22),
(105, 23),
(119, 24),
(369, 25),
(252, 26),
(79, 27),
(101, 28),
(195, 29),
(36, 30),
(339, 31),
(393, 31),
(458, 31),
(369, 32),
(195, 33),
(35, 34),
(229, 34),
(36, 35),
(348, 35),
(458, 36),
(410, 37),
(453, 37),
(458, 37),
(21, 38),
(287, 38),
(339, 38),
(443, 38),
(458, 38),
(489, 39),
(48, 40),
(74, 40),
(80, 40),
(195, 40),
(348, 40),
(355, 40),
(414, 40),
(453, 40),
(458, 40),
(458, 41),
(462, 41),
(369, 42),
(453, 43),
(458, 43),
(114, 44),
(207, 44),
(414, 44),
(458, 44),
(463, 44),
(369, 45),
(348, 46),
(94, 47),
(307, 47),
(355, 48),
(182, 49),
(48, 50),
(458, 50),
(462, 50),
(1, 51),
(86, 51),
(399, 51),
(462, 51),
(171, 52),
(458, 52),
(51, 53),
(103, 53),
(195, 54),
(1, 55),
(55, 55),
(189, 55),
(48, 56),
(80, 56),
(103, 56),
(188, 57),
(195, 57),
(241, 57),
(205, 58),
(453, 58),
(86, 59),
(293, 59),
(350, 59),
(399, 59),
(195, 60),
(348, 61),
(1, 62),
(80, 62),
(101, 62),
(348, 62),
(414, 62),
(453, 62),
(48, 63),
(410, 63),
(456, 63),
(223, 64),
(84, 65),
(205, 65),
(453, 65),
(195, 66),
(189, 67),
(458, 68),
(88, 69),
(472, 69),
(378, 70),
(439, 71),
(1, 72),
(39, 73),
(223, 73),
(262, 73),
(182, 74),
(262, 74),
(451, 74),
(182, 75),
(453, 75),
(86, 76),
(399, 76),
(369, 77),
(80, 78),
(101, 78),
(348, 78),
(462, 78),
(86, 79),
(399, 79),
(3, 80),
(101, 80),
(297, 80),
(348, 80),
(458, 81),
(249, 82),
(189, 83),
(369, 84),
(126, 85),
(142, 86),
(451, 86),
(205, 87),
(18, 88),
(181, 88),
(295, 88),
(321, 88),
(339, 88),
(348, 88),
(409, 88),
(431, 88),
(477, 88),
(96, 89),
(185, 89),
(414, 90),
(453, 90),
(85, 91),
(394, 92),
(458, 92),
(66, 93),
(322, 93),
(425, 93),
(278, 94),
(28, 95),
(57, 95),
(82, 95),
(101, 96),
(190, 96),
(294, 96),
(476, 96),
(275, 97),
(339, 97),
(103, 98),
(306, 98),
(463, 99),
(369, 100),
(9, 101),
(30, 101),
(86, 101),
(151, 101),
(183, 101),
(269, 101),
(293, 101),
(339, 102),
(359, 102),
(142, 103),
(451, 103),
(24, 104),
(85, 104),
(109, 105),
(170, 105),
(3, 106),
(101, 106),
(151, 106),
(194, 106),
(207, 106),
(235, 106),
(453, 106),
(458, 106),
(453, 107),
(111, 108),
(320, 108),
(456, 108),
(460, 108),
(111, 109),
(453, 109),
(38, 110),
(115, 110),
(147, 110),
(257, 110),
(121, 111),
(412, 112),
(86, 113),
(122, 113),
(399, 113),
(485, 113),
(216, 114),
(3, 115),
(80, 115),
(101, 115),
(126, 115),
(135, 115),
(142, 115),
(151, 115),
(178, 115),
(207, 115),
(326, 115),
(339, 115),
(414, 115),
(453, 115),
(458, 115),
(462, 115),
(467, 115),
(483, 115),
(195, 116),
(128, 117),
(223, 117),
(255, 117),
(369, 117),
(58, 118),
(132, 118),
(210, 118),
(218, 118),
(321, 118),
(339, 118),
(359, 118),
(393, 118),
(205, 119),
(453, 119),
(458, 119),
(86, 120),
(189, 120),
(399, 120),
(458, 120),
(182, 121),
(1, 122),
(52, 123),
(182, 124),
(458, 125),
(307, 126),
(195, 127),
(447, 128),
(247, 129),
(278, 130),
(195, 131),
(241, 131),
(453, 132),
(57, 133),
(82, 133),
(229, 134),
(52, 135),
(317, 135),
(57, 136),
(82, 136),
(195, 137),
(306, 138),
(48, 139),
(114, 139),
(119, 139),
(339, 139),
(348, 139),
(353, 139),
(447, 139),
(36, 140),
(103, 140),
(439, 140),
(1, 141),
(28, 142),
(369, 143),
(458, 144),
(175, 145),
(204, 146),
(176, 147),
(306, 147),
(339, 147),
(348, 147),
(413, 147),
(322, 148),
(339, 148),
(458, 149),
(176, 150),
(94, 151),
(414, 152),
(18, 153),
(34, 153),
(94, 153),
(206, 153),
(295, 153),
(321, 153),
(339, 153),
(398, 153),
(409, 153),
(431, 153),
(477, 153),
(94, 154),
(339, 155),
(414, 155),
(244, 156),
(458, 157),
(453, 158),
(458, 158),
(60, 159),
(189, 159),
(453, 159),
(468, 159),
(171, 160),
(164, 161),
(189, 162),
(408, 162),
(453, 162),
(468, 162),
(30, 163),
(155, 163),
(446, 163),
(439, 164),
(414, 165),
(48, 166),
(80, 166),
(348, 166),
(355, 166),
(453, 166),
(1, 167),
(48, 167),
(83, 167),
(244, 168),
(195, 169),
(241, 169),
(24, 170),
(125, 170),
(164, 170),
(204, 170),
(223, 170),
(307, 170),
(489, 170),
(94, 171),
(152, 171),
(223, 171),
(404, 172),
(339, 173),
(453, 174),
(458, 174),
(462, 174),
(463, 174),
(98, 175),
(147, 175),
(297, 175),
(141, 176),
(339, 176),
(142, 177),
(156, 178),
(339, 178),
(447, 179),
(142, 180),
(176, 181),
(194, 181),
(306, 181),
(413, 181),
(114, 182),
(297, 182),
(353, 182),
(414, 182),
(348, 183),
(223, 184),
(370, 184),
(458, 185),
(151, 186),
(207, 186),
(458, 186),
(387, 187),
(455, 188),
(126, 189),
(132, 189),
(178, 189),
(341, 189),
(439, 189),
(444, 190),
(57, 191),
(82, 191),
(458, 192),
(348, 193),
(1, 194),
(36, 194),
(348, 194),
(414, 195),
(195, 196),
(142, 197),
(241, 198),
(187, 199),
(339, 199),
(1, 200),
(216, 201),
(247, 202),
(85, 203),
(195, 203),
(205, 203),
(453, 203),
(458, 203),
(453, 204),
(253, 205),
(414, 206),
(458, 206),
(86, 207),
(399, 207),
(453, 207),
(284, 208),
(348, 209),
(3, 210),
(36, 210),
(48, 210),
(80, 210),
(101, 210),
(414, 210),
(195, 211),
(189, 212),
(151, 213),
(183, 213),
(207, 213),
(302, 213),
(339, 213),
(94, 214),
(270, 215),
(272, 216),
(454, 217),
(1, 218),
(60, 218),
(84, 218),
(98, 218),
(205, 218),
(297, 218),
(301, 218),
(339, 218),
(453, 218),
(458, 218),
(351, 219),
(417, 220),
(86, 221),
(399, 221),
(182, 222),
(453, 223),
(247, 224),
(456, 224),
(265, 225),
(1, 226),
(7, 227),
(339, 227),
(249, 228),
(422, 228),
(189, 229),
(348, 229),
(419, 230),
(84, 231),
(205, 231),
(453, 231),
(306, 232),
(24, 233),
(125, 233),
(164, 233),
(204, 233),
(307, 233),
(489, 233),
(195, 234),
(182, 235),
(463, 236),
(182, 237),
(378, 238),
(151, 239),
(207, 239),
(249, 239),
(326, 239),
(339, 239),
(414, 239),
(422, 239),
(458, 239),
(182, 240),
(60, 241),
(106, 241),
(111, 241),
(175, 241),
(210, 241),
(269, 241),
(271, 241),
(314, 241),
(339, 241),
(351, 241),
(353, 241),
(394, 241),
(410, 241),
(453, 241),
(456, 241),
(458, 241),
(460, 241),
(189, 242),
(339, 242),
(359, 242),
(408, 242),
(453, 242),
(458, 242),
(468, 242),
(458, 243),
(30, 244),
(269, 244),
(458, 244),
(462, 244),
(182, 245),
(348, 246),
(298, 247),
(458, 248),
(303, 249),
(453, 250),
(85, 251),
(182, 252),
(348, 253),
(323, 254),
(348, 254),
(355, 254),
(223, 255),
(308, 255),
(368, 255),
(204, 256),
(85, 257),
(413, 258),
(477, 259),
(238, 260),
(142, 261),
(189, 262),
(147, 263),
(320, 263),
(18, 264),
(22, 264),
(60, 264),
(74, 264),
(86, 264),
(94, 264),
(151, 264),
(189, 264),
(205, 264),
(206, 264),
(271, 264),
(295, 264),
(302, 264),
(339, 264),
(350, 264),
(446, 264),
(458, 264),
(463, 264),
(323, 265),
(189, 266),
(195, 267),
(226, 268),
(339, 269),
(443, 269),
(86, 270),
(39, 271),
(262, 271),
(339, 271),
(453, 272),
(458, 273),
(371, 274),
(143, 275),
(104, 276),
(453, 277),
(456, 277),
(458, 278),
(410, 279),
(3, 280),
(101, 280),
(331, 281),
(336, 282),
(249, 283),
(262, 284),
(314, 285),
(7, 286),
(10, 286),
(18, 286),
(21, 286),
(25, 286),
(33, 286),
(39, 286),
(58, 286),
(66, 286),
(79, 286),
(119, 286),
(129, 286),
(132, 286),
(141, 286),
(156, 286),
(187, 286),
(188, 286),
(210, 286),
(218, 286),
(271, 286),
(275, 286),
(287, 286),
(301, 286),
(302, 286),
(321, 286),
(322, 286),
(326, 286),
(339, 286),
(341, 286),
(350, 286),
(359, 286),
(393, 286),
(443, 286),
(477, 286),
(481, 286),
(195, 287),
(241, 287),
(298, 287),
(348, 287),
(458, 288),
(320, 289),
(458, 290),
(119, 291),
(342, 291),
(28, 292),
(57, 292),
(82, 292),
(225, 292),
(319, 292),
(336, 292),
(485, 292),
(369, 293),
(143, 294),
(309, 294),
(307, 295),
(103, 296),
(369, 297),
(3, 298),
(101, 298),
(247, 298),
(252, 298),
(294, 298),
(348, 298),
(156, 299),
(339, 299),
(137, 300),
(74, 301),
(195, 301),
(463, 302),
(182, 303),
(178, 304),
(447, 305),
(24, 306),
(107, 306),
(369, 307),
(182, 308),
(414, 309),
(116, 310),
(383, 310),
(453, 311),
(25, 312),
(339, 312),
(195, 313),
(367, 314),
(463, 314),
(142, 315),
(182, 316),
(369, 317),
(195, 318),
(339, 319),
(371, 319),
(284, 320),
(339, 320),
(412, 320),
(376, 321),
(85, 322),
(119, 322),
(348, 322),
(453, 323),
(348, 324),
(195, 325),
(83, 326),
(195, 326),
(348, 327),
(389, 328),
(85, 329),
(147, 329),
(171, 329),
(182, 330),
(414, 331),
(52, 332),
(317, 332),
(9, 333),
(367, 333),
(463, 333),
(195, 334),
(182, 335),
(120, 336),
(142, 337),
(439, 337),
(369, 338),
(400, 339),
(369, 340),
(453, 341),
(140, 342),
(24, 343),
(106, 344),
(217, 344),
(399, 344),
(453, 344),
(205, 345),
(453, 345),
(458, 345),
(1, 346),
(60, 347),
(155, 347),
(195, 347),
(207, 347),
(367, 347),
(399, 347),
(431, 347),
(453, 347),
(468, 347),
(458, 348),
(463, 349),
(1, 350),
(348, 350),
(1, 351),
(339, 352),
(341, 352),
(414, 353),
(419, 354),
(458, 355),
(74, 356),
(195, 356),
(463, 356),
(467, 356),
(348, 357),
(223, 358),
(455, 358),
(103, 359),
(483, 360),
(66, 361),
(339, 361),
(269, 362),
(439, 363),
(348, 364),
(207, 365),
(410, 365),
(142, 366),
(319, 366),
(458, 367),
(79, 368),
(410, 369),
(86, 370),
(369, 370),
(195, 371),
(369, 372),
(207, 373),
(195, 374),
(458, 374),
(462, 374),
(435, 375),
(275, 376),
(439, 377),
(440, 378),
(86, 379),
(125, 380),
(10, 381),
(339, 381),
(30, 382),
(269, 382),
(462, 382),
(439, 383),
(56, 384),
(81, 385),
(201, 385),
(362, 385),
(448, 385),
(81, 386),
(86, 386),
(151, 386),
(201, 386),
(305, 386),
(181, 387),
(189, 388),
(468, 388),
(320, 389),
(458, 390),
(142, 391),
(317, 391),
(33, 392),
(451, 393),
(9, 394),
(28, 394),
(30, 394),
(86, 394),
(151, 394),
(183, 394),
(269, 394),
(293, 394),
(470, 394),
(453, 395),
(262, 396),
(103, 397),
(74, 398),
(217, 398),
(324, 398),
(463, 398),
(458, 399),
(306, 400),
(301, 401),
(339, 401),
(453, 401),
(48, 402),
(80, 402),
(103, 402),
(119, 402),
(348, 402),
(60, 403),
(101, 403),
(453, 403),
(458, 403),
(462, 403),
(458, 404),
(225, 405),
(348, 406),
(3, 407),
(101, 407),
(476, 407),
(453, 408),
(460, 408),
(453, 409),
(458, 409),
(235, 410),
(458, 410),
(458, 411),
(462, 411),
(36, 412),
(189, 413),
(468, 413),
(126, 414),
(132, 414),
(341, 414),
(439, 414),
(151, 415),
(183, 415),
(207, 415),
(302, 415),
(339, 415),
(463, 415),
(81, 416),
(362, 416),
(462, 416),
(473, 417),
(456, 418),
(414, 419),
(38, 420),
(52, 420),
(86, 420),
(141, 420),
(218, 420),
(317, 420),
(399, 420),
(249, 421),
(348, 422),
(355, 422),
(480, 423),
(414, 424),
(86, 425),
(399, 425),
(453, 425),
(207, 426),
(458, 426),
(485, 427),
(195, 428),
(36, 429),
(111, 429),
(320, 429),
(414, 429),
(456, 429),
(460, 429),
(0, 430),
(93, 430),
(281, 430),
(298, 430),
(348, 430),
(355, 430),
(377, 430),
(425, 430),
(486, 431),
(182, 432),
(195, 433),
(36, 434),
(129, 434),
(287, 434),
(339, 434),
(484, 435),
(27, 436),
(22, 437),
(256, 437),
(339, 437),
(339, 438),
(481, 438),
(195, 439),
(101, 440),
(348, 440),
(205, 441),
(103, 442),
(453, 442),
(458, 442),
(453, 443),
(189, 444),
(468, 444),
(339, 445),
(39, 446),
(58, 446),
(114, 446),
(182, 446),
(257, 446),
(262, 446),
(353, 446),
(204, 447),
(458, 447),
(196, 448),
(458, 449);

-- --------------------------------------------------------

--
-- Table structure for table `help_topic`
--

CREATE TABLE IF NOT EXISTS `help_topic` (
  `help_topic_id` int(10) unsigned NOT NULL,
  `name` char(64) NOT NULL,
  `help_category_id` smallint(5) unsigned NOT NULL,
  `description` text NOT NULL,
  `example` text NOT NULL,
  `url` char(128) NOT NULL,
  PRIMARY KEY (`help_topic_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='help topics';

--
-- Dumping data for table `help_topic`
--

INSERT INTO `help_topic` (`help_topic_id`, `name`, `help_category_id`, `description`, `example`, `url`) VALUES
(0, 'MIN', 16, 'Syntax:\nMIN([DISTINCT] expr)\n\nReturns the minimum value of expr. MIN() may take a string argument; in\nsuch cases, it returns the minimum string value. See\nhttp://dev.mysql.com/doc/refman/5.1/en/mysql-indexes.html. The DISTINCT\nkeyword can be used to find the minimum of the distinct values of expr,\nhowever, this produces the same result as omitting DISTINCT.\n\nMIN() returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', 'mysql> SELECT student_name, MIN(test_score), MAX(test_score)\n    ->        FROM student\n    ->        GROUP BY student_name;\n', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(1, 'JOIN', 27, 'MySQL supports the following JOIN syntaxes for the table_references\npart of SELECT statements and multiple-table DELETE and UPDATE\nstatements:\n\ntable_references:\n    table_reference [, table_reference] ...\n\ntable_reference:\n    table_factor\n  | join_table\n\ntable_factor:\n    tbl_name [[AS] alias] [index_hint_list]\n  | table_subquery [AS] alias\n  | ( table_references )\n  | { OJ table_reference LEFT OUTER JOIN table_reference\n        ON conditional_expr }\n\njoin_table:\n    table_reference [INNER | CROSS] JOIN table_factor [join_condition]\n  | table_reference STRAIGHT_JOIN table_factor\n  | table_reference STRAIGHT_JOIN table_factor ON conditional_expr\n  | table_reference {LEFT|RIGHT} [OUTER] JOIN table_reference join_condition\n  | table_reference NATURAL [{LEFT|RIGHT} [OUTER]] JOIN table_factor\n\njoin_condition:\n    ON conditional_expr\n  | USING (column_list)\n\nindex_hint_list:\n    index_hint [, index_hint] ...\n\nindex_hint:\n    USE {INDEX|KEY}\n      [{FOR {JOIN|ORDER BY|GROUP BY}] ([index_list])\n  | IGNORE {INDEX|KEY}\n      [{FOR {JOIN|ORDER BY|GROUP BY}] (index_list)\n  | FORCE {INDEX|KEY}\n      [{FOR {JOIN|ORDER BY|GROUP BY}] (index_list)\n\nindex_list:\n    index_name [, index_name] ...\n\nA table reference is also known as a join expression.\n\nThe syntax of table_factor is extended in comparison with the SQL\nStandard. The latter accepts only table_reference, not a list of them\ninside a pair of parentheses.\n\nThis is a conservative extension if we consider each comma in a list of\ntable_reference items as equivalent to an inner join. For example:\n\nSELECT * FROM t1 LEFT JOIN (t2, t3, t4)\n                 ON (t2.a=t1.a AND t3.b=t1.b AND t4.c=t1.c)\n\nis equivalent to:\n\nSELECT * FROM t1 LEFT JOIN (t2 CROSS JOIN t3 CROSS JOIN t4)\n                 ON (t2.a=t1.a AND t3.b=t1.b AND t4.c=t1.c)\n\nIn MySQL, CROSS JOIN is a syntactic equivalent to INNER JOIN (they can\nreplace each other). In standard SQL, they are not equivalent. INNER\nJOIN is used with an ON clause, CROSS JOIN is used otherwise.\n\nIn general, parentheses can be ignored in join expressions containing\nonly inner join operations. MySQL also supports nested joins (see\nhttp://dev.mysql.com/doc/refman/5.1/en/nested-joins.html).\n\nIndex hints can be specified to affect how the MySQL optimizer makes\nuse of indexes. For more information, see\nhttp://dev.mysql.com/doc/refman/5.1/en/index-hints.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/join.html\n\n', 'SELECT left_tbl.*\n  FROM left_tbl LEFT JOIN right_tbl ON left_tbl.id = right_tbl.id\n  WHERE right_tbl.id IS NULL;\n', 'http://dev.mysql.com/doc/refman/5.1/en/join.html'),
(2, 'HEX', 36, 'Syntax:\nHEX(N_or_S)\n\nIf N_or_S is a number, returns a string representation of the\nhexadecimal value of N, where N is a longlong (BIGINT) number. This is\nequivalent to CONV(N,10,16).\n\nIf N_or_S is a string, returns a hexadecimal string representation of\nN_or_S where each character in N_or_S is converted to two hexadecimal\ndigits. The inverse of this operation is performed by the UNHEX()\nfunction.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT HEX(255);\n        -> ''FF''\nmysql> SELECT 0x616263;\n        -> ''abc''\nmysql> SELECT HEX(''abc'');\n        -> 616263\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(3, 'REPLACE', 27, 'Syntax:\nREPLACE [LOW_PRIORITY | DELAYED]\n    [INTO] tbl_name [(col_name,...)]\n    {VALUES | VALUE} ({expr | DEFAULT},...),(...),...\n\nOr:\n\nREPLACE [LOW_PRIORITY | DELAYED]\n    [INTO] tbl_name\n    SET col_name={expr | DEFAULT}, ...\n\nOr:\n\nREPLACE [LOW_PRIORITY | DELAYED]\n    [INTO] tbl_name [(col_name,...)]\n    SELECT ...\n\nREPLACE works exactly like INSERT, except that if an old row in the\ntable has the same value as a new row for a PRIMARY KEY or a UNIQUE\nindex, the old row is deleted before the new row is inserted. See [HELP\nINSERT].\n\nREPLACE is a MySQL extension to the SQL standard. It either inserts, or\ndeletes and inserts. For another MySQL extension to standard SQL ---\nthat either inserts or updates --- see\nhttp://dev.mysql.com/doc/refman/5.1/en/insert-on-duplicate.html.\n\nNote that unless the table has a PRIMARY KEY or UNIQUE index, using a\nREPLACE statement makes no sense. It becomes equivalent to INSERT,\nbecause there is no index to be used to determine whether a new row\nduplicates another.\n\nValues for all columns are taken from the values specified in the\nREPLACE statement. Any missing columns are set to their default values,\njust as happens for INSERT. You cannot refer to values from the current\nrow and use them in the new row. If you use an assignment such as SET\ncol_name = col_name + 1, the reference to the column name on the right\nhand side is treated as DEFAULT(col_name), so the assignment is\nequivalent to SET col_name = DEFAULT(col_name) + 1.\n\nTo use REPLACE, you must have both the INSERT and DELETE privileges for\nthe table.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/replace.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/replace.html'),
(4, 'CONTAINS', 30, 'Contains(g1,g2)\n\nReturns 1 or 0 to indicate whether g1 completely contains g2. This\ntests the opposite relationship as Within().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html'),
(5, 'SRID', 35, 'SRID(g)\n\nReturns an integer indicating the Spatial Reference System ID for the\ngeometry value g.\n\nIn MySQL, the SRID value is just an integer associated with the\ngeometry value. All calculations are done assuming Euclidean (planar)\ngeometry.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions\n\n', 'mysql> SELECT SRID(GeomFromText(''LineString(1 1,2 2)'',101));\n+-----------------------------------------------+\n| SRID(GeomFromText(''LineString(1 1,2 2)'',101)) |\n+-----------------------------------------------+\n|                                           101 |\n+-----------------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions'),
(6, 'CURRENT_TIMESTAMP', 31, 'Syntax:\nCURRENT_TIMESTAMP, CURRENT_TIMESTAMP()\n\nCURRENT_TIMESTAMP and CURRENT_TIMESTAMP() are synonyms for NOW().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(7, 'SHOW CONTRIBUTORS', 27, 'Syntax:\nSHOW CONTRIBUTORS\n\nThe SHOW CONTRIBUTORS statement displays information about the people\nwho contribute to MySQL source or to causes that MySQL AB supports. For\neach contributor, it displays Name, Location, and Comment values.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-contributors.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-contributors.html'),
(8, 'VARIANCE', 16, 'Syntax:\nVARIANCE(expr)\n\nReturns the population standard variance of expr. This is an extension\nto standard SQL. The standard SQL function VAR_POP() can be used\ninstead.\n\nVARIANCE() returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(9, 'DROP SERVER', 38, 'Syntax:\nDROP SERVER [ IF EXISTS ] server_name\n\nDrops the server definition for the server named server_name. The\ncorresponding row within the mysql.servers table will be deleted. This\nstatement requires the SUPER privilege.\n\nDropping a server for a table does not affect any FEDERATED tables that\nused this connection information when they were created. See [HELP\nCREATE SERVER].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-server.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-server.html'),
(10, 'SHOW AUTHORS', 27, 'Syntax:\nSHOW AUTHORS\n\nThe SHOW AUTHORS statement displays information about the people who\nwork on MySQL. For each author, it displays Name, Location, and Comment\nvalues.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-authors.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-authors.html'),
(11, 'VAR_SAMP', 16, 'Syntax:\nVAR_SAMP(expr)\n\nReturns the sample variance of expr. That is, the denominator is the\nnumber of rows minus one.\n\nVAR_SAMP() returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(12, 'CONCAT', 36, 'Syntax:\nCONCAT(str1,str2,...)\n\nReturns the string that results from concatenating the arguments. May\nhave one or more arguments. If all arguments are non-binary strings,\nthe result is a non-binary string. If the arguments include any binary\nstrings, the result is a binary string. A numeric argument is converted\nto its equivalent binary string form; if you want to avoid that, you\ncan use an explicit type cast, as in this example:\n\nSELECT CONCAT(CAST(int_col AS CHAR), char_col);\n\nCONCAT() returns NULL if any argument is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT CONCAT(''My'', ''S'', ''QL'');\n        -> ''MySQL''\nmysql> SELECT CONCAT(''My'', NULL, ''QL'');\n        -> NULL\nmysql> SELECT CONCAT(14.3);\n        -> ''14.3''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(13, 'GEOMETRY HIERARCHY', 33, 'Geometry is the base class. It is an abstract class. The instantiable\nsubclasses of Geometry are restricted to zero-, one-, and\ntwo-dimensional geometric objects that exist in two-dimensional\ncoordinate space. All instantiable geometry classes are defined so that\nvalid instances of a geometry class are topologically closed (that is,\nall defined geometries include their boundary).\n\nThe base Geometry class has subclasses for Point, Curve, Surface, and\nGeometryCollection:\n\no Point represents zero-dimensional objects.\n\no Curve represents one-dimensional objects, and has subclass\n  LineString, with sub-subclasses Line and LinearRing.\n\no Surface is designed for two-dimensional objects and has subclass\n  Polygon.\n\no GeometryCollection has specialized zero-, one-, and two-dimensional\n  collection classes named MultiPoint, MultiLineString, and\n  MultiPolygon for modeling geometries corresponding to collections of\n  Points, LineStrings, and Polygons, respectively. MultiCurve and\n  MultiSurface are introduced as abstract superclasses that generalize\n  the collection interfaces to handle Curves and Surfaces.\n\nGeometry, Curve, Surface, MultiCurve, and MultiSurface are defined as\nnon-instantiable classes. They define a common set of methods for their\nsubclasses and are included for extensibility.\n\nPoint, LineString, Polygon, GeometryCollection, MultiPoint,\nMultiLineString, and MultiPolygon are instantiable classes.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/gis-geometry-class-hierarchy.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/gis-geometry-class-hierarchy.html'),
(14, 'CHAR FUNCTION', 36, 'Syntax:\nCHAR(N,... [USING charset_name])\n\nCHAR() interprets each argument N as an integer and returns a string\nconsisting of the characters given by the code values of those\nintegers. NULL values are skipped.\nBy default, CHAR() returns a binary string. To produce a string in a\ngiven character set, use the optional USING clause:\n\nmysql> SELECT CHARSET(CHAR(0x65)), CHARSET(CHAR(0x65 USING utf8));\n+---------------------+--------------------------------+\n| CHARSET(CHAR(0x65)) | CHARSET(CHAR(0x65 USING utf8)) |\n+---------------------+--------------------------------+\n| binary              | utf8                           |\n+---------------------+--------------------------------+\n\nIf USING is given and the result string is illegal for the given\ncharacter set, a warning is issued. Also, if strict SQL mode is\nenabled, the result from CHAR() becomes NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT CHAR(77,121,83,81,''76'');\n        -> ''MySQL''\nmysql> SELECT CHAR(77,77.3,''77.3'');\n        -> ''MMM''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(15, 'DATETIME', 21, 'DATETIME\n\nA date and time combination. The supported range is ''1000-01-01\n00:00:00'' to ''9999-12-31 23:59:59''. MySQL displays DATETIME values in\n''YYYY-MM-DD HH:MM:SS'' format, but allows assignment of values to\nDATETIME columns using either strings or numbers.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html'),
(16, 'OPEN', 23, 'Syntax:\nOPEN cursor_name\n\nThis statement opens a previously declared cursor.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/open.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/open.html'),
(17, 'SHOW CREATE TRIGGER', 27, 'Syntax:\nSHOW CREATE TRIGGER trigger_name\n\nThis statement shows a CREATE TRIGGER statement that creates the given\ntrigger.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-create-trigger.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-create-trigger.html'),
(18, 'SHOW CREATE PROCEDURE', 27, 'Syntax:\nSHOW CREATE {PROCEDURE | FUNCTION} sp_name\n\nThese statements are MySQL extensions. Similar to SHOW CREATE TABLE,\nthey return the exact string that can be used to re-create the named\nroutine. The statements require that you be the owner of the routine or\nhave SELECT access to the mysql.proc table. If you do not have\nprivileges for the routine itself, the value displayed for the Create\nProcedure or Create Function field will be NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-create-procedure.html\n\n', 'mysql> SHOW CREATE FUNCTION test.hello\\G\n*************************** 1. row ***************************\n            Function: hello\n            sql_mode:\n     Create Function: CREATE FUNCTION `test`.`hello`(s CHAR(20)) »\n                      RETURNS CHAR(50)\n                      RETURN CONCAT(''Hello, '',s,''!'')\ncharacter_set_client: latin1\ncollation_connection: latin1_swedish_ci\n  Database Collation: latin1_swedish_ci\n', 'http://dev.mysql.com/doc/refman/5.1/en/show-create-procedure.html'),
(19, 'INTEGER', 21, 'INTEGER[(M)] [UNSIGNED] [ZEROFILL]\n\nThis type is a synonym for INT.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(20, 'LOWER', 36, 'Syntax:\nLOWER(str)\n\nReturns the string str with all characters changed to lowercase\naccording to the current character set mapping. The default is latin1\n(cp1252 West European).\n\nmysql> SELECT LOWER(''QUADRATICALLY'');\n        -> ''quadratically''\n\nLOWER() (and UPPER()) are ineffective when applied to binary strings\n(BINARY, VARBINARY, BLOB). To perform lettercase conversion, convert\nthe string to a non-binary string:\n\nmysql> SET @str = BINARY ''New York'';\nmysql> SELECT LOWER(@str), LOWER(CONVERT(@str USING latin1));\n+-------------+-----------------------------------+\n| LOWER(@str) | LOWER(CONVERT(@str USING latin1)) |\n+-------------+-----------------------------------+\n| New York    | new york                          | \n+-------------+-----------------------------------+\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(21, 'SHOW COLUMNS', 27, 'Syntax:\nSHOW [FULL] COLUMNS FROM tbl_name [FROM db_name]\n    [LIKE ''pattern'' | WHERE expr]\n\nSHOW COLUMNS displays information about the columns in a given table.\nIt also works for views. The LIKE clause, if present, indicates which\ncolumn names to match. The WHERE clause can be given to select rows\nusing more general conditions, as discussed in\nhttp://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\n\nmysql> SHOW COLUMNS FROM City;\n+------------+----------+------+-----+---------+----------------+\n| Field      | Type     | Null | Key | Default | Extra          |\n+------------+----------+------+-----+---------+----------------+\n| Id         | int(11)  | NO   | PRI | NULL    | auto_increment |\n| Name       | char(35) | NO   |     |         |                |\n| Country    | char(3)  | NO   | UNI |         |                |\n| District   | char(20) | YES  | MUL |         |                |\n| Population | int(11)  | NO   |     | 0       |                |\n+------------+----------+------+-----+---------+----------------+\n5 rows in set (0.00 sec)\n\nIf the data types differ from what you expect them to be based on a\nCREATE TABLE statement, note that MySQL sometimes changes data types\nwhen you create or alter a table. The conditions under which this\noccurs are described in\nhttp://dev.mysql.com/doc/refman/5.1/en/silent-column-changes.html.\n\nThe FULL keyword causes the output to include the column collation and\ncomments, as well as the privileges you have for each column.\n\nYou can use db_name.tbl_name as an alternative to the tbl_name FROM\ndb_name syntax. In other words, these two statements are equivalent:\n\nmysql> SHOW COLUMNS FROM mytable FROM mydb;\nmysql> SHOW COLUMNS FROM mydb.mytable;\n\nSHOW COLUMNS displays the following values for each table column:\n\nField indicates the column name.\n\nType indicates the column data type.\n\nCollation indicates the collation for non-binary string columns, or\nNULL for other columns. This value is displayed only if you use the\nFULL keyword.\n\nThe Null field contains YES if NULL values can be stored in the column,\nNO if not.\n\nThe Key field indicates whether the column is indexed:\n\no If Key is empty, the column either is not indexed or is indexed only\n  as a secondary column in a multiple-column, non-unique index.\n\no If Key is PRI, the column is a PRIMARY KEY or is one of the columns\n  in a multiple-column PRIMARY KEY.\n\no If Key is UNI, the column is the first column of a unique-valued\n  index that cannot contain NULL values.\n\no If Key is MUL, multiple occurrences of a given value are allowed\n  within the column. The column is the first column of a non-unique\n  index or a unique-valued index that can contain NULL values.\n\nIf more than one of the Key values applies to a given column of a\ntable, Key displays the one with the highest priority, in the order\nPRI, UNI, MUL.\n\nA UNIQUE index may be displayed as PRI if it cannot contain NULL values\nand there is no PRIMARY KEY in the table. A UNIQUE index may display as\nMUL if several columns form a composite UNIQUE index; although the\ncombination of the columns is unique, each column can still hold\nmultiple occurrences of a given value.\n\nThe Default field indicates the default value that is assigned to the\ncolumn.\n\nThe Extra field contains any additional information that is available\nabout a given column. The value is auto_increment if the column was\ncreated with the AUTO_INCREMENT keyword and empty otherwise.\n\nPrivileges indicates the privileges you have for the column. This value\nis displayed only if you use the FULL keyword.\n\nComment indicates any comment the column has. This value is displayed\nonly if you use the FULL keyword.\n\nSHOW FIELDS is a synonym for SHOW COLUMNS. You can also list a table''s\ncolumns with the mysqlshow db_name tbl_name command.\n\nThe DESCRIBE statement provides information similar to SHOW COLUMNS.\nSee [HELP DESCRIBE].\n\nThe SHOW CREATE TABLE, SHOW TABLE STATUS, and SHOW INDEX statements\nalso provide information about tables. See [HELP SHOW].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-columns.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-columns.html'),
(22, 'CREATE TRIGGER', 38, 'Syntax:\nCREATE\n    [DEFINER = { user | CURRENT_USER }]\n    TRIGGER trigger_name trigger_time trigger_event\n    ON tbl_name FOR EACH ROW trigger_stmt\n\nThis statement creates a new trigger. A trigger is a named database\nobject that is associated with a table, and that activates when a\nparticular event occurs for the table. The trigger becomes associated\nwith the table named tbl_name, which must refer to a permanent table.\nYou cannot associate a trigger with a TEMPORARY table or a view.\n\nCREATE TRIGGER requires the TRIGGER privilege for the table associated\nwith the trigger. (Before MySQL 5.1.6, this statement requires the\nSUPER privilege.)\n\nThe DEFINER clause determines the security context to be used when\nchecking access privileges at trigger activation time.\n\ntrigger_time is the trigger action time. It can be BEFORE or AFTER to\nindicate that the trigger activates before or after each row to be\nmodified.\n\ntrigger_event indicates the kind of statement that activates the\ntrigger. The trigger_event can be one of the following:\n\no INSERT: The trigger is activated whenever a new row is inserted into\n  the table; for example, through INSERT, LOAD DATA, and REPLACE\n  statements.\n\no UPDATE: The trigger is activated whenever a row is modified; for\n  example, through UPDATE statements.\n\no DELETE: The trigger is activated whenever a row is deleted from the\n  table; for example, through DELETE and REPLACE statements. However,\n  DROP TABLE and TRUNCATE statements on the table do not activate this\n  trigger, because they do not use DELETE. Dropping a partition does\n  not activate DELETE triggers, either. See [HELP TRUNCATE TABLE].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-trigger.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-trigger.html'),
(23, 'MONTH', 31, 'Syntax:\nMONTH(date)\n\nReturns the month for date, in the range 1 to 12 for January to\nDecember, or 0 for dates such as ''0000-00-00'' or ''2008-00-00'' that have\na zero month part.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT MONTH(''2008-02-03'');\n        -> 2\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(24, 'TINYINT', 21, 'TINYINT[(M)] [UNSIGNED] [ZEROFILL]\n\nA very small integer. The signed range is -128 to 127. The unsigned\nrange is 0 to 255.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(25, 'SHOW TRIGGERS', 27, 'Syntax:\nSHOW TRIGGERS [FROM db_name]\n    [LIKE ''pattern'' | WHERE expr]\n\nSHOW TRIGGERS lists the triggers currently defined for tables in a\ndatabase (the default database unless a FROM clause is given). This\nstatement requires the TRIGGER privilege (prior to MySQL 5.1.22, it\nrequires the SUPER privilege). The LIKE clause, if present, indicates\nwhich table names to match and causes the statement to display triggers\nfor those tables. The WHERE clause can be given to select rows using\nmore general conditions, as discussed in\nhttp://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\n\nFor the trigger ins_sum as defined in\nhttp://dev.mysql.com/doc/refman/5.1/en/triggers.html, the output of\nthis statement is as shown here:\n\nmysql> SHOW TRIGGERS LIKE ''acc%''\\G\n*************************** 1. row ***************************\n             Trigger: ins_sum\n               Event: INSERT\n               Table: account\n           Statement: SET @sum = @sum + NEW.amount\n              Timing: BEFORE\n             Created: NULL\n            sql_mode:\n             Definer: myname@localhost\ncharacter_set_client: latin1\ncollation_connection: latin1_swedish_ci\n  Database Collation: latin1_swedish_ci\n\ncharacter_set_client is the session value of the character_set_client\nsystem variable when the trigger was created. collation_connection is\nthe session value of the collation_connection system variable when the\ntrigger was created. Database Collation is the collation of the\ndatabase with which the trigger is associated. These columns were added\nin MySQL 5.1.21.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-triggers.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-triggers.html'),
(26, 'MASTER_POS_WAIT', 14, 'Syntax:\nMASTER_POS_WAIT(log_name,log_pos[,timeout])\n\nThis function is useful for control of master/slave synchronization. It\nblocks until the slave has read and applied all updates up to the\nspecified position in the master log. The return value is the number of\nlog events the slave had to wait for to advance to the specified\nposition. The function returns NULL if the slave SQL thread is not\nstarted, the slave''s master information is not initialized, the\narguments are incorrect, or an error occurs. It returns -1 if the\ntimeout has been exceeded. If the slave SQL thread stops while\nMASTER_POS_WAIT() is waiting, the function returns NULL. If the slave\nis past the specified position, the function returns immediately.\n\nIf a timeout value is specified, MASTER_POS_WAIT() stops waiting when\ntimeout seconds have elapsed. timeout must be greater than 0; a zero or\nnegative timeout means no timeout.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(27, 'REGEXP', 36, 'Syntax:\nexpr REGEXP pat, expr RLIKE pat\n\nPerforms a pattern match of a string expression expr against a pattern\npat. The pattern can be an extended regular expression. The syntax for\nregular expressions is discussed in\nhttp://dev.mysql.com/doc/refman/5.1/en/regexp.html. Returns 1 if expr\nmatches pat; otherwise it returns 0. If either expr or pat is NULL, the\nresult is NULL. RLIKE is a synonym for REGEXP, provided for mSQL\ncompatibility.\n\nThe pattern need not be a literal string. For example, it can be\nspecified as a string expression or table column.\n\n*Note*: Because MySQL uses the C escape syntax in strings (for example,\n"\\n" to represent the newline character), you must double any "\\" that\nyou use in your REGEXP strings.\n\nREGEXP is not case sensitive, except when used with binary strings.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html\n\n', 'mysql> SELECT ''Monty!'' REGEXP ''m%y%%'';\n        -> 0\nmysql> SELECT ''Monty!'' REGEXP ''.*'';\n        -> 1\nmysql> SELECT ''new*\\n*line'' REGEXP ''new\\\\*.\\\\*line'';\n        -> 1\nmysql> SELECT ''a'' REGEXP ''A'', ''a'' REGEXP BINARY ''A'';\n        -> 1  0\nmysql> SELECT ''a'' REGEXP ''^[a-d]'';\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html'),
(28, 'IF STATEMENT', 23, 'Syntax:\nIF search_condition THEN statement_list\n    [ELSEIF search_condition THEN statement_list] ...\n    [ELSE statement_list]\nEND IF\n\nIF implements a basic conditional construct. If the search_condition\nevaluates to true, the corresponding SQL statement list is executed. If\nno search_condition matches, the statement list in the ELSE clause is\nexecuted. Each statement_list consists of one or more statements.\n\n*Note*: There is also an IF() function, which differs from the IF\nstatement described here. See\nhttp://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/if-statement.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/if-statement.html'),
(29, '^', 19, 'Syntax:\n^\n\nBitwise XOR:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html\n\n', 'mysql> SELECT 1 ^ 1;\n        -> 0\nmysql> SELECT 1 ^ 0;\n        -> 1\nmysql> SELECT 11 ^ 3;\n        -> 8\n', 'http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html'),
(30, 'DROP VIEW', 38, 'Syntax:\nDROP VIEW [IF EXISTS]\n    view_name [, view_name] ...\n    [RESTRICT | CASCADE]\n\nDROP VIEW removes one or more views. You must have the DROP privilege\nfor each view. If any of the views named in the argument list do not\nexist, MySQL returns an error indicating by name which non-existing\nviews it was unable to drop, but it also drops all of the views in the\nlist that do exist.\n\nThe IF EXISTS clause prevents an error from occurring for views that\ndon''t exist. When this clause is given, a NOTE is generated for each\nnon-existent view. See [HELP SHOW WARNINGS].\n\nRESTRICT and CASCADE, if given, are parsed and ignored.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-view.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-view.html'),
(31, 'WITHIN', 30, 'Within(g1,g2)\n\nReturns 1 or 0 to indicate whether g1 is spatially within g2. This\ntests the opposite relationship as Contains().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html'),
(32, 'WEEK', 31, 'Syntax:\nWEEK(date[,mode])\n\nThis function returns the week number for date. The two-argument form\nof WEEK() allows you to specify whether the week starts on Sunday or\nMonday and whether the return value should be in the range from 0 to 53\nor from 1 to 53. If the mode argument is omitted, the value of the\ndefault_week_format system variable is used. See\nhttp://dev.mysql.com/doc/refman/5.1/en/server-system-variables.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT WEEK(''2008-02-20'');\n        -> 7\nmysql> SELECT WEEK(''2008-02-20'',0);\n        -> 7\nmysql> SELECT WEEK(''2008-02-20'',1);\n        -> 8\nmysql> SELECT WEEK(''2008-12-31'',1);\n        -> 53\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(33, 'SHOW PLUGINS', 27, 'Syntax:\nSHOW PLUGINS\n\nSHOW PLUGINS displays information about known plugins.\n\nmysql> SHOW PLUGINS;\n+------------+--------+----------------+---------+\n| Name       | Status | Type           | Library |\n+------------+--------+----------------+---------+\n| MEMORY     | ACTIVE | STORAGE ENGINE | NULL    |\n| MyISAM     | ACTIVE | STORAGE ENGINE | NULL    |\n| InnoDB     | ACTIVE | STORAGE ENGINE | NULL    |\n| ARCHIVE    | ACTIVE | STORAGE ENGINE | NULL    |\n| CSV        | ACTIVE | STORAGE ENGINE | NULL    |\n| BLACKHOLE  | ACTIVE | STORAGE ENGINE | NULL    |\n| FEDERATED  | ACTIVE | STORAGE ENGINE | NULL    |\n| MRG_MYISAM | ACTIVE | STORAGE ENGINE | NULL    |\n+------------+--------+----------------+---------+\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-plugins.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-plugins.html'),
(34, 'DROP FUNCTION UDF', 22, 'Syntax:\nDROP FUNCTION function_name\n\nThis statement drops the user-defined function (UDF) named\nfunction_name.\n\nTo drop a function, you must have the DELETE privilege for the mysql\ndatabase. This is because DROP FUNCTION removes a row from the\nmysql.func system table that records the function''s name, type, and\nshared library name.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-function-udf.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-function-udf.html'),
(35, 'PREPARE', 27, 'Syntax:\nPREPARE stmt_name FROM preparable_stmt\n\nThe PREPARE statement prepares a statement and assigns it a name,\nstmt_name, by which to refer to the statement later. Statement names\nare not case sensitive. preparable_stmt is either a string literal or a\nuser variable that contains the text of the statement. The text must\nrepresent a single SQL statement, not multiple statements. Within the\nstatement, "?" characters can be used as parameter markers to indicate\nwhere data values are to be bound to the query later when you execute\nit. The "?" characters should not be enclosed within quotes, even if\nyou intend to bind them to string values. Parameter markers can be used\nonly where data values should appear, not for SQL keywords,\nidentifiers, and so forth.\n\nIf a prepared statement with the given name already exists, it is\ndeallocated implicitly before the new statement is prepared. This means\nthat if the new statement contains an error and cannot be prepared, an\nerror is returned and no statement with the given name exists.\n\nThe scope of a prepared statement is the client session within which it\nis created. Other clients cannot see it.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-prepared-statements.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-prepared-statements.html'),
(36, 'LOCK', 8, 'Syntax:\nLOCK TABLES\n    tbl_name [[AS] alias] lock_type\n    [, tbl_name [[AS] alias] lock_type] ...\n\nlock_type:\n    READ [LOCAL]\n  | [LOW_PRIORITY] WRITE\n\nUNLOCK TABLES\n\nMySQL enables client sessions to acquire table locks explicitly for the\npurpose of cooperating with other sessions for access to tables, or to\nprevent other sessions from modifying tables during periods when a\nsession requires exclusive access to them. A session can acquire or\nrelease locks only for itself. One session cannot acquire locks for\nanother session or release locks held by another session.\n\nLOCK TABLES acquires table locks for the current thread. It locks base\ntables or views. (For view locking, LOCK TABLES adds all base tables\nused in the view to the set of tables to be locked and locks them\nautomatically.) To use LOCK TABLES, you must have the LOCK TABLES\nprivilege, and the SELECT privilege for each object to be locked.\n\nMySQL enables client sessions to acquire table locks explicitly Locks\nmay be used to emulate transactions or to get more speed when updating\ntables. This is explained in more detail later in this section.\n\nUNLOCK TABLES explicitly releases any table locks held by the current\nthread. Another use for UNLOCK TABLES is to release the global read\nlock acquired with FLUSH TABLES WITH READ LOCK. (You can lock all\ntables in all databases with a read lock with the FLUSH TABLES WITH\nREAD LOCK statement. See [HELP FLUSH]. This is a very convenient way to\nget backups if you have a filesystem such as Veritas that can take\nsnapshots in time.)\n\nThe following discussion applies only to non-TEMPORARY tables. LOCK\nTABLES is allowed (but ignored) for a TEMPORARY table. The table can be\naccessed freely by the session within which it was created, regardless\nof what other locking may be in effect. No lock is necessary because no\nother session can see the table.\n\nThe following general rules apply to acquisition and release of locks\nby a given thread:\n\no Table locks are acquired with LOCK TABLES.\n\no If the LOCK TABLES statement must wait due to locks held by other\n  threads on any of the tables, it blocks until all locks can be\n  acquired.\n\no Table locks are released explicitly with UNLOCK TABLES.\n\no Table locks are released implicitly under these conditions:\n\n  o LOCK TABLES releases any table locks currently held by the thread\n    before acquiring new locks.\n\n  o Beginning a transaction (for example, with START TRANSACTION)\n    implicitly performs an UNLOCK TABLES. (Additional information about\n    the interaction between table locking and transactions is given\n    later in this section.)\n\n  o If a client connection drops, the server releases table locks held\n    by the client. If the client reconnects, the locks will no longer\n    be in effect. In addition, if the client had an active transaction,\n    the server rolls back the transaction upon disconnect, and if\n    reconnect occurs, the new session begins with autocommit enabled.\n    For this reason, clients may wish to disable auto-reconnect. With\n    auto-reconnect in effect, the client is not notified if reconnect\n    occurs but any table locks or current transaction will have been\n    lost. With auto-reconnect disabled, if the connection drops, an\n    error occurs for the next statement issued. The client can detect\n    the error and take appropriate action such as reacquiring the locks\n    or redoing the transaction. See\n    http://dev.mysql.com/doc/refman/5.1/en/auto-reconnect.html.\n\n*Note*: If you use ALTER TABLE on a locked table, it may become\nunlocked. See\nhttp://dev.mysql.com/doc/refman/5.1/en/alter-table-problems.html.\n\nA table lock protects only against inappropriate reads or writes by\nother clients. The client holding the lock, even a read lock, can\nperform table-level operations such as DROP TABLE. Truncate operations\nare not transaction-safe, so an error occurs if the client attempts one\nduring an active transaction or while holding a table lock.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/lock-tables.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/lock-tables.html'),
(37, 'UPDATEXML', 36, 'Syntax:\nUpdateXML(xml_target, xpath_expr, new_xml)\n\nThis function replaces a single portion of a given fragment of XML\nmarkup xml_target with a new XML fragment new_xml, and then returns the\nchanged XML. The portion of xml_target that is replaced matches an\nXPath expression xpath_expr supplied by the user. If no expression\nmatching xpath_expr is found, or if multiple matches are found, the\nfunction returns the original xml_target XML fragment. All three\narguments should be strings.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/xml-functions.html\n\n', 'mysql> SELECT\n    ->   UpdateXML(''<a><b>ccc</b><d></d></a>'', ''/a'', ''<e>fff</e>'') AS val1,\n    ->   UpdateXML(''<a><b>ccc</b><d></d></a>'', ''/b'', ''<e>fff</e>'') AS val2,\n    ->   UpdateXML(''<a><b>ccc</b><d></d></a>'', ''//b'', ''<e>fff</e>'') AS val3,\n    ->   UpdateXML(''<a><b>ccc</b><d></d></a>'', ''/a/d'', ''<e>fff</e>'') AS val4,\n    ->   UpdateXML(''<a><d></d><b>ccc</b><d></d></a>'', ''/a/d'', ''<e>fff</e>'') AS val5\n    -> \\G\n\n*************************** 1. row ***************************\nval1: <e>fff</e>\nval2: <a><b>ccc</b><d></d></a>\nval3: <a><e>fff</e><d></d></a>\nval4: <a><b>ccc</b><e>fff</e></a>\nval5: <a><d></d><b>ccc</b><d></d></a>\n', 'http://dev.mysql.com/doc/refman/5.1/en/xml-functions.html'),
(38, 'RESET SLAVE', 27, 'Syntax:\nRESET SLAVE\n\nRESET SLAVE makes the slave forget its replication position in the\nmaster''s binary logs. This statement is meant to be used for a clean\nstart: It deletes the master.info and relay-log.info files, all the\nrelay logs, and starts a new relay log.\n\n*Note*: All relay logs are deleted, even if they have not been\ncompletely executed by the slave SQL thread. (This is a condition\nlikely to exist on a replication slave if you have issued a STOP SLAVE\nstatement or if the slave is highly loaded.)\n\nConnection information stored in the master.info file is immediately\nreset using any values specified in the corresponding startup options.\nThis information includes values such as master host, master port,\nmaster user, and master password. If the slave SQL thread was in the\nmiddle of replicating temporary tables when it was stopped, and RESET\nSLAVE is issued, these replicated temporary tables are deleted on the\nslave.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/reset-slave.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/reset-slave.html'),
(39, 'SHOW BINARY LOGS', 27, 'Syntax:\nSHOW BINARY LOGS\nSHOW MASTER LOGS\n\nLists the binary log files on the server. This statement is used as\npart of the procedure described in [HELP PURGE BINARY LOGS], that shows\nhow to determine which logs can be purged.\n\nmysql> SHOW BINARY LOGS;\n+---------------+-----------+\n| Log_name      | File_size |\n+---------------+-----------+\n| binlog.000015 |    724935 |\n| binlog.000016 |    733481 |\n+---------------+-----------+\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-binary-logs.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-binary-logs.html'),
(40, 'POLYGON', 24, 'Polygon(ls1,ls2,...)\n\nConstructs a WKB Polygon value from a number of WKB LineString\narguments. If any argument does not represent the WKB of a LinearRing\n(that is, not a closed and simple LineString) the return value is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions'),
(41, 'MINUTE', 31, 'Syntax:\nMINUTE(time)\n\nReturns the minute for time, in the range 0 to 59.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT MINUTE(''2008-02-03 10:05:03'');\n        -> 5\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(42, 'DAY', 31, 'Syntax:\nDAY(date)\n\nDAY() is a synonym for DAYOFMONTH().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(43, 'MID', 36, 'Syntax:\nMID(str,pos,len)\n\nMID(str,pos,len) is a synonym for SUBSTRING(str,pos,len).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(44, 'UUID', 14, 'Syntax:\nUUID()\n\nReturns a Universal Unique Identifier (UUID) generated according to\n"DCE 1.1: Remote Procedure Call" (Appendix A) CAE (Common Applications\nEnvironment) Specifications published by The Open Group in October 1997\n(Document Number C706,\nhttp://www.opengroup.org/public/pubs/catalog/c706.htm).\n\nA UUID is designed as a number that is globally unique in space and\ntime. Two calls to UUID() are expected to generate two different\nvalues, even if these calls are performed on two separate computers\nthat are not connected to each other.\n\nA UUID is a 128-bit number represented by a utf8 string of five\nhexadecimal numbers in aaaaaaaa-bbbb-cccc-dddd-eeeeeeeeeeee format:\n\no The first three numbers are generated from a timestamp.\n\no The fourth number preserves temporal uniqueness in case the timestamp\n  value loses monotonicity (for example, due to daylight saving time).\n\no The fifth number is an IEEE 802 node number that provides spatial\n  uniqueness. A random number is substituted if the latter is not\n  available (for example, because the host computer has no Ethernet\n  card, or we do not know how to find the hardware address of an\n  interface on your operating system). In this case, spatial uniqueness\n  cannot be guaranteed. Nevertheless, a collision should have very low\n  probability.\n\n  Currently, the MAC address of an interface is taken into account only\n  on FreeBSD and Linux. On other operating systems, MySQL uses a\n  randomly generated 48-bit number.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', 'mysql> SELECT UUID();\n        -> ''6ccd780c-baba-1026-9564-0040f4311e29''\n', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(45, 'LINESTRING', 24, 'LineString(pt1,pt2,...)\n\nConstructs a WKB LineString value from a number of WKB Point arguments.\nIf any argument is not a WKB Point, the return value is NULL. If the\nnumber of Point arguments is less than two, the return value is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions'),
(46, 'SLEEP', 14, 'Syntax:\nSLEEP(duration)\n\nSleeps (pauses) for the number of seconds given by the duration\nargument, then returns 0. If SLEEP() is interrupted, it returns 1. The\nduration may have a fractional part given in microseconds.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(47, 'CONNECTION_ID', 15, 'Syntax:\nCONNECTION_ID()\n\nReturns the connection ID (thread ID) for the connection. Every\nconnection has an ID that is unique among the set of currently\nconnected clients.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT CONNECTION_ID();\n        -> 23786\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(48, 'DELETE', 27, 'Syntax:\nSingle-table syntax:\n\nDELETE [LOW_PRIORITY] [QUICK] [IGNORE] FROM tbl_name\n    [WHERE where_condition]\n    [ORDER BY ...]\n    [LIMIT row_count]\n\nMultiple-table syntax:\n\nDELETE [LOW_PRIORITY] [QUICK] [IGNORE]\n    tbl_name[.*] [, tbl_name[.*]] ...\n    FROM table_references\n    [WHERE where_condition]\n\nOr:\n\nDELETE [LOW_PRIORITY] [QUICK] [IGNORE]\n    FROM tbl_name[.*] [, tbl_name[.*]] ...\n    USING table_references\n    [WHERE where_condition]\n\nFor the single-table syntax, the DELETE statement deletes rows from\ntbl_name and returns a count of the number of deleted rows. This count\ncan be obtained by calling the ROW_COUNT() function (see\nhttp://dev.mysql.com/doc/refman/5.1/en/information-functions.html). The\nWHERE clause, if given, specifies the conditions that identify which\nrows to delete. With no WHERE clause, all rows are deleted. If the\nORDER BY clause is specified, the rows are deleted in the order that is\nspecified. The LIMIT clause places a limit on the number of rows that\ncan be deleted.\n\nFor the multiple-table syntax, DELETE deletes from each tbl_name the\nrows that satisfy the conditions. In this case, ORDER BY and LIMIT\ncannot be used.\n\nwhere_condition is an expression that evaluates to true for each row to\nbe deleted. It is specified as described in\nhttp://dev.mysql.com/doc/refman/5.1/en/select.html.\n\nCurrently, you cannot delete from a table and select from the same\ntable in a subquery.\n\nAs stated, a DELETE statement with no WHERE clause deletes all rows. A\nfaster way to do this, when you do not need to know the number of\ndeleted rows, is to use TRUNCATE TABLE. However, within a transaction\nor if you have a lock on the table, TRUNCATE TABLE cannot be used\nwhereas DELETE can. See [HELP TRUNCATE TABLE], and [HELP LOCK].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/delete.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/delete.html'),
(49, 'ROUND', 4, 'Syntax:\nROUND(X), ROUND(X,D)\n\nRounds the argument X to D decimal places. The rounding algorithm\ndepends on the data type of X. D defaults to 0 if not specified. D can\nbe negative to cause D digits left of the decimal point of the value X\nto become zero.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT ROUND(-1.23);\n        -> -1\nmysql> SELECT ROUND(-1.58);\n        -> -2\nmysql> SELECT ROUND(1.58);\n        -> 2\nmysql> SELECT ROUND(1.298, 1);\n        -> 1.3\nmysql> SELECT ROUND(1.298, 0);\n        -> 1\nmysql> SELECT ROUND(23.298, -1);\n        -> 20\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(50, 'NULLIF', 7, 'Syntax:\nNULLIF(expr1,expr2)\n\nReturns NULL if expr1 = expr2 is true, otherwise returns expr1. This is\nthe same as CASE WHEN expr1 = expr2 THEN NULL ELSE expr1 END.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html\n\n', 'mysql> SELECT NULLIF(1,1);\n        -> NULL\nmysql> SELECT NULLIF(1,2);\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html'),
(51, 'CLOSE', 23, 'Syntax:\nCLOSE cursor_name\n\nThis statement closes a previously opened cursor.\n\nIf not closed explicitly, a cursor is closed at the end of the compound\nstatement in which it was declared.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/close.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/close.html'),
(52, 'STOP SLAVE', 27, 'Syntax:\nSTOP SLAVE [thread_type [, thread_type] ... ]\n\nthread_type: IO_THREAD | SQL_THREAD\n\nStops the slave threads. STOP SLAVE requires the SUPER privilege.\n\nLike START SLAVE, this statement may be used with the IO_THREAD and\nSQL_THREAD options to name the thread or threads to be stopped.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/stop-slave.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/stop-slave.html'),
(53, 'TIMEDIFF', 31, 'Syntax:\nTIMEDIFF(expr1,expr2)\n\nTIMEDIFF() returns expr1 - expr2 expressed as a time value. expr1 and\nexpr2 are time or date-and-time expressions, but both must be of the\nsame type.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT TIMEDIFF(''2000:01:01 00:00:00'',\n    ->                 ''2000:01:01 00:00:00.000001'');\n        -> ''-00:00:00.000001''\nmysql> SELECT TIMEDIFF(''2008-12-31 23:59:59.000001'',\n    ->                 ''2008-12-30 01:01:01.000002'');\n        -> ''46:58:57.999999''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(54, 'REPLACE FUNCTION', 36, 'Syntax:\nREPLACE(str,from_str,to_str)\n\nReturns the string str with all occurrences of the string from_str\nreplaced by the string to_str. REPLACE() performs a case-sensitive\nmatch when searching for from_str.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT REPLACE(''www.mysql.com'', ''w'', ''Ww'');\n        -> ''WwWwWw.mysql.com''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html');
INSERT INTO `help_topic` (`help_topic_id`, `name`, `help_category_id`, `description`, `example`, `url`) VALUES
(55, 'USE', 28, 'Syntax:\nUSE db_name\n\nThe USE db_name statement tells MySQL to use the db_name database as\nthe default (current) database for subsequent statements. The database\nremains the default until the end of the session or another USE\nstatement is issued:\n\nUSE db1;\nSELECT COUNT(*) FROM mytable;   # selects from db1.mytable\nUSE db2;\nSELECT COUNT(*) FROM mytable;   # selects from db2.mytable\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/use.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/use.html'),
(56, 'LINEFROMTEXT', 3, 'LineFromText(wkt[,srid]), LineStringFromText(wkt[,srid])\n\nConstructs a LINESTRING value using its WKT representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions'),
(57, 'CASE OPERATOR', 7, 'Syntax:\nCASE value WHEN [compare_value] THEN result [WHEN [compare_value] THEN\nresult ...] [ELSE result] END\n\nCASE WHEN [condition] THEN result [WHEN [condition] THEN result ...]\n[ELSE result] END\n\nThe first version returns the result where value=compare_value. The\nsecond version returns the result for the first condition that is true.\nIf there was no matching result value, the result after ELSE is\nreturned, or NULL if there is no ELSE part.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html\n\n', 'mysql> SELECT CASE 1 WHEN 1 THEN ''one''\n    ->     WHEN 2 THEN ''two'' ELSE ''more'' END;\n        -> ''one''\nmysql> SELECT CASE WHEN 1>0 THEN ''true'' ELSE ''false'' END;\n        -> ''true''\nmysql> SELECT CASE BINARY ''B''\n    ->     WHEN ''a'' THEN 1 WHEN ''b'' THEN 2 END;\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html'),
(58, 'SHOW MASTER STATUS', 27, 'Syntax:\nSHOW MASTER STATUS\n\nProvides status information about the binary log files of the master.\nExample:\n\nmysql> SHOW MASTER STATUS;\n+---------------+----------+--------------+------------------+\n| File          | Position | Binlog_Do_DB | Binlog_Ignore_DB |\n+---------------+----------+--------------+------------------+\n| mysql-bin.003 | 73       | test         | manual,mysql     |\n+---------------+----------+--------------+------------------+\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-master-status.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-master-status.html'),
(59, 'ADDTIME', 31, 'Syntax:\nADDTIME(expr1,expr2)\n\nADDTIME() adds expr2 to expr1 and returns the result. expr1 is a time\nor datetime expression, and expr2 is a time expression.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT ADDTIME(''2007-12-31 23:59:59.999999'', ''1 1:1:1.000002'');\n        -> ''2008-01-02 01:01:01.000001''\nmysql> SELECT ADDTIME(''01:00:00.999999'', ''02:00:00.999998'');\n        -> ''03:00:01.999997''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(60, 'SPATIAL', 33, 'MySQL can create spatial indexes using syntax similar to that for\ncreating regular indexes, but extended with the SPATIAL keyword.\nCurrently, columns in spatial indexes must be declared NOT NULL. The\nfollowing examples demonstrate how to create spatial indexes:\n\no With CREATE TABLE:\n\nCREATE TABLE geom (g GEOMETRY NOT NULL, SPATIAL INDEX(g));\n\no With ALTER TABLE:\n\nALTER TABLE geom ADD SPATIAL INDEX(g);\n\no With CREATE INDEX:\n\nCREATE SPATIAL INDEX sp_index ON geom (g);\n\nFor MyISAM tables, SPATIAL INDEX creates an R-tree index. For storage\nengines that support non-spatial indexing of spatial columns, the\nengine creates a B-tree index. A B-tree index on spatial values will be\nuseful for exact-value lookups, but not for range scans.\n\nFor more information on indexing spatial columns, see [HELP CREATE\nINDEX].\n\nTo drop spatial indexes, use ALTER TABLE or DROP INDEX:\n\no With ALTER TABLE:\n\nALTER TABLE geom DROP INDEX g;\n\no With DROP INDEX:\n\nDROP INDEX sp_index ON geom;\n\nExample: Suppose that a table geom contains more than 32,000\ngeometries, which are stored in the column g of type GEOMETRY. The\ntable also has an AUTO_INCREMENT column fid for storing object ID\nvalues.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-indexes.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-indexes.html'),
(61, 'TIMESTAMPDIFF', 31, 'Syntax:\nTIMESTAMPDIFF(unit,datetime_expr1,datetime_expr2)\n\nReturns datetime_expr2 - datetime_expr1, where datetime_expr1 and\ndatetime_expr2 are date or datetime expressions. One expression may be\na date and the other a datetime; a date value is treated as a datetime\nhaving the time part ''00:00:00'' where necessary. The unit for the\nresult (an integer) is given by the unit argument. The legal values for\nunit are the same as those listed in the description of the\nTIMESTAMPADD() function.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT TIMESTAMPDIFF(MONTH,''2003-02-01'',''2003-05-01'');\n        -> 3\nmysql> SELECT TIMESTAMPDIFF(YEAR,''2002-05-01'',''2001-01-01'');\n        -> -1\nmysql> SELECT TIMESTAMPDIFF(MINUTE,''2003-02-01'',''2003-05-01 12:05:55'');\n        -> 128885\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(62, 'UPPER', 36, 'Syntax:\nUPPER(str)\n\nReturns the string str with all characters changed to uppercase\naccording to the current character set mapping. The default is latin1\n(cp1252 West European).\n\nmysql> SELECT UPPER(''Hej'');\n        -> ''HEJ''\n\nUPPER() is ineffective when applied to binary strings (BINARY,\nVARBINARY, BLOB). The description of LOWER() shows how to perform\nlettercase conversion of binary strings.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(63, 'FROM_UNIXTIME', 31, 'Syntax:\nFROM_UNIXTIME(unix_timestamp), FROM_UNIXTIME(unix_timestamp,format)\n\nReturns a representation of the unix_timestamp argument as a value in\n''YYYY-MM-DD HH:MM:SS'' or YYYYMMDDHHMMSS.uuuuuu format, depending on\nwhether the function is used in a string or numeric context. The value\nis expressed in the current time zone. unix_timestamp is an internal\ntimestamp value such as is produced by the UNIX_TIMESTAMP() function.\n\nIf format is given, the result is formatted according to the format\nstring, which is used the same way as listed in the entry for the\nDATE_FORMAT() function.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT FROM_UNIXTIME(1196440219);\n        -> ''2007-11-30 10:30:19''\nmysql> SELECT FROM_UNIXTIME(1196440219) + 0;\n        -> 20071130103019.000000\nmysql> SELECT FROM_UNIXTIME(UNIX_TIMESTAMP(),\n    ->                      ''%Y %D %M %h:%i:%s %x'');\n        -> ''2007 30th November 10:30:59 2007''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(64, 'MEDIUMBLOB', 21, 'MEDIUMBLOB\n\nA BLOB column with a maximum length of 16,777,215 (224 - 1) bytes. Each\nMEDIUMBLOB value is stored using a three-byte length prefix that\nindicates the number of bytes in the value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(65, 'IFNULL', 7, 'Syntax:\nIFNULL(expr1,expr2)\n\nIf expr1 is not NULL, IFNULL() returns expr1; otherwise it returns\nexpr2. IFNULL() returns a numeric or string value, depending on the\ncontext in which it is used.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html\n\n', 'mysql> SELECT IFNULL(1,0);\n        -> 1\nmysql> SELECT IFNULL(NULL,10);\n        -> 10\nmysql> SELECT IFNULL(1/0,10);\n        -> 10\nmysql> SELECT IFNULL(1/0,''yes'');\n        -> ''yes''\n', 'http://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html'),
(66, 'SHOW ERRORS', 27, 'Syntax:\nSHOW ERRORS [LIMIT [offset,] row_count]\nSHOW COUNT(*) ERRORS\n\nThis statement is similar to SHOW WARNINGS, except that instead of\ndisplaying errors, warnings, and notes, it displays only errors.\n\nThe LIMIT clause has the same syntax as for the SELECT statement. See\nhttp://dev.mysql.com/doc/refman/5.1/en/select.html.\n\nThe SHOW COUNT(*) ERRORS statement displays the number of errors. You\ncan also retrieve this number from the error_count variable:\n\nSHOW COUNT(*) ERRORS;\nSELECT @@error_count;\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-errors.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-errors.html'),
(67, 'LEAST', 18, 'Syntax:\nLEAST(value1,value2,...)\n\nWith two or more arguments, returns the smallest (minimum-valued)\nargument. The arguments are compared using the following rules:\n\no If the return value is used in an INTEGER context or all arguments\n  are integer-valued, they are compared as integers.\n\no If the return value is used in a REAL context or all arguments are\n  real-valued, they are compared as reals.\n\no If any argument is a case-sensitive string, the arguments are\n  compared as case-sensitive strings.\n\no In all other cases, the arguments are compared as case-insensitive\n  strings.\n\nLEAST() returns NULL if any argument is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT LEAST(2,0);\n        -> 0\nmysql> SELECT LEAST(34.0,3.0,5.0,767.0);\n        -> 3.0\nmysql> SELECT LEAST(''B'',''A'',''C'');\n        -> ''A''\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(68, '=', 18, '=\n\nEqual:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 1 = 0;\n        -> 0\nmysql> SELECT ''0'' = 0;\n        -> 1\nmysql> SELECT ''0.0'' = 0;\n        -> 1\nmysql> SELECT ''0.01'' = 0;\n        -> 0\nmysql> SELECT ''.01'' = 0.01;\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(69, 'REVERSE', 36, 'Syntax:\nREVERSE(str)\n\nReturns the string str with the order of the characters reversed.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT REVERSE(''abc'');\n        -> ''cba''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(70, 'ISNULL', 18, 'Syntax:\nISNULL(expr)\n\nIf expr is NULL, ISNULL() returns 1, otherwise it returns 0.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT ISNULL(1+1);\n        -> 0\nmysql> SELECT ISNULL(1/0);\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(71, 'BINARY', 21, 'BINARY(M)\n\nThe BINARY type is similar to the CHAR type, but stores binary byte\nstrings rather than non-binary character strings. M represents the\ncolumn length in bytes.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(72, 'BLOB DATA TYPE', 21, 'A BLOB is a binary large object that can hold a variable amount of\ndata. The four BLOB types are TINYBLOB, BLOB, MEDIUMBLOB, and LONGBLOB.\nThese differ only in the maximum length of the values they can hold.\nThe four TEXT types are TINYTEXT, TEXT, MEDIUMTEXT, and LONGTEXT. These\ncorrespond to the four BLOB types and have the same maximum lengths and\nstorage requirements. See\nhttp://dev.mysql.com/doc/refman/5.1/en/storage-requirements.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/blob.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/blob.html'),
(73, 'BOUNDARY', 35, 'Boundary(g)\n\nReturns a geometry that is the closure of the combinatorial boundary of\nthe geometry value g.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions'),
(74, 'CREATE USER', 9, 'Syntax:\nCREATE USER user [IDENTIFIED BY [PASSWORD] ''password'']\n    [, user [IDENTIFIED BY [PASSWORD] ''password'']] ...\n\nThe CREATE USER statement creates new MySQL accounts. To use it, you\nmust have the global CREATE USER privilege or the INSERT privilege for\nthe mysql database. For each account, CREATE USER creates a new row in\nthe mysql.user table that has no privileges. An error occurs if the\naccount already exists. Each account is named using the same format as\nfor the GRANT statement; for example, ''jeffrey''@''localhost''. If you\nspecify only the username part of the account name, a hostname part of\n''%'' is used. For additional information about specifying account names,\nsee [HELP GRANT].\n\nThe account can be given a password with the optional IDENTIFIED BY\nclause. The user value and the password are given the same way as for\nthe GRANT statement. In particular, to specify the password in plain\ntext, omit the PASSWORD keyword. To specify the password as the hashed\nvalue as returned by the PASSWORD() function, include the PASSWORD\nkeyword. See [HELP GRANT].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-user.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-user.html'),
(75, 'POINT', 24, 'Point(x,y)\n\nConstructs a WKB Point using its coordinates.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions'),
(76, 'CURRENT_USER', 15, 'Syntax:\nCURRENT_USER, CURRENT_USER()\n\nReturns the username and hostname combination for the MySQL account\nthat the server used to authenticate the current client. This account\ndetermines your access privileges. The return value is a string in the\nutf8 character set.\n\nThe value of CURRENT_USER() can differ from the value of USER().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT USER();\n        -> ''davida@localhost''\nmysql> SELECT * FROM mysql.user;\nERROR 1044: Access denied for user ''''@''localhost'' to\ndatabase ''mysql''\nmysql> SELECT CURRENT_USER();\n        -> ''@localhost''\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(77, 'LCASE', 36, 'Syntax:\nLCASE(str)\n\nLCASE() is a synonym for LOWER().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(78, '<=', 18, 'Syntax:\n<=\n\nLess than or equal:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 0.1 <= 2;\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(79, 'SHOW PROFILES', 27, 'Syntax:\nSHOW PROFILES\n\nSHOW PROFILE [type [, type] ... ]\n    [FOR QUERY n]\n    [LIMIT row_count [OFFSET offset]]\n\ntype:\n    ALL\n  | BLOCK IO\n  | CONTEXT SWITCHES\n  | CPU\n  | IPC\n  | MEMORY\n  | PAGE FAULTS\n  | SOURCE\n  | SWAPS\n\nThe SHOW PROFILES and SHOW PROFILE statements display profiling\ninformation that indicates resource usage for statements executed\nduring the course of the current session.\n\nProfiling is controlled by the profiling session variable, which has a\ndefault value of 0 (OFF). Profiling is enabled by setting profiling to\n1 or ON:\n\nmysql> SET profiling = 1;\n\nSHOW PROFILES displays a list of the most recent statements sent to the\nmaster. The size of the list is controlled by the\nprofiling_history_size session variable, which has a default value of\n15. The maximum value is 100. Setting the value to 0 has the practical\neffect of disabling profiling.\n\nAll statements are profiled except SHOW PROFILES and SHOW PROFILE, so\nyou will find neither of those statements in the profile list.\nMalformed statements are profiled. For example, SHOW PROFILING is an\nillegal statement, and a syntax error occurs if you try to execute it,\nbut it will show up in the profiling list.\n\nSHOW PROFILE displays detailed information about a single statement.\nWithout the FOR QUERY n clause, the output pertains to the most\nrecently executed statement. If FOR QUERY n is included, SHOW PROFILE\ndisplays information for statement n. The values of n correspond to the\nQuery_ID values displayed by SHOW PROFILES.\n\nThe LIMIT row_count clause may be given to limit the output to\nrow_count rows. If LIMIT is given, OFFSET offset may be added to begin\nthe output offset rows into the full set of rows.\n\nBy default, SHOW PROFILE displays Status and Duration columns. The\nStatus values are like the State values displayed by SHOW PROCESSLIST,\nalthought there might be some minor differences in interpretion for the\ntwo statements for some status values (see\nhttp://dev.mysql.com/doc/refman/5.1/en/thread-information.html).\n\nOptional type values may be specified to display specific additional\ntypes of information:\n\no ALL displays all information\n\no BLOCK IO displays counts for block input and output operations\n\no CONTEXT SWITCHES displays counts for voluntary and involuntary\n  context switches\n\no CPU displays user and system CPU usage times\n\no IPC displays counts for messages sent and received\n\no MEMORY is not currently implemented\n\no PAGE FAULTS displays counts for major and minor page faults\n\no SOURCE displays the names of functions from the source code, together\n  with the name and line number of the file in which the function\n  occurs\n\no SWAPS displays swap counts\n\nProfiling is enabled per session. When a session ends, its profiling\ninformation is lost.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-profiles.html\n\n', 'mysql> SELECT @@profiling;\n+-------------+\n| @@profiling |\n+-------------+\n|           0 |\n+-------------+\n1 row in set (0.00 sec)\n\nmysql> SET profiling = 1;\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> DROP TABLE IF EXISTS t1;\nQuery OK, 0 rows affected, 1 warning (0.00 sec)\n\nmysql> CREATE TABLE T1 (id INT);\nQuery OK, 0 rows affected (0.01 sec)\n\nmysql> SHOW PROFILES;\n+----------+----------+--------------------------+\n| Query_ID | Duration | Query                    |\n+----------+----------+--------------------------+\n|        0 | 0.000088 | SET PROFILING = 1        |\n|        1 | 0.000136 | DROP TABLE IF EXISTS t1  |\n|        2 | 0.011947 | CREATE TABLE t1 (id INT) |\n+----------+----------+--------------------------+\n3 rows in set (0.00 sec)\n\nmysql> SHOW PROFILE;\n+----------------------+----------+\n| Status               | Duration |\n+----------------------+----------+\n| checking permissions | 0.000040 |\n| creating table       | 0.000056 |\n| After create         | 0.011363 |\n| query end            | 0.000375 |\n| freeing items        | 0.000089 |\n| logging slow query   | 0.000019 |\n| cleaning up          | 0.000005 |\n+----------------------+----------+\n7 rows in set (0.00 sec)\n\nmysql> SHOW PROFILE FOR QUERY 1;\n+--------------------+----------+\n| Status             | Duration |\n+--------------------+----------+\n| query end          | 0.000107 |\n| freeing items      | 0.000008 |\n| logging slow query | 0.000015 |\n| cleaning up        | 0.000006 |\n+--------------------+----------+\n4 rows in set (0.00 sec)\n\nmysql> SHOW PROFILE CPU FOR QUERY 2;\n+----------------------+----------+----------+------------+\n| Status               | Duration | CPU_user | CPU_system |\n+----------------------+----------+----------+------------+\n| checking permissions | 0.000040 | 0.000038 |   0.000002 |\n| creating table       | 0.000056 | 0.000028 |   0.000028 |\n| After create         | 0.011363 | 0.000217 |   0.001571 |\n| query end            | 0.000375 | 0.000013 |   0.000028 |\n| freeing items        | 0.000089 | 0.000010 |   0.000014 |\n| logging slow query   | 0.000019 | 0.000009 |   0.000010 |\n| cleaning up          | 0.000005 | 0.000003 |   0.000002 |\n+----------------------+----------+----------+------------+\n7 rows in set (0.00 sec)\n', 'http://dev.mysql.com/doc/refman/5.1/en/show-profiles.html'),
(80, 'UPDATE', 27, 'Syntax:\nSingle-table syntax:\n\nUPDATE [LOW_PRIORITY] [IGNORE] tbl_name\n    SET col_name1={expr1|DEFAULT} [, col_name2={expr2|DEFAULT}] ...\n    [WHERE where_condition]\n    [ORDER BY ...]\n    [LIMIT row_count]\n\nMultiple-table syntax:\n\nUPDATE [LOW_PRIORITY] [IGNORE] table_references\n    SET col_name1={expr1|DEFAULT} [, col_name2={expr2|DEFAULT}] ...\n    [WHERE where_condition]\n\nFor the single-table syntax, the UPDATE statement updates columns of\nexisting rows in tbl_name with new values. The SET clause indicates\nwhich columns to modify and the values they should be given. Each value\ncan be given as an expression, or the keyword DEFAULT to set a column\nexplicitly to its default value. The WHERE clause, if given, specifies\nthe conditions that identify which rows to update. With no WHERE\nclause, all rows are updated. If the ORDER BY clause is specified, the\nrows are updated in the order that is specified. The LIMIT clause\nplaces a limit on the number of rows that can be updated.\n\nFor the multiple-table syntax, UPDATE updates rows in each table named\nin table_references that satisfy the conditions. In this case, ORDER BY\nand LIMIT cannot be used.\n\nwhere_condition is an expression that evaluates to true for each row to\nbe updated. It is specified as described in\nhttp://dev.mysql.com/doc/refman/5.1/en/select.html.\n\nThe UPDATE statement supports the following modifiers:\n\no If you use the LOW_PRIORITY keyword, execution of the UPDATE is\n  delayed until no other clients are reading from the table. This\n  affects only storage engines that use only table-level locking\n  (MyISAM, MEMORY, MERGE).\n\no If you use the IGNORE keyword, the update statement does not abort\n  even if errors occur during the update. Rows for which duplicate-key\n  conflicts occur are not updated. Rows for which columns are updated\n  to values that would cause data conversion errors are updated to the\n  closest valid values instead.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/update.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/update.html'),
(81, 'IS NOT NULL', 18, 'Syntax:\nIS NOT NULL\n\nTests whether a value is not NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 1 IS NOT NULL, 0 IS NOT NULL, NULL IS NOT NULL;\n        -> 1, 1, 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(82, 'CASE STATEMENT', 23, 'Syntax:\nCASE case_value\n    WHEN when_value THEN statement_list\n    [WHEN when_value THEN statement_list] ...\n    [ELSE statement_list]\nEND CASE\n\nOr:\n\nCASE\n    WHEN search_condition THEN statement_list\n    [WHEN search_condition THEN statement_list] ...\n    [ELSE statement_list]\nEND CASE\n\nThe CASE statement for stored programs implements a complex conditional\nconstruct. If a search_condition evaluates to true, the corresponding\nSQL statement list is executed. If no search condition matches, the\nstatement list in the ELSE clause is executed. Each statement_list\nconsists of one or more statements.\n\nIf no when_value or search_condition matches the value tested and the\nCASE statement contains no ELSE clause, a Case not found for CASE\nstatement error results.\n\nEach statement_list consists of one or more statements; an empty\nstatement_list is not allowed. To handle situations where no value is\nmatched by any WHEN clause, use an ELSE containing an empty BEGIN ...\nEND block, as shown in this example: DELIMITER | CREATE PROCEDURE p()\nBEGIN DECLARE v INT DEFAULT 1; CASE v WHEN 2 THEN SELECT v; WHEN 3 THEN\nSELECT 0; ELSE BEGIN END; END CASE; END; | (The indentation used here\nin the ELSE clause is for purposes of clarity only, and is not\notherwise significant.)\n\n*Note*: The syntax of the CASE statement used inside stored programs\ndiffers slightly from that of the SQL CASE expression described in\nhttp://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html. The\nCASE statement cannot have an ELSE NULL clause, and it is terminated\nwith END CASE instead of END.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/case-statement.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/case-statement.html'),
(83, 'EXECUTE STATEMENT', 27, 'Syntax:\nEXECUTE stmt_name [USING @var_name [, @var_name] ...]\n\nAfter preparing a statement, you execute it with an EXECUTE statement\nthat refers to the prepared statement name. If the prepared statement\ncontains any parameter markers, you must supply a USING clause that\nlists user variables containing the values to be bound to the\nparameters. Parameter values can be supplied only by user variables,\nand the USING clause must name exactly as many variables as the number\nof parameter markers in the statement.\n\nYou can execute a given prepared statement multiple times, passing\ndifferent variables to it or setting the variables to different values\nbefore each execution.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-prepared-statements.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-prepared-statements.html'),
(84, 'DROP INDEX', 38, 'Syntax:\nDROP [ONLINE|OFFLINE] INDEX index_name ON tbl_name\n\nDROP INDEX drops the index named index_name from the table tbl_name.\nThis statement is mapped to an ALTER TABLE statement to drop the index.\nSee [HELP ALTER TABLE].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-index.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-index.html'),
(85, 'MATCH AGAINST', 36, 'Syntax:\nMATCH (col1,col2,...) AGAINST (expr [search_modifier])\n\nMySQL has support for full-text indexing and searching:\n\no A full-text index in MySQL is an index of type FULLTEXT.\n\no Full-text indexes can be used only with MyISAM tables, and can be\n  created only for CHAR, VARCHAR, or TEXT columns.\n\no A FULLTEXT index definition can be given in the CREATE TABLE\n  statement when a table is created, or added later using ALTER TABLE\n  or CREATE INDEX.\n\no For large data sets, it is much faster to load your data into a table\n  that has no FULLTEXT index and then create the index after that, than\n  to load data into a table that has an existing FULLTEXT index.\n\nFull-text searching is performed using MATCH() ... AGAINST syntax.\nMATCH() takes a comma-separated list that names the columns to be\nsearched. AGAINST takes a string to search for, and an optional\nmodifier that indicates what type of search to perform. The search\nstring must be a literal string, not a variable or a column name. There\nare three types of full-text searches:\n\no A boolean search interprets the search string using the rules of a\n  special query language. The string contains the words to search for.\n  It can also contain operators that specify requirements such that a\n  word must be present or absent in matching rows, or that it should be\n  weighted higher or lower than usual. Common words such as "some" or\n  "then" are stopwords and do not match if present in the search\n  string. The IN BOOLEAN MODE modifier specifies a boolean search. For\n  more information, see\n  http://dev.mysql.com/doc/refman/5.1/en/fulltext-boolean.html.\n\no A natural language search interprets the search string as a phrase in\n  natural human language (a phrase in free text). There are no special\n  operators. The stopword list applies. In addition, words that are\n  present in 50% or more of the rows are considered common and do not\n  match. Full-text searches are natural language searches if the IN\n  NATURAL LANGUAGE MODE modifier is given or if no modifier is given.\n\no A query expansion search is a modification of a natural language\n  search. The search string is used to perform a natural language\n  search. Then words from the most relevant rows returned by the search\n  are added to the search string and the search is done again. The\n  query returns the rows from the second search. The IN NATURAL\n  LANGUAGE MODE WITH QUERY EXPANSION or WITH QUERY EXPANSION modifier\n  specifies a query expansion search. For more information, see\n  http://dev.mysql.com/doc/refman/5.1/en/fulltext-query-expansion.html.\n\nThe IN NATURAL LANGUAGE MODE and IN NATURAL LANGUAGE MODE WITH QUERY\nEXPANSION modifiers were added in MySQL 5.1.7.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/fulltext-search.html\n\n', 'mysql> SELECT id, body, MATCH (title,body) AGAINST\n    -> (''Security implications of running MySQL as root''\n    -> IN NATURAL LANGUAGE MODE) AS score\n    -> FROM articles WHERE MATCH (title,body) AGAINST\n    -> (''Security implications of running MySQL as root''\n    -> IN NATURAL LANGUAGE MODE);\n+----+-------------------------------------+-----------------+\n| id | body                                | score           |\n+----+-------------------------------------+-----------------+\n|  4 | 1. Never run mysqld as root. 2. ... | 1.5219271183014 |\n|  6 | When configured properly, MySQL ... | 1.3114095926285 |\n+----+-------------------------------------+-----------------+\n2 rows in set (0.00 sec)\n', 'http://dev.mysql.com/doc/refman/5.1/en/fulltext-search.html'),
(86, 'CREATE EVENT', 38, 'Syntax:\nCREATE \n    [DEFINER = { user | CURRENT_USER }]\n    EVENT \n    [IF NOT EXISTS]\n    event_name    \n    ON SCHEDULE schedule\n    [ON COMPLETION [NOT] PRESERVE]\n    [ENABLE | DISABLE | DISABLE ON SLAVE]\n    [COMMENT ''comment'']\n    DO sql_statement;\n\nschedule:\n    AT timestamp [+ INTERVAL interval] ...\n  | EVERY interval \n    [STARTS timestamp [+ INTERVAL interval] ...] \n    [ENDS timestamp [+ INTERVAL interval] ...]\n\ninterval:\n    quantity {YEAR | QUARTER | MONTH | DAY | HOUR | MINUTE |\n              WEEK | SECOND | YEAR_MONTH | DAY_HOUR | DAY_MINUTE |\n              DAY_SECOND | HOUR_MINUTE | HOUR_SECOND | MINUTE_SECOND}\n\nThis statement creates and schedules a new event. The minimum\nrequirements for a valid CREATE EVENT statement are as follows:\n\no The keywords CREATE EVENT plus an event name, which uniquely\n  identifies the event in the current schema. (Prior to MySQL 5.1.12,\n  the event name needed to be unique only among events created by the\n  same user on a given database.)\n\no An ON SCHEDULE clause, which determines when and how often the event\n  executes.\n\no A DO clause, which contains the SQL statement to be executed by an\n  event.\n\nThis is an example of a minimal CREATE EVENT statement:\n\nCREATE EVENT myevent\n    ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 HOUR\n    DO\n      UPDATE myschema.mytable SET mycol = mycol + 1;\n\nThe previous statement creates an event named myevent. This event\nexecutes once --- one hour following its creation --- by running an SQL\nstatement that increments the value of the myschema.mytable table''s\nmycol column by 1.\n\nThe event_name must be a valid MySQL identifier with a maximum length\nof 64 characters. It may be delimited using back ticks, and may be\nqualified with the name of a database schema. An event is associated\nwith both a MySQL user (the definer) and a schema, and its name must be\nunique among names of events within that schema. In general, the rules\ngoverning event names are the same as those for names of stored\nroutines. See http://dev.mysql.com/doc/refman/5.1/en/identifiers.html.\n\nIf no schema is indicated as part of event_name, the default (current)\nschema is assumed.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-event.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-event.html'),
(87, 'ABS', 4, 'Syntax:\nABS(X)\n\nReturns the absolute value of X.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT ABS(2);\n        -> 2\nmysql> SELECT ABS(-32);\n        -> 32\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(88, 'POLYFROMWKB', 32, 'PolyFromWKB(wkb[,srid]), PolygonFromWKB(wkb[,srid])\n\nConstructs a POLYGON value using its WKB representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions'),
(89, 'NOT LIKE', 36, 'Syntax:\nexpr NOT LIKE pat [ESCAPE ''escape_char'']\n\nThis is the same as NOT (expr LIKE pat [ESCAPE ''escape_char'']).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html'),
(90, 'SPACE', 36, 'Syntax:\nSPACE(N)\n\nReturns a string consisting of N space characters.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT SPACE(6);\n        -> ''      ''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(91, 'MBR DEFINITION', 6, 'Its MBR (Minimum Bounding Rectangle), or Envelope. This is the bounding\ngeometry, formed by the minimum and maximum (X,Y) coordinates:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/gis-class-geometry.html\n\n', '((MINX MINY, MAXX MINY, MAXX MAXY, MINX MAXY, MINX MINY))\n', 'http://dev.mysql.com/doc/refman/5.1/en/gis-class-geometry.html'),
(92, 'GEOMETRYCOLLECTION', 24, 'GeometryCollection(g1,g2,...)\n\nConstructs a WKB GeometryCollection. If any argument is not a\nwell-formed WKB representation of a geometry, the return value is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions'),
(93, 'MAX', 16, 'Syntax:\nMAX([DISTINCT] expr)\n\nReturns the maximum value of expr. MAX() may take a string argument; in\nsuch cases, it returns the maximum string value. See\nhttp://dev.mysql.com/doc/refman/5.1/en/mysql-indexes.html. The DISTINCT\nkeyword can be used to find the maximum of the distinct values of expr,\nhowever, this produces the same result as omitting DISTINCT.\n\nMAX() returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', 'mysql> SELECT student_name, MIN(test_score), MAX(test_score)\n    ->        FROM student\n    ->        GROUP BY student_name;\n', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(94, 'CREATE FUNCTION UDF', 22, 'Syntax:\nCREATE [AGGREGATE] FUNCTION function_name RETURNS {STRING|INTEGER|REAL|DECIMAL}\n    SONAME shared_library_name\n\nA user-defined function (UDF) is a way to extend MySQL with a new\nfunction that works like a native (built-in) MySQL function such as\nABS() or CONCAT().\n\nfunction_name is the name that should be used in SQL statements to\ninvoke the function. The RETURNS clause indicates the type of the\nfunction''s return value. DECIMAL is a legal value after RETURNS, but\ncurrently DECIMAL functions return string values and should be written\nlike STRING functions.\n\nshared_library_name is the basename of the shared object file that\ncontains the code that implements the function. The file must be\nlocated in the plugin directory. This directory is given by the value\nof the plugin_dir system variable.\n\n*Note*: This is a change in MySQL 5.1. For earlier versions of MySQL,\nthe shared object can be located in any directory that is searched by\nyour system''s dynamic linker.\n\nTo create a function, you must have the INSERT privilege for the mysql\ndatabase. This is necessary because CREATE FUNCTION adds a row to the\nmysql.func system table that records the function''s name, type, and\nshared library name. If you do not have this table, you should run the\nmysql_upgrade command to create it. See\nhttp://dev.mysql.com/doc/refman/5.1/en/mysql-upgrade.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-function-udf.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-function-udf.html'),
(95, '*', 4, 'Syntax:\n*\n\nMultiplication:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html\n\n', 'mysql> SELECT 3*5;\n        -> 15\nmysql> SELECT 18014398509481984*18014398509481984.0;\n        -> 324518553658426726783156020576256.0\nmysql> SELECT 18014398509481984*18014398509481984;\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html'),
(96, 'TIMESTAMP', 21, 'TIMESTAMP\n\nA timestamp. The range is ''1970-01-01 00:00:01'' UTC to ''2038-01-09\n03:14:07'' UTC. TIMESTAMP values are stored as the number of seconds\nsince the epoch (''1970-01-01 00:00:00'' UTC). A TIMESTAMP cannot\nrepresent the value ''1970-01-01 00:00:00'' because that is equivalent to\n0 seconds from the epoch and the value 0 is reserved for representing\n''0000-00-00 00:00:00'', the "zero" TIMESTAMP value.\n\nA TIMESTAMP column is useful for recording the date and time of an\nINSERT or UPDATE operation. By default, the first TIMESTAMP column in a\ntable is automatically set to the date and time of the most recent\noperation if you do not assign it a value yourself. You can also set\nany TIMESTAMP column to the current date and time by assigning it a\nNULL value. Variations on automatic initialization and update\nproperties are described in\nhttp://dev.mysql.com/doc/refman/5.1/en/timestamp.html.\n\nA TIMESTAMP value is returned as a string in the format ''YYYY-MM-DD\nHH:MM:SS'' with a display width fixed at 19 characters. To obtain the\nvalue as a number, you should add +0 to the timestamp column.\n\n*Note*: The TIMESTAMP format that was used prior to MySQL 4.1 is not\nsupported in MySQL 5.1; see MySQL 3.23, 4.0, 4.1 Reference Manual for\ninformation regarding the old format.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html'),
(97, 'DES_DECRYPT', 11, 'Syntax:\nDES_DECRYPT(crypt_str[,key_str])\n\nDecrypts a string encrypted with DES_ENCRYPT(). If an error occurs,\nthis function returns NULL.\n\nThis function works only if MySQL has been configured with SSL support.\nSee http://dev.mysql.com/doc/refman/5.1/en/secure-connections.html.\n\nIf no key_str argument is given, DES_DECRYPT() examines the first byte\nof the encrypted string to determine the DES key number that was used\nto encrypt the original string, and then reads the key from the DES key\nfile to decrypt the message. For this to work, the user must have the\nSUPER privilege. The key file can be specified with the --des-key-file\nserver option.\n\nIf you pass this function a key_str argument, that string is used as\nthe key for decrypting the message.\n\nIf the crypt_str argument does not appear to be an encrypted string,\nMySQL returns the given crypt_str.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(98, 'CACHE INDEX', 27, 'Syntax:\nCACHE INDEX\n  tbl_index_list [, tbl_index_list] ...\n  IN key_cache_name\n\ntbl_index_list:\n  tbl_name [[INDEX|KEY] (index_name[, index_name] ...)]\n\nThe CACHE INDEX statement assigns table indexes to a specific key\ncache. It is used only for MyISAM tables.\n\nThe following statement assigns indexes from the tables t1, t2, and t3\nto the key cache named hot_cache:\n\nmysql> CACHE INDEX t1, t2, t3 IN hot_cache;\n+---------+--------------------+----------+----------+\n| Table   | Op                 | Msg_type | Msg_text |\n+---------+--------------------+----------+----------+\n| test.t1 | assign_to_keycache | status   | OK       |\n| test.t2 | assign_to_keycache | status   | OK       |\n| test.t3 | assign_to_keycache | status   | OK       |\n+---------+--------------------+----------+----------+\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/cache-index.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/cache-index.html'),
(99, 'ENDPOINT', 12, 'EndPoint(ls)\n\nReturns the Point that is the endpoint of the LineString value ls.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions\n\n', 'mysql> SET @ls = ''LineString(1 1,2 2,3 3)'';\nmysql> SELECT AsText(EndPoint(GeomFromText(@ls)));\n+-------------------------------------+\n| AsText(EndPoint(GeomFromText(@ls))) |\n+-------------------------------------+\n| POINT(3 3)                          |\n+-------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions'),
(100, 'COMPRESS', 11, 'Syntax:\nCOMPRESS(string_to_compress)\n\nCompresses a string and returns the result as a binary string. This\nfunction requires MySQL to have been compiled with a compression\nlibrary such as zlib. Otherwise, the return value is always NULL. The\ncompressed string can be uncompressed with UNCOMPRESS().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', 'mysql> SELECT LENGTH(COMPRESS(REPEAT(''a'',1000)));\n        -> 21\nmysql> SELECT LENGTH(COMPRESS(''''));\n        -> 0\nmysql> SELECT LENGTH(COMPRESS(''a''));\n        -> 13\nmysql> SELECT LENGTH(COMPRESS(REPEAT(''a'',16)));\n        -> 15\n', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(101, 'INSERT', 27, 'Syntax:\nINSERT [LOW_PRIORITY | DELAYED | HIGH_PRIORITY] [IGNORE]\n    [INTO] tbl_name [(col_name,...)]\n    {VALUES | VALUE} ({expr | DEFAULT},...),(...),...\n    [ ON DUPLICATE KEY UPDATE\n      col_name=expr\n        [, col_name=expr] ... ]\n\nOr:\n\nINSERT [LOW_PRIORITY | DELAYED | HIGH_PRIORITY] [IGNORE]\n    [INTO] tbl_name\n    SET col_name={expr | DEFAULT}, ...\n    [ ON DUPLICATE KEY UPDATE\n      col_name=expr\n        [, col_name=expr] ... ]\n\nOr:\n\nINSERT [LOW_PRIORITY | HIGH_PRIORITY] [IGNORE]\n    [INTO] tbl_name [(col_name,...)]\n    SELECT ...\n    [ ON DUPLICATE KEY UPDATE\n      col_name=expr\n        [, col_name=expr] ... ]\n\nINSERT inserts new rows into an existing table. The INSERT ... VALUES\nand INSERT ... SET forms of the statement insert rows based on\nexplicitly specified values. The INSERT ... SELECT form inserts rows\nselected from another table or tables. INSERT ... SELECT is discussed\nfurther in [HELP INSERT SELECT].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/insert.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/insert.html'),
(102, 'COUNT', 16, 'Syntax:\nCOUNT(expr)\n\nReturns a count of the number of non-NULL values of expr in the rows\nretrieved by a SELECT statement. The result is a BIGINT value.\n\nCOUNT() returns 0 if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', 'mysql> SELECT student.student_name,COUNT(*)\n    ->        FROM student,course\n    ->        WHERE student.student_id=course.student_id\n    ->        GROUP BY student_name;\n', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(103, 'HANDLER', 27, 'Syntax:\nHANDLER tbl_name OPEN [ [AS] alias]\nHANDLER tbl_name READ index_name { = | >= | <= | < } (value1,value2,...)\n    [ WHERE where_condition ] [LIMIT ... ]\nHANDLER tbl_name READ index_name { FIRST | NEXT | PREV | LAST }\n    [ WHERE where_condition ] [LIMIT ... ]\nHANDLER tbl_name READ { FIRST | NEXT }\n    [ WHERE where_condition ] [LIMIT ... ]\nHANDLER tbl_name CLOSE\n\nThe HANDLER statement provides direct access to table storage engine\ninterfaces. It is available for MyISAM and InnoDB tables.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/handler.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/handler.html'),
(104, 'MLINEFROMTEXT', 3, 'MLineFromText(wkt[,srid]), MultiLineStringFromText(wkt[,srid])\n\nConstructs a MULTILINESTRING value using its WKT representation and\nSRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions'),
(105, 'GEOMCOLLFROMWKB', 32, 'GeomCollFromWKB(wkb[,srid]), GeometryCollectionFromWKB(wkb[,srid])\n\nConstructs a GEOMETRYCOLLECTION value using its WKB representation and\nSRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions'),
(106, 'RENAME TABLE', 38, 'Syntax:\nRENAME TABLE tbl_name TO new_tbl_name\n    [, tbl_name2 TO new_tbl_name2] ...\n\nThis statement renames one or more tables.\n\nThe rename operation is done atomically, which means that no other\nthread can access any of the tables while the rename is running. For\nexample, if you have an existing table old_table, you can create\nanother table new_table that has the same structure but is empty, and\nthen replace the existing table with the empty one as follows (assuming\nthat backup_table does not already exist):\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/rename-table.html\n\n', 'CREATE TABLE new_table (...);\nRENAME TABLE old_table TO backup_table, new_table TO old_table;\n', 'http://dev.mysql.com/doc/refman/5.1/en/rename-table.html'),
(107, 'BOOLEAN', 21, 'BOOL, BOOLEAN\n\nThese types are synonyms for TINYINT(1). A value of zero is considered\nfalse. Non-zero values are considered true:\n\nmysql> SELECT IF(0, ''true'', ''false'');\n+------------------------+\n| IF(0, ''true'', ''false'') |\n+------------------------+\n| false                  |\n+------------------------+\n\nmysql> SELECT IF(1, ''true'', ''false'');\n+------------------------+\n| IF(1, ''true'', ''false'') |\n+------------------------+\n| true                   |\n+------------------------+\n\nmysql> SELECT IF(2, ''true'', ''false'');\n+------------------------+\n| IF(2, ''true'', ''false'') |\n+------------------------+\n| true                   |\n+------------------------+\n\nHowever, the values TRUE and FALSE are merely aliases for 1 and 0,\nrespectively, as shown here:\n\nmysql> SELECT IF(0 = FALSE, ''true'', ''false'');\n+--------------------------------+\n| IF(0 = FALSE, ''true'', ''false'') |\n+--------------------------------+\n| true                           |\n+--------------------------------+\n\nmysql> SELECT IF(1 = TRUE, ''true'', ''false'');\n+-------------------------------+\n| IF(1 = TRUE, ''true'', ''false'') |\n+-------------------------------+\n| true                          |\n+-------------------------------+\n\nmysql> SELECT IF(2 = TRUE, ''true'', ''false'');\n+-------------------------------+\n| IF(2 = TRUE, ''true'', ''false'') |\n+-------------------------------+\n| false                         |\n+-------------------------------+\n\nmysql> SELECT IF(2 = FALSE, ''true'', ''false'');\n+--------------------------------+\n| IF(2 = FALSE, ''true'', ''false'') |\n+--------------------------------+\n| false                          |\n+--------------------------------+\n\nThe last two statements display the results shown because 2 is equal to\nneither 1 nor 0.\n\nWe intend to implement full boolean type handling, in accordance with\nstandard SQL, in a future MySQL release.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(108, 'DEFAULT', 14, 'Syntax:\nDEFAULT(col_name)\n\nReturns the default value for a table column. An error results if the\ncolumn has no default value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', 'mysql> UPDATE t SET i = DEFAULT(i)+1 WHERE id < 100;\n', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(109, 'MOD', 4, 'Syntax:\nMOD(N,M), N % M, N MOD M\n\nModulo operation. Returns the remainder of N divided by M.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT MOD(234, 10);\n        -> 4\nmysql> SELECT 253 % 7;\n        -> 1\nmysql> SELECT MOD(29,9);\n        -> 2\nmysql> SELECT 29 MOD 9;\n        -> 2\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(110, 'TINYTEXT', 21, 'TINYTEXT [CHARACTER SET charset_name] [COLLATE collation_name]\n\nA TEXT column with a maximum length of 255 (28 - 1) characters. The\neffective maximum length is less if the value contains multi-byte\ncharacters. Each TINYTEXT value is stored using a one-byte length\nprefix that indicates the number of bytes in the value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(111, 'OPTIMIZE TABLE', 20, 'Syntax:\nOPTIMIZE [LOCAL | NO_WRITE_TO_BINLOG] TABLE tbl_name [, tbl_name] ...\n\nOPTIMIZE TABLE should be used if you have deleted a large part of a\ntable or if you have made many changes to a table with variable-length\nrows (tables that have VARCHAR, VARBINARY, BLOB, or TEXT columns).\nDeleted rows are maintained in a linked list and subsequent INSERT\noperations reuse old row positions. You can use OPTIMIZE TABLE to\nreclaim the unused space and to defragment the data file.\n\nThis statement requires SELECT and INSERT privileges for the table.\n\nOPTIMIZE TABLE is not supported for partitioned tables. See\nhttp://dev.mysql.com/doc/refman/5.1/en/partitioning-maintenance.html,\nfor information about alternatives.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/optimize-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/optimize-table.html'),
(112, 'DECODE', 11, 'Syntax:\nDECODE(crypt_str,pass_str)\n\nDecrypts the encrypted string crypt_str using pass_str as the password.\ncrypt_str should be a string returned from ENCODE().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html');
INSERT INTO `help_topic` (`help_topic_id`, `name`, `help_category_id`, `description`, `example`, `url`) VALUES
(113, '<=>', 18, 'Syntax:\n<=>\n\nNULL-safe equal. This operator performs an equality comparison like the\n= operator, but returns 1 rather than NULL if both operands are NULL,\nand 0 rather than NULL if one operand is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 1 <=> 1, NULL <=> NULL, 1 <=> NULL;\n        -> 1, 1, 0\nmysql> SELECT 1 = 1, NULL = NULL, 1 = NULL;\n        -> 1, NULL, NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(114, 'LOAD DATA FROM MASTER', 27, 'Syntax:\nLOAD DATA FROM MASTER\n\nThis feature is deprecated. We recommend not using it anymore. It is\nsubject to removal in a future version of MySQL.\n\nSince the current implementation of LOAD DATA FROM MASTER and LOAD\nTABLE FROM MASTER is very limited, these statements are deprecated in\nversions 4.1 of MySQL and above. We will introduce a more advanced\ntechnique (called "online backup") in a future version. That technique\nwill have the additional advantage of working with more storage\nengines.\n\nFor MySQL 5.1 and earlier, the recommended alternative solution to\nusing LOAD DATA FROM MASTER or LOAD TABLE FROM MASTER is using\nmysqldump or mysqlhotcopy. The latter requires Perl and two Perl\nmodules (DBI and DBD:mysql) and works for MyISAM and ARCHIVE tables\nonly. With mysqldump, you can create SQL dumps on the master and pipe\n(or copy) these to a mysql client on the slave. This has the advantage\nof working for all storage engines, but can be quite slow, since it\nworks using SELECT.\n\nThis statement takes a snapshot of the master and copies it to the\nslave. It updates the values of MASTER_LOG_FILE and MASTER_LOG_POS so\nthat the slave starts replicating from the correct position. Any table\nand database exclusion rules specified with the --replicate-*-do-* and\n--replicate-*-ignore-* options are honored. --replicate-rewrite-db is\nnot taken into account because a user could use this option to set up a\nnon-unique mapping such as --replicate-rewrite-db="db1->db3" and\n--replicate-rewrite-db="db2->db3", which would confuse the slave when\nloading tables from the master.\n\nUse of this statement is subject to the following conditions:\n\no It works only for MyISAM tables. Attempting to load a non-MyISAM\n  table results in the following error:\n\nERROR 1189 (08S01): Net error reading from master\n\no It acquires a global read lock on the master while taking the\n  snapshot, which prevents updates on the master during the load\n  operation.\n\nIf you are loading large tables, you might have to increase the values\nof net_read_timeout and net_write_timeout on both the master and slave\nservers. See\nhttp://dev.mysql.com/doc/refman/5.1/en/server-system-variables.html.\n\nNote that LOAD DATA FROM MASTER does not copy any tables from the mysql\ndatabase. This makes it easy to have different users and privileges on\nthe master and the slave.\n\nTo use LOAD DATA FROM MASTER, the replication account that is used to\nconnect to the master must have the RELOAD and SUPER privileges on the\nmaster and the SELECT privilege for all master tables you want to load.\nAll master tables for which the user does not have the SELECT privilege\nare ignored by LOAD DATA FROM MASTER. This is because the master hides\nthem from the user: LOAD DATA FROM MASTER calls SHOW DATABASES to know\nthe master databases to load, but SHOW DATABASES returns only databases\nfor which the user has some privilege. See [HELP SHOW DATABASES]. On\nthe slave side, the user that issues LOAD DATA FROM MASTER must have\nprivileges for dropping and creating the databases and tables that are\ncopied.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/load-data-from-master.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/load-data-from-master.html'),
(115, 'RESET', 27, 'Syntax:\nRESET reset_option [, reset_option] ...\n\nThe RESET statement is used to clear the state of various server\noperations. You must have the RELOAD privilege to execute RESET.\n\nRESET acts as a stronger version of the FLUSH statement. See [HELP\nFLUSH].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/reset.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/reset.html'),
(116, 'HELP STATEMENT', 28, 'Syntax:\nHELP ''search_string''\n\nThe HELP statement returns online information from the MySQL Reference\nmanual. Its proper operation requires that the help tables in the mysql\ndatabase be initialized with help topic information (see\nhttp://dev.mysql.com/doc/refman/5.1/en/server-side-help-support.html).\n\nThe HELP statement searches the help tables for the given search string\nand displays the result of the search. The search string is not case\nsensitive.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/help.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/help.html'),
(117, 'GET_LOCK', 14, 'Syntax:\nGET_LOCK(str,timeout)\n\nTries to obtain a lock with a name given by the string str, using a\ntimeout of timeout seconds. Returns 1 if the lock was obtained\nsuccessfully, 0 if the attempt timed out (for example, because another\nclient has previously locked the name), or NULL if an error occurred\n(such as running out of memory or the thread was killed with mysqladmin\nkill). If you have a lock obtained with GET_LOCK(), it is released when\nyou execute RELEASE_LOCK(), execute a new GET_LOCK(), or your\nconnection terminates (either normally or abnormally). Locks obtained\nwith GET_LOCK() do not interact with transactions. That is, committing\na transaction does not release any such locks obtained during the\ntransaction.\n\nThis function can be used to implement application locks or to simulate\nrecord locks. Names are locked on a server-wide basis. If a name has\nbeen locked by one client, GET_LOCK() blocks any request by another\nclient for a lock with the same name. This allows clients that agree on\na given lock name to use the name to perform cooperative advisory\nlocking. But be aware that it also allows a client that is not among\nthe set of cooperating clients to lock a name, either inadvertently or\ndeliberately, and thus prevent any of the cooperating clients from\nlocking that name. One way to reduce the likelihood of this is to use\nlock names that are database-specific or application-specific. For\nexample, use lock names of the form db_name.str or app_name.str.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', 'mysql> SELECT GET_LOCK(''lock1'',10);\n        -> 1\nmysql> SELECT IS_FREE_LOCK(''lock2'');\n        -> 1\nmysql> SELECT GET_LOCK(''lock2'',10);\n        -> 1\nmysql> SELECT RELEASE_LOCK(''lock2'');\n        -> 1\nmysql> SELECT RELEASE_LOCK(''lock1'');\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(118, 'UCASE', 36, 'Syntax:\nUCASE(str)\n\nUCASE() is a synonym for UPPER().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(119, 'SHOW BINLOG EVENTS', 27, 'Syntax:\nSHOW BINLOG EVENTS\n   [IN ''log_name''] [FROM pos] [LIMIT [offset,] row_count]\n\nShows the events in the binary log. If you do not specify ''log_name'',\nthe first binary log is displayed.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-binlog-events.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-binlog-events.html'),
(120, 'MPOLYFROMWKB', 32, 'MPolyFromWKB(wkb[,srid]), MultiPolygonFromWKB(wkb[,srid])\n\nConstructs a MULTIPOLYGON value using its WKB representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions'),
(121, 'ITERATE', 23, 'Syntax:\nITERATE label\n\nITERATE can appear only within LOOP, REPEAT, and WHILE statements.\nITERATE means "do the loop again."\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/iterate-statement.html\n\n', 'CREATE PROCEDURE doiterate(p1 INT)\nBEGIN\n  label1: LOOP\n    SET p1 = p1 + 1;\n    IF p1 < 10 THEN ITERATE label1; END IF;\n    LEAVE label1;\n  END LOOP label1;\n  SET @x = p1;\nEND\n', 'http://dev.mysql.com/doc/refman/5.1/en/iterate-statement.html'),
(122, 'DO', 27, 'Syntax:\nDO expr [, expr] ...\n\nDO executes the expressions but does not return any results. In most\nrespects, DO is shorthand for SELECT expr, ..., but has the advantage\nthat it is slightly faster when you do not care about the result.\n\nDO is useful primarily with functions that have side effects, such as\nRELEASE_LOCK().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/do.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/do.html'),
(123, 'CURTIME', 31, 'Syntax:\nCURTIME()\n\nReturns the current time as a value in ''HH:MM:SS'' or HHMMSS.uuuuuu\nformat, depending on whether the function is used in a string or\nnumeric context. The value is expressed in the current time zone.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT CURTIME();\n        -> ''23:50:26''\nmysql> SELECT CURTIME() + 0;\n        -> 235026.000000\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(124, 'CHAR_LENGTH', 36, 'Syntax:\nCHAR_LENGTH(str)\n\nReturns the length of the string str, measured in characters. A\nmulti-byte character counts as a single character. This means that for\na string containing five two-byte characters, LENGTH() returns 10,\nwhereas CHAR_LENGTH() returns 5.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(125, 'BIGINT', 21, 'BIGINT[(M)] [UNSIGNED] [ZEROFILL]\n\nA large integer. The signed range is -9223372036854775808 to\n9223372036854775807. The unsigned range is 0 to 18446744073709551615.\n\nSERIAL is an alias for BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(126, 'SET', 27, 'Syntax:\nSET variable_assignment [, variable_assignment] ...\n\nvariable_assignment:\n      user_var_name = expr\n    | [GLOBAL | SESSION] system_var_name = expr\n    | [@@global. | @@session. | @@]system_var_name = expr\n\nThe SET statement assigns values to different types of variables that\naffect the operation of the server or your client. Older versions of\nMySQL employed SET OPTION, but this syntax is deprecated in favor of\nSET without OPTION.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/set-option.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/set-option.html'),
(127, 'CONV', 4, 'Syntax:\nCONV(N,from_base,to_base)\n\nConverts numbers between different number bases. Returns a string\nrepresentation of the number N, converted from base from_base to base\nto_base. Returns NULL if any argument is NULL. The argument N is\ninterpreted as an integer, but may be specified as an integer or a\nstring. The minimum base is 2 and the maximum base is 36. If to_base is\na negative number, N is regarded as a signed number. Otherwise, N is\ntreated as unsigned. CONV() works with 64-bit precision.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT CONV(''a'',16,2);\n        -> ''1010''\nmysql> SELECT CONV(''6E'',18,8);\n        -> ''172''\nmysql> SELECT CONV(-17,10,-18);\n        -> ''-H''\nmysql> SELECT CONV(10+''10''+''10''+0xa,10,10);\n        -> ''40''\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(128, 'DATE', 21, 'DATE\n\nA date. The supported range is ''1000-01-01'' to ''9999-12-31''. MySQL\ndisplays DATE values in ''YYYY-MM-DD'' format, but allows assignment of\nvalues to DATE columns using either strings or numbers.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html'),
(129, 'SHOW OPEN TABLES', 27, 'Syntax:\nSHOW OPEN TABLES [FROM db_name]\n    [LIKE ''pattern'' | WHERE expr]\n\nSHOW OPEN TABLES lists the non-TEMPORARY tables that are currently open\nin the table cache. See\nhttp://dev.mysql.com/doc/refman/5.1/en/table-cache.html. The WHERE\nclause can be given to select rows using more general conditions, as\ndiscussed in http://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\n\nThe FROM and LIKE clauses may be used beginning with MySQL 5.1.24. The\nLIKE clause, if present, indicates which table names to match. The FROM\nclause, if present, restricts the tables shown to those present in the\ndb_name database.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-open-tables.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-open-tables.html'),
(130, 'EXTRACT', 31, 'Syntax:\nEXTRACT(unit FROM date)\n\nThe EXTRACT() function uses the same kinds of unit specifiers as\nDATE_ADD() or DATE_SUB(), but extracts parts from the date rather than\nperforming date arithmetic.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT EXTRACT(YEAR FROM ''2009-07-02'');\n       -> 2009\nmysql> SELECT EXTRACT(YEAR_MONTH FROM ''2009-07-02 01:02:03'');\n       -> 200907\nmysql> SELECT EXTRACT(DAY_MINUTE FROM ''2009-07-02 01:02:03'');\n       -> 20102\nmysql> SELECT EXTRACT(MICROSECOND\n    ->                FROM ''2003-01-02 10:30:00.000123'');\n        -> 123\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(131, 'ENCRYPT', 11, 'Syntax:\nENCRYPT(str[,salt])\n\nEncrypts str using the Unix crypt() system call and returns a binary\nstring. The salt argument should be a string with at least two\ncharacters. If no salt argument is given, a random value is used.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', 'mysql> SELECT ENCRYPT(''hello'');\n        -> ''VxuFAJXVARROc''\n', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(132, 'SHOW STATUS', 27, 'Syntax:\nSHOW [GLOBAL | SESSION] STATUS\n    [LIKE ''pattern'' | WHERE expr]\n\nSHOW STATUS provides server status information. This information also\ncan be obtained using the mysqladmin extended-status command. The LIKE\nclause, if present, indicates which variable names to match. The WHERE\nclause can be given to select rows using more general conditions, as\ndiscussed in http://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\nWith a LIKE clause, the statement displays only rows for those\nvariables with names that match the pattern:\n\nmysql> SHOW STATUS LIKE ''Key%'';\n+--------------------+----------+\n| Variable_name      | Value    |\n+--------------------+----------+\n| Key_blocks_used    | 14955    |\n| Key_read_requests  | 96854827 |\n| Key_reads          | 162040   |\n| Key_write_requests | 7589728  |\n| Key_writes         | 3813196  |\n+--------------------+----------+\n\nWith the GLOBAL modifier, SHOW STATUS displays the status values for\nall connections to MySQL. With SESSION, it displays the status values\nfor the current connection. If no modifier is present, the default is\nSESSION. LOCAL is a synonym for SESSION.\n\nSome status variables have only a global value. For these, you get the\nsame value for both GLOBAL and SESSION. The scope for each status\nvariable is listed at\nhttp://dev.mysql.com/doc/refman/5.1/en/server-status-variables.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-status.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-status.html'),
(133, 'EXTRACTVALUE', 36, 'Syntax:\nExtractValue(xml_frag, xpath_expr)\n\nExtractValue() takes two string arguments, a fragment of XML markup\nxml_frag and an XPath expression xpath_expr (also known as a locator);\nit returns the text (CDATA) of the first text node which is a child of\nthe element(s) matched by the XPath expression. It is the equivalent of\nperforming a match using the xpath_expr after appending /text(). In\nother words, ExtractValue(''<a><b>Sakila</b></a>'', ''/a/b'') and\nExtractValue(''<a><b>Sakila</b></a>'', ''/a/b/text()'') produce the same\nresult.\n\nIf multiple matches are found, then the content of the first child text\nnode of each matching element is returned (in the order matched) as a\nsingle, space-delimited string.\n\nIf no matching text node is found for the expression (including the\nimplicit /text()) --- for whatever reason, as long as xpath_expr is\nvalid, and xml_frag consists of elements which are properly nested and\nclosed --- an empty string is returned. No distinction is made between\na match on an empty element and no match at all. This is by design.\n\nIf you need to determine whether no matching element was found in\nxml_frag or such an element was found but contained no child text\nnodes, you should test the result of an expression that uses the XPath\ncount() function. For example, both of these statements return an empty\nstring, as shown here:\n\nmysql> SELECT ExtractValue(''<a><b/></a>'', ''/a/b'');\n+-------------------------------------+\n| ExtractValue(''<a><b/></a>'', ''/a/b'') |\n+-------------------------------------+\n|                                     |\n+-------------------------------------+\n1 row in set (0.00 sec)\n\nmysql> SELECT ExtractValue(''<a><c/></a>'', ''/a/b'');\n+-------------------------------------+\n| ExtractValue(''<a><c/></a>'', ''/a/b'') |\n+-------------------------------------+\n|                                     |\n+-------------------------------------+\n1 row in set (0.00 sec)\n\nHowever, you can determine whether there was actually a matching\nelement using the following:\n\nmysql> SELECT ExtractValue(''<a><b/></a>'', ''count(/a/b)'');\n+-------------------------------------+\n| ExtractValue(''<a><b/></a>'', ''count(/a/b)'') |\n+-------------------------------------+\n| 1                                   |\n+-------------------------------------+\n1 row in set (0.00 sec)\n\nmysql> SELECT ExtractValue(''<a><c/></a>'', ''count(/a/b)'');\n+-------------------------------------+\n| ExtractValue(''<a><c/></a>'', ''count(/a/b)'') |\n+-------------------------------------+\n| 0                                   |\n+-------------------------------------+\n1 row in set (0.01 sec)\n\n*Important*: ExtractValue() returns only CDATA, and does not return any\ntags that might be contained within a matching tag, nor any of their\ncontent (see the result returned as val1 in the following example).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/xml-functions.html\n\n', 'mysql> SELECT\n    ->   ExtractValue(''<a>ccc<b>ddd</b></a>'', ''/a'') AS val1,\n    ->   ExtractValue(''<a>ccc<b>ddd</b></a>'', ''/a/b'') AS val2,\n    ->   ExtractValue(''<a>ccc<b>ddd</b></a>'', ''//b'') AS val3,\n    ->   ExtractValue(''<a>ccc<b>ddd</b></a>'', ''/b'') AS val4,\n    ->   ExtractValue(''<a>ccc<b>ddd</b><b>eee</b></a>'', ''//b'') AS val5;\n\n+------+------+------+------+---------+\n| val1 | val2 | val3 | val4 | val5    |\n+------+------+------+------+---------+\n| ccc  | ddd  | ddd  |      | ddd eee |\n+------+------+------+------+---------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/xml-functions.html'),
(134, 'OLD_PASSWORD', 11, 'Syntax:\nOLD_PASSWORD(str)\n\nOLD_PASSWORD() was added to MySQL when the implementation of PASSWORD()\nwas changed to improve security. OLD_PASSWORD() returns the value of\nthe old (pre-4.1) implementation of PASSWORD() as a binary string, and\nis intended to permit you to reset passwords for any pre-4.1 clients\nthat need to connect to your version 5.1 MySQL server without locking\nthem out. See\nhttp://dev.mysql.com/doc/refman/5.1/en/password-hashing.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(135, 'SET VARIABLE', 23, 'Syntax:\nSET var_name = expr [, var_name = expr] ...\n\nThe SET statement in stored programs is an extended version of the\ngeneral SET statement (see [HELP SET]). Referenced variables may be\nones declared inside a stored program, global system variables, or\nuser-defined variables.\n\nThe SET statement in stored programs is implemented as part of the\npre-existing SET syntax. This allows an extended syntax of SET a=x,\nb=y, ... where different variable types (locally declared variables,\nglobal and session server variables, user-defined variables) can be\nmixed. This also allows combinations of local variables and some\noptions that make sense only for system variables; in that case, the\noptions are recognized but ignored.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/set-statement.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/set-statement.html'),
(136, 'FORMAT', 36, 'Syntax:\nFORMAT(X,D)\n\nFormats the number X to a format like ''#,###,###.##'', rounded to D\ndecimal places, and returns the result as a string. If D is 0, the\nresult has no decimal point or fractional part.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT FORMAT(12332.123456, 4);\n        -> ''12,332.1235''\nmysql> SELECT FORMAT(12332.1,4);\n        -> ''12,332.1000''\nmysql> SELECT FORMAT(12332.2,0);\n        -> ''12,332''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(137, '||', 13, 'Syntax:\nOR, ||\n\nLogical OR. When both operands are non-NULL, the result is 1 if any\noperand is non-zero, and 0 otherwise. With a NULL operand, the result\nis 1 if the other operand is non-zero, and NULL otherwise. If both\noperands are NULL, the result is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/logical-operators.html\n\n', 'mysql> SELECT 1 || 1;\n        -> 1\nmysql> SELECT 1 || 0;\n        -> 1\nmysql> SELECT 0 || 0;\n        -> 0\nmysql> SELECT 0 || NULL;\n        -> NULL\nmysql> SELECT 1 || NULL;\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/logical-operators.html'),
(138, 'BIT_LENGTH', 36, 'Syntax:\nBIT_LENGTH(str)\n\nReturns the length of the string str in bits.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT BIT_LENGTH(''text'');\n        -> 32\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(139, 'EXTERIORRING', 2, 'ExteriorRing(poly)\n\nReturns the exterior ring of the Polygon value poly as a LineString.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#polygon-property-functions\n\n', 'mysql> SET @poly =\n    -> ''Polygon((0 0,0 3,3 3,3 0,0 0),(1 1,1 2,2 2,2 1,1 1))'';\nmysql> SELECT AsText(ExteriorRing(GeomFromText(@poly)));\n+-------------------------------------------+\n| AsText(ExteriorRing(GeomFromText(@poly))) |\n+-------------------------------------------+\n| LINESTRING(0 0,0 3,3 3,3 0,0 0)           |\n+-------------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#polygon-property-functions'),
(140, 'GEOMFROMWKB', 32, 'GeomFromWKB(wkb[,srid]), GeometryFromWKB(wkb[,srid])\n\nConstructs a geometry value of any type using its WKB representation\nand SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions'),
(141, 'SHOW SLAVE HOSTS', 27, 'Syntax:\nSHOW SLAVE HOSTS\n\nDisplays a list of replication slaves currently registered with the\nmaster. Only slaves started with the --report-host=host_name option are\nvisible in this list.\n\nThe list is displayed on any server (not just the master server). The\noutput looks like this:\n\nmysql> SHOW SLAVE HOSTS;\n+------------+-----------+------+-----------+\n| Server_id  | Host      | Port | Master_id |\n+------------+-----------+------+-----------+\n|  192168010 | iconnect2 | 3306 | 192168011 |\n| 1921680101 | athena    | 3306 | 192168011 |\n+------------+-----------+------+-----------+\n\no Server_id: The unique server ID of the slave server, as configured in\n  the server''s option file, or on the command line with\n  --server-id=value.\n\no Host: The host name of the slave server, as configured in the\n  server''s option file, or on the command line with\n  --report-host=host_name. Note that this can differ from the machine\n  name as configured in the operating system.\n\no Port: The port the slave server is listening on.\n\no Master_id: The unique server ID of the master server that the slave\n  server is replicating from.\n\nSome MySQL versions report another variable, Rpl_recovery_rank. This\nvariable was never used, and was eventually removed.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-slave-hosts.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-slave-hosts.html'),
(142, 'START TRANSACTION', 8, 'Syntax:\nSTART TRANSACTION [WITH CONSISTENT SNAPSHOT] | BEGIN [WORK]\nCOMMIT [WORK] [AND [NO] CHAIN] [[NO] RELEASE]\nROLLBACK [WORK] [AND [NO] CHAIN] [[NO] RELEASE]\nSET AUTOCOMMIT = {0 | 1}\n\nThe START TRANSACTION or BEGIN statement begins a new transaction.\nCOMMIT commits the current transaction, making its changes permanent.\nROLLBACK rolls back the current transaction, canceling its changes. The\nSET AUTOCOMMIT statement disables or enables the default autocommit\nmode for the current session.\n\nThe optional WORK keyword is supported for COMMIT and ROLLBACK, as are\nthe CHAIN and RELEASE clauses. CHAIN and RELEASE can be used for\nadditional control over transaction completion. The value of the\ncompletion_type system variable determines the default completion\nbehavior. See\nhttp://dev.mysql.com/doc/refman/5.1/en/server-system-variables.html.\n\nThe AND CHAIN clause causes a new transaction to begin as soon as the\ncurrent one ends, and the new transaction has the same isolation level\nas the just-terminated transaction. The RELEASE clause causes the\nserver to disconnect the current client session after terminating the\ncurrent transaction. Including the NO keyword suppresses CHAIN or\nRELEASE completion, which can be useful if the completion_type system\nvariable is set to cause chaining or release completion by default.\n\nBy default, MySQL runs with autocommit mode enabled. This means that as\nsoon as you execute a statement that updates (modifies) a table, MySQL\nstores the update on disk to make it permanent. To disable autocommit\nmode, use the following statement:\n\nSET AUTOCOMMIT=0;\n\nAfter disabling autocommit mode by setting the AUTOCOMMIT variable to\nzero, changes to transaction-safe tables (such as those for InnoDB or\nNDBCLUSTER) are not made permanent immediately. You must use COMMIT to\nstore your changes to disk or ROLLBACK to ignore the changes.\n\nTo disable autocommit mode for a single series of statements, use the\nSTART TRANSACTION statement:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/commit.html\n\n', 'START TRANSACTION;\nSELECT @A:=SUM(salary) FROM table1 WHERE type=1;\nUPDATE table2 SET summary=@A WHERE type=1;\nCOMMIT;\n', 'http://dev.mysql.com/doc/refman/5.1/en/commit.html'),
(143, 'BETWEEN AND', 18, 'Syntax:\nexpr BETWEEN min AND max\n\nIf expr is greater than or equal to min and expr is less than or equal\nto max, BETWEEN returns 1, otherwise it returns 0. This is equivalent\nto the expression (min <= expr AND expr <= max) if all the arguments\nare of the same type. Otherwise type conversion takes place according\nto the rules described in\nhttp://dev.mysql.com/doc/refman/5.1/en/type-conversion.html, but\napplied to all the three arguments.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 1 BETWEEN 2 AND 3;\n        -> 0\nmysql> SELECT ''b'' BETWEEN ''a'' AND ''c'';\n        -> 1\nmysql> SELECT 2 BETWEEN 2 AND ''3'';\n        -> 1\nmysql> SELECT 2 BETWEEN 2 AND ''x-3'';\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(144, 'MULTIPOLYGON', 24, 'MultiPolygon(poly1,poly2,...)\n\nConstructs a WKB MultiPolygon value from a set of WKB Polygon\narguments. If any argument is not a WKB Polygon, the return value is\nNULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions'),
(145, 'TIME_FORMAT', 31, 'Syntax:\nTIME_FORMAT(time,format)\n\nThis is used like the DATE_FORMAT() function, but the format string may\ncontain format specifiers only for hours, minutes, and seconds. Other\nspecifiers produce a NULL value or 0.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT TIME_FORMAT(''100:00:00'', ''%H %k %h %I %l'');\n        -> ''100 100 04 04 4''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(146, 'LEFT', 36, 'Syntax:\nLEFT(str,len)\n\nReturns the leftmost len characters from the string str, or NULL if any\nargument is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT LEFT(''foobarbar'', 5);\n        -> ''fooba''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(147, 'FLUSH QUERY CACHE', 26, 'You can defragment the query cache to better utilize its memory with\nthe FLUSH QUERY CACHE statement. The statement does not remove any\nqueries from the cache.\n\nThe RESET QUERY CACHE statement removes all query results from the\nquery cache. The FLUSH TABLES statement also does this.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/query-cache-status-and-maintenance.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/query-cache-status-and-maintenance.html'),
(148, 'SET DATA TYPE', 21, 'SET(''value1'',''value2'',...) [CHARACTER SET charset_name] [COLLATE\ncollation_name]\n\nA set. A string object that can have zero or more values, each of which\nmust be chosen from the list of values ''value1'', ''value2'', ... A SET\ncolumn can have a maximum of 64 members. SET values are represented\ninternally as integers.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(149, 'RAND', 4, 'Syntax:\nRAND(), RAND(N)\n\nReturns a random floating-point value v in the range 0 <= v < 1.0. If a\nconstant integer argument N is specified, it is used as the seed value,\nwhich produces a repeatable sequence of column values. In the following\nexample, note that the sequences of values produced by RAND(3) is the\nsame both places where it occurs.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> CREATE TABLE t (i INT);\nQuery OK, 0 rows affected (0.42 sec)\n\nmysql> INSERT INTO t VALUES(1),(2),(3);\nQuery OK, 3 rows affected (0.00 sec)\nRecords: 3  Duplicates: 0  Warnings: 0\n\nmysql> SELECT i, RAND() FROM t;\n+------+------------------+\n| i    | RAND()           |\n+------+------------------+\n|    1 | 0.61914388706828 | \n|    2 | 0.93845168309142 | \n|    3 | 0.83482678498591 | \n+------+------------------+\n3 rows in set (0.00 sec)\n\nmysql> SELECT i, RAND(3) FROM t;\n+------+------------------+\n| i    | RAND(3)          |\n+------+------------------+\n|    1 | 0.90576975597606 | \n|    2 | 0.37307905813035 | \n|    3 | 0.14808605345719 | \n+------+------------------+\n3 rows in set (0.00 sec)\n\nmysql> SELECT i, RAND() FROM t;\n+------+------------------+\n| i    | RAND()           |\n+------+------------------+\n|    1 | 0.35877890638893 | \n|    2 | 0.28941420772058 | \n|    3 | 0.37073435016976 | \n+------+------------------+\n3 rows in set (0.00 sec)\n\nmysql> SELECT i, RAND(3) FROM t;\n+------+------------------+\n| i    | RAND(3)          |\n+------+------------------+\n|    1 | 0.90576975597606 | \n|    2 | 0.37307905813035 | \n|    3 | 0.14808605345719 | \n+------+------------------+\n3 rows in set (0.01 sec)\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(150, 'RPAD', 36, 'Syntax:\nRPAD(str,len,padstr)\n\nReturns the string str, right-padded with the string padstr to a length\nof len characters. If str is longer than len, the return value is\nshortened to len characters.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT RPAD(''hi'',5,''?'');\n        -> ''hi???''\nmysql> SELECT RPAD(''hi'',1,''?'');\n        -> ''h''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(151, 'CREATE DATABASE', 38, 'Syntax:\nCREATE {DATABASE | SCHEMA} [IF NOT EXISTS] db_name\n    [create_specification] ...\n\ncreate_specification:\n    [DEFAULT] CHARACTER SET [=] charset_name\n  | [DEFAULT] COLLATE [=] collation_name\n\nCREATE DATABASE creates a database with the given name. To use this\nstatement, you need the CREATE privilege for the database. CREATE\nSCHEMA is a synonym for CREATE DATABASE.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-database.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-database.html'),
(152, 'DEC', 21, 'DEC[(M[,D])] [UNSIGNED] [ZEROFILL], NUMERIC[(M[,D])] [UNSIGNED]\n[ZEROFILL], FIXED[(M[,D])] [UNSIGNED] [ZEROFILL]\n\nThese types are synonyms for DECIMAL. The FIXED synonym is available\nfor compatibility with other database systems.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(153, 'VAR_POP', 16, 'Syntax:\nVAR_POP(expr)\n\nReturns the population standard variance of expr. It considers rows as\nthe whole population, not as a sample, so it has the number of rows as\nthe denominator. You can also use VARIANCE(), which is equivalent but\nis not standard SQL.\n\nVAR_POP() returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(154, 'ELT', 36, 'Syntax:\nELT(N,str1,str2,str3,...)\n\nReturns str1 if N = 1, str2 if N = 2, and so on. Returns NULL if N is\nless than 1 or greater than the number of arguments. ELT() is the\ncomplement of FIELD().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT ELT(1, ''ej'', ''Heja'', ''hej'', ''foo'');\n        -> ''ej''\nmysql> SELECT ELT(4, ''ej'', ''Heja'', ''hej'', ''foo'');\n        -> ''foo''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(155, 'ALTER VIEW', 38, 'Syntax:\nALTER\n    [ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]\n    [DEFINER = { user | CURRENT_USER }]\n    [SQL SECURITY { DEFINER | INVOKER }]\n    VIEW view_name [(column_list)]\n    AS select_statement\n    [WITH [CASCADED | LOCAL] CHECK OPTION]\n\nThis statement changes the definition of a view, which must exist. The\nsyntax is similar to that for CREATE VIEW and the effect is the same as\nfor CREATE OR REPLACE VIEW. See [HELP CREATE VIEW]. This statement\nrequires the CREATE VIEW and DROP privileges for the view, and some\nprivilege for each column referred to in the SELECT statement. As of\nMySQL 5.1.23, ALTER VIEW is allowed only to the definer or users with\nthe SUPER privilege.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/alter-view.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/alter-view.html'),
(156, 'SHOW DATABASES', 27, 'Syntax:\nSHOW {DATABASES | SCHEMAS}\n    [LIKE ''pattern'' | WHERE expr]\n\nSHOW DATABASES lists the databases on the MySQL server host. SHOW\nSCHEMAS is a synonym for SHOW DATABASES. The LIKE clause, if present,\nindicates which database names to match. The WHERE clause can be given\nto select rows using more general conditions, as discussed in\nhttp://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\n\nYou see only those databases for which you have some kind of privilege,\nunless you have the global SHOW DATABASES privilege. You can also get\nthis list using the mysqlshow command.\n\nIf the server was started with the --skip-show-database option, you\ncannot use this statement at all unless you have the SHOW DATABASES\nprivilege.\n\nSHOW SCHEMAS can also be used.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-databases.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-databases.html'),
(157, '~', 19, 'Syntax:\n~\n\nInvert all bits.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html\n\n', 'mysql> SELECT 5 & ~1;\n        -> 4\n', 'http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html'),
(158, 'TEXT', 21, 'TEXT[(M)] [CHARACTER SET charset_name] [COLLATE collation_name]\n\nA TEXT column with a maximum length of 65,535 (216 - 1) characters. The\neffective maximum length is less if the value contains multi-byte\ncharacters. Each TEXT value is stored using a two-byte length prefix\nthat indicates the number of bytes in the value.\n\nAn optional length M can be given for this type. If this is done, MySQL\ncreates the column as the smallest TEXT type large enough to hold\nvalues M characters long.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(159, 'CONCAT_WS', 36, 'Syntax:\nCONCAT_WS(separator,str1,str2,...)\n\nCONCAT_WS() stands for Concatenate With Separator and is a special form\nof CONCAT(). The first argument is the separator for the rest of the\narguments. The separator is added between the strings to be\nconcatenated. The separator can be a string, as can the rest of the\narguments. If the separator is NULL, the result is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT CONCAT_WS('','',''First name'',''Second name'',''Last Name'');\n        -> ''First name,Second name,Last Name''\nmysql> SELECT CONCAT_WS('','',''First name'',NULL,''Last Name'');\n        -> ''First name,Last Name''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(160, 'ROW_COUNT', 15, 'Syntax:\nROW_COUNT()\n\nROW_COUNT() returns the number of rows updated, inserted, or deleted by\nthe preceding statement. This is the same as the row count that the\nmysql client displays and the value from the mysql_affected_rows() C\nAPI function.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> INSERT INTO t VALUES(1),(2),(3);\nQuery OK, 3 rows affected (0.00 sec)\nRecords: 3  Duplicates: 0  Warnings: 0\n\nmysql> SELECT ROW_COUNT();\n+-------------+\n| ROW_COUNT() |\n+-------------+\n|           3 |\n+-------------+\n1 row in set (0.00 sec)\n\nmysql> DELETE FROM t WHERE i IN(1,2);\nQuery OK, 2 rows affected (0.00 sec)\n\nmysql> SELECT ROW_COUNT();\n+-------------+\n| ROW_COUNT() |\n+-------------+\n|           2 |\n+-------------+\n1 row in set (0.00 sec)\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(161, 'ASIN', 4, 'Syntax:\nASIN(X)\n\nReturns the arc sine of X, that is, the value whose sine is X. Returns\nNULL if X is not in the range -1 to 1.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT ASIN(0.2);\n        -> 0.20135792079033\nmysql> SELECT ASIN(''foo'');\n\n+-------------+\n| ASIN(''foo'') |\n+-------------+\n|           0 |\n+-------------+\n1 row in set, 1 warning (0.00 sec)\n\nmysql> SHOW WARNINGS;\n+---------+------+-----------------------------------------+\n| Level   | Code | Message                                 |\n+---------+------+-----------------------------------------+\n| Warning | 1292 | Truncated incorrect DOUBLE value: ''foo'' |\n+---------+------+-----------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(162, 'SIGN', 4, 'Syntax:\nSIGN(X)\n\nReturns the sign of the argument as -1, 0, or 1, depending on whether X\nis negative, zero, or positive.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT SIGN(-32);\n        -> -1\nmysql> SELECT SIGN(0);\n        -> 0\nmysql> SELECT SIGN(234);\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(163, 'SEC_TO_TIME', 31, 'Syntax:\nSEC_TO_TIME(seconds)\n\nReturns the seconds argument, converted to hours, minutes, and seconds,\nas a TIME value. The range of the result is constrained to that of the\nTIME data type. A warning occurs if the argument corresponds to a value\noutside that range.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT SEC_TO_TIME(2378);\n        -> ''00:39:38''\nmysql> SELECT SEC_TO_TIME(2378) + 0;\n        -> 3938\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(164, 'FLOAT', 21, 'FLOAT[(M,D)] [UNSIGNED] [ZEROFILL]\n\nA small (single-precision) floating-point number. Allowable values are\n-3.402823466E+38 to -1.175494351E-38, 0, and 1.175494351E-38 to\n3.402823466E+38. These are the theoretical limits, based on the IEEE\nstandard. The actual range might be slightly smaller depending on your\nhardware or operating system.\n\nM is the total number of digits and D is the number of digits following\nthe decimal point. If M and D are omitted, values are stored to the\nlimits allowed by the hardware. A single-precision floating-point\nnumber is accurate to approximately 7 decimal places.\n\nUNSIGNED, if specified, disallows negative values.\n\nUsing FLOAT might give you some unexpected problems because all\ncalculations in MySQL are done with double precision. See\nhttp://dev.mysql.com/doc/refman/5.1/en/no-matching-rows.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(165, 'LOCATE', 36, 'Syntax:\nLOCATE(substr,str), LOCATE(substr,str,pos)\n\nThe first syntax returns the position of the first occurrence of\nsubstring substr in string str. The second syntax returns the position\nof the first occurrence of substring substr in string str, starting at\nposition pos. Returns 0 if substr is not in str.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT LOCATE(''bar'', ''foobarbar'');\n        -> 4\nmysql> SELECT LOCATE(''xbar'', ''foobar'');\n        -> 0\nmysql> SELECT LOCATE(''bar'', ''foobarbar'', 5);\n        -> 7\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(166, 'CHARSET', 15, 'Syntax:\nCHARSET(str)\n\nReturns the character set of the string argument.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT CHARSET(''abc'');\n        -> ''latin1''\nmysql> SELECT CHARSET(CONVERT(''abc'' USING utf8));\n        -> ''utf8''\nmysql> SELECT CHARSET(USER());\n        -> ''utf8''\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(167, 'SUBDATE', 31, 'Syntax:\nSUBDATE(date,INTERVAL expr unit), SUBDATE(expr,days)\n\nWhen invoked with the INTERVAL form of the second argument, SUBDATE()\nis a synonym for DATE_SUB(). For information on the INTERVAL unit\nargument, see the discussion for DATE_ADD().\n\nmysql> SELECT DATE_SUB(''2008-01-02'', INTERVAL 31 DAY);\n        -> ''2007-12-02''\nmysql> SELECT SUBDATE(''2008-01-02'', INTERVAL 31 DAY);\n        -> ''2007-12-02''\n\nThe second form allows the use of an integer value for days. In such\ncases, it is interpreted as the number of days to be subtracted from\nthe date or datetime expression expr.\n\nmysql> SELECT SUBDATE(''2008-01-02 12:00:00'', 31);\n        -> ''2007-12-02 12:00:00''\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(168, 'DAYOFYEAR', 31, 'Syntax:\nDAYOFYEAR(date)\n\nReturns the day of the year for date, in the range 1 to 366.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT DAYOFYEAR(''2007-02-03'');\n        -> 34\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(169, 'LONGTEXT', 21, 'LONGTEXT [CHARACTER SET charset_name] [COLLATE collation_name]\n\nA TEXT column with a maximum length of 4,294,967,295 or 4GB (232 - 1)\ncharacters. The effective maximum length is less if the value contains\nmulti-byte characters. The effective maximum length of LONGTEXT columns\nalso depends on the configured maximum packet size in the client/server\nprotocol and available memory. Each LONGTEXT value is stored using a\nfour-byte length prefix that indicates the number of bytes in the\nvalue.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(170, '%', 4, 'Syntax:\nN % M\n\nModulo operation. Returns the remainder of N divided by M. For more\ninformation, see the description for the MOD() function in\nhttp://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html'),
(171, 'KILL', 27, 'Syntax:\nKILL [CONNECTION | QUERY] thread_id\n\nEach connection to mysqld runs in a separate thread. You can see which\nthreads are running with the SHOW PROCESSLIST statement and kill a\nthread with the KILL thread_id statement.\n\nKILL allows the optional CONNECTION or QUERY modifier:\n\no KILL CONNECTION is the same as KILL with no modifier: It terminates\n  the connection associated with the given thread_id.\n\no KILL QUERY terminates the statement that the connection is currently\n  executing, but leaves the connection itself intact.\n\nIf you have the PROCESS privilege, you can see all threads. If you have\nthe SUPER privilege, you can kill all threads and statements.\nOtherwise, you can see and kill only your own threads and statements.\n\nYou can also use the mysqladmin processlist and mysqladmin kill\ncommands to examine and kill threads.\n\n*Note*: You cannot use KILL with the Embedded MySQL Server library,\nbecause the embedded server merely runs inside the threads of the host\napplication. It does not create any connection threads of its own.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/kill.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/kill.html'),
(172, 'DISJOINT', 30, 'Disjoint(g1,g2)\n\nReturns 1 or 0 to indicate whether g1 is spatially disjoint from (does\nnot intersect) g2.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html'),
(173, 'ASTEXT', 3, 'AsText(g), AsWKT(g)\n\nConverts a value in internal geometry format to its WKT representation\nand returns the string result.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-to-convert-geometries-between-formats.html\n\n', 'mysql> SET @g = ''LineString(1 1,2 2,3 3)'';\nmysql> SELECT AsText(GeomFromText(@g));\n+--------------------------+\n| AsText(GeomFromText(@g)) |\n+--------------------------+\n| LINESTRING(1 1,2 2,3 3)  |\n+--------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/functions-to-convert-geometries-between-formats.html'),
(174, 'LPAD', 36, 'Syntax:\nLPAD(str,len,padstr)\n\nReturns the string str, left-padded with the string padstr to a length\nof len characters. If str is longer than len, the return value is\nshortened to len characters.\n\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT LPAD(''hi'',4,''??'');\n        -> ''??hi''\nmysql> SELECT LPAD(''hi'',1,''??'');\n        -> ''h''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(175, 'RESTORE TABLE', 20, 'Syntax:\nRESTORE TABLE tbl_name [, tbl_name] ... FROM ''/path/to/backup/directory''\n\nRESTORE TABLE restores the table or tables from a backup that was made\nwith BACKUP TABLE. The directory should be specified as a full\npathname.\n\nExisting tables are not overwritten; if you try to restore over an\nexisting table, an error occurs. Just as for BACKUP TABLE, RESTORE\nTABLE currently works only for MyISAM tables. Restored tables are not\nreplicated from master to slave.\n\nThe backup for each table consists of its .frm format file and .MYD\ndata file. The restore operation restores those files, and then uses\nthem to rebuild the .MYI index file. Restoring takes longer than\nbacking up due to the need to rebuild the indexes. The more indexes the\ntable has, the longer it takes.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/restore-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/restore-table.html'),
(176, 'DECLARE CONDITION', 23, 'Syntax:\nDECLARE condition_name CONDITION FOR condition_value\n\ncondition_value:\n    SQLSTATE [VALUE] sqlstate_value\n  | mysql_error_code\n\nThe DECLARE ... CONDITION statement defines a named error condition. It\nspecifies a condition that needs specific handling and associates a\nname with that condition. The name can be referred to in a subsequence\nDECLARE ... HANDLER statement. See [HELP DECLARE HANDLER].\n\nA condition_value for DECLARE ... CONDITION can be an SQLSTATE value (a\n5-character string literal) or a MySQL error code (a number). You\nshould not use SQLSTATE value ''00000'' or MySQL error code 0, because\nthose indicate sucess rather than an error condition. For a list of\nSQLSTATE values and MySQL error codes, see\nhttp://dev.mysql.com/doc/refman/5.1/en/error-messages-server.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/declare-conditions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/declare-conditions.html');
INSERT INTO `help_topic` (`help_topic_id`, `name`, `help_category_id`, `description`, `example`, `url`) VALUES
(177, 'OVERLAPS', 30, 'Overlaps(g1,g2)\n\nReturns 1 or 0 to indicate whether g1 spatially overlaps g2. The term\nspatially overlaps is used if two geometries intersect and their\nintersection results in a geometry of the same dimension but not equal\nto either of the given geometries.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html'),
(178, 'SET GLOBAL SQL_SLAVE_SKIP_COUNTER', 27, 'Syntax:\nSET GLOBAL SQL_SLAVE_SKIP_COUNTER = N\n\nThis statement skips the next N events from the master. This is useful\nfor recovering from replication stops caused by a statement.\n\nThis statement is valid only when the slave thread is not running.\nOtherwise, it produces an error.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/set-global-sql-slave-skip-counter.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/set-global-sql-slave-skip-counter.html'),
(179, 'NUMGEOMETRIES', 25, 'NumGeometries(gc)\n\nReturns the number of geometries in the GeometryCollection value gc.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#geometrycollection-property-functions\n\n', 'mysql> SET @gc = ''GeometryCollection(Point(1 1),LineString(2 2, 3 3))'';\nmysql> SELECT NumGeometries(GeomFromText(@gc));\n+----------------------------------+\n| NumGeometries(GeomFromText(@gc)) |\n+----------------------------------+\n|                                2 |\n+----------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#geometrycollection-property-functions'),
(180, 'MONTHNAME', 31, 'Syntax:\nMONTHNAME(date)\n\nReturns the full name of the month for date. As of MySQL 5.1.12, the\nlanguage used for the name is controlled by the value of the\nlc_time_names system variable\n(http://dev.mysql.com/doc/refman/5.1/en/locale-support.html).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT MONTHNAME(''2008-02-03'');\n        -> ''February''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(181, 'PROCEDURE ANALYSE', 37, 'Syntax:\nanalyse([max_elements[,max_memory]])\n\nThis procedure is defined in the sql/sql_analyse.cc file. It examines\nthe result from a query and returns an analysis of the results that\nsuggests optimal data types for each column. To obtain this analysis,\nappend PROCEDURE ANALYSE to the end of a SELECT statement:\n\nSELECT ... FROM ... WHERE ... PROCEDURE ANALYSE([max_elements,[max_memory]])\n\nFor example:\n\nSELECT col1, col2 FROM table1 PROCEDURE ANALYSE(10, 2000);\n\nThe results show some statistics for the values returned by the query,\nand propose an optimal data type for the columns. This can be helpful\nfor checking your existing tables, or after importing new data. You may\nneed to try different settings for the arguments so that PROCEDURE\nANALYSE() does not suggest the ENUM data type when it is not\nappropriate.\n\nThe arguments are optional and are used as follows:\n\no max_elements (default 256) is the maximum number of distinct values\n  that analyse notices per column. This is used by analyse to check\n  whether the optimal data type should be of type ENUM; if there are\n  more than max_elements distinct values, then ENUM is not a suggested\n  type.\n\no max_memory (default 8192) is the maximum amount of memory that\n  analyse should allocate per column while trying to find all distinct\n  values.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/procedure-analyse.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/procedure-analyse.html'),
(182, 'CHANGE MASTER TO', 27, 'Syntax:\nCHANGE MASTER TO master_def [, master_def] ...\n\nmaster_def:\n    MASTER_BIND = ''interface_name''\n  | MASTER_HOST = ''host_name''\n  | MASTER_USER = ''user_name''\n  | MASTER_PASSWORD = ''password''\n  | MASTER_PORT = port_num\n  | MASTER_CONNECT_RETRY = interval\n  | MASTER_HEARTBEAT_PERIOD = interval\n  | MASTER_LOG_FILE = ''master_log_name''\n  | MASTER_LOG_POS = master_log_pos\n  | RELAY_LOG_FILE = ''relay_log_name''\n  | RELAY_LOG_POS = relay_log_pos\n  | MASTER_SSL = {0|1}\n  | MASTER_SSL_CA = ''ca_file_name''\n  | MASTER_SSL_CAPATH = ''ca_directory_name''\n  | MASTER_SSL_CERT = ''cert_file_name''\n  | MASTER_SSL_KEY = ''key_file_name''\n  | MASTER_SSL_CIPHER = ''cipher_list''\n  | MASTER_SSL_VERIFY_SERVER_CERT = {0|1}\n\nCHANGE MASTER TO changes the parameters that the slave server uses for\nconnecting to and communicating with the master server. It also updates\nthe contents of the master.info and relay-log.info files.\n\nMASTER_USER, MASTER_PASSWORD, MASTER_SSL, MASTER_SSL_CA,\nMASTER_SSL_CAPATH, MASTER_SSL_CERT, MASTER_SSL_KEY, MASTER_SSL_CIPHER,\nand MASTER_SSL_VERIFY_SERVER_CERT provide information to the slave\nabout how to connect to its master. MASTER_SSL_VERIFY_SERVER_CERT was\nadded in MySQL 5.1.18. It is used as described for the\n--ssl-verify-server-cert option in\nhttp://dev.mysql.com/doc/refman/5.1/en/ssl-options.html.\n\nMASTER_CONNECT_RETRY specifies how many seconds to wait between connect\nretries. The default is 60. The number of reconnection attempts is\nlimited by the --master-retry-count server option; for more\ninformation, see\nhttp://dev.mysql.com/doc/refman/5.1/en/replication-options.html.\n\nThe SSL options (MASTER_SSL, MASTER_SSL_CA, MASTER_SSL_CAPATH,\nMASTER_SSL_CERT, MASTER_SSL_KEY, MASTER_SSL_CIPHER), and\nMASTER_SSL_VERIFY_SERVER_CERT can be changed even on slaves that are\ncompiled without SSL support. They are saved to the master.info file,\nbut are ignored unless you use a server that has SSL support enabled.\n\nIf you don''t specify a given parameter, it keeps its old value, except\nas indicated in the following discussion. For example, if the password\nto connect to your MySQL master has changed, you just need to issue\nthese statements to tell the slave about the new password:\n\nSTOP SLAVE; -- if replication was running\nCHANGE MASTER TO MASTER_PASSWORD=''new3cret'';\nSTART SLAVE; -- if you want to restart replication\n\nThere is no need to specify the parameters that do not change (host,\nport, user, and so forth).\n\nMASTER_HOST and MASTER_PORT are the hostname (or IP address) of the\nmaster host and its TCP/IP port. Note that if MASTER_HOST is equal to\nlocalhost, then, like in other parts of MySQL, the port number might be\nignored.\n\nMASTER_BIND is for use on replication slaves having multiple network\ninterfaces, and determines which of the slave''s network interfaces is\nchosen for connecting to the master. It is also possible to determine\nwhich network interface is to be used in such cases by starting the\nslave mysqld process with the --master-bind option.\n\nThe ability to bind a replication slave to specific network interface\nwas added in MySQL Cluster NDB 6.3.4.\n\nMASTER_HEARTBEAT_PERIOD is used to set the interval in seconds between\nreplication heartbeats. Whenever the master''s binlog is updated with an\nevent, the waiting period for the next heartbeat is reset. interval is\na decimal value having the range 0 to 4294967 seconds and a resolution\nto hundredths of a second; the smallest nonzero value is 0.001.\nHeartbeats are sent by the master only if there are no unsent events in\nthe binlog file for a period longer than interval.\n\nSetting interval to 0 disables heartbeats altogether. The default value\nfor interval is equal to the value of slave_net_timeout divided by 2.\n\n*Note*: Setting @@global.slave_net_timeout to a value less than that of\nthe current heartbeat interval results in a warning being issued.\n\nIssuing RESET SLAVE resets the heartbeat interval to the default.\n\nMASTER_HEARTBEAT_PERIOD was added in MySQL Cluster NDB 6.3.4.\n\n*Note*: Replication cannot use Unix socket files. You must be able to\nconnect to the master MySQL server using TCP/IP.\n\nIf you specify MASTER_HOST or MASTER_PORT, the slave assumes that the\nmaster server is different from before (even if you specify a host or\nport value that is the same as the current value.) In this case, the\nold values for the master binary log name and position are considered\nno longer applicable, so if you do not specify MASTER_LOG_FILE and\nMASTER_LOG_POS in the statement, MASTER_LOG_FILE='''' and\nMASTER_LOG_POS=4 are silently appended to it.\n\nMASTER_LOG_FILE and MASTER_LOG_POS are the coordinates at which the\nslave I/O thread should begin reading from the master the next time the\nthread starts. If you specify either of them, you cannot specify\nRELAY_LOG_FILE or RELAY_LOG_POS. If neither of MASTER_LOG_FILE or\nMASTER_LOG_POS are specified, the slave uses the last coordinates of\nthe slave SQL thread before CHANGE MASTER TO was issued. This ensures\nthat there is no discontinuity in replication, even if the slave SQL\nthread was late compared to the slave I/O thread, when you merely want\nto change, say, the password to use.\n\nCHANGE MASTER TO deletes all relay log files and starts a new one,\nunless you specify RELAY_LOG_FILE or RELAY_LOG_POS. In that case, relay\nlogs are kept; the relay_log_purge global variable is set silently to\n0.\n\nCHANGE MASTER TO is useful for setting up a slave when you have the\nsnapshot of the master and have recorded the log and the offset\ncorresponding to it. After loading the snapshot into the slave, you can\nrun CHANGE MASTER TO MASTER_LOG_FILE=''log_name_on_master'',\nMASTER_LOG_POS=log_offset_on_master on the slave.\n\nThe following example changes the master and master''s binary log\ncoordinates. This is used when you want to set up the slave to\nreplicate the master:\n\nCHANGE MASTER TO\n  MASTER_HOST=''master2.mycompany.com'',\n  MASTER_USER=''replication'',\n  MASTER_PASSWORD=''bigs3cret'',\n  MASTER_PORT=3306,\n  MASTER_LOG_FILE=''master2-bin.001'',\n  MASTER_LOG_POS=4,\n  MASTER_CONNECT_RETRY=10;\n\nThe next example shows an operation that is less frequently employed.\nIt is used when the slave has relay logs that you want it to execute\nagain for some reason. To do this, the master need not be reachable.\nYou need only use CHANGE MASTER TO and start the SQL thread (START\nSLAVE SQL_THREAD):\n\nCHANGE MASTER TO\n  RELAY_LOG_FILE=''slave-relay-bin.006'',\n  RELAY_LOG_POS=4025;\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/change-master-to.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/change-master-to.html'),
(183, 'DROP DATABASE', 38, 'Syntax:\nDROP {DATABASE | SCHEMA} [IF EXISTS] db_name\n\nDROP DATABASE drops all tables in the database and deletes the\ndatabase. Be very careful with this statement! To use DROP DATABASE,\nyou need the DROP privilege on the database. DROP SCHEMA is a synonym\nfor DROP DATABASE.\n\n*Important*: When a database is dropped, user privileges on the\ndatabase are not automatically dropped. See [HELP GRANT].\n\nIF EXISTS is used to prevent an error from occurring if the database\ndoes not exist.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-database.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-database.html'),
(184, 'MBREQUAL', 6, 'MBREqual(g1,g2)\n\nReturns 1 or 0 to indicate whether the Minimum Bounding Rectangles of\nthe two geometries g1 and g2 are the same.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html'),
(185, 'TIMESTAMP FUNCTION', 31, 'Syntax:\nTIMESTAMP(expr), TIMESTAMP(expr1,expr2)\n\nWith a single argument, this function returns the date or datetime\nexpression expr as a datetime value. With two arguments, it adds the\ntime expression expr2 to the date or datetime expression expr1 and\nreturns the result as a datetime value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT TIMESTAMP(''2003-12-31'');\n        -> ''2003-12-31 00:00:00''\nmysql> SELECT TIMESTAMP(''2003-12-31 12:00:00'',''12:00:00'');\n        -> ''2004-01-01 00:00:00''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(186, 'CHARACTER_LENGTH', 36, 'Syntax:\nCHARACTER_LENGTH(str)\n\nCHARACTER_LENGTH() is a synonym for CHAR_LENGTH().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(187, 'SHOW GRANTS', 27, 'Syntax:\nSHOW GRANTS [FOR user]\n\nThis statement lists the GRANT statement or statements that must be\nissued to duplicate the privileges that are granted to a MySQL user\naccount. The account is named using the same format as for the GRANT\nstatement; for example, ''jeffrey''@''localhost''. If you specify only the\nusername part of the account name, a hostname part of ''%'' is used. For\nadditional information about specifying account names, see [HELP\nGRANT].\n\nmysql> SHOW GRANTS FOR ''root''@''localhost'';\n+---------------------------------------------------------------------+\n| Grants for root@localhost                                           |\n+---------------------------------------------------------------------+\n| GRANT ALL PRIVILEGES ON *.* TO ''root''@''localhost'' WITH GRANT OPTION |\n+---------------------------------------------------------------------+\n\nTo list the privileges granted to the account that you are using to\nconnect to the server, you can use any of the following statements:\n\nSHOW GRANTS;\nSHOW GRANTS FOR CURRENT_USER;\nSHOW GRANTS FOR CURRENT_USER();\n\nAs of MySQL 5.1.12, if SHOW GRANTS FOR CURRENT_USER (or any of the\nequivalent syntaxes) is used in DEFINER context, such as within a\nstored procedure that is defined with SQL SECURITY DEFINER), the grants\ndisplayed are those of the definer and not the invoker.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-grants.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-grants.html'),
(188, 'SHOW PRIVILEGES', 27, 'Syntax:\nSHOW PRIVILEGES\n\nSHOW PRIVILEGES shows the list of system privileges that the MySQL\nserver supports. The exact list of privileges depends on the version of\nyour server.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-privileges.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-privileges.html'),
(189, 'CREATE TABLESPACE', 38, 'Syntax:\nCREATE TABLESPACE tablespace_name\n    ADD DATAFILE ''file_name''\n    USE LOGFILE GROUP logfile_group\n    [EXTENT_SIZE [=] extent_size]\n    [INITIAL_SIZE [=] initial_size]\n    [AUTOEXTEND_SIZE [=] autoextend_size]\n    [MAX_SIZE [=] max_size]\n    [NODEGROUP [=] nodegroup_id]\n    [WAIT]\n    [COMMENT [=] comment_text]\n    ENGINE [=] engine_name\n\nThis statement is used to create a tablespace, which can contain one or\nmore data files, providing storage space for tables. One data file is\ncreated and added to the tablespace using this statement. Additional\ndata files may be added to the tablespace by using the ALTER TABLESPACE\nstatement (see [HELP ALTER TABLESPACE]). For rules covering the naming\nof tablespaces, see\nhttp://dev.mysql.com/doc/refman/5.1/en/identifiers.html.\n\nA log file group of one or more UNDO log files must be assigned to the\ntablespace to be created with the USE LOGFILE GROUP clause.\nlogfile_group must be an existing log file group created with CREATE\nLOGFILE GROUP (see\nhttp://dev.mysql.com/doc/refman/5.1/en/create-logfile-group.html).\nMultiple tablespaces may use the same log file group for UNDO logging.\n\nThe EXTENT_SIZE sets the size, in bytes, of the extents used by any\nfiles belonging to the tablespace. The default value is 1M. The minimum\nsize is 32K, and theoretical maximum is 2G, although the practical\nmaximum size depends on a number of factors. In most cases, changing\nthe extent size does not have any measurable effect on performance, and\nthe default value is recommended for all but the most unusual\nsituations.\n\nAn extent is a unit of disk space allocation. One extent is filled with\nas much data as that extent can contain before another extent is used.\nIn theory, up to 65,535 (64K) extents may used per data file; however,\nthe recommended maximum is 32,768 (32K). The recommended maximum size\nfor a single data file is 32G --- that is, 32K extents x 1 MB per\nextent. In addition, once an extent is allocated to a given partition,\nit cannot be used to store data from a different partition; an extent\ncannot store data from more than one partition. This means, for example\nthat a tablespace having a single datafile whose INITIAL_SIZE is 256 MB\nand whose EXTENT_SIZE is 128M has just two extents, and so can be used\nto store data from at most two different disk data table partitions.\n\nYou can see how many extents remain free in a given data file by\nquerying the INFORMATION_SCHEMA.FILES table, and so derive an estimate\nfor how much space remains free in the file. For further discussion and\nexamples, see http://dev.mysql.com/doc/refman/5.1/en/files-table.html.\n\nThe INITIAL_SIZE parameter sets the data file''s total size in bytes.\nOnce the file has been created, its size cannot be changed; however,\nyou can add more data files to the tablespace using ALTER TABLESPACE\n... ADD DATAFILE. See [HELP ALTER TABLESPACE].\n\nINITIAL_SIZE is optional; its default value is 128M.\n\nOn 32-bit systems, the maximum supported value for INITIAL_SIZE is 4G.\n(Bug#29186 (http://bugs.mysql.com/29186))\n\nWhen setting EXTENT_SIZE or INITIAL_SIZE (either or both), you may\noptionally follow the number with a one-letter abbreviation for an\norder of magnitude, similar to those used in my.cnf. Generally, this is\none of the letters M (for megabytes) or G (for gigabytes).\n\nAUTOEXTEND_SIZE, MAX_SIZE, NODEGROUP, WAIT, and COMMENT are parsed but\nignored, and so have no effect in MySQL 5.1. These options are intended\nfor future expansion.\n\nThe ENGINE parameter determines the storage engine which uses this\ntablespace, with engine_name being the name of the storage engine. In\nMySQL 5.1, engine_name must be one of the values NDB or NDBCLUSTER.\n\nWhen CREATE TABLESPACE is used with ENGINE = NDB, a tablespace and\nassociated data file are created on each Cluster data node. You can\nverify that the data files were created and obtain information about\nthem by querying the INFORMATION_SCHEMA.FILES table. For example:\n\nmysql> SELECT LOGFILE_GROUP_NAME, FILE_NAME, EXTRA \n    -> FROM INFORMATION_SCHEMA.FILES\n    -> WHERE TABLESPACE_NAME = ''newts'' AND FILE_TYPE = ''DATAFILE'';\n+--------------------+-------------+----------------+\n| LOGFILE_GROUP_NAME | FILE_NAME   | EXTRA          |\n+--------------------+-------------+----------------+\n| lg_3               | newdata.dat | CLUSTER_NODE=3 |\n| lg_3               | newdata.dat | CLUSTER_NODE=4 |\n+--------------------+-------------+----------------+\n2 rows in set (0.01 sec)\n\n(See http://dev.mysql.com/doc/refman/5.1/en/files-table.html.)\n\nCREATE TABLESPACE was added in MySQL 5.1.6. In MySQL 5.1, it is useful\nonly with Disk Data storage for MySQL Cluster. See\nhttp://dev.mysql.com/doc/refman/5.1/en/mysql-cluster-disk-data.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-tablespace.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-tablespace.html'),
(190, 'INSERT FUNCTION', 36, 'Syntax:\nINSERT(str,pos,len,newstr)\n\nReturns the string str, with the substring beginning at position pos\nand len characters long replaced by the string newstr. Returns the\noriginal string if pos is not within the length of the string. Replaces\nthe rest of the string from position pos if len is not within the\nlength of the rest of the string. Returns NULL if any argument is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT INSERT(''Quadratic'', 3, 4, ''What'');\n        -> ''QuWhattic''\nmysql> SELECT INSERT(''Quadratic'', -1, 4, ''What'');\n        -> ''Quadratic''\nmysql> SELECT INSERT(''Quadratic'', 3, 100, ''What'');\n        -> ''QuWhat''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(191, 'CRC32', 4, 'Syntax:\nCRC32(expr)\n\nComputes a cyclic redundancy check value and returns a 32-bit unsigned\nvalue. The result is NULL if the argument is NULL. The argument is\nexpected to be a string and (if possible) is treated as one if it is\nnot.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT CRC32(''MySQL'');\n        -> 3259397556\nmysql> SELECT CRC32(''mysql'');\n        -> 2501908538\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(192, 'XOR', 13, 'Syntax:\nXOR\n\nLogical XOR. Returns NULL if either operand is NULL. For non-NULL\noperands, evaluates to 1 if an odd number of operands is non-zero,\notherwise 0 is returned.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/logical-operators.html\n\n', 'mysql> SELECT 1 XOR 1;\n        -> 0\nmysql> SELECT 1 XOR 0;\n        -> 1\nmysql> SELECT 1 XOR NULL;\n        -> NULL\nmysql> SELECT 1 XOR 1 XOR 1;\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/logical-operators.html'),
(193, 'STARTPOINT', 12, 'StartPoint(ls)\n\nReturns the Point that is the start point of the LineString value ls.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions\n\n', 'mysql> SET @ls = ''LineString(1 1,2 2,3 3)'';\nmysql> SELECT AsText(StartPoint(GeomFromText(@ls)));\n+---------------------------------------+\n| AsText(StartPoint(GeomFromText(@ls))) |\n+---------------------------------------+\n| POINT(1 1)                            |\n+---------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions'),
(194, 'DECLARE VARIABLE', 23, 'Syntax:\nDECLARE var_name [, var_name] ... type [DEFAULT value]\n\nThis statement is used to declare local variables within stored\nprograms. To provide a default value for the variable, include a\nDEFAULT clause. The value can be specified as an expression; it need\nnot be a constant. If the DEFAULT clause is missing, the initial value\nis NULL.\n\nLocal variables are treated like stored routine parameters with respect\nto data type and overflow checking. See [HELP CREATE PROCEDURE].\n\nLocal variable names are not case sensitive.\n\nThe scope of a local variable is within the BEGIN ... END block where\nit is declared. The variable can be referred to in blocks nested within\nthe declaring block, except those blocks that declare a variable with\nthe same name.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/declare-local-variables.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/declare-local-variables.html'),
(195, 'GRANT', 9, 'Syntax:\nGRANT\n    priv_type [(column_list)]\n      [, priv_type [(column_list)]] ...\n    ON [object_type]\n        {\n            *\n          | *.*\n          | db_name.*\n          | db_name.tbl_name\n          | tbl_name\n          | db_name.routine_name\n\n        }\n    TO user [IDENTIFIED BY [PASSWORD] ''password'']\n        [, user [IDENTIFIED BY [PASSWORD] ''password'']] ...\n    [REQUIRE\n        NONE |\n        [{SSL| X509}]\n        [CIPHER ''cipher'' [AND]]\n        [ISSUER ''issuer'' [AND]]\n        [SUBJECT ''subject'']]\n    [WITH with_option [with_option] ...]\n\nobject_type =\n    TABLE\n  | FUNCTION\n  | PROCEDURE\n\nwith_option =\n    GRANT OPTION\n  | MAX_QUERIES_PER_HOUR count\n  | MAX_UPDATES_PER_HOUR count\n  | MAX_CONNECTIONS_PER_HOUR count\n  | MAX_USER_CONNECTIONS count\n\nThe GRANT statement enables system administrators to create MySQL user\naccounts and to grant rights to accounts. To use GRANT, you must have\nthe GRANT OPTION privilege, and you must have the privileges that you\nare granting. The REVOKE statement is related and enables\nadministrators to remove account privileges. See [HELP REVOKE].\n\nMySQL account information is stored in the tables of the mysql\ndatabase. This database and the access control system are discussed\nextensively in\nhttp://dev.mysql.com/doc/refman/5.1/en/server-administration.html,\nwhich you should consult for additional details.\n\n*Important*: Some releases of MySQL introduce changes to the structure\nof the grant tables to add new privileges or features. Whenever you\nupdate to a new version of MySQL, you should update your grant tables\nto make sure that they have the current structure so that you can take\nadvantage of any new capabilities. See\nhttp://dev.mysql.com/doc/refman/5.1/en/mysql-upgrade.html.\n\nIf the grant tables hold privilege rows that contain mixed-case\ndatabase or table names and the lower_case_table_names system variable\nis set to a non-zero value, REVOKE cannot be used to revoke these\nprivileges. It will be necessary to manipulate the grant tables\ndirectly. (GRANT will not create such rows when lower_case_table_names\nis set, but such rows might have been created prior to setting the\nvariable.)\n\nPrivileges can be granted at several levels. The examples shown here\ninclude no IDENTIFIED BY ''password'' clause for brevity, but you should\ninclude one if the account does not already exist to avoid creating an\naccount with no password.\n\no Global level\n\n  Global privileges apply to all databases on a given server. These\n  privileges are stored in the mysql.user table. GRANT ALL ON *.* and\n  REVOKE ALL ON *.* grant and revoke only global privileges.\n\nGRANT ALL ON *.* TO ''someuser''@''somehost'';\nGRANT SELECT, INSERT ON *.* TO ''someuser''@''somehost'';\n\no Database level\n\n  Database privileges apply to all objects in a given database. These\n  privileges are stored in the mysql.db and mysql.host tables. GRANT\n  ALL ON db_name.* and REVOKE ALL ON db_name.* grant and revoke only\n  database privileges.\n\nGRANT ALL ON mydb.* TO ''someuser''@''somehost'';\nGRANT SELECT, INSERT ON mydb.* TO ''someuser''@''somehost'';\n\no Table level\n\n  Table privileges apply to all columns in a given table. These\n  privileges are stored in the mysql.tables_priv table. GRANT ALL ON\n  db_name.tbl_name and REVOKE ALL ON db_name.tbl_name grant and revoke\n  only table privileges.\n\nGRANT ALL ON mydb.mytbl TO ''someuser''@''somehost'';\nGRANT SELECT, INSERT ON mydb.mytbl TO ''someuser''@''somehost'';\n\n  If you specify tbl_name rather than db_name.tbl_name, the statement\n  applies to tbl_name in the default database.\n\no Column level\n\n  Column privileges apply to single columns in a given table. These\n  privileges are stored in the mysql.columns_priv table. When using\n  REVOKE, you must specify the same columns that were granted. The\n  column or columns for which the privileges are to be granted must be\n  enclosed within parentheses.\n\nGRANT SELECT (col1), INSERT (col1,col2) ON mydb.mytbl TO ''someuser''@''somehost'';\n\no Routine level\n\n  The CREATE ROUTINE, ALTER ROUTINE, EXECUTE, and GRANT OPTION\n  privileges apply to stored routines (functions and procedures). They\n  can be granted at the global and database levels. Also, except for\n  CREATE ROUTINE, these privileges can be granted at the routine level\n  for individual routines and are stored in the mysql.procs_priv table.\n\nGRANT CREATE ROUTINE ON mydb.* TO ''someuser''@''somehost'';\nGRANT EXECUTE ON PROCEDURE mydb.myproc TO ''someuser''@''somehost'';\n\nThe object_type clause should be specified as TABLE, FUNCTION, or\nPROCEDURE when the following object is a table, a stored function, or a\nstored procedure.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/grant.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/grant.html'),
(196, 'MPOLYFROMTEXT', 3, 'MPolyFromText(wkt[,srid]), MultiPolygonFromText(wkt[,srid])\n\nConstructs a MULTIPOLYGON value using its WKT representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions'),
(197, 'MBRINTERSECTS', 6, 'MBRIntersects(g1,g2)\n\nReturns 1 or 0 to indicate whether the Minimum Bounding Rectangles of\nthe two geometries g1 and g2 intersect.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html'),
(198, 'BIT_OR', 16, 'Syntax:\nBIT_OR(expr)\n\nReturns the bitwise OR of all bits in expr. The calculation is\nperformed with 64-bit (BIGINT) precision.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(199, 'YEARWEEK', 31, 'Syntax:\nYEARWEEK(date), YEARWEEK(date,mode)\n\nReturns year and week for a date. The mode argument works exactly like\nthe mode argument to WEEK(). The year in the result may be different\nfrom the year in the date argument for the first and the last week of\nthe year.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT YEARWEEK(''1987-01-01'');\n        -> 198653\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(200, 'NOT BETWEEN', 18, 'Syntax:\nexpr NOT BETWEEN min AND max\n\nThis is the same as NOT (expr BETWEEN min AND max).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(201, 'IS NOT', 18, 'Syntax:\nIS NOT boolean_value\n\nTests a value against a boolean value, where boolean_value can be TRUE,\nFALSE, or UNKNOWN.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 1 IS NOT UNKNOWN, 0 IS NOT UNKNOWN, NULL IS NOT UNKNOWN;\n        -> 1, 1, 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(202, 'LOG10', 4, 'Syntax:\nLOG10(X)\n\nReturns the base-10 logarithm of X.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT LOG10(2);\n        -> 0.30102999566398\nmysql> SELECT LOG10(100);\n        -> 2\nmysql> SELECT LOG10(-100);\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(203, 'SQRT', 4, 'Syntax:\nSQRT(X)\n\nReturns the square root of a non-negative number X.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT SQRT(4);\n        -> 2\nmysql> SELECT SQRT(20);\n        -> 4.4721359549996\nmysql> SELECT SQRT(-16);\n        -> NULL        \n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(204, 'DECIMAL', 21, 'DECIMAL[(M[,D])] [UNSIGNED] [ZEROFILL]\n\nA packed "exact" fixed-point number. M is the total number of digits\n(the precision) and D is the number of digits after the decimal point\n(the scale). The decimal point and (for negative numbers) the "-" sign\nare not counted in M. If D is 0, values have no decimal point or\nfractional part. The maximum number of digits (M) for DECIMAL is 65.\nThe maximum number of supported decimals (D) is 30. If D is omitted,\nthe default is 0. If M is omitted, the default is 10.\n\nUNSIGNED, if specified, disallows negative values.\n\nAll basic calculations (+, -, *, /) with DECIMAL columns are done with\na precision of 65 digits.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(205, 'CREATE INDEX', 38, 'Syntax:\nCREATE [ONLINE|OFFLINE] [UNIQUE|FULLTEXT|SPATIAL] INDEX index_name\n    [index_type]\n    ON tbl_name (index_col_name,...)\n    [index_option] ...\n\nindex_col_name:\n    col_name [(length)] [ASC | DESC]\n\nindex_type:\n    USING {BTREE | HASH | RTREE}\n\nindex_option:\n    KEY_BLOCK_SIZE [=] value\n  | index_type\n  | WITH PARSER parser_name\n\nCREATE INDEX is mapped to an ALTER TABLE statement to create indexes.\nSee [HELP ALTER TABLE]. CREATE INDEX cannot be used to create a PRIMARY\nKEY; use ALTER TABLE instead. For more information about indexes, see\nhttp://dev.mysql.com/doc/refman/5.1/en/mysql-indexes.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-index.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-index.html'),
(206, 'CREATE FUNCTION', 38, 'The CREATE FUNCTION statement is used to create stored functions and\nuser-defined functions (UDFs):\n\no For information about creating stored functions, see [HELP CREATE\n  PROCEDURE].\n\no For information about creating user-defined functions, see [HELP\n  CREATE FUNCTION UDF].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-function.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-function.html'),
(207, 'ALTER DATABASE', 38, 'Syntax:\nALTER {DATABASE | SCHEMA} [db_name]\n    alter_specification ...\nALTER {DATABASE | SCHEMA} db_name\n    UPGRADE DATA DIRECTORY NAME\n\nalter_specification:\n    [DEFAULT] CHARACTER SET [=] charset_name\n  | [DEFAULT] COLLATE [=] collation_name\n\nALTER DATABASE enables you to change the overall characteristics of a\ndatabase. These characteristics are stored in the db.opt file in the\ndatabase directory. To use ALTER DATABASE, you need the ALTER privilege\non the database. ALTER SCHEMA is a synonym for ALTER DATABASE.\n\nThe CHARACTER SET clause changes the default database character set.\nThe COLLATE clause changes the default database collation.\nhttp://dev.mysql.com/doc/refman/5.1/en/charset.html, discusses\ncharacter set and collation names.\n\nYou can see what character sets and collations are available using,\nrespectively, the SHOW CHARACTER SET and SHOW COLLATION statements. See\n[HELP SHOW CHARACTER SET], and [HELP SHOW COLLATION], for more\ninformation.\n\nThe database name can be omitted from the first syntax, in which case\nthe statement applies to the default database.\n\nThe syntax that includes the UPGRADE DATA DIRECTORY NAME clause was\nadded in MySQL 5.1.23. It updates the name of the directory associated\nwith the database to use the encoding implemented in MySQL 5.1 for\nmapping database names to database directory names (see\nhttp://dev.mysql.com/doc/refman/5.1/en/identifier-mapping.html). This\nclause is for use under these conditions:\n\no It is intended when upgrading MySQL to 5.1 or later from older\n  versions.\n\no It is intended to update a database directory name to the current\n  encoding format if the name contains special characters that need\n  encoding.\n\no The statement is used by mysqlcheck (as invoked by mysql_upgrade).\n\nFor example,if a database in MySQL 5.0 has a name of a-b-c, the name\ncontains instance of the `-'' character. In 5.0, the database directory\nis also named a-b-c, which is not necessarily safe for all filesystems.\nIn MySQL 5.1 and up, the same database name is encoded as a@002db@002dc\nto produce a filesystem-neutral directory name.\n\nWhen a MySQL installation is upgraded to MySQL 5.1 or later from an\nolder version,the server displays a name such as a-b-c (which is in the\nold format) as #mysql50#a-b-c, and you must refer to the name using the\n#mysql50# prefix. Use UPGRADE DATA DIRECTORY NAME in this case to\nexplicitly tell the server to re-encode the database directory name to\nthe current encoding format:\n\nALTER DATABASE `#mysql50#a-b-c` UPGRADE DATA DIRECTORY NAME;\n\nAfter executing this statement, you can refer to the database as a-b-c\nwithout the special #mysql50# prefix.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/alter-database.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/alter-database.html'),
(208, 'GEOMETRYN', 25, 'GeometryN(gc,N)\n\nReturns the N-th geometry in the GeometryCollection value gc.\nGeometries are numbered beginning with 1.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#geometrycollection-property-functions\n\n', 'mysql> SET @gc = ''GeometryCollection(Point(1 1),LineString(2 2, 3 3))'';\nmysql> SELECT AsText(GeometryN(GeomFromText(@gc),1));\n+----------------------------------------+\n| AsText(GeometryN(GeomFromText(@gc),1)) |\n+----------------------------------------+\n| POINT(1 1)                             |\n+----------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#geometrycollection-property-functions'),
(209, '<<', 19, 'Syntax:\n<<\n\nShifts a longlong (BIGINT) number to the left.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html\n\n', 'mysql> SELECT 1 << 2;\n        -> 4\n', 'http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html'),
(210, 'SHOW TABLE STATUS', 27, 'Syntax:\nSHOW TABLE STATUS [FROM db_name]\n    [LIKE ''pattern'' | WHERE expr]\n\nSHOW TABLE STATUS works likes SHOW TABLES, but provides a lot of\ninformation about each non-TEMPORARY table. You can also get this list\nusing the mysqlshow --status db_name command. The LIKE clause, if\npresent, indicates which table names to match. The WHERE clause can be\ngiven to select rows using more general conditions, as discussed in\nhttp://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-table-status.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-table-status.html'),
(211, 'MD5', 11, 'Syntax:\nMD5(str)\n\nCalculates an MD5 128-bit checksum for the string. The value is\nreturned as a binary string of 32 hex digits, or NULL if the argument\nwas NULL. The return value can, for example, be used as a hash key.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', 'mysql> SELECT MD5(''testing'');\n        -> ''ae2b1fca515949e5d54fb22b8ed95575''\n', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(212, '<', 18, 'Syntax:\n<\n\nLess than:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 2 < 2;\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(213, 'UNIX_TIMESTAMP', 31, 'Syntax:\nUNIX_TIMESTAMP(), UNIX_TIMESTAMP(date)\n\nIf called with no argument, returns a Unix timestamp (seconds since\n''1970-01-01 00:00:00'' UTC) as an unsigned integer. If UNIX_TIMESTAMP()\nis called with a date argument, it returns the value of the argument as\nseconds since ''1970-01-01 00:00:00'' UTC. date may be a DATE string, a\nDATETIME string, a TIMESTAMP, or a number in the format YYMMDD or\nYYYYMMDD. The server interprets date as a value in the current time\nzone and converts it to an internal value in UTC. Clients can set their\ntime zone as described in\nhttp://dev.mysql.com/doc/refman/5.1/en/time-zone-support.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT UNIX_TIMESTAMP();\n        -> 1196440210\nmysql> SELECT UNIX_TIMESTAMP(''2007-11-30 10:30:19'');\n        -> 1196440219\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(214, 'DAYOFMONTH', 31, 'Syntax:\nDAYOFMONTH(date)\n\nReturns the day of the month for date, in the range 1 to 31, or 0 for\ndates such as ''0000-00-00'' or ''2008-00-00'' that have a zero day part.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT DAYOFMONTH(''2007-02-03'');\n        -> 3\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(215, 'ASCII', 36, 'Syntax:\nASCII(str)\n\nReturns the numeric value of the leftmost character of the string str.\nReturns 0 if str is the empty string. Returns NULL if str is NULL.\nASCII() works for 8-bit characters.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT ASCII(''2'');\n        -> 50\nmysql> SELECT ASCII(2);\n        -> 50\nmysql> SELECT ASCII(''dx'');\n        -> 100\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(216, 'DIV', 4, 'Syntax:\nDIV\n\nInteger division. Similar to FLOOR(), but is safe with BIGINT values.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html\n\n', 'mysql> SELECT 5 DIV 2;\n        -> 2\n', 'http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html'),
(217, 'RENAME USER', 9, 'Syntax:\nRENAME USER old_user TO new_user\n    [, old_user TO new_user] ...\n\nThe RENAME USER statement renames existing MySQL accounts. To use it,\nyou must have the global CREATE USER privilege or the UPDATE privilege\nfor the mysql database. An error occurs if any old account does not\nexist or any new account exists. Each account is named using the same\nformat as for the GRANT statement; for example, ''jeffrey''@''localhost''.\nIf you specify only the username part of the account name, a hostname\npart of ''%'' is used. For additional information about specifying\naccount names, see [HELP GRANT].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/rename-user.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/rename-user.html'),
(218, 'SHOW SLAVE STATUS', 27, 'Syntax:\nSHOW SLAVE STATUS\n\nThis statement provides status information on essential parameters of\nthe slave threads. If you issue this statement using the mysql client,\nyou can use a \\G statement terminator rather than a semicolon to obtain\na more readable vertical layout:\n\nmysql> SHOW SLAVE STATUS\\G\n*************************** 1. row ***************************\n               Slave_IO_State: Waiting for master to send event\n                  Master_Host: localhost\n                  Master_User: root\n                  Master_Port: 3306\n                Connect_Retry: 3\n              Master_Log_File: gbichot-bin.005\n          Read_Master_Log_Pos: 79\n               Relay_Log_File: gbichot-relay-bin.005\n                Relay_Log_Pos: 548\n        Relay_Master_Log_File: gbichot-bin.005\n             Slave_IO_Running: Yes\n            Slave_SQL_Running: Yes\n              Replicate_Do_DB:\n          Replicate_Ignore_DB:\n                   Last_Errno: 0\n                   Last_Error:\n                 Skip_Counter: 0\n          Exec_Master_Log_Pos: 79\n              Relay_Log_Space: 552\n              Until_Condition: None\n               Until_Log_File:\n                Until_Log_Pos: 0\n           Master_SSL_Allowed: No\n           Master_SSL_CA_File:\n           Master_SSL_CA_Path:\n              Master_SSL_Cert:\n            Master_SSL_Cipher:\n               Master_SSL_Key:\n        Seconds_Behind_Master: 8\nMaster_SSL_Verify_Server_Cert: No\n                Last_IO_Errno: 0\n                Last_IO_Error:\n               Last_SQL_Errno: 0\n               Last_SQL_Error:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-slave-status.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-slave-status.html'),
(219, 'GEOMETRY', 33, 'MySQL provides a standard way of creating spatial columns for geometry\ntypes, for example, with CREATE TABLE or ALTER TABLE. Currently,\nspatial columns are supported for MyISAM, InnoDB, NDB, and ARCHIVE\ntables. See also the annotations about spatial indexes under [HELP\nSPATIAL].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-columns.html\n\n', 'CREATE TABLE geom (g GEOMETRY);\n', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-columns.html'),
(220, 'NUMPOINTS', 12, 'NumPoints(ls)\n\nReturns the number of Point objects in the LineString value ls.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions\n\n', 'mysql> SET @ls = ''LineString(1 1,2 2,3 3)'';\nmysql> SELECT NumPoints(GeomFromText(@ls));\n+------------------------------+\n| NumPoints(GeomFromText(@ls)) |\n+------------------------------+\n|                            3 |\n+------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions'),
(221, '&', 19, 'Syntax:\n&\n\nBitwise AND:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html\n\n', 'mysql> SELECT 29 & 15;\n        -> 13\n', 'http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html'),
(222, 'LOCALTIMESTAMP', 31, 'Syntax:\nLOCALTIMESTAMP, LOCALTIMESTAMP()\n\nLOCALTIMESTAMP and LOCALTIMESTAMP() are synonyms for NOW().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(223, 'CONVERT', 36, 'Syntax:\nCONVERT(expr,type), CONVERT(expr USING transcoding_name)\n\nThe CONVERT() and CAST() functions take a value of one type and produce\na value of another type.\n\nThe type can be one of the following values:\n\no BINARY[(N)]\n\no CHAR[(N)]\n\no DATE\n\no DATETIME\n\no DECIMAL[(M[,D])]\n\no SIGNED [INTEGER]\n\no TIME\n\no UNSIGNED [INTEGER]\n\nBINARY produces a string with the BINARY data type. See\nhttp://dev.mysql.com/doc/refman/5.1/en/binary-varbinary.html for a\ndescription of how this affects comparisons. If the optional length N\nis given, BINARY(N) causes the cast to use no more than N bytes of the\nargument. Values shorter than N bytes are padded with 0x00 bytes to a\nlength of N.\n\nCHAR(N) causes the cast to use no more than N characters of the\nargument.\n\nCAST() and CONVERT(... USING ...) are standard SQL syntax. The\nnon-USING form of CONVERT() is ODBC syntax.\n\nCONVERT() with USING is used to convert data between different\ncharacter sets. In MySQL, transcoding names are the same as the\ncorresponding character set names. For example, this statement converts\nthe string ''abc'' in the default character set to the corresponding\nstring in the utf8 character set:\n\nSELECT CONVERT(''abc'' USING utf8);\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/cast-functions.html\n\n', 'SELECT enum_col FROM tbl_name ORDER BY CAST(enum_col AS CHAR);\n', 'http://dev.mysql.com/doc/refman/5.1/en/cast-functions.html'),
(224, 'ADDDATE', 31, 'Syntax:\nADDDATE(date,INTERVAL expr unit), ADDDATE(expr,days)\n\nWhen invoked with the INTERVAL form of the second argument, ADDDATE()\nis a synonym for DATE_ADD(). The related function SUBDATE() is a\nsynonym for DATE_SUB(). For information on the INTERVAL unit argument,\nsee the discussion for DATE_ADD().\n\nmysql> SELECT DATE_ADD(''2008-01-02'', INTERVAL 31 DAY);\n        -> ''2008-02-02''\nmysql> SELECT ADDDATE(''2008-01-02'', INTERVAL 31 DAY);\n        -> ''2008-02-02''\n\nWhen invoked with the days form of the second argument, MySQL treats it\nas an integer number of days to be added to expr.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT ADDDATE(''2008-01-02'', 31);\n        -> ''2008-02-02''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(225, 'REPEAT LOOP', 23, 'Syntax:\n[begin_label:] REPEAT\n    statement_list\nUNTIL search_condition\nEND REPEAT [end_label]\n\nThe statement list within a REPEAT statement is repeated until the\nsearch_condition is true. Thus, a REPEAT always enters the loop at\nleast once. statement_list consists of one or more statements, each\nterminated by a semicolon (;) statement delimiter.\n\nA REPEAT statement can be labeled. end_label cannot be given unless\nbegin_label also is present. If both are present, they must be the\nsame.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/repeat-statement.html\n\n', 'mysql> delimiter //\n\nmysql> CREATE PROCEDURE dorepeat(p1 INT)\n    -> BEGIN\n    ->   SET @x = 0;\n    ->   REPEAT SET @x = @x + 1; UNTIL @x > p1 END REPEAT;\n    -> END\n    -> //\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> CALL dorepeat(1000)//\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> SELECT @x//\n+------+\n| @x   |\n+------+\n| 1001 |\n+------+\n1 row in set (0.00 sec)\n', 'http://dev.mysql.com/doc/refman/5.1/en/repeat-statement.html'),
(226, 'SMALLINT', 21, 'SMALLINT[(M)] [UNSIGNED] [ZEROFILL]\n\nA small integer. The signed range is -32768 to 32767. The unsigned\nrange is 0 to 65535.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(227, 'DOUBLE PRECISION', 21, 'DOUBLE PRECISION[(M,D)] [UNSIGNED] [ZEROFILL], REAL[(M,D)] [UNSIGNED]\n[ZEROFILL]\n\nThese types are synonyms for DOUBLE. Exception: If the REAL_AS_FLOAT\nSQL mode is enabled, REAL is a synonym for FLOAT rather than DOUBLE.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(228, 'ORD', 36, 'Syntax:\nORD(str)\n\nIf the leftmost character of the string str is a multi-byte character,\nreturns the code for that character, calculated from the numeric values\nof its constituent bytes using this formula:\n\n  (1st byte code)\n+ (2nd byte code x 256)\n+ (3rd byte code x 2562) ...\n\nIf the leftmost character is not a multi-byte character, ORD() returns\nthe same value as the ASCII() function.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT ORD(''2'');\n        -> 50\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(229, 'DEALLOCATE PREPARE', 27, 'Syntax:\n{DEALLOCATE | DROP} PREPARE stmt_name\n\nTo deallocate a prepared statement, use the DEALLOCATE PREPARE\nstatement. Attempting to execute a prepared statement after\ndeallocating it results in an error.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-prepared-statements.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-prepared-statements.html');
INSERT INTO `help_topic` (`help_topic_id`, `name`, `help_category_id`, `description`, `example`, `url`) VALUES
(230, 'ENVELOPE', 35, 'Envelope(g)\n\nReturns the Minimum Bounding Rectangle (MBR) for the geometry value g.\nThe result is returned as a Polygon value.\n\nThe polygon is defined by the corner points of the bounding box:\n\nPOLYGON((MINX MINY, MAXX MINY, MAXX MAXY, MINX MAXY, MINX MINY))\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions\n\n', 'mysql> SELECT AsText(Envelope(GeomFromText(''LineString(1 1,2 2)'')));\n+-------------------------------------------------------+\n| AsText(Envelope(GeomFromText(''LineString(1 1,2 2)''))) |\n+-------------------------------------------------------+\n| POLYGON((1 1,2 1,2 2,1 2,1 1))                        |\n+-------------------------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions'),
(231, 'IS_FREE_LOCK', 14, 'Syntax:\nIS_FREE_LOCK(str)\n\nChecks whether the lock named str is free to use (that is, not locked).\nReturns 1 if the lock is free (no one is using the lock), 0 if the lock\nis in use, and NULL if an error occurs (such as an incorrect argument).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(232, 'TOUCHES', 30, 'Touches(g1,g2)\n\nReturns 1 or 0 to indicate whether g1 spatially touches g2. Two\ngeometries spatially touch if the interiors of the geometries do not\nintersect, but the boundary of one of the geometries intersects either\nthe boundary or the interior of the other.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html'),
(233, 'INET_ATON', 14, 'Syntax:\nINET_ATON(expr)\n\nGiven the dotted-quad representation of a network address as a string,\nreturns an integer that represents the numeric value of the address.\nAddresses may be 4- or 8-byte addresses.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', 'mysql> SELECT INET_ATON(''209.207.224.40'');\n        -> 3520061480\n', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(234, 'UNCOMPRESS', 11, 'Syntax:\nUNCOMPRESS(string_to_uncompress)\n\nUncompresses a string compressed by the COMPRESS() function. If the\nargument is not a compressed value, the result is NULL. This function\nrequires MySQL to have been compiled with a compression library such as\nzlib. Otherwise, the return value is always NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', 'mysql> SELECT UNCOMPRESS(COMPRESS(''any string''));\n        -> ''any string''\nmysql> SELECT UNCOMPRESS(''any string'');\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(235, 'AUTO_INCREMENT', 21, 'The AUTO_INCREMENT attribute can be used to generate a unique identity\nfor new rows:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/example-auto-increment.html\n\n', 'CREATE TABLE animals (\n     id MEDIUMINT NOT NULL AUTO_INCREMENT,\n     name CHAR(30) NOT NULL,\n     PRIMARY KEY (id)\n );\n\nINSERT INTO animals (name) VALUES \n    (''dog''),(''cat''),(''penguin''),\n    (''lax''),(''whale''),(''ostrich'');\n\nSELECT * FROM animals;\n', 'http://dev.mysql.com/doc/refman/5.1/en/example-auto-increment.html'),
(236, 'ISSIMPLE', 35, 'IsSimple(g)\n\nCurrently, this function is a placeholder and should not be used. If\nimplemented, its behavior will be as described in the next paragraph.\n\nReturns 1 if the geometry value g has no anomalous geometric points,\nsuch as self-intersection or self-tangency. IsSimple() returns 0 if the\nargument is not simple, and -1 if it is NULL.\n\nThe description of each instantiable geometric class given earlier in\nthe chapter includes the specific conditions that cause an instance of\nthat class to be classified as not simple. (See [HELP Geometry\nhierarchy].)\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions'),
(237, '- BINARY', 4, 'Syntax:\n-\n\nSubtraction:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html\n\n', 'mysql> SELECT 3-5;\n        -> -2\n', 'http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html'),
(238, 'GEOMCOLLFROMTEXT', 3, 'GeomCollFromText(wkt[,srid]), GeometryCollectionFromText(wkt[,srid])\n\nConstructs a GEOMETRYCOLLECTION value using its WKT representation and\nSRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions'),
(239, 'WKT DEFINITION', 3, 'The Well-Known Text (WKT) representation of Geometry is designed to\nexchange geometry data in ASCII form.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/gis-wkt-format.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/gis-wkt-format.html'),
(240, 'CURRENT_TIME', 31, 'Syntax:\nCURRENT_TIME, CURRENT_TIME()\n\nCURRENT_TIME and CURRENT_TIME() are synonyms for CURTIME().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(241, 'REVOKE', 9, 'Syntax:\nREVOKE\n    priv_type [(column_list)]\n      [, priv_type [(column_list)]] ...\n    ON [object_type]\n        {\n            *\n          | *.*\n          | db_name.*\n          | db_name.tbl_name\n          | tbl_name\n          | db_name.routine_name\n\n        }\n    FROM user [, user] ...\n\nREVOKE ALL PRIVILEGES, GRANT OPTION FROM user [, user] ...\n\nThe REVOKE statement enables system administrators to revoke privileges\nfrom MySQL accounts. Each account is named using the same format as for\nthe GRANT statement; for example, ''jeffrey''@''localhost''. If you specify\nonly the username part of the account name, a hostname part of ''%'' is\nused. For additional information about specifying account names, see\n[HELP GRANT].\n\nTo use the first REVOKE syntax, you must have the GRANT OPTION\nprivilege, and you must have the privileges that you are revoking.\n\nFor details on the levels at which privileges exist, the allowable\npriv_type values, and the syntax for specifying users and passwords,\nsee [HELP GRANT]\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/revoke.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/revoke.html'),
(242, 'LAST_INSERT_ID', 15, 'Syntax:\nLAST_INSERT_ID(), LAST_INSERT_ID(expr)\n\nFor MySQL 5.1.12 and later, LAST_INSERT_ID() (no arguments) returns the\nfirst automatically generated value successfully inserted for an\nAUTO_INCREMENT column as a result of the most recently executed INSERT\nstatement. The value of LAST_INSERT_ID() remains unchanged if no rows\nare successfully inserted.\n\nFor example, after inserting a row that generates an AUTO_INCREMENT\nvalue, you can get the value like this:\n\nmysql> SELECT LAST_INSERT_ID();\n        -> 195\n\nIn MySQL 5.1.11 and earlier, LAST_INSERT_ID() (no arguments) returns\nthe first automatically generated value if any rows were successfully\ninserted or updated. This means that the returned value could be a\nvalue that was not successfully inserted into the table. If no rows\nwere successfully inserted, LAST_INSERT_ID() returns 0.\n\nThe value of LAST_INSERT_ID() will be consistent across all versions if\nall rows in the INSERT or UPDATE statement were successful.\n\nif a table contains an AUTO_INCREMENT column and INSERT ... ON\nDUPLICATE KEY UPDATE updates (rather than inserts) a row, the value of\nLAST_INSERT_ID() is not meaningful prior to MySQL 5.1.12. For a\nworkaround, see\nhttp://dev.mysql.com/doc/refman/5.1/en/insert-on-duplicate.html.\n\nThe currently executing statement does not affect the value of\nLAST_INSERT_ID(). Suppose that you generate an AUTO_INCREMENT value\nwith one statement, and then refer to LAST_INSERT_ID() in a\nmultiple-row INSERT statement that inserts rows into a table with its\nown AUTO_INCREMENT column. The value of LAST_INSERT_ID() will remain\nstable in the second statement; its value for the second and later rows\nis not affected by the earlier row insertions. (However, if you mix\nreferences to LAST_INSERT_ID() and LAST_INSERT_ID(expr), the effect is\nundefined.)\n\nIf the previous statement returned an error, the value of\nLAST_INSERT_ID() is undefined. For transactional tables, if the\nstatement is rolled back due to an error, the value of LAST_INSERT_ID()\nis left undefined. For manual ROLLBACK, the value of LAST_INSERT_ID()\nis not restored to that before the transaction; it remains as it was at\nthe point of the ROLLBACK.\n\nWithin the body of a stored routine (procedure or function) or a\ntrigger, the value of LAST_INSERT_ID() changes the same way as for\nstatements executed outside the body of these kinds of objects. The\neffect of a stored routine or trigger upon the value of\nLAST_INSERT_ID() that is seen by following statements depends on the\nkind of routine:\n\no If a stored procedure executes statements that change the value of\n  LAST_INSERT_ID(), the changed value will be seen by statements that\n  follow the procedure call.\n\no For stored functions and triggers that change the value, the value is\n  restored when the function or trigger ends, so following statements\n  will not see a changed value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(243, 'LAST_DAY', 31, 'Syntax:\nLAST_DAY(date)\n\nTakes a date or datetime value and returns the corresponding value for\nthe last day of the month. Returns NULL if the argument is invalid.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT LAST_DAY(''2003-02-05'');\n        -> ''2003-02-28''\nmysql> SELECT LAST_DAY(''2004-02-05'');\n        -> ''2004-02-29''\nmysql> SELECT LAST_DAY(''2004-01-01 01:01:01'');\n        -> ''2004-01-31''\nmysql> SELECT LAST_DAY(''2003-03-32'');\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(244, 'MEDIUMINT', 21, 'MEDIUMINT[(M)] [UNSIGNED] [ZEROFILL]\n\nA medium-sized integer. The signed range is -8388608 to 8388607. The\nunsigned range is 0 to 16777215.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(245, 'FLOOR', 4, 'Syntax:\nFLOOR(X)\n\nReturns the largest integer value not greater than X.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT FLOOR(1.23);\n        -> 1\nmysql> SELECT FLOOR(-1.23);\n        -> -2\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(246, 'RTRIM', 36, 'Syntax:\nRTRIM(str)\n\nReturns the string str with trailing space characters removed.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT RTRIM(''barbar   '');\n        -> ''barbar''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(247, 'EXPLAIN', 28, 'Syntax:\nEXPLAIN tbl_name\n\nOr:\n\nEXPLAIN [EXTENDED | PARTITIONS] SELECT select_options\n\nThe EXPLAIN statement can be used either as a synonym for DESCRIBE or\nas a way to obtain information about how MySQL executes a SELECT\nstatement:\n\no EXPLAIN tbl_name is synonymous with DESCRIBE tbl_name or SHOW COLUMNS\n  FROM tbl_name.\n\n  For a description of the DESCRIBE and SHOW COLUMNS statements, see\n  [HELP DESCRIBE], and [HELP SHOW COLUMNS].\n\no When you precede a SELECT statement with the keyword EXPLAIN, MySQL\n  displays information from the optimizer about the query execution\n  plan. That is, MySQL explains how it would process the SELECT,\n  including information about how tables are joined and in which order.\n\n  For information regarding the use of EXPLAIN for obtaining query\n  execution plan information, see\n  http://dev.mysql.com/doc/refman/5.1/en/using-explain.html.\n\no EXPLAIN PARTITIONS is available beginning with MySQL 5.1.5. It is\n  useful only when examining queries involving partitioned tables.\n\n  For details, see\n  http://dev.mysql.com/doc/refman/5.1/en/partitioning-info.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/explain.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/explain.html'),
(248, 'DEGREES', 4, 'Syntax:\nDEGREES(X)\n\nReturns the argument X, converted from radians to degrees.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT DEGREES(PI());\n        -> 180\nmysql> SELECT DEGREES(PI() / 2);\n        -> 90\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(249, 'VARCHAR', 21, '[NATIONAL] VARCHAR(M) [CHARACTER SET charset_name] [COLLATE\ncollation_name]\n\nA variable-length string. M represents the maximum column length in\ncharacters. The range of M is 0 to 65,535. The effective maximum length\nof a VARCHAR is subject to the maximum row size (65,535 bytes, which is\nshared among all columns) and the character set used. For example, utf8\ncharacters can require up to three bytes per character, so a VARCHAR\ncolumn that uses the utf8 character set can be declared to be a maximum\nof 21,844 characters.\n\nMySQL stores VARCHAR values as a one-byte or two-byte length prefix\nplus data. The length prefix indicates the number of bytes in the\nvalue. A VARCHAR column uses one length byte if values require no more\nthan 255 bytes, two length bytes if values may require more than 255\nbytes.\n\n*Note*: MySQL 5.1 follows the standard SQL specification, and does not\nremove trailing spaces from VARCHAR values.\n\nVARCHAR is shorthand for CHARACTER VARYING. NATIONAL VARCHAR is the\nstandard SQL way to define that a VARCHAR column should use some\npredefined character set. MySQL 4.1 and up uses utf8 as this predefined\ncharacter set.\nhttp://dev.mysql.com/doc/refman/5.1/en/charset-national.html. NVARCHAR\nis shorthand for NATIONAL VARCHAR.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(250, 'UNHEX', 36, 'Syntax:\n\nUNHEX(str)\n\nPerforms the inverse operation of HEX(str). That is, it interprets each\npair of hexadecimal digits in the argument as a number and converts it\nto the character represented by the number. The resulting characters\nare returned as a binary string.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT UNHEX(''4D7953514C'');\n        -> ''MySQL''\nmysql> SELECT 0x4D7953514C;\n        -> ''MySQL''\nmysql> SELECT UNHEX(HEX(''string''));\n        -> ''string''\nmysql> SELECT HEX(UNHEX(''1267''));\n        -> ''1267''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(251, '- UNARY', 4, 'Syntax:\n-\n\nUnary minus. This operator changes the sign of the argument.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html\n\n', 'mysql> SELECT - 2;\n        -> -2\n', 'http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html'),
(252, 'SELECT INTO', 23, 'Syntax:\nSELECT col_name [, col_name] ...\n    INTO var_name [, var_name] ...\n    table_expr\n\nSELECT ... INTO syntax enables selected columns to be stored directly\ninto variables. The statement must retrieve only a single row. If it is\npossible that the statement may retrieve multiple rows, you can use\nLIMIT 1 to limit the result set to a single row.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/select-into-statement.html\n\n', 'SELECT id,data INTO x,y FROM test.t1 LIMIT 1;\n', 'http://dev.mysql.com/doc/refman/5.1/en/select-into-statement.html'),
(253, 'STD', 16, 'Syntax:\nSTD(expr)\n\nReturns the population standard deviation of expr. This is an extension\nto standard SQL. The standard SQL function STDDEV_POP() can be used\ninstead.\n\nThis function returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(254, 'COS', 4, 'Syntax:\nCOS(X)\n\nReturns the cosine of X, where X is given in radians.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT COS(PI());\n        -> -1\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(255, 'DATE FUNCTION', 31, 'Syntax:\nDATE(expr)\n\nExtracts the date part of the date or datetime expression expr.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT DATE(''2003-12-31 01:02:03'');\n        -> ''2003-12-31''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(256, 'DROP TRIGGER', 38, 'Syntax:\nDROP TRIGGER [IF EXISTS] [schema_name.]trigger_name\n\nThis statement drops a trigger. The schema (database) name is optional.\nIf the schema is omitted, the trigger is dropped from the default\nschema. DROP TRIGGER was added in MySQL 5.0.2. Its use requires the\nTRIGGER privilege for the table associated with the trigger. (This\nstatement requires the SUPER privilege prior to MySQL 5.1.6.)\n\nUse IF EXISTS to prevent an error from occurring for a trigger that\ndoes not exist. A NOTE is generated for a non-existent trigger when\nusing IF EXISTS. See [HELP SHOW WARNINGS]. The IF EXISTS clause was\nadded in MySQL 5.1.14.\n\nTriggers for a table are also dropped if you drop the table.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-trigger.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-trigger.html'),
(257, 'RESET MASTER', 27, 'Syntax:\nRESET MASTER\n\nDeletes all binary logs listed in the index file, resets the binary log\nindex file to be empty, and creates a new binary log file. It is\nintended to be used only when the master is started for the first time.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/reset-master.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/reset-master.html'),
(258, 'TAN', 4, 'Syntax:\nTAN(X)\n\nReturns the tangent of X, where X is given in radians.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT TAN(PI());\n        -> -1.2246063538224e-16\nmysql> SELECT TAN(PI()+1);\n        -> 1.5574077246549\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(259, 'PI', 4, 'Syntax:\nPI()\n\nReturns the value of π (pi). The default number of decimal places\ndisplayed is seven, but MySQL uses the full double-precision value\ninternally.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT PI();\n        -> 3.141593\nmysql> SELECT PI()+0.000000000000000000;\n        -> 3.141592653589793116\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(260, 'WEEKOFYEAR', 31, 'Syntax:\nWEEKOFYEAR(date)\n\nReturns the calendar week of the date as a number in the range from 1\nto 53. WEEKOFYEAR() is a compatibility function that is equivalent to\nWEEK(date,3).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT WEEKOFYEAR(''2008-02-20'');\n        -> 8\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(261, '/', 4, 'Syntax:\n/\n\nDivision:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html\n\n', 'mysql> SELECT 3/5;\n        -> 0.60\n', 'http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html'),
(262, 'PURGE BINARY LOGS', 27, 'Syntax:\nPURGE { BINARY | MASTER } LOGS\n    { TO ''log_name'' | BEFORE datetime_expr }\n\nThe binary log is a set of files that contain information about data\nmodifications made by the MySQL server. The log consists of a set of\nbinary log files, plus an index file.\n\nThe PURGE BINARY LOGS statement deletes all the binary log files listed\nin the log index file prior to the specified log file name or date. The\nlog files also are removed from the list recorded in the index file, so\nthat the given log file becomes the first.\n\nThis statement has no effect if the --log-bin option has not been\nenabled.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/purge-binary-logs.html\n\n', 'PURGE BINARY LOGS TO ''mysql-bin.010'';\nPURGE BINARY LOGS BEFORE ''2008-04-02 22:46:26'';\n', 'http://dev.mysql.com/doc/refman/5.1/en/purge-binary-logs.html'),
(263, 'STDDEV_SAMP', 16, 'Syntax:\nSTDDEV_SAMP(expr)\n\nReturns the sample standard deviation of expr (the square root of\nVAR_SAMP().\n\nSTDDEV_SAMP() returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(264, 'SCHEMA', 15, 'Syntax:\nSCHEMA()\n\nThis function is a synonym for DATABASE().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(265, 'MLINEFROMWKB', 32, 'MLineFromWKB(wkb[,srid]), MultiLineStringFromWKB(wkb[,srid])\n\nConstructs a MULTILINESTRING value using its WKB representation and\nSRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions'),
(266, 'LOG2', 4, 'Syntax:\nLOG2(X)\n\nReturns the base-2 logarithm of X.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT LOG2(65536);\n        -> 16\nmysql> SELECT LOG2(-100);\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(267, 'SUBTIME', 31, 'Syntax:\nSUBTIME(expr1,expr2)\n\nSUBTIME() returns expr1 - expr2 expressed as a value in the same format\nas expr1. expr1 is a time or datetime expression, and expr2 is a time\nexpression.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT SUBTIME(''2007-12-31 23:59:59.999999'',''1 1:1:1.000002'');\n        -> ''2007-12-30 22:58:58.999997''\nmysql> SELECT SUBTIME(''01:00:00.999999'', ''02:00:00.999998'');\n        -> ''-00:59:59.999999''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(268, 'UNCOMPRESSED_LENGTH', 11, 'Syntax:\nUNCOMPRESSED_LENGTH(compressed_string)\n\nReturns the length that the compressed string had before being\ncompressed.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', 'mysql> SELECT UNCOMPRESSED_LENGTH(COMPRESS(REPEAT(''a'',30)));\n        -> 30\n', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(269, 'DROP TABLE', 38, 'Syntax:\nDROP [TEMPORARY] TABLE [IF EXISTS]\n    tbl_name [, tbl_name] ...\n    [RESTRICT | CASCADE]\n\nDROP TABLE removes one or more tables. You must have the DROP privilege\nfor each table. All table data and the table definition are removed, so\nbe careful with this statement! If any of the tables named in the\nargument list do not exist, MySQL returns an error indicating by name\nwhich non-existing tables it was unable to drop, but it also drops all\nof the tables in the list that do exist.\n\n*Important*: When a table is dropped, user privileges on the table are\nnot automatically dropped. See [HELP GRANT].\n\nNote that for a partitioned table, DROP TABLE permanently removes the\ntable definition, all of its partitions, and all of the data which was\nstored in those partitions. It also removes the partitioning definition\n(.par) file associated with the dropped table.\n\nUse IF EXISTS to prevent an error from occurring for tables that do not\nexist. A NOTE is generated for each non-existent table when using IF\nEXISTS. See [HELP SHOW WARNINGS].\n\nRESTRICT and CASCADE are allowed to make porting easier. In MySQL 5.1,\nthey do nothing.\n\n*Note*: DROP TABLE automatically commits the current active\ntransaction, unless you use the TEMPORARY keyword.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-table.html'),
(270, 'POW', 4, 'Syntax:\nPOW(X,Y)\n\nReturns the value of X raised to the power of Y.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT POW(2,2);\n        -> 4\nmysql> SELECT POW(2,-2);\n        -> 0.25\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(271, 'SHOW CREATE TABLE', 27, 'Syntax:\nSHOW CREATE TABLE tbl_name\n\nShows the CREATE TABLE statement that creates the given table. This\nstatement also works with views.\nSHOW CREATE TABLE quotes table and column names according to the value\nof the SQL_QUOTE_SHOW_CREATE option. See\nhttp://dev.mysql.com/doc/refman/5.1/en/server-session-variables.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-create-table.html\n\n', 'mysql> SHOW CREATE TABLE t\\G\n*************************** 1. row ***************************\n       Table: t\nCreate Table: CREATE TABLE t (\n  id INT(11) default NULL auto_increment,\n  s char(60) default NULL,\n  PRIMARY KEY (id)\n) ENGINE=MyISAM\n', 'http://dev.mysql.com/doc/refman/5.1/en/show-create-table.html'),
(272, 'DUAL', 27, 'You are allowed to specify DUAL as a dummy table name in situations\nwhere no tables are referenced:\n\nmysql> SELECT 1 + 1 FROM DUAL;\n        -> 2\n\nDUAL is purely for the convenience of people who require that all\nSELECT statements should have FROM and possibly other clauses. MySQL\nmay ignore the clauses. MySQL does not require FROM DUAL if no tables\nare referenced.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/select.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/select.html'),
(273, 'INSTR', 36, 'Syntax:\nINSTR(str,substr)\n\nReturns the position of the first occurrence of substring substr in\nstring str. This is the same as the two-argument form of LOCATE(),\nexcept that the order of the arguments is reversed.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT INSTR(''foobarbar'', ''bar'');\n        -> 4\nmysql> SELECT INSTR(''xbar'', ''foobar'');\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(274, 'NOW', 31, 'Syntax:\nNOW()\n\nReturns the current date and time as a value in ''YYYY-MM-DD HH:MM:SS''\nor YYYYMMDDHHMMSS.uuuuuu format, depending on whether the function is\nused in a string or numeric context. The value is expressed in the\ncurrent time zone.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT NOW();\n        -> ''2007-12-15 23:50:26''\nmysql> SELECT NOW() + 0;\n        -> 20071215235026.000000\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(275, 'SHOW ENGINES', 27, 'Syntax:\nSHOW [STORAGE] ENGINES\n\nSHOW ENGINES displays status information about the server''s storage\nengines. This is particularly useful for checking whether a storage\nengine is supported, or to see what the default engine is. SHOW TABLE\nTYPES is a deprecated synonym.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-engines.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-engines.html'),
(276, '>=', 18, 'Syntax:\n>=\n\nGreater than or equal:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 2 >= 2;\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(277, 'EXP', 4, 'Syntax:\nEXP(X)\n\nReturns the value of e (the base of natural logarithms) raised to the\npower of X. The inverse of this function is LOG() (using a single\nargument only) or LN().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT EXP(2);\n        -> 7.3890560989307\nmysql> SELECT EXP(-2);\n        -> 0.13533528323661\nmysql> SELECT EXP(0);\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(278, 'LONGBLOB', 21, 'LONGBLOB\n\nA BLOB column with a maximum length of 4,294,967,295 or 4GB (232 - 1)\nbytes. The effective maximum length of LONGBLOB columns depends on the\nconfigured maximum packet size in the client/server protocol and\navailable memory. Each LONGBLOB value is stored using a four-byte\nlength prefix that indicates the number of bytes in the value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(279, 'POINTN', 12, 'PointN(ls,N)\n\nReturns the N-th Point in the Linestring value ls. Points are numbered\nbeginning with 1.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions\n\n', 'mysql> SET @ls = ''LineString(1 1,2 2,3 3)'';\nmysql> SELECT AsText(PointN(GeomFromText(@ls),2));\n+-------------------------------------+\n| AsText(PointN(GeomFromText(@ls),2)) |\n+-------------------------------------+\n| POINT(2 2)                          |\n+-------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions'),
(280, 'YEAR DATA TYPE', 21, 'YEAR[(2|4)]\n\nA year in two-digit or four-digit format. The default is four-digit\nformat. In four-digit format, the allowable values are 1901 to 2155,\nand 0000. In two-digit format, the allowable values are 70 to 69,\nrepresenting years from 1970 to 2069. MySQL displays YEAR values in\nYYYY format, but allows you to assign values to YEAR columns using\neither strings or numbers.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html'),
(281, 'SUM', 16, 'Syntax:\nSUM([DISTINCT] expr)\n\nReturns the sum of expr. If the return set has no rows, SUM() returns\nNULL. The DISTINCT keyword can be used in MySQL 5.1 to sum only the\ndistinct values of expr.\n\nSUM() returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(282, 'OCT', 4, 'Syntax:\nOCT(N)\n\nReturns a string representation of the octal value of N, where N is a\nlonglong (BIGINT) number. This is equivalent to CONV(N,10,8). Returns\nNULL if N is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT OCT(12);\n        -> ''14''\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(283, 'SYSDATE', 31, 'Syntax:\nSYSDATE()\n\nReturns the current date and time as a value in ''YYYY-MM-DD HH:MM:SS''\nor YYYYMMDDHHMMSS.uuuuuu format, depending on whether the function is\nused in a string or numeric context.\n\nSYSDATE() returns the time at which it executes. This differs from the\nbehavior for NOW(), which returns a constant time that indicates the\ntime at which the statement began to execute. (Within a stored routine\nor trigger, NOW() returns the time at which the routine or triggering\nstatement began to execute.)\n\nmysql> SELECT NOW(), SLEEP(2), NOW();\n+---------------------+----------+---------------------+\n| NOW()               | SLEEP(2) | NOW()               |\n+---------------------+----------+---------------------+\n| 2006-04-12 13:47:36 |        0 | 2006-04-12 13:47:36 |\n+---------------------+----------+---------------------+\n\nmysql> SELECT SYSDATE(), SLEEP(2), SYSDATE();\n+---------------------+----------+---------------------+\n| SYSDATE()           | SLEEP(2) | SYSDATE()           |\n+---------------------+----------+---------------------+\n| 2006-04-12 13:47:44 |        0 | 2006-04-12 13:47:46 |\n+---------------------+----------+---------------------+\n\nIn addition, the SET TIMESTAMP statement affects the value returned by\nNOW() but not by SYSDATE(). This means that timestamp settings in the\nbinary log have no effect on invocations of SYSDATE().\n\nBecause SYSDATE() can return different values even within the same\nstatement, and is not affected by SET TIMESTAMP, it is\nnon-deterministic and therefore unsafe for replication if\nstatement-based binary logging is used. If that is a problem, you can\nuse row-based logging, or start the server with the --sysdate-is-now\noption to cause SYSDATE() to be an alias for NOW(). The\nnon-deterministic nature of SYSDATE() also means that indexes cannot be\nused for evaluating expressions that refer to it.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(284, 'UNINSTALL PLUGIN', 5, 'Syntax:\nUNINSTALL PLUGIN plugin_name\n\nThis statement removes an installed plugin. You cannot uninstall a\nplugin if any table that uses it is open.\n\nplugin_name must be the name of some plugin that is listed in the\nmysql.plugin table. The server executes the plugin''s deinitialization\nfunction and removes the row for the plugin from the mysql.plugin\ntable, so that subsequent server restarts will not load and initialize\nthe plugin. UNINSTALL PLUGIN does not remove the plugin''s shared\nlibrary file.\n\nTo use UNINSTALL PLUGIN, you must have the DELETE privilege for the\nmysql.plugin table.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/uninstall-plugin.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/uninstall-plugin.html'),
(285, 'ASBINARY', 32, 'AsBinary(g), AsWKB(g)\n\nConverts a value in internal geometry format to its WKB representation\nand returns the binary result.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-to-convert-geometries-between-formats.html\n\n', 'SELECT AsBinary(g) FROM geom;\n', 'http://dev.mysql.com/doc/refman/5.1/en/functions-to-convert-geometries-between-formats.html'),
(286, 'REPEAT FUNCTION', 36, 'Syntax:\nREPEAT(str,count)\n\nReturns a string consisting of the string str repeated count times. If\ncount is less than 1, returns an empty string. Returns NULL if str or\ncount are NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT REPEAT(''MySQL'', 3);\n        -> ''MySQLMySQLMySQL''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(287, 'SHOW TABLES', 27, 'Syntax:\nSHOW [FULL] TABLES [FROM db_name]\n    [LIKE ''pattern'' | WHERE expr]\n\nSHOW TABLES lists the non-TEMPORARY tables in a given database. You can\nalso get this list using the mysqlshow db_name command. The LIKE\nclause, if present, indicates which table names to match. The WHERE\nclause can be given to select rows using more general conditions, as\ndiscussed in http://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\n\nThis statement also lists any views in the database. The FULL modifier\nis supported such that SHOW FULL TABLES displays a second output\ncolumn. Values for the second column are BASE TABLE for a table and\nVIEW for a view.\n\nIf you have no privileges for a base table or view, it does not show up\nin the output from SHOW TABLES or mysqlshow db_name.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-tables.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-tables.html'),
(288, 'MAKEDATE', 31, 'Syntax:\nMAKEDATE(year,dayofyear)\n\nReturns a date, given year and day-of-year values. dayofyear must be\ngreater than 0 or the result is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT MAKEDATE(2011,31), MAKEDATE(2011,32);\n        -> ''2011-01-31'', ''2011-02-01''\nmysql> SELECT MAKEDATE(2011,365), MAKEDATE(2014,365);\n        -> ''2011-12-31'', ''2014-12-31''\nmysql> SELECT MAKEDATE(2011,0);\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(289, 'BINARY OPERATOR', 36, 'Syntax:\nBINARY\n\nThe BINARY operator casts the string following it to a binary string.\nThis is an easy way to force a column comparison to be done byte by\nbyte rather than character by character. This causes the comparison to\nbe case sensitive even if the column isn''t defined as BINARY or BLOB.\nBINARY also causes trailing spaces to be significant.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/cast-functions.html\n\n', 'mysql> SELECT ''a'' = ''A'';\n        -> 1\nmysql> SELECT BINARY ''a'' = ''A'';\n        -> 0\nmysql> SELECT ''a'' = ''a '';\n        -> 1\nmysql> SELECT BINARY ''a'' = ''a '';\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/cast-functions.html'),
(290, 'MBROVERLAPS', 6, 'MBROverlaps(g1,g2)\n\nReturns 1 or 0 to indicate whether the Minimum Bounding Rectangles of\nthe two geometries g1 and g2 overlap. The term spatially overlaps is\nused if two geometries intersect and their intersection results in a\ngeometry of the same dimension but not equal to either of the given\ngeometries.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html'),
(291, 'SOUNDEX', 36, 'Syntax:\nSOUNDEX(str)\n\nReturns a soundex string from str. Two strings that sound almost the\nsame should have identical soundex strings. A standard soundex string\nis four characters long, but the SOUNDEX() function returns an\narbitrarily long string. You can use SUBSTRING() on the result to get a\nstandard soundex string. All non-alphabetic characters in str are\nignored. All international alphabetic characters outside the A-Z range\nare treated as vowels.\n\n*Important*: When using SOUNDEX(), you should be aware of the following\nlimitations:\n\no This function, as currently implemented, is intended to work well\n  with strings that are in the English language only. Strings in other\n  languages may not produce reliable results.\n\no This function is not guaranteed to provide consistent results with\n  strings that use multi-byte character sets, including utf-8.\n\n  We hope to remove these limitations in a future release. See\n  Bug#22638 (http://bugs.mysql.com/22638) for more information.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT SOUNDEX(''Hello'');\n        -> ''H400''\nmysql> SELECT SOUNDEX(''Quadratically'');\n        -> ''Q36324''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(292, 'MBRTOUCHES', 6, 'MBRTouches(g1,g2)\n\nReturns 1 or 0 to indicate whether the Minimum Bounding Rectangles of\nthe two geometries g1 and g2 touch. Two geometries spatially touch if\nthe interiors of the geometries do not intersect, but the boundary of\none of the geometries intersects either the boundary or the interior of\nthe other.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html'),
(293, 'DROP EVENT', 38, 'Syntax:\nDROP EVENT [IF EXISTS] event_name\n\nThis statement drops the event named event_name. The event immediately\nceases being active, and is deleted completely from the server.\n\nIf the event does not exist, the error ERROR 1517 (HY000): Unknown\nevent ''event_name'' results. You can override this and cause the\nstatement to generate a warning for non-existent events instead using\nIF EXISTS.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-event.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-event.html'),
(294, 'INSERT SELECT', 27, 'Syntax:\nINSERT [LOW_PRIORITY | HIGH_PRIORITY] [IGNORE]\n    [INTO] tbl_name [(col_name,...)]\n    SELECT ...\n    [ ON DUPLICATE KEY UPDATE col_name=expr, ... ]\n\nWith INSERT ... SELECT, you can quickly insert many rows into a table\nfrom one or many tables. For example:\n\nINSERT INTO tbl_temp2 (fld_id)\n  SELECT tbl_temp1.fld_order_id\n  FROM tbl_temp1 WHERE tbl_temp1.fld_order_id > 100;\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/insert-select.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/insert-select.html'),
(295, 'CREATE PROCEDURE', 38, 'Syntax:\nCREATE\n    [DEFINER = { user | CURRENT_USER }]\n    PROCEDURE sp_name ([proc_parameter[,...]])\n    [characteristic ...] routine_body\n\nCREATE\n    [DEFINER = { user | CURRENT_USER }]\n    FUNCTION sp_name ([func_parameter[,...]])\n    RETURNS type\n    [characteristic ...] routine_body\n    \nproc_parameter:\n    [ IN | OUT | INOUT ] param_name type\n    \nfunc_parameter:\n    param_name type\n\ntype:\n    Any valid MySQL data type\n\ncharacteristic:\n    LANGUAGE SQL\n  | [NOT] DETERMINISTIC\n  | { CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA }\n  | SQL SECURITY { DEFINER | INVOKER }\n  | COMMENT ''string''\n\nroutine_body:\n    Valid SQL procedure statement\n\nThese statements create stored routines. By default, a routine is\nassociated with the default database. To associate the routine\nexplicitly with a given database, specify the name as db_name.sp_name\nwhen you create it.\n\nThe CREATE FUNCTION statement is also used in MySQL to support UDFs\n(user-defined functions). See\nhttp://dev.mysql.com/doc/refman/5.1/en/adding-functions.html. A UDF can\nbe regarded as an external stored function. However, do note that\nstored functions share their namespace with UDFs. See\nhttp://dev.mysql.com/doc/refman/5.1/en/function-resolution.html, for\nthe rules describing how the server interprets references to different\nkinds of functions.\n\nWhen the routine is invoked, an implicit USE db_name is performed (and\nundone when the routine terminates). The causes the routine to have the\ngiven default database while it executes. USE statements within stored\nroutines are disallowed.\n\nWhen a stored function has been created, you invoke it by referring to\nit in an expression. The function returns a value during expression\nevaluation. When a stored procedure has been created, you invoke it by\nusing the CALL statement (see [HELP CALL]).\n\nTo execute the CREATE PROCEDURE or CREATE FUNCTION statement, it is\nnecessary to have the CREATE ROUTINE privilege. By default, MySQL\nautomatically grants the ALTER ROUTINE and EXECUTE privileges to the\nroutine creator. See also\nhttp://dev.mysql.com/doc/refman/5.1/en/stored-routines-privileges.html.\nIf binary logging is enabled, the CREATE FUNCTION statement might also\nrequire the SUPER privilege, as described in\nhttp://dev.mysql.com/doc/refman/5.1/en/stored-programs-logging.html.\n\nThe DEFINER and SQL SECURITY clauses specify the security context to be\nused when checking access privileges at routine execution time, as\ndescribed later.\n\nIf the routine name is the same as the name of a built-in SQL function,\nyou must use a space between the name and the following parenthesis\nwhen defining the routine, or a syntax error occurs. This is also true\nwhen you invoke the routine later. For this reason, we suggest that it\nis better to avoid re-using the names of existing SQL functions for\nyour own stored routines.\n\nThe IGNORE_SPACE SQL mode applies to built-in functions, not to stored\nroutines. It is always allowable to have spaces after a routine name,\nregardless of whether IGNORE_SPACE is enabled.\n\nThe parameter list enclosed within parentheses must always be present.\nIf there are no parameters, an empty parameter list of () should be\nused. Parameter names are not case sensitive.\n\nEach parameter can be declared to use any valid data type, except that\nthe COLLATE attribute cannot be used.\n\nEach parameter is an IN parameter by default. To specify otherwise for\na parameter, use the keyword OUT or INOUT before the parameter name.\n\n*Note*: Specifying a parameter as IN, OUT, or INOUT is valid only for a\nPROCEDURE. (FUNCTION parameters are always regarded as IN parameters.)\n\nAn IN parameter passes a value into a procedure. The procedure might\nmodify the value, but the modification is not visible to the caller\nwhen the procedure returns. An OUT parameter passes a value from the\nprocedure back to the caller. Its initial value is NULL within the\nprocedure, and its value is visible to the caller when the procedure\nreturns. An INOUT parameter is initialized by the caller, can be\nmodified by the procedure, and any change made by the procedure is\nvisible to the caller when the procedure returns.\n\nFor each OUT or INOUT parameter, pass a user-defined variable so that\nyou can obtain its value when the procedure returns. (For an example,\nsee [HELP CALL].) If you are calling the procedure from within another\nstored procedure or function, you can also pass a routine parameter or\nlocal routine variable as an IN or INOUT parameter.\n\nThe RETURNS clause may be specified only for a FUNCTION, for which it\nis mandatory. It indicates the return type of the function, and the\nfunction body must contain a RETURN value statement. If the RETURN\nstatement returns a value of a different type, the value is coerced to\nthe proper type. For example, if a function specifies an ENUM or SET\nvalue in the RETURNS clause, but the RETURN statement returns an\ninteger, the value returned from the function is the string for the\ncorresponding ENUM member of set of SET members.\n\nThe routine_body consists of a valid SQL procedure statement. This can\nbe a simple statement such as SELECT or INSERT, or it can be a compound\nstatement written using BEGIN and END. Compound statements can contain\ndeclarations, loops, and other control structure statements. The syntax\nfor these statements is described in\nhttp://dev.mysql.com/doc/refman/5.1/en/sql-syntax-compound-statements.h\ntml.\n\nSome statements are not allowed in stored routines; see\nhttp://dev.mysql.com/doc/refman/5.1/en/stored-program-restrictions.html\n.\n\nMySQL stores the sql_mode system variable setting that is in effect at\nthe time a routine is created, and always executes the routine with\nthis setting in force, regardless of the current server SQL mode.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-procedure.html\n\n', 'mysql> delimiter //\n\nmysql> CREATE PROCEDURE simpleproc (OUT param1 INT)\n    -> BEGIN\n    ->   SELECT COUNT(*) INTO param1 FROM t;\n    -> END;\n    -> //\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> delimiter ;\n\nmysql> CALL simpleproc(@a);\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> SELECT @a;\n+------+\n| @a   |\n+------+\n| 3    |\n+------+\n1 row in set (0.00 sec)\n', 'http://dev.mysql.com/doc/refman/5.1/en/create-procedure.html'),
(296, 'VARBINARY', 21, 'VARBINARY(M)\n\nThe VARBINARY type is similar to the VARCHAR type, but stores binary\nbyte strings rather than non-binary character strings. M represents the\nmaximum column length in bytes.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(297, 'LOAD INDEX', 27, 'Syntax:\nLOAD INDEX INTO CACHE\n  tbl_index_list [, tbl_index_list] ...\n\ntbl_index_list:\n  tbl_name\n    [[INDEX|KEY] (index_name[, index_name] ...)]\n    [IGNORE LEAVES]\n\nThe LOAD INDEX INTO CACHE statement preloads a table index into the key\ncache to which it has been assigned by an explicit CACHE INDEX\nstatement, or into the default key cache otherwise. LOAD INDEX INTO\nCACHE is used only for MyISAM tables. It is not supported for tables\nhaving user-defined partitioning (see\nhttp://dev.mysql.com/doc/refman/5.1/en/partitioning-limitations.html.)\n\nThe IGNORE LEAVES modifier causes only blocks for the non-leaf nodes of\nthe index to be preloaded.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/load-index.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/load-index.html'),
(298, 'UNION', 27, 'Syntax:\nSELECT ...\nUNION [ALL | DISTINCT] SELECT ...\n[UNION [ALL | DISTINCT] SELECT ...]\n\nUNION is used to combine the result from multiple SELECT statements\ninto a single result set.\n\nThe column names from the first SELECT statement are used as the column\nnames for the results returned. Selected columns listed in\ncorresponding positions of each SELECT statement should have the same\ndata type. (For example, the first column selected by the first\nstatement should have the same type as the first column selected by the\nother statements.)\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/union.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/union.html'),
(299, 'TO_DAYS', 31, 'Syntax:\nTO_DAYS(date)\n\nGiven a date date, returns a day number (the number of days since year\n0).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT TO_DAYS(950501);\n        -> 728779\nmysql> SELECT TO_DAYS(''2007-10-07'');\n        -> 733321\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(300, 'NOT REGEXP', 36, 'Syntax:\nexpr NOT REGEXP pat, expr NOT RLIKE pat\n\nThis is the same as NOT (expr REGEXP pat).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html'),
(301, 'SHOW INDEX', 27, 'Syntax:\nSHOW INDEX FROM tbl_name [FROM db_name]\n\nSHOW INDEX returns table index information. The format resembles that\nof the SQLStatistics call in ODBC.\nYou can use db_name.tbl_name as an alternative to the tbl_name FROM\ndb_name syntax. These two statements are equivalent:\n\nSHOW INDEX FROM mytable FROM mydb;\nSHOW INDEX FROM mydb.mytable;\n\nSHOW KEYS is a synonym for SHOW INDEX. You can also list a table''s\nindexes with the mysqlshow -k db_name tbl_name command.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-index.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-index.html');
INSERT INTO `help_topic` (`help_topic_id`, `name`, `help_category_id`, `description`, `example`, `url`) VALUES
(302, 'SHOW CREATE DATABASE', 27, 'Syntax:\nSHOW CREATE {DATABASE | SCHEMA} db_name\n\nShows the CREATE DATABASE statement that creates the given database.\nSHOW CREATE SCHEMA is a synonym for SHOW CREATE DATABASE.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-create-database.html\n\n', 'mysql> SHOW CREATE DATABASE test\\G\n*************************** 1. row ***************************\n       Database: test\nCreate Database: CREATE DATABASE `test`\n                 /*!40100 DEFAULT CHARACTER SET latin1 */\n\nmysql> SHOW CREATE SCHEMA test\\G\n*************************** 1. row ***************************\n       Database: test\nCreate Database: CREATE DATABASE `test`\n                 /*!40100 DEFAULT CHARACTER SET latin1 */\n', 'http://dev.mysql.com/doc/refman/5.1/en/show-create-database.html'),
(303, 'LEAVE', 23, 'Syntax:\nLEAVE label\n\nThis statement is used to exit the flow control construct that has the\ngiven label. It can be used within BEGIN ... END or loop constructs\n(LOOP, REPEAT, WHILE).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/leave-statement.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/leave-statement.html'),
(304, 'NOT IN', 18, 'Syntax:\nexpr NOT IN (value,...)\n\nThis is the same as NOT (expr IN (value,...)).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(305, '!', 13, 'Syntax:\nNOT, !\n\nLogical NOT. Evaluates to 1 if the operand is 0, to 0 if the operand is\nnon-zero, and NOT NULL returns NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/logical-operators.html\n\n', 'mysql> SELECT NOT 10;\n        -> 0\nmysql> SELECT NOT 0;\n        -> 1\nmysql> SELECT NOT NULL;\n        -> NULL\nmysql> SELECT ! (1+1);\n        -> 0\nmysql> SELECT ! 1+1;\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/logical-operators.html'),
(306, 'DECLARE HANDLER', 23, 'Syntax:\nDECLARE handler_type HANDLER\n    FOR condition_value [, condition_value] ...\n    statement\n\nhandler_type:\n    CONTINUE\n  | EXIT\n  | UNDO\n\ncondition_value:\n    SQLSTATE [VALUE] sqlstate_value\n  | condition_name\n  | SQLWARNING\n  | NOT FOUND\n  | SQLEXCEPTION\n  | mysql_error_code\n\nThe DECLARE ... HANDLER statement specifies handlers that each may deal\nwith one or more conditions. If one of these conditions occurs, the\nspecified statement is executed. statement can be a simple statement\n(for example, SET var_name = value), or it can be a compound statement\nwritten using BEGIN and END (see [HELP BEGIN END]).\n\nFor a CONTINUE handler, execution of the current program continues\nafter execution of the handler statement. For an EXIT handler,\nexecution terminates for the BEGIN ... END compound statement in which\nthe handler is declared. (This is true even if the condition occurs in\nan inner block.) The UNDO handler type statement is not supported.\n\nIf a condition occurs for which no handler has been declared, the\ndefault action is EXIT.\n\nA condition_value for DECLARE ... HANDLER can be any of the following\nvalues:\n\no An SQLSTATE value (a 5-character string literal) or a MySQL error\n  code (a number). You should not use SQLSTATE value ''00000'' or MySQL\n  error code 0, because those indicate sucess rather than an error\n  condition. For a list of SQLSTATE values and MySQL error codes, see\n  http://dev.mysql.com/doc/refman/5.1/en/error-messages-server.html.\n\no A condition name previously specified with DECLARE ... CONDITION. See\n  [HELP DECLARE CONDITION].\n\no SQLWARNING is shorthand for the class of SQLSTATE values that begin\n  with ''01''.\n\no NOT FOUND is shorthand for the class of SQLSTATE values that begin\n  with ''02''. This is relevant only within the context of cursors and is\n  used to control what happens when a cursor reaches the end of a data\n  set.\n\no SQLEXCEPTION is shorthand for the class of SQLSTATE values that do\n  not begin with ''00'', ''01'', or ''02''.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/declare-handlers.html\n\n', 'mysql> CREATE TABLE test.t (s1 INT, PRIMARY KEY (s1));\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> delimiter //\n\nmysql> CREATE PROCEDURE handlerdemo ()\n    -> BEGIN\n    ->   DECLARE CONTINUE HANDLER FOR SQLSTATE ''23000'' SET @x2 = 1;\n    ->   SET @x = 1;\n    ->   INSERT INTO test.t VALUES (1);\n    ->   SET @x = 2;\n    ->   INSERT INTO test.t VALUES (1);\n    ->   SET @x = 3;\n    -> END;\n    -> //\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> CALL handlerdemo()//\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> SELECT @x//\n    +------+\n    | @x   |\n    +------+\n    | 3    |\n    +------+\n    1 row in set (0.00 sec)\n', 'http://dev.mysql.com/doc/refman/5.1/en/declare-handlers.html'),
(307, 'DOUBLE', 21, 'DOUBLE[(M,D)] [UNSIGNED] [ZEROFILL]\n\nA normal-size (double-precision) floating-point number. Allowable\nvalues are -1.7976931348623157E+308 to -2.2250738585072014E-308, 0, and\n2.2250738585072014E-308 to 1.7976931348623157E+308. These are the\ntheoretical limits, based on the IEEE standard. The actual range might\nbe slightly smaller depending on your hardware or operating system.\n\nM is the total number of digits and D is the number of digits following\nthe decimal point. If M and D are omitted, values are stored to the\nlimits allowed by the hardware. A double-precision floating-point\nnumber is accurate to approximately 15 decimal places.\n\nUNSIGNED, if specified, disallows negative values.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(308, 'TIME', 21, 'TIME\n\nA time. The range is ''-838:59:59'' to ''838:59:59''. MySQL displays TIME\nvalues in ''HH:MM:SS'' format, but allows assignment of values to TIME\ncolumns using either strings or numbers.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-type-overview.html'),
(309, '&&', 13, 'Syntax:\nAND, &&\n\nLogical AND. Evaluates to 1 if all operands are non-zero and not NULL,\nto 0 if one or more operands are 0, otherwise NULL is returned.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/logical-operators.html\n\n', 'mysql> SELECT 1 && 1;\n        -> 1\nmysql> SELECT 1 && 0;\n        -> 0\nmysql> SELECT 1 && NULL;\n        -> NULL\nmysql> SELECT 0 && NULL;\n        -> 0\nmysql> SELECT NULL && 0;\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/logical-operators.html'),
(310, 'X', 10, 'X(p)\n\nReturns the X-coordinate value for the point p as a double-precision\nnumber.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#point-property-functions\n\n', 'mysql> SET @pt = ''Point(56.7 53.34)'';\nmysql> SELECT X(GeomFromText(@pt));\n+----------------------+\n| X(GeomFromText(@pt)) |\n+----------------------+\n|                 56.7 |\n+----------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#point-property-functions'),
(311, 'FOUND_ROWS', 15, 'Syntax:\nFOUND_ROWS()\n\nA SELECT statement may include a LIMIT clause to restrict the number of\nrows the server returns to the client. In some cases, it is desirable\nto know how many rows the statement would have returned without the\nLIMIT, but without running the statement again. To obtain this row\ncount, include a SQL_CALC_FOUND_ROWS option in the SELECT statement,\nand then invoke FOUND_ROWS() afterward:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT SQL_CALC_FOUND_ROWS * FROM tbl_name\n    -> WHERE id > 100 LIMIT 10;\nmysql> SELECT FOUND_ROWS();\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(312, 'SYSTEM_USER', 15, 'Syntax:\nSYSTEM_USER()\n\nSYSTEM_USER() is a synonym for USER().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(313, 'CROSSES', 30, 'Crosses(g1,g2)\n\nReturns 1 if g1 spatially crosses g2. Returns NULL if g1 is a Polygon\nor a MultiPolygon, or if g2 is a Point or a MultiPoint. Otherwise,\nreturns 0.\n\nThe term spatially crosses denotes a spatial relation between two given\ngeometries that has the following properties:\n\no The two geometries intersect\n\no Their intersection results in a geometry that has a dimension that is\n  one less than the maximum dimension of the two given geometries\n\no Their intersection is not equal to either of the two given geometries\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html'),
(314, 'TRUNCATE TABLE', 27, 'Syntax:\nTRUNCATE [TABLE] tbl_name\n\nTRUNCATE TABLE empties a table completely. Logically, this is\nequivalent to a DELETE statement that deletes all rows, but there are\npractical differences under some circumstances.\n\nFor an InnoDB table, InnoDB processes TRUNCATE TABLE by deleting rows\none by one if there are any FOREIGN KEY constraints that reference the\ntable. If there are no FOREIGN KEY constraints, InnoDB performs fast\ntruncation by dropping the original table and creating an empty one\nwith the same definition, which is much faster than deleting rows one\nby one. The AUTO_INCREMENT counter is reset by TRUNCATE TABLE,\nregardless of whether there is a FOREIGN KEY constraint.\n\nIn the case that FOREIGN KEY constraints reference the table, InnoDB\ndeletes rows one by one and processes the constraints on each one. If\nthe FOREIGN KEY constraint specifies DELETE CASCADE, rows from the\nchild (referenced) table are deleted, and the truncated table becomes\nempty. If the FOREIGN KEY constraint does not specify CASCADE, the\nTRUNCATE statement deletes rows one by one and stops if it encounters a\nparent row that is referenced by the child, returning this error:\n\nERROR 1451 (23000): Cannot delete or update a parent row: a foreign\nkey constraint fails (`test`.`child`, CONSTRAINT `child_ibfk_1`\nFOREIGN KEY (`parent_id`) REFERENCES `parent` (`id`))\n\nThis is the same as a DELETE statement with no WHERE clause.\n\nThe count of rows affected by TRUNCATE TABLE is accurate only when it\nis mapped to a DELETE statement.\n\nFor other storage engines, TRUNCATE TABLE differs from DELETE in the\nfollowing ways in MySQL 5.1:\n\no Truncate operations drop and re-create the table, which is much\n  faster than deleting rows one by one, particularly for large tables.\n\no Truncate operations are not transaction-safe; an error occurs when\n  attempting one in the course of an active transaction or active table\n  lock.\n\no Truncation operations do not return the number of deleted rows.\n\no As long as the table format file tbl_name.frm is valid, the table can\n  be re-created as an empty table with TRUNCATE TABLE, even if the data\n  or index files have become corrupted.\n\no The table handler does not remember the last used AUTO_INCREMENT\n  value, but starts counting from the beginning. This is true even for\n  MyISAM and InnoDB, which normally do not reuse sequence values.\n\no When used with partitioned tables, TRUNCATE TABLE preserves the\n  partitioning; that is, the data and index files are dropped and\n  re-created, while the partition definitions (.par) file is\n  unaffected.\n\no Since truncation of a table does not make any use of DELETE, the\n  TRUNCATE statement does not invoke ON DELETE triggers.\n\nTRUNCATE TABLE requires the DROP privilege as of MySQL 5.1.16. (Before\n5.1.16, it requires the DELETE privilege.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/truncate.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/truncate.html'),
(315, 'BIT_XOR', 16, 'Syntax:\nBIT_XOR(expr)\n\nReturns the bitwise XOR of all bits in expr. The calculation is\nperformed with 64-bit (BIGINT) precision.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(316, 'CURRENT_DATE', 31, 'Syntax:\nCURRENT_DATE, CURRENT_DATE()\n\nCURRENT_DATE and CURRENT_DATE() are synonyms for CURDATE().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(317, 'START SLAVE', 27, 'Syntax:\nSTART SLAVE [thread_type [, thread_type] ... ]\nSTART SLAVE [SQL_THREAD] UNTIL\n    MASTER_LOG_FILE = ''log_name'', MASTER_LOG_POS = log_pos\nSTART SLAVE [SQL_THREAD] UNTIL\n    RELAY_LOG_FILE = ''log_name'', RELAY_LOG_POS = log_pos\n\nthread_type: IO_THREAD | SQL_THREAD\n\nSTART SLAVE with no thread_type options starts both of the slave\nthreads. The I/O thread reads queries from the master server and stores\nthem in the relay log. The SQL thread reads the relay log and executes\nthe queries. START SLAVE requires the SUPER privilege.\n\nIf START SLAVE succeeds in starting the slave threads, it returns\nwithout any error. However, even in that case, it might be that the\nslave threads start and then later stop (for example, because they do\nnot manage to connect to the master or read its binary logs, or some\nother problem). START SLAVE does not warn you about this. You must\ncheck the slave''s error log for error messages generated by the slave\nthreads, or check that they are running satisfactorily with SHOW SLAVE\nSTATUS.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/start-slave.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/start-slave.html'),
(318, 'AREA', 2, 'Area(poly)\n\nReturns as a double-precision number the area of the Polygon value\npoly, as measured in its spatial reference system.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#polygon-property-functions\n\n', 'mysql> SET @poly = ''Polygon((0 0,0 3,3 0,0 0),(1 1,1 2,2 1,1 1))'';\nmysql> SELECT Area(GeomFromText(@poly));\n+---------------------------+\n| Area(GeomFromText(@poly)) |\n+---------------------------+\n|                         4 |\n+---------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#polygon-property-functions'),
(319, 'BEGIN END', 23, 'Syntax:\n[begin_label:] BEGIN\n    [statement_list]\nEND [end_label]\n\nBEGIN ... END syntax is used for writing compound statements, which can\nappear within stored programs. A compound statement can contain\nmultiple statements, enclosed by the BEGIN and END keywords.\nstatement_list represents a list of one or more statements, each\nterminated by a semicolon (;) statement delimiter. statement_list is\noptional, which means that the empty compound statement (BEGIN END) is\nlegal.\n\nUse of multiple statements requires that a client is able to send\nstatement strings containing the ; statement delimiter. This is handled\nin the mysql command-line client with the delimiter command. Changing\nthe ; end-of-statement delimiter (for example, to //) allows ; to be\nused in a program body. For an example, see\nhttp://dev.mysql.com/doc/refman/5.1/en/stored-programs-defining.html.\n\nA compound statement can be labeled. end_label cannot be given unless\nbegin_label also is present. If both are present, they must be the\nsame.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/begin-end.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/begin-end.html'),
(320, 'FLUSH', 27, 'Syntax:\nFLUSH [LOCAL | NO_WRITE_TO_BINLOG]\n    flush_option [, flush_option] ...\n\nThe FLUSH statement clears or reloads various internal caches used by\nMySQL. To execute FLUSH, you must have the RELOAD privilege.\n\nThe RESET statement is similar to FLUSH. See [HELP RESET].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/flush.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/flush.html'),
(321, 'SHOW PROCEDURE STATUS', 27, 'Syntax:\nSHOW {PROCEDURE | FUNCTION} STATUS\n    [LIKE ''pattern'' | WHERE expr]\n\nThese statements are MySQL extensions. They return characteristics of\nroutines, such as the database, name, type, creator, creation and\nmodification dates, and character set information. The LIKE clause, if\npresent, indicates which procedure or function names to match. The\nWHERE clause can be given to select rows using more general conditions,\nas discussed in\nhttp://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-procedure-status.html\n\n', 'mysql> SHOW FUNCTION STATUS LIKE ''hello''\\G\n*************************** 1. row ***************************\n                  Db: test\n                Name: hello\n                Type: FUNCTION\n             Definer: testuser@localhost\n            Modified: 2004-08-03 15:29:37\n             Created: 2004-08-03 15:29:37\n       Security_type: DEFINER\n             Comment:\ncharacter_set_client: latin1\ncollation_connection: latin1_swedish_ci\n  Database Collation: latin1_swedish_ci\n', 'http://dev.mysql.com/doc/refman/5.1/en/show-procedure-status.html'),
(322, 'SHOW WARNINGS', 27, 'Syntax:\nSHOW WARNINGS [LIMIT [offset,] row_count]\nSHOW COUNT(*) WARNINGS\n\nSHOW WARNINGS shows the error, warning, and note messages that resulted\nfrom the last statement that generated messages. It shows nothing if\nthe last statement used a table and generated no messages. (That is, a\nstatement that uses a table but generates no messages clears the\nmessage list.) Statements that do not use tables and do not generate\nmessages have no effect on the message list.\n\nA related statement, SHOW ERRORS, shows only the errors. See [HELP SHOW\nERRORS].\n\nThe SHOW COUNT(*) WARNINGS statement displays the total number of\nerrors, warnings, and notes. You can also retrieve this number from the\nwarning_count variable:\n\nSHOW COUNT(*) WARNINGS;\nSELECT @@warning_count;\n\nThe value of warning_count might be greater than the number of messages\ndisplayed by SHOW WARNINGS if the max_error_count system variable is\nset so low that not all messages are stored. An example shown later in\nthis section demonstrates how this can happen.\n\nThe LIMIT clause has the same syntax as for the SELECT statement. See\nhttp://dev.mysql.com/doc/refman/5.1/en/select.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-warnings.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-warnings.html'),
(323, 'DESCRIBE', 28, 'Syntax:\n{DESCRIBE | DESC} tbl_name [col_name | wild]\n\nDESCRIBE provides information about the columns in a table. It is a\nshortcut for SHOW COLUMNS FROM. These statements also display\ninformation for views. (See [HELP SHOW COLUMNS].)\n\ncol_name can be a column name, or a string containing the SQL "%" and\n"_" wildcard characters to obtain output only for the columns with\nnames matching the string. There is no need to enclose the string\nwithin quotes unless it contains spaces or other special characters.\n\nmysql> DESCRIBE City;\n+------------+----------+------+-----+---------+----------------+\n| Field      | Type     | Null | Key | Default | Extra          |\n+------------+----------+------+-----+---------+----------------+\n| Id         | int(11)  | NO   | PRI | NULL    | auto_increment |\n| Name       | char(35) | NO   |     |         |                |\n| Country    | char(3)  | NO   | UNI |         |                |\n| District   | char(20) | YES  | MUL |         |                |\n| Population | int(11)  | NO   |     | 0       |                |\n+------------+----------+------+-----+---------+----------------+\n5 rows in set (0.00 sec)\n\nThe description for SHOW COLUMNS provides more information about the\noutput columns (see [HELP SHOW COLUMNS]).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/describe.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/describe.html'),
(324, 'DROP USER', 9, 'Syntax:\nDROP USER user [, user] ...\n\nThe DROP USER statement removes one or more MySQL accounts. It removes\nprivilege rows for the account from all grant tables. To use this\nstatement, you must have the global CREATE USER privilege or the DELETE\nprivilege for the mysql database. Each account is named using the same\nformat as for the GRANT statement; for example, ''jeffrey''@''localhost''.\nIf you specify only the username part of the account name, a hostname\npart of ''%'' is used. For additional information about specifying\naccount names, see [HELP GRANT].\n\nWith DROP USER, you can remove an account and its privileges as\nfollows:\n\nDROP USER user;\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-user.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-user.html'),
(325, 'STDDEV_POP', 16, 'Syntax:\nSTDDEV_POP(expr)\n\nReturns the population standard deviation of expr (the square root of\nVAR_POP()). You can also use STD() or STDDEV(), which are equivalent\nbut not standard SQL.\n\nSTDDEV_POP() returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(326, 'SHOW CHARACTER SET', 27, 'Syntax:\nSHOW CHARACTER SET\n    [LIKE ''pattern'' | WHERE expr]\n\nThe SHOW CHARACTER SET statement shows all available character sets.\nThe LIKE clause, if present, indicates which character set names to\nmatch. The WHERE clause can be given to select rows using more general\nconditions, as discussed in\nhttp://dev.mysql.com/doc/refman/5.1/en/extended-show.html. For example:\n\nmysql> SHOW CHARACTER SET LIKE ''latin%'';\n+---------+-----------------------------+-------------------+--------+\n| Charset | Description                 | Default collation | Maxlen |\n+---------+-----------------------------+-------------------+--------+\n| latin1  | cp1252 West European        | latin1_swedish_ci |      1 |\n| latin2  | ISO 8859-2 Central European | latin2_general_ci |      1 |\n| latin5  | ISO 8859-9 Turkish          | latin5_turkish_ci |      1 |\n| latin7  | ISO 8859-13 Baltic          | latin7_general_ci |      1 |\n+---------+-----------------------------+-------------------+--------+\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-character-set.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-character-set.html'),
(327, 'SUBSTRING', 36, 'Syntax:\nSUBSTRING(str,pos), SUBSTRING(str FROM pos), SUBSTRING(str,pos,len),\nSUBSTRING(str FROM pos FOR len)\n\nThe forms without a len argument return a substring from string str\nstarting at position pos. The forms with a len argument return a\nsubstring len characters long from string str, starting at position\npos. The forms that use FROM are standard SQL syntax. It is also\npossible to use a negative value for pos. In this case, the beginning\nof the substring is pos characters from the end of the string, rather\nthan the beginning. A negative value may be used for pos in any of the\nforms of this function.\n\nFor all forms of SUBSTRING(), the position of the first character in\nthe string from which the substring is to be extracted is reckoned as\n1.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT SUBSTRING(''Quadratically'',5);\n        -> ''ratically''\nmysql> SELECT SUBSTRING(''foobarbar'' FROM 4);\n        -> ''barbar''\nmysql> SELECT SUBSTRING(''Quadratically'',5,6);\n        -> ''ratica''        \nmysql> SELECT SUBSTRING(''Sakila'', -3);\n        -> ''ila''        \nmysql> SELECT SUBSTRING(''Sakila'', -5, 3);\n        -> ''aki''\nmysql> SELECT SUBSTRING(''Sakila'' FROM -4 FOR 2);\n        -> ''ki''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(328, 'ISEMPTY', 35, 'IsEmpty(g)\n\nReturns 1 if the geometry value g is the empty geometry, 0 if it is not\nempty, and -1 if the argument is NULL. If the geometry is empty, it\nrepresents the empty point set.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions'),
(329, 'LTRIM', 36, 'Syntax:\nLTRIM(str)\n\nReturns the string str with leading space characters removed.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT LTRIM(''  barbar'');\n        -> ''barbar''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(330, 'INTERSECTS', 30, 'Intersects(g1,g2)\n\nReturns 1 or 0 to indicate whether g1 spatially intersects g2.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html'),
(331, 'CALL', 27, 'Syntax:\nCALL sp_name([parameter[,...]])\nCALL sp_name[()]\n\nThe CALL statement invokes a stored procedure that was defined\npreviously with CREATE PROCEDURE.\n\nCALL can pass back values to its caller using parameters that are\ndeclared as OUT or INOUT parameters. When the procedure returns, a\nclient program can also obtain the number of rows affected for the\nfinal statement executed within the routine: At the SQL level, call the\nROW_COUNT() function; from C, call the mysql_affected_rows() C API\nfunction.\n\nAs of MySQL 5.1.13, stored procedures that take no arguments can be\ninvoked without parentheses. That is, CALL p() and CALL p are\nequivalent.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/call.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/call.html'),
(332, 'MBRDISJOINT', 6, 'MBRDisjoint(g1,g2)\n\nReturns 1 or 0 to indicate whether the Minimum Bounding Rectangles of\nthe two geometries g1 and g2 are disjoint (do not intersect).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html'),
(333, 'VALUES', 14, 'Syntax:\nVALUES(col_name)\n\nIn an INSERT ... ON DUPLICATE KEY UPDATE statement, you can use the\nVALUES(col_name) function in the UPDATE clause to refer to column\nvalues from the INSERT portion of the statement. In other words,\nVALUES(col_name) in the UPDATE clause refers to the value of col_name\nthat would be inserted, had no duplicate-key conflict occurred. This\nfunction is especially useful in multiple-row inserts. The VALUES()\nfunction is meaningful only in INSERT ... ON DUPLICATE KEY UPDATE\nstatements and returns NULL otherwise.\nhttp://dev.mysql.com/doc/refman/5.1/en/insert-on-duplicate.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', 'mysql> INSERT INTO table (a,b,c) VALUES (1,2,3),(4,5,6)\n    -> ON DUPLICATE KEY UPDATE c=VALUES(a)+VALUES(b);\n', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(334, 'SUBSTRING_INDEX', 36, 'Syntax:\nSUBSTRING_INDEX(str,delim,count)\n\nReturns the substring from string str before count occurrences of the\ndelimiter delim. If count is positive, everything to the left of the\nfinal delimiter (counting from the left) is returned. If count is\nnegative, everything to the right of the final delimiter (counting from\nthe right) is returned. SUBSTRING_INDEX() performs a case-sensitive\nmatch when searching for delim.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT SUBSTRING_INDEX(''www.mysql.com'', ''.'', 2);\n        -> ''www.mysql''\nmysql> SELECT SUBSTRING_INDEX(''www.mysql.com'', ''.'', -2);\n        -> ''mysql.com''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(335, 'ENCODE', 11, 'Syntax:\nENCODE(str,pass_str)\n\nEncrypt str using pass_str as the password. To decrypt the result, use\nDECODE().\n\nThe result is a binary string of the same length as str.\n\nThe strength of the encryption is based on how good the random\ngenerator is. It should suffice for short strings.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(336, 'LOOP', 23, 'Syntax:\n[begin_label:] LOOP\n    statement_list\nEND LOOP [end_label]\n\nLOOP implements a simple loop construct, enabling repeated execution of\nthe statement list, which consists of one or more statements, each\nterminated by a semicolon (;) statement delimiter. The statements\nwithin the loop are repeated until the loop is exited; usually this is\naccomplished with a LEAVE statement.\n\nA LOOP statement can be labeled. end_label cannot be given unless\nbegin_label also is present. If both are present, they must be the\nsame.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/loop-statement.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/loop-statement.html'),
(337, 'TRUNCATE', 4, 'Syntax:\nTRUNCATE(X,D)\n\nReturns the number X, truncated to D decimal places. If D is 0, the\nresult has no decimal point or fractional part. D can be negative to\ncause D digits left of the decimal point of the value X to become zero.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT TRUNCATE(1.223,1);\n        -> 1.2\nmysql> SELECT TRUNCATE(1.999,1);\n        -> 1.9\nmysql> SELECT TRUNCATE(1.999,0);\n        -> 1\nmysql> SELECT TRUNCATE(-1.999,1);\n        -> -1.9\nmysql> SELECT TRUNCATE(122,-2);\n       -> 100\nmysql> SELECT TRUNCATE(10.28*100,0);\n       -> 1028\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(338, 'TIMESTAMPADD', 31, 'Syntax:\nTIMESTAMPADD(unit,interval,datetime_expr)\n\nAdds the integer expression interval to the date or datetime expression\ndatetime_expr. The unit for interval is given by the unit argument,\nwhich should be one of the following values: FRAC_SECOND\n(microseconds), SECOND, MINUTE, HOUR, DAY, WEEK, MONTH, QUARTER, or\nYEAR.\n\nBeginning with MySQL 5.1.24, it is possible to use MICROSECOND in place\nof FRAC_SECOND with this function, and FRAC_SECOND is deprecated.\n\nThe unit value may be specified using one of keywords as shown, or with\na prefix of SQL_TSI_. For example, DAY and SQL_TSI_DAY both are legal.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT TIMESTAMPADD(MINUTE,1,''2003-01-02'');\n        -> ''2003-01-02 00:01:00''\nmysql> SELECT TIMESTAMPADD(WEEK,1,''2003-01-02'');\n        -> ''2003-01-09''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(339, 'SHOW', 27, 'SHOW has many forms that provide information about databases, tables,\ncolumns, or status information about the server. This section describes\nthose following:\n\nSHOW AUTHORS\nSHOW CHARACTER SET [like_or_where]\nSHOW COLLATION [like_or_where]\nSHOW [FULL] COLUMNS FROM tbl_name [FROM db_name] [like_or_where]\nSHOW CONTRIBUTORS\nSHOW CREATE DATABASE db_name\nSHOW CREATE EVENT event_name\nSHOW CREATE FUNCTION funcname\nSHOW CREATE PROCEDURE procname\nSHOW CREATE TABLE tbl_name\nSHOW CREATE TRIGGER trigger_name\nSHOW CREATE VIEW view_name\nSHOW DATABASES [like_or_where]\nSHOW ENGINE engine_name {STATUS | MUTEX}\nSHOW [STORAGE] ENGINES\nSHOW ERRORS [LIMIT [offset,] row_count]\nSHOW [FULL] EVENTS\nSHOW FUNCTION CODE sp_name\nSHOW FUNCTION STATUS [like_or_where]\nSHOW GRANTS FOR user\nSHOW INDEX FROM tbl_name [FROM db_name]\nSHOW INNODB STATUS\nSHOW OPEN TABLES [FROM db_name] [like_or_where]\nSHOW PLUGINS\nSHOW PROCEDURE CODE sp_name\nSHOW PROCEDURE STATUS [like_or_where]\nSHOW PRIVILEGES\nSHOW [FULL] PROCESSLIST\nSHOW PROFILE [types] [FOR QUERY n] [OFFSET n] [LIMIT n]\nSHOW PROFILES\nSHOW SCHEDULER STATUS\nSHOW [GLOBAL | SESSION] STATUS [like_or_where]\nSHOW TABLE STATUS [FROM db_name] [like_or_where]\nSHOW TABLES [FROM db_name] [like_or_where]\nSHOW TRIGGERS [FROM db_name] [like_or_where]\nSHOW [GLOBAL | SESSION] VARIABLES [like_or_where]\nSHOW WARNINGS [LIMIT [offset,] row_count]\n\nlike_or_where:\n    LIKE ''pattern''\n  | WHERE expr\n\nIf the syntax for a given SHOW statement includes a LIKE ''pattern''\npart, ''pattern'' is a string that can contain the SQL "%" and "_"\nwildcard characters. The pattern is useful for restricting statement\noutput to matching values.\n\nSeveral SHOW statements also accept a WHERE clause that provides more\nflexibility in specifying which rows to display. See\nhttp://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show.html'),
(340, 'GREATEST', 18, 'Syntax:\nGREATEST(value1,value2,...)\n\nWith two or more arguments, returns the largest (maximum-valued)\nargument. The arguments are compared using the same rules as for\nLEAST().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT GREATEST(2,0);\n        -> 2\nmysql> SELECT GREATEST(34.0,3.0,5.0,767.0);\n        -> 767.0\nmysql> SELECT GREATEST(''B'',''A'',''C'');\n        -> ''C''\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(341, 'SHOW VARIABLES', 27, 'Syntax:\nSHOW [GLOBAL | SESSION] VARIABLES\n    [LIKE ''pattern'' | WHERE expr]\n\nSHOW VARIABLES shows the values of MySQL system variables. This\ninformation also can be obtained using the mysqladmin variables\ncommand. The LIKE clause, if present, indicates which variable names to\nmatch. The WHERE clause can be given to select rows using more general\nconditions, as discussed in\nhttp://dev.mysql.com/doc/refman/5.1/en/extended-show.html.\n\nWith the GLOBAL modifier, SHOW VARIABLES displays the values that are\nused for new connections to MySQL. With SESSION, it displays the values\nthat are in effect for the current connection. If no modifier is\npresent, the default is SESSION. LOCAL is a synonym for SESSION.\nWith a LIKE clause, the statement displays only rows for those\nvariables with names that match the pattern. To obtain the row for a\nspecific variable, use a LIKE clause as shown:\n\nSHOW VARIABLES LIKE ''max_join_size'';\nSHOW SESSION VARIABLES LIKE ''max_join_size'';\n\nTo get a list of variables whose name match a pattern, use the "%"\nwildcard character in a LIKE clause:\n\nSHOW VARIABLES LIKE ''%size%'';\nSHOW GLOBAL VARIABLES LIKE ''%size%'';\n\nWildcard characters can be used in any position within the pattern to\nbe matched. Strictly speaking, because "_" is a wildcard that matches\nany single character, you should escape it as "\\_" to match it\nliterally. In practice, this is rarely necessary.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-variables.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-variables.html'),
(342, 'BINLOG', 27, 'Syntax:\nBINLOG ''str''\n\nBINLOG is an internal-use statement. It is generated by the mysqlbinlog\nprogram as the printable representation of certain events in binary log\nfiles. (See http://dev.mysql.com/doc/refman/5.1/en/mysqlbinlog.html.)\nThe ''str'' value is a base 64-encoded string the that server decodes to\ndetermine the data change indicated by the corresponding event. This\nstatement requires the SUPER privilege. It was added in MySQL 5.1.5.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/binlog.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/binlog.html'),
(343, 'BIT_AND', 16, 'Syntax:\nBIT_AND(expr)\n\nReturns the bitwise AND of all bits in expr. The calculation is\nperformed with 64-bit (BIGINT) precision.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(344, 'SECOND', 31, 'Syntax:\nSECOND(time)\n\nReturns the second for time, in the range 0 to 59.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT SECOND(''10:05:03'');\n        -> 3\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(345, 'ATAN2', 4, 'Syntax:\nATAN(Y,X), ATAN2(Y,X)\n\nReturns the arc tangent of the two variables X and Y. It is similar to\ncalculating the arc tangent of Y / X, except that the signs of both\narguments are used to determine the quadrant of the result.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT ATAN(-2,2);\n        -> -0.78539816339745\nmysql> SELECT ATAN2(PI(),0);\n        -> 1.5707963267949\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(346, 'MBRCONTAINS', 6, 'MBRContains(g1,g2)\n\nReturns 1 or 0 to indicate whether the Minimum Bounding Rectangle of g1\ncontains the Minimum Bounding Rectangle of g2. This tests the opposite\nrelationship as MBRWithin().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html\n\n', 'mysql> SET @g1 = GeomFromText(''Polygon((0 0,0 3,3 3,3 0,0 0))'');\nmysql> SET @g2 = GeomFromText(''Point(1 1)'');\nmysql> SELECT MBRContains(@g1,@g2), MBRContains(@g2,@g1);\n----------------------+----------------------+\n| MBRContains(@g1,@g2) | MBRContains(@g2,@g1) |\n+----------------------+----------------------+\n|                    1 |                    0 |\n+----------------------+----------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html'),
(347, 'HOUR', 31, 'Syntax:\nHOUR(time)\n\nReturns the hour for time. The range of the return value is 0 to 23 for\ntime-of-day values. However, the range of TIME values actually is much\nlarger, so HOUR can return values greater than 23.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT HOUR(''10:05:03'');\n        -> 10\nmysql> SELECT HOUR(''272:59:59'');\n        -> 272\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(348, 'SELECT', 27, 'Syntax:\nSELECT\n    [ALL | DISTINCT | DISTINCTROW ]\n      [HIGH_PRIORITY]\n      [STRAIGHT_JOIN]\n      [SQL_SMALL_RESULT] [SQL_BIG_RESULT] [SQL_BUFFER_RESULT]\n      [SQL_CACHE | SQL_NO_CACHE] [SQL_CALC_FOUND_ROWS]\n    select_expr, ...\n    [FROM table_references\n    [WHERE where_condition]\n    [GROUP BY {col_name | expr | position}\n      [ASC | DESC], ... [WITH ROLLUP]]\n    [HAVING where_condition]\n    [ORDER BY {col_name | expr | position}\n      [ASC | DESC], ...]\n    [LIMIT {[offset,] row_count | row_count OFFSET offset}]\n    [PROCEDURE procedure_name(argument_list)]\n    [INTO OUTFILE ''file_name'' export_options\n      | INTO DUMPFILE ''file_name''\n      | INTO var_name [, var_name]]\n    [FOR UPDATE | LOCK IN SHARE MODE]]\n\nSELECT is used to retrieve rows selected from one or more tables, and\ncan include UNION statements and subqueries. See [HELP UNION], and\nhttp://dev.mysql.com/doc/refman/5.1/en/subqueries.html.\n\nThe most commonly used clauses of SELECT statements are these:\n\no Each select_expr indicates a column that you want to retrieve. There\n  must be at least one select_expr.\n\no table_references indicates the table or tables from which to retrieve\n  rows. Its syntax is described in [HELP JOIN].\n\no The WHERE clause, if given, indicates the condition or conditions\n  that rows must satisfy to be selected. where_condition is an\n  expression that evaluates to true for each row to be selected. The\n  statement selects all rows if there is no WHERE clause.\n\n  In the WHERE clause, you can use any of the functions and operators\n  that MySQL supports, except for aggregate (summary) functions. See\n  http://dev.mysql.com/doc/refman/5.1/en/functions.html.\n\nSELECT can also be used to retrieve rows computed without reference to\nany table.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/select.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/select.html'),
(349, 'COT', 4, 'Syntax:\nCOT(X)\n\nReturns the cotangent of X.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT COT(12);\n        -> -1.5726734063977\nmysql> SELECT COT(0);\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(350, 'SHOW CREATE EVENT', 27, 'Syntax:\nSHOW CREATE EVENT event_name\n\nThis statement displays the CREATE EVENT statement needed to re-create\na given event. For example (using the same event e_daily defined and\nthen altered in\nhttp://dev.mysql.com/doc/refman/5.1/en/show-events.html):\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-create-event.html\n\n', 'mysql> SHOW CREATE EVENT test.e_daily\\G\n*************************** 1. row ***************************\n               Event: e_daily\n            sql_mode: \n           time_zone: SYSTEM\n        Create Event: CREATE EVENT `e_daily`\n                        ON SCHEDULE EVERY 1 DAY\n                        STARTS CURRENT_TIMESTAMP + INTERVAL 6 HOUR\n                        ON COMPLETION NOT PRESERVE\n                        ENABLE\n                        COMMENT ''Saves total number of sessions then\n                                clears the table each day''\n                        DO BEGIN\n                          INSERT INTO site_activity.totals (time, total)\n                            SELECT CURRENT_TIMESTAMP, COUNT(*) \n                            FROM site_activity.sessions;\n                          DELETE FROM site_activity.sessions;\n                        END\ncharacter_set_client: latin1\ncollation_connection: latin1_swedish_ci\n  Database Collation: latin1_swedish_ci\n', 'http://dev.mysql.com/doc/refman/5.1/en/show-create-event.html'),
(351, 'BACKUP TABLE', 20, 'Syntax:\nBACKUP TABLE tbl_name [, tbl_name] ... TO ''/path/to/backup/directory''\n\n*Note*: This statement is deprecated. We are working on a better\nreplacement for it that will provide online backup capabilities. In the\nmeantime, the mysqlhotcopy script can be used instead.\n\nBACKUP TABLE copies to the backup directory the minimum number of table\nfiles needed to restore the table, after flushing any buffered changes\nto disk. The statement works only for MyISAM tables. It copies the .frm\ndefinition and .MYD data files. The .MYI index file can be rebuilt from\nthose two files. The directory should be specified as a full pathname.\nTo restore the table, use RESTORE TABLE.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/backup-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/backup-table.html'),
(352, 'LOAD_FILE', 36, 'Syntax:\nLOAD_FILE(file_name)\n\nReads the file and returns the file contents as a string. To use this\nfunction, the file must be located on the server host, you must specify\nthe full pathname to the file, and you must have the FILE privilege.\nThe file must be readable by all and its size less than\nmax_allowed_packet bytes.\n\nIf the file does not exist or cannot be read because one of the\npreceding conditions is not satisfied, the function returns NULL.\n\nAs of MySQL 5.1.6, the character_set_filesystem system variable\ncontrols interpretation of filenames that are given as literal strings.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> UPDATE t\n            SET blob_col=LOAD_FILE(''/tmp/picture'')\n            WHERE id=1;\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(353, 'LOAD TABLE FROM MASTER', 27, 'Syntax:\nLOAD TABLE tbl_name FROM MASTER\n\nThis feature is deprecated. We recommend not using it anymore. It is\nsubject to removal in a future version of MySQL.\n\nSince the current implementation of LOAD DATA FROM MASTER and LOAD\nTABLE FROM MASTER is very limited, these statements are deprecated in\nversions 4.1 of MySQL and above. We will introduce a more advanced\ntechnique (called "online backup") in a future version. That technique\nwill have the additional advantage of working with more storage\nengines.\n\nFor MySQL 5.1 and earlier, the recommended alternative solution to\nusing LOAD DATA FROM MASTER or LOAD TABLE FROM MASTER is using\nmysqldump or mysqlhotcopy. The latter requires Perl and two Perl\nmodules (DBI and DBD:mysql) and works for MyISAM and ARCHIVE tables\nonly. With mysqldump, you can create SQL dumps on the master and pipe\n(or copy) these to a mysql client on the slave. This has the advantage\nof working for all storage engines, but can be quite slow, since it\nworks using SELECT.\n\nTransfers a copy of the table from the master to the slave. This\nstatement is implemented mainly debugging LOAD DATA FROM MASTER\noperations. To use LOAD TABLE, the account used for connecting to the\nmaster server must have the RELOAD and SUPER privileges on the master\nand the SELECT privilege for the master table to load. On the slave\nside, the user that issues LOAD TABLE FROM MASTER must have privileges\nfor dropping and creating the table.\n\nThe conditions for LOAD DATA FROM MASTER apply here as well. For\nexample, LOAD TABLE FROM MASTER works only for MyISAM tables. The\ntimeout notes for LOAD DATA FROM MASTER apply as well.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/load-table-from-master.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/load-table-from-master.html'),
(354, 'POINTFROMTEXT', 3, 'PointFromText(wkt[,srid])\n\nConstructs a POINT value using its WKT representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions'),
(355, 'GROUP_CONCAT', 16, 'Syntax:\nGROUP_CONCAT(expr)\n\nThis function returns a string result with the concatenated non-NULL\nvalues from a group. It returns NULL if there are no non-NULL values.\nThe full syntax is as follows:\n\nGROUP_CONCAT([DISTINCT] expr [,expr ...]\n             [ORDER BY {unsigned_integer | col_name | expr}\n                 [ASC | DESC] [,col_name ...]]\n             [SEPARATOR str_val])\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', 'mysql> SELECT student_name,\n    ->     GROUP_CONCAT(test_score)\n    ->     FROM student\n    ->     GROUP BY student_name;\n', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(356, 'DATE_FORMAT', 31, 'Syntax:\nDATE_FORMAT(date,format)\n\nFormats the date value according to the format string.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT DATE_FORMAT(''2009-10-04 22:23:00'', ''%W %M %Y'');\n        -> ''Sunday October 2009''\nmysql> SELECT DATE_FORMAT(''2007-10-04 22:23:00'', ''%H:%i:%s'');\n        -> ''22:23:00''\nmysql> SELECT DATE_FORMAT(''1900-10-04 22:23:00'',\n    ->                 ''%D %y %a %d %m %b %j'');\n        -> ''4th 00 Thu 04 10 Oct 277''\nmysql> SELECT DATE_FORMAT(''1997-10-04 22:23:00'',\n    ->                 ''%H %k %I %r %T %S %w'');\n        -> ''22 22 10 10:23:00 PM 22:23:00 00 6''\nmysql> SELECT DATE_FORMAT(''1999-01-01'', ''%X %V'');\n        -> ''1998 52''\nmysql> SELECT DATE_FORMAT(''2006-06-00'', ''%d'');\n        -> ''00''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(357, 'BENCHMARK', 15, 'Syntax:\nBENCHMARK(count,expr)\n\nThe BENCHMARK() function executes the expression expr repeatedly count\ntimes. It may be used to time how quickly MySQL processes the\nexpression. The result value is always 0. The intended use is from\nwithin the mysql client, which reports query execution times:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT BENCHMARK(1000000,ENCODE(''hello'',''goodbye''));\n+----------------------------------------------+\n| BENCHMARK(1000000,ENCODE(''hello'',''goodbye'')) |\n+----------------------------------------------+\n|                                            0 |\n+----------------------------------------------+\n1 row in set (4.74 sec)\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(358, 'YEAR', 31, 'Syntax:\nYEAR(date)\n\nReturns the year for date, in the range 1000 to 9999, or 0 for the\n"zero" date.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT YEAR(''1987-01-01'');\n        -> 1987\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html');
INSERT INTO `help_topic` (`help_topic_id`, `name`, `help_category_id`, `description`, `example`, `url`) VALUES
(359, 'SHOW ENGINE', 27, 'Syntax:\nSHOW ENGINE engine_name {STATUS | MUTEX}\n\nSHOW ENGINE displays operational information about a storage engine.\nThe following statements currently are supported:\n\nSHOW ENGINE INNODB STATUS\nSHOW ENGINE INNODB MUTEX\nSHOW ENGINE {NDB | NDBCLUSTER} STATUS\n\nOlder (and now deprecated) synonyms are SHOW INNODB STATUS for SHOW\nENGINE INNODB STATUS and SHOW MUTEX STATUS for SHOW ENGINE INNODB\nMUTEX.\n\nIn MySQL 5.0, SHOW ENGINE INNODB MUTEX is invoked as SHOW MUTEX STATUS.\nThe latter statement displays similar information but in a somewhat\ndifferent output format.\n\nSHOW ENGINE BDB LOGS formerly displayed status information about BDB\nlog files. As of MySQL 5.1.12, the BDB storage engine is not supported,\nand this statement produces a warning.\n\nSHOW ENGINE INNODB STATUS displays extensive information about the\nstate of the InnoDB storage engine.\n\nThe InnoDB Monitors provide additional information about InnoDB\nprocessing. See\nhttp://dev.mysql.com/doc/refman/5.1/en/innodb-monitor.html.\n\nSHOW ENGINE INNODB MUTEX displays InnoDB mutex statistics. From MySQL\n5.1.2 to 5.1.14, the statement displays the following output fields:\n\no Type\n\n  Always InnoDB.\n\no Name\n\n  The mutex name and the source file where it is implemented. Example:\n  &pool->mutex:mem0pool.c\n\n  The mutex name indicates its purpose. For example, the log_sys mutex\n  is used by the InnoDB logging subsystem and indicates how intensive\n  logging activity is. The buf_pool mutex protects the InnoDB buffer\n  pool.\n\no Status\n\n  The mutex status. The fields contains several values:\n\n  o count indicates how many times the mutex was requested.\n\n  o spin_waits indicates how many times the spinlock had to run.\n\n  o spin_rounds indicates the number of spinlock rounds. (spin_rounds\n    divided by spin_waits provides the average round count.)\n\n  o os_waits indicates the number of operating system waits. This\n    occurs when the spinlock did not work (the mutex was not locked\n    during the spinlock and it was necessary to yield to the operating\n    system and wait).\n\n  o os_yields indicates the number of times a the thread trying to lock\n    a mutex gave up its timeslice and yielded to the operating system\n    (on the presumption that allowing other threads to run will free\n    the mutex so that it can be locked).\n\n  o os_wait_times indicates the amount of time (in ms) spent in\n    operating system waits, if the timed_mutexes system variable is 1\n    (ON). If timed_mutexes is 0 (OFF), timing is disabled, so\n    os_wait_times is 0. timed_mutexes is off by default.\n\nFrom MySQL 5.1.15 on, the statement displays the following output\nfields:\n\no Type\n\n  Always InnoDB.\n\no Name\n\n  The source file where the mutex is implemented, and the line number\n  in the file where the mutex is created. The line number may change\n  depending on your version of MySQL.\n\no Status\n\n  This field displays the same values as previously described (count,\n  spin_waits, spin_rounds, os_waits, os_yields, os_wait_times), but\n  only if UNIV_DEBUG was defined at MySQL compilation time (for\n  example, in include/univ.h in the InnoDB part of the MySQL source\n  tree). If UNIV_DEBUG was not defined, the statement displays only the\n  os_waits value. In the latter case (without UNIV_DEBUG), the\n  information on which the output is based is insufficient to\n  distinguish regular mutexes and mutexes that protect rw-locks (which\n  allow multiple readers or a single writer). Consequently, the output\n  may appear to contain multiple rows for the same mutex.\n\nInformation from this statement can be used to diagnose system\nproblems. For example, large values of spin_waits and spin_rounds may\nindicate scalability problems.\n\nIf the server has the NDBCLUSTER storage engine enabled, SHOW ENGINE\nNDB STATUS displays cluster status information such as the number of\nconnected data nodes, the cluster connectstring, and cluster binlog\nepochs, as well as counts of various Cluster API objects created by the\nMySQL Server when connected to the cluster. Sample output from this\nstatement is shown here:\n\nmysql> SHOW ENGINE NDB STATUS;\n+------------+-----------------------+--------------------------------------------------+\n| Type       | Name                  | Status                                           |\n+------------+-----------------------+--------------------------------------------------+\n| ndbcluster | connection            | cluster_node_id=7, \n  connected_host=192.168.0.103, connected_port=1186, number_of_data_nodes=4, \n  number_of_ready_data_nodes=3, connect_count=0                                         |\n| ndbcluster | NdbTransaction        | created=6, free=0, sizeof=212                    |\n| ndbcluster | NdbOperation          | created=8, free=8, sizeof=660                    |\n| ndbcluster | NdbIndexScanOperation | created=1, free=1, sizeof=744                    |\n| ndbcluster | NdbIndexOperation     | created=0, free=0, sizeof=664                    |\n| ndbcluster | NdbRecAttr            | created=1285, free=1285, sizeof=60               |\n| ndbcluster | NdbApiSignal          | created=16, free=16, sizeof=136                  |\n| ndbcluster | NdbLabel              | created=0, free=0, sizeof=196                    |\n| ndbcluster | NdbBranch             | created=0, free=0, sizeof=24                     |\n| ndbcluster | NdbSubroutine         | created=0, free=0, sizeof=68                     |\n| ndbcluster | NdbCall               | created=0, free=0, sizeof=16                     |\n| ndbcluster | NdbBlob               | created=1, free=1, sizeof=264                    |\n| ndbcluster | NdbReceiver           | created=4, free=0, sizeof=68                     |\n| ndbcluster | binlog                | latest_epoch=155467, latest_trans_epoch=148126, \n  latest_received_binlog_epoch=0, latest_handled_binlog_epoch=0, \n  latest_applied_binlog_epoch=0                                                         |\n+------------+-----------------------+--------------------------------------------------+\n\nThe rows with connection and binlog in the Name column were added to\nthe output of this statement in MySQL 5.1. The Status column in each of\nthese rows provides information about the MySQL server''s connection to\nthe cluster and about the cluster binary log''s status, respectively.\nThe Status information is in the form of comma-delimited set of\nname/value pairs.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-engine.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-engine.html'),
(360, 'NAME_CONST', 14, 'Syntax:\nNAME_CONST(name,value)\n\nReturns the given value. When used to produce a result set column,\nNAME_CONST() causes the column to have the given name. The arguments\nshould be constants.\n\nmysql> SELECT NAME_CONST(''myname'', 14);\n+--------+\n| myname |\n+--------+\n|     14 |\n+--------+\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(361, 'RELEASE_LOCK', 14, 'Syntax:\nRELEASE_LOCK(str)\n\nReleases the lock named by the string str that was obtained with\nGET_LOCK(). Returns 1 if the lock was released, 0 if the lock was not\nestablished by this thread (in which case the lock is not released),\nand NULL if the named lock did not exist. The lock does not exist if it\nwas never obtained by a call to GET_LOCK() or if it has previously been\nreleased.\n\nThe DO statement is convenient to use with RELEASE_LOCK(). See [HELP\nDO].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(362, 'IS NULL', 18, 'Syntax:\nIS NULL\n\nTests whether a value is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 1 IS NULL, 0 IS NULL, NULL IS NULL;\n        -> 0, 0, 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(363, 'CONVERT_TZ', 31, 'Syntax:\nCONVERT_TZ(dt,from_tz,to_tz)\n\nCONVERT_TZ() converts a datetime value dt from the time zone given by\nfrom_tz to the time zone given by to_tz and returns the resulting\nvalue. Time zones are specified as described in\nhttp://dev.mysql.com/doc/refman/5.1/en/time-zone-support.html. This\nfunction returns NULL if the arguments are invalid.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT CONVERT_TZ(''2004-01-01 12:00:00'',''GMT'',''MET'');\n        -> ''2004-01-01 13:00:00''\nmysql> SELECT CONVERT_TZ(''2004-01-01 12:00:00'',''+00:00'',''+10:00'');\n        -> ''2004-01-01 22:00:00''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(364, 'TIME_TO_SEC', 31, 'Syntax:\nTIME_TO_SEC(time)\n\nReturns the time argument, converted to seconds.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT TIME_TO_SEC(''22:23:00'');\n        -> 80580\nmysql> SELECT TIME_TO_SEC(''00:39:38'');\n        -> 2378\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(365, 'WEEKDAY', 31, 'Syntax:\nWEEKDAY(date)\n\nReturns the weekday index for date (0 = Monday, 1 = Tuesday, ... 6 =\nSunday).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT WEEKDAY(''2008-02-03 22:23:00'');\n        -> 6\nmysql> SELECT WEEKDAY(''2007-11-06'');\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(366, 'EXPORT_SET', 36, 'Syntax:\nEXPORT_SET(bits,on,off[,separator[,number_of_bits]])\n\nReturns a string such that for every bit set in the value bits, you get\nan on string and for every bit not set in the value, you get an off\nstring. Bits in bits are examined from right to left (from low-order to\nhigh-order bits). Strings are added to the result from left to right,\nseparated by the separator string (the default being the comma\ncharacter ","). The number of bits examined is given by number_of_bits\n(defaults to 64).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT EXPORT_SET(5,''Y'',''N'','','',4);\n        -> ''Y,N,Y,N''\nmysql> SELECT EXPORT_SET(6,''1'',''0'','','',10);\n        -> ''0,1,1,0,0,0,0,0,0,0''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(367, 'ALTER SERVER', 38, 'Syntax:\nALTER SERVER  server_name\n    OPTIONS (option [, option] ...)\n\nAlters the server information for server_name, adjusting the specified\noptions as per the CREATE SERVER command. See [HELP CREATE SERVER]. The\ncorresponding fields in the mysql.servers table are updated\naccordingly. This statement requires the SUPER privilege.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/alter-server.html\n\n', 'ALTER SERVER s OPTIONS (USER ''sally'');\n', 'http://dev.mysql.com/doc/refman/5.1/en/alter-server.html'),
(368, 'TIME FUNCTION', 31, 'Syntax:\nTIME(expr)\n\nExtracts the time part of the time or datetime expression expr and\nreturns it as a string.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT TIME(''2003-12-31 01:02:03'');\n        -> ''01:02:03''\nmysql> SELECT TIME(''2003-12-31 01:02:03.000123'');\n        -> ''01:02:03.000123''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(369, 'DATE_ADD', 31, 'Syntax:\nDATE_ADD(date,INTERVAL expr unit), DATE_SUB(date,INTERVAL expr unit)\n\nThese functions perform date arithmetic. The date argument specifies\nthe starting date or datetime value. expr is an expression specifying\nthe interval value to be added or subtracted from the starting date.\nexpr is a string; it may start with a "-" for negative intervals. unit\nis a keyword indicating the units in which the expression should be\ninterpreted.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT ''2008-12-31 23:59:59'' + INTERVAL 1 SECOND;\n        -> ''2009-01-01 00:00:00''\nmysql> SELECT INTERVAL 1 DAY + ''2008-12-31'';\n        -> ''2009-01-01''\nmysql> SELECT ''2005-01-01'' - INTERVAL 1 SECOND;\n        -> ''2004-12-31 23:59:59''\nmysql> SELECT DATE_ADD(''2000-12-31 23:59:59'',\n    ->                 INTERVAL 1 SECOND);\n        -> ''2001-01-01 00:00:00''\nmysql> SELECT DATE_ADD(''2010-12-31 23:59:59'',\n    ->                 INTERVAL 1 DAY);\n        -> ''2011-01-01 23:59:59''\nmysql> SELECT DATE_ADD(''2100-12-31 23:59:59'',\n    ->                 INTERVAL ''1:1'' MINUTE_SECOND);\n        -> ''2101-01-01 00:01:00''\nmysql> SELECT DATE_SUB(''2005-01-01 00:00:00'',\n    ->                 INTERVAL ''1 1:1:1'' DAY_SECOND);\n        -> ''2004-12-30 22:58:59''\nmysql> SELECT DATE_ADD(''1900-01-01 00:00:00'',\n    ->                 INTERVAL ''-1 10'' DAY_HOUR);\n        -> ''1899-12-30 14:00:00''\nmysql> SELECT DATE_SUB(''1998-01-02'', INTERVAL 31 DAY);\n        -> ''1997-12-02''\nmysql> SELECT DATE_ADD(''1992-12-31 23:59:59.000002'',\n    ->            INTERVAL ''1.999999'' SECOND_MICROSECOND);\n        -> ''1993-01-01 00:00:01.000001''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(370, 'CAST', 36, 'Syntax:\nCAST(expr AS type)\n\nThe CAST() function takes a value of one type and produce a value of\nanother type, similar to CONVERT(). See the description of CONVERT()\nfor more information.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/cast-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/cast-functions.html'),
(371, 'SOUNDS LIKE', 36, 'Syntax:\nexpr1 SOUNDS LIKE expr2\n\nThis is the same as SOUNDEX(expr1) = SOUNDEX(expr2).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(372, 'PERIOD_DIFF', 31, 'Syntax:\nPERIOD_DIFF(P1,P2)\n\nReturns the number of months between periods P1 and P2. P1 and P2\nshould be in the format YYMM or YYYYMM. Note that the period arguments\nP1 and P2 are not date values.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT PERIOD_DIFF(200802,200703);\n        -> 11\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(373, 'LIKE', 36, 'Syntax:\nexpr LIKE pat [ESCAPE ''escape_char'']\n\nPattern matching using SQL simple regular expression comparison.\nReturns 1 (TRUE) or 0 (FALSE). If either expr or pat is NULL, the\nresult is NULL.\n\nThe pattern need not be a literal string. For example, it can be\nspecified as a string expression or table column.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html\n\n', 'mysql> SELECT ''David!'' LIKE ''David_'';\n        -> 1\nmysql> SELECT ''David!'' LIKE ''%D%v%'';\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html'),
(374, 'MULTIPOINT', 24, 'MultiPoint(pt1,pt2,...)\n\nConstructs a WKB MultiPoint value using WKB Point arguments. If any\nargument is not a WKB Point, the return value is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions'),
(375, '>>', 19, 'Syntax:\n>>\n\nShifts a longlong (BIGINT) number to the right.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html\n\n', 'mysql> SELECT 4 >> 2;\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html'),
(376, 'FETCH', 23, 'Syntax:\nFETCH cursor_name INTO var_name [, var_name] ...\n\nThis statement fetches the next row (if a row exists) using the\nspecified open cursor, and advances the cursor pointer.\n\nIf no more rows are available, a No Data condition occurs with SQLSTATE\nvalue 02000. To detect this condition, you can set up a handler for it\n(or for a NOT FOUND condition). An example is shown in\nhttp://dev.mysql.com/doc/refman/5.1/en/cursors.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/fetch.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/fetch.html'),
(377, 'AVG', 16, 'Syntax:\nAVG([DISTINCT] expr)\n\nReturns the average value of expr. The DISTINCT option can be used to\nreturn the average of the distinct values of expr.\n\nAVG() returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', 'mysql> SELECT student_name, AVG(test_score)\n    ->        FROM student\n    ->        GROUP BY student_name;\n', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(378, 'TRUE FALSE', 29, 'The constants TRUE and FALSE evaluate to 1 and 0, respectively. The\nconstant names can be written in any lettercase.\n\nmysql> SELECT TRUE, true, FALSE, false;\n        -> 1, 1, 0, 0\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/boolean-values.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/boolean-values.html'),
(379, 'MBRWITHIN', 6, 'MBRWithin(g1,g2)\n\nReturns 1 or 0 to indicate whether the Minimum Bounding Rectangle of g1\nis within the Minimum Bounding Rectangle of g2. This tests the opposite\nrelationship as MBRContains().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html\n\n', 'mysql> SET @g1 = GeomFromText(''Polygon((0 0,0 3,3 3,3 0,0 0))'');\nmysql> SET @g2 = GeomFromText(''Polygon((0 0,0 5,5 5,5 0,0 0))'');\nmysql> SELECT MBRWithin(@g1,@g2), MBRWithin(@g2,@g1);\n+--------------------+--------------------+\n| MBRWithin(@g1,@g2) | MBRWithin(@g2,@g1) |\n+--------------------+--------------------+\n|                  1 |                  0 |\n+--------------------+--------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/relations-on-geometry-mbr.html'),
(380, 'IN', 18, 'Syntax:\nexpr IN (value,...)\n\nReturns 1 if expr is equal to any of the values in the IN list, else\nreturns 0. If all values are constants, they are evaluated according to\nthe type of expr and sorted. The search for the item then is done using\na binary search. This means IN is very quick if the IN value list\nconsists entirely of constants. Otherwise, type conversion takes place\naccording to the rules described in\nhttp://dev.mysql.com/doc/refman/5.1/en/type-conversion.html, but\napplied to all the arguments.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 2 IN (0,3,5,7);\n        -> 0\nmysql> SELECT ''wefwf'' IN (''wee'',''wefwf'',''weg'');\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(381, 'QUOTE', 36, 'Syntax:\nQUOTE(str)\n\nQuotes a string to produce a result that can be used as a properly\nescaped data value in an SQL statement. The string is returned enclosed\nby single quotes and with each instance of single quote ("''"),\nbackslash ("\\"), ASCII NUL, and Control-Z preceded by a backslash. If\nthe argument is NULL, the return value is the word "NULL" without\nenclosing single quotes.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT QUOTE(''Don\\''t!'');\n        -> ''Don\\''t!''\nmysql> SELECT QUOTE(NULL);\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(382, 'SESSION_USER', 15, 'Syntax:\nSESSION_USER()\n\nSESSION_USER() is a synonym for USER().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(383, 'HELP COMMAND', 26, 'Syntax:\nmysql> help search_string\n\nIf you provide an argument to the help command, mysql uses it as a\nsearch string to access server-side help from the contents of the MySQL\nReference Manual. The proper operation of this command requires that\nthe help tables in the mysql database be initialized with help topic\ninformation (see\nhttp://dev.mysql.com/doc/refman/5.1/en/server-side-help-support.html).\n\nIf there is no match for the search string, the search fails:\n\nmysql> help me\n\nNothing found\nPlease try to run ''help contents'' for a list of all accessible topics\n\nUse help contents to see a list of the help categories:\n\nmysql> help contents\nYou asked for help about help category: "Contents"\nFor more information, type ''help <item>'', where <item> is one of the\nfollowing categories:\n   Account Management\n   Administration\n   Data Definition\n   Data Manipulation\n   Data Types\n   Functions\n   Functions and Modifiers for Use with GROUP BY\n   Geographic Features\n   Language Structure\n   Plugins\n   Storage Engines\n   Stored Routines\n   Table Maintenance\n   Transactions\n   Triggers\n\nIf the search string matches multiple items, mysql shows a list of\nmatching topics:\n\nmysql> help logs\nMany help items for your request exist.\nTo make a more specific request, please type ''help <item>'',\nwhere <item> is one of the following topics:\n   SHOW\n   SHOW BINARY LOGS\n   SHOW ENGINE\n   SHOW LOGS\n\nUse a topic as the search string to see the help entry for that topic:\n\nmysql> help show binary logs\nName: ''SHOW BINARY LOGS''\nDescription:\nSyntax:\nSHOW BINARY LOGS\nSHOW MASTER LOGS\n\nLists the binary log files on the server. This statement is used as\npart of the procedure described in [purge-binary-logs], that shows how\nto determine which logs can be purged.\n\nmysql> SHOW BINARY LOGS;\n+---------------+-----------+\n| Log_name      | File_size |\n+---------------+-----------+\n| binlog.000015 |    724935 |\n| binlog.000016 |    733481 |\n+---------------+-----------+\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mysql-server-side-help.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/mysql-server-side-help.html'),
(384, 'QUARTER', 31, 'Syntax:\nQUARTER(date)\n\nReturns the quarter of the year for date, in the range 1 to 4.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT QUARTER(''2008-04-01'');\n        -> 2\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(385, 'POSITION', 36, 'Syntax:\nPOSITION(substr IN str)\n\nPOSITION(substr IN str) is a synonym for LOCATE(substr,str).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(386, 'IS_USED_LOCK', 14, 'Syntax:\nIS_USED_LOCK(str)\n\nChecks whether the lock named str is in use (that is, locked). If so,\nit returns the connection identifier of the client that holds the lock.\nOtherwise, it returns NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(387, 'POLYFROMTEXT', 3, 'PolyFromText(wkt[,srid]), PolygonFromText(wkt[,srid])\n\nConstructs a POLYGON value using its WKT representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions'),
(388, 'DES_ENCRYPT', 11, 'Syntax:\nDES_ENCRYPT(str[,{key_num|key_str}])\n\nEncrypts the string with the given key using the Triple-DES algorithm.\n\nThis function works only if MySQL has been configured with SSL support.\nSee http://dev.mysql.com/doc/refman/5.1/en/secure-connections.html.\n\nThe encryption key to use is chosen based on the second argument to\nDES_ENCRYPT(), if one was given. With no argument, the first key from\nthe DES key file is used. With a key_num argument, the given key number\n(0-9) from the DES key file is used. With a key_str argument, the given\nkey string is used to encrypt str.\n\nThe key file can be specified with the --des-key-file server option.\n\nThe return string is a binary string where the first character is\nCHAR(128 | key_num). If an error occurs, DES_ENCRYPT() returns NULL.\n\nThe 128 is added to make it easier to recognize an encrypted key. If\nyou use a string key, key_num is 127.\n\nThe string length for the result is given by this formula:\n\nnew_len = orig_len + (8 - (orig_len % 8)) + 1\n\nEach line in the DES key file has the following format:\n\nkey_num des_key_str\n\nEach key_num value must be a number in the range from 0 to 9. Lines in\nthe file may be in any order. des_key_str is the string that is used to\nencrypt the message. There should be at least one space between the\nnumber and the key. The first key is the default key that is used if\nyou do not specify any key argument to DES_ENCRYPT().\n\nYou can tell MySQL to read new key values from the key file with the\nFLUSH DES_KEY_FILE statement. This requires the RELOAD privilege.\n\nOne benefit of having a set of default keys is that it gives\napplications a way to check for the existence of encrypted column\nvalues, without giving the end user the right to decrypt those values.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', 'mysql> SELECT customer_address FROM customer_table \n     > WHERE crypted_credit_card = DES_ENCRYPT(''credit_card_number'');\n', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(389, 'CEIL', 4, 'Syntax:\nCEIL(X)\n\nCEIL() is a synonym for CEILING().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(390, 'LENGTH', 36, 'Syntax:\nLENGTH(str)\n\nReturns the length of the string str, measured in bytes. A multi-byte\ncharacter counts as multiple bytes. This means that for a string\ncontaining five two-byte characters, LENGTH() returns 10, whereas\nCHAR_LENGTH() returns 5.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT LENGTH(''text'');\n        -> 4\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(391, 'STR_TO_DATE', 31, 'Syntax:\nSTR_TO_DATE(str,format)\n\nThis is the inverse of the DATE_FORMAT() function. It takes a string\nstr and a format string format. STR_TO_DATE() returns a DATETIME value\nif the format string contains both date and time parts, or a DATE or\nTIME value if the string contains only date or time parts.\n\nThe date, time, or datetime values contained in str should be given in\nthe format indicated by format. For the specifiers that can be used in\nformat, see the DATE_FORMAT() function description. If str contains an\nillegal date, time, or datetime value, STR_TO_DATE() returns NULL. An\nillegal value also produces a warning.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(392, 'Y', 10, 'Y(p)\n\nReturns the Y-coordinate value for the point p as a double-precision\nnumber.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#point-property-functions\n\n', 'mysql> SET @pt = ''Point(56.7 53.34)'';\nmysql> SELECT Y(GeomFromText(@pt));\n+----------------------+\n| Y(GeomFromText(@pt)) |\n+----------------------+\n|                53.34 |\n+----------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#point-property-functions'),
(393, 'SHOW INNODB STATUS', 27, 'Syntax:\nSHOW INNODB STATUS\n\nIn MySQL 5.1, this is a deprecated synonym for SHOW ENGINE INNODB\nSTATUS. See [HELP SHOW ENGINE].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-innodb-status.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-innodb-status.html'),
(394, 'CHECKSUM TABLE', 20, 'Syntax:\nCHECKSUM TABLE tbl_name [, tbl_name] ... [ QUICK | EXTENDED ]\n\nCHECKSUM TABLE reports a table checksum.\n\nWith QUICK, the live table checksum is reported if it is available, or\nNULL otherwise. This is very fast. A live checksum is enabled by\nspecifying the CHECKSUM=1 table option when you create the table;\ncurrently, this is supported only for MyISAM tables. See [HELP CREATE\nTABLE].\n\nWith EXTENDED, the entire table is read row by row and the checksum is\ncalculated. This can be very slow for large tables.\n\nIf neither QUICK nor EXTENDED is specified, MySQL returns a live\nchecksum if the table storage engine supports it and scans the table\notherwise.\n\nFor a non-existent table, CHECKSUM TABLE returns NULL and generates a\nwarning.\n\nThe checksum value depends on the table row format. If the row format\nchanges, the checksum also changes. For example, the storage format for\nVARCHAR changed between MySQL 4.1 and 5.0, so if a 4.1 table is\nupgraded to MySQL 5.0, the checksum value may change.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/checksum-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/checksum-table.html'),
(395, 'NUMINTERIORRINGS', 2, 'NumInteriorRings(poly)\n\nReturns the number of interior rings in the Polygon value poly.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#polygon-property-functions\n\n', 'mysql> SET @poly =\n    -> ''Polygon((0 0,0 3,3 3,3 0,0 0),(1 1,1 2,2 2,2 1,1 1))'';\nmysql> SELECT NumInteriorRings(GeomFromText(@poly));\n+---------------------------------------+\n| NumInteriorRings(GeomFromText(@poly)) |\n+---------------------------------------+\n|                                     1 |\n+---------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#polygon-property-functions'),
(396, 'INTERIORRINGN', 2, 'InteriorRingN(poly,N)\n\nReturns the N-th interior ring for the Polygon value poly as a\nLineString. Rings are numbered beginning with 1.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#polygon-property-functions\n\n', 'mysql> SET @poly =\n    -> ''Polygon((0 0,0 3,3 3,3 0,0 0),(1 1,1 2,2 2,2 1,1 1))'';\nmysql> SELECT AsText(InteriorRingN(GeomFromText(@poly),1));\n+----------------------------------------------+\n| AsText(InteriorRingN(GeomFromText(@poly),1)) |\n+----------------------------------------------+\n| LINESTRING(1 1,1 2,2 2,2 1,1 1)              |\n+----------------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#polygon-property-functions'),
(397, 'UTC_TIME', 31, 'Syntax:\nUTC_TIME, UTC_TIME()\n\nReturns the current UTC time as a value in ''HH:MM:SS'' or HHMMSS.uuuuuu\nformat, depending on whether the function is used in a string or\nnumeric context.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT UTC_TIME(), UTC_TIME() + 0;\n        -> ''18:07:53'', 180753.000000\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(398, 'DROP FUNCTION', 38, 'The DROP FUNCTION statement is used to drop stored functions and\nuser-defined functions (UDFs):\n\no For information about dropping stored functions, see [HELP DROP\n  PROCEDURE].\n\no For information about dropping user-defined functions, see [HELP DROP\n  FUNCTION UDF].\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-function.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-function.html'),
(399, 'ALTER EVENT', 38, 'Syntax:\nALTER\n    [DEFINER = { user | CURRENT_USER }]\n    EVENT event_name\n    [ON SCHEDULE schedule]\n    [ON COMPLETION [NOT] PRESERVE]\n    [RENAME TO new_event_name]\n    [ENABLE | DISABLE | DISABLE ON SLAVE]\n    [COMMENT ''comment'']\n    [DO sql_statement]\n\nThe ALTER EVENT statement is used to change one or more of the\ncharacteristics of an existing event without the need to drop and\nrecreate it. The syntax for each of the DEFINER, ON SCHEDULE, ON\nCOMPLETION, COMMENT, ENABLE / DISABLE, and DO clauses is exactly the\nsame as when used with CREATE EVENT. (See [HELP CREATE EVENT].)\n\nSupport for the DEFINER clause was added in MySQL 5.1.17.\n\nBeginning with MySQL 5.1.12, any user can alter an event defined on a\ndatabase for which that user has the EVENT privilege. When a user\nexecutes a successful ALTER EVENT statement, that user becomes the\ndefiner for the affected event.\n\n(In MySQL 5.1.11 and earlier, an event could be altered only by its\ndefiner, or by a user having the SUPER privilege.)\n\nALTER EVENT works only with an existing event:\n\nmysql> ALTER EVENT no_such_event \n     >     ON SCHEDULE \n     >       EVERY ''2:3'' DAY_HOUR;\nERROR 1517 (HY000): Unknown event ''no_such_event''\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/alter-event.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/alter-event.html'),
(400, 'STDDEV', 16, 'Syntax:\nSTDDEV(expr)\n\nReturns the population standard deviation of expr. This function is\nprovided for compatibility with Oracle. The standard SQL function\nSTDDEV_POP() can be used instead.\n\nThis function returns NULL if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(401, 'DATE_SUB', 31, 'Syntax:\nDATE_SUB(date,INTERVAL expr unit)\n\nSee the description for DATE_ADD().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(402, 'PERIOD_ADD', 31, 'Syntax:\nPERIOD_ADD(P,N)\n\nAdds N months to period P (in the format YYMM or YYYYMM). Returns a\nvalue in the format YYYYMM. Note that the period argument P is not a\ndate value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT PERIOD_ADD(200801,2);\n        -> 200803\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(403, '|', 19, 'Syntax:\n|\n\nBitwise OR:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html\n\n', 'mysql> SELECT 29 | 15;\n        -> 31\n', 'http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html'),
(404, 'GEOMFROMTEXT', 3, 'GeomFromText(wkt[,srid]), GeometryFromText(wkt[,srid])\n\nConstructs a geometry value of any type using its WKT representation\nand SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions'),
(405, 'UUID_SHORT', 14, 'Syntax:\nUUID_SHORT()\n\nReturns a "short" universal identifier as a 64-bit unsigned integer\n(rather than a string-form 128-bit identifier as returned by the UUID()\nfunction).\n\nThe value of UUID_SHORT() is guaranteed to be unique if the following\nconditions hold:\n\no The server_id of the current host is unique among your set of master\n  and slave servers\n\no server_id is between 0 and 255\n\no You don''t set back your system time for your server between mysqld\n  restarts\n\no You do not invoke UUID_SHORT() on average more than 16 million times\n  per second between mysqld restarts\n\nThe UUID_SHORT() return value is constructed this way:\n\n  (server_id & 255) << 56\n+ (server_startup_time_in_seconds << 24)\n+ incremented_variable++;\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', 'mysql> SELECT UUID_SHORT();\n        -> 92395783831158784 \n', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(406, 'RIGHT', 36, 'Syntax:\nRIGHT(str,len)\n\nReturns the rightmost len characters from the string str, or NULL if\nany argument is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT RIGHT(''foobarbar'', 4);\n        -> ''rbar''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(407, 'DATEDIFF', 31, 'Syntax:\nDATEDIFF(expr1,expr2)\n\nDATEDIFF() returns expr1 - expr2 expressed as a value in days from one\ndate to the other. expr1 and expr2 are date or date-and-time\nexpressions. Only the date parts of the values are used in the\ncalculation.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT DATEDIFF(''2007-12-31 23:59:59'',''2007-12-30'');\n        -> 1\nmysql> SELECT DATEDIFF(''2010-11-30 23:59:59'',''2010-12-31'');\n        -> -31\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(408, 'DROP TABLESPACE', 38, 'Syntax:\nDROP TABLESPACE tablespace_name\n    ENGINE [=] engine_name\n\nThis statement drops a tablespace that was previously created using\nCREATE TABLESPACE (see [HELP CREATE TABLESPACE]).\n\n*Important*: The tablespace to be dropped must not contain any data\nfiles; in other words, before you can drop a tablespace, you must first\ndrop each of its data files using ALTER TABLESPACE ... DROP DATAFILE\n(see [HELP ALTER TABLESPACE]).\n\nThe ENGINE clause (required) specifies the storage engine used by the\ntablespace. In MySQL 5.1, the only accepted values for engine_name are\nNDB and NDBCLUSTER.\n\nDROP TABLESPACE was added in MySQL 5.1.6. In MySQL 5.1, it is useful\nonly with Disk Data storage for MySQL Cluster. See\nhttp://dev.mysql.com/doc/refman/5.1/en/mysql-cluster-disk-data.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-tablespace.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-tablespace.html'),
(409, 'DROP PROCEDURE', 38, 'Syntax:\nDROP {PROCEDURE | FUNCTION} [IF EXISTS] sp_name\n\nThis statement is used to drop a stored procedure or function. That is,\nthe specified routine is removed from the server. You must have the\nALTER ROUTINE privilege for the routine. (That privilege is granted\nautomatically to the routine creator.)\n\nThe IF EXISTS clause is a MySQL extension. It prevents an error from\noccurring if the procedure or function does not exist. A warning is\nproduced that can be viewed with SHOW WARNINGS.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/drop-procedure.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/drop-procedure.html'),
(410, 'CHECK TABLE', 20, 'Syntax:\nCHECK TABLE tbl_name [, tbl_name] ... [option] ...\n\noption = {FOR UPGRADE | QUICK | FAST | MEDIUM | EXTENDED | CHANGED}\n\nCHECK TABLE checks a table or tables for errors. CHECK TABLE works for\nMyISAM, InnoDB, and ARCHIVE tables. Starting with MySQL 5.1.9, CHECK\nTABLE is also valid for CSV tables, see\nhttp://dev.mysql.com/doc/refman/5.1/en/csv-storage-engine.html. For\nMyISAM tables, the key statistics are updated as well.\n\nCHECK TABLE can also check views for problems, such as tables that are\nreferenced in the view definition that no longer exist.\n\nCHECK TABLE is not supported for partitioned tables before MySQL\n5.1.27.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/check-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/check-table.html'),
(411, 'BIN', 36, 'Syntax:\nBIN(N)\n\nReturns a string representation of the binary value of N, where N is a\nlonglong (BIGINT) number. This is equivalent to CONV(N,10,2). Returns\nNULL if N is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT BIN(12);\n        -> ''1100''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(412, 'INSTALL PLUGIN', 5, 'Syntax:\nINSTALL PLUGIN plugin_name SONAME ''plugin_library''\n\nThis statement installs a plugin.\n\nplugin_name is the name of the plugin as defined in the plugin\ndeclaration structure contained in the library file. Plugin name case\nsensitivity is determined by the host system filename semantics.\n\nplugin_library is the name of the shared library that contains the\nplugin code. The name includes the filename extension (for example,\nlibmyplugin.so or libmyplugin.dylib).\n\nThe shared library must be located in the plugin directory (that is,\nthe directory named by the plugin_dir system variable). The library\nmust be in the plugin directory itself, not in a subdirectory. By\ndefault, plugin_dir is plugin directory under the directory named by\nthe pkglibdir configuration variable, but it can be changed by setting\nthe value of plugin_dir at server startup. For example, set its value\nin a my.cnf file:\n\n[mysqld]\nplugin_dir=/path/to/plugin/directory\n\nIf the value of plugin_dir is a relative pathname, it is taken to be\nrelative to the MySQL base directory (the value of the basedir system\nvariable).\n\nINSTALL PLUGIN adds a line to the mysql.plugin table that describes the\nplugin. This table contains the plugin name and library filename.\n\nINSTALL PLUGIN also loads and initializes the plugin code to make the\nplugin available for use. A plugin is initialized by executing its\ninitialization function, which handles any setup that the plugin must\nperform before it can be used.\n\nTo use INSTALL PLUGIN, you must have the INSERT privilege for the\nmysql.plugin table.\n\nAt server startup, the server loads and initializes any plugin that is\nlisted in the mysql.plugin table. This means that a plugin is installed\nwith INSTALL PLUGIN only once, not every time the server starts. Plugin\nloading at startup does not occur if the server is started with the\n--skip-grant-tables option.\n\nWhen the server shuts down, it executes the deinitialization function\nfor each plugin that is loaded so that the plugin has a change to\nperform any final cleanup.\n\nIf you need to load plugins for a single server startup when the\n--skip-grant-tables option is given (which tells the server not to read\nsystem tables), use the --plugin-load option. See\nhttp://dev.mysql.com/doc/refman/5.1/en/server-options.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/install-plugin.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/install-plugin.html'),
(413, 'DECLARE CURSOR', 23, 'Syntax:\nDECLARE cursor_name CURSOR FOR select_statement\n\nThis statement declares a cursor. Multiple cursors may be declared in a\nstored program, but each cursor in a given block must have a unique\nname.\n\nThe SELECT statement cannot have an INTO clause.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/declare-cursors.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/declare-cursors.html'),
(414, 'LOAD DATA', 27, 'Syntax:\nLOAD DATA [LOW_PRIORITY | CONCURRENT] [LOCAL] INFILE ''file_name''\n    [REPLACE | IGNORE]\n    INTO TABLE tbl_name\n    [CHARACTER SET charset_name]\n    [{FIELDS | COLUMNS}\n        [TERMINATED BY ''string'']\n        [[OPTIONALLY] ENCLOSED BY ''char'']\n        [ESCAPED BY ''char'']\n    ]\n    [LINES\n        [STARTING BY ''string'']\n        [TERMINATED BY ''string'']\n    ]\n    [IGNORE number LINES]\n    [(col_name_or_user_var,...)]\n    [SET col_name = expr,...]\n\nThe LOAD DATA INFILE statement reads rows from a text file into a table\nat a very high speed. The filename must be given as a literal string.\n\nLOAD DATA INFILE is the complement of SELECT ... INTO OUTFILE. (See\nhttp://dev.mysql.com/doc/refman/5.1/en/select.html.) To write data from\na table to a file, use SELECT ... INTO OUTFILE. To read the file back\ninto a table, use LOAD DATA INFILE. The syntax of the FIELDS and LINES\nclauses is the same for both statements. Both clauses are optional, but\nFIELDS must precede LINES if both are specified.\n\nFor more information about the efficiency of INSERT versus LOAD DATA\nINFILE and speeding up LOAD DATA INFILE, see\nhttp://dev.mysql.com/doc/refman/5.1/en/insert-speed.html.\n\nThe character set indicated by the character_set_database system\nvariable is used to interpret the information in the file. SET NAMES\nand the setting of character_set_client do not affect interpretation of\ninput. If the contents of the input file use a character set that\ndiffers from the default, it is usually preferable to specify the\ncharacter set of the file by using the CHARACTER SET clause, which is\navailable as of MySQL 5.1.17.\n\nLOAD DATA INFILE interprets all fields in the file as having the same\ncharacter set, regardless of the data types of the columns into which\nfield values are loaded. For proper interpretation of file contents,\nyou must ensure that it was written with the correct character set. For\nexample, if you write a data file with mysqldump -T or by issuing a\nSELECT ... INTO OUTFILE statement in mysql, be sure to use a\n--default-character-set option with mysqldump or mysql so that output\nis written in the character set to be used when the file is loaded with\nLOAD DATA INFILE.\n\nNote that it is currently not possible to load data files that use the\nucs2 character set.\n\nAs of MySQL 5.1.6, the character_set_filesystem system variable\ncontrols the interpretation of the filename.\n\nYou can also load data files by using the mysqlimport utility; it\noperates by sending a LOAD DATA INFILE statement to the server. The\n--local option causes mysqlimport to read data files from the client\nhost. You can specify the --compress option to get better performance\nover slow networks if the client and server support the compressed\nprotocol. See http://dev.mysql.com/doc/refman/5.1/en/mysqlimport.html.\n\nIf you use LOW_PRIORITY, execution of the LOAD DATA statement is\ndelayed until no other clients are reading from the table. This affects\nonly storage engines that use only table-level locking (MyISAM, MEMORY,\nMERGE).\n\nIf you specify CONCURRENT with a MyISAM table that satisfies the\ncondition for concurrent inserts (that is, it contains no free blocks\nin the middle), other threads can retrieve data from the table while\nLOAD DATA is executing. Using this option affects the performance of\nLOAD DATA a bit, even if no other thread is using the table at the same\ntime.\n\nCONCURRENT is not replicated when using statement-based replication;\nhowever, it is replicated when using row-based replication. See\nhttp://dev.mysql.com/doc/refman/5.1/en/replication-features-load-data.h\ntml, for more information.\n\n*Note*: Prior to MySQL 5.1.23, LOAD DATA performed very poorly when\nimporting into partitioned tables. The statement now uses buffering to\nimprove performance; however, the buffer uses 130 KB memory per\npartition to achieve this. (Bug#26527 (http://bugs.mysql.com/26527))\n\nThe LOCAL keyword, if specified, is interpreted with respect to the\nclient end of the connection:\n\no If LOCAL is specified, the file is read by the client program on the\n  client host and sent to the server. The file can be given as a full\n  pathname to specify its exact location. If given as a relative\n  pathname, the name is interpreted relative to the directory in which\n  the client program was started.\n\no If LOCAL is not specified, the file must be located on the server\n  host and is read directly by the server. The server uses the\n  following rules to locate the file:\n\n  o If the filename is an absolute pathname, the server uses it as\n    given.\n\n  o If the filename is a relative pathname with one or more leading\n    components, the server searches for the file relative to the\n    server''s data directory.\n\n  o If a filename with no leading components is given, the server looks\n    for the file in the database directory of the default database.\n\nNote that, in the non-LOCAL case, these rules mean that a file named as\n./myfile.txt is read from the server''s data directory, whereas the file\nnamed as myfile.txt is read from the database directory of the default\ndatabase. For example, if db1 is the default database, the following\nLOAD DATA statement reads the file data.txt from the database directory\nfor db1, even though the statement explicitly loads the file into a\ntable in the db2 database:\n\nLOAD DATA INFILE ''data.txt'' INTO TABLE db2.my_table;\n\nWindows pathnames are specified using forward slashes rather than\nbackslashes. If you do use backslashes, you must double them.\n\nFor security reasons, when reading text files located on the server,\nthe files must either reside in the database directory or be readable\nby all. Also, to use LOAD DATA INFILE on server files, you must have\nthe FILE privilege. See\nhttp://dev.mysql.com/doc/refman/5.1/en/privileges-provided.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/load-data.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/load-data.html'),
(415, 'MULTILINESTRING', 24, 'MultiLineString(ls1,ls2,...)\n\nConstructs a WKB MultiLineString value using WKB LineString arguments.\nIf any argument is not a WKB LineString, the return value is NULL.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-mysql-specific-functions'),
(416, 'LOCALTIME', 31, 'Syntax:\nLOCALTIME, LOCALTIME()\n\nLOCALTIME and LOCALTIME() are synonyms for NOW().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(417, 'MPOINTFROMTEXT', 3, 'MPointFromText(wkt[,srid]), MultiPointFromText(wkt[,srid])\n\nConstructs a MULTIPOINT value using its WKT representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkt-functions'),
(418, 'BLOB', 21, 'BLOB[(M)]\n\nA BLOB column with a maximum length of 65,535 (216 - 1) bytes. Each\nBLOB value is stored using a two-byte length prefix that indicates the\nnumber of bytes in the value.\n\nAn optional length M can be given for this type. If this is done, MySQL\ncreates the column as the smallest BLOB type large enough to hold\nvalues M bytes long.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html');
INSERT INTO `help_topic` (`help_topic_id`, `name`, `help_category_id`, `description`, `example`, `url`) VALUES
(419, 'SHA1', 11, 'Syntax:\nSHA1(str), SHA(str)\n\nCalculates an SHA-1 160-bit checksum for the string, as described in\nRFC 3174 (Secure Hash Algorithm). The value is returned as a binary\nstring of 40 hex digits, or NULL if the argument was NULL. One of the\npossible uses for this function is as a hash key. You can also use it\nas a cryptographic function for storing passwords. SHA() is synonymous\nwith SHA1().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', 'mysql> SELECT SHA1(''abc'');\n        -> ''a9993e364706816aba3e25717850c26c9cd0d89d''\n', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(420, 'SUBSTR', 36, 'Syntax:\nSUBSTR(str,pos), SUBSTR(str FROM pos), SUBSTR(str,pos,len), SUBSTR(str\nFROM pos FOR len)\n\nSUBSTR() is a synonym for SUBSTRING().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(421, 'PASSWORD', 11, 'Syntax:\nPASSWORD(str)\n\nCalculates and returns a password string from the plaintext password\nstr and returns a binary string, or NULL if the argument was NULL. This\nis the function that is used for encrypting MySQL passwords for storage\nin the Password column of the user grant table.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', 'mysql> SELECT PASSWORD(''badpwd'');\n        -> ''*AAB3E285149C0135D51A520E1940DD3263DC008C''\n', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(422, 'CHAR', 21, '[NATIONAL] CHAR[(M)] [CHARACTER SET charset_name] [COLLATE\ncollation_name]\n\nA fixed-length string that is always right-padded with spaces to the\nspecified length when stored. M represents the column length in\ncharacters. The range of M is 0 to 255. If M is omitted, the length is\n1.\n\n*Note*: Trailing spaces are removed when CHAR values are retrieved\nunless the PAD_CHAR_TO_FULL_LENGTH SQL mode is enabled.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(423, 'UTC_DATE', 31, 'Syntax:\nUTC_DATE, UTC_DATE()\n\nReturns the current UTC date as a value in ''YYYY-MM-DD'' or YYYYMMDD\nformat, depending on whether the function is used in a string or\nnumeric context.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT UTC_DATE(), UTC_DATE() + 0;\n        -> ''2003-08-14'', 20030814\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(424, 'DIMENSION', 35, 'Dimension(g)\n\nReturns the inherent dimension of the geometry value g. The result can\nbe -1, 0, 1, or 2. The meaning of these values is given in\nhttp://dev.mysql.com/doc/refman/5.1/en/gis-class-geometry.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions\n\n', 'mysql> SELECT Dimension(GeomFromText(''LineString(1 1,2 2)''));\n+------------------------------------------------+\n| Dimension(GeomFromText(''LineString(1 1,2 2)'')) |\n+------------------------------------------------+\n|                                              1 |\n+------------------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions'),
(425, 'COUNT DISTINCT', 16, 'Syntax:\nCOUNT(DISTINCT expr,[expr...])\n\nReturns a count of the number of different non-NULL values.\n\nCOUNT(DISTINCT) returns 0 if there were no matching rows.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html\n\n', 'mysql> SELECT COUNT(DISTINCT results) FROM student;\n', 'http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'),
(426, 'BIT', 21, 'BIT[(M)]\n\nA bit-field type. M indicates the number of bits per value, from 1 to\n64. The default is 1 if M is omitted.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(427, 'EQUALS', 30, 'Equals(g1,g2)\n\nReturns 1 or 0 to indicate whether g1 is spatially equal to g2.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/functions-that-test-spatial-relationships-between-geometries.html'),
(428, 'SHOW CREATE VIEW', 27, 'Syntax:\nSHOW CREATE VIEW view_name\n\nThis statement shows a CREATE VIEW statement that creates the given\nview.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-create-view.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-create-view.html'),
(429, 'INTERVAL', 18, 'Syntax:\nINTERVAL(N,N1,N2,N3,...)\n\nReturns 0 if N < N1, 1 if N < N2 and so on or -1 if N is NULL. All\narguments are treated as integers. It is required that N1 < N2 < N3 <\n... < Nn for this function to work correctly. This is because a binary\nsearch is used (very fast).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT INTERVAL(23, 1, 15, 17, 30, 44, 200);\n        -> 3\nmysql> SELECT INTERVAL(10, 1, 10, 100, 1000);\n        -> 2\nmysql> SELECT INTERVAL(22, 23, 30, 44, 200);\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(430, 'FROM_DAYS', 31, 'Syntax:\nFROM_DAYS(N)\n\nGiven a day number N, returns a DATE value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT FROM_DAYS(730669);\n        -> ''2007-07-03''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(431, 'ALTER PROCEDURE', 38, 'Syntax:\nALTER {PROCEDURE | FUNCTION} sp_name [characteristic ...]\n\ncharacteristic:\n    { CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA }\n  | SQL SECURITY { DEFINER | INVOKER }\n  | COMMENT ''string''\n\nThis statement can be used to change the characteristics of a stored\nroutine (that is, a stored procedure or stored function). More than one\nchange may be specified in an ALTER PROCEDURE or ALTER FUNCTION\nstatement. However, you cannot change the parameters or routine body of\na stored routine using this statement; to make such changes, you must\nfirst drop the routine using DROP PROCEDURE or DROP FUNCTION, then\nre-create the routine using CREATE PROCEDURE or CREATE FUNCTION.\n\nYou must have the ALTER ROUTINE privilege for the routine. (That\nprivilege is granted automatically to the routine creator.) If binary\nlogging is enabled, the ALTER FUNCTION statement might also require the\nSUPER privilege, as described in\nhttp://dev.mysql.com/doc/refman/5.1/en/stored-programs-logging.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/alter-procedure.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/alter-procedure.html'),
(432, 'BIT_COUNT', 19, 'Syntax:\nBIT_COUNT(N)\n\nReturns the number of bits that are set in the argument N.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html\n\n', 'mysql> SELECT BIT_COUNT(29), BIT_COUNT(b''101010'');\n        -> 4, 3\n', 'http://dev.mysql.com/doc/refman/5.1/en/bit-functions.html'),
(433, 'OCTET_LENGTH', 36, 'Syntax:\nOCTET_LENGTH(str)\n\nOCTET_LENGTH() is a synonym for LENGTH().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(434, 'UTC_TIMESTAMP', 31, 'Syntax:\nUTC_TIMESTAMP, UTC_TIMESTAMP()\n\nReturns the current UTC date and time as a value in ''YYYY-MM-DD\nHH:MM:SS'' or YYYYMMDDHHMMSS.uuuuuu format, depending on whether the\nfunction is used in a string or numeric context.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT UTC_TIMESTAMP(), UTC_TIMESTAMP() + 0;\n        -> ''2003-08-14 18:08:04'', 20030814180804.000000\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(435, 'AES_ENCRYPT', 11, 'Syntax:\nAES_ENCRYPT(str,key_str)\n\nAES_ENCRYPT() and AES_DECRYPT() allow encryption and decryption of data\nusing the official AES (Advanced Encryption Standard) algorithm,\npreviously known as "Rijndael." Encoding with a 128-bit key length is\nused, but you can extend it up to 256 bits by modifying the source. We\nchose 128 bits because it is much faster and it is secure enough for\nmost purposes.\n\nAES_ENCRYPT() encrypts a string and returns a binary string.\nAES_DECRYPT() decrypts the encrypted string and returns the original\nstring. The input arguments may be any length. If either argument is\nNULL, the result of this function is also NULL.\n\nBecause AES is a block-level algorithm, padding is used to encode\nuneven length strings and so the result string length may be calculated\nusing this formula:\n\n16 x (trunc(string_length / 16) + 1)\n\nIf AES_DECRYPT() detects invalid data or incorrect padding, it returns\nNULL. However, it is possible for AES_DECRYPT() to return a non-NULL\nvalue (possibly garbage) if the input data or the key is invalid.\n\nYou can use the AES functions to store data in an encrypted form by\nmodifying your queries:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', 'INSERT INTO t VALUES (1,AES_ENCRYPT(''text'',''password''));\n', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(436, '+', 4, 'Syntax:\n+\n\nAddition:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html\n\n', 'mysql> SELECT 3+5;\n        -> 8\n', 'http://dev.mysql.com/doc/refman/5.1/en/arithmetic-functions.html'),
(437, 'INET_NTOA', 14, 'Syntax:\nINET_NTOA(expr)\n\nGiven a numeric network address (4 or 8 byte), returns the dotted-quad\nrepresentation of the address as a string.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html\n\n', 'mysql> SELECT INET_NTOA(3520061480);\n        -> ''209.207.224.40''\n', 'http://dev.mysql.com/doc/refman/5.1/en/miscellaneous-functions.html'),
(438, 'ACOS', 4, 'Syntax:\nACOS(X)\n\nReturns the arc cosine of X, that is, the value whose cosine is X.\nReturns NULL if X is not in the range -1 to 1.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT ACOS(1);\n        -> 0\nmysql> SELECT ACOS(1.0001);\n        -> NULL\nmysql> SELECT ACOS(0);\n        -> 1.5707963267949\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(439, 'ISOLATION', 8, 'Syntax:\nSET [GLOBAL | SESSION] TRANSACTION ISOLATION LEVEL\n  {\n       READ UNCOMMITTED\n     | READ COMMITTED\n     | REPEATABLE READ\n     | SERIALIZABLE\n   }\n\nThis statement sets the transaction isolation level for the next\ntransaction, globally, or for the current session:\n\no The default behavior (without any SESSION or GLOBAL keyword) is to\n  set the isolation level for the next (not started) transaction.\n\no With the GLOBAL keyword, the statement sets the default transaction\n  level globally for all subsequent sessions created from that point on\n  (but not for existing connections). You need the SUPER privilege to\n  do this.\n\no With the SESSION keyword, the statement sets the default transaction\n  level for all subsequent transactions performed within the current\n  session.\n\nTo set the initial default global isolation level for mysqld, use the\n--transaction-isolation option. See\nhttp://dev.mysql.com/doc/refman/5.1/en/server-options.html.\n\nFor information about InnoDB and transaction isolation level, see\nhttp://dev.mysql.com/doc/refman/5.1/en/innodb-transaction-isolation.htm\nl. InnoDB supports each of the levels described here. The default level\nis REPEATABLE READ. See also\nhttp://dev.mysql.com/doc/refman/5.1/en/innodb-locks-set.html, for\nadditional information about how InnoDB uses locks to execute various\ntypes of statements.\n\nIn MySQL 5.1, if the READ COMMITTED isolation level is used or the\ninnodb_locks_unsafe_for_binlog system variable is enabled, there is no\nInnoDB gap locking except in constraint checking. Also, record locks\nfor non-matching rows are released after MySQL has evaluated the WHERE\ncondition.\n\nA detailed list of the transaction levels supported by MySQL and the\nvarious storage engines follows:\n\no READ UNCOMMITTED\n\n  SELECT statements are performed in a non-locking fashion, but a\n  possible earlier version of a row might be used. Thus, using this\n  isolation level, such reads are not consistent. This is also called a\n  "dirty read." Otherwise, this isolation level works like READ\n  COMMITTED.\n\no READ COMMITTED\n\n  A somewhat Oracle-like isolation level. All SELECT ... FOR UPDATE and\n  SELECT ... LOCK IN SHARE MODE statements lock only the index records,\n  not the gaps before them, and thus allow the free insertion of new\n  records next to locked records. UPDATE and DELETE statements using a\n  unique index with a unique search condition lock only the index\n  record found, not the gap before it. In range-type UPDATE and DELETE\n  statements, InnoDB must set next-key or gap locks and block\n  insertions by other users to the gaps covered by the range. This is\n  necessary because "phantom rows" must be blocked for MySQL\n  replication and recovery to work.\n\n  Consistent reads behave as in Oracle: Each consistent read, even\n  within the same transaction, sets and reads its own fresh snapshot.\n  See\n  http://dev.mysql.com/doc/refman/5.1/en/innodb-consistent-read.html.\n\n  *Note*: As of MySQL 5.1, if you use READ COMMITTED (which is\n  equivalent to enabling innodb_locks_unsafe_for_binlog in 5.0), you\n  must use row-based binary logging.\n\no REPEATABLE READ\n\n  This is the default isolation level of InnoDB. SELECT ... FOR UPDATE,\n  SELECT ... LOCK IN SHARE MODE, UPDATE, and DELETE statements that use\n  a unique index with a unique search condition lock only the index\n  record found, not the gap before it. With other search conditions,\n  these operations employ next-key locking, so they lock the index\n  range scanned with next-key or gap locks, and block insertions by\n  other users to the gaps covered by the range.\n\n  In consistent reads, there is an important difference from the READ\n  COMMITTED isolation level: All consistent reads within the same\n  transaction read the same snapshot established by the first read.\n  This convention means that if you issue several plain SELECT\n  statements within the same transaction, these SELECT statements are\n  consistent also with respect to each other. See\n  http://dev.mysql.com/doc/refman/5.1/en/innodb-consistent-read.html.\n\no SERIALIZABLE\n\n  This level is like REPEATABLE READ, but InnoDB implicitly converts\n  all plain SELECT statements to SELECT ... LOCK IN SHARE MODE.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/set-transaction.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/set-transaction.html'),
(440, 'CEILING', 4, 'Syntax:\nCEILING(X)\n\nReturns the smallest integer value not less than X.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT CEILING(1.23);\n        -> 2\nmysql> SELECT CEILING(-1.23);\n        -> -1\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(441, 'SIN', 4, 'Syntax:\nSIN(X)\n\nReturns the sine of X, where X is given in radians.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT SIN(PI());\n        -> 1.2246063538224e-16\nmysql> SELECT ROUND(SIN(PI()));\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(442, 'DAYOFWEEK', 31, 'Syntax:\nDAYOFWEEK(date)\n\nReturns the weekday index for date (1 = Sunday, 2 = Monday, ..., 7 =\nSaturday). These index values correspond to the ODBC standard.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT DAYOFWEEK(''2007-02-03'');\n        -> 7\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(443, 'SHOW PROCESSLIST', 27, 'Syntax:\nSHOW [FULL] PROCESSLIST\n\nSHOW PROCESSLIST shows you which threads are running. You can also get\nthis information from the INFORMATION_SCHEMA PROCESSLIST table or the\nmysqladmin processlist command. If you have the PROCESS privilege, you\ncan see all threads. Otherwise, you can see only your own threads (that\nis, threads associated with the MySQL account that you are using). If\nyou do not use the FULL keyword, only the first 100 characters of each\nstatement are shown in the Info field.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-processlist.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-processlist.html'),
(444, 'LINEFROMWKB', 32, 'LineFromWKB(wkb[,srid]), LineStringFromWKB(wkb[,srid])\n\nConstructs a LINESTRING value using its WKB representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions'),
(445, 'GEOMETRYTYPE', 35, 'GeometryType(g)\n\nReturns as a string the name of the geometry type of which the geometry\ninstance g is a member. The name corresponds to one of the instantiable\nGeometry subclasses.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions\n\n', 'mysql> SELECT GeometryType(GeomFromText(''POINT(1 1)''));\n+------------------------------------------+\n| GeometryType(GeomFromText(''POINT(1 1)'')) |\n+------------------------------------------+\n| POINT                                    |\n+------------------------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#general-geometry-property-functions'),
(446, 'CREATE VIEW', 38, 'Syntax:\nCREATE\n    [OR REPLACE]\n    [ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]\n    [DEFINER = { user | CURRENT_USER }]\n    [SQL SECURITY { DEFINER | INVOKER }]\n    VIEW view_name [(column_list)]\n    AS select_statement\n    [WITH [CASCADED | LOCAL] CHECK OPTION]\n\nThe CREATE VIEW statement creates a new view, or replaces an existing\none if the OR REPLACE clause is given. If the view does not exist,\nCREATE OR REPLACE VIEW is the same as CREATE VIEW. If the view does\nexist, CREATE OR REPLACE VIEW is the same as ALTER VIEW.\n\nThe select_statement is a SELECT statement that provides the definition\nof the view. (When you select from the view, you select in effect using\nthe SELECT statement.) select_statement can select from base tables or\nother views.\n\nThe view definition is "frozen" at creation time, so changes to the\nunderlying tables afterward do not affect the view definition. For\nexample, if a view is defined as SELECT * on a table, new columns added\nto the table later do not become part of the view.\n\nThe ALGORITHM clause affects how MySQL processes the view. The DEFINER\nand SQL SECURITY clauses specify the security context to be used when\nchecking access privileges at view invocation time. The WITH CHECK\nOPTION clause can be given to constrain inserts or updates to rows in\ntables referenced by the view. These clauses are described later in\nthis section.\n\nThe CREATE VIEW statement requires the CREATE VIEW privilege for the\nview, and some privilege for each column selected by the SELECT\nstatement. For columns used elsewhere in the SELECT statement you must\nhave the SELECT privilege. If the OR REPLACE clause is present, you\nmust also have the DROP privilege for the view.\n\nA view belongs to a database. By default, a new view is created in the\ndefault database. To create the view explicitly in a given database,\nspecify the name as db_name.view_name when you create it.\n\nmysql> CREATE VIEW test.v AS SELECT * FROM t;\n\nBase tables and views share the same namespace within a database, so a\ndatabase cannot contain a base table and a view that have the same\nname.\n\nViews must have unique column names with no duplicates, just like base\ntables. By default, the names of the columns retrieved by the SELECT\nstatement are used for the view column names. To define explicit names\nfor the view columns, the optional column_list clause can be given as a\nlist of comma-separated identifiers. The number of names in column_list\nmust be the same as the number of columns retrieved by the SELECT\nstatement.\n\n*Note*: Prior to MySQL 5.1.29, When you modify an existing view, the\ncurrent view definition is backed up and saved. It is stored in that\ntable''s database directory, in a subdirectory named arc. The backup\nfile for a view v is named v.frm-00001. If you alter the view again,\nthe next backup is named v.frm-00002. The three latest view backup\ndefinitions are stored. Backed up view definitions are not preserved by\nmysqldump, or any other such programs, but you can retain them using a\nfile copy operation. However, they are not needed for anything but to\nprovide you with a backup of your previous view definition. It is safe\nto remove these backup definitions, but only while mysqld is not\nrunning. If you delete the arc subdirectory or its files while mysqld\nis running, you will receive an error the next time you try to alter\nthe view: mysql> ALTER VIEW v AS SELECT * FROM t; ERROR 6 (HY000):\nError on delete of ''.\\test\\arc/v.frm-0004'' (Errcode: 2)\n\nColumns retrieved by the SELECT statement can be simple references to\ntable columns. They can also be expressions that use functions,\nconstant values, operators, and so forth.\n\nUnqualified table or view names in the SELECT statement are interpreted\nwith respect to the default database. A view can refer to tables or\nviews in other databases by qualifying the table or view name with the\nproper database name.\n\nA view can be created from many kinds of SELECT statements. It can\nrefer to base tables or other views. It can use joins, UNION, and\nsubqueries. The SELECT need not even refer to any tables. The following\nexample defines a view that selects two columns from another table, as\nwell as an expression calculated from those columns:\n\nmysql> CREATE TABLE t (qty INT, price INT);\nmysql> INSERT INTO t VALUES(3, 50);\nmysql> CREATE VIEW v AS SELECT qty, price, qty*price AS value FROM t;\nmysql> SELECT * FROM v;\n+------+-------+-------+\n| qty  | price | value |\n+------+-------+-------+\n|    3 |    50 |   150 |\n+------+-------+-------+\n\nA view definition is subject to the following restrictions:\n\no The SELECT statement cannot contain a subquery in the FROM clause.\n\no The SELECT statement cannot refer to system or user variables.\n\no Within a stored program, the definition cannot refer to program\n  parameters or local variables.\n\no The SELECT statement cannot refer to prepared statement parameters.\n\no Any table or view referred to in the definition must exist. However,\n  after a view has been created, it is possible to drop a table or view\n  that the definition refers to. In this case, use of the view results\n  in an error. To check a view definition for problems of this kind,\n  use the CHECK TABLE statement.\n\no The definition cannot refer to a TEMPORARY table, and you cannot\n  create a TEMPORARY view.\n\no Any tables named in the view definition must exist at definition\n  time.\n\no You cannot associate a trigger with a view.\n\nORDER BY is allowed in a view definition, but it is ignored if you\nselect from a view using a statement that has its own ORDER BY.\n\nFor other options or clauses in the definition, they are added to the\noptions or clauses of the statement that references the view, but the\neffect is undefined. For example, if a view definition includes a LIMIT\nclause, and you select from the view using a statement that has its own\nLIMIT clause, it is undefined which limit applies. This same principle\napplies to options such as ALL, DISTINCT, or SQL_SMALL_RESULT that\nfollow the SELECT keyword, and to clauses such as INTO, FOR UPDATE,\nLOCK IN SHARE MODE, and PROCEDURE.\n\nIf you create a view and then change the query processing environment\nby changing system variables, that may affect the results that you get\nfrom the view:\n\nmysql> CREATE VIEW v (mycol) AS SELECT ''abc'';\nQuery OK, 0 rows affected (0.01 sec)\n\nmysql> SET sql_mode = '''';\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> SELECT "mycol" FROM v;\n+-------+\n| mycol |\n+-------+\n| mycol | \n+-------+\n1 row in set (0.01 sec)\n\nmysql> SET sql_mode = ''ANSI_QUOTES'';\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> SELECT "mycol" FROM v;\n+-------+\n| mycol |\n+-------+\n| abc   | \n+-------+\n1 row in set (0.00 sec)\n\nThe DEFINER and SQL SECURITY clauses determine which MySQL account to\nuse when checking access privileges for the view when a statement is\nexecuted that references the view. They were addded in MySQL 5.1.2. The\nlegal SQL SECURITY characteristic values are DEFINER and INVOKER. These\nindicate that the required privileges must be held by the user who\ndefined or invoked the view, respectively. The default SQL SECURITY\nvalue is DEFINER.\n\nIf a user value is given for the DEFINER clause, it should be a MySQL\naccount in ''user_name''@''host_name'' format (the same format used in the\nGRANT statement). The user_name and host_name values both are required.\nThe definer can also be given as CURRENT_USER or CURRENT_USER(). The\ndefault DEFINER value is the user who executes the CREATE VIEW\nstatement. This is the same as specifying DEFINER = CURRENT_USER\nexplicitly.\n\nIf you specify the DEFINER clause, these rules determine the legal\nDEFINER user values:\n\no If you do not have the SUPER privilege, the only legal user value is\n  your own account, either specified literally or by using\n  CURRENT_USER. You cannot set the definer to some other account.\n\no If you have the SUPER privilege, you can specify any syntactically\n  legal account name. If the account does not actually exist, a warning\n  is generated.\n\no If the SQL SECURITY value is DEFINER but the definer account does not\n  exist when the view is referenced, an error occurs.\n\nWithin a view definition, CURRENT_USER returns the view''s DEFINER value\nby default as of MySQL 5.1.12. For older versions, and for views\ndefined with the SQL SECURITY INVOKER characteristic, CURRENT_USER\nreturns the account for the view''s invoker. For information about user\nauditing within views, see\nhttp://dev.mysql.com/doc/refman/5.1/en/account-activity-auditing.html.\n\nWithin a stored routine that is defined with the SQL SECURITY DEFINER\ncharacteristic, CURRENT_USER returns the routine''s DEFINER value. This\nalso affects a view defined within such a program, if the view\ndefinition contains a DEFINER value of CURRENT_USER.\n\nAs of MySQL 5.1.2 (when the DEFINER and SQL SECURITY clauses were\nimplemented), view privileges are checked like this:\n\no At view definition time, the view creator must have the privileges\n  needed to use the top-level objects accessed by the view. For\n  example, if the view definition refers to table columns, the creator\n  must have privileges for the columns, as described previously. If the\n  definition refers to a stored function, only the privileges needed to\n  invoke the function can be checked. The privileges required when the\n  function runs can be checked only as it executes: For different\n  invocations of the function, different execution paths within the\n  function might be taken.\n\no When a view is referenced, privileges for objects accessed by the\n  view are checked against the privileges held by the view creator or\n  invoker, depending on whether the SQL SECURITY characteristic is\n  DEFINER or INVOKER, respectively.\n\no If reference to a view causes execution of a stored function,\n  privilege checking for statements executed within the function depend\n  on whether the function is defined with a SQL SECURITY characteristic\n  of DEFINER or INVOKER. If the security characteristic is DEFINER, the\n  function runs with the privileges of its creator. If the\n  characteristic is INVOKER, the function runs with the privileges\n  determined by the view''s SQL SECURITY characteristic.\n\nPrior to MySQL 5.1.2 (before the DEFINER and SQL SECURITY clauses were\nimplemented), privileges required for objects used in a view are\nchecked at view creation time.\n\nExample: A view might depend on a stored function, and that function\nmight invoke other stored routines. For example, the following view\ninvokes a stored function f():\n\nCREATE VIEW v AS SELECT * FROM t WHERE t.id = f(t.name);\n\nSuppose that f() contains a statement such as this:\n\nIF name IS NULL then\n  CALL p1();\nELSE\n  CALL p2();\nEND IF;\n\nThe privileges required for executing statements within f() need to be\nchecked when f() executes. This might mean that privileges are needed\nfor p1() or p2(), depending on the execution path within f(). Those\nprivileges must be checked at runtime, and the user who must possess\nthe privileges is determined by the SQL SECURITY values of the view v\nand the function f().\n\nThe DEFINER and SQL SECURITY clauses for views are extensions to\nstandard SQL. In standard SQL, views are handled using the rules for\nSQL SECURITY INVOKER.\n\nIf you invoke a view that was created before MySQL 5.1.2, it is treated\nas though it was created with a SQL SECURITY DEFINER clause and with a\nDEFINER value that is the same as your account. However, because the\nactual definer is unknown, MySQL issues a warning. To make the warning\ngo away, it is sufficient to re-create the view so that the view\ndefinition includes a DEFINER clause.\n\nThe optional ALGORITHM clause is a MySQL extension to standard SQL. It\naffects how MySQL processes the view. ALGORITHM takes three values:\nMERGE, TEMPTABLE, or UNDEFINED. The default algorithm is UNDEFINED if\nno ALGORITHM clause is present. For more information, see\nhttp://dev.mysql.com/doc/refman/5.1/en/view-algorithms.html.\n\nSome views are updatable. That is, you can use them in statements such\nas UPDATE, DELETE, or INSERT to update the contents of the underlying\ntable. For a view to be updatable, there must be a one-to-one\nrelationship between the rows in the view and the rows in the\nunderlying table. There are also certain other constructs that make a\nview non-updatable.\n\nThe WITH CHECK OPTION clause can be given for an updatable view to\nprevent inserts or updates to rows except those for which the WHERE\nclause in the select_statement is true.\n\nIn a WITH CHECK OPTION clause for an updatable view, the LOCAL and\nCASCADED keywords determine the scope of check testing when the view is\ndefined in terms of another view. The LOCAL keyword restricts the CHECK\nOPTION only to the view being defined. CASCADED causes the checks for\nunderlying views to be evaluated as well. When neither keyword is\ngiven, the default is CASCADED.\n\nFor more information about updatable views and the WITH CHECK OPTION\nclause, see\nhttp://dev.mysql.com/doc/refman/5.1/en/view-updatability.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-view.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-view.html'),
(447, 'TRIM', 36, 'Syntax:\nTRIM([{BOTH | LEADING | TRAILING} [remstr] FROM] str), TRIM([remstr\nFROM] str)\n\nReturns the string str with all remstr prefixes or suffixes removed. If\nnone of the specifiers BOTH, LEADING, or TRAILING is given, BOTH is\nassumed. remstr is optional and, if not specified, spaces are removed.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT TRIM(''  bar   '');\n        -> ''bar''\nmysql> SELECT TRIM(LEADING ''x'' FROM ''xxxbarxxx'');\n        -> ''barxxx''\nmysql> SELECT TRIM(BOTH ''x'' FROM ''xxxbarxxx'');\n        -> ''bar''\nmysql> SELECT TRIM(TRAILING ''xyz'' FROM ''barxxyz'');\n        -> ''barx''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(448, 'IS', 18, 'Syntax:\nIS boolean_value\n\nTests a value against a boolean value, where boolean_value can be TRUE,\nFALSE, or UNKNOWN.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 1 IS TRUE, 0 IS FALSE, NULL IS UNKNOWN;\n        -> 1, 1, 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(449, 'GET_FORMAT', 31, 'Syntax:\nGET_FORMAT({DATE|TIME|DATETIME}, {''EUR''|''USA''|''JIS''|''ISO''|''INTERNAL''})\n\nReturns a format string. This function is useful in combination with\nthe DATE_FORMAT() and the STR_TO_DATE() functions.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT DATE_FORMAT(''2003-10-03'',GET_FORMAT(DATE,''EUR''));\n        -> ''03.10.2003''\nmysql> SELECT STR_TO_DATE(''10.31.2003'',GET_FORMAT(DATE,''USA''));\n        -> ''2003-10-31''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(450, 'TINYBLOB', 21, 'TINYBLOB\n\nA BLOB column with a maximum length of 255 (28 - 1) bytes. Each\nTINYBLOB value is stored using a one-byte length prefix that indicates\nthe number of bytes in the value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(451, 'SAVEPOINT', 8, 'Syntax:\nSAVEPOINT identifier\nROLLBACK [WORK] TO [SAVEPOINT] identifier\nRELEASE SAVEPOINT identifier\n\nInnoDB supports the SQL statements SAVEPOINT, ROLLBACK TO SAVEPOINT,\nRELEASE SAVEPOINT and the optional WORK keyword for ROLLBACK.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/savepoint.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/savepoint.html'),
(452, 'USER', 15, 'Syntax:\nUSER()\n\nReturns the current MySQL username and hostname as a string in the utf8\ncharacter set.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT USER();\n        -> ''davida@localhost''\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(453, 'ALTER TABLE', 38, 'Syntax:\nALTER [ONLINE | OFFLINE] [IGNORE] TABLE tbl_name\n    alter_specification [, alter_specification] ...\n\nalter_specification:\n    table_option ...\n  | ADD [COLUMN] col_name column_definition\n        [FIRST | AFTER col_name ]\n  | ADD [COLUMN] (col_name column_definition,...)\n  | ADD {INDEX|KEY} [index_name]\n        [index_type] (index_col_name,...) [index_option] ...\n  | ADD [CONSTRAINT [symbol]] PRIMARY KEY\n        [index_type] (index_col_name,...) [index_option] ...\n  | ADD [CONSTRAINT [symbol]]\n        UNIQUE [INDEX|KEY] [index_name]\n        [index_type] (index_col_name,...) [index_option] ...\n  | ADD FULLTEXT [INDEX|KEY] [index_name]\n        (index_col_name,...) [index_option] ...\n  | ADD SPATIAL [INDEX|KEY] [index_name]\n        (index_col_name,...) [index_option] ...\n  | ADD [CONSTRAINT [symbol]]\n        FOREIGN KEY [index_name] (index_col_name,...)\n        reference_definition\n  | ALTER [COLUMN] col_name {SET DEFAULT literal | DROP DEFAULT}\n  | CHANGE [COLUMN] old_col_name new_col_name column_definition\n        [FIRST|AFTER col_name]\n  | MODIFY [COLUMN] col_name column_definition\n        [FIRST | AFTER col_name]\n  | DROP [COLUMN] col_name\n  | DROP PRIMARY KEY\n  | DROP {INDEX|KEY} index_name\n  | DROP FOREIGN KEY fk_symbol\n  | DISABLE KEYS\n  | ENABLE KEYS\n  | RENAME [TO] new_tbl_name\n  | ORDER BY col_name [, col_name] ...\n  | CONVERT TO CHARACTER SET charset_name [COLLATE collation_name]\n  | [DEFAULT] CHARACTER SET [=] charset_name [COLLATE [=] collation_name]\n  | DISCARD TABLESPACE\n  | IMPORT TABLESPACE\n  | partition_options\n  | ADD PARTITION (partition_definition)\n  | DROP PARTITION partition_names\n  | COALESCE PARTITION number\n  | REORGANIZE PARTITION partition_names INTO (partition_definitions)\n  | ANALYZE PARTITION partition_names\n  | CHECK PARTITION partition_names\n  | OPTIMIZE PARTITION partition_names\n  | REBUILD PARTITION partition_names\n  | REPAIR PARTITION partition_names\n  | REMOVE PARTITIONING\n\nindex_col_name:\n    col_name [(length)] [ASC | DESC]\n\nindex_type:\n    USING {BTREE | HASH | RTREE}\n\nindex_option:\n    KEY_BLOCK_SIZE [=] value\n  | index_type\n  | WITH PARSER parser_name\n  | COMMENT ''string''\n\nALTER TABLE enables you to change the structure of an existing table.\nFor example, you can add or delete columns, create or destroy indexes,\nchange the type of existing columns, or rename columns or the table\nitself. You can also change the comment for the table and type of the\ntable.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/alter-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/alter-table.html'),
(454, 'MPOINTFROMWKB', 32, 'MPointFromWKB(wkb[,srid]), MultiPointFromWKB(wkb[,srid])\n\nConstructs a MULTIPOINT value using its WKB representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions'),
(455, 'CHAR BYTE', 21, 'The CHAR BYTE data type is an alias for the BINARY data type. This is a\ncompatibility feature.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(456, 'REPAIR TABLE', 20, 'Syntax:\nREPAIR [LOCAL | NO_WRITE_TO_BINLOG] TABLE\n    tbl_name [, tbl_name] ... [QUICK] [EXTENDED] [USE_FRM]\n\nREPAIR TABLE repairs a possibly corrupted table. By default, it has the\nsame effect as myisamchk --recover tbl_name. REPAIR TABLE works for\nMyISAM and for ARCHIVE tables. Starting with MySQL 5.1.9, REPAIR is\nalso valid for CSV tables. See\nhttp://dev.mysql.com/doc/refman/5.1/en/myisam-storage-engine.html, and\nhttp://dev.mysql.com/doc/refman/5.1/en/archive-storage-engine.html, and\nhttp://dev.mysql.com/doc/refman/5.1/en/csv-storage-engine.html\n\nThis statement requires SELECT and INSERT privileges for the table.\n\nREPAIR TABLE is not supported for partitioned tables. See\nhttp://dev.mysql.com/doc/refman/5.1/en/partitioning-maintenance.html,\nfor information about alternatives.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/repair-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/repair-table.html'),
(457, 'MERGE', 38, 'The MERGE storage engine, also known as the MRG_MyISAM engine, is a\ncollection of identical MyISAM tables that can be used as one.\n"Identical" means that all tables have identical column and index\ninformation. You cannot merge MyISAM tables in which the columns are\nlisted in a different order, do not have exactly the same columns, or\nhave the indexes in different order. However, any or all of the MyISAM\ntables can be compressed with myisampack. See\nhttp://dev.mysql.com/doc/refman/5.1/en/myisampack.html. Differences in\ntable options such as AVG_ROW_LENGTH, MAX_ROWS, or PACK_KEYS do not\nmatter.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/merge-storage-engine.html\n\n', 'mysql> CREATE TABLE t1 (\n    ->    a INT NOT NULL AUTO_INCREMENT PRIMARY KEY,\n    ->    message CHAR(20)) ENGINE=MyISAM;\nmysql> CREATE TABLE t2 (\n    ->    a INT NOT NULL AUTO_INCREMENT PRIMARY KEY,\n    ->    message CHAR(20)) ENGINE=MyISAM;\nmysql> INSERT INTO t1 (message) VALUES (''Testing''),(''table''),(''t1'');\nmysql> INSERT INTO t2 (message) VALUES (''Testing''),(''table''),(''t2'');\nmysql> CREATE TABLE total (\n    ->    a INT NOT NULL AUTO_INCREMENT,\n    ->    message CHAR(20), INDEX(a))\n    ->    ENGINE=MERGE UNION=(t1,t2) INSERT_METHOD=LAST;\n', 'http://dev.mysql.com/doc/refman/5.1/en/merge-storage-engine.html'),
(458, 'CREATE TABLE', 38, 'Syntax:\nCREATE [TEMPORARY] TABLE [IF NOT EXISTS] tbl_name\n    (create_definition,...)\n    [table_option] ...\n    [partition_options]\n\nOr:\n\nCREATE [TEMPORARY] TABLE [IF NOT EXISTS] tbl_name\n    [(create_definition,...)]\n    [table_option] ...\n    [partition_options]\n    select_statement\n\nOr:\n\nCREATE [TEMPORARY] TABLE [IF NOT EXISTS] tbl_name\n    { LIKE old_tbl_name | (LIKE old_tbl_name) }\n\ncreate_definition:\n    col_name column_definition\n  | [CONSTRAINT [symbol]] PRIMARY KEY [index_type] (index_col_name,...)\n      [index_option] ...\n  | {INDEX|KEY} [index_name] [index_type] (index_col_name,...)\n      [index_option] ...\n  | [CONSTRAINT [symbol]] UNIQUE [INDEX|KEY]\n      [index_name] [index_type] (index_col_name,...)\n      [index_option] ...\n  | {FULLTEXT|SPATIAL} [INDEX|KEY] [index_name] (index_col_name,...)\n      [index_option] ...\n  | [CONSTRAINT [symbol]] FOREIGN KEY\n      [index_name] (index_col_name,...) reference_definition\n  | CHECK (expr)\n\ncolumn_definition:\n    data_type [NOT NULL | NULL] [DEFAULT default_value]\n      [AUTO_INCREMENT] [UNIQUE [KEY] | [PRIMARY] KEY]\n      [COMMENT ''string''] [reference_definition]\n      [COLUMN_FORMAT {FIXED|DYNAMIC|DEFAULT}]\n      [STORAGE {DISK|MEMORY|DEFAULT}]\n\ndata_type:\n    BIT[(length)]\n  | TINYINT[(length)] [UNSIGNED] [ZEROFILL]\n  | SMALLINT[(length)] [UNSIGNED] [ZEROFILL]\n  | MEDIUMINT[(length)] [UNSIGNED] [ZEROFILL]\n  | INT[(length)] [UNSIGNED] [ZEROFILL]\n  | INTEGER[(length)] [UNSIGNED] [ZEROFILL]\n  | BIGINT[(length)] [UNSIGNED] [ZEROFILL]\n  | REAL[(length,decimals)] [UNSIGNED] [ZEROFILL]\n  | DOUBLE[(length,decimals)] [UNSIGNED] [ZEROFILL]\n  | FLOAT[(length,decimals)] [UNSIGNED] [ZEROFILL]\n  | DECIMAL[(length[,decimals])] [UNSIGNED] [ZEROFILL]\n  | NUMERIC[(length[,decimals])] [UNSIGNED] [ZEROFILL]\n  | DATE\n  | TIME\n  | TIMESTAMP\n  | DATETIME\n  | YEAR\n  | CHAR[(length)]\n      [CHARACTER SET charset_name] [COLLATE collation_name]\n  | VARCHAR(length)\n      [CHARACTER SET charset_name] [COLLATE collation_name]\n  | BINARY[(length)]\n  | VARBINARY(length)\n  | TINYBLOB\n  | BLOB\n  | MEDIUMBLOB\n  | LONGBLOB\n  | TINYTEXT [BINARY]\n      [CHARACTER SET charset_name] [COLLATE collation_name]\n  | TEXT [BINARY]\n      [CHARACTER SET charset_name] [COLLATE collation_name]\n  | MEDIUMTEXT [BINARY]\n      [CHARACTER SET charset_name] [COLLATE collation_name]\n  | LONGTEXT [BINARY]\n      [CHARACTER SET charset_name] [COLLATE collation_name]\n  | ENUM(value1,value2,value3,...)\n      [CHARACTER SET charset_name] [COLLATE collation_name]\n  | SET(value1,value2,value3,...)\n      [CHARACTER SET charset_name] [COLLATE collation_name]\n  | spatial_type\n\nindex_col_name:\n    col_name [(length)] [ASC | DESC]\n\nindex_type:\n    USING {BTREE | HASH | RTREE}\n\nindex_option:\n    KEY_BLOCK_SIZE [=] value\n  | index_type\n  | WITH PARSER parser_name\n\nreference_definition:\n    REFERENCES tbl_name (index_col_name,...)\n      [MATCH FULL | MATCH PARTIAL | MATCH SIMPLE]\n      [ON DELETE reference_option]\n      [ON UPDATE reference_option]\n\nreference_option:\n    RESTRICT | CASCADE | SET NULL | NO ACTION\n\ntable_option:    \n    ENGINE [=] engine_name\n  | AUTO_INCREMENT [=] value\n  | AVG_ROW_LENGTH [=] value\n  | [DEFAULT] CHARACTER SET [=] charset_name\n  | CHECKSUM [=] {0 | 1}\n  | [DEFAULT] COLLATE [=] collation_name\n  | COMMENT [=] ''string''\n  | CONNECTION [=] ''connect_string''\n  | DATA DIRECTORY [=] ''absolute path to directory''\n  | DELAY_KEY_WRITE [=] {0 | 1}\n  | INDEX DIRECTORY [=] ''absolute path to directory''\n  | INSERT_METHOD [=] { NO | FIRST | LAST }\n  | KEY_BLOCK_SIZE [=] value\n  | MAX_ROWS [=] value\n  | MIN_ROWS [=] value\n  | PACK_KEYS [=] {0 | 1 | DEFAULT}\n  | PASSWORD [=] ''string''\n  | ROW_FORMAT [=] {DEFAULT|DYNAMIC|FIXED|COMPRESSED|REDUNDANT|COMPACT}\n  | TABLESPACE tablespace_name [STORAGE {DISK|MEMORY|DEFAULT}]\n  | UNION [=] (tbl_name[,tbl_name]...)\n\npartition_options:\n    PARTITION BY\n        { [LINEAR] HASH(expr)\n        | [LINEAR] KEY(column_list)\n        | RANGE(expr)\n        | LIST(expr) }\n    [PARTITIONS num]\n    [SUBPARTITION BY\n        { [LINEAR] HASH(expr)\n        | [LINEAR] KEY(column_list) }\n      [SUBPARTITIONS num]\n    ]\n    [(partition_definition [, partition_definition] ...)]\n\npartition_definition:\n    PARTITION partition_name\n        [VALUES {LESS THAN {(expr) | MAXVALUE} | IN (value_list)}]\n        [[STORAGE] ENGINE [=] engine_name]\n        [COMMENT [=] ''comment_text'' ]\n        [DATA DIRECTORY [=] ''data_dir'']\n        [INDEX DIRECTORY [=] ''index_dir'']\n        [MAX_ROWS [=] max_number_of_rows]\n        [MIN_ROWS [=] min_number_of_rows]\n        [TABLESPACE [=] tablespace_name]\n        [NODEGROUP [=] node_group_id]\n        [(subpartition_definition [, subpartition_definition] ...)]\n\nsubpartition_definition:\n    SUBPARTITION logical_name\n        [[STORAGE] ENGINE [=] engine_name]\n        [COMMENT [=] ''comment_text'' ]\n        [DATA DIRECTORY [=] ''data_dir'']\n        [INDEX DIRECTORY [=] ''index_dir'']\n        [MAX_ROWS [=] max_number_of_rows]\n        [MIN_ROWS [=] min_number_of_rows]\n        [TABLESPACE [=] tablespace_name]\n        [NODEGROUP [=] node_group_id]\n\nselect_statement:\n    [IGNORE | REPLACE] [AS] SELECT ...   (Some legal select statement)\n\nCREATE TABLE creates a table with the given name. You must have the\nCREATE privilege for the table.\n\nRules for allowable table names are given in\nhttp://dev.mysql.com/doc/refman/5.1/en/identifiers.html. By default,\nthe table is created in the default database. An error occurs if the\ntable exists, if there is no default database, or if the database does\nnot exist.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/create-table.html'),
(459, '>', 18, 'Syntax:\n>\n\nGreater than:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT 2 > 2;\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(460, 'ANALYZE TABLE', 20, 'Syntax:\nANALYZE [LOCAL | NO_WRITE_TO_BINLOG] TABLE tbl_name [, tbl_name] ...\n\nANALYZE TABLE analyzes and stores the key distribution for a table.\nDuring the analysis, the table is locked with a read lock for MyISAM.\nFor InnoDB the table is locked with a write lock. This statement works\nwith MyISAM, and InnoDB tables. For MyISAM tables, this statement is\nequivalent to using myisamchk --analyze.\n\nFor more information on how the analysis works within InnoDB, see\nhttp://dev.mysql.com/doc/refman/5.1/en/innodb-restrictions.html.\n\nMySQL uses the stored key distribution to decide the order in which\ntables should be joined when you perform a join on something other than\na constant. In addition, key distributions can be used when deciding\nwhich indexes to use for a specific table within a query.\n\nThis statement requires SELECT and INSERT privileges for the table.\n\nANALYZE TABLE is not supported for partitioned tables.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/analyze-table.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/analyze-table.html'),
(461, 'MICROSECOND', 31, 'Syntax:\nMICROSECOND(expr)\n\nReturns the microseconds from the time or datetime expression expr as a\nnumber in the range from 0 to 999999.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT MICROSECOND(''12:00:00.123456'');\n        -> 123456\nmysql> SELECT MICROSECOND(''2009-12-31 23:59:59.000010'');\n        -> 10\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(462, 'CONSTRAINT', 38, 'InnoDB supports foreign key constraints. The syntax for a foreign key\nconstraint definition in InnoDB looks like this:\n\n[CONSTRAINT [symbol]] FOREIGN KEY\n    [index_name] (index_col_name, ...)\n    REFERENCES tbl_name (index_col_name,...)\n    [ON DELETE reference_option]\n    [ON UPDATE reference_option]\n\nreference_option:\n    RESTRICT | CASCADE | SET NULL | NO ACTION\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/innodb-foreign-key-constraints.html\n\n', 'CREATE TABLE product (category INT NOT NULL, id INT NOT NULL,\n                      price DECIMAL,\n                      PRIMARY KEY(category, id)) ENGINE=INNODB;\nCREATE TABLE customer (id INT NOT NULL,\n                       PRIMARY KEY (id)) ENGINE=INNODB;\nCREATE TABLE product_order (no INT NOT NULL AUTO_INCREMENT,\n                            product_category INT NOT NULL,\n                            product_id INT NOT NULL,\n                            customer_id INT NOT NULL,\n                            PRIMARY KEY(no),\n                            INDEX (product_category, product_id),\n                            FOREIGN KEY (product_category, product_id)\n                              REFERENCES product(category, id)\n                              ON UPDATE CASCADE ON DELETE RESTRICT,\n                            INDEX (customer_id),\n                            FOREIGN KEY (customer_id)\n                              REFERENCES customer(id)) ENGINE=INNODB;\n', 'http://dev.mysql.com/doc/refman/5.1/en/innodb-foreign-key-constraints.html');
INSERT INTO `help_topic` (`help_topic_id`, `name`, `help_category_id`, `description`, `example`, `url`) VALUES
(463, 'CREATE SERVER', 38, 'Syntax:\nCREATE SERVER server_name\n    FOREIGN DATA WRAPPER wrapper_name\n    OPTIONS (option [, option] ...)\n\noption:\n  { HOST character-literal\n  | DATABASE character-literal\n  | USER character-literal\n  | PASSWORD character-literal\n  | SOCKET character-literal\n  | OWNER character-literal\n  | PORT numeric-literal }\n\nThis statement creates the definition of a server for use with the\nFEDERATED storage engine. The CREATE SERVER statement creates a new row\nwithin the servers table within the mysql database. This statement\nrequires the SUPER privilege.\n\nThe server_name should be a unique reference to the server. Server\ndefinitions are global within the scope of the server, it is not\npossible to qualify the server definition to a specific database.\nserver_name has a maximum length of 64 characters (names longer than 64\ncharacters are silently truncated), and is case insensitive. You may\nspecify the name as a quoted string.\n\nThe wrapper_name should be mysql, and may be quoted with single quotes.\nOther values for wrapper_name are not currently supported.\n\nFor each option you must specify either a character literal or numeric\nliteral. Character literals are UTF-8, support a maximum length of 64\ncharacters and default to a blank (empty) string. String literals are\nsilently truncated to 64 characters. Numeric literals must be a number\nbetween 0 and 9999, default value is 0.\n\n*Note*: Note that the OWNER option is currently not applied, and has no\neffect on the ownership or operation of the server connection that is\ncreated.\n\nThe CREATE SERVER statement creates an entry in the mysql.server table\nthat can later be used with the CREATE TABLE statement when creating a\nFEDERATED table. The options that you specify will be used to populate\nthe columns in the mysql.server table. The table columns are\nServer_name, Host, Db, Username, Password, Port and Socket.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/create-server.html\n\n', 'CREATE SERVER s\nFOREIGN DATA WRAPPER mysql\nOPTIONS (USER ''Remote'', HOST ''192.168.1.106'', DATABASE ''test'');\n', 'http://dev.mysql.com/doc/refman/5.1/en/create-server.html'),
(464, 'FIELD', 36, 'Syntax:\nFIELD(str,str1,str2,str3,...)\n\nReturns the index (position) of str in the str1, str2, str3, ... list.\nReturns 0 if str is not found.\n\nIf all arguments to FIELD() are strings, all arguments are compared as\nstrings. If all arguments are numbers, they are compared as numbers.\nOtherwise, the arguments are compared as double.\n\nIf str is NULL, the return value is 0 because NULL fails equality\ncomparison with any value. FIELD() is the complement of ELT().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT FIELD(''ej'', ''Hej'', ''ej'', ''Heja'', ''hej'', ''foo'');\n        -> 2\nmysql> SELECT FIELD(''fo'', ''Hej'', ''ej'', ''Heja'', ''hej'', ''foo'');\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(465, 'MAKETIME', 31, 'Syntax:\nMAKETIME(hour,minute,second)\n\nReturns a time value calculated from the hour, minute, and second\narguments.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT MAKETIME(12,15,30);\n        -> ''12:15:30''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(466, 'CURDATE', 31, 'Syntax:\nCURDATE()\n\nReturns the current date as a value in ''YYYY-MM-DD'' or YYYYMMDD format,\ndepending on whether the function is used in a string or numeric\ncontext.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT CURDATE();\n        -> ''2008-06-13''\nmysql> SELECT CURDATE() + 0;\n        -> 20080613\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(467, 'SET PASSWORD', 9, 'Syntax:\nSET PASSWORD [FOR user] =\n    {\n        PASSWORD(''some password'')\n      | OLD_PASSWORD(''some password'')\n      | ''encrypted password''\n    }\n\nThe SET PASSWORD statement assigns a password to an existing MySQL user\naccount.\n\nIf the password is specified using the PASSWORD() or OLD_PASSWORD()\nfunction, the literal text of the password should be given. If the\npassword is specified without using either function, the password\nshould be the already-encrypted password value as returned by\nPASSWORD().\n\nWith no FOR clause, this statement sets the password for the current\nuser. Any client that has connected to the server using a non-anonymous\naccount can change the password for that account.\n\nWith a FOR clause, this statement sets the password for a specific\naccount on the current server host. Only clients that have the UPDATE\nprivilege for the mysql database can do this. The user value should be\ngiven in user_name@host_name format, where user_name and host_name are\nexactly as they are listed in the User and Host columns of the\nmysql.user table entry. For example, if you had an entry with User and\nHost column values of ''bob'' and ''%.loc.gov'', you would write the\nstatement like this:\n\nSET PASSWORD FOR ''bob''@''%.loc.gov'' = PASSWORD(''newpass'');\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/set-password.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/set-password.html'),
(468, 'ALTER TABLESPACE', 38, 'Syntax:\nALTER TABLESPACE tablespace_name\n    {ADD|DROP} DATAFILE ''file_name''\n    [INITIAL_SIZE [=] size]\n    [WAIT]\n    ENGINE [=] engine_name\n\nThis statement can be used either to add a new data file, or to drop a\ndata file from a tablespace.\n\nThe ADD DATAFILE variant allows you to specify an initial size using an\nINITIAL_SIZE clause, where size is measured in bytes; the default value\nis 128M (128 megabytes). You may optionally follow this integer value\nwith a one-letter abbreviation for an order of magnitude, similar to\nthose used in my.cnf. Generally, this is one of the letters M (for\nmegabytes) or G (for gigabytes).\n\nOn 32-bit systems, the maximum supported value for INITIAL_SIZE is 4G.\n(Bug#29186 (http://bugs.mysql.com/29186))\n\nOnce a data file has been created, its size cannot be changed; however,\nyou can add more data files to the tablespace using additional ALTER\nTABLESPACE ... ADD DATAFILE statements.\n\nUsing DROP DATAFILE with ALTER TABLESPACE drops the data file\n''file_name'' from the tablespace. This file must already have been added\nto the tablespace using CREATE TABLESPACE or ALTER TABLESPACE;\notherwise an error will result.\n\nBoth ALTER TABLESPACE ... ADD DATAFILE and ALTER TABLESPACE ... DROP\nDATAFILE require an ENGINE clause which specifies the storage engine\nused by the tablespace. In MySQL 5.1, the only accepted values for\nengine_name are NDB and NDBCLUSTER.\n\nWAIT is parsed but otherwise ignored, and so has no effect in MySQL\n5.1. It is intended for future expansion.\n\nWhen ALTER TABLESPACE ... ADD DATAFILE is used with ENGINE = NDB, a\ndata file is created on each Cluster data node. You can verify that the\ndata files were created and obtain information about them by querying\nthe INFORMATION_SCHEMA.FILES table. For example, the following query\nshows all data files belonging to the tablespace named newts:\n\nmysql> SELECT LOGFILE_GROUP_NAME, FILE_NAME, EXTRA \n    -> FROM INFORMATION_SCHEMA.FILES\n    -> WHERE TABLESPACE_NAME = ''newts'' AND FILE_TYPE = ''DATAFILE'';\n+--------------------+--------------+----------------+\n| LOGFILE_GROUP_NAME | FILE_NAME    | EXTRA          |\n+--------------------+--------------+----------------+\n| lg_3               | newdata.dat  | CLUSTER_NODE=3 |\n| lg_3               | newdata.dat  | CLUSTER_NODE=4 |\n| lg_3               | newdata2.dat | CLUSTER_NODE=3 |\n| lg_3               | newdata2.dat | CLUSTER_NODE=4 |\n+--------------------+--------------+----------------+\n2 rows in set (0.03 sec)\n\nSee http://dev.mysql.com/doc/refman/5.1/en/files-table.html.\n\nALTER TABLESPACE was added in MySQL 5.1.6. In MySQL 5.1, it is useful\nonly with Disk Data storage for MySQL Cluster. See\nhttp://dev.mysql.com/doc/refman/5.1/en/mysql-cluster-disk-data.html.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/alter-tablespace.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/alter-tablespace.html'),
(469, 'ENUM', 21, 'ENUM(''value1'',''value2'',...) [CHARACTER SET charset_name] [COLLATE\ncollation_name]\n\nAn enumeration. A string object that can have only one value, chosen\nfrom the list of values ''value1'', ''value2'', ..., NULL or the special ''''\nerror value. An ENUM column can have a maximum of 65,535 distinct\nvalues. ENUM values are represented internally as integers.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(470, 'IF FUNCTION', 7, 'Syntax:\nIF(expr1,expr2,expr3)\n\nIf expr1 is TRUE (expr1 <> 0 and expr1 <> NULL) then IF() returns\nexpr2; otherwise it returns expr3. IF() returns a numeric or string\nvalue, depending on the context in which it is used.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html\n\n', 'mysql> SELECT IF(1>2,2,3);\n        -> 3\nmysql> SELECT IF(1<2,''yes'',''no'');\n        -> ''yes''\nmysql> SELECT IF(STRCMP(''test'',''test1''),''no'',''yes'');\n        -> ''no''\n', 'http://dev.mysql.com/doc/refman/5.1/en/control-flow-functions.html'),
(471, 'DATABASE', 15, 'Syntax:\nDATABASE()\n\nReturns the default (current) database name as a string in the utf8\ncharacter set. If there is no default database, DATABASE() returns\nNULL. Within a stored routine, the default database is the database\nthat the routine is associated with, which is not necessarily the same\nas the database that is the default in the calling context.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT DATABASE();\n        -> ''test''\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(472, 'POINTFROMWKB', 32, 'PointFromWKB(wkb[,srid])\n\nConstructs a POINT value using its WKB representation and SRID.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/creating-spatial-values.html#gis-wkb-functions'),
(473, 'POWER', 4, 'Syntax:\nPOWER(X,Y)\n\nThis is a synonym for POW().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(474, 'ATAN', 4, 'Syntax:\nATAN(X)\n\nReturns the arc tangent of X, that is, the value whose tangent is X.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT ATAN(2);\n        -> 1.1071487177941\nmysql> SELECT ATAN(-2);\n        -> -1.1071487177941\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(475, 'STRCMP', 36, 'Syntax:\nSTRCMP(expr1,expr2)\n\nSTRCMP() returns 0 if the strings are the same, -1 if the first\nargument is smaller than the second according to the current sort\norder, and 1 otherwise.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html\n\n', 'mysql> SELECT STRCMP(''text'', ''text2'');\n        -> -1\nmysql> SELECT STRCMP(''text2'', ''text'');\n        -> 1\nmysql> SELECT STRCMP(''text'', ''text'');\n        -> 0\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-comparison-functions.html'),
(476, 'INSERT DELAYED', 27, 'Syntax:\nINSERT DELAYED ...\n\nThe DELAYED option for the INSERT statement is a MySQL extension to\nstandard SQL that is very useful if you have clients that cannot or\nneed not wait for the INSERT to complete. This is a common situation\nwhen you use MySQL for logging and you also periodically run SELECT and\nUPDATE statements that take a long time to complete.\n\nWhen a client uses INSERT DELAYED, it gets an okay from the server at\nonce, and the row is queued to be inserted when the table is not in use\nby any other thread.\n\nAnother major benefit of using INSERT DELAYED is that inserts from many\nclients are bundled together and written in one block. This is much\nfaster than performing many separate inserts.\n\nNote that INSERT DELAYED is slower than a normal INSERT if the table is\nnot otherwise in use. There is also the additional overhead for the\nserver to handle a separate thread for each table for which there are\ndelayed rows. This means that you should use INSERT DELAYED only when\nyou are really sure that you need it.\n\nThe queued rows are held only in memory until they are inserted into\nthe table. This means that if you terminate mysqld forcibly (for\nexample, with kill -9) or if mysqld dies unexpectedly, any queued rows\nthat have not been written to disk are lost.\n\nThere are some constraints on the use of DELAYED:\n\no INSERT DELAYED works only with MyISAM, MEMORY, ARCHIVE, and (as of\n  MySQL 5.1.19) BLACKHOLE tables. See\n  http://dev.mysql.com/doc/refman/5.1/en/myisam-storage-engine.html,\n  http://dev.mysql.com/doc/refman/5.1/en/memory-storage-engine.html,\n  http://dev.mysql.com/doc/refman/5.1/en/archive-storage-engine.html,\n  and\n  http://dev.mysql.com/doc/refman/5.1/en/blackhole-storage-engine.html.\n\no For MyISAM tables, if there are no free blocks in the middle of the\n  data file, concurrent SELECT and INSERT statements are supported.\n  Under these circumstances, you very seldom need to use INSERT DELAYED\n  with MyISAM.\n\no INSERT DELAYED should be used only for INSERT statements that specify\n  value lists. The server ignores DELAYED for INSERT ... SELECT or\n  INSERT ... ON DUPLICATE KEY UPDATE statements.\n\no Because the INSERT DELAYED statement returns immediately, before the\n  rows are inserted, you cannot use LAST_INSERT_ID() to get the\n  AUTO_INCREMENT value that the statement might generate.\n\no DELAYED rows are not visible to SELECT statements until they actually\n  have been inserted.\n\no DELAYED is ignored on slave replication servers, so that INSERT\n  DELAYED is treated as a normal INSERT on slaves. This is because\n  DELAYED could cause the slave to have different data than the master.\n\no Pending INSERT DELAYED statements are lost if a table is write locked\n  and ALTER TABLE is used to modify the table structure.\n\no INSERT DELAYED is not supported for views.\n\no INSERT DELAYED is not supported for partitioned tables.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/insert-delayed.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/insert-delayed.html'),
(477, 'SHOW PROCEDURE CODE', 27, 'Syntax:\nSHOW {PROCEDURE | FUNCTION} CODE sp_name\n\nThese statements are MySQL extensions that are available only for\nservers that have been built with debugging support. They display a\nrepresentation of the internal implementation of the named routine. The\nstatements require that you be the owner of the routine or have SELECT\naccess to the mysql.proc table.\n\nIf the named routine is available, each statement produces a result\nset. Each row in the result set corresponds to one "instruction" in the\nroutine. The first column is Pos, which is an ordinal number beginning\nwith 0. The second column is Instruction, which contains an SQL\nstatement (usually changed from the original source), or a directive\nwhich has meaning only to the stored-routine handler.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-procedure-code.html\n\n', 'mysql> DELIMITER //\nmysql> CREATE PROCEDURE p1 ()\n    -> BEGIN\n    ->   DECLARE fanta INT DEFAULT 55;\n    ->   DROP TABLE t2;\n    ->   LOOP\n    ->     INSERT INTO t3 VALUES (fanta);\n    ->     END LOOP;\n    ->   END//\nQuery OK, 0 rows affected (0.00 sec)\n\nmysql> SHOW PROCEDURE CODE p1//\n+-----+----------------------------------------+\n| Pos | Instruction                            |\n+-----+----------------------------------------+\n|   0 | set fanta@0 55                         |\n|   1 | stmt 9 "DROP TABLE t2"                 |\n|   2 | stmt 5 "INSERT INTO t3 VALUES (fanta)" |\n|   3 | jump 2                                 |\n+-----+----------------------------------------+\n4 rows in set (0.00 sec)\n', 'http://dev.mysql.com/doc/refman/5.1/en/show-procedure-code.html'),
(478, 'MEDIUMTEXT', 21, 'MEDIUMTEXT [CHARACTER SET charset_name] [COLLATE collation_name]\n\nA TEXT column with a maximum length of 16,777,215 (224 - 1) characters.\nThe effective maximum length is less if the value contains multi-byte\ncharacters. Each MEDIUMTEXT value is stored using a three-byte length\nprefix that indicates the number of bytes in the value.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/string-type-overview.html'),
(479, 'LN', 4, 'Syntax:\nLN(X)\n\nReturns the natural logarithm of X; that is, the base-e logarithm of X.\nIf X is less than or equal to 0, then NULL is returned.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT LN(2);\n        -> 0.69314718055995\nmysql> SELECT LN(-2);\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(480, 'RETURN', 23, 'Syntax:\nRETURN expr\n\nThe RETURN statement terminates execution of a stored function and\nreturns the value expr to the function caller. There must be at least\none RETURN statement in a stored function. There may be more than one\nif the function has multiple exit points.\n\nThis statement is not used in stored procedures, triggers, or events.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/return.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/return.html'),
(481, 'SHOW COLLATION', 27, 'Syntax:\nSHOW COLLATION\n    [LIKE ''pattern'' | WHERE expr]\n\nThe output from SHOW COLLATION includes all available character sets.\nThe LIKE clause, if present, indicates which collation names to match.\nThe WHERE clause can be given to select rows using more general\nconditions, as discussed in\nhttp://dev.mysql.com/doc/refman/5.1/en/extended-show.html. For example:\n\nmysql> SHOW COLLATION LIKE ''latin1%'';\n+-------------------+---------+----+---------+----------+---------+\n| Collation         | Charset | Id | Default | Compiled | Sortlen |\n+-------------------+---------+----+---------+----------+---------+\n| latin1_german1_ci | latin1  |  5 |         |          |       0 |\n| latin1_swedish_ci | latin1  |  8 | Yes     | Yes      |       0 |\n| latin1_danish_ci  | latin1  | 15 |         |          |       0 |\n| latin1_german2_ci | latin1  | 31 |         | Yes      |       2 |\n| latin1_bin        | latin1  | 47 |         | Yes      |       0 |\n| latin1_general_ci | latin1  | 48 |         |          |       0 |\n| latin1_general_cs | latin1  | 49 |         |          |       0 |\n| latin1_spanish_ci | latin1  | 94 |         |          |       0 |\n+-------------------+---------+----+---------+----------+---------+\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/show-collation.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/show-collation.html'),
(482, 'LOG', 4, 'Syntax:\nLOG(X), LOG(B,X)\n\nIf called with one parameter, this function returns the natural\nlogarithm of X. If X is less than or equal to 0, then NULL is returned.\n\nThe inverse of this function (when called with a single argument) is\nthe EXP() function.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT LOG(2);\n        -> 0.69314718055995\nmysql> SELECT LOG(-2);\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(483, 'SET SQL_LOG_BIN', 27, 'Syntax:\nSET SQL_LOG_BIN = {0|1}\n\nDisables or enables binary logging for the current connection\n(SQL_LOG_BIN is a session variable) if the client has the SUPER\nprivilege. The statement is refused with an error if the client does\nnot have that privilege.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/set-sql-log-bin.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/set-sql-log-bin.html'),
(484, '!=', 18, 'Syntax:\n<>, !=\n\nNot equal:\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT ''.01'' <> ''0.01'';\n        -> 1\nmysql> SELECT .01 <> ''0.01'';\n        -> 0\nmysql> SELECT ''zapp'' <> ''zappp'';\n        -> 1\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(485, 'WHILE', 23, 'Syntax:\n[begin_label:] WHILE search_condition DO\n    statement_list\nEND WHILE [end_label]\n\nThe statement list within a WHILE statement is repeated as long as the\nsearch_condition is true. statement_list consists of one or more\nstatements.\n\nA WHILE statement can be labeled. end_label cannot be given unless\nbegin_label also is present. If both are present, they must be the\nsame.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/while-statement.html\n\n', 'CREATE PROCEDURE dowhile()\nBEGIN\n  DECLARE v1 INT DEFAULT 5;\n\n  WHILE v1 > 0 DO\n    ...\n    SET v1 = v1 - 1;\n  END WHILE;\nEND\n', 'http://dev.mysql.com/doc/refman/5.1/en/while-statement.html'),
(486, 'AES_DECRYPT', 11, 'Syntax:\nAES_DECRYPT(crypt_str,key_str)\n\nThis function allows decryption of data using the official AES\n(Advanced Encryption Standard) algorithm. For more information, see the\ndescription of AES_ENCRYPT().\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/encryption-functions.html'),
(487, 'DAYNAME', 31, 'Syntax:\nDAYNAME(date)\n\nReturns the name of the weekday for date. As of MySQL 5.1.12, the\nlanguage used for the name is controlled by the value of the\nlc_time_names system variable\n(http://dev.mysql.com/doc/refman/5.1/en/locale-support.html).\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html\n\n', 'mysql> SELECT DAYNAME(''2007-02-03'');\n        -> ''Saturday''\n', 'http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html'),
(488, 'COERCIBILITY', 15, 'Syntax:\nCOERCIBILITY(str)\n\nReturns the collation coercibility value of the string argument.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT COERCIBILITY(''abc'' COLLATE latin1_swedish_ci);\n        -> 0\nmysql> SELECT COERCIBILITY(USER());\n        -> 3\nmysql> SELECT COERCIBILITY(''abc'');\n        -> 4\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(489, 'INT', 21, 'INT[(M)] [UNSIGNED] [ZEROFILL]\n\nA normal-size integer. The signed range is -2147483648 to 2147483647.\nThe unsigned range is 0 to 4294967295.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html\n\n', '', 'http://dev.mysql.com/doc/refman/5.1/en/numeric-type-overview.html'),
(490, 'GLENGTH', 12, 'GLength(ls)\n\nReturns as a double-precision number the length of the LineString value\nls in its associated spatial reference.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions\n\n', 'mysql> SET @ls = ''LineString(1 1,2 2,3 3)'';\nmysql> SELECT GLength(GeomFromText(@ls));\n+----------------------------+\n| GLength(GeomFromText(@ls)) |\n+----------------------------+\n|            2.8284271247462 |\n+----------------------------+\n', 'http://dev.mysql.com/doc/refman/5.1/en/geometry-property-functions.html#linestring-property-functions'),
(491, 'RADIANS', 4, 'Syntax:\nRADIANS(X)\n\nReturns the argument X, converted from degrees to radians. (Note that\nπ radians equals 180 degrees.)\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html\n\n', 'mysql> SELECT RADIANS(90);\n        -> 1.5707963267949\n', 'http://dev.mysql.com/doc/refman/5.1/en/mathematical-functions.html'),
(492, 'COLLATION', 15, 'Syntax:\nCOLLATION(str)\n\nReturns the collation of the string argument.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT COLLATION(''abc'');\n        -> ''latin1_swedish_ci''\nmysql> SELECT COLLATION(_utf8''abc'');\n        -> ''utf8_general_ci''\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(493, 'COALESCE', 18, 'Syntax:\nCOALESCE(value,...)\n\nReturns the first non-NULL value in the list, or NULL if there are no\nnon-NULL values.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html\n\n', 'mysql> SELECT COALESCE(NULL,1);\n        -> 1\nmysql> SELECT COALESCE(NULL,NULL,NULL);\n        -> NULL\n', 'http://dev.mysql.com/doc/refman/5.1/en/comparison-operators.html'),
(494, 'VERSION', 15, 'Syntax:\nVERSION()\n\nReturns a string that indicates the MySQL server version. The string\nuses the utf8 character set.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/information-functions.html\n\n', 'mysql> SELECT VERSION();\n        -> ''5.1.30-standard''\n', 'http://dev.mysql.com/doc/refman/5.1/en/information-functions.html'),
(495, 'MAKE_SET', 36, 'Syntax:\nMAKE_SET(bits,str1,str2,...)\n\nReturns a set value (a string containing substrings separated by ","\ncharacters) consisting of the strings that have the corresponding bit\nin bits set. str1 corresponds to bit 0, str2 to bit 1, and so on. NULL\nvalues in str1, str2, ... are not appended to the result.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT MAKE_SET(1,''a'',''b'',''c'');\n        -> ''a''\nmysql> SELECT MAKE_SET(1 | 4,''hello'',''nice'',''world'');\n        -> ''hello,world''\nmysql> SELECT MAKE_SET(1 | 4,''hello'',''nice'',NULL,''world'');\n        -> ''hello''\nmysql> SELECT MAKE_SET(0,''a'',''b'',''c'');\n        -> ''''\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html'),
(496, 'FIND_IN_SET', 36, 'Syntax:\nFIND_IN_SET(str,strlist)\n\nReturns a value in the range of 1 to N if the string str is in the\nstring list strlist consisting of N substrings. A string list is a\nstring composed of substrings separated by "," characters. If the first\nargument is a constant string and the second is a column of type SET,\nthe FIND_IN_SET() function is optimized to use bit arithmetic. Returns\n0 if str is not in strlist or if strlist is the empty string. Returns\nNULL if either argument is NULL. This function does not work properly\nif the first argument contains a comma (",") character.\n\nURL: http://dev.mysql.com/doc/refman/5.1/en/string-functions.html\n\n', 'mysql> SELECT FIND_IN_SET(''b'',''a,b,c,d'');\n        -> 2\n', 'http://dev.mysql.com/doc/refman/5.1/en/string-functions.html');

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE IF NOT EXISTS `host` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Select_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Insert_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Update_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Delete_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Drop_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Grant_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `References_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Index_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_tmp_table_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Lock_tables_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Show_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Execute_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Trigger_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  PRIMARY KEY (`Host`,`Db`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Host privileges;  Merged with database privileges';

--
-- Dumping data for table `host`
--


-- --------------------------------------------------------

--
-- Table structure for table `ndb_binlog_index`
--

CREATE TABLE IF NOT EXISTS `ndb_binlog_index` (
  `Position` bigint(20) unsigned NOT NULL,
  `File` varchar(255) NOT NULL,
  `epoch` bigint(20) unsigned NOT NULL,
  `inserts` bigint(20) unsigned NOT NULL,
  `updates` bigint(20) unsigned NOT NULL,
  `deletes` bigint(20) unsigned NOT NULL,
  `schemaops` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`epoch`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ndb_binlog_index`
--


-- --------------------------------------------------------

--
-- Table structure for table `plugin`
--

CREATE TABLE IF NOT EXISTS `plugin` (
  `name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `dl` char(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='MySQL plugins';

--
-- Dumping data for table `plugin`
--


-- --------------------------------------------------------

--
-- Table structure for table `proc`
--

CREATE TABLE IF NOT EXISTS `proc` (
  `db` char(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `name` char(64) NOT NULL DEFAULT '',
  `type` enum('FUNCTION','PROCEDURE') NOT NULL,
  `specific_name` char(64) NOT NULL DEFAULT '',
  `language` enum('SQL') NOT NULL DEFAULT 'SQL',
  `sql_data_access` enum('CONTAINS_SQL','NO_SQL','READS_SQL_DATA','MODIFIES_SQL_DATA') NOT NULL DEFAULT 'CONTAINS_SQL',
  `is_deterministic` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `security_type` enum('INVOKER','DEFINER') NOT NULL DEFAULT 'DEFINER',
  `param_list` blob NOT NULL,
  `returns` longblob NOT NULL,
  `body` longblob NOT NULL,
  `definer` char(77) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sql_mode` set('REAL_AS_FLOAT','PIPES_AS_CONCAT','ANSI_QUOTES','IGNORE_SPACE','NOT_USED','ONLY_FULL_GROUP_BY','NO_UNSIGNED_SUBTRACTION','NO_DIR_IN_CREATE','POSTGRESQL','ORACLE','MSSQL','DB2','MAXDB','NO_KEY_OPTIONS','NO_TABLE_OPTIONS','NO_FIELD_OPTIONS','MYSQL323','MYSQL40','ANSI','NO_AUTO_VALUE_ON_ZERO','NO_BACKSLASH_ESCAPES','STRICT_TRANS_TABLES','STRICT_ALL_TABLES','NO_ZERO_IN_DATE','NO_ZERO_DATE','INVALID_DATES','ERROR_FOR_DIVISION_BY_ZERO','TRADITIONAL','NO_AUTO_CREATE_USER','HIGH_NOT_PRECEDENCE','NO_ENGINE_SUBSTITUTION','PAD_CHAR_TO_FULL_LENGTH') NOT NULL DEFAULT '',
  `comment` char(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `character_set_client` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `collation_connection` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `db_collation` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `body_utf8` longblob,
  PRIMARY KEY (`db`,`name`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stored Procedures';

--
-- Dumping data for table `proc`
--


-- --------------------------------------------------------

--
-- Table structure for table `procs_priv`
--

CREATE TABLE IF NOT EXISTS `procs_priv` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(16) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Routine_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Routine_type` enum('FUNCTION','PROCEDURE') COLLATE utf8_bin NOT NULL,
  `Grantor` char(77) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Proc_priv` set('Execute','Alter Routine','Grant') CHARACTER SET utf8 NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Host`,`Db`,`User`,`Routine_name`,`Routine_type`),
  KEY `Grantor` (`Grantor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Procedure privileges';

--
-- Dumping data for table `procs_priv`
--


-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE IF NOT EXISTS `servers` (
  `Server_name` char(64) NOT NULL DEFAULT '',
  `Host` char(64) NOT NULL DEFAULT '',
  `Db` char(64) NOT NULL DEFAULT '',
  `Username` char(64) NOT NULL DEFAULT '',
  `Password` char(64) NOT NULL DEFAULT '',
  `Port` int(4) NOT NULL DEFAULT '0',
  `Socket` char(64) NOT NULL DEFAULT '',
  `Wrapper` char(64) NOT NULL DEFAULT '',
  `Owner` char(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`Server_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='MySQL Foreign Servers table';

--
-- Dumping data for table `servers`
--


-- --------------------------------------------------------

--
-- Table structure for table `slow_log`
--

CREATE TABLE IF NOT EXISTS `slow_log` (
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_host` mediumtext NOT NULL,
  `query_time` time NOT NULL,
  `lock_time` time NOT NULL,
  `rows_sent` int(11) NOT NULL,
  `rows_examined` int(11) NOT NULL,
  `db` varchar(512) NOT NULL,
  `last_insert_id` int(11) NOT NULL,
  `insert_id` int(11) NOT NULL,
  `server_id` int(11) NOT NULL,
  `sql_text` mediumtext NOT NULL
) ENGINE=CSV DEFAULT CHARSET=utf8 COMMENT='Slow log';

--
-- Dumping data for table `slow_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `tables_priv`
--

CREATE TABLE IF NOT EXISTS `tables_priv` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(16) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Table_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Grantor` char(77) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Table_priv` set('Select','Insert','Update','Delete','Create','Drop','Grant','References','Index','Alter','Create View','Show view','Trigger') CHARACTER SET utf8 NOT NULL DEFAULT '',
  `Column_priv` set('Select','Insert','Update','References') CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`Host`,`Db`,`User`,`Table_name`),
  KEY `Grantor` (`Grantor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table privileges';

--
-- Dumping data for table `tables_priv`
--


-- --------------------------------------------------------

--
-- Table structure for table `time_zone`
--

CREATE TABLE IF NOT EXISTS `time_zone` (
  `Time_zone_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Use_leap_seconds` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`Time_zone_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Time zones' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `time_zone`
--


-- --------------------------------------------------------

--
-- Table structure for table `time_zone_leap_second`
--

CREATE TABLE IF NOT EXISTS `time_zone_leap_second` (
  `Transition_time` bigint(20) NOT NULL,
  `Correction` int(11) NOT NULL,
  PRIMARY KEY (`Transition_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Leap seconds information for time zones';

--
-- Dumping data for table `time_zone_leap_second`
--


-- --------------------------------------------------------

--
-- Table structure for table `time_zone_name`
--

CREATE TABLE IF NOT EXISTS `time_zone_name` (
  `Name` char(64) NOT NULL,
  `Time_zone_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Time zone names';

--
-- Dumping data for table `time_zone_name`
--


-- --------------------------------------------------------

--
-- Table structure for table `time_zone_transition`
--

CREATE TABLE IF NOT EXISTS `time_zone_transition` (
  `Time_zone_id` int(10) unsigned NOT NULL,
  `Transition_time` bigint(20) NOT NULL,
  `Transition_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Time_zone_id`,`Transition_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Time zone transitions';

--
-- Dumping data for table `time_zone_transition`
--


-- --------------------------------------------------------

--
-- Table structure for table `time_zone_transition_type`
--

CREATE TABLE IF NOT EXISTS `time_zone_transition_type` (
  `Time_zone_id` int(10) unsigned NOT NULL,
  `Transition_type_id` int(10) unsigned NOT NULL,
  `Offset` int(11) NOT NULL DEFAULT '0',
  `Is_DST` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `Abbreviation` char(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`Time_zone_id`,`Transition_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Time zone transition types';

--
-- Dumping data for table `time_zone_transition_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(16) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Password` char(41) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `Select_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Insert_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Update_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Delete_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Drop_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Reload_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Shutdown_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Process_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `File_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Grant_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `References_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Index_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Show_db_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Super_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_tmp_table_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Lock_tables_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Execute_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Repl_slave_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Repl_client_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Show_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_user_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Event_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Trigger_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `ssl_type` enum('','ANY','X509','SPECIFIED') CHARACTER SET utf8 NOT NULL DEFAULT '',
  `ssl_cipher` blob NOT NULL,
  `x509_issuer` blob NOT NULL,
  `x509_subject` blob NOT NULL,
  `max_questions` int(11) unsigned NOT NULL DEFAULT '0',
  `max_updates` int(11) unsigned NOT NULL DEFAULT '0',
  `max_connections` int(11) unsigned NOT NULL DEFAULT '0',
  `max_user_connections` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`Host`,`User`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and global privileges';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Host`, `User`, `Password`, `Select_priv`, `Insert_priv`, `Update_priv`, `Delete_priv`, `Create_priv`, `Drop_priv`, `Reload_priv`, `Shutdown_priv`, `Process_priv`, `File_priv`, `Grant_priv`, `References_priv`, `Index_priv`, `Alter_priv`, `Show_db_priv`, `Super_priv`, `Create_tmp_table_priv`, `Lock_tables_priv`, `Execute_priv`, `Repl_slave_priv`, `Repl_client_priv`, `Create_view_priv`, `Show_view_priv`, `Create_routine_priv`, `Alter_routine_priv`, `Create_user_priv`, `Event_priv`, `Trigger_priv`, `ssl_type`, `ssl_cipher`, `x509_issuer`, `x509_subject`, `max_questions`, `max_updates`, `max_connections`, `max_user_connections`) VALUES
('localhost', 'root', '', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '', '', '', '', 0, 0, 0, 0),
('127.0.0.1', 'root', '', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '', '', '', '', 0, 0, 0, 0);
--
-- Database: `razel's database`
--
CREATE DATABASE `razel's database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `razel's database`;

-- --------------------------------------------------------

--
-- Table structure for table `access_levels`
--

CREATE TABLE IF NOT EXISTS `access_levels` (
  `access_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_level_name` char(30) NOT NULL,
  PRIMARY KEY (`access_level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `accountability`
--


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
(5, 'Envelope without Stamp'),
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
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `student_number` int(11) NOT NULL,
  `unit_count` float NOT NULL,
  `lab_count` float NOT NULL,
  `nstp` int(1) NOT NULL,
  `non_citizen_fee` float NOT NULL,
  `entrance` float NOT NULL,
  `deposit` float NOT NULL,
  `id_fee` float NOT NULL,
  `in_residence` float NOT NULL,
  `assessment_status` enum('assessed','paid') NOT NULL,
  `assessed_by` int(20) NOT NULL,
  PRIMARY KEY (`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--


-- --------------------------------------------------------

--
-- Table structure for table `assessment_table`
--

CREATE TABLE IF NOT EXISTS `assessment_table` (
  `look_up` char(1) NOT NULL,
  `athletics` float NOT NULL,
  `cultural` float NOT NULL,
  `energy` float NOT NULL,
  `internet` float NOT NULL,
  `library` float NOT NULL,
  `medical` float NOT NULL,
  `registration` float NOT NULL,
  `community_chest` float NOT NULL,
  `publication` float NOT NULL,
  `student_council` float NOT NULL,
  `laboratory_fee` float NOT NULL,
  `nstp_cwts` float NOT NULL,
  `non_citizen_fee` float NOT NULL,
  `entrance` float NOT NULL,
  `deposit` float NOT NULL,
  `id_fee` float NOT NULL,
  `in_residence` float NOT NULL,
  PRIMARY KEY (`look_up`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_table`
--

INSERT INTO `assessment_table` (`look_up`, `athletics`, `cultural`, `energy`, `internet`, `library`, `medical`, `registration`, `community_chest`, `publication`, `student_council`, `laboratory_fee`, `nstp_cwts`, `non_citizen_fee`, `entrance`, `deposit`, `id_fee`, `in_residence`) VALUES
('1', 55, 50, 250, 260, 700, 50, 40, 0.5, 40, 6, 300, 100, 450, 100, 100, 100, 100);

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
(2, 'Undergrad'),
(3, 'Management'),
(4, 'Conference');

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


-- --------------------------------------------------------

--
-- Table structure for table `current_semester_id`
--

CREATE TABLE IF NOT EXISTS `current_semester_id` (
  `current_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_id` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY (`current_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `current_semester_id`
--

INSERT INTO `current_semester_id` (`current_id`, `semester_id`, `academic_year`) VALUES
(1, 1, 2010);

-- --------------------------------------------------------

--
-- Table structure for table `degree_program`
--

CREATE TABLE IF NOT EXISTS `degree_program` (
  `degree_program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_code` int(11) NOT NULL,
  `degree_level` enum('undergraduate','graduate') NOT NULL,
  `required_years` tinyint(1) NOT NULL,
  `required_units` smallint(3) NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `minor` varchar(255) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2001 ;

--
-- Dumping data for table `degree_program`
--

INSERT INTO `degree_program` (`degree_program_id`, `program_code`, `degree_level`, `required_years`, `required_units`, `degree_name`, `major`, `minor`, `degree_title`, `credited`, `currently_offered`, `entrance_code`, `enrolment_quota`, `date_proposed`, `date_revised`, `description`, `unit_id`) VALUES
(100, 1212, 'undergraduate', 4, 141, 'BS in Computer Science', 'BS', 'Computer Science', 'Bachelor of Science', 1, '1', 10000, 70, 128390400, 1286774697, 'bscs', 1),
(2000, 2000, 'undergraduate', 4, 139, 'BS in Mathematics', '1', '1', 'Bachelor of Science', 1, 'yes', 10000, 50, 128382983, 128389723, 'mathematics circle', 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation`) VALUES
(1, 'clerk'),
(2, 'faculty'),
(3, 'head'),
(4, 'administrative aide');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL,
  `maiden_name` varchar(255) NOT NULL,
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


-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `date_of_event` date NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event`
--


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
  `prereq_cpurse_code` varchar(255) NOT NULL,
  PRIMARY KEY (`course_code`,`prereq_cpurse_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequisite`
--


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

INSERT INTO `room` (`room_id`, `building_id`) VALUES
(302, 1),
(303, 1),
(218, 2),
(116, 2),
(241, 1),
(242, 1),
(235, 1),
(301, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scholars`
--

CREATE TABLE IF NOT EXISTS `scholars` (
  `scholarship_id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `set_by` int(11) NOT NULL,
  PRIMARY KEY (`scholarship_id`,`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholars`
--

