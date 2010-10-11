<?php 
  require_once 'cashier_header.php';
?>
<div id="navigation">
<br>
<br>
<br>
<center><h1>Enroll Student</h1></center>
<br>
<br>
<center>
<form action="searchCashierAssessment.php" method="get" name="cashierform">
	<table>
		<tr>
			<td>Student Number:</td>
			<td><input type="text" name="student_number" onFocus="javascript:this.value=''">
			</td>
		</tr>
	</table>
	
	<p>&nbsp;</p>
	</center>
	</div>
	<center>
	<table width="288">
	  <tr>
	    <td width="54">&nbsp;</td>
	    <td width="104"><input type="submit" value="Submit" /></td>
	    <td width="55"><a href="cashier.php"><input type=button value='Back'></a></td>
	    <td width="55">&nbsp;</td>
      </tr>
	  </form>
  </table>
	<p>&nbsp;</p>
	</center>



<?php 
  require_once 'cashier_footer.php';
?>