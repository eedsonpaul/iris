<?php 
  require_once 'cashier_header.php';
?>

<br>
<br>
<br>
<br>
<br>
<center>
<form action="searchCashierAssessment.php" method="get">
	<table>
		<tr>
			<td>Student Number:</td>
			<td><input type="text" name="student_number" value="XXXXXXXXX" onFocus="javascript:this.value=''">
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table width="288">
	  <tr>
	    <td width="54">&nbsp;</td>
	    <td width="104"><input type="submit" value="Submit" /></td>
	    <td width="55"><a href="cashier.php"><input type=button value="Back" /></a></td>
	    <td width="55">&nbsp;</td>
      </tr>
  </table>
	<p>&nbsp;</p>
</form>

<?php 
  require_once 'cashier_footer.php';
?>