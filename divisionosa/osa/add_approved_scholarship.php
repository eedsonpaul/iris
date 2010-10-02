<?php
	require_once 'header.php';
?>
	<h1 align='center'>Add Approved Scholarship</h1>
	<table align='center' class='tablestyle'>
	<form action='process_osa.php' method='post'>
		<tr>
			<td>Scholarship Id</td>
			<td><input type='text' name='scholarship_id'/></td>
		</tr>
		<tr>
			<td>Scholarship Name</td>
			<td><input type='text' name='scholarship_name'/></td>
		</tr>
		<tr>
			<td>Amount Shouldered</td>
			<td><input type='text' name='amount_shouldered'/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='osa' value='Add Approved Scholarship'/></td>
		</tr>
	</form>
	</table>
<?php
	require_once 'footer.php';
?>