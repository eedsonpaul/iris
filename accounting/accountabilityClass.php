<?php
class Accountability{
	public $accountability_type_id = 0;
	public $details = 'none';
	public $amount_due = 0;
	public $year_incurred = 0;
	public $semester_incurred = 1;
	public $date_added = 20100101;
	public $student_number = 0000000000;
	public $accountability_status = 'N';
	public $employee_id = 0;
	public $date_cleared = 20100101;
	
	function acctg_addAccountability(){
			$accountability_type = $_POST['accountability_type'];
			$details = $_POST['details'];
			$amount_due = $_POST['amount_due'];
			$year_incurred = $_POST['year_incurred'];
			$semester_incurred = $_POST['semester_incurred'];
			$student_number = $_GET['student_number'];
			$query = "Select * from student WHERE student_number = $student_number;";
			$result = mysql_query($query);
			$date_added = date('Ymd');
			$employee_id = $_SESSION['employee_id'];
				//store in database
				$add = "INSERT INTO accountability VALUES ('', $accountability_type, $student_number, '$details', $amount_due, $year_incurred, $semester_incurred, $date_added, $employee_id, 'pending', '1');";
				$addAccountability= mysql_query($add);
				header("Location:accountingSAM.php");
			
		}
		
	function acctg_displayAccountabilities(){
		$query = "Select * from accountability WHERE accountability_status='pending' AND (accountability.accountability_type_id=1 OR accountability.accountability_type_id=3);";
		$query2 = "SELECT * FROM accountability, student, accountability_type WHERE accountability.accountability_type_id = accountability_type.accountability_type_id AND accountability.student_number = student.student_number AND accountability.accountability_status='pending' AND (accountability.accountability_type_id=1 OR accountability.accountability_type_id=3);";
			
		$result = mysql_query($query);
		$result2 = mysql_query($query2);
		$num = mysql_numrows($result);
			if($num == 0){
				echo "<div align=\"center\"><font color = \"gray\"><b><i>No students have accountabilities.</font></i></b></div>";
			}
		
			else{
				$i=0;
				echo "<table border=\"1\">";
				echo "<tr>";
				echo "<th><font size='1'>Student Number</font></td>";
				echo "<th><font size='1'>Name & Course</font></td>";
				echo "<th><font size='1'>Year Incurred</font></td>";
				echo "<th><font size='1'>Semester Incurred</font></td>";
				echo "<th><font size='1'>Date Added</font></td>";
				echo "<th><font size='1'>Accountability Type</font></td>";
				echo "<th><font size='1'>Accountability Details</font></td>";
				echo "<th><font size='1'>Amount Due</font></td>";
				echo "</tr>";
			
				while ($i < $num) {
					$student_number = mysql_result($result2,$i,"student_number");
					$last_name = mysql_result($result2,$i,"last_name");
					$first_name = mysql_result($result2,$i,"first_name");
					$middle_name = mysql_result($result2,$i,"middle_name");
					$degree_program = mysql_result($result2,$i,"degree_program");
					$year_incurred = mysql_result($result2,$i,"year_incurred");
					$semester_incurred = mysql_result($result2,$i,"semester_incurred");
					if($semester_incurred==1){
						$semester ="1st Semester";
					}
					if($semester_incurred==2){
						$semester ="2nd Semester";
					}
					if($semester_incurred==3){
						$semester ="1st Trimester";
					}
					if($semester_incurred==4){
						$semester ="2nd Trimester";
					}
					if($semester_incurred==5){
						$semester ="3rd Trimester";
					}
					$date_added = mysql_result($result2,$i,"date_added");
					$accountability_type = mysql_result($result2,$i,"accountability_type");
					$details = mysql_result($result2,$i,"details");
					$amount_due = mysql_result($result2,$i,"amount_due");
					$accountability_id = mysql_result($result2,$i,"accountability_id"); 
				
					echo "<tr><font size='1'></font>";
					echo "<td height = \"20\"><font size='1'>".$student_number."</font></td>";
					echo "<td><font size='1'>".$last_name.", ".$first_name." ".$middle_name."<br>".$degree_program."</font></td>";
					echo "<td><font size='1'>".$year_incurred."</font></td>";
					echo "<td><font size='1'>".$semester."</font></td>";
					echo "<td><font size='1'>".$date_added."</font></td>";
					echo "<td><font size='1'>".$accountability_type."</font></td>";
					echo "<td><font size='1'>".$details."</font></td>";
					echo "<td><font size='1'>".$amount_due."</font></td>";
					echo "<td><font size='1'><a href=\"accountingEditAccountability.php?id=".$accountability_id."\">Edit</a></font></td>";
					echo "<td><font size='1'><a href=\"accountingClearAccountability.php?id=".$accountability_id."\">Clear</a></font></td>";
					echo "</tr><font size='1'></font>";							
					$i++;
				}
				echo "</table>";
			}
		}
		
		function acctg_editAccountability(){
			include('connect.php');
			$accountability_type = $_POST['accountability_type'];
			$details = $_POST['details'];
			$amount_due = $_POST['amount_due'];
			$year_incurred = $_POST['year_incurred'];
			$semester_incurred = $_POST['semester_incurred'];
			$student_number = $_POST['student_number'];
			$id = $_GET['id'];

			//store in database
			$add = "UPDATE accountability SET accountability_type_id=$accountability_type, details ='$details', amount_due=$amount_due, year_incurred=$year_incurred, semester_incurred=$semester_incurred, student_number=$student_number, accountability_status='pending' WHERE accountability_id=$id;";
			$addAccountability= mysql_query($add);
			header("Location:accountingSAM.php");	
		}
		
		function acctg_clearAccountability(){
			include('connect.php');
			$student_number = $_POST['student_number'];
			$official_receipt_number = $_POST['or_number'];
			$amount_paid = $_POST['amount_paid'];
			$details = $_POST['details'];
			$id = $_POST['id'];
			$date_paid = date('Ymd');
			$date_cleared = date('Ymd');
			$employee_id = $_SESSION['employee_id']; //to be sessioned
			
			//store in database
			$query_amount_due = "SELECT * FROM accountability WHERE accountability_id = $id;";
			$result_amount_due = mysql_query($query_amount_due);
			$amount_due = mysql_result($result_amount_due, 0, amount_due);
			$year_incurred = mysql_result($result_amount_due,0,year_incurred);
			$semester_incurred = mysql_result($result_amount_due,0,semester_incurred);
			if(($official_receipt_number==NULL)&&($amount_paid==NULL)){
				$update = "UPDATE accountability SET accountability_status='cleared', date_cleared = $date_cleared, year_incurred=$year_incurred, semester_incurred=$semester_incurred WHERE accountability_id=$id;";
				$update_call = mysql_query($update);
				header("Location:accountingSAM.php");
			}
			else{
				if($amount_paid != $amount_due || !is_numeric($official_receipt_number)){
				header("Location: accountingClearAccountability.php?id=$id");
				}
				else{
					$add = "INSERT INTO payment VALUES ('$official_receipt_number', $employee_id, $amount_paid, $date_paid, $id, $semester_incurred, $year_incurred);";
					$addOR= mysql_query($add);
					$update = "UPDATE accountability SET accountability_status='cleared', date_cleared = $date_cleared Where accountability_id=$id;";
					mysql_query($update);
					header("Location:accountingSAM.php");
				}
			}
		}
	
