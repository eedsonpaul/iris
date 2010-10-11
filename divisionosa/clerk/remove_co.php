<?php require_once 'header.php' ?>
<h1 align="center">Remove Section</h1>
<h5 align="center">Key in the Course Code</h5>
<table align="center">
<form action="process.php" method="post">
	<tr>
		<td><h4>Course Code</h4></td>
		<td><input type="text" name="course_code"/></td>
	</tr>
	<!--
	<tr>
		<td><h4>Section</h4></td>
		<td><input type="text" name="section"/></td>
	</tr>-->
	<tr>
		<td><input type="submit" name="c" value="Remove Section"/></td>
	</tr>
</form>
</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>