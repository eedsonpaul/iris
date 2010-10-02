<?php
require_once 'header.php';
require_once 'subject_functions.php';
require_once 'offering_functions.php';
require_once '../cssandstuff/http.php';

if(isset($_REQUEST['c']))
{
	switch($_REQUEST['c'])
	{
		case 'Add Subject':
			if(isset($_POST['course_code'])
				and isset($_POST['subject_title'])
				and isset($_POST['action_taken'])
				and isset($_POST['repeatable_to'])
				and isset($_POST['pdate'])
				and isset($_POST['apdate'])
				and isset($_POST['fdate'])
				and isset($_POST['rdate'])
				and isset($_POST['abdate'])
				and isset($_POST['year'])
				and isset($_POST['units'])
				and isset($_POST['deg'])
				and isset($_POST['sem']))
			{
				add_subject(
					$_POST['course_code'],
					$_POST['subject_title'],
					$_POST['action_taken'],
					$_POST['repeatable_to'],
					strtotime($_POST['pdate']),
					strtotime($_POST['apdate']),
					time(),
					strtotime($_POST['rdate']),
					strtotime($_POST['abdate']),
					"",
					$_POST['year'],
					$_POST['units'],
					$_POST['deg'],
					$_POST['sem'],
					"0");
				echo "Course Added.";
			} else{
				echo "Some inputs missing...";
			}
			redirect('subject_management_module.php');
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
			and isset($_POST['day']))
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
						break;
			} else {
				echo "Some inputs missing...";
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
				echo "Class Offering Modified.";
			}
			break;
			
		case 'Modify Course':	
			if(isset($_POST['course_code'])
				and isset($_POST['subject_title'])
				and isset($_POST['action_taken'])
				and isset($_POST['repeatable_to'])
				and isset($_POST['pdate'])
				and isset($_POST['apdate'])
				and isset($_POST['year'])
				and isset($_POST['units'])
				and isset($_POST['deg'])
				and isset($_POST['sem']))
			{
				update_subject(
					$_POST['course_code'],
					$_POST['subject_title'],
					$_POST['action_taken'],
					$_POST['repeatable_to'],
					strtotime($_POST['pdate']),
					strtotime($_POST['apdate']),
					time(),
					$_POST['year'],
					$_POST['units'],
					$_POST['deg'],
					$_POST['sem'],
					$_POST['sub']);
				echo "Subject Updated.";
			}
			break;
			
		case 'Remove Course':
			if(isset($_POST['sub']))
			{
				remove_subject($_POST['sub'],time());
				print("course is removed");
			}
			break;
			
		case 'Remove Section':
			if(isset($_POST['course_code'])
				and isset($_POST['section']))
				{
					remove_offering($_POST['course_code'],$_POST['section']);
					echo 'Class Offering Removed';
				}
				break;
		case 'Dissolve Section':
			if(isset($_POST['course_code'])
				and isset($_POST['section']))
				{
					dissolve_offering($_POST['course_code'],$_POST['section']);
					print('Class Offering '.$_POST['course_code'].$_POST['section'].' is dissolved.');
				}
			break;
		case 'Undissolve Section':
			if(isset($_POST['course_code'])
				and isset($_POST['section']))
				{
					undissolve_offering($_POST['course_code'],$_POST['section']);
					print('Class Offering '.$_POST['course_code'].$_POST['section'].' is undissolved.');
				}
			break;
	} 
} else {
		redirect('clerk.php');
	}
?>
<?php require_once 'footer.php' ?>