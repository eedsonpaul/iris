<?php
	require_once 'header.php';
	require_once 'scholarship_stfap.php';
	$student_number = $_POST['student_number'];
	$employee_id = $_SESSION['employee_id'];
	$s = mysql_fetch_array(retrieve_student_scholarship_info($student_number));
?>
	<h1 align='center'>Edit Scholarship Information</h1>
	<table align='center' class='tablestyle'>
	<form action='process_osa.php' method='post'>
		<input type='hidden' name='snum' value='<?php echo $student_number?>'>
		<input type='hidden' name='employee_id' value='<?php echo $employee_id?>'>
		<tr>
			<td>Student Number</td>
			<td><input type='text' name='student_number' value='<?php echo $s[0] ?>' disabled /></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td><input type='text' name='first_name' value='<?php echo $s[1] ?>' disabled /></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type='text' name='last_name' value='<?php echo $s[2] ?>' disabled /></td>
		</tr>
		<tr>
			<td>Scholarship</td>
			<td><select name='scholarship' value='<?php echo $s[3] ?>'>
			<?php print_scholarship_options(retrieve_all_scholarship()) ?></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='osa' value='Edit Student Scholarship'/></td>
		</tr>
	</form>
	</table>
<?php
	require_once 'footer.php';
?>