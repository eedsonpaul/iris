<?php
	require_once '../cssandstuff/http.php';
	require_once 'header.php';
	require_once 'scholarship_stfap.php';
	$sid = $_POST['scholarship_id'];
	$s = mysql_fetch_array(retrieve_scholarship_information($sid));
?>
	<h1 align='center'>Remove Scholarship</h1>
	<form action='process_osa.php' method='post'>
	<table align='center' class='tablestyle'>
	<input type=hidden name='scholarship_id' value='<?php echo $s[0]?>'>
	<input type=hidden name='scholarship_name' value='<?php echo $s[1]?>'>
		<tr>
			<th width='200'>Scholarship Id</th>
			<th width='200'>Scholarship Name</th>
			<th width='200'>Amount Shouldered</th>
		</tr>
		<tr>
			<td><?php echo $s[0] ?></td>
			<td><?php echo $s[1] ?></td>
			<td><?php echo $s[2] ?></td>
		</tr>
	</table>
	<p>Are you sure you want to Remove the selected Scholarship?</p>
	<input type='submit' name='osa' value='Yes'/>
	<input type='submit' name='osa' value='No'/>
	</form>
<?php
	require_once 'footer.php';
?>