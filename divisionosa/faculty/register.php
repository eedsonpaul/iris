<?php
	require_once 'header.php';
?>
	<h1 align="center">Register Student</h1>
	<h5 align="center">Key in the Student Number</h5>
	<table  align="center">
	<form action="process_faculty.php" method="post" name="viewacct">
		<tr>
			<td><input type="text" name="studnum"/></td>
		</tr>
		<tr>
			<td><input type="submit" name="action" value="Register Student"/></td>
		</tr>
	</form>
	</table>
<?php require_once 'footer.php'; ?>