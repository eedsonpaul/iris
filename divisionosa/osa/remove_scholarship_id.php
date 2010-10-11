<?php
	require_once 'header.php';
?>
	<h1 align='center'>Remove Scholarship</h1>
	<h4 align='center'>Key in the Scholarship Name</h1>
	<table align='center' class='tablestyle'>
	<form action='process_osa.php' method='post'>
		<tr>
			<td>Search Scholarship</td>
			<td><input type='text' name='scholarship_name'/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='osa' value='Search Scholarship to remove'/></td>
		</tr>
	</form>
	</table>
<br/></br>
<?php require_once '../../admin_footer.php' ?>