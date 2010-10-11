<?php
	require_once 'header.php';
	require_once 'scholarship_stfap.php';
	$employee_id = $_SESSION['employee_id'];
?>
<h1 align='center'>Add student Scholarship</h1>
<?php
	if(!(isset($_POST['error']))) $_POST['error'] = '';
	echo '<h4 align=center>'.$_POST['error'].'</h4>';
?>
<form action='process_osa.php' method='post'>
<table align='center' class='tablestyle'>
	<input type='hidden' name='employee_id' value='<?php echo $employee_id?>'>
	<input type='hidden' name='error'>
	<tr>
		<td>Student Number</td>
		<td><input type='text' name='snum'></td>
	</tr>
	<tr>
		<td>Scholarship</td>
		<td><select name='scholarship'>
		<?php print_scholarship_options(retrieve_all_scholarship()) ?></td>
	</tr>
	<tr>
		<td></td>
		<td><input type='submit' name='osa' value='Add Scholarship'></td>
	</tr>
</table>
</form>
<?php
	require_once 'footer.php';
?>