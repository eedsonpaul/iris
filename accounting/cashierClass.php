<?php
class Accountability{
	function acctg_feeAssessment(){
		include('connect.php');
		//$academic_year = $_SESSION['academic_year'];
		//$semester = $_SESSION['semester'];
		$student_number = $_GET['student_number'];
		$s_number = "'".$student_number."'";
		$query = "select * from student_status WHERE student_number = $student_number AND status='confirmed';";
		$result = mysql_query($query);
		$query_student = "select * from student WHERE student_number = $s_number;";
		$result_student = mysql_query($query_student);
		$query_isAssessed = "SELECT * FROM student_assessment WHERE student_number=$student_number;";
		$isAssessed = mysql_query($query_isAssessed);
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
			echo "<tr><font size='1'><td>Scholarship: ".$scholarship."</font></td>";
			echo "<td><font size='1'>STFAP Bracket: ".$stfap_bracket."</font></td></tr>";
			echo "<tr></tr></table>";
			
			

			
			$query_isStatusPaid = "SELECT * FROM student_status where student_number=$student_number AND status='paid';";
			$isStatusPaid = mysql_query($query_isStatusPaid);
			$num = mysql_numrows($isStatusPaid);
			$query_isAssessed = "SELECT * FROM student_assessment WHERE student_number=$student_number;";
			$query_isAccountable = "SELECT * FROM accountability WHERE student_number=$student_number AND accountability_status = 'pending';";
			$query_isSLB = "SELECT * FROM slb WHERE student_number = $student_number;";
			$query_isPaid = "SELECT * FROM student_assessment WHERE student_number = $student_number AND assessment_status='paid';";
					
			$isAssessed = mysql_query($query_isAssessed);
			$isAccountable = mysql_query($query_isAccountable);
			$isSLB = mysql_query($query_isSLB);
			$isPaid = mysql_query($query_isPaid);
			
			$check_assessment = "SELECT * from assessment where student_number=$student_number;";
			$result_check_assessment = mysql_query($check_assessment);
			
			if(($num == 0)&&(mysql_numrows($isAccountable)==0)){
					echo "<div align=\"center\"><font color=\"gray\"><b><i>The student has not enrolled in any subject.</font></i></b></div>";
					echo "<a href=\"cashier.php\"><input type=\"submit\" value=\"Back\" /></a></td>";
			}
			else{
				if(mysql_numrows($isAccountable)!=0){
					echo "Unable to process request. Please clear accountabilities first.<br><br>";
					echo "<a href=\"cashier.php\"><input type=\"submit\" value=\"Back\" /></a></td>";
					
				}
				else if(mysql_numrows($result_check_assessment)==0){
					echo "Unable to process request. Please go to your adviser for your assessment.<br><br>";
					echo "<a href=\"cashier.php\"><input type=\"submit\" value=\"Back\" /></a></td>";
					
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
					echo "<td><font size='1'>Tuition</td>";
					echo "<td><font size='1'>".$tuition."</td>";
					echo "<td><font size='1'>".$less_stfap."</td><td>".$amount_shouldered."</td><td>".$total_less."</td>";
					echo "<td><font size='1'>".$total_tuition_to_pay."</td></tr>";
					
					
					echo "<tr>";
					echo "<td><font size='1'><a href=\"cashierMiscellaneousOne.php?student_number=".$student_number."\">Miscellaneous</a></td>";
					echo "<td><font size='1'>".$miscellaneous_1."</td>";
					echo "<td><font size='1'>".$miscellaneous_1_less_stfap."</td><td>".$miscellaneous_1_amount_shouldered."</td><td>".$miscellaneous_1_total_less."</td>";
					echo "<td><font size='1'>".$miscellaneous_1_to_pay."</td></tr>";
					
					
					echo "<tr>";
					echo "<td><font size='1'><a href=\"cashierMiscellaneousTwo.php?student_number=".$student_number."\">Student Fund</a></td>";
					echo "<td><font size='1'>".$miscellaneous_2."</td>";
					echo "<td><font size='1'>".$miscellaneous_2_less_stfap."</td><td>".$miscellaneous_2_amount_shouldered."</td><td>".$miscellaneous_2_total_less."</td>";
					echo "<td><font size='1'>".$miscellaneous_2_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td><font size='1'>Laboratory Fee</td>";
					echo "<td><font size='1'>".$lab."</td>";
					echo "<td><font size='1'>".$lab_less_stfap."</td><td>".$lab_amount_shouldered."</td><td>".$lab_total_less."</td>";
					echo "<td><font size='1'>".$lab_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td><font size='1'>NSTP-CWTS / MS</td>";
					echo "<td><font size='1'>".$nstp_cwts_ms."</td>";
					echo "<td><font size='1'>".$nstp_cwts_ms_less_stfap."</td><td>".$nstp_cwts_ms_amount_shouldered."</td><td>".$nstp_cwts_ms_total_less."</td>";
					echo "<td><font size='1'>".$nstp_cwts_ms_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td><font size='1'>Non-Citizen Fee</td>";
					echo "<td><font size='1'>".$non_citizen_fee."</td>";
					echo "<td><font size='1'>".$non_citizen_fee_less_stfap."</td><td>".$non_citizen_fee_amount_shouldered."</td><td>".$non_citizen_fee_total_less."</td>";
					echo "<td><font size='1'>".$non_citizen_fee_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td><font size='1'>Entrance</td>";
					echo "<td><font size='1'>".$entrance."</td>";
					echo "<td><font size='1'>".$entrance_less_stfap."</td><td>".$entrance_amount_shouldered."</td><td>".$entrance_total_less."</td>";
					echo "<td><font size='1'>".$entrance_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td><font size='1'>Deposit</td>";
					echo "<td><font size='1'>".$deposit."</font></td>";
					echo "<td><font size='1'>".$deposit_less_stfap."</font></td><td><font size='1'>".$deposit_amount_shouldered."</font></td><td><font size='1'>".$deposit_total_less."</font></td>";
					echo "<td><font size='1'>".$deposit_to_pay."</font></td></tr>";
					
					echo "<tr>";
					echo "<td><font size='1'>I.D. fee</td>";
					echo "<td><font size='1'>".$id_fee."</font></td>";
					echo "<td><font size='1'>".$id_fee_less_stfap."</font></td><td><font size='1'>".$id_fee_amount_shouldered."</font></td><td><font size='1'>".$id_fee_total_less."</font></td>";
					echo "<td><font size='1'>".$id_fee_to_pay."</font></td></tr>";
					
					echo "<tr>";
					echo "<td><font size='1'>In Residence</font></td>";
					echo "<td><font size='1'>".$in_residence."</font></td>";
					echo "<td><font size='1'>".$in_residence_less_stfap."</font></td><td><font size='1'>".$in_residence_amount_shouldered."</font></td><td><font size='1'>".$in_residence_total_less."</font></td>";
					echo "<td><font size='1'>".$in_residence_to_pay."</font></td></tr>";
					
					echo "<tr>";
					echo "<td></td>";
					echo "<td><font size='1'>".$total_amount_due."</font></td>";
					echo "<td><font size='1'>".$total_less_stfap."</font></td><td><td><font size='1'>".$total_amount_shouldered."</font></td><td>".$total_total_less."</font></td>";
					echo "<td><font size='1'>".$true_total_to_pay."</font></td></tr>";
				
					if(mysql_numrows($isAccountable)==0){
						if(mysql_numrows($isAssessed)==0){
							$add = "INSERT INTO student_assessment VALUES ('',$true_total_to_pay, 'unpaid', $student_number);";
							$addAss = mysql_query($add);
						}
						else{
							$to_pay_amount = mysql_result($isAssessed,0,"to_pay_amount");
							$academic_year = 2010; //SET TO SESSION
							if(mysql_numrows($isPaid)==1){
								if(mysql_numrows($isSLB)==1){
									$loaned_amount = mysql_result($isSLB,0,"loaned_amount");
									$total_pay = $true_total_to_pay;
									$to_pay_amount = $total_pay - $loaned_amount;
									echo "<td><font size='1'>TO PAY: </font></td><td><font size='1'>".$total_pay." - ".$loaned_amount." = ".$to_pay_amount."</font></td>";
									echo "<td><font size='1'>(SLB)</font></td></tr>";
								}
								else{
									echo "<tr>";
									echo "<td><font size='1'>TO PAY: </font></td>";
									echo "<td><font size='1'>".$to_pay_amount."</font></td>";
									echo "</tr>";
								}
								echo "<tr>";
								echo "<td><font size='1'>PAID ALREADY</font></td>";
								echo "<td><font size='1'><a href=\"cashierEM.php\"><input type=\"submit\" value=\"Back\" /></a></font></td>";
								echo "</tr>";
								echo "</table>";
							}
							else{
								if(mysql_numrows($isSLB)==1){
									$loaned_amount = mysql_result($isSLB,0,"loaned_amount");
									$total_pay = $true_total_to_pay;
									$to_pay_amount = $total_pay - $loaned_amount;
									echo "<td><font size='1'>TO PAY: </font></td><td><font size='1'>".$total_pay." - ".$loaned_amount." = ".$to_pay_amount."</font></td>";
									echo "<td><font size='1'>(SLB)</font></td></tr>";
									
									$update_SLB = "UPDATE student_assessment SET to_pay_amount = $to_pay_amount WHERE student_number=$student_number;";
									$updateSLB = mysql_query($update_SLB);
								}
								else{
									echo "<tr>";
									echo "<td><font size='1'>TO PAY: </font></td>";
									echo "<td><font size='1'>".$to_pay_amount."</font></td></tr>";
								}
								echo "<tr>";
								echo "<form action=\"cashierEnrollStudent.php?student_number=$student_number\" method=\"POST\">";
								echo "<input type=\"hidden\" name=\"student_number\" value=\"<?php echo $student_number;?>\"/>";
								echo "<input type=\"hidden\" name=\"academic_year\" value=\"<?php echo $academic_year;?>\"/>";
								echo "<td><font size='1'>OR number:</font></td>";
								echo "<td><font size='1'><input type=\"text\" name=\"official_receipt_number\"/></font></td>";
								echo "<td><font size='1'>Amount:</font></td>";
								echo "<td><font size='1'><input type=\"text\" name=\"amount_paid\"/></font></td>";
								echo "<td><font size='1'><input type=\"submit\" value=\"Enroll\" /></font></td>";
								echo "</tr>";
								echo "</table>";
							}
						}
					}
					else{
						echo "<tr>";
						echo "<td><font size='1'> Unable to process request. Please clear all accountabilities.</font></td>";
						echo "</tr>";
						echo "</table>";
					}
				}
			}	
		}
	}
		
	function acctg_enrollStudent(){
		$student_number = $_GET['student_number'];
		$query_clear = "SELECT * FROM student_assessment WHERE student_number = $student_number;";
		$is_clear = mysql_query($query_clear);
		$clear = mysql_result ($is_clear, 0, "student_number");
		$official_receipt_number = $_POST['official_receipt_number'];
		$amount_paid = $_POST['amount_paid'];
		$date_paid = date('Ymd');
		$accountability_type_id = 7; //for editing
		$semester = 1; //for update by me
		$academic_year = 2010; //for update by me too
		$employee_id = $_SESSION['employee_id']; //for session
		
		$i = 0;
		$query = "select * from student_status WHERE student_number = $student_number AND status='confirmed';";
		$result = mysql_query($query);
	
		$query_isSLB = "SELECT * FROM slb WHERE student_number = $student_number;";
		$isSLB = mysql_query($query_isSLB);
		$amount_payable = mysql_result($is_clear, 0, "to_pay_amount");
		
		
		if(!is_numeric($amount_paid) || (!is_numeric($official_receipt_number)) || ($amount_paid!=$amount_payable)){
			header("Location:searchCashierAssessment.php?student_number=$student_number");
		}
		else if($amount_paid == $amount_payable){
			$accountable = "INSERT INTO accountability VALUES ('', 7, $student_number, 'enrollment', $amount_payable, $academic_year, $semester, $date_paid, $employee_id, 'cleared', $date_paid);";
			$updateAccountability = mysql_query($accountable);
			$get_accountability_id = "SELECT * FROM accountability WHERE student_number=$student_number AND accountability_type_id = 7 AND year_incurred=$academic_year AND semester_incurred = $semester;";
			$result_accountability_id = mysql_query($get_accountability_id);
			$accountability_id = mysql_result($result_accountability_id,0,"accountability_id");
			$add = "INSERT INTO payment VALUES ($official_receipt_number, $employee_id, $amount_paid, $date_paid, $accountability_id, $semester, $academic_year);";
			$enrollStudent= mysql_query($add);
			$clear = "UPDATE student_assessment SET assessment_status = 'paid' WHERE student_number=$student_number;";
			$clearAssessment= mysql_query($clear);
			
			$num = mysql_numrows($result);
			
			while ($i < $num) {
				$course_code = mysql_result($result,$i,"course_code");
				$update_status = "UPDATE student_status SET status='paid' WHERE course_code='$course_code';";
				$result_update_status= mysql_query($update_status);
				echo $update_status;
				$i++;
			}
			header("Location:searchCashierAssessment.php?student_number=$student_number");
		}
	}
	
	function acctg_displayAccountabilities($student_number){
		$query2 = "SELECT * FROM accountability, student, accountability_type WHERE accountability.accountability_type_id = accountability_type.accountability_type_id AND accountability.student_number = student.student_number AND accountability.accountability_status='pending' AND accountability.student_number = $student_number AND (accountability.accountability_type_id=1 OR accountability.accountability_type_id=3 OR accountability.accountability_type_id=5 OR accountability.accountability_type_id=6);";
		$result = mysql_query($query2);
		$result2 = mysql_query($query2);
		$num = mysql_numrows($result);
			if($num == 0){
				echo "<div align=\"center\"><font color = \"gray\"><b><i>No students have accountabilities.</font></i></b></div>";
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
					$accountability_type = mysql_result($result2,$i,"accountability_type");
					$details = mysql_result($result2,$i,"details");
					$amount_due = mysql_result($result2,$i,"amount_due");
					$accountability_id = mysql_result($result2,$i,"accountability_id"); 
				
					echo "<tr>";
					echo "<td height = \"20\"><font size='1'>".$student_number."</font></td>";
					echo "<td><font size='1'>".$last_name.", ".$first_name." ".$middle_name."<br>".$degree_program."</font></td>";
					echo "<td><font size='1'>".$year_incurred."</font></td>";
					echo "<td><font size='1'>".$semester_incurred."</font></td>";
					echo "<td><font size='1'>".$date_added."</font></td>";
					echo "<td><font size='1'>".$accountability_type."</font></td>";
					echo "<td><font size='1'>".$details."</font></td>";
					echo "<td><font size='1'>".$amount_due."</font></td>";
					echo "<td><font size='1'><a href=\"cashierClearAccountability.php?id=".$accountability_id."\">Clear</a></font></td>";
					echo "</tr>";							
					$i++;
				}
				echo "</table>";
			}
		}
		
		
		 function acct_inputSLBPayment(){
			 $student_number = $_GET['student_number'];
			 $query_isSLB = "SELECT * FROM accountability WHERE student_number = $student_number AND accountability_type_id = 4 AND accountability_status='pending';";
			 $isSLB = mysql_query($query_isSLB);
			
			 if(mysql_numrows($isSLB) == 0){
				 echo "<div align=\"center\"><font color = \"gray\"><b><i>The student does not have any accountabilities.</font></i></b></div>";
			 }
			else{
				$query_student = "SELECT * FROM student WHERE student_number=$student_number;";
				$result2 = mysql_query($query_student);
				$i=0;
				echo "<table border=\"1\">";
				echo "<tr>";
				echo "<td><font size='1'>Student Number</font></td>";
				echo "<td><font size='1'>Name & Course</font></td>";
				echo "<td><font size='1'>Year Incurred</font></td>";
				echo "<td><font size='1'>Semester Incurred</font></td>";
				echo "<td><font size='1'>Date Added</font></td>";
				echo "<td><font size='1'>Accountability Details</font></td>";
				echo "<td><font size='1'>Amount Due</font></td>";
			
			while($i < mysql_numrows($isSLB)){
				$student_number = mysql_result($result2,$i,"student_number");
				$last_name = mysql_result($result2,$i,"last_name");
				$first_name = mysql_result($result2,$i,"first_name");
				$middle_name = mysql_result($result2,$i,"middle_name");
				$degree_program = mysql_result($result2,$i,"degree_program");
				$year_incurred = mysql_result($isSLB,$i,"year_incurred");
				$semester_incurred = mysql_result($isSLB,$i,"semester_incurred");
				$date_added = mysql_result($isSLB,$i,"date_added");
				$details = mysql_result($isSLB,$i,"details");
				$amount_due = mysql_result($isSLB,$i,"amount_due");
				$accountability_id = mysql_result($isSLB,$i,"accountability_id"); 
			
				echo "<tr>";
				echo "<td height = \"20\"><font size='1'>".$student_number."</font></td>";
				echo "<td><font size='1'>".$last_name.", ".$first_name." ".$middle_name."<br>".$degree_program."</font></td>";
				echo "<td><font size='1'>".$year_incurred."</font></td>";
				echo "<td><font size='1'>".$semester_incurred."</font></td>";
				echo "<td><font size='1'>".$date_added."</font></td>";
				echo "<td><font size='1'>".$details."</font></td>";
				echo "<td><font size='1'>".$amount_due."</font></td>";
				echo "<td><font size='1'><a href=\"cashierClearSLB.php?id=".$accountability_id."\">Input Payment</a></font></td>";
				echo "</tr>";							
				$i++;
			}
			echo "</table>";
		 }
		 
	}
	
	function acct_clearSLB(){
		include('connect.php');
			$student_number = $_POST['student_number'];
			$official_receipt_number = $_POST['or_number'];
			$amount_paid = $_POST['amount_paid'];
			$id = $_POST['id'];
			$date_paid = date('Ymd');
			$date_cleared = date('Ymd');
			//store in database
			$query_amount_due = "SELECT * FROM accountability WHERE accountability_id = $id;";
			$result_amount_due = mysql_query($query_amount_due);
			$amount_due = mysql_result($result_amount_due, 0, "amount_due");
			if($amount_paid != $amount_due || !is_numeric($official_receipt_number)){
			header("Location: cashierClearSLB.php?id=$id");
			}
			else{
				$add = "INSERT INTO payment VALUES ('$official_receipt_number','$amount_paid', '$date_paid', 0, '$student_number');";
				$addOR= mysql_query($add);
				$update = "UPDATE accountability SET accountability_status='cleared', date_cleared = $date_cleared Where accountability_id=$id;";
				mysql_query($update);
				$delete = "DELETE FROM slb WHERE student_number=$student_number;";
				mysql_query($delete);
				header("Location:cashier.php");
			}
	}
	
	 function acct_inputScholarshipPayment(){
			 $student_number = $_GET['student_number'];
			 $query_isSLB = "SELECT * FROM accountability WHERE student_number = $student_number AND accountability_type_id = 1  AND accountability_status='pending';";
			 $isSLB = mysql_query($query_isSLB);
			
			 if(mysql_numrows($isSLB) == 0){
				 echo "<div align=\"center\"><font color = \"gray\"><b><i>The student does not have any accountabilities.</font></i></b></div>";
			 }
			else{
				$query_student = "SELECT * FROM student WHERE student_number=$student_number;";
				$result2 = mysql_query($query_student);
				$i=0;
				echo "<table border=\"1\">";
				echo "<tr>";
				echo "<td>Student Number</td>";
				echo "<td>Name & Course</td>";
				echo "<td>Year Incurred</td>";
				echo "<td>Semester Incurred</td>";
				echo "<td>Date Added</td>";
				echo "<td>Accountability Details</td>";
				echo "<td>Amount Due</td>";
			
			while($i < mysql_numrows($isSLB)){
				$student_number = mysql_result($result2,$i,"student_number");
				$last_name = mysql_result($result2,$i,"last_name");
				$first_name = mysql_result($result2,$i,"first_name");
				$middle_name = mysql_result($result2,$i,"middle_name");
				$degree_program = mysql_result($result2,$i,"degree_program");
				$year_incurred = mysql_result($isSLB,$i,"year_incurred");
				$semester_incurred = mysql_result($isSLB,$i,"semester_incurred");
				$date_added = mysql_result($isSLB,$i,"date_added");
				$details = mysql_result($isSLB,$i,"details");
				$amount_due = mysql_result($isSLB,$i,"amount_due");
				$accountability_id = mysql_result($isSLB,$i,"accountability_id"); 
			
				echo "<tr>";
				echo "<td height = \"20\">".$student_number."</td>";
				echo "<td>".$last_name.", ".$first_name." ".$middle_name."<br>".$degree_program."</td>";
				echo "<td>".$year_incurred."</td>";
				echo "<td>".$semester_incurred."</td>";
				echo "<td>".$date_added."</td>";
				echo "<td>".$details."</td>";
				echo "<td>".$amount_due."</td>";
				echo "<td><a href=\"cashierClearScholarship.php?id=".$accountability_id."\">Input Payment</a></td>";
				echo "</tr>";							
				$i++;
			}
			echo "</table>";
		 }
	}
	
	function acct_clearScholarship(){
		include('connect.php');
			$student_number = $_POST['student_number'];
			$official_receipt_number = $_POST['or_number'];
			$amount_paid = $_POST['amount_paid'];
			$id = $_POST['id'];
			$date_paid = date('Ymd');
			$date_cleared = date('Ymd');
			//store in database
			$query_amount_due = "SELECT * FROM accountability WHERE accountability_id = $id;";
			$result_amount_due = mysql_query($query_amount_due);
			$amount_due = mysql_result($result_amount_due, 0, "amount_due");
			if($amount_paid != $amount_due || !is_numeric($official_receipt_number)){
			header("Location: cashierClearSLB.php?id=$id");
			}
			else{
				$add = "INSERT INTO payment VALUES ('$official_receipt_number','$amount_paid', '$date_paid', 0, '$student_number');";
				$addOR= mysql_query($add);
				$update = "UPDATE accountability SET accountability_status='cleared', date_cleared = $date_cleared Where accountability_id=$id;";
				mysql_query($update);
				header("Location:cashierSAM.php");
			}
	}
	
	function acct_inputOthersPayment(){
			 $student_number = $_GET['student_number'];
			 $query_isSLB = "SELECT * FROM accountability WHERE student_number = $student_number AND accountability_status='pending' AND ( accountability_type_id = 3  OR accountability_type_id=5 OR accountability_type_id=6);";
			 $isSLB = mysql_query($query_isSLB);
			
			 if(mysql_numrows($isSLB) == 0){
				 echo "<div align=\"center\"><font color = \"gray\"><b><i>The student does not have any accountabilities.</font></i></b></div>";
			 }
			else{
				$query_student = "SELECT * FROM student WHERE student_number=$student_number;";
				$result2 = mysql_query($query_student);
				$i=0;
				echo "<table border=\"1\">";
				echo "<tr>";
				echo "<td>Student Number</td>";
				echo "<td>Name & Course</td>";
				echo "<td>Year Incurred</td>";
				echo "<td>Semester Incurred</td>";
				echo "<td>Date Added</td>";
				echo "<td>Accountability Details</td>";
				echo "<td>Amount Due</td>";
			
			while($i < mysql_numrows($isSLB)){
				$student_number = mysql_result($result2,$i,"student_number");
				$last_name = mysql_result($result2,$i,"last_name");
				$first_name = mysql_result($result2,$i,"first_name");
				$middle_name = mysql_result($result2,$i,"middle_name");
				$degree_program = mysql_result($result2,$i,"degree_program");
				$year_incurred = mysql_result($isSLB,$i,"year_incurred");
				$semester_incurred = mysql_result($isSLB,$i,"semester_incurred");
				$date_added = mysql_result($isSLB,$i,"date_added");
				$details = mysql_result($isSLB,$i,"details");
				$amount_due = mysql_result($isSLB,$i,"amount_due");
				$accountability_id = mysql_result($isSLB,$i,"accountability_id"); 
			
				echo "<tr>";
				echo "<td height = \"20\">".$student_number."</td>";
				echo "<td>".$last_name.", ".$first_name." ".$middle_name."<br>".$degree_program."</td>";
				echo "<td>".$year_incurred."</td>";
				echo "<td>".$semester_incurred."</td>";
				echo "<td>".$date_added."</td>";
				echo "<td>".$details."</td>";
				echo "<td>".$amount_due."</td>";
				echo "<td><a href=\"cashierClearOthers.php?id=".$accountability_id."\">Input Payment</a></td>";
				echo "</tr>";							
				$i++;
			}
			echo "</table>";
		 }
	}
	
	function acct_clearOthers(){
		include('connect.php');
			$student_number = $_POST['student_number'];
			$official_receipt_number = $_POST['or_number'];
			$amount_paid = $_POST['amount_paid'];
			$id = $_POST['id'];
			$date_paid = date('Ymd');
			$date_cleared = date('Ymd');
			//store in database
			$query_amount_due = "SELECT * FROM accountability WHERE accountability_id = $id;";
			$result_amount_due = mysql_query($query_amount_due);
			$amount_due = mysql_result($result_amount_due, 0, "amount_due");
			if($amount_paid != $amount_due || !is_numeric($official_receipt_number)){
			header("Location: cashierClearOthers.php?id=$id");
			}
			else{
				$add = "INSERT INTO payment VALUES ('$official_receipt_number','$amount_paid', '$date_paid', 0, '$student_number');";
				$addOR= mysql_query($add);
				$update = "UPDATE accountability SET accountability_status='cleared', date_cleared = $date_cleared Where accountability_id=$id;";
				mysql_query($update);
				header("Location:cashierSAM.php");
			}
	}
}


?>