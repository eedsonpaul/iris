<?php 
  require_once 'cashier_header.php';
?>
<br>
<br>
<center><h1>SLB Payment</h1></center>
<br>
<br>
<br>
<center>
<form action="inputCashierSLBPayment.php" method="get">
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
	    <td width="55"><input type=button value="Back" onClick="history.go(-1)"></td>
	    <td width="55">&nbsp;</td>
      </tr>
  </table>
	<p>&nbsp;</p>
</form>
</body>
</html>
<?php 
  require_once 'cashier_footer.php';
?>