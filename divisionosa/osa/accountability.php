<?php
	require_once 'header.php';
	require_once 'osa_functions.php';
	$student_number = $_POST['studnum'];
?>
<h1 align="center">View Accountability</h1>
<h4 align="center">You are currently viewing the accountability of <strong><?php echo $student_number ?></strong></h4>
<table align="center" class="tablestyle">
<tr>
	<th width="150">Student #</th>
	<th width="150">Student Name</th>
    <th width="150">Accountability</th>
	<th width="150">Details</th>
    <th width="150">Amount Due</th>
    <th width="150">Date AY/Semester Incurred</th>
</tr>
<?php
	print_table_account(retrieve_account_osa($student_number));
?>
</table>
<br/></br>
<?php require_once '../../admin_footer.php' ?>