		function acctg_viewClearedAccounts(){
			include('connect.php');
			$query = "SELECT * FROM payment";
			$result = mysql_query($query);
			$query2 = "SELECT * FROM accountability, student WHERE accountability.student_number = student.student_number AND accountability.accountability_status='cleared' AND (accountability.accountability_type_id=1 OR accountability.accountability_type_id=3 OR accountability.accountability_type_id=4);";
			$result2 = mysql_query($query2);
			$num = mysql_numrows($result);
			
			if($num == 0){
				echo "<div align=\"center\"><font color = \"gray\"><b><i>No students have been cleared.</font></i></b></div>";
			}
			else{
				$i=0;
				echo "<table border=\"1\">";
				echo "<tr>";
				echo "<td><font size='1'> Student Number</font></td>";
				echo "<td><font size='1'>Name & Course</font></td>";
				echo "<td><font size='1'>Year Incurred</font></td>";
				echo "<td><font size='1'>Semester Incurred</font></td>";
				echo "<td><font size='1'>Date Added</font></td>";
				echo "<td><font size='1'>Official Receipt Number</font></td>";
				echo "<td><font size='1'>Amount Due</font></td>";
				echo "<td><font size='1'>Date Paid</font></td>";
				echo "<td><font size='1'>Date Cleared</font></td>";
				echo "</tr>";
			
				while ($i < $num) {
			
					$accountability_id = mysql_result($result,$i,"accountability_id");
					$query_accountability = "SELECT * FROM accountability WHERE accountability_id = $accountability_id;";
					$result_accountability = mysql_query($query_accountability);
					$student_number = mysql_result($result_accountability, 0, "student_number");
					$query_details = "SELECT * FROM student WHERE student_number=$student_number;";
					$result_details = mysql_query($query_details);
					
					$last_name = mysql_result($result_details,0,"last_name");
					$first_name = mysql_result($result_details,0,"first_name");
					$middle_name = mysql_result($result_details,0,"middle_name");
					$degree_program = mysql_result($result_details,0,"degree_program");
					$year_incurred = mysql_result($result_accountability,0,"year_incurred");
					$semester_incurred = mysql_result($result_accountability,0,"semester_incurred");
					$date_added = mysql_result($result_accountability,0,"date_added");
					$amount_due = mysql_result($result_accountability,0,"amount_due");
					$date_cleared = mysql_result($result_accountability,0,"date_cleared");
					$official_receipt_number = mysql_result($result, $i,"official_receipt_number");
					$date_paid = mysql_result($result,$i,"date_paid");
	
					echo "<tr>";
					echo "<td height = \"20\"><font size='1'>".$student_number."</td>";
					echo "<td><font size='1'>".$last_name.", ".$first_name." ".$middle_name."<br>".$degree_program."</font></td>";
					echo "<td><font size='1'>".$year_incurred."</font></td>";
					echo "<td><font size='1'>".$semester_incurred."</font></td>";
					echo "<td><font size='1'>".$date_added."</font></td>";
					echo "<td><font size='1'>".$official_receipt_number."</font></td>";
					echo "<td><font size='1'>".$amount_due."</font></td>";
					echo "<td><font size='1'>".$date_paid."</font></td>";
					echo "<td><font size='1'>".$date_cleared."</font></td>";
					echo "</tr>";							
					$i++;
			}
			}
			echo "<center><table>";
			echo "</table>";
		}
		
		function acctg_searchAccountability(){
			include('connect.php');
			$last_name = $_POST['last_name'];
			$last_name = "'".$last_name."'";
			
			$query2 = "SELECT * from student, accountability WHERE student.last_name = $last_name AND accountability.student_number = student.student_number AND accountability.accountability_status='pending' AND (accountability.accountability_type_id=1 OR accountability.accountability_type_id=3);";
			$result2 = mysql_query($query2);
			$query3 = "SELECT * FROM accountability, accountability_type WHERE accountability.accountability_type_id = accountability_type.accountability_type_id AND accountability.accountability_status='pending' AND (accountability.accountability_type_id=1 OR accountability.accountability_type_id=3);";
			$result3 = mysql_query($query3);             
			$num = mysql_numrows($result2);
			if($num == 0){
				echo "<div align=\"center\"><font color = \"gray\"><b><i>No Accountabilities.</font></i></b></div>";
			}
			else{
				$i=0;
				echo "<table border=\"1\">";
				echo "<tr>";
				echo "<td><font size='1'>Student Number</font></td>";
				echo "<td><font size='1'>Name & Course</font></td>";
				echo "<td><font size='1'>Year Incurred</font></td>";
				echo "<td><font size='1'>Semester Incurred</font></td>";
				echo "<td><font size='1'>Date Added</font></td>";
				echo "<td><font size='1'>Accountability Type</font></td>";
				echo "<td><font size='1'>Accountability Details</font></td>";
				echo "<td><font size='1'>Amount Due</font></td>";
				
				while ($i < $num) {
					$student_number = mysql_result($result2,$i,"student_number");
					$last_name = mysql_result($result2,$i,"last_name");
					$first_name = mysql_result($result2,$i,"first_name");
					$middle_name = mysql_result($result2,$i,"middle_name");
					$degree_program = mysql_result($result2,$i,"degree_program");
					$year_incurred = mysql_result($result2,$i,"year_incurred");
					$semester_incurred = mysql_result($result2,$i,"semester_incurred");
					$date_added = mysql_result($result2,$i,"date_added");
					$accountability_type = mysql_result($result3,$i,"accountability_type");
					$details = mysql_result($result2,$i,"details");
					$amount_due = mysql_result($result2,$i,"amount_due");
					$accountability_id = mysql_result($result2,$i,"accountability_id"); 
					
					echo "<tr>";
					echo "<td height = \"20\"><font size='1'>".$student_number."</font></td>";
					echo "<td><font size='1'>".$last_name.", ".$first_name."<br>".$degree_program."</font></td>";
					echo "<td><font size='1'>".$year_incurred."</font></td>";
					echo "<td><font size='1'>".$semester_incurred."</font></td>";
					echo "<td><font size='1'>".$date_added."</font></td>";
					echo "<td><font size='1'>".$accountability_type."</font></td>";
					echo "<td><font size='1'>".$details."</font></td>";
					echo "<td><font size='1'>".$amount_due."</font></td>";
					echo "<td><a href=\"accountingEditAccountability.php?id=".$accountability_id."\"><font size='1'>Edit</font></a></td>";
					echo "<td><a href=\"accountingClearAccountability.php?id=".$accountability_id."\"><font size='1'>Clear</font></a></td>";
					echo "</tr>";
					echo "</table>";					
					$i++;
				}
			}
		}
		
		function acctg_enrollStudent(){
			include('connect.php');
			$student_number = $_POST['student_number'];
			$official_receipt_number = $_POST['or_number'];
			$amount_paid = $_POST['amount_paid'];
			$date_paid = $_POST['date'];
			$date_cleared = $_POST['date'];
			$id = $_POST['id'];
			
			//store in database
			$add = "INSERT INTO payment VALUES ('$official_receipt_number','$amount_paid', '$date_paid', 0, '$student_number');";
			$addOR= mysql_query($add);
			header("Location:accountingEM.php");
		}
		
