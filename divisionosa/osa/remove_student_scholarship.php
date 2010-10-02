<?php
	require_once 'header.php';
?>
	<h1 align='center'>Remove Student Scholarship</h1>
	<h4 align='center'>Key in the Student Number</h1>
	<table align='center' class='tablestyle'>
	<form action='process_osa2.php' method='post'>
		<tr>
			<td>Search Student</td>
			<td><input type='text' name='snum'/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='remove' value='Go'/></td>
		</tr>
	</form>
	</table>
<?php
	require_once 'footer.php';
?>