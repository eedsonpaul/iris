<?php require_once 'header.php' ?>
<h1 align="center">Dissolve Section</h1>
<h5 align="center">Key in the Course Code and Section</h5>
<?php
	if(!(isset($_POST['error']))) $_POST['error'] = '';
	echo '<h4 align=center>'.$_POST['error'].'</h4>';
?>
<table align="center">
<form action="process.php" method="post">
<input type='hidden' name='error'>
	<tr>
		<td><h4>Course Code</h4></td>
		<td><input type="text" name="course_code"/></td>
	</tr>
	<tr>
		<td><h4>Section</h4></td>
		<td><input type="text" name="section"/></td>
	</tr>
	<tr>
		<td><input type="submit" name="dissolve" value="Dissolve Section"/></td>
	</tr>
</form>
</table>
<br/><br/>
<?php require_once '../../admin_footer.php' ?>