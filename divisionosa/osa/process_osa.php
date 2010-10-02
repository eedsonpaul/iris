<?php
require_once 'header.php';
require_once 'osa_functions.php';
require_once 'scholarship_stfap.php';
require_once '../cssandstuff/http.php';

if(isset($_REQUEST['osa']))
{
	switch($_REQUEST['osa'])
	{
		case 'Add Accountability':
			if(isset($_POST['aid'])
				and isset($_POST['atype'])
				and isset($_POST['snum'])
				and isset($_POST['details'])
				and isset($_POST['adue'])
				and isset($_POST['year'])
				and isset($_POST['sem'])
				and isset($_POST['eid'])
				and isset($_POST['astat'])
				and isset($_POST['date_cleared']))
			{
				add_a(
					$_POST['aid'],
					$_POST['atype'],
					$_POST['snum'],
					$_POST['details'],
					$_POST['adue'],
					$_POST['year'],
					$_POST['sem'],
					time(),
					$_POST['eid'],
					$_POST['astat'],
					$_POST['date_cleared']
					);
				print("Student Accountability assigned.");
			}
		break;
		
		case 'Edit Student Bracket':
			if(isset($_POST['student_id'])
				and isset($_POST['bracket_id']))
			{
				update_bracket_student(
				$_POST['student_id'],
				$_POST['bracket_id']);
				
				print("STFAP Bracket assigned.");
			}
		break;
		
		case 'View Accountability':
			if(isset($_POST['studnum'])) 
			{
				require_once 'accountability.php';
			}
		break;
		
		case 'Add Approved Scholarship':
			if(isset($_POST['scholarship_id'])
				and isset($_POST['scholarship_name'])
				and isset($_POST['amount_shouldered']))
			{
				add_approved_scholarship($_POST['scholarship_id'],$_POST['scholarship_name'],$_POST['amount_shouldered']);
				print('Approved Scholarship added.');
			}
		break;
		
		case 'Search Scholarship':
			if(isset($_POST['scholarship_name']))
			{
				require_once 'edit_scholarship_list.php';
			}
		break;
		
		case 'Edit':
			if(isset($_POST['scholarship_id']))
			{
				require_once 'edit_scholarship_info.php';
			}
		break;
		
		case 'Edit Scholarship Info':
			if(isset($_POST['scholarship_id'])
				and isset($_POST['scholarship_name'])
				and isset($_POST['amount_shouldered']))
			{
				edit_scholarship_info($_POST['scholarship_id'],$_POST['scholarship_name'],$_POST['amount_shouldered'],$_POST['sid']);
				print('scholarship info updated');
			}
		break;
		
		case 'Search Scholarship to remove':
			if(isset($_POST['scholarship_name']))
			{
				require_once 'remove_scholarship_list.php';
			}
		break;
		
		case 'Remove':
			if(isset($_POST['scholarship_id']))
			{
				require_once 'remove_scholarship_info.php';
			}
		break;
		
		case 'Yes':
			if(isset($_POST['scholarship_id']))
			{
				remove_scholarship($_POST['scholarship_id']);
				print('Scholarship '.$_POST['scholarship_name'].' has been removed.');
			}
		break;
		
		case 'No':
			redirect('osa.php');
		break;
		
		case 'Add Scholarship':
			if(isset($_POST['snum'])
			and isset($_POST['scholarship']))
			{
				add_student_scholarship($_POST['snum'],$_POST['scholarship']);
				print('Scholarship updated for student number '.$_POST['snum'].'.');
			}
		break;
		
		case 'Search Student':
			if(isset($_POST['snum']))
			{
				require_once 'edit_student_scholarship_list.php';
			}
		break;
		
		case 'Edit Scholarship':
			if(isset($_POST['student_number']))
			{
				require_once 'edit_student_scholarship_info.php';
			}
		break;
		
		case 'Edit Student Scholarship':
			if(isset($_POST['snum'])
			and isset($_POST['scholarship']))
			{
				edit_student_scholarship($_POST['scholarship'],$_POST['snum']);
				print('Student number <strong>'.$_POST['snum'].'</strong> scholarship has changed.');
			}
		break;
	}
}
?>