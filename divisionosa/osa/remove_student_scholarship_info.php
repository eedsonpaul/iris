<?php
	require_once '../cssandstuff/http.php';
	require_once 'header.php';
	require_once 'scholarship_stfap.php';
	$sid = $_POST['student_number'];
	$s = mysql_fetch_array(retrieve_student_scholarship_info($sid));
?>
	<h1 align='center'>Remove Scholarship</h1>
	<form action='process_osa2.php' method='post'>
	<table align='center' class='tablestyle'>
	<input type=hidden name='student_number' value='<?php echo $s[0]?>'>
		<tr>
			<th width='200'>Student Number</th>
			<th width='200'>Student Name</th>
			<th width='200'>Scholarship</th>
		</tr>
		<tr>
			<td><?php echo $s[0] ?></td>
			<td><?php echo $s[2] ?>, <?php echo $s[1] ?></td>
			<td><?php echo $s[3] ?></td>
		</tr>
	</table>
	<p>Are you sure you want to Remove Student's Scholarship?</p>
	<input type='submit' name='remove' value='Yes'/>
	<input type='submit' name='remove' value='No'/>
	</form>
<br/></br>
<?php require_once '../../admin_footer.php' ?>