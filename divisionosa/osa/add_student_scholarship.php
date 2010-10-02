<?php
	require_once 'header.php';
	require_once 'scholarship_stfap.php';
?>
<h1 align='center'>Add student Scholarship</h1>
<form action='process_osa.php' method='post'>
<table align='center' class='tablestyle'>
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