<?php
require_once 'header.php';
require_once 'osa_functions.php';
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
	}
}
?>