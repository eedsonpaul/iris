<?php
require_once 'header.php';
require_once 'faculty_functions.php';
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
				/*if(mysql_numrows(exist($_POST['studnum'],'student','student_number'))==0)
				{
					require_once 'exist.php';
				}
				else*/
				if(mysql_numrows(exist($_POST['studnum'],'student','student_number'))==0)
				{
					$_POST['error']='student does not exist!';
					require_once 'view_accnt.php';
				}
				else if($_POST['studnum']=='')
				{
					$_POST['error']='no student inputted!';
					require_once 'view_accnt.php';
				}
				else 
				require_once 'accountability.php';
			}
		break;
		
		case 'Register Student':
			if(isset($_POST['studnum']))
			{
				if($_POST['studnum']=='')
				{
					$_POST['error']='No student number inputted!';
					require_once 'register.php';
				}
				else if(mysql_numrows(exist($_POST['studnum'],'student','student_number'))==0)
				{
					$_POST['error']='student does not exist!';
					require_once 'register.php';
				}
				else
				require_once 'checkstudent.php';
			}
		break;
		
		case 'Assessment';
			if(isset($_POST['studnum'])
			and isset($_POST['unitcount'])
			and isset($_POST['labcount']))
			{
				if(mysql_fetch_array(view_accountability($_POST['studnum'])))
				{
					require_once 'unassess.php';
				}
				else
				{
					if(!isset($_POST['non_citizen_fee'])) $_POST['non_citizen_fee']=0;
					if(!isset($_POST['entrance'])) $_POST['entrance']=0;
					if(!isset($_POST['deposit'])) $_POST['deposit']=0;
					if(!isset($_POST['id_fee'])) $_POST['id_fee']=0;
					if(!isset($_POST['in_residence'])) $_POST['in_residence']=0;
					if(!isset($_POST['nstp'])) $_POST['nstp']=0;
					if(!mysql_numrows(retrieve_assess_info($_POST['studnum'])))
					{
						insert_assess_info($_POST['studnum'],$_POST['unitcount'],$_POST['labcount'],$_POST['non_citizen_fee'],$_POST['entrance'],$_POST['deposit'],$_POST['id_fee'],$_POST['in_residence'],$_POST['nstp']);
					}
					require_once 'assess.php';
				}
			}
		break;
		
		case 'Assess Student':
			if(isset($_POST['studnum'])
			and isset($_POST['total'])
			and isset($_POST['employee_id']))
			{
				echo set_assessed($_POST['studnum']);
				echo student_assess($_POST['studnum'],$_POST['total']);
				echo confirm_to_assess($_POST['studnum']);
				echo assessed_by($_POST['studnum'],$_POST['employee_id']);
			}
		break;
		
		case 'Handle Grades':
			if(isset($_POST['course_code'])
			and isset($_POST['section_label']))//and isset($_POST['student_number'])			
			{
				require_once 'grades.php';
			}
		break;
		
		case 'Submit Grade':
			if(isset($_POST['course_code'])
			and isset($_POST['section_label'])
			and isset($_POST['student_number'])
			and isset($_POST['initial_grade'])
			//and isset($_POST['grade_status'])
			and isset($_POST['semester'])
			and isset($_POST['academic_year']))//and isset($_POST['student_number'])			
			{
				echo '<h1>'.insert_grade($_POST['course_code'],
							$_POST['section_label'],
							$_POST['student_number'],
							$_POST['remarks'],
							time(),
							$_POST['initial_grade'],
							'',//init_final($_POST['initial_grade']),
							grade_status($_POST['initial_grade']),//$_POST['grade_status'],
							$_POST['semester'],
							$_POST['academic_year']).'</h1>';
				require_once 'grades.php';
			}
		break;
	}
}
elseif(isset($_REQUEST['view']))
{
	switch($_REQUEST['view'])
	{
		Case 'View':
			if($_POST['sem']=='' and $_POST['year']=='')
			{
				$_POST['error']='Select a Year and a semester!';
				require_once 'view_courses.php';
			}
			else if($_POST['year']=='')
			{
				$_POST['error']='Select a Year!';
				require_once 'view_courses.php';
			}
			else
			{
				require_once 'view_courses_list.php';
			}
		break;
	}
}
?>