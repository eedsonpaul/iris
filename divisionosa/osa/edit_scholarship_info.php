<?php
	require_once 'header.php';
	require_once 'scholarship_stfap.php';
	$sid = $_POST['scholarship_id'];
	$s = mysql_fetch_array(retrieve_scholarship_information($sid));
?>
	<h1 align='center'>Edit Scholarship Information</h1>
	<?php
		if(!(isset($_POST['error']))) $_POST['error'] = '';
		echo '<h4 align=center>'.$_POST['error'].'</h4>';
	?>
	<table align='center' class='tablestyle'>
	<form action='process_osa.php' method='post'>
	<input type='hidden' name='error'>
		<input type='hidden' name='scholarship_id' value='<?php echo $sid ?>'>
		<!--
		<tr>
			<td>Scholarship Id</td>
			<td><input type='text' name='scholarship_id' value='' disabled /></td>
		</tr>
		-->
		<tr>
			<td>Scholarship Name</td>
			<td><input type='text' name='scholarship_name' value='<?php echo $s[1] ?>'/></td>
		</tr>
		<tr>
			<td>Amount Shouldered</td>
			<td><input type='text' name='amount_shouldered' value='<?php echo $s[2] ?>'/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='osa' value='Edit Scholarship Info'/></td>
		</tr>
	</form>
	</table>
<br/></br>
<?php require_once '../../admin_footer.php' ?>