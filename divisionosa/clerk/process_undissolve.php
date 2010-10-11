<?php require_once 'header.php';
if(isset($_REQUEST['undissolve']))
{
	switch($_REQUEST['undissolve'])
	{
		case 'Undissolve Section':
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
?> 