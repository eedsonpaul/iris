<?php
	require_once 'header.php';
?>
	<h1 align='center'>Edit Student Scholarship</h1>
	<h4 align='center'>Key in the Student Number</h1>
	<table align='center' class='tablestyle'>
	<form action='process_osa.php' method='post'>
		<tr>
			<td>Search Student</td>
			<td><input type='text' name='snum'/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='osa' value='Search Student'/></td>
		</tr>
	</form>
	</table>
<br/></br>
<?php require_once '../../admin_footer.php' ?>