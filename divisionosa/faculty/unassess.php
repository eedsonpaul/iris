<?php
	require_once 'header.php';
	require_once 'faculty_functions.php';
	require_once 'tuition_compute.php';
	$student_number = $_POST['studnum'];
	//$unit = $_POST['unitcount'];
	//STFAP and Scholarship and student name
	$stfap = print_bracket_degree(retrieve_bracket_degree($student_number));
	$scholarship = mysql_fetch_array(view_student_scholarship($student_number));
	$student_name = mysql_fetch_array(retrieve_student_name($student_number));
	//echo $student_number;
	
	//Retrieve assess info
	$retrieve_assess = mysql_fetch_array(retrieve_assess_info($student_number));
	//print_r($retrieve_assess);
	
	//Miscellaneous and student fund and other fees
	//CONSTANT AMOUNT
	$miscell = mysql_fetch_array(miscell_fees());
	$student_fund = mysql_fetch_array(student_fund());
	$other_fees = mysql_fetch_array(other_fees());
	
	//computation of other fees
	$non_citizen_fee = $other_fees[0]*$retrieve_assess[2];
	$entrance = $other_fees[1]*$retrieve_assess[3];
	$deposit = $other_fees[2]*$retrieve_assess[4];
	$id_fee = $other_fees[3]*$retrieve_assess[5];
	$in_residence = $other_fees[4]*$retrieve_assess[6];
	
	$total_other=$non_citizen_fee+$entrance+$deposit+$id_fee+$in_residence;
	/*
	$non_citizen_fee = $other_fees[0]*$_POST['non_citizen_fee'];
	$entrance = $other_fees[1]*$_POST['entrance'];
	$deposit = $other_fees[2]*$_POST['deposit'];
	$id_fee = $other_fees[3]*$_POST['id_fee'];
	$in_residence = $other_fees[4]*$_POST['in_residence'];*/
	/*
	echo $non_citizen_fee.' ';
	echo $entrance.' ';
	echo $deposit.' ';
	echo $id_fee.' ';
	echo $in_residence.' ';*/
	
	echo $lm[0];
	
	//NSTP and Laboratory
	//CONSTANT AMOUNT
	$lab_nstp = mysql_fetch_array(laboratory_nstp());
	
	//computation of lab and nstp
	$tuition = $retrieve_assess[0]*tuition($stfap[0]);
	$lab = $lab_nstp[0]*$retrieve_assess[1];
	$nstp = $lab_nstp[1];
	
	//College
	$college = 'UPVCC';
?>
<h1 align="center">Assessment of Fees</h1>
<h5 align='center'>First Semester, A.Y. 2010-2011</h1>
<table>
	<tr>
		<td><p>STUDENT NAME: </p></td>
		<td><p><?php echo $student_name[0].', '.$student_name[1]?></p></td>
		<td><p>Degree Program: </p></td>
		<td><p><?php echo $stfap[1]?></p></td>
	</tr>
	<tr>
		<td><p>STUDENT Number: </p></td>
		<td><p><?php echo $student_number?></p></td>
		<td><p>College:</h4></td>
		<td><p><?php echo $college?></h4></td>
	</tr>
</table>
<p>STFAP BRACKET: <?php echo $stfap[0] ?></p>
<p>SCHOLARSHIP: <?php echo $scholarship[0] ?></p>

<h1>Breakdown of Payment</h1>
<h2>Cannot Assess. Clear your Accountabilities First.</h2>
<?php
	require_once 'footer.php';
?>