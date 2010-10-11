<?php require_once 'header.php';
if(isset($_REQUEST['dissolve']))
{
	switch($_REQUEST['dissolve'])
	{
		case 'Dissolve Section':
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
?>