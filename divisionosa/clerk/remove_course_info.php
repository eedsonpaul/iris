<?php
	require_once '../cssandstuff/http.php';
	require_once 'header.php';
	require_once 'subject_functions.php';
	$course_code = $_POST['sub'];
	$s = mysql_fetch_array(retrieve_course_info($course_code));
?>
	<h1 align='center'>Remove Course</h1>
	<form action='process.php' method='post'>
	<table align='center' class='tablestyle'>
	<input type=hidden name='course_code' value='<?php echo $s[0]?>'>
		<tr>
			<th width='200'>Course Code</th>
			<th width='200'>Subject Title</th>
			<th width='200'>Academic Year</th>
			<th width='200'>Units</th>
			<th width='200'>Semester Offered</th>
		</tr>
		<tr>
			<td><?php echo $s[0] ?></td>
			<td><?php echo $s[1] ?></td>
			<td><?php echo ($s[2]-1).'-'.$s[2] ?></td>
			<td><?php echo $s[3] ?></td>
			<td><?php echo $s[4] ?></td>
		</tr>
	</table>
	<p>Are you sure you want to Remove the selected Course?</p>
	<input type='submit' name='c' value='Yes'/>
	<input type='submit' name='c' value='No'/>
	</form>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>