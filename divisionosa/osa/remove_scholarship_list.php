<?php
	require_once 'header.php';
	require_once 'scholarship_stfap.php';
	$sid = $_POST['scholarship_name'];
?>
	<h1 align='center'>Remove Scholarship</h1>
	<table align='center' class='tablestyle'>
		<tr>
			<th width='200'>Scholarship Id</th>
			<th width='200'>Scholarship Name</th>
			<th width='200'>Amount Shouldered</th>
			<th width='200'>Action</th>
		</tr>
		<?php print_table_remove_scholarship(search_approved_scholarship($sid)) ?>
	</table>
<?php
	require_once 'footer.php';
?>