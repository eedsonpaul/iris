<?php

//	class Accountability{
//		$id = "";
//		$student_number  ="";
//		$last_name ="";
//	}
	
	function settudentNumber($studentNumber){
		$student_number =$studentNumber;
	}
	
	function displayAccountabilities(){
	
	$query = "Select * from accountability WHERE accountability_status='pending';";
	$result = mysql_query($query);
	$query2 = "SELECT * FROM accountability, student WHERE accountability.student_number = student.student_number AND accountability.accountability_status='pending';";
	$result2 = mysql_query($query2);
	$query3 = "SELECT * FROM accountability, accountability_type WHERE accountability.accountability_type_id = accountability_type.accountability_type_id AND accountability.accountability_status='pending';";
	$result3 = mysql_query($query3);
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
			$student_number = mysql_result($result,$i,"student_number");
			$last_name = mysql_result($result2,$i,"last_name");
			$first_name = mysql_result($result2,$i,"first_name");
			$middle_name = mysql_result($result2,$i,"middle_name");
			$degree_program = mysql_result($result2,$i,"degree_program");///add name and course column here
			$year_incurred = mysql_result($result,$i,"year_incurred");
           	$semester_incurred = mysql_result($result,$i,"semester_incurred");
			$date_added = mysql_result($result,$i,"date_added");
			$accountability_type = mysql_result($result3,$i,"accountability_type"); //ilisan pa ni!! changed na diay~
			$details = mysql_result($result,$i,"details");
           	$amount_due = mysql_result($result,$i,"amount_due");
			$accountability_type_id = mysql_result($result,$i,"accountability_type_id"); //ilisan pud ni~! another query to the 'accountability_type' table. MANA~!
			
			echo "<tr>";
			echo "<td height = \"20\">".$student_number."</td>";
			echo "<td>".$last_name.", ".$first_name." ".$middle_name."<br>".$degree_program."</td>";//name and course column here
			echo "<td>".$year_incurred."</td>";
            echo "<td>".$semester_incurred."</td>";
			echo "<td>".$date_added."</td>";
			echo "<td>".$accountability_type."</td>";
			echo "<td>".$details."</td>";
            echo "<td>".$amount_due."</td>";
			echo "<td><a href=\"edit_accountability.php?id=".$accountability_type_id."\">Edit</a></td>";
			echo "<td><a href=\"clear_accountability.php?id=".$accountability_type_id."\">Clear</a></td>";
			echo "</tr>";							
			$i++;
		}
		}
		}
		function addAccountability(){
			$accountability_type = $_POST['accountability_type'];
			$details = $_POST['details'];
			$amount_due = $_POST['amount_due'];
			$year_incurred = $_POST['year_incurred'];
			$semester_incurred = $_POST['semester_incurred'];
			$date_added = $_POST['date_added'];
			$student_number = $_POST['student_number'];

		//store in database
		$add = "INSERT INTO accountability VALUES ('', $accountability_type, $student_number,'$details',$amount_due, $year_incurred, $semester_incurred, $date_added, 1, 'pending', '');";
		$addAccountability= mysql_query($add);
		header("Location:student_accountability_index.php");	
		}
		
		
		
		
?>