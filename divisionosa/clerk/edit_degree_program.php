<?php require_once 'header.php'?>
	<h1 align=center>Edit Degree Program</h1>
	<h4 align=center>Key in the Degree Name</h4>
	<form action=process_dp.php method=post>
	<table align=center>
		<tr>
			<td><input type='text' name=degree_name></td>
		<tr>
		<tr>
			<td><input type=submit value='Search Degree' name=dp></td>
		</tr>
	</table>
	</form>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>