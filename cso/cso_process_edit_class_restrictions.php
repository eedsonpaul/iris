<?php
	class classRestrictions {
		
		function editClassRestrictions() {
			include("connect_to_database.php");
			include("sql_queries.php");
			
			$subject = $_POST['subject'];
			$unit = 0;
			$count = 0;
			$semester = $_SESSION['current_semester'];
			$academic_year = $_SESSION['current_year'];
			
			$sql = "SELECT * from section where course_code like '$subject%'";
			$res = mysql_query($sql);
				
			while($row = mysql_fetch_array($res)){
				$subj_id = $row['course_code'];
				$sect_lab = $row['section_label'];
				$room = $row['room_id'];
				$class = $row['class_type'];
				$total = $row['total_slots'];
				$avail = $row['available_slots'];
				$waitlist = $row['waitlist_count'];
				$confirm = $row['confirmed_count'];
				$enrolled = $row['enrolled_count'];
					
				$sql = "select * from section_schedules where course_code = '$subj_id' && section_label = '$sect_lab'";
				$res3 = mysql_query($sql);
				while($row = mysql_fetch_array($res3)){
					$start = $row['start_time'];
					$end = $row['end_time'];
					$day = $row['day_of_the_week'];
				}
				
	echo "<tr>";
  	echo "<td><div align='left'>".strtoupper($subj_id)."</div>";
       echo "<div align='left'></div></td>";
        echo "<td><div align='center'>".strtoupper($sect_lab)."</div></td>";
        echo "<td><div align='center'>".$unit."</div></td>";
        echo "<td><div align='center'>".$day.' '.$start.' - '.$end."</div></td>";
        echo "<td><div align='center'>".$total.' / '.$avail.' / '.$waitlist.' / '.$confirm.' / '.$enrolled."</div></td>";
        echo "<td><div align='center'>".$room."</div></td>";
        echo "<td width='164'><div align='center'><strong><a href='cso_edit_class.php?id=".$subj_id."&sec=".$sect_lab."'>EDIT</a></strong></div></td>";
      echo "</tr>";				
	  }
				/*$sql="select * from subject where course_code = '$subj_id'";
				$res2=mysql_query($sql);
			
				while($row = mysql_fetch_array($res2)){
					$subj_name = $row['subject_title'];
					$unit = $row['units'];
					$lab_fee = $row['lab_fee'];
				} */  		
	}
	}
?>