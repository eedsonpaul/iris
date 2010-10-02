<?php
require_once 'header.php';
require_once 'osa_functions.php';
require_once 'scholarship_stfap.php';
require_once '../cssandstuff/http.php';

if(isset($_REQUEST['remove']))
{
	switch($_REQUEST['remove'])
	{
		case 'Go':
		if(isset($_POST['snum']))
			{
				require_once 'remove_student_scholarship_list.php';
			}
		break;
		
		case 'Remove Scholarship':
		if(isset($_POST['student_number']))
		{
			require_once 'remove_student_scholarship_info.php';
		}
		break;
		
		case 'No':
			redirect('osa.php');
		break;
		
		case 'Yes';
			if(isset($_POST['student_number']))
			{
				remove_student_scholarship($_POST['student_number']);
				print('Student '.$_POST['student_number'].' scholarship has been removed');
			}
		break;
	}
}
?>