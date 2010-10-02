-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 30, 2010 at 06:54 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

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
  `access_level_id` int(11) NOT NULL auto_increment,
  `access_level_name` char(30) NOT NULL,
  PRIMARY KEY  (`access_level_id`)
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
  `accountability_id` int(11) NOT NULL auto_increment,
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
  PRIMARY KEY  (`accountability_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

-- 
-- Dumping data for table `accountability`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `accountability_type`
-- 

CREATE TABLE IF NOT EXISTS `accountability_type` (
  `accountability_type_id` int(11) NOT NULL,
  `accountability_type` char(15) NOT NULL,
  PRIMARY KEY  (`accountability_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `accountability_type`
-- 

INSERT INTO `accountability_type` (`accountability_type_id`, `accountability_type`) VALUES 
(1, 'Scholarship'),
(2, 'Book'),
(3, 'Other'),
(4, 'SLB');

-- --------------------------------------------------------

-- 
-- Table structure for table `adviser_history`
-- 

CREATE TABLE IF NOT EXISTS `adviser_history` (
  `student_number` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY  (`student_number`,`employee_id`,`semester`,`academic_year`)
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
  PRIMARY KEY  (`building_id`)
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
  PRIMARY KEY  (`employee_id`)
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
  PRIMARY KEY  (`degree_program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `degree_program`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `degree_study_plan`
-- 

CREATE TABLE IF NOT EXISTS `degree_study_plan` (
  `study_plan_id` int(11) NOT NULL auto_increment,
  `degree_program_id` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `max_units_allowed` int(2) NOT NULL,
  PRIMARY KEY  (`study_plan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `degree_study_plan`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `designation`
-- 

CREATE TABLE IF NOT EXISTS `designation` (
  `designation_id` int(11) NOT NULL auto_increment,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY  (`designation_id`)
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
  PRIMARY KEY  (`employee_id`)
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
(2, '', 'faculty', 'd561c7c03c1f2831904823a95835ff5f', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', 0, '', '', 0, 0, '', '', 2, '', '', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `faculty`
-- 

CREATE TABLE IF NOT EXISTS `faculty` (
  `employee_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `employment_type` char(8) NOT NULL,
  `designation_id` char(10) NOT NULL,
  PRIMARY KEY  (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `faculty`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `grade`
-- 

CREATE TABLE IF NOT EXISTS `grade` (
  `course_code` int(11) NOT NULL,
  `section_label` char(1) NOT NULL,
  `student_number` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date_incurred` int(11) NOT NULL,
  `initial_grade` float NOT NULL,
  `completion_grade` float NOT NULL,
  `grade_status` varchar(255) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY  (`course_code`,`section_label`,`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `grade`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `offered_subjects`
-- 

CREATE TABLE IF NOT EXISTS `offered_subjects` (
  `subject_id` int(11) NOT NULL,
  `degree_program_id` int(11) NOT NULL,
  PRIMARY KEY  (`subject_id`,`degree_program_id`)
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
  `accountability_type_id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY  (`official_receipt_number`)
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
  `prereq_subject_id` varchar(255) NOT NULL,
  PRIMARY KEY  (`course_code`,`prereq_subject_id`)
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
  PRIMARY KEY  (`room_id`)
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
  PRIMARY KEY  (`scholarship_id`,`student_number`)
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
  PRIMARY KEY  (`scholarship_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `scholarship`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `section`
-- 

CREATE TABLE IF NOT EXISTS `section` (
  `course_code` varchar(255) NOT NULL,
  `section_label` char(2) NOT NULL,
  `room_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `total_slots` int(11) NOT NULL,
  `available_slots` int(11) NOT NULL,
  `waitlist_count` int(11) NOT NULL,
  `confirmed_count` int(11) NOT NULL,
  `enrolled_count` int(11) NOT NULL,
  `class_type` enum('lec','lab') NOT NULL,
  `dissolved` int(1) NOT NULL,
  PRIMARY KEY  (`course_code`,`section_label`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `section`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `section_schedules`
-- 

CREATE TABLE IF NOT EXISTS `section_schedules` (
  `course_code` varchar(255) NOT NULL,
  `section_label` char(2) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day_of_the_week` enum('M','T','W','Th','F','MTh','TF','S') NOT NULL,
  PRIMARY KEY  (`course_code`,`section_label`,`day_of_the_week`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `section_schedules`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `semester_mapping`
-- 

CREATE TABLE IF NOT EXISTS `semester_mapping` (
  `semester_id` int(11) NOT NULL auto_increment,
  `semester_type` char(20) NOT NULL,
  PRIMARY KEY  (`semester_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `semester_mapping`
-- 

INSERT INTO `semester_mapping` (`semester_id`, `semester_type`) VALUES 
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
  `slb_id` int(11) NOT NULL auto_increment,
  `loaned_amount` float NOT NULL,
  `employee_id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `term_incurred` tinyint(1) NOT NULL,
  `academic_year` int(11) NOT NULL,
  PRIMARY KEY  (`slb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `slb`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `stfap`
-- 

CREATE TABLE IF NOT EXISTS `stfap` (
  `stfap_bracket_id` tinyint(1) NOT NULL auto_increment,
  `stfap_bracket` char(2) NOT NULL,
  `amount_per_unit` int(11) NOT NULL,
  `income_lower_limit` int(11) NOT NULL,
  `income_upper_limit` int(11) NOT NULL,
  PRIMARY KEY  (`stfap_bracket_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `stfap`
-- 


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
  `emergency_number` int(11) NOT NULL,
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
  `parent_street` varchar(255) NOT NULL,
  `parent_barangay` varchar(255) NOT NULL,
  `parent_city_municipality` varchar(255) NOT NULL,
  `parent_province` varchar(255) NOT NULL,
  `parent_contact_number` int(11) NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `guardian_house_number` int(11) NOT NULL,
  `guardian_street` varchar(255) NOT NULL,
  `guardian_barangay` varchar(255) NOT NULL,
  `guardian_city_municipality` varchar(255) NOT NULL,
  `guardian_province` varchar(255) NOT NULL,
  `guardian_contact_number` int(11) NOT NULL,
  `access_level_id` int(11) NOT NULL,
  `max_units_allowed` int(2) NOT NULL,
  `login_expiration` int(11) NOT NULL,
  PRIMARY KEY  (`student_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `student`
-- 

INSERT INTO `student` (`student_number`, `scholarship_id`, `unit_id`, `degree_program`, `year_level`, `degree_level`, `academic_year`, `semester`, `stfap_bracket_id`, `student_type`, `student_status`, `gender`, `civil_status`, `program_code`, `program_rev_code`, `contact_number`, `registration_stat`, `grade_info`, `foreign_info`, `citizenship`, `employment`, `family_income`, `add_info`, `emergency_number`, `first_name`, `last_name`, `middle_name`, `password`, `security_question`, `answer`, `birthdate`, `father_name`, `mother_name`, `graduating`, `present_house_number`, `residency`, `guardian`, `entry_academic_year`, `entry_semester`, `academic_standing`, `degree_program_id`, `employee_id`, `email_address`, `home_house_number`, `last_updated`, `home_street`, `home_barangay`, `home_city_municipality`, `home_province`, `home_contact_number`, `present_home_number`, `present_street`, `present_barangay`, `present_city_municipality`, `present_province`, `present_contact_number`, `parent_street`, `parent_barangay`, `parent_city_municipality`, `parent_province`, `parent_contact_number`, `last_updated_by`, `guardian_house_number`, `guardian_street`, `guardian_barangay`, `guardian_city_municipality`, `guardian_province`, `guardian_contact_number`, `access_level_id`, `max_units_allowed`, `login_expiration`) VALUES 
(200700000, 0, 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, 0, 0, '', '', '', '', '', 0, '', 0, '', '', '', 'd7abb6a3e6439060c4d7547cc9d43ac6', '', '', 0, '', '', '', 0, '', '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, '', '', '', '', 0, 0, 0, '', '', '', '', 0, 1, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `student_assessment`
-- 

CREATE TABLE IF NOT EXISTS `student_assessment` (
  `assessment_id` int(11) NOT NULL auto_increment,
  `to_pay_amount` float NOT NULL,
  `assessment_status` varchar(7) NOT NULL,
  `student_number` int(11) NOT NULL,
  PRIMARY KEY  (`assessment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `student_assessment`
-- 


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
  PRIMARY KEY  (`student_number`,`course_code`,`section_label`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `student_status`
-- 


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
  PRIMARY KEY  (`student_number`,`degree_program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `students_degree`
-- 


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
  PRIMARY KEY  (`course_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `subject`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `unit`
-- 

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` char(255) NOT NULL,
  PRIMARY KEY  (`unit_id`)
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
