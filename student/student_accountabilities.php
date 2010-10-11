<?php
	require_once 'student_header.php';
    $student_number = $_SESSION['student_number'];
	require_once 'student_navigation.php';
?>

<div id="right_side">
  <p>
	<table width="660" class="tablestyle">
  <tr>
    <th width="125">Accountability</th>
    <th width="125">Details</th>
    <th width="125">Amount Due </th>
    <th width="125">Date AY/sem Inccurred </th>
  </tr>
  <?php

	$query = mysql_query("SELECT details,amount_due,year_incurred,semester_incurred,accountability_type_id from accountability where student_number='$student_number'");
	$index=0;	
	while($row = mysql_fetch_array($query)){
			$details[$index] = $row['details'];	
			$amount_due[$index] = $row['amount_due'];
			$year_incurred[$index] = $row['year_incurred'];	
			$semester_incurred[$index] = $row['semester_incurred'];	
			$accountability_type_id[$index] = $row['accountability_type_id'];	
			$index++;
		}
		for($i = 0;$i < $index; $i++){
				echo "<tr>";
				echo "<td width='125'>" . checkAccountability($accountability_type_id[$i]) . "</td>";
				echo "<td width='125'>" . $details[$i] . "</td>";
				echo "<td width='125'>" . $amount_due[$i] . "</td>";
				echo "<td width='125'>" . $year_incurred[$i] . "/" . $semester_incurred[$i] . "</td>";
				echo "</tr>";
		}

function checkAccountability($accountability_type_id){
	$query = mysql_query("SELECT accountability_type from accountability_type where accountability_type_id='$accountability_type_id'");
	while($row = mysql_fetch_array($query)){		
			$accountability_type_id = $row['accountability_type'];	
		}
		return $accountability_type_id;
}
?>
</table>
</div>
</div>

<?php
	require_once '../admin_footer.php';
?>