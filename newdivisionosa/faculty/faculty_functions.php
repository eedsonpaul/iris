<?php
	require_once '../cssandstuff/dbconnect.php';
	require_once '../cssandstuff/general_functions.php';
	
	function retrieve_sections($emp_id)
	{
		$q = 	"SELECT course_code, section_label
				FROM section
				WHERE employee_id =  '$emp_id'";
		if(!$q) die("Cannot Retrieve sections".mysql_error());
	}
	
	function print_coursecode_label()
	{
	}
?>