		function acctg_feeAssessment(){
			include('connect.php');
			//$academic_year = $_SESSION['academic_year'];
			//$semester = $_SESSION['semester'];
			$term_incurred = 1; //for SESSION
			$academic_year = 2010; //for SESSION
			$student_number = $_GET['student_number'];
			$s_number = "'".$student_number."'";
			$query = "select * from student_status WHERE student_number = $s_number;";
			$result = mysql_query($query);
			$query_student = "select * from student WHERE student_number = $s_number;";
			$result_student = mysql_query($query_student);
			$query_assessment = "SELECT * FROM assessment_table;";
			$result_assessment = mysql_query($query_assessment);
			
			if(mysql_numrows($result_student)==0){
				//print error here
				header("Location:error.php");
			}
			else{
				$student_lastname = mysql_result($result_student,0,"last_name");
				$student_firstname = mysql_result($result_student,0,"first_name");
				$degree_program = mysql_result($result_student,0,"degree_program");
				$degree_level = mysql_result($result_student,0,"degree_level");
				$year_level = mysql_result($result_student,0,"year_level");
				$stfap_bracket_id = mysql_result($result_student, 0, "stfap_bracket_id");
				$scholarship_id = mysql_result($result_student, 0, "scholarship_id");
				$citizenship = mysql_result($result_student,0,"citizenship");
				
				$query_stfap = "select * from stfap where stfap_bracket_id = $stfap_bracket_id;";
				$result_stfap = mysql_query($query_stfap);
				$amount_per_unit = mysql_result($result_stfap, 0, "amount_per_unit");
				$stfap_bracket = mysql_result($result_stfap,0,"stfap_bracket");
				
				$query_scholarship = "select * from scholarship where scholarship_id = $scholarship_id;";
				$result_scholarship = mysql_query($query_scholarship);
				$amount_shouldered = 0;
				if(mysql_numrows($result_scholarship)==0){ $scholarship = 'NONE'; }
				if(mysql_numrows($result_scholarship)!=0){
					$amount_shouldered = mysql_result($result_scholarship, 0, "amount_shouldered");
					$scholarship = mysql_result($result_scholarship,0,"scholarship_name");
				}
				
				
				echo "<table>";
				echo "<tr>";
				echo "<td><font size='1'>Student Name: ".$student_lastname.", ".$student_firstname."</font></td>";
				echo "<td><font size='1'>Degree Program: ".$degree_program."</font></td>";
				echo "<td><font size='1'>Degree Level: ".$degree_level."</font></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><font size='1'>Student Number: ".$student_number."</font></td>";
				echo "<td><font size='1'>Year Level: ".$year_level."</font></td>";
				if ($citizenship == 'Filipino'){
					$foreign_student = 'false';
					$filipino_citizen = 'true';
				}
				else{
					$foreign_student = 'true';
					$filipino_citizen = 'false';
				}
				echo "<td><font size='1'>Citizenship: ".$citizenship."</font></td>";
				echo "</tr>";
				echo "<tr><td><font size='1'>Scholarship: ".$scholarship."</font></td>";
				echo "<td><font size='1'>STFAP Bracket: ".$stfap_bracket."</font></td></tr>";
				echo "<tr></tr></table>";
				
		
				
				
				$num = mysql_numrows($result);
				$check_assessment = "SELECT * from assessment where student_number=$student_number;";
				$result_check_assessment = mysql_query($check_assessment);
				
				if($num == 0){
					echo "<div align=\"center\"><font color = \"gray\"><font size='1'><b><i>The student has not enrolled in any subject.</font></font></i></b></div>";
				}
				else if(mysql_numrows($result_check_assessment)==0){
					echo "<div align=\"center\"><font color = \"gray\"><font size='1'><b><i>The student has not been assessed.</font></font></i></b></div>";
				}
				else{
					//student fund start
					$community_chest = mysql_result($result_assessment,0,"community_chest");
					$publication = mysql_result($result_assessment,0,"publication");
					$student_council = mysql_result($result_assessment,0,"student_council");
					
					$community_chest_less_stfap = 0;
					$publication_less_stfap= 0;
					$student_council_less_stfap = 0;
					
					$community_chest_amount_shouldered = 0;
					$publication_amount_shouldered = 0;
					$student_council_amount_shouldered = 0;
					
					$community_chest_total_less = $community_chest_less_stfap + $community_chest_amount_shouldered;
					$publication_total_less= $publication_less_stfap + $publication_amount_shouldered;
					$student_council_total_less = $student_council_less_stfap + $student_council_amount_shouldered;	
					
					$community_chest_to_pay = $community_chest - $community_chest_total_less;
					$publication_to_pay = $publication - $publication_total_less;
					$student_council_to_pay = $student_council - $student_council_total_less;
					//student fund end
					
					//miscellaneous start
					$athletics = mysql_result($result_assessment,0,"athletics");
					$cultural = mysql_result($result_assessment,0,"cultural");
					$energy = mysql_result($result_assessment,0,"energy");
					$internet = mysql_result($result_assessment,0,"internet");
					$library = mysql_result($result_assessment,0,"library");
					$medical = mysql_result($result_assessment,0,"medical");
					$registration = mysql_result($result_assessment,0,"registration");
					
					$athletics_less_stfap = 0;
					$cultural_less_stfap = 0;
					$energy_less_stfap = 0;
					$internet_less_stfap = 0;
					$library_less_stfap = 0;
					$medical_less_stfap = 0;
					$registration_less_stfap = 0;
					
					if($stfap_bracket_id == 6){
						$athletics_less_stfap = 55;
						$cultural_less_stfap = 50;
						$energy_less_stfap = 250;
						$internet_less_stfap = 260;
						$library_less_stfap = 700;
						$medical_less_stfap = 50;
						$registration_less_stfap = 40;
					}
					
					$athletics_amount_shouldered = 0;
					$cultural_amount_shouldered = 0;
					$energy_amount_shouldered = 0;
					$internet_amount_shouldered = 0;
					$library_amount_shouldered = 0;
					$medical_amount_shouldered = 0;
					$registration_amount_shouldered = 0;
					
					$athletics_total_less = $athletics_less_stfap + $athletics_amount_shouldered;
					$cultural_total_less = $cultural_less_stfap + $cultural_amount_shouldered;
					$energy_total_less = $energy_less_stfap + $energy_amount_shouldered;
					$internet_total_less = $internet_less_stfap + $internet_amount_shouldered;
					$library_total_less = $library_less_stfap + $library_amount_shouldered;
					$medical_total_less = $medical_less_stfap + $medical_amount_shouldered;
					$registration_total_less = $registration_less_stfap + $registration_amount_shouldered;
					
					
					
					$athletics_to_pay = $athletics - $athletics_total_less;
					$cultural_to_pay = $cultural - $cultural_total_less;
					$energy_to_pay = $energy - $energy_total_less;
					$internet_to_pay = $internet - $internet_total_less;
					$library_to_pay= $library - $library_total_less;
					$medical_to_pay = $medical - $medical_total_less;
					$registration_to_pay = $registration - $registration_total_less;
					//miscellaneous end
					
					//other payment names start
					$nstp_flag = mysql_result($result_check_assessment,0,"nstp");
				
					if($nstp_flag==1){
						$nstp_cwts_ms = 100;
					}
					else{
						$nstp_cwts_ms = 0;
					}
					$non_citizen_fee = mysql_result($result_check_assessment,0,"non_citizen_fee");
					$entrance = mysql_result($result_check_assessment,0,"entrance");
					$deposit = mysql_result($result_check_assessment,0,"deposit");
					$id_fee = mysql_result($result_check_assessment,0,"id_fee");
					$in_residence = mysql_result($result_check_assessment,0,"in_residence");
					
					$nstp_cwts_ms_less_stfap = 0;
					$non_citizen_fee_less_stfap = 0;
					$entrance_less_stfap = 0;
					$deposit_less_stfap = 0;
					$id_fee_less_stfap = 0;
					$in_residence_less_stfap = 0;
									
					$nstp_cwts_ms_amount_shouldered = 0;
					$non_citizen_fee_amount_shouldered = 0;
					$entrance_amount_shouldered = 0;
					$deposit_amount_shouldered = 0;
					$id_fee_amount_shouldered = 0;
					$in_residence_amount_shouldered = 0;
					
					$nstp_cwts_ms_total_less = $nstp_cwts_ms_less_stfap + $nstp_cwts_ms_amount_shouldered;
					$non_citizen_fee_total_less = $non_citizen_fee_less_stfap + $non_citizen_fee_amount_shouldered;
					$entrance_total_less = $entrance_less_stfap + $entrance_amount_shouldered;
					$deposit_total_less = $deposit_less_stfap + $deposit_amount_shouldered;
					$id_fee_total_less = $id_fee_less_stfap + $id_fee_amount_shouldered;
					$in_residence_total_less = $in_residence_less_stfap + $in_residence_amount_shouldered;
					
					
					$nstp_cwts_ms_to_pay = $nstp_cwts_ms - $nstp_cwts_ms_total_less;
					$non_citizen_fee_to_pay = $non_citizen_fee - $non_citizen_fee_total_less;
					$entrance_to_pay = $entrance - $entrance_total_less;
					$deposit_to_pay = $deposit - $deposit_total_less;
					$id_fee_to_pay = $id_fee - $id_fee_total_less;
					$in_residence_to_pay = $in_residence - $in_residence_total_less;
					//other payment names end
				
					echo "<h3>Breakdown of Payment</h3>";
					echo "<table border=1>";
					echo "<tr>";
					echo "<td><h4>PAYMENT NAME</td>";
					echo "<td><h4>AMOUNT DUE</td>";
					echo "<td><h4>LESS(STFAP)</td>";
					echo "<td><h4>LESS(Scholarship)</td>";
					echo "<td><h4>TOTAL LESS</td>";
					echo "<td><h4>TO PAY</td>";
				
					echo "</tr>";
					/*$i=0;
					$j=0;
					$total_units = 0;
					$lab = 0;
					while ($i < $num) {
						$course_code = mysql_result($result,$i,"course_code");
						$query2 = "select * from subject WHERE course_code = '$course_code';";
						$result2 = mysql_query($query2);
						$query3 = "SELECT * from section WHERE course_code = '$course_code';";
						$result3 = mysql_query($query3);
						if(mysql_numrows($result3)!=0){
							$lab_fee = mysql_result($result2, 0, "lab_fee");
							$class_type = mysql_result($result3,0,"class_type");
							if($class_type == 'lec'){
								$units = mysql_result($result2,0,"units");
								$total_units = $total_units + $units;
							}
							else if($class_type == 'lab')
							{
								$lab = $lab + $lab_fee;
							}
						}	
						$i++;
					}*/
					
					$total_units = mysql_result($result_check_assessment,0,"unit_count");
					$lab = mysql_result($result_check_assessment,0,"lab_count");
					
					$tuition = $total_units*600;
					$tuition_to_pay = $total_units*$amount_per_unit;
				
					$less_stfap = 0;
					if($tuition>$tuition_to_pay){
						$less_stfap = $tuition - $tuition_to_pay;
					}
				
					$total_less = $amount_shouldered + $less_stfap;
					$total_tuition_to_pay = $tuition - $total_less;
				
					//lab stuff
					$lab_less_stfap = 0;
					$lab_amount_shouldered = 0;
					$lab_total_less = $lab_less_stfap + $lab_amount_shouldered;
					$lab_to_pay = $lab;
				
				
					//last row values
					$miscellaneous_1 = $athletics + $cultural + $energy + $internet + $library + $medical + $registration;
					$miscellaneous_2 = $community_chest + $publication + $student_council;
					$miscellaneous_1_less_stfap = $athletics_less_stfap + $cultural_less_stfap + $energy_less_stfap + $internet_less_stfap + $library_less_stfap + $medical_less_stfap + $registration_less_stfap;
					$miscellaneous_2_less_stfap = $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap;
					$miscellaneous_1_amount_shouldered = $athletics_amount_shouldered + $cultural_amount_shouldered + $energy_amount_shouldered + $internet_amount_shouldered + $library_amount_shouldered + $medical_amount_shouldered + $registration_amount_shouldered;
					$miscellaneous_2_amount_shouldered = $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered;
					$miscellaneous_1_total_less = $athletics_less_stfap + $cultural_less_stfap + $energy_less_stfap + $internet_less_stfap + $library_less_stfap + $medical_less_stfap + $registration_less_stfap + $athletics_amount_shouldered + $cultural_amount_shouldered + $energy_amount_shouldered + $internet_amount_shouldered + $library_amount_shouldered + $medical_amount_shouldered + $registration_amount_shouldered;
					$miscellaneous_2_total_less = $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap + $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered;
					$miscellaneous_1_to_pay = $miscellaneous_1 - $miscellaneous_1_total_less;
					$miscellaneous_2_to_pay = $miscellaneous_2 - $miscellaneous_2_total_less;
					$total_amount_due = $tuition + $athletics + $cultural + $energy + $internet + $library + $medical + $registration + $community_chest + $publication + $student_council + $lab + $nstp_cwts_ms + $non_citizen_fee + $entrance + $deposit + $id_fee + $in_residence;
					$total_less_stfap = $less_stfap + $athletics_less_stfap + $cultural_less_stfap + $energy_less_stfap + $internet_less_stfap + $library_less_stfap + $medical_less_stfap + $registration_less_stfap + $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap + $lab_less_stfap + $nstp_cwts_ms_less_stfap + $non_citizen_fee_less_stfap + $entrance_less_stfap + $deposit_less_stfap + $id_fee_less_stfap + $in_residence_less_stfap;
					$total_amount_shouldered = $amount_shouldered + $athletics_amount_shouldered + $cultural_amount_shouldered + $energy_amount_shouldered + $internet_amount_shouldered + $library_amount_shouldered + $medical_amount_shouldered + $registration_amount_shouldered + $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered + $lab_amount_shouldered + $nstp_cwts_ms_amount_shouldered + $non_citizen_fee_amount_shouldered + $entrance_amount_shouldered + $deposit_amount_shouldered + $id_fee_amount_shouldered + $in_residence_amount_shouldered;
					$total_total_less = $total_less_stfap + $total_amount_shouldered;
					$total_to_pay = $tuition_to_pay + $athletics_to_pay + $cultural_to_pay + $energy_to_pay + $internet_to_pay + $library_to_pay + $medical_to_pay + $registration_to_pay + $community_chest_to_pay + $publication_to_pay + $student_council_to_pay + $lab_to_pay + $nstp_cwts_ms_to_pay + $non_citizen_fee_to_pay + $entrance_to_pay + $deposit_to_pay + $id_fee_to_pay + $in_residence_to_pay;
					$true_total_to_pay = $total_amount_due - $total_total_less;
					if($true_total_to_pay < 0){
						$true_total_to_pay = 0;
					}
				
					//to be changed, depending on STFAP and scholarship
					echo "<tr>";
					echo "<td>Tuition</td>";
					echo "<td>".$tuition."</td>";
					echo "<td>".$less_stfap."</td><td>".$amount_shouldered."</td><td>".$total_less."</td>";
					echo "<td>".$total_tuition_to_pay."</td></tr>";
					
					
					echo "<tr>";
					echo "<td><a href=\"miscellaneousOne.php?student_number=".$student_number."\">Miscellaneous</a></td>";
					echo "<td>".$miscellaneous_1."</td>";
					echo "<td>".$miscellaneous_1_less_stfap."</td><td>".$miscellaneous_1_amount_shouldered."</td><td>".$miscellaneous_1_total_less."</td>";
					echo "<td>".$miscellaneous_1_to_pay."</td></tr>";
					
					
					echo "<tr>";
					echo "<td><a href=\"miscellaneousTwo.php?student_number=".$student_number."\">Student Fund</a></td>";
					echo "<td>".$miscellaneous_2."</td>";
					echo "<td>".$miscellaneous_2_less_stfap."</td><td>".$miscellaneous_2_amount_shouldered."</td><td>".$miscellaneous_2_total_less."</td>";
					echo "<td>".$miscellaneous_2_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Laboratory Fee</td>";
					echo "<td>".$lab."</td>";
					echo "<td>".$lab_less_stfap."</td><td>".$lab_amount_shouldered."</td><td>".$lab_total_less."</td>";
					echo "<td>".$lab_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>NSTP-CWTS / MS</td>";
					echo "<td>".$nstp_cwts_ms."</td>";
					echo "<td>".$nstp_cwts_ms_less_stfap."</td><td>".$nstp_cwts_ms_amount_shouldered."</td><td>".$nstp_cwts_ms_total_less."</td>";
					echo "<td>".$nstp_cwts_ms_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Non-Citizen Fee</td>";
					echo "<td>".$non_citizen_fee."</td>";
					echo "<td>".$non_citizen_fee_less_stfap."</td><td>".$non_citizen_fee_amount_shouldered."</td><td>".$non_citizen_fee_total_less."</td>";
					echo "<td>".$non_citizen_fee_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Entrance</td>";
					echo "<td>".$entrance."</td>";
					echo "<td>".$entrance_less_stfap."</td><td>".$entrance_amount_shouldered."</td><td>".$entrance_total_less."</td>";
					echo "<td>".$entrance_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Deposit</td>";
					echo "<td>".$deposit."</td>";
					echo "<td>".$deposit_less_stfap."</td><td>".$deposit_amount_shouldered."</td><td>".$deposit_total_less."</td>";
					echo "<td>".$deposit_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>I.D. fee</td>";
					echo "<td>".$id_fee."</td>";
					echo "<td>".$id_fee_less_stfap."</td><td>".$id_fee_amount_shouldered."</td><td>".$id_fee_total_less."</td>";
					echo "<td>".$id_fee_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>In Residence</td>";
					echo "<td>".$in_residence."</td>";
					echo "<td>".$in_residence_less_stfap."</td><td>".$in_residence_amount_shouldered."</td><td>".$in_residence_total_less."</td>";
					echo "<td>".$in_residence_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td></td>";
					echo "<td>".$total_amount_due."</td>";
					echo "<td>".$total_less_stfap."</td><td>".$total_amount_shouldered."</td><td>".$total_total_less."</td>";
					echo "<td>".$true_total_to_pay."</td></tr>";
				
			
					
				
					$query_isAssessed = "SELECT * FROM student_assessment WHERE student_number=$student_number;";
					$query_isAccountable = "SELECT * FROM accountability WHERE student_number=$student_number;";
					$query_isSLB = "SELECT * FROM slb WHERE student_number = $student_number;";
					$query_isPaid = "SELECT * FROM student_assessment WHERE student_number = $student_number AND assessment_status='paid';";
							
					$isAssessed = mysql_query($query_isAssessed);
					$isAccountable = mysql_query($query_isAccountable);
					$isSLB = mysql_query($query_isSLB);
					$isPaid = mysql_query($query_isPaid);
					$lol = mysql_numrows($isPaid);
					if(mysql_numrows($isPaid) == 0){
						if(mysql_numrows($isSLB)== 1){
							$loaned_amount = mysql_result($isSLB,0,"loaned_amount");
							$total_pay = $true_total_to_pay;
							$true_total_to_pay = $true_total_to_pay - $loaned_amount;
							$slb_id = mysql_result($isSLB,0,"slb_id");
							
							if($true_total_to_pay < 0){ $true_total_to_pay = 0;}
							echo "<td>TO PAY: </td><td>".$total_pay." - ".$loaned_amount." = ".$true_total_to_pay."</td>";
							echo "<tr>";
							echo "<tr>";
							echo "<td>Amount Loaned:</td>";
							echo "<td>".$loaned_amount."</td>";
							//echo "</tr>";
							//echo "<tr>";
							echo "<form action=\"editSLB.php?student_number=$student_number\" method=\"POST\">";
							echo "<input type=\"hidden\" name=\"slb_id\" value=$slb_id />";
							echo "<input type=\"hidden\" name=\"term_incurred\" value=$term_incurred />";
							echo "<input type=\"hidden\" name=\"academic_year\" value=$academic_year />";
							echo "<td><input type=\"text\" name=\"loaned_amount\"/></td>";
							echo "<td><input type=\"submit\" value=\"Edit\" />&nbsp;";
							echo "<a href=\"accountingEM.php\"><input type=\"submit\" value=\"Back\" /></a></td>";
							echo "</tr>";
							echo "</table>";
						}
						else{
							if(mysql_numrows($isSLB)==0){
								echo "<td>TO PAY: </td><td>".$true_total_to_pay."</td>";
								echo "</tr>";
								echo "<tr>";
								echo "<form action=\"inputSLB.php?student_number=$student_number\" method=\"POST\">";
								echo "<input type=\"hidden\" name=\"academic_year\" value=$academic_year />";
								echo "<input type=\"hidden\" name=\"term_incurred\" value=$term_incurred />";
								echo "<td>Loan Amount: </td>";
								echo "<td><input type=\"text\" name=\"loaned_amount\"/></td>";
								echo "<td><input type=\"submit\" value=\"Add\" />";
								echo "</tr>";
								echo "</form>";
								echo "</table>";
							}
						}
						echo "</table>";
					}
					else if(mysql_numrows($isPaid)==1){
						$to_pay_amount = mysql_result($isPaid, 0, "to_pay_amount");
						echo "<tr>";
						echo "<td>TO PAY: </td>";
						echo "<td>".$to_pay_amount."</td>";
						echo "<td>PAID ALREADY</td>";
						echo "</tr>";
						echo "</table>";
					}
										
				}
			}
		}
		
