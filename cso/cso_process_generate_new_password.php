<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSO Process Generate New Password</title>
</head>

<body>
<?php
	function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

	}
	include("connect_to_database.php");
	
	$new_password = createRandomPassword();
	$id = $_GET['id'];
	
	switch ($_GET['action']) {
	
		case "STUDENT":
	
			$sql = "UPDATE student SET
				password = '$new_password' WHERE student_number = '$id'";
					
			header("Location:cso_generate_password_change_student_login_account.php?id=$id");
			break;
			
		case "EMPLOYEE":
			
			$sql = "UPDATE employee SET password ='$new_password' WHERE employee_id = '$id'";
					
			header("Location:cso_add_employee_login_info.php?id=$id");
			break;
	}
	
	if(isset($sql) && !empty($sql)) {
			echo "<!--" . $sql . "-->";
			$result = mysql_query($sql);
		}
?>
	
</body>
</html>
