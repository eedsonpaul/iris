<?php
require_once 'header.php';
require_once 'degree_functions.php';
require_once 'subject_functions.php';
require_once 'offering_functions.php';
require_once '../cssandstuff/http.php';

if(isset($_REQUEST['c']))
{
	switch($_REQUEST['c'])
	{
		case 'Add Course':
			if(isset($_POST['course_code'])
				and isset($_POST['subject_title'])
				and isset($_POST['action_taken'])
				and isset($_POST['pdate'])
				and isset($_POST['apdate'])
				and isset($_POST['fdate'])
				and isset($_POST['abdate'])
				and isset($_POST['year'])
				and isset($_POST['units'])
				and isset($_POST['deg'])
				and isset($_POST['sem'])
				and isset($_POST['lab_fee']))
			{
				if(mysql_numrows(exist($_POST['course_code'],'subject','course_code')))
				{
					$_POST['error']='Course has already existed!';
					require_once 'addsubject.php';
				}
				else if($_POST['course_code']=='')
				{
					$_POST['error']='Course code field is empty!';
					require_once 'addsubject.php';
				}
				else if($_POST['subject_title']=='')
				{
					$_POST['error']='Course code title field is empty!';
					require_once 'addsubject.php';
				}
				else if($_POST['pdate']=='')
				{
					$_POST['error']='Date Processed field is empty!';
					require_once 'addsubject.php';
				}
				else if($_POST['apdate']=='')
				{
					$_POST['error']='Date approved field is empty!';
					require_once 'addsubject.php';
				}
				else if($_POST['units']=='')
				{
					$_POST['error']='Units field is empty!';
					require_once 'addsubject.php';
				}
				else if(!(ctype_digit($_POST['units'])))
				{
					$_POST['error']='Units field must be numeric!';
					require_once 'addsubject.php';
				}
				else if(!(ctype_digit($_POST['lab_fee'])))
				{
					$_POST['error']='Lab fee field must be numeric!';
					require_once 'addsubject.php';
				}
				/*
				else if($_POST['lab_fee']=='')
				{
					$_POST['error']='Lab fee field is empty!';
					require_once 'addsubject.php';
				}*/
				else
				add_subject(
					$_POST['course_code'],
					$_POST['subject_title'],
					$_POST['action_taken'],
					strtotime($_POST['pdate']),
					strtotime($_POST['apdate']),
					time(),
					strtotime($_POST['rdate']),
					strtotime($_POST['abdate']),
					$_POST['year'],
					$_POST['units'],
					$_POST['deg'],
					$_POST['sem'],
					$_POST['lab_fee']);
				echo "Course Added.";
			} else{
				echo "Some inputs missing...";
			}
			// redirect('subject_management_module.php');
			break;
			
		case 'Add Section':
			if(isset($_POST['course_code'])
			and isset($_POST['section'])
			and isset($_POST['room'])
			and isset($_POST['faculty'])
			and isset($_POST['tslots'])
			and isset($_POST['tslots'])
			and isset($_POST['stime'])
			and isset($_POST['etime'])
			and isset($_POST['day'])
			and isset($_POST['ctype']))
			{
				/*
				if(strcasecmp($_POST['course_code'],"non")==0)
				{
					$_POST['error'] = 'no course code selected';
					require_once 'addsection.php';
				}
				else if(strcasecmp($_POST['faculty'],"non")==0)
				{
					$_POST['error'] = 'no faculty selected';
					require_once 'addsection.php';
				}
				else if(strcasecmp($_POST['ctype'],"non")==0)
				{
					$_POST['error'] = 'no class type selected';
					require_once 'addsection.php';
				}
				else if(strcasecmp($_POST['day'],"non")==0)
				{
					$_POST['error'] = 'no day selected';
					require_once 'addsection.php';
				}*/
				if($_POST['course_code']=='')
				{
					$_POST['error']='Select a course code from the list!';
					require_once 'addsection.php';
				}
				else if($_POST['section']=='')
				{
					$_POST['error']='Section field must not be empty!';
					require_once 'addsection.php';
				}
				else if($_POST['room']=='')
				{
					$_POST['error']='Room field must not be empty!';
					require_once 'addsection.php';
				}
				else if($_POST['faculty']=='')
				{
					$_POST['error']='Select a faculty from the list!';
					require_once 'addsection.php';
				}
				else if($_POST['tslots']=='')
				{
					$_POST['error']='Total slots field must not be empty!';
					require_once 'addsection.php';
				}
				else if(!(ctype_digit($_POST['tslots'])))
				{
					$_POST['error']='Total slots field must be numeric!';
					require_once 'addsection.php';
				}
				else if($_POST['ctype']=='')
				{
					$_POST['error']='Select a Class type from the list!';
					require_once 'addsection.php';
				}
				else if($_POST['stime']=='')
				{
					$_POST['error']='Start time field must not be empty!';
					require_once 'addsection.php';
				}
				else if($_POST['etime']=='')
				{
					$_POST['error']='End time field must not be empty!';
					require_once 'addsection.php';
				}
				else if($_POST['day']=='')
				{
					$_POST['error']='Select a specific date from the list!';
					require_once 'addsection.php';
				}
				else
				{
						add_section(
							$_POST['course_code'],
							$_POST['section'],
							$_POST['room'],
							$_POST['faculty'],
							$_POST['tslots'],
							$_POST['tslots'],//available slots = total slots
							"0",
							"0",
							"0",
							$_POST['ctype'],
							"0");
							
						add_section_schedule(
							$_POST['course_code'],
							$_POST['section'],
							$_POST['stime'],
							$_POST['etime'],
							$_POST['day']);
						echo "Class Offering Added.";
				}//
			break;
			} else {
				echo "Some inputs missing...";
			}
			break;
		
		case 'Search Course':
			if(isset($_POST['sub']))
			{
				if($_POST['sub']=='')
				{
					require_once 'edit_course.php';
				}
				else
				require_once 'edit_course_list.php';
			}
		break;
		
		case 'Search Section':
			if(isset($_POST['sub']))
			{
				if($_POST['sub']=='')
				{
					require_once 'edit_co.php';
				}
				else
				require_once 'edit_co_list.php';
			}
		break;
			
		case 'Edit Course':
			if(isset($_POST['sub']))
			{
				require_once 'editsubject.php';
			}
			break;
			
		case 'Edit Section':
			if(isset($_POST['course_code'])
				and isset($_POST['section']))
			{
				require_once 'editsection.php';
			}
			break;
			
		case 'Modify Section':
			if(isset($_POST['course_code'])
			and isset($_POST['section'])
			and isset($_POST['room'])
			and isset($_POST['faculty'])
			and isset($_POST['tslots'])
			and isset($_POST['tslots'])
			and isset($_POST['stime'])
			and isset($_POST['etime'])
			and isset($_POST['day']))
			{
				if($_POST['course_code']=='')
				{
					$_POST['error']='Select a course code from the list!';
					require_once 'editsection.php';
				}
				else if($_POST['section']=='')
				{
					$_POST['error']='Section field must not be empty!';
					require_once 'editsection.php';
				}
				else if($_POST['room']=='')
				{
					$_POST['error']='Room field must not be empty!';
					require_once 'editsection.php';
				}
				else if($_POST['faculty']=='')
				{
					$_POST['error']='Select a faculty from the list!';
					require_once 'editsection.php';
				}
				else if($_POST['tslots']=='')
				{
					$_POST['error']='Total slots field must not be empty!';
					require_once 'editsection.php';
				}
				else if(!(ctype_digit($_POST['tslots'])))
				{
					$_POST['error']='Total slots field must be numeric!';
					require_once 'editsection.php';
				}
				else if($_POST['ctype']=='')
				{
					$_POST['error']='Select a Class type from the list!';
					require_once 'editsection.php';
				}
				else if($_POST['stime']=='')
				{
					$_POST['error']='Start time field must not be empty!';
					require_once 'editsection.php';
				}
				else if($_POST['etime']=='')
				{
					$_POST['error']='End time field must not be empty!';
					require_once 'editsection.php';
				}
				else if($_POST['day']=='')
				{
					$_POST['error']='Select a specific date from the list!';
					require_once 'editsection.php';
				}
				else
				{
				edit_section(
					$_POST['course_code'],
					$_POST['section'],
					$_POST['room'],
					$_POST['faculty'],
					$_POST['tslots'],
					$_POST['tslots'], //available slots = total slots
					"0",
					"0",
					"0",
					$_POST['ctype'],
					$_POST['ccode'],
					$_POST['slbl']);
		
				edit_section_schedule(
					$_POST['course_code'],
					$_POST['section'],
					$_POST['stime'],
					$_POST['etime'],
					$_POST['day'],
					$_POST['ccode'],
					$_POST['slbl']);
				echo "Section Modified.";
				}
				
			}
			break;
			
		case 'Modify Course':	
			if(isset($_POST['course_code'])
				and isset($_POST['subject_title'])
				and isset($_POST['action_taken'])
				and isset($_POST['pdate'])
				and isset($_POST['apdate'])
				and isset($_POST['year'])
				and isset($_POST['units'])
				and isset($_POST['deg'])
				and isset($_POST['sem'])
				and isset($_POST['lab_fee']))
			{
				if($_POST['course_code']=='')
				{
					$_POST['error']='Course code field is empty!';
					require_once 'editsubject.php';
				}
				else if($_POST['subject_title']=='')
				{
					$_POST['error']='Course code title field is empty!';
					require_once 'editsubject.php';
				}
				else if($_POST['pdate']=='')
				{
					$_POST['error']='Date Processed field is empty!';
					require_once 'editsubject.php';
				}
				else if($_POST['apdate']=='')
				{
					$_POST['error']='Date approved field is empty!';
					require_once 'editsubject.php';
				}
				else if($_POST['units']=='')
				{
					$_POST['error']='Units field is empty!';
					require_once 'editsubject.php';
				}
				else if(!(ctype_digit($_POST['units'])))
				{
					$_POST['error']='Units field must be numeric!';
					require_once 'editsubject.php';
				}
				else if(!(ctype_digit($_POST['lab_fee'])))
				{
					$_POST['error']='Lab fee field must be numeric!';
					require_once 'editsubject.php';
				}
				else
					{
				update_subject(
					$_POST['course_code'],
					$_POST['subject_title'],
					$_POST['action_taken'],
					strtotime($_POST['pdate']),
					strtotime($_POST['apdate']),
					time(),
					$_POST['year'],
					$_POST['units'],
					$_POST['deg'],
					$_POST['sem'],
					$_POST['lab_fee'],
					$_POST['sub']);
				echo "Course Updated.";
					}
			}
			break;
		case 'Remove Course':
			if(isset($_POST['sub']))
			{
				if($_POST['sub']=='')
				{
					require_once 'remove_course.php';
				}
				else
				require_once 'remove_course_list.php';
			}
			break;	
		
		case 'Remove':
			if(isset($_POST['sub']))
			{
				require_once 'remove_course_info.php';
			}
		break;
		
		case 'Yes':
			if(isset($_POST['course_code']))
			{
				remove_subject($_POST['course_code'],time());
				print("course is removed");
			}
		break;
		
		case 'No':
			redirect('clerk.php');
		break;
			
		case 'Remove Section':
			if(isset($_POST['course_code']))
				{
					if($_POST['course_code']=='')
					{
						require_once 'remove_co.php';
					}
					else
					require_once 'remove_co_list.php';
				}
				break;
				
		case 'Delete':
			if(isset($_POST['course_code'])
				and isset($_POST['section']))
				{
					require_once 'remove_co_info.php';
				}
				break;
		case 'Proceed':
			if(isset($_POST['course_code'])
				and isset($_POST['section']))
				{
					remove_offering($_POST['course_code'],$_POST['section']);
					echo 'Class Offering Removed';
				}
				break;
		case 'Not':
				{
					redirect('clerk.php');
				}
				break;
	} 
}
else if(isset($_REQUEST['dissolve']))
{
	switch($_REQUEST['dissolve'])
	{
		case 'Dissolve Section':
			if($_POST['course_code']=='' and $_POST['section']=='')
			{
				$_POST['error']='Course code field and section field must not be empty!';
				require_once 'dissolve_co.php';
			}
			else if($_POST['course_code']=='')
			{
				$_POST['error']='Course code field must not be empty!';
				require_once 'dissolve_co.php';
			}
			else if($_POST['section']=='')
			{
				$_POST['error']='Section field must not be empty!';
				require_once 'dissolve_co.php';
			}
			else if(mysql_numrows(exist2($_POST['course_code'],$_POST['section'],'section','course_code','section_label'))==0)
			{
				$_POST['error']='Section does not exist!';
				require_once 'dissolve_co.php';
			}
			else if(mysql_numrows(is_dissolved($_POST['course_code'],$_POST['section'],'1')))
			{
				$_POST['error']='Section is already dissolved!';
				require_once 'dissolve_co.php';
			}
			else
			require_once 'dissolve_co_info.php';
		break;
		case 'Yes':
			dissolve_offering($_POST['course_code'],$_POST['section']);
			print('Class Offering '.$_POST['course_code'].$_POST['section'].' is dissolved.');
		break;
		case 'No':
			redirect('clerk.php');
		break;
	}
}
else if(isset($_REQUEST['undissolve']))
{
	switch($_REQUEST['undissolve'])
	{
		case 'Undissolve Section':
			if($_POST['course_code']=='' and $_POST['section']=='')
			{
				$_POST['error']='Course code field and section field must not be empty!';
				require_once 'undissolve_co.php';
			}
			else if($_POST['course_code']=='')
			{
				$_POST['error']='Course code field must not be empty!';
				require_once 'undissolve_co.php';
			}
			else if($_POST['section']=='')
			{
				$_POST['error']='Section field must not be empty!';
				require_once 'undissolve_co.php';
			}
			else if(mysql_numrows(exist2($_POST['course_code'],$_POST['section'],'section','course_code','section_label'))==0)
			{
				$_POST['error']='Section does not exist!';
				require_once 'undissolve_co.php';
			}
			else if(mysql_numrows(is_dissolved($_POST['course_code'],$_POST['section'],'0')))
			{
				$_POST['error']='Section is already undissolved!';
				require_once 'undissolve_co.php';
			}
			else
			require_once 'undissolve_co_info.php';
		break;
		case 'Yes':
			undissolve_offering($_POST['course_code'],$_POST['section']);
			print('Class Offering '.$_POST['course_code'].$_POST['section'].' is undissolved.');
		break;
		case 'No':
			redirect('clerk.php');
		break;
	}
}
else if(isset($_REQUEST['view']))
{
	switch($_REQUEST['view'])
	{
	
		case 'View':
			if($_POST['sem']=='' and $_POST['year']=='')
			{
				$_POST['error']='Select a Year and a semester!';
				require_once 'view_co.php';
			}
			else if($_POST['year']=='')
			{
				$_POST['error']='Select a Year!';
				require_once 'view_co.php';
			}
			else
			{
				require_once 'view_co_list.php';
			}
		break;
	}
}
//print mysql_numrows(exist2('','','section','course_code','section_label'));
else {
		redirect('clerk.php');
	}
?>
<?php //require_once 'footer.php' ?>