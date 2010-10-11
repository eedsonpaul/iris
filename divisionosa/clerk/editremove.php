<?php require_once 'header.php' ?>
<h1 align="center">Edit/Remove Course</h1>
<form action="process.php" method="post">
<table align="center">	
	<td><input type="text" name="sub"/></td>
	<tr>
		<td><input type="submit" name = "c" value="Edit Course"/></td>
	</tr>
	<tr>
		<td><input type="submit" name = "c" value="Remove Course"/></td>
	</tr>
</form>
</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>