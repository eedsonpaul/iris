-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2010 at 01:22 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `accountability`
--

INSERT INTO `accountability` (`accountability_id`, `accountability_type_id`, `student_number`, `details`, `amount_due`, `year_incurred`, `semester_incurred`, `date_added`, `employee_id`, `accountability_status`, `date_cleared`) VALUES
(78, 1, 200700000, 'DOST', 900, 2010, 2, 20101005, 1, 'cleared', 20101005),
(79, 1, 200700001, 'DOST', 900, 2010, 1, 20101005, 1, 'cleared', 20101005),
(57, 3, 200700000, 'Rakenrol', 1000000, 2011, 2, 20100930, 1, 'cleared', 20100930),
(77, 1, 200700001, 'NEC', 90, 2010, 1, 20101005, 1, 'cleared', 20101005),
(61, 1, 200700000, 'cmsc11', 300, 2010, 2, 20101002, 1, 'cleared', 20101002),
(108, 3, 0, '', 0, 2011, 0, 1286692889, 2, '', 0),
(70, 5, 200700000, 'lacking envelope', 18, 2010, 2, 20101212, 7, 'cleared', 2147483647),
(107, 3, 39048304, '', 0, 2011, 0, 1286692844, 2, '', 0),
(69, 4, 200700000, 'student loan', 100, 2010, 1, 20101002, 1, 'cleared', 0),
(68, 5, 200758548, 'lacking envelope', 18, 2010, 1, 20100328, 7, 'cleared', 2147483647),
(83, 4, 200700001, 'student loan', 1000, 2010, 1, 20101005, 1, 'cleared', 20101010),
(82, 2, 200700001, 'pressman', 100, 2010, 2, 20101005, 1, 'cleared', 20101005),
(81, 2, 200700001, 'pressman', 10, 2010, 2, 20101005, 1, 'cleared', 20101005),
(106, 3, 200729038, '', 0, 2011, 0, 1286692836, 2, '', 0),
(76, 3, 200700000, 'cmsc 11 Lab fee', 300, 2010, 1, 20101002, 1, 'cleared', 20101010),
(84, 3, 0, '', 0, 2011, 0, 1286355886, 2, '', 0),
(85, 2, 200700001, 'Kristine. Martha Cecilia', 20101011, 2010, 1, 20101007, 1, 'cleared', 1),
(86, 2, 200700001, 'Immortal. John Lloyd Cruz', 20101015, 2011, 1, 20101007, 1, 'cleared', 1),
(87, 1, 200700000, 'hehe', 200, 2011, 1, 1286445591, 2, 'cleared', 0),
(88, 1, 200700001, 'DOST', 20101029, 2010, 1, 20101007, 1, 'cleared', 20101007),
(89, 3, 200700001, 'Lab Fee for CS 153', 600, 2010, 1, 20101007, 1, 'cleared', 20101007),
(90, 1, 200700001, 'DOST', 6000, 2010, 1, 20101007, 1, 'cleared', 20101007),
(91, 1, 200700001, 'NEC', 90, 2010, 1, 20101007, 1, 'cleared', 20101007),
(97, 3, 200700001, 'Lab Fee for CS 153', 600, 2011, 1, 20101007, 1, 'cleared', 20101007),
(93, 1, 200700001, 'fio', 90, 2010, 1, 20101007, 1, 'cleared', 20101007),
(94, 1, 200700001, 'hah', 90, 2010, 1, 20101007, 1, 'cleared', 20101007),
(95, 1, 200700001, 'pressman', 10, 2010, 5, 20101007, 1, 'cleared', 20101010),
(98, 2, 200700001, 'Kristine. Martha Cecilia', 1000, 2010, 3, 20101010, 1, 'cleared', 20101010),
(101, 2, 200700001, 'haha', 90, 2009, 1, 20101007, 1, 'cleared', 20101007),
(102, 2, 200700001, 'Ang Tamis ng Singkamas Mo. Portia D.', 90, 2009, 1, 20101008, 1, 'cleared', 20101010),
(105, 2, 200700001, 'Talong. Nico Enego', 20, 2010, 4, 20101008, 1, 'cleared', 20101010),
(109, 2, 200700001, 'wai ayoo', 900, 2009, 2, 20101010, 1, 'cleared', 20101010),
(110, 1, 200700001, 'secret', 122, 2009, 1, 20101010, 4, 'cleared', 20101010),
(111, 1, 200700001, 'haha', 90, 2009, 1, 20101010, 4, 'cleared', 20101010),
(112, 2, 200700001, 'haha', 90, 2009, 1, 20101010, 5, 'cleared', 20101010),
(113, 2, 200700001, 'hi', 9, 2009, 1, 20101010, 5, 'cleared', 20101010),
(114, 1, 200700001, 'haha', 9, 2009, 1, 20101010, 4, 'cleared', 20101010),
(115, 1, 200700001, 'phusSIMBA', 100, 2009, 2, 20101010, 4, 'cleared', 20101010),
(116, 2, 200700001, 'awdads', 0, 2009, 1, 20101010, 5, 'cleared', 20101010),
(117, 6, 200758563, '', 0, 2008, 1, 2008, 7, 'pending', 0),
(118, 1, 200700001, 'famapork', 10190, 2009, 1, 20101010, 12345, 'cleared', 20101010),
(119, 3, 200700000, 'utangan ka animal ka!!', 12598, 2009, 0, 20101010, 1238001, 'cleared', 20101010),
(120, 1, 200700000, 'lalala', 123678, 2009, 0, 20101010, 1238001, 'cleared', 20101010),
(121, 1, 200700000, 'utangan nsad ka!!', 123456789, 2009, 1, 20101010, 1238001, 'cleared', 20101010),
(122, 1, 200700001, '12312', 12, 2009, 0, 20101010, 1238001, 'cleared', 20101010),
(123, 1, 200700001, '12312', 12, 2009, 0, 20101010, 1238001, 'pending', 1),
(124, 1, 200700001, '12312', 12, 2009, 0, 20101010, 1238001, 'pending', 1),
(125, 1, 200700001, '12312', 100, 2009, 0, 20101010, 1238001, 'cleared', 20101010),
(126, 1, 200700001, '34345', 12, 2009, 0, 20101010, 1238001, 'pending', 1),
(127, 1, 200700001, '34345', 12, 2009, 0, 20101010, 1238001, 'cleared', 20101010),
(128, 1, 200700001, 'wefwf', 12, 2009, 0, 20101010, 1238001, 'pending', 1),
(129, 1, 200700001, 'wefwf', 12, 2009, 0, 20101010, 1238001, 'pending', 1),
(130, 1, 200700001, 'wefwf', 12, 2009, 0, 20101010, 1238001, 'cleared', 20101010),
(131, 2, 200700001, 'hoyJP', 2, 2009, 0, 20101010, 5, 'cleared', 20101010),
(132, 2, 200700000, 'dfdfdfd', 2132323, 2009, 0, 20101010, 1111, 'cleared', 20101010),
(133, 2, 200700001, 'asjdhas', 9809, 2009, 0, 20101010, 5, 'cleared', 20101010),
(134, 1, 200700001, 'hoyTAKA', 900, 2009, 0, 20101010, 1238001, 'cleared', 20101010),
(135, 2, 200700000, 'oajdmk', 9100, 2009, 0, 20101010, 5, 'cleared', 20101010),
(136, 2, 200700001, 'None', 200, 2009, 0, 20101010, 5, 'pending', 1),
(137, 4, 200700000, 'student loan', 10, 2010, 1, 20101010, 1, 'cleared', 20101010),
(138, 4, 200700000, 'student loan', 10, 2010, 1, 20101010, 1, 'pending', 0);

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
(200700000, 0, 0, 0, 0, 0, 0, 0, 0, '', 0),
(200720010, 15, 0, 0, 0, 0, 0, 0, 0, '', 0);

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
(100, 1212, 'undergraduate', 4, 141, 'BS in Computer Science', '0', '0', 'Bachelor of Science', 1, 'yes', 10000, 70, 128467366, 128467366, 'bscs', 1),
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
(8, '', 'osa', '43f38d003c06cca6687b5991a52787c1', '', 'Proctor and', '', 'Gamble', '', '', 4, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 8, '', '', 7),
(7, '', 'cso        ', '7521b62854f6491f263af3090ab9e759', '', 'CSO', 'CSO', 'CSO', 'Male', '', 1, 'asdad', 'asdad', '', '', 'NULL', 0, 0, 'asdad', 0, 'asdad', 'asd', 0, 1286355104, 'Apartment', '', 7, 'What is the name of your first school?', '', 7),
(6, '', 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf', '', 'Fiona', 'Haha', 'Protestas', '', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 6, 'What is the name of your first school?<', '', 6),
(5, '', 'ssagun\n               ', 'ssagun', '', 'Stefany', 'Serino', 'Sagun', 'Male', '', 3, '', '', '', '', 'NULL', 0, 0, '', 0, '', '', 0, 0, 'NULL', '', 5, 'What is the name of your first school?', '', 1),
(4, '', 'jebrado\n               ', 'd4c143f004d88b7286e6f999dea9d0d7', '', 'Jm', 'x', 'Ebrado', 'Male', 'naj_asdasd.com', 1, 'aasd', 'asdljasd', '', '', 'NULL', 0, 0, 'aslkdjalkj', 0, 'alskjdlkaj', 'aslkjdlkasjd', 0, 0, 'NULL', '', 4, 'What is the name of your first school?', 'lahug', 1),
(122323, '', 'faculty', 'd561c7c03c1f2831904823a95835ff5f', '', 'Stefanu', 'Esperanza', 'Balugo', '', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 1),
(12121, '', 'u1', 'ec6ef230f1828039ee794566b9c58adc', '', 'Bob', 'middle', 'Miller', '', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 0),
(1111, '', 'kmiranda', 'fb236b579c98a0d7bb92b290bb8aec75', '', 'kae karen', 'middle', 'miranda', 'Female', '', 1, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 3, '', '', 2),
(12913, '', 'demigod', '61c3592a7e2a61bc2f53e9a72b73feda', '', 'd', 'god', 'emigod', 'Male', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 3, '', '', 0),
(1232, '', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', '', 'aa', 'aa', 'aa', 'Male', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 1),
(2007, '', 'oosadfd3434\n               ', '43f38d003c06cca6687b5991a52787c1', '', 'osa3434', 'osa3434', 'osadfd3434', '', '', 0, '3434', '43434', '', '', '', 3434, 3434, '3434', 0, '34342', '038904', 0, 0, '', '4343', 8, 'What is the name of your first school?<', '', 0),
(434234, '', 'ggg', '73c18c59a39b18382081ec00bb456d43', '', 'gg', '', 'gg', 'Male', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 7, '', '', 0),
(1238001, '', 'accounting', 'd4c143f004d88b7286e6f999dea9d0d7', '', 'a', 'a', 'ccounting', 'Male', '', 1, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 4, '', '', 3),
(3129812, '', 'blah\n               ', '47bce5c74f589f4867dbd57e9ca9f808', '', 'blah', 'blah', 'lah', 'Female', 'asdasd', 2, 'asdasdas', '', '', '', 'Married', 12313, 2312312, '', 0, '', '', 0, 0, 'Apartment', '', 3, 'What is the name of your first school?', '', 3),
(12089238, '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'administrator', 'semorio', 'dmin', 'Male', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 3, '', '', 1),
(7856565, '', 'library', 'd521f765a49c72507257a2620612ee96', '', 'library', 'rakenrol', 'ibrary', 'Male', '', 2, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 5, '', '', 4);

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
('cmsc11', 'A', 200700000, '', 0, 0, 0, 'inc', 0, 0),
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
('bio1', 2000),
('cmsc11', 100),
('cs170', 100),
('cmsc123', 100);

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
(241243, 0, 900, 20101005, 78, 2, 2010),
(2423411, 0, 600, 20101007, 89, 1, 2010),
(0, 0, 0, 20101007, 93, 1, 2010),
(123455, 0, 600, 20101007, 97, 1, 2011);

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
  `set_by` int(11) NOT NULL,
  PRIMARY KEY (`scholarship_id`,`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholars`
--

INSERT INTO `scholars` (`scholarship_id`, `student_number`, `set_by`) VALUES
(12, 200700000, 8);

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
(100, 'SWAT', 2000),
(1, 'DOST', 7000),
(12, 'Government Support', 10000),
(11, 'DILG', 1000),
(101, '', 0),
(102, '', 0),
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
('cmsc11', 'A', 0, 122323, 6, 2, 0, 0, 0, 'lec', 0),
('cmsc11', 'B', 0, 122323, 24, 23, 0, 1, 0, 'lec', 0),
('Bio1', 'A', 115, 12345, 2, 0, 3, 2, 2, 'lec', 0),
('cmsc21', 'A', 0, 0, 25, 25, 0, 0, 0, 'lec', 0),
('cs170', 'A', 121, 0, 2, 1, -1, 0, -2, 'lec', 0),
('Bio1', 'B', 200, 12345, 20, 20, 0, 0, 0, 'lec', 0),
('cmsc123', 'G', 200, 1232, 30, 28, 0, 0, -2, 'lec', 0),
('cmsc198', 'A', 200, 0, 30, 30, 0, 0, 0, '', 0),
('cdfes12', 'zz', 300, 0, 20, 20, 0, 0, 0, '', 0),
('ccc', 'He', 200, 0, 20, 20, 0, 0, 0, '', 1),
('Bio1', 'G', 200, 0, 20, 20, 0, 0, 0, '', 0);

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
('cmsc198', 'A', '09:00:00', '11:00:00', ''),
('cdfes12', 'zz', '09:00:00', '10:00:00', ''),
('ccc', 'He', '09:00:00', '10:30:00', ''),
('Bio1', 'G', '10:30:00', '12:00:00', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slb`
--

INSERT INTO `slb` (`slb_id`, `loaned_amount`, `employee_id`, `student_number`, `term_incurred`, `academic_year`) VALUES
(5, 10, 1238001, 200700000, 1, 2010);

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
(200700001, 100, 0, '2000', 3, 'undergraduate', 0, '', 0, 'A', 0, 'Female', 'Single', 0, 0, 2536985, 'A', '', 'y', '', '', '', '', 0, 0, 100, 5000, '', 'Santana', 'Catubig', 'Lopez', 'cf9b89e1f6b6d57f2b5d991e4e236a10', 'What was the name of your first school?', '', 1990, 'Cebu', '', '', 'yes', 'yes', 0, 0, 'Good', 2000, '', 0, 1286708722, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 0, 0, 0, 0, '', 0, 20110418),
(200700004, 0, 0, '100', 2, '', 0, '', 0, 'A', 0, 'female', '', 0, 0, 0, 'A', '', '', 'Filipino', '', '', '', 0, 0, 0, 0, '', 'Santana', 'LastName', 'MiddleName', 'd18ec62abb02c392392c2807b9f8258d', '', '', 0, '', '', '', '', 'no', 2010, 0, 'Warning', 100, '', 0, 1286452284, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 0, 0, 0, 0, '', 0, 20140601),
(200735057, 0, 0, '100', 2, 'undergraduate', 0, '', 0, '', 0, 'male', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Santana', 'Baguio', 'Arenas', 'a78576c2fc3479416c62492a7a499e77', '', '', 0, '', '', '', 'No', 'yes', 2011, 1, '', 2000, '', 0, 1286454277, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, '', 0, 2011),
(200700007, 0, 0, '100', 3, '', 0, '', 0, 'A', 0, 'Female', '', 0, 0, 0, 'A', '', '', 'Korean', '', '', '', 0, 0, 0, 0, '', 'Santana', 'Mae', 'Ann', '69aac532c0814c19ae92f55d966c9339', '', '', 0, '', '', '', '', '', 2008, 1, 'Good', 2000, '', 0, 1286019047, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, '', 0, 20120403),
(200700006, 0, 0, '100', 1, 'undergraduate', 0, '', 0, 'A', 0, 'Male', '', 0, 0, 0, 'A', '', '', 'Korean', '', '', '', 0, 0, 0, 0, '', 'Santana', 'Lee', 'Lee', 'de73f83164ebb64f291b15370b7231da', '', '', 0, '', '', '', '', '', 0, 0, 'Good', 100, '', 0, 1286531302, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 20, 0, 0, 0, 0, '', 0, 20120403),
(200700009, 0, 0, '100', 1, '', 0, '', 0, 'A', 0, 'Female', '', 0, 0, 0, 'A', '', '', 'Philippines', '', '', '', 0, 0, 0, 0, '', 'Santana', 'Student', 'Uno', 'e431b5f0601c7faadbdcb2d9089de907', '', '', 0, '', '', '', '', '', 2010, 3, 'Good', 2000, '', 0, 1286253697, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 0, 0, 0, 0, '', 0, 20120403),
(200720010, 11, 0, '100', 1, '', 0, '', 0, 'A', 0, 'Female', '', 0, 0, 0, 'A', '', '1', 'Filipino', '', '', '', 0, 0, 0, 0, '', 'Santana', 'Buhatonon', 'Lala', '12a36dc928557e7f5a4a13924ac0448d', '', '', 0, '', '', '', '', '', 2000, 0, 'Good', 100, '', 0, 1286356121, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, '', 0, 20100910),
(200711111, 0, 0, '', 4, 'undergraduate', 0, '', 0, 'D', 0, 'male', 'married', 0, 0, 0, 'A', '', 'n', 'dual', 'no', '', '', 0, 0, 0, 1000000, '', 'Santana', 'Enego', '', 'cd73502828457d15655bbd7a63fb0bc8', 'What was the name of your first school?', 'dota', 19900808, 'cebu', 'papa', 'papa', 'yes', 'yes', 0, 0, '', 100, 'paula@paula.com', 123, 0, 'waaa', 'waaa', 'waa', 'waa', 123, 123, 'waaa', 'waaa', 'waa', 'waa', 123, 0, 'guardian', 1, 'waa', 'waaa', 'waaa', 'waaa', 123, 'recipe', 'wa', 'wa', '123', '123', 1, 7, 0, 0, 0, 0, '', 0, 0),
(200756012, 0, 0, '100', 0, 'undergraduate', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Santana', 'Baguio', 'Y', '1d333c7cf604116d8c6132dbacf3f0bc', '', '', 0, '', '', '', 'No', '', 2010, 1, '', 2000, '', 0, 1286531141, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, '', 0, 2010),
(200791042, 0, 0, '100', 0, 'undergraduate', 0, '', 0, '', 0, 'Male', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'John Mart ', 'Aguilar', 'Dantes', '6ee48292c1fcbb85b9206d0ff846259b', '', '', 0, '', '', '', 'No', '', 2007, 1, '', 100, '', 0, 1286715960, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, '', 0, 20121202),
(200758563, 0, 0, '2000', 0, 'undergraduate', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Razel', 'Paldo', 'Nacilla', '28eb19ac53a5369c2e6688e0f7be5f9e', '', '', 0, '', '', '', 'No', '', 2008, 1, '', 2000, '', 0, 1286702140, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, '', 0, 2011),
(200700000, 12, 0, '100', 1, 'undergraduate', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'blah', 'blah', 'blah', '817a7e34bca1d7a70a29b6eceaed7cc0', '', '', 0, '', '', '', 'No', '', 1231, 1, '', 100, '', 0, 1286703383, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, '', 0, 1231),
(201012345, 0, 0, '100', 0, 'undergraduate', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'Jedalisa', 'Sevilla', 'Something', '00c28f3bef649242749d53357b92f47a', '', '', 0, '', '', '', 'No', '', 2011, 1, '', 100, '', 0, 1286715800, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, '', 0, 20101212),
(200712345, 0, 0, '100', 0, 'undergraduate', 0, '', 0, '', 0, 'Female', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'test', 'test', 'test', '0a958631e7fcbf81211df1b311143570', '', '', 0, '', '', '', 'No', '', 2001, 0, '', 100, '', 0, 1286716468, '', '', '', '', 0, 0, '', '', '', '', 0, 1111, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, '', 0, 1011212),
(200758572, 0, 0, '100', 0, 'undergraduate', 0, '', 0, '', 0, 'Male', '', 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'John Paul', 'Catubig', 'NA', 'b9093a5a4869aebb4e2f0a2a18731f34', '', '', 0, '', '', '', 'No', '', 2010, 1, '', 100, '', 0, 1286716584, '', '', '', '', 0, 0, '', '', '', '', 0, 7, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 18, 0, 0, 0, 0, '', 0, 20140331);

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
(200791042, 100, 2007, 1, 1286715960, 7),
(12, 0, 3123, 0, 1285844619, 0),
(200711111, 100, 2010, 0, 1286017877, 0),
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
(200700001, 2000, 0, 0, 1286704825, 1111),
(200712345, 100, 2001, 0, 1286716468, 1111),
(200758572, 100, 2010, 1, 1286716549, 7);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `student_assessment`
--

INSERT INTO `student_assessment` (`assessment_id`, `to_pay_amount`, `assessment_status`, `student_number`) VALUES
(8, -2348.5, 'unpaid', 200700000),
(9, 251.5, 'paid', 200700001);

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
(200720010, 'bio1', 'a', 'confirmed', 1, 2011, 0),
(200700001, 'cmsc11', 'B', 'enrolled', 1, 2011, 0),
(200720010, 'cmsc11', 'a', 'confirmed', 1, 2011, 0),
(200700000, 'bio1', 'A', 'enrolled', 1, 2011, 0),
(200700006, 'cmsc11', 'A', 'enrolled', 1, 2011, 0),
(200700001, 'bio1', 'A', 'enrolled', 1, 2011, 0),
(200720010, 'cs170', 'a', 'confirmed', 1, 2011, 0),
(200720010, 'cmsc198', 'a', 'confirmed', 1, 2011, 0),
(200720010, 'cdfes12', 'a', 'confirmed', 1, 2011, 0);

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
('cmsc11', 'Introduction to Computer Science', 'added', 0, 0, 0, 0, 0, '', 0, 3, '', 0, 0, 0),
('cmsc123', 'Computer Science', 'added', 1008201600, 1008201600, 1285843950, 0, 0, '', 2011, 3, '', 1, 0, 0),
('Bio1', 'Introduction to Biology', 'added', 0, 0, 0, 0, 0, '', 0, 3, '', 0, 0, 0),
('cmsc124', 'Computer Science', 'updated', 1008201600, 1008201600, 1285843994, 1286355272, 0, '', 2011, 3, '', 1, 0, 200),
('cmsc21', 'Advanced Programming', 'added', 1008201600, 1008201600, 1285844056, 0, 0, '', 2011, 3, '', 1, 0, 450),
('cmsc130', 'comsci', 'added', 234234, 324234, 1285844317, 324234234, 1285845289, '', 2011, 3, '', 1, 1, 450),
('cs170', 'Computer Science', 'updated', 1008201600, 1008201600, 1285844741, 1286711371, 1286449652, '', 2011, 3, 'undergraduate', 1, 1, 0),
('cmsc134', 'ccss', 'added', 1226880000, 1226880000, 1285846043, 0, 0, '', 2011, 3, '', 1, 0, 0),
('cmsc128', 'Softeng', 'added', 911606400, 911606400, 1285851466, 0, 1285851499, '', 2011, 3, '', 1, 1, 450),
('cmsc198', 'GIS', 'added', 718848000, 718848000, 1286012931, 0, 0, '', 2011, 3, '', 1, 0, 300),
('cmsc190', 'Elective comsci', 'updated', 662601600, 662601600, 1286016615, 1286355299, 1286355314, '', 2011, 3, '', 2, 1, 300),
('cdfe', 'cdfe', 'added', 1291939200, 1291939200, 1286353743, 0, 0, '', 2011, 3, '', 1, 0, 450),
('cdfes12', 'cdfes', 'added', 1291939200, 1291939200, 1286353876, 0, 0, '', 2011, 3, '', 1, 0, 450),
('ccc', 'ccccc', 'added', 975628800, 975628800, 1286447329, 0, 0, '', 2011, 3, '', 1, 0, 300),
('', 'Course Testis', 'updated', 0, 0, 1286715072, 1286715306, 1286715345, '', 2011, 0, 'undergraduate', 1, 1, 0),
('cmsc90', 'Computer Basics', 'added', 660960000, 660960000, 1286711242, 0, 0, '', 2011, 3, 'undergraduate', 1, 0, 300),
('cs297', 'sss', 'added', 1284249600, 1284249600, 1286711285, 0, 0, '', 2011, 3, 'graduate', 2, 0, 0),
('fdfdf', 'fdfdf', 'added', 0, 0, 1286715101, 0, 0, '', 2011, 0, 'undergraduate', 1, 0, 0);

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
