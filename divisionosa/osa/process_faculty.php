<?php
require_once 'header.php';
require_once '../cssandstuff/dbconnect.php';

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'cmsc11':
		break;
		
		case 'View Accountability':
			if(isset($_POST['studnum'])) 
			{
				require_once 'accountability.php';
			}
		break;
		
		case 'Register Student':
			if(isset($_POST['studnum']))
			{
				require_once 'checkstudent.php';
			}
		break;
		
		case 'Assess Student';
			if(isset($_POST['studnum'])
			and isset($_POST['unitcount'])
			and isset($_POST['labcount']))
			{
				require_once 'assess.php';
			}
		break;
		
		case 'Handle Grades':
			if(isset($_POST['course_code'])
			and isset($_POST['section_label'])
			and isset($_POST['student_number']))
			{
				require_once '';
			}
		break;
	}
}
?>