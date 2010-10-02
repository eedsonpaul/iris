<?php
	class editGrades {
		
		function removeINC() {
			include("connect_to_database.php");
			include("sql_queries.php");
				
			$count = 0;
			$act = $_GET['action'];
	
			$path = "cso_remove_inc_4.0.php";
	
			$student_number = $_POST['student_id'];
			$student_name = "";
			$query = new SqlQueries();
			$result = $query->querysql("SELECT * from student where student_number = '$student_number'");
			while ($row = mysql_fetch_array($result)){
				$student_name = $row['first_name']." ".$row['middle_name'][0]." ".$row['last_name'];
 				$subject = "";
				$section = "";
				
	  			$sql = "select * from grade where student_number = '$student_id' && initial_grade='INC'";
				$res = mysql_query($sql);
				while($row = mysql_fetch_array($res)){
					$subject = $row['subject_code'];
					$section = $row['subject_label'];
					echo "<tr>";
        			echo "<td width=319 height=36><div align=center class=style1>".$student_number." - ".$student_name."</div></td>";
					echo "<th width='296'>".$subject." ".$section."</td>";
				echo "<td width='200'> </td>";
        			echo "<td width='164'><div align='center'><strong><a href='".$path."?sub=".$subject."&sec=".$section."&id=".$student_number."&action=".$act.">EDIT</a></strong></div></td>";
      				echo "</tr>";
	  			}
				$count++;
	  		} 
				if ($count==0) {
					echo "<tr>";
        			echo "<td colspan=4><center><br><b>NO RECORD FOUND!</b></center></td>";
					echo "</tr>";
				}
		
		}
		
		function remove4() {
			include("connect_to_database.php");
			include("sql_queries.php");
				
			$count = 0;
			$act = $_GET['action'];
	
			$path = "cso_remove_inc_4.0.php";
	
			$student_number = $_POST['student_id'];
			$student_name = "";
			$query = new SqlQueries();
			$result = $query->querysql("SELECT * from student where student_number = '$student_number' && initial_grade = '4.0'");
			while ($row = mysql_fetch_array($result)){
				$student_name = $row['first_name']." ".$row['middle_name'][0]." ".$row['last_name'];
 				$subject = "";
				$section = "";
				
	  			$sql = "select * from grade where student_number = '$student_id'";
				$res = mysql_query($sql);
				while($row = mysql_fetch_array($res)){
					$subject = $row['subject_code'];
					$section = $row['subject_label'];
					echo "<tr>";
        			echo "<td width=319 height=36><div align=center class=style1>".$student_number." - ".$student_name."</div></td>";
					echo "<th width='296'>".$subject." ".$section."</td>";
				echo "<td width='200'> </td>";
        			echo "<td width='164'><div align='center'><strong><a href='".$path."?sub=".$subject."&sec=".$section."&id=".$student_number."&action=".$act.">EDIT</a></strong></div></td>";
      				echo "</tr>";
	  			}
				$count++;
	  		} 
				if ($count==0) {
					echo "<tr>";
        			echo "<td colspan=4><center><br><b>NO RECORD FOUND!</b></center></td>";
					echo "</tr>";
				}
		
		}
	
	}
?>