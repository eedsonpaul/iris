<?php
	require_once 'header.php';
?>
	<h1 align='center'>Add Approved Scholarship</h1>
	<?php
		if(!(isset($_POST['error']))) $_POST['error'] = '';
		echo '<h4 align=center>'.$_POST['error'].'</h4>';
	?>
	<table align='center' class='tablestyle'>
	<form action='process_osa.php' method='post'>
		<input type='hidden' name='error'>
		<!--
		<tr>
			<td>Scholarship Id</td>
			<td><input type='text' name='scholarship_id'/></td>
		</tr>
		-->
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
<br/></br>
<?php require_once '../../admin_footer.php' ?>