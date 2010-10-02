<?php
	include("connect_to_database.php");
	
	switch ($_GET['action']) {
		case "REMOVE":
		$id = $_GET['id'];				
		$sql = "DELETE FROM employee WHERE employee_id = '$id'";
			
		echo "<script> alert('Employee removed.'); window.location.href = 'cso_remove_employee_record.php';</script>";
		break;
	}
				
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
	}
?>
