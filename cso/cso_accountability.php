<?php
//File: CSO Accountability Class
//Version 2: Revision Date: September 23, 2010
//Version 1: Date: September 13, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

	class Accountability {
		
		//Function to view accountability
		function viewAccountability() {
			$query = "SELECT * from accountability WHERE accountability_status = 'pending'";
			$resu = mysql_query($query);
			$count = 0;

			//show students with pending accountabilities
			while($row = mysql_fetch_array($resu)) {
				$stud_num = $row['student_number'];
				$details = $row['details'];
				$amt_due = $row['amount_due'];
				$semester = $row['semester_incurred'];
				$year = $row['year_incurred'];
				$date = $row['date_added'];
				$acctype_id = $row['accountability_type_id'];
				
				//query student's last name, first name, and middle name
				$res = "SELECT last_name, first_name, middle_name FROM student WHERE student_number='$stud_num'";
				$data = mysql_query($res);
				while($row = mysql_fetch_array($data)) {
					$stud_name = $row['last_name'] . ', ' . $row['first_name'] . ' ' . strtoupper($row['middle_name'][0].'.');
				}

				//query the type of accountability
				$result = "SELECT accountability_type FROM accountability_type WHERE accountability_type_id ='$acctype_id'";
				$datum = mysql_query($result);
				while($row = mysql_fetch_array($datum)) {
					$accountability = $row['accountability_type'];
				}

				//query semester accountability was incurred
				$result2 = "SELECT semester_type FROM semester WHERE semester_id ='$semester'";
				$datu = mysql_query($result2);
				while($row = mysql_fetch_array($datu)) {
					$sem = $row['semester_type'];
				}

				//display the table of students with accountability
				echo "<tr>";
        		echo "<td><div align=center>".$stud_num."</div></td>";
        		echo "<td width=128><div align=center>".$stud_name."</div></td>";
        		echo "<td><div align=center></div><center>".$accountability."</center></td>";
        		echo "<td><div align=center></div><center>".$details."</center></td>";
        		echo "<td width=120><div align=center> Php ".$amt_due."</div></td>";
        		echo "<td><div align=center>".$date." / <br>".$year." / ".$sem."</div></td>";
        			
				//if accountability is from the CSO, put edit and clear links beside the name
				if($acctype_id == 5 || $acctype_id == 6) {
				echo "<td><div align=center><a href='cso_add_student_accountability.php?action=EDIT&id=".$stud_num."&acct=".$acctype_id."'>EDIT</a> | 
					<a href='cso_clear_accountability.php?id=".$stud_num."&acct=".$acctype_id."'>CLEAR</div></td>";
				}
				else {echo "<td><div align=center>N/A</div></td>";
      				echo "</tr>";
				}
				$count++;
			}
			
			if($count==0) {
				echo "<center>NO RECORD FOUND!</center>";
			}
		}

		//Function to clear accountability
		function clearAccountability($student_num, $acc_type_id) {

			//clear accountability
			$date_cleared = (int)date('yyyymmdd');
			$sql = "UPDATE accountability SET
				accountability_status = 'cleared',
				date_cleared = '$date_cleared'
				WHERE student_number = $student_num && accountability_type_id = $acc_type_id";
			
			//mysql_query($sql);
			
			$result = mysql_query("SELECT accountability_type FROM accountability_type WHERE accountability_type_id ='$acc_type_id'");
			$datum = mysql_fetch_array($result);
			$accountability = $datum['accountability_type'];

			if(isset($sql) && !empty($sql)) {
				echo "<script> alert('Student accountability $accountability cleared.'); window.location.href = 
					'cso_students_accountabilities_module.php?action=NA';</script>";
				$result = mysql_query($sql);
			}

		}
					
		//Function to add accountability
		function addAccountability($stnum) {
			session_start();
			$accountability = $_POST['accountability'];
			$details = $_POST['accountability_details'];
			$due = $_POST['amount_due'];
			$ay_incurred = $_POST['academic_year_incurred'];
			$sem = $_POST['semester_incurred'];
			$exact_date = $_POST['exact_date_incurred'];

			$sql = "INSERT INTO accountability
				(student_number, accountability_type_id, details, amount_due, year_incurred, semester_incurred, date_added, accountability_status, 
					employee_id)
				
				VALUES('$stnum', '$accountability', '$details', '$due', '$ay_incurred', '$sem', '$exact_date', 'pending', '".$_SESSION['employee_id'].
					"')";

			//mysql_query($sql);
		
			if(isset($sql) && !empty($sql)) {
				echo "<script> alert('Student accountability successfully added.'); window.location.href = 
					'cso_students_accountabilities_module.php?action=NA';</script>";
				$result = mysql_query($sql);
			}
			
		}

		//Function to search students with accountability
		function searchStudentAccountability() {
			$search = $_POST['search_subject'];
			
			if(is_numeric($search)) {
				$stud_num = $search;
				$last_name = "";
			} else {
				$last_name = $search;
				$stud_num = "";
			}
			if($search!=""){ 
			$query = "SELECT * from accountability WHERE accountability_status = 'pending' && student_number = '$stud_num'";
			$resu = mysql_query($query);
			$count = 0;

			while($row = mysql_fetch_array($resu)) {
				$stud_num = $row['student_number'];
				$details = $row['details'];
				$amt_due = $row['amount_due'];
				$semester = $row['semester_incurred'];
				$year = $row['year_incurred'];
				$date = $row['date_added'];
				$acctype_id = $row['accountability_type_id'];
				
				$res = "SELECT last_name, first_name, middle_name FROM student WHERE student_number='$stud_num'";
				$data = mysql_query($res);
				while($row = mysql_fetch_array($data)) {
					$stud_name = $row['last_name'] . ', ' . $row['first_name'] . ' ' . $row['middle_name'];
				}

				$result = "SELECT accountability_type FROM accountability_type WHERE accountability_type_id ='$acctype_id'";
				$datum = mysql_query($result);
				while($row = mysql_fetch_array($datum)) {
					$accountability = $row['accountability_type'];
				}

				$result2 = "SELECT semester_type FROM semester_mapping WHERE semester_id ='$semester'";
				$datu = mysql_query($result2);
				while($row = mysql_fetch_array($datu)) {
					$sem = $row['semester_type'];
				}

				echo "<tr>";
        			echo "<td><div align=center>".$stud_num."</div></td>";
        			echo "<td width=128><div align=center>".$stud_name."</div></td>";
        			echo "<td><div align=center></div><center>".$accountability."</center></td>";
        			echo "<td><div align=center></div><center>".$details."</center></td>";
        			echo "<td width=120><div align=center> Php ".$amt_due."</div></td>";
        			echo "<td><div align=center>".$date." / <br>".$year." / ".$sem."</div></td>";
        			
				if($acctype_id == 5 || $acctype_id == 6) {
				echo "<td><div align=center><a href='cso_add_student_accountability.php?action=EDIT&id=".$stud_num."&acct=".$acctype_id."'>EDIT</a> | 
						<a href='cso_clear_accountability.php?id=".$stud_num."&acct=".$acctype_id."'>CLEAR</div></td>";
				}
				else {echo "<td><div align=center>N/A</div></td>";
      				echo "</tr>";
				}
				$count++;
			}
			
			if($count==0) {
				echo "<tr><center>NO RECORD FOUND!</center></tr>";
			}
			} else if($search=="") {
				echo "<center>Please Enter a Search Name.</center><br>";
			}
		}

		//Function to edit student accountability
		function editAccountability($stnum, $acc_id) {
			session_start();
			$accountability = $_POST['accountability'];
			$details = $_POST['accountability_details'];
			$due = $_POST['amount_due'];
			$ay_incurred = $_POST['academic_year_incurred'];
			$sem = $_POST['semester_incurred'];
			$exact_date = $_POST['exact_date_incurred'];

			$sql = "UPDATE accountability SET
				 accountability_type_id = '$accountability', 
				 details = '$details', 
				 amount_due = '$due', 
				 year_incurred = '$ay_incurred', 
				 semester_incurred = '$sem', 
				 date_added = '$exact_date',
				 employee_id = '".$_SESSION['employee_id']."'
				
				WHERE student_number = '$stnum' && accountability_id = '$acc_id'";

			//mysql_query($sql);
		
			if(isset($sql) && !empty($sql)) {
				echo "<script> alert('Student accountability successfully added.'); window.location.href = 
					'cso_students_accountabilities_module.php?action=NA';</script>";
				$result = mysql_query($sql);
			}
			
		}

	}
?>