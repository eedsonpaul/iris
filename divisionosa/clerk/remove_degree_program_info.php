<?php
	require_once '../cssandstuff/http.php';
	require_once 'header.php';
	require_once 'degree_functions.php';
	$degree_program_id = $_POST['degree_program_id'];
	$p = mysql_fetch_array(retrieve_degree($degree_program_id));
	//$r = print_edit_degree(search_degree($degree_name));
?>
	<h1 align=center>Remove Degree Program</h1>
	<form action=process_dp.php method=post>
	<table align=center class=tablestyle>
		<tr>
			<th width=200>Program Code</th>
			<th width=200>Degree Level</th>
			<th width=200>Degree Name</th>
			<th width=200>Degree Title</th>
			<th width=200>Entrance Code</th>
			<th width=200>Enrollment Quota</th>
			<th width=200>Unit Name</th>
		</tr>
		<tr>
			<td><?php echo $p[1] ?></td>
			<td><?php echo $p[3] ?></td>
			<td><?php echo $p[2] ?></td>
			<td><?php echo $p[8] ?></td>
			<td><?php echo $p[12] ?></td>
			<td><?php echo $p[13] ?></td>
			<td><?php echo $p[14] ?></td>
		</tr>
	</table>
	<input type='hidden' name='degree_program_id' value='<?php echo $degree_program_id ?>'>
	<p>Do you want to proceed on removing the selected degree program?</p>
	<input type='submit' name='dp' value='Proceed'/>
	<input type='submit' name='dp' value='Do Not'/>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>