		function acctg_inputStudentLoan(){
			include('connect.php');
			$loaned_amount = $_POST['loaned_amount'];
			$employee_id = 0;//$_SESSION['employee_id'];
			$student_number = $_GET['student_number'];
			$term_incurred = $_POST['term_incurred'];
			$academic_year = $_POST['academic_year'];
			$date_added = date('Ymd');
			$query_isAssessed = "SELECT * FROM student_assessment WHERE student_number=$student_number;";
			$isAssessed= mysql_query($query_isAssessed);
			$query_assessedAmount = "SELECT * from student_assessment WHERE student_number=$student_number;";
			$assessedAmount = mysql_query($query_assessedAmount);
			$amount_payable = mysql_result($assessedAmount,0,"to_pay_amount");
				
			//store in database
			$add = "INSERT INTO slb VALUES ('',$loaned_amount, $employee_id, $student_number, $term_incurred, $academic_year);";
			$addOR= mysql_query($add);
			$to_pay_amount = $amount_payable - $loaned_amount;
			$updateAssessment = "UPDATE student_assessment SET to_pay_amount = $to_pay_amount WHERE student_number=$student_number;";
			$update = mysql_query($updateAssessment);
			
			header("Location:searchAssessment.php?student_number=$student_number");
		}
		
		function acctg_editStudentLoan(){
			include('connect.php');
			$slb_id = $_POST['slb_id'];
			$loaned_amount = $_POST['loaned_amount'];
			$employee_id = $_SESSION['employee_id']; //please change
			$student_number = $_GET['student_number'];
			$term_incurred = $_POST['term_incurred'];
			$academic_year = $_POST['academic_year'];
			
			$add = "UPDATE slb SET loaned_amount=$loaned_amount, employee_id =$employee_id, term_incurred=$term_incurred, academic_year = $academic_year WHERE slb_id=$slb_id;";
			$addStudentLoan= mysql_query($add);
			header("Location:searchAssessment.php?student_number=$student_number");
		}
		
