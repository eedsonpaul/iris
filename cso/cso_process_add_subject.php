<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSO Process Add Subject</title>
</head>

<body>
<?php
	include("connect_to_database.php");
	
	$sql = "INSERT INTO subject 
				(subject_id, 
				subject_name,
				subject_title, 
				repeatable_to, 
				date_processed, 
				date_approved,
				date_first_implemented, 
				date_revision_implemented,  
				unit_in_charge, 
				lab_fee, 
				units, 
				degree_level)
					
			VALUES (
					'".$_POST['subject_rcode']."',
					'".$_POST['subject_name']."',
					'".$_POST['subject_title']."',
					'".$_POST['repeatable_to']."',
					'".$_POST['date_proposed']."',
					'".$_POST['date_approved']."',
					'".$_POST['date_first_implemented']."', 
					'".$_POST['date_revision_implemented']."',
					'".$_POST['unit_in_charged']."',
					'".$_POST['laboratory_fee']."',
					'".$_POST['units']."',
					'".$_POST['degree_level']."')";
					echo "<script> alert('Subject successfully added.'); window.location.href = 'cso_subject_management_module.php';</script>";

	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
		}
?>
</body>
</html>
