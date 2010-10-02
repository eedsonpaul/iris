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
			$date_added = date('Ymd');
			$student_number = $_GET['student_number'];
			
			$query = "Select * from student WHERE student_number = $student_number;";
			$result = mysql_query($query);
			if(mysql_numrows($result)==0){header("Location:error.php");}
			else{
				//store in database
				$add = "INSERT INTO accountability VALUES ('', $accountability_type, $student_number, '$details', $amount_due, $year_incurred, $semester_incurred, $date_added, 1, 'pending', '1');";
				$addAccountability= mysql_query($add);
				header("Location:librarySAM.php");
			}
		}
		
	function acctg_displayAccountabilities(){
		$query =  "Select * from accountability WHERE accountability_status='pending' AND accountability_type_id = 2;";
		$query2 = "SELECT * FROM accountability, student, accountability_type WHERE accountability.accountability_type_id = accountability_type.accountability_type_id AND accountability.student_number = student.student_number AND accountability.accountability_status='pending' AND accountability.accountability_type_id = 2;";
			
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
				echo "<td>Student Number</td>";
				echo "<td>Name & Course</td>";
				echo "<td>Year Incurred</td>";
				echo "<td>Semester Incurred</td>";
				echo "<td>Date Added</td>";
				echo "<td>Accountability Type</td>";
				echo "<td>Accountability Details</td>";
				echo "<td>Amount Due</td>";
			
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
				echo "<td height = \"20\">".$student_number."</td>";
				echo "<td>".$last_name.", ".$first_name." ".$middle_name."<br>".$degree_program."</td>";
				echo "<td>".$year_incurred."</td>";
				echo "<td>".$semester_incurred."</td>";
				echo "<td>".$date_added."</td>";
				echo "<td>".$accountability_type."</td>";
				echo "<td>".$details."</td>";
				echo "<td>".$amount_due."</td>";
				echo "<td><a href=\"libraryEditAccountability.php?id=".$accountability_id."\">Edit</a></td>";
				echo "<td><a href=\"libraryClearAccountability.php?id=".$accountability_id."\">Clear</a></td>";
				echo "</tr>";							
				$i++;
			}
			}
		}
		
		function acctg_editAccountability(){
			include('connect.php');
			$accountability_type = $_POST['accountability_type'];
			$details = $_POST['details'];
			$amount_due = $_POST['amount_due'];
			$year_incurred = $_POST['year_incurred'];
			$semester_incurred = $_POST['semester_incurred'];
			$date_added = date('Ymd');
			$student_number = $_POST['student_number'];
			$id = $_GET['id'];
 
			//store in database
			$add = "UPDATE accountability SET accountability_type_id=$accountability_type, details ='$details', amount_due=$amount_due, year_incurred=$year_incurred, semester_incurred=$semester_incurred, date_added=$date_added, student_number=$student_number, accountability_status='pending' WHERE accountability_id=$id;";
			$addAccountability= mysql_query($add);
			header("Location:librarySAM.php");	
		}
		
		function acctg_clearAccountability(){
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
			$amount_due = mysql_result($result_amount_due, 0, amount_due);
			if($amount_paid != $amount_due || !is_numeric($official_receipt_number)){
			header("Location: libraryClearAccountability.php?id=$id");
			}
			else{
				$add = "INSERT INTO payment VALUES ('$official_receipt_number','$amount_paid', '$date_paid', 0, '$student_number');";
				$addOR= mysql_query($add);
				$update = "UPDATE accountability SET accountability_status='cleared', date_cleared = $date_cleared Where accountability_id=$id;";
				mysql_query($update);
				header("Location:librarySAM.php");
			}
		}
	
		function acctg_searchAccountability(){
			include('connect.php');
			$last_name = $_POST['last_name'];
			$last_name = "'".$last_name."'";
			
			$query2 = "SELECT * from student, accountability WHERE student.last_name = $last_name AND accountability.student_number = student.student_number AND accountability.accountability_status='pending' AND accountability.accountability_type_id=2;";
			$result2 = mysql_query($query2);
			$query3 = "SELECT * FROM accountability, accountability_type WHERE accountability.accountability_type_id = accountability_type.accountability_type_id AND accountability.accountability_status='pending' AND accountability.accountability_type_id=2;";
			$result3 = mysql_query($query3);             
			$num = mysql_numrows($result2);
			if($num == 0){
				echo "<div align=\"center\"><font color = \"gray\"><b><i>No Accountabilities.</font></i></b></div>";
			}
			else{
				$i=0;
				echo "<center>";
				echo "<table border=\"1\">";
				echo "<tr>";
				echo "<td>Student Number</td>";
				echo "<td>Name & Course</td>";
				echo "<td>Year Incurred</td>";
				echo "<td>Semester Incurred</td>";
				echo "<td>Date Added</td>";
				echo "<td>Accountability Type</td>";
				echo "<td>Accountability Details</td>";
				echo "<td>Amount Due</td>";
				
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
					echo "<td height = \"20\">".$student_number."</td>";
					echo "<td>".$last_name.", ".$first_name."<br>".$degree_program."</td>";
					echo "<td>".$year_incurred."</td>";
					echo "<td>".$semester_incurred."</td>";
					echo "<td>".$date_added."</td>";
					echo "<td>".$accountability_type."</td>";
					echo "<td>".$details."</td>";
					echo "<td>".$amount_due."</td>";
					echo "<td><a href=\"libraryEditAccountability.php?id=".$accountability_id."\">Edit</a></td>";
					echo "<td><a href=\"libraryClearAccountability.php?id=".$accountability_id."\">Clear</a></td>";
					echo "</tr>";							
					$i++;
				}
			}
		}
		
		function acctg_addAccountabilitySearch(){
			$search_option= $_GET['search_option'];
			$search_query= $_GET['search_query'];
			
			if(($search_option!="")&&($search_query!="")){
				if($search_option=='student_number'){
					$student_number=$search_query;
					$last_name ="";
					$query_lastName="SELECT * FROM student WHERE student_number=$student_number;";
					$lastName=mysql_query($query_lastName);
					
					if(mysql_numrows($lastName)==0){
					echo"<table>No student found with that Student Number.</table>";
					}
				}
				if($search_option=='last_name'){
					$last_name=$search_query;
					$query_lastName="SELECT * FROM student WHERE last_name='$last_name';";
					$lastName = mysql_query($query_lastName);
					
					if(mysql_numrows($lastName)==0){
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
						echo "<center>";
						echo "<table>";
						echo "<tr>";
						echo "<td>Student Number: </td>";
						echo "<td>Name: </td>";
						echo "<td> Course & Year: </td>";
						echo "<td></td></tr>";
						
						$num = mysql_numrows($studentNumber);
						$i = 0;
						while($i < $num){
							$last_name = mysql_result($studentNumber,$i,"last_name");
							$first_name = mysql_result($studentNumber,$i,"first_name");
							$middle_name = mysql_result($studentNumber,$i,"middle_name");
							$degree_program = mysql_result($studentNumber,$i,"degree_program");
							$year_level = mysql_result($studentNumber,$i,"year_level");
							
							echo "<tr>";
							echo "<td>".$student_number."</td>";
							echo "<td>".$last_name.", ".$first_name." ".$middle_name."</td>";
							echo "<td>".$degree_program." ".$year_level."</td>";
							echo "<td><a href=\"libraryAddAccountability.php?student_number=$student_number\"><input type=\"submit\" value=\"Add\" /></a></td></tr>";
							echo "</table>";
							$i++;
						}
					}
				}
			}
		}
}

?>