		function acctg_generateAccountability(){
			include('connect.php');
			$query_SLB = "SELECT * from slb;";
			$result_SLB = mysql_query($query_SLB);
			$date_added = date('Ymd');
			$num = mysql_numrows($result_SLB);
			if($num!=0){
				$i=0;
				 while($i<$num){
					$loaned_amount = mysql_result($result_SLB,$i,"loaned_amount");
					$student_number = mysql_result($result_SLB,$i,"student_number");
					$term_incurred = mysql_result($result_SLB,$i,"term_incurred");
					$academic_year= mysql_result($result_SLB,$i,"academic_year");
					$add1 = "INSERT INTO accountability VALUES ('', 4, $student_number, 'student loan', $loaned_amount, $academic_year, $term_incurred, $date_added, 1, 'pending', '000000');";
					$addSLB = mysql_query($add1);
					$i++;
				}
			}
			header("Location:accountingGenerateSuccess.php");
		}
		
		function acctg_generateCashReport(){
			include('connect.php');
			$academic_year= $_POST['academic_year'];
			$semester = $_POST['semester'];
			
			$query_enrollment = "SELECT * FROM payment, accountability WHERE accountability.accountability_type_id = 7 AND accountability.accountability_id = payment.accountability_id;";
			$enrollment = mysql_query($query_enrollment);
			
						
			
			echo "<table border =1>";
			echo "<tr>";
			echo "<td>Number</td>";
			echo "<td>Student Number</td>";
			echo "<td>Last Name</td>";
			echo "<td>First Name</td>";
			echo "<td>Middle Name</td>";
			echo "<td>Course</td>";
			echo "<td>Degree Level</td>";
			echo "<td>Registration Status</td>";
			echo "<td>Country</td>";
			echo "<td>College</td>";
			echo "<td>Total Enrolled Units</td>";
			echo "<td>Scholarship</td>";
			echo "<td>STFAP Bracket</td>";
			echo "<td>Tuition Due</td>";
			echo "<td>STFAP Bracket Used</td>";
			echo "<td>STFAP less</td>";
			echo "<td>Tuition Paid</td>";
			echo "<td>Miscellaneous Total Due</td>";
			echo "<td>Miscellaneous Total Paid</td>";
			echo "<td>Student Fund Due</td>";
			echo "<td>Student Fund Paid</td>";
			echo "<td>Laboratory Due</td>";
			echo "<td>Laboratory Paid</td>";
			echo "<td>NSTP Due</td>";
			echo "<td>NSTP Paid</td>";
			echo "<td>Non-Citizen Due</td>";
			echo "<td>Non-Citizen Paid</td>";
			echo "<td>Entrance Due</td>";
			echo "<td>Entrance Paid</td>";
			echo "<td>Deposit Due</td>";
			echo "<td>Deposit Paid</td>";
			echo "<td>ID Due</td>";
			echo "<td>ID Paid</td>";
			echo "<td>Residency Due</td>";
			echo "<td>Total Due</td>";
			echo "<td>STFAP Less</td>";
			echo "<td>Total Loan</td>";
			echo "<td>Total Amount Paid</td>";
			echo "<td>OR Number</td>";
			echo "<td>Date Paid</td>";
			echo "<td>Collected By</td></tr>";
			
			$i = 0;
			
			while($i < mysql_numrows($enrollment)){
				$accountability_id = mysql_result($enrollment,$i,"accountability_id");
				$student_number = mysql_result($enrollment,$i,"student_number");
				$query_student = "SELECT * FROM student where student_number = $student_number;";
				$student = mysql_query($query_student);
				$query_assessment = "SELECT * FROM assessment_table;";
				$result_assessment = mysql_query($query_assessment);
				$check_assessment = "SELECT * from assessment where student_number=$student_number;";
				$result_check_assessment = mysql_query($check_assessment);
				
				
				$last_name = mysql_result($student,0,"last_name");
				$first_name = mysql_result($student,0,"first_name");
				$middle_name = mysql_result($student,0,"middle_name");
				$degree_program = mysql_result($student,0,"degree_program");
				$degree_level = mysql_result($student,0,"degree_level");
				$registration_stat = mysql_result($student,0,"registration_stat");
				$country = mysql_result($student,0,"citizenship");
				$college = 'UPCC';
				
				$query = "select * from student_status WHERE student_number = $student_number;";
				$result = mysql_query($query);
				$num = mysql_numrows($result);
				$j = 0;
				$total_units = 0;
				$lab = 0;
				while ($j < $num) {
					$course_code = mysql_result($result,$j,"course_code");
					$query2 = "select * from subject WHERE course_code = '$course_code';";
					$result2 = mysql_query($query2);
					$query3 = "SELECT * from section WHERE course_code = '$course_code';";
					$result3 = mysql_query($query3);
					if(mysql_numrows($result3)!=0){
						$lab_fee = mysql_result($result2, 0, "lab_fee");
						$class_type = mysql_result($result3,0,"class_type");
						if($class_type == 'lec'){
							$units = mysql_result($result2,0,"units");
							$total_units = $total_units + $units;
						}
						else if($class_type == 'lab')
						{
							$lab = $lab + $lab_fee;
						}
					}	
					$j++;
				}
					
				$total_enrolled_units = $units;
				$scholarship_id = mysql_result($student,0,"scholarship_id");
				$query_scholarship = "select * from scholarship where scholarship_id = $scholarship_id;";
				$result_scholarship = mysql_query($query_scholarship);
				$amount_shouldered = 0;
				if(mysql_numrows($result_scholarship)==0){ $scholarship = 'NONE'; }
				if(mysql_numrows($result_scholarship)!=0){
					$amount_shouldered = mysql_result($result_scholarship, 0, "amount_shouldered");
					$scholarship = mysql_result($result_scholarship,0,"scholarship_name");
				}
				
				$stfap_bracket_id = mysql_result($student,0,"stfap_bracket_id");
				$query_stfap = "select * from stfap where stfap_bracket_id = $stfap_bracket_id;";
				$result_stfap = mysql_query($query_stfap);
				$amount_per_unit = mysql_result($result_stfap, 0, "amount_per_unit");
				$stfap_bracket = mysql_result($result_stfap,0,"stfap_bracket");
				
				$tuition = $total_units*600;
				$tuition_to_pay = $total_units*$amount_per_unit;
				
				$stfap_bracket_used = $stfap_bracket;
				$less_stfap = 0;
				if($tuition>$tuition_to_pay){
					$less_stfap = $tuition - $tuition_to_pay;
				}
				
				$query_scholarship = "select * from scholarship where scholarship_id = $scholarship_id;";
				$result_scholarship = mysql_query($query_scholarship);
				$amount_shouldered = 0;
				if(mysql_numrows($result_scholarship)==0){ $scholarship = 'NONE'; }
				if(mysql_numrows($result_scholarship)!=0){
					$amount_shouldered = mysql_result($result_scholarship, 0, "amount_shouldered");
					$scholarship = mysql_result($result_scholarship,0,"scholarship_name");
				}
				
				$total_less = $amount_shouldered + $less_stfap;
				$total_tuition_to_pay = $tuition - $total_less;
				
				//miscellaneous start
					$athletics = mysql_result($result_assessment,0,"athletics");
					$cultural = mysql_result($result_assessment,0,"cultural");
					$energy = mysql_result($result_assessment,0,"energy");
					$internet = mysql_result($result_assessment,0,"internet");
					$library = mysql_result($result_assessment,0,"library");
					$medical = mysql_result($result_assessment,0,"medical");
					$registration = mysql_result($result_assessment,0,"registration");
					
					$athletics_less_stfap = 0;
					$cultural_less_stfap = 0;
					$energy_less_stfap = 0;
					$internet_less_stfap = 0;
					$library_less_stfap = 0;
					$medical_less_stfap = 0;
					$registration_less_stfap = 0;
					
					if($stfap_bracket_id == 6){
						$athletics_less_stfap = 55;
						$cultural_less_stfap = 50;
						$energy_less_stfap = 250;
						$internet_less_stfap = 260;
						$library_less_stfap = 700;
						$medical_less_stfap = 50;
						$registration_less_stfap = 40;
					}
					
					$athletics_amount_shouldered = 0;
					$cultural_amount_shouldered = 0;
					$energy_amount_shouldered = 0;
					$internet_amount_shouldered = 0;
					$library_amount_shouldered = 0;
					$medical_amount_shouldered = 0;
					$registration_amount_shouldered = 0;
					
					$athletics_total_less = $athletics_less_stfap + $athletics_amount_shouldered;
					$cultural_total_less = $cultural_less_stfap + $cultural_amount_shouldered;
					$energy_total_less = $energy_less_stfap + $energy_amount_shouldered;
					$internet_total_less = $internet_less_stfap + $internet_amount_shouldered;
					$library_total_less = $library_less_stfap + $library_amount_shouldered;
					$medical_total_less = $medical_less_stfap + $medical_amount_shouldered;
					$registration_total_less = $registration_less_stfap + $registration_amount_shouldered;
					
					
					
					$athletics_to_pay = $athletics - $athletics_total_less;
					$cultural_to_pay = $cultural - $cultural_total_less;
					$energy_to_pay = $energy - $energy_total_less;
					$internet_to_pay = $internet - $internet_total_less;
					$library_to_pay= $library - $library_total_less;
					$medical_to_pay = $medical - $medical_total_less;
					$registration_to_pay = $registration - $registration_total_less;
					//miscellaneous end
				
				
				//student fund start
				$community_chest = mysql_result($result_assessment,0,"community_chest");
				$publication = mysql_result($result_assessment,0,"publication");
				$student_council = mysql_result($result_assessment,0,"student_council");
				
				$community_chest_less_stfap = 0;
				$publication_less_stfap= 0;
				$student_council_less_stfap = 0;
				
				$community_chest_amount_shouldered = 0;
				$publication_amount_shouldered = 0;
				$student_council_amount_shouldered = 0;
				
				$community_chest_total_less = $community_chest_less_stfap + $community_chest_amount_shouldered;
				$publication_total_less= $publication_less_stfap + $publication_amount_shouldered;
				$student_council_total_less = $student_council_less_stfap + $student_council_amount_shouldered;	
				
				$community_chest_to_pay = $community_chest - $community_chest_total_less;
				$publication_to_pay = $publication - $publication_total_less;
				$student_council_to_pay = $student_council - $student_council_total_less;
				//student fund end
				
				//other payment names start
					$nstp_flag = mysql_result($result_check_assessment,0,"nstp");
				
					if($nstp_flag==1){
						$nstp_cwts_ms = 100;
					}
					else{
						$nstp_cwts_ms = 0;
					}
					$non_citizen_fee = mysql_result($result_check_assessment,0,"non_citizen_fee");
					$entrance = mysql_result($result_check_assessment,0,"entrance");
					$deposit = mysql_result($result_check_assessment,0,"deposit");
					$id_fee = mysql_result($result_check_assessment,0,"id_fee");
					$in_residence = mysql_result($result_check_assessment,0,"in_residence");
					
					$nstp_cwts_ms_less_stfap = 0;
					$non_citizen_fee_less_stfap = 0;
					$entrance_less_stfap = 0;
					$deposit_less_stfap = 0;
					$id_fee_less_stfap = 0;
					$in_residence_less_stfap = 0;
					
					$nstp_cwts_ms_amount_shouldered = 0;
					$non_citizen_fee_amount_shouldered = 0;
					$entrance_amount_shouldered = 0;
					$deposit_amount_shouldered = 0;
					$id_fee_amount_shouldered = 0;
					$in_residence_amount_shouldered = 0;
					
					$nstp_cwts_ms_total_less = $nstp_cwts_ms_less_stfap + $nstp_cwts_ms_amount_shouldered;
					$non_citizen_fee_total_less = $non_citizen_fee_less_stfap + $non_citizen_fee_amount_shouldered;
					$entrance_total_less = $entrance_less_stfap + $entrance_amount_shouldered;
					$deposit_total_less = $deposit_less_stfap + $deposit_amount_shouldered;
					$id_fee_total_less = $id_fee_less_stfap + $id_fee_amount_shouldered;
					$in_residence_total_less = $in_residence_less_stfap + $in_residence_amount_shouldered;
									
					$nstp_cwts_ms_to_pay = $nstp_cwts_ms - $nstp_cwts_ms_total_less;
					$non_citizen_fee_to_pay = $non_citizen_fee - $non_citizen_fee_total_less;
					$entrance_to_pay = $entrance - $entrance_total_less;
					$deposit_to_pay = $deposit - $deposit_total_less;
					$id_fee_to_pay = $id_fee - $id_fee_total_less;
					$in_residence_to_pay = $in_residence - $in_residence_total_less;
					//other payment names end
				
				//lab stuff
				$lab_less_stfap = 0;
				$lab_amount_shouldered = 0;
				$lab_total_less = $lab_less_stfap + $lab_amount_shouldered;
				$lab_to_pay = $lab; //lab due and lab paid
			
				$miscellaneous_1 = $athletics + $cultural + $energy + $internet + $library + $medical + $registration;
				$miscellaneous_2 = $community_chest + $publication + $student_council;
				$miscellaneous_1_less_stfap = $athletics_less_stfap + $cultural_less_stfap + $energy_less_stfap + $internet_less_stfap + $library_less_stfap + $medical_less_stfap + $registration_less_stfap;
				$miscellaneous_2_less_stfap = $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap;
				$miscellaneous_1_amount_shouldered = $athletics_amount_shouldered + $cultural_amount_shouldered + $energy_amount_shouldered + $internet_amount_shouldered + $library_amount_shouldered + $medical_amount_shouldered + $registration_amount_shouldered;
				$miscellaneous_2_amount_shouldered = $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered;
				$miscellaneous_1_total_less = $athletics_less_stfap + $cultural_less_stfap + $energy_less_stfap + $internet_less_stfap + $library_less_stfap + $medical_less_stfap + $registration_less_stfap + $athletics_amount_shouldered + $cultural_amount_shouldered + $energy_amount_shouldered + $internet_amount_shouldered + $library_amount_shouldered + $medical_amount_shouldered + $registration_amount_shouldered;
				$miscellaneous_2_total_less = $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap + $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered;
				$miscellaneous_1_to_pay = $miscellaneous_1 - $miscellaneous_1_total_less;
				$miscellaneous_2_to_pay = $miscellaneous_2 - $miscellaneous_2_total_less;
				$total_amount_due = $tuition + $athletics + $cultural + $energy + $internet + $library + $medical + $registration + $community_chest + $publication + $student_council + $lab + $nstp_cwts_ms + $non_citizen_fee + $entrance + $deposit + $id_fee + $in_residence;
				$total_less_stfap = $less_stfap + $athletics_less_stfap + $cultural_less_stfap + $energy_less_stfap + $internet_less_stfap + $library_less_stfap + $medical_less_stfap + $registration_less_stfap + $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap + $lab_less_stfap + $nstp_cwts_ms_less_stfap + $non_citizen_fee_less_stfap + $entrance_less_stfap + $deposit_less_stfap + $id_fee_less_stfap + $in_residence_less_stfap;
				$total_amount_shouldered = $amount_shouldered + $athletics_amount_shouldered + $cultural_amount_shouldered + $energy_amount_shouldered + $internet_amount_shouldered + $library_amount_shouldered + $medical_amount_shouldered + $registration_amount_shouldered + $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered + $lab_amount_shouldered + $nstp_cwts_ms_amount_shouldered + $non_citizen_fee_amount_shouldered + $entrance_amount_shouldered + $deposit_amount_shouldered + $id_fee_amount_shouldered + $in_residence_amount_shouldered;
				$total_total_less = $total_less_stfap + $total_amount_shouldered;
				$total_to_pay = $tuition_to_pay + $athletics_to_pay + $cultural_to_pay + $energy_to_pay + $internet_to_pay + $library_to_pay + $medical_to_pay + $registration_to_pay + $community_chest_to_pay + $publication_to_pay + $student_council_to_pay + $lab_to_pay + $nstp_cwts_ms_to_pay + $non_citizen_fee_to_pay + $entrance_to_pay + $deposit_to_pay + $id_fee_to_pay + $in_residence_to_pay;
				$true_total_to_pay = $total_amount_due - $total_total_less;
				if($true_total_to_pay < 0){
					$true_total_to_pay = 0;
				}
			
				$query_SLB = "select * FROM slb WHERE student_number = $student_number;";
				$SLB = mysql_query($query_SLB);
				
				if(mysql_numrows($SLB)!=0){
					$total_loan = mysql_result($SLB,0,"loaned_amount");
				}
				else{
					$total_loan = 0;
				}
				
				$total_amount_paid = mysql_result($enrollment,$i,"amount_paid");
				$official_receipt_number = mysql_result($enrollment,$i,"official_receipt_number");
				$date_paid = mysql_result($enrollment,$i,"date_paid");
				$employee_id = $_SESSION['employee_id'];
				$query_employee = "SELECT * FROM employee WHERE employee_id = $employee_id;";
				$employee = mysql_query($query_employee);
				$employee_last_name = mysql_result($employee,0,"last_name");
				$employee_first_name = mysql_result($employee,0,"first_name");
				$employee_middle_name = mysql_result($employee,0,"middle_name");
				$collected_by = $employee_last_name+", "+$employee_first_name+" "+$employee_middle_name;
				
				
				
				echo "<tr>";
				echo "<td>".$num."</td>";
				echo "<td>".$student_number."</td>";
				echo "<td>".$last_name."</td>";
				echo "<td>".$first_name."</td>";
				echo "<td>".$middle_name."</td>";
				echo "<td>".$degree_program."</td>";
				echo "<td>".$degree_level."</td>";
				echo "<td>".$registration_stat."</td>";
				echo "<td>".$country."</td>";
				echo "<td>".$college."</td>";
				echo "<td>".$units."</td>";
				echo "<td>".$scholarship."</td>";
				echo "<td>".$stfap_bracket."</td>";
				echo "<td>".$tuition."</td>";
				echo "<td>".$stfap_bracket_used."</td>";
				echo "<td>".$less_stfap."</td>";
				echo "<td>".$total_tuition_to_pay."</td>";
				echo "<td>".$miscellaneous_1."</td>";
				echo "<td>".$miscellaneous_1_to_pay."</td>";
				echo "<td>".$miscellaneous_2."</td>";
				echo "<td>".$miscellaneous_2_to_pay."</td>";
				echo "<td>".$lab."</td>";
				echo "<td>".$lab_to_pay."</td>";
				echo "<td>".$nstp_cwts_ms."</td>";
				echo "<td>".$nstp_cwts_ms_to_pay."</td>";
				echo "<td>".$non_citizen_fee."</td>";
				echo "<td>".$non_citizen_fee_to_pay."</td>";
				echo "<td>".$entrance."</td>";
				echo "<td>".$entrance_to_pay."</td>";
				echo "<td>".$deposit."</td>";
				echo "<td>".$deposit_to_pay."</td>";
				echo "<td>".$id_fee."</td>";
				echo "<td>".$id_fee_to_pay."</td>";
				echo "<td>".$in_residence."</td>";
				echo "<td>".$true_total_to_pay."</td>";
				echo "<td>".$total_less_stfap."</td>";
				echo "<td>".$total_loan."</td>";
				echo "<td>".$total_amount_paid."</td>";
				echo "<td>".$official_receipt_number."</td>";
				echo "<td>".$date_paid."</td>";
				echo "<td>".$collected_by."</td></tr>";
				$i++;
			}
			echo "</table>";
		}				
		
