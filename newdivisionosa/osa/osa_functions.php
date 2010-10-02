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
?>