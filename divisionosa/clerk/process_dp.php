<?php
require_once 'header.php';
require_once 'degree_functions.php';
if(isset($_REQUEST['dp']))
{
	switch($_REQUEST['dp'])
	{
		case 'Add Degree Program':
			if(isset($_POST['program_code'])
				and isset($_POST['degree_name'])
				and isset($_POST['degree_level'])
				and isset($_POST['required_years'])
				and isset($_POST['required_units'])
				and isset($_POST['major'])
				and isset($_POST['minor'])
				and isset($_POST['degree_title'])
				and isset($_POST['credited'])
				and isset($_POST['currently_offered'])
				and isset($_POST['entrance_code'])
				and isset($_POST['enrollment_quota'])
				and isset($_POST['date_proposed'])
				and isset($_POST['unit'])
				)
				{
				if($_POST['program_code']=='')
				{
					$_POST['error']='Program code field is empty!';
					require_once 'add_degree_program.php';
				}
				else if(!(ctype_digit($_POST['program_code'])))
				{
					$_POST['error']='Program code field must be numeric!';
					require_once 'add_degree_program.php';
				}
				else if(mysql_numrows(exist($_POST['program_code'],'degree_program','program_code')))
				{
					$_POST['error']='Degree Program already exist!';
					require_once 'add_degree_program.php';
				}
				else if($_POST['degree_name']=='')
				{
					$_POST['error']='Degree name field is empty!';
					require_once 'add_degree_program.php';
				}
				else if(mysql_numrows(exist($_POST['degree_name'],'degree_program','degree_name')))
				{
					$_POST['error']='Degree Name already exist!';
					require_once 'add_degree_program.php';
				}
				else if($_POST['required_years']=='')
				{
					$_POST['error']='Required years field is empty!';
					require_once 'add_degree_program.php';
				}
				else if(!(ctype_digit($_POST['required_years'])))
				{
					$_POST['error']='Required years field must be numeric!';
					require_once 'add_degree_program.php';
				}
				else if($_POST['required_units']=='')
				{
					$_POST['error']='Required units field is empty!';
					require_once 'add_degree_program.php';
				}
				else if(!(ctype_digit($_POST['required_units'])))
				{
					$_POST['error']='Required units field must be numeric!';
					require_once 'add_degree_program.php';
				}
				else if($_POST['major']=='')
				{
					$_POST['error']='Major field is empty!';
					require_once 'add_degree_program.php';
				}
				else if($_POST['minor']=='')
				{
					$_POST['error']='Minor field is empty!';
					require_once 'add_degree_program.php';
				}
				else if($_POST['degree_title']=='')
				{
					$_POST['error']='Degree Title field is empty!';
					require_once 'add_degree_program.php';
				}
				else if($_POST['entrance_code']=='')
				{
					$_POST['error']='Entrance code field is empty!';
					require_once 'add_degree_program.php';
				}
				else if(!(ctype_digit($_POST['entrance_code'])))
				{
					$_POST['error']='Entrance code field must be numeric!';
					require_once 'add_degree_program.php';
				}
				
				else if($_POST['enrollment_quota']=='')
				{
					$_POST['error']='Enrollment quota field is empty!';
					require_once 'add_degree_program.php';
				}
				else if(!(ctype_digit($_POST['enrollment_quota'])))
				{
					$_POST['error']='Enrollment quota field must be numeric!';
					require_once 'add_degree_program.php';
				}
				else if($_POST['date_proposed']=='')
				{
					$_POST['error']='Date proposed field is empty!';
					require_once 'add_degree_program.php';
				}
				else if(!(ctype_digit($_POST['program_code'])))
				{
					$_POST['error']='Program code field must be numeric!';
					require_once 'add_degree_program.php';
				}
				else
				{
					echo insert_degree(
					'',
					$_POST['program_code'],
					$_POST['degree_level'],
					$_POST['required_years'],
					$_POST['required_units'],
					$_POST['degree_name'],
					$_POST['major'],
					$_POST['minor'],
					$_POST['degree_title'],
					$_POST['credited'],
					$_POST['currently_offered'],
					$_POST['entrance_code'],
					$_POST['enrollment_quota'],
					strtotime($_POST['date_proposed']),
					$_POST['unit']);
					}
				}
		break;
		case 'Search Degree':
			if(isset($_POST['degree_name']))
			{
				if($_POST['degree_name']=='')
				{
					require_once 'edit_degree_program.php';
				}
				else
				require_once 'edit_degree_program_list.php';
			}
		break;
		case 'Remove Degree':
			if(isset($_POST['degree_name']))
			{
				if($_POST['degree_name']=='')
				{
					require_once 'remove_degree.php';
				}
				else
				require_once 'remove_degree_program_list.php';
			}
		break;
		case 'Remove':
			if(isset($_POST['degree_program_id']))
			{
				require_once 'remove_degree_program_info.php';
			}
		break;
		case 'Proceed':
			if(isset($_POST['degree_program_id']))
			{
				echo remove_degree($_POST['degree_program_id']);
			}
		break;
		case 'Do Not':
			redirect('clerk.php');
		break;
		case 'Edit':
			if(isset($_POST['degree_program_id']))
			{
				require_once 'edit_degree_program_info.php';
			}
		break;
		case 'Edit Degree Program':
			if(isset($_POST['program_code'])
				and isset($_POST['degree_name'])
				and isset($_POST['degree_level'])
				and isset($_POST['required_years'])
				and isset($_POST['required_units'])
				and isset($_POST['major'])
				and isset($_POST['minor'])
				and isset($_POST['degree_title'])
				and isset($_POST['credited'])
				and isset($_POST['currently_offered'])
				and isset($_POST['entrance_code'])
				and isset($_POST['enrollment_quota'])
				and isset($_POST['date_proposed'])
				and isset($_POST['unit'])
				and isset($_POST['degree_program_id'])
				)
				{
				if($_POST['program_code']=='')
				{
					$_POST['error']='Program code field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				else if(!(ctype_digit($_POST['program_code'])))
				{
					$_POST['error']='Program code field must be numeric!';
					require_once 'edit_degree_program_info.php';
				}
				/*else if(mysql_numrows(exist($_POST['program_code'],'degree_program','program_code')))
				{
					$_POST['error']='Degree Program already exist!';
					require_once 'edit_degree_program_info.php';
				}*/
				else if($_POST['degree_name']=='')
				{
					$_POST['error']='Degree name field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				/*else if(mysql_numrows(exist($_POST['degree_name'],'degree_program','degree_name')))
				{
					$_POST['error']='Degree Name already exist!';
					require_once 'edit_degree_program_info.php';
				}*/
				else if($_POST['required_years']=='')
				{
					$_POST['error']='Required years field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				else if(!(ctype_digit($_POST['required_years'])))
				{
					$_POST['error']='Required years field must be numeric!';
					require_once 'edit_degree_program_info.php';
				}
				else if($_POST['required_units']=='')
				{
					$_POST['error']='Required units field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				else if(!(ctype_digit($_POST['required_units'])))
				{
					$_POST['error']='Required units field must be numeric!';
					require_once 'edit_degree_program_info.php';
				}
				else if($_POST['major']=='')
				{
					$_POST['error']='Major field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				else if($_POST['minor']=='')
				{
					$_POST['error']='Minor field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				else if($_POST['degree_title']=='')
				{
					$_POST['error']='Degree Title field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				else if($_POST['entrance_code']=='')
				{
					$_POST['error']='Entrance code field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				else if(!(ctype_digit($_POST['entrance_code'])))
				{
					$_POST['error']='Entrance code field must be numeric!';
					require_once 'edit_degree_program_info.php';
				}
				
				else if($_POST['enrollment_quota']=='')
				{
					$_POST['error']='Enrollment quota field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				else if(!(ctype_digit($_POST['enrollment_quota'])))
				{
					$_POST['error']='Enrollment quota field must be numeric!';
					require_once 'edit_degree_program_info.php';
				}
				else if($_POST['date_proposed']=='')
				{
					$_POST['error']='Date proposed field is empty!';
					require_once 'edit_degree_program_info.php';
				}
				else if(!(ctype_digit($_POST['program_code'])))
				{
					$_POST['error']='Program code field must be numeric!';
					require_once 'edit_degree_program_info.php';
				}
				else
					{				
					echo update_degree(
					$_POST['program_code'],
					$_POST['degree_level'],
					$_POST['required_years'],
					$_POST['required_units'],
					$_POST['degree_name'],
					$_POST['major'],
					$_POST['minor'],
					$_POST['degree_title'],
					$_POST['credited'],
					$_POST['currently_offered'],
					$_POST['entrance_code'],
					$_POST['enrollment_quota'],
					strtotime($_POST['date_proposed']),
					time(),
					$_POST['unit'],
					$_POST['degree_program_id']);
					}
				}
		break;
	}
}
?>