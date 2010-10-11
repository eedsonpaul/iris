<?php require_once 'header.php' ?>
<h1 align="center">Remove Course</h1>
<h5 align="center">Key in the course code</h5>
<table align="center">
<form action="process.php" method="post">
	<tr>
		<td><input type="text" name="sub"/></td>
	</tr>
	<tr>
		<td><input type="submit" name = "c" value="Remove Course"/></td>
	</tr>
</form>
</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>