		function acctg_addAccountabilitySearch(){
			$search_option= $_GET['search_option'];
			$search_query= $_GET['search_query'];
			
			if(($search_option!="")&&($search_query!="")){
			if($search_option=='student_number'){
					$student_number=$search_query;
					$last_name ="";
					$query_lastName="SELECT * FROM student WHERE student_number='$student_number';";
					$lastName=mysql_query($query_lastName);
					$num = mysql_numrows($lastName);
					if($num==0){
					echo"<table>No student found with that Student Number.</table>";
					}
				}
				if($search_option=='last_name'){
					$last_name=$search_query;
					$query_lastName="SELECT * FROM student WHERE last_name='$last_name';";
					$lastName = mysql_query($query_lastName);
					$num = mysql_numrows($lastName);
					if($num==0){
						echo"<table>No student found with that Last Name.</table>";
					}
					else{
						$student_number =mysql_result($lastName,0,"student_number");
					}
				}
				if(mysql_numrows($lastName)!=0){
					$query_studentNumber = "SELECT * from student WHERE student_number=$student_number;";
					$studentNumber = mysql_query($query_studentNumber);
					if(mysql_numrows($studentNumber)!=0){
						echo "<font size='1'><center></font>";
						echo "<font size='1'><table></font>";
						echo "<tr>";
						echo "<td><font size='1'>Student Number: </font></td>";
						echo "<td><font size='1'>Name: </font></td>";
						echo "<td><font size='1'> Course & Year: </font></td>";
						echo "<td><font size='1'></font></td></tr>";
						
						$num = mysql_numrows($studentNumber);
						$i = 0;
						while($i < $num){
							$last_name = mysql_result($studentNumber,$i,"last_name");
							$first_name = mysql_result($studentNumber,$i,"first_name");
							$middle_name = mysql_result($studentNumber,$i,"middle_name");
							$degree_program = mysql_result($studentNumber,$i,"degree_program");
							$year_level = mysql_result($studentNumber,$i,"year_level");
							
							echo "<tr>";
							echo "<td><font size='1'>".$student_number."</font></td>";
							echo "<td><font size='1'>".$last_name.", ".$first_name." ".$middle_name."</font></td>";
							echo "<td><font size='1'>".$degree_program." ".$year_level."</font></td>";
							echo "<td><font size='1'><a href=\"accountingAddAccountability.php?student_number=$student_number\"><input type=\"submit\" value=\"Add\" /></a></font></td></tr>";
							
							$i++;
						}
						echo "</table>";
					}
				}
			}
			
		}
}

?>
