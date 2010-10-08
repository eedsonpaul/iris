<?php 
  require_once 'cashier_header.php';
?>
<div class="main">
<div id="navigation">
Employee ID : <?php echo $_SESSION['employee_id']?><br>
<?php $query_employee = "SELECT * FROM employee WHERE employee_id ='".$_SESSION['employee_id']."';";
$employee = mysql_query($query_employee);
$employee_last_name = mysql_result($employee,0,"last_name");
$employee_first_name = mysql_result($employee,0,"first_name");
$employee_middle_name = mysql_result($employee,0,"middle_name");?>

Name   :  <?php echo $employee_last_name.", ". $employee_first_name." ".$employee_middle_name;?><br>
Designation :  <br>
Unit:  <br>
<br>
<p>&nbsp;</p>
<center>
<?php
					include('connect.php');
					
					$student_number = $_GET['student_number'];
					$query_student = "select * from student WHERE student_number = $student_number;";
					$result_student = mysql_query($query_student);
					$stfap_bracket_id = mysql_result($result_student, 0, "stfap_bracket_id");
					$scholarship_id = mysql_result($result_student, 0, "scholarship_id");
					$query_stfap = "select * from stfap where stfap_bracket_id = $stfap_bracket_id;";
					$result_stfap = mysql_query($query_stfap);
					$amount_per_unit = mysql_result($result_stfap, 0, "amount_per_unit");
					
					$query_assessment = "SELECT * FROM assessment_table;";
					$result_assessment = mysql_query($query_assessment);
					
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
					
					$miscellaneous_2 = $community_chest + $publication + $student_council;
					$miscellaneous_2_total = $community_chest + $publication + $student_council;
					$miscellaneous_2_less_stfap = $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap;
					$miscellaneous_2_amount_shouldered = $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered;
					$miscellaneous_2_total_less = $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap + $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered;
					$miscellaneous_2_to_pay = $miscellaneous_2 - $miscellaneous_2_total_less;
					$miscellaneous_2_total_to_pay = $miscellaneous_2_total - $miscellaneous_2_total_less;
					
					echo "<h3>Breakdown of Student Fund Payment</h3>";
					echo "<table border=1>";
					echo "<tr>";
					echo "<td><h5>PAYMENT NAME</td>";
					echo "<td><h5>AMOUNT DUE</td>";
					echo "<td><h5>LESS(STFAP)</td>";
					echo "<td><h5>LESS(Scholarship)</td>";
					echo "<td><h5>TOTAL LESS</td>";
					echo "<td><h5>TO PAY</td>";
					
					echo "<tr>";
					echo "<td>Community Chest</td>";
					echo "<td>".$community_chest."</td>";
					echo "<td>".$community_chest_less_stfap."</td><td>".$community_chest_amount_shouldered."</td><td>".$community_chest_total_less."</td>";
					echo "<td>".$community_chest_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Publication</td>";
					echo "<td>".$publication."</td>";
					echo "<td>".$publication_less_stfap."</td><td>".$publication_amount_shouldered."</td><td>".$publication_total_less."</td>";
					echo "<td>".$publication_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Student Council</td>";
					echo "<td>".$student_council."</td>";
					echo "<td>".$student_council_less_stfap."</td><td>".$student_council_amount_shouldered."</td><td>".$student_council_total_less."</td>";
					echo "<td>".$student_council_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Total</td>";
					echo "<td>".$miscellaneous_2_total."</td>";
					echo "<td>".$miscellaneous_2_less_stfap."</td><td>".$miscellaneous_2_amount_shouldered."</td><td>".$miscellaneous_2_total_less."</td>";
					echo "<td>".$miscellaneous_2_total_to_pay."</td></tr>";
					echo "</table>";
					
					echo "<input type=button value=\"Back\" onClick=\"history.go(-1)\">";
					
?>


</center>
</body>
</html>