<?php
	require_once 'header.php';
	require_once 'scholarship_stfap.php';
	$sid = $_POST['scholarship_name'];
?>
	<h1 align='center'>Edit Scholarship Information</h1>
	<table align='center' class='tablestyle'>
	<!--<form action='process_osa.php' method='post'>-->
		<tr>
			<th width='200'>Scholarship Name</th>
			<th width='200'>Amount Shouldered</th>
			<th width='200'>Action</th>
		</tr>
		<?php print_table_search_scholarship(search_approved_scholarship($sid)) ?>
	<!--</form>-->
	</table>
<br/></br>
<?php require_once '../../admin_footer.php' ?>