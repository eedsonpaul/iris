<?php
	include("../cssandstuff/dbconnect.php");
	include("../cssandstuff/general_functions.php");
	
	function stfap()
	{
		$q1 = mysql_query("select stfap_bracket_id,stfap_bracket from stfap");
		if(!$q1) die("unable to retrieve bracket and title".mysql_error());
		options(cols_2($q1,"stfap_bracket_id","stfap_bracket"));
		print_arr2(cols_2($q1,"stfap_bracket_id","stfap_bracket"));
	}
	function update_bracket_student($student_id,$stfap_bracket_id)
	{
		$q = mysql_query("update student set stfap_bracket_id='$stfap_bracket_id'
			where student_number='$student_id'");
			/*dissolved='$a14'*/
		if(!$q) die("Unable to update section schedule". mysql_error());
	}
	function add_a($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11)
	{
		$q = mysql_query("insert into accountability values ('$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11')");
		if(!$q) die("unable to add accountability".mysql_error());
	}
	function options_account()
	{
		$q = mysql_query("select accountability_type_id,accountability_type from accountability_type");
		if(!$q) die("unable to retrieve id and type".mysql_error());
		options(cols_2($q,"accountability_type_id","accountability_type"));
		print_arr2(cols_2($q,"accountability_type_id","accountability_type"));
	}
	
	function retrieve_account_osa($student_number)
	{
		$q	=	mysql_query("SELECT a.accountability_type, b.details, b.amount_due, b.year_incurred, c.semester_type
				FROM semester c, accountability b, accountability_type a
				WHERE b.accountability_type_id = a.accountability_type_id
				and b.accountability_status='pending'
				AND c.semester_id = b.semester_incurred
				AND b.student_number =  '$student_number'
				and a.accountability_type_id='3'");
		if(!$q) die("unable to retrieve osa accountability".mysql_error());
		return $q;
	}
	
	function print_table_account($a)
	{
		$i=0;
		while($row = mysql_fetch_array($a))
		{
			echo '<tr>';
			echo '<td></td>';
			while($i<5)//sizeof($row)
			{
				echo '<td>';
				if($i==3) {
					echo ($row[$i]-1)."-".$row[$i];
					echo "/".$row[$i+1];
					$i++;
				}
				else echo $row[$i]." ";
				$i++;
				echo '</td>';
			}
			$i=0;
			echo "</tr>";
		}
	}
?>