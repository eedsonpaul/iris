<?php 
  require_once 'cashier_header.php';
?>
<?php
	$id = $_GET['id'];
	$query = "Select student_number from accountability WHERE accountability_id='".$id."';";
	$result = mysql_query($query);
	$student_number = mysql_result($result,0,"student_number");
?>

<html>
<center>
	<body>
		<form action="clearScholarship.php" method="post">
		<input type="hidden" name="student_number" value="<?php echo $student_number;?>"/>
		<input type="hidden" name="id" value="<?php echo $id;?>"/>
		<table>
			<tr>
				<td>OR number: </td>
				<td><input type="text" name="or_number"/></td>
			</tr>
			<tr>
				<td>Amount Paid: </td>
				<td><input type="text" name="amount_paid"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
		<table width="62">
		  <tr>
		    <td width="54"><input type="submit" value="Clear" /></td>
	      </tr>
		  </table>
		<table width="59">
		  <tr>
		    <td width="51"><a href="cahierSAM.php"><input type=button value="Cancel"></a></td>
	      </tr>
		  </table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<table>
		  <tr>
		    <td>&nbsp;</td>
	      </tr>
		  </table>
		<p>&nbsp;</p>
        </form>
		
	</body>
	</center>
</html>
<?php 
  require_once 'cashier_footer.php';
?>