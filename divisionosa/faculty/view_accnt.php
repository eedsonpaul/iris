<?php
	require_once 'header.php';
	//require_once 'faculty_functions.php';
?>
	<h1 align="center">View Accountability</h1>
	<h5 align="center">Key in the Student Number</h5>
	<?php
		if(!(isset($_POST['error']))) $_POST['error'] = '';
		echo '<h4 align=center>'.$_POST['error'].'</h4>';
	?>
	<table  align="center">
	<form action="process_faculty.php" method="post" name="viewacct">
	<input type='hidden' name='error'>
		<tr>
			<td><input type="text" name="studnum"/></td>
		</tr>
		<tr>
			<td><input type="submit" name="action" value="View Accountability"/></td>
		</tr>
	</form>
	</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>