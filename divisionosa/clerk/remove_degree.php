<?php require_once 'header.php' ?>
	<h1 align=center>Remove Degree Program</h1>
	<h4 align=center>Key in the Degree Name</h4>
	<form action=process_dp.php method=post>
	<table align=center>
		<tr>
			<td><input type='text' name=degree_name></td>
		<tr>
		<tr>
			<td><input type=submit value='Remove Degree' name=dp></td>
		</tr>
	</table>
	</